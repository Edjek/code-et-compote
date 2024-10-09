<section>
    <h1 class="display-3">Accueil</h1>
    <table class="table table-striped w-75 mx-auto my-5">
        <?php foreach ($topics as $topic) { ?>
            <tr>
                <td><?= htmlspecialchars($topic['title']); ?></td>
            </tr>
        <?php } ?>
    </table>
</section>