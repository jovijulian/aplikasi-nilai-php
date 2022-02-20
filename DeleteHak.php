<?php
include 'koneksi.php';

$id_user = $_GET['id_user'];

$sql = "DELETE FROM login where id_user='$id_user'";
if ( mysqli_query($db, $sql) === true){
    $content1 ="<h1>Berhasil Dihapus </h1> </br>";
    $content2 ="<a href='viewHak.php'>Back</a>"; 
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