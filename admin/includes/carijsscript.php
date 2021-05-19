<?php
$mysqli = new mysqli("localhost", "mjdr3247_admin", "semogacepatlulus2021", "mjdr3247_adminpanel");
if($mysqli->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT id, rfid_uid, id_pengenal, nama_anak, nama_ibu, penanggung_jawab, waktu_masuk, alamat, status
FROM tb_stat_anak WHERE rfid_uid = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $rfid_uid, $id_pengenal, $nama_anak, $nama_ibu, $penanggung_jawab, $waktu_masuk, $alamat, $status);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<td>" . $id . "</td>";
echo "<th>RFID UID</th>";
echo "<td>" . $rfid_uid . "</td>";
echo "<th>No Kartu Pengenal</th>";
echo "<td>" . $id_pengenal . "</td>";
echo "<th>Nama Anak</th>";
echo "<td>" . $nama_anak . "</td>";
echo "<th>Nama Ibu</th>";
echo "<td>" . $nama_ibu . "</td>";
echo "<th>Penanggung Jawab</th>";
echo "<td>" . $penanggung_jawab . "</td>";
echo "<th>Waktu Masuk</th>";
echo "<td>" . $waktu_masuk . "</td>";
echo "<th>Alamat</th>";
echo "<td>" . $alamat . "</td>";
echo "<th>Status</th>";
echo "<td>" . $status . "</td>";
echo "</tr>";
echo "</table>";
?>