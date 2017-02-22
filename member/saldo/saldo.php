 <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>SALDO</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Home</a>
            </li>
            <li>
                <a>Saldo</a>
            </li>
            <li class="active">
                <strong>Saldo Member</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox">
				<div class="panel panel-primary dim_about">
					<div class="panel-heading">SALDO ANDA</div>
					<div class="panel-body">
					<center>
						 <?php 
			    $querySaldo = mysql_query("SELECT sum(saldo_nominal) as total_saldo FROM tbl_saldo where member_id_fk='".$_SESSION['member_id']."'");
			    $total_saldo = mysql_fetch_array($querySaldo);
			    if ($total_saldo['total_saldo']=='') {
			      echo "Rp.0";
			    }
			    echo "<h1>Rp.".$total_saldo['total_saldo']."</h1>";
			 ?></center>
					</div>
				</div>
            
			</div>
		</div>
		<div class="col-md-8">
			 <div class="col-md-12">
            <div class="ibox">
				<div class="panel panel-primary dim_about">
					<div class="panel-heading">Pengajuan Pencairan Saldo</div>
					<div class="panel-body">
						<form class="role" method="POST" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="col-md-4">NAMA LENGKAP</label>
								<div class="col-md-6">
									<input type="text" class="form-control" value="<?php echo $_SESSION['member_name']; ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4">TOTAL SALDO</label>
								<div class="col-md-6">
									<input type="text" class="form-control" value="<?php echo $total_saldo['total_saldo']; ?>" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4">NOMILNAL SALDO YANG DICAIRKAN</label>
								<div class="col-md-6">
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4">FILE PENGAJUAN</label>
								<div class="col-md-6">
									<input type="file">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4"></label>
								<div class="col-md-6">
									<?php 
											if ($total_saldo['total_saldo'] < 50000) {
												echo "<button type='button' disabled class='btn btn-primary dim_about'>AJUKAN PENCAIRAN</button>";
												echo "<p>Maaf Saldo Anda Tidak Dapat Dicairkan Dikarenakan Nominal Kurang Dari Rp. 50.000,<br> SALDO ANDA SEKARANG SENILAI : <b> Rp. ".$total_saldo['total_saldo']."</b></p>";
											}else{
												echo "<button type='submit' class='btn btn-primary dim_about'>AJUKAN PENCAIRAN</button>";
											}
									 ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

</div>
