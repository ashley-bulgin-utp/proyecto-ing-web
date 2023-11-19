<?php
    class M_ListadoRest {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function getRestaurantes($filtros) {
            $query = "SELECT res_nombre,res_imagen1,res_precio,ubicacion";
            $this->db->query("SELECT * FROM usuarios");
            
            return $this->db->resultSet();
        }

        private function setQueryFilter($filtros){
            foreach ($filtros as $name => $value) {
                foreach ($filtros as $name => $value) {
                    $columnName = $this->getColumnName($name);
                    if (is_array($value)) {
                        $inClause = "'" . implode("', '", $value) . "'";
                        $filter = "$columnName IN ($inClause)";
                    } else {
                        $filter = "$columnName = $value";
                    }
                
                    //Construye la query
                    $queryComponents[] = isset($queryComponents) ? "AND $filter" : $filter;
                }
            }
            return $queryComponents;
            
        }

        private function getColumnName($name){
            $columnName;
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

        }
    }
?>