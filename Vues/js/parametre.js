let submit = document.getElementById("submit");
submit.addEventListener("submit", function(e){
    
    let amdp = document.getElementById("amdp");
    if(amdp.value.trim() == ""){
        let erreur0 = document.getElementById("erreur0");
        erreur0.innerHTML = "Entrer l'ancien mot de passe";
        erreur0.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur0.innerHTML = "";
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


let valide = document.getElementById("valide");
valide.addEventListener("submit", function(e){

    let image = document.getElementById("image");
    if(image.value.trim() == ""){
        let erreur7 = document.getElementById("erreur7");
        erreur7.innerHTML = "Choisissez une image";
        erreur7.style.color = "red";
        e.preventDefault();
    }
    else{
        erreur0.innerHTML = "";
    }

})

let amdp = document.getElementById('amdp');
let i1 = document.getElementById('i1');
let i2 = document.getElementById('i2');
i2.style.display = 'none';
i1.addEventListener('click', function(){
    if(amdp.type === 'password'){
        amdp.type = 'text';
        i1.style.display = 'none';
        i2.style.display = 'block';
    }
})
i2.addEventListener('click', function(){
     if(amdp.type === 'text'){
        amdp.type = 'password';
        i1.style.display = 'block';
        i2.style.display = 'none';
    }
})

let nmdp = document.getElementById('amdp');
let i3 = document.getElementById('i3');
let i4 = document.getElementById('i4');
i4.style.display = 'none';
i3.addEventListener('click', function(){
    if(nmdp.type === 'password'){
        nmdp.type = 'text';
        i3.style.display = 'none';
        i4.style.display = 'block';
    }
})
i4.addEventListener('click', function(){
     if(amdp.type === 'text'){
        amdp.type = 'password';
        i3.style.display = 'block';
        i4.style.display = 'none';
    }
})

let cmdp = document.getElementById('cmdp');
let i5 = document.getElementById('i5');
let i6 = document.getElementById('i6');
i6.style.display = 'none';
i5.addEventListener('click', function(){
    if(cmdp.type === 'password'){
        cmdp.type = 'text';
        i5.style.display = 'none';
        i6.style.display = 'block';
    }
})
i6.addEventListener('click', function(){
     if(cmdp.type === 'text'){
        cmdp.type = 'password';
        i5.style.display = 'block';
        i6.style.display = 'none';
    }
})