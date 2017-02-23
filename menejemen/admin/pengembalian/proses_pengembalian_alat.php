<?php 
		$id = $_POST['invoice'];
		$querypinjam = "SELECT * from trx_loan_application  where loan_invoice='".$id."' ";
		$runQueryPinjam = mysql_fetch_array(mysql_query($querypinjam));
		$idp = $runQueryPinjam['loan_app_id'];

		// // update pinjaman kembali ke quantity
		// $kembalikan_nilai_detail_alat = "SELECT count(loan_app_detail_id) as jumlah FROM trx_loan_application_detail  WHERE loan_app_id_fk='".$idp."'";
		// $runQuery = mysql_fetch_array(mysql_query($kembalikan_nilai_detail_alat));
		// $banyak = $runQuery['jumlah'];
		// $kodeAlats =1;
		// for ($i=0; $i < $banyak ; $i++) { 
		// 	echo $where = "instrument_id = '".$kodeAlats[$i]."'";

		// }
		// $query_int = "SELECT * FROM ref_instrument where $where ";
		
						
		// $qu = mysql_query("SELECT * FROM trx_loan_application_detail where loan_app_id_fk='".$idp."'");
		// while ($rowAlat  = mysql_fetch_array($qu)) 	{
		// 				$jumlah_alat = $rowAlat['loan_amount'];
		// 				$kodeAlat 	 = $rowAlat['instrument_id_fk'];

		// 				// echo "UPDATE ref_instrument set intrument_quantity_temp = ";
		// 		}
		// // for ($ulang=0; $ulang < $banyak ; $ulang++) { 
		// // 		var_dump($ulang);
					

                                             
		// // }
		$querypengembalian = "UPDATE trx_loan_application_detail SET loan_status_detail = 'DIKEMBALIKAN' WHERE loan_app_id_fk='".$idp."' ";
		$runQueryPengembalian = mysql_query($querypengembalian);
		// update status peminjaman menjadi dikembalikan
		$query  = mysql_query("UPDATE trx_loan_application set loan_status = 'DIKEMBALIKAN' where loan_invoice='".$id."' ");
		echo "<script>location.href='index.php?hal=pengambilan/list';</script>  ";exit; 

 ?>