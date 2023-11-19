<?php
    class M_ListadoRest {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getRestaurantes($filtros) {
            if(count($filtros)>0){
                $query = $this->setSelect();
                $query = $query.implode(' ', $this->setQueryFilter(($filtros)));
                $query = $query.' GROUP BY r.res_id'; 
            }else{
                $query = $this->setAllSelect();
                $query = $query.' GROUP BY r.res_id'; 
            }


            $this->db->query($query);
            
            return $this->db->resultSet();
        }

        private function setSelect(){
            $query = "SELECT 
                r.res_id as res_id,
                r.res_nombre as res_nombre,
                r.res_imagen1 as res_imagen1,
                r.res_precio as res_precio,
                CONCAT(hd.hor_dia, ': ', GROUP_CONCAT(CONCAT(d.dis_hor_inicio, ' to ', d.dis_hor_cierre) SEPARATOR ', ')) AS dias_con_horas,
                r.res_ubicacion as res_ubicacion
            FROM 
                restaurantes r
            LEFT JOIN 
                disponibilidad d ON r.res_id = d.dis_res_id
            LEFT JOIN 
                horario_dia hd ON d.dis_hor_id = hd.hor_id
            LEFT JOIN 
                tipo_facilidades tf ON r.res_tipoFacilidad = tf.tip_id
            WHERE ";

            return $query;
        }

        private function setAllSelect(){
            $query = "SELECT 
            r.res_id as res_id,
            r.res_nombre as res_nombre,
            r.res_imagen1 as res_imagen1,
            r.res_precio as res_precio,
            CONCAT(hd.hor_dia, ': ', GROUP_CONCAT(CONCAT(d.dis_hor_inicio, ' to ', d.dis_hor_cierre) SEPARATOR ', ')) AS dias_con_horas,
            r.res_ubicacion as res_ubicacion
            FROM 
                restaurantes r
            LEFT JOIN 
                disponibilidad d ON r.res_id = d.dis_res_id
            LEFT JOIN 
                horario_dia hd ON d.dis_hor_id = hd.hor_id
            LEFT JOIN 
                tipo_facilidades tf ON r.res_tipoFacilidad = tf.tip_id";

            return $query;
        }

        private function setQueryFilter($filtros){
            foreach ($filtros as $name => $value) {
                $columnName = $this->getColumnName($name);
                if (is_array($value)) {
                    $inClause = "'" . implode("', '", $value) . "'";
                    $filter = "$columnName IN ($inClause)";
                } else {
                    $filter = "$columnName = '$value'";
                }
            
                //Construye la query
                $queryComponents[] = isset($queryComponents) ? "AND $filter" : $filter;
            }
            return $queryComponents;
            
        }

        private function getColumnName($name){
            $columnName='';
            switch($name){
                case 'comidas':
                    $columnName = 'r.res_tipoComida';
                    break;
                case 'costo':
                    $columnName = 'r.res_precio';
                    break;
                case 'provincias':
                    $columnName = 'r.res_ubicacion';
                    break;
                case 'reseñas':
                    $columnName = 'r.res_resena';
                    break;
                case 'tipoRes':
                    $columnName = 'r.res_tipoRes';
                    break;
                case 'facilidades':
                    $columnName = 'tf.tip_nombre';
                    break;
                default:
                    break;
            }
            return $columnName;
        }
    }
?>