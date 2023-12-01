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
            
            // Sanitizar datos
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
                'err_msg' => '',
                'success_msg' => ''
            ];

            $profileData = $data['profileData'];
            $userData = $data['userData'];    
            

            // Validar nombre
            if (empty($userData['usu_nombre'])) {
                $currentData = $this->userModel->userCurrentData('usu_nombre', $userID);
                $userData['usu_nombre'] = $currentData->usu_nombre;
            }

            // Validar apellido
            if (empty($userData['usu_apellido'])) {
                $currentData = $this->userModel->userCurrentData('usu_apellido', $userID);
                $userData['usu_apellido'] = $currentData->usu_apellido;
            }
        
            // Validar contraseña
            if (empty($userData['usu_contrasena'])) {
                $currentData = $this->userModel->userCurrentData('usu_contrasena', $userID);
                $userData['usu_contrasena'] = $currentData->usu_contrasena;
            } else {
                // Validar que la contraseña tenga minimo 6 caracteres
                if(strlen($userData['usu_contrasena']) < 6) {
                    $userData['usu_contrasena_err'] = 'La contraseña debe tener al menos 6 caracteres';
                    var_dump($userData['usu_contrasena_err']);
                    var_dump('check1');
                } else {
                    // Encripcion del password
                    $userData['usu_contrasena'] = password_hash($userData['usu_contrasena'], PASSWORD_DEFAULT);
                    var_dump($userData['usu_contrasena']);
                    var_dump('check2');
                }
            }

            // Validar correo 
            if (empty($userData['usu_correo'])) {
                $currentData = $this->userModel->userCurrentData('usu_correo', $userID);
                $userData['usu_correo'] = $currentData->usu_correo;
            } else {
                // Validar que el correo a modificar no exista
                if($this->userModel->findUserByEmail($userData['usu_correo'])) {
                    $userData['usu_correo_err'] = 'El correo ya se encuentra registrado';
                }
            }

            // Modificar info del usuario en la bd
            if($this->userModel->modifyUserData($userData, $userID)) {
                $data['success_msg'] = "Datos actualizados.";
            } else {
                $data['err_msg'] = "Se ha producido un error. Por favor intente nuevamente.";
            }

            
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
                'err_msg' => '',
                'success_msg' => ''
            ];
        }

        if(!empty($_SESSION['user_id'])) {
            $this->view('ajusteUsuario', ['userData' => $userData, 'profileData' => $profileData, 'err_msg' => $data['err_msg'], 'success_msg' => $data['success_msg']]);
        } else {
            redirect('Login/login/1');
        }

    }
}
