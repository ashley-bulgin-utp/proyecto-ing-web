import listaReservas from './listaReservas.json' assert { type: 'json' };
import createCard  from './cardCreator.js';
const resultados = document.getElementById("results");

function fillResults(){
    listaReservas.forEach( reserva =>{
        resultados.appendChild(createCard(reserva));
    })
}

fillResults();