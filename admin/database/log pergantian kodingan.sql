-- Ngene Bro. seng iki digawe neng code.php pas bagian register bayi
-- kan kasus'e pengen register, tapi data yang masuk tidak boleh sama dan jika ada yang sama, pastikan statusnya adalah checkout
-- jadine ngene Bro
SELECT * FROM tb_stat_anak WHERE `status` IN ('masuk', 'checkin', 'perawatan', 'peringatan', 'validasi') AND rfid_uid = '$rfid_uid';

--terus referensine bro, teko kene iki
-- https://www.w3resource.com/mysql/comparision-functions-and-operators/in-function.php


-- Update 2 (23 Juni)
-- Masalahe ngene. dadine kan neng tabel kuwi enek time stamo
-- dan time stamp kuwi sampe mili detik. asline iso sih di ganti nang database'e
-- tapi untuk menghindari gonta-ganti settingan database, dadine digawe kodingan nang php ae
-- kodingane koyok iki
SELECT DATE_FORMAT(`waktu_masuk`, '%Y/%M/%d %H:%i') AS timestamp , rfid_uid, id_pengenal, nama_anak, nama_ibu, penanggung_jawab_bayi, alamat, status, keterangan FROM tb_stat_anak

-- lha kok uakeh ngono?. asline kan iso mek "Select * From tb_stat_anak" ?
-- soale, enek fungsi "Date Format" digawe ngganti tipe data waktune yang sesuai kita karepno
-- Referensine neng kene https://www.w3schools.com/sql/func_mysql_date_format.asp





