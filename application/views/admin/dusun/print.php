<!DOCTYPE html>
<html>
<head>
	<title>Data dusun Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA DUSUN DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Dusun</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($dusun as $dusun): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $dusun->dusun ?></td>
			<!-- <td><?php echo $dusun->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>