<?php

include 'koneksi.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$mapel = $_POST['mapel'];
$nilai_p = $_POST['nilai_p'];
$predikat_p ="";
$nilai_k = $_POST['nilai_k'];
$predikat_k ="";
$uts = $_POST['uts'];
$uas = $_POST['uas'];
$keterangan ="";
$rata_rata ="";


$inputBerhasil = "Data Yang Anda Masukan Berhasil";
$balikInsert = "</br><a href='insertNilai.php'>Back </a>";
$viewAllSiswa = "</br><a href='viewNilai.php'>View All </a>";

$predikat_p = predikat($nilai_p);
$predikat_k = predikat ($nilai_k);
$rata_rata = ($nilai_p +$nilai_k +$uts +$uas)/4;
if($rata_rata>=70){
  $keterangan = "Lulus";
}else{
  $keterangan = "TidakLulus";
}
$sql = "INSERT INTO data_nilai (nis,
nama,
kelas,
 nilai_p,
 predikat_p,
 nilai_k,
 predikat_k, 
 nilai_uts,
 nilai_uas,
 rata_rata,
 keterangan,
 mapel)
VALUES ('$nis', 
'$nama', 
'$kelas',
'$nilai_p',
'$predikat_p',
 '$nilai_k',
 '$predikat_k',
 '$uts',
 '$uas',
 '$rata_rata',
 '$keterangan',
 '$mapel')";

if (mysqli_query($db, $sql) === TRUE) {
    $content1="<h1>Data Yang Anda Masukan Telah Berhasil<h1></br>";
	$content="$viewAllSiswa";
} else {
  echo $sql;
    $content1="<h1>Mohon isi full data<h1>";
	$content="$balikInsert";
}

 
function predikat($nilaiMasuk){
	if ($nilaiMasuk >= 90)
        {
          $predikatHasil = "A";
          
		  
        }
        else if ($nilaiMasuk  >= 80)
        {
          $predikatHasil = "B";
        
        }
        else if ($nilaiMasuk  >= 75)
        {
          $predikatHasil = "C";
          
        }
        else if ($nilaiMasuk  >= 60)
        {
          $predikatHasil = "D";
          
        }
        else
        {
          $predikatHasil = "D";
           
        }
		return $predikatHasil;
}


?>
<html>
<head>
<title>Record Insert Siswa</title>
<link rel="stylesheet" href="insertSiswaPhp.css"/>
</head>
<body>
<center>
<div id="content">
<?=$content1?>
<?=$content?>
</div>
</center>
</body>
</html>