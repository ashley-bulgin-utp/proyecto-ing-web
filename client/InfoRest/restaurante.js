import listaRestaurantes from './listaDescripcionRestaurantes.json' assert { type: 'json' };

const tituloRestaurante = document.getElementById("titulo");
const descripcionRestaurante = document.getElementById("descripcion");
const ubicacionRestaurante = document.getElementById("ubicacion");
const caracteristicasRestaurante = document.getElementById("caracteristicas");
const contactoRestaurante = document.getElementById("contacto");

const urlParams = new URLSearchParams(window.location.search);
const data = urlParams.get('restId'); //Consigue id del restaurante a mostrar
const listaIndex = data -1;

tituloRestaurante.textContent = listaRestaurantes[listaIndex].name;
descripcionRestaurante.textContent = listaRestaurantes[listaIndex].descripcion;
ubicacionRestaurante.textContent = listaRestaurantes[listaIndex].ubicacion;
caracteristicasRestaurante.textContent = listaRestaurantes[listaIndex].caracteristicas;
contactoRestaurante.textContent = listaRestaurantes[listaIndex].contacto;