<?php 
		include '../../menejemen/inc/inc-db.php';
		$invoice = $_POST['id'];
		$rowPenagihan = mysql_fetch_array(mysql_query("SELECT * FROM peminjaman p join tbl_member m on p.member_id = m.member_id where p.invoice= '".$invoice."'"));
 ?>
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>NO INVOICE : <?php echo $invoice; ?></label><br>
		<label>NAMA MEMBER : <?php echo $rowPenagihan['member_name']; ?></label><br>
		<label>TANGGAL PINJAM : <?php echo $rowPenagihan['tgl_input']; ?></label>
	</div> 
</div> 
  </div>
<table class="table table-responsive table-hover table-bordered">
		<thead>
			<th>NO</th>
			<th>NAMA INSTRUMENT</th>
			<th>JUMLAH</th>
			<th>SUBTOTAL</th>
		</thead>
		<tbody>
		<?php 

				$sqldetail = mysql_query("SELECT * FROM peminjaman p  join detail_peminjaman d on p.idpeminjaman = d.idpeminjaman JOIN ref_instrument i on d.instrument_id = i.instrument_id
					where p.invoice = '".$invoice."'");
				$no =1;
				while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
		 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
				<td><?php echo $rowDetailPeminjaman['jumlah']; ?></td>
				<td><?php echo $rowDetailPeminjaman['subtotal']; ?></td>
			</tr>
<?php } ?>
		</tbody>
		<tfoot>
			<?php 
				// total item
				$queryjumlah = mysql_query("SELECT sum(jumlah) as totalItem FROM peminjaman p  join detail_peminjaman d on p.idpeminjaman = d.idpeminjaman where p.invoice='".$invoice."'");
				$jumlah = mysql_fetch_array($queryjumlah);
				$totalItem = $jumlah['totalItem'];
				// total biaya
				$queryTotalBayar = mysql_query("SELECT sum(subtotal) as totalBiaya FROM peminjaman p  join detail_peminjaman d on p.idpeminjaman = d.idpeminjaman where p.invoice='".$invoice."'");
				$biaya = mysql_fetch_array($queryTotalBayar);
				$totalBiaya = $biaya['totalBiaya'];
			 ?>
			<tr>
				<td colspan="3"><label>JUMLAH</label></td>
				<td><label><?php echo $totalItem; ?> / Buah</label></td> 
			</tr>
			<tr>
				<td colspan="3"><label>TOTAL</label></td>
				<td><label>Rp. <?php echo $totalBiaya; ?></label></td>	
			</tr>
			
		</tfoot>
	</table>
	
	<div class="row">
		<div class="col-md-12">
		<div class="panel-group">
		  <div class="panel panel-success">
		    <div class="panel-heading dim_about">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" href="#collapse1"><span class='fa fa-check'></span> KONFIRMASI PEMBAYARAN</a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse">
		      <div class="panel-body">
		      	<form class="role" method="POST" enctype="multipart/form-data" action="index.php?hal=anggota/aksiKonfirmasiPembayaran">
						<div class="form-group row">
							<label class="col-md-4">INVOICE</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="invoice" value="<?php echo $invoice; ?>" readonly />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">TANGGAL PEMBAYARAN</label>
							<div class="col-md-6">
								<input type="text" class="form-control datepicker" name="tgl_pembayaran" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">TOTAL TAGIHAN</label>
							<div class="col-md-6">
								<input type="text" name="totalTagihan" class="form-control" value="<?php echo $totalBiaya; ?>" readonly />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">BANK</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="namaBank" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">MENGGUNAKAN SALDO</label>
							<div class="col-md-6">
								<input type="text" class="form-control"/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">TRANSFER</label>
							<div class="col-md-6">
								<input type="text" class="form-control"/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">BUKTI PEMBAYARAN</label>
							<div class="col-md-6">
								<input type="file" class="form-control"/>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4">KETERANGAN</label>
							<div class="col-md-6">
								<textarea class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary dim_about pull-right" name="simpanKonfirmasi">
								<span class="fa fa-save"> SIMPAN</span>
							</button>
							</div>
						</div>
					</form>	
		      </div>
		      <div class="panel-footer">Panel Footer</div>
		    </div>
		  </div>
		</div>
		</div>
	</div>