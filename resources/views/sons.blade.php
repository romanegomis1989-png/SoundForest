<x-guest-layout>
    
    <style>
        .waveform { margin-bottom: 2rem; }
        .waveform-controls { display: flex; gap: 1rem; align-items: center; margin-top: .5rem; }
    </style>


        <section class="sf-wrap" style="min-height:auto;padding:5vh 0 2vh"
        x-data="{
            style: '',
            ambiance: '',
            sons: @js($sons->map(fn ($s) => [$s->style_id, $s->ambiance_id])),
            match(s, a) {
                return (!this.style || s == this.style) && (!this.ambiance || a == this.ambiance);
            },
            get nb() {
                return this.sons.filter(([s, a]) => this.match(s, a)).length;
            }
        }">

        <p class="note-technique">view : sons.blade.php</p>

        <h2 class="sf-h2">Sons</h2>

        <div class="sf-filters">
            <div class="sf-filter-box">
                <label for="style">Style</label>
                <select id="style" x-model="style">
                    <option value="">Tous</option>
                    @foreach ($styles as $style)
                        <option value="{{ $style->id }}">{{ $style->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sf-filter-box">
                <label for="ambiance">Ambiance</label>
                <select id="ambiance" x-model="ambiance">
                    <option value="">Toutes</option>
                    @foreach ($ambiances as $ambiance)
                        <option value="{{ $ambiance->id }}">{{ $ambiance->nom }}</option>
                    @endforeach
                </select>
            </div>
            <p x-show="nb === 0 && (style || ambiance)" x-cloak>Aucun son ne correspond à ces filtres.</p>

            <button type="button" class="sf-filter-reset" x-show="style || ambiance" x-cloak
                @click="style = ''; ambiance = ''"><span aria-hidden="true">✕</span> Réinitialiser</button>
        </div>

        <div class="grid">
            @forelse ($sons as $son)
                <div x-show="match({{ $son->style_id ?? 'null' }}, {{ $son->ambiance_id ?? 'null' }})">
                    <x-son-card :son="$son" />
                </div>
            @empty
                <p>Aucun fichier dans la table des sons.</p>
            @endforelse
        </div>
    </section>
</x-guest-layout>