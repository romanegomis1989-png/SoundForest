<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Son extends Model
{

    protected function urlComplete(): Attribute
    {
        return Attribute::get(fn () => asset('storage/Sons/' . $this->url));
    }

    protected function createdAtFormatted(): Attribute
    {
        return Attribute::get(fn () => $this->created_at?->format('d/m/Y H:i'));
    }

    protected function dureeFormatted(): Attribute
    {
        return Attribute::get(fn () => $this->secondesVersHeuresMinutes($this->duree));
    }
    
    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function ambiance()
    {
        return $this->belongsTo(Ambiance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

    function secondesVersHeuresMinutes(?int $secondes): string
    {
        if ($secondes === null) {
            return '00:00';
        }

        $signe = $secondes < 0 ? '-' : '';
        $secondes = abs($secondes);

        $heures  = intdiv($secondes, 3600);
        $minutes = intdiv($secondes % 3600, 60);

        return sprintf('%s%02d:%02d', $signe, $heures, $minutes);
    }

}