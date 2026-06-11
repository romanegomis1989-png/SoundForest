<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <title>Test WaveSurfer</title>
</head>
<body>

    <div id="waveform1" ></div>


    <script>
        // Crée un objet wavesurfer à l'aide la librairie WaveSurfer.js
        // Avec quelques paramètres
        const wavesurfer1 = WaveSurfer.create({
            container: '#waveform1',
            waveColor: '#ff0000ff',
            progressColor: '#850000ff',
            height: 100,
            url: '/storage/sons/mixkit-creepy-tomb-ambience-2500.wav',
        });
        wavesurfer1.on('click', () => {
            wavesurfer1.play()
            const wsf = document.querySelector('wavesurfer');
        })
        // wavesurfer.on('click', function() {wavesurfer.play();})
    </script>
</body>
</html>
