<?php 
   // simpan data ke table peminjaman & detail peminjaman 
    $tahun      = date('Y');
    $subtahun   = substr($tahun, 2);
    $kode       = buatkode("trx_loan_application","");
    $invoice    = "".$kode."/INV/".$subtahun."";      
    $total_loan = $_POST['totaljumlahSEMUAITEM'];
    $totalFee   = $_POST['totalpenyewaanBayar'];
   
      $konversitgl_pinjam = jin_date_sql($_POST['tgl_pinjam']);
      $konversitgl_kembali = jin_date_sql($_POST['tanggal_kembali']);

   if (!empty($_FILES) && $_FILES['frm_file']['error'] == 0) {
              $fileName = $_FILES['frm_file']['name'];
              $move = move_uploaded_file($_FILES['frm_file']['tmp_name'], '../surat/'.$fileName);
              $konversitgl_pinjam = jin_date_sql($_POST['tgl_pinjam']);
              $konversitgl_kembali = jin_date_sql($_POST['tanggal_kembali']);
            if ($move) {
                 // insert to table trx_loan_application
                 $queryInsert_loan_app = "INSERT INTO trx_loan_application 
                                            (loan_app_id,loan_invoice,
                                            loan_date_input,loan_date_start,
                                            loan_date_return,loan_file,
                                            loan_total_item,loan_total_fee,
                                            long_loan,
                                            loan_status,member_id_fk
                                            ) 
                              VALUES ('".$kode."','".$invoice."',NOW(),CAST('". $konversitgl_pinjam ."' AS DATEs),CAST('". $konversitgl_kembali ."' AS DATEs),
                                      '".$fileName."','".$total_loan."','".$totalFee."','".$_POST['totalbayarpenajuan']."','MENUNGGU','".$_SESSION['member_id']."')";

                  print_r($queryInsert_loan_app); 
                  die();
                  $runSQLINSERT = mysql_query($queryInsert_loan_app);
                  // insert to trx_loan_application_detail
                  $kodealats  = $_POST['instrument_id_fk'];
                  $jumlahalats = $_POST['jumlah'];
                  $subtotalpinjams = $_POST['subtotal'];
                  $banyaks        = count($kodealats);
                 for ($ulang=0; $ulang <  $banyaks ; $ulang++) { 
                   $kodeInstruments = $kodealats[$ulang];
                   $jumlahalatinstruments = $jumlahalats[$ulang];
                   $queryInsertDetail_loan = "INSERT INTO trx_loan_application_detail 
                                                        (loan_app_id_fk,instrument_id_fk,loan_amount,loan_subtotal,loan_status_detail)
                                             VALUES 
                                             ('".$kode."','".$kodeInstruments."',
                                             '".$jumlahalatinstruments."','".$subtotalpinjams."','MENUNGGU')";
                                             $runSQLINSERT_detail = mysql_query($queryInsertDetail_loan);
                  
                 }


                   
            }

   }
     $queryDeleteLoan_temp = "DELETE FROM trx_loan_temp where member_id_fk='".$_SESSION['member_id']."' ";
     $runSQLDELETE = mysql_query($queryDeleteLoan_temp);
    // if ($runSQLDELETE) {
    //   echo "<script> alert('Terimakasih Data Berhasil Disimpan & Tunggu Konfirmasi Dari Kami'); location.href='index.php?hal=member/index' </script>";exit;
    // }
        

 ?>