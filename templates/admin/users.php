<table class="table">
    <?php
    foreach ($users as $user) { ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['username']; ?></td>
            <td><?= $user['email']; ?></td>

            <!-- creer une route qui fonctionne -->
                <!-- AdminUserController -->
                    <!-- showUpdateUserForm() passer les parametres -->
            <td><a href="/code-et-compote/admin/users/modifier/<?= $user['id']; ?>">Modifier</a></td>
            <td><a href="">supprimer</a></td>
        </tr>
    <?php } ?>

</table>