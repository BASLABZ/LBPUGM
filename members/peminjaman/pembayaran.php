<?php
  if (isset($_POST['simpanPembayaranAlat'])) {
 
     if (!empty($_FILES) && $_FILES['frm_file']['error'] == 0) {
                          $fileName = $_FILES['frm_file']['name'];
                          $move = move_uploaded_file($_FILES['frm_file']['tmp_name'], 'surat/'.$fileName);
                     if ($move) {
                          $date = jin_date_sql($_POST['payment_temp_confirm_date']); 
                          $paymentBill = $_POST['payment_bill'];
                          $Ceksaldo = $_POST['cekSaldos'];  
                          $transfer = $_POST['payment_temp_amount_transfer'];
                          $penguranganSaldo = $transfer-$paymentBill;
                          $saldoawal = $_POST['payment_temp_amount_saldo'];
                       

                          if ($Ceksaldo <= 0) {
                              
                             $querySimpanPayment = mysql_query("INSERT INTO trx_payment_temp 
                                                    (bankname,payment_bill,payment_temp_amount_transfer,
                                                    payment_temp_amount_saldo,payment_temp_date,
                                                    payment_temp_confirm_date,payment_temp_photo,
                                                    payment_temp_info,loan_app_id_fk,member_id_fk
                                                    ) 
                                                VALUES ('".$_POST['bankname']."','".$_POST['payment_bill']."',
                                                        '".$_POST['payment_temp_amount_transfer']."','".$penguranganSaldo."',NOW(),
                                                        '".$date."','".$fileName."','".$_POST['payment_temp_info']."',
                                                        '".$_POST['loan_app_id_fk']."','".$_SESSION['member_id']."')");
                             $saldobertambah = $penguranganSaldo+$saldoAwal;
                                                  $querySimpanSaldo = mysql_query("INSERT INTO tbl_saldo 
                                                                                    (loan_app_id_fk,saldo_nominal,member_id_fk) 
                                                                                    VALUES ('".$_POST['loan_app_id_fk']."','".$saldobertambah."','".$_SESSION['member_id']."') ");

                                $updateStatusPeminjaman = mysql_query("UPDATE trx_loan_application set loan_status = 'MEMBAYAR TAGIHAN' where loan_app_id='".$_POST['loan_app_id_fk']."'");

                           } elseif ($Ceksaldo >  0) {

                                                  $saldobertambah = $penguranganSaldo+$saldoAwal;
                                                  $querySimpanSaldo = mysql_query("INSERT INTO tbl_saldo 
                                                                                    (loan_app_id_fk,saldo_nominal,member_id_fk) 
                                                                                    VALUES ('".$_POST['loan_app_id_fk']."','".$saldobertambah."','".$_SESSION['member_id']."') ");
                                                  $querySimpanPayment = mysql_query( "INSERT INTO trx_payment_temp 
                                                    (bankname,payment_bill,payment_temp_amount_transfer,
                                                    payment_temp_amount_saldo,payment_temp_date,
                                                    payment_temp_confirm_date,payment_temp_photo,
                                                    payment_temp_info,loan_app_id_fk,member_id_fk
                                                    ) 
                                                VALUES ('".$_POST['bankname']."','".$_POST['payment_bill']."',
                                                        '".$_POST['payment_temp_amount_transfer']."','".$saldobertambah."',NOW(),
                                                        '".$date."','".$fileName."','".$_POST['payment_temp_info']."',
                                                        '".$_POST['loan_app_id_fk']."','".$_SESSION['member_id']."')");

                            $updateStatusPeminjaman = mysql_query("UPDATE trx_loan_application set loan_status = 'MEMBAYAR TAGIHAN' where loan_app_id='".$_POST['loan_app_id_fk']."'");
                           }     
                          // print_r($querySimpanPayment);
                           if ($querySimpanPayment) {
                             echo "<script> alert('Terimakasih Data Konfirmasi Pembayaran Berhasil Disimpan'); location.href='index.php?hal=members/list' </script>";exit;
                           }
                        }
                         
                     }
  }
 ?>
<section class="features dim_about" style="background-color:#1ab394;">
    <div class="container" style="padding-top: 18px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1 style="color:white; "><span class="fa fa-check"></span>KONFIRMASI PEMBAYARAN PEMINJAMAN ALAT</h1> 
                  

            </div>
        </div>
    </div>
</section>
<section  class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>INFORMASI & KONFIRMASI PEMBAYARAN </h1>
            <p><i>Informasi Data Instrument yang anda sewa, sebelum melakukan transaksi silahkan baca terlebih dahulu prosedur penyewaan alat/instrument </i></p>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 features-text wow fadeInLeft">
        <div class="panel panel-primary dim_about">
            <div class="panel panel-heading">KONFIRMASI PEMBAYARAN</div>
            <div class="panel panel-body">
             <?php 
            $invoice = $_GET['id'];
            $rowPenagihan = mysql_fetch_array(mysql_query("SELECT * FROM trx_loan_application a JOIN tbl_member m on a.member_id_fk = m.member_id where loan_invoice = '".$invoice."'"));
            $kodePeminjaman = $rowPenagihan['loan_app_id'];
 ?>
<div class="row">
<div class="col-md-12">
  <div class="form-group">
    <label>NO INVOICE : <?php echo $invoice; ?></label><br>
    <label>NAMA MEMBER : <?php echo $rowPenagihan['member_name']; ?></label><br>
    <label>TANGGAL PINJAM : <?php echo jin_date_str($rowPenagihan['loan_date_start']); ?></label>
  </div> 
</div> 
  </div>
<table class="table table-responsive table-hover table-bordered">
    <thead>
      <th>NO</th>
      <th>NAMA INSTRUMENT</th>
      <th>JUMLAH</th>
      <th>SUBTOTAL</th>
    </thead>
    <tbody>
    <?php 
        
        $sqldetail = mysql_query(
                                  "SELECT a.loan_invoice,i.instrument_name,
                                          d.loan_amount,d.loan_subtotal 
                                    FROM trx_loan_application a
                                    JOIN trx_loan_application_detail d 
                                    ON a.loan_app_id = d.loan_app_id_fk
                                    JOIN ref_instrument i 
                                    ON d.instrument_id_fk = i.instrument_id
                                  WHERE a.loan_invoice = '".$invoice."'");
        $no =1;
        while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
     ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
        <td><?php echo $rowDetailPeminjaman['loan_amount']; ?></td>
        <td><?php echo $rowDetailPeminjaman['loan_subtotal']; ?></td>
      </tr>
<?php } ?>
    </tbody>
    <tfoot>
         <tfoot>
      <?php 
        $queryTotal = mysql_query("SELECT * FROM trx_loan_application where loan_invoice ='".$invoice."'");
        while ($roTotal = mysql_fetch_array($queryTotal)){  
          $totalTagihan = $roTotal['loan_total_fee'];
     ?>
    <tfoot>
      <tr>
        <td colspan="2">Jumlah Item</td>
        <td><?php echo $roTotal['loan_total_item']; ?> /Buah</td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3">Total</td>
        <td><?php echo $roTotal['loan_total_fee']; ?></td>
      </tr>
    </tfoot>
    <?php } ?>
    </tfoot>
    </tfoot>
  </table>
  
  </div>
</div>       
</div>
  <div class="col-md-6 features-text wow fadeRight">
      <div class="panel panel-success">
        <div class="panel-heading"><span class="fa fa-check"></span> KONFIRMASI PEMBAYARAN</div>
        <div class="panel-body dim_about">
          <form class="role" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <label class="col-md-4">INVOICE</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="invoice" value="<?php echo $invoice; ?>" readonly />
                <input type="hidden" class="form-control" name="loan_app_id_fk" value="<?php echo $kodePeminjaman; ?>" />
                
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">TANGGAL PEMBAYARAN</label>
              <div class="col-md-6">
                <input type="date" class="form-control" name="payment_temp_confirm_date" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">TOTAL TAGIHAN</label>
              <div class="col-md-6">
                <input type="text" name="totalTagihan"  class="form-control" value="<?php echo $totalTagihan; ?>" readonly  />
                <input type="hidden" id="tagihan" name="payment_bill" value="<?php echo $totalTagihan; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">BANK</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="bankname" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">MENGGUNAKAN SALDO</label>
              <div class="col-md-6">
                <div class="input-group">
                <span class="input-group-addon">
                  <input type="checkbox" onclick="disabledSaldo(this)"   id="cek">
                </span>
                <input type="text" class="form-control"  id="txtSaldo" disabled="disabled">
                <input type="hidden" name="cekSaldos" value="0">
                <input type="hidden" class="form-control"   name="payment_temp_amount_saldo" value="0">
              </div>
              <!-- INFROMASI SALDO MEMBER -->
               <label id="saldosementara" hidden>
                <?php 
                   $querySaldo = mysql_query("SELECT sum(saldo_nominal) as total_saldo FROM tbl_saldo where member_id_fk='".$_SESSION['member_id']."'");
                                          $total_saldo = mysql_fetch_array($querySaldo);
                                          if ($total_saldo['total_saldo']=='') {
                                            echo "Rp.0";
                                          }else{
                                             echo "".$total_saldo['total_saldo']."";
                                          }
                 ?>
              </label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4">TRANSFER</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="payment_temp_amount_transfer"  id="nominaltransfer" />
              </div>
            </div>
            <div class="form-group row">
                                    <label class="control-label col-lg-4">Upload File</label>
                                        <div class="col-md-8">
                                            <input type="file" name="frm_file" id="ifile" onchange="cekberkas()">
                                         </div>
                                    </div>
            <div class="form-group row">
              <label class="col-md-4">KETERANGAN</label>
              <div class="col-md-6">
                <textarea class="form-control" name="payment_temp_info" ></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <button type="submit" id="simpanPembayaran"  class="btn btn-primary dim_about pull-right" name="simpanPembayaranAlat" disabled>
                <span class="fa fa-save"> SIMPAN</span>
              </button>
              </div>
            </div>
          </form> 
        </div>
      </div>
  </div>
</div>  
</section>
<script type="text/javascript">
   function disabledSaldo(cek) {
        var Saldo = document.getElementById("txtSaldo");
        Saldo.disabled = cek.checked ? false : true;
        if (!Saldo.disabled) {
            Saldo.focus();
            $('#saldosementara').show();
        }else{
            $('#saldosementara').hide();
        }
    }
    function cekberkas() {
    var filesaya = document.getElementById('ifile').value;
    var btn = document.getElementById('simpanPembayaran');
    if (filesaya=='') {
        btn.disabled = true;
    } else {
        btn.disabled = false;
    }
}
// function transfer() {
//   var tagihan = document.getElementById('tagihan').value;
//   var nominalTransfer = document.getElementById('nominaltransfer').value;
//   if (nominalTransfer < tagihan ) {

//     alert('MAAF NOMINAL YANG ANDA MASUKKAN KURANG, TAGIHAN ANDA : '+tagihan);
//   }
// }
</script>