function createCardTitle(title){
    const titleElement = document.createElement("h5");
    titleElement.classList.add("card-title");
    titleElement.textContent = title;
    return titleElement;
}

function createCardPrice(precio){
    const cardPriceElement = document.createElement("p");
    cardPriceElement.classList.add("card-text","precio");
    cardPriceElement.textContent = precio;
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
    cardHorarioElement.textContent = horario;
    return cardHorarioElement;
}

function createVerMasBtn(restauranteId){
    const container = document.createElement("div");
    const link = document.createElement("a");

    container.classList.add("expandContainer");
    link.classList.add("btn", "expandBtn","justify-content-end");

    link.textContent = "Ver más";
    const href = '../infoRest/restaurante.html?restId=' + restauranteId;
    link.setAttribute("href",href);
    container.appendChild(link);
    return container
}

function createCardBody(title,precio,horario,ubicacion,restauranteId){
    const cardBodyElement = document.createElement("div");
    cardBodyElement.classList.add("card-body");

    cardBodyElement.appendChild(createCardTitle(title));
    cardBodyElement.appendChild(createCardPrice(precio));
    cardBodyElement.appendChild(createCardHorario(horario));
    cardBodyElement.appendChild(createCardUbicacion(ubicacion));
    cardBodyElement.appendChild(createVerMasBtn(restauranteId));
    return cardBodyElement;
}

function createCardImg(src,NombreRestaurante){
    const imgElement = document.createElement("img");
    imgElement.src = src;
    imgElement.setAttribute("alt","Restaurante "+NombreRestaurante);
    imgElement.classList.add("card-img-top");
    return imgElement;
}

function createCard(restauranteObj){
    const cardElement = document.createElement("div");
    cardElement.classList.add("card", "col", "shadow", "rounded");

    cardElement.appendChild(createCardImg(restauranteObj.img,restauranteObj.name))
    cardElement.appendChild(createCardBody(restauranteObj.name,restauranteObj.precio,restauranteObj.horario,restauranteObj.ubicacion,restauranteObj.id));
    return cardElement;
}

export default createCard;