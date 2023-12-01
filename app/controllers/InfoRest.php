<?php
    class InfoRest extends Controller {
        private $restModel;

        public function __construct() {
            $this->restModel = $this->model('M_InfoRestaurante');  
        }

        public function info($data=[]) {
            $id = $_GET['restId'];
            $fetchObj = $this->restModel->getRestaurante($id); // Fetch de Restaurante

            if ($fetchObj) {
                $fetchObj->dias_con_horas = $this->cleanHorario($fetchObj->dias_con_horas);
                $restauranteInfo = [
                    'id' => $id,
                    'nombre' => $fetchObj->res_nombre,
                    'imagen1' => $fetchObj->res_imagen1,
                    'imagen2' => $fetchObj->res_imagen2,
                    'imagen3' => $fetchObj->res_imagen3,
                    'imagen4' => $fetchObj->res_imagen4,
                    'imagen5' => $fetchObj->res_imagen5,
                    'correo' => $fetchObj->res_correo,
                    'tel' => $fetchObj -> res_tel,
                    'tipoRes' => $fetchObj->res_tipoRes,
                    'tipoComida' => $fetchObj->res_tipoComida,
                    'precio' => $fetchObj -> res_precio,
                    'resena' => $fetchObj ->res_resena,
                    'ubicacion' => $fetchObj -> res_ubicacion,
                    'sitio' => $fetchObj -> res_sitio,
                    'tipoFacilidad' => $fetchObj -> facilidades,
                    'descripcion' => $fetchObj -> desc_desc,
                    'horario' => $fetchObj -> dias_con_horas
                ];
                if(!empty($_SESSION['user_id'])) {
                    $this->view('infoRest', ['restauranteInfo'=>$restauranteInfo]);
                } else {
                    redirect('Login/login/1');
                }
            }
            
        }

        private function cleanHorario($horario){
            if(strlen($horario)>0){
                $diasHorario = explode(",",$horario);
                foreach($diasHorario as $dia => $value){
                    if ($dia === array_key_first($diasHorario)) {
                        $value = explode(" ",$value);
                        $aperturaTime = $value[3];
                        $dateTime = DateTime::createFromFormat('H:i:s.u', $aperturaTime);
                        $value[3] = $dateTime->format('H:i');

                        $cierreTime = $value[5];
                        $dateTime = DateTime::createFromFormat('H:i:s.u', $cierreTime);
                        $value[5] = $dateTime->format('H:i');
                        $diasHorario[$dia] = implode(" ",$value);

                    }else{
                        $value = explode(" ",$value);
                        $aperturaTime = $value[2];
                        $dateTime = DateTime::createFromFormat('H:i:s.u', $aperturaTime);
                        $value[2] = $dateTime->format('H:i');

                        $cierreTime = $value[4];
                        $dateTime = DateTime::createFromFormat('H:i:s.u', $cierreTime);
                        $value[4] = $dateTime->format('H:i');
                        $diasHorario[$dia] = implode(" ",$value);
                    }

                }
                return implode(", ",$diasHorario);
            }else{
                return 'Horario no disponible';
            }
        }

        function cleanNames($obj){
            
        }
        
    }
?>