let submit = document.getElementById("submit");
submit.addEventListener("submit", function(e){

    let email = document.getElementById("email");
    let mailformat = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    if(email.value.trim() == ""){
        let erreur = document.getElementById("erreur");
        erreur.innerHTML = "Entrer votre email";
        erreur.style.color = "red";
        e.preventDefault();
    }
    else if(email.value.match(mailformat)){
        erreur.innerHTML = "";
    }
    else{
        erreur.innerHTML = "Email invalide";
        erreur.style.color = "red";
    }
    
    let amdp = document.getElementById("amdp");
    if(amdp.value.trim() == ""){
        let erreur0 = document.getElementById("erreur0");
        erreur0.innerHTML = "Entrer l'ancien mot de passe";
        erreur0.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur.innerHTML = "";
    }

    let nmdp = document.getElementById("nmdp");
    if(nmdp.value.trim() == ""){
        let erreur1 = document.getElementById("erreur1");
        erreur1.innerHTML = "Entrer le nouveau mot de passe";
        erreur1.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur1.innerHTML = "";
    }

    let cmdp = document.getElementById("cmdp");
    if(cmdp.value.trim() == ""){
        let erreur2 = document.getElementById("erreur2");
        erreur2.innerHTML = "Confirmer le nouveau mot de passe";
        erreur2.style.color = "red";
        e.preventDefault();
    }
    else if(cmdp.value.trim() !== nmdp.value.trim()){
        erreur2.innerHTML = "Mots de passe non identiques";
        erreur2.style.color = "red";
        e.preventDefault();
    }
    else if(cmdp.value.trim() === nmdp.value.trim()){
        erreur2.innerHTML = "";
    }  
})