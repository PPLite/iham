<?php 
$server = "localhost";
$username = "mjdr3247_admin" ;
$password = "semogacepatlulus2021" ;
$database = "mjdr3247_adminpanel";

$con = new mysqli($server,$username,$password,$database);
if($con->connect_error){
die("Koneksi gagal: ".$con->connect_error);
}
$sql = $con->query ("SELECT * FROM tb_rfid WHERE `status_asset` IN (\"tersedia\")");
while ($row = $sql->fetch_assoc()) {
        $namas[] = array('nama_alat' 		=>$row ['nama_alat'],
						 'id' 				=>$row ['id'],
						 'rfid_uid'			=>$row ['rfid_uid'],
						 'deskripsi' 		=>$row ['deskripsi'],
						 'penanggung_jawab' =>$row ['penanggung_jawab'],
						 'keterangan' 		=>$row ['keterangan'],
						 'peminjam' 		=>$row ['peminjam'],
						 'status_asset' 	=>$row ['status_asset'],);
}


// Cleaning up the term
$term = trim(strip_tags($_GET['term']));
 
// Rudimentary search
$matches = array();
foreach($namas as $nama){
	if(stripos
		($nama['nama_alat'], $term) !== false){
		// Tambahin keterangan tambahan di sebelahnya seperti  tipe barang dan keterangan
		
		$nama['value'] = $nama['nama_alat'];
		$nama['label'] = "{$nama['nama_alat']} - {$nama['deskripsi']}";
		$matches[] = $nama;
	}
}
 
// Truncate, encode and return the results
$matches = array_slice($matches, 0, 6);
print json_encode($matches);
?>