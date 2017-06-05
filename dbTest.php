<?php

require_once './dbConfig.php';


$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DB);

if ($conn->connect_error) {
    die('Nieudane połączenie! Błąd: ' . $conn->connect_errno);
} else {
    echo 'Wszystko OK!';
}
$conn->close();
$conn = null;

