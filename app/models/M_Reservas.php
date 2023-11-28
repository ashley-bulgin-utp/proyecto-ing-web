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

        // Fetch de las reservas con Id de usuario
        public function getReservationsByUser($userID) {
            $this->db->query(
                'SELECT 
                r.reserv_id,
                r.reserv_fecha,
                r.reserv_hora,
                r.reserv_cant_personas,
                r.reserv_cant_silla_bebe,
                r.reserv_comentarios,
                res.res_id,
                res.res_nombre,
                res.res_ubicacion,
                res.res_imagen1,
                res.res_imagen2,
                res.res_imagen3
              FROM 
                reservas r
              JOIN 
                restaurantes res ON r.reserv_res_id = res.res_id
               WHERE r.reserv_usu_id = :usu_id');
            $this->db->bind(':usu_id', $userID);

            $reservaInfo = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $reservaInfo;
            } else {
                return false;
            }        
        }

        // Fetch de las reservas con ID de reserva
        public function getReservationByReservationId($reservaID) {
            $this->db->query('SELECT reserv_usu_id FROM reservas WHERE reserv_id = :reserv_id');
            $this->db->bind(':reserv_id', $reservaID);
            
            $userID = $this->db->single();
            
            $getReservation = $this->getReservationsByUser($userID->reserv_usu_id);

            if($getReservation) {
                return $getReservation;
            } else {
                return false;
            }

        }

        // Fetch de todas las reservas
        public function getReservations($userID) {
            $this->db->query(
                'SELECT 
                r.reserv_id,
                r.reserv_fecha,
                r.reserv_hora,
                res.res_id,
                res.res_nombre,
                res.res_ubicacion,
                res.res_imagen1
              FROM 
                reservas r
              JOIN 
                restaurantes res ON r.reserv_res_id = res.res_id
               WHERE r.reserv_usu_id = :usu_id');
            $this->db->bind(':usu_id', $userID);

            $reservaInfo = $this->db->resultSet();

            if($this->db->rowCount() > 0) {
                return $reservaInfo;
            } else {
                return false;
            }        
        }

        // Actualizar reserva
        public function updateReservation($reservID, $reservaInfo) {
            $this->db->query(
                'UPDATE reservas SET 
                reserv_fecha = :reserv_fecha,
                reserv_hora = :reserv_hora,
                reserv_cant_personas = :reserv_personas,
                reserv_cant_silla_bebe = :reserv_sillaBebes,
                reserv_comentarios = :reserv_comentarios
                WHERE reserv_id = :reserv_id');
            $this->db->bind(':reserv_fecha', $reservaInfo['dia']);    
            $this->db->bind(':reserv_hora', $reservaInfo['hora']);
            $this->db->bind(':reserv_personas', $reservaInfo['personas']);
            $this->db->bind(':reserv_sillaBebes', $reservaInfo['sillasBebe']);
            $this->db->bind(':reserv_comentarios', $reservaInfo['comentario']);
            $this->db->bind(':reserv_id', $reservID);

            if($this->db->execute()) { 
                return true;
            } else {
                return false;
            }
        }
    }
?>