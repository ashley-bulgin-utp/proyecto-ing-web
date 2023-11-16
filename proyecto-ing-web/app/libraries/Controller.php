<?php
    class Controller {
        // Carga el modelo
        public function model($model) {
            require_once '../app/models/'.$model.'.php';

            // if(file_exists('../app/models/'.$model.'.php')) {
            //     require_once '../app/models/'.$model.'.php';
            // } else {
            //     die('El modelo no existe.');
            // }

            return new $model();
        }

        // Carga la vista
        public function view($view, $data = []) {
            if(file_exists('../app/views/'.$view.'.php')) {
                require_once '../app/views/'.$view.'.php';
            } else {
                die('La vista no existe.');
            }
            
            return new $view();
        }
    }
?>