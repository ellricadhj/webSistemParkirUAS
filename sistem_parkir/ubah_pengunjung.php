<?php
include 'koneksi.php';
session_start();

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($koneksi,"update user set username = '$username', password = '$password' where id='$id'");

if ($_SESSION['level']=="masuk") {
	header("location:akun_pengunjung.php");
}else if($_SESSION['level']=="keluar"){
	header("location:akun_pengunjung_untuk_admin_keluar.php");
}else{
	header("location:login.php");
}

?>