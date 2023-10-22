function createCardTitle(title){
    const titleElement = document.createElement("h5");
    titleElement.classList.add("card-title");
    titleElement.textContent = title;
    return titleElement;
}

function createCardDate(date){
    const cardPriceElement = document.createElement("p");
    cardPriceElement.classList.add("card-text","date");
    cardPriceElement.textContent = "Fecha: "+ date;
    return cardPriceElement;
}

function createCardUbicacion(ubicacion){
    const cardUbicacionElement = document.createElement("p");
    cardUbicacionElement.classList.add("card-text","ubicacion");
    cardUbicacionElement.textContent = ubicacion;
    return cardUbicacionElement;
}

function createCardHorario(horario){
    const cardHorarioElement = document.createElement("p");
    cardHorarioElement.classList.add("card-text","horario");
    cardHorarioElement.textContent = "Hora: "+horario;
    return cardHorarioElement;
}

function createVerMasBtn(reservaId){
    const container = document.createElement("div");
    const link = document.createElement("a");

    container.classList.add("expandContainer");
    link.classList.add("btn", "expandBtn","justify-content-end");

    link.textContent = "Ver reserva";
    const href = '../infoRest/restaurante.html?restId=' + reservaId;
    link.setAttribute("href",href);
    container.appendChild(link);
    return container
}

function createCardBody(title,precio,horario,ubicacion,reservaId){
    const cardBodyElement = document.createElement("div");
    cardBodyElement.classList.add("card-body");

    cardBodyElement.appendChild(createCardTitle(title));
    cardBodyElement.appendChild(createCardDate(precio));
    cardBodyElement.appendChild(createCardHorario(horario));
    cardBodyElement.appendChild(createCardUbicacion(ubicacion));
    cardBodyElement.appendChild(createVerMasBtn(reservaId));
    return cardBodyElement;
}

function createCardImg(src,NombreRestaurante){
    const imgElement = document.createElement("img");
    imgElement.src = src;
    imgElement.setAttribute("alt","Restaurante "+NombreRestaurante);
    imgElement.classList.add("card-img-top");
    return imgElement;
}

function createCard(reservaObj){
    const cardElement = document.createElement("div");
    cardElement.classList.add("card", "col", "shadow", "rounded","restauranteCard");

    cardElement.appendChild(createCardImg(reservaObj.img,reservaObj.name))
    cardElement.appendChild(createCardBody(reservaObj.name,reservaObj.date,reservaObj.horario,reservaObj.ubicacion,reservaObj.iD));
    return cardElement;
}

export default createCard;