<?php
    class Demo extends Controller {
        private $restModel;

        public function __construct() {
            $this->restModel = $this->model('M_Demo');  
        }

        public function demo() {
            $users = $this->restModel->getUsers(); // Fetch de Usuarios. El metodo getUsers() se encuentra en el modelo M_Demo.php

            $userArray = [];
            foreach ($users as $user) {
                $userArray[] = [
                    'usu_id' => $user->usu_id,
                    'usu_nombre' => $user->usu_nombre,
                    'usu_apellido' => $user->usu_apellido,
                    'usu_contrasena' => $user->usu_contrasena,
                    'usu_correo' => $user->usu_correo,
                    'usu_telefono' => $user->usu_telefono,
                ];
            }
            
            // Pass the data as an associative array to the view
            $this->view('demo', ['users' => $userArray]);

        }
        
    }
?>