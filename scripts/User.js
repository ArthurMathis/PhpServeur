class InvalidUserNomException extends Error{
    constructor(message) { super(message); }
}

class InvalidUserPrenomException extends Error{
    constructor(message) { super(message); }
}

class InvalidUserEmailException extends Error{
    constructor(message) { super(message); }
}

class InvalidUserMotdepasseException extends Error{
    constructor(message) { super(message); }
}

class User{
    constructor(nom, prenom, email, motdepasse){
        try{
            // On construit l'utilisateur
            setNom(nom);
            setPrenom(prenom);
            setEmail(email);
            setMotdepasse(motdepasse);

        // On récupère les éventuelles erreurs
        } catch(e){
            throw e;
        }
    }

    getNom(){ return this.nom; }
    getPrenom(){ return this.nom; }
    getEmail(){ return this.nom; }
    getMotdepasse(){ return this.nom; }

    setNom(nom){
        // On vérifie que le nom est non-vide
        if(nom == null)
            throw new InvalidUserNomException("Le nom d'un utilisateur ne peut être vide !");
        // On vérifie que le nom est une chaine de caractères
        else if(!typeof(nom) == 'string')
            throw new InvalidUserNomException("Le nom d'un utilisateur doit être une chaine de caractères !");
        // On implémente
        else this.nom = nom;
    }

    setPrenom(prenom){
        // On vérifie que le nom est non-vide
        if(prenom == null)
            throw new InvalidUserPrenomException("Le nom d'un utilisateur ne peut être vide !");
        // On vérifie que le nom est une chaine de caractères
        else if(!typeof(prenom) == 'string')
            throw new InvalidUserPrenomException("Le nom d'un utilisateur doit être une chaine de caractères !");
        // On implémente
        else this.prenom = prenom;
    }

    setEmail(email){
        // On vérifie que le nom est non-vide
        if(email == null)
            throw new InvalidUserEmailException("Le nom d'un utilisateur ne peut être vide !");
        // On vérifie que le nom est une chaine de caractères
        else if(!typeof(email) == 'string')
            throw new InvalidUserEmailException("Le nom d'un utilisateur doit être une chaine de caractères !");
        // On implémente
        else this.email = email;
    }

    setMotdepasse(motdepasse){
        // On vérifie que le nom est non-vide
        if(motdepasse == null)
            throw new InvalidUserMotdepasseException("Le nom d'un utilisateur ne peut être vide !");
        // On vérifie que le nom est une chaine de caractères
        else if(!typeof(motdepasse) == 'string')
            throw new InvalidUserMotdepasseException("Le nom d'un utilisateur doit être une chaine de caractères !");
        // On implémente
        else this.motdepasse = motdepasse;
    }
}