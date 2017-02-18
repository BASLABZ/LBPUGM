 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Profil Pengguna</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Setting</a>
                        </li>
                        <li class="active">
                            <strong>Profil Pengguna</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Informasi Akun</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                               <center> <img alt="image" class="img-responsive" src="../img/user.png" style="width: 200px;"></center>
                            </div>
                            <div class="ibox-content profile-content">
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Activites</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                <div class="col-lg-12 m-b-md">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"><span class="fa fa-edit"></span> Ubah Profil</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><span class="fa fa-gear"></span> Setting Akun</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <strong>Ubah Profil </strong>

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
                                                echo "<center>
                                                <img src='../img/".$_SESSION['member_photo']."' class='img-circle dim_about img-responsive' style='width:100px; height:100px;'>
                                                </center>";
                                              }
                                           ?>
                                           <br>
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
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
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