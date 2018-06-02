<section class="content-header">
  <h1>
	Data Tables
	<small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Laporan</li>
  </ol>
</section>
	
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">

	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Grafik Sampah</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">

			<div class="well">
				<div class="row">
				
					<div class="col-md-4">
					</div>
					<div class="col-md-8">
						<div class="form-inline" role="form">
						  <div class="form-group">
							<select class="form-control" id="filter">
								<option value="">-Filter-</option>
								<option value="6">Semua</option>
								<option value="7">Jumlah Volume Pembelian Sampah</option>
								<option value="8">Jumlah Transaksi Nasabah(Berdasarkan Jenis Sampah)</option>
								<option value="9">Penjualan dan Pembelian Sampah</option>
							</select>
						  </div>
						  <div class="form-group">
							<select class="form-control" id="tahun">
								<option value="">-Tahun-</option>
								<?php for($x=date("Y"); $x>=2014; $x--) { ?>
								<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
								<?php } ?>
							</select>
						  </div>
						  <button class="btn btn-primary" id="cari">cari</button>
						  <button class="btn btn-success" id="eexcel">Export Excel</button>
						</div>					
						
					</div>
				
				</div>
			</div>
								
			<div id="value">
			</div>
			<br>
			<br>

		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function () {
	  
	  $("#cari").click(function() {
		  var filter = $("#filter").val();
		  var tahun = $("#tahun").val();
		  
		  if(filter=="" || tahun=="") {
			return alert("Pilih salah satu combobox");  
		  }
		  
			$('#value').html("<p style='text-align:center;padding-top:23px'><img src='<?php echo base_url() ?>assets/img/35.gif'></p>");
			
			$.ajax({
				
				url : '<?php echo site_url("Grafik/get_grafik"); ?>',
				data : 'filter=' + filter + '&tahun=' + tahun,
				type : 'get', 
				success : function(result) {
					
					$("#value").hide().html(result).fadeIn('slow');
					
				}
			});
		  
	  });
	  
	  $("#eexcel").click(function() {
		  var filter = $("#filter").val();
		  var tahun = $("#tahun").val();
		  
		  if(filter=="" || tahun=="") {
			return alert("Pilih salah satu combobox");  
		  }
		  
		  open('<?php echo site_url("Laporan/get_excel?"); ?>'+'filter='+ filter +'&tahun='+tahun);		  
		  
	  });
	  
  });
</script>

