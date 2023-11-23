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
            
            $data = [
                'userData' => array (
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
                ),
                'profileData' => array (
                    'image' => trim($_POST['image']),

                    'image_err' => ''
                )
            ];

            $profileData = $data['profileData'];
            $userData = $data['userData'];

            // Validar que la contraseña tenga minimo 6 caracteres
            if(strlen($userData['usu_contrasena']) < 6) {
                $userData['usu_contrasena_err'] = 'La contraseña debe tener al menos 6 caracteres';
            }

            // $targetDir = "../../public/assets/ProfilePics";
            // $fileName = basename($_FILES["image"]["name"]);
            // $uniqeuFileName = $userID . "_" . $fileName;
            // $targetFilePath = $targetDir . $uniqeuFileName;

            // Verificar tamaño del archivo
            // if ($_FILES['image']['size'] > 5000000) {
            //     $data['image_err'] = 'El archivo supera el limite';
            //     var_dump('El archivo supera el limite');
            // } else {
            // }

            
        }

        $this->view('ajusteUsuario', $data);


        
    }
}
