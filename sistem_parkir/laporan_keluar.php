<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Masuk</title>
	<link rel="stylesheet" type="text/css" href="css/gaya2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
		<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>

			<div class="navbar">
				  <a href="halaman_admin_keluar.php">BERANDA</a>
				  <a href="daftar_pengunjung_keluar.php">RIWAYAT KELUAR</a>
				  <a href="laporan_keluar.php">LAPORAN</a>
				  <a href="grafik_keluar.php">GRAFIK</a>
				  <div class="dropdown">
				  <button class="dropbtn" onclick="myFunction()">AKSES
				    <i class="fa fa-caret-down"></i>
				  </button>
				  <div class="dropdown-content" id="myDropdown">
				    <a href="akun_admin_untuk_admin_keluar.php">Akun Admin</a>
				    <a href="akun_pengunjung_untuk_admin_keluar.php">Akun Pengunjung</a>
				  </div>
				  </div>
				  <a href="logout.php">LOGOUT</a> 
				</div>

				<script>
				function myFunction() {
				  document.getElementById("myDropdown").classList.toggle("show");
				}

				window.onclick = function(e) {
				  if (!e.target.matches('.dropbtn')) {
				  var myDropdown = document.getElementById("myDropdown");
				    if (myDropdown.classList.contains('show')) {
				      myDropdown.classList.remove('show');
				    }
				  }
				}
				</script>

				<?php
				include 'koneksi.php';

				$query = "select parkir_masuk.id, parkir_masuk.no_plat, parkir_masuk.waktu_masuk, parkir_keluar.waktu_keluar, parkir_masuk.lokasi_parkir
				     		from parkir_masuk
							LEFT OUTER JOIN parkir_keluar ON 
							(parkir_masuk.id= parkir_keluar.id )";

				$hasil = mysqli_query($koneksi, $query);

				if(!mysqli_query($koneksi, $query)){
					die(mysqli_error($koneksi));
				}
				?>
			<article>
				<h2>Daftar Pengunjung Parkir</h2>
					<form action="cari_keluar.php" method="post">
						<input type="text" name="no_plat" placeholder="Ketikkan plat nomor">
						<input type="submit" value="Cari">
					</form>
					<br>

				<table border="1">
					<tr>
						<th>No</th>
						<th>Nomor Plat</th>
						<th>Waktu Masuk</th>
						<th>Waktu Keluar</th>
						<th>Lokasi Parkir</th>
					</tr>
					<?php
					$no = 0;
					while($buff=mysqli_fetch_array($hasil)) {
						$no++;
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?= $buff['no_plat'] ?></td>
						<td><?= $buff['waktu_masuk'] ?></td>
						<td><?= $buff['waktu_keluar'] ?></td>
						<td><?= $buff['lokasi_parkir'] ?></td>

					</tr>	
					<?php
					};
					mysqli_close($koneksi);
					?>
				</table>
			</article>
			<br><br><br>

				<a href="cetak.php" target="_blank">CETAK</a>
			<footer>
				<p>&copy; UIN Syarif Hidayatullah Jakarta</p>
			</footer>
		</div>
	</body>
	</html>