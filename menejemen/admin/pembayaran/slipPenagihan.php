<?php 
		include '../../inc/inc-db.php';
		$invoice = $_POST['id'];
		$rowPenagihan = mysql_fetch_array(mysql_query("SELECT * FROM trx_payment_temp a join tbl_member m ON a.member_id_fk = m.member_id join trx_loan_application p ON p.loan_app_id = a.loan_app_id_fk where p.loan_invoice = '".$invoice."' "));
		
		
 ?>
<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<label>NO INVOICE : <?php echo $invoice; ?></label><br>
		<label>NAMA MEMBER : <?php echo $rowPenagihan['member_name']; ?></label><br>
		<label>TANGGAL PINJAM : <?php echo $rowPenagihan['payment_temp_date']; ?></label>
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
					
				$sqldetail = mysql_query("SELECT * FROM trx_loan_application_detail d 
											JOIN trx_loan_application p
											 ON d.loan_app_id_fk = p.loan_app_id
											  JOIN ref_instrument i
											   ON d.instrument_id_fk = i.instrument_id
											   JOIN tbl_member m
											    where p.loan_invoice='".$invoice."' group by instrument_id");
				$no =1;
				while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
		 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
				<td><?php echo $rowDetailPeminjaman['loan_subtotal']; ?></td>
				<td><?php echo $rowDetailPeminjaman['loan_amount']; ?></td>
			</tr>
<?php } ?>
		</tbody>
		<tfoot>
			<?php 
				// total item
				$queryjumlah = mysql_query("SELECT sum(loan_total_item) as jumlahItem FROM trx_loan_application where loan_invoice='".$invoice."'");

				$jumlah = mysql_fetch_array($queryjumlah);
				$totalItem = $jumlah['jumlahItem'];
				// total biaya
				$queryTotalBayar = mysql_query("SELECT sum(loan_total_fee) as totalBiaya FROM trx_loan_application where loan_invoice='".$invoice."'");
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
			<tr>
				<td colspan="3"><label>TAGIHAN : </label></td>
				<td><label>Rp. <?php echo $rowPenagihan['payment_bill']; ?></label></td>
			</tr>
			<tr>
				<td colspan="3"><label>PEMBAYARAN</label></td>
				<td><label>Rp. <?php echo $rowPenagihan['payment_temp_amount_transfer']; ?></label></td>
			</tr>
			<tr>
				<td colspan="3"><label>STATUS</label></td>
				<td>
					<label>
						<?php 
								
								$tagihan  = $rowPenagihan['payment_bill'];
								$bayar  =$rowPenagihan['payment_temp_amount_transfer'];
								$cekPembayaran = $tagihan-$bayar;
								if ($cekPembayaran == 0) {
									echo "VALID";
								}else if ($cekPembayaran > 0 ) {
									echo "VALID DAN SISA PEMBAYARAN DI MASUKKAN KE SALDO";
								}
								else if ($cekPembayaran < 0){
									echo "PEMBAYARAN TIDAK SESUAI : $cekPembayaran ";
								}
						 ?>
					</label>
				</td>
			</tr>
			
		</tfoot>
	</table>
	
	