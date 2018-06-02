<section class="content-header">
  <h1>
	Data Tables
	<small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Master Desa</li>
  </ol>
</section>
	
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">

	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Table With Full Features</h3>
		</div>
		<a href="<?php echo site_url('Desa/add'); ?>" class="btn btn-success" style="float: right;margin-right: 12px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a><br><br>
		<!-- /.box-header -->
		<div class="box-body">
		<?php echo $this->session->flashdata('message'); ?>
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>No.</th>
			  <th>Nama Desa</th>
			  <th>#</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($data as $no => $row): ?>
				<tr>
				  <td width="10%"><?php echo $no+1; ?></td>
				  <td><?php echo $row->nama; ?> </td>
				  <td width="15%">
					  <a href="<?php echo site_url('Desa/edit/'.$row->id); ?>" class="btn btn-default btn-sm">
						<i class="fa fa-edit"></i> Edit
					  </a>
					  <a href="<?php echo site_url('Desa/delete/'.$row->id); ?>" onclick="return confirm('anda yakin ?')" class="btn btn-default btn-sm">
						<i class="fa fa-trash"></i> Hapus
					  </a>
				  </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		  </table>
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
    $("#example1").DataTable();
  });
</script>

