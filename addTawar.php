<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informastesti Akademik::Tambah Data Penawaran</title>
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
		<h2 class="my-3 text-center">Tambah Data Penawaran</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_addTawar.php" autocomplete="off">
			<div class="container p-0">
				<div class="row">
					<div class="form-group mb-3 col-6">
						<label for="npp">Mata Kuliah:</label>
						<select class="form-select px-2 mr-3" id="matkulSelect" name="idMatkul" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Mata Kuliah</option>
							<?php
							$hasil = cari("matkul", "", 0);
							while ($row = mysqli_fetch_assoc($hasil)) {
							?>
								<option value=<?= $row["idmatkul"]; ?>><?= $row["namamatkul"] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group mb-3 col-6">
						<label for="npp">Kelompok:</label>
						<div class="d-flex justify-content-between" id="klpGroup">
							<input class="form-control bg-white" type="text" name="klpStatic" id="klpStatic" value="" readonly style="width:15%;">
							<input class=" form-control" type="text" name="klp" id="klp" style="width:82%" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="npp">Dosen:</label>
						<div id="dosenGroup">
							<select class="form-select px-2 mr-3" name="npp" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
								<option value='' disabled selected>Pilih Dosen</option>
								<?php
								$hasil = cari("dosen", "", 0);
								while ($row = mysqli_fetch_assoc($hasil)) {
								?>
									<option value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group col-sm">
						<label for="sks" class="form-label d-block">Hari:</label>
						<select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Hari</option>
							<option value="Senin">Senin</option>
							<option value="Selasa">Selasa</option>
							<option value="Rabu">Rabu</option>
							<option value="Kamis">Kamis</option>
							<option value="Jumat">Jumat</option>
						</select>
					</div>
					<div class="form-group col-sm" id="jamGroup">
						<label for="jenis" class="form-label d-block">Jam Kuliah:</label>
						<select class="form-select px-2 w-100" name="jamkul" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Jam</option>
							<option value="07.00-08.40">07.00-08.40</option>
							<option value="08.40-10.20">08.40-10.20</option>
							<option value="10.20-12.00">10.20-12.00</option>
							<option value="12.30-14.10">12.30-14.10</option>
							<option value="14.10-16.20">14.10-16.20</option>
							<option value="16.20-18.00">16.20-18.00</option>
							<option value="18.30-20.10">18.30-20.10</option>
							<option value="07.00-19.30">07.00-09.30</option>
							<option value="09.30-12.00">09.30-12.00</option>
							<option value="12.30-15.00">12.30-15.00</option>
							<option value="15.30-18.00">15.30-18.00</option>
						</select>
					</div>
					<div class="form-group col-sm">
						<label for="semester" class="form-label d-block">Ruang:</label>
						<div class="d-flex justify-content-between">
							<input class=" form-control" type="text" name="ruangGedung" id="ruang" style="width:30%" placeholder="Gedung" required>
							<input class=" form-control" type="text" name="ruangLantai" id="ruang" style="width:30%" placeholder="Lantai" required>
							<input class=" form-control" type="text" name="ruangNo" id="ruang" style="width:30%" placeholder="No. Ruang" required>
						</div>
					</div>
				</div>
				<div>
					<button type="submit" class="btn btn-success" value="Simpan">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</body>
<script>
	$(document).ready(function() {
		$('#matkulSelect').on("change", function() {
			$('#dosenGroup').load('ajax/dosenSelect.php?id=' + $('#matkulSelect').val())
			$('#klpGroup').load('ajax/klpSelect.php?id=' + $('#matkulSelect').val())
			$('#jamGroup').load('ajax/jamSelect.php?id=' + $('#matkulSelect').val())
		})
	})
</script>

</html>