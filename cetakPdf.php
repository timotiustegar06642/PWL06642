<?php
require "fungsi.php";
$type = $_GET["type"];
$param = isset($_GET["param"]) ? $_GET['param'] : null;
if ($type == "krs") {
    header("Location: krsMhs.php?nim=" . $param);
    // generatepdf("A4", "Portrait", "krsMhs.php", "krs_" . $param);
} else {
    echo "salah";
}
