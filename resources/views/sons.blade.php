<x-guest-layout>
    
    <style>
        .waveform { margin-bottom: 2rem; }
        .waveform-controls { display: flex; gap: 1rem; align-items: center; margin-top: .5rem; }
    </style>


    <section class="sf-wrap" style="min-height:auto;padding:5vh 0 2vh">

        <p class="note-technique">view : sons.blade.php</p>

        <h2 class="sf-h2">Sons</h2>

        <div class="grid">
            @forelse ($sons as $son)
                <x-son-card :son="$son" />
            @empty
                <p>Aucun fichier dans la table des sons.</p>
            @endforelse
        </div>
    </section>
</x-guest-layout>