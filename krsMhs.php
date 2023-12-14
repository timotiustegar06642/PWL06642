<?php
require "fungsi.php";
$nim = $_GET['nim'];
$sql = "select * from krs a join kultawar b on (a.id_jadwal=b.idkultawar) join matkul c on (c.id=b.idmatkul) join dosen d on (b.npp=d.npp) where a.nim='" . $nim . "'";
$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$mhs = cari("mhs", "nim ='".$nim."'", 0, $nim);
$sks = 0;
$rsmhs = mysqli_fetch_assoc($mhs);
$html = "<body><div style='width : 100%; text-align: center'><h3>KRS Mahasiswa</h3></div>";
$html .= "<p>NIM : " . $rsmhs["nim"] . "</p>";
$html .= "<p>Nama : " . $rsmhs["nama"] . "</p>";
$html .= "<table class='table' style='border-collapse:collapse'>
    <thead>
    <tr style='border:1px solid black;'>
        <th style='padding: 5px; border:1px solid black;'>No</th>
        <th style='padding: 5px; text-align: left;border:1px solid black;'>Kode</th>
        <th style='padding: 5px; text-align: left;border:1px solid black;'>Nama Mata Kuliah</th>
        <th style='padding: 5px; border:1px solid black;'>SKS</th>
        <th style='padding: 5px; border:1px solid black;'>Jadwal</th>
        <th style='padding: 5px; border:1px solid black;'>Dosen Pengampu</th>
    </tr>
</thead>";
$i = 1;
while ($row = mysqli_fetch_assoc($rs)) {
    $sks += $row['sks'];
    $html .= "
    <tr style='border:1px solid black;'>
        <td style='padding: 5px; border:1px solid black; text-align: center;'>" . $i . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['idmatkul'] . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['namamatkul'] . "</td>
        <td style='padding: 5px; border:1px solid black; text-align: center;'>" . $row['sks'] . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['hari'] . "<br/>" . $row['jamkul'] . "</td>
        <td style='padding: 5px; border:1px solid black;'>" . $row['namadosen'] . "</td>
    </tr>";
    $i++;
}
$html .= "
<tr style='border:1px solid black;'>
    <td colspan=3 style='padding: 5px'>Total SKS</td>
    <td style='border:1px solid black; text-align: center;'>" . $sks . "</td>
    <td colspan=2></td>
</tr>";
$html .= "</table></body>";
generatepdf("A4", "Portrait", $html, "krs_" . $nim);
