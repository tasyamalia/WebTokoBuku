<div class="panel panel-headline">
						<div class="panel-heading">
							<center><h1>Data Pegawai</h1></center>
						</div>
					</div>
<?=$this->session->flashdata('pesan');?>
<center><a href="#tambah" data-toggle="modal" class="btn btn-primary">Tambah</a></center>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>Kode user</td>
			<td>Nama user</td>
			<td>Username</td>
			<td>Level</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;foreach ($tampil_user as $user):
		$no++;?>
		<tr>
			<td><?=$no?></td>
			<td><?=$user->kode_user?></td>
			<td><?=$user->nama_user?></td>
			<td><?=$user->username?></td>
			<td><?=$user->level?></td>
			<td><a href="#edit" onclick="edit('<?=$user->kode_user?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
				<a href="<?=base_url('index.php/user/hapus/'.$user->kode_user)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a></td>
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
			<h4 class="modal-title">Tambah user</h4>			
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/user/tambah')?>" method="post">
				<table>
					<tr>
						<td>Kode user</td> <td><input type="text" name="kode_user" required class="form-control"></td><br></tr>
					<tr>
						<td>Nama user</td> <td><input type="text" name="nama_user" required class="form-control"></td>
					</tr>
					<tr>
						<td>Username</td> <td><input type="text" name="username" required class="form-control"></td>
					</tr>
					<tr>
						<td>Password</td> <td><input type="password" name="password" required class="form-control"></td>
					</tr>
					<tr>
						<td>Level</td> <td><input type="text" name="level" required class="form-control"></td>
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
			<h4 class="modal-title">Edit user</h4>			
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/user/user_update')?>" method="post">
			<input type="hidden" name="kode_user_lama" id="kode_user_lama">
				<table>
					<tr>
						<td>Kode user</td> <td><input type="text" name="kode_user" id="kode_user" required class="form-control"></td><br></tr>
					<tr>
						<td>Nama user</td> <td><input type="text" name="nama_user" id="nama_user" required class="form-control"></td>
					</tr>
					<tr>
						<td>Username</td> <td><input type="text" id="username" name="username" required class="form-control"></td>
					</tr>
					<tr>
						<td>Password</td> <td><input type="password" id="password" name="password" required class="form-control"></td>
					</tr>
					<tr>
						<td>Level</td> <td><input type="text" id="level" name="level" required class="form-control"></td>
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
</div>

<script type="text/javascript">
	function edit(a){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/user/edit_user/"+a,
			dataType:"json",
			success:function(data){
				$("#kode_user").val(data.kode_user);
				$("#nama_user").val(data.nama_user);
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#level").val(data.level);
				$("#kode_user_lama").val(data.kode_user);
			}
		});
	}
</script>