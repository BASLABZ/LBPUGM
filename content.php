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
<<<<<<< HEAD
                    <h2 style="font-size: 28px;">Laboratorium Bioantropologi  <br/>
                        Paleantropologi LBP<br/>
                        Universitas Gajah Mada [LBP-UGM]</h2>
=======
                    <h2 style="font-size: 28px;">Laboratorium Bioantropologi & <br/>
                    Paleoantropologi <br/>
                        Universitas Gadjah Mada [LBP-UGM]</h2>
>>>>>>> d15e8b6ead176c3d5eb34de08855c4b32ebc3634
                        <?php 
                            if (isset($_SESSION['member_name'])) {
                         ?>
                    <?php }else{ ?>
                    <p>
                        <a class="btn btn-lg btn-primary dim_about" href="#" data-toggle="modal" data-target="#registrasi" role="button"><span class="fa fa-user-plus"></span> Daftar</a>
                    </p>
                    <?php } ?>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h2 style="font-size: 28px;">Laboratorium Bioantropologi & <br/>
                        Paleantropologi<br/>
                        Universitas Gadjah Mada [LBP-UGM]</h2>
                         <?php 
                            if (isset($_SESSION['member_name'])) {
                         ?>
                    <?php }else{ ?>
                    <p><a class="btn btn-lg btn-primary dim_about" href="#" data-toggle="modal" data-target="#login" role="button"><span class="fa fa-sign-in"></span> Login</a></p>
                    <?php } ?>
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
                <h1>PROSEDUR PENDAFTARAN MEMBER</h1>
                <p>Berikut Prosedur Pendaftaran Member Lab. Bio-Paleoantropologi UGM </p>
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
                            <div class="col-xs-12">
                            <style type="text/css">
                                    .step-number {
                                        display: inline-block;
                                        margin: 10px 0 0 20px;
                                        padding: 8px 14px;
                                        border-radius: 50%;
                                        color: white;
                                        font-size: 21px;
                                        background-color:#1ab394;
                                    }
                                </style>
                                 <div class="row">
                                     <div class="col-md-2">
                                         <span class="step-number">1</span> 
                                     </div>
                                     <div class="col-md-10">
                                       <h2 style="padding-top: 10px;"> Registrasi </h2>
                                         <p>Silahkan melihat alat-alat pada halaman daftar ketersediaan alat</p>
                                         <a href="#modal_registrasi_member" class="btn btn-xs btn-primary" data-toggle="modal">Info Selengkapnya</a>
                                     </div>
                                 </div>
                                  
                            </div> 
                            <div class="col-xs-12">
                            <span class="vertical-date"> Today <br/> <small>Dec 24</small> </span>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="step-number">2</span> 
                                </div>
                                <div class="col-md-10">
                                    <h2 style="padding-top: 10px">Aktivasi Akun</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                                    <a href="#modal_aktivasi_member" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- prosedur peminjaman  -->
<section class="timeline gray-section" id="prosedur">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>PROSEDUR PEMINJAMAN</P></h1>
                <p>Berikut Prosedur Peminjaman Alat Penelitian Antropometri Pada Lab. Bio-Paleoantropologi UGM </p>
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
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="step-number">1</span> 
                                    </div>
                                    <div class="col-md-10">
                                        <h2 style="padding-top: 10px">Cari Alat</h2>
                                        <p>Sebelum melakukan penyewaan alat, terlebih dahulu Anda diwajibkan melakukan pengajuan pinjaman dengan cara berikut : </p>
                                        <a href="#modal_cari_alat" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                    </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="step-number">2</span> 
                                    </div>
                                    <div class="col-md-10">
                                        <h2 style="padding-top: 10px">Pengajuan Peminjaman Alat</h2>
                                        <p>Review ringkasan peminjaman melalui keranjang peminjaman.</p>
                                        <a href="#modal_pengajuan" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                    </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-file-text"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                           <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="step-number">3</span> 
                                    </div>
                                    <div class="col-md-10">
                                        <h2 style="padding-top: 10px">Konfirmasi Admin</h2>
                                        <p>Admin akan memberikan konfirmasi pengajuan pinjaman melalui notifikasi email</p>
                                        <a href="#modal_konfirm_alat" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                    </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-cogs"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="step-number">4</span> 
                                    </div>
                                    <div class="col-md-10">
                                        <h2 style="padding-top: 10px">Pembayaran</h2>
                                        <p>Pembayaran dapat dilakukan melalui transfer via ATM, setor tunai bank, maupun sms bangking</p>
                                        <a href="#modal_pembayaran" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                    </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-cogs"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="step-number">5</span> 
                                    </div>
                                    <div class="col-md-10">
                                        <h2 style="padding-top: 10px">Pengambilan alat</h2>
                                        <p>Pengambilan alat dilakukan dengan membawa kwitansi yang anda cetak melalui sistem setelah Anda melakukan konfirmasi pembayaran</p>
                                        <a href="#modal_pengambilan" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                    </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-cogs"></i>
                        </div>

                        <div class="vertical-timeline-content dim_about">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <span class="step-number">6</span> 
                                    </div>
                                    <div class="col-md-10">
                                        <h2 style="padding-top: 10px">Pengembalian Alat</h2>
                                        <li>Pengembalian dilakukan sesuai dengan jadwal tanggal kembali pada saat pengajuan</li>
                                        <li>Pengembalian alat yang melebihi tanggal jatuh tempo akan dikenakan denda.</li>
                                        <a href="#modal_pengembalian" class="btn btn-xs btn-primary" data-toggle="modal"> Info Selengkapnya</a>
                                    </div>
                                     <span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
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
            <h1> Profil Laboratorium Bioantropologi dan Paleantropologi<br/><span class="navy"> Universitas Gajah Mada</span> </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <center><div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-user-plus features-icon"></i></div></center>
                
                
                <p align="justify">Laboratorium Bioantropologi dan Paleoantropologi beralamat di di Jl. Medika, Sekip, Yogyakarta 55281, Indonesia. Laboratorium Bioantropologi dan Paleoantropologi dirintis oleh almarhum Prof. Dr. T. Jacob atas dasar semangat membangun identitas bangsa melalui warisan budaya fosil manusia purba dan artefaknya, meliputi bidang antropologi, arkeologi dan geologi. Konstelasi tiga bidang ini berada di Jakarta, Bandung dan Yogyakarta. Antropologi berpusat di Universitas Gadjah Mada di bawah Fakultas Kedokteran. Arkeologi di Jakarta berkembang menjadi pusat Arkeologi Nasional langsung di bawah Kementrian Pendidikan dan Kebudayaan. Bidang Geologi dipusatkan di Institut Teknologi Bandung di Meseum Geologi langsung di bawah Kementrian Riset dan Teknologi.</p>
            </div>
        </div>
        <br/><br/><br/></br>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="img/landing/DSC_0010.jpg" alt="dashboard" class="img-responsive">
        </div>

        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <center id='layanan'>
                    <div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-gear features-icon"></i></div>
                </center>
                
                <p align="justify">Pada 5 Maret 2008, oleh Rektor UGM, Gedung Laboratorium Bioantropologi dan Paleoantropologi diberi nama GEDUNG T.JACOB. Gedung sayap belakang yang dahulunya “dipinjam” oleh Keperawatan, dipakai oleh Bioetika. Ketika istri almarhum Prof. Jacob meninggal dunia, semua buku almarhum disumbangkan ke ruang dimana almarhum dahulu berkantor, dilantai satu. Secara swadaya kami bertahap dalam 3 bulan mengangkut 2000 buku beserta 6 lemari buku milik Dekan dan Rektor. Bidang yang langka dan kering ini (paleoantropologi) tidak mendapat perhatian cukup dari lembaga yang menaunginya. Jumlah ahli paleoantropologi di Indonesia juga hanya kurang dari separoh jari tangan. Cabang antropolgi lain yang menjadi keahlian kami di LBP adalah Antropologi Forensik dan Antropometri. Gedung T. Jacob dipakai untuk praktikum blok 2.3, 2.4 dan 4.2 S1 FK UGM dan kunjungan rutin siswa dari seluruh Indonesia . Selain itu juga kuliah cabang-cabang Ilmu Antropologi bagi mahasiswa Fakultas Ilmu Budaya dan Fakultas Biologi.</p>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <div class="m-t-lg">
                <center><div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-shopping-cart features-icon"></i></div></center>
                
                <p align="justify">Antropologi ragawi di UGM di bawah FK berubah-ubah struktur organisasinya dari seksi, lab, subseksi, lab lagi didalam dan diluar Anatomi. 
                Semasa menjabat menjadi Rektor, Prof. Dr. T. Jacob (almarhum) semua hasil penelitian fosil manusia purba disimpan di rak-rak di Rektorat di Gedung Pusat UGM. Baru pada tahun 1986, Pusat Arkeologi Nasional membangun gedung Laboratorium Bioantropologi dan Paleoantropologi untuk menampung hasil penelitian fosil manusia purba dan artefak serta Museum Paleoantropologi didalamnya, untuk pembelajaran warisan budaya bangsa Indonesia. Rencana Prof. Jacob, Antropologi di UGM Yogyakarta menjadi Pusat Penelitian Paleoantropologi terbesar di Asia Tenggara.
                Pada tahun 1988 selesai dibangun dan disahkan oleh Mendikbud Bp.Fuad Hasan, dan biaya pemeliharaan gedung ditanggung Balai  Arkelologi Yogyakarta sebagai Unit Pelaksana Teknis Daerah Yogyakarta yang menjadi bagian dari Pusat Arkeologi Nasional. Pada 17 Oktober 2007 Prof Jacob wafat. Sebelum wafat, Prof Jacob mengupayakan HIBAH GEDUNG Laboratorium Bioantropologi dan Paleoantropologi ke Universitas Gadjah Mada. Baik bangunan  fisik maupun seluruh isinya dihibahkan oleh Pemerintah Pusat ke Universitas Gadjah Mada. Hibah staf, sarana fisik dan fosil manusia purba asset budaya bangsa termaktub dalam surat Kepala Balai Arkeologi Nomor 769/UM.01/BLR/DKP/VII.07 tertanggal 13 Agustus 2007; hal Mutasi Pegawai dan Hibah Gedung Lab Bioantropologi dan Paleoantropologi di FK UGM. Sesudah hibah, Pusat Arkeologi Nasional tidak lagi membiayai perawatan gedung. Yayasan Bp. Hasim Djojohadikusumo membantu biaya bulanan perawatan gedung. Operasional bulanan kantor diambil dari swadaya dosen, misalnya hasil penjualan buku, tulisan dosen, honor praktikum dan kunjungan siswa ke Museum Paleoantropologi.
                </p>
                <p align="justify">Pada 1 Juli 2008, SK Dekan yang memisahkan Laboratorium Bio dan Paleoantropologi dari Bagian Anatomi, Embriologi dan Antropologi, dengan menimbang bahwa laboratorium telah dikenal sebagai unggulan dalam bidang antropologi ragawi dan memiliki fasilitas pendidikan dan penelitian yang unik di Indonesia. SK Nomor UGM/KU/76/KP/01/39 perihal perubahan status laboratorium Bio dan Paleoantropologi Fakultas Kedokteran Universitas Gadjah Mada secara structural menjadi langsung dibawah Dekan, dan menunjuk Prof. drg Etty Indriati, Ph.D sebagai Kepala Laboratorium. Laporan tahunan keuangan, kegiatan laboratorium dan museum serta kegiatan tridarma dosen di laboratorium kami buat sejak tahun 2008 sampai sekarang dan dilaporkan kepada Dekan Kedokteran, Rektor Universitas Gadjah Mada , serta Yayasan Arsari Djojohadikusumo yang membiayai kebersihan dan perawatan gedung. </p>
            </div>
        </div>
    <!-- <div class="m-t-lg">
        <center><div class="icon"><i style="color:white; padding-top:18px; " class="fa fa-tags features-icon"></i></div></center>
        <h2>Diskon Penyewaan</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
        </div> -->
    </div>
</div>
</section>
<!-- registrasi & login -->

<?php 
        // jika sudah login halaman ini tidak akan tampil 
        if (isset($_SESSION['member_name'])) {?>
        
 <?php }else{ ?>
<section id="daftar" class="navy-section testimonials dim_about" style="background-color:#00CED1;">

    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class=""></i>
                <h1>
                    
                </h1>
                <div class="testimonials-text" style="font-size:20px; ">
                <br/>
                <strong>
                    SELAMAT DATANG DI WEBSITE LAB. BIO- & PALEOANTROPOLOGI <br/>
                    FAKULTAS KEDOKTERAN<br/>
                    UNIVERSITAS GADJAH MADA 
                    </strong>
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
<?php include 'modal-prosedur.php'; ?>

