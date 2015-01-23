<?php
session_start();
include('connect.php');

if(isset($_POST['action']) && $_POST['action'] == 'submit_user'){
	$edit_mode 				= strip_tags(htmlentities($_POST['edit_mode']));
	$username 				= strip_tags(htmlentities($_POST['username']));
	$password1 				= strip_tags(htmlentities($_POST['password1']));
	$password2 				= strip_tags(htmlentities($_POST['password2']));
	
	$lv_md5 		= strip_tags(htmlentities(md5(md5(md5($_POST['password1']))))); // Get the password and decrypt it
	$lv_md5s1 		= substr($lv_md5, 0, 5);
	$lv_md5s2 		= substr($lv_md5, 11, 5);
	$lv_md5s3 		= substr($lv_md5, 26, 5);
	$password		= $lv_md5s1.$lv_md5s2.$lv_md5s3;
	$change_password		= strip_tags(htmlentities($_POST['change_password']));
	
	$nama_depan 			= strip_tags(htmlentities($_POST['nama_depan']));
	$nama_belakang 			= strip_tags(htmlentities($_POST['nama_belakang']));
	$level_user				= strip_tags(htmlentities($_POST['level']));
	$get_area				= strip_tags(htmlentities($_POST['area']));
		
	$query_text1 = '';	//user_authorization
	$query_text2 = '';	//user_detail
	$query_text3 = '';	//user_password

	if($edit_mode == 0) {
		  $query_text1 = 'INSERT INTO `user_authorization` 
		  				(`USERNAME`, `LEVEL`, `AREA`) 
					VALUES 
						("'.$username.'", "'.$level_user.'", "'.$get_area.'")';
//		echo $query1;
//		exit;
		  $query_text2 = 'INSERT INTO `user_detail` 
		  				(`USERNAME`, `NAMA_DEPAN`, `NAMA_BELAKANG`, `AREA`) 
					VALUES 
						("'.$username.'", "'.$nama_depan.'", "'.$nama_belakang.'", "'.$get_area.'")';
//		echo $query2;
//		exit;			
		  $query_text3 = 'INSERT INTO `user_password` 
		  				(`USERNAME`, `PASSWORD`) 
					VALUES 
						("'.$username.'", "'.$password.'")';
//		echo $query3;
//		exit;	
		
	} else if ($edit_mode == 1){
		if($change_password == 0){
			$query_text1	= 	"
							UPDATE `user_authorization`
							SET
								LEVEL	= '".$level_user."', 
								AREA	= '".$get_area."'
							WHERE 	
								`USERNAME` 	= '".$username."'
							";
			$query_text2	= 	"
							UPDATE `user_detail`
							SET
								NAMA_DEPAN		= '".$nama_depan."', 
								NAMA_BELAKANG	= '".$nama_belakang."', 
								AREA			= '".$get_area."'
							WHERE 	
								`USERNAME` 	= '".$username."'
							";
		
		} else if ($change_password == 1){
			$query_text1	= 	"
							UPDATE `user_authorization`
							SET
								LEVEL	= '".$level_user."', 
								AREA	= '".$get_area."'
							WHERE 	
								`USERNAME` 	= '".$username."'
							";
			$query_text2	= 	"
							UPDATE `user_detail`
							SET
								NAMA_DEPAN		= '".$nama_depan."', 
								NAMA_BELAKANG	= '".$nama_belakang."', 
								AREA			= '".$get_area."'
							WHERE 	
								`USERNAME` 	= '".$username."'
							";
			$query_text3	= 	"
							UPDATE `user_password`
							SET
								PASSWORD	= '".$password."'
							WHERE 	
								`USERNAME` 	= '".$username."'
							";
		
		}
	//	  //UPDATE `trx_number` SET `CURRENT_DOC_NUMB` = '1000000001' WHERE `trx_number`.`YEAR` = '2014';
	}
	
		//echo $query_text1;
		//echo $query_text2;
		//echo $query_text3;
		//exit;	
	
	$lv_cekquery	= 0;
	$query1			= mysql_query($query_text1); // Insert to table user_authorization
	$cek_error1		= mysql_errno();
	if($cek_error1 == 0){
		$lv_cekquery = $lv_cekquery + 1;
	} else {
		echo 1;
		exit;
	}

	$query2			= mysql_query($query_text2); // Insert to table user_detail
	$cek_error2		= mysql_errno();
	if($cek_error2 == 0){
		$lv_cekquery = $lv_cekquery + 1;
	} else {
		echo 2;
		exit;
	}		

	if(($edit_mode == 0) || ($edit_mode == 1 && $change_password == 1)){
		$query3			= mysql_query($query_text3); // Insert to table user_password
		$cek_error3		= mysql_errno();
		if($cek_error3 == 0){
			$lv_cekquery = $lv_cekquery + 1;
		} else {
			echo 3;
			exit;
		}
	}
			
	if(($edit_mode == 0) || ($edit_mode == 1 && $change_password == 1)){
		if ($lv_cekquery == 3){
			echo 0;
		}
	
	} else {
		if ($lv_cekquery == 2){
			echo 0;
		}

		
	}
}

?>