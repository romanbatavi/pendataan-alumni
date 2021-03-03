<?php
session_start();
if (isset($_SESSION['username'])==0) {
			header('Location: ../');
		}

      $id_user = ( isset($_SESSION['id_user']) ) ? $_SESSION['id_user'] : '';

      ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="../images/i2.jpg">
    <title>APLIKASI PENDATAAN ALUMNI SMK DINAMIKA PEMBANGUNAN 1 JAKARTA</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
