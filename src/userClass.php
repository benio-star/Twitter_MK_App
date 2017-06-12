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
        //We can not use actual values or expresions so that is why we need
        //to pass by references.
        $params[] = 'sss';
        $params[] = &$name;
        $params[] = &$email;
        $params[] = &$hashedPass;

        if ($this->id == -1) {
            /*
             * We will save new user to DB
             * Prepare the $sql query
             */
            $sql = "INSERT INTO users (username, email, hashed_password) ";
            $sql .= "VALUES (?, ?, ?)";

            echo $sql;
            /*
             * prepExecStatement returned bool
             */
            $info = $database->prepExecStatement($sql, $params);
            if ($info == TRUE) {
                $this->id = $database->insert_id;
                return TRUE;
            }
        } else {
            $sql = "UPDATE users SET username=?, "
                    . "email=?, "
                    . "hashed_password=?";
            $sql .= "WHERE id=?";

            echo $sql;

            $info = $database->prepExecStatement($sql, $params);
            if ($info == TRUE) {
                echo $database->getRowsAffected();
                return TRUE;
            }
        }
        return FALSE;
    }

    static public function loadUserById(Database $database, $id) {
        $sql = "SELECT * FROM users WHERE id=?";
        $params[] = 'i';
        $params[] = &$id;

        $info = $database->prepExecStatement($sql, $params);
        if ($info == TRUE) {
            $variables[] = &$idNr;
            $variables[] = &$email;
            $variables[] = &$username;
            $variables[] = &$pass;

            $userById = $database->bindOutputStatement($variables);
            if ($userById == TRUE) {
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

}

$username = "Marek_NEW_17";
$email = 'marecki17@marecki.pl';
$pass = 'marek@165';
$id = 29;
$user = new User($username, $email, $pass);
$user->setUsername($username);
$user->setEmail($email);
$user->setHashedPassword($pass);
$user->saveToDb($database);
//var_dump(User::loadUserById($database, $id));
//$res = User::loadAllUsers($database);
//echo '<pre>';
//print_r($res);
//echo '</pre>';
$database->closeConnection();
