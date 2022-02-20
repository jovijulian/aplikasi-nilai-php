<?php 
//memanggil fungsi
include 'fungsi.php';

//koneksi ke database dan jalankan query
include 'koneksi.php';

mysqli_select_db($db,'project');

//ambil query dari sql yang dikirim oleh form
$sql = isset($_POST['sql'])?$_POST['sql']:'';

// masukkan sql ke dalam query
$result = mysqli_query($db,$sql);
!$result?die(mysqli_error()):'';

//pengaturan nama file
$namaFile = "data nilai.xls";
//pengaturan judul data
$judul = "DAFTAR DATA NILAI";
//baris berapa header tabel di tulis
$tablehead = 3;
//baris berapa data mulai di tulis
$tablebody = 3;
//no urut data
$no_urut = 1;

//penulisan header
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=".$namaFile."");
header("Content-Transfer-Encoding: binary ");


xlsBOF();
 
xlsWriteLabel(0,0,$judul);  

$kolomhead = 0;
xlsWriteLabel($tablehead,$kolomhead++,"NO URUT");              
xlsWriteLabel($tablehead,$kolomhead++,"NIS");             
xlsWriteLabel($tablehead,$kolomhead++,"NAMA SISWA");
xlsWriteLabel($tablehead,$kolomhead++,"KELAS ");              
xlsWriteLabel($tablehead,$kolomhead++,"MAPEL");             
xlsWriteLabel($tablehead,$kolomhead++,"NILAI PENGETAHUAN");
xlsWriteLabel($tablehead,$kolomhead++,"PREDIKAT NILAI PENGETAHUAN");
xlsWriteLabel($tablehead,$kolomhead++,"NILAI KETERAMPILAN");
xlsWriteLabel($tablehead,$kolomhead++,"PREDIKAT NILAI KETERAMPILAN");
xlsWriteLabel($tablehead,$kolomhead++,"NILAI UTS");
xlsWriteLabel($tablehead,$kolomhead++,"NILAI UAS");
xlsWriteLabel($tablehead,$kolomhead++,"RATA RATA");
xlsWriteLabel($tablehead,$kolomhead++,"KETERANGAN ");

while ($data = mysqli_fetch_array($result))
{
$kolombody = 0;

//gunakan xlsWriteNumber untuk penulisan nomor dan xlsWriteLabel untuk penulisan string
xlsWriteNumber($tablebody,$kolombody++,$no_urut);
xlsWriteNumber($tablebody,$kolombody++,$data['nis']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama']);
xlsWriteLabel($tablebody,$kolombody++,$data['kelas']);
xlsWriteLabel($tablebody,$kolombody++,$data['mapel']);
xlsWriteNumber($tablebody,$kolombody++,$data['nilai_p']);
xlsWriteNumber($tablebody,$kolombody++,$data['predikat_p']);
xlsWriteNumber($tablebody,$kolombody++,$data['nilai_k']);
xlsWriteNumber($tablebody,$kolombody++,$data['predikat_k']);
xlsWriteNumber($tablebody,$kolombody++,$data['nilai_uts']);
xlsWriteNumber($tablebody,$kolombody++,$data['nilai_uas']);
xlsWriteNumber($tablebody,$kolombody++,$data['rata_rata']);
xlsWriteNumber($tablebody,$kolombody++,$data['keterangan']);



$tablebody++;
$no_urut++;
}

xlsEOF();
exit();
