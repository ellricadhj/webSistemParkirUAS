<!DOCTYPE html>
<html>
<head>
	<title>Ubah</title><link rel="stylesheet" type="text/css" href="css/gaya2.css">
</head>
<body>
	<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>
		<article>
		<?php
		include'koneksi.php';
		$id = $_GET['id'];
		$data = mysqli_query($koneksi, "select * from user where id='$id'");
		while($d = mysqli_fetch_array($data)){
			?>
			<form method="post" action="ubah_pengunjung.php">
				<table>
					<tr>
						<td>Username</td>
						<td>
							<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
							<input type="text" name="username" value="<?php echo $d['username']; ?>">
						</td>
					</tr>
					<tr>
						<td>Password</td>
						<td>
							<input type="text" name="password" value="<?php echo $d['password']; ?>">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="simpan" value="SIMPAN">
						</td>
					</tr>
				</table>
			</form>
			<?php
		}
			?>
		</article>
	</div>
</body>
</html>