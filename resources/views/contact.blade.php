<x-guest-layout>
    <section class="sf-wrap" style="min-height:auto;padding:5vh 0 2vh">
        <h1 class="sf-h1">Contact</h1>
        <form method="post">
            <div style="display:flex">
                <label style="width:100px;" for="nom">nom:</label>
                <input type="text" name="nom" id="nom">
            </div>
            <div style="display:flex">
                <label style="width:100px;" for="prenom">prénom:</label>
                <input type="text" name="prenom" id="prenom">
            </div>
            <div style="display:flex">
                <label style="width:100px;" for="email">e-mail:</label>
                <input type="text" name="email" id="email">
            </div>
            <div style="display:flex">
                <label style="width:100px;" for="message">message:</label>
                <textarea name="message" id="message"></textarea>
            </div>
            <div style="display:flex">
                <label style="width:100px;"></label>
                <button type="submit" name="envoyer" id="envoyer">Envoyer</button>
            </div>
        </form>

    </section>
</x-guest-layout>
