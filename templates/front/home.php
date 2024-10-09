<section>
    <h1 class="display-3">Accueil</h1>
    <div class=" w-75 mx-auto my-5 p-3 border rounded">
        <table class="table table-striped">
            <tbody>
                <?php foreach ($topics as $topic) { ?>
                    <tr>
                        <td><?= htmlspecialchars($topic['title']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>