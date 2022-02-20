<html>
<head>
<title></title>
<script type="text/javascript" src="jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>    
</head>
<body>
<form action="InsertNilai1.php" name="form1" method="post" enctype="multipart/form-data" onSubmit="return cekform()">
    
  <div class="form-group col-sm-8">
  <label>NIS</label>
 <td>  <?php
 include "koneksi.php";
 $hasil=mysqli_query($db," SELECT * from data_siswa where nis");
 $jsArray= "var Nama_prd1 = new Array();";
 echo '<select name="nis" onChange="changeValue(this.value)" id="id">';
 echo '<option>--Pilih Nis siswa--</option>';
 while ($row = mysqli_fetch_array($hasil)){
 echo '<option value ="'. $row['nis'].'">' . $row['nis'] . '</option>';
 $jsArray.= "Nama_prd1['". $row['nis']."'] = {name0:'". addslashes($row['nama']) . "',name:'". addslashes($row['kelas']) . "' };";
 }
 echo '</select>';
 ?><script type="text/javascript">
 <?php echo $jsArray; ?>
 function changeValue(id){
 document.getElementById('nama').value= Nama_prd1[id].name0;
 document.getElementById('kelas').value= Nama_prd1[id].name;

 };
 </script>
  </div>
  <div class="form-group col-sm-8">
    <label>Nama</label>
    <input type="nama" name="nama" class="form-control" id="nama" placeholder="Enter nama" readonly>
  </div>
  <div class="form-group col-sm-8">
    <label>Kelas</label>
    <input type="kelas" name="kelas" class="form-control" id="kelas" placeholder="Enter kelas" readonly>
  </div>
  <div class="form-group col-sm-8">
  <label>Mapel</label>
  <select name="mapel" class="custom-select mb-3">
        <option selected>Mapel</option>
        <option value="Grafik">Grafik</option>
        <option value="B.inggris">B.inggris</option>
        <option value="Olahraga">Olahraga</option>
        <option value="B.indo">B.indo</option>
        <option value="Agama">Agama</option>
        <option value="PKN">PKN</option>
        <option value="Java D">Java D</option>
        <option value="Php">Php</option>
        <option value="DataBase">DataBase</option>
        <option value="Pkk">Pkk</option>
        <option value="MTK">MTK</option>
        <option value="Android">Android</option>
        <option value="KWU">KWU</option>
        <option value="PP">PP</option>
</select>
  </div>
  <div class="form-group col-sm-8">
    <label >Nilai Pengetahuan</label>
    <input type="nilai_p" name="nilai_p" class="form-control" id="nilai_p" placeholder="Enter Nilai">
  </div>
  <div class="form-group col-sm-8">
    <label >Nilai Keterampilan</label>
    <input type="nilai_k" name="nilai_k" class="form-control" id="nilai_k" placeholder="Enter Nilai">
  </div>
  <div class="form-group col-sm-8">
    <label >Nilai UTS</label>
    <input type="uts" name="uts" class="form-control" id="no_tlp" placeholder="Enter No Telepon">
  </div>
  <div class="form-group col-sm-8">
    <label >Nilai UAS</label>
    <input type="uas" name="uas" class="form-control" id="no_tlp" placeholder="Enter No Telepon">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href ="home.php" button type="submit" class="btn btn-primary">Back</a>
</form>

</body>
</html>