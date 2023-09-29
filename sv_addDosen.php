
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp = $_POST["nppStatic"] . "." . $_POST["nppYear"] . "." . $_POST["npp"];
$namadosen = $_POST["namadosen"];
$homebase = $_POST["homebase"];
$var = "/^[.a-zA-Z, ]*$/";
// if (!preg_match($var, $namadosen)) {
//     echo "Nama Dosen hanya boleh mengandung huruf saja";
//     //validasi untuk alphabetnya
// }
//kondisi ketika data yang diinput benar
// else {
    $q="select * from dosen where npp='".$npp."'";
    $rs=mysqli_query($koneksi, $q);
    if(mysqli_num_rows($rs) == 0){
        $sql = "insert into dosen values('$npp','$namadosen','$homebase')";
        mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        header("location:updateDosen.php");
    } else {
        echo "<script>
                alert('NPP yang Diinput Sudah Ada')
                javascript:history.go(-1)
        
            </script>";
    }
// }


?>