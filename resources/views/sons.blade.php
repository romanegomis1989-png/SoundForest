<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Lecteurs audio</title>
    @vite(['resources/css/app.css', 'resources/js/waveform.js'])
    <style>
        .waveform { margin-bottom: 2rem; }
        .waveform-controls { display: flex; gap: 1rem; align-items: center; margin-top: .5rem; }
    </style>
</head>
<body>
    <h1>Sons</h1>

    @forelse ($sons as $son)
        <div class="waveform" data-url="{{ $son['urlComplete'] }}">
            <strong>{{ $son['nom'] }}</strong>
            <p>{{ $son['url'] }}</p>
            <div class="waveform-canvas"></div>
            <div class="waveform-controls">
                <button type="button" class="waveform-play">Lecture</button>
                <span class="waveform-time">Chargement…</span>
            </div>
        </div>
    @empty
        <p>Aucun fichier la table des sons.</p>
    @endforelse
</body>
</html>