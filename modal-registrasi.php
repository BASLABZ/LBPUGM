<?php 
    if (isset($_POST['simpanregistrasi'])) {
      
      $tanggallahir = jin_date_sql($_POST['member_birth_date']);
      $member_institution = $_POST['member_institution'];
      $member_faculty = $_POST['member_faculty'];
      
      if ($member_institution ='' && $member_faculty='') {
      $querySimpan = "INSERT INTO tbl_member (
                                          member_name,member_birth_date,member_gender,
                                          member_phone_number,member_address,member_username,
                                          member_password,member_hint_question,member_answer_question,
                                          member_institution,member_faculty,member_email,
                                          member_idcard_photo,member_photo,member_status,
                                          member_login,member_register_date,
                                          member_confirm_date,category_id_fk
                                         ) 
                                VALUES (
                                    '".$_POST['member_name']."','".$tanggallahir."','".$_POST['member_gender']."','".$_POST['member_phone_number']."','".$_POST['member_address']."','".$_POST['member_username']."',md5('".$_POST['member_password']."'),'".$_POST['member_hint_question']."','".$_POST['member_answer_question']."','UGM','S1 KEDOKTERAN UGM','".$_POST['member_email']."','".$_POST['member_idcard_photo']."','','PENDING','N',NOW(),'','".$_POST['category_id_fk']."')";  
                                     if ($querySimpan) {
                         echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php' </script>";exit;
                   }else{
                         echo "<script> alert(' Data Gagal Disimpan'); location.href='index.php' </script>";exit;
                   }
       
      }else if ($member_institution !='' && $member_faculty !=''){
      $querySimpana = mysql_query("INSERT INTO tbl_member (
                                          member_name,member_birth_date,member_gender,
                                          member_phone_number,member_address,member_username,
                                          member_password,member_hint_question,member_answer_question,
                                          member_institution,member_faculty,member_email,
                                          member_idcard_photo,member_photo,member_status,
                                          member_login,member_register_date,
                                          member_confirm_date,category_id_fk
                                         ) 
                                VALUES (
                                    '".$_POST['member_name']."','".$tanggallahir."','".$_POST['member_gender']."','".$_POST['member_phone_number']."','".$_POST['member_address']."','".$_POST['member_username']."',md5('".$_POST['member_password']."'),'".$_POST['member_hint_question']."','".$_POST['member_answer_question']."','".$_POST['member_institution']."','".$_POST['member_faculty']."','".$_POST['member_email']."','".$_POST['member_idcard_photo']."','','PENDING','N',NOW(),'','".$_POST['category_id_fk']."')");  
        if ($querySimpana) {
                         echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php' </script>";exit;
                   }else{
                         echo "<script> alert(' Data Gagal Disimpan'); location.href='index.php' </script>";exit;
                   }
      }
      
      
                   
    }
 ?>
<div id="registrasi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"  style="background-color: #1ab394;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:white;"><span class="fa fa-user-plus"></span> REGISTRASI SISTEM LBP - UGM</h4>
      </div>
      <div class="modal-body">
      
          <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-education"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" id="formregis">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>IDENTITAS MEMBER</h3>
                        <hr>
                         <div class="form-group row">
                          <label class="col-md-2">NAMA LENGKAP</label>
                          <div class="col-md-6">
                            <input id="nameFull" type="text" class="form-control" name="member_name" required value="">
                          </div>
                        </div> 
                        <div class="form-group row">
                          <label class="col-md-2">GENDER</label>
                          <div class="col-md-6">
                            <select class="form-control" name="member_gender" reqiured>
                              <option value="Laki-laki">LAKI - LAKI</option>
                              <option value="Perempuan">PEREMPUAN</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">TANGGAL LAHIR</label>
                          <div class="col-md-3"><input type="text" name="member_birth_date" class="form-control datepicker" reqiured></div>
                        </div>
                         <div class="form-group row">
                          <label class="col-md-2">ALAMAT</label>
                          <div class="col-md-6">
                            <textarea class="form-control" name="member_address" placeholder="ALAMAT MEMBER" reqiured></textarea>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label class="col-md-2">NO TELP</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="NO TELP." name="member_phone_number" reqiured>
                          </div>
                        </div>
                         
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step dim_about">SELANJUTNYA <span class="fa fa-arrow-right"></span></button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>AKUN</h3>
                        <hr>
                         <div class="form-group row">
                          <label class="col-md-2">USERNAME</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_username" placeholder="USERNAME" reqiured>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">PASSWORD</label>
                          <div class="col-md-6">
                            <input type="password" class="form-control" name="member_password" placeholder="PASSWORD" reqiured>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">EMAIL</label>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="member_email" placeholder="EMAIL" reqiured>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">Hint Questions</label>
                          <div class="col-md-6">
                            <select class="form-control" name="member_hint_question" reqiured>
                              <option value="NULL">Pilih Pertanyaan</option>
                              <option value="Dimana Kota Anda Dilahirkan ?">Dimana Kota Anda Dilahirkan ?</option>
                              <option value="Siapakah Nama Ayah Kandung Anda ?"> Siapakah Nama Ayah Kandung Anda ?</option>
                              <option value="Siapa Penyanyi Favorit Anda ?">Siapa Penyanyi Favorit Anda?</option>
                              <option value="Apa Makanan Favorit Anda ?">Apa Makanan Favorit Anda ?</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">Hint Answers</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_answer_question" placeholder="Hint Answers" reqiured>
                          </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary prev-step dim_about"><span class="fa fa-arrow-left"></span> KEMBALI</button></li>
                            <li><button type="button" class="btn btn-primary next-step dim_about">SELANJUTNYA <span class="fa fa-arrow-right"></span></button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>INSTITUSI</h3>
                        <hr>
                        <div class="row">
                          <div class="form-group row">
                          <label class="col-md-2">KATEGORI</label>
                         <div class="col-md-4">
                            <select class="form-control" name="category_id_fk" id="cat_id" reqiured>
                              <?php 
                                  $queryKategori  = mysql_query("SELECT * FROM ref_category order by category_id");
                                  while ($rowCategory = mysql_fetch_array($queryKategori)) {
                                    echo "<option value='".$rowCategory['category_id']."'>".$rowCategory['category_name']."</option>";
                                  }
                               ?>
                            </select>
                         </div>
                        </div>
                        </div>
                        <div class="row" id="kat1" style="display: none;">
                           <div class="form-group row">
                          <label class="col-md-2">NAMA INSTITUSI</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_institution" placeholder="NAMA INSTITUSI" name="intitusi" reqiured>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">FAKULTAS</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_faculty" placeholder="FAKULTAS" name="fakultas" reqiured>
                          </div>
                        </div>
                        </div>
                        <div class="row" id="kat2" style="display: none;">
                          <div class="form-group row">
                          <label class="col-md-2">NAMA INSTITUSI</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_institution" placeholder="NAMA INSTITUSI" name="intitusi" reqiured>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">BIDANG</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_faculty" placeholder="BIDANG" name="fakultas" reqiured>
                          </div>
                        </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-2">ID CARD</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="member_idcard_photo" placeholder="ID CARD / KTM" reqiured>
                          </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary prev-step dim_about"><span class="fa fa-arrow-left"></span> KEMBALI</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-ful dim_aboutl next-step">SELANJUTNYA <span class="fa fa-arrow-right"></span></button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <center>
                        <div class="form-group row">
                          <div class="col-md-2"><input type="checkbox" class="form-control" required></div>
                          <div class="col-md-10">
                            <p>
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                          </div>
                        </div>
                       <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary prev-step dim_about"><span class="fa fa-arrow-left"></span> KEMBALI</button></li>
                            <li><button type="submit" name="simpanregistrasi" class="btn btn-primary btn-info-ful dim_aboutl next-step">SIMPAN <span class="fa fa-arrow-right"></span></button></li>
                        </ul>
                        </center>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger dim_about" data-dismiss="modal"><span class="fa fa-times"></span> TUTUP</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
    $('.datepicker').datepicker({autoclose:true});
    $('#cat_id').on('change',function () {
      if(this.value == "1") {

          $('#kat1').hide();
          $('#kat2').hide();
        }else if (this.value == "2") {
          $('#kat1').show();
          $('#kat2').hide();
        }else if (this.value == "3") {
          $('#kat2').show();
          $('#kat1').hide();
        }else if (this.value == "4") {
          $('#kat2').show();
          $('#kat1').hide();
        }  
    })
      $(document).ready(function () {
      var namaLengkap = document.getElementById('nameFull');
    $('.nav-tabs > li a[title]').tooltip();
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });
    $(".next-step").click(function (e) {
          
          var $active = $('.wizard .nav-tabs li.active');
          $active.next().removeClass('disabled');
          nextTab($active);
    });
    $(".prev-step").click(function (e) {
        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
    });
});
function nextTab(elem) {

    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

</script>