<!DOCTYPE html>
<html>
<head>
	<title>Data bansos Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA BANTUAN SOSIAL DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Jenis Bantuan Sosial</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($bansos as $bansos): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $bansos->jenis_bantuan ?></td>
			<!-- <td><?php echo $bansos->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>