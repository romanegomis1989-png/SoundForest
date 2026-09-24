<?php

namespace Database\Seeders;

use App\Models\Ambiance;
use App\Models\Son;
use App\Models\Style;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SonSeeder extends Seeder
{
    private const EXTENSIONS = ['wav', 'mp3', 'ogg', 'flac', 'm4a'];

    public function run(): void
    {
        $dossier = public_path('storage/Sons');
        //dd($dossier);
        if (! File::isDirectory($dossier)) {
            $this->command->error("Dossier introuvable : {$dossier}");
            return;
        }

        if (Style::count() === 0 || Ambiance::count() === 0 || User::count() === 0) {
            $this->command->error('Seeder Style, Ambiance et User avant SonSeeder.');
            return;
        }

        $fichiers = collect(File::files($dossier))
            ->filter(fn ($f) => in_array(strtolower($f->getExtension()), self::EXTENSIONS, true))
            ->sortBy(fn ($f) => $f->getFilename())
            ->values();

        foreach ($fichiers as $fichier) {
            $nomFichier = $fichier->getFilename();
            $nom        = $this->nomDepuisFichier($nomFichier);
            $duree      = $this->duree($fichier->getPathname(), strtolower($fichier->getExtension()));

            if ($duree === null) {
                $this->command->warn("Durée inconnue pour {$nomFichier}, 0 utilisé.");
                $duree = 0;
            }

            Son::create([
                'nom' => $nom,
                'description' => $nom . ' description',
                'url' => $nomFichier,
                'style_id' => Style::inRandomOrder()->first()->id,
                'ambiance_id' => Ambiance::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id,
                'duree' => $duree,
                'popularite' => fake()->numberBetween(0, 80),
                'created_at' => fake()->dateTimeBetween('-30 days', 'now'),
            ]);
        }

        $this->command->info($fichiers->count() . ' son(s) importé(s).');
    }

    /**
     * mixkit-campfire-burning-crackles-1329.wav => campfire-burning-crackles
     */
    private function nomDepuisFichier(string $nomFichier): string
    {
        $nom = pathinfo($nomFichier, PATHINFO_FILENAME);
        $nom = preg_replace('/^mixkit-/i', '', $nom);
        $nom = preg_replace('/-\d+$/', '', $nom);

        return $nom;
    }

    private function duree(string $chemin, string $extension): ?int
    {
        if ($extension === 'wav') {
            return $this->dureeWav($chemin);
        }

        // Autres formats : utilise getID3 s'il est installé
        // (composer require james-heinrich/getid3)
        if (class_exists(\getID3::class)) {
            $infos = (new \getID3())->analyze($chemin);
            if (isset($infos['playtime_seconds'])) {
                return (int) round($infos['playtime_seconds']);
            }
        }

        return null;
    }

    /**
     * Lit l'en-tête RIFF/WAVE : durée = taille du chunk data / byteRate.
     */
    private function dureeWav(string $chemin): ?int
    {
        $h = @fopen($chemin, 'rb');
        if ($h === false) {
            return null;
        }

        try {
            $entete = fread($h, 12);
            if (strlen($entete) < 12
                || substr($entete, 0, 4) !== 'RIFF'
                || substr($entete, 8, 4) !== 'WAVE') {
                return null;
            }

            $byteRate = null;

            while (! feof($h)) {
                $chunk = fread($h, 8);
                if (strlen($chunk) < 8) {
                    break;
                }

                $id     = substr($chunk, 0, 4);
                $taille = unpack('V', substr($chunk, 4, 4))[1];

                if ($id === 'fmt ') {
                    $fmt = fread($h, $taille);
                    // audioFormat(2) channels(2) sampleRate(4) byteRate(4)
                    $byteRate = unpack('V', substr($fmt, 8, 4))[1];
                    if ($taille % 2 === 1) {
                        fseek($h, 1, SEEK_CUR);
                    }
                } elseif ($id === 'data') {
                    return $byteRate ? (int) round($taille / $byteRate) : null;
                } else {
                    fseek($h, $taille + ($taille % 2), SEEK_CUR);
                }
            }

            return null;
        } finally {
            fclose($h);
        }
    }
}