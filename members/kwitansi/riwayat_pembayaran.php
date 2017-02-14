<?php 
	include '../../menejemen/inc/inc-db.php';
	session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Pembayaran / Transaksi Peminjaman Alat</title>
</head>
<body onload="window.print();">

	<center>
		<h3>Rekap Riwayat Pembayaran <br>Transaksi Peminjaman Alat LBP- UGM</h3>
		<h4>Nama Member : <?php echo $_SESSION['member_name ']; ?></h4>
		<table border="1">
		  <thead>
		  	  <th>NO</th>
		      <th>INVOIVE</th>
		      <th>BANK</th>
		      <th>TANGGAL INPUT</th>
		      <th>TANGGAL KONFIRMASI</th>
		      <th>JUMLAH</th>
		      <th>KETERANGAN</th>
		  </thead>
		  <tbody>
		  	<?php
		  			$no=1;
	                $queryPembayaran= 
	                  mysql_query("SELECT * from trx_payment_temp pay JOIN trx_loan_application p on pay.loan_app_id_fk = p.loan_app_id JOIN tbl_member m on pay.member_id_fk = m.member_id where pay.member_id_fk  = '".$_SESSION['member_id']."'");
                            while ($rowPembayaran  = mysql_fetch_array($queryPembayaran)) {
                           ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $rowPembayaran['loan_invoice']; ?></td>
                                <td><?php echo $rowPembayaran['bankname']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_date']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_confirm_date']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_amount_transfer']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_info']; ?></td>
                              </tr>
                           <?php } ?>
		  </tbody>
		</table>

	</center>
</body>
</html>