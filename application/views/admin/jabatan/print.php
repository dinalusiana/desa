<!DOCTYPE html>
<html>
<head>
	<title>Data jabatan Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA JABATAN DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Jabatan</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($jabatan as $jabatan): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $jabatan->jabatan ?></td>
			<!-- <td><?php echo $jabatan->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>