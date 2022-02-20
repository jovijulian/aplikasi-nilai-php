<?php

include 'koneksi.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$linkKeTable = "</br><a href='viewSiswa.php'>Back</a>";

$sql = "UPDATE data_siswa SET `nama`='$nama',
`kelas`='$kelas',
`alamat`='$alamat',
`no_tlp`='$no_tlp'
WHERE `nis`='$nis'";

if (mysqli_query($db, $sql) === TRUE) {
    $content1 = "<h1>Record updated! successfully</h1>";
	$content2 = $linkKeTable;
} else {
    $content1 = "Error: " . $sql . "<br>" . $db->error;
}





?>
<html>
<head>
<title>Update</title>
<link rel="stylesheet" href="update.css"/>
</head>
<body>

<center>
<div id="content">
<?= $content1 ?> 
<?= $content2 ?> 
</div>
</center>
</body>
</html>