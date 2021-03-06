<?php
include_once('security.php');
include_once('database/dbconfig.php');

////////////////////////BAGIAN LOGIN//////////////////////////////////
//fungsi akan aktif jika tombol login dipencet
if (isset($_POST['login_btn'])) {
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
    if ($usertype['usertype'] == "admin") {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "Admin";
        header('Location: index.php');
    }

    //jika tipe pengguna pengelola maka masuk ke register_edit.php
    else if ($usertype['usertype'] == "engginer") {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "engginer";
        header('Location: register_edit.php');
    }

    //jika tipe pengguna "pengguna" maka masuk ke register.php
    else if ($usertype['usertype'] == "operator") {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "operator";
        header('Location: register.php');
    }
    //jika tipe pengguna "pengguna" maka masuk ke register.php
    else if ($usertype['usertype'] == "manajer-aset") {
        $_SESSION['username'] = $username_login;
        $_SESSION['usertype'] = "manajer-aset";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Email / Password anda Salah";
        header('Location: login.php');
    }
}

////////////////////////////////////////////////////////////////////


/////////////////////////////PENGATURAN PENGGUNA/////////////////////
////////TAMBAH PENGGUNA/////////
if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register 
    WHERE username= '$username' OR email= '$email' > 0 ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. Email/Username Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-pengguna.php');
    } else {

        if ($password === $cpassword) {
            //data yang tadi, dimasukkan ke database dewngan perintah "insert into" karena data tersebut data baru, dan diletakkan ke tabel yang udah disediakan
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                $_SESSION['status'] = "Registrasi Berhasil";
                $_SESSION['status_code'] = "success";
                header('location: pengaturan-pengguna.php');
            } else {
                $_SESSION['status'] = "Registrasi Gagal. Terjadi kesalahan Internal";
                $_SESSION['status_code'] = "error";
                header('location: pengaturan-pengguna.php');
            }
        } else {
            $_SESSION['status'] = "Registrasi Gagal. Password tidak Sesuai";
            $_SESSION['status_code'] = "info";
            header('location: pengaturan-pengguna.php');
        }
    }
}

////////////////////////////////////////////////////////////////////

/////////Untuk modif data pada pengguna////////////
if (isset($_POST['updatepengguna']))

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
    if ($query_run) {
        $_SESSION['success'] = "Data Berhasil diperbarui";
        header('location: pengaturan-pengguna.php');
    } else {
        $_SESSION['status'] = "Data Gagal diperbarui";
        header('location: rpengaturan-pengguna.php');
    }
}
///////////////////////////////////////////////////

/////////Untuk HAPUS data pada pengguna////////////
if (isset($_POST['deletepengguna'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id'];
    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: pengaturan-pengguna.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-pengguna.php');
    }
}

////////////////TAMBAHKAN ASET///////////////////////////////////
if (isset($_POST['daftaraset_btn']))

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
    $cekaset_query_run = mysqli_query($connection, $cekaset_query);
    if (mysqli_num_rows($cekaset_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: tambah-aset-barang.php');
    } else {
        if (!preg_match("/^[a-g0-9A-G]*$/", $rfid_uid)) {
            $_SESSION['status'] = "Registrasi Gagal. Lakukan Scan RFID Terlebih Dahulu";
            $_SESSION['status_code'] = "error";
            header('location: tambah-aset-barang.php');
        } else {
            $query = "INSERT INTO tb_rfid (nama_alat,rfid_uid,deskripsi,penanggung_jawab,peminjam,status_asset) VALUES ('$nama_alat','$rfid_uid','$deskripsi','$penanggung_jawab','$peminjam','$status_asset')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                if ($query_run) {
                    $_SESSION['status'] = "Aset Barang Berhasil Ditambahkan";
                    $_SESSION['status_code'] = "success";
                    header('location: daftar-barang.php');
                } else {
                    $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
                    $_SESSION['status_code'] = "error";
                    header('location: daftar-barang.php');
                }
            }
        }
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////EDIT/UBAH/PERBARUI ASET///////////////////////////////////
if (isset($_POST['updateasset']))

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
    $query_run = mysqli_query($connection, $query);


    if ($query_run) {
        if ($query_run) {
            $_SESSION['status'] = "Data Berhasil di Ubah";
            $_SESSION['status_code'] = "success";
            header('location: pengaturan-aset-barang.php');
        } else {
            $_SESSION['status'] = "Data gagal di Ubah";
            $_SESSION['status_code'] = "error";
            header('location: pengaturan-aset-barang.php.php');
        }
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////PINJAM ASET///////////////////////////////////
if (isset($_POST['formpinjam']))

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

    $cekaset_query = "SELECT * FROM tb_rfid
    WHERE nama_alat= '$nama_alat' > 0 ";
    $cekaset_query_run = mysqli_query($connection, $cekaset_query);
    if (mysqli_num_rows($cekaset_query_run) > 0) {
        $query = "UPDATE tb_rfid SET nama_alat='$nama_alat', rfid_uid='$rfid_uid', deskripsi='$deskripsi', penanggung_jawab='$penanggung_jawab',peminjam='$peminjam', status_asset='$status_asset', keterangan='$keterangan' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            if ($query_run) {
                $_SESSION['status'] = "Pindah aset berhasil, Harap tunggu konfirmasi";
                $_SESSION['status_code'] = "success";
                header('location: validasi-peminjaman-aset.php');
            } else {
                $_SESSION['status'] = "Pindah aset gagal, Harap hubungi admin";
                $_SESSION['status_code'] = "error";
                header('location: formulir.php');
            }
        }
    } else {
        $_SESSION['status'] = "Peminjaman aset gagal. Nama aset salah/tidak ditemukan. Harap cek ulang";
        $_SESSION['status_code'] = "error";
        header('location: formulir.php');
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////TOLAK KONFIRMASI PINJAM///////////////////////////////////
if (isset($_POST['tolak_aset']))

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
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        if ($query_run) {
            $_SESSION['status'] = "Peminjaman aset berhasil ditolak";
            $_SESSION['status_code'] = "success";
            header('location: validasi-peminjaman-aset.php');
        } else {
            $_SESSION['status'] = "Terjadi Keasalahan internal. Harap hubungi Admin";
            $_SESSION['status_code'] = "error";
            header('location: validasi-peminjaman-aset.php');
        }
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////TERIMA KONFIRMASI PINJAM///////////////////////////////////
if (isset($_POST['terima_aset']))

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
    $query = "UPDATE tb_rfid  
    SET status_asset = CASE  
    WHEN status_asset = 'konfirmasi_pinjam' THEN 'dipinjam' 
    WHEN status_asset = 'konfirmasi_pindah' THEN 'dipindah' 
    ELSE status_asset
    END
    WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        if ($query_run) {
            $_SESSION['status'] = "Peminjaman aset berhasil diterima";
            $_SESSION['status_code'] = "success";
            header('location: validasi-peminjaman-aset.php');
        } else {
            $_SESSION['status'] = "Terjadi Keasalahan internal. Harap hubungi Admin";
            $_SESSION['status_code'] = "error";
            header('location: validasi-peminjaman-aset.php');
        }
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////HAPUS DATA ASSET (BARANG)//////////////////////////////////////////////
if (isset($_POST['deleteasset'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_asset'];
    $query = "DELETE FROM tb_rfid WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Berhasil di Hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-aset-barang.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-aset-barang.php.php');
    }
}

////////////////TAMBAH ASET BAYI (NEW) //////////////////////////////////
if (isset($_POST['daftarasetanak_btn']))

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

    $cekanak_query = "SELECT * FROM tb_stat_anak WHERE `status` IN ('masuk', 'checkin', 'perawatan', 'peringatan', 'validasi') AND rfid_uid = '$rfid_uid'";
    $cekanak_query_run = mysqli_query($connection, $cekanak_query);
    if (mysqli_num_rows($cekanak_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: tambah-aset-bayi.php');
    } else {
        if (!preg_match("/^[a-g0-9A-G]*$/", $rfid_uid)) {
            $_SESSION['status'] = "Registrasi Gagal. Lakukan Scan RFID Terlebih Dahulu";
            $_SESSION['status_code'] = "error";
            header('location: tambah-aset-bayi.php');
        } else {
            $query = "INSERT INTO tb_stat_anak (rfid_uid,id_pengenal,nama_anak,nama_ibu,penanggung_jawab_bayi,alamat,status) VALUES ('$rfid_uid','$id_pengenal','$nama_anak','$nama_ibu','$penanggung_jawab_bayi','$alamat','$status')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                if ($query_run) {
                    $_SESSION['status'] = "Data Pasien Berhasil Ditambahkan";
                    $_SESSION['status_code'] = "success";
                    header('location: daftar-bayi.php');
                } else {
                    $_SESSION['status'] = "Kesalahan Internal. Registrasi Gagal";
                    $_SESSION['status_code'] = "error";
                    header('location: tambah-aset-bayi.php');
                }
            }
        }
    }
}

/////////////////////////////////////////////////////////////////////////////////////

////////////////TAMBAH Pasien Dewasa //////////////////////////////////
if (isset($_POST['daftarpasiendewasa_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $rfid_uid = $_POST['rfid_uid'];
    $nama_pasien = $_POST['nama_pasien'];
    $id_pengenal = $_POST['id_pengenal'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];


    $cekpasien_query = "SELECT * FROM tb_pasien_dewasa WHERE `status` IN ('masuk', 'checkin', 'perawatan', 'peringatan', 'validasi') AND rfid_uid = '$rfid_uid'";
    $cekpasien_query_run = mysqli_query($connection, $cekpasien_query);
    if (mysqli_num_rows($cekpasien_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: tambah-pasien-dewasa.php');
    } else {
        if (!preg_match("/^[a-g0-9A-G]*$/", $rfid_uid)) {
            $_SESSION['status'] = "Registrasi Gagal. Lakukan Scan RFID Terlebih Dahulu";
            $_SESSION['status_code'] = "error";
            header('location: tambah-pasien-dewasa.php');
        } else {
            $query = "INSERT INTO tb_pasien_dewasa (rfid_uid,nama_pasien,id_pengenal,usia,jenis_kelamin,tinggi_badan,berat_badan,alamat,status) VALUES ('$rfid_uid','$nama_pasien','$id_pengenal','$usia','$jenis_kelamin','$tinggi_badan','$berat_badan','$alamat','$status')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                if ($query_run) {
                    $_SESSION['status'] = "Data Pasien Berhasil Ditambahkan";
                    $_SESSION['status_code'] = "success";
                    header('location: daftar-pasien.php');
                } else {
                    $_SESSION['status'] = "Kesalahan Internal. Registrasi Gagal";
                    $_SESSION['status_code'] = "error";
                    header('location: tambah-pasien-dewasa.php');
                }
            }
        }
    }
}

/////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////HAPUS DATA PASIEN//////////////////////////////////////////////
if (isset($_POST['hapuspasien'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_pasien'];
    $query = "DELETE FROM tb_pasien_dewasa WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-pasien.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-pasien.php');
    }
}
////////////////////////////UPDATE DATA PASIEN//////////////////////////////////
if (isset($_POST['updatepasien']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];

    $rfid_uid = $_POST['rfid_uid'];
    $nama_pasien = $_POST['nama_pasien'];
    $id_pengenal = $_POST['id_pengenal'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $query = "UPDATE tb_pasien_dewasa SET rfid_uid='$rfid_uid', nama_pasien ='$nama_pasien', id_pengenal='$id_pengenal', usia ='$usia', jenis_kelamin='$jenis_kelamin', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', alamat='$alamat', status='$status'  WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);


    //Tampilan status jika dilakukan perubahan data
    if ($query_run) {
        $_SESSION['status'] = "Data berhasil diperbarui";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-pasien.php');
    } else {
        $_SESSION['status'] = "Data Gagal diperbarui";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-pasien.php');
    }
}
////////////////////////////////////////////////////////////////////////////

////////////////TAMBAH Dokter //////////////////////////////////
if (isset($_POST['daftardokter_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $rfid_uid = $_POST['rfid_uid'];
    $nama_dokter = $_POST['nama_dokter'];
    $id_dokter = $_POST['id_dokter'];
    $jenis_kelamin_dokter = $_POST['jenis_kelamin_dokter'];
    $alamat_dokter = $_POST['alamat_dokter'];
    $spesialis = $_POST['spesialis'];

    $cekdokter_query = "SELECT * FROM `tb_dokter` WHERE `rfid_uid` = '$rfid_uid'";
    $cekdokter_query_run = mysqli_query($connection, $cekdokter_query);
    if (mysqli_num_rows($cekdokter_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: tambah-dokter.php');
    } else {
        if (!preg_match("/^[a-g0-9A-G]*$/", $rfid_uid)) {
            $_SESSION['status'] = "Registrasi Gagal. Lakukan Scan RFID Terlebih Dahulu";
            $_SESSION['status_code'] = "error";
            header('location: tambah-dokter.php');
        } else {
            $query = "INSERT INTO tb_dokter (rfid_uid,nama_dokter,id_dokter,jenis_kelamin_dokter,alamat_dokter,spesialis) VALUES ('$rfid_uid','$nama_dokter','$id_dokter','$jenis_kelamin_dokter','$alamat_dokter','$spesialis')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                if ($query_run) {
                    $_SESSION['status'] = "Data Dokter Berhasil Ditambahkan";
                    $_SESSION['status_code'] = "success";
                    header('location: daftar-dokter.php');
                } else {
                    $_SESSION['status'] = "Kesalahan Internal. Registrasi Gagal";
                    $_SESSION['status_code'] = "error";
                    header('location: tambah-dokter.php');
                }
            }
        }
    }
}

/////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////HAPUS DATA DOKTER//////////////////////////////////////////////
if (isset($_POST['hapusdokter'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_dokter'];
    $query = "DELETE FROM tb_dokter WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-dokter.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-dokter.php');
    }
}
////////////////////////////UPDATE DATA DOKTER//////////////////////////////////
if (isset($_POST['updatedokter']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];

    $rfid_uid = $_POST['rfid_uid'];
    $nama_dokter = $_POST['nama_dokter'];
    $id_dokter = $_POST['id_dokter'];
    $jenis_kelamin_dokter = $_POST['jenis_kelamin_dokter'];
    $alamat_dokter = $_POST['alamat_dokter'];
    $spesialis = $_POST['spesialis'];

    $query = "UPDATE tb_dokter SET rfid_uid='$rfid_uid', nama_dokter ='$nama_dokter', id_dokter='$id_dokter', jenis_kelamin_dokter='$jenis_kelamin_dokter', alamat_dokter='$alamat_dokter', spesialis='$spesialis' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);


    //Tampilan status jika dilakukan perubahan data
    if ($query_run) {
        $_SESSION['status'] = "Data berhasil diperbarui";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-dokter.php');
    } else {
        $_SESSION['status'] = "Data Gagal diperbarui";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-dokter.php');
    }
}
////////////////////////////////////////////////////////////////////////////

////////////////TAMBAH Perawat //////////////////////////////////
if (isset($_POST['daftarperawat_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $rfid_uid = $_POST['rfid_uid'];
    $nama_perawat = $_POST['nama_perawat'];
    $id_perawat = $_POST['id_perawat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $cekperawat_query = "SELECT * FROM `tb_perawat` WHERE `rfid_uid` = '$rfid_uid'";
    $cekperawat_query_run = mysqli_query($connection, $cekperawat_query);
    if (mysqli_num_rows($cekperawat_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: tambah-perawat.php');
    } else {
        if (!preg_match("/^[a-g0-9A-G]*$/", $rfid_uid)) {
            $_SESSION['status'] = "Registrasi Gagal. Lakukan Scan RFID Terlebih Dahulu";
            $_SESSION['status_code'] = "error";
            header('location: tambah-perawat.php');
        } else {
            $query = "INSERT INTO tb_perawat (rfid_uid,nama_perawat,id_perawat,jenis_kelamin,alamat,status) VALUES ('$rfid_uid','$nama_perawat','$id_perawat','$jenis_kelamin','$alamat','$status')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                if ($query_run) {
                    $_SESSION['status'] = "Data Dokter Berhasil Ditambahkan";
                    $_SESSION['status_code'] = "success";
                    header('location: daftar-perawat.php');
                } else {
                    $_SESSION['status'] = "Kesalahan Internal. Registrasi Gagal";
                    $_SESSION['status_code'] = "error";
                    header('location: tambah-perawat.php');
                }
            }
        }
    }
}

/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////HAPUS DATA PERAWAT//////////////////////////////////////////////
if (isset($_POST['hapusperawat'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_perawat'];
    $query = "DELETE FROM tb_perawat WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-perawat.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-perawat.php');
    }
}
////////////////////////////UPDATE DATA PERAWAT//////////////////////////////////
//Untuk modif data pada bayi
if (isset($_POST['updateperawat']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];

    $rfid_uid = $_POST['rfid_uid'];
    $nama_perawat = $_POST['nama_perawat'];
    $id_perawat = $_POST['id_perawat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $query = "UPDATE tb_perawat SET rfid_uid='$rfid_uid', nama_perawat ='$nama_perawat', id_perawat='$id_perawat', jenis_kelamin='$jenis_kelamin', alamat='$alamat', status='$status' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);


    //Tampilan status jika dilakukan perubahan data
    if ($query_run) {
        $_SESSION['status'] = "Data berhasil diperbarui";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-perawat.php');
    } else {
        $_SESSION['status'] = "Data Gagal diperbarui";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-perawat.php');
    }
}
////////////////////////////////////////////////////////////////////////////

////////////////TAMBAH Karyawan //////////////////////////////////
if (isset($_POST['daftarkaryawan_btn']))

//jika sudah ditombol kemudian
{
    //input data
    $rfid_uid = $_POST['rfid_uid'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $id_pengenal = $_POST['id_pengenal'];
    $usia = $_POST['usia'];
    $posisi = $_POST['posisi'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $cekkaryawan_query = "SELECT * FROM `tb_non_medis` WHERE `rfid_uid` = '$rfid_uid'";
    $cekkaryawan_query_run = mysqli_query($connection, $cekkaryawan_query);
    if (mysqli_num_rows($cekkaryawan_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. RFID Telah Terdaftar";
        $_SESSION['status_code'] = "error";
        header('location: tambah-karyawan.php');
    } else {
        if (!preg_match("/^[a-g0-9A-G]*$/", $rfid_uid)) {
            $_SESSION['status'] = "Registrasi Gagal. Lakukan Scan RFID Terlebih Dahulu";
            $_SESSION['status_code'] = "error";
            header('location: tambah-karyawan.php');
        } else {
            $query = "INSERT INTO tb_non_medis (rfid_uid,nama_karyawan,id_pengenal,usia,posisi,alamat,status) VALUES ('$rfid_uid','$nama_karyawan','$id_pengenal','$usia','$posisi','$alamat','$status')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                if ($query_run) {
                    $_SESSION['status'] = "Data Dokter Berhasil Ditambahkan";
                    $_SESSION['status_code'] = "success";
                    header('location: daftar-karyawan.php');
                } else {
                    $_SESSION['status'] = "Kesalahan Internal. Registrasi Gagal";
                    $_SESSION['status_code'] = "error";
                    header('location: tambah-karyawan.php');
                }
            }
        }
    }
}
/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////HAPUS DATA KARYAWAN//////////////////////////////////////////////
if (isset($_POST['hapuskaryawan'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_karyawan'];
    $query = "DELETE FROM tb_non_medis WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-karyawan.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-karyawan.php');
    }
}
////////////////////////////UPDATE DATA KARYAWAN//////////////////////////////////
//Untuk modif data pada bayi
if (isset($_POST['updatekaryawan']))

//data apa aja yang diambil dan dimodif
{
    $id = $_POST['id'];

    $rfid_uid = $_POST['rfid_uid'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $id_pengenal = $_POST['id_pengenal'];
    $usia = $_POST['usia'];
    $posisi = $_POST['posisi'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $query = "UPDATE tb_non_medis SET rfid_uid='$rfid_uid', nama_karyawan ='$nama_karyawan', id_pengenal='$id_pengenal', usia='$usia', posisi='$posisi', alamat='$alamat', status='$status' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);


    //Tampilan status jika dilakukan perubahan data
    if ($query_run) {
        $_SESSION['status'] = "Data berhasil diperbarui";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-karyawan.php');
    } else {
        $_SESSION['status'] = "Data Gagal diperbarui";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-karyawan.php');
    }
}
////////////////////////////////////////////////////////////////////////////

//Untuk modif data pada bayi
if (isset($_POST['updatebtnassetbayi']))

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
    $query_run = mysqli_query($connection, $query);


    //Tampilan status jika dilakukan perubahan data
    if ($query_run) {
        $_SESSION['status'] = "Data berhasil diperbarui";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-aset-bayi.php');
    } else {
        $_SESSION['status'] = "Data Gagal diperbarui";
        $_SESSION['status_code'] = "error";
        header('location: pengaturan-aset-bayi.php');
    }
}

//////////////////////////////////HAPUS DATA ASSET (BAYI)//////////////////////////////////////////////
if (isset($_POST['deleteassetbayi'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapus_id_asset_bayi'];
    $query = "DELETE FROM tb_stat_anak WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengaturan-aset-bayi.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengaturan-aset-bayi.php');
    }
}

//////////////////////////////////HAPUS SEMUA HASIL SCAN//////////////////////////////////////////////
if (isset($_POST['hapushasilscan1'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapushasilscan1'];
    $query = "DELETE FROM `tb_reader_scan`";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: status-asset.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: status-asset.php');
    }
}

if (isset($_POST['hapushasilscan2'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id = $_POST['hapushasilscan2'];
    $query = "DELETE FROM `tb_reader_scan2`";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Data berhasil dihapus";
        header('location: status-asset.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: status-asset.php');
    }
}

//////////////////////////////////BUAT AMBIL DATA DARI RFID SCANNER//////////////////////////////////////////////
if (isset($_GET['ambildata_btn']))
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


    if ($query_run) {
        if ($query_run) {
            $_SESSION['success'] = "Aset berhasil ditambahkan";
            header('location: pengaturan-aset-bayi.php');
        } else {
            $_SESSION['status'] = "Aset gagal ditambahkan";
            header('location: pengaturan-aset-bayi.php');
        }
    }
}

/////////////////////////////////////HALAMAN BUAT KONFIRMASI/ PENGECEKAN////////////////////
////////Buat Cek RFID TAG APA SUDAH TERDAFTAR/////////
if (isset($_POST['check_btn_namarfidbarang'])) {
    $rfid_uid = $_POST['rfid_uid'];
    $rfidbarang_query = "SELECT * FROM tb_rfid WHERE rfid_uid='$rfid_uid' ";
    $rfidbarang_query_run = mysqli_query($connection, $rfidbarang_query);
    if (mysqli_num_rows($rfidbarang_query_run) > 0) {
        echo "Barang/RFID Tag Ini Sudah Terdaftar.";
    } else {
        echo "Barang belum terdaftar.";
    }
}
////////CEK PENGGUNA APA SUDAH TERDAFTAR/////////

////////Buat Cek Email/////////
if (isset($_POST['check_submit_btn'])) {
    $email = $_POST['email_id'];
    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        echo "Email Telah terdaftar. Silahkan pilih lainnya.";
    } else {
        echo "Email Tersedia.";
    }
}

////////Buat Cek nama/////////
if (isset($_POST['check_submit_btn_namaregistrasi'])) {
    $username = $_POST['nama_id'];
    $nama_query = "SELECT * FROM register WHERE username='$username' ";
    $nama_query_run = mysqli_query($connection, $nama_query);
    if (mysqli_num_rows($nama_query_run) > 0) {
        echo "Pengguna ini Telah terdaftar. Silahkan pilih lainnya.";
    } else {
        echo "Username Tersedia.";
    }
}
