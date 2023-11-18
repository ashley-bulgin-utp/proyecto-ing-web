<?php
    class AcercadePag extends Controller {
        public function __construct() {
            
        }

        public function about($name) {
            $this->view('acercadePag');
        }
        
    }
?>