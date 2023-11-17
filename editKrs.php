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
	$sql = "select * from tbl_krs where idK='$idKrs'";
	$qry = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($qry) == 0) {
		echo "<script>
                alert('ID Tidak Ditemukan')
                javascript:history.go(-1)
            </script>";
		exit();
	}
	$row = mysqli_fetch_assoc($qry);
	$idmatkul = select("idmatkul", "kultawar", "idkultawar", 1, $row['id_jadwal']);
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Edit Data KRS</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_editKrs.php" autocomplete="off">
			<input value=<?= $row["idK"] ?> type="hidden" class="form-control" name="idK" required>
			<input id="sks" value=<?= $row["sks"] ?> type="hidden" class="form-control" name="sks" required>
			<?php
			?>
			<div class="container p-0">
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="npp">Mahasiswa:</label>
						<?php
						$nama = select("nama", "mhs", "nim", 1, $row['nim']);
						// $nim = $row['nim'];
						// $sqln = "select * from mhs where nim='$nim'";
						// $qn = mysqli_query($koneksi, $sqln);
						// $rn = mysqli_fetch_assoc($qn)
						?>
						<input readonly class="form-control" type="hidden" name="nim" id="nim" value=<?php echo $row["nim"]; ?> required style="background-color: #fff">
						<input readonly class="form-control" type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required style="background-color: #fff">
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
									<option <?= $idmatkul == $rd['idmatkul'] ? ' selected="selected"' : ''; ?> value=<?= $rd["idmatkul"]; ?>><?= $rd["namamatkul"] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group mb-3 col-6">
						<label for="npp">Jadwal Kuliah:</label>
						<div id="dosenGroup">
							<select id="jadwal" class="form-select px-2 mr-3" name="id_jadwal" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
								<option value='' disabled selected>Pilih Jadwal Kuliah</option>
								<?php
								$hasil = cari("kultawar", "idmatkul like '%$idmatkul%'", 0, "$idmatkul");
								while ($rj = mysqli_fetch_assoc($hasil)) {
								?>
									<option <?= $row["id_jadwal"] == $rj['idkultawar'] ? ' selected="selected"' : ''; ?> value=<?= $rj["idkultawar"]; ?>><?= $rj["hari"] ?> - <?= $rj["jamkul"] ?> - <?= $rj["ruang"] ?></option>
								<?php } ?>
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