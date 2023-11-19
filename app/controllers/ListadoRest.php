<?php
    class ListadoRest extends Controller {

        public function __construct() {
        }

        public function resultados($array = []) {
            $data = [
                'users',
            ];
            $parameters = $this->getParameters();
            // Output the parameters with their values
            foreach ($parameters as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $val) {
                        echo $key . ': ' . $val . '<br>';
                    }
                } else {
                    echo $key . ': ' . $value . '<br>';
                }
            }
            $this->view('resultados', $data);
        }

        private function getParameters(){
            $url = $_SERVER['REQUEST_URI'];
            // Extrae la query de la URL
            $queryString = parse_url($url, PHP_URL_QUERY);
            
            // Separa la string en los &
            $parameterPairs = explode('&', $queryString);
            
            // inicializa variable que contiene los parametros
            $parameters = [];
            
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

            return $parameters;
        }
        
    }
?>