<?php

	$bulan = array(
		'jan','feb','mar','apr','mei','jun','jul','agu','sep','okt','nov','des'
	);
	
?>
<script>
$(function () {
		
    $('#view').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: 'Jumlah Transaksi Nasabah (Individu/Kelompok)',
            x: -20
        },
        xAxis: {
            categories: [
				'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
			]
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi Nasabah (Individu/Kelompok)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' kali'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
			<?php foreach($transaksi as $row): ?>
			{
            name: '<?php echo $row->jenis=='i'?'Individu':'Kelompok' ?>',
            data: [
				<?php
					for($x=0; $x<=11; $x++){
						echo $row->$bulan[$x].', ';
					}					
				?>
				]
        },
		<?php endforeach; ?>
		]
    });
		
});
</script>
<div id="view"></div>