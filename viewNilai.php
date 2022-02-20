<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'koneksi.php';

$dataHeadTable = "<table>
  <tr>
    <th>Nis</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>mapel</th>
    <th>nilai pengetahuan</th>
    <th>predikat pengetahuan</th>
    <th>nilai keterampilan</th>
    <th>predikat pengetahuan</th>
    <th>nilai uts</th>
    <th>nilai uas</th>
    <th>rata rata</th>
    <th>keterangan</th>
	<th>Delete</th>
	<th>Edit</th>
  </tr>";
  
  $data ="<tr> ";


$sql = "SELECT nis, 
nama,
kelas,
mapel,
nilai_p, 
predikat_p, 
nilai_k, 
predikat_k, 
nilai_uts, 
nilai_uas, 
rata_rata, 
keterangan
FROM data_nilai";

$result = mysqli_query($db, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $nisSiswa = $row['nis'];
		$datatr = $datatr . "<tr>";
		
		$datatr = $datatr . "<td>" . $row['nis'] . "</td>";
		$datatr = $datatr . "<td>" . $row['nama']."</td>";
		$datatr = $datatr . "<td>" . $row['kelas']."</td>";
		$datatr = $datatr . "<td>" . $row['mapel']."</td>";
		$datatr = $datatr . "<td>" . $row['nilai_p']."</td>";	
		$datatr = $datatr . "<td>" . $row['predikat_p']."</td>";
		$datatr = $datatr . "<td>" . $row['nilai_k']."</td>";
		$datatr = $datatr . "<td>" . $row['predikat_k']."</td>";
		$datatr = $datatr . "<td>" . $row['nilai_uts']."</td>";
		$datatr = $datatr . "<td>" . $row['nilai_uas']."</td>";
		$datatr = $datatr . "<td>" . $row['rata_rata']."</td>";
		$datatr = $datatr . "<td>" . $row['keterangan']."</td>";
		$datatr = $datatr . "<td><a href='DeleteNilai.php?nis=$nisSiswa'>Delete</a></td>";
		$datatr = $datatr . "<td><a href='EditNilai.php?nis=$nisSiswa'>Edit</a></td>";
		$datatr = $datatr . "</tr>";
    }
	$dataHeadTable = $dataHeadTable . $datatr . "</table>";
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
		<th scope="col">Nis</th>
		<th scope="col">Nama</th>
		<th scope="col">Kelas</th>
		<th scope="col">Mapel</th>
		<th scope="col">Nilai pengetahuan</th>
    <th scope="col">Predikat Nilai pengetahuan</th>
    <th scope="col">Nilai keterampilan</th>
    <th scope="col">Predikat Nilai keterampilan</th>
    <th scope="col">Nilai uts</th>
    <th scope="col">Nilai uas</th>
    <th scope="col">Nilai rata rata</th>
		<th scope="col">keterangan</th>
	
		<th scope="col">Tindakan</th>
  </tr>
  <tr>
	<?= $datatr ?>
  </tr>	
</thead>
</div>


</body>
</html>