<?php
require "fungsi.php";
$nim = $_POST['nim'];
$pilih = explode('-', $_POST['pilih']);
$sql = "insert into krs (nim, id_jadwal, sks) values ('" . $nim . "', " . $pilih[0] . "," . $pilih[1] . ")";
mysqli_query($koneksi, $sql);
header("Location: inputKRS.php?nim=" . $nim);