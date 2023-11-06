<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Gestion Contacts</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion Contacts</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if (isset($_SESSION['id'])) { ?>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vue/listeContacts.php"><b>Contacts</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vue/listefav.php"><b>Favoris</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="/vue/ajouterContact.php" class="btn btn-secondary m-1 my-sm-0" type="submit">Ajouter un contact</a>
                        <a href="/controller/deconnecter.php" class="btn btn-danger m-1 my-sm-0" type="submit">Se Deconnecter</a>
                    <?php  } ?>
                    </form>
                </div>
        </div>
    </nav>