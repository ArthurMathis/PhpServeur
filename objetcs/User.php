<?php
include "exceptions/InvalidUserNomException.php";
include "exceptions/InvalidUserPrenomException.php";
include "exceptions/InvalidUserEmailException.php";
include "exceptions/InvalidUserMotdepasseException.php";
class User {
    private $nom, $prenom, $email, $motdepasse;
    public function __construct($nom, $prenom, $email, $motdepasse){
        try{
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setEmail($email);
            $this->setMotdepasse($motdepasse);

        // On récuèpre les éventuelles erreurs
        } catch(InvalidUserNomException $e){
            throw $e;
        } catch(InvalidUserPrenomException $e){
            throw $e;
        } catch(InvalidUserEmailException $e){
            throw $e;
        } catch(InvalidUserMotdepasseException $e){
            throw $e;
        }
    }

    public function getNom(){ return $this->nom; }
    public function getPrenom(){ return $this->prenom; }
    public function getEmail(){ return $this->email; }
    public function getMotdepasse(){ return $this->motdepasse; }

    public function setNom($nom){
        // On vérifie que le nom est non-vide
        if(empty($nom))
            throw new InvalidUserNomException("Le nom d'un utilisateur ne peut être vide !");
        // On vérifie que le nom est un string
        elseif(!is_string($nom))
            throw new InvalidUserNomException("Le nom d'un utilisateur doit être une chaine de caractères !");
        // On implémente
        else $this->nom = $nom;
    }
    public function setPrenom($prenom){
        // On vérifie que le prénom est non-vide
        if(empty($prenom))
            throw new InvalidUserPrenomException("Le prénom d'un utilisateur ne peut être vide !");
        // On vérifie que le prénom est un string
        elseif(!is_string($prenom))
            throw new InvalidUserPrenomException("Le prénom d'un utilisateur doit être une chaine de caractères !");
        // On implémente
        else $this->prenom = $prenom;
    }
    public function setEmail($email){
        // On vérifie que l'email est non-vide
        if(empty($email))
            throw new InvalidUserEmailException("L'email d'un utilisateur ne peut être vide !");
        // On vérifie que l'email est un string
        elseif(!is_string($email))
            throw new InvalidUserEmailException("L'email d'un utilisateur doit être une chaine de caractères !");
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new InvalidUserEmailException("L'email doit contenir un nom, un @ et une adresse ! (ex: mia.keller@gmail.com)");
        // On implémente
        else $this->email = $email;
    }
    public function setMotdepasse($motdepasse){
        // On vérifie que le mot de passe est non-vide
        if(empty($motdepasse))
            throw new InvalidUserMotdepasseException("Le mot de passe d'un utilisateur ne peut être vide !");
        // On vérifie que le mot de passe est un string
        elseif(!is_string($motdepasse))
        // On implémente
            throw new InvalidUserMotdepasseException("Le mot de passe d'un utilisateur doit être une chaine de caractères");
        $this->motdepasse = $motdepasse;
    }
}
