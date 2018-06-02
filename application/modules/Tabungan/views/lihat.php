<section class="content-header">
  <h1>
	General Form Elements
	<small>Preview</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Tabungan'); ?>">Tabungan</a></li>
	<li class="active">Detail Nasabah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<!-- left column -->
	<div class="col-md-4">
	  <!-- general form elements -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Nasabah</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		  <div class="box-body"> 
				
				<table class="table">
					<tr>
						<td>Nama</td><td>:</td><td><?php echo $data->nama; ?></td>
					</tr>
					<tr>
						<td>No. Rekening</td><td>:</td><td><?php echo $data->no_rekening; ?></td>
					</tr>
					<tr>
						<td>Jenis Tabungan</td><td>:</td><td><?php echo $data->jenis=='i'?'Individu':'Kelompok'; ?></td>
					</tr>
					<tr>
						<td>Alamat</td><td>:</td><td><?php echo $data->desa.' Kec. '.$data->kecamatan; ?></td>
					</tr>
					<tr>
						<td>Saldo</td><td>:</td><td><?php echo $saldo->saldo==""?"Rp. 0":"Rp. ".$saldo->saldo; ?></td>
					</tr>
				</table>
				
				<div class="box-footer">
				  <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Setor</button>
				  <button data-toggle="modal" <?php echo $saldo->saldo==""?"disabled":""; ?> data-target=".ambil" class="btn btn-warning">Ambil</button>
				</div>
		  
		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>
	<!--/.col (left) -->
	<!-- right column -->
	<div class="col-md-8">
	  <!-- general form elements disabled -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Riwayat Transaksi</h3>
		</div>
		<!-- /.box-header -->
		<br>
		<a target="_blank" href="<?php echo site_url('Export/print_data/'.$data->no_rekening); ?>" class="btn btn-warning" style="float: right;margin-right: 12px;"><i class="fa fa-print" aria-hidden="true"></i> Export PDF</a>
		<a target="_blank" href="<?php echo site_url('Export/pdf/'.$data->no_rekening); ?>" class="btn btn-danger" style="float: right;margin-right: 12px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF</a>
		<a target="_blank" href="<?php echo site_url('Export/excel/'.$data->no_rekening); ?>" class="btn btn-success" style="float: right;margin-right: 12px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Excel</a><br><br>
		<?php echo $this->session->flashdata('message'); ?>
		<div class="box-body">
			<table id="exampled1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Tanggal</th>
						<th>Setor</th>
						<th>Ambil</th>
						<th>Saldo</th>
						<th>Ket</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$saldo = 0;
					foreach($transaksi as $no => $row): 
					$saldo = $row->harga + $saldo - $row->ambil;
				?>
					<tr>
						<td width="5%"><?php echo $no+1; ?></td>
						<td><?php echo $row->tanggal; ?></td>
						<td><?php echo $row->harga==0?"-":'Rp. '.$row->harga; ?></td>
						<td><?php echo $row->ambil==0?"-":"Rp. ".$row->ambil; ?></td>
						<td><?php echo 'Rp. '.$saldo; ?></td>
						<td><?php echo $row->ket==""?"-":$row->ket; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<div class="modal fade ambil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<form role="form" method="post" action="<?php echo site_url('Transaksi/ambil'); ?>">
  <div class="modal-dialog">
    <div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Transaksi Pengambilan Tabungan Nasabah</h4>
	  </div>
	  <div class="modal-body">
		<div class="form-group">
		  <label for="exampleInputEmail1">Tanggal Transaksi</label>
		  <input type="date" name="tanggal" class="form-control" value="<?php echo date("Y-m-d"); ?>">
		</div>
		<div class="form-group">
		  <label for="exampleInputPassword1">No. Rekening</label>
		  <input type="text" name="no_rekening" readonly class="form-control" value="<?php echo $data->no_rekening; ?>">
		</div>
		<div class="form-group">
		  <label>Jumlah Pengambilan (Rp.)</label>
		  <input type="number" name="ambil" class="form-control" required>
		</div>
		<div class="form-group">
		  <label>Keterangan</label>
		  <textarea name="ket" class="form-control"></textarea>
		</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
		<button type="submit" class="btn btn-primary">Simpan</button>
	  </div>
    </div>
  </div>
</form>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form role="form" method="post" action="<?php echo site_url('Transaksi/setor'); ?>">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">Transaksi Setorang Nasabah</h4>
	  </div>
	  <div class="modal-body">
		<div class="form-group">
		  <label for="exampleInputEmail1">Tanggal Transaksi</label>
		  <input type="date" name="tanggal" class="form-control" value="<?php echo date("Y-m-d"); ?>">
		</div>
		<div class="form-group">
		  <label for="exampleInputPassword1">No. Rekening</label>
		  <input type="text" name="no_rekening" readonly class="form-control" value="<?php echo $data->no_rekening; ?>">
		</div>
		<div class="form-group">
		  <label>Jenis</label>
			<select name="id_sampah" id="id_sampah" class="form-control" required>
				<option value="">- Jenis Sampah -</option>
				<?php foreach($sampah as $row): ?>
				<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
				<?php endforeach; ?>
		</div>
			</select>
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
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
		<button type="submit" class="btn btn-primary">Simpan</button>
	  </div>
	</div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</form>
</div>
<!-- /.modal -->

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
