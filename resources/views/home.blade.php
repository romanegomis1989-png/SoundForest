<x-guest-layout>
    <canvas id="fireflies"></canvas>
    <section class="hero sf-wrap" style="min-height:auto;padding:5vh 0 2vh">
        <p class="note-technique">view : home.blade.php</p>
        <div class="hero-grid">
            <!-- Gauche -->
            <div>
                <!-- <p class="eyebrow">Maquette autonome - Aperçu simple</p> -->
                <h1 class="sf-h1">Plongez dans une<br>forêt qui <em>résonne</em>.</h1>
                <!-- <p class="lead">6 des sons sont embarqués ici : tout fonctionne hors-ligne et sans installation.</p> -->
                <div class="hero-stats">
                    <div class="stat">
                        <div class="n">{{ $nbSons }}</div>
                        <div class="l">sons sauvages</div>
                    </div>
                    <div class="stat">
                        <div class="n">{{ $nbStyles }}</div>
                        <div class="l">styles</div>
                    </div>
                    <div class="stat">
                        <div class="n">{{ $nbAmbiances }}</div>
                        <div class="l">ambiances</div>
                    </div>
                </div>
            </div>
            <!-- Droite -->
            <div class="blades" aria-hidden="true"></div>
        </div>
    </section>

    {{-- Nouveautés --}}
    <section class="nouveautes sf-wrap" style="min-height:auto;padding:5vh 0 2vh">
        <h2 class="sf-h2">Nouveautés</h2>
        <div class="grid">
          @forelse ($nouveautes as $son)
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

    {{-- Populaires --}}
    <section class="populaires sf-wrap" style="min-height:auto;padding:5vh 0 2vh">
        <h2 class="sf-h2">Les plus populaires</h2>
        <div class="grid">
          @forelse ($populaires as $son)
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

    <script>

        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function initFireflies() {
            const canvas = document.getElementById('fireflies');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let w, h, flies = [];
            const COLORS = ['124,248,176', '255,197,107', '200,162,255'];
            const COUNT = reduceMotion ? 14 : 46;

            function resize() {
                w = canvas.width = window.innerWidth;
                h = canvas.height = window.innerHeight;
            }
            function spawn() {
                flies = Array.from({ length: COUNT }, () => ({
                    x: Math.random() * w,
                    y: Math.random() * h,
                    r: Math.random() * 1.8 + 0.6,
                    c: COLORS[Math.floor(Math.random() * COLORS.length)],
                    vx: (Math.random() - 0.5) * 0.18,
                    vy: (Math.random() - 0.5) * 0.18,
                    ph: Math.random() * Math.PI * 2,
                    sp: Math.random() * 0.015 + 0.005,
                }));
            }
            function frame() {
                ctx.clearRect(0, 0, w, h);
                for (const f of flies) {
                    f.x += f.vx; f.y += f.vy; f.ph += f.sp;
                    if (f.x < -10) f.x = w + 10; if (f.x > w + 10) f.x = -10;
                    if (f.y < -10) f.y = h + 10; if (f.y > h + 10) f.y = -10;
                    const a = 0.35 + Math.sin(f.ph) * 0.35;
                    const g = ctx.createRadialGradient(f.x, f.y, 0, f.x, f.y, f.r * 7);
                    g.addColorStop(0, `rgba(${f.c},${a})`);
                    g.addColorStop(1, `rgba(${f.c},0)`);
                    ctx.fillStyle = g;
                    ctx.beginPath();
                    ctx.arc(f.x, f.y, f.r * 7, 0, Math.PI * 2);
                    ctx.fill();
                }
                if (!reduceMotion) requestAnimationFrame(frame);
            }
            resize(); spawn();
            window.addEventListener('resize', () => { resize(); spawn(); });
            frame();
        }

        function initBlades() {
            const root = document.querySelector('.blades');
            if (!root) return;
            const N = 30;
            for (let i = 0; i < N; i++) {
                const b = document.createElement('span');
                b.className = 'blade';
                const t = i / (N - 1);
                const center = 1 - Math.abs(t - 0.5) * 2;          // taller in the middle
                const h = 28 + center * 55 + Math.random() * 14;
                b.style.setProperty('--h', h + '%');
                b.style.setProperty('--d', (1.6 + Math.random() * 2.2).toFixed(2) + 's');
                b.style.animationDelay = (-Math.random() * 3).toFixed(2) + 's';
                root.appendChild(b);
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            // Démarre les lucioles
            initFireflies();
            // Démarre l'animation blades
            initBlades();
            // Démarre le player
            //initPlayer();
        });
    </script>

</x-guest-layout>