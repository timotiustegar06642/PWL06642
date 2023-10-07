<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Edit Data Dosen</title>
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
	$npp = dekripsiurl($_GET["kode"]);
	$sql = "select * from dosen where npp='$npp'";
	$qry = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($qry) == 0) {
		echo "<script>
                alert('NPP Tidak Ditemukan')
                javascript:history.go(-1)
            </script>";
		exit();
	}
	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Edit Data Dosen</h2>
		<div class="row">
			<div class="col-sm-9">
				<form method="post" action="sv_editDosen.php" autocomplete="off">
					<div class="form-group">
						<label for="npp">NPP:</label>
						<input readonly class="form-control" type="text" name="npp" id="npp" value=<?php echo $row['npp']; ?> required style="width: 300px; background-color: #fff">
					</div>
					<div class="form-group">
						<label for="namadosen">Nama Dosen:</label>
						<input class="form-control" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen'] ?>" style="width: 600px;">
					</div>
					<div class="form-group">
						<label for="homebase" class="d-block">Homebase:</label>
						<select class="form-select" name="homebase" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option value="A11" <?= $row['homebase'] == "A11" ? ' selected="selected"' : ''; ?>>A11 - Teknik Informatika - S1</option>
							<option value="A12" <?= $row['homebase'] == "A12" ? ' selected="selected"' : ''; ?>>A12 - Sistem Informasi - S1</option>
							<option value="A14" <?= $row['homebase'] == "A14" ? ' selected="selected"' : ''; ?>>A14 - Desain Komunikasi Visual - S1</option>
							<option value="A15" <?= $row['homebase'] == "A15" ? ' selected="selected"' : ''; ?>>A15 - Ilmu Komunikasi - S1</option>
							<option value="A16" <?= $row['homebase'] == "A16" ? ' selected="selected"' : ''; ?>>A18 - Film dan Televisi - S1</option>
							<option value="A17" <?= $row['homebase'] == "A17" ? ' selected="selected"' : ''; ?>>A17 - Animasi - S1</option>
							<option value="A22" <?= $row['homebase'] == "A22" ? ' selected="selected"' : ''; ?>>A22 - Teknik Informatika - D3</option>
						</select>
					</div>
					<div>
						<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
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