<?php
require "fungsi.php";
$id =  dekripsiurl($_GET["kode"]);
$q = "select * from tbl_krs where idK='" . $id . "'";
$rs = mysqli_query($koneksi, $q);
if (mysqli_num_rows($rs) == 1) {
    $sql = "delete from tbl_krs where idK='" . $id . "'";
    mysqli_query($koneksi, $sql);
    header("location:updateKrs.php");
} else {
    echo "<script>
                alert('Hapus Gagal: ID = '" . $id . "' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
}
