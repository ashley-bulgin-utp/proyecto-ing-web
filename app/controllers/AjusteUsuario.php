<?php
class AjusteUsuario extends Controller
{

    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('M_Usuarios');
    }

    public function ajuste($data)
    {
        $userID = $_SESSION['user_id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $data = [
                'userData' => [
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
                ],
                'profileData' => [
                    'image' => trim($_POST['image']),

                    'image_err' => ''
                ],
                'data_err' => '',
                'success_msg' => ''
            ];

            $profileData = $data['profileData'];
            $userData = $data['userData'];    
            

            // Validar que la contraseña tenga minimo 6 caracteres
            if(strlen($userData['usu_contrasena']) > 0 && strlen($userData['usu_contrasena']) < 6) {
                $userData['usu_contrasena_err'] = 'La contraseña debe tener al menos 6 caracteres';
            }

            // Enviar error si todos los campos estan vacios
            if (empty(array_filter($data['userData']))) {
                $data['data_err'] = 'No se han modificado los campos';
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

            
        } else {
            $data = [
                'userData' => [
                    'usu_nombre' => '',
                    'usu_apellido' => '',
                    'usu_contrasena' => '',
                    'usu_correo' => '',
                    'usu_telefono' => '',

                    'usu_nombre_err' => '',
                    'usu_apellido_err' => '',
                    'usu_contrasena_err' => '',
                    'usu_correo_err' => '',
                    'usu_telefono_err' => ''
                ],
                'profileData' => [
                    'image' => '',

                    'image_err' => ''
                ],
                'data_err' => '',
                'success_msg' => ''
            ];
        }

        // $this->view('ajusteUsuario', ['data' => $data]);
        $this->view('ajusteUsuario', ['userData' => $userData, 'profileData' => $profileData, 'data_err' => $data['data_err'], 'success_msg' => $data['success_msg']]);

    }
}
