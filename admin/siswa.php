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
            <h2>Data Alumni</h2>
            <hr>
          </div>

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <a class="btn btn-success" href="?module=siswa_input"><span class="glyphicon glyphicon-plus"></span> Tambah Alumni</a>
                <div class="pull-right col-md-4">
                  <form action="?module=siswa_search" method="POST">
                    <div class="input-group">
                      <input type="text" name="cari" class="form-control" placeholder="Cari Alumni ...">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>

              <div style="padding-top: 10px" class="panel-body">
                <br>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>NIS</th>
                      <th>Nomor Ijazah</th>
                      <th>Nama Alumni</th>
                      <th>Jurusan</th>
                      <th>Lulus Tahun</th>
                      <th style="text-align: center;" colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include_once '../inc/class.php';
                  $siswa  = new siswa;
                  $records_per_page=15;
                  $query = "SELECT * FROM tbl_siswa ORDER BY tahun_lulus DESC";
                  $newquery = $siswa->paging($query,$records_per_page);
                  // penomoran halaman data pada halaman
                  if (isset($_GET['page_no'])) {
                    $page = $_GET['page_no'];
                  }

                  if (empty($page)) {
                    $posisi = 0;
                    $halaman = 1;
                  }else{
                    $posisi = ($page - 1) * $records_per_page;
                  }
                  $no=1+$posisi;
                  foreach ($siswa->showData($newquery) as $value) {
                  ?>
                  <tr style="text-align: center;">
                    <td><?php echo $no; ?></td>
                    <td><?=$value['nis'];?></td>
                    <td><?=$value['nomor_ijazah'];?></td>
                    <td><a href="?module=siswa_tampil&no_ijazah=<?=$value['nomor_ijazah']?>"><?=$value['nama_siswa'];?></a></td>
                    <td><?=$value['nama_jurusan'];?></td>
                    <td><?=$value['tahun_lulus'];?></td>
                    <td>
                      <a href="?module=siswa_edit&nis=<?=$value['nis']?>" title="EDIT"><span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                    <td>
                      <a href="?module=delete&nis=<?=$value['nis']?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Alumni Yang Bernama <?php echo $value['nama_siswa']; ?>')" title="DELETE"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                  }

                  ?>                    
                  </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        <?php $siswa->paginglink($query,$records_per_page); ?>
                      </div>
                    </td>
                  </tr>
                </table>
                <?php 
                $query = "SELECT * FROM tbl_siswa";
                echo "Jumlah Data Alumni : ";
                $siswa->jumlah($query); 
                ?>
              </div>
            </div>
          </div>
  			</div>
  		</div>
  	</div>
  </body>