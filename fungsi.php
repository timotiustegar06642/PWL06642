<?php
//membuat koneksi ke database mysql
$koneksi = mysqli_connect('192.168.10.253', 'a122106642', 'polke001', 'a122106642');
// $koneksi = mysqli_connect('localhost', 'root', '', 'a122106642');
$jmlData = $awalData = $halAktif = $jmlHal = 0;
$max = 5;
function enkripsiurl($id)
{
    $enc = base64_encode(rand() * strtotime(date("H:i:s")) . "-" . $id);
    return $enc;
}
function dekripsiurl($string)
{
    $kode = base64_decode($string);
    $id = explode("-", $kode);
    if (isset($id[1])) {
        return $id[1];
    } else {
        echo "<script>
                alert('NPP yang Diinput Sudah Ada')
                javascript:history.go(-1)
        
            </script>";
    }
}
function select($field, $table, $cond, $where, $row)
{
    $s = "Select * from $table " . ($where == 1 ? "where $cond = '$row'" : "");
    $h = mysqli_query($GLOBALS['koneksi'], $s) or die(mysqli_error($GLOBALS['koneksi']));
    $r = mysqli_fetch_assoc($h);
    return $r[$field];
}
function cari($table, $where, $limit, $key = null)
{
    if (isset($key)) {
        $sql = "select * from $table where $where " . ($limit == 1 ? "limit " . $GLOBALS['awalData'] . ", " . $GLOBALS['max'] : "");
    } else {
        $sql = "select * from $table " . ($limit == 1 ? "limit " . $GLOBALS['awalData'] . ", " . $GLOBALS['max'] : "");
    }
    $hasil = mysqli_query($GLOBALS['koneksi'], $sql) or die(mysqli_error($GLOBALS['koneksi']));
    return $hasil;
}
function pagination($arr, $max)
{
    $jmlData = mysqli_num_rows($arr);

    $jmlHal = ceil($jmlData / $max);
    if (isset($_GET['hal'])) {
        $halAktif = $_GET['hal'];
    } else {
        $halAktif = 1;
    }

    $awalData = ($max * $halAktif) - $max;

    $GLOBALS['jmlData'] = $jmlData;
    $GLOBALS['halAktif'] = $halAktif;
    $GLOBALS['jmlHal'] = $jmlHal;
    $GLOBALS['awalData'] = $awalData;
    $GLOBALS['max'] = $max;
}
function generatepdf($size = "A4", $orientation = "Portrait", $html = null, $filename = "doc")
{
    require_once __DIR__ . "/vendor/autoload.php";
    $pdf = new \Dompdf\Dompdf();
    // $file = file_get_contents($html);
    $pdf->loadHtml($html);
    $pdf->setPaper($size, $orientation);
    $pdf->render();
    $pdf->stream($filename . ".pdf", array("Attachment" => FALSE));
}
