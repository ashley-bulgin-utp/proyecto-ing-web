<?php
    class AjusteUsuario extends Controller {
        public function __construct() {
            
        }

        public function ajuste($name) {
            $this->view('ajusteUsuario');
        }
        
    }
?>