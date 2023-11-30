<?php
require "../fungsi.php";
$id = $_GET["id"];
$postdata = explode(".", $id);
$idMatkul = $postdata[0] . "." . $postdata[1];
$hasil = cari("matkul", "idmatkul='$idMatkul'", 0, $id);
?>
<label for="jenis" class="form-label d-block">Jam Kuliah:</label>
<select class="form-select px-2 w-100" name="jamkul" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;">
    <option value='' disabled selected>Pilih Jam</option>
    <?php
    while ($row = mysqli_fetch_assoc($hasil)) {
        if ($row['sks'] == 3) {
            echo "<option value='07.00-19.30'>07.00-09.30</option>
            <option value='09.30-12.00'>09.30-12.00</option>
            <option value='12.30-15.00'>12.30-15.00</option>
            <option value='15.30-18.00'>15.30-18.00</option>";
        } else {
            echo "<option value='07.00-08.40'>07.00-08.40</option>
            <option value='08.40-10.20'>08.40-10.20</option>
            <option value='10.20-12.00'>10.20-12.00</option>
            <option value='12.30-14.10'>12.30-14.10</option>
            <option value='14.10-16.20'>14.10-16.20</option>
            <option value='16.20-18.00'>16.20-18.00</option>
            <option value='18.30-20.10'>18.30-20.10</option>";
        }
    }
    ?>
</select>