<?php
include_once('security.php');
include_once('database/dbconfig.php');

///////////////////BUAT TAMBAH KRITERIA BARU///////////////////////////////
if (isset($_POST['tomboltambahkriteria'])) 
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
                $_SESSION['status'] ="Registrasi Berhasil";
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
?>