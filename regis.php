<?php 
session_start();
include_once 'inc/dbconfig.php';
include_once 'inc/class.php';

$siswa = new siswa;
if (isset($_POST['btn-save'])) {
    $username = $_POST['username'];
    $password = ($_POST['password']);
    $nama = $_POST['nama'];
    $level = $_POST['level'];
  
    if ($siswa->users_tambah($username,$password,$nama,$level)) {
        echo "<script>window.alert('Data Berhasil Di Tambah')
        window.location='?module=login'</script>";
    }
  }  
?>

<?php include_once 'header.php'; ?>
<div class="container">
    <div class="form-login-group">
    <form method="post" action="" class="form-signin" role="form">
    <?php 
          if (isset($_GET['msg'])) {
            if ($_GET['msg']=="success") {
              $msg="
              <div class=\"alert alert-success\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Success!</strong>
              </div>
              ";
            }elseif ($_GET['msg']=="delete") {
              $msg="
              <div class=\"alert alert-danger\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Success!</strong>
              </div>
              ";
            }
          }
          if (isset($msg)) {
            echo $msg;
          }
          ?>

    <form method="POST" enctype="multipart/form-data" action="">
            <h3 class="form-signin-heading"><center>Register</center></h3>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda" required autofocus>
            <input type="hidden" name="level" class="form-control" value="siswa" required autofocus>
            <!--form register-->
            <button class="btn btn-lg btn-primary btn-block btn-login" name="btn-save" type="submit">Register</button>
        </form>
    </div>
</div>