<?php

require_once dirname(__FILE__) . '/dbConfig.php';

class Database {

    public $connection;

    // make the connection to DB start automatically with new object initiate
    function __construct() {
        $this->createConnection();
    }

    public function createConnection() {
        @$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DB);

        if ($this->connection->connect_error) {
            die("Nieudane polaczenie - blad: " . $this->connection->connect_error .
                    " numer: " . $this->connection->connect_errno);
        } else {
            $this->connection->set_charset('utf8');
            echo 'Polaczenie do bazy - OK!<br>';
        }
    }

    public function closeConnection() {
        if (isset($this->connection)) {
            echo 'Zamykamy...';
            $this->connection->close();
            echo 'Zamknieto. Usuwamy...<br>';
            $this->connection = null;
            echo 'Usunieto!';
        }
    }

    public function useQuery($sql) {
        $result = $this->connection->query($sql);
        $this->confirmQuery($result);
        return $result;
    }

    private function confirmQuery($result) {
        if (!$result) {
            die('Zapytanie nie zostalo zrealizowane');
        }
    }

    public function clearInput($param) {
        $param = trim($param);
        $param = stripcslashes($param);
        $param = htmlspecialchars($param);
        return $param;
    }

    public function getRowsAffested() {
        return $this->connection->affected_rows;
    }

}

$database = new Database();
////$database->createConnection();
//$database->closeConnection();

