<?php 
//should not be in apache index
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "disha";


$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>