
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$thAkd = $_POST["thAkd"];
$nim = $_POST["nim"];
$idMatkul = $_POST['idMatkul'];
$nilai = $_POST["nilai"];
$nppDos = $_POST["nppDos"];
$hari = $_POST["hari"];
$waktu = $_POST["waktu"];
if (ctype_digit(strval($_POST["thAkd"])) == 0) {
    echo "<script>
                alert('Tahun Akademik Hanya Boleh Mengandung angka')
                javascript:history.go(-1)
            </script>";
}
// kondisi ketika data yang diinput benar
else {
    $sql = "insert into krs values('', '$thAkd','$nim', '$idMatkul','$nilai','$nppDos','$hari','$waktu')";
    mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    header("location:updateKrs.php");
}


?>