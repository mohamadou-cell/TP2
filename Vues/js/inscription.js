let submit = document.getElementById("submit");
submit.addEventListener("submit", function(e){
    
    let prenom = document.getElementById("prenom");
    if(prenom.value.trim() == ""){
        let erreur = document.getElementById("erreur");
        erreur.innerHTML = "Entrer un prenom";
        erreur.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur.innerHTML = "";
    }

    let nom = document.getElementById("nom");
    if(nom.value.trim() == ""){
        let erreur1 = document.getElementById("erreur1");
        erreur1.innerHTML = "Entrer un nom";
        erreur1.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur1.innerHTML = "";
    }

    let email = document.getElementById("email");
    let mailformat = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    if(email.value.trim() == ""){
        let erreur2 = document.getElementById("erreur2");
        erreur2.innerHTML = "Entrer un email";
        erreur2.style.color = "red";
        e.preventDefault();
    }
    else if(email.value.match(mailformat)){
        erreur2.innerHTML = "";
    }
    else{
        erreur2.innerHTML = "Email invalide";
        erreur2.style.color = "red";
    }

    let role = document.getElementById("role");
    if(role.value.trim() == ""){
        let erreur3 = document.getElementById("erreur3");
        erreur3.innerHTML = "Choisir un rôle";
        erreur3.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur3.innerHTML = "";
    }

    let mdp = document.getElementById("mdp");
    if(mdp.value.trim() == ""){
        let erreur4 = document.getElementById("erreur4");
        erreur4.innerHTML = "Saisir mot de passe";
        erreur4.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur4.innerHTML = "";
    }

    let cmdp = document.getElementById("cmdp");
    if(cmdp.value.trim() == ""){
        let erreur5 = document.getElementById("erreur5");
        erreur5.innerHTML = "Ressaisir mot de passe";
        erreur5.style.color = "red";
        e.preventDefault();
    }
    else if(cmdp.value.trim() !== mdp.value.trim()){
        erreur5.innerHTML = "Mots de passe non identiques";
        erreur5.style.color = "red";
        e.preventDefault();
    }
    else if(cmdp.value.trim() === mdp.value.trim()){
        erreur5.innerHTML = "";
    }  
});

