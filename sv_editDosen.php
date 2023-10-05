<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp = $_POST["npp"];
$namadosen = $_POST["namadosen"];
$homebase = $_POST["homebase"];
$uploadOk = 1;
$var = "/^[.a-zA-Z0-9, ]*$/";
if (!preg_match($var, $namadosen)) {
	echo "Nama Dosen hanya boleh mengandung huruf saja";
	//validasi untuk alphabetnya
}
//kondisi ketika data yang diinput benar
else {
	//membuat query
	$sql = "update dosen set namadosen='$namadosen',
					    homebase='$homebase'
					    where npp='$npp'";
	mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	header("location:updateDosen.php");
}
