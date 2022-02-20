<?php

include 'koneksi.php';
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$mapel = $_POST['mapel'];
$kelas = $_POST['kelas'];
$nilai_p = $_POST['nilai_p'];
$nilai_k = $_POST['nilai_k'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];
$rata_rata ="";
$keterangan ="";
$linkKeTable = "</br><a href='viewNilai.php'>Back</a>";

$predikat_p = predikat($nilai_p);
$predikat_k = predikat($nilai_k);
$rata_rata = ($nilai_p +$nilai_k +$nilai_uts +$nilai_uas)/4;

		
		if($rata_rata>=70){
			$keterangan = "Lulus";
		}else{
			$keterangan = "TidakLulus";
		}




$sql = "UPDATE data_nilai SET `nama`='$nama',
`mapel`='$mapel',
`kelas`='$kelas',
`nilai_p`='$nilai_p',
`predikat_p`='$predikat_p',
`nilai_k`='$nilai_k',
`predikat_k`='$predikat_k',
`nilai_uts`='$nilai_uts',
`nilai_uas`='$nilai_uas'
WHERE `nis`='$nis'";

if (mysqli_query($db, $sql) === TRUE) {
    $content1 = "<h1>Record updated! successfully</h1>";
	$content2 = $linkKeTable;
} else {
    $content1 = "Error: " . $sql . "<br>" . $db->error;
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