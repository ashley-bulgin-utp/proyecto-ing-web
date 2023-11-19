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
                    'nombre' => $fetchObj->res_nombre,
                    'imagen1' => $fetchObj->res_imagen1,
                    'imagen2' => $fetchObj->res_imagen2,
                    'imagen3' => $fetchObj->res_imagen3,
                    'correo' => $fetchObj->res_correo,
                    'tel' => $fetchObj -> res_tel,
                    'tipoRes' => $fetchObj->res_tipoRes,
                    'tipoComida' => $fetchObj->res_tipoComida,
                    'precio' => $fetchObj -> res_precio,
                    'resena' => $fetchObj ->res_resena,
                    'ubicacion' => $fetchObj -> res_ubicacion,
                    'tipoFacilidad' => $fetchObj -> facilidades,
                    'descripcion' => $fetchObj -> desc_desc,
                    'horario' => $fetchObj -> dias_con_horas
                ];
                $this->view('infoRest', ['restauranteInfo'=>$restauranteInfo]);
            }
            
        }

        private function cleanHorario($horario){
            if(strlen($horario)>0){
                $diasHorario = explode(",",$horario);
                $diasHorario = explode(" ",$diasHorario[0]);

                $aperturaTime = $diasHorario[3];
                $dateTime = DateTime::createFromFormat('H:i:s.u', $aperturaTime);
                $diasHorario[3] = $dateTime->format('H:i');
    
                $cierreTime = $diasHorario[5];
                $dateTime = DateTime::createFromFormat('H:i:s.u', $cierreTime);
                $diasHorario[5] = $dateTime->format('H:i');

                $diasHorario[4] = 'a';
                return implode(" ",$diasHorario);
            }else{
                return 'Horario no disponible';
            }
        }

        function cleanNames($obj){
            
        }
        
    }
?>