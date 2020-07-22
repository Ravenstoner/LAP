<?php
    class Database {

        private $host, $databaseName, $dbuser, $dbpassword, $link;

        function __construct() {
            $this->host = 'localhost';
            $this->databaseName = 'LAP';
            $this->dbuser = 'root';
            $this->dbpassword = '';
        }

        public function DBconnect() {
            $this->link = mysqli_connect($this->host, $this->dbuser, $this->dbpassword, $this->databaseName);
            $this->link->set_charset("utf8");

            if (!$this->link) {
                echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
                echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }

            // echo "Erfolg: es wurde ordnungsgemäß mit MySQL verbunden! Die Datenbank \"datenbank\" ist toll." . PHP_EOL;
            // echo "Host-Informationen: " . mysqli_get_host_info($this->link) . PHP_EOL;
        }

        public function mysqli_escape_string($string) {
            return mysqli_escape_string($this->link, $string);
        }

        public function DBquery($query) {
            return mysqli_query($this->link, $query, MYSQLI_STORE_RESULT);
        }

        public function DBdisconnect() {
            mysqli_close($this->link);
        }
    }