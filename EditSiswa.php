<?php

include 'koneksi.php';
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 
$nis = $_GET['nis'];
$sql = "SELECT nis, nama, kelas, alamat, no_tlp FROM data_siswa WHERE nis = '$nis'";

$result = mysqli_query($db, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$nis = $row['nis'];
		$nama =$row['nama'];	
        $kelas =$row['kelas'];
        $alamat =$row['alamat'];
        $no_tlp =$row['no_tlp'];
			
    }
} else {
    echo "0 results";
}



?>

<html>
<head>
<title>Edit Siswa</title>
</head>
<center>
<h1>Edit</h1>
<body>
<p>Edit Siswa Data siswa</p>
<form action="UpdateSiswa.php" method="post">
<div id="formulir">
NIS:</br><input name="nis" class="textField" type="text" readonly="true" value="<?= $_GET['nis'] ?>"/></br>
nama:</br><input name="nama" class="textField" type="text" value="<?= $nama?>" /></br>
kelas:</br><input name="kelas" class="textField" type = "text" value="<?= $kelas ?>" /></br>
alamat :</br><input name="alamat" class="textField" type="text" value="<?= $alamat ?>" /></br>
No Telepon :</br><input name="no_tlp" class="textField" type="text" value="<?= $no_tlp ?>" /></br>

<input class="textField" type="submit" value="Save"/>
</div>
</form>
</body></center>

</html>
