<?php

	$bulan = array(
		'01' => 'Januari', 
		'02' => 'Februari', 
		'03' => 'Maret', 
		'04' => 'April', 
		'05' => 'Mei', 
		'06' => 'Juni', 
		'07' => 'Juli', 
		'08' => 'Agustus', 
		'09' => 'September', 
		'10' => 'Oktober', 
		'11' => 'November',
		'12' => 'Desember'
	);

	$a = date("m");

?>
<section class="content-header">
  <h1>
	General Form Elements
	<small>Preview</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Nasabah'); ?>">Nasabah</a></li>
	<li class="active">Tambah Nasabah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<!-- left column -->
	<form role="form" method="post" action="<?php echo site_url('Nasabah/insert'); ?>">
	<div class="col-md-8">
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
			  <label for="exampleInputEmail1">Tanggal Daftar</label>
			  <input type="text" name="tanggal_daftar" readonly class="form-control" value="<?php echo date("d").' '.$bulan[$a].' '.date("Y"); ?>">
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword1">No. Rekening</label>
			  <input type="text" name="no_rekening" readonly class="form-control" value="<?php echo $norek; ?>">
			</div>
			<div class="form-group">
			  <label>Nama Nasabah</label>
			  <input type="text" name="nama" value="<?php echo $this->session->flashdata('nama'); ?>" class="form-control" placeholder="Nama Nasabah" required>
			</div>
			<div class="form-group">
			  <label>Jenis Tabungan</label>
				<select name="jenis" class="form-control" required>
					<option value="">- Jenis Tabungan -</option>
					<option value="i">Individu</option>
					<option value="k">Kelompok</option>
				</select>
			</div>
		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>
	<!--/.col (left) -->
	<!-- right column -->
	<div class="col-md-4">
	  <!-- general form elements disabled -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title"></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<!-- text input -->
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
	<!--/.col (right) -->
  </div>
  </form>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function () {
    $("#kec").change(function() {
		var id = $("#kec").val();
		
		$.ajax({
			
			url : '<?php echo site_url("Nasabah/get_desa"); ?>',
            data : 'id_kec=' + id,
            type : 'get', 
            success : function(result) {
                $("#value").html(result);
				
            }
			
		});
		
	});
  });
</script>
