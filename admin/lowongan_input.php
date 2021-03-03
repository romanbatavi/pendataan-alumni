<?php include_once 'header.php'; 
include_once '../inc/class.php';
$siswa = new siswa;

if (isset($_POST['btn-save'])) {
  $id_kategori = $_POST['id_kategori'];
  $nama_lowongan = $_POST['nama_lowongan'];
  $alamat_lowongan = $_POST['alamat_lowongan'];
  $email_lowongan = $_POST['email_lowongan'];
  $no_lowongan = $_POST['no_lowongan'];
  $ket_lowongan = $_POST['ket_lowongan'];
  $tanggal_buat = $_POST['tanggal_buat'];
  $expired = $_POST['expired'];


  if ($siswa->lowongan_tambah($id_kategori,$nama_lowongan,$alamat_lowongan,$email_lowongan,$no_lowongan,$ket_lowongan,$tanggal_buat,$expired)) {
    header('location:?module=lowongan&msg=success');
    
  }
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
          <?php include_once 'header1.php'; ?>
  					<li><a href="#">MENU UTAMA<span class="sr-only">(current)</span></a></li>
            <!-- ga kepake-->
            <!--
              <div class="page"></div>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li class="active"><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i>Data Jurusan</a></li>
            <li><a href="?module=users"><i class="glyphicon glyphicon-list"></i> Data Users</a></li>
  				-->
          </ul>
  			</div>
        <!--kepala-->
  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="col-sm-12">
            <h2>Tambah Data Lowongan</h2>
            <hr>
          </div>
          <!--badan-->
          <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data" action="">
              <table class="table table-bordered">
                <!-- <tr>
                  <td>ID LOWONGAN</td>
                  <td><input class="form-control" type="text" name="id_jurusan" placeholder="ID LOWONGAN.." required></td>
                </tr> -->
                <tr>
                  <td>KATEGORI</td>
                  <td>
                  <select class="form-control" name="id_kategori">
                  <option >Pilih Kategori</option>
                   
                  <?php
                  include_once("../inc/dbconfig.php");

                                                        //selecting data associated with this particular id
                                                    $result = mysqli_query($mysqli, "SELECT * FROM kategori  ");
                                                    while($res = mysqli_fetch_array($result))
                                                {
                                            ?>
                    <option value="<?php echo $res['id_kategori']?>"><?php echo $res['nama_kategori']?></option>
                   
                    <?php
                                                }
                    ?>
                  </select>
                  </td>
                </tr>  
                <tr>
                  <td>NAMA LOWONGAN</td>
                  <td><input class="form-control" type="text" name="nama_lowongan"  placeholder="Nama Lowongan" required></td>
                </tr>
                <tr>
                  <td>ALAMAT LOWONGAN</td>
                  <td><input class="form-control" type="text" name="alamat_lowongan" placeholder="Alamat" required></td>
                </tr>
                <tr>
                  <td>EMAIL LOWONGAN</td>
                  <td><input class="form-control" type="email" name="email_lowongan" placeholder="Email" required></td>
                </tr>
                <tr>
                  <td>NO LOWONGAN</td>
                  <td><input class="form-control" type="number" min="0" name="no_lowongan" placeholder="No Lowongan" required></td>
                </tr>
                <tr>
                  <td>KETERANGAN</td>
                  <td><textarea class="form-control" type="text" name="ket_lowongan" placeholder="Keterangan" required></textarea></td>
                </tr>
                <tr>
                  <td>TANGGAL BUAT</td>
                  <td><input class="form-control" type="text" name="tanggal_buat" placeholder="Tanggal Buat" readonly value="<?php date_default_timezone_set('Asia/Jakarta'); echo date(' Y-m-d ');?>" required></td>
                </tr>
                <tr>
                  <td>EXPIRED</td>
                  <td><input class="form-control" type="text" id="datepicker" name="expired" placeholder="Tanggal Berahir Lowongan"  required></td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                      <span class="glyphicon glyphicon-plus"></span> Simpan
                    </button>
                    <a href="?module=lowongan" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>
              </table>
            </form>
          </div>
  			</div>
  		</div>
  	</div>
  </body>