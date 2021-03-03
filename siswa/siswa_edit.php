<?php include_once 'header.php'; ?>

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
  					<li class="active"><a href="#">MENU UTAMA <span class="sr-only">(current)</span></a></li>
            <div class="page"></div>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li class="active"><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Alumni</a></li>
  				</ul>
  			</div>


  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				
  				<div class="col-sm-12">
  					<h2><span class="glyphicon glyphicon-edit"></span> Edit Data Siswa</h2>
  					<hr>
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
  				</div>

  				<?php 
  				include_once '../inc/class.php';
  				$siswa = new siswa;

  				if (isset($_POST['btn-edit'])) {
  					$nis = $_POST['nis'];
            $nisn = $_POST['nisn'];
            $nama_siswa = $_POST['nama_siswa'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];
  					$nama_jurusan = $_POST['nama_jurusan'];
  					$tempat_lahir = $_POST['tempat_lahir'];
  					$tgl_lahir = $_POST['tgl_lahir'];
  					$nama_orang_tua = $_POST['nama_orang_tua'];
  					$sekolah_asal = $_POST['sekolah_asal'];
  					$nomor_peserta = $_POST['nomor_peserta'];
  					$tahun_lulus = $_POST['tahun_lulus'];
  					$kepala_sekolah = $_POST['kepala_sekolah'];
  					$nomor_ijazah = $_POST['nomor_ijazah'];
  					$nilai_rata_rata = $_POST['nilai_rata_rata'];
            $keterangan = $_POST['keterangan'];
            $kondisi = $_POST['kondisi'];
            $detail_kondisi = $_POST['detail_kondisi'];

  					// Ambil data gambar dari form
  					$nama_file = $_FILES['foto']['name'];
  					$ukuran_file = $_FILES['foto']['size'];
  					$tipe_file = $_FILES['foto']['type'];
  					$tmp_file = $_FILES['foto']['tmp_name'];

  					// set path folder tempat menyimpan gambar
  					$path = "../images/siswa/".$nama_file;

  					// jika foto tidak kosong
  					if (!empty($nama_file)) {
  						# cek apakah tipe file yang di upload adalah JPG/JPEG/PNG
  						if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
  							# jika tipe file JPG/JPEG/PNG, maka lakukan:
  							// cek apakah ukuran file sama atau lebih kecil dari 1MB
  							if ($ukuran_file <= 1000000) {
  								# jika ukuran file kurang dari sama denga 1MB, lakukan:

  								// proses upload
  								if (move_uploaded_file($tmp_file, $path)) { // cek apakah gambar berhasil di upload
  									# jika gambar berhasil di upload, lakukan:
  									$poto_lama = $_POST['poto_lama'];
  									unlink('../images/siswa/'.$poto_lama);
  									// proses simpan ke database
  									$siswa->update($nis,$nisn,$nama_siswa,$alamat,$no_telp,$tempat_lahir,$tgl_lahir,$nama_orang_tua,$sekolah_asal,$nomor_peserta,$tahun_lulus,$kepala_sekolah,$nomor_ijazah,$nilai_rata_rata,$nama_jurusan,$keterangan,$nama_file,'admin',$kondisi,$detail_kondisi);
                        echo "<script> alert('Data Berhasil Di Ubah') </script>";
                        echo "<meta http-equiv='refresh' content='0; url=?module=siswa_edit&nis=$nis&msg=success'>";
  								}else{
  									// jika gambar gagal di upload
  									echo "<script> alert('Gambar Gagal Di Ubah') </script>";
                    echo "<meta http-equiv='refresh' content='0; url=?module=siswa_edit&nis=$nis'>";
  								}
  							}else{
  								// ukuran foto tidak boleh melebihi 1mb
  								echo "<script> alert('Ukuran gambar harus dibawah dari 1MB') </script>";
                  echo "<meta http-equiv='refresh' content='0; url=?module=siswa_edit&nis=$nis'>";
  							}
  						}
  						// tipe file foto
  					}elseif (empty($nama_file)) {
  						# cek
  						$siswa->update($nis,$nisn,$nama_siswa,$alamat,$no_telp,$tempat_lahir,$tgl_lahir,$nama_orang_tua,$sekolah_asal,$nomor_peserta,$tahun_lulus,$kepala_sekolah,$nomor_ijazah,$nilai_rata_rata,$nama_jurusan,$keterangan,$nama_file,'admin',$kondisi,$detail_kondisi);
                  echo "<script> alert('Data Berhasil Di Ubah') </script>";
                  echo "<meta http-equiv='refresh' content='0; url=?module=siswa_edit&nis=$nis&msg=success'>";
  					}
  				}

  				if (isset($_GET['nis'])) {
  					$nis = $_GET['nis'];
  					extract($siswa->getData($nis,'tbl_siswa','nis'));
  				}
  				?>

  				<div class="col-md-12">
  					<form method="POST" enctype="multipart/form-data" action="">
  						<table class="table table-bordered">
  							<tr>
  								<td>NIS</td>
                  <td>
                  <input class="form-control" type="hidden" name="nis" value="<?=$nis?>">
                  <input class="form-control" type="text" name="" value="<?=$nis?>" disabled></td>
  							</tr>
                <tr>
                  <td>NISN</td>
                  <td><input class="form-control" type="text" name="nisn" readonly value="<?=$nisn;?>"></td>
                </tr>
  							<tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama_siswa" readonly value="<?=$nama_siswa;?>" required></td>
                </tr>
                <tr>
                  <td>Alamat Tinggal</td>
                  <td><textarea class="form-control" name="alamat"><?=$alamat;?></textarea></td>
                </tr>
                <tr>
                  <td>No.Telp</td>
                  <td><input class="form-control" type="text" name="no_telp" value="<?=$no_telp;?>" ></td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td>
                    <select class="form-control" name="nama_jurusan" style="width: 300px">
                      <option>-Pilih Jurusan-</option>  
                      <?php 
                      $query = "SELECT * FROM tbl_jurusan";
                      foreach ($siswa->showData($query) as $value) {
                      	if($value['nama_jurusan']==$nama_jurusan){
                      		$selected = "selected";
                      	}else{
                      		$selected = "";
                      	}
                        ?>
                        <option value="<?=$value['nama_jurusan']?>" <?php print($selected); ?>><?=$value['nama_jurusan'];?></option>
                        <?php
                      }
                      ?>                  
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><input class="form-control" type="text" readonly value="<?=$tempat_lahir;?>" name="tempat_lahir"></td>
                </tr>
                <tr>
                  <td> Tanggal Lahir</td>
                  <td><input class="form-control" type="date" readonly name="tgl_lahir" value="<?=$tgl_lahir;?>"></td>
                </tr>
                <tr>
                  <td>Nama Orang Tua</td>
                  <td><input class="form-control" type="text" readonly name="nama_orang_tua" value="<?=$nama_orang_tua;?>"></td>
                </tr>
                <tr>
                  <td>Sekolah Asal</td>
                  <td><input class="form-control" type="text" readonly name="sekolah_asal" value="<?=$sekolah_asal;?>"></td>
                </tr>
                <tr>
                  <td>Nomor Peserta Ujian</td>
                  <td><input class="form-control" type="text" readonly name="nomor_peserta" value="<?=$nomor_peserta;?>"></td>
                </tr>
                <tr>
                  <td>Tahun Lulus</td>
                  <td><input class="form-control" type="date" readonly name="tahun_lulus" value="<?=$tahun_lulus;?>"></td>
                </tr>
                <tr>
                  <td>Kepala Sekolah</td>
                  <td><input class="form-control" type="text" readonly name="kepala_sekolah" value="<?=$kepala_sekolah;?>"></td>
                </tr>
                <tr>
                  <td>Nomor Ijazah</td>
                  <td><input class="form-control" type="text" placeholder="No. DN-XX Mk XXXXXXXX" readonly name="nomor_ijazah" value="<?=$nomor_ijazah;?>"></td>
                </tr>
                <tr>
                  <td>Nilai Akhir</td>
                  <td><input class="form-control" type="text" placeholder="Nilai Akhir" readonly  name="nilai_rata_rata" value="<?=$nilai_rata_rata;?>"></td>
                </tr>
                <tr>
                  <td>Kondisi</td>
                 <td> <select class="form-control" name="kondisi" style="width: 300px">
                      <option value="<?=$kondisi;?>">-Pilih Kondisi- || <?=$kondisi;?></option>  
                      
                        <option value="Belum Bekerja">Belum bekerja</option>
                        <option value="Bekerja">Bekerja</option>
                        <option value="Kuliah">Kuliah</option>
  
                    </select>           
                    </td>   
                      </tr>

                <tr>
                  <td>Detail Kondisi</td>
                  <td><textarea class="form-control" placeholder="instansi" name="detail_kondisi"><?=$detail_kondisi;?></textarea></td>
                </tr>
                <tr>
                  <td>Keterangan Kemampuan</td>
                  <td><textarea class="form-control" name="keterangan"><?=$keterangan;?></textarea></td>
                </tr>
                <tr>
                  <td>Foto</td>
                  <td>
                  <?php 
                  if ($foto==true) {
                  	$image = 'siswa/'.$foto;
                  }else{
                  	$image = 'profile.png';
                  }
                  ?>
                  <img src="../images/<?=$image;?>" class="img-responsive" alt="Cinque Terre" width="150" height="150"><input type="hidden" name="poto_lama" value="<?=$foto;?>"><br>
                  <input type="file" name="foto"><font color="red"> *contoh format nama file: tahunlulus_jurusan_nama.jpg/png</font></td>
                </tr>

                <tr>
                  <td colspan="2" align="center">
                    <button type="submit" class="btn btn-primary" name="btn-edit">
                      <span class="glyphicon glyphicon-plus"></span> Simpan
                    </button>
                    <a href="?module=siswa" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp;Kembali</a>
                  </td>
                </tr>
  						</table>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </body>