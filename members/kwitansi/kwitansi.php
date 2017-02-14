<?php 
		include '../../menejemen/inc/inc-db.php';
		$id = $_GET['id'];
		$queryPembayaranPerkolom  = mysql_query("SELECT * from trx_payment_temp pay JOIN trx_loan_application p on pay.loan_app_id_fk = p.loan_app_id JOIN tbl_member m on pay.member_id_fk = m.member_id  where  pay.payment_temp_id = '".$id."'");
		$rowKwitansi  = mysql_fetch_array($queryPembayaranPerkolom);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>KWITANSI PEMBELIAN</title>
</head>
<body onload="window.print();">
		<center>
			<table>
				<tr>
					<td>NAMA BANK  </td>
					<td>:</td>
					<td><?php echo $rowKwitansi['bankname']; ?></td>
				</tr>
				<tr>
					<td>INVOICE</td>
					<td>:</td>
					<td><?php echo $rowKwitansi['loan_invoice']; ?></td>
				</tr>
				<tr>
					<td>TANGGAL INPUT</td>
					<td>:</td>
					<td><?php echo $rowKwitansi['payment_temp_date']; ?></td>
				</tr>
				<tr>
					<td>TANGGAL KONFIRMASI</td>
					<td>:</td>
					<td><?php echo $rowKwitansi['payment_temp_confirm_date']; ?></td>
				</tr>
				<tr>
					<td>TAGIHAN</td>
					<td>:</td>
					<td><?php echo $rowKwitansi['payment_bill']; ?></td>
				</tr>
				<tr>
					<td>JUMLAH</td>
					<td>:</td>
					<td><?php echo $rowKwitansi['payment_temp_amount_transfer']; ?></td>
				</tr>
			</table>
		</center>
</body>
</html>