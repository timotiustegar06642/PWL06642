<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informastesti Akademik::Tambah Data Dosen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require "head.html";
	require "fungsi.php";
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Tambah Data Dosen</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_addDosen.php" autocomplete="off">
			<div class="form-group mb-3">
				<label for="npp">NPP:</label>
				<div style="display: flex;">
					<input class="form-control" type="text" name="nppStatic" id="npp" value="0686.11" readonly style="width:80px">
					<select class="form-select mx-2" name="nppYear" style="height: 40px; border :1px solid #ced4da;border-radius: 0.25rem;">
						<?php for ($i = 1900; $i <= date('Y'); $i++) { ?>
							<option value=<?php echo $i ?>><?php echo $i ?></option>
						<?php } ?>
					</select>
					<input class="form-control" type="text" name="npp" id="npp" required style="width: 150px">
				</div>
			</div>
			<div class="form-group mb-3">
				<label for="namadosen" class="form-label">Nama Dosen:</label>
				<input type="text" class="form-control" id="namadosen" name="namadosen" required style="width: 600px;">
			</div>
			<div class="form-group mb-3">
				<label for="homebase" class="form-label d-block">Homebase:</label>
				<select class="form-select" name="homebase" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
					<option value="A11">Teknik Informatika - S1</option>
					<option value="A12">Sistem Informasi - S1</option>
					<option value="A14">Desain Komunikasi Visual - S1</option>
					<option value="A15">Ilmu Komunikasi - S1</option>
					<option value="A16">Film dan Televisi - S1</option>
					<option value="A17">Animasi - S1</option>
					<option value="A22">Teknik Informatika - D3</option>
				</select>
			</div>
			<div>
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>

</html>