<?php 
	include '../menejemen/inc/inc-db.php';
	session_start();
	if (isset($_POST['simpanregistrasi'])) {
		   if (!empty($_FILES) && $_FILES['member_photo']['size'] >0 && $_FILES['member_photo']['error'] == 0) {
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
		$member_institution_peneliti = $_POST['member_institution_peneliti'];
		$member_faculty_peneliti = $_POST['member_faculty_peneliti'];
		     $member_photo = $_FILES['member_photo']['name'];
                          $move = move_uploaded_file($_FILES['member_photo']['tmp_name'], '../img/'.$member_photo);
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
												'".$member_hint_question."', '".$member_answer_question."', 'UGM', 'Mahasiswa Kedokteran  S1 UGM', '".$member_email."', '', '".$member_photo."', 'PENDING', 'Y',NOW(),'', '".$category_id_fk."')";
			$register = mysql_query($queryTES);
			

			if ($register) {
				  echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php' </script>";exit;
			}
			
		}elseif ($category_id_fk==2) {
			// mahasiswa 
			// nama institusi & nama fakultas
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
												'".$member_hint_question."', '".$member_answer_question."', '".$member_institution_mahasiswa."', '".$member_faculty_mahasiswa."', '".$member_email."', '', '".$member_photo."', 'PENDING','Y',NOW(),'','".$category_id_fk."')";
                  $register = mysql_query($queryTES);
                  if ($queryTES) {
                  	 echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php' </script>";exit;
                  }
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
												'".$member_hint_question."', '".$member_answer_question."', '".$member_institution_peneliti."', '".$member_faculty_peneliti."', '".$member_email."', '', '".$member_photo."', 'PENDING','Y',NOW(),'','".$category_id_fk."')";
                  $register = mysql_query($queryTES);
                  if ($queryTES) {
                  	 echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php' </script>";exit;
                  }
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
												'".$member_hint_question."', '".$member_answer_question."', '".$member_institution_peneliti."', '".$member_faculty_peneliti."', '".$member_email."', '', '".$member_photo."', 'PENDING','Y',NOW(),'','".$category_id_fk."')";
                  $register = mysql_query($queryTES);
                  if ($queryTES) {
                  	 echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php' </script>";exit;
                  }
			}
		}
	}
 ?>