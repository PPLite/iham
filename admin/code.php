<?php
session_start();
//inisialisasi sambungan ke database
$connection = mysqli_connect("localhost","mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");

//registerbtn ditombol
if(isset($_POST['registerbtn']))

//jika sudah ditombol kemudian
{
    //input data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
         //data yang tadi, dimasukkan ke database dewngan perintah "insert into" karena data tersebut data baru, dan diletakkan ke tabel yang udah disediakan
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
        //echo "saved";
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

//Untuk modif data pada pengguna
if(isset($_POST['updatebtn']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    //disini pakai $query = update. soalnya buat update data aja. dan apa yang akan diupdate dituliskan setelahnya
    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
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


//Untuk hapus data pengguna
//fungsi ini akan aktif ketika "delete_btn" dipanggil
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

//Fungsi login form
//fungsi akan aktif jika tombol login dipencet
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $email_login = $_POST['password'];

    //untuk nyari "select" dari semua data"* dari tabel "register" dan, cocokin dari tambel kolom "email"
    //terus cocokin dengan form "email" sama juga dengan password
    $query = "SELECT * FROM  register WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);
    //seperti biasa, logika if else

    //fungsi untuk ngambil beberapa data "array" database 
    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['email']= $email_login;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['STATUS'] = 'Email/password anda tidak sesuai';
        header('Location: login.php');
    }



}

?>