<?php
require_once dirname(__FILE__) . '/dbConfig.php';

class Database {

    private $connection;

    // make the connection to DB start with new object initiate
    function __construct() {
        $this->createConnection();
    }

    public function createConnection() {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DB);

        if ($this->connection->connect_error) {
            die("Nieudane połączenie - błąd: " . $this->connection->connect_error .
                    " numer: " . $this->connection->connect_errno);
        } else {
            echo 'Połączenie do bazy - OK!<br>';
        }
    }

    public function closeConnection() {
        if (isset($this->connection)) {
            echo 'Zamykamy...';
            $this->connection->close();
            echo 'Zamknięto. Usuwamy...<br>';
            $this->connection = null;
            echo 'Usunięto!';
        }
    }

    public function useQuery($sql) {
        $result = $this->connection->query($sql);
        if (!$result) {
            die('Zapytanie do bazy nie powiodło się');
        }
        return $result;
    }

}

//$database = new Database();
////$database->createConnection();
//$database->closeConnection();

