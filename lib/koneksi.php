<?php
$host = 'localhost';        
$user = 'root';            
$password = '';            
$dbname = 'absensi'; 

$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
