
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idK = $_POST['idK'];
$nim = $_POST["nim"];
$id_jadwal = $_POST["id_jadwal"];
$sks = $_POST["sks"];
$sql = "update tbl_krs set nim='$nim',
                        id_jadwal='$id_jadwal',
                        sks='$sks'
					    where idK=$idK";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header("location:updateKrs.php");
?>