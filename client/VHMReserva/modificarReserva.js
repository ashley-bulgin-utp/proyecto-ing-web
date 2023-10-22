let modalFlag = 0;

document.addEventListener("DOMContentLoaded", function () {
  const btnReservar = document.querySelector(".btn-reservar");
  const modalContent = document.querySelector('.modalContent');
  const modalClose = document.querySelector('.modal-footer');

  const elementIds = [
    "dateInput",
    "sillas-dd",
    "time",
    "comentario",
    "personas-dd",
  ];
  const formData = {};

  btnReservar.addEventListener("click", function (event) {
    // Flujo principal
    if (btnReservar.innerHTML === "Modificar" && modalFlag === 0) {
        event.preventDefault();
        // Habilitar form fields
        elementIds.forEach((id) => {
            const element = document.getElementById(id);
            if (element) {
            element.disabled = false;
            }
        });
        btnReservar.innerHTML = "Reservar";
        modalFlag = 1;
        console.log(modalFlag);
    } 
    // Flujo secundario
    if (btnReservar.innerHTML === "Reservar" && modalFlag === 1) {
        // Apuntar al modal para realizar la reserva nuevamente
        btnReservar.setAttribute("data-bs-toggle", "modal");
        btnReservar.setAttribute("data-bs-target", "#processingModal");

        // Simulacion de una reserva exitosa
        setTimeout(function() {
            modalContent.innerHTML = `
            <span class="modal-msg">¡Felicidades!</span>
            <i class="fa-solid fa-face-smile fa-xl" style="color: #37a043"></i>
            <p class="modal-result">Se ha confirmado su reserva para ${formData['dateInput']} a las ${formData['time']}</p>
            `;
            modalClose.innerHTML = '<button type="button" class="btn btn-primary btn-cerrar" data-bs-dismiss="modal">Cerrar</button>';
            horizontalBar.innerHTML = '';

            // Reserva fallida
            // modalContent.innerHTML = `
            // <span class="modal-msg">Lo sentimos!</span>
            // <i class="fa-solid fa-face-frown-open fa-xl" style="color: #f31212;"></i>
            // <p class="modal-result">En estos momentos el restaurante no cuenta con disponibilidad para la hora y fecha seleccionada</p>
            // `;
            
            // Volver al flujo principal
            modalClose.addEventListener('click', function () {
                console.log('clicked');
                btnReservar.innerHTML = "Modificar";
                elementIds.forEach((id) => {
                    const element = document.getElementById(id);
                    if (element) {
                        element.disabled = true;
                    }
                });
                
                modalFlag = 0;
            })
        }, 3000);
    }
  });
});
