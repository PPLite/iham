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
    else if ($usertype ['usertype'] == "engginer")
    {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "engginer";
        header('Location: register_edit.php');
    }

    //jika tipe pengguna "pengguna" maka masuk ke register.php
    else if ($usertype ['usertype'] == "operator")
    {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "operator";
        header('Location: register.php');
    }
    //jika tipe pengguna "pengguna" maka masuk ke register.php
    else if ($usertype ['usertype'] == "manajer-aset")
    {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "manajer-aset";
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
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register 
    WHERE username= '$username' OR email= '$email' > 0 ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] ="Registrasi Gagal. Email/Username Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-pengguna.php');
    }

    else
    {

        if($password === $cpassword)
        {
            //data yang tadi, dimasukkan ke database dewngan perintah "insert into" karena data tersebut data baru, dan diletakkan ke tabel yang udah disediakan
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection,$query);
        
            if($query_run)
            {
                $_SESSION['status'] ="Registrasi Berhasil";
                $_SESSION['status_code'] = "success";
                header('location: pengaturan-pengguna.php');
            }
            else
            {
                $_SESSION['status'] ="Registrasi Gagal. Terjadi kesalahan Internal";
                $_SESSION['status_code'] = "error";
                header('location: pengaturan-pengguna.php');
            }
        }
        else 
        {
            $_SESSION['status'] ="Registrasi Gagal. Password tidak Sesuai";
            $_SESSION['status_code'] = "info";
            header('location: pengaturan-pengguna.php');
        }
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
        header('location: pengaturan-pengguna.php');
    }
    else
    {
        $_SESSION['status'] = "Data Gagal diperbarui";
        header('location: rpengaturan-pengguna.php');
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
        header('location: pengaturan-pengguna.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-pengguna.php');
    }
}

////////////////TAMBAHKAN ASET///////////////////////////////////
if(isset($_POST['daftaraset_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $nama_alat = $_POST['nama_alat'];
    $rfid_uid = $_POST['rfid_uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $peminjam = $_POST['peminjam'];
    $status_asset = $_POST['status_asset'];

    $cekaset_query = "SELECT * FROM tb_rfid
    WHERE rfid_uid= '$rfid_uid' > 0 ";
    $cekaset_query_run = mysqli_query($connection,$cekaset_query);
        if(mysqli_num_rows($cekaset_query_run) > 0)
        {
            $_SESSION['status'] ="Registrasi Gagal. RFID Telah Terdaftar";
            $_SESSION['status_code'] = "error";
            header('location: daftar-barang.php');
        }
    else 
    {
        $query = "INSERT INTO tb_rfid (nama_alat,rfid_uid,deskripsi,penanggung_jawab,peminjam,status_asset) VALUES ('$nama_alat','$rfid_uid','$deskripsi','$penanggung_jawab','$peminjam','$status_asset')";
        $query_run = mysqli_query($connection,$query);
        if($query_run)
        {
            if($query_run)
            {
                $_SESSION['status'] ="Aset Barang Berhasil Ditambahkan";
                $_SESSION['status_code'] = "success";
            header('location: daftar-barang.php');
            }
            else
            {
                $_SESSION['status'] ="Registrasi Gagal. RFID Telah Terdaftar";
                $_SESSION['status_code'] = "error";
            header('location: daftar-barang.php');
            }
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
    $rfid_uid = $_POST['rfid_uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $peminjam = $_POST['peminjam'];
    $status_asset = $_POST['status_asset'];
    $keterangan = $_POST['keterangan']; 
    $query = "UPDATE tb_rfid SET nama_alat='$nama_alat', rfid_uid='$rfid_uid', deskripsi='$deskripsi', penanggung_jawab='$penanggung_jawab',peminjam='$peminjam', status_asset='$status_asset', keterangan='$keterangan' WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        if($query_run)
        {
            $_SESSION['status'] ="Data Berhasil di Ubah";
            $_SESSION['status_code'] = "success";
            header('location: pengaturan-aset-barang.php');
        }
        else
        {
            $_SESSION['status'] = "Data gagal di Ubah";
            $_SESSION['status_code'] = "error";
            header('location: pengaturan-aset-barang.php.php');
        }
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////PINJAM ASET///////////////////////////////////
if(isset($_POST['formpinjam']))

//jika sudah ditombol kemudian
{
    $nama_alat = $_POST['nama_alat'];
    $id = $_POST['id'];
    $rfid_uid = $_POST['rfid_uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $peminjam = $_POST['peminjam'];
    $status_asset = $_POST['status_asset'];
    $keterangan = $_POST['keterangan']; 
    $query = "UPDATE tb_rfid SET nama_alat='$nama_alat', rfid_uid='$rfid_uid', deskripsi='$deskripsi', penanggung_jawab='$penanggung_jawab',peminjam='$peminjam', status_asset='$status_asset', keterangan='$keterangan' WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);


    if($query_run)
    {
        if($query_run)  
        {
        $_SESSION['success'] = "Aset berhasil Diperbarui";
        header('location: validasi-peminjaman-aset.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal Diperbarui";
        header('location: validasi-peminjaman-aset.php');
        }
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////TOLAK KONFIRMASI PINJAM///////////////////////////////////
if(isset($_POST['tolak_aset']))

//jika sudah ditombol kemudian
{
    $nama_alat = $_POST['nama_alat'];
    $id = $_POST['id'];
    $rfid_uid = $_POST['rfid_uid'];
    $deskripsi = $_POST['deskripsi'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $peminjam = $_POST['peminjam'];
    $status_asset = $_POST['status_asset'];
    $keterangan = $_POST['keterangan']; 
    $query = "UPDATE tb_rfid SET nama_alat='$nama_alat', rfid_uid='$rfid_uid', deskripsi='$deskripsi', penanggung_jawab='$penanggung_jawab',peminjam='$peminjam', status_asset='$status_asset', keterangan='$keterangan' WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        if($query_run)  
        {
        $_SESSION['success'] = "Aset berhasil Diperbarui";
        header('location: validasi-peminjaman-aset.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal Diperbarui";
        header('location: validasi-peminjaman-aset.php');
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
        $_SESSION['status'] ="Data Berhasil di Hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-aset-barang.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-aset-barang.php.php');
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
    $penanggung_jawab_bayi = $_POST['penanggung_jawab_bayi'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    
    //SELECT * FROM tb_stat_anak WHERE rfid_uid = 'e20000202716018204409d9f' AND status = 'checkout'
    //SELECT * FROM tb_stat_anak WHERE rfid_uid = \'e20000202716018204409d9f\' AND status = \'checkout\
    $cekanak_query = "SELECT * FROM tb_stat_anak 
    WHERE rfid_uid = '$rfid_uid' AND status=\'checkout\'";
    $cekanak_query_run = mysqli_query($connection, $cekanak_query);
    if(mysqli_num_rows($cekanak_query_run) > 0)
    {
        $query = "INSERT INTO tb_stat_anak (rfid_uid,id_pengenal,nama_anak,nama_ibu,penanggung_jawab_bayi,alamat,status) VALUES ('$rfid_uid','$id_pengenal','$nama_anak','$nama_ibu','$penanggung_jawab_bayi','$alamat','$status')";
        $query_run = mysqli_query($connection,$query);
        if($query_run)
        {
            $_SESSION['status'] ="Data Berhasil di Ubah";
            $_SESSION['status_code'] = "success";
            header('location: daftar-bayi.php');
        }
        else
        {
            $_SESSION['status'] ="Data Berhasil di Ubah";
            $_SESSION['status_code'] = "error";
            header('location: daftar-bayi.php');
        }
    }
    else
        {
            $_SESSION['status'] ="Registrasi Gagal. Kode RFID masih aktif";
            $_SESSION['status_code'] = "error";
            header('location: daftar-bayi.php');
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
    $penanggung_jawab_bayi = $_POST['penanggung_jawab_bayi'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];

    $query = "UPDATE tb_stat_anak SET rfid_uid='$rfid_uid', keterangan='$keterangan' , id_pengenal='$id_pengenal', nama_anak='$nama_anak', nama_ibu='$nama_ibu', penanggung_jawab_bayi='$penanggung_jawab_bayi', alamat='$alamat', status='$status' WHERE id='$id'  ";
    $query_run = mysqli_query($connection,$query);


    //Tampilan status jika dilakukan perubahan data
    if($query_run)
    {
        $_SESSION['success'] = "Data Berhasil diperbarui";
        header('location: pengaturan-aset-bayi.php');
    }
    else
    {
        $_SESSION['status'] = "Data Gagal diperbarui";
        header('location: pengaturan-aset-bayi.php');
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
        header('location: pengaturan-aset-bayi.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-aset-bayi.php');
    }
}

//////////////////////////////////HAPUS SEMUA HASIL SCAN//////////////////////////////////////////////
if(isset($_POST['hapushasilscan1']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapushasilscan1'];
    $query = "DELETE FROM `tb_reader_scan`";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: status-asset.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: status-asset.php');
    }
}

if(isset($_POST['hapushasilscan2']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapushasilscan2'];
    $query = "DELETE FROM `tb_reader_scan2`";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: status-asset.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: status-asset.php');
    }
}

//////////////////////////////////BUAT AMBIL DATA DARI RFID SCANNER//////////////////////////////////////////////
if(isset($_GET['ambildata_btn']))
//jika sudah ditombol kemudian
{
    //ambil data?
    $rfid_uid = $_POST['rfid_uid'];
    $id_pengenal = $_POST['id_pengenal'];
    $nama_anak = $_POST['nama_anak'];
    $nama_ibu = $_POST['nama_ibu'];
    $penanggung_jawab_bayi = $_POST['penanggung_jawab_bayi'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $query = "SELECT * FROM `tb_reader_scan` order by id desc limit 1";
    $query_run = mysqli_query($connection, $query);


    if($query_run)
    {
        if($query_run)
        {
        $_SESSION['success'] = "Aset berhasil ditambahkan";
        header('location: pengaturan-aset-bayi.php');
        }
        else
        {
        $_SESSION['status'] = "Aset gagal ditambahkan";
        header('location: pengaturan-aset-bayi.php');
        }
    }
}

/////////////////////////////////////HALAMAN BUAT KONFIRMASI/ PENGECEKAN////////////////////
////////Buat Cek RFID TAG APA SUDAH TERDAFTAR/////////
if(isset($_POST['check_btn_namarfidbarang']))
{
    $rfid_uid = $_POST['rfid_uid'];
    $rfidbarang_query = "SELECT * FROM tb_rfid WHERE rfid_uid='$rfid_uid' ";
    $rfidbarang_query_run = mysqli_query($connection, $rfidbarang_query);
    if(mysqli_num_rows($rfidbarang_query_run)> 0)
    {
        echo "Barang/RFID Tag Ini Sudah Terdaftar.";
    }

    else
    {
        echo "Barang belum terdaftar.";
    }
}
////////CEK PENGGUNA APA SUDAH TERDAFTAR/////////

////////Buat Cek Email/////////
if(isset($_POST['check_submit_btn']))
{
    $email = $_POST['email_id'];
    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run)> 0)
    {
        echo "Email Telah terdaftar. Silahkan pilih lainnya.";
    }

    else
    {
        echo "Email Tersedia.";
    }
}

////////Buat Cek nama/////////
if(isset($_POST['check_submit_btn_namaregistrasi']))
{
    $username = $_POST['nama_id'];
    $nama_query = "SELECT * FROM register WHERE username='$username' ";
    $nama_query_run = mysqli_query($connection, $nama_query);
    if(mysqli_num_rows($nama_query_run)> 0)
    {
        echo "Pengguna ini Telah terdaftar. Silahkan pilih lainnya.";
    }

    else
    {
        echo "Username Tersedia.";
    }
}

?>