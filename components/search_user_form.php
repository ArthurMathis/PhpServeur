<?php require "header.php"; ?>

<nav class="navigation_barre">
    <a href="../index.php"><h2>Home.</h2></a>
</nav>

<?php include "server_connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];

    // On récupère l'accès à la base de données
    global $bdd;

    try{
        // On génère une requête MySQL selon les informations données dans le formulaire
        if(empty($nom)){
            if(empty($prenom)){
                if(empty($email)){
                    $query = $bdd->prepare("SELECT * FROM USER");
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $query = $bdd->prepare("SELECT * FROM USER WHERE email = :email");
                    $query->execute([
                            "email" => $email
                    ]);
                    $results = $query->fetchAll(PDO::FETCH_ASSOC);
                }
            } elseif(empty($email)){
                $query = $bdd->prepare("SELECT * FROM USER WHERE prenom = :prenom");
                $query->execute([
                    "prenom" => $prenom
                ]);
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $query = $bdd->prepare("SELECT * FROM USER WHERE prenom = :prenom AND email = :email");
                $query->execute([
                    "prenom" => $prenom,
                    "email" => $email
                ]);
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } elseif(empty($prenom)){
            if(empty($email)){
                $query = $bdd->prepare("SELECT * FROM USER WHERE nom = :nom");
                $query->execute([
                    "nom" => $nom
                ]);
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $query = $bdd->prepare("SELECT * FROM USER WHERE nom = :nom AND email = :email");
                $query->execute([
                    "nom" => $nom,
                    "email" => $email
                ]);
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
            }
        } elseif(empty($email)){
            $query = $bdd->prepare("SELECT * FROM USER WHERE nom = :nom AND prenom = :prenom");
            $query->execute([
                "nom" => $nom,
                "prenom" => $prenom
            ]);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $query = $bdd->prepare("SELECT * FROM USER WHERE nom = :nom AND prenom = :prenom AND email = :email");
            $query->execute([
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email
            ]);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        // On récupère les éventuelles erreurs
    } catch(PDOException $e){
        // On génère une nouvelle notification
        echo "<script>
            const notif = new notification(\"".$e->getMessage()."\").affiche();
            document.body.appendChild(notif);
            setTimeout(function() {
                notif.remove();
            }, 3000);
        </script>";
    }
}
?>

<form method="post" class="user_form" id="search_user_form">
    <h1>Recherche d'un utilisateur</h1>
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
    <button type="submit" class="submit_button" value="search_user">Rechercher</button>
</form>

<script src="../scripts/User.js"></script>
<script src="../scripts/user_table.js"></script>
<!-- Script JavaScript -->
<script>
    // Vérification de la présence des résultats
    <?php if(isset($results) && !empty($results)): ?>
        // Conversion des résultats en objet JavaScript
        const query = <?php echo json_encode($results); ?>;

        // Vérification que la requête a retourné des résultats
        if(query !== null){
            query.forEach(function (c) {
                console.log("Résultat de la requête : " + c.nom + " " + c.prenom + " " + c.email + " " + c.motdepasse);
            });

            // Code
            document.body.append(makeTable(query));
        }
    <?php endif; ?>
</script>

<?php require_once "footer.php"; ?>
