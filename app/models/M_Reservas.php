<?php
    class M_Reservas {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        // Insertar reserva
        public function insertReservation($userID, $restID, $reservaData) {
            $this->db->query(
                'INSERT INTO reservas(reserv_usu_id, reserv_res_id, reserv_fecha, reserv_hora, 
                reserv_cant_personas, reserv_cant_silla_bebe, reserv_comentarios)
                VALUES (:usu_id, :res_id, :fecha, :hora, :cant_personas, :cant_silla_bebe, :comentarios)');
            
            $this->db->bind(':usu_id', $userID);
            $this->db->bind(':res_id', $restID);
            $this->db->bind(':fecha', $reservaData['dia']);
            $this->db->bind(':hora', $reservaData['hora']);
            $this->db->bind(':cant_personas', $reservaData['personas']);
            $this->db->bind(':cant_silla_bebe', $reservaData['sillasBebe']);
            $this->db->bind(':comentarios', $reservaData['comentarios']);
            
            if($this->db->execute()) { 
                return true;
            } else {
                return false;
            }
        }

        // Fetch de las reservas
        public function getReservations($userID) {
            $this->db->query(
                'SELECT 
                r.reserv_id,
                r.reserv_fecha,
                r.reserv_hora,
                r.reserv_cant_personas,
                r.reserv_cant_silla_bebe,
                r.reserv_comentarios,
                res.res_nombre
              FROM 
                reservas r
              JOIN 
                restaurantes res ON r.reserv_res_id = res.res_id
               WHERE r.reserv_usu_id = :usu_id');
            $this->db->bind(':usu_id', $userID);

            $reservaInfo = $this->db->single();

            var_dump($reservaInfo);

            if($this->db->rowCount() > 0) {
                return $reservaInfo;
            } else {
                return false;
            }        
        }
    }
?>