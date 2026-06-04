<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page son</title>
</head>
<body>
    <h1>Son</h1>

    <audio id="monAudio">
        <source src="storage/sons/mixkit-creepy-tomb-ambience-2500.wav" type="audio/mpeg">
    </audio>

    <button id="btnPlay" onclick="play()">▶ Play</button>
    <button id="btnPause" onclick="pause()">⏸ Pause</button>
    <button id="btnStop" onclick="stop()">⏹ Stop</button>

        <script>
            let playing = false;

            function play() {
                playing = !playing
                if (playing) {
                    document.getElementById('monAudio').play()
                    document.getElementById('btnPlay').innerText="⏹ Stop"
                }
                else {
                    stop();
                    document.getElementById('btnPlay').innerText="▶ Play"
                }

            }
            function pause() {
                document.getElementById('monAudio').pause()

            }
            function stop() {
                document.getElementById('monAudio').pause();
                
            }
        </script>
 
</body>
</html>
