<?php
session_start();
include('connect.php');
if(isset($_POST['action']) && $_POST['action'] == 'login'){
 	$username 		= strip_tags(htmlentities($_POST['username'])); // Get the username
	$lv_md5 		= strip_tags(htmlentities(md5(md5(md5($_POST['password']))))); // Get the password and decrypt it
	$lv_md5s1 		= substr($lv_md5, 0, 5);
	$lv_md5s2 		= substr($lv_md5, 11, 5);
	$lv_md5s3 		= substr($lv_md5, 26, 5);
	$password		= $lv_md5s1.$lv_md5s2.$lv_md5s3;
	$query			= mysql_query('
					 SELECT user_password.username, 
					 		user_detail.nama_depan, 
							user_detail.nama_belakang, 
							user_detail.departemen, 
							user_authorization.level,
							user_authorization.area
					   FROM user_password join user_detail join user_authorization 
					     ON user_detail.username = user_password.username 
						AND user_authorization.username = user_password.username 
					  WHERE user_password.username = "'.$username.'" and user_password.password = "'.$password.'"'
					  ); // Check the table with posted credentials
	$num_rows		= mysql_num_rows($query); // Get the number of rows
	
	if($num_rows <= 0){ // If no users exist with posted credentials print 0 like below.
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		// NOTE : We have already started the session in the library.php
		$_SESSION['USERNAME'] 		= $fetch['username'];
		$_SESSION['NAMA_DEPAN'] 	= $fetch['nama_depan'];
		$_SESSION['NAMA_BELAKANG'] 	= $fetch['nama_belakang'];
		$_SESSION['DEPARTEMEN'] 	= $fetch['departemen'];
		$_SESSION['LEVEL'] 			= $fetch['level'];
		$_SESSION['AREA'] 			= $fetch['area'];
//		$_SESSION['TIMEOUT']		= time()
		$lv_random = rand( 000000, 999999 );
		$lv_tmstmp = date_time_set();
		$logincek = "SELECT *
					 FROM user_login
					 WHERE username'".$fetch['username']."'";
		$logincekquery = mysql_query($logincek);
		$loginceknumrow = mysql_num_rows($logincekquery) ;
		
		if($loginceknumrow <= 0){
			$loglogin = "INSERT 
						 INTO user_login (`username`, `guid_login`, `time_stamp`) 
						 VALUES ('".$fetch['username']."', '".$lv_random."', '".$lv_tmstmp."')";
			echo $loglogin;
//			$logloginquery = mysql_query($loglogin);
//			$logloginerror = mysql_errno();
//			if($logloginerror == 0){
//				echo 1;
//			}
		}
		
	} 
}

?>