<?php
include 'koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($koneksi,"update admin set username = '$username', password = '$password'");
header("location:akun_admin.php");

?>