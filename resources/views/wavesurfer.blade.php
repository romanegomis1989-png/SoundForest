<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <title>Test WaveSurfer</title>
</head>
<body>

    <div id="waveform1" style="width: 25%; height: 100px; margin: 10px; border: 1px solid #000;"></div>
    <div id="waveform2" style="width: 25%; height: 100px; margin: 10px; border: 1px solid #000;"></div>
    <div id="waveform3" style="width: 25%; height: 100px; margin: 10px; border: 1px solid #000;"></div>

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

        const wavesurfer2 = WaveSurfer.create({
            container: '#waveform2',
            waveColor: '#00ff00ff',
            progressColor: '#008500ff',
            height: 100,
            url: '/storage/sons/mixkit-creepy-tomb-ambience-2500.wav',
        });
        wavesurfer2.on('click', () => {
            wavesurfer2.play()
        })

        const wavesurfer3 = WaveSurfer.create({
            container: '#waveform3',
            waveColor: '#0000ffff',
            progressColor: '#000085ff',
            height: 100,
            url: '/storage/sons/mixkit-creepy-tomb-ambience-2500.wav',
        });
        wavesurfer3.on('click', () => {
            wavesurfer3.play()
        })

        // wavesurfer.on('click', function() {wavesurfer.play();})
    </script>
</body>
</html>
