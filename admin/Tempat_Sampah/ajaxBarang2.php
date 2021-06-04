<?php 
$server = "localhost";
$username = "root" ;
$password = "" ;
$database = "ukm";

$con = new mysqli($server,$username,$password,$database);
if($con->connect_error){
die("Koneksi gagal: ".$con->connect_error);
}
$sql = $con->query ("SELECT * FROM barang");
while ($row = $sql->fetch_assoc()) {
        $namas[] = array('nama' 	=> 	$row	['namaBarang'],
						 'kode' 	=>	$row	['kodeBarang'],
						 'harga' 	=>	$row	['hargaBarang'],
						 'stok' 	=> 	$row	['stokBarang'],
						 'idBarang' =>	$row	['idBarang']);
}


// Cleaning up the term
$term = trim(strip_tags($_GET['term']));
 
// Rudimentary search
$matches = array();
foreach($namas as $nama){
	if(stripos
		($nama['nama'], $term) !== false){
		// Tambahin keterangan tambahan di sebelahnya seperti  tipe barang dan keterangan
		
		$nama['value'] = $nama['nama'];
		$nama['label'] = "{$nama['nama']} - {$nama['kode']}";
		$matches[] = $nama;
	}
}
 
// Truncate, encode and return the results
$matches = array_slice($matches, 0, 6);
print json_encode($matches);
?>