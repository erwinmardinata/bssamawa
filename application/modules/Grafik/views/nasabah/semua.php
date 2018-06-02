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
            text: '<?php echo $title; ?>',
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
                text: '<?php echo $title; ?>'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
			<?php foreach($data as $row): ?>
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
<br>
<br>
<script>
$(function () {
		
    $('#view2').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: '<?php echo $title; ?>',
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
                text: 'Berdasarkan Kelompok'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
			<?php foreach($kelompok as $row): ?>
			{
            name: '<?php echo $row->nama; ?>',
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
<div id="view2"></div>
<br>
<br>
<script>
$(function () {
		
    $('#view3').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: '<?php echo $title; ?>',
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
                text: 'Berdasarkan Individu'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
			<?php foreach($individu as $row): ?>
			{
            name: '<?php echo $row->nama; ?>',
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
<div id="view3"></div>
<br>
<br>
<script>
$(function () {
		
    $('#view4').highcharts({
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
            valueSuffix: ' Orang'
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
<div id="view4"></div>
<br>
<br>
<script>
$(function () {
		
    $('#view5').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: 'Nilai Penyetoran Tabungan Nasabah - Berdasarkan Kelompok',
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
                text: 'Transaksi Penyetoran'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' (Rupiah)'
         },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
			<?php foreach($saldo as $row): ?>
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
<div id="view5"></div>
<br>
<br>
<script>
$(function () {
		
    $('#view6').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: 'Nilai Penarikan Saldo Nasabah - Berdasarkan Individu',
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
                text: 'Transaksi Penarikan'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' (Rupiah)'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
			<?php foreach($tarik as $row): ?>
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
<div id="view6"></div>