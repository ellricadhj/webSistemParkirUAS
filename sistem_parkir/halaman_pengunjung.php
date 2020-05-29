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
?>
<body>
	<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>

		<div class="navbar">
			<a href="lokasi.php">LOKASI</a>
			  <a href="logout.php">LOGOUT</a> 
		</div>

		<article>	
			<h1>Halaman Pengunjung</h1>
				<br>
				<table border="1">
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th>Aksi</th>
				</tr>

				<?php
				include 'koneksi.php';

				$no =1;
				$data = mysqli_query($koneksi, "select * from user where username = '$username' and password = '$password'");
				while($d = mysqli_fetch_array($data)){
					?>
						<tr>
							<td><?php echo $d['username'];?></td>
							<td><?php echo $d['password'];?></td>
							<td>
								<a href="halaman_ubah_pengunjung.php?id=<?php echo $d['id']; ?>">Ubah</a>
							</td>
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