<?php
    class InfoRest extends Controller {
        public function __construct() {
        }

        public function info($data) {
            $this->view('infoRest', $data);
        }
        
    }
?>