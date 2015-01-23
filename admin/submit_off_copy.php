<?php
session_start();
include('connect.php');
//	$kontrak_tgl				= strip_tags(htmlentities($_POST['kontrak_tgl']));
//	list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['kontrak_tgl'])) );
//	$kontrak_tgl = $yy.'-'.$mm.'-'.$dd;

if(isset($_POST['action']) && $_POST['action'] == 'submit_off'){
	$nama_mitra 				= strip_tags(htmlentities($_POST['nama_mitra']));
	$nama_proyek 				= strip_tags(htmlentities($_POST['nama_proyek']));
	$kontrak_no 				= strip_tags(htmlentities($_POST['kontrak_no']));
	$po_sp_no 					= strip_tags(htmlentities($_POST['po_sp_no']));
	$amandemen_no 				= strip_tags(htmlentities($_POST['amandemen_no']));
	$keterangan_value 			= strip_tags(htmlentities($_POST['keterangan_value']));
//	$kontrak_tgl				= strip_tags(htmlentities($_POST['kontrak_tgl']));
	if(!empty($_POST['kontrak_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['kontrak_tgl'])) );
		$kontrak_tgl = $yy.'-'.$mm.'-'.$dd;
		echo $kontrak_tgl;
	}
//	$po_sp_tgl					= strip_tags(htmlentities($_POST['po_sp_tgl']));
	if(!empty($_POST['po_sp_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['po_sp_tgl'])) );
		$po_sp_tgl = $yy.'-'.$mm.'-'.$dd;
	}
//	$amandemen_tgl				= strip_tags(htmlentities($_POST['amandemen_tgl']));
	if(!empty($_POST['amandemen_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['amandemen_tgl'])) );
		$amandemen_tgl = $yy.'-'.$mm.'-'.$dd;
	}
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
	}
//	$invoice_tgl				= strip_tags(htmlentities($_POST['invoice_tgl']));
	if(!empty($_POST['invoice_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['invoice_tgl'])) );
		$invoice_tgl = $yy.'-'.$mm.'-'.$dd;
	}
//	$tagihan_tgl_masuk			= strip_tags(htmlentities($_POST['tagihan_tgl_masuk']));
	if(!empty($_POST['tagihan_tgl_masuk'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['tagihan_tgl_masuk'])) );
		$tagihan_tgl_masuk = $yy.'-'.$mm.'-'.$dd;
	}
//	$invoice_tgl_masuk			= strip_tags(htmlentities($_POST['invoice_tgl_masuk']));
	if(!empty($_POST['invoice_tgl_masuk'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['invoice_tgl_masuk'])) );
		$invoice_tgl_masuk = $yy.'-'.$mm.'-'.$dd;
	}
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
	}
//	$bast_non_ppn_tgl_bast		= strip_tags(htmlentities($_POST['bast_non_ppn_tgl_bast']));
	if(!empty($_POST['bast_non_ppn_tgl_bast'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['bast_non_ppn_tgl_bast'])) );
		$bast_non_ppn_tgl_bast = $yy.'-'.$mm.'-'.$dd;
	}
	$bast_non_ppn_barang		= strip_tags(htmlentities($_POST['bast_non_ppn_barang']));
	$bast_non_ppn_barang		= strip_tags(htmlentities($_POST['bast_non_ppn_barang']));
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
	}
	$jamn_uang_muka_expired		= strip_tags(htmlentities($_POST['jamn_uang_muka_expired']));
	$jamn_plksa_expired			= strip_tags(htmlentities($_POST['jamn_plksa_expired']));
	$jamn_pmhr_expired			= strip_tags(htmlentities($_POST['jamn_pmhr_expired']));
	$pls_asu_expired			= strip_tags(htmlentities($_POST['pls_asu_expired']));
//	$tt_bld_draw_tgl			= strip_tags(htmlentities($_POST['tt_bld_draw_tgl']));
	if(!empty($_POST['tt_bld_draw_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['tt_bld_draw_tgl'])) );
		$tt_bld_draw_tgl = $yy.'-'.$mm.'-'.$dd;
	}
//	$siujk_tgl					= strip_tags(htmlentities($_POST['siujk_tgl']));
	if(!empty($_POST['siujk_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['siujk_tgl'])) );
		$siujk_tgl = $yy.'-'.$mm.'-'.$dd;
	}
//	$npwp_tgl					= strip_tags(htmlentities($_POST['npwp_tgl']));
	if(!empty($_POST['npwp_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['npwp_tgl'])) );
		$npwp_tgl = $yy.'-'.$mm.'-'.$dd;
	}
//	$dgt_tgl					= strip_tags(htmlentities($_POST['dgt_tgl']));
	if(!empty($_POST['dgt_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['dgt_tgl'])) );
		$dgt_tgl = $yy.'-'.$mm.'-'.$dd;
	}
//	$side_ltr_tgl				= strip_tags(htmlentities($_POST['side_ltr_tgl']));
	if(!empty($_POST['side_ltr_tgl'])){
		list($dd, $mm, $yy) = split('[/.-]', strip_tags(htmlentities($_POST['side_ltr_tgl'])) );
		$side_ltr_tgl = $yy.'-'.$mm.'-'.$dd;
	}
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

//	$nama_mitra 				= strip_tags(htmlentities($_POST['nama_mitra']));
//	$nama_proyek 				= strip_tags(htmlentities($_POST['nama_proyek']));
//	$kontrak_no 				= strip_tags(htmlentities($_POST['kontrak_no']));
//	$po_sp_no 					= strip_tags(htmlentities($_POST['po_sp_no']));
//	$amandemen_no 				= strip_tags(htmlentities($_POST['amandemen_no']));
//	$keterangan_value 			= strip_tags(htmlentities($_POST['keterangan_value']));
//	$kontrak_tgl				= strip_tags(htmlentities($_POST['kontrak_tgl']));
//	$po_sp_tgl					= strip_tags(htmlentities($_POST['po_sp_tgl']));
//	$amandemen_tgl				= strip_tags(htmlentities($_POST['amandemen_tgl']));
//	$kontrak_currency			= strip_tags(htmlentities($_POST['kontrak_currency']));
//	$po_sp_currency				= strip_tags(htmlentities($_POST['po_sp_currency']));
//	$amandemen_currency			= strip_tags(htmlentities($_POST['amandemen_currency']));
//	$kontrak_amount				= strip_tags(htmlentities($_POST['kontrak_amount']));
//	$po_sp_amount				= strip_tags(htmlentities($_POST['po_sp_amount']));
//	$amandemen_amount			= strip_tags(htmlentities($_POST['amandemen_amount']));
//	$tagihan_no					= strip_tags(htmlentities($_POST['tagihan_no']));		
//	$invoice_no					= strip_tags(htmlentities($_POST['invoice_no']));		
//	$tagihan_tgl				= strip_tags(htmlentities($_POST['tagihan_tgl']));
//	$invoice_tgl				= strip_tags(htmlentities($_POST['invoice_tgl']));
//	$tagihan_tgl_masuk			= strip_tags(htmlentities($_POST['tagihan_tgl_masuk']));
//	$invoice_tgl_masuk			= strip_tags(htmlentities($_POST['invoice_tgl_masuk']));
//	$po_non_ppn_currency		= strip_tags(htmlentities($_POST['po_non_ppn_currency']));
//	$po_non_ppn_amount			= strip_tags(htmlentities($_POST['po_non_ppn_amount']));
//	$po_non_ppn_amd_currency	= strip_tags(htmlentities($_POST['po_non_ppn_amd_currency']));
//	$po_non_ppn_amd_amount		= strip_tags(htmlentities($_POST['po_non_ppn_amd_amount']));
//	$po_non_ppn_thp_rekon		= strip_tags(htmlentities($_POST['po_non_ppn_thp_rekon']));
//	$bts_akhir_kerja_no			= strip_tags(htmlentities($_POST['bts_akhir_kerja_no']));
//	$bast_non_ppn_tgl_baut		= strip_tags(htmlentities($_POST['bast_non_ppn_tgl_baut']));
//	$bast_non_ppn_tgl_bast		= strip_tags(htmlentities($_POST['bast_non_ppn_tgl_bast']));
//	$bast_non_ppn_barang		= strip_tags(htmlentities($_POST['bast_non_ppn_barang']));
//	$bast_non_ppn_barang		= strip_tags(htmlentities($_POST['bast_non_ppn_barang']));
//	$bast_non_ppn_currency		= strip_tags(htmlentities($_POST['bast_non_ppn_currency']));
//	$bast_non_ppn_amount		= strip_tags(htmlentities($_POST['bast_non_ppn_amount']));
//	$ptgn_uang_muka_currency	= strip_tags(htmlentities($_POST['ptgn_uang_muka_currency']));
//	$ptgn_uang_muka_amount		= strip_tags(htmlentities($_POST['ptgn_uang_muka_amount']));
//	$kuitansi_currency			= strip_tags(htmlentities($_POST['kuitansi_currency']));
//	$kuitansi_amount			= strip_tags(htmlentities($_POST['kuitansi_amount']));
//	$rekening_ats_nm			= strip_tags(htmlentities($_POST['rekening_ats_nm']));
//	$pajak_currency				= strip_tags(htmlentities($_POST['pajak_currency']));
//	$pajak_amount				= strip_tags(htmlentities($_POST['pajak_amount']));
//	$jamn_uang_muka_currency	= strip_tags(htmlentities($_POST['jamn_uang_muka_currency']));
//	$jamn_uang_muka_amount		= strip_tags(htmlentities($_POST['jamn_uang_muka_amount']));
//	$jamn_plksa_currency		= strip_tags(htmlentities($_POST['jamn_plksa_currency']));
//	$jamn_plksa_amount			= strip_tags(htmlentities($_POST['jamn_plksa_amount']));
//	$jamn_pmhr_currency			= strip_tags(htmlentities($_POST['jamn_pmhr_currency']));
//	$jamn_pmhr_amount			= strip_tags(htmlentities($_POST['jamn_pmhr_amount']));
//	$kuitansi_atau				= strip_tags(htmlentities($_POST['kuitansi_atau']));
//	$rekening_currency			= strip_tags(htmlentities($_POST['rekening_currency']));
//	$rekening_amount			= strip_tags(htmlentities($_POST['rekening_amount']));
//	$kuitansi_no				= strip_tags(htmlentities($_POST['kuitansi_no']));		
//	$rekening_bank				= strip_tags(htmlentities($_POST['rekening_bank']));
//	$rekening_switch			= strip_tags(htmlentities($_POST['rekening_switch']));
//	$pajak_no					= strip_tags(htmlentities($_POST['pajak_no']));		
//	$jamn_uang_muka_assr		= strip_tags(htmlentities($_POST['jamn_uang_muka_assr']));		
//	$jamn_plksa_assr			= strip_tags(htmlentities($_POST['jamn_plksa_assr']));				
//	$jamn_pmhr_assr				= strip_tags(htmlentities($_POST['jamn_pmhr_assr']));		
//	$pajak_tgl					= strip_tags(htmlentities($_POST['pajak_tgl']));
//	$jamn_uang_muka_expired		= strip_tags(htmlentities($_POST['jamn_uang_muka_expired']));
//	$jamn_plksa_expired			= strip_tags(htmlentities($_POST['jamn_plksa_expired']));
//	$jamn_pmhr_expired			= strip_tags(htmlentities($_POST['jamn_pmhr_expired']));
//	$pls_asu_expired			= strip_tags(htmlentities($_POST['pls_asu_expired']));
//	$tt_bld_draw_tgl			= strip_tags(htmlentities($_POST['tt_bld_draw_tgl']));
//	$siujk_tgl					= strip_tags(htmlentities($_POST['siujk_tgl']));
//	$npwp_tgl					= strip_tags(htmlentities($_POST['npwp_tgl']));
//	$dgt_tgl					= strip_tags(htmlentities($_POST['dgt_tgl']));
//	$side_ltr_tgl				= strip_tags(htmlentities($_POST['side_ltr_tgl']));
//	$pls_asu_no					= strip_tags(htmlentities($_POST['pls_asu_no']));				
//	$pls_asu_assr				= strip_tags(htmlentities($_POST['pls_asu_assr']));				
//	$tt_bld_draw_no				= strip_tags(htmlentities($_POST['tt_bld_draw_no']));				
//	$siujk_no					= strip_tags(htmlentities($_POST['siujk_no']));				
//	$npwp_no					= strip_tags(htmlentities($_POST['npwp_no']));				
//	$dgt_no						= strip_tags(htmlentities($_POST['dgt_no']));				
//	$side_ltr_no				= strip_tags(htmlentities($_POST['side_ltr_no']));				
//	$po_migo_value				= strip_tags(htmlentities($_POST['po_migo_value']));
//	
//	$tagihan_1					= strip_tags(htmlentities($_POST['tagihan_1']));
//	$invoice_1					= strip_tags(htmlentities($_POST['invoice_1']));
//	$po_non_ppn_1				= strip_tags(htmlentities($_POST['po_non_ppn_1']));
//	$bts_akhir_kerja_1			= strip_tags(htmlentities($_POST['bts_akhir_kerja_1']));
//	$bast_non_ppn_1				= strip_tags(htmlentities($_POST['bast_non_ppn_1']));
//	$ptgn_uang_muka_1			= strip_tags(htmlentities($_POST['ptgn_uang_muka_1']));
//	$kuitansi_1					= strip_tags(htmlentities($_POST['kuitansi_1']));
//	$rekening_1					= strip_tags(htmlentities($_POST['rekening_1']));
//	$pajak_1					= strip_tags(htmlentities($_POST['pajak_1']));
//	$jamn_uang_muka_1			= strip_tags(htmlentities($_POST['jamn_uang_muka_1']));
//	$jamn_plksa_1				= strip_tags(htmlentities($_POST['jamn_plksa_1']));
//	$jamn_pmhr_1				= strip_tags(htmlentities($_POST['jamn_pmhr_1']));
//	$pls_asu_1					= strip_tags(htmlentities($_POST['pls_asu_1']));
//	$tt_bld_draw_1				= strip_tags(htmlentities($_POST['tt_bld_draw_1']));
//	$siujk_1					= strip_tags(htmlentities($_POST['siujk_1']));
//	$npwp_1						= strip_tags(htmlentities($_POST['npwp_1']));
//	$dgt_1						= strip_tags(htmlentities($_POST['dgt_1']));
//	$side_ltr_1					= strip_tags(htmlentities($_POST['side_ltr_1']));
//	$rekon_wkt_1				= strip_tags(htmlentities($_POST['rekon_wkt_1']));
//	$po_migo_1					= strip_tags(htmlentities($_POST['po_migo_1']));
//	
////	$tagihan_0					= strip_tags(htmlentities($_POST['tagihan_0']));
////	$invoice_0					= strip_tags(htmlentities($_POST['invoice_0']));
////	$po_non_ppn_0				= strip_tags(htmlentities($_POST['po_non_ppn_0']));
////	$bts_akhir_kerja_0			= strip_tags(htmlentities($_POST['bts_akhir_kerja_0']));
////	$bast_non_ppn_0				= strip_tags(htmlentities($_POST['bast_non_ppn_0']));
////	$ptgn_uang_muka_0			= strip_tags(htmlentities($_POST['ptgn_uang_muka_0']));
////	$kuitansi_0					= strip_tags(htmlentities($_POST['kuitansi_0']));
////	$rekening_0					= strip_tags(htmlentities($_POST['rekening_0']));
////	$pajak_0					= strip_tags(htmlentities($_POST['pajak_0']));
////	$jamn_uang_muka_0			= strip_tags(htmlentities($_POST['jamn_uang_muka_0']));
////	$jamn_plksa_0				= strip_tags(htmlentities($_POST['jamn_plksa_0']));
////	$jamn_pmhr_0				= strip_tags(htmlentities($_POST['jamn_pmhr_0']));
////	$pls_asu_0					= strip_tags(htmlentities($_POST['pls_asu_0']));
////	$tt_bld_draw_0				= strip_tags(htmlentities($_POST['tt_bld_draw_0']));
////	$siujk_0					= strip_tags(htmlentities($_POST['siujk_0']));
////	$npwp_0						= strip_tags(htmlentities($_POST['npwp_0']));
////	$dgt_0						= strip_tags(htmlentities($_POST['dgt_0']));
////	$side_ltr_0					= strip_tags(htmlentities($_POST['side_ltr_0']));
////	$rekon_wkt_0				= strip_tags(htmlentities($_POST['rekon_wkt_0']));
////	$po_migo_0					= strip_tags(htmlentities($_POST['po_migo_0']));
//
//if( $tagihan_1 == 'X' ) { $tagihan_mark = 'X'; }
//if( $invoice_1 == 'X' ) { $invoice_mark = 'X'; }
//if( $po_non_ppn_1 == 'X' ) { $po_non_ppn_mark = 'X'; }
//if( $bts_akhir_kerja_1 == 'X' ) { $bts_akhir_kerja_mark = 'X'; }
//if( $bast_non_ppn_1 == 'X' ) { $bast_non_ppn_mark = 'X'; }
//if( $ptgn_uang_muka_1 == 'X' ) { $ptgn_uang_muka_mark = 'X'; }
//if( $kuitansi_1 == 'X' ) { $kuitansi_mark = 'X'; }
//if( $rekening_1 == 'X' ) { $rekening_mark = 'X'; }
//if( $pajak_1 == 'X' ) { $pajak_mark = 'X'; }
//if( $jamn_uang_muka_1 == 'X' ) { $jamn_uang_muka_mark = 'X'; }
//if( $jamn_plksa_1 == 'X' ) { $jamn_plksa_mark = 'X'; }
//if( $jamn_pmhr_1 == 'X' ) { $jamn_pmhr_mark = 'X'; }
//if( $pls_asu_1 == 'X' ) { $pls_asu_mark = 'X'; }
//if( $tt_bld_draw_1 == 'X' ) { $tt_bld_draw_mark = 'X'; }
//if( $siujk_1 == 'X' ) { $siujk_mark = 'X'; }
//if( $npwp_1 == 'X' ) { $npwp_mark = 'X'; }
//if( $dgt_1 == 'X' ) { $dgt_mark = 'X'; }
//if( $side_ltr_1 == 'X' ) { $side_ltr_mark = 'X'; }
//if( $rekon_wkt_1 == 'X' ) { $rekon_wkt_mark = 'X'; }
//if( $po_migo_1 == 'X' ) { $po_migo_mark = 'X'; }
//
//	$get_year 		= date("Y");
//	$get_month		= date("m");
//	$get_level		= 'OSM';
//	$get_number     = mysql_query(' 
//					  SELECT * FROM trx_number
//					  WHERE year = "'.$get_year.'"'
//					  );
//	$get_number_rw	= mysql_num_rows($get_number); // Get the number of rows
//	$get_number_rw	= mysql_num_rows($get_number); // Get the number of rows
//	if($get_number_rw <= 0){ 
//		echo 0; // Please Maintain Running Number TRX_NUMBER
//	} else {
//		$get_number_fetch = mysql_fetch_array($get_number);
//	  $get_number_found 	= $get_number_fetch['CURRENT_DOC_NUMB'];
//	  $get_number_found     = $get_number_found + 1;
//
////	  //UPDATE `smart_fca`.`trx_number` SET `CURRENT_DOC_NUMB` = '1000000001' WHERE `trx_number`.`YEAR` = '2014';
////	  //INSERT INTO `smart_fca`.`trx_number` (`DOC_NUMB_START`, `YEAR`, `CURRENT_DOC_NUMB`) VALUES ('1000000000', '2016', '1000000000');
//		$query			= mysql_query("
//						  INSERT INTO smart_fca.trx_detail
//						  ( DOC_NUMBER, YEAR, MONTH, LEVEL, NAMA_MITRA, NAMA_PROYEK )
//						  VALUES
//						  ( '".$get_number_found."', '".$get_year."', '".$get_month."', '".$get_level."', '".$nama_mitra."', '".$nama_proyek."' )										
//						  "); // Insert to table
//		$cek_error = mysql_errno();
//		if($cek_error == 0){ // If any error.	
//			echo 1;
//		} else {
//			echo 2; // Error Insert data
//		}
//	}
}

?>