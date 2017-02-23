<?php 

		include '../../inc/inc-db.php';
		session_start();
		$member_id = $_POST['id'];
		$query = mysql_query("SELECT * FROM tbl_member m JOIN ref_category c ON m.category_id_fk = c.category_id where member_id = '".$member_id."'");
		$rowMember = mysql_fetch_array($query);
 ?>


	<div class="form-group row">
		
		<div class="col-md-12 text-center">
			<img src="../../members/image/testimonial-icon1.png" class="img-circle dim_about">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Nama Lengkap</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_name']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Instansi</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_institution']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Fakultas</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_faculty']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Tanggal Lahir</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo jin_date_str($rowMember['member_birth_date']); ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Gender</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_gender']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">No. Telp</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_phone_number']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Alamat</label>
		<div class="col-md-8">
			<textarea class="form-control" disabled placeholder="Alamat"><?php echo $rowMember['member_address']; ?></textarea> 
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">Email</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_email']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">ID CARD</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_idcard_photo']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">STATUS MEMBER</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['member_status']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-4">KATEGORI MEMBER</label>
		<div class="col-md-8">
			<input type="text" class="form-control" value="<?php echo $rowMember['category_name']; ?>" disabled>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-md-12">
			<form class="role" method="POST" action="index.php?hal=member/proses_ubahstatus">
				<div class="col-md-6">
					<input type="hidden" name="idmember" value="<?php echo $rowMember['member_id']; ?>">
					<button type="submit" name="ubahstatustolak" class="btn btn-warning dim_about"> <span class="fa fa-check"></span> Konfirmasi Penolakan</button>
				</div>
				<div class="col-md-6">
					<button type="submit" name="ubahstatusterima" class="btn btn-info dim_about"> <span class="fa fa-check"></span> Konfirmasi Penerimaan</button>
				</div>
			</form>
		</div>
	</div>



