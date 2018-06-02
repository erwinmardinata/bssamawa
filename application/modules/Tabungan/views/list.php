<section class="content-header">
  <h1>
	Data Tables
	<small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Nasabah</li>
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
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>No</th>
			  <th>No. Rekening</th>
			  <th>Nama</th>
			  <th>Jenis Tabungan</th>
			  <th>#</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($data as $no => $row): ?>
				<tr>
				  <td width="5%"><?php echo $no+1; ?></td>
				  <td><?php echo $row->no_rekening; ?></td>
				  <td><?php echo $row->nama; ?> </td>
				  <td><?php echo $row->jenis=='i'?'Individu':'Kelompok'; ?></td>
				  <td width="5%">
					  <a href="<?php echo site_url('Tabungan/lihat/'.$row->no_rekening); ?>" class="btn btn-default btn-sm">
						<i class="fa fa-eye" aria-hidden="true"></i></i> Lihat
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

