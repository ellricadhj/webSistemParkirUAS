<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin Masuk</title>
	<link rel="stylesheet" type="text/css" href="css/gaya2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<?php 
	session_start();

	if($_SESSION['level']==""){
		header("location:login.php?pesan=gagal");
	}

	?>
	<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>
				<!-- <menu>
			<ul>
				<li><a href="halaman_admin_masuk.php">BERANDA</a></li>
				<li><a href="daftar_pengunjung.php">RIWAYAT MASUK</a></li>
				<li><a href="akses.php">AKSES</a>
					<ul>
						<li><a href="akun_admin.php">Akun Admin</a></li>
						<li><a href="akun_pengunjung.php">Akun User</a></li>
					</ul>
				</li>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</menu> -->
			<div class="navbar">
			  <a href="halaman_admin_masuk.php">BERANDA</a>
			  <a href="daftar_pengunjung.php">RIWAYAT MASUK</a>
			  <a href="laporan.php">LAPORAN</a>
			  <a href="grafik_masuk.php">GRAFIK</a>
			  <div class="dropdown">
			  <button class="dropbtn" onclick="myFunction()">AKSES
			    <i class="fa fa-caret-down"></i>
			  </button>
			  <div class="dropdown-content" id="myDropdown">
			    <a href="akun_admin.php">Akun Admin</a>
			    <a href="akun_pengunjung.php">Akun Pengunjung</a>
			  </div>
			  </div>
			  <a href="logout.php">LOGOUT</a>
			</div>

			<script>
			function myFunction() {
			  document.getElementById("myDropdown").classList.toggle("show");
			}

			function pilih_parkir($value){
				document.getElementById("lokasi_parkir").value = $value;
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

			<h1>Halaman Admin Masuk</h1>

			<div class="left">	
				<h3>Input Pengunjung</h3>
				<br>
				<form action="pengunjung_save.php" method="post">
					Plat Nomor :
					<input type="text" name="no_plat" value="" placeholder="Plat Nomor" required="">
					<br><br>
					Lokasi Parkir :
					<br>
					<br>
					<input type="text" name="lokasi_parkir" id="lokasi_parkir" required="">
					<br>
					<br>
					<input type="submit" name="tambah" value="Submit">
				</form>
			</div>

			<div class="right">
				<h3>Status Ketersediaan Parkir</h3>
				<br>
				<table border="1">
					<tr>
						<th>NO</th>
						<th>Lokasi Parkir</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>

					<?php
					include 'koneksi.php';

					$no =1;
					$data = mysqli_query($koneksi, "select * from gedung");
					while($d = mysqli_fetch_array($data)){
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $d['lokasi_parkir'];?></td>
							<td><?php echo $d['status'];?></td>
							<td>
								<button onclick="pilih_parkir('<?php echo $d['lokasi_parkir'];?>')">Pilih</a>
							</td>
						</tr>	
					<?php
					}
					?>
				</table>
				</form>
			</div>










		</article>
		<footer>
			<p>&copy; UIN Syarif Hidayatullah Jakarta</p>
		</footer>
	</div>

</body>
</html>