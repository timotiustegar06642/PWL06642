<?php
require "../fungsi.php";
$id = $_POST["id"];
$hasil = cari("kultawar", "idmatkul like '%$id%'", 0, "$id");
?>
<option value='' disabled selected>Pilih Jadwal Kuliah</option>
<?php
while ($row = mysqli_fetch_assoc($hasil)) {
?>
    <option value=<?= $row["idkultawar"]; ?>><?= $row["hari"] ?> - <?= $row["jamkul"] ?> - <?= $row["ruang"] ?></option>
<?php } ?>