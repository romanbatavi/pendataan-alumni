<?php 
include_once 'inc/class.php';
$siswa = new siswa;

if (isset($_GET['nomor_ijazah'])) {
  $nomor_ijazah = $_GET['nomor_ijazah'];
  extract($siswa->getData($nomor_ijazah,'tbl_siswa','nomor_ijazah'));
}
require('pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('images/i2.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'SMK DINAMIKA PEMBANGUNAN 1 JAKARTA',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0214605887',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Kp. Pedaengan No.99, RT.2/RW.8, Penggilingan, Kec. Cakung, Kota Jakarta Timur, 13940,',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Email : smk_dp1jakarta@al-waysh9.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Alumni",0,5,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di Cetak Pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(4);
if ($foto==true) {
	  $image = 'siswa/'.$foto;
	}else{
	  $image = 'profile.png';
	}
$pdf->Image('images/'.$image,5,7,2,2);
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NIS                                 : $nis",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NISN                              : $nisn",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NAMA SISWA               : $nama_siswa",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"ALAMAT                       : $alamat",0,'L');
// $pdf->MultiCell(10,0.5,"$alamat",1,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NO TELP                      : $no_telp",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"TEMPAT LAHIR           : $tempat_lahir",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"TGL LAHIR                   : $tgl_lahir",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NAMA ORANG TUA    : $nama_orang_tua",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"SEKOLAH ASAL         : $sekolah_asal",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NOMOR PESERTA      : $nomor_peserta",0,'L');
$pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"TAHUN LULUS            : $tahun_lulus",0,'L');
$pdf->SetX(5);            
// $pdf->MultiCell(19.5,0.5,"KEPALA SEKOLAH    : $kepala_sekolah",0,'L');
// $pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NOMOR IJAZAH          : $nomor_ijazah",0,'L');
$pdf->SetX(5);            
// $pdf->MultiCell(19.5,0.5,"NILAI RATA_RATA     : $nilai_rata_rata",0,'L');
// $pdf->SetX(5);            
$pdf->MultiCell(19.5,0.5,"NAMA JURUSAN        : $nama_jurusan",0,'L');
$pdf->SetX(5);            
$pdf->Cell(4,0.5,"KEMAMPUAN            :",0,'C');
// $pdf->SetX(9);            
$pdf->MultiCell(10,0.5,"$keterangan",1,'L');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"Mengetahui",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40.5,0.7,"$kepala_sekolah",0,10,'C');

// $pdf->SetFont('Arial','B',10);
// $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
// $pdf->Cell(4, 0.8, 'Nama Lengkap', 1, 0, 'C');
// $pdf->Cell(3, 0.8, 'Nama Panggilan', 1, 0, 'C');
// $pdf->Cell(3, 0.8, 'Tmpt Lahir', 1, 0, 'C');
// $pdf->Cell(3, 0.8, 'Tgl Lahir', 1, 0, 'C');
// $pdf->Cell(2, 0.8, 'JK', 1, 0, 'C');
// $pdf->Cell(3, 0.8, 'Status', 1, 0, 'C');
// $pdf->Cell(7, 0.8, 'Kelas', 1, 1, 'C');
// $pdf->SetFont('Arial','',10);
// $no=1;
// $nomor_ijazah = $_GET['nomor_ijazah'];
// $query = "SELECT * from tbl_siswa WHERE nomor_ijazah=$nomor_ijazah";
// $stmt = $DB_con->prepare($query);
// $stmt->execute();
// while($lihat=$stmt->fetch(PDO::FETCH_ASSOC)){
	// $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	// $pdf->Cell(4, 0.8, '$nama_siswa',1, 0, 'C');
	// $pdf->Cell(3, 0.8, '$jurusan',1, 0, 'C');
	// $pdf->Cell(3, 0.8, '$tempat_lahir', 1, 0,'C');
	// $pdf->Cell(3, 0.8, $lihat['tgl_lahir'],1, 0, 'C');
	// $pdf->Cell(2, 0.8, $lihat['jk'], 1, 0,'C');
	// $pdf->Cell(3, 0.8, $lihat['status'],1, 0, 'C');
	// $pdf->Cell(7, 0.8, $lihat['kelas'], 1, 1,'C');

// 	$no++;
// }

$pdf->Output("siswa_$nomor_ijazah.pdf","I");

?>