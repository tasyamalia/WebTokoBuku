<div class="panel panel-headline">
						<div class="panel-heading">
							<center><h1>Halaman Transaksi</h1></center>
						</div>
					</div>
<div class="col-md-7">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Buku</th>
				<th>Harga</th>
				<th>Diskon</th>
				<th>Harga Diskon</th>
				<th>Kategori</th>
				<th>Stok</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach ($tampil_buku as $buku):$no++;?>
			<tr>
				<td><?=$no?></td>
				<td><?=$buku->judul_buku?></td>
				<td><?=$buku->harga?></td>
				<td><?=$buku->diskon?></td>
				<td><?=$buku->harga-$buku->harga*$buku->diskon/100?></td>
				<td><?=$buku->nama_kategori?></td>
				<td><?=$buku->stok?></td>
				<td><a class="btn btn-primary" href="<?=base_url('index.php/transaksi/addcart/'.$buku->kode_buku)?>">Pesan</a></td>
			</tr>
		<?php  endforeach?>
		</tbody>
	</table>
</div>
<div class="col-md-5">
	<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
	<a class="btn btn-danger" href="<?=base_url('index.php/transaksi/clearcart')?>">Clear Cart</a>

	<h5 style="font-weight: bold">Nama Pembeli : </h5><input type="text" name="nama_pembeli" class="form-control">

	<br>
	<table class="table table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>Judul Buku</th>
			<th>QTY</th>
			<th>Harga Setelah Diskon</th>
			<th>Subtotal</th>
			<th>Aksi</th>
		</tr>
		<?php $no=0;foreach ($this->cart->contents() as $items ): $no++;?>
		<input type="hidden" name="kode_buku[]" value="<?=$items['id']?>">
		<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">
		<tr>
			<td><?=$no?></td>
			<td><?=$items['name']?></td>
			<td width="1"><input type="text" name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding:4px;"></td>
			<td><?=number_format($items['price'])?></td>
			<td><?=number_format($items['subtotal'])?></td>
			<td><a href="<?=base_url('index.php/transaksi/hapus_cart/'.$items['rowid'])?>" class="btn btn-danger">&times;</a></td>
		</tr>
	<?php endforeach ?>
		<input type="hidden" name="total" value="<?=$this->cart->total()?>">
		<tr style="border-bottom:5px black solid">
			<th colspan="4">Grand Total</th>
			<th><?=number_format($this->cart->total())?></th><th></th>
		</tr>
	</table>			
	<h5 style="font-weight: bold">Bayar :</h5><pre><input type="number" name="bayari" class="form-control"></pre>
	<input class="btn btn-success" type="submit" name="update" value="Update QTY">
	<input type="submit" name="bayar" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger" value="Bayar">
</form>
<?php if($this->session->flashdata('pesan')):?>
	<div class="alert alert-warning"><?=$this->session->flashdata('pesan');?></div>
<?php endif ?>
</div>