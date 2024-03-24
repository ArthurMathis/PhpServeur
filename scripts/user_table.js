function makeLine(user){
    // On génère une ligne
    const ligne = document.createElement('tr');
    // On génère les cases de la ligne
    const caseNom = document.createElement('tr');
    const casePrenom = document.createElement('tr');
    const caseEmail = document.createElement('tr');

    // On ajoute le contenu aux cases
    caseNom.textContent = user.getNom();
    casePrenom.textContent = user.getPrenom();
    caseEmail.textContent = user.getEmail();

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
    // On y ajoute les utilisateurs
    users.forEach(c => { table.append(makeLine(c)); });
    // On retourne le tableau
    return table;
}