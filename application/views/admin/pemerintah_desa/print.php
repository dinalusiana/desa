<!DOCTYPE html>
<html>
<head>
	<title>Data Pemerintah Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA PEMERINTAH DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>NIK</th>
			<th>NIP</th>
			<th>No Sk Angkat</th>
			<th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($joinpemdes as $row): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?= $row->nik ?></td>
			<td><?= $row->nip ?></td>
			<td><?= $row->no_sk_angkat ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->gender ?></td>
            <td><?= $row->jabatan ?></td>
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>