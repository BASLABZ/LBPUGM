<?php 
	$status = $_POST['payment_notif'];
	$id = $_POST['idpayment'];
	$query_update = "UPDATE trx_payment_temp set payment_notif = '".$status."' where payment_temp_id='".$id."'";
	$runQuery = mysql_query($query_update);
	echo "<script> alert('Transaksi Pembayaran Telah Diverifikasi'); location.href='index.php?hal=pembayaran/list' </script>";exit;
 ?>