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

///////////////////////////////////////////////////////////////////////



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

////////UPDATE PENGGUNA/////////

if(isset($_POST['updatebtn']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['edit_usertype'];
    $usertypeupdate = $_POST['update_usertype'];


    //disini pakai $query = update. soalnya buat update data aja. dan apa yang akan diupdate dituliskan setelahnya
    $query = "UPDATE register SET username='$username', email='$email', password='$password',usertype='$usertypeupdate' WHERE id='$id' ";
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

////////HAPUS PENGGUNA/////////

//fungsi ini akan aktif ketika "delete_btn" ditombol
if(isset($_POST['delete_btn']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['delete_id'];
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

////////////////////////////////////////////////////////////////////

/////////////////////////////PENGATURAN ASSET/////////////////////
///////////////HAPUS DATA ASSET/////////////////
//fungsi ini akan aktif ketika "delete_btn_asset" ditombol
if(isset($_POST['delete_btn_asset']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['delete_id_asset'];
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

///////////////TAMBAH DATA ASSET/////////////////
if(isset($_POST['daftaraset_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $nama_alat = $_POST['nama_alat'];
    $uid = $_POST['uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $status_asset = $_POST['status_asset'];
    $gambar_asset = $_FILES["gambar_asset"]['name'];

    if(file_exists("upload/" . $_FILES["gambar_asset"]["name"]))
    {
        $store = $_FILES["Gambar sudah ada. '.$store.'"];
        $_SESSION['status']= "Gambar sudah ada. '.$store.";
        header('location: pengaturan-aset.php');
    }
    else
    {
        $query = "INSERT INTO tb_rfid (nama_alat,uid,deskripsi,penanggung_jawab,status_asset,gambar_asset) VALUES ('$nama_alat','$uid','$deskripsi','$penanggung_jawab','$status_asset','$gambar_asset')";
        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            move_uploaded_file($_FILES["gambar_asset"]["tmp_name"], "upload/".$_FILES["file"]["name"]);
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
////////////////////////////////////////////////////////////////////
