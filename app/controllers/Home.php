<?php
    class Home extends Controller {
        public function __construct() {
            // echo 'Home controller loaded';
        }

        public function home($id) {
            $url = $_SERVER['REQUEST_URI'];
            $queryString = parse_url($url, PHP_URL_QUERY);
            if($queryString){
                header('Location: http://localhost/proyecto-ing-web/public/ListadoRest/resultados/1?'.$queryString);
            }

            if(!empty($_SESSION['user_id'])) {
                $this->view('home');
            } else {
                redirect('Login/login/1');
            }
        }
        
    }
?>