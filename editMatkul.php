<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Edit Data Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$idmatkul = dekripsiurl($_GET["kode"]);
	$sql = "select * from matkul where idmatkul='$idmatkul'";
	$qry = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($qry) == 0) {
		echo "<script>
                alert('ID Tidak Ditemukan')
                javascript:history.go(-1)
            </script>";
		exit();
	}
	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Edit Data Mata Kuliah</h2>
		<form method="post" action="sv_editMatkul.php" autocomplete="off">
			<div class="container p-0">
				<div class="row">
					<div class="form-group mb-3 col">
						<label for="idmatkul">ID:</label>
						<input readonly class="form-control" type="text" name="idmatkul" id="idmatkul" value=<?php echo $row['idmatkul']; ?> required style="width: 300px; background-color: #fff">
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="namamatkul" class="form-label">Nama Mata Kuliah:</label>
						<input type="text" class="form-control" id="namamatkul" name="namamatkul" value="<?php echo $row['namamatkul'] ?>" required style="width: 100%;">
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group col-sm">
						<label for="sks" class="form-label d-block">SKS:</label>
						<select class="form-select px-2 w-100" name="sks" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option <?= $row['sks'] == "1" ? ' selected="selected"' : ''; ?> value="1">1</option>
							<option <?= $row['sks'] == "2" ? ' selected="selected"' : ''; ?> value="2">2</option>
							<option <?= $row['sks'] == "3" ? ' selected="selected"' : ''; ?> value="3">3</option>
							<option <?= $row['sks'] == "4" ? ' selected="selected"' : ''; ?> value="4">4</option>
						</select>
					</div>
					<div class="form-group col-sm">
						<label for="jenis" class="form-label d-block">Jenis:</label>
						<select class="form-select px-2 w-100" name="jenis" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option <?= $row['jns'] == "T" ? ' selected="selected"' : ''; ?> value="T">Teori</option>
							<option <?= $row['jns'] == "P" ? ' selected="selected"' : ''; ?> value="P">Praktek</option>
							<option <?= $row['jns'] == "T/P" ? ' selected="selected"' : ''; ?> value="T/P">Teori/Praktek</option>
						</select>
					</div>
					<div class="form-group col-sm">
						<label for="semester" class="form-label d-block">Semester:</label>
						<select class="form-select px-2 w-100" name="semester" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option <?= $row['smt'] == "1" ? ' selected="selected"' : ''; ?> value="1">1</option>
							<option <?= $row['smt'] == "2" ? ' selected="selected"' : ''; ?> value="2">2</option>
							<option <?= $row['smt'] == "3" ? ' selected="selected"' : ''; ?> value="3">3</option>
							<option <?= $row['smt'] == "4" ? ' selected="selected"' : ''; ?> value="4">4</option>
							<option <?= $row['smt'] == "5" ? ' selected="selected"' : ''; ?> value="5">5</option>
							<option <?= $row['smt'] == "6" ? ' selected="selected"' : ''; ?> value="6">6</option>
							<option <?= $row['smt'] == "7" ? ' selected="selected"' : ''; ?> value="7">7</option>
							<option <?= $row['smt'] == "8" ? ' selected="selected"' : ''; ?> value="8">8</option>
						</select>
					</div>
				</div>
				<div>
					<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
				</div>
			</div>
		</form>
	</div>
	<!-- <script>
		$('#submit').on('click', function() {
			var npp = $('#npp').val();
			var namadosen = $('#namadosen').val();
			var homebase = $('#homebase').val();
			var validation = "/^[a-zA-Z]*$/";
			$.ajax({
				method: "POST",
				url: "sv_editDosen.php",
				data: {
					npp: npp,
					namadosen: namadosen,
					homebase: homebase
				}
			});
		});
	</script> -->
</body>

</html>