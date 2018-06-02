<?php

	$bulan = array(
		'jan','feb','mar','apr','mei','jun','jul','agu','sep','okt','nov','des'
	);
	
	$bulan2 = array(
		'tjan','tfeb','tmar','tapr','tmei','tjun','tjul','tagu','tsep','tokt','tnov','tdes'
	);

?>
<div class="label label-success" 
	 style="margin-bottom: 120px">
	 Jumlah Transaksi Setoran Nasabah Baru Bank Sampah(Individu-Kelompok)
</div>				
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #2fa4e7">
			<th>Jenis</th>
			<th>Januari</th>
			<th>Februari</th>
			<th>Maret</th>
			<th>April</th>
			<th>Mei</th>
			<th>Juni</th>
			<th>Juli</th>
			<th>Agustus</th>
			<th>September</th>
			<th>Oktober</th>
			<th>November</th>
			<th>Desember</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if($transaksi == null) {
	?>		
		<tr> 
			<td colspan="14" style="text-align: center"><strong> - Data Kosong - </strong></td>
		</tr> 
	<?php
	} else {
		
		for($a=0; $a<=11; $a++) {
			$bulan2[$a] = 0;
		}
		$total2 = 0;
		foreach($transaksi as $row): 
		$total = 0;
	?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->jenis=='i'?'Individu':'Kelompok'; ?></td>
			<?php for($x=0; $x<=11; $x++) { ?>
				<td style="background-color: #57bef9"><?php echo $row->$bulan[$x]; ?></td>
			<?php  $total = $total + $row->$bulan[$x]; $bulan2[$x] = $bulan2[$x] + $row->$bulan[$x]; } ?>
			<td style="background-color: #57bef9"><strong><?php echo $total; $total2 = $total2 + $total; ?></strong></td>
		</tr>
	<?php endforeach; } 
		if($transaksi) {
	?>
		<tr>
			<td style="background-color: #57bef9"><strong>Total</strong></td>
			<?php for($a=0; $a<=11; $a++) { ?>
			<td style="background-color: #57bef9"><strong><?php echo $bulan2[$a]; ?></strong></td>
			<?php } ?>
			<td style="background-color: #57bef9"><strong><?php echo $total2; ?></strong></td>
		</tr>
	<?php }?> 
	</tbody>
</table>