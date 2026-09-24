import WaveSurfer from 'wavesurfer.js';

function formatTime(seconds) {
    const m = Math.floor(seconds / 60);
    const s = Math.floor(seconds % 60);
    return `${m}:${s.toString().padStart(2, '0')}`;
}

function initPlayer(root) {
    const container = root.querySelector('.waveform-canvas');
    const btn = root.querySelector('.waveform-play');
    const timeEl = root.querySelector('.waveform-time');

    const ws = WaveSurfer.create({
        container: container,
        url: root.dataset.url,
        height: 80,
        waveColor: '#9ca3af',
        progressColor: '#2563eb',
        cursorColor: '#1e3a8a',
        barWidth: 2,
        barGap: 1,
        barRadius: 2,
        normalize: true,
    });

    btn.disabled = true;

    ws.on('ready', (duration) => {
        btn.disabled = false;
        timeEl.textContent = `0:00 / ${formatTime(duration)}`;
    });

    ws.on('timeupdate', (current) => {
        timeEl.textContent = `${formatTime(current)} / ${formatTime(ws.getDuration())}`;
    });

    ws.on('play', () => { btn.textContent = 'Pause'; });
    ws.on('pause', () => { btn.textContent = 'Lecture'; });
    ws.on('finish', () => { btn.textContent = 'Lecture'; });

    ws.on('error', (err) => {
        timeEl.textContent = 'Erreur de chargement';
        console.error(err);
    });

    btn.addEventListener('click', () => ws.playPause());

    root._wavesurfer = ws;
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.waveform').forEach(initPlayer);
});