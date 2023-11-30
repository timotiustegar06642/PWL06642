<?php
require "fungsi.php";
$id =  dekripsiurl($_GET["kode"]);
$q = "select * from krs where idKrs=" . $id;
$rs = mysqli_query($koneksi, $q);
$nim = mysqli_fetch_assoc($rs)['nim'];

if (mysqli_num_rows($rs) == 1) {
    $sql = "delete from krs where idKrs=" . $id;
    mysqli_query($koneksi, $sql);
    header("location:inputKRS.php?nim=".$nim);
} else {
    echo "<script>
                alert('Hapus Gagal: ID = '" . $id . "' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
}
?>