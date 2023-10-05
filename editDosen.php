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
	$npp = dekripsiurl($_GET["id"]);
	$sql = "select * from dosen where npp='$npp'";
	$qry = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Edit Data Dosen</h2>
		<div class="row">
			<div class="col-sm-9">
				<form method="post" action="sv_editDosen.php" autocomplete="off">
					<div class="form-group">
						<label for="npp">NPP:</label>
						<div style="display: flex;">
							<input readonly class="form-control" type="text" name="npp" id="npp" value=<?php echo $row['npp']; ?> required style="width: 300px">
						</div>
					</div>
					<div class="form-group">
						<label for="namadosen">Nama Dosen:</label>
						<input class="form-control" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen'] ?>" style="width: 600px;">
					</div>
					<div class="form-group">
						<label for="homebase">Homebase:</label>
						<select class="form-select d-block" name="homebase" style="height: 40px; border :1px solid #ced4da;border-radius: 0.25rem;">
							<?php
							$sql = "select * from jurusan";
							$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
							while ($option = mysqli_fetch_assoc($hasil)) { ?>
								<option value=<?php echo $option['kode'] ?> <?= $row['homebase'] == $option['kode'] ? ' selected="selected"' : ''; ?>><?php echo $option['nama'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div>
						<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
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
	</script>
</body>

</html>