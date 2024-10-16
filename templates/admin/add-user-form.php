<section>
    <a href="/code-et-compote/admin/utilisateurs" class="btn btn-warning my-3">retour à la gestion des utilisateurs</a>

    <h1 class="display-5">Ajouter un utilisateur</h1>

    <div class="w-75 mx-auto my-5">
        <form action="/code-et-compote/admin/utilisateurs/process-add-user-form" method="POST">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pswd" class="form-label">Mot de passe</label>
                <input type="password" id="pswd" name="pswd" class="form-control">
            </div>
            <div class="mb-3">
                <fieldset>
                    <legend>Status</legend>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="admin" name="status" value="admin">
                        <label for="admin" class="form-check-label">administrateur</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="moderator" name="status" value="moderator">
                        <label for="moderator" class="form-check-label">moderateur</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="user" name="status" value="member" checked>
                        <label for="user" class="form-check-label">utilisateur</label>
                    </div>
                </fieldset>
            </div>
            <input type="submit" value="Créer" class="btn btn-primary">
        </form>
</section>
</div>