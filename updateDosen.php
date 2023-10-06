<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Daftar Dosen</title>
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
	$jmlDataPerHal = 3;

	//cari jumlah data
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$sql = "select * from dosen where npp like'%$cari%' or
						namadosen like '%$cari%' or
						homebase like '%$cari%'";
	} else {
		$sql = "select * from dosen";
	}
	$qry = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
	$jmlData = mysqli_num_rows($qry);

	$jmlHal = ceil($jmlData / $jmlDataPerHal);
	if (isset($_GET['hal'])) {
		$halAktif = $_GET['hal'];
	} else {
		$halAktif = 1;
	}

	$awalData = ($jmlDataPerHal * $halAktif) - $jmlDataPerHal;
	//Jika tabel data kosong
	$kosong = false;
	if (!$jmlData) {
		$kosong = true;
	}
	// data berdasar pencarian atau tidak
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$halAktif = 1;
		$sql = "select * from dosen where npp like'%$cari%' or
						namadosen like '%$cari%' or
						homebase like '%$cari%'
						limit $awalData,$jmlDataPerHal";
	} else {
		$sql = "select * from dosen limit $awalData,$jmlDataPerHal";
	}
	// Ambil data untuk ditampilkan
	// data berdasar pencarian atau tidak
	if (isset($_POST['cari'])) {
		$cari = $_POST['cari'];
		$halAktif = 1;
		$sql = "select * from dosen where npp like'%$cari%' or
						namadosen like '%$cari%' or
						homebase like '%$cari%'
						limit $awalData,$jmlDataPerHal";
	} else {
		$sql = "select * from dosen limit $awalData,$jmlDataPerHal";
	}
	// Ambil data untuk ditampilkan
	$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

	?>
	<div class="utama">
		<h2 class="text-center mt-3">Daftar Dosen</h2>
		<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
		<!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
		<span class="float-left">
			<a class="btn btn-success" href="addDosen.php">Tambah Data</a>
		</span>
		<span class="float-right">
			<form action="" method="post" class="form-inline">
				<button class="btn btn-success" type="submit">Cari</button>
				<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data dosen..." autocomplete="off">
			</form>
		</span>
		</span>
		<br><br>
		<ul class="pagination">
			<?php
			//navigasi pagination
			//cetak navigasi back
			if ($halAktif > 1) {
				$back = $halAktif - 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
			}
			//cetak angka halaman
			for ($i = 1; $i <= $jmlHal; $i++) {
				if ($i == $halAktif) {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
				} else {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
				}
			}
			//cetak navigasi forward
			if ($halAktif < $jmlHal) {
				$forward = $halAktif + 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
			}
			if ($halAktif > 1) {
				$back = $halAktif - 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$back>&laquo;</a></li>";
			}
			//cetak angka halaman
			for ($i = 1; $i <= $jmlHal; $i++) {
				if ($i == $halAktif) {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i style='font-weight:bold;color:red;'>$i</a></li>";
				} else {
					echo "<li class='page-item'><a class='page-link' href=?hal=$i>$i</a></li>";
				}
			}
			//cetak navigasi forward
			if ($halAktif < $jmlHal) {
				$forward = $halAktif + 1;
				echo "<li class='page-item'><a class='page-link' href=?hal=$forward>&raquo;</a></li>";
			}
			?>
		</ul>
		<!-- Cetak data dengan tampilan tabel -->
		<table class="table table-hover">
			<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>NPP</th>
					<th>Nama Dosen</th>
					<th style="text-align: center">Homebase</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//jika data tidak ada
				if ($kosong) {
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
					if ($awalData == 0) {
						$no = $awalData + 1;
					} else {
						$no = $awalData;
					}
					while ($row = mysqli_fetch_assoc($hasil)) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row["npp"] ?></td>
							<td><?php echo $row["namadosen"] ?></td>
							<td style="text-align: center"><?php echo $row["homebase"] ?></td>
							<td>
								<a class="btn btn-outline-primary btn-sm" href="editDosen.php?kode=<?php echo enkripsiurl($row['npp']) ?>">Edit</a>
								<a class="btn btn-outline-danger btn-sm" href="hpsDosen.php?kode=<?php echo enkripsiurl($row['npp']) ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
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