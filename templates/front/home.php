<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code et Compote - Accueil</title>
    <meta name="description" content="Rejoignez Code et Compote, le forum des développeurs en herbe ! Partagez vos connaissances, posez des questions et collaborez sur des projets. Développez vos compétences en programmation avec notre communauté passionnée." />
</head>

<body>
    <header></header>
    <main>
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
    </main>
    <footer></footer>
</body>

</html>