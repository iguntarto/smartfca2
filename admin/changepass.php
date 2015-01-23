<?php
include('connect.php');

	if( isset($_POST['uid'])  && isset($_POST['action']) && $_POST['action'] == 'changepass' && isset($_POST['npass']) && isset($_POST['rpass']) && ($_POST['npass'] == $_POST['rpass']) ){
		
		$lv_md5 		= strip_tags(htmlentities(md5(md5(md5($_POST['npass']))))); // Get the password and decrypt it
		$lv_md5s1 		= substr($lv_md5, 0, 5);
		$lv_md5s2 		= substr($lv_md5, 11, 5);
		$lv_md5s3 		= substr($lv_md5, 26, 5);
		$password		= $lv_md5s1.$lv_md5s2.$lv_md5s3;
		$username 		= $_POST['uid'];
		$query			= mysql_query("UPDATE smart_fca.user_password SET password = '".$password."' WHERE user_password.USERNAME = '".$username."'"); // Check the table with posted credentials
		if(!$query){
			die('<div class="alert alert-danger" role="alert">Error when changing password</div>' . mysql_error());
		}
		echo '<div class="alert alert-success" role="alert">Change password success</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert">Error when changing password</div>';
	}

?>