<?php
include_once('security.php');
include_once('database/dbconfig.php');

///////////////////BUAT TAMBAH KRITERIA BARU///////////////////////////////
if (isset($_POST['tambahkriteria'])) 
{
    $nama_kriteria= $_POST ['nama_kriteria'];
    $tipe_kriteria= $_POST ['tipe_kriteria'];
    $bobot= $_POST ['bobot'];

        $kriteria_query = "SELECT * FROM tb_kriteria WHERE `nama_kriteria` = '$nama_kriteria' ";
        $cekriteria_query_run = mysqli_query($connection, $kriteria_query);
        if(mysqli_num_rows($cekriteria_query_run) > 0)
        {
            $_SESSION['status'] ="Registrasi Gagal. Kriteria sudah ada";
            $_SESSION['status_code'] = "error";
            header('location: pengadaan-kriteria.php');
        }
        else
        {
            if(!preg_match("/^[0-9]*$/", $bobot))      
            {
                $_SESSION['status'] ="Registrasi Gagal. Bobot harus berupa angka";
                $_SESSION['status_code'] = "error";
                header('location: pengadaan-kriteria.php');
            }
            else
            {
            $query = "INSERT INTO tb_kriteria (nama_kriteria,tipe_kriteria,bobot) VALUES('$nama_kriteria','$tipe_kriteria','$bobot')";
            $result = mysqli_query($connection, $query);
            if 
            ($result) 
            {
                $_SESSION['status'] ="Tambah Kriteria Berhasil";
                $_SESSION['status_code'] = "success";
                header('location: pengadaan-kriteria.php');
            } 
            else 
            {
                $_SESSION['status'] ="Registrasi Gagal. Terjadi kesalahan Internal";
                $_SESSION['status_code'] = "error";
                header('location: pengadaan-kriteria.php');
            }
        }
    }
}

///////////////////////////////////////TOMBOL EDIT KRITERIA////////////////////////////////
if (isset($_POST['editkriteria'])) 
{  
    $id_kriteria= $_POST ['id_kriteria'];
    $nama_kriteria= $_POST ['nama_kriteria'];
    $tipe_kriteria= $_POST ['tipe_kriteria'];
    $bobot= $_POST ['bobot'];

        if(!preg_match("/^[0-9]*$/", $bobot))      
        {
            $_SESSION['status'] ="Registrasi Gagal. Bobot harus berupa angka";
            $_SESSION['status_code'] = "error";
            header('location: pengadaan-kriteria.php');
        }
        else
        {
            $query = "UPDATE tb_kriteria SET nama_kriteria='$nama_kriteria', tipe_kriteria='$tipe_kriteria', bobot='$bobot' WHERE id_kriteria = '$id_kriteria'";
            $result = mysqli_query($connection, $query);
            if 
            ($result) 
            {
                $_SESSION['status'] ="Ubah Kriteria Berhasil";
                $_SESSION['status_code'] = "success";
                header('location: pengadaan-kriteria.php');
            } 
            else 
            {
                $_SESSION['status'] ="Registrasi Gagal. Terjadi kesalahan Internal";
                $_SESSION['status_code'] = "error";
                header('location: pengadaan-kriteria.php');
            }
        }
}

///////////////////////////////////////TOMBOL HAPUS KRITERIA////////////////////////////////
if(isset($_POST['hapuskriteria']))
{
    //disini pakai $query=Delete_id, soalnya ya buat ngehapus data berdasarkan "ID" yang udah dipilih
    $id_kriteria = $_POST['hapus_id_kriteria'];
    $query = "DELETE FROM tb_kriteria WHERE id_kriteria='$id_kriteria' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['status'] = "Data berhasil di hapus";
        $_SESSION['status_code'] = "success";
        header('location: pengadaan-kriteria.php');
    }
    else
    {
        $_SESSION['status'] = "Data gagal dihapus";
        header('location: pengadaan-kriteria.php');
    }
}








?>