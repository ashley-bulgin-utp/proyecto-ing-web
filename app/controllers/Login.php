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
                        redirect('Home/home/1');
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
    }
?>