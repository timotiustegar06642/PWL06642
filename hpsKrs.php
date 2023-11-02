<?php
require "fungsi.php";
$idKrs =  dekripsiurl($_GET["kode"]);
$q = "select * from krs where idKrs='" . $idKrs . "'";
$rs = mysqli_query($koneksi, $q);
if (mysqli_num_rows($rs) == 1) {
    $sql = "delete from krs where idKrs='" . $idKrs . "'";
    mysqli_query($koneksi, $sql);
    header("location:updateKrs.php");
} else {
    echo "<script>
                alert('Hapus Gagal: ID = '" . $idKrs . "' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
}
