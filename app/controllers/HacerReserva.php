<?php
    class HacerReserva extends Controller {
        
        private $restModel;
        private $reservationModel;

        public function __construct() {
            $this->restModel = $this->model('M_InfoRestaurante');
            $this->reservationModel = $this->model('M_Reservas');
        }

        public function reservar($id) {
            $restId = $id;

            // Fetch del info del restaurante
            $restInfo = $this->restModel->getRestaurante($restId);
            if ($restInfo) {
                $restData = [
                    'id' => $id,
                    'nombre' => $restInfo->res_nombre,
                    'imagen1' => $restInfo->res_imagen1,
                    'imagen2' => $restInfo->res_imagen2,
                    'imagen3' => $restInfo->res_imagen3,
                    'correo' => $restInfo->res_correo,
                    'tel' => $restInfo -> res_tel,
                    'tipoRes' => $restInfo->res_tipoRes,
                    'tipoComida' => $restInfo->res_tipoComida,
                    'precio' => $restInfo -> res_precio,
                    'resena' => $restInfo ->res_resena,
                    'ubicacion' => $restInfo -> res_ubicacion,
                    'tipoFacilidad' => $restInfo -> facilidades,
                    'descripcion' => $restInfo -> desc_desc,
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

                    'dia_err' => '',
                    'hora_err' => '',
                    'success_msg' => '',
                    'err_msg' => ''
                ];

                // Validar parametros de reserva
                $this->checkParams($reservaData, $restData);
                
                // Verify time
                // If good, send true
                // Else false, send err_msg
                // var_dump($reservaData);

                
            } else {
                $reservaData = [
                    'dia' => '',
                    'sillasBebe' => '',
                    'hora' => '',
                    'comentarios' => '',
                    'personas' => '',

                    'dia_err' => '',
                    'hora_err' => '',
                    'success_msg' => '',
                    'err_msg' => ''
                ];
            }
            

            $this->view('HacerReserva', ['restData' => $restData, 'reservaData' => $reservaData]);
        }

        public function checkParams($reservaData, $restData) {
            // Verificar campo hora
            if($reservaData['hora']) {
                // Verificar horario de restaurante segun dia seleccionado
                $day = $this->getWeekDay($reservaData);
                $horario = $this->restModel->getRestTime($restData['id'], $day);
                
                // Verificar otra reserva
                
            }
        }

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