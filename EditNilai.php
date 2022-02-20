<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include 'koneksi.php';
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$nis = $_GET['nis'];
$sql = "SELECT nis, nama, kelas, mapel, nilai_p, predikat_p, nilai_k, predikat_k, nilai_uts, nilai_uas, rata_rata, keterangan FROM data_nilai WHERE nis = '$nis'";

$result = mysqli_query($db, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
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
			
    }
} else {
    echo "0 results";
}




?>

<html>
<head>
<title>Edit Nilai</title>
</head>
<center>
<h1>Edit</h1>
<body>
<p>Edit Nilai Data siswa</p>
<form action="UpdateNilai.php" method="post">
<div id="formulir">
NIS:</br><input name="nis" class="textField" type="text" readonly="true" value="<?= $_GET['nis'] ?>"/></br>
Mapel:</br><input name="mapel" class="textField" type="text" value="<?= $mapel?>" /></br>
Nama:</br><input name="nama" class="textField" type = "text" value="<?= $nama ?>" /></br>
Nilai Pengetahuan:</br><input name="nilai_p" class="textField" type="text" value="<?= $nilai_p ?>" /></br>
Nilai Keterampilan:</br><input name="nilai_k" class="textField" type="text" value="<?= $nilai_k ?>" /></br>
Nilai UTS:</br><input name="nilai_uts" class="textField" type="text" value="<?= $uts ?>" /></br>
Nilai Uas:</br><input name="nilai_uas" class="textField" type="text" value="<?= $uas ?>" /></br>
Kelas:</br><input name="kelas" class="textField" type="text" value="<?= $kelas ?>" /></br>
<input class="textField" type="submit" value="Save"/>
</div>
</form>
</body></center>

</html>
