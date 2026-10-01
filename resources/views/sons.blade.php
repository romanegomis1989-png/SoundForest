<x-guest-layout>
    
    <style>
        .waveform { margin-bottom: 2rem; }
        .waveform-controls { display: flex; gap: 1rem; align-items: center; margin-top: .5rem; }
    </style>


    <section class="sf-wrap" style="min-height:auto;padding:5vh 0 2vh">
        <h2 class="sf-h2">Nouveautés</h2>

        <div class="grid">
            @forelse ($sons as $son)
                <article class="card js-card">
                    <div class="card-top">
                        <span class="badge badge-style">{{ $son['style']->nom }}</span><span class="dur">{{ $son['duree-formatted'] }}</span>
                    </div>
                    <h3 class="card-title">{{ $son['nom'] }}</h3>
                    <p class="card-desc">{{ $son['description'] }}</p>
                    <div class="waveform" data-url="{{ $son['url_complete'] }}">
                    
                        {{-- <strong>{{ $son['nom'] }} ({{ $son['created_at_formatted'] }})</strong>
                        <p>{{ $son['url'] }}</p>
                        <p>{{ $son['user']->name }}</p> --}}
                                        
                        {{-- Image du wave  --}}
                        <div class="waveform-canvas"></div>
                        
                        {{-- Boutons de lecture --}}
                        <div class="waveform-controls">
                            <button type="button" class="waveform-play">Lecture</button>
                            <span class="waveform-time">Chargement…</span>
                        </div>
                    </div>
                    <div class="card-foot">
                        <span class="badge badge-amb">{{ $son['ambiance']->nom }}</span>
                    </div>
                </article>
            @empty
                <p>Aucun fichier la table des sons.</p>
            @endforelse
        </div>
    </section>
</x-guest-layout>