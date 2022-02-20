<html>
<head>
<title></title>
<script type="text/javascript" src="query.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>    
</head>
<body>
<form action="HakProses.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return cekform()">
<div class="form-group col-sm-8">
    <label>ID User</label>
    <input type="id_user" name="id_user" class="form-control" id="id_user"  placeholder="Enter id">
  </div> 
  <div class="form-group col-sm-8">
    <label>Nama</label>
    <input type="nama" name="nama" class="form-control" id="nama"  placeholder="Enter nama">
  </div>
  <div class="form-group col-sm-8">
    <label>Username</label>
    <input type="username" name="username" class="form-control" id="username" placeholder="Enter username">
  </div>
  <div class="form-group col-sm-8">
    <label>Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
  </div>
  <div class="form-group col-sm-8">
    <select name="level" class="custom-select mb-3">
        <option selected>Pilih Level</option>
        <option value="admin">admin</option>
</select>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href ="home.php" button type="submit" class="btn btn-primary">Back</a>
</form>

</body>
</html>