<section class="content-header">
  <h1>
	General Form Elements
	<small>Preview</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Tabungan'); ?>">Tabungan</a></li>
	<li class="active">Transaksi Nasabah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<!-- left column -->
	<form role="form" method="post" action="<?php echo site_url('Transaksi/insert'); ?>">
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title"></h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		  <div class="box-body">
			<?php echo $this->session->flashdata('message'); ?>
			<div class="form-group">
			  <label for="exampleInputEmail1">Tanggal Transaksi</label>
			  <input type="text" name="tanggal" readonly class="form-control" value="<?php echo date("Y-m-d"); ?>">
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword1">No. Rekening</label>
			  <input type="text" name="no_rekening" readonly class="form-control" value="<?php echo $norek; ?>">
			</div>
			<div class="form-group">
			  <label>Jenis</label>
				<select name="id_sampah" id="id_sampah" class="form-control" required>
					<option value="">- Jenis Sampah -</option>
					<?php foreach($sampah as $row): ?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
			  <label>Jumlah (Kilogram)</label>
			  <input type="text" name="jumlah" id="jumlah" value="0" class="form-control" placeholder="Jumlah (kilogram)" required>
			</div>
			<div class="form-group">
			  <label>Harga (Rp.)</label>
			  <div id="value">
				<input type="text" name="harga" readonly value="" class="form-control" placeholder="Harga" required>
				</div>
			</div>
			<div class="form-group">
			  <label>Keterangan</label>
			  <textarea name="ket" class="form-control"></textarea>
			</div>
			  <div class="box-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<button type="reset" class="btn btn-warning">Batal</button>
			  </div>
		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>
	<!--/.col (left) -->
  </div>
  </form>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function () {
    $("#jumlah").change(function() {
		var sampah = $("#id_sampah").val();
				
		var jumlah = $("#jumlah").val();
		
		$.ajax({
			
			url : '<?php echo site_url("Transaksi/get_harga"); ?>',
            data : 'jumlah=' + jumlah + '&sampah=' + sampah,
            type : 'get', 
            success : function(result) {
				// return alert(result);
                $("#value").html(result);
				
            }
			
		});
		
	});
  });
</script>
