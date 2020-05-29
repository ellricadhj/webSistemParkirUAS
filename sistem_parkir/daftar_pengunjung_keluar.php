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

		<article>
			<h1>Daftar Pengunjung Keluar</h1>
			<table border="1">
				<tr>
					<th>NO</th>
					<th>Plat Nomor</th>
					<th>Waktu Masuk</th>
					<th>Lokasi Parkir</th>
				</tr>

				<?php
				include 'koneksi.php';

				$no =1;
				$data = mysqli_query($koneksi, "select * from parkir_keluar");
				while($d = mysqli_fetch_array($data)){
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $d['no_plat'];?></td>
							<td><?php echo $d['waktu_keluar'];?>		
							<td><?php echo $d['lokasi_parkir'];?></td>
						</tr>	
					<?php
				}
				?>
			</table>
			<br>
		</article>
		<footer>
			<p>&copy; UIN Syarif Hidayatullah Jakarta</p>
		</footer>
	</div>
</body>
</html>

