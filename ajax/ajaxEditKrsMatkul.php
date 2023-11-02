<?php
require "../fungsi.php";
$id = $_POST["id"];
$idm = $_POST["idm"];
$homebase = explode(".", $id)[0];
$hasil = cari("matkul", "idmatkul like '%$homebase%'", 0, "$homebase");
?>
<option value='' disabled selected>Pilih Mata Kuliah</option>
<?php
while ($row = mysqli_fetch_assoc($hasil)) {
?>
    <option <?= $idm == $row['idmatkul'] ? ' selected="selected"' : ''; ?> value=<?= $row["idmatkul"]; ?>><?= $row["namamatkul"] ?></option>
<?php } ?>