
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$nim = $_POST["nim"];
$id = $_POST["id_jadwal"];
$matkul = select("idmatkul", "kultawar", "idkultawar", 1, $id);
$sks = select("sks", "matkul", "idmatkul", 1, $matkul);
echo $sks;
$sql = "insert into krs values('', '$nim', '$id','$sks')";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header("location:updateKrs.php");



?>