<?php 
    class Login extends Controller {
        public function __construct() {
            
        }
        
        public function login($name) {
            $this->view('Login');
        }
    }
?>