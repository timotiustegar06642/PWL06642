<!DOCTYPE html>
<html lang="en">

<head>
    <title>Input KRS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <?php
    require "fungsi.php";
    require "head.html";
    $progdi = substr($_GET['nim'], 0, 3);
    $hasil = cari("matkul", "idmatkul like '" . $progdi . "%'", 0, $progdi);
    ?>
    <div class="utama">
        <h2 class="text-center">Input KRS <?= $_GET['nim'] ?></h2>
        <form action="">
            <select class="form-select px-2 mr-3" id="matkul" name="idMatkul" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                <option value='' disabled selected>Pilih Mata Kuliah</option>
                <?php
                while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                    <option value=<?= $row["idmatkul"]; ?>><?= $row["namamatkul"] ?></option>
                <?php } ?>
            </select>
        </form>
        <div id="tabelmatkul"></div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#matkul").change(function() {
            var mk = $(this).val()
            $.post("ajax/ajaxKrs.php", {
                mk: mk
            }, function(data) {
                $("#tabelmatkul").html(data);
            })
        })
    })
</script>

</html>