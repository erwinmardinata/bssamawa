<div class="label label-success" 
	 style="margin-bottom: 120px">
	 Nilai Penjualan dan Pembelian Sampah
</div>				
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #2fa4e7">
			<th>Jenis Sampah</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Valume(KG)</th>
			<th>Total Harga Beli</th>
			<th>Total Harga Jual</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if($nilai_sampah == null) {
	?>		
		<tr> 
			<td colspan="6" style="text-align: center"><strong> - Data Kosong - </strong></td>
		</tr> 
	<?php
	} else {
		$tbeli = 0;
		$tjual = 0;
		$tjumlah = 0;
		$ttbeli = 0;
		$ttjual = 0;
		$tjumlah = 0;
		foreach($nilai_sampah as $row):
		$total_beli = $row->harga_beli * $row->jumlah;
		$total_jual = $row->harga_jual * $row->jumlah;
		$tbeli = $tbeli + $row->harga_beli;
		$tjual = $tjual + $row->harga_jual;
		$tjumlah = $tjumlah + $row->jumlah;
		$ttbeli = $ttbeli + $total_beli;
		$ttjual = $ttjual + $total_jual;
	?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->nama; ?></td>
			<td style="background-color: #57bef9; text-align: right"><?php echo number_format($row->harga_beli, 0, '',','); ?></td>
			<td style="background-color: #57bef9; text-align: right"><?php echo number_format($row->harga_jual, 0, '',','); ?></td>
			<td style="background-color: #57bef9; text-align: right"><?php echo $row->jumlah; ?></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($total_beli, 0, '',','); ?></strong></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($total_jual, 0, '',','); ?></strong></td>
		</tr>
	<?php endforeach; } 
		if($nilai_sampah) {
	?>
		<tr>
			<td style="background-color: #57bef9"><strong>Total</strong></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($tbeli, 0, '',','); ?></strong></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($tjual, 0, '',','); ?></strong></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo $tjumlah; ?></strong></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($ttbeli, 0, '',','); ?></strong></td>
			<td style="background-color: #57bef9; text-align: right"><strong><?php echo number_format($ttjual, 0, '',','); ?></strong></td>
		</tr>
	<?php }?> 
	</tbody>
</table>
<?php
	if($nilai_sampah) {
	$jml = 0;
	$jml = $ttjual - $ttbeli;
	
?>
<table class="table" style="font-weight: bold; background-color: #57bef9">
	<tr>
		<td>Keuntungan Penjualan Sampah</td><td>=</td><td>Total Harga Jual</td><td>-</td><td>Total Harga Beli</td>
	</tr>
	<tr>
		<td></td><td>=</td><td><?php echo number_format($ttjual, 0, '',','); ?></td><td>-</td><td><?php echo number_format($ttbeli, 0, '',','); ?></td>
	</tr>
	<tr>
		<td></td><td>=</td><td><?php echo number_format($jml, 0, '',','); ?></td><td></td><td></td>
	</tr>
</table>
<?php }?> 
