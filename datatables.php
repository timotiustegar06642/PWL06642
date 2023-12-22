<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <script src="assets/datatables/datatables.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    require "head.html";
    require "fungsi.php";
    $sql = "select * from mhs";
    $hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    ?>
    <div class="utama">
        <table id="myTable" class="display table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?php echo $row["nim"] ?></td>
                        <td><?php echo $row["nama"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><img src="<?php echo "foto/" . $row["foto"] ?>" height="50"></td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="editMhs.php?kode=<?php echo $row['id'] ?>">Edit</a>
                            <a class="btn btn-outline-danger btn-sm" href="hpsMhs.php?kode=<?php echo $row["id"] ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                            <a class="btn btn-outline-primary btn-sm" href="inputKRS.php?nim=<?= $row['nim'] ?>">Input KRS</a>
                            <a class="btn btn-outline-primary btn-sm" href="cetakPdf.php?type=krs&param=<?= $row['nim'] ?>">Cetak KRS</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>