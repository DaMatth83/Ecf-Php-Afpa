let btn = document.getElementById('btnRole');
let divRole = document.getElementById('divRole');


btn.addEventListener("click", () => {
    // Créez une nouvelle copie de la divRole
    // cloneNode est la méthode pour cloner un noeud du DOM
    // True indique qu'on clone egalement tout les noeuds enfants de la divRole
    let newDiv = divRole.cloneNode(true);

    // Creer le bouton supprimer à ajouter sur chaque nouvel input
    let btnSupprimer = document.createElement("button");
    btnSupprimer.textContent = "Supprimer";
    btnSupprimer.type = "button";
    btnSupprimer.classList.add("btnSupprimer", "h-25", "ms-3", "bg-secondary", "text-light", "rounded", "border-0", "p-1");

    // Au click de ce bouton, on supprime la div créée
    btnSupprimer.addEventListener("click", () => {
        newDiv.remove(); // fonction native pour supprimer
    })
    newDiv.appendChild(btnSupprimer);

    // Insérez la nouvelle div
    let submitButton = document.getElementById('submit');
    divRole.parentNode.insertBefore(newDiv, submitButton);
});

