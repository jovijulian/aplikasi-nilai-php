<?php

include 'koneksi.php';

$linkKeTable = "</br><a href='viewHak.php'>Back</a>";

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "UPDATE login SET id_user='$id_user',
nama='$nama',
username='$username',
password='$password',
level='$level'
WHERE id_user='$id_user'";

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