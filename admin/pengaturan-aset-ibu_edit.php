<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!--Bagian atas -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah Pengguna</h6>
    </div>
<div class="card-body">
<!---Akhir bagian atas---->


<?php
//inisialisasi sambungan ke database
$connection = mysqli_connect("localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");
//Ngambil data dari database----->
// Pakai kodingan PHP----->
if (isset($_POST['editasetbayi_btn']))
{
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM tb_stat_anak WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    foreach($query_run as $row)
    {
?>
    <form action="code.php" method="POST">
    <!---Fungsi kok di hidden supaya kolom "id" tidak dapat di edit/ disembunyikan--->
    <!--- Jika diganti menjadi "text" "id" menjadi dapat diedit--->
    <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">

<!---Tabel untuk pengguna yang akan di edit---->
<!---Mengambil data spesifik dari database---->
    <div class="form-group">
        <label> Kode UID </label>
        <input type="text" name="edit_username" value="<?php echo $row['rfid_uid']?>" class="form-control" placeholder="Masukkan kode UID">
    </div>
    <div class="form-group">
        <label>Id Pengenal</label>
        <input type="email" name="update_id_pengenal" value="<?php echo $row['email']?>" class="form-control" placeholder="Masukkan Nomor KTP">
    </div>
    <div class="form-group">
        <label>Nama Anak</label>
        <input type="password" name="update_nama_anak" value="<?php echo $row['nama_anak']?>" class="form-control" placeholder="Masukkan Nama Anak">
    </div>
    <div class="form-group">
        <label>Nama Ibu</label>
        <input type="password" name="update_nama_ibu" value="<?php echo $row['nama_ibu']?>" class="form-control" placeholder="Masukkan Nama ibu">
    </div>
    <div class="form-group">
        <label>Penanggung Jawab</label>
        <input type="text" name="update_penanggung_jawab" value="<?php echo $row['penanggung_jawab']?>" class="form-control" placeholder="Masukkan Penanggung Jawab" required>
    </div>
    <div class="form-group">
         <label>Alamat</label>
        <input type="text" name="update_alamat" value="<?php echo $row['alamat']?>" class="form-control" placeholder="Masukkan Alamat" required>
    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="update_status" class="form-control" >
                          <option value="masuk"> Masuk </option>   
                          <option value="checkin"> Check In </option>
                          <option value="perawatan"> Perawatan </option>
                          <option value="checkout"> Check Out </option>
                          <option value="peringatan"> Peringatan </option>
                          <option value="validasi"> Validasi </option>
                        </select>
                    </div>   

<!---Tombol untuk hapus dan simpan perubahan editing pengguna-->
<a href="register.php" class="btn btn-danger"> Batalkan</a>
<button type="submit" name="updatebtn" class="btn btn-primary"> Perbarui </button>

  </div>
  </div>
</div>


<?php 
    }
}
?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>