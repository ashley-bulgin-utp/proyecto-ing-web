<?php 
    class Login extends Controller {

        private $userModel;

        public function __construct() {
            $this->userModel = $this->model('M_Usuarios');
        }
        
        public function login($data) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Enviar Formulario
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                // Sanitizar datos
                $data = [
                    'logmail' => trim($_POST['logmail']),
                    'logpass' => trim($_POST['logpass']),

                    'logmail_err' => '',
                    'logpass_err' => ''
                ];

                // Validar correo
                if(empty($data['logmail'])) {
                    $data['logmail_err'] = 'Por favor ingrese su correo electrónico';
                } else {
                    // Validar si el correo existe
                    if($this->userModel->findUserByEmail($data['logmail'])) {
                        // Usuario encontrado
                    } else {
                        $data['logmail_err'] = 'El correo ingresado no esta registrado';
                    }
                }

                // Validar contraseña
                if(empty($data['logpass'])) {
                    $data['logpass_err'] = 'Por favor ingrese su contraseña';
                } 

                // Ingresar si no se dieron errores
                if (empty($data['logmail_err']) && empty($data['logpass_err'])) {
                    $loggedInUser = $this->userModel->login($data['logmail'], $data['logpass']);
                    
                    if($loggedInUser) {
                        // Usuario autenticado
                        // Crear session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['logpass_err'] = 'Contraseña incorrecta';
                        $this->view('login', $data);
                    }

                } else {
                    // Cargar vista con errores
                    $this->view('login', $data);
                }

            } else {
                // Cargar Formulario (no se ha enviado)
                
                $data = [
                    'logmail' => '',
                    'logpass' => '',

                    'logmail_err' => '',
                    'logpass_err' => ''
                ];

                // Cargar vista
                $this->view('login', $data);
            }
        }

        // Creacion de sesiones
        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->usu_id;
            $_SESSION['user_name'] = $user->usu_nombre;
            $_SESSION['user_lastname'] = $user->usu_apellido;
            $_SESSION['user_email'] = $user->usu_correo;
            $_SESSION['user_phone'] = $user->usu_telefono;
            $_SESSION['user_image'] = $user->usu_imagen;
            redirect('Home/home/{$user->usu_id}');
        }

        // Cerrar sesion
        public function logout($user) {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_lastname']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_phone']);
            unset($_SESSION['user_image']);
            session_destroy();
            redirect('Login/login/1');
        }
    }
?>