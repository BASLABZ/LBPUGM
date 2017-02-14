
<?php 
        if (isset($_POST['pinjam'])) {
            $cek = $_POST['cek'];
            foreach ($cek as $key => $value) {
                if (!empty($value)) {
                    $query  = mysql_query("INSERT into trx_loan_temp(instrument_id_fk, member_id_fk) values ('".$value."','".$_SESSION['member_id']."')");
                }
            }
            if ($query) { echo "<script>location.href='index.php?hal=members/peminjaman/keranjang';</script>  ";exit;   }
        }
 ?>
<style type="text/css">
 table.table-fixedheader {
    width: 100%;   
}
 table.table-fixedheader, table.table-fixedheader>thead, table.table-fixedheader>tbody, table.table-fixedheader>thead>tr, table.table-fixedheader>tbody>tr, table.table-fixedheader>thead>tr>th, table.table-fixedheader>tbody>td {
    display: block;
}
table.table-fixedheader>thead>tr:after, table.table-fixedheader>tbody>tr:after {
    content:' ';
    display: block;
    visibility: hidden;
    clear: both;
}
 table.table-fixedheader>tbody {
    overflow-y: scroll;
    height: 500px;   
}
 table.table-fixedheader>thead {
    overflow-y: scroll;    
}
 table.table-fixedheader>thead::-webkit-scrollbar {
    background-color: inherit;
}
table.table-fixedheader>thead>tr>th:after, table.table-fixedheader>tbody>tr>td:after {
    content:' ';
    display: table-cell;
    visibility: hidden;
    clear: both;
}
 table.table-fixedheader>thead tr th, table.table-fixedheader>tbody tr td {
    float: left;    
    word-wrap:break-word;     
}
</style>
<section class="features dim_about" style="background-color:#1ab394;">
    <div class="container" style="padding-top: 18px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1 style="color:white; "><span class="fa fa-file"></span> Pengajuan Peralatan BIO-PALEONTROPOLOGI - UGM</h1>
            </div>
        </div>
    </div>
</section>
<section  class="container features">
	<div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><i>Selamat Datang : </i> <?php echo $_SESSION['member_name']; ?></h1>
            <p><i>Informasi Data Instrument yang anda sewa, sebelum melakukan transaksi silahkan baca terlebih dahulu prosedur penyewaan alat/instrument </i></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title dim_about" style="background-color: #1ab394; border-color: #1ab394; color: white;">
                        <h5><span class="fa fa-list"></span> INSTRUMENT LBP UGM</h5>
                        <div class="ibox-tools" >
                            <a class="fullscreen-link">
                                <i class="fa fa-expand fa-3x"style="color: white;"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content dim_about">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 well">
                                <div class="col-md-2"><p align="right" style="padding-top: 5px;">CARI ALAT</p></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="CARI ALAT">
                                </div>
                                <div class="col-md-2"><button class="btn btn-info"><span class="fa fa-search"></span></button></div>

                            </div>
                        </div>
                         <form method="POST">
                             <table  id="myTable" class="table table-fixedheader table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">AKSI</th>
                                        <th width="5%">NO</th>
                                        <th width="20%">Gambar</th>
                                        <th width="20%">NAMA ALAT</th>
                                        <th width="8%">JUMLAH</th>
                                        <th width="8%">DIPINJAM</th>
                                        <th width="8%">TERSEDIA</th>
                                        <th width="10%"><center>HARGA SEWA</center></th>
                                        <th width="10%">AKSI</th>    
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php 
                                            $queryI = mysql_query("SELECT instrument_id,instrument_name,instrument_quantity,intrument_quantity_temp,instrument_fee,instrument_picture FROM ref_instrument");
                                            
                                            while ($rowI = mysql_fetch_array($queryI)) {
                                            $var_gambar     = "menejemen/image/".$rowI['instrument_picture'];
                                     ?>
                                        <tr>
                                            <td width="5%">
                                                <?php 
                                                $jumlah = $rowI['instrument_quantity'];
                                                $temp = $rowI['intrument_quantity_temp'];
                                                $cekDisable  = $jumlah-$temp;
                                            if ($jumlah -= $cekDisable) {
                                                echo "<input type='checkbox'  
                                                        value='".$rowI['instrument_id']."' name='cek[]' disabled>";
                                            }else{
                                                echo "<input type='checkbox' value='".$rowI['instrument_id']."' name='cek[]' >";
                                            }
                                          ?>
                                            </td>
                                            <td width="5%"><?php echo ++$no; ?></td>
                                            <td width="20%"><img style="width:130px; height:150px;" src="<?php echo $var_gambar; ?>"></td>
                                            <td width="20%"><?php echo $rowI['instrument_name']; ?></td>
                                            <td width="8%"><center><h3><?php echo $rowI['instrument_quantity']; ?></h3></center></td>
                                            <td width="8%">
                                            <?php
                                                
                                                $queryBook = mysql_query("SELECT * FROM trx_loan_application_detail d 
                                                                        JOIN trx_loan_application p 
                                                                        ON d.loan_app_id_fk = p.loan_app_id 
                                                                        JOIN tbl_member m 
                                                                        on p.member_id_fk = m.member_id
                                                                        JOIN ref_category c 
                                                                        ON m.category_id_fk = c.category_id
                                                                        JOIN ref_instrument i 
                                                                        ON d.instrument_id_fk = i.instrument_id
                                                                        WHERE d.loan_status_detail = 'ACC' and d.instrument_id_fk='".$rowI['instrument_id']."'
                                                                        ");
                                                
                                            while ($runBooking = mysql_fetch_array($queryBook)) {
                                                 $idIN = $runBooking['instrument_id_fk'];
                                                    echo "
                                                        <button type='button' data-toggle='tooltip' title='".$runBooking['member_faculty']."' class='btn btn-success btn-xs dim_about'>
                                                            <span class='fa fa-user'></span>
                                                        <label>
                                                            ".$runBooking['member_institution']."
                                                        </label>
                                                        </button>
                                                        <br>
                                                        <br>
                                                    ";
                                            }
                                             ?>
                                            </td>
                                            <td width="8%">
                                                <?php 
                                                        $total_stok         = $rowI['instrument_quantity'];
                                                        $temp_instrument    = $rowI['intrument_quantity_temp'];
                                                        $stokTersedia       = $total_stok-$temp_instrument;
                                                        if ($stokTersedia != 0) {
                                                            echo "<h3>".$stokTersedia."</h3>";
                                                        }else{
                                                            echo "<button class='btn btn-warning btn-xs'>STOK <br>KOSONG</button>";
                                                        }
                                                 ?>
                                            </td>
                                            <td width="10%"><?php echo $rowI['instrument_fee']; ?></td>
                                            <td width="10%">
                                                <a href='#myModal' class='btn btn-info btn-sm dim_about' id='custId' data-toggle='modal' data-id="<?php echo $rowI['instrument_id']; ?>"><span class='fa fa-eye'></span> Detail</a>
                                            </td> 
                                        </tr>   
                                    <?php } ?>
                                </tbody>
                                </table>
                            <div class="form-group">
                                <button type="submit" name="pinjam" class="btn btn-info pull-right dim_about"> <span class="fa fa-shopping-cart"></span> Pinjam Alat</button>
                                <br>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
    </div>
</section>
