<!DOCTYPE html>
<html>
<head>
	<title>Data penduduk Desa Sejomulyo</title>
</head>
<body>

	<center>

		<h2>DATA PENDUDUK DESA SEJOMULYO</h2>
		<h4>KECAMATAN JUWANA KABUPATEN PATI</h4>

	</center>

	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>NIK</th>
			<th>Nama</th>
            <th>Gender</th>
            <th>Usia</th>
			<th>TTL</th>
			<th>Alamat</th>
            <th>Dusun</th>
            <th>RT</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
			<th>Agama</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($join as $row): ?>
		<tr>
		<td><?php echo $no++; ?></td>
                        <td><?= $row->nik ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->gender ?></td>
                        <td><?= $row->usia ?></td>
						<td><?= $row->ttl ?></td>
						<td><?= $row->alamat ?></td>
                        <td><?= $row->dusun ?></td>
                        <td><?= $row->rt ?></td>
                        <td><?= $row->tingkat_pendidikan ?></td>
                        <td><?= $row->jenis_pekerjaan ?></td>
                        <td><?= $row->agama ?></td>
		</tr>

        <?php endforeach; ?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>