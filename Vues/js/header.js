let click = document.getElementById('click');
let list = document.getElementById('list');
    list.style.display = 'none';

click.addEventListener('click', function(){
    
    if(list.style.display == 'block'){
        list.style.display = 'none';
    }
    else {  
        list.style.display = 'block';
    }
    
})

