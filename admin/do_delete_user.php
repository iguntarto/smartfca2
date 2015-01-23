<?php
session_start();
include("connect.php");
if($_SESSION['LEVEL'] == "ADMIN") {
	$get_username 	= $_REQUEST['username_delete'];
//	echo $get_username;
//	exit;
	$query1 = '';	//user_authorization
	$query2 = '';	//user_detail
	$query3 = '';	//user_password

  	$query1 = 'DELETE FROM `user_authorization` WHERE `user_authorization`.`USERNAME` = "'.$get_username.'"';

	$query2 = 'DELETE FROM `user_detail` WHERE `user_detail`.`USERNAME` = "'.$get_username.'"';

	$query3 = 'DELETE FROM `user_password` WHERE `user_password`.`USERNAME` = "'.$get_username.'"';

//		echo $query1;
//		echo $query2;
//		echo $query3;
//		exit;

	$lv_cekquery	= 0;
	$query1			= mysql_query($query1); // Delete to table user_authorization
	$cek_error1		= mysql_errno();
	if($cek_error1 == 0){
		$lv_cekquery = $lv_cekquery + 1;
	} 

	$query2			= mysql_query($query2); // Delete to table user_detail
	$cek_error2		= mysql_errno();
	if($cek_error2 == 0){
		$lv_cekquery = $lv_cekquery + 1;
	} 		

	$query3			= mysql_query($query3); // Delete to table user_password
	$cek_error3		= mysql_errno();
	if($cek_error3 == 0){
		$lv_cekquery = $lv_cekquery + 1;
	} 

//	echo $lv_cekquery;
//	exit;
	
	if($lv_cekquery == 3){
?>
			<script type="text/javascript">
                alert('User telah di hapus');
                window.location = '../dashboard.php?select=5';
            </script>
<?php
	} else {
?>
			<script type="text/javascript">
                alert('User gagal hapus');
                window.location = '../dashboard.php?select=5';
            </script>
<?php
	}
	
} else {
?>
			<script type="text/javascript">
                alert('Harus Login sebagai Administator');
                window.location = '../dashboard.php?select=1';
            </script>
<?php
}
?>