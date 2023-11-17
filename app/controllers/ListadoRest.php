<?php
    class ListadoRest extends Controller {
        public function __construct() {
        }

        public function resultados($name) {
            $this->view('resultados');
        }
        
    }
?>