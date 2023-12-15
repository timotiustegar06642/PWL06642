<?php
require "fungsi.php";
$type = $_GET["type"];
$param = isset($_GET["param"]) ? $_GET['param'] : null;
if ($type == "krs") {
    header("Location: krsMhs.php?nim=" . $param);
} elseif ($type == "krm") {
    header("Location: krm.php?npp=" . $param);
} else {
    echo "salah";
}
