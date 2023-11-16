<?php
    class M_Restaurantes {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getUsers() {
            $this->db->query("SELECT * FROM usuarios");

            return $this->db->resultSet();
        }
    }
?>