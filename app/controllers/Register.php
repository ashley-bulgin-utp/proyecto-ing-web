<?php
    class Register extends Controller {
        public function __construct() {
            
        }

        public function register($name) {
            $this->view('register');
        }
        
    }
?>