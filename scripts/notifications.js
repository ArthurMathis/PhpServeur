class InvalidNotificationException extends Error{
    constructor(message){ super(message); }
}

class notification{
    /**
     * @brief Constructeur de la classe notification
     * @param message Le message textuel de la notification
     */
    constructor(message){
        console.log("On génère une nouvelle notification contenant le message : " + message + ".");
        this.setMessage(message);
    }

    /**
     * @brief Méthode retournant l'attribut message
     * @returns {String}
     */
    getMessage(){ return this.message; }

    /**
     * @brief Méthode modifiant le message textuel de la notification
     * @param[in] message Le message à implémenter
     */
    setMessage(message){
        // On vérifie que le message est non-vide
        if(message == null)
            throw new InvalidNotificationException("Une notification ne peut contenir un message vide !");
        // On vérifie que le message est une chaine de caractères
        else if(typeof message != 'string')
            throw new InvalidNotificationException("Le message d'une notification doit être une chaine de caractères !");
        // On implémente
        else this.message = message;
    }

    /**
     * @brief Méthode retournant le coed html d'une notification
     * @returns {HTMLDivElement}
     */
    affiche(){
        // On génère un nouvel élément html
        const notif =  document.createElement('div');
        // On lui ajoute une classe et un contenu
        notif.className = 'notification';
        notif.textContent = this.getMessage();
        // On le retourne
        return notif;
    }
}