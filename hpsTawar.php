<?php
require "fungsi.php";
$idkultawar =  dekripsiurl($_GET["kode"]);
$q = "select * from kultawar where idkultawar='" . $idkultawar . "'";
$rs = mysqli_query($koneksi, $q);
if (mysqli_num_rows($rs) == 1) {
    $sql = "delete from kultawar where idkultawar='" . $idkultawar . "'";
    mysqli_query($koneksi, $sql);
    header("location:updateTawar.php");
} else {
    echo "<script>
                alert('Hapus Gagal: ID = '" . $idkultawar . "' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
}
