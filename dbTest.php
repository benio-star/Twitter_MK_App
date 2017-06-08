<?php
require_once (dirname(__FILE__) . '/src/database.php');


$database = new Database();
$sql      = "SELECT * FROM users";
$result   = $database->useQuery($sql);
$numRows  = $result->num_rows;
if (!$numRows) {
    echo 'Brak rekordów<br>';
} else {
    echo 'Ilość pobranych wyników: ' . $numRows;
}
//$database->createConnection();
$database->closeConnection();
