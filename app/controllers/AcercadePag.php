<?php
    class AcercadePag extends Controller {
        public function __construct() {
            
        }

        public function about($name) {
            if(!empty($_SESSION['user_id'])) {
                $this->view('acercadePag');            
            } else {
                redirect('Login/login/1');
            }
    
        }
        
    }
?>