<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header></header>
    <main>
        <h1>Accueil</h1>
        <table>
            <?php foreach ($topics as $topic) { ?>
                <tr>
                    <td><?= htmlspecialchars($topic['title']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <footer></footer>
</body>

</html>