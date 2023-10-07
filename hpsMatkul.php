<?php
    require "fungsi.php";
    $idmatkul=  dekripsiurl($_GET["kode"]);
    $q="select * from matkul where idmatkul='".$idmatkul."'";
    $rs = mysqli_query($koneksi, $q);
    if(mysqli_num_rows($rs) == 1){
        $sql = "delete from matkul where idmatkul='".$idmatkul."'";
        mysqli_query($koneksi, $sql);
        header("location:updateMatkul.php");
    } else {
        echo "<script>
                alert('Hapus Gagal: ID = '".$idmatkul."' Tidak Ditemukan)
                javascript:history.go(-1)
        
            </script>";
    }
