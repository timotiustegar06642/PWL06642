<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Daftar Mata Kuliah</title>
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

	//memanggil file berisi fungsi2 yang sering dipakai
	require "fungsi.php";
	require "head.html";

	/*	---- cetak data per halaman ---------	*/

	//--------- konfigurasi

	//jumlah data per halaman
	$cari = isset($_POST['cari']) ? $_POST['cari'] : null;
	//ambil data untuk cari jumlah data
	$hasil = cari("matkul", "idmatkul like'%$cari%' or namamatkul like '%$cari%' or sks like '%$cari%' or jns like '%$cari%' or smt like '%$cari%'", 0, $cari);

	//pagination
	pagination($hasil, $max);

	// Ambil data untuk ditampilkan
	$hasil = cari("matkul", "idmatkul like'%$cari%' or namamatkul like '%$cari%' or sks like '%$cari%' or jns like '%$cari%' or smt like '%$cari%'", 1, $cari);
	?>
	<div class="utama">
		<h2 class="text-center mt-3">Daftar Mata Kuliah</h2>
		<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
		<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
		<span class="float-left">
			<a class="btn btn-success" href="addMatkul.php">Tambah Data</a>
		</span>
		<span class="float-right">
			<form action="" method="post" class="form-inline">
				<button class="btn btn-success" type="submit">Cari</button>
				<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data dosen..." autocomplete="off">
			</form>
		</span>
		</span>
		<br><br>
		<ul class="pagination" id="pagination-demo">
			<?php
			//navigasi pagination
			//cetak navigasi back
			if ($GLOBALS['halAktif'] > 1) {
				$back = $GLOBALS['halAktif'] - 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
			}
			//cetak angka halaman
			for ($i = 1; $i <= $GLOBALS['jmlHal']; $i++) {
				if ($i == $GLOBALS['halAktif']) {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
				} else {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
				}
			}
			//cetak navigasi forward
			if ($GLOBALS['halAktif'] < $GLOBALS['jmlHal']) {
				$forward = $GLOBALS['halAktif'] + 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
			}
			?>
		</ul>
		<!-- Cetak data dengan tampilan tabel -->
		<table class="table table-hover">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>ID</th>
					<th>Nama Mata Kuliah</th>
					<th style="text-align: center">SKS</th>
					<th style="text-align: center">Jenis</th>
					<th style="text-align: center">Semester</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//jika data tidak ada
				if ($GLOBALS['jmlData'] == 0) {
				?>
					<tr>
						<th colspan="6">
							<div class="alert alert-info alert-dismissible fade show text-center">
								<!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
								Data tidak ada
							</div>
						</th>
					</tr>
					<?php
				} else {
					$no = $GLOBALS['awalData'] + 1;
					while ($row = mysqli_fetch_assoc($hasil)) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row["idmatkul"] ?></td>
							<td><?php echo $row["namamatkul"] ?></td>
							<td style="text-align: center"><?php echo $row["sks"] ?></td>
							<td style="text-align: center"><?php echo $row["jns"] ?></td>
							<td style="text-align: center"><?php echo $row["smt"] ?></td>
							<td>
								<a class="btn btn-outline-primary btn-sm" href="editMatkul.php?kode=<?php echo enkripsiurl($row['idmatkul']) ?>">Edit</a>
								<a class="btn btn-outline-danger btn-sm" href="hpsMatkul.php?kode=<?php echo enkripsiurl($row['idmatkul']) ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
							</td>
						</tr>
				<?php
						$no++;
					}
				}
				?>
			</tbody>
		</table>
	</div>
</body>

</html>