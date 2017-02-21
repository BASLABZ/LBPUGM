<?php 
        $idMemberLogin  = $_SESSION['member_id'];
        $query = "SELECT member_id,member_name,member_institution,member_faculty,category_name,category_id FROM tbl_member JOIN ref_category ON tbl_member.category_id_fk = ref_category.category_id where tbl_member.member_id='".$idMemberLogin."'";
                    
        $identitasMember = mysql_fetch_array(mysql_query($query));
 ?>
<div class="row  border-bottom navy-bg dashboard-header">
           <div class="col-md-6">
                <div class="profile-image">
                    <img src="../img/user.png" class="img-circle circle-border m-b-md dim_about" alt="profile">
                </div>
                <div class="profile-info">
                    <div class="">
                        <div>
                            <h2 class="no-margins">
                                <?php echo $identitasMember['member_name']; ?>
                            </h2>
                            <h4>Member LBP</h4>
                            <small>
                               <b> Category member : <?php echo $identitasMember['category_name']; ?> | Instansi : <?php echo $identitasMember['member_institution']; ?> | Fakultas / Bidang : <?php echo $identitasMember['member_faculty']; ?></b>
                            </small>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-6">
                 <p align="right"> <img src="../img/logo-ugm.png" class="img-responsive " style="border-radius:50px 1px 1px 1px; "></p>
             </div> 
       <div class="row">
            <div class="col-sm-12">
            <div class="row text-left">
               <div class="col-lg-3 ">
                <div class="widget style1 lazur-bg dim_about">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cloud fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Data Transaksi</span>
                            <h3 class="font-bold">PEMINJAMAN</h3>
                            <br>
                            <a href="" class="btn btn-xs btn-primary" > lihat data <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 yellow-bg dim_about">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cloud fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Data Rekap </span>

                            <h3 class="font-bold">PEMBAYARAN</h3>
                            <br>
                            <a href="" class="btn btn-xs btn-info" > lihat data <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 lazur-bg dim_about">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cloud fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Informasi Data </span>

                            <h3 class="font-bold">SALDO</h3>
                            <br>
                            <a href="" class="btn btn-xs btn-primary" > lihat data <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3">
                <div class="widget style1 yellow-bg dim_about">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-cloud fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span>Data Transaksi  </span>

                            <h3 class="font-bold">PENGEMBALIAN</h3>
                            <br>
                            <a href="" class="btn btn-xs btn-info" > lihat data <span class="fa fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
       </div>
</div>
<div class="row" style="padding-top: 10px;">
    <div class="col-md-12">
        <div class="col-md-4">
               <a href="index.php?hal=pengajuan-member/pengajuan" class="btn btn-danger btn-lg dim_about"><span class="fa fa-search"></span> CARI ALAT / INSTRUMENT </a>
           </div>
       <div class="col-md-8">
       <?php 

              $queryPeringatan = mysql_query("SELECT loan_status,loan_invoice from trx_loan_application where member_id_fk='".$_SESSION['member_id']."' order by loan_app_id DESC  limit 1");
            while ($rowPeringatan = mysql_fetch_array($queryPeringatan)) {
                 $statusKonfirmasi = $rowPeringatan['loan_status'];
        ?>
            <?php 
                 if($statusKonfirmasi=='ACC') {
                        echo " <div class='alert alert-success alert-dismissable dim_about yellow-bg' style='border-color: #f8ac59; color: white;'>
                              <button aria-hidden='true' data-dismiss='alert' class='close' type='button' style='color: white;'>×</button>
                                <span class='fa fa-check'></span>
                                PERINGATAN : PENGAJUAN PEMINJAMAN DENGAN NO INVOICE ".$rowPeringatan['loan_invoice']." ANDA TELAH DI ACC & SILAHKAN MELAKUKAN PEMBAYARAN , WAKTU TEMPO PEMBAYAAN 3 JAM 60 MENIT.<hr><b>JIKA SELAMA WAKTU TEMPO ANDA TIDAK MELAKUKAN PEMBAYARAN MAKA PENGAJUAN PEMINJAMAN ANDA AKAN DIBATALKAN OTOMATIS</b>
                             </div>";
                    }elseif ($statusKonfirmasi == 'DITOLAK') {
                        echo "<div class='alert alert-success alert-dismissable dim_about red-bg' style='border-color: #f8ac59; color: white;'>
                          <button aria-hidden='true' data-dismiss='alert' class='close' type='button' style='color: white;'>×</button>
                            <span class='fa fa-check'></span> PERINGATAN : PENGAJUAN PEMINJAMAN DENGAN NO INVOICE ".$rowPeringatan['loan_invoice']." ANDA TELAH DI DITOLAK DAN LIHAT DETAIL PEMINJAMAN
                         </div>";
                      
                    }elseif($statusKonfirmasi == 'MENUNGGU'){
                      echo "<div class='alert alert-success alert-dismissable dim_about navy-bg' style='border-color: #f8ac59; color: white;'>
              <button aria-hidden='true' data-dismiss='alert' class='close' type='button' style='color: white;'>×</button>
                <span class='fa fa-check'></span> Menunggu Persetujuan Dari Admin
             </div> ";
                    }
                    else if($statusKonfirmasi != 'ACC' && $statusKonfirmasi != 'DITOLAK'){
                        echo "<div class='alert alert-success alert-dismissable dim_about lazur-bg' style='border-color: #f8ac59; color: white;'>
                          <button aria-hidden='true' data-dismiss='alert' class='close' type='button' style='color: white;'>×</button>
                            <span class='fa fa-check'></span> Selamat Datang Di LPB - UGM / PEMINJAMAN ALAT LAB.
                         </div> ";
                    }
             ?>
        <?php } ?> 
       </div>
    </div>
</div>