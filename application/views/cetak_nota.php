<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
<h2 align="center">Nota Pembelian</h2>
No Nota : <?=$transaksi->kode_transaksi?><br>
Tanggal Pembelian : <?=$transaksi->tanggal_beli?><br>
Nama Kasir : <?=$this->session->userdata('username')?><br>
Nama Pembeli : <?=$transaksi->nama_pembeli?><br>
<table class="table table-striped table-bordered" style="border-collapse:collapse;">
	<tr>
		<th>No</th>
		<th>Nama Buku</th>
		<th>Harga</th>
		<th>Diskon</th>		
		<th>Harga Setelah Diskon</th>
		<th>QTY</th>
		<th>Subtotal</th>
	</tr>
	<?php $no=0;foreach ($this->trans->detail_transaksi($transaksi->kode_transaksi)as $buku):$no++;?>
	<tr>
		<th><?=$no?></th>
		<th><?=$buku->judul_buku?></th>
		<th><?=number_format($buku->harga)?></th>
		<th><?=number_format($buku->diskon)?></th>
		<th><?=number_format($buku->harga-$buku->harga*$buku->diskon/100)?></th>
		<th><?=$buku->jumlah?></th>
		<th><?=number_format(($buku->harga-$buku->harga*$buku->diskon/100)*$buku->jumlah)?></th>
	</tr>
	<?php endforeach ?>
	<tr>
		<th colspan="6">Grand Total</th>
		<th><?=number_format($transaksi->total)?></th>
	</tr>
	<tr>
		<th colspan="6">Uang Pembayaran</th>
		<th><?=number_format(($transaksi->bayar))?></th>
	</tr>
	<tr>
		<th colspan="6">Kembalian</th>
		<th><?=number_format(($transaksi->bayar-$transaksi->total))?></th>
	</tr>
</table>

<script type="text/javascript">
	window.print();
	location.href="<?=base_url('index.php/transaksi')?>";
</script>