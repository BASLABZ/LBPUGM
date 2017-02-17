<?php 
	include '../menejemen/inc/inc-db.php';
	session_start();
	if (isset($_POST['simpanregistrasi'])) {
		$member_name 	= $_POST['member_name'];
		$member_email	= $_POST['member_email'];
		$username 		= $_POST['member_username'];
		$password 		= $_POST['member_password'];
		$member_institution_mahasiswa = $_POST['member_institution_mahasiswa'];
		$member_faculty_mahasiswa = $_POST['member_faculty_mahasiswa'];
		$member_institution = $_POST['member_institution'];
		$member_faculty = $_POST['member_faculty'];
		$member_hint_question = $_POST['member_hint_question'];
		$member_answer_question = $_POST['member_answer_question'];
		$member_idcard_photo = $_POST['member_idcard_photo'];
		$category_id_fk = $_POST['category_id_fk'];
		
		if ($category_id_fk==1) {
			// S1 - UGM
			// query insert to tbl member
			$queryTES = "INSERT INTO tbl_member 
												(
														member_name, member_birth_date, member_gender,
														member_phone_number, member_address, member_username,
														member_password, member_hint_question,
														member_answer_question, member_institution,
														member_faculty, member_email, member_idcard_photo,
														member_photo, member_status, member_login,
														member_register_date, member_confirm_date,
														category_id_fk
												) 
										VALUES ('".$member_name."', '', '', '', '', 
												'".$username."', MD5('".$password."'),
												'".$member_hint_question."', '".$member_answer_question."', 'UGM', 'S1 - KEDOKTERAN UGM', '".$member_email."', '', '".$member_photo."', 'AKTIVED', 'Y',NOW(),'', '".$category_id_fk."')";
												var_dump($queryTES);
			
		}elseif ($category_id_fk==2) {
			// mahasiswa 
			// nama institusi & nama fakultas
			var_dump($category_id_fk);
			var_dump($member_institution_mahasiswa);
			var_dump($member_faculty_mahasiswa);
			$queryTES = "INSERT INTO tbl_member 
												(
														member_name, member_birth_date, member_gender,
														member_phone_number, member_address, member_username,
														member_password, member_hint_question,
														member_answer_question, member_institution,
														member_faculty, member_email, member_idcard_photo,
														member_photo, member_status, member_login,
														member_register_date, member_confirm_date,
														category_id_fk
												) 
										VALUES ('".$member_name."', '', '', '', '', 
												'".$username."', MD5('".$password."'),
												'".$member_hint_question."', '".$member_answer_question."', '".$member_institution_mahasiswa."', '".$member_faculty_mahasiswa."', '".$member_email."', '', '".$member_photo."', 'AKTIVED','Y',NOW(),'','".$category_id_fk."')";
												var_dump($queryTES);
		}elseif ($category_id_fk == 3) {
			// peneliti
			// nama instansi & nama bidang
			$queryTES = "INSERT INTO tbl_member 
												(
														member_name, member_birth_date, member_gender,
														member_phone_number, member_address, member_username,
														member_password, member_hint_question,
														member_answer_question, member_institution,
														member_faculty, member_email, member_idcard_photo,
														member_photo, member_status, member_login,
														member_register_date, member_confirm_date,
														category_id_fk
												) 
										VALUES ('".$member_name."', '', '', '', '', 
												'".$username."', MD5('".$password."'),
												'".$member_hint_question."', '".$member_answer_question."', '".$member_institution."', '".$member_faculty."', '".$member_email."', '', '".$member_photo."', 'AKTIVED', 'Y', NOW(), '', '".$category_id_fk."')";
												var_dump($queryTES);
		}elseif ($category_id_fk==4) {
			// umum
			// nama instansi & nama bidang
			$queryTES = "INSERT INTO tbl_member 
												(
														member_name, member_birth_date, member_gender,
														member_phone_number, member_address, member_username,
														member_password, member_hint_question,
														member_answer_question, member_institution,
														member_faculty, member_email, member_idcard_photo,
														member_photo, member_status, member_login,
														member_register_date, member_confirm_date,
														category_id_fk
												) 
										VALUES ('".$member_name."', '', '', '', '', 
												'".$username."', MD5('".$password."'),
												'".$member_hint_question."', '".$member_answer_question."', '".$member_institution."', '".$member_faculty."', '".$member_email."', '', '".$member_photo."', 'AKTIVED', 'Y', NOW(), '', '".$category_id_fk."')";
												var_dump($queryTES);
		}
	}
 ?>