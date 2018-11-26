<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cua_hang_tbdd_db";

# Buoc 1: Tao ket noi
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
	die("Loi ket noi: " . $conn->connect_error);
}
?>