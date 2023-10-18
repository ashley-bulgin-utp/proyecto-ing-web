import listaRestaurantes from './listaRestaurantes.json' assert { type: 'json' };
import createCard  from './cardCreator.js';
const resultados = document.getElementById("results");

function fillResults(){
    listaRestaurantes.forEach( restaurante =>{
        resultados.appendChild(createCard(restaurante));
    })
}

fillResults();