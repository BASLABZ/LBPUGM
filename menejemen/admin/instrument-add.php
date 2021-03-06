﻿<?php
include '../inc/inc-db.php';
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>ALAT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES --> 

    <!-- PAGE LEVEL STYLES -->
    
 <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
   
    <!-- END PAGE LEVEL  STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

       <!-- MAIN WRAPPER -->
    <div id="wrap">

          <!-- HEADER SECTION -->
        <div id="top">
            <?php
                include "../inc/inc-top-menu.php";
            ?>     
        </div>
        <!-- END HEADER SECTION -->


        <!-- MENU SECTION -->
       <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"><?php echo $_SESSION['userName'];?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />   
                    </div>
                        <!-- KONEKSI MENU DINAMIS -->
                         <ul id="menu" class="collapse">
                            <?php 
                             include '../inc/inc-menu.php';
                             ?> 
                     </ul>
           
                    </div>
        <!--END MENU SECTION -->

       <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                     <center>
                        <h4 style="line-height:1.5em">
                            <?php
                                echo "Laboratorium Bioantropologi dan Paleantropologi </br>
                                    Fakultas Kedokteran </br>
                                    Universitas Gadjah Mada";
                                 echo "</br>";
                            ?>
                        </h4>
                    </center>
                </div>
            </div>


<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <h5>Tambah Data Alat</h5>
                <div class="toolbar">   
                </div>
        </header>

        <!-- DIV UNTUK OPERATOR ADD -->
        <div id="div-1" class="accordion-body collapse in body">
            <form action="instrument-add-save.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                
                
                <div class="form-group"> 
                    <label class="control-label col-lg-2">Nama Alat</label>

                    <div class="col-lg-8">
                        <input type="text" placeholder="Nama Alat" class="form-control" name="frm_nama" required />
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="control-label col-lg-2">Merk</label>

                    <div class="col-lg-8">
                        <input type="text" placeholder="Merk" class="form-control" name="frm_merk" required />
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="control-label col-lg-2">Jumlah</label>

                    <div class="col-lg-8">
                        <input type="text" placeholder="Jumlah" class="form-control" name="frm_jumlah" required />
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="control-label col-lg-2">Biaya Sewa</label>

                    <div class="col-lg-8 col-md-offset">
                        <div class="form-group input-group">
                            <span class="input-group-addon">Rp</span>
                                <input type="text" placeholder="Biaya Sewa" class="form-control" name="frm_harga"/>
                        </div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="control-label col-lg-2">Panjang Alat</label>

                    <div class="col-lg-3">
                        <input type="text" placeholder="Panjang Alat" class="form-control" name="frm_panjang" required />
                    </div>

                    <label class="control-label col-lg-2">Berat Alat</label>

                    <div class="col-lg-3">
                        <input type="text" placeholder="Berat Alat" class="form-control" name="frm_berat" required />
                    </div>
                </div>
                <div class="form-group"> 
                    
                </div>
                <div class="form-group"> 
                    <label class="control-label col-lg-2">Deskripsi</label>

                    <div class="col-lg-8">
                        <textarea class="form-control" rows=4 name="frm_spek" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-lg-2">Upload Gambar</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-file btn-info">
                                        <span class="fileupload-new">Pilih Gambar
                                        </span>
                                        <span class="fileupload-exists">Change
                                        </span>
                                        <input type="file" name="frm_picture" />
                                    </span>
                                    
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>


                                
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" name="btn_simpan" class="btn btn-success" value="Simpan" align="right">
                    </div>    
            </form>
                        
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

<!-- END COLOR PICKER -->


                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- END TIME PICKER -->




                    
                    </div>
                    
                    
                  </div>  
        <!-- END PAGE CONTENT -->

                </div>
        
    
       <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->


      <!-- PAGE LEVEL SCRIPT-->
 <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/js/bootstrap-fileupload.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
        
     <!--END PAGE LEVEL SCRIPT-->
     
</body>
     <!-- END BODY -->
</html>
