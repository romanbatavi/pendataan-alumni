<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "roman";

// Koneksi dan memilih database di server
$konek = mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
$mysqli = mysqli_connect($server,$username,$password,$database);
# koneksi Database
$koneksi = new mysqli($server,$username,$password,$database);
$conn   = mysqli_connect ($server, $username, $password, $database);
$connect = new mysqli($server, $username, $password, $database);

?>