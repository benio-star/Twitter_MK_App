<?php

require_once dirname(__FILE__) . '/dbConfig.php';

class Database {

    public $connection;
    protected $stmt;

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
            if(isset($this->stmt)) {
                echo 'Likwidujemy stmt... ';
                $this->stmt->close();
                echo 'Zlikwidowane<br>';
            }
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

    public function getRowsAffected() {
        return $this->connection->affected_rows;
    }

    public function prepStatInit() {
        return $this->connection->stmt_init();
    }

    public function prepExecStatement($sql, $refs) {
        $this->stmt = $this->prepStatInit();
        if (!$this->stmt->prepare($sql)) {
            echo $error = $this->stmt->error;
        } else {
            call_user_func_array(array($this->stmt, 'bind_param'), $refs);
            $this->stmt->execute();
            if ($this->stmt->error) {
                echo $error = $this->stmt->error;
                echo '<br>';
            }
            return TRUE;
        }
    }

    public function lastId() {
        $lastId = $this->connection->insert_id;
        return $lastId;
    }

    public function bindOutputStatement($outBinds) {
        call_user_func_array(array($this->stmt, 'bind_result'), $outBinds);
        $this->stmt->store_result();
        $numrows = $this->stmt->num_rows;
        if (!$numrows) {
            return FALSE;
        } else {
            return $this->stmt->fetch();
        }
    }

}

$database = new Database();
////$database->createConnection();
//$database->prepStatInit();
//$database->closeConnection();

