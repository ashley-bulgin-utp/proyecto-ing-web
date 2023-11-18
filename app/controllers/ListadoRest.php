<?php
    class ListadoRest extends Controller {

        public function __construct() {
        }

        public function resultados() {
            $data = [
                'users',
            ];

            $this->view('resultados', $data);
        }
        
    }
?>