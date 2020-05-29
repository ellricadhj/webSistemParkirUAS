<?php
include 'koneksi.php';

$no_plat = $_POST['no_plat'];
$lokasi_parkir = $_POST['lokasi_parkir'];

mysqli_query($koneksi, "delete from parkir where no_plat = '$no_plat'");

$query = mysqli_query($koneksi, "delete from parkir where no_plat = '$no_plat'");

if ($query) {
	header("location:halaman_admin_keluar.php");
}else{
	echo "<script>alert('NOMOR PLAT SALAH!'); window.history.back();</script>";
}

?>