<?php
require "fungsi.php";
$npp = $_GET['npp'];
$sql = "select * from kultawar a join matkul b on (a.idmatkul=b.id) where a.npp='" . $npp . "'";
$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$dosen = cari("dosen", "npp ='" . $npp . "'", 0, $npp);
$sks = 0;
$rsdosen = mysqli_fetch_assoc($dosen);
$html = "<body><div style='width : 100%; text-align: center'><h3>KRM Dosen</h3></div>";
$html .= "<p>NPP : " . $rsdosen["npp"] . "</p>";
$html .= "<p>Nama : " . $rsdosen["namadosen"] . "</p>";
$html .= "<table class='table' style='border-collapse:collapse'>
    <thead>
    <tr style='border:1px solid black;'>
        <th style='padding: 5px; border:1px solid black;'>No</th>
        <th style='padding: 5px; text-align: left;border:1px solid black;'>Kode</th>
        <th style='padding: 5px; text-align: left;border:1px solid black;'>Nama Mata Kuliah</th>
        <th style='padding: 5px; text-align: left;border:1px solid black;'>Kelompok</th>
        <th style='padding: 5px; border:1px solid black;'>SKS</th>
        <th style='padding: 5px; border:1px solid black;'>Jadwal</th>
        <th style='padding: 5px; border:1px solid black;'>Ruang</th>
    </tr>
</thead>";
$i = 1;
while ($row = mysqli_fetch_assoc($rs)) {
    $html .= "
    <tr style='border:1px solid black;'>
        <td style='padding: 5px; border:1px solid black; text-align: center;'>" . $i . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['idmatkul'] . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['namamatkul'] . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['klp'] . "</td>
        <td style='padding: 5px; border:1px solid black; text-align: center;'>" . $row['sks'] . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['hari'] . "<br/>" . $row['jamkul'] . "</td>
        <td style='padding: 5px; border:1px solid black; text-align: center;'>" . $row['ruang'] . "</td>
    </tr>";
    $i++;
}

$html .= "</table></body>";
generatepdf("A4", "Portrait", $html, "krm_" . $npp);
