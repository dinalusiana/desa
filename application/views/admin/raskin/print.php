<!DOCTYPE html>
<html>
<head>
	<title>Data Raskin Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA RASKIN DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>NIK</th>
			<th>Nama</th>
            <th>Gender</th>
            <th>Usia</th>
            <th>Dusun</th>
            <th>RT</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($raskin as $raskin): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $raskin->nik ?></td>
			<td><?php echo $raskin->nama ?></td>
			<td><?php echo $raskin->gender ?></td>
            <td><?php echo $raskin->usia ?></td>
            <td><?php echo $raskin->dusun ?></td>
            <td><?php echo $raskin->rt ?></td>
            <td><?php echo $raskin->pendidikan ?></td>
            <td><?php echo $raskin->pekerjaan ?></td>
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>