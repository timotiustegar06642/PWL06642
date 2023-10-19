
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul = $_POST["idSelect"] . "." . $_POST["idText"];
$namamatkul = $_POST["namamatkul"];
$semester = $_POST["semester"];
$sks = $_POST["sks"];
$jenis = $_POST["jenis"];
if (ctype_digit(strval($_POST["idText"])) == 0) {
    echo "<script>
                alert('ID Mata Kuliah Hanya Boleh Mengandung angka')
                javascript:history.go(-1)
            </script>";
    //validasi untuk alphabetnya
}
// kondisi ketika data yang diinput benar
else {
    $q = "select * from matkul where idmatkul='" . $idmatkul . "'";
    $rs = mysqli_query($koneksi, $q);
    if (mysqli_num_rows($rs) == 0) {
        $sql = "insert into matkul values('', '$idmatkul','$namamatkul', '$sks','$jenis','$semester')";
        mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        header("location:updateMatkul.php");
    } else {
        echo "<script>
                alert('ID Mata Kuliah yang Diinput Sudah Ada')
                javascript:history.go(-1)
            </script>";
    }
}


?>