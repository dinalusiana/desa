<!DOCTYPE html>
<html>
<head>
	<title>Data Pekerjaan Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA PEKERJAAN DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>jenis pendidikan</th>
			<!-- <th>Jumlah</th> -->
		</tr>

		<?php 
		$no = 1;
		foreach ($pekerjaan as $pekerjaan): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pekerjaan->jenis_pekerjaan ?></td>
			<!-- <td><?php echo $pekerjaan->jumlah ?></td> -->
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>