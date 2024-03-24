<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1 td 3</title>

    <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link rel="stylesheet" href="stylesheets/main.css">

    <script src="scripts/notifications.js"></script>
</head>
<body>
<nav class="navigation_barre">
    <a href="components/add_user_form.php">Ajouter un nouvel utilisateur</a>
    <a href="components/remove_user_form.php">Rechercher un utilisateur</a>
</nav>
<content>
    <h1>Bienvenu sur votre site internet</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aspernatur deleniti eveniet debitis veniam tempora accusantium cumque consectetur soluta odit officiis nemo, distinctio eaque iure vero natus ipsam fuga rem.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aspernatur deleniti eveniet debitis veniam tempora accusantium cumque consectetur soluta odit officiis nemo, distinctio eaque iure vero natus ipsam fuga rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aspernatur deleniti eveniet debitis veniam tempora accusantium cumque consectetur soluta odit officiis nemo, distinctio eaque iure vero natus ipsam fuga rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aspernatur deleniti eveniet debitis veniam tempora accusantium cumque consectetur soluta odit officiis nemo, distinctio eaque iure vero natus ipsam fuga rem.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aspernatur deleniti eveniet debitis veniam tempora accusantium cumque consectetur soluta odit officiis nemo, distinctio eaque iure vero natus ipsam fuga rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit aspernatur deleniti eveniet debitis veniam tempora accusantium cumque consectetur soluta odit officiis nemo, distinctio eaque iure vero natus ipsam fuga rem. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
</content>

<!-- Connexion à la base de données-->
<?php require_once "components/server_connect.php"; ?>

<!-- Pied de page -->
<?php include "components/footer.php";  ?>