<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Forest - Les sons</title>

    <!-- Script -->
     @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
</head>
<body>
    <h1>
        Les sons
    </h1>
    <?php $script=""; $id=1; ?>
    <ul>
            @foreach ($sons as $son)
            <div id="wavesurfer{{ $id }}" class="wavesurfer">son</div>
            <?php $id++; ?>
            @endforeach
    </ul>
    <script>
        <script>
            const wavesurfer1 = WaveSurfer.create({
                container: '#wavesurfer',
                waveColor: '#ff0000ff',
                progressColor: '#850000ff',
                height: 100,
                url: '/storage/sons/mixkit-creepy-tomb-ambience-2500.wav',
            });
        </script>

</body>
</html>wq   