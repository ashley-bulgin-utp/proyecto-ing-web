<?php
    class Register extends Controller {
        
        private $userModel;

        public function __construct() {
            $this->userModel = $this->model('M_Usuarios');

        }

        public function index() {
            $this->view('register');
        }

        public function register($data) {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Enviar Formulario
                // Validar datos
                $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

                // Sanitizar datos
                $data = [
                    'regname' => trim($_POST['regname']),
                    'regapellido' => trim($_POST['regapellido']),
                    'regpass' => trim($_POST['regpass']),
                    'regmail' => trim($_POST['regmail']),
                    'regphone' => trim($_POST['regphone']),

                    'regname_err' => '',
                    'regapellido_err' => '',
                    'regpass_err' => '',
                    'regmail_err' => '',
                    'regphone_err' => ''
                ];

                $this->checkParams($data);

            } else {
                // Mostrar formulario de registro
                $postData = [
                    'regname' => '',
                    'regapellido' => '',
                    'regpass' => '',
                    'regmail' => '',
                    'regphone' => '',
                    

                    'regname_err' => '',
                    'regapellido_err' => '',
                    'regpass_err' => '',
                    'regmail_err' => '',
                    'regphone_err' => ''
                ];
                // Cargar vista
                $this->view('register', $postData);
            }
        }

        // Validar parametros
        public function checkParams($data) {
            // Validar nombre
            if(empty($data['regname'])) {
                $data['regname_err'] = 'Por favor ingrese su nombre';
            }

            // Validar apellido
            if(empty($data['regapellido'])) {
                $data['regapellido_err'] = 'Por favor ingrese su apellido';
            }

            // Validar contraseña
            if(empty($data['regpass'])) {
                $data['regpass_err'] = 'Por favor ingrese su contraseña';
            } elseif(strlen($data['regpass']) < 6) {
                $data['regpass_err'] = 'La contraseña debe tener al menos 6 caracteres';
            }

            // Validar correo
            if(empty($data['regmail'])) {
                $data['regmail_err'] = 'Por favor ingrese su correo electrónico';
            } else {
                // Validar si el correo ya existe
                if($this->userModel->findUserByEmail($data['regmail'])) {
                    $data['regmail_err'] = 'El correo ya existe';
                }
            }

            // Validar teléfono
            if(empty($data['regphone'])) {
                $data['regphone_err'] = 'Por favor ingrese su teléfono';
            }

            // Asegurarse de que no haya errores
            if (empty($data['regname_err']) && empty($data['regapellido_err']) && empty($data['regmail_err']) && empty($data['regphone_err']) && empty($data['regpass_err'])) {
                // Encripcion del password
                $data['regpass'] = password_hash($data['regpass'], PASSWORD_DEFAULT);

                // Registrar usuario
                if($this->userModel->registrarUsuario($data)) {
                    redirect('Login/login/1');
                } else {
                    die('Algo salió mal');
                }
            } else {
                // Cargar vista con errores
                $this->view('register', $data);
            }
        }
        
    }
?>