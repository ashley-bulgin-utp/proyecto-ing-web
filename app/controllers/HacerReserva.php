<?php
    class HacerReserva extends Controller {
        
        private $restModel;
        private $reservationModel;
        private $response = '';
        private $error = '';

        public function __construct() {
            $this->restModel = $this->model('M_InfoRestaurante');
            $this->reservationModel = $this->model('M_Reservas');
        }

        public function reservar($id) {
            global $response, $error;
            $restID = $id;
            $userID = $_SESSION['user_id'];

            // Fetch del info del restaurante
            $restInfo = $this->restModel->getRestaurante($restID);
            if ($restInfo) {
                $restData = [
                    'id' => $id,
                    'nombre' => $restInfo->res_nombre,
                    'imagen1' => $restInfo->res_imagen1,
                    'imagen2' => $restInfo->res_imagen2,
                    'imagen3' => $restInfo->res_imagen3,
                    'horario' => $restInfo -> dias_con_horas
                ];
            };

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Fetch de info de reserva
                $reservaData = [
                    'dia' => trim($_POST['dia']),
                    'sillasBebe' => trim($_POST['sillasBebe']),
                    'hora' => trim($_POST['time']),
                    'comentarios' => trim($_POST['comentario']),
                    'personas' => trim($_POST['personas']),
                ];
                
                // Validar parametros de reserva
                if($this->checkParams($reservaData, $restData)) {
                    // Enviar a la bd
                    if($this->reservationModel->insertReservation($userID, $restID, $reservaData)) {
                        $response = 'Reserva exitosa!';
                    } else {
                        $error = 'Se ha producido un error, por favor intente nuevamente.';
                    }
                    
                } else {
                    $error = 'El restaurante no esta disponsible para la hora seleccionada.';
                }
                
            } else {
                $reservaData = [
                    'dia' => '',
                    'sillasBebe' => '',
                    'hora' => '',
                    'comentarios' => '',
                    'personas' => '',
                ];
            }
            

            $this->view('HacerReserva', ['restData' => $restData, 'reservaData' => $reservaData, 'response' => $response, 'error' => $error]);
        }

        // Verificar parametros de la reserva
        public function checkParams($reservaData, $restData) {
            // Verificar campo hora
            if($reservaData['hora']) {
                global $response, $error;
                // Verificar horario de restaurante segun dia seleccionado
                $day = $this->getWeekDay($reservaData);
                $horario = $this->restModel->getRestTime($restData['id'], $day);

                // Cambiar formato de las horas
                $horaSeleccionada = new DateTime($reservaData['hora']);
                $horaInicio = new DateTime($horario->dis_hor_inicio);
                $horaCierre = new DateTime($horario->dis_hor_cierre);

                if ($horaSeleccionada >= $horaInicio && $horaSeleccionada <= $horaCierre) {
                    return true;
                                        
                } else {
                    return false;
                }
            }
        }

        // Funcion que retorno dia de la semana
        public function getWeekDay($reservaData) {
            $dateTime = new DateTime($reservaData['dia']);
            $weekDay = $dateTime->format('N');

            if ($weekDay >= 1 && $weekDay <= 5) {
                $day = 1;
            } elseif ($weekDay == 6) {
                $day = 2;
            } elseif ($weekDay == 7) {
                $day = 3;
            }

            return $day;
        }
        
    }
?>