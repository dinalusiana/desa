<!DOCTYPE html>
<html>
<head>
	<title>Data Agama Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA AGAMA DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Agama</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($agama as $agama): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $agama->agama ?></td>
			<!-- <td><?php echo $agama->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>