<?php
require_once dirname(__FILE__) . '/database.php';

class Tweet extends Database {

    private $tweetId;
    private $userId;
    private $tweetText;
    private $creationDate;

    public function __construct() {
        $this->tweetId = -1;
        $this->userId = '';
        $this->tweetText = '';
        $this->creationDate = '';
    }

    public function getTweetId() {
        return $this->tweetId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getTweetText() {
        return $this->tweetText;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setTweetText($tweetText) {
        $this->tweetText = $tweetText;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    public function loadTweetById(Database $database, $id) {
        
    }

    public function loadTweetByUserId(Database $database, $userId) {

    }

    static public function loadAllTweets(Database $database) {

    }

}
