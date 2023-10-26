
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul = $_POST["idMatkul"];
$npp = $_POST["npp"];
$klp = $_POST["klpStatic"] . "." . $_POST['klp'];
$hari = $_POST["hari"];
$jamkul = $_POST["jamkul"];
$ruang = $_POST["ruangGedung"] . "." . $_POST['ruangLantai'] . "." . $_POST['ruangNo'];
if (ctype_digit(strval($_POST["klp"])) == 0) {
    echo "<script>
                alert('ID Mata Kuliah Hanya Boleh Mengandung angka')
                javascript:history.go(-1)
            </script>";
    //validasi untuk alphabetnya
}
// kondisi ketika data yang diinput benar
else {
    $sql = "insert into kultawar values('', '$idmatkul','$npp', '$klp','$hari','$jamkul','$ruang')";
    mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    header("location:updateTawar.php");
}


?>