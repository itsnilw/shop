<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shop_db'; 

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die('Could not connect to MySQL server: ' . mysqli_error());
    
}
?>
