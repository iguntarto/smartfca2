<?php
session_start();
include("connect.php");
$history_docnum 	= $_REQUEST['docnum'];
$history_year 		= $_REQUEST['year'];
$history_month 		= $_REQUEST['month'];
$history_user		= $_SESSION['USERNAME'];
$history_level		= $_SESSION['LEVEL'];
//$history_start_at   = $_SESSION['TIME_NON'];
$history_finish_at  = date("Y-m-d H:i:s");
$history_area		= $_SESSION['AREA'];
$history_area  		= str_replace(",","', '",$history_area);
$history_approval	= '';
if(isset($_REQUEST['no_spb'])){
	$approval_no_spb = $_REQUEST['no_spb'];
////	echo 'Masuk ke isset no SPB';
//	echo $approval_no_spb.'<br>';
//	echo $history_docnum.'<br>';
//	echo $history_year.'<br>';
//	echo $history_month.'<br>';
//	echo $history_user.'<br>';
//	echo $history_level.'<br>';
//	echo $history_finish_at.'<br>';
//	echo $history_area.'<br>';
//	echo $history_approval.'<br>';
} else {
//	echo 'isset no SPB ga di set';
//	echo '----------------------';
//	echo $_REQUEST['no_spb'];
	$approval_no_spb = '';	
}
//exit;
//	Mencari apakah document telah di approve oleh sesama manager
//$get_ready_appv  	= "SELECT * FROM TRX_HISTORY
//						WHERE `DOC_NUMBER` 		= '".$history_docnum."'
//						  AND `YEAR`	 		= '".$history_year."'
//						  AND `MONTH`	 		= '".$history_month."'
//						  AND `AREA`	 		= '".$history_area."'
//						  AND `LEVEL`			= '".$history_level."'
//					   ORDER BY LOG_NUMBER DESC
//					  ";
$get_ready_appv		="
					SELECT 
						A.DOC_NUMBER, 
						A.YEAR, 
						A.MONTH, 
						A.USER, 
						A.LEVEL, 
						A.AREA, 
						B.NAMA_DEPAN, 
						B.DEPARTEMEN 
					FROM `trx_history` as A 
					JOIN `user_detail` as B 
					ON B.USERNAME = A.USER 
					WHERE A.DOC_NUMBER 	= '".$history_docnum."' 
					  AND A.YEAR 		= '".$history_year."' 
					  AND A.MONTH 		= '".$history_month."' 
					  AND A.AREA	 	IN ( '".$history_area."' )
					  AND A.LEVEL 		= '".$history_level."'
					 ";
//echo $get_ready_appv;
$query_ready_appv	= mysql_query($get_ready_appv);
$num_row_ready_appv	= mysql_num_rows($query_ready_appv);
//echo $num_row_ready_appv;
if($num_row_ready_appv > 0){ 
	$fetch_ready_appv = mysql_fetch_array($query_ready_appv);
	$response_text	= "DOCUMENT :".$fetch_ready_appv['DOC_NUMBER'].", YEAR : ".$fetch_ready_appv['YEAR']." MONTH : ".$fetch_ready_appv['MONTH']." 
					   telah di approve oleh ".$fetch_ready_appv['NAMA_DEPAN'].", dengan USER :".$fetch_ready_appv['USER'];
	//echo $response_text;
?>
			<script type="text/javascript">
				//var response_text		= $('response_text');
                alert('OK');
                window.location = '../dashboard.php?select=1';
            </script>
<?php

//exit;
}


	$history_start_at   = date("Y-m-d H:i:s");

// Mencari data pada master transaksi dengan key doc_number year month area
$get_trx_detail		= "SELECT * FROM TRX_DETAIL
						WHERE DOC_NUMBER 		= '".$history_docnum."'
						  AND YEAR		 		= '".$history_year."'
						  AND MONTH		 		= '".$history_month."'
						  AND AREA		 		IN ( '".$history_area."' )
						  
					  ";
//echo $get_trx_detail;
//exit;
$query_trx_detail	= mysql_query($get_trx_detail);
$num_row_trx_detail	= mysql_num_rows($query_trx_detail);
if($num_row_trx_detail <= 0){ 
?>
<script type="text/javascript">
	alert('Data approval Not Found');
	window.location = '../dashboard.php?select=1';
</script>
<?php
} else {
		
	$fetch_data_trx_detail 	= mysql_fetch_array($query_trx_detail);
	$get_detail_level		= $fetch_data_trx_detail['LEVEL'];
	$get_detail_area		= $fetch_data_trx_detail['AREA'];
	$get_detail_flow_main	= $fetch_data_trx_detail['FLOW_MAIN'];
	$get_detail_apprv_lvl	= $fetch_data_trx_detail['APPROVAL_LEVEL'];
	$get_detail_fiatur		= $fetch_data_trx_detail['FIATUR'];
	$changed_flow			= explode(',', $get_detail_flow_main);
	
	$cek_appv_lvl_text		= "SELECT * FROM TRX_LIMITATION";
	$query_cek_appv_lvl		= mysql_query($cek_appv_lvl_text);
	$num_rw_cek_appv_lvl	= mysql_num_rows($query_cek_appv_lvl);
	if($num_rw_cek_appv_lvl <= 0){
?>
<script type="text/javascript">
	alert('Please Maintain level authorization in table TRX_LIMITATION');
	window.location = '../dashboard.php?select=1';
</script>
<?php
	}else{

?>
<!--
<script type="text/javascript">
	/*
    alert('Inconsistensy Data in TRX_DETAIL Contact Administrator');
	window.location = '../dashboard.php?select=1';
    */
</script>
-->
<?php
//		}
		
	}	// End Of check Approval_level TRX_LIMITATION AND TRX_DETAIL

	//Update transaksi untuk next approval
	$upd_detail_text	= "UPDATE trx_detail 
						      SET DELETE_FLAG 	= 'X'
						   WHERE DOC_NUMBER 		= '".$history_docnum."' 
						     AND YEAR 				= '".$history_year."' 
						     AND MONTH 				= '".$history_month."' 
						     AND LEVEL 				= '".$get_detail_level."'  
						     AND AREA				= '".$get_detail_area."' 
						 "; 

	//echo $upd_detail_text;
	//exit;
	//echo '<br><br>';
	$into_history_text 	= "INSERT INTO trx_history
						  ( 
							DOC_NUMBER, YEAR, MONTH, 
							LEVEL, USER, AREA,
							PRIORITY, STATUS, 
							START_AT, FINISH_AT, NEXT_APPROVAL
						  )
						  VALUES
						  (
							'".$history_docnum."', '".$history_year."', '".$history_month."', 
							'".$history_level."', '".$history_user."', '".$get_detail_area."',
							'', 'DELETED',
							'".$history_start_at."', '".$history_finish_at."', ''
						  )
						  ";
	//echo $into_history_text;
?>
			<script type="text/javascript">
                //alert('Transaksiiii');
                //window.location = '../dashboard.php?select=1';
            </script>
<?php
	//exit;
	$query_upd_detail	= mysql_query($upd_detail_text);
	$error_upd_detail	= mysql_errno();
	if($error_upd_detail == 0){
		$query_into_history		= mysql_query($into_history_text);
		$error_into_history		= mysql_errno();
		if($error_into_history == 0){

?>
			<script type="text/javascript">
                alert('Transaksi di hapus');
                window.location = '../dashboard.php?select=1';
            </script>
<?php

		}else{
			// Error saat Insert history
			echo "Error saat Insert history";
		}
	}else{
		// Error saat update trx_detail	
		echo "Error saat update trx_detail	";
	}
	//echo $into_history_text;
	//echo "<br>";
	//echo $upd_detail_text;
	//exit;

}	//End Of Query TRX_DETAIL doc_num year month
?>