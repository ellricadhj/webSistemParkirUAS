<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin Keluar</title>
	<link rel="stylesheet" type="text/css" href="css/gaya2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
			<h1>Halaman Admin Keluar</h1>

				<h3>Pengunjung Keluar</h3>
				<br>
				<form action="pengunjung_out.php" method="post">
					Plat Nomor :
					<input type="text" name="no_plat" value="" placeholder="Plat Nomor" required="">
					<input type="submit" name="tambah" value="submit">
				</form>
				<br><br>
		</article>
		<footer>
			<p>&copy; UIN Syarif Hidayatullah Jakarta</p>
		</footer>
	</div>

</body>
</html>