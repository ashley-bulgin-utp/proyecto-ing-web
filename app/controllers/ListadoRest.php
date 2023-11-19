<?php
    class ListadoRest extends Controller {
        private $restModel;
        public function __construct() {
            $this->restModel = $this->model('M_ListadoRest');  
        }

        public function resultados($array = []) {
            $parameters = $this->getParameters();
            $restaurants = $this->restModel->getRestaurantes($parameters); // Fetch de Restaurante
            $restArray = [];
            foreach ($restaurants as $rest) {
                $restArray[] = [
                    'res_id' => $rest->res_id,
                    'res_nombre' => $rest->res_nombre,
                    'res_imagen1' => $rest->res_imagen1,
                    'res_precio' => $rest->res_precio,
                    'res_ubicacion' => $rest->res_ubicacion,
                    'dias_con_horas' => $this->cleanHorario($rest->dias_con_horas)
                ];
            }
            $this->view('resultados', $restArray);
        }

        private function getParameters(){
            $url = $_SERVER['REQUEST_URI'];
            // Extrae la query de la URL
            $queryString = parse_url($url, PHP_URL_QUERY);

            // Separa la string en los &
            $parameterPairs = explode('&', $queryString);

            // inicializa variable que contiene los parametros
            $parameters = [];
            if(strlen($queryString)>0){
                foreach ($parameterPairs as $pair) {
                    //Divide los parametros a nombre y valor
                    list($name, $value) = explode('=', $pair, 2);
                    
                    // URL decode the values
                    $value = urldecode($value);
                    $name = urldecode(($name));
                    // Comprueba si ya existe el parametro en el array
                    if (array_key_exists($name, $parameters)) {
                        // Si el parametro ya existe, lo convierte a un array
                        if (!is_array($parameters[$name])) {
                            $parameters[$name] = [$parameters[$name]];
                        }
                        // Agrega el nuevo valor al array del parametro
                        $parameters[$name][] = $value;
                    } else {
                        // Si el parametro no existe, lo agrega al array
                        $parameters[$name] = $value;
                    }
                }
            }
            return $parameters;
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
        
    }
?>