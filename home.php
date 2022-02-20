<?php
include 'koneksi.php';
?>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="tampilanCss.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
  crossorigin="anonymous"></script>
</head>

<body>
  <div class="container" align="center">
    <h1>
      <center>Project PHP </center>
    </h1>

    <nav class="navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Menu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item active">
            <a class="nav-link" href="insertSiswa.php">Input Data Siswa <span class="sr-only"></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="viewSiswa.php">View Data Siswa</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="InsertNilai.php">Input Nilai Siswa</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="viewNilai.php">View Nilai Siswa</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Others
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="InputHak.php">Input Hak akses</a>
              <a class="dropdown-item" href="viewHak.php">View Hak Akses</a>
              <a class="dropdown-item" href="logout.php">Logout</a>

            </div>
          </li>
        </ul>
      </div>
    </nav>

    <?php if(!isset($_GET['q'])):?>
    <form name="form1" method="get" action="">

    <form class="form-inline">
  <input class="form-control col-sm-8" type="search" placeholder="Masukan Nis / Nama" aria-label="Search" name="q" id="q">
   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 </form>
    </form>

    <div id="result"></div>
    <script type="text/javascript">
      var allow = true;
      $(document).ready(function () {
        $("#q").keyup(function (e) {
          if (e.which == '13') {
            e.preventDefault();

            loadData();
          } else if ($(this).val().length >= 0) {

            loadData();
          }
        });
      });

      function loadData() {
        var query = document.getElementById('q').value;
        if (allow) {
          allow = false;
          $("#result").html('loading...');
          $.ajax({
            url: 'home.php?q=' + query,
            success: function (data) {
              var receivedData = $('<div>' + data + '</div>').find('#search-result');
              $("#result").html(receivedData);
              allow = true;
            }
          });
        }
      }
    </script>
    <?php endif;?>
    <style>
      .highlight
{
background: #CEDAEB;
}

.highlight_important
{
background: #9afa95;
}
			
table {
    border-collapse: collapse;
}

table, th ,td {
    border: 1px solid black;
}
table {
    width: 20%;
}

th,td {
    height: 50px;
}
th,td {
    text-align: center;
}
th,td {
    height: 30px;
    vertical-align: bottom;
}
th,td {
    padding: 10px;
}
table, th ,td{
	border: 1px solid green;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
}

</style>

<?php 
//Fungsi Mark Teks
function hightlight($str, $keywords = '')
{
$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

$style = 'highlight';
$style_i = 'highlight_important';

/* Apply Style */

$var = '';

foreach(explode(' ', $keywords) as $keyword)
{
$replacement = "<span class='".$style."'>".$keyword."</span>";
$var .= $replacement." ";

$str = str_ireplace($keyword, $replacement, $str);
}
$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
return $str;
}

//END Fungsi Mark Teks
if(isset($_GET['q']) && $_GET['q']){ 
 mysqli_select_db($db,"project"); 
 $q = $_GET['q'];
 
//Menghitung Jumlah Yang Tampil 

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10000;
$mulai_dari = $limit * ($page - 1);
$sqlCount = "select count(nis) from data_nilai where nis like '%$q%' or nama like '%$q%'";
$rsCount = mysqli_fetch_array(mysqli_query($db,$sqlCount));
$banyakData = $rsCount[0];
$sql = "select * from data_nilai where nis like '%$q%' or nama like '%$q%' order by nis ASC limit $mulai_dari, $limit"; 
//Akhir Menghitung Jumlah Yang Tampil 
 $result = mysqli_query($db,$sql);
 

 if(mysqli_num_rows($result) > 0){ 
 ?>
    <?php if(isset($_GET['page'])):?>
    <form name="form1" method="get" action="">
      <table>
        <td>Search: </td>
        <td><textarea name="q" rows="1" id="q"></textarea></td>
        <td><input type="submit" value="Search" /></td>
      </table>
    </form>
    <?php endif;?>
    <div class="table" id="search-result">

      <form action="export.php" method="post">
        <input type="hidden" name="sql" value="<?php echo $sql ?>">
        <input type="submit" value="Export Excel" class="btn btn-default">
      </form>
      <table class="table" border="1">
        <tr bgcolor="red">
          <td>NO</td>
          <td>NIS</td>
          <td>Nama Siswa</td>
          <td>Kelas</td>
          <td>Mapel</td>
          <td>Nilai Pengetahuan</td>
          <td>Predikat Nilai Pengetahuan</td>
          <td>Nilai Pengetahuan</td>
          <td>Predikat Nilai Pengetahuan</td>
          <td>Nilai uts</td>
          <td>Nilai uas</td>
          <td>Nilai rata rata</td>
          <td>Keterangan</td>

        </tr>
        <?php 
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  while($siswa = mysqli_fetch_array($result)){ 
 $i++;
?>
        <tr>
          <td>
            <?php echo hightlight ($i,$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['nis'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['nama'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['kelas'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['mapel'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['nilai_p'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['predikat_p'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['nilai_k'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['predikat_k'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['nilai_uts'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['nilai_uas'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['rata_rata'],$q);?>
          </td>
          <td>
            <?php echo hightlight($siswa['keterangan'],$q);?>
          </td>
        </tr>
        <?php }?>
      </table>
      <?php 
 }else{ 
 echo '<div id="search-result">Data Tidak Ada</div>'; 
 } 
 //Halaman
 $banyakHalaman = ceil($banyakData / $limit);
echo '</br><div id="page" style="font-size:17px">Halaman: ';
for($i = 1; $i <= $banyakHalaman; $i++){
 if($page != $i){
 echo '  [<a href="home.php?page='.$i.'&q='.$q.'">'.$i.'</a>]  ';
 }else{
 echo "[<span style='color:silver'>$i</span>] ";
 }
}
echo '&nbsp&nbsp<a href="home.php?module=home"><b>Ulangi Pencarian</b></a>';
//END HALAMAN
} 
?>
</body>

</html>