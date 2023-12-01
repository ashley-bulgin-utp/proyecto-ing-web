<?php
    class MisReservas extends Controller {
        
        private $reservationModel;

        public function __construct() {
            $this->reservationModel = $this->model('M_Reservas');
        }

        public function misReservas($userID) {
            $userID = $userID;
            
            // Fetch info de reservas
            $reservaInfo = $this->reservationModel->getReservations($userID);
            
            if ($reservaInfo) {
                foreach ($reservaInfo as $reserva) {
                    $reservas[] = [
                        'id' => $reserva->reserv_id,
                        'rest_id' => $reserva->res_id,
                        'nombre_rest' => $reserva->res_nombre,
                        'dia' => $reserva->reserv_fecha,
                        'hora' => $this->cleanTime($reserva->reserv_hora),
                        'ubicacion' => $reserva->res_ubicacion,
                        'imagen' => $reserva->res_imagen1
                    ];
                }                

            }
            
            $this->view('misReservas', $reservas);
            
        }

        public function cleanTime($hora) {
            $time = new DateTime($hora);
            $formattedTime = $time->format('H:i');
            return $formattedTime;
        } 
        
    }
?>