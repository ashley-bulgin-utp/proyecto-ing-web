<?php
    class M_Usuarios {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Registrar usuario
        public function registrarUsuario($data) {
            $this->db->query('INSERT INTO usuarios(usu_nombre, usu_apellido, usu_contrasena, usu_correo, usu_telefono) 
            VALUES (:usu_nombre, :usu_apellido, :usu_contrasena, :usu_correo, :usu_telefono)');

            $this->db->bind(':usu_nombre', $data['regname']);
            $this->db->bind(':usu_apellido', $data['regapellido']);
            $this->db->bind(':usu_contrasena', $data['regpass']);
            $this->db->bind(':usu_correo', $data['regmail']);
            $this->db->bind(':usu_telefono', $data['regphone']);

            if($this->db->execute()) { 
                return true;
            } else {
                echo "Error al registrar el usuario";
                return false;
            }
        }

        // Buscar usuario por correo
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM usuarios WHERE usu_correo = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Iniciar sesión
        public function login($email, $password) {
            $this->db->query('SELECT * FROM usuarios WHERE usu_correo = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->usu_contrasena;
            // Verificar hashes de las contraseña
            if(password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        // Modificar datos del usuario
        public function modifyUserData($data, $userId) {
            $this->db->query('
                UPDATE usuarios SET 
                usu_nombre = :usu_nombre,
                usu_apellido = :usu_apellido,
                usu_contrasena = :usu_contrasena,
                usu_correo = :usu_correo,
                usu_telefono = :usu_telefono
                WHERE usu_id = :usu_id
            ');

            $this->db->bind(':usu_nombre', $data['usu_nombre']);
            $this->db->bind(':usu_apellido', $data['usu_apellido']);
            $this->db->bind(':usu_contrasena', $data['usu_contrasena']);
            $this->db->bind(':usu_correo', $data['usu_correo']);
            $this->db->bind(':usu_telefono', $data['usu_telefono']);
            $this->db->bind(':usu_id', $userId);

            if($this->db->execute()) { 
                return true;
            } else {
                return false;
            }
        }

        // Datos actuales del usuario
        public function userCurrentData($parametro, $userId) {
            $this->db->query("SELECT $parametro FROM usuarios WHERE usu_id = :usu_id");
            $this->db->bind(':usu_id', $userId);
            
            $currentData = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $currentData;
            } else {
                return false;
            }
        }

    }
?>