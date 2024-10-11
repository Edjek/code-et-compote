<form action="">
    <div class="mb-3">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?= $user['username']; ?>">
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <lab class="mb-3" el for="pswd">Mot de passe</lab>
        <input type="password" id="pswd" name="pswd" class="form-control">
    </div>
    <input type="submit" value="Modifier" class="btn btn-primary">
</form>