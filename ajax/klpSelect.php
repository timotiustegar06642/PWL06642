<?php
$id = $_GET["id"];
$homebase = explode(".", $id)[0];
?>
<input class="form-control bg-white" type="text" name="klpStatic" id="klpStatic" value=<?= $homebase ?> readonly style="width:15%;">
<input class=" form-control" type="text" name="klp" id="klp" style="width:82%">