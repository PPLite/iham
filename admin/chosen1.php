


<!DOCTYPE html>
<html>
<head>
 <title>maribelajarcoding.com</title>
<?php 
 mysql_connect("localhost","root","");
 mysql_select_db("provinsi");
?>
</head>
<body>
 <h2>maribelajarcoding.com</h2>
 <form method="POST">
 <select name="nama_ibu" id="nama_ibu">
  <option disabled selected> Pilih </option>
 <?php 
  $sql=mysql_query("SELECT * FROM tb_stat_anak");
  while ($data=mysql_fetch_array($sql)) {
 ?>
   <option value="<?=$data['nama_ibu']?>"><?=$data['nama_ibu']?></option> 
 <?php
  }
 ?>
</select>
  <input type="submit" name="simpan" value="Simpan">
</form>
<?php
 if (isset($_POST['simpan'])) {
  echo "<br>Data yang dipilih:<br>";
  echo $_POST['nama_ibu'];
 }
?>
</body>
</html>