<?php
require "../fungsi.php";
$id = $_GET["id"];
$homebase = explode(".", $id)[0];
?>
<select class="form-select px-2 mr-3" name="npp" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;">
    <option value='' disabled selected>Pilih Dosen</option>
    <?php
    $hasil = cari("dosen", "homebase='$homebase'", 0, "$homebase");
    while ($row = mysqli_fetch_assoc($hasil)) {
    ?>
        <option value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
    <?php } ?>
</select>