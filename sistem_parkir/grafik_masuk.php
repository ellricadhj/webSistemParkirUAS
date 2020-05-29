<!DOCTYPE html>
<html>
<head>
	<title>Grafik Masuk</title>
	<link rel="stylesheet" type="text/css" href="css/gaya2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
		<div class="container">
		<header>
			<img src="images/FIXBGT.gif">
		</header>

			<div class="navbar">
				  <a href="halaman_admin_masuk.php">BERANDA</a>
				  <a href="daftar_pengunjung.php">RIWAYAT MASUK</a>
				  <a href="laporan.php">LAPORAN</a>
			  	  <a href="grafik_masuk.php">GRAFIK</a>
				  <div class="dropdown">
				  <button class="dropbtn" onclick="myFunction()">AKSES
				    <i class="fa fa-caret-down"></i>
				  </button>
				  <div class="dropdown-content" id="myDropdown">
				    <a href="akun_admin.php">Akun Admin</a>
				    <a href="akun_pengunjung.php">Akun Pengunjung</a>
				  </div>
				  </div>
				  <a href="logout.php">LOGOUT</a> 
				</div>

				<script>
				function myFunction() {
				  document.getElementById("myDropdown").classList.toggle("show");
				}

				window.onclick = function(e) {
				  if (!e.target.matches('.dropbtn')) {
				  var myDropdown = document.getElementById("myDropdown");
				    if (myDropdown.classList.contains('show')) {
				      myDropdown.classList.remove('show');
				    }
				  }
				}
				</script>




<script type="text/javascript" src="chartjs/Chart.js"></script>

<?php
include'koneksi.php';

	$tahun = date("Y");
$a = array();
echo "<h1>Grafik Parkir Masuk per Tahun ".$tahun."</h1>";
for ($i=1; $i <=12 ; $i++) {
  // Select Banyak Id pada Tabel Iklan dimana bulan pada kolom Tanggal = $i dan Tahun pada kolom Tanggal = $tahun
  $sql = "select count('id') as jumlah from parkir_masuk where (month(waktu_masuk)=$i and year(waktu_masuk)='$tahun')";
  $query = mysqli_query($koneksi,$sql);
  $c = mysqli_fetch_row($query);
  $a[$i] = $c[0];// Menyimpan Hasil banyak iklan per bulan dengan array $a
} 
?>

<article>
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Januari', 'febuari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'],
				datasets: [{
					label: '',
					data: [
					<?php foreach ($a as $key) echo $key.","; ?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</article>
			<br>
			<footer>
				<p>&copy; UIN Syarif Hidayatullah Jakarta</p>
			</footer>
		</div>
	</body>
	</html>