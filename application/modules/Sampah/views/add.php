<section class="content-header">
  <h1>
	General Form Elements
	<small>Preview</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Sampah'); ?>">Sampah</a></li>
	<li class="active">Tambah Sampah</li>
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
		<form role="form" method="post" action="<?php echo site_url('Sampah/insert'); ?>">
		  <div class="box-body">
			<?php echo $this->session->flashdata('message'); ?>
			<div class="form-group">
			  <label for="exampleInputEmail1">Nama</label>
			  <input type="text" name="nama" class="form-control" placeholder="Nama Sampah">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Harga Jual per kilogram</label>
			  <input type="number" name="harga_jual" class="form-control" placeholder="Harga">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Harga Beli per kilogram</label>
			  <input type="number" name="harga_beli" class="form-control" placeholder="Harga">
			</div>
		  </div>
		  <!-- /.box-body -->
		  <div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		  </div>

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
