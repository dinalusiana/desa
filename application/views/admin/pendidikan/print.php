<!DOCTYPE html>
<html>
<head>
	<title>Data Pendidikan Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA PENDIDIKAN DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Tingkat pendidikan</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($pendidikan as $pendidikan): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pendidikan->tingkat_pendidikan ?></td>
			<!-- <td><?php echo $pendidikan->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>