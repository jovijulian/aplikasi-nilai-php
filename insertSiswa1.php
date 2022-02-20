<?php

include 'koneksi.php';

$nisDapat = $_POST['nis'];
$namaDapat = $_POST['nama'];
$kelasDapat = $_POST['kelas'];
$alamatDapat = $_POST['alamat'];
$no_tlpDapat = $_POST['no_tlp'];

$inputBerhasil = "Data Yang Anda Masukan Berhasil";
$balikInsert = "</br><a href='insertSiswa.php'>Back </a>";
$viewAllSiswa = "</br><a href='viewSiswa.php'>View All </a>";

$sql = "INSERT INTO data_siswa (nis,nama,kelas,alamat,no_tlp)
VALUES ('$nisDapat', '$namaDapat', '$kelasDapat', '$alamatDapat', '$no_tlpDapat')";

$exec = mysqli_query($db, $sql);

if ($exec === TRUE) {
    $content1="<h1>Data Yang Anda Masukan Telah Berhasil<h1></br>";
	$content="$viewAllSiswa";
} else {
    $content1="<h1>Mohon isi full data<h1>";
	$content="$balikInsert";
}

?>
<html>
<head>
<title>Record Insert Siswa</title>
<link rel="stylesheet" href=""/>
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