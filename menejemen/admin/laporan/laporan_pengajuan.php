<?php
include '../../inc/inc-db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengajuan</title>
</head>
<body>
	<table border="1">
		<thead>
			<th>NO</th>
			<th>NO INVOICE</th>
			<th>NAMA</th>
			<th>INSTANSI</th>
			<th>TANGGAL PINJAM</th>
			<th>TANGGAL KEMBALI</th>
			<th>NAMA ALAT</th>
			<th>JUMLAH</th>
		</thead>
		<tbody>
			<?php
				$no =1;
				$show = mysql_query("SELECT * from trx_loan_application A join trx_loan_application_detail B on A.loan_app_id = B.loan_app_id_fk join tbl_member C on C.member_id = A.member_id_fk join ref_instrument D on D.instrument_id = B.instrument_id_fk");
				while ($runshow = mysql_fetch_array($show)) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $runshow['loan_invoice']; ?></td>
					<td><?php echo $runshow['member_name']; ?></td>
					<td><?php echo $runshow['member_institution']; ?></td>
					<td><?php echo $runshow['loan_date_start']; ?></td>
					<td><?php echo $runshow['loan_date_return']; ?></td>
					<td><?php echo $runshow['instrument_name']; ?></td>
					<td><?php echo $runshow['loan_amount']; ?></td>
				</tr> 
				<?php
				}
			?>
		</tbody>
	</table>
</body>
</html>