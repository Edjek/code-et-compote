<section>
    <h1>Accueil</h1>
    <table>
        <?php foreach ($topics as $topic) { ?>
            <tr>
                <td><?= htmlspecialchars($topic['title']); ?></td>
            </tr>
        <?php } ?>
    </table>
</section>