<?php
require "../fungsi.php";
$id = $_POST["mk"];
$hasil = cari("kultawar", "idmatkul='" . $id . "'", 0, $id);
if (mysqli_num_rows($hasil) == 0) {
    echo "Mata kuliah tidak ditawarkan";
} else {
?>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th>Nama Dosen</th>
                <th style="text-align: center">SKS</th>
                <th style="text-align: center">Jadwal</th>
                <th style="text-align: center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
                <tr>
                    <td><?php echo $row["idkultawar"] ?></td>
                    <td><?php echo select("namamatkul", "matkul", "idmatkul", 1, $row['idmatkul']) ?></td>
                    <td><?php echo select("namadosen", "dosen", "npp", 1, $row['npp']) ?></td>
                    <td style="text-align: center"><?php echo select("sks", "matkul", "idmatkul", 1, $row['idmatkul']) ?></td>
                    <td style="text-align: center"><?php echo $row['hari'] ?> - <?php echo $row['jamkul'] ?></td>
                    <td style="text-align: center">
                        <input type="radio" name="pilih" value="<?php echo $row['idkultawar'] ?>-<?php echo select('sks', 'matkul', 'idmatkul', 1, $row['idmatkul'])?>" />
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
    <input type="submit" value="Simpan" class="btn btn-primary">
<?php
};
?>