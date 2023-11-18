<?php 
    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh; // database handler
        private $statement; // statement
        private $error;

        public function __construct() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch(PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        // SQL Statements
        public function query($sql) {
            $this->statement = $this->dbh->prepare($sql);
        }

        // Bind values
        public function bind($param, $value, $type = null) {
            if(is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                    break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                    break;
                    default:
                        $type = PDO::PARAM_STR;
                    break;
                }
            }
            $this->statement->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute() {
            return $this->statement->execute();
        }

        // Retrieve multiple records
        public function resultSet() {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        // Retrieve single record 
        public function single() {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        // Check if data exists
        public function rowCount() {
            return $this->statement->rowCount();
        }
    }
?>