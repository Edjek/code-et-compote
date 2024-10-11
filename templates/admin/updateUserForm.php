<!-- quand on va appuyer sur envoyer on va avoir une nouvelle route -->
<!-- /admin/users/processUpdateUserForm -->
    <!-- AdminUserController -->
        <!-- Le formulaire doit envoyer en plus des données du formulaire, l'id de l'utilisateur -->
        <!-- processUpdateUserForm()  -->
            <!-- On verifie si il est admin -->
            <!-- dans le repository on met a jour updateUserById($id) -->
<form action="/" method="POST">
    <div class="mb-3">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?= $user['username']; ?>">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= $user['email']; ?>">
    </div>
    <div class="mb-3">
        <lab class="mb-3" el for="pswd">Mot de passe</lab>
        <input type="text" id="pswd" name="pswd" class="form-control" value="<?= $user['password']; ?>">
    </div>
    <input type="submit" value="Modifier" class="btn btn-primary">
</form>