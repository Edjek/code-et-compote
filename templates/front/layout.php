<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code et Compote - Accueil</title>
    <meta name="description" content="Rejoignez Code et Compote, le forum des développeurs en herbe ! Partagez vos connaissances, posez des questions et collaborez sur des projets. Développez vos compétences en programmation avec notre communauté passionnée." />

    <!-- CDN - Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CDN - Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN - JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>

<body>
    <header class="navbar d-flex align-items-center px-3 py-2 bg-primary">
        <a class="navbar-brand" href="/code-et-compote/" class=""><i class="bi bi-code-slash"></i> Code et Compote</a>

        <nav class=" ms-auto d-flex gap-2">
            <a class="nav-link" href="/code-et-compote/inscription">inscription</a>
            <a class="nav-link" href="">connexion</a>
            <a class="nav-link" href="/code-et-compote/contactez-nous">contact</a>
        </nav>
    </header>
    <main>

        <?= $content; ?>
    </main>
    <footer></footer>

</body>

</html>