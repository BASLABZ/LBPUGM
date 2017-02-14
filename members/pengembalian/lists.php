<?php 
        $invoice = $_GET['id'];
        $rowPengembalian = mysql_fetch_array( mysql_query("SELECT * FROM trx_loan_application  where loan_invoice='".$invoice."' ")); 

        if (isset($_POST['simpanPengambalian'])) {
                 $kode  = buatkode("trx_return_loan","");   
                 $nomor = $_POST['instrument_id_fk'];
                 $loan_status = $_POST['loan_status_detail'];
                 $tanggal_perpanjang  = $_POST['kembalikan'];
                 $banyak = count($nomor);
                 $inst = $_POST['instrument_id_fk'];
                 $queryUpdateLoan = mysql_query("UPDATE trx_loan_application set loan_status ='PERPANJANG' where loan_invoice = '".$invoice."'");
                 $queryInsert = mysql_query("INSERT INTO trx_return_loan
                                                             (idreturn,loan_app_id_fk,
                                                                date_return,date_return_leas) 
                                                VALUES  ('".$kode."','".$rowPengembalian['loan_app_id']."','".$rowPengembalian['loan_date_return']."',NOW())");  
                for ($i=0; $i < $banyak; $i++) { 
                    $arr = $loan_status[$i];
                    $tanggal_return = $tanggal_perpanjang[$i];
                    $ins = $inst[$i];
                    $queryInsertReturn = mysql_query("INSERT INTO trx_return_detail_loan 
                                            (instrument_id_fk,
                                            return_status,return_amount,
                                            return_subtotal,idreturn_fk,return_date_instrument) 
                                        VALUES ('".$ins."','PERPANJANG','".$_POST['loan_amount'][$i]."','".$_POST['loan_subtotal'][$i]."','".$kode."','".$tanggal_perpanjang."')");

                }




                
             }     
 ?>
<section class="features dim_about" style="background-color:#1ab394;">
    <div class="container" style="padding-top: 18px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1 style="color:white; "><span class="fa fa-share"></span> Pengembalian Peralatan BIO-PALEONTROPOLOGI - UGM</h1>
            </div>
        </div>
    </div>
</section>
<section  class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <p><i>Informasi Data Instrument yang anda sewa, sebelum melakukan transaksi pengembalian silahkan baca terlebih dahulu prosedur pengembalian alat/instrument </i></p>
        </div>
    </div>
    <hr>
     <div class="row">
    <div class="col-md-12 features-text wow fadeInLeft">
        <div class="panel panel-primary dim_about">
            <div class="panel panel-heading"> <span class="fa fa-list"></span> Transaksi pengembalian </div>
            <div class="panel panel-body">
            <form method="POST">
                
                    <div class="form-group row">
                        <label class="col-md-6">NO INVOICE : <?php echo $invoice; ?></label>
                    </div>  
                    <div class="form-group row">
                        <label class="col-md-6">HARUS DIKEMABALIKAN PADA : <?php echo jin_date_str($rowPengembalian['loan_date_return']); ?></label>
                    </div>     
                    <div class="form-group row well">
                        <label class="col-md-3">TANGGAL SELESAI / PERPANJANG</label>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="kembalikan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-resposive table-hover">
                                <thead>
                                    <th>NO</th>
                                    <th>NAMA INSTRUMENT</th>
                                    <th>JUMLAH</th>
                                    <th>PERPANJANG</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1;
                                        $queryInstrument = mysql_query("SELECT * FROM trx_loan_application_detail d join ref_instrument i on d.instrument_id_fk = i.instrument_id join trx_loan_application a on d.loan_app_id_fk = a.loan_app_id where a.loan_status != 'PERPANJANG' and a.loan_status !='KEMBALIKAN' and  a.loan_invoice = '".$invoice."'");
                                        
                                        while ($rowKembali = mysql_fetch_array($queryInstrument)) {
                                            
                                     ?>
                                    <tr>
                                        <td><?php echo $no++; ?><input type="hidden" name="loop[]" value="<?php echo $no; ?>"></td>
                                        <td>
                                        <input type="hidden" value="<?php echo $rowKembali['instrument_id_fk']; ?>" name='instrument_id_fk[]'>
                                        <input type="checkbox" hidden value="<?php echo $no; ?>" checked>
                                        <?php echo $rowKembali['instrument_name']; ?></td>
                                        <td>
                                        <input type="hidden" value="<?php echo $rowKembali['loan_amount']; ?>" name='loan_amount[]'>
                                        <input type="hidden" value="<?php echo $rowKembali['loan_subtotal']; ?>" name='loan_subtotal[]'>
                                        <?php echo $rowKembali['loan_amount']; ?>
                                        </td>
                                        <td>
                                    
                                        <?php echo " 
                                        <input type='checkbox'  onclick='disabledUbahstatus(".$no.")' id='cek".$no."' name='cek[]'>
                                              "; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td>
                                            <button type="submit" class="btn btn-info btn-sm dim_about pull-right" name="simpanPengambalian">
                                                <span class="fa fa-save"></span> SIMPAN PENGEMBALIAN INSTRUMENT
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </form>
            </div>
        </div>   
        <div class="panel panel-primary di_about">
            <div class="panel-heading"><span class="fa fa-list"></span> KOLOM PERPANJANG</div> 
            <div class="panel-body">
                <form class="role" method="POST">
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                            <th>No</th>
                            <th>NAMA INSTRUMENT</th>
                            <th>JUMLAH</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </thead>
                        <tbody>
                            <?php 
                                $nox = 1;
                                $queryPerpanjang  = mysql_query("SELECT * FROM trx_return_detail_loan dt JOIN trx_return_loan r ON dt.idreturn_fk= r.idreturn join trx_loan_application a ON r.loan_app_id_fk = a.loan_app_id 
                                    JOIN ref_instrument f ON dt.instrument_id_fk = f.instrument_id
                                where a.loan_invoice = '".$invoice."'");
                                while ($rowPerpanjang = mysql_fetch_array($queryPerpanjang)) {
                             ?>
                             <tr>
                             <td><?php echo $nox++; ?></td>
                             <td><?php echo $rowPerpanjang['instrument_name']; ?></td>
                             <td><?php echo $rowPerpanjang['return_amount']; ?></td>
                             <td><?php echo $rowPerpanjang['return_status']; ?></td>
                             <td><a href="" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a></td>
                             </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td><button class="btn btn-info btn-sm dim_about pull-right"><span class="fa fa-save"></span>  PEMBAYARAN</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>    
    </div>
    </div>
</section>
<script type="text/javascript">
     function disabledUbahstatus(no) {
        var idcheck    = document.getElementById('cek'+no); 
        var kembalikan = document.getElementById('kembalikan'+no);
        if (kembalikan.disabled) {
            kembalikan.disabled = idcheck.checked ? false : true;
        }
        if (!kembalikan.disabled) {
            kembalikan.disabled = idcheck.checked ? false : true;
            kembalikan.focus();
        }
    }
</script>