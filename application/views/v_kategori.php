<div class="panel panel-headline">
						<div class="panel-heading">
							<center><h1>Data Kategori</h1></center>
						</div>
					</div>
<?=$this->session->flashdata('pesan');?>
<center><a href="#tambah" data-toggle="modal" class="btn btn-primary">Tambah</a></center>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>Kode Kategori</td>
			<td>Nama Kategori</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;foreach ($tampil_kategori as $kat):
		$no++;?>
		<tr>
			<td><?=$no?></td>
			<td><?=$kat->kode_kategori?></td>
			<td><?=$kat->nama_kategori?></td>
			<td><a href="#edit" onclick="edit('<?=$kat->kode_kategori?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
				<a href="<?=base_url('index.php/kategori/hapus/'.$kat->kode_kategori)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span></button>
			<h4 class="modal-title">Tambah Kategori</h4>			
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/kategori/tambah')?>" method="post">
				<table>
					<tr>
						<td>Kode Kategori</td> <td><input type="text" name="kode_kategori" required class="form-control"></td><br></tr>
					<tr>
						<td>Nama Kategori</td> <td><input type="text" name="nama_kategori" required class="form-control"></td>
					</tr>
				</table>
				<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
			</form>			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>		
	</div>
	
</div>
</div>
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span></button>
			<h4 class="modal-title">Edit Kategori</h4>			
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/kategori/kategori_update')?>" method="post">
			<input type="hidden" name="kode_kategori_lama" id="kode_kategori_lama">
				<table>
					<tr>
						<td>Kode Kategori</td> <td><input type="text" name="kode_kategori" id="kode_kategori" required class="form-control"></td><br></tr>
					<tr>
						<td>Nama Kategori</td> <td><input type="text" name="nama_kategori" id="nama_kategori" required class="form-control"></td>
					</tr>
				</table>
				<input type="submit" name="edit" value="Simpan" class="btn btn-success">
			</form>			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>		
	</div>
	
</div>
</div>
<script type="text/javascript">
	function edit(a){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,
			dataType:"json",
			success:function(data){
				$("#kode_kategori").val(data.kode_kategori);
				$("#nama_kategori").val(data.nama_kategori);
				$("#kode_kategori_lama").val(data.kode_kategori);
			}
		});
	}
</script>