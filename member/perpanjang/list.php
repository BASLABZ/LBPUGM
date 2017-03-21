<?php 
    $query  = mysql_query("SELECT * FROM trx_loan_application where loan_invoice = '".$_GET['invoice']."'");
    $rows = mysql_fetch_array($query);
    $tanggalpengembalian = $rows['loan_date_return'];
    $tanggalawal = $rows['loan_date_start'];
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>PENGAJUAN ALAT</h2>
        <ol class="breadcrumb">
            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
                <a>Perpanjang Alat</a>
            </li>
            <li class="active">
                <strong>Daftar Pengajuan</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title dim_about" style="background-color: #1ab394; border-color: #1ab394; color: white;"><span class="fa fa-list"></span> Daftar Perpanjang Peminjaman Alat</div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12" >
                            <form class="role">
                                 <div class="form-group row">
                                    <label class="col-md-3" align='right'>INVOICE</label>
                                    <div class="col-md-4"><label><?php echo $rows['loan_invoice']; ?></label></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" align='right'>Tanggal Awal Pinjam</label>
                                    <div class="col-md-4"><label><?php echo $tanggalawal; ?></label></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" align='right'>Tanggal Pengembalian</label>
                                    <div class="col-md-4"><label><?php echo $tanggalpengembalian; ?></label></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                        
                        <table class="table table-responsive table-hover table-bordered">
                                <thead>
                                    <th>NO</th>
                                    <th>NAMA INSTRUMENT</th>
                                    <th>JUMLAH</th>
                                    <th>SUBTOTAL</th>
                                    <th>AKSI</th>
                                </thead>
                                <tbody>  
                        <?php 
                                
                                $invoice = $_GET['invoice'];
                                
                                $sqldetail = mysql_query("SELECT * FROM trx_loan_application_detail d join ref_instrument i on d.instrument_id_fk = i.instrument_id join trx_loan_application a on d.loan_app_id_fk = a.loan_app_id
                                    JOIN tbl_member m ON a.member_id_fk = m.member_id
                                 where a.loan_invoice = '".$invoice."'");
                                $no =1;
                                while ($rowDetailPeminjaman = mysql_fetch_array($sqldetail)) {
                                    $status = $rowDetailPeminjaman['loan_status_detail'];
                         ?>     
                                <tr>

                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $rowDetailPeminjaman['instrument_name']; ?></td>
                                    <td class="text-right"><?php echo $rowDetailPeminjaman['loan_amount']; ?></td>
                                    <td class="text-right">Rp.<?php echo rupiah($rowDetailPeminjaman['loan_subtotal']); ?></td>
                                    <td>
                                       <center><input type='checkbox' name='pilih'></center>
                                       
                                    </td>
                                </tr>
                        <?php } ?>
                                </tbody>
                            </table>
  


                        </div>
                        <div class="col-md-12">
                             <div class="col-md-4 dim_about">
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Tanggal Start</label>
                                     <div class="col-md-6">
                                         <input type="text" class="form-control" id="tgl_pinjams" value="<?php echo $tanggalpengembalian; ?>" disabled>
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Tanggal Selesai</label>
                                     <div class="col-md-6">
                                         <input type="" class="form-control" id="tgl_kembalis"  >
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Lama Pinjam(Hari)</label>
                                     <div class="col-md-6">
                                         <input type="" class="form-control" disabled="">
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Dihitung(Minggu)</label>
                                     <div class="col-md-6">
                                         <input type="" class="form-control" disabled="">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-1"><button type="button" data-toggle="tooltip" data-placement="top"
                         title="HITUNG PINJAMAN"  class="btn btn-primary dim btn-small-dim" onclick="hitungFIX()" id="hitungsemua"><span class="fa fa-calculator"> </span> </button>
                         <br></div>
                             <div class="col-md-4 dim_about">
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Total Peminjaman (Rp.)</label>
                                     <div class="col-md-6">
                                         <input type="" class="form-control" disabled="">
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Potongan :</label>
                                     <div class="col-md-6">
                                         <input type="" class="form-control" disabled="">
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                     <label class="col-md-6" align='right'>Total Bayar :</label>
                                     <div class="col-md-6">
                                         <input type="" class="form-control" disabled="">
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
  <script type="text/javascript">
      function hitungTotalNIlai() {
  
  var hitungsemuaData = document.getElementById('hitungsemua');
  hitungsemuaData.click(); 
}
  </script>