<section class="content-header">
  <h1>
	General Form Elements
	<small>Preview</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Desa'); ?>">Master Desa</a></li>
	<li class="active">Tambah Desa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<!-- left column -->
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title"></h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="post" action="<?php echo site_url('Desa/insert'); ?>">
		  <div class="box-body">
			<?php echo $this->session->flashdata('message'); ?>
			<div class="row col-md-5">
				<div class="form-group">
				  <label>Kecamatan</label>
					<select name="id_kecamatan" id="kec" class="form-control" required>
						<option value="">- Kecamatan -</option>
						<?php foreach($kecamatan as $row): ?>
						<option value="<?php echo $row->id_kec; ?>"><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
				  <label>Desa</label>
					<select name="id_desa" id="value" class="form-control" required>
						<option value="">- Pilih Kecamatan Dulu -</option>
					</select>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		  </div>
		  <!-- /.box-body -->

		</form>
	  </div>
	  <!-- /.box -->

	</div>
	<!--/.col (left) -->
	<!-- right column -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function () {
    $("#kec").change(function() {
		var id = $("#kec").val();
		
		$.ajax({
			
			url : '<?php echo site_url("Desa/get_desa"); ?>',
            data : 'id_kec=' + id,
            type : 'get', 
            success : function(result) {
                $("#value").html(result);
				
            }
			
		});
		
	});
  });
</script>
