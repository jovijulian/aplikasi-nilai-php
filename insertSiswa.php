<html>
<head>
<title></title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>    
</head>
<body>
<form action="insertSiswa1.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return cekform()">
    
  <div class="form-group col-sm-8">
    <label>NIS</label>
    <input type="nis" name="nis" class="form-control" id="nis"  placeholder="Enter nis">
  </div>
  <div class="form-group col-sm-8">
    <label>Nama</label>
    <input type="nama" name="nama" class="form-control" id="nama" placeholder="Enter nama">
  </div>
  <div class="form-group col-sm-8">
    <label>Kelas</label>
    <input type="kelas" name="kelas" class="form-control" id="kelas" placeholder="Enter kelas">
  </div>
  <div class="form-group col-sm-8">
    <label>Alamat</label>
    <input type="alamat" name="alamat" class="form-control" id="alamat" placeholder="Enter alamat">
  </div>
  <div class="form-group col-sm-8">
    <label >No Telepon</label>
    <input type="no_tlp" name="no_tlp" class="form-control" id="no_tlp" placeholder="Enter No Telepon">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href ="home.php" button type="submit" class="btn btn-primary">Back</a>
</form>

</body>
</html>