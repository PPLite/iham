<?php
include_once('security.php');
include_once('database/dbconfig.php');

////////////////////////BAGIAN LOGIN/////////////////////////////////
//fungsi akan aktif jika tombol login dipencet
if(isset($_POST['login_btn']))
{
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];
    $usertype = $_POST['usertype'];

    //untuk nyari "select" dari semua data"* dari tabel "register" dan, cocokin dari tambel kolom "email"
    //terus cocokin dengan form "email" sama juga dengan password
    $query = "SELECT * from register WHERE username='$username_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);
    $usertype = mysqli_fetch_array($query_run);
    //seperti biasa, logika if else    

    //jika admin maka masuk ke index.php
    if($usertype['usertype'] == "admin")
    {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "Admin";
        header('Location: index.php');
    }

    //jika tipe pengguna pengelola maka masuk ke register_edit.php
    else if ($usertype ['usertype'] == "pengelola")
    {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "pengelola";
        header('Location: register_edit.php');
    }

    //jika tipe pengguna "pengguna" maka masuk ke register.php
    else if ($usertype ['usertype'] == "pengguna")
    {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "Pengguna";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Email / Password anda Salah";
        header('Location: login.php');
    }

}

////////////////////////////////////////////////////////////////////

/////////////////////////////PENGATURAN PENGGUNA/////////////////////
////////TAMBAH PENGGUNA/////////
if(isset($_POST['registerbtn']))

//jika sudah ditombol kemudian
{
    //input data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if($password === $cpassword)
    {
         //data yang tadi, dimasukkan ke database dewngan perintah "insert into" karena data tersebut data baru, dan diletakkan ke tabel yang udah disediakan
        $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
        $_SESSION['success'] = "Pengguna berhasil ditambahkan";
        header('location: register.php');
        }
        else
        {
        $_SESSION['status'] = "Pengguna gagal ditambahkan";
        header('location: register.php');
        }
    }
    else 
    {
        $_SESSION['status'] = "Password tidak sesuai";
        header('location: register.php');
    }
}

////////////////////////////////////////////////////////////////////

/////////Untuk modif data pada pengguna////////////
if(isset($_POST['updatepengguna']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    //disini pakai $query = update. soalnya buat update data aja. dan apa yang akan diupdate dituliskan setelahnya
    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertype' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    //Tampilan status jika dilakukan perubahan data
    if($query_run)
    {
        $_SESSION['success'] = "Data Berhasil diperbarui";
        header('location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Data Gagal diperbarui";
        header('location: register.php');
    }
}
///////////////////////////////////////////////////

/////////Untuk HAPUS data pada pengguna////////////
if(isset($_POST['deletepengguna']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id'];
    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: register.php');
    }
}

////////////////TAMBAHKAN ASET///////////////////////////////////
if(isset($_POST['daftaraset_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $nama_alat = $_POST['nama_alat'];
    $uid = $_POST['uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $peminjam = $_POST['peminjam'];
    $status_asset = $_POST['status_asset'];
    $query = "INSERT INTO tb_rfid (nama_alat,uid,deskripsi,penanggung_jawab,peminjam,status_asset) VALUES ('$nama_alat','$uid','$deskripsi','$penanggung_jawab','$peminjam','$status_asset')";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        if($query_run)
        {
        $_SESSION['success'] = "Aset berhasil ditambahkan";
        header('location: pengaturan-aset.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal ditambahkan";
        header('location: pengaturan-aset.php');
        }
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////EDIT/UBAH/PERBARUI ASET///////////////////////////////////
if(isset($_POST['updateasset']))

//jika sudah ditombol kemudian
{
    $id = $_POST['id'];

    $nama_alat = $_POST['nama_alat'];
    $uid = $_POST['uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $peminjam = $_POST['peminjam'];
    $status_asset = $_POST['status_asset']; 
    $query = "UPDATE tb_rfid SET nama_alat='$nama_alat', uid='$uid', deskripsi='$deskripsi', penanggung_jawab='$penanggung_jawab',peminjam='$peminjam', status_asset='$status_asset' WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        if($query_run)
        {
        $_SESSION['success'] = "Aset berhasil Diperbarui";
        header('location: pengaturan-aset.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal Diperbarui";
        header('location: pengaturan-aset.php');
        }
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////HAPUS DATA ASSET (BARANG)//////////////////////////////////////////////
if(isset($_POST['deleteasset']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_asset'];
    $query = "DELETE FROM tb_rfid WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: pengaturan-aset.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-aset.php');
    }
}

////////////////TAMBAH ASET BAYI////////////////////////////////////
if(isset($_POST['daftarasetanak_btn']))
//jika sudah ditombol kemudian
{
    //input data
    $rfid_uid = $_POST['rfid_uid'];
    $id_pengenal = $_POST['id_pengenal'];
    $nama_anak = $_POST['nama_anak'];
    $nama_ibu = $_POST['nama_ibu'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $query = "INSERT INTO tb_stat_anak (rfid_uid,id_pengenal,nama_anak,nama_ibu,penanggung_jawab,alamat,status) VALUES ('$rfid_uid','$id_pengenal','$nama_anak','$nama_ibu','$penanggung_jawab','$alamat','$status')";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        if($query_run)
        {
        $_SESSION['success'] = "Aset berhasil ditambahkan";
        header('location: pengaturan-aset-ibu.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal ditambahkan";
        header('location: pengaturan-aset-ibu.php');
        }
    }
}

if(isset($_GET['ambildata_btn']))
//jika sudah ditombol kemudian
{
    //ambil data?
    $rfid_uid = $_POST['rfid_uid'];
    $id_pengenal = $_POST['id_pengenal'];
    $nama_anak = $_POST['nama_anak'];
    $nama_ibu = $_POST['nama_ibu'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];




    $query = "SELECT * FROM `tb_reader_scan` order by id desc limit 1";
    $query_run = mysqli_query($connection, $query);


    if($query_run)
    {
        if($query_run)
        {
        $_SESSION['success'] = "Aset berhasil ditambahkan";
        header('location: pengaturan-aset-ibu.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal ditambahkan";
        header('location: pengaturan-aset-ibu.php');
        }
    }
}









////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Untuk modif data pada bayi
if(isset($_POST['updatebtnassetbayi']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];
    
    $rfid_uid = $_POST['rfid_uid'];
    $id_pengenal = $_POST['id_pengenal'];
    $nama_anak = $_POST['nama_anak'];
    $nama_ibu = $_POST['nama_ibu'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];


    $query = "UPDATE tb_stat_anak SET rfid_uid='$rfid_uid', id_pengenal='$id_pengenal', nama_anak='$nama_anak', nama_ibu='$nama_ibu', penanggung_jawab='$penanggung_jawab', alamat='$alamat', status='$status' WHERE id='$id'  ";
    $query_run = mysqli_query($connection,$query);


    //Tampilan status jika dilakukan perubahan data
    if($query_run)
    {
        $_SESSION['success'] = "Data Berhasil diperbarui";
        header('location: pengaturan-aset-ibu.php');
    }
    else
    {
        $_SESSION['status'] = "Data Gagal diperbarui";
        header('location: pengaturan-aset-ibu.php');
    }
}


//////////////////////////////////HAPUS DATA ASSET (BAYI)//////////////////////////////////////////////
if(isset($_POST['deleteassetbayi']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_asset_bayi'];
    $query = "DELETE FROM tb_stat_anak WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: pengaturan-aset-ibu.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-aset-ibu.php');
    }
}












?>














