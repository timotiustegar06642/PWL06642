<?php
require "../fungsi.php";
$id = $_POST["id"];
$sks = select("sks", "matkul", "idmatkul", 1, $id);
?>
<input id="sks" value="<?= $sks ?>" type=" text" class="form-control" name="sks" required>