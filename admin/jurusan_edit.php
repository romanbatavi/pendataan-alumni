<?php include_once 'header.php'; 
include_once '../inc/class.php';
$siswa = new siswa;

if (isset($_POST['btn-edit'])) {
  $id_jurusan = $_POST['id_jurusan'];
  $nama_jurusan = $_POST['nama_jurusan'];

  if ($siswa->jurusan_edit($id_jurusan,$nama_jurusan)) {
    header("location:?module=jurusan&id=$id_jurusan&msg=success");
  }
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  extract($siswa->getData($id,'tbl_jurusan','id_jurusan'));
}
?>

	<!-- Custom style for this template -->
	<link rel="stylesheet" href="../dashboard.css">
	<!-- Custom styles for this template -->
  <link href="../carousel.css" rel="stylesheet">
  </head>
  
  <body>
  	<?php include_once 'navbar.php'; ?>
  	<div class="container-fluid">
  		<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
  				<ul class="nav nav-sidebar">
  					<li><a href="#">MENU UTAMA <span class="sr-only">(current)</span></a></li>
            <div class="page"></div>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Alumni</a></li>
            <li class="active"><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
            <li><a href="?module=lowongan"><i class="glyphicon glyphicon-th"></i> Data Lowongan</a></li>
            <li><a href="?module=users"><i class="glyphicon glyphicon-list"></i> Data Users</a></li>
  				</ul>
  			</div>
  			
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
          <div class="col-sm-12">
            <h2>Edit Data Jurusan</h2>
            <?php 
  					if (isset($_GET['msg'])) {
            if ($_GET['msg']=="success") {
              $msg="
              <div class='alert alert-success'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Success!</strong>
              </div>
              ";
            }
          }

          if (isset($msg)) {
            echo $msg;
          }
  					?>
            <hr>
          </div>

          <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data" action="">
              <table class="table table-bordered">
                <tr>
                  <td>ID JURUSAN</td>
                  <td><input class="form-control" type="hidden" name="id_jurusan" value="<?=$id_jurusan;?>">
                  <input class="form-control" type="text" value="<?=$id_jurusan;?>" disabled></td>
                </tr>
                
                <tr>
                  <td>JURUSAN</td>
                  <td><input class="form-control" type="text" name="nama_jurusan" value="<?=$nama_jurusan;?>"></td>
                </tr>  

                <tr>
                  <td colspan="2" align="center">
                    <button type="submit" class="btn btn-primary" name="btn-edit">
                      <span class="glyphicon glyphicon-plus"></span> Simpan
                    </button>
                    <a href="?module=jurusan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
  			</div>
  		</div>
  	</div>
  </body>