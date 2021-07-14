<?php
include_once('security.php');
include_once('database/dbconfig.php');

///////////////////BUAT TAMBAH KRITERIA BARU///////////////////////////////
if (isset($_POST['tambahkriteria'])) {
    $nama_kriteria = $_POST['nama_kriteria'];
    $tipe_kriteria = $_POST['tipe_kriteria'];
    $bobot = $_POST['bobot'];
    $keterangan = $_POST['keterangan'];

    $kriteria_query = "SELECT * FROM tb_kriteria WHERE `nama_kriteria` = '$nama_kriteria' ";
    $cekriteria_query_run = mysqli_query($connection, $kriteria_query);
    if (mysqli_num_rows($cekriteria_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. Kriteria sudah ada";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-kriteria.php');
    } else {
        if (!preg_match("/^[0-9]*$/", $bobot)) {
            $_SESSION['status'] = "Registrasi Gagal. Bobot harus berupa angka";
            $_SESSION['status_code'] = "error";
            header('location: pengadaan-kriteria.php');
        } else {
            $query = "INSERT INTO tb_kriteria (nama_kriteria,tipe_kriteria,bobot,keterangan) VALUES('$nama_kriteria','$tipe_kriteria','$bobot','$keterangan')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $_SESSION['status'] = "Tambah Kriteria Berhasil";
                $_SESSION['status_code'] = "success";
                header('location: pengadaan-kriteria.php');
            } else {
                $_SESSION['status'] = "Registrasi Gagal. Terjadi kesalahan Internal";
                $_SESSION['status_code'] = "error";
                header('location: pengadaan-kriteria.php');
            }
        }
    }
}

///////////////////////////////////////TOMBOL EDIT KRITERIA////////////////////////////////
if (isset($_POST['editkriteria'])) {
    $id_kriteria = $_POST['id_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $tipe_kriteria = $_POST['tipe_kriteria'];
    $bobot = $_POST['bobot'];
    $keterangan =  $_POST['keterangan'];

    if (!preg_match("/^[0-9]*$/", $bobot)) {
        $_SESSION['status'] = "Registrasi Gagal. Bobot harus berupa angka";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-kriteria.php');
    } else {
        $query = "UPDATE tb_kriteria SET nama_kriteria='$nama_kriteria', tipe_kriteria='$tipe_kriteria', bobot='$bobot', keterangan='$keterangan' WHERE id_kriteria = '$id_kriteria'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $_SESSION['status'] = "Ubah Kriteria Berhasil";
            $_SESSION['status_code'] = "success";
            header('location: pengadaan-kriteria.php');
        } else {
            $_SESSION['status'] = "Registrasi Gagal. Terjadi kesalahan Internal";
            $_SESSION['status_code'] = "error";
            header('location: pengadaan-kriteria.php');
        }
    }
}

///////////////////////////////////////TOMBOL HAPUS KRITERIA////////////////////////////////
if (isset($_POST['hapuskriteria'])) {
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id_kriteria = $_POST['hapus_id_kriteria'];
    $query = "DELETE FROM tb_kriteria WHERE id_kriteria='$id_kriteria' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-kriteria.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengadaan-kriteria.php');
    }
}
///////////////////BUAT TAMBAH PESERTA PENGADAAN/VENDOR BARU///////////////////////////////
if (isset($_POST['tambahvendor'])) {
    $vendor = $_POST['vendor'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO tb_peserta (vendor,alamat) VALUES('$vendor','$alamat')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['status'] = "Registrasi Vendor Berhasil";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-peserta.php');
    } else {
        $_SESSION['status'] = "Registrasi Gagal. Terjadi kesalahan Internal";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-peserta.php');
    }
}

///////////////////////////////////////TOMBOL EDIT VENDOR////////////////////////////////
if (isset($_POST['editvendor'])) {
    $no_vendor = $_POST['no_vendor'];
    $vendor = $_POST['vendor'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE tb_peserta SET vendor='$vendor',alamat='$alamat' WHERE no_vendor='$no_vendor'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $_SESSION['status'] = "Ubah Vendor Berhasil";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-peserta.php');
    } else {
        $_SESSION['status'] = "Registrasi Gagal. Terjadi kesalahan Internal";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-peserta.php');
    }
}
///////////////////////////////////////TOMBOL HAPUS VENDOR////////////////////////////////
if (isset($_POST['hapusvendor'])) {
    $no_vendor = $_POST['hapus_no_vendor'];
    $query = "DELETE FROM tb_peserta WHERE no_vendor='$no_vendor' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-peserta.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-peserta.php');
    }
}
///////////////////BUAT TAMBAH PENILAIAN VENDOR///////////////////////////////
if (isset($_POST['tambahranking'])) {

    $no_vendor = $_POST['no_vendor'];
    $vendor = $_POST['vendor'];

    $ranking_query = "SELECT * FROM tb_peringkat WHERE `nama_peserta` = '$vendor' ";
    $cekranking_query_run = mysqli_query($connection, $ranking_query);
    if (mysqli_num_rows($cekranking_query_run) > 0) {
        $_SESSION['status'] = "Registrasi Gagal. Vendor sudah dinilai";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-ranking.php');
    } else {
        $query1 = mysqli_query($connection, "select * from tb_kriteria");
        while ($data = mysqli_fetch_array($query1)) {
            $stripped = str_replace(' ', '', $data['nama_kriteria']);
            $query = "INSERT INTO tb_peringkat VALUES(null,'$no_vendor','$vendor','" . $data['nama_kriteria'] . "','" . $_POST[$stripped] . "')";
            $result = mysqli_query($connection, $query);
        }


        if ($result) {
            $_SESSION['status'] = "Penilaian berhasil ditambahkan";
            $_SESSION['status_code'] = "success";
            header('location: pengadaan-ranking.php');
        } else {
            $_SESSION['status'] = "Data gagal dihapus";
            $_SESSION['status_code'] = "error";
            header('location: pengadaan-ranking.php');
        }
    }
}
///////////////////////////////////////TOMBOL HAPUS PERINGKAT////////////////////////////////
if (isset($_POST['hapusperingkat'])) {
    $no_vendor = $_POST['hapus_peringkat_no_vendor'];
    $query = "DELETE FROM tb_peringkat WHERE no_vendor='$no_vendor' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-ranking.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-ranking.php');
    }
}
///////////////////////////////////////TOMBOL EDIT PERINGKAT////////////////////////////////
if (isset($_POST['editranking'])) {
    $id_peringkat = $_POST ['id_peringkat'];
    
    $query1 = mysqli_query($connection,"select * from tb_kriteria");
    while ($data = mysqli_fetch_array($query1)) {
        $stripped = str_replace(' ', '', $data['nama_kriteria']);
        $query = "UPDATE tb_peringkat SET nilai='".$_POST[$stripped]."' where no_vendor=$id_peringkat and nama_kriteria='".$data['nama_kriteria']."'";
        $result = mysqli_query($connection,$query);
    }

    if ($result) {
        $_SESSION['status'] = "Data berhasil di diubah";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-ranking.php');
    } 
    else {
        $_SESSION['status'] = "Data gagal diubah";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-ranking.php');
    }
}
///////////////////////////////////////TOMBOL SEMUA HAPUS PERINGKAT////////////////////////////////
if (isset($_POST['hapusemuaperingkat'])) {
    $query = "TRUNCATE TABLE tb_peringkat ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-ranking.php');
    } else {
        $_SESSION['status'] = "Data gagal dihapus";
        $_SESSION['status_code'] = "error";
        header('location: pengadaan-ranking.php');
    }
}