-- Ngene Bro. seng iki digawe neng code.php pas bagian register bayi
-- kan kasus'e pengen register, tapi data yang masuk tidak boleh sama dan jika ada yang sama, pastikan statusnya adalah checkout
-- jadine ngene Bro
SELECT * FROM tb_stat_anak WHERE `status` IN ('masuk', 'checkin', 'perawatan', 'peringatan', 'validasi') AND rfid_uid = '$rfid_uid';

--terus referensine bro, teko kene iki
-- https://www.w3resource.com/mysql/comparision-functions-and-operators/in-function.php




