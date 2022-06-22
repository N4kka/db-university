<?php 
require_once __DIR__ . "/define.php";

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
var_dump($conn);

if($conn && $conn->connect_error) {
    echo "DB displayed an error" . $conn->connect_error;
    die();
}
?>