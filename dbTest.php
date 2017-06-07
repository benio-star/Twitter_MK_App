<?php
require_once (dirname(__FILE__) . '/src/database.php');


$database = new Database();
//$database->createConnection();
$database->closeConnection();
