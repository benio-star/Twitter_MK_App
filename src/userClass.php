<?php

class User {

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
        $this->username = $username;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setHashedPassword($pass) {
        $options = ['cost' => 11];
        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT, $options);
        $this->hashedPassword = $hashedPassword;
    }

}
