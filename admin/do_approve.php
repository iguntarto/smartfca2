<?php
session_start();
include("connect.php");
//$get_user 	= $_SESSION['USERNAME'];		
//$get_level 	= $_SESSION['LEVEL'];	
//$get_docnum = $_REQUEST['docnum'];
//$get_year = $_REQUEST['year'];
//$get_month = $_REQUEST['month'];
//$querytext = "";
//$querytext = "UPDATE trx_detail SET CHANGED_BY = '".$get_user."'
//											 WHERE DOC_NUMBER = '".$get_docnum."'
//											   AND YEAR = '".$get_year."'
//											   AND MONTH = '".$get_month."'";
//$query	= mysql_query($querytext); // Update to table
//$upd_error = mysql_errno();
//if ($query){
//	echo "<script> window.location = '../dashboard.php?select=1';
//} else {
//	echo "ERROR bro ".$querytext ;
//}

//echo $history_approval	= $_REQUEST['approval'];
//echo $history_start_at   = $_SESSION['TIME_NON'];
//echo $_SESSION['LEVEL'];
//echo '<br>';
$history_docnum 	= $_REQUEST['docnum'];
$history_year 		= $_REQUEST['year'];
$history_month 		= $_REQUEST['month'];
$history_user		= $_SESSION['USERNAME'];
$history_level		= $_SESSION['LEVEL'];
//$history_start_at   = $_SESSION['TIME_NON'];
$history_finish_at  = date("Y-m-d H:i:s");
$history_area		= $_SESSION['AREA'];
$history_area  		= str_replace(",","', '",$history_area);
$history_approval	= $_REQUEST['approval'];
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


//	Mencari start time per document
$get_start_doc  	= "SELECT * FROM TRX_HISTORY
						WHERE `DOC_NUMBER` 		= '".$history_docnum."'
						  AND `YEAR`	 		= '".$history_year."'
						  AND `MONTH`	 		= '".$history_month."'
						  AND `AREA`	 		IN ( '".$history_area."' )
					   ORDER BY LOG_NUMBER DESC
					  ";
//echo $get_start_doc;
$query_start_doc	= mysql_query($get_start_doc);
$num_row_start_doc	= mysql_num_rows($query_start_doc);
if($num_row_start_doc > 0){ 
	$fetch_start_doc = mysql_fetch_array($query_start_doc);
	$history_start_at   = $fetch_start_doc['FINISH_AT'];
	//echo $history_start_at;
}
//exit;
//	Mencari priority untuk insert data history
$get_priority		= "SELECT PRIORITY FROM TRX_LIMITATION
					   WHERE LEVEL = '".$history_level."'";
//echo $get_priority;   
//exit;
$query_priority		= mysql_query($get_priority);
$priority_error 	= mysql_errno();
if($priority_error == 0){
	$fetch_priority = mysql_fetch_array($query_priority);
	$get_priority 	= $fetch_priority['PRIORITY'];
}

// Mencari data pada master transaksi dengan key doc_number year month area
$get_trx_detail		= "SELECT * FROM TRX_DETAIL
						WHERE DOC_NUMBER 		= '".$history_docnum."'
						  AND YEAR		 		= '".$history_year."'
						  AND MONTH		 		= '".$history_month."'
						  AND APPROVAL_LEVEL	= '".$history_level."'
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
//		while($fetch_cek_appv_lvl	= mysql_fetch_array($query_cek_appv_lvl)){
//			if($fetch_cek_appv_lvl['PRIORITY'] == $changed_flow[0]){ 
//				$cek_apprv_lvl = $fetch_cek_appv_lvl['LEVEL'];
//				break;
//			}
//		}
		
//		if($get_detail_apprv_lvl != $cek_apprv_lvl){ // cek value approval_level dengan level di trx_limitation
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

	//$get_count_flow = array_count_values($changed_flow);
//	echo $get_detail_apprv_lvl;
//	echo '--------------';
//	echo $get_detail_fiatur;
//		echo $get_detail_flow_main;
//		echo $changed_flow[0]."space";
//		echo $changed_flow[1]."space";
//		echo $num_rw_cek_appv_lvl;
		
	if($get_detail_apprv_lvl != $get_detail_fiatur){	// jika approval_level masih dalam proses approval sebelum sampai ke fiatur
		for($i='1'; $i<=$num_rw_cek_appv_lvl; $i++){
			if(isset($changed_flow[$i])){
				//echo $changed_flow[$i];
				$who_appv[$i-1]=	$changed_flow[$i];
				//echo $who_appv[$i-1]."space";	
			}
		}
		
		$return_flow_main		= implode(',', $who_appv);
		//echo $return_flow_main;
		//echo $who_appv[0];

//		$fetch_cek_appv_lvl	= mysql_fetch_array($query_cek_appv_lvl);
		while($fetch_cek_appv_lvl	= mysql_fetch_array($query_cek_appv_lvl)){
			//echo 'Priority : '.$fetch_cek_appv_lvl['PRIORITY'].' --- level :'.$fetch_cek_appv_lvl['LEVEL'];
			if(isset($who_appv[0])){
				if($fetch_cek_appv_lvl['PRIORITY'] == $who_appv[0]){ 
					$return_approval_level = $fetch_cek_appv_lvl['LEVEL'];
					break;
				}	
			}
		}
		while($fetch_cek_appv_lvl	= mysql_fetch_array($query_cek_appv_lvl)){
			if(isset($who_appv[1])){
				if($fetch_cek_appv_lvl['PRIORITY'] == $who_appv[1]){ 
					$return_next_approval = $fetch_cek_appv_lvl['LEVEL'];
					break;
				}				
			}else{
				if(isset($return_approval_level)){
					$return_next_approval = $return_approval_level;
				}
			}
		}
	//echo $return_next_approval;
	//exit;
	}elseif($get_detail_apprv_lvl == $get_detail_fiatur){ 	// jika approval_level sampai ke fiatur 
		$return_flow_main		= '';	
		$return_approval_level	= $get_detail_fiatur;
		//$get_detail_level		= $get_detail_fiatur;
		$return_next_approval	= $get_detail_fiatur;
		$return_approval_level	= ' ';
		//echo 'udah masuk ke fiatur nih';
		//echo '<br>';
//		echo '<br><br>';
//		echo 'return_approval_level : '.$return_approval_level;
//		echo '<br><br>';
//		echo 'get_detail_fiatur : '.$get_detail_fiatur;
//		echo '<br><br>';
	}
	//echo '$history_approval : '.$history_approval;
	//echo '<br>';
	if($history_approval == 'APPROVE'){
		$reject_flag = '';
		$reject_level = '';
	}elseif($history_approval == 'REJECT'){
		$reject_flag = 'X';
		$reject_level = $history_level;
		$return_flow_main 		= $get_detail_flow_main;
		$return_approval_level 	= $get_detail_apprv_lvl;
		//$return_next_approval	= $get_detail_level;
	}
	//Update transaksi untuk next approval
	$upd_detail_text	= "UPDATE trx_detail 
						      SET APPROVAL_LEVEL 	= '".$return_approval_level."', 
							      FLOW_MAIN 		= '".$return_flow_main."',
							      CHANGED_BY 		= '".$history_user."', 
							      CHANGED_AT 		= '".$history_finish_at."', 
								  REJECT_FLAG		= '".$reject_flag."',
								  REJECT_LEVEL		= '".$reject_level."'
						   WHERE DOC_NUMBER 		= '".$history_docnum."' 
						     AND YEAR 				= '".$history_year."' 
						     AND MONTH 				= '".$history_month."' 
						     AND LEVEL 				= '".$get_detail_level."'  
						     AND AREA				= '".$get_detail_area."' 
						     AND FIATUR				= '".$get_detail_fiatur."'
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
							'".$get_priority."', '".$history_approval."',
							'".$history_start_at."', '".$history_finish_at."', '".$return_next_approval."'
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
			if($history_approval == 'APPROVE'){
				if(isset($_REQUEST['no_spb'])){
					echo 'Transaksi Sukses di approve atau di check';
				} else {
?>
			<script type="text/javascript">
                alert('Transaksi Sukses di approve atau di check');
                window.location = '../dashboard.php?select=1';
            </script>
<?php
				}
			}elseif($history_approval == 'REJECT'){
				if(isset($_REQUEST['no_spb'])){
					echo 'Transaksi Sukses di reject';
				} else {
?>
			<script type="text/javascript">
                alert('Transaksi Sukses di reject');
                window.location = '../dashboard.php?select=1';
            </script>
<?php
				}
			}
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