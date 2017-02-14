<?php 
		
		$iddetail_instrumen = $_POST['instrument_id_fk'];
		$status = $_POST['status_loan'];
		$invoice = $_POST['loan_invoice'];

		if ($status == 'ACC') {
			// query update intrument_quantity sebagai penguarang jumlah dan update status pinjam= booked dari proses loan_detail-> query saya jadikan satu
			$query = "UPDATE trx_loan_application_detail INNER JOIN ref_instrument 
							ON trx_loan_application_detail.instrument_id_fk = ref_instrument.instrument_id 
								SET trx_loan_application_detail.loan_status_detail = '".$status."',
									ref_instrument.intrument_quantity_temp = '".$_POST['selisih']."' 
										where trx_loan_application_detail.loan_app_detail_id = '".$_POST['loan_app_detail_id']."' and ref_instrument.instrument_id = '".$_POST['instrument_id_fk']."'";
			
			$queryUpdateStatus = mysql_query($query);	
			echo "<script>  location.href='index.php?hal=peminjaman/pengajuan/pengajuan_detail&invoice=".$invoice."' </script>";exit;
			
		}else if ($status == 'MENUNGGU') {
			echo $iddetail_instrumen;
			echo "MENUGGU";
			echo "<script>  location.href='index.php?hal=peminjaman/pengajuan/pengajuan_detail&invoice=$invoice' </script>";exit;
		}else if ($status == 'DITOLAK') {
			 	 $cek = $_POST['cek'];
			 	 $idDetail_loan = $_POST['loan_app_detail_id'];
			 	 $idPeminjaman = $_POST['loan_app_id_fk'];
           		 foreach ($cek as $key => $value) {
                if (!empty($value)) {
                	$queryPenawaran = "INSERT INTO trx_loan_application_detail
                							 (loan_app_id_fk,instrument_id_fk,
                							  loan_amount,loan_subtotal,loan_status_detail)
                						VALUES ('".$idPeminjaman."','".$value."','1',0,'PENAWARAN')";
                						$runPenawaran  = mysql_query($queryPenawaran);
                }
                print_r($queryPenawaran);
            }
            $updatePeminjaman_statusTolak = "UPDATE trx_loan_application set loan_status='DITOLAK' where loan_app_id = '".$idPeminjaman."' ";
			 	 $RunQuery = mysql_query($updatePeminjaman_statusTolak);
			 	 print_r($updatePeminjaman_statusTolak);
		}
 ?>