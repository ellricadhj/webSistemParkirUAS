<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PARKIR</title>
	<link rel="stylesheet" type="text/css" href="css/gaya2.css">
</head>
<body>
	<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>
	<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo"<div class='alert'>Username dan Password tidak sesuai</div>";
		}
	}
	?>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan Login</p>

		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username">
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password" required="required">
 			
 			<input type="radio" name="siapa" value="admin">Admin<br>
  			<input type="radio" name="siapa" value="user">Pengunjung<br>
  			<br>
			<input type="submit" class="tombol_login" value="LOGIN">
		</form>
	</div>

</body>
</html>