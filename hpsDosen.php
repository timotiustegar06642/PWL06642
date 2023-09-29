<?php
    require "fungsi.php";
    $npp=  dekripsiurl($_GET["kode"]);
    $q="select * from dosen where npp='".$npp."'";
    $rs = mysqli_query($koneksi, $q);
    if(mysqli_num_rows($rs) == 1){
        $sql = "delete from dosen where npp='".$npp."'";
        mysqli_query($koneksi, $sql);
        header("location:updateDosen.php");
    } else {
        echo "<script>
                alert('Hapus Gagal: NPP = '".$npp."' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
    }
?>