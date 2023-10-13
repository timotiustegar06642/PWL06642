<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informastesti Akademik::Tambah Data Mata Kuliah</title>
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
		<h2 class="my-3 text-center">Tambah Data Mata Kuliah</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_addMatkul.php" autocomplete="off">
			<div class="container p-0">
				<div class="row">
					<div class="form-group mb-3 col">
						<label for="npp">ID:</label>
						<div style="display: flex;">
							<select class="form-select px-2 mr-3" name="idSelect" style="height: 40px; width: 70px;border :1px solid #ced4da;border-radius: 0.25rem;">
								<option value="A11">A11</option>
								<option value="A12">A12</option>
								<option value="A14">A14</option>
								<option value="A15">A15</option>
								<option value="A16">A16</option>
								<option value="A17">A17</option>
								<option value="A22">A22</option>
							</select>
							<input class="form-control" type="text" name="idText" id="idText" required style="width: 150px">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="namamatkul" class="form-label">Nama Mata Kuliah:</label>
						<input type="text" class="form-control" id="namamatkul" name="namamatkul" required style="width: 100%;">
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group col-sm">
						<label for="sks" class="form-label d-block">SKS:</label>
						<select class="form-select px-2 w-100" name="sks" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="6">6</option>
						</select>
					</div>
					<div class="form-group col-sm">
						<label for="jenis" class="form-label d-block">Jenis:</label>
						<select class="form-select px-2 w-100" name="jenis" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option value="T">Teori</option>
							<option value="P">Praktek</option>
							<option value="T/P">Teori/Praktek</option>
						</select>
					</div>
					<div class="form-group col-sm">
						<label for="semester" class="form-label d-block">Semester:</label>
						<select class="form-select px-2 w-100" name="semester" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
						</select>
					</div>
				</div>
				<div>
					<button type="submit" class="btn btn-success" value="Simpan">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</body>

</html>