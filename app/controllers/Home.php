<?php
    class Home extends Controller {
        public function __construct() {
            // echo 'Home controller loaded';
        }

        public function home($name) {
            $this->view('home');
        }
        
    }
?>