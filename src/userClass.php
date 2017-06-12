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
        return $this->username;
    }

    public function setEmail($email) {
        $this->email = $this->clearInput($email);
        return $this->email;
    }

    public function setHashedPassword($pass) {
        $options = ['cost' => 11];
        $hashedPassword = password_hash($this->clearInput($pass), PASSWORD_BCRYPT, $options);
        $this->hashedPassword = $hashedPassword;
        return $hashedPassword;
    }

    public function saveToDb(Database $database) {
        if ($this->id == -1) {
            //We will save new user to DB
            $sql = "INSERT INTO users (username, email, hashed_password) ";
            $sql .= "VALUES (?, ?, ?)";

            $name = $this->setUsername($this->username);
            $email = $this->setEmail($this->email);
            $hashedPass = $this->hashedPassword;
            //We can not use actual values or expresions so that is why we need
            //to pass by references.
            $params[] = 'sss';
            $params[] = &$name;
            $params[] = &$email;
            $params[] = &$hashedPass;

            $info = $database->prepExecStatement($sql, $params);
            if ($info == TRUE) {
                $this->id = $database->insert_id;
                return TRUE;
            }
        }
        return FALSE;
    }

    static function loadUserById(Database $database, $id) {
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

}

$username = "Marek10";
$email = 'marecki10@marecki.pl';
$pass = 'marek@1225';
$user = new User($username, $email, $pass);
$user->setUsername($username);
$user->setEmail($email);
$user->setHashedPassword($pass);
//$user->saveToDb($database);
$id = 30;
$user->loadUserById($database, $id);
//echo $user->getId() . '<br>';
$database->closeConnection();
