<?php

include 'koneksi.php';
$sql = "SELECT id_user,nama,username,password,level FROM login WHERE id_user = '".$_GET['id_user']."'";

$result = mysqli_query($db, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$id_user =$row['id_user'];
		$nama =$row['nama'];	
        $username =$row['username'];
        $password =$row['password'];
        $level =$row['level'];
			
    }
} else {
    echo "0 results";
}

?>

<html>
<head>
<title>Edit Hak</title>
</head>
<center>
<h1>Edit</h1>
<body>
<p>Edit User</p>
<form action="UpdateHak.php" method="post">
<div id="formulir">
ID User:</br><input name="id_user" class="textField" type="text" readonly="true" value="<?= $_GET['id_user'] ?>"/></br>
nama:</br><input name="nama" class="textField" type="text" value="<?= $nama?>" /></br>
username:</br><input name="username" class="textField" type = "text" value="<?= $username ?>" /></br>
password :</br><input name="password" class="textField" type="text" value="<?= $password ?>" /></br>
level :</br><input name="level" class="textField" type="text" value="<?= $level ?>" /></br>

<input class="textField" type="submit" value="Save"/>
</div>
</form>
</body></center>

</html>
