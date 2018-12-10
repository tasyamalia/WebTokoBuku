<div class="panel panel-headline">
						<div class="panel-heading">
							<center><h1>Data Buku</h1></center>
						</div>
					</div>
<?=$this->session->flashdata('pesan');?>
<center><a href="#tambah" data-toggle="modal" class="btn btn-primary">Tambah</a></center>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>Kode Buku</td>
			<td>Judul Buku</td>
			<td>Tahun</td>
			<td>Kategori</td>
			<td>Harga</td>
			<td>Foto Cover</td>
			<td>Penerbit</td>
			<td>Penulis</td>
			<td>Diskon</td>
			<td>Stok</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;foreach ($tampil_buku as $buku):$no++;
			?>
		<tr>
			<td><?=$no?></td>
			<td><?=$buku->kode_buku?></td>
			<td><?=$buku->judul_buku?></td>
			<td><?=$buku->tahun?></td>
			<td><?=$buku->nama_kategori?></td>
			<td><?=$buku->harga?></td>
			<td><img src="<?=base_url('assets/img/'.$buku->foto_cover)?>" style="width:60px"></td>
			<td><?=$buku->penerbit?></td>
			<td><?=$buku->penulis?></td>
			<td><?=$buku->diskon?></td>
			<td><?=$buku->stok?></td>
			<td><a href="#edit" onclick="edit(<?=$buku->kode_buku?>)" data-toggle="modal" class="btn btn-success">Ubah</a>
				<a href="<?=base_url('index.php/buku/hapus/'.$buku->kode_buku)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span></button>
			<h4 class="modal-title">Tambah Buku</h4>			
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/buku/tambah')?>" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Kode Buku</td> <td><input type="text" disabled name="kode_buku" required class="form-control"></td></tr>
					<tr><td>Judul Buku</td> <td><input type="text" name="judul_buku" required class="form-control"></td></tr>
					<tr><td>Tahun</td> <td><input type="text" name="tahun" required class="form-control"></td><br></tr>
						<tr><td>Nama Kategori</td><td><select name="kategori" class="form-control">\
							<option></option>
							<?php foreach ($kategori as $kat):?>
								<option value="<?=$kat->kode_kategori?>"><?=$kat->nama_kategori?>
								<?php endforeach ?>
								</option>	
						</select></td></tr>
						<tr><td>Harga</td> <td><input type="text" name="harga" required class="form-control"></td></tr>
						<tr>
							<td>Foto Cover</td>
							<td><input type="file" name="foto_cover" class="form-control"></td>
						</tr>
						<tr><td>Penerbit</td> <td><input type="text" name="penerbit" required class="form-control"></td></tr>
						<tr><td>Penulis</td> <td><input type="text" name="penulis" required class="form-control"></td></tr>
						<tr><td>Stok</td> <td><input type="text" name="stok" required class="form-control"></td></tr>
						<tr><td>Diskon</td> <td><input type="text" name="diskon" required class="form-control"></td></tr>
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
			<h4 class="modal-title">Edit Buku</h4>			
		</div>
		<div class="modal-body">
			<form action="<?=base_url('index.php/buku/buku_update')?>" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Kode Buku</td> <td><input type="text" disabled id="kode_buku" name="kode_buku" required class="form-control"></td></tr>
					<tr>
						<td>Judul Buku</td> <td><input type="text" id="judul_buku" name="judul_buku" required class="form-control"></td>
					</tr>
					<tr>
						<td>Tahun</td> <td><input type="text" id="tahun" name="tahun" required class="form-control"></td><br>
					</tr>
						<tr>
							<td>Nama Kategori</td><td><select id="kategori" name="kategori" class="form-control">\
							<option></option>
							<?php foreach ($kategori as $kat):?>
								<option value="<?=$kat->kode_kategori?>"><?=$kat->nama_kategori?>
								<?php endforeach ?>
								</option>	
						</select></td>
					</tr>
					<tr>
							<td>Harga</td> <td><input type="text" id="harga" name="harga" required class="form-control"></td>
					</tr>
					<tr>
							<td>Foto Cover</td>
							<td><input type="file" name="foto_cover" id="foto_cover" class="form-control"></td>
					</tr>
					<tr>
						<td>Penerbit</td> <td><input type="text" id="penerbit" name="penerbit" required class="form-control"></td>
					</tr>
					<tr>
						<td>Penulis</td> <td><input type="text" id="penulis" name="penulis" required class="form-control"></td>
					</tr>
					<tr>
						<td>Stok</td> <td><input type="text" id="stok" name="stok" required class="form-control"></td>
					</tr>
					<tr>
						<td>Diskon</td> <td><input type="text" id="diskon" name="diskon" required class="form-control"></td>
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
<script>
	function edit(a){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/buku/edit_buku/"+a,
			dataType:"json",
			success:function(data){
				$("#kode_buku").val(data.kode_buku);
				$("#judul_buku").val(data.judul_buku);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				$("#penerbit").val(data.penerbit);
				$("#penulis").val(data.penulis);
				$("#stok").val(data.stok);
				$("#diskon").val(data.diskon);
				$("#tahun").val(data.tahun);
			}
		});
	}
</script>