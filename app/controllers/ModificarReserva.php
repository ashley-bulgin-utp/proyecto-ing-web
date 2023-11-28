<?php
    class ModificarReserva extends Controller {
        
        private $reservationModel;

        public function __construct() {
            $this->reservationModel = $this->model('M_Reservas');
        }

        public function modificar($id) {
            $reservaID = $id;

            $this->view('ModificarReserva');
        }
    }
?>