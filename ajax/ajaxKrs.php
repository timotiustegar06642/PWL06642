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
                <th style="text-align: center">SKS</th>
                <th style="text-align: center">Jenis</th>
                <th style="text-align: center">Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
                <tr>
                    <td><?php echo $row["idmatkul"] ?></td>
                    <td><?php echo $row["namamatkul"] ?></td>
                    <td style="text-align: center"><?php echo $row["sks"] ?></td>
                    <td style="text-align: center"><?php echo $row["jns"] ?></td>
                    <td style="text-align: center"><?php echo $row["smt"] ?></td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="editMatkul.php?kode=<?php echo enkripsiurl($row['idmatkul']) ?>">Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="hpsMatkul.php?kode=<?php echo enkripsiurl($row['idmatkul']) ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
<?php
};
?>