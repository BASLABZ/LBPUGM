       <?php 
      $invoice = $_GET['invoice'];
        $rowStatusLoan = mysql_fetch_array(mysql_query("SELECT loan_app_id,loan_status FROM trx_loan_application where loan_invoice = '".$invoice."'"));
        if (isset($_POST['ubah'])) {
            $queryUpdateStatusLoanAPP = mysql_query("UPDATE trx_loan_application set loan_status = '".$_POST['loan_status']."' where loan_app_id = '".$_POST['loan_app_id']."'");
                 echo "<script>  location.href='index.php?hal=peminjaman/pengajuan/pengajuan_detail&invoice=$invoice' </script>";exit;
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
                                                
                                                <td><?php echo $rowDetailPeminjaman['loan_subtotal']; ?></td>
                                                <td>
                                                    <a href='#ubahstatuspengajuan' class='btn btn-info dim_about' id='custId' data-toggle='modal' 
                                                        data-id='<?php echo $rowDetailPeminjaman['loan_app_detail_id']; ?>'><span class="fa fa-eye"></span> Ubah Status / Penawaran Alat Lain</a> 
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <?php 
                                            $queryTotal = mysql_query("SELECT * FROM trx_loan_application where loan_invoice ='".$invoice."'");
                                            while ($roTotal = mysql_fetch_array($queryTotal)){  
                                         ?>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">Jumlah Item</td>
                                                <td><?php echo $roTotal['loan_total_item']; ?> /Buah</td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="5">Total</td>
                                                <td><?php echo $roTotal['loan_total_fee']; ?></td>
                                            </tr>
                                        </tfoot>
                                        <?php } ?>
                                        </tfoot>
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
