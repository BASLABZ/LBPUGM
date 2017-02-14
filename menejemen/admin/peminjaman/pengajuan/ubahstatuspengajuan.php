<?php 
		include '../../../inc/inc-db.php';
		$invoice = $_POST['id'];
		$query = mysql_query("SELECT loan_amount,instrument_id_fk,loan_status_detail,loan_app_detail_id,loan_app_id_fk,loan_invoice FROM trx_loan_application_detail  JOIN trx_loan_application  on
			trx_loan_application_detail.loan_app_fk_id = trx_loan_application.loan_app_id
		  WHERE trx_loan_application_detail.loan_app_detail_id = '".$invoice."' ");
		$rowsatus = mysql_fetch_array($query);
		$jumlahInstrument = $rowsatus['loan_amount'];
		$QueryInstrument  = mysql_query("SELECT instrument_quantity FROM ref_instrument where instrument_id = '".$rowsatus['instrument_id_fk']."' ");
		$runQueryInstrument = mysql_fetch_array($QueryInstrument);
		$kolomInstrument = $runQueryInstrument['instrument_quantity'];  
		// $selisiPengurangan_instrumentv = $kolomInstrument - $jumlahInstrument;
		
 ?>
 <div class="row">
 	<form class="role" method="POST" action="index.php?hal=peminjaman/pengajuan/proses_ubah_status">
 	<!-- hidden id detail loan -->
 	<input type="hidden" value="<?php echo $rowsatus['loan_app_detail_id']; ?>" name='loan_app_detail_id'>
 	<input type="hidden" value="<?php echo $rowsatus['loan_app_id_fk']; ?>" name='loan_app_id_fk'>
 	<input type="hidden" value="<?php echo $rowsatus['loan_invoice']; ?>" name='loan_invoice'>
 	
 		<div class="row well">
 			<label class="col-md-4">UBAH STATUS </label>
 			<div class="col-md-6">
 				<!-- seleisi jumlah yang akan dikurangi dengan nilai yang ada di instrument -->
 				<input type="hidden" value="<?php echo $jumlahInstrument; ?>" name='selisih'>
 				<input type="hidden" value="<?php echo $rowsatus['instrument_id_fk']; ?>"
 				 name='instrument_id_fk'>
 				<input type="hidden" value="<?php echo $rowsatus['loan_app_detail_id']; ?>" 
 					name='loan_app_detail_id'>
 				<select class="form-control" id="status"  onchange="StatusPenawaran()" name="status_loan">
 					<option value="MENUNGGU"
							<?php if($rowsatus['loan_status_detail']=='MENUNGGU'){echo "selected=selected";}?>>
								MENUNGGU
						</option>
						<option value="ACC"
							<?php if($rowsatus['loan_status_detail']=='ACC'){echo "selected=selected";}?>>
								ACC
						</option>
						<option value="DITOLAK"
							<?php if($rowsatus['loan_status_detail']=='DITOLAK'){echo "selected=selected";}?>>
								DITOLAK
						</option> 
 				</select> 
 			</div>
 		</div>
 		<div class="row">
 			<div class="col-md-12">
 				<br>
 				<div id="hiddenStatusTolak" hidden>
 					<table class="table table-bordered table-hover table-striped" id="tablePenawaran">
 					<thead>
 						<th>Pilih</th>
 						<th>No</th>
 						<th>Nama Instrument</th>
 						<th>Jumlah Stok</th>
 						<th>Gambar</th>
 						<th>Keterangan</th>
 					</thead>
 					<tbody>
 					<?php 
 						$no = 0;
 						$queryAlat = mysql_query("SELECT * FROM ref_instrument order by instrument_id ASC");
 						while ($rowAlat = mysql_fetch_array($queryAlat)) {
 					 ?>
 						<tr>
 							<?php echo "<td><input type='checkbox' value='".$rowAlat['instrument_id']."' name='cek[]'></td>"; ?>
 							<!-- hidden id loan_app -->

 							<td><?php echo ++$no; ?></td>
 							<td><?php echo $rowAlat['instrument_name']; ?></td>
 							<td><?php echo $rowAlat['instrument_quantity']; ?></td>
 							<td><img src="../image/<?php echo $rowAlat['instrument_picture']; ?>" class='img-responsive' width='100px'></td>
 							<td>
 								<?php echo "<textarea class='form-control' name='keterangan' id='keterangan_penawaran".$no."' ></textarea>"; ?>
 							</td>
 						</tr>
 						<?php } ?>
 					</tbody>
 				</table>
 				
 				</div>
 			</div>
 		</div>
 		<button class="btn btn-sm btn-primary dim_about pull-right" name="ubahstatus"><span class="fa fa-check"></span> SIMPAN</button>
 	</form>
 </div>
 <script type="text/javascript">
 	function StatusPenawaran() {
 		   var selectStatus = document.getElementById('status').value;
 		   if (selectStatus == 'DITOLAK') {
 		   		$('#hiddenStatusTolak').show();
 		   }else{
				$('#hiddenStatusTolak').hide();
 		   }
 	}
 	function cek(no) {
 			var cekEd = document.getElementById('cekEd'+no);
 		   	var keterangan_penawaran = document.getElementById('keterangan_penawaran'+no);
 		   	if (cekEd.checked) {
 		   		// keterangan_penawaran.focus();
 		   		alert(keterangan_penawaran);
 		   	}
 	}
 	
 </script>