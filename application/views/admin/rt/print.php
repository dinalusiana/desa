<!DOCTYPE html>
<html>
<head>
	<title>Data rt Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA RT DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>RT</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($rt as $rt): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $rt->rt ?></td>
			<!-- <td><?php echo $rt->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>