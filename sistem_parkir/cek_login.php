
<?php 
session_start();
include 'latihan6C.php';
$username = $_POST['username'];
$password = $_POST['password'];

$siapa=$_POST['siapa'];

if($siapa=="user"){
	$sql="select * from user where username='$username' and password='$password'";
}else if($siapa=='admin'){
		$sql="select * from admin where username='$username' and password='$password'";
	}

$login = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($login);

if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	if($siapa=='admin'){
		if($data['level']=="masuk"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "masuk";
			header("location:halaman_admin_masuk.php");

		}else if($data['level']=="keluar"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "keluar";
			header("location:halaman_admin_keluar.php");

		}else{

			header("location:login.php?pesan=gagal");
		}	
	}else if($siapa=='user'){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['id'] = $data['id'];
		header("location:halaman_pengunjung.php");
	}
}else{
	header("location:login.php?pesan=gagal");
}

?>