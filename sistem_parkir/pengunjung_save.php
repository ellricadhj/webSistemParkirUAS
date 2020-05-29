<?php
include 'koneksi.php';

$no_plat = $_POST['no_plat'];
$lokasi_parkir = $_POST['lokasi_parkir'];
mysqli_query($koneksi, "insert into user values('$no_plat', '$no_plat', '$no_plat')");
$query = mysqli_query($koneksi, "insert into parkir values('', '$no_plat', '$lokasi_parkir')");

 if($query){
 	header("location:halaman_admin_masuk.php");
 }else{
 	echo "<script>alert('PLAT GANDA ATAU LOKASI TIDAK TERSEDIA!'); window.history.back();</script>";
 }

?>