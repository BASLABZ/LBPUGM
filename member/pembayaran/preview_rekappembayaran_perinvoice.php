<?php 
        $id = $_GET['id'];
        $querypreviewrekap = mysql_query("SELECT * FROM trx_loan_application p JOIN trx_payment_temp t ON t.loan_app_id_fk = p.loan_app_id where p.member_id_fk = '".$_SESSION['member_id']."' and p.loan_invoice = '".$id."'");
        $row = mysql_fetch_array($querypreviewrekap);
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Invoice</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                Transaksi Pembayaran
            </li>
            <li>
                Rekap Transaksi
            </li>
            <li class="active">
                <strong>Invoice : <?php echo $row['loan_invoice']; ?></strong>
            </li>
        </ol>
    </div>
</div>
 <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">

                            <div class="table-responsive m-t">
                                <table class="table table-responsive table-hover table-bordered">
        <thead>
            <th>NO</th>
            <th>NAMA INSTRUMENT</th>
            <th>JUMLAH</th>
            <th>SUBTOTAL</th>
        </thead>
        <tbody>
            <?php 

                    
                    $sqldetail = mysql_query("SELECT * FROM trx_loan_application_detail d join ref_instrument i on d.instrument_id_fk = i.instrument_id join trx_loan_application a on d.loan_app_id_fk = a.loan_app_id where a.loan_invoice = '".$id."'");
                    $no =1;
                    while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
                        $status = $rowDetailPeminjaman['loan_status_detail'];
             ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
                            <td class="text-right"><?php echo $rowDetailPeminjaman['loan_amount']; ?></td>
                            <td class="text-right">Rp.<?php echo $rowDetailPeminjaman['loan_subtotal']; ?></td>
                        </tr>
            <?php } ?>
        </tbody>
         </table>
    </div>  
    <table class="table invoice-total">
        <tbody>
          <?php 
                    $rowjumlahsubtotal = mysql_query("SELECT sum(loan_subtotal) as sub FROM trx_loan_application_detail d join trx_loan_application x 
                          on d.loan_app_id_fk = x.loan_app_id  where x.loan_invoice ='".$id."' ");
                    $xs = mysql_fetch_array($rowjumlahsubtotal);
                    $sub = $xs['sub'];
                    $queryTotal = mysql_query("SELECT loan_total_item,loan_total_fee, long_loan FROM trx_loan_application where loan_invoice ='".$id."'");
                    while ($roTotal = mysql_fetch_array($queryTotal)){  
             ?>
                <tr>
                    <td><strong>Jumlah Item :</strong></td>
                    <td><?php echo $roTotal['loan_total_item']; ?> / Item</td>
                </tr>
                <tr>
                    <td><strong>Lama Pinjam:</strong></td>
                    <td><?php echo $roTotal['long_loan']; ?>/Minggu</td>
                </tr>
                <tr>
                    <td><strong>Jumlah Subtotal  :</strong></td>
                    <td>Rp. <?php echo $sub; ?></td>
                </tr>
                <tr>
                    <td><strong>Total = Lama Pinjam x Jumlah Subtotal :</strong></td>
                    <td>Rp. <?php echo $roTotal['loan_total_fee']; ?></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
                    <div class="text-right">
                        <!-- <a href="pembayaran/cetak_rekap_per_invoivce.php" target="_BLANK" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a> -->
                        <form method="post" action="pembayaran/cetak_rekap_per_invoivce.php">
                            <input type="hidden" name="id" value="<?php echo $row['loan_invoice']; ?>" >
                            <button type="submit" class="btn btn-primary dim_about"><span class="fa fa-print"></span> Cetak</button>
                        </form>
                    </div> 
                </div>
                </div>
            </div>
        </div>