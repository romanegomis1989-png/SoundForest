@props(['son'])

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
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffd500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-star">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path fill="none" d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873l-6.158 -3.245" />
        </svg>
    </div>
</article>
