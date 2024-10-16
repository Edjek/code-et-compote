<section>
    <a href="/code-et-compote/admin/utilisateurs" class="btn btn-warning my-3">retour à la gestion des utilisateurs</a>

    <h1 class="display-5">Modifier un utilisateur</h1>

    <div class="w-75 mx-auto my-5">
        <form action="/code-et-compote/admin/utilisateurs/process-update-user-form" method="POST" class="w-75 mx-auto my-5">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?= $user['username']; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= $user['email']; ?>">
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="radio" name="status" value="admin" <?php if ($user['status'] === 'admin') {
                                                                                                echo 'checked';
                                                                                            } ?>>
                <label for="">administrateur</label>
                <input class="form-check-input" type="radio" name="status" value="moderator" <?php if ($user['status'] === 'moderator') {
                                                                                                    echo 'checked';
                                                                                                } ?>>
                <label for="">moderateur</label>
                <input class="form-check-input" type="radio" name="status" value="member" <?php if ($user['status'] === 'member') {
                                                                                                echo 'checked';
                                                                                            } ?>>
                <label for="">utilisateur</label>
            </div>
            <input type="hidden" value="<?= $user['id']; ?>" name="id">
            <input type="submit" value="Modifier" class="btn btn-primary">
        </form>
    </div>
</section>