let connect = document.getElementById("connect");

connect.addEventListener("submit", function(e){

    let user = document.getElementById("user");
    let mailformat = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    if(user.value.trim() == ""){
        let erreur = document.getElementById("erreur");
        erreur.innerHTML = "Entrer un email";
        erreur.style.color = "red";
        e.preventDefault();
    }
    else if(user.value.match(mailformat)){
        erreur.innerHTML = "";
    }
    else{
        erreur.innerHTML = "Email invalide";
        erreur.style.color = "red";
    }

    let pswd = document.getElementById("pswd");
    if(pswd.value.trim() == ""){
        let erreur1 = document.getElementById("erreur1");
        erreur1.innerHTML = "Entrer un mot de passe";
        erreur1.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur1.innerHTML = "";
    }
});