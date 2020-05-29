<!DOCTYPE html>
<html>
<head>
	<title>CETAK LAPORAN</title>
</head>
<body>

	<?php 
	include 'koneksi.php';
	?>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nomor Plat</th>
			<th>Waktu Masuk</th>
			<th>Waktu Keluar</th>
			<th width="5%">Lokasi Parkir</th>
		</tr>
		<?php 
		$no = 1;

				$query = "select parkir_masuk.id, parkir_masuk.no_plat, parkir_masuk.waktu_masuk, parkir_keluar.waktu_keluar, parkir_masuk.lokasi_parkir
				     		from parkir_masuk
							LEFT OUTER JOIN parkir_keluar ON 
							(parkir_masuk.id= parkir_keluar.id )";

		$sql = mysqli_query($koneksi, $query);
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $data['no_plat'] ?></td>
			<td><?= $data['waktu_masuk'] ?></td>
			<td><?= $data['waktu_keluar'] ?></td>
			<td><?= $data['lokasi_parkir'] ?></td>
		</tr>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>