<?php 
    session_start();
    include '../menejemen/inc/inc-db.php';
    if (isset($_GET['logout'])) {
        session_destroy();
        echo "<script> alert('Anda Berhasil Keluar Aplikasi'); location.href='../index.php' </script>";exit;}
    if ($_SESSION['member_id']&&$_SESSION['member_name']) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MEMBER AREA | LBPUGM</title>
    <link href="../includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="../includes/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../includes/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="../includes/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="../includes/css/animate.css" rel="stylesheet">
    <link href="../includes/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../menejemen/admin/assets/css/bootstrap-fileupload.min.css" /> 
    <style type="text/css">
        .dim_about {box-shadow: inset 0 0 0 rgba(30, 172, 174, 0.39), 0 10px 0 0 rgba(30, 172, 174, 0), 0 8px 10px rgba(123, 83, 83, 0.58);}
    </style>
</head>
<body class="md-skin">
    <div id="wrapper">
      <?php include 'sidebar-memberarea.php'; ?>

        
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php include 'topmenu-memberarea.php'; ?>
        <!-- main members -->
        <?php 
            if(empty( $_GET['hal']) ||  $_GET['hal'] ==""){
                $_GET['hal'] = "content-memberarea.php";
              }
              if(file_exists( $_GET['hal'].".php")){
                include  $_GET['hal'].".php";
              }else {
                include"content-memberarea.php";
              }
         ?>
    </div>
    <script src="../includes/js/jquery-2.1.1.js"></script>
    <script src="../includes/js/bootstrap.min.js"></script>
    <script src="../includes/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../includes/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../includes/js/plugins/flot/jquery.flot.js"></script>
    <script src="../includes/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../includes/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../includes/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../includes/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="../includes/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../includes/js/demo/peity-demo.js"></script>
    <script src="../includes/js/inspinia.js"></script>
    <script src="../includes/js/plugins/pace/pace.min.js"></script>
    <script src="../includes/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../includes/js/plugins/gritter/jquery.gritter.min.js"></script>
    <script src="../includes/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../includes/js/demo/sparkline-demo.js"></script>
    <script src="../includes/js/plugins/toastr/toastr.min.js"></script>
    <script src="../menejemen/admin/assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <!-- modal load data detail instrument -->
    <div class="modal fade" id="myModal" role="dialog" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1ab394; color:white;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="fa fa-flask"></span> Detail Instrument</h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> Keluar</button>
                    </div>
                </div>
            </div>
    </div>
   <script type="text/javascript">
       $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail_instrument.php',
                data :  'id='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
    // keranjang belanja
     $(document).ready(function(){
        $("#keranjang").on('input', '.txtCal', function () {

               var calculated_total_sum = 0;
               $("#keranjang .txtCal").each(function () {
                   var get_textbox_value = $(this).val();
                   if ($.isNumeric(get_textbox_value)) {
                      calculated_total_sum += parseFloat(get_textbox_value);
                      }                  
                    });
                      $("#total_sum_value").html(calculated_total_sum);
               });
});
     $("#keranjang").on('input', '.txtCal', function () {
       var calculated_total_sum = 0;
       
       $("#keranjang .txtCal").each(function () {
           var get_textbox_value = $(this).val();
           if ($.isNumeric(get_textbox_value)) {
              calculated_total_sum += parseFloat(get_textbox_value);
              }                  
            });
              $("#total_sum_value").html(calculated_total_sum);
       });   
   </script>

</body>
</html>
<?php }else{
    include 'error404.php';
    } ?>

