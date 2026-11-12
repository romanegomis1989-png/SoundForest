@props(['son', 'contexte' => 'liste'])

<article class="card js-card">
    <div class="card-top">
        <span class="badge badge-style">{{ $son['style']->nom }}</span><span class="dur">{{ $son['duree-formatted'] }}</span>
    </div>
    <h3 class="card-title">{{ $son['nom'] }}</h3>
    <p class="card-desc">{{ $son['description'] }}</p>
    
    <div class="waveform" data-url="{{ $son['url_complete'] }}">
                        
        {{-- Image du wave  --}}
        <div class="waveform-canvas"></div>
        

        {{-- Boutons de lecture --}}
        <div class="waveform-controls">
            <button type="button" class="waveform-play">Lecture</button>
            <span class="waveform-time">Chargement…</span>
        </div>
        @auth
        <a href="{{ $son['url_complete'] }}" class="card-url" download="{{ $son['url'] }}">{{ $son['url'] }}<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24px" width="24px" fill="#e3e3e3"><path d="M12,16L7,11L8.4,9.55l2.6,2.6V4h2v8.15l2.6-2.6L17,11l-5,5ZM6,20q-0.82,0-1.41-0.59T4,18V15H6v3H18V15h2v3q0,0.82-0.59,1.41T18,20H6Z"/></svg></a>
        @endauth 
    </div>

    <div class="card-foot">
        <span class="badge badge-amb">{{ $son['ambiance']->nom }}</span>
        @auth
            <a href="#" data-url="{{ route('favoris.toggle', ['son' => $son['id']]) }}" data-contexte="{{ $contexte }}" onclick="click_favori(event, this);">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffd500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path class="star-fill" fill="{{ $son->favori ? '#ffd500' : 'none' }}" d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873l-6.158 -3.245" />
                </svg>
            </a>
        @endauth
    </div>
</article>

@once
    @push('scripts')
        <script>
            function click_favori(e, lien) { 
                e.preventDefault(); 

                fetch(lien.dataset.url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (lien.dataset.contexte=='favoris' && !data.favori) {
                        lien.closest('.js-card').remove();
                    }
                    else {
                        const etoile = lien.querySelector('.star-fill');
                        etoile.setAttribute('fill', data.favori ? '#ffd500' : 'none');
                    }
                });
            }
        </script>
    @endpush
@endonce