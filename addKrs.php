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
		<h2 class="my-3 text-center">Tambah Data KRS</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_addKrs.php" autocomplete="off">
			<div class="container p-0">
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="npp">Mahasiswa:</label>
						<select class="form-select px-2 mr-3" id="mhs" name="nim" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Mahasiswa</option>
							<?php
							$hasil = cari("mhs", "", 0);
							while ($row = mysqli_fetch_assoc($hasil)) {
							?>
								<option value=<?= $row["nim"]; ?>><?= $row["nama"] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-6">
						<label for="npp">Mata Kuliah:</label>
						<div id="dosenGroup">
							<select id="matkul" class="form-select px-2 mr-3" name="idMatkul" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
								<option value='' disabled selected>Pilih Mata Kuliah</option>
							</select>
						</div>
					</div>
					<div class="form-group mb-3 col-6">
						<label for="npp">Jadwal Kuliah:</label>
						<div id="dosenGroup">
							<select id="jadwal" class="form-select px-2 mr-3" name="id_jadwal" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
								<option value='' disabled selected>Pilih Jadwal Kuliah</option>
							</select>
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
		$('#mhs').change(function() {
			var mk = $(this).val();
			$.post("ajax/ajaxKrsMatkul.php", {
				id: mk
			}, function(data) {
				if (data != "") {
					$("#matkul").html(data);
				}
			})
		})
		$('#matkul').change(function() {
			var mk = $(this).val();
			$.post("ajax/ajaxKrsJadwal.php", {
				id: mk
			}, function(data) {
				if (data != "") {
					$("#jadwal").html(data);
				}
			})
		})
	})
	// $(document).ready(function() {
	// 	$('#matkulSelect').on("change", function() {
	// 		$('#dosenGroup').load('ajax/dosenSelect.php?id=' + $('#matkulSelect').val())
	// 		$('#klpGroup').load('ajax/klpSelect.php?id=' + $('#matkulSelect').val())
	// 		$('#jamGroup').load('ajax/jamSelect.php?id=' + $('#matkulSelect').val())
	// 	})
	// })
</script>

</html>