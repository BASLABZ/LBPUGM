<!-- slider -->
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="carousel-caption">
                    <h2 style="font-size: 28px;">Laboratorium Bioantropologi <br/>
                        Paleantropologi LBP<br/>
                        Universitas Gajah Mada [LBP-UGM]</h2>
                    <p>
                        <a class="btn btn-lg btn-primary dim_about" href="#" data-toggle="modal" data-target="#registrasi" role="button"><span class="fa fa-user-plus"></span> Daftar</a>
                    </p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h2 style="font-size: 28px;">Laboratorium Bioantropologi <br/>
                        Paleantropologi LBP<br/>
                        Universitas Gajah Mada [LBP-UGM]</h2>
                    <p><a class="btn btn-lg btn-primary dim_about" href="#" data-toggle="modal" data-target="#login" role="button"><span class="fa fa-sign-in"></span> Login</a></p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section class="features dim_about" style="background-color:#1ab394;">
    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 style="color:white; "><span class="fa fa-flask fa-2x"></span><br>Peralatan BIO-PALEONTROPOLOGI</h1>

                <p style="color: white;">Daftar Data Perlatan Laboratorium Bio-Paleontropologi UGM </p>
            </div>
        </div>
    </div>
</section>
<!-- daftar instument -->

<!-- prosedur -->
<section class="timeline gray-section" id="prosedur">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>PROSEDUR LAB. BIO-PELEONTROPOLOGI UGM</h1>
                <p>Berikut Prosedur Penyewaan Peralatan LAB. BIO-PELEONTROPOLOGI UGM </p>
            </div>
        </div>
        <div class="row features-block">

            <div class="col-lg-12">
                <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <h2>Meeting</h2>
                            <p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.
                            </p>
                            <a href="#" class="btn btn-xs btn-primary"> More info</a>
                            <span class="vertical-date"> Today <br/> <small>Dec 24</small> </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <h2>Decision</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                            <a href="#" class="btn btn-xs btn-primary"> More info</a>
                            <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-cogs"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <h2>Implementation</h2>
                            <p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>
                            <a href="#" class="btn btn-xs btn-primary"> More info</a>
                            <span class="vertical-date"> Monday <br/> <small>Jan 02</small> </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div></section>
    <section id="instrumen" class="pricing">
    <div class="container">
        <div class="row">
            <?php $query = mysql_query("SELECT * from ref_instrument  order by instrument_id ASC");
                                        while ($row = mysql_fetch_array($query)) {
                                                $var_gambar     = "menejemen/image/".$row['instrument_picture'];?>

            <div class="col-lg-4  wow fadeInRight" style="margin-top: 50px;" style="width:200px;">
                <ul class="pricing-plan list-unstyled selected dim_about">
                    <li class="pricing-title">
                        <h4><span class="fa fa-flask"></span> <?php echo $row['instrument_name']; ?></h4>
                    </li>
                    <li class="pricing-desc">
                        <img src="<?php echo $var_gambar; ?>" class='img-responsive dim_about' style='width: 268px; height: 179px;'>
                    </li>
                    <li class="pricing-price">
                        <span>Harga : Rp. <?php echo $row['instrument_fee']; ?></span>
                    </li>
                    <li>
                        <span>Merk : <?php echo $row['instrument_brand']; ?></span>
                    </li>
                    <li>
                        <span>Jumlah : <?php echo $row['instrument_quantity']; ?></span>
                    </li>
                    <li>
                        <span class="dim_about">
                            <?php 
                                    $jumlah = $row['instrument_quantity'];
                                    if ($jumlah > 0) {
                                        echo " <a href='#' class='btn btn-warning btn-sm'><span class='fa fa-check'></span> Tersedia</a>";
                                    }else{
                                        echo " <a href='#' class='btn btn-warning btn-sm'><span class='fa fa-times'></span> Tidak Tersedia</a>";
                                    }
                                 ?>
                        </span>
                    </li>
                    <li>
                         <a href='#myModal' class='btn btn-primary btn-xs dim_about' id='custId' data-toggle='modal' data-id="<?php echo $row['instrument_id']; ?>"><span class="fa fa-eye"></span> LIHAT INSTRUMENT</a>
                    </li>

                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
    <section  class="container features" id="layanan">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Laboratorium Bioantropologi dan Paleantropologi LBP<br/> <span class="navy"> Universitas Gajah Mada</span> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <center><div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-user-plus features-icon"></i></div></center>
                
                <h2>Registrasi Member</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
            <div class="m-t-lg">
                <center><div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-shopping-cart features-icon"></i></div></center>
                <h2>Penyewaan</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
        </div>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="img/landing/perspective.png" alt="dashboard" class="img-responsive">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
<center id='layanan'>
    <div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-gear features-icon"></i></div>
</center>
                <h2>Fasilitas LBP - UGM</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
</div>
    <div class="m-t-lg">
        <center><div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-tags features-icon"></i></div></center>
        <h2>Diskon Penyewaan</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
        </div>
    </div>
</div>
</section>
<!-- registrasi & login -->

<?php 
        // jika sudah login halaman ini tidak akan tampil 
        if (isset($_SESSION['member_name'])) {?>
        
 <?php }else{ ?>
<section id="daftar" class="navy-section testimonials dim_about" style="background-color: #00afe9;">

    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-users big-icon"></i>
                <h1>
                    Anggota LBP - UGM
                </h1>
                <div class="testimonials-text" style="font-size:20px; ">
                    <i>"Kami Menyediakan Beragam kelengkapan peralatan <br> BIO-paleontropologi guna penelitian maupun pengembangan dengan prosedur penyewaan yang mudah."</i>

                </div>
                <small>
                    <strong style="font-size: 30px;">LBP - UGM</strong>
                </small>
                <h2>
                    <center>
                        <a href="#" data-toggle="modal" data-target="#login" class="btn btn-primary dim_about"><span class="fa fa-sign-in"></span> LOGIN</a>
                        <a href="#" data-toggle="modal" data-target="#registrasi" class="btn btn-primary dim_about"><span class="fa fa-user-plus"></span> DAFTAR</a>
                    </center>
                </h2>
            </div>
        </div>

    </div>
</section>
 <?php } ?>
<!-- contact LBP UGM -->
<?php //include 'registrasi.php'; ?>

