<?php

include 'koneksi.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$sql = "INSERT INTO login (id_user, nama, username, password, level)
VALUES ('$id_user','$nama', '$username', '$password', '$level')";

if (mysqli_query($db, $sql) === TRUE) {
    header('Location: viewHak.php?status=sukses');
} else {
    header('Location: InputHak.php?status=gagal');
}

?>