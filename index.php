<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Serveur</title>

    <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheets/styles.css">

    <script src="scripts/notifications.js"></script>
</head>
<body>
<nav class="navigation_barre">
    <h2>Welcome.</h2>
</nav>
<div class="accueil">
    <h1>Bienvenu sur votre site internet</h1>
    <a href="components/add_user_form.php">Ajouter un nouvel utilisateur</a>
    <a href="components/remove_user_form.php">Rechercher un utilisateur</a>
</div>

<!-- Connexion à la base de données-->
<?php require_once "components/server_connect.php"; ?>

<!-- Pied de page -->
<?php include "components/footer.php";  ?>