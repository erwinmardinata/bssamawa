<table>
	<tr>
		<td width="50%">Nomor Rekening</td>
		<td width="3%">:</td><td><?php echo $data->nama; ?></td>
	</tr>
	<tr>
		<td>Penabung</td><td>:</td><td><?php echo $data->no_rekening; ?></td>
	</tr>
</table>
<br>
<br>
<table border="1px" cellpadding="3px">
	<thead>
		<tr>
			<th>Tanggal</th>
			<th>Setor</th>
			<th>Ambil</th>
			<th>Saldo</th>
			<th>Ket</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		$saldo = 0;
		foreach($transaksi as $no => $row): 
		$saldo = $row->harga + $saldo - $row->ambil;
	?>
		<tr>
			<td><?php echo $row->tanggal; ?></td>
			<td><?php echo $row->harga==0?"":$row->harga; ?></td>
			<td><?php echo $row->ambil==0?"":$row->ambil; ?></td>
			<td><?php echo $saldo; ?></td>
			<td><?php echo $row->ket==""?"":$row->ket; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
