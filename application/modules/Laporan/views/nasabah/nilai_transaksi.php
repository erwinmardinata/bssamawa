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
	 Jumlah Total Transaksi Setoran Nasabah(Individu/Kelompok)
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
		if($saldo == null) {
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
		foreach($saldo as $row): 
		$total = 0;
	?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->jenis=='i'?'Individu':'Kelompok'; ?></td>
			<?php for($x=0; $x<=11; $x++) { ?>
				<td style="background-color: #57bef9; text-align: right"><?php echo number_format($row->$bulan[$x], 0, '',','); ?></td>
			<?php  $total = $total + $row->$bulan[$x]; $bulan2[$x] = $bulan2[$x] + $row->$bulan[$x]; } ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($total, 0, '',','); $totalsetoran = $totalsetoran + $total; ?></strong></td>
		</tr>
	<?php endforeach; } 
		if($saldo) {
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
<div class="label label-success" 
	 style="margin-bottom: 120px">
	 Jumlah Total Transaksi Penarikan Nasabah(Individu/Kelompok)
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
		if($tarik == null) {
	?>		
		<tr> 
			<td colspan="14" style="text-align: center"><strong> - Data Kosong - </strong></td>
		</tr> 
	<?php
	} else {
		
		for($a=0; $a<=11; $a++) {
			$bulan2[$a] = 0;
		}
		$totaltarik = 0;
		foreach($tarik as $row): 
		$total = 0;
	?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->jenis=='i'?'Individu':'Kelompok'; ?></td>
			<?php for($x=0; $x<=11; $x++) { ?>
				<td style="background-color: #57bef9; text-align: right"><?php echo number_format($row->$bulan[$x], 0, '',','); ?></td>
			<?php  $total = $total + $row->$bulan[$x]; $bulan2[$x] = $bulan2[$x] + $row->$bulan[$x]; } ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($total, 0, '',','); $totaltarik = $totaltarik + $total; ?></strong></td>
		</tr>
	<?php endforeach; } 
		if($tarik) {
	?>
		<tr>
			<td style="background-color: #57bef9"><strong>Total</strong></td>
			<?php for($a=0; $a<=11; $a++) { ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($bulan2[$a], 0, '',','); ?></strong></td>
			<?php } ?>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($totaltarik, 0, '',','); ?></strong></td>
		</tr>
	<?php }?> 
	</tbody>
</table>
<?php
	if($tarik) {	
	$jml = 0;
	$jml = $totalsetoran - $totaltarik;
?>
<table class="table" style="font-weight: bold; background-color: #57bef9">
	<tr>
		<td>Jumlah Total Sisa Saldo Nasabah</td><td>=</td><td>Jumlah Transaksi Setoran Nasabah</td><td>-</td><td>Jumlah Transaksi Penarikan Nasabah</td>
	</tr>
	<tr>
		<td></td><td>=</td><td><?php echo number_format($totalsetoran, 0, '',','); ?></td><td>-</td><td><?php echo number_format($totaltarik, 0, '',','); ?></td>
	</tr>
	<tr>
		<td></td><td>=</td><td><?php echo number_format($jml, 0, '',','); ?></td><td></td><td></td>
	</tr>
</table>
<?php }?> 
