<?php
require "fungsi.php";
$nim = $_GET['nim'];
$sql = "select * from krs a join kultawar b on (a.id_jadwal=b.idkultawar) join matkul c on (c.id=b.idmatkul) join dosen d on (b.npp=d.npp) where a.nim='" . $nim . "'";
$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$mhs = cari("mhs", "", 0);
$sks = 0;
$rsmhs = mysqli_fetch_assoc($mhs);
$html = "<h3>KRS Mahasiswa</h3>";
$html .= "<p>NIM : " . $rsmhs["nim"] . "</p>";
$html .= "<table style='border:1px solid black; border-collapse: collapse'>
    <thead class='thead-light'>
    <tr style='border:1px solid black;'>
        <th style='border:1px solid black;'>No</th>
        <th style='border:1px solid black;'>Kode Mata Kuliah</th>
        <th style='border:1px solid black;'>Nama Mata Kuliah</th>
        <th style='text-align: center; border:1px solid black;'>SKS</th>
        <th style='text-align: center; border:1px solid black;'>Jadwal</th>
        <th style='text-align: center; border:1px solid black;'>Dosen Pengampu</th>
    </tr>
</thead>";
$i = 1;
while ($row = mysqli_fetch_assoc($rs)) {
    $sks += $row['sks'];
    $html .= "
    <tr style='border:1px solid black;'>
        <td style='border:1px solid black;'>" . $i . "</td>
        <td style='border:1px solid black;'>" . $row['idmatkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['namamatkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['sks'] . "</td>
        <td style='text-align: center; border:1px solid black;'>" . $row['hari'] . " - " . $row['jamkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['namadosen'] . "</td>
    </tr>";
    $i++;
}
$html .= "
<tr style='border:1px solid black;'>
    <td colspan=3>Total SKS</td>
    <td style='border:1px solid black;'>" . $sks . "</td>
    <td colspan=2></td>
</tr>";
$html .= "</table>";
generatepdf("A4", "Portrait", $html, "krs_" . $nim);
