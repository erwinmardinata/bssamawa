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
	 Jumlah Transaksi Nasabah(Berdasarkan Jenis Sampah)
</div>				
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #2fa4e7">
			<th>Jenis Sampah</th>
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
		if($jml_sampah == null) {
	?>		
		<tr> 
			<td colspan="14" style="text-align: center"><strong> - Data Kosong - </strong></td>
		</tr> 
	<?php
	} else {
		
		for($a=0; $a<=11; $a++) {
			$bulan2[$a] = 0;
		}
		$totalsetoran = 0;
		foreach($jml_sampah as $row): 
		$total = 0;
	?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->nama; ?></td>
			<?php for($x=0; $x<=11; $x++) { ?>
				<td style="background-color: #57bef9; text-align: right"><?php echo number_format($row->$bulan[$x], 0, '',','); ?></td>
			<?php  $total = $total + $row->$bulan[$x]; $bulan2[$x] = $bulan2[$x] + $row->$bulan[$x]; } ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($total, 0, '',','); $totalsetoran = $totalsetoran + $total; ?></strong></td>
		</tr>
	<?php endforeach; } 
		if($jml_sampah) {
	?>
		<tr>
			<td style="background-color: #57bef9"><strong>Total</strong></td>
			<?php for($a=0; $a<=11; $a++) { ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($bulan2[$a], 0, '',','); ?></strong></td>
			<?php } ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($totalsetoran, 0, '',','); ?></strong></td>
		</tr>
	<?php }?> 
	</tbody>
</table>
