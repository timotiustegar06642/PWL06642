<?php
require "../fungsi.php";
$id = $_POST["id"];
$npp = $_POST["npp"];
$homebase = explode(".", $id)[0];
$hasil = cari("dosen", "homebase='$homebase'", 0, "$homebase");
?>
<option value='' disabled selected>Pilih Dosen</option>
<?php
while ($row = mysqli_fetch_assoc($hasil)) {
?>
    <option <?= $npp == $row['npp'] ? ' selected="selected"' : ''; ?> value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
<?php } ?>