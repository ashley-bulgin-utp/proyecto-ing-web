document.addEventListener('DOMContentLoaded', function () {
    const btnReservar = document.querySelector('.btn-reservar');
    const modalContent = document.querySelector('.modalContent');
    const horizontalBar = document.querySelector('.horizontal-bar-wrap');
    const modalClose = document.querySelector('.modal-footer');

    const elementIds = ['dateInput', 'sillas-dd', 'time', 'comentario', 'personas-dd']; 
    const formData = {};

    btnReservar.addEventListener('click', function (event) {
        event.preventDefault();
        
        // Fetch form data
        elementIds.forEach((id) => {
            const element = document.getElementById(id);
            if (element) {
                formData[id] = element.value;
            }
        })
        console.log(formData); 
        
        // Simulacion de una reserva exitosa
        setTimeout(function () {
            modalContent.innerHTML = `
            <span class="modal-msg">¡Felicidades!</span>
            <i class="fa-solid fa-face-smile fa-xl" style="color: #37a043"></i>
            <p class="modal-result">Se ha confirmado su reserva para ${formData['dateInput']} a las ${formData['time']}</p>
            `;

            // Reserva fallida
            // modalContent.innerHTML = `
            // <span class="modal-msg">Lo sentimos!</span>
            // <i class="fa-solid fa-face-frown-open fa-xl" style="color: #f31212;"></i>
            // <p class="modal-result">En estos momentos el restaurante no cuenta con disponibilidad para la hora y fecha seleccionada</p>
            // `;

            horizontalBar.innerHTML = '';
            modalClose.innerHTML = '<button type="button" class="btn btn-primary btn-cerrar" data-bs-dismiss="modal">Cerrar</button>';

            // Deshabilitar form fields por reserva exitosa
            document.querySelector('.btn-cerrar').addEventListener('click', function () {
                elementIds.forEach((id) => {
                    const element = document.getElementById(id);
                    if (element) {
                        element.disabled = true;
                    }
                });

                document.querySelector('.btn-reservar').style.display = 'none';
                document.querySelector('.btn-cancelar').style.display = 'none';
            });
        }, 3000);
        
    
    });
});
