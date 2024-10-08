<section>
    <h1>Formulaire d'inscription</h1>
    <form action="/code-et-compote/processForm" method="POST" class="w-75 m-auto">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input class="form-control" type="text" id="pseudo" name="pseudo" >
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Mot de passe</label>
            <input type="password" id="password" name="pswd" class="form-control" >
        </div>
        <input type="submit" value="Inscription" class="btn btn-primary">
    </form>
</section>