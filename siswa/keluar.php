<?php
session_start();
echo "<script>alert('Anda Berhasil Logout');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
session_destroy();
?>