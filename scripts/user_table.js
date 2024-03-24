function makeLine(user){
    // On génère une ligne
    const ligne = document.createElement('tr');
    // On génère les cases de la ligne
    const caseNom = document.createElement('td');
    const casePrenom = document.createElement('td');
    const caseEmail = document.createElement('td');

    // On ajoute le contenu aux cases
    caseNom.textContent = user.nom;
    casePrenom.textContent = user.prenom;
    caseEmail.textContent = user.email;

    // On construit la ligne
    ligne.append(caseNom);
    ligne.append(casePrenom);
    ligne.append(caseEmail);

    return ligne;
}

function makeTable(users){
    // On génère un tableau html
    const table = document.createElement('table');
    table.className = "user_table";

    // On ajoute l'entête de colonne
    table.append(makeLine({nom: "Nom", prenom: "Prenom", email: "Email"}));

    // On y ajoute les utilisateurs
    users.forEach(c => { table.append(makeLine(c)); });
    // On retourne le tableau
    return table;
}