
<table class="table table-responsive table-hover table-bordered">
		<thead>
			<th>NO</th>
			<th>NAMA INSTRUMENT</th>
			<th>JUMLAH</th>
			<th>AKSI</th>
		</thead>
		<tbody>
<?php 
			include '../../inc/inc-db.php';
		$invoice = $_POST['id'];
		
		$sqldetail = mysql_query("SELECT * FROM trx_loan_application_detail d join ref_instrument i on d.instrument_id_fk = i.instrument_id join trx_loan_application a on d.loan_app_id_fk = a.loan_app_id where  a.loan_invoice = '".$invoice."'");
		$no =1;
		while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
			$status = $rowDetailPeminjaman['loan_status_detail'];
 ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
				<td><?php echo $rowDetailPeminjaman['loan_amount']; ?></td>
				<td>
					<form class="role" method="POST" action="">
						<div class="form-group">
							<input type="hidden" name="instrument_id" value="<?php echo $rowDetailPeminjaman['instrument_id']; ?>">
							<input type="hidden" name="intrument_quantity_temp" value="<?php echo $rowDetailPeminjaman['intrument_quantity_temp']; ?>">
							<input type="hidden" name="instrument_quantity" value="<?php echo $rowDetailPeminjaman['instrument_quantity']; ?>">
							<button type="submit" class="btn btn-info"> <span class="fa fa-check"></span> Kembalikan</button>
						</div>
					</form>
				</td>
			</tr>
<?php } ?>
		</tbody>
	</table>
	