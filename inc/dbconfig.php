<?php 
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "roman";

try {
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}
$mysqli = mysqli_connect($DB_host,$DB_user,$DB_pass,$DB_name);
# koneksi Database
$koneksi = new mysqli($DB_host,$DB_user,$DB_pass,$DB_name);
$conn   = mysqli_connect ($DB_host, $DB_user, $DB_pass, $DB_name);
$connect = new mysqli($DB_host, $DB_user, $DB_pass, $DB_name);
?>