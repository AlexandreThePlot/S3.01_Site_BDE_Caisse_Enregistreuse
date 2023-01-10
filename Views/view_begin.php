<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name = "author" content="JoePorthos">
    <meta name="description" content="Stand de confiseries du BDE">
    <meta name="keywords" content="bde, stand, confiseries, snack, boissons, iut, villetaneuse, iutv, université, paris, paris13, sorbonne, paris nord">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stand de confiseries du BDE</title>
    <link rel="stylesheet" href="Content/css/principal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

     <!-- Entête de la page d'accueil-->
     <header class="accueil_header">
        <nav class="accueil_nav">
            <a href="?controller=home&action=home"><img class="logo_bde" src="Content/img/logo_bde.png" alt="logo-bde" width="70" height="70"></a>
            <ul>
                <li><a href="?controller=list&action=snacks" title="Snacks">Snacks</a></li>
                <li><a href="?controller=list&action=boissons" title="Boissons">Boissons</a></li>
                <li><a href="?controller=auth&action=form_login" title="Mon Espace">Mon Espace</a></li>
                <li><a href="?controller=auth&action=form_login" title="Se connecter / S'inscrire">Se connecter / S'inscrire</a></li>

                <!--Menu deroulant pour changer la langue du site-->
                <li class="li_changer_langue">
                <div class="js">
                    <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle">
                    <form action="" class="language-picker__form">
                        <label for="language-picker-select">Selectionnez votre langue</label>
                        <select name="language-picker-select" id="language-picker-select">
                            <option lang="fr" value="francais"selected>Français</option>
                            <option lang="en" value="english">English</option>
                        </select>
                    </form>
                    </div>
                </div>
                </li>
            </ul>
        </nav>
    </header>
    <!--Fin de l'entête de la page-->

    <!--Corps de la page-->
    <main>

    <!-- Script JS pour sélection langue déplacé dans Utils/langue.js-->
    <?php echo '<script src="Utils/langue.js"></script>'; ?>