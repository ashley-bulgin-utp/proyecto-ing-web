<?php
    class VerReserva extends Controller {

        private $reservationModel;

        public function __construct() {
            $this->reservationModel = $this->model('M_Reservas');
        }

        public function ver($id) {
            $reservaID = $id;
            $userID = $_SESSION['user_id'];

            // Fetch del info del restaurante
            $reservInfo = $this->reservationModel->getReservationByReservationId($reservaID);
            if ($reservInfo) {
                $restData = [
                    'id' => $id,
                    'nombre' => $reservInfo->res_nombre,
                    'imagen1' => $reservInfo->res_imagen1,
                    'imagen2' => $reservInfo->res_imagen2,
                    'imagen3' => $reservInfo->res_imagen3,
                    'horario' => $reservInfo -> dias_con_horas
                ];
                // Almacenar info actual de reservas
                $reserva = [
                    'dia' => $reservInfo->reserv_fecha,
                    'hora' => $reservInfo->reserv_hora,
                    'personas' => $reservInfo->reserv_cant_personas,
                    'sillasBebe' => $reservInfo->reserv_cant_silla_bebe,
                    'comentarios' => $reservInfo->reserv_comentarios
                ];
            };
            var_dump($reserva['personas']);
            // Limpiar parametro de hora
            $reserva['hora'] = $this->cleanTime($reserva['hora']);

            $this->view('VerReserva', ['restData' => $restData, 'reservaData' => $reserva]);
        }

        public function cleanTime($hora) {
            $time = new DateTime($hora);
            $formattedTime = $time->format('H:i');
            return $formattedTime;
        } 
        
    }
?>