<?php

require_once dirname(__FILE__) . '/database.php';

class User extends Database {

    private $id;
    private $username;
    private $email;
    private $hashedPassword;

    public function __construct() {
        $this->id = -1;
        $this->username = '';
        $this->email = '';
        $this->hashedPassword = '';
    }

    public function clearInput($param) {
        $param = trim($param);
        $param = stripcslashes($param);
        $param = htmlspecialchars($param);
        return $param;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getHashedPassword() {
        return $this->hashedPassword;
    }

    public function setUsername($username) {
        $this->username = $this->clearInput($username);
    }

    public function setEmail($email) {
        $this->email = $this->clearInput($email);
    }

    public function setHashedPassword($pass) {
        $options = ['cost' => 11];
        $hashedPassword = password_hash($this->clearInput($pass), PASSWORD_BCRYPT, $options);
        $this->hashedPassword = $hashedPassword;
    }

    public function saveToDb(Database $database) {
        // Setting up variables
        $this->setUsername($this->username);
        $name = $this->getUsername();
        $this->setEmail($this->email);
        $email = $this->getEmail();
        $hashedPass = $this->getHashedPassword();
        $id = $this->getId();

        //We can not use actual values or expresions so that is why we need
        //to pass by references.
        if ($this->id == -1) {
            /*
             * We will save new user to DB
             * Prepare the $sql query
             */
            $sql = "INSERT INTO users (username, email, hashed_password) ";
            $sql .= "VALUES (?, ?, ?)";

            $params[] = 'sss';
            $params[] = &$name;
            $params[] = &$email;
            $params[] = &$hashedPass;

            /*
             * prepExecStatement returned bool
             */
            $info = $database->prepExecStatement($sql, $params);
            if ($info == TRUE) {
                $this->id = $database->insert_id;
                return TRUE;
            }
        } else {
            $sql = "UPDATE users SET username = ?, email = ?, hashed_password = ? ";
            $sql .= "WHERE id = ?";

            $params[] = 'sssi';
            $params[] = &$name;
            $params[] = &$email;
            $params[] = &$hashedPass;
            $params[] = &$id;

            $info = $database->prepExecStatement($sql, $params);
            if ($info == TRUE) {
                echo 'Ile zmienionych wpisow: ' . $database->getRowsAffected() . '<br>';
                return TRUE;
            }
        }
        return FALSE;
    }

    static public function loadUserById(Database $database, $id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $params[] = 'i';
        $params[] = &$id;

        $info = $database->prepExecStatement($sql, $params);
        if ($info == TRUE) {
            $variables[] = &$idNr;
            $variables[] = &$email;
            $variables[] = &$username;
            $variables[] = &$pass;

            $result = $database->bindOutputStatement($variables);
            if ($result == TRUE) {
                $loadedUser = new User();
                $loadedUser->id = $idNr;
                $loadedUser->email = $email;
                $loadedUser->username = $username;
                $loadedUser->hashedPassword = $pass;

                return $loadedUser;
            }
            return NULL;
        }
    }

    static public function loadAllUsers(Database $database) {
        $sql = "SELECT * FROM users";
        $ret = [];

        $result = $database->useQuery($sql);
        if ($result == TRUE && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->email = $row['email'];
                $loadedUser->username = $row['username'];
                $loadedUser->hashedPassword = $row['hashed_password'];

                $ret[] = $loadedUser;
            }
        }

        return $ret;
    }

    public function delete(Database $database) {
        if ($this->id != -1) {
            $sql = "DELETE FROM users WHERE id = ?";
            $params[] = 'i';
            $params[] = &$this->id;

            $info = $database->prepExecStatement($sql, $params);
            if ($info == TRUE) {
                $this->id = -1;
                return TRUE;
            }
            return FALSE;
        }
    }

}

$username = "Marek_NEW_17";
$email = 'marecki17@marecki.pl';
$pass = 'marek@165';
$id = 48;
$user = new User();
$user->setUsername($username);
$user->setEmail($email);
$user->setHashedPassword($pass);
//$user->saveToDb($database);
$userById = User::loadUserById($database, $id);
echo '<pre>';
var_dump($userById);
echo '</pre>';
echo $userById->getId() . '<br>';
//$userById->setUsername('Marek8_new');
//$userById->saveToDb($database);
//$res = User::loadAllUsers($database);
var_dump($userById->delete($database));
echo $userById->getId() . '<br>';

//echo '<pre>';
//print_r($res);
//echo '</pre>';
$database->closeConnection();
