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
	require "fungsi.php";
	require "head.html";
	$idKrs = dekripsiurl($_GET["kode"]);
	$sql = "select * from krs where idKrs='$idKrs'";
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
		<h2 class="my-3 text-center">Edit Data KRS</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_editKrs.php" autocomplete="off">
			<input value=<?= $row["idKrs"] ?> type="hidden" class="form-control" name="idKrs" required>
			<div class="container p-0">
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="npp">Mahasiswa:</label>
						<select class="form-select px-2 mr-3" id="mhs" name="nim" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Mahasiswa</option>
							<?php
							$hasil = cari("mhs", "", 0);
							while ($rm = mysqli_fetch_assoc($hasil)) {
							?>
								<option <?= $row['nim'] == $rm['nim'] ? ' selected="selected"' : ''; ?> value=<?= $rm["nim"]; ?>><?= $rm["nama"] ?></option>
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
								<?php
								$hb = explode(".", $row["nim"])[0];
								$hasil = cari("matkul", "idmatkul like '%$homebase%'", 0, "$homebase");
								while ($rd = mysqli_fetch_assoc($hasil)) {
								?>
									<option <?= $row['idMatkul'] == $rd['idmatkul'] ? ' selected="selected"' : ''; ?> value=<?= $rd["idmatkul"]; ?>><?= $rd["namamatkul"] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group mb-3 col-6">
						<label for="npp">Dosen:</label>
						<div id="dosenGroup">
							<select id="dosen" class="form-select px-2 mr-3" name="nppDos" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
								<option value='' disabled selected>Pilih Dosen</option>
								<?php
								$hb = explode(".", $row["nim"])[0];
								$hasil = cari("dosen", "homebase='$hb'", 0, "$hb");
								while ($rd = mysqli_fetch_assoc($hasil)) {
								?>
									<option <?= $row['nppDos'] == $rd['npp'] ? ' selected="selected"' : ''; ?> value=<?= $rd["npp"]; ?>><?= $rd["namadosen"] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-3">
						<label for="npp">Tahun Akademik:</label>
						<input value=<?= $row["thAkd"] ?> type="text" class="form-control" name="thAkd" required>
					</div>
					<div class="form-group col-3">
						<label for="sks" class="form-label d-block">Nilai:</label>
						<select class="form-select px-2 w-100" name="nilai" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Nilai</option>
							<option <?= $row['nilai'] == "A" ? ' selected="selected"' : ''; ?> value="A">A</option>
							<option <?= $row['nilai'] == "B" ? ' selected="selected"' : ''; ?> value="B">B</option>
							<option <?= $row['nilai'] == "C" ? ' selected="selected"' : ''; ?> value="C">C</option>
							<option <?= $row['nilai'] == "D" ? ' selected="selected"' : ''; ?> value="D">D</option>
							<option <?= $row['nilai'] == "E" ? ' selected="selected"' : ''; ?> value="E">E</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label for="sks" class="form-label d-block">Hari:</label>
						<select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Hari</option>
							<option <?= $row['hari'] == "Senin" ? ' selected="selected"' : ''; ?> value="Senin">Senin</option>
							<option <?= $row['hari'] == "Selasa" ? ' selected="selected"' : ''; ?> value="Selasa">Selasa</option>
							<option <?= $row['hari'] == "Rabu" ? ' selected="selected"' : ''; ?> value="Rabu">Rabu</option>
							<option <?= $row['hari'] == "Kamis" ? ' selected="selected"' : ''; ?> value="Kamis">Kamis</option>
							<option <?= $row['hari'] == "Jumat" ? ' selected="selected"' : ''; ?> value="Jumat">Jumat</option>
						</select>
					</div>
					<div class="form-group col-sm-3">
						<label for="jenis" class="form-label d-block">Jam Kuliah:</label>
						<select class="form-select px-2 w-100" name="waktu" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Jam</option>
							<option <?= $row['waktu'] == "07.00-08.40" ? ' selected="selected"' : ''; ?> value="07.00-08.40">07.00-08.40</option>
							<option <?= $row['waktu'] == "08.40-10.20" ? ' selected="selected"' : ''; ?> value="08.40-10.20">08.40-10.20</option>
							<option <?= $row['waktu'] == "10.20-12.00" ? ' selected="selected"' : ''; ?> value="10.20-12.00">10.20-12.00</option>
							<option <?= $row['waktu'] == "12.30-14.10" ? ' selected="selected"' : ''; ?> value="12.30-14.10">12.30-14.10</option>
							<option <?= $row['waktu'] == "14.10-16.20" ? ' selected="selected"' : ''; ?> value="14.10-16.20">14.10-16.20</option>
							<option <?= $row['waktu'] == "16.20-18.00" ? ' selected="selected"' : ''; ?> value="16.20-18.00">16.20-18.00</option>
							<option <?= $row['waktu'] == "18.30-20.10" ? ' selected="selected"' : ''; ?> value="18.30-20.10">18.30-20.10</option>
							<option <?= $row['waktu'] == "07.00-19.30" ? ' selected="selected"' : ''; ?> value="07.00-19.30">07.00-09.30</option>
							<option <?= $row['waktu'] == "09.30-12.00" ? ' selected="selected"' : ''; ?> value="09.30-12.00">09.30-12.00</option>
							<option <?= $row['waktu'] == "12.30-15.00" ? ' selected="selected"' : ''; ?> value="12.30-15.00">12.30-15.00</option>
							<option <?= $row['waktu'] == "15.30-18.00" ? ' selected="selected"' : ''; ?> value="15.30-18.00">15.30-18.00</option>
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
<script>
	$(document).ready(function() {
		$('#mhs').change(function() {
			var mhs = $(this).val();
			var mk = $("#matkul").val();
			var dos = $("#dosen").val();
			$.post("ajax/ajaxEditKrsDosen.php", {
				id: mhs,
				npp: dos
			}, function(data) {
				if (data != "") {
					$("#dosen").html(data);
				}
			})
			$.post("ajax/ajaxEditKrsMatkul.php", {
				id: mhs,
				idm: mk
			}, function(data) {
				if (data != "") {
					$("#matkul").html(data);
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