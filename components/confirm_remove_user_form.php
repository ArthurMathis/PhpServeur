<?php require "header.php"; ?>

<nav class="navigation_barre">
    <a href="../index.php"><h2>Home.</h2></a>
</nav>

<?php
include "server_connect.php";
include "../objetcs/exceptions/InexistantUserException.php";
include "../objects/exceptions/InvalidUserMotdepasseException.php";

try{
    // On récupère la requête
    session_start();
    $user= $_SESSION['user'];
    if(empty($user))
        throw new InexistantUserException("Réception de la requête échouée.");

    if($_SERVER["REQUEST_METHOD"] == "POST") try {
        $password = $_POST["password"];

    if($password != $user['password'])
        throw new InvalidUserMotdepasseException("Le mot de passe saisi est incorrect !");

    } catch(InvalidUserMotdepasseException $e){
        echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
    }

} catch(InexistantUserException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
}
?>

<form method="post" class="user_form" id="confirm_remove_user_form">
    <h1>Supprimer <?php echo $user['nom'] . " " . $user['prenom'];  ?></h1>
    <section>
        <label for="password">Mot de passe :</label>
        <input type="text" id="password" name="password">
    </section>
    <button type="submit" class="submit_button" value="confirm_remove_user">Confirmer</button>
</form>

<?php require_once "footer.php"; ?>