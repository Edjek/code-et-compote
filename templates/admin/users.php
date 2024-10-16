<section>
    <h1 class="display-5">Dashboard Utilisateur</h1>
    <div class="w-75 mx-auto my-5">
        <a href="/code-et-compote/admin/utilisateurs/ajouter" class="btn btn-success">Ajouter un utilisateur</a>
        <table class="table table-hover w-75 mx-auto my-5">
            <?php
            foreach ($users as $user) { ?>
                <tr>
                    <td>
                        <?= $user['id']; ?>
                    </td>
                    <td>
                        <?= $user['username']; ?>
                    </td>
                    <td>
                        <?= $user['email']; ?>
                    </td>
                    <td>
                        <a href="/code-et-compote/admin/utilisateurs/modifier/<?= $user['id']; ?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <a href="/code-et-compote/admin/utilisateurs/supprimer/<?= $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>