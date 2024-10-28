const lista = document.getElementById('lista-tareas');


function agregarElemento(){
    let userInput = document.getElementById('userInput').value;
    const nuevoItem = document.createElement('li');
    nuevoItem.innerHTML = userInput;
    const nuevoBoton = document.createElement('button');
    nuevoBoton.innerHTML = "Eliminar";
    nuevoBoton.addEventListener('click', function(){
        lista.removeChild(nuevoItem);
        lista.removeChild(nuevoBoton);
        lista.removeChild(checkbox);
        eliminarElemento();
    });


    let checkbox = document.createElement('input');
    checkbox.type = "checkbox";
    checkbox.name = "marcador";
    checkbox.value = "value";
    checkbox.id = "id";

    lista.appendChild(nuevoItem);
    lista.appendChild(nuevoBoton);
    lista.appendChild(checkbox);
    
    localStorage.setItem('Tarea', userInput);
}

let eliminarElemento =  function(){
    localStorage.removeItem('Tarea');
}






