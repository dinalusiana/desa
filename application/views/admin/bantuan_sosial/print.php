<!DOCTYPE html>
<html>
<head>
	<title>Data Bantuan Sosial Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA BANTUAN SOSIAL DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>NIK</th>
			<th>Nama</th>
            <th>jenis Kelamin</th>
            <th>jenis Bantuan</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($joinbantuan as $row): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $row->nik ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->gender ?></td>
            <td><?= $row->jenis_bantuan ?></td>

			
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>