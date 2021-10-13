<!DOCTYPE html>
<html>
<head>
	<title>Data Balita Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA BALITA DESA SEJOMULYO</h2>
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
            <th>Panjang</th>
            <th>Berat</th>
            <th>Nama Ibu</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($balita as $balita): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $balita->nik ?></td>
			<td><?php echo $balita->nama ?></td>
			<td><?php echo $balita->gender ?></td>
            <td><?php echo $balita->usia ?></td>
            <td><?php echo $balita->dusun ?></td>
            <td><?php echo $balita->rt ?></td>
            <td><?php echo $balita->panjang ?></td>
            <td><?php echo $balita->berat ?></td>
            <td><?php echo $balita->nama_ibu ?></td>
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>