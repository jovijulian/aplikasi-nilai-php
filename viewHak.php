<?php

include 'koneksi.php';

$dataHeadTable = "<table>
  <tr>
    <th>Id</th>
    <th>Nama</th>
    <th>Username</th>
    <th>password</th>
    <th>level</th>
	<th>Delete</th>
	<th>Edit</th>
  </tr>";
  
  $data ="<tr> ";

$sql = "SELECT id_user, nama, username, password, level FROM login";

$result = mysqli_query($db, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id_user = $row['id_user'];
		$data = $data . "<tr>";
		
		$data = $data . "<td>" . $row['id_user'] . "</td>";
		$data = $data . "<td>" . $row['nama']."</td>";
		$data = $data . "<td>" . $row['username']."</td>";	
		$data = $data . "<td>" . $row['password']."</td>";
		$data = $data . "<td>" . $row['level']."</td>";
		$data = $data . "<td>";
		$data = $data . "<a href='DeleteHak.php?id_user=$id_user'>Delete</a>  | ";
		$data = $data . "<a href='EditHak.php?id_user=$id_user'>Edit</a>";
		$data = $data . "</td>";
		$data = $data . "</tr>";
    }
	$dataHeadTable = $dataHeadTable . $data . "</table>";
} else {
    echo "0 results";
}

//echo $dataHeadTable;
//echo $linkKeHome;
?>

<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="jquery.min.js">
 <script src="js/bootstrap.min.js">
 </script>
<head>
<title>Data Product</title>
<link rel="stylesheet" >
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
       <form class="form-inline">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <li class="nav-item active">
        <a class="nav-link" href="insertSiswa.php">Input Siswa <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="viewSiswa.php">View Siswa</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Input Nilai Siswa</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">View Nilai Siswa</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Input User</a>
            <a class="dropdown-item" href="#">View User</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
          
        </div>
      </li>
    </ul>
  </div>
</nav>	
<div class="container-fluid">
<table class="table">
  <thead class="thead-light">
	<tr>	
		<th scope="col">id</th>
		<th scope="col">Nama</th>
		<th scope="col">username</th>
		<th scope="col">password</th>
		<th scope="col">level </th>
		
	
		<th scope="col">Tindakan</th>
  </tr>
  <tr>
	<?= $data?>
  </tr>	
</thead>
</div>


</body>
</html>