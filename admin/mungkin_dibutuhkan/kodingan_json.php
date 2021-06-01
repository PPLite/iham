<!------BIKIN JSON OTOMATIS------>

<?php
function get_data()
{
    $connect = mysqli_connect("localhost", "mjdr3247_admin","semogacepatlulus2021","mjdr3247_adminpanel");
    $query = "SELECT COUNT(rfid_uid) AS jumlah, rfid_uid, nama_alat, deskripsi, penanggung_jawab, status_asset, peminjam, timestamp
              FROM tb_scanner1_assetbarang
              GROUP BY nama_alat
              ORDER BY `timestamp` DESC";
    $results = mysqli_query($connect, $query);
    

    $rfid_scanner1_aset = array();
    while($row = mysqli_fetch_array($results))
    {
        $rfid_scanner1_aset[] = array(
            'jumlah' => $row["jumlah"],
            'rfid_uid' => $row["rfid_uid"],
            'nama_alat' => $row["nama_alat"],
            'deskripsi' => $row["deskripsi"],
            'penanggung_jawab' => $row["penanggung_jawab"],
            'status_asset' => $row["status_asset"],
            'peminjam' => $row["peminjam"],
            'timestamp' => $row["timestamp"]
        );
    }
    return json_encode($rfid_scanner1_aset);
}

$file_name = 'rfid_scaner1_aset.json';
if(file_put_contents($file_name, get_data()))
{
    echo' ';
}
else
{
    echo 'Error?';
}

?>