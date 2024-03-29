<?php
    class M_InfoRestaurante {
        private $db;
        private $stmt;

        public function __construct() {
            $this->db = new Database();
        }

        public function getRestaurante($id) {
            $query = $this->selectRestaurant(($id));
            $this->db->query($query);
            
            return $this->db->single();
        }

        private function selectRestaurant($id){
            $query = "SELECT 
                r.res_id,
                r.res_nombre,
                r.res_imagen1,
                r.res_imagen2,
                r.res_imagen3,
                r.res_correo,
                r.res_tel,
                r.res_precio,
                r.res_tipoComida,
                r.res_tipoRes,
                r.res_resena,
                r.res_ubicacion,
                r.res_sitio,
                descrip.desc_desc,
                GROUP_CONCAT( DISTINCT tf.tip_nombre SEPARATOR ', ') AS facilidades,
                CONCAT(
                GROUP_CONCAT( DISTINCT
                    CONCAT(hd.hor_dia, ' ', d.dis_hor_inicio, ' a ', d.dis_hor_cierre) 
                    ORDER BY FIELD(hd.hor_dia, 'Lunes a Viernes', 'Sábado', 'Domingo') SEPARATOR ', '
                 )
            ) AS dias_con_horas
            FROM 
                restaurantes r
            LEFT JOIN 
                disponibilidad d ON r.res_id = d.dis_res_id
            LEFT JOIN 
                horario_dia hd ON d.dis_hor_id = hd.hor_id
            LEFT JOIN
                rest_facilidades rf ON r.res_id = rf.rf_res_id
            LEFT JOIN 
                tipo_facilidades tf ON rf.rf_tip_id = tf.tip_id
            LEFT JOIN
                desc_res descrip ON r.res_desc_id = descrip.desc_id
            WHERE 
                r.res_id = $id;
            ";
            return $query;
        }

        public function getRestTime($restId, $day) {
            $this->db->query(
                'SELECT * FROM disponibilidad 
                WHERE dis_res_id = :id
                AND dis_hor_id = :hora');

            $this->db->bind(':id', $restId);
            $this->db->bind(':hora', $day);

            $horario = $this->db->single();
            
            if($this->db->rowCount() > 0) {
                return $horario;
            } else {
                return false;
            }
        }

        public function fetchPlatoInfo($id) {
            $this->db->query(
                'SELECT
                r.res_id,
                p.pla_plato1, pi.pla_imagen1,
                p.pla_plato2, pi.pla_imagen2,
                p.pla_plato3, pi.pla_imagen3,
                p.pla_plato4, pi.pla_imagen4,
                p.pla_plato5, pi.pla_imagen5
                FROM
                    restaurantes r
                JOIN
                    platos p ON r.res_plato = p.pla_id
                JOIN
                    platos_img pi ON r.res_plato = pi.id_plato
                WHERE r.res_id = :rest_id');
            $this->db->bind(':rest_id', $id);

            $platosInfo = $this->db->single();
    
            if($this->db->rowCount() > 0) {
                return $platosInfo;
            } else {
                return false;
            }     
            
        }
    }
?>