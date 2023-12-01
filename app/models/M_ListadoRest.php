<?php
    class M_ListadoRest {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function searchRestaurante($searchString){
            $query = $this->setSelect();
            $query .= " r.res_nombre LIKE '%" . $searchString . "%'";
            $query = $query.' GROUP BY r.res_id'; 
            $this->db->query($query);
            return $this->db->resultSet();
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
                CONCAT(
                GROUP_CONCAT(
                    CONCAT(hd.hor_dia, ' ', d.dis_hor_inicio, ' a ', d.dis_hor_cierre) 
                    ORDER BY FIELD(hd.hor_dia, 'Lunes a Viernes', 'Sábado', 'Domingo') SEPARATOR ', '
                 )
                )AS dias_con_horas,
                r.res_ubicacion as res_ubicacion
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
            WHERE ";
            return $query;
        }

        private function setAllSelect(){
            $query = "SELECT 
            r.res_id as res_id,
            r.res_nombre as res_nombre,
            r.res_imagen1 as res_imagen1,
            r.res_precio as res_precio,
            CONCAT(
                GROUP_CONCAT(
                    CONCAT(hd.hor_dia, ' ', d.dis_hor_inicio, ' a ', d.dis_hor_cierre) 
                    ORDER BY FIELD(hd.hor_dia, 'Lunes a Viernes', 'Sábado', 'Domingo') SEPARATOR ', '
                 )
            ) AS dias_con_horas,
            r.res_ubicacion as res_ubicacion
            FROM 
                restaurantes r
            LEFT JOIN 
                disponibilidad d ON r.res_id = d.dis_res_id
            LEFT JOIN 
                horario_dia hd ON d.dis_hor_id = hd.hor_id";

            return $query;
        }

        private function setQueryFilter($filtros){
            foreach ($filtros as $name => $value) {
                $columnName = $this->getColumnName($name);
                if (is_array($value)) {
                    $inClause = "'" . implode("', '", $value) . "'";
                    if($name != "facilidades"){
                        $filter = "$columnName IN ($inClause)";
                    }else{
                        $filter = "";
                        foreach ($value as $index => $facility) {
                            $this->facilidadFiltro($index + 1, $facility);
                            $newFilter = $this->facilidadFiltro($index + 1, $facility);
                            $newFilter = ($index === 0) ?  $newFilter : (" AND ".$newFilter );
                            $filter .= $newFilter;
                        }                    
                    }
                } else {
                    $filter = "$columnName = '$value'";
                }
            
                //Construye la query
                $queryComponents[] = isset($queryComponents) ? " AND  $filter" : $filter;
            }
            return $queryComponents;
            
        }
        private function facilidadFiltro($index,$value){
            $filtro = "r.res_id IN(
                SELECT rf$index.rf_res_id
                FROM rest_facilidades rf$index
                JOIN tipo_facilidades tf$index ON rf$index.rf_tip_id = tf$index.tip_id
                WHERE tf$index.tip_nombre = '$value'
            )" ;
            return $filtro;
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