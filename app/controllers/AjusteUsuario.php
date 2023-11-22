<?php
class AjusteUsuario extends Controller
{

    private $userModel;

    public function __construct()
    {
    }

    public function ajuste($data)
    {
        $userID = $_SESSION['user_id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Profile Pic Data
            $profileData = [
                'image' => trim($_POST['image']),

                'image_err' => ''
            ];

            // User info data
            $userData = [
                'usu_nombre' => trim($_POST['name']),
                'usu_apellido' => trim($_POST['apellido']),
                'usu_contrasena' => trim($_POST['password']),
                'usu_correo' => trim($_POST['email']),
                'usu_telefono' => trim($_POST['telephone']),

                'usu_nombre_err' => '',
                'usu_apellido_err' => '',
                'usu_contrasena_err' => '',
                'usu_correo_err' => '',
                'usu_telefono_err' => ''
            ];
            
            $data['profileData'] = $profileData;
            $data['userData'] = $userData;

            // $targetDir = "../../public/assets/ProfilePics";
            // $fileName = basename($_FILES["image"]["name"]);
            // $uniqeuFileName = $userID . "_" . $fileName;
            // $targetFilePath = $targetDir . $uniqeuFileName;

            // TEST - Verificar nombre
            if(empty($userData['usu_nombre'])) {
                $userData['usu_nombre_err'] = 'Por favor ingrese su nombre';
                var_dump('Por favor ingrese su nombre');
            }

            // Verificar tamaño del archivo
            // if ($_FILES['image']['size'] > 5000000) {
            //     $data['image_err'] = 'El archivo supera el limite';
            //     var_dump('El archivo supera el limite');
            // } else {
            // }

            
        }

        $this->view('ajusteUsuario');


        
    }
}
