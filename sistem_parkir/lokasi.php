<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pengunjung</title>
	<link rel="stylesheet" type="text/css" href="css/gaya2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];
?>
<body>
	<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>

		<div class="navbar">
			<a href="halaman_pengunjung.php">BERANDA</a>
			  <a href="logout.php">LOGOUT</a> 
		</div>

		<article>	
			<h1>Halaman Pengunjung</h1>
				<br>
				<table border="1">
				<tr>
					<th>Lokasi Parkir</th>
				</tr>

				<?php
				include 'koneksi.php';

				$no =1;
				$data = mysqli_query($koneksi, "select * from parkir where no_plat ='$id'");
				while($d = mysqli_fetch_array($data)){
					?>
						<tr>
							<td><?php echo $d['lokasi_parkir'];?></td>
						</tr>	
					<?php
				}
				?>
			</table>
		</article>
		<footer>
			<p>&copy; UIN Syarif Hidayatullah Jakarta</p>
		</footer>
	</div>

</body>
</html>