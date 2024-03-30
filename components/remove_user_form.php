<?php require "header.php"; ?>

<nav class="navigation_barre">
    <a href="../index.php"><h2>Home.</h2></a>
</nav>

<?php
include "server_connect.php";
include "../objetcs/exceptions/InvalidUserNomException.php";
include "../objetcs/exceptions/InvalidUserPrenomException.php";
include "../objetcs/exceptions/InvalidUserEmailException.php";
include "../objetcs/exceptions/InexistantUserException.php";

if($_SERVER["REQUEST_METHOD"] == "POST") try {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    // On récupère les données de l'utilisateur
    if(empty($nom))
        throw new InvalidUserNomException("Le nom d'un utilisateur ne peut être vide !");
    if(empty($prenom))
        throw new InvalidUserPrenomException("Le nom d'un utilisateur ne peut être vide !");
    if(empty($email))
        throw new InvalidUserEmailException("L'email d'un utilisateur ne peut être vide !");

    echo "<script> console.log(\"Informations récupérées !\")</script>";

    global $bdd;
    // On prépare la recherche MySQL
    $query = $bdd->prepare("SELECT * FROM USER WHERE prenom = :prenom AND email = :email");
    $query->execute([
        "prenom" => $prenom,
        "email" => $email
    ]);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<script> console.log(\"Requête récupérée !\")</script>";

    // On vérifie que la requête est non-nulle
    if(empty($results))
        throw new InexistantUserException("Il n'existe pas d'utilisateur correspondant à : $nom $prenom, $email");
    else {
        // ON envoie l'utilisateur
        session_start();
        $_SESSION['user'] = ["nom" => $nom, "prenom" => $prenom, "email" => $email, 'password' => $results[0]['motdepasse']];
        // On redirige la page
        header("Location: confirm_remove_user_form.php");
        exit;
    }

// On récupère les éventuelles erreurs
} catch(InvalidUserNomException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
} catch(InvalidUserPrenomException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
} catch(InvalidUserEmailException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
}catch(InexistantUserException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
} catch(PDOException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
}
?>

<form method="post" class="user_form" id="remove_user_form">
    <h1>Supprimer un utilisateur</h1>
    <section>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" autocomplete="name">
    </section>
    <section>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" autocomplete="given-name">
    </section>
    <br>
    <section>
        <label for="email">Adresse mail :</label>
        <input type="email" id="email" name="email" autocomplete="email">
    </section>
    <button type="submit" class="submit_button" value="remove_user">Rechercher</button>
</form>

<?php require_once "footer.php"; ?>