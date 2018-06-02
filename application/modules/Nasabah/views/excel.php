<p><strong>DATA NASABAH BANK SAMPAH<strong></p>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th>No</th>
  <th>No. Rekening</th>
  <th>Nama</th>
  <th>Jenis Tabungan</th>
  <th>Alamat</th>
  <th>Keterangan</th>
</tr>
</thead>
<tbody>
<?php foreach($data as $no => $row): ?>
	<tr>
	  <td width="5%"><?php echo $no+1; ?></td>
	  <td><?php echo $row->no_rekening; ?></td>
	  <td><?php echo $row->nama; ?> </td>
	  <td><?php echo $row->jenis=='i'?'Individu':'Kelompok'; ?></td>
	  <td><?php echo $row->desa.' Kec. '.$row->kecamatan; ?></td>
	  <td><?php echo $row->ket; ?></td>

	  </tr>
<?php endforeach; ?>
</tbody>
</table>
