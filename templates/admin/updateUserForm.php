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
        <input type="radio" name="status" value="admin" <?php if ($user['status'] === 'admin') {
                                                            echo 'checked';
                                                        } ?>>
        <label for="">administrateur</label>
        <input type="radio" name="status" value="moderator" <?php if ($user['status'] === 'moderator') {
                                                                echo 'checked';
                                                            } ?>>
        <label for="">moderateur</label>
        <input type="radio" name="status" value="member" <?php if ($user['status'] === 'member') {
                                                                echo 'checked';
                                                            } ?>>
        <label for="">utilisateur</label>
    </div>
    <input type="submit" value="Modifier" class="btn btn-primary">
</form>