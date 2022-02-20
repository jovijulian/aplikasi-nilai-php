<?php

include 'koneksi.php';

$nis = $_GET['nis'];
$sql = "DELETE FROM data_nilai where nis='$nis'";
if ( mysqli_query($db, $sql) === true){
    $content1 ="<h1>Berhasil Dihapus </h1> </br>";
    $content2 ="<a href='viewNilai.php'>Back</a>"; 
}else{
    echo "error deleting " . $db->error;
}

?>
<html>
<head>
<title>Delete</title>
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