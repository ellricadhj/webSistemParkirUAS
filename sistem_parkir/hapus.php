<?php
session_start();
include'koneksi.php';

$id = $_GET['id'];
$user = $_GET['user']; 

if($user == 1){
	$mysql = "DELETE FROM admin WHERE id='$id'";	
		header("location:akun_admin.php");
}
else
{
	$mysql = "DELETE FROM user WHERE id='$id'";
		header("location:akun_pengunjung.php");
}

if ($_SESSION['level']=="masuk") {
	header("location:akun_pengunjung.php");
}else if($_SESSION['level']=="keluar"){
	header("location:akun_pengunjung_untuk_admin_keluar.php");
}else{
	header("location:halaman_pengunjung.php");
}

if(!mysqli_query($koneksi, $mysql))
	die(mysqli_error());


?>