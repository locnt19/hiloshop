<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiloshop";

# Buoc 1: Tao ket noi
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,'UTF8');
if($conn->connect_error) {
	die("Loi ket noi: " . $conn->connect_error);
}
?>