<?php
session_start();
include('connect.php');

if(isset($_POST['action']) && $_POST['action'] == 'submit_off'){
	$nama_mitra 				= strip_tags(htmlentities($_POST['nama_mitra']));
	$nama_proyek 				= strip_tags(htmlentities($_POST['nama_proyek']));
	$kontrak_no 				= strip_tags(htmlentities($_POST['kontrak_no']));
	$po_sp_no 					= strip_tags(htmlentities($_POST['po_sp_no']));
	$amandemen_no 				= strip_tags(htmlentities($_POST['amandemen_no']));
	$keterangan_value 			= strip_tags(htmlentities($_POST['keterangan_value']));
	$no_sap			 			= strip_tags(htmlentities($_POST['no_sap']));
	$no_spb			 			= strip_tags(htmlentities($_POST['no_spb']));
//	$kontrak_tgl				= strip_tags(htmlentities($_POST['kontrak_tgl']));
	if(!empty($_POST['kontrak_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['kontrak_tgl'])) );
		$kontrak_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $kontrak_tgl = '0000-00-00'; }
//	$po_sp_tgl					= strip_tags(htmlentities($_POST['po_sp_tgl']));
	if(!empty($_POST['po_sp_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['po_sp_tgl'])) );
		$po_sp_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $po_sp_tgl = '0000-00-00'; }
//	$amandemen_tgl				= strip_tags(htmlentities($_POST['amandemen_tgl']));
	if(!empty($_POST['amandemen_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['amandemen_tgl'])) );
		$amandemen_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $amandemen_tgl = '0000-00-00'; }
	$kontrak_currency			= strip_tags(htmlentities($_POST['kontrak_currency']));
	$po_sp_currency				= strip_tags(htmlentities($_POST['po_sp_currency']));
	$amandemen_currency			= strip_tags(htmlentities($_POST['amandemen_currency']));
	$kontrak_amount				= strip_tags(htmlentities($_POST['kontrak_amount']));
	$po_sp_amount				= strip_tags(htmlentities($_POST['po_sp_amount']));
	$amandemen_amount			= strip_tags(htmlentities($_POST['amandemen_amount']));
	$tagihan_no					= strip_tags(htmlentities($_POST['tagihan_no']));		
	$invoice_no					= strip_tags(htmlentities($_POST['invoice_no']));		
//	$tagihan_tgl				= strip_tags(htmlentities($_POST['tagihan_tgl']));
	if(!empty($_POST['tagihan_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['tagihan_tgl'])) );
		$tagihan_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $tagihan_tgl = '0000-00-00'; }
//	$invoice_tgl				= strip_tags(htmlentities($_POST['invoice_tgl']));
	if(!empty($_POST['invoice_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['invoice_tgl'])) );
		$invoice_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $invoice_tgl = '0000-00-00'; }
//	$tagihan_tgl_masuk			= strip_tags(htmlentities($_POST['tagihan_tgl_masuk']));
	if(!empty($_POST['tagihan_tgl_masuk'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['tagihan_tgl_masuk'])) );
		$tagihan_tgl_masuk = $yy.'-'.$mm.'-'.$dd;
	} else { $tagihan_tgl_masuk = '0000-00-00'; }
//	$invoice_tgl_masuk			= strip_tags(htmlentities($_POST['invoice_tgl_masuk']));
	if(!empty($_POST['invoice_tgl_masuk'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['invoice_tgl_masuk'])) );
		$invoice_tgl_masuk = $yy.'-'.$mm.'-'.$dd;
	} else { $invoice_tgl_masuk = '0000-00-00'; }
	$po_non_ppn_currency		= strip_tags(htmlentities($_POST['po_non_ppn_currency']));
	$po_non_ppn_amount			= strip_tags(htmlentities($_POST['po_non_ppn_amount']));
	$po_non_ppn_amd_currency	= strip_tags(htmlentities($_POST['po_non_ppn_amd_currency']));
	$po_non_ppn_amd_amount		= strip_tags(htmlentities($_POST['po_non_ppn_amd_amount']));
	$po_non_ppn_thp_rekon		= strip_tags(htmlentities($_POST['po_non_ppn_thp_rekon']));
	$bts_akhir_kerja_no			= strip_tags(htmlentities($_POST['bts_akhir_kerja_no']));
//	$bast_non_ppn_tgl_baut		= strip_tags(htmlentities($_POST['bast_non_ppn_tgl_baut']));
	if(!empty($_POST['bast_non_ppn_tgl_baut'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['bast_non_ppn_tgl_baut'])) );
		$bast_non_ppn_tgl_baut = $yy.'-'.$mm.'-'.$dd;
	} else { $bast_non_ppn_tgl_baut = '0000-00-00'; }
//	$bast_non_ppn_tgl_bast		= strip_tags(htmlentities($_POST['bast_non_ppn_tgl_bast']));
	if(!empty($_POST['bast_non_ppn_tgl_bast'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['bast_non_ppn_tgl_bast'])) );
		$bast_non_ppn_tgl_bast = $yy.'-'.$mm.'-'.$dd;
	} else { $bast_non_ppn_tgl_bast = '0000-00-00'; }
	$bast_non_ppn_barang		= strip_tags(htmlentities($_POST['bast_non_ppn_barang']));
	$bast_non_ppn_jasa			= strip_tags(htmlentities($_POST['bast_non_ppn_jasa']));
	$bast_non_ppn_currency		= strip_tags(htmlentities($_POST['bast_non_ppn_currency']));
	$bast_non_ppn_amount		= strip_tags(htmlentities($_POST['bast_non_ppn_amount']));
	$ptgn_uang_muka_currency	= strip_tags(htmlentities($_POST['ptgn_uang_muka_currency']));
	$ptgn_uang_muka_amount		= strip_tags(htmlentities($_POST['ptgn_uang_muka_amount']));
	$kuitansi_currency			= strip_tags(htmlentities($_POST['kuitansi_currency']));
	$kuitansi_amount			= strip_tags(htmlentities($_POST['kuitansi_amount']));
	$rekening_ats_nm			= strip_tags(htmlentities($_POST['rekening_ats_nm']));
	$pajak_currency				= strip_tags(htmlentities($_POST['pajak_currency']));
	$pajak_amount				= strip_tags(htmlentities($_POST['pajak_amount']));
	$jamn_uang_muka_currency	= strip_tags(htmlentities($_POST['jamn_uang_muka_currency']));
	$jamn_uang_muka_amount		= strip_tags(htmlentities($_POST['jamn_uang_muka_amount']));
	$jamn_plksa_currency		= strip_tags(htmlentities($_POST['jamn_plksa_currency']));
	$jamn_plksa_amount			= strip_tags(htmlentities($_POST['jamn_plksa_amount']));
	$jamn_pmhr_currency			= strip_tags(htmlentities($_POST['jamn_pmhr_currency']));
	$jamn_pmhr_amount			= strip_tags(htmlentities($_POST['jamn_pmhr_amount']));
	$kuitansi_atau				= strip_tags(htmlentities($_POST['kuitansi_atau']));
	$rekening_currency			= strip_tags(htmlentities($_POST['rekening_currency']));
	$rekening_amount			= strip_tags(htmlentities($_POST['rekening_amount']));
	$kuitansi_no				= strip_tags(htmlentities($_POST['kuitansi_no']));		
	$rekening_bank				= strip_tags(htmlentities($_POST['rekening_bank']));
	$rekening_switch			= strip_tags(htmlentities($_POST['rekening_switch']));
	$pajak_no					= strip_tags(htmlentities($_POST['pajak_no']));		
	$jamn_uang_muka_assr		= strip_tags(htmlentities($_POST['jamn_uang_muka_assr']));		
	$jamn_plksa_assr			= strip_tags(htmlentities($_POST['jamn_plksa_assr']));				
	$jamn_pmhr_assr				= strip_tags(htmlentities($_POST['jamn_pmhr_assr']));		
//	$pajak_tgl					= strip_tags(htmlentities($_POST['pajak_tgl']));
	if(!empty($_POST['pajak_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['pajak_tgl'])) );
		$pajak_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $pajak_tgl = '0000-00-00'; }
	$jamn_uang_muka_expired		= strip_tags(htmlentities($_POST['jamn_uang_muka_expired']));
	$jamn_plksa_expired			= strip_tags(htmlentities($_POST['jamn_plksa_expired']));
	$jamn_pmhr_expired			= strip_tags(htmlentities($_POST['jamn_pmhr_expired']));
	$pls_asu_expired			= strip_tags(htmlentities($_POST['pls_asu_expired']));
//	$tt_bld_draw_tgl			= strip_tags(htmlentities($_POST['tt_bld_draw_tgl']));
	if(!empty($_POST['tt_bld_draw_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['tt_bld_draw_tgl'])) );
		$tt_bld_draw_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $tt_bld_draw_tgl = '0000-00-00'; }
//	$siujk_tgl					= strip_tags(htmlentities($_POST['siujk_tgl']));
	if(!empty($_POST['siujk_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['siujk_tgl'])) );
		$siujk_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $siujk_tgl = '0000-00-00'; }
//	$npwp_tgl					= strip_tags(htmlentities($_POST['npwp_tgl']));
	if(!empty($_POST['npwp_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['npwp_tgl'])) );
		$npwp_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $npwp_tgl = '0000-00-00'; }
//	$dgt_tgl					= strip_tags(htmlentities($_POST['dgt_tgl']));
	if(!empty($_POST['dgt_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['dgt_tgl'])) );
		$dgt_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $dgt_tgl = '0000-00-00'; }
//	$side_ltr_tgl				= strip_tags(htmlentities($_POST['side_ltr_tgl']));
	if(!empty($_POST['side_ltr_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['side_ltr_tgl'])) );
		$side_ltr_tgl = $yy.'-'.$mm.'-'.$dd;
	} else { $side_ltr_tgl = '0000-00-00'; }
	$pls_asu_no					= strip_tags(htmlentities($_POST['pls_asu_no']));				
	$pls_asu_assr				= strip_tags(htmlentities($_POST['pls_asu_assr']));				
	$tt_bld_draw_no				= strip_tags(htmlentities($_POST['tt_bld_draw_no']));				
	$siujk_no					= strip_tags(htmlentities($_POST['siujk_no']));				
	$npwp_no					= strip_tags(htmlentities($_POST['npwp_no']));				
	$dgt_no						= strip_tags(htmlentities($_POST['dgt_no']));				
	$side_ltr_no				= strip_tags(htmlentities($_POST['side_ltr_no']));				
	$po_migo_value				= strip_tags(htmlentities($_POST['po_migo_value']));
	
	$tagihan_1					= strip_tags(htmlentities($_POST['tagihan_1']));
	$invoice_1					= strip_tags(htmlentities($_POST['invoice_1']));
	$po_non_ppn_1				= strip_tags(htmlentities($_POST['po_non_ppn_1']));
	$bts_akhir_kerja_1			= strip_tags(htmlentities($_POST['bts_akhir_kerja_1']));
	$bast_non_ppn_1				= strip_tags(htmlentities($_POST['bast_non_ppn_1']));
	$ptgn_uang_muka_1			= strip_tags(htmlentities($_POST['ptgn_uang_muka_1']));
	$kuitansi_1					= strip_tags(htmlentities($_POST['kuitansi_1']));
	$rekening_1					= strip_tags(htmlentities($_POST['rekening_1']));
	$pajak_1					= strip_tags(htmlentities($_POST['pajak_1']));
	$jamn_uang_muka_1			= strip_tags(htmlentities($_POST['jamn_uang_muka_1']));
	$jamn_plksa_1				= strip_tags(htmlentities($_POST['jamn_plksa_1']));
	$jamn_pmhr_1				= strip_tags(htmlentities($_POST['jamn_pmhr_1']));
	$pls_asu_1					= strip_tags(htmlentities($_POST['pls_asu_1']));
	$tt_bld_draw_1				= strip_tags(htmlentities($_POST['tt_bld_draw_1']));
	$siujk_1					= strip_tags(htmlentities($_POST['siujk_1']));
	$npwp_1						= strip_tags(htmlentities($_POST['npwp_1']));
	$dgt_1						= strip_tags(htmlentities($_POST['dgt_1']));
	$side_ltr_1					= strip_tags(htmlentities($_POST['side_ltr_1']));
	$rekon_wkt_1				= strip_tags(htmlentities($_POST['rekon_wkt_1']));
	$po_migo_1					= strip_tags(htmlentities($_POST['po_migo_1']));
	
	$true_amount				= strip_tags(htmlentities($_POST['true_amount']));
	$true_currency				= strip_tags(htmlentities($_POST['true_currency']));
	$start_time					= strip_tags(htmlentities($_POST['start_time']));
	$area						= strip_tags(htmlentities($_POST['area']));
	$incomplete					= strip_tags(htmlentities($_POST['incomplete']));
	
	$park_doc_number			= strip_tags(htmlentities($_POST['park_doc_number']));
	$park_year					= strip_tags(htmlentities($_POST['park_year']));
	$park_month					= strip_tags(htmlentities($_POST['park_month']));
	$park_level					= strip_tags(htmlentities($_POST['park_level']));
	$park_area					= strip_tags(htmlentities($_POST['park_area']));
		
//	$tagihan_0					= strip_tags(htmlentities($_POST['tagihan_0']));
//	$invoice_0					= strip_tags(htmlentities($_POST['invoice_0']));
//	$po_non_ppn_0				= strip_tags(htmlentities($_POST['po_non_ppn_0']));
//	$bts_akhir_kerja_0			= strip_tags(htmlentities($_POST['bts_akhir_kerja_0']));
//	$bast_non_ppn_0				= strip_tags(htmlentities($_POST['bast_non_ppn_0']));
//	$ptgn_uang_muka_0			= strip_tags(htmlentities($_POST['ptgn_uang_muka_0']));
//	$kuitansi_0					= strip_tags(htmlentities($_POST['kuitansi_0']));
//	$rekening_0					= strip_tags(htmlentities($_POST['rekening_0']));
//	$pajak_0					= strip_tags(htmlentities($_POST['pajak_0']));
//	$jamn_uang_muka_0			= strip_tags(htmlentities($_POST['jamn_uang_muka_0']));
//	$jamn_plksa_0				= strip_tags(htmlentities($_POST['jamn_plksa_0']));
//	$jamn_pmhr_0				= strip_tags(htmlentities($_POST['jamn_pmhr_0']));
//	$pls_asu_0					= strip_tags(htmlentities($_POST['pls_asu_0']));
//	$tt_bld_draw_0				= strip_tags(htmlentities($_POST['tt_bld_draw_0']));
//	$siujk_0					= strip_tags(htmlentities($_POST['siujk_0']));
//	$npwp_0						= strip_tags(htmlentities($_POST['npwp_0']));
//	$dgt_0						= strip_tags(htmlentities($_POST['dgt_0']));
//	$side_ltr_0					= strip_tags(htmlentities($_POST['side_ltr_0']));
//	$rekon_wkt_0				= strip_tags(htmlentities($_POST['rekon_wkt_0']));
//	$po_migo_0					= strip_tags(htmlentities($_POST['po_migo_0']));

if( $tagihan_1 == 'X' ) 		{ $tagihan_mark = 'X'; } 			else { $tagihan_mark = ''; }
if( $invoice_1 == 'X' ) 		{ $invoice_mark = 'X'; } 			else { $invoice_mark = ''; }
if( $po_non_ppn_1 == 'X' ) 		{ $po_non_ppn_mark = 'X'; } 		else { $po_non_ppn_mark = ''; }
if( $bts_akhir_kerja_1 == 'X' ) { $bts_akhir_kerja_mark = 'X'; }	else { $bts_akhir_kerja_mark = ''; }
if( $bast_non_ppn_1 == 'X' ) 	{ $bast_non_ppn_mark = 'X'; }		else { $bast_non_ppn_mark = ''; }
if( $ptgn_uang_muka_1 == 'X' ) 	{ $ptgn_uang_muka_mark = 'X'; }		else { $ptgn_uang_muka_mark = ''; }
if( $kuitansi_1 == 'X' ) 		{ $kuitansi_mark = 'X'; }			else { $kuitansi_mark = ''; }
if( $rekening_1 == 'X' ) 		{ $rekening_mark = 'X'; }			else { $rekening_mark = ''; }
if( $pajak_1 == 'X' ) 			{ $pajak_mark = 'X'; }				else { $pajak_mark = ''; }
if( $jamn_uang_muka_1 == 'X' ) 	{ $jamn_uang_muka_mark = 'X'; }		else { $jamn_uang_muka_mark = ''; }
if( $jamn_plksa_1 == 'X' ) 		{ $jamn_plksa_mark = 'X'; }			else { $jamn_plksa_mark = ''; }
if( $jamn_pmhr_1 == 'X' ) 		{ $jamn_pmhr_mark = 'X'; }			else { $jamn_pmhr_mark = ''; }
if( $pls_asu_1 == 'X' ) 		{ $pls_asu_mark = 'X'; }			else { $pls_asu_mark = ''; }
if( $tt_bld_draw_1 == 'X' ) 	{ $tt_bld_draw_mark = 'X'; }		else { $tt_bld_draw_mark = ''; }
if( $siujk_1 == 'X' ) 			{ $siujk_mark = 'X'; }				else { $siujk_mark = ''; }
if( $npwp_1 == 'X' ) 			{ $npwp_mark = 'X'; }				else { $npwp_mark = ''; }
if( $dgt_1 == 'X' )				{ $dgt_mark = 'X'; }				else { $dgt_mark = ''; }
if( $side_ltr_1 == 'X' ) 		{ $side_ltr_mark = 'X'; }			else { $side_ltr_mark = ''; }
if( $rekon_wkt_1 == 'X' ) 		{ $rekon_wkt_mark = 'X'; }			else { $rekon_wkt_mark = ''; }
if( $po_migo_1 == 'X' ) 		{ $po_migo_mark = 'X'; }			else { $po_migo_mark = ''; }

if( $po_non_ppn_amount == null ) { $po_non_ppn_amount = 0; }
if( $true_amount == null ) { $true_amount = 0; }
if (preg_match("/[^0-9]/", $true_amount))
{
    echo 'Wrong input value in Nilai Stlh Pajak!';
	exit;
}

$text_appv		= "SELECT * FROM trx_limitation";
$query_appv		= mysql_query($text_appv);
$error_appv		= mysql_errno();
if($error_appv == 0){
	$get_row_appv = mysql_num_rows($query_appv); // Get the number of rows approval
}else{
	echo "Please Maintain level authorization in table TRX_LIMITATION";
}

	$get_year 		= $park_year;//date("Y");
	$get_month		= $park_month;//date("m");
	$get_level 		= mysql_query(' 
					  SELECT * FROM trx_limitation
					  WHERE MIN_VALUE <= "'.$true_amount.'"
					  	AND MAX_VALUE >= "'.$true_amount.'"
					    AND currency = "'.$true_currency.'"'
					  );
	$get_level_rw	= mysql_num_rows($get_level); // Get the number of rows
	if($get_level_rw <= 0){ 
		echo 3; // Please Maintain level authorization in table TRX_LIMITATION
	} else {
		$get_level_fetch 	= mysql_fetch_array($get_level);
		$get_level_found 	= $get_level_fetch['LEVEL'];
		$get_fiatur_found 	= $get_level_fetch['FIATUR'];
		$get_priority_found = $get_level_fetch['PRIORITY'];
		$get_flow_found 	= $get_level_fetch['FLOW'];
		$get_number     = mysql_query(' 
						  SELECT * FROM trx_number
						  WHERE year = "'.$get_year.'"'
						  );
		$get_number_rw	= mysql_num_rows($get_number); // Get the number of rows
		if($get_number_rw <= 0){ 
			echo 1; // Please Maintain Running Number TRX_NUMBER
		} else {
			$get_number_fetch 	= mysql_fetch_array($get_number);
//			$get_number_found 	= $get_number_fetch['CURRENT_DOC_NUMB'];
			$get_number_found   = $park_doc_number;
			$changed_by			= $_SESSION['USERNAME'];
	//		$changed_at			= date("Y-m-d H:i:s");
			$created_by			= $_SESSION['USERNAME'];
			$replace_flow		= explode(',', $get_flow_found);//str_replace(",", "", $get_flow_found);
			//echo $replace_flow[0];
			//print_r(array_values($replace_flow));
			//exit;
			//$array_count = count($replace_flow);
			//print_r(array_count_values($replace_flow));
			//print_r(count($replace_flow));
			//echo $array_count;
			//exit;
			$get_priority_history = $get_flow_found[0];
			$who_appv = array();
			for($i='1'; $i<=$get_row_appv; $i++){
				if(isset($replace_flow[$i])){
					$who_appv[$i-1]=	$replace_flow[$i];
					//echo $who_appv[$i]."space";	
				}
			}
//			print_r(array_values($who_appv));
//			echo $who_appv[0];
//			exit;
			$get_flow_main		= implode(',', $who_appv);
			//echo $get_flow_main;
			//exit;
			while($search_appv_level = mysql_fetch_array($query_appv)){
				if(isset($who_appv[0])){
					if($search_appv_level['PRIORITY'] == $who_appv[0]){
						$get_approval_level = $search_appv_level['LEVEL'];
						$get_next_approval = $search_appv_level['LEVEL'];
						break;
						//echo $get_approval_level;
						//exit;
					}
				}
/* 				if(isset($who_appv[1])){
					if($search_appv_level['PRIORITY'] == $who_appv[1]){
						$get_next_approval = $search_appv_level['LEVEL'];
						break;
						echo $get_approval_level;
						exit;
					}
				} */
				
			}
			//exit;
			$history_user	= $_SESSION['USERNAME'];
			$history_start_at   = $start_time;
			$history_finish_at  = date("Y-m-d H:i:s");
			$into_history_text = "INSERT INTO trx_history
								  ( 
									DOC_NUMBER, YEAR, MONTH, 
									LEVEL, USER, AREA,
									PRIORITY, STATUS, 
									START_AT, FINISH_AT, NEXT_APPROVAL
								   )
								   VALUES 
								   (
									'".$get_number_found."', '".$get_year."', '".$get_month."', 
									'".$get_level_found."', '".$history_user."', '".$area."',
									'".$get_priority_history."', 'APPROVE',
									'".$history_start_at."', '".$history_finish_at."', '".$get_next_approval."'
								   )
								  ";
			//echo $into_history_text;
			//exit;
			
	//	  //UPDATE `smart_fca`.`trx_number` SET `CURRENT_DOC_NUMB` = '1000000001' WHERE `trx_number`.`YEAR` = '2014';
	//	  //INSERT INTO `smart_fca`.`trx_number` (`DOC_NUMB_START`, `YEAR`, `CURRENT_DOC_NUMB`) VALUES ('1000000000', '2016', '1000000000');
			if($incomplete != 1 ){
				
//			$querytext      = "
//							  INSERT INTO trx_detail
//							  ( DOC_NUMBER, YEAR, MONTH, 
//							  	LEVEL, AREA, FIATUR, APPROVAL_LEVEL, FLOW_MAIN,
//							  	NAMA_MITRA, NAMA_PROYEK, 
//								KONTRAK_NO, KONTRAK_TGL, KONTRAK_CURRENCY, KONTRAK_AMOUNT, 
//								PO_SP_NO, PO_SP_TGL, PO_SP_CURRENCY, PO_SP_AMOUNT, 
//								AMANDEMEN_NO, AMANDEMEN_TGL, AMANDEMEN_CURRENCY, AMANDEMEN_AMOUNT, 
//								TRUE_VALUE_CURRENCY, TRUE_VALUE,
//								KETERANGAN, NO_SAP,
//								TAGIHAN_MARK, TAGIHAN_NO, TAGIHAN_TGL, TAGIHAN_TGL_MASUK,
//								INVOICE_MARK, INVOICE_NO, INVOICE_TGL, INVOICE_TGL_MASUK,
//								PO_NON_PPN_MARK, PO_NON_PPN_CURRENCY, PO_NON_PPN_AMOUNT, PO_NON_PPN_AMANDEMEN_CURRENCY, PO_NON_PPN_AMANDEMEN_AMOUNT, PO_NON_PPN_THP_REKON,
//								BATAS_AKHIR_PRJ_MARK, BATAS_AKHIR_PRJ_NO_BAUT, 
//								BAST_NON_PPN_MARK, BAST_NON_PPN_CURRENCY, BAST_NON_PPN_AMOUNT, BAST_NON_PPN_BARANG, BAST_NON_PPN_JASA, BAST_NON_PPN_TGL_BAUT, BAST_NON_PPN_TGL_BAST,
//								PTG_UANG_MUKA_MARK, PTG_UANG_MUKA_CURRENCY, PTG_UANG_MUKA_AMOUNT, 
//								KUITANSI_PPN_MARK, KUITANSI_PPN_CURRENCY, KUITANSI_PPN_AMOUNT, KUITANSI_PPN_ATAU, KUITANSI_PPN_NO, 
//								REKENING_MARK, REKENING_ATS_NAMA, REKENING_CURRENCY, REKENING_AMOUNT, REKENING_BANK, REKENING_SW_CODE,
//								FAKTUR_PJK_MARK, FAKTUR_PJK_CURRENCY, FAKTUR_PJK_AMOUNT, FAKTUR_PJK_NO, FAKTUR_PJK_TGL,
//								JAMN_UANG_MUKA_MARK, JAMN_UANG_MUKA_CURRENCY, JAMN_UANG_MUKA_AMOUNT, JAMN_UANG_MUKA_ASSR, JAMN_UANG_MUKA_EXPIRED,
//								JAMN_PELKSNA_MARK, JAMN_PELKSNA_CURRENCY, JAMN_PELKSNA_AMOUNT, JAMN_PELKSNA_ASSR, JAMN_PELKSNA_EXPIRED,
//								JAMN_PLHRA_MARK, JAMN_PLHRA_CURRENCY, JAMN_PLHRA_AMOUNT, JAMN_PLHRA_ASSR, JAMN_PLHRA_EXPIRED,
//								POLIS_ASUR_MARK, POLIS_ASUR_NO, POLIS_ASUR_ASSR, POLIS_ASUR_EXPIRED,
//								TD_TERIMA_BLD_DRAW_MARK, TD_TERIMA_BLD_DRAW_NO, TD_TERIMA_BLD_DRAW_TGL, 
//								SIUJK_MARK, SIUJK_NO, SIUJK_TGL, 
//								NPWP_MARK, NPWP_NO, NPWP_TGL,
//								F_DGT1_MARK, F_DGT1_NO, F_DGT1_TGL, 
//								SIDE_LETTER_MARK, SIDE_LETTER_NO, SIDE_LETTER_TGL,
//								REKON_WAKTU_MARK,
//								PO_MIGO_MARK, PO_MIGO_VALUE,
//								CHANGED_BY, CREATED_BY
//							  ) 
//							  VALUES 
//							  ( '".$get_number_found."', '".$get_year."', '".$get_month."', 
//							  	'".$get_level_found."', '".$area."', '".$get_fiatur_found."', '".$get_approval_level."', '".$get_flow_main."', 
//							  	'".$nama_mitra."', '".$nama_proyek."',
//								'".$kontrak_no."', '".$kontrak_tgl."', '".$kontrak_currency."', '".$kontrak_amount."', 
//								'".$po_sp_no."', '".$po_sp_tgl."', '".$po_sp_currency."', '".$po_sp_amount."', 
//								'".$amandemen_no."', '".$amandemen_tgl."', '".$amandemen_currency."', '".$amandemen_amount."', 
//								'".$true_currency."', '".$true_amount."',
//								'".$keterangan_value."', '".$no_sap."',
//								'".$tagihan_mark."', '".$tagihan_no."', '".$tagihan_tgl."', '".$tagihan_tgl_masuk."', 
//								'".$invoice_mark."', '".$invoice_no."', '".$invoice_tgl."', '".$invoice_tgl_masuk."', 
//								'".$po_non_ppn_mark."', '".$po_non_ppn_currency."', '".$po_non_ppn_amount."', '".$po_non_ppn_amd_currency."', 							'".$po_non_ppn_amd_amount."', '".$po_non_ppn_thp_rekon."', 
//								'".$bts_akhir_kerja_mark."', '".$bts_akhir_kerja_no."',
//								'".$bast_non_ppn_mark."', '".$bast_non_ppn_currency."', '".$bast_non_ppn_amount."', '".$bast_non_ppn_barang."', 							'".$bast_non_ppn_jasa."', '".$bast_non_ppn_tgl_baut."', '".$bast_non_ppn_tgl_bast."', 
//								'".$ptgn_uang_muka_mark."', '".$ptgn_uang_muka_currency."', '".$ptgn_uang_muka_amount."', 
//								'".$kuitansi_mark."', '".$kuitansi_currency."', '".$kuitansi_amount."', '".$kuitansi_atau."', 							'".$kuitansi_no."', 
//								'".$rekening_mark."', '".$rekening_ats_nm."', '".$rekening_currency."', '".$rekening_amount."', 							'".$rekening_bank."', '".$rekening_switch."', 
//								'".$pajak_mark."', '".$pajak_currency."', '".$pajak_amount."', '".$pajak_no."', '".$pajak_tgl."', 
//								'".$jamn_uang_muka_mark."', '".$jamn_uang_muka_currency."', '".$jamn_uang_muka_amount."', '".$jamn_uang_muka_assr."', 							'".$jamn_uang_muka_expired."', 
//								'".$jamn_plksa_mark."', '".$jamn_plksa_currency."', '".$jamn_plksa_amount."', '".$jamn_plksa_assr."', 							'".$jamn_plksa_expired."', 
//								'".$jamn_pmhr_mark."', '".$jamn_pmhr_currency."', '".$jamn_pmhr_amount."', '".$jamn_pmhr_assr."', 							'".$jamn_pmhr_expired."', 
//								'".$pls_asu_mark."', '".$pls_asu_no."', '".$pls_asu_assr."', '".$pls_asu_expired."', 
//								'".$tt_bld_draw_mark."', '".$tt_bld_draw_no."', '".$tt_bld_draw_tgl."', 
//								'".$siujk_mark."', '".$siujk_no."', '".$siujk_tgl."',
//								'".$npwp_mark."', '".$npwp_no."', '".$npwp_tgl."', 
//								'".$dgt_mark."', '".$dgt_no."', '".$dgt_tgl."', 
//								'".$side_ltr_mark."', '".$side_ltr_no."', '".$side_ltr_tgl."',
//								'".$rekon_wkt_mark."',								
//								'".$po_migo_mark."', '".$po_migo_value."', 
//								'".$changed_by."', '".$created_by."'
//								)
//							  ";
							  
			}elseif($incomplete == 1 ){
			$querytext      = "
							  UPDATE trx_detail 
							  SET 	NOT_COMPLETE		 = '',
							  		LEVEL 				 = '".$get_level_found."', 
							  		FIATUR 				 = '".$get_fiatur_found."',
									APPROVAL_LEVEL		 = '".$get_approval_level."',
									FLOW_MAIN			 = '".$get_flow_main."',
									NAMA_MITRA			 = '".$nama_mitra."',
									NAMA_PROYEK			 = '".$nama_proyek."',
									KONTRAK_NO			 = '".$kontrak_no."',
									KONTRAK_TGL			 = '".$kontrak_tgl."',
									KONTRAK_CURRENCY	 = '".$kontrak_currency."',
									KONTRAK_AMOUNT		 = '".$kontrak_amount."',
									PO_SP_NO			 = '".$po_sp_no."',
									PO_SP_TGL			 = '".$po_sp_tgl."',
									PO_SP_CURRENCY		 = '".$po_sp_currency."',
									PO_SP_AMOUNT		 = '".$po_sp_amount."',
									AMANDEMEN_NO		 = '".$amandemen_no."',
									AMANDEMEN_TGL		 = '".$amandemen_tgl."',
									AMANDEMEN_CURRENCY	 = '".$amandemen_currency."',
									AMANDEMEN_AMOUNT	 = '".$amandemen_amount."',
									TRUE_VALUE_CURRENCY	 = '".$true_currency."',
									TRUE_VALUE			 = '".$true_amount."',
									KETERANGAN			 = '".$keterangan_value."', 
									NO_SAP				 = '".$no_sap."',
									NO_SPB				 = '".$no_spb."'
							  
							  WHERE DOC_NUMBER 	 = '".$park_doc_number."' AND
							  		YEAR	   	 = '".$park_year."' AND
									MONTH	   	 = '".$park_month."' AND
									AREA	   	 = '".$park_area."'
							  
							  ";
			}
				
			//echo $querytext;
			//exit;
			
			// Submit all data
			$query			= mysql_query($querytext); // Insert to table trx_detail
			$cek_error 		= mysql_errno();
			//echo $cek_error; 
			//exit;
			if($cek_error == 0){ // If any error trx_detail
				$into_history_query = mysql_query($into_history_text); // insert trx_history
				$into_history_error = mysql_errno();	
				if($into_history_error == 0){	//any error insert trx_detail
//					$query	= mysql_query("
//							UPDATE trx_number
//							SET CURRENT_DOC_NUMB = '".$get_number_found."'
//							WHERE YEAR = '".$get_year."'
//							"); // Update to table
//					$upd_error = mysql_errno();
//					if ($upd_error == 0){ //any error insert trx_number document number
//						echo 0;	
//					}			
					echo 0;	
				} else {
					echo 'Error Insert data trx_history';
				}	// End of insert history
			} else {
				echo 'Error Insert data trx_detail';
			}	// End Of Insert trx_detail
			
		}	// end of get doc number
	} // End Of get level
}

?>