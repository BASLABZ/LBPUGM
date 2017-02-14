<?php 
     // proses pembatalan pengajuan
    if (isset($_GET['batalkan'])) {
      $queryPembatalanPengajuan = mysql_query("UPDATE trx_loan_application set loan_status ='DIBATALKAN' where loan_invoice='".$_GET['batalkan']."' ");
    }
    if (isset($_GET['konfirmasi'])) {
      $queryKonfirmasiSetelahbatal = mysql_query("UPDATE trx_loan_application set loan_status ='MENUNGGU' where loan_invoice='".$_GET['konfirmasi']."' ");
    }
    // proses penghapusan penawaran dari admin
    if (isset($_GET['hapus']) && isset($_GET['invoice']) && isset($_GET['jumlah']) && isset($_GET['subtotal'])) {
      $queryCek = "SELECT * from trx_loan_application where loan_invoice = '".$_GET['invoice']."'";
      $rowLoanApp = mysql_fetch_array(mysql_query($queryCek));
      $dataLoanItem = $_GET['jumlah'];
      $dataLoanSubtotalitem = $_GET['subtotal'];
      $dataInvoice = $rowLoanApp['loan_invoice'];
      $dataJumlah  = $rowLoanApp['loan_total_item'];
      $dataSubtotal  = $rowLoanApp['loan_total_fee'];
      $penguranganJumlah  = $dataJumlah-$dataLoanItem;
      $penguranganSubtotoalFee = $dataSubtotal - $dataLoanSubtotalitem;
      $updateDataLoanPeminjaman = "UPDATE trx_loan_application SET loan_total_item = '".$penguranganJumlah."', loan_total_fee = '".$penguranganSubtotoalFee."' WHERE loan_invoice = '".$_GET['invoice']."'";
        mysql_query($updateDataLoanPeminjaman);
        mysql_query("DELETE from trx_loan_application_detail where loan_app_detail_id = '".$_GET['hapus']."'");

    } 
 
 ?>
<section class="features dim_about" style="background-color:#1ab394;">
    <div class="container" style="padding-top: 18px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h2 style="color: white;"><span class="fa fa-user"></span> <b>PROFIL USER</b></h2>
                <p style="color: white;"><i>Informasi Data Instrument yang anda sewa, <br> sebelum melakukan transaksi silahkan baca terlebih dahulu prosedur penyewaan alat/instrument </i></p>
            </div>
        </div>
    </div>
</section>
<section  class="features">
   
    <div class="row">
        <div class="col-sm-3" style="padding-top:40px; margin-left: 35px;">
        <div class="panel-group">
                <div class="panel panel-primary dim_about">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1" ><span class="fa fa-user"></span> IDENTITAS MEMBER</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in" aria-expanded="true">
                    <ul class="list-group">
                      <?php 
                            if ($_SESSION['member_photo']=='') {
                              echo "<li class='list-group-item'><img src='members/image/testimonial-icon1.png' class='img-circle img-responsive dim_about'></li>";
                            }else{
                              echo "<li class='list-group-item'><img src='members/image/".$_SESSION['member_idcard_photos']."' class='img-circle img-responsive dim_about'></li>";
                            }
                       ?>
                      <li class="list-group-item"><?php echo $_SESSION['member_name']; ?></li>
                      <li class="list-group-item"><span class="fa fa-envelope"></span> <?php echo $_SESSION['member_email']; ?></li>
                      <li class="list-group-item"><span class="fa fa-phone"></span> <?php echo $_SESSION['member_phone_number']; ?></li>
                      <li class="list-group-item"><span class="fa fa-map-marker"></span> <?php echo $_SESSION['member_address']; ?></li>
                      
                    </ul>
                    <div class="panel-footer"><a href="index.php?hal=members/peminjaman/pengajuan" class="btn btn-info btn-block dim_about"><span class="fa fa-arrow-left"></span> PINJAM ALAT</a></div>
                  </div>
                </div>
              </div>
    </div>
    <div class="col-sm-8 features-text wow fadeInLeft">

        <div class="panel panel-warning">
          <div class="panel-heading dim_about">
            <p style="color: white;"><span class="fa fa-exclamation-triangle"></span>  

            <?php 

              $queryPeringatan = mysql_query("SELECT loan_status,loan_invoice from trx_loan_application where member_id_fk='".$_SESSION['member_id']."' order by loan_app_id DESC  limit 1");
            while ($rowPeringatan = mysql_fetch_array($queryPeringatan)) {
                    $statusKonfirmasi = $rowPeringatan['loan_status'];
                    if($statusKonfirmasi=='ACC') {
                        echo "PERINGATAN : PENGAJUAN PEMINJAMAN DENGAN NO INVOICE ".$rowPeringatan['loan_invoice']." ANDA TELAH DI ACC & SILAHKAN MELAKUKAN PEMBAYARAN , WAKTU TEMPO PEMBAYAAN 3 JAM 60 MENIT.<hr><b>JIKA SELAMA WAKTU TEMPO ANDA TIDAK MELAKUKAN PEMBAYARAN MAKA PENGAJUAN PEMINJAMAN ANDA AKAN DIBATALKAN OTOMATIS</b>";       
                    }elseif ($statusKonfirmasi == 'DITOLAK') {
                      echo "PERINGATAN : PENGAJUAN PEMINJAMAN DENGAN NO INVOICE ".$rowPeringatan['loan_invoice']." ANDA TELAH DI DITOLAK DAN LIHAT DETAIL PEMINJAMAN <b>";
                    }elseif($statusKonfirmasi == 'MENUNGGU'){
                      echo "PENGAJUAN ANDA SEDANG DIPROSES OLEH ADMIN";
                    }
                    else if($statusKonfirmasi != 'ACC' && $statusKonfirmasi != 'DITOLAK'){
                        echo "SELAMAT DATANG DI SISTEM INFORMASI PENYEWAAN ALAT LBP - UGM";
                    }
             } ?>
            
          </div>
        </div>
        <div class="panel panel-primary dim_about">
            <div class="panel panel-heading"><span class="fa fa-shopping-cart"></span> DAFTAR SEWA</div>
            <div class="panel panel-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><span class="fa fa-shopping-cart"></span> DATA TRANSAKSI</a></li>
                <li><a data-toggle="tab" href="#menu1"> <span class="fa fa-money"></span> SALDO</a></li>
                <li><a data-toggle="tab" href="#menu2"><span class="fa fa-shopping-cart"></span> REKAP TRANSAKSI PEMBAYARAN</a></li>
                <li><a data-toggle="tab" href="#menu3"> <span class="fa fa-user"></span> Ganti Password</a></li>
                <li><a data-toggle="tab" href="#menu4"><span class="fa fa-key"></span> User Profil </a></li>
              </ul>
              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                  <h4>Data Penyewaan</h4>
                    <div class="row well">
                      <div class="col-md-8">
                        <form>
                          <div class="col-md-2">
                            <label>Filter : </label>
                          </div>
                          <div class="col-md-6">
                            <select class="form-control">
                              <option>PEMBAYARAN</option>
                              <option>PEMINJAMAN</option>
                              <option>PEMBATALAN</option>
                            </select>
                          </div>
                        </form>
                      </div>
                    </div>
                   
                   <table class="table table-responsive table-bordered table-striped table-hover"id="instrument"
                   >
                <thead>
                    <th>NO</th>
                    <th>INVOICE</th>
                    <th>TANGGAL INPUT</th>
                    <th>TANGGAL PINJAM</th>
                    <th>TANGGAL KEMBALI</th>
                    <th>FILE AJUAN</th>
                    <th>STATUS</th>
                    <th>CEK STATUS ALAT</th>
                </thead>
                <tbody>
                   <?php 

                        $queryPeminjaman = mysql_query("SELECT * FROM trx_loan_application where member_id_fk  = '".$_SESSION['member_id']."'");
                        $no=0;
                        while ($rowPeminjaman = mysql_fetch_array($queryPeminjaman)) {
                         
                        
                          ?>
                       <tr>
                                    <td><?php echo ++$no; ?></td>
                                    <td><?php echo $rowPeminjaman['loan_invoice']; ?></td>
                                    <td><?php echo $rowPeminjaman['loan_date_input']; ?></td>
                                    <td><?php echo $rowPeminjaman['loan_date_start']; ?></td>
                                    <td><?php echo $rowPeminjaman['loan_date_return']; ?></td>
                                    <td><?php echo $rowPeminjaman['loan_file']; ?></td>
                                    <td>
                                      <button class='btn btn-info btn-sm dim_about'><span class="fa fa-check"></span> <?php echo $rowPeminjaman['loan_status']; ?></button>
                                      
                                    </td>  
                                    <?php echo "<td><a href='#detail_peminjaman'  class='btn btn-warning btn-sm dim_about' id='custId' data-toggle='modal' data-id='".$rowPeminjaman['loan_invoice']."'><span class='fa fa-exclamation-triangle'></span> Detail Pengajuan</a></td>"; ?>
                                   
                            </tr>


              <?php } ?>
                </tbody>
            </table>
                </div>
                <div id="menu1" class="tab-pane fade">
                  <br>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-4">
                            
                          </div>
                          <div class="col-md-4">
                              <div class="panel panel-primary" style="border-color: #1ab394;">
                                <div class="panel-heading dim_about" >
                                  <h2>  SALDO ANDA :
                                    <?php 
                                        $querySaldo = mysql_query("SELECT sum(saldo_nominal) as total_saldo FROM tbl_saldo where member_id_fk='".$_SESSION['member_id']."'");
                                        $total_saldo = mysql_fetch_array($querySaldo);
                                        if ($total_saldo['total_saldo']=='') {
                                          echo "Rp.0";
                                        }
                                        echo "".$total_saldo['total_saldo']."</h2>";
                                     ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="panel panel-primary">
                          <div class="panel-heading">PANCAIRAN SALDO</div>
                          <div class="panel-body">
                            <form class="role" method="POST">
                              <div class="form-group row">
                                <label class="col-md-5">SALDO ANDA SAAT INI</label>
                                <div class="col-md-4">
                                  <input type="number" class="form-control dim_about" value="<?php echo $total_saldo['total_saldo']; ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-5">NOMINAL YANG AKAN DICAIRKAN</label>
                                <div class="col-md-4">
                                  <input type="number" class="form-control dim_about">
                                </div>
                              </div>
                              <div class="form-group row">
                               <div class="col-md-9">
                                  <button type="submit" class="btn btn-primary dim_about pull-right"> <span class=" fa fa-save"></span> CAIRKAN</button>
                               </div>
                              </div>
                            </form>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                  <h3>Rekap Pembayaran</h3>
                  <div class="panel-body">
                        <div class="col-md-12">
                          <div class="well">
                              <p align="right">
                                <a href="members/kwitansi/riwayat_pembayaran.php" target="_BLANK" class="btn btn-primary btn-xs dim_about"> <span class="fa fa-print"></span> Cetak Riwayat Pembayaran</a>
                              </p>
                          </div>
                        </div>
                            
                            <table class="table table-responsive table-hover table-bordered table-striped" id="rekappembayaran">
                            <thead>
                              <th>NO</th>
                              <th>INVOIVE</th>
                              <th>BANK</th>
                              <th>TANGGAL INPUT</th>
                              <th>TANGGAL KONFIRMASI</th>
                              <th>BUKTI TRANSFER</th>
                              <th>JUMLAH</th>
                              <th>KETERANGAN</th>
                              <th>CETAK</th>
                            </thead>
                            <tbody>
                              <?php 
                            $no=1;
                            $queryPembayaran= mysql_query(
                              "SELECT * from trx_payment_temp pay JOIN trx_loan_application p on pay.loan_app_id_fk = p.loan_app_id JOIN tbl_member m on pay.member_id_fk = m.member_id where pay.member_id_fk  = '".$_SESSION['member_id']."'");
                            while ($rowPembayaran  = mysql_fetch_array($queryPembayaran)) {
                           ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $rowPembayaran['loan_invoice']; ?></td>
                                <td><?php echo $rowPembayaran['bankname']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_date']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_confirm_date']; ?></td>
                                <td><a href="surat/<?php echo $rowPembayaran['payment_temp_photo']; ?>" class='btn btn-info btn-xs'> <span class="fa fa-download"></span> FILE BUKTI TRANSFER</a></td>
                                <td><?php echo $rowPembayaran['payment_temp_amount_transfer']; ?></td>
                                <td><?php echo $rowPembayaran['payment_temp_info']; ?></td>
                                <td><a href="index.php?hal=members/kwitansi/kwitansi&id=<?php echo $rowPembayaran['payment_temp_id']; ?>" target="_BLANK" class="btn btn-primary dim_about"> <span class="fa fa-print"></span></a></td>
                              </tr>
                           <?php } ?>
                            </tbody>
                          </table>
                        
                  </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                  <h3>Ganti Password</h3>
                  <form class="role" method="POST">
                      <div class="form-group row">
                          <label class="col-md-4 pu"><center>Password Lama</center></label>
                          <div class="col-md-6">
                              <input type="password" class="form-control">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-4 pu"><center>Password Baru</center></label>
                          <div class="col-md-6">
                              <input type="password" class="form-control">
                          </div>
                      </div>
                      <div class="form-group col-md-10">
                          <button class="btn btn-primary dim_about pull-right"><span class="fa fa-gear"></span> Ubah</button>
                      </div>
                  </form>
                </div>
                <div id="menu4" class="tab-pane fade">
                   
                  <form class="role">
                  <?php 
                    $sqlMember  = mysql_query("SELECT * FROM tbl_member m JOIN ref_category c on m.category_id_fk = c.category_id where m.member_id='".$_SESSION['member_id']."'");
                    $rowMember = mysql_fetch_array($sqlMember);
                   ?>
                  <div class="form-group row">
                    <div class="col-md-12 text-center">
                      <?php 
                          if ($rowMember['member_photo']=='') {
                            echo "<img src='members/image/testimonial-icon1.png' class='img-circle dim_about'>";
                          }else{
                            echo "<img src='members/image/".$_SESSION['member_photo']."' class='img-circle dim_about'>";
                          }
                       ?>
                       <center><input type="file" class="btn btn-info" value="UBAH FOTO"></center>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Nama Lengkap</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_name']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Instansi</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_institution']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Fakultas</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_faculty']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Tanggal Lahir</label>
                    <div class="col-md-6">
                      <input type="date" class="form-control" value="<?php echo jin_date_str($rowMember['member_birth_date']); ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Gender</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_gender']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">No. Telp</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_phone_number']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Alamat</label>
                    <div class="col-md-6">
                      <textarea class="form-control"  placeholder="Alamat"><?php echo $rowMember['member_address']; ?></textarea> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">Email</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_email']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">ID CARD</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_idcard_photo']; ?>" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-4">STATUS MEMBER</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['member_status']; ?>" disabled >
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label class="col-md-4">KATEGORI MEMBER</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" value="<?php echo $rowMember['category_name']; ?>" disabled >
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
        </div>       
    </div>
    
    </div>
  
</section>
  <script type="text/javascript">
   setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000

                };
                toastr.success('LBP - UGM', 'SELAMAT DATANG DI WEBSITE LBP UGM');

            }, 1300);
 </script>
