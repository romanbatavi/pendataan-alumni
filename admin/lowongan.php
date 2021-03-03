<?php include_once 'header.php'; 
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
      <?php include_once 'header1.php'; ?>
  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="col-sm-12">
            <h2>Data Lowongan</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <a class="btn btn-success" href="?module=lowongan_input"><span class="glyphicon glyphicon-plus"></span> Tambah Lowongan</a>
                <!-- <div class="pull-right col-md-4">
                  <form action="?module=siswa_search" method="POST">
                    <div class="input-group">
                      <input type="text" name="cari" class="form-control" placeholder="Cari Kode Ijaah Dan Nama ..">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>
                  </form>
                </div> -->
              </div>

              <div style="padding-top: 10px" class="panel-body">
                <br>
                <br>
                <?php 
          if (isset($_GET['msg'])) {
            if ($_GET['msg']=="success") {
              $msg="
              <div class='alert alert-success'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
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
            }elseif ($_GET['msg']=="edit") {
              $msg="
              <div class=\"alert alert-warning\">
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
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Kategori</th>
                      <th>Nama Lowongan</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>NO</th>
                      <th>Keterangan</th>
                      <th width="50%">Tanggal</th>
                      <th width="50%">Expired</th>
                      <th style="text-align: center;" colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  include_once("../inc/dbconfig.php");
                  $nomor = 1;
                  $tbl_lowongan = mysqli_query($koneksi, "SELECT * FROM tbl_lowongan ORDER BY id_lowongan ;");
                  while ($tbl = mysqli_fetch_array($tbl_lowongan)) {
                    $id_kategori = $tbl['id_kategori'];
                    $kategori = mysqli_query($koneksi, "SELECT nama_kategori FROM kategori WHERE id_kategori = $id_kategori");
                    $k = mysqli_fetch_assoc($kategori); 
                   
                   ?>	
                  <tr style="text-align: center;">
                    <td><?php echo $nomor; ?></td>
                    <td><?=$k['nama_kategori'];?></td>
                    <td><?=$tbl['nama_lowongan'];?></td>
                    <td><?=$tbl['alamat_lowongan'];?></td>
                    <td><?=$tbl['email_lowongan'];?></td>
                    <td><?=$tbl['no_lowongan'];?></td>
                    <td><?=$tbl['ket_lowongan'];?></td>
                    <td><?=$tbl['tanggal_buat'];?></td>
                    <td><?=$tbl['expired'];?></td>

                    <!--edit lowongan ga di perlukan -->
                    <!-- form edit lowongan tidak dibuat -->
                    <!--
                    <td>
                      <a href="?module=siswa_edit&id_lowongan=<?=$tbl['id_lowongan']?>" title="EDIT"><span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                    -->
                    <td>
                      <a href="?module=delete&id_lowongan=<?=$tbl['id_lowongan']?>"  title="DELETE"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                  </tr>
                  <?php
                  $nomor++;
                  }

                  ?>                    
                  </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        
                      </div>
                    </td>
                  </tr>
                </table>
               
                <?php
                  //including the database koneksi file
                  include_once("../inc/dbconfig.php");
                  //fetching data in descending order (lastest entry first)
                  $lowongan = mysqli_query($mysqli, "SELECT * FROM tbl_lowongan  ");
                  $lowongan = mysqli_num_rows($lowongan);
                  ?>
                  Jumlah Data Lowongan: <?php echo $lowongan ;?>
              </div>
            </div>
          </div>
  			</div>
  		</div>
  	</div>
  </body>