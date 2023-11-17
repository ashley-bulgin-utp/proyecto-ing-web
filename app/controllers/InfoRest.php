<?php
    class InfoRest extends Controller {
        public function __construct() {
            $this->restModel = $this->model('M_Restaurantes');
        }

        public function info($name) {
            $users = $this->restModel->getUsers();
            $data = [
                'users' => $users
            ];
            $this->view('infoRest', $data);
        }
        
    }
?>