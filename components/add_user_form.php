<?php
require "header.php";
include "../objetcs/User.php";

if($_SERVER["REQUEST_METHOD"] == "POST") try{
    // On récupère les mots de passe
    $password = $_POST["password"];
    $password_confirmation = $_POST["password_confirmation"];
    // On vérifie qu'ils sont identiques
    if($password != $password_confirmation)
        // On signale l'erreur
        throw new InvalidUserMotdepasseException("Le mot de passe et sa confirmation doivent être identiques !");
    // On génère un utilisateur
    else $new_user = new User($_POST["nom"], $_POST["prenom"], $_POST["email"], $password);

    // On génère une nouvelle notification
    echo "<script> 
            const notif = new notification(\"Nouvel utilisateur ajouté !\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";

// On récuèpre les éventuelles erreurs
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
} catch(InvalidUserMotdepasseException $e){
    echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
}
?>

<form method="post" class="user_form">
    <h1>Nouvel utilisateur</h1>
    <section>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </section>
    <section>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
    </section>
    <br>
    <section>
        <label for="email">Adresse mail :</label>
        <input type="email" id="email" name="email">
    </section>
    <br>
    <section>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password">
    </section>
    <section>
        <label for="password_confirmation">Confirmer le mot de passe :</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </section>
    <button type="submit" class="submit_button" value="new_user">Valider</button>
</form>

<?php require_once "footer.php"; ?>