
<table class="table table-responsive table-hover table-bordered">
		<thead>
			<th>NO</th>
			<th>NAMA INSTRUMENT</th>
			<th>STATUS PEMINJAMAN</th>
			<th>JUMLAH</th>
			<th>SUBTOTAL</th>
			<th>AKSI</th>
		</thead>
		<tbody>

	
<?php 
		include '../../menejemen/inc/inc-db.php';
		$invoice = $_POST['id'];
		
		$sqldetail = mysql_query("SELECT * FROM trx_loan_application_detail d join ref_instrument i on d.instrument_id_fk = i.instrument_id join trx_loan_application a on d.loan_app_id_fk = a.loan_app_id where a.loan_invoice = '".$invoice."'");
		$no =1;
		while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
			$status = $rowDetailPeminjaman['loan_status_detail'];
 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
				<td>
					<button class="btn btn-warning dim_about"><span class="fa fa-exclamation-triangle"></span> <?php echo $rowDetailPeminjaman['loan_status_detail']; ?></button>
				</td>
				<td class="text-right"><?php echo $rowDetailPeminjaman['loan_amount']; ?></td>
				<td class="text-right">Rp.<?php echo $rowDetailPeminjaman['loan_subtotal']; ?></td>
				<td>
					<?php if ($status == 'DITOLAK' ) {
						echo "<a href='index.php?hal=members/list&hapus=".$rowDetailPeminjaman['loan_app_detail_id']."&jumlah=".$rowDetailPeminjaman['loan_amount']."&subtotal=".$rowDetailPeminjaman['loan_subtotal']."&invoice=".$rowDetailPeminjaman['loan_invoice']."' class='btn btn-danger dim_about'><span class='fa fa-trash'></span></a>";
					}else if ($status == 'PENAWARAN') {
						echo "<a href='index.php?hal=members/list&hapus=".$rowDetailPeminjaman['loan_app_detail_id']."&jumlah=".$rowDetailPeminjaman['loan_amount']."&subtotal=".$rowDetailPeminjaman['loan_subtotal']."&invoice=".$rowDetailPeminjaman['loan_invoice']."' class='btn btn-danger dim_about'><span class='fa fa-trash'></span></a>";
					}
					else{
						echo "<button class='btn btn-success dim_about btn-xs'><span class='fa fa-check'></span></button>";
						} ?>
				</td>
			</tr>
<?php } ?>
		</tbody>
		<?php 
				$rowjumlahsubtotal = mysql_query("SELECT sum(loan_subtotal) as sub FROM trx_loan_application_detail d join trx_loan_application x 
					  on d.loan_app_id_fk = x.loan_app_id  where x.loan_invoice ='".$invoice."' ");
				$xs = mysql_fetch_array($rowjumlahsubtotal);
				$sub = $xs['sub'];
				$queryTotal = mysql_query("SELECT loan_total_item,loan_total_fee, long_loan FROM trx_loan_application where loan_invoice ='".$invoice."'");
				while ($roTotal = mysql_fetch_array($queryTotal)){	
		 ?>
		<tfoot>
			<tr>
				<td colspan="3">Jumlah Item</td>
				<td><?php echo $roTotal['loan_total_item']; ?> /Buah</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3"> Lama Pinjam</td>
				<td><?php echo $roTotal['long_loan']; ?>/Minggu  </td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3"> Jumlah Subtotal : </td>
				<td></td>
				<td>Rp.<?php echo $sub; ?></td>
			</tr>
			<tr>
				<td colspan="3">Total = Lama Pinjam x Jumlah Subtotal</td>
				<td>Rp.<?php echo $roTotal['loan_total_fee']; ?></td>
			</tr>
		</tfoot>
		<?php } ?>
	</table>
	<div class="row">
		<div class="col-md-12">
			<p align="right">
				<?php  
				$queryUbahstatus = "SELECT loan_invoice,loan_status FROM trx_loan_application where loan_invoice  = '".$invoice."' ";
				$ubahstatus = mysql_fetch_array(mysql_query($queryUbahstatus));
					$statusKonfirmasi = $ubahstatus['loan_status'];
                                   if ($statusKonfirmasi == 'MEMBAYAR TAGIHAN') {
                                     echo "<a class='CETAK'><a>";
                                  
                                   }else if ($statusKonfirmasi == 'ACC') {
                                   	echo "<div class='well'><i>Silahkan Melakukan Pembayaran Waktu Tempo Pembayaran : 3 JAM 60 MENIT, Jika Anda Tidak Melakukan Pembayaran Maka Pengajuan Anda Akan otomatis Dibatalkan</i></div>";
                                     echo " <a href='index.php?hal=pembayaran/konfirmasi_pembayaran&id=".$ubahstatus['loan_invoice']."' class='btn btn-info btn-xs pull-right dim_about'
                                    ><span class='fa fa-check'></span> KONFIRMASI <br>PEMBAYARAN</a>";
                                   }else if ($statusKonfirmasi == 'DIBATALKAN') {
                                        echo "<a href='index.php?hal=pengajuan-member/pengajuan-alat&batalkan=".$ubahstatus['loan_invoice']."' class='btn btn-success dim_about'> <span class='fa fa-share'> </span>
                                         KIRIM PENGAJUAN</a>";                            
                                   }else if ($statusKonfirmasi == 'DITOLAK'){
                                      echo " <a href='index.php?hal=members/peminjaman/pembayaran&id=".$ubahstatus['loan_invoice']."' class='btn btn-info btn-xs dim_about'
                                    ><span class='fa fa-check'></span> KONFIRMASI <br>PEMBAYARAN</a>";
                                   }else if($statusKonfirmasi == 'MENUNGGU'){
                                   		echo "<a href='index.php?hal=pengajuan-member/pengajuan-alat&konfirmasi=".$ubahstatus['loan_invoice']."' class='btn btn-danger dim_about'> <span class='fa fa-share'> </span>
                                         BATALKAN PENGAJUAN</a>";   
                                   }else if($statusKonfirmasi == 'DIPINJAM'){
                                   		 echo "<a href='index.php?hal=pembayaran/preview_rekappembayaran_perinvoice&id=".$invoice."' class='btn btn-info dim_about'><span class='fa fa-print'></span> Cetak<a>";
                                   		echo "<a href='index.php?hal=members/pengembalian/lists&id=".$ubahstatus['loan_invoice']."'>INGIN PERPANJANG ALAT ? </a>";  
                                   }
                                     ?>
                                   
			</p>
		</div>
	</div>

