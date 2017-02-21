<?php 
        if (isset($_GET['hapusitem'])) {
            $queryhapusitem = mysql_query("DELETE FROM trx_loan_temp where member_id_fk = '".$_SESSION['member_id']."' and instrument_id_fk ='".$_GET['hapusitem']."'");
        }
        $tahun     = date('Y');
        $subtahun  = substr($tahun, 2);
        $kode      = buatkode("trx_loan_application","");
        $invoice   = "".$kode."/INV/".$subtahun."";
                $lamapinjam = $_POST['totalbayarpenajuan'];
                $kodealat  = $_POST['instrument_id_fk'];
                $jumlahalat = $_POST['jumlah'];
                $subtotalpinjam = $_POST['subtotal'];
                $banyak        = count($kodealat);
                for ($i=0; $i < $banyak ; $i++) { 
                    $jumlahalatinstrument = $jumlahalat[$i];
                    $totalFee   = ($subtotalpinjam + $totalFee)*$lamapinjam;
                    $total_loan = $jumlahalatinstrument+$total_loan;
                }
        // simpan data ke table peminjaman & detail peminjaman
        if (isset($_POST['ajukanpeminjaman'])) {        
               
               if (!empty($_FILES) && $_FILES['frm_file']['error'] == 0) {
                          $fileName = $_FILES['frm_file']['name'];
                          $move = move_uploaded_file($_FILES['frm_file']['tmp_name'], 'surat/'.$fileName);
                      $konversitgl_pinjam = jin_date_sql($_POST['tgl_pinjam']);
                       $konversitgl_kembali = jin_date_sql($_POST['tanggal_kembali']);
                  
             if ($move) {

                $queryInsert_loan_app = mysql_query("INSERT INTO trx_loan_application 
                                                        (loan_app_id,loan_invoice,
                                                        loan_date_input,loan_date_start,
                                                        loan_date_return,loan_file,
                                                        loan_total_item,loan_total_fee,
                                                        loan_status,member_id_fk
                                                        ) 
                                          VALUES ('".$kode."','".$invoice."',NOW(),
                                                  '".$konversitgl_pinjam."','".$konversitgl_kembali."',
                                                  '".$fileName."','".$total_loan."','".$totalFee."','MENUNGGU','".$_SESSION['member_id']."')"); 
                          $kodealats  = $_POST['instrument_id_fk'];
                          $jumlahalats = $_POST['jumlah'];
                          $subtotalpinjams = $_POST['subtotal'];
                          $banyaks        = count($kodealats);
                         for ($x=0; $x <  $banyaks ; $x++) { 
                           $kodeInstruments = $kodealats[$x];
                           $jumlahalatinstruments = $jumlahalats[$x];
                           $queryInsertDetail_loan = mysql_query("INSERT INTO trx_loan_application_detail 
                                                                (loan_app_id_fk,instrument_id_fk,loan_amount,loan_subtotal,loan_status_detail)
                                                     VALUES 
                                                     ('".$kode."','".$kodeInstruments."',
                                                     '".$jumlahalatinstruments."','".$subtotalpinjams."','MENUNGGU')");
                         

                                                     
                         }
                            
                        }
                        $queryDeleteLoan_temp = mysql_query("DELETE FROM trx_loan_temp where member_id_fk='".$_SESSION['member_id']."' ");
                        if ($queryDeleteLoan_temp) {
                          echo "<script> alert('Terimakasih Data Berhasil Disimpan & Tunggu Konfirmasi Dari Kami'); location.href='index.php?hal=members/list' </script>";exit;
                        }
                        
                     }
        }
 ?>
<section class="features dim_about" style="background-color:#1ab394;">
    <div class="container" style="padding-top: 18px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1 style="color:white; "><span class="fa fa-shopping-cart fa-3x"></span> 
                LOAN CART INSTRUMENTS - LPB UGM
                 </h1>
            </div>
        </div>
    </div>
</section>
<section  class="container features" style="padding-top: 100px;">
	<div class="row">
		<div class="col-md-12 features-text wow fadeInLeft">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="fa fa-shopping-cart"></span> KERANJANG PEMINJAMAN ALAT</div>
				<div class="panel-body dim_about">
					    <p><label class="btn btn-info dim_about"><span class="fa fa-tags"></span> Kode Peminjaman : #<?php echo $invoice; ?></label>
	                            <a href="index.php?hal=members/peminjaman/pengajuan" class="btn btn-warning btn-sm dim_about"><span class="fa fa-arrow-left"></span> Kembali Ke Instrument</a>
	                         </p><br><br>
					
						<form class="role" method="POST" enctype="multipart/form-data">
              			<input name="idpeminjaman"  type="hidden" value="<?php echo $invoice; ?>">
						<table class="table table-bordered table-responsive table-hover" id="keranjang" >
						<thead>
							<th>NO</th>
		                    <th>NAMA ALAT</th>
		                    <th>JUMLAH</th>
		                    <th><center>BIAYA SEWA</center></th>
		                    <th>SUBTOTAL</th>
		                    <th>AKSI</th>
						</thead>
						<tbody>
							  <?php 
                            $no = 0;
                            $query = mysql_query("SELECT instrument_id_fk, instrument_name, instrument_quantity, instrument_fee, count(instrument_id) AS jumlah FROM ref_instrument LEFT JOIN trx_loan_temp ON ref_instrument.instrument_id=trx_loan_temp.instrument_id_fk WHERE member_id_fk='".$_SESSION['member_id']."' GROUP BY instrument_id_fk");
                                $number = 1;
                            while ($row = mysql_fetch_array($query)) {
                                    $biaya = $row['instrument_fee'];
                                    $jumlah = $row['jumlah'];
                                    $subtotal = $number*$biaya;
                                    $totaljumlah = $totaljumlah+$jumlah;
                                    $totalbayar = $totalbayar+($biaya*$jumlah);
                                    echo "<tr>
                                            <td >".++$no."</td>
                                            <td><input type='hidden' name='instrument_id_fk[]' value='".$row['instrument_id_fk']."' />".$row['instrument_name']."</td>
                                            <td><input type='number' id='jumlah".$no."' onchange='hitung(".$no.")' onkeyup='hitung(".$no.")' value='1' name='jumlah[]' class='txtCal' min='1'   />
                                            <input type='hidden' id='stokTersedia".$no."' value='".$row['instrument_quantity']."'>
                                            </td>
                                            <td>
                                                <input type='hidden' id='biaya".$no."' value='".$row['instrument_fee']."'/>
                                                <label>".$row['instrument_fee']."</label>
                                            </td>
                                            <td>
                                                <input type='hidden' name='subtotal' id='subtotal".$no."' 
                                                    value='".$subtotal."' class='subtotal'/>
                                                <label id='subtotalf".$no."'>".$subtotal."</label>
                                            </td>
                                            <td><a href='index.php?hal=members/peminjaman/keranjang&hapusitem=".$row['instrument_id_fk']."' class='btn btn-sm btn-danger dim_about'><span class='fa fa-trash'></span></a></td>
                                            
                                        </tr>";
                        }
                         ?>
                        
                        
						</tbody>
				</table>
					<hr>
              
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-4 dim_about">
			                        <div class="form-group row">
			                            <label class="col-md-6"><span class="fa fa-calendar"></span> Tanggal Pinjam</label>
			                            <div class="col-md-6">
			                                <input type="text" class="form-control" name="tgl_pinjam" required id="tgl_pinjams">
			                            </div>
			                        </div>
			                         <div class="form-group row">
			                            <label class="col-md-6"><span class="fa fa-calendar"></span> Tanggal Kembali</label>
			                            <div class="col-md-6">
			                                <input type="text" class="form-control" name="tanggal_kembali" required id="tgl_kembalis">
			                            </div>
                                <!--   <input type="text" id="hasilPerhitungan"> -->
			                        </div>
			            </div>
			            <div class="col-md-2"></div>
                    	<div class="col-md-4">
		                    <div class="panel panel-primary">
		                            <div class="panel-heading dim_about">
		                                <div class="form-group">
                                       
		                                    <h2> Jumlah Alat  :<b>   <span id="total_sum_value"><?php echo $totaljumlah; ?></span> </b> Buah</h2><br>
		                                    <h2> Jumlah Bayar : <b id="totalbayar">Rp. <?php echo $totalbayar; ?></b> </h2>
		                                    
		                                </div>
		                                <div class="form-group row">
		                                <label class="control-label col-lg-4">Upload File</label>
		                                    <div class="col-lg-8">
		                                        <div class="fileupload fileupload-new" data-provides="fileupload">
		                                            <div class="input-group">

		                                                    <span class="btn btn-file btn-info">
		                                                        <span class="fileupload-new">Select file</span>
		                                                        <span class="fileupload-exists"><span class="fa fa-refresh"></span> Change</span>

		                                                        <input type="file" name="frm_file" accept="application/pdf" id="ifile" onchange="cekberkas()" />
		                                                    </span>
		                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><span class="fa fa-times"></span> Remove</a>
		                                                <div class="col-lg-12">
		                                                    <br>
		                                                    <i class="fa fa-file fa-2x" ></i>
		                                                    <span class="fileupload-preview" ></span>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                          <p>

	                            <button type="submit" name="ajukanpeminjaman" class="btn btn-primary btn-sm dim_about" id="ibtn_bayar" disabled=""> <span class="fa fa-check"></span> Ajukan Peminjaman</button>
	                            </p>
	                         
	                    </div>
					</div> 

						</form>
           
				</div>
			</div>
		</div>
	</div>
</section>
<script>
    // lamapinjam = 

    function cekberkas() {
    var filesaya = document.getElementById('ifile').value;
    var btn = document.getElementById('ibtn_bayar');
    if (filesaya=='') {
        btn.disabled = true;
    } else {
        btn.disabled = false;
    }
}
function hitung(no) {
        var jumlah  = document.getElementById('jumlah'+no).value;
        var stokTersedia = document.getElementById('stokTersedia'+no).value;
        var biaya   =  $('#biaya'+no).val();
        var subtotal = jumlah*biaya;
        var total = total+subtotal;
        document.getElementById('subtotalf'+no).innerHTML = subtotal;
        $('#subtotal'+no).val(subtotal);
    if (jumlah <= stokTersedia ) {
        var biaya   =  $('#biaya'+no).val();
        var subtotal = jumlah*biaya;
        var total = total+subtotal;
    }else if (jumlah > stokTersedia) {
      alert('MAAF STOK TIDAK TERSEDIA');
      
        $('#jumlah'+no).val("1");
        var biaya   =  $('#biaya'+no).val();
        var subtotal = 1*biaya;
        var total = total+subtotal;
        document.getElementById('subtotalf'+no).innerHTML = subtotal;
        $('#subtotal'+no).val(subtotal);
    
    }
       

}


</script>
