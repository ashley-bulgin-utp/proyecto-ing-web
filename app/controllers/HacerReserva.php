<?php
    class HacerReserva extends Controller {
        public function __construct() {
        }

        public function hacer($id) {
            $restId = $id;
            $this->view('HacerReserva');
        }
        
    }
?>