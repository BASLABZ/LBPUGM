 <?php 
      $invoice = $_GET['invoice'];
        $rowStatusLoan = mysql_fetch_array(mysql_query("SELECT loan_app_id,loan_status,member_id_fk,loan_invoice FROM trx_loan_application where loan_invoice = '".$invoice."'"));
        $idmember = $rowStatusLoan['member_id_fk'];
        if (isset($_POST['ubah'])) {
            $selectQuery = mysql_query("SELECT * FROM tbl_member where member_id = '".$idmember."'");
            $runq = mysql_fetch_array($selectQuery);
            $email = $runq['member_email'];
            $queryUpdateStatusLoanAPP = mysql_query("UPDATE trx_loan_application set loan_status = '".$_POST['loan_status']."' where loan_app_id = '".$_POST['loan_app_id']."'");
                 echo "<script>  location.href='peminjaman/pengajuan/SENDEMAIL/sendEmailDebug.php?invoice=".$invoice."&email=".$email."' </script>";exit;
        }
        
       ?>
        <div id="content">
            <div class="inner">
                <div class="container" style="padding-top:30px; ">
            <div class="row">
                <div class="col-md-12">
                <div class="panel panel-primary" style="border-color:white; ">
                    <div class="panel-heading dim_about">
                        <span class="fa fa-pencil"></span> Transaksi Pengajuan
                        <span class="fa fa-home pull-right"> <i>
                            Home / <span class="fa fa-list"></span> Transaksi / <span class="fa fa-pencil">
                            </span>
                            Pengajuan
                        </i></span>
                    </div>
                </div>
                <div class="panel panel-primary" style="border-color:white; ">
                        <div class="panel-body">
                            <div class="col-md-12">
                             <div class="panel panel-primary" style="border-color:white; ">
                                <div class="panel-heading dim_about">
                                    <span class="fa fa-pencil"></span> Transaksi Pengajuan
                                </div>
                                <div class="panel-body dim_about">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="row well dim_about">
                                            <form class="role" method="POST">

                                                <div class="col-md-1" style="padding-top: 5px; margin-right: 5px;" >STATUS </div> 
                                                <input type="hidden" value="<?php echo $rowStatusLoan['loan_app_id']; ?>" name='loan_app_id'>
                                                <input type="hidden" value="<?php echo $invoice; ?>" name='loan_invoice'>
                                                <div class="col-md-9">
                                                        <select class="form-control" name="loan_status">
                                                    <option value="MENUNGGU"
                                                                <?php if($rowStatusLoan['loan_status']=='MENUNGGU'){echo "selected=selected";}?>>
                                                                    MENUNGGU
                                                            </option>
                                                            <option value="ACC"
                                                                <?php if($rowStatusLoan['loan_status']=='ACC'){echo "selected=selected";}?>>
                                                                    ACC
                                                            </option>
                                                            <option value="DIKONFORMASI"
                                                                <?php if($rowStatusLoan['loan_status']=='DIKONFORMASI'){echo "selected=selected";}?>>
                                                                    DIKONFORMASI DAN ADA INSTRUMEN YANG DI TOLAK
                                                            </option>
                                                </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="submit" name="ubah" class="btn btn-info btn-md dim_about"> <span class="fa fa-save"></span> Ubah</button>
                                                    
                                                </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <table class="table table-responsive table-striped table-hover table-bordered table-pengajuan">
                                        <thead>
                                            <th>NO</th>
                                            <th>NAMA INSTRUMENT</th>
                                            <th>STATUS PEMINJAMAN</th>
                                             <th>PERSEDIAAN ALAT</th>
                                            <th>JUMLAH</th>
                                            <th>SUBTOTAL</th>
                                            <th>PENAWARAN</th>
                                        </thead>
                                        <tbody>
                                        <?php $sqldetail = mysql_query("SELECT * FROM trx_loan_application_detail d join ref_instrument i on d.instrument_id_fk = i.instrument_id join trx_loan_application a on d.loan_app_id_fk = a.loan_app_id where a.loan_invoice = '".$invoice."'");
                                        $no =1;
                                        while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) { 
                                                $Temp_tersedia = $rowDetailPeminjaman['intrument_quantity_temp'];
                                                $total_intruments = $rowDetailPeminjaman['instrument_quantity'];
                                                $stokTersedia  =  $total_intruments - $Temp_tersedia;
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
                                                <td><?php echo $rowDetailPeminjaman['loan_status_detail']; ?></td>
                                                <td><?php if ($stokTersedia != 0 ) {
                                                    echo "".$stokTersedia." ALAT";
                                                }else{
                                                    echo "<label class='btn btn-warning btn-xs'>STOK TELAH DI BOOKING SEMUA</label>";
                                                    }  ?></td>
                                                <td><?php echo "".$rowDetailPeminjaman['loan_amount']." ALAT"; ?></td>
                                                
                                                <td>Rp.<?php echo rupiah($rowDetailPeminjaman['loan_subtotal']); ?></td>
                                                <td>
                                                    <a href='#ubahstatuspengajuan' class='btn btn-info dim_about' id='custId' data-toggle='modal' 
                                                        data-id='<?php echo $rowDetailPeminjaman['loan_app_detail_id']; ?>'><span class="fa fa-eye"></span> Ubah Status / Penawaran Alat Lain</a> 
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <?php 
                $rowjumlahsubtotal = mysql_query("SELECT sum(loan_subtotal) as sub   FROM trx_loan_application_detail d join trx_loan_application x 
                      on d.loan_app_id_fk = x.loan_app_id  where x.loan_invoice ='".$invoice."' ");
                $xs = mysql_fetch_array($rowjumlahsubtotal);
                $sub = $xs['sub'];
                $queryTotal = mysql_query("SELECT a.loan_total_item,a.loan_total_fee, a.long_loan,m.category_id_fk FROM trx_loan_application a
                                        JOIN tbl_member m ON a.member_id_fk = m.member_id
                    where a.loan_invoice ='".$invoice."'");
                while ($roTotal = mysql_fetch_array($queryTotal)){  
                    $potongan = $roTotal['loan_total_fee'];
                    $hasil_akhirs1 = $potongan+$potongan;
                    // hitung potongan/diskon s2 
                    $lama =  $roTotal['long_loan'];
                    $totals2 = $sub *  $lama;
                    $diskons2 = $totals2*0.25;
                    $hasil_akhirs2 = $potongan-$diskons2;
                    // hasil akhir s3
                    $totals3 = $sub *  $lama;
                    $diskons3= $totals3*0.25;
                    $hasil_akhirs3 = $totals3-$diskons3;
         ?>
        <tfoot>
            <tr>
                <td colspan="3">Jumlah Item</td>
                <td><?php echo $roTotal['loan_total_item']; ?> /Buah</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"> Lama Pinjam</td>
                <td><?php echo $roTotal['long_loan']; ?>/Minggu  </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"> Jumlah Subtotal : </td>
                <td></td>
                <td>Rp.<?php echo rupiah($sub); ?></td>
            </tr>
            <?php 
                    if ($roTotal['category_id_fk']==1) {
                        
                    
             ?>
            
            <tr>
                <td colspan="3">Total </td>
                <td>Rp.<?php echo rupiah($hasil_akhirs1); ?></td>
            </tr>
            <tr>
                <td colspan="3">Potongan (50%)</td>
                <td>Rp.<?php echo rupiah($potongan);  ?></td>
            </tr>
            <tr>
                <td colspan="3">Total Bayar = (Lama Pinjam x Jumlah Subtotal)x 50 %</td>
                <td>Rp.<?php echo rupiah($roTotal['loan_total_fee']); ?></td>
            </tr>
            <?php } else if ($roTotal['category_id_fk']==5) {
                
            ?>
            
            <tr>
                <td colspan="3">Total </td>
                <td>Rp.<?php echo rupiah( $totals2); ?></td>
            </tr>
            <tr>
                <td colspan="3">Potongan (25%)</td>
                <td>Rp.<?php echo rupiah($diskons2);  ?></td>
            </tr>
            <tr>
                <td colspan="3">Total Bayar </td>
                <td>Rp.<?php 
                echo rupiah($roTotal['loan_total_fee']); ?></td>
            </tr>
            <?php }elseif ($roTotal['category_id_fk']==6) {
                
             ?>
            <tr>
                <td colspan="3">Total </td>
                <td>Rp.<?php echo rupiah($totals3); ?></td>
            </tr>
            <tr>
                <td colspan="3">Potongan (25%)</td>
                <td>Rp.<?php echo rupiah($diskons3);  ?></td>
            </tr>
            
            <tr>
                <td colspan="3">Total Bayar </td>
                <td>Rp.<?php echo rupiah($hasil_akhirs3); ?></td>
            </tr> 
             <?php }else {
                ?>
                <tr>
                <td colspan="3">Total </td>
                <td>Rp.<?php echo rupiah($roTotal['loan_total_fee']); ?></td>
            </tr>
                <?php
             } ?>
        </tfoot>
        <?php } ?>
                                        </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-lg" id="ubahstatuspengajuan" role="dialog" >
        <div class="modal-dialog" role="document" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1ab394; color:white; ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span class="fa fa-check"></span> Ubah Status Pengajuan & Penawaran Alat Lain</h4>
                </div>
                <div class="modal-body" style="padding-top:10px; ">
                    <div class="ubahstatuspengajuan-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> Keluar</button>
                </div>
            </div>
        </div>
</div>
<!-- show peminjaman modal -->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#ubahstatuspengajuan').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'peminjaman/pengajuan/ubahstatuspengajuan.php',
                data :  'id='+ rowid,
                success : function(data){
                $('.ubahstatuspengajuan-data').html(data);
                }
            });
         });
    });
</script>