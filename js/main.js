/*
░░░░░░░▄▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▄░░░░░░
░░░░░░█░░▄▀▀▀▀▀▀▀▀▀▀▀▀▀▄░░█░░░░░
░░░░░░█░█░▀░░░░░▀░░▀░░░░█░█░░░░░
░░░░░░█░█░░░░░░░░▄▀▀▄░▀░█░█▄▀▀▄░
█▀▀█▄░█░█░░▀░░░░░█░░░▀▄▄█▄▀░░░█░
▀▄▄░▀██░█▄░▀░░░▄▄▀░░░░░░░░░░░░▀▄
░░▀█▄▄█░█░░░░▄░░█░░░▄█░░░▄░▄█░░█
░░░░░▀█░▀▄▀░░░░░█░██░▄░░▄░░▄░███
░░░░░▄█▄░░▀▀▀▀▀▀▀▀▄░░▀▀▀▀▀▀▀░▄▀░
░░░░█░░▄█▀█▀▀█▀▀▀▀▀▀█▀▀█▀█▀▀█░░░
░░░░▀▀▀▀░░▀▀▀░░░░░░░░▀▀▀░░▀▀░░░░*/


$(document).ready(function(){
			var submit = 0;
/* 			var div = $("#no_sap").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#true_currency").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#true_amount").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#po_sp_amount").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#kontrak_amount").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#po_sp_tgl").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#kontrak_tgl").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#keterangan_value").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#po_sp_currency").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#po_sp_no").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#kontrak_currency").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#kontrak_no").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#nama_proyek").parents("div.input-group");
			div.addClass("has-success");
			var div = $("#nama_mitra").parents("div.input-group");
			div.addClass("has-success"); */
	var submitcount = 0;
					
	//user account
	$('#savenewpass').click(function(){ // Create `click` event function for login
			// Get All data property
		var npass = $('#npass');	
		var rpass = $('#rpass');	
		var uid = $('#uid');
		if((rpass.val() == '' || npass.val() == '') || (npass.val() != rpass.val()) ){
			
			if(rpass.val() == '' || npass.val() == ''){
				var msg = '<div class="alert alert-danger" role="alert">Please complete all fields</div>';
			}else{
				var msg = '<div class="alert alert-danger" role="alert">Password doesnt match  </div>';
			}
			$("#savenewpass_msg").html(msg);
		}else{
		
		var UrlToSubmit = 'action=changepass&npass='+npass.val()+'&rpass='+rpass.val()+'&uid='+uid.val();
	
			$("#savenewpass_msg").html('');
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
				type : 'POST',
				data : UrlToSubmit,
				url  : 'admin/changepass.php',
				success: function(responseText){ // Get the result and asign to each cases
						
					$("#savenewpass_msg").html(responseText);	
					$('#npass').val('');
					$('#rpass').val('');
				}
			});
		}
	});
	
//	//approve_document
//	$('#approve_document').click(function(){ 
//		var div = $("#no_spb").parents("div.input-group");
//		div.removeClass("has-error");	
//		
//		if( no_spb.val() == '' ){
//			var div = $("#no_spb").parents("div.input-group");
//			div.addClass("has-error");	 
//		}else{
//			// Get All data property
//			var approve_data_no_spb = $('#approve_data_no_spb');
//			var approve_data_doc_num = $('#approve_data_doc_num');
//			var approve_data_doc_year = $('#approve_data_doc_year');
//			var approve_data_doc_month = $('#approve_data_doc_month');
//			var UrlToSubmit = 'docnum='+approve_data_doc_num.val()+'&year='+approve_data_doc_year.val()+'&month='+approve_data_doc_month.val()+'&no_spb='+approve_data_no_spb.val()+'approval=APPROVE';
//	
////			$("#savenewpass_msg").html('');
//			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
//				type : 'POST',
//				data : UrlToSubmit,
//				url  : 'admin/do_approve.php',
//				success: function(responseText){ // Get the result and asign to each cases
//						
//					//alert(responseText);	
//					$('#approve_data_no_spb').val('');
//					$('#approve_data_doc_num').val('');
//					$('#approve_data_doc_year').val('');;
//					$('#approve_data_doc_month').val('');;
//				}
//			});
//		}
//	});
	
	//reject_document
	$('.reject_document').click(function(){ 
			// Get All data property
			var approve_data_no_spb = 'XXX';
			var approve_data_doc_num = $('#approve_data_doc_num');
			var approve_data_doc_year = $('#approve_data_doc_year');
			var approve_data_doc_month = $('#approve_data_doc_month');
			var UrlToSubmit = 'docnum='+approve_data_doc_num.val()+'&year='+approve_data_doc_year.val()+'&month='+approve_data_doc_month.val()+'&no_spb='+approve_data_no_spb+'&approval=REJECT';
	
//			$("#savenewpass_msg").html('');
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
				type : 'POST',
				data : UrlToSubmit,
				url  : 'admin/do_approve.php',
				success: function(responseText){ // Get the result and asign to each cases
						
					alert(responseText);	
//					approve_data_no_spb = '';
//					$('#approve_data_doc_num').val('');
//					$('#approve_data_doc_year').val('');;
//					$('#approve_data_doc_month').val('');;
				}
			});
	});
	
	//modal
	$(document).ready(function(){
		$('.history_modal').click(function(){ // Create `click` event function for login
			// Get All data property
		var user = $('#user');	
		var year = $('#year');	
		var doc_no = $('#doc_no');	
		var UrlToSubmit = 'action=submit_report&user='+user.val()+'&doc_no='+doc_no.val();
		//alert('tes');
		
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
				type : 'GET',
				data : UrlToSubmit,
				url  : 'admin/.php',
				success: function(responseText){ // Get the result and asign to each cases
						
					$("#result_report").html(responseText);	
					setdatatable();
				}
			});
			
		});
			
	});  
	
	//Submit_document
	$('#submit_off').click(function(){ // Create `click` event function for login
//<<<<<<< Updated upstream
//			if(submit != 0){
//				alert('REPOST COK');
//			};
//			submit = submit + 1;
		// clear all alert message v=1;
//=======
		if(submitcount == 0){
			submitcount = submitcount + 1; 
		}
		else{
			alert("Submit dokumen tidak dilakukan karena Anda melakukan submit lebih dari sekali, silahkan refresh halaman");
			return false;
		}
		
	  	if (confirm("Are you sure to Submit Document")) {
    		
  		} else {
    		return false;
		}
		// clear all alert message
//>>>>>>> Stashed changes
			var div = $("#po_migo_value").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#side_ltr_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#dgt_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#npwp_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#siujk_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tt_bld_draw_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pls_asu_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pls_asu_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#side_ltr_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#dgt_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#npwp_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#siujk_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tt_bld_draw_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pls_asu_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_pmhr_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_plksa_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_uang_muka_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pajak_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_pmhr_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_plksa_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_uang_muka_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pajak_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_switch").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_bank").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kuitansi_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kuitansi_atau").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_pmhr_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_plksa_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_uang_muka_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pajak_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_ats_nm").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kuitansi_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#ptgn_uang_muka_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_jasa").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_barang").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_tgl_bast").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_tgl_baut").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bts_akhir_kerja_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_non_ppn_thp_rekon").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_non_ppn_amd_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_non_ppn_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#invoice_tgl_masuk").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tagihan_tgl_masuk").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#invoice_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tagihan_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#invoice_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tagihan_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#no_spb").parents("div.input-group");
			div.removeClass("has-error");
			var div = $("#no_sap").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#true_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#amandemen_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_sp_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kontrak_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#amandemen_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_sp_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kontrak_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#keterangan_value").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#amandemen_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_sp_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kontrak_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#nama_proyek").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#nama_mitra").parents("div.input-group");
			div.removeClass("has-error");	
			
		// Get All data property
		var nama_mitra 				= $('#nama_mitra');
		var nama_proyek 			= $('#nama_proyek');
		var kontrak_no 				= $('#kontrak_no');
		var po_sp_no 				= $('#po_sp_no');
		var amandemen_no 			= $('#amandemen_no');
		var keterangan_value 		= $('#keterangan_value');
		var kontrak_tgl				= $('#kontrak_tgl');
		var po_sp_tgl				= $('#po_sp_tgl');
		var amandemen_tgl			= $('#amandemen_tgl');
		var kontrak_currency		= $('#kontrak_currency');
		var po_sp_currency			= $('#po_sp_currency');
		var amandemen_currency		= $('#amandemen_currency');
		var kontrak_amount			= $('#kontrak_amount');
		var po_sp_amount			= $('#po_sp_amount');
		var amandemen_amount		= $('#amandemen_amount');
		
		var tagihan_1;				//= $('#tagihan_1');
		if (document.getElementById('tagihan_1').checked){ tagihan_1 = 'X'; } else { tagihan_1 = ''; }
		var invoice_1;				//= $('#invoice_1');
		if (document.getElementById('invoice_1').checked){ invoice_1 = 'X'; } else { invoice_1 = ''; }
		var po_non_ppn_1;			//= $('#po_non_ppn_1');
		if (document.getElementById('po_non_ppn_1').checked){ po_non_ppn_1 = 'X'; } else { po_non_ppn_1 = ''; }
		var bts_akhir_kerja_1;		//= $('#bts_akhir_kerja_1');
		if (document.getElementById('bts_akhir_kerja_1').checked){ bts_akhir_kerja_1 = 'X'; } else { bts_akhir_kerja_1 = ''; }
		var bast_non_ppn_1;			//= $('#bast_non_ppn_1');
		if (document.getElementById('bast_non_ppn_1').checked){ bast_non_ppn_1 = 'X'; } else { bast_non_ppn_1 = ''; }
		var ptgn_uang_muka_1;		//= $('#ptgn_uang_muka_1');
		if (document.getElementById('ptgn_uang_muka_1').checked){ ptgn_uang_muka_1 = 'X'; } else { ptgn_uang_muka_1 = ''; }
		var kuitansi_1;				//= $('#kuitansi_1');
		if (document.getElementById('kuitansi_1').checked){ kuitansi_1 = 'X'; } else { kuitansi_1 = ''; }
		var rekening_1;				//= $('#rekening_1');
		if (document.getElementById('rekening_1').checked){ rekening_1 = 'X'; } else { rekening_1 = ''; }
		var pajak_1;					//= $('#pajak_1');
		if (document.getElementById('pajak_1').checked){ pajak_1 = 'X'; } else { pajak_1 = ''; }
		var jamn_uang_muka_1;		//= $('#jamn_uang_muka_1');
		if (document.getElementById('jamn_uang_muka_1').checked){ jamn_uang_muka_1 = 'X'; } else { jamn_uang_muka_1 = ''; }
		var jamn_plksa_1;			//= $('#jamn_plksa_1');
		if (document.getElementById('jamn_plksa_1').checked){ jamn_plksa_1 = 'X'; } else { jamn_plksa_1 = ''; }
		var jamn_pmhr_1;				//= $('#jamn_pmhr_1');
		if (document.getElementById('jamn_pmhr_1').checked){ jamn_pmhr_1 = 'X'; } else { jamn_pmhr_1 = ''; }
		var pls_asu_1;				//= $('#pls_asu_1');
		if (document.getElementById('pls_asu_1').checked){ pls_asu_1 = 'X'; } else { pls_asu_1 = ''; }
		var tt_bld_draw_1;			//= $('#tt_bld_draw_1');
		if (document.getElementById('tt_bld_draw_1').checked){ tt_bld_draw_1 = 'X'; } else { tt_bld_draw_1 = ''; }
		var siujk_1;					//= $('#siujk_1');
		if (document.getElementById('siujk_1').checked){ siujk_1 = 'X'; } else { siujk_1 = ''; }
		var npwp_1;					//= $('#npwp_1');
		if (document.getElementById('npwp_1').checked){ npwp_1 = 'X'; } else { npwp_1 = ''; }
		var dgt_1;					//= $('#dgt_1');
		if (document.getElementById('dgt_1').checked){ dgt_1 = 'X'; } else { dgt_1 = ''; }
		var side_ltr_1;				//= $('#side_ltr_1');
		if (document.getElementById('side_ltr_1').checked){ side_ltr_1 = 'X'; } else { side_ltr_1 = ''; }
		var rekon_wkt_1;				//= $('#rekon_wkt_1');
		if (document.getElementById('rekon_wkt_1').checked){ rekon_wkt_1 = 'X'; } else { rekon_wkt_1 = ''; }
		var po_migo_1;				//= $('#po_migo_1');
		if (document.getElementById('po_migo_1').checked){ po_migo_1 = 'X'; } else { po_migo_1 = ''; }
		
		var tagihan_no				= $('#tagihan_no');		
		var invoice_no				= $('#invoice_no');		
		var tagihan_tgl				= $('#tagihan_tgl');
		var invoice_tgl				= $('#invoice_tgl');
		var tagihan_tgl_masuk		= $('#tagihan_tgl_masuk');
		var invoice_tgl_masuk		= $('#invoice_tgl_masuk');
		var po_non_ppn_currency		= $('#po_non_ppn_currency');
		var po_non_ppn_amount		= $('#po_non_ppn_amount');
		var po_non_ppn_amd_currency	= $('#po_non_ppn_amd_currency');
		var po_non_ppn_amd_amount	= $('#po_non_ppn_amd_amount');
		var po_non_ppn_thp_rekon	= $('#po_non_ppn_thp_rekon');
		var bts_akhir_kerja_no		= $('#bts_akhir_kerja_no');
		var bast_non_ppn_tgl_baut	= $('#bast_non_ppn_tgl_baut');
		var bast_non_ppn_tgl_bast	= $('#bast_non_ppn_tgl_bast');
		var bast_non_ppn_barang		= $('#bast_non_ppn_barang');
		var bast_non_ppn_jasa		= $('#bast_non_ppn_jasa');
		var bast_non_ppn_currency	= $('#bast_non_ppn_currency');
		var bast_non_ppn_amount		= $('#bast_non_ppn_amount');
		var ptgn_uang_muka_currency	= $('#ptgn_uang_muka_currency');
		var ptgn_uang_muka_amount	= $('#ptgn_uang_muka_amount');
		var kuitansi_currency		= $('#kuitansi_currency');
		var kuitansi_amount			= $('#kuitansi_amount');
		var rekening_ats_nm			= $('#rekening_ats_nm');
		var pajak_currency			= $('#pajak_currency');
		var pajak_amount			= $('#pajak_amount');
		var jamn_uang_muka_currency	= $('#jamn_uang_muka_currency');
		var jamn_uang_muka_amount	= $('#jamn_uang_muka_amount');
		var jamn_plksa_currency		= $('#jamn_plksa_currency');
		var jamn_plksa_amount		= $('#jamn_plksa_amount');

		var jamn_pmhr_currency		= $('#jamn_pmhr_currency');
		var jamn_pmhr_amount		= $('#jamn_pmhr_amount');
		var kuitansi_dpp			= $('#kuitansi_dpp');
		var rekening_currency		= $('#rekening_currency');
		var rekening_amount			= $('#rekening_amount');
		var kuitansi_no				= $('#kuitansi_no');		
		var rekening_bank			= $('#rekening_bank');
		var rekening_switch			= $('#rekening_switch');
		var pajak_no				= $('#pajak_no');		
		var jamn_uang_muka_assr		= $('#jamn_uang_muka_assr');		
		var jamn_plksa_assr			= $('#jamn_plksa_assr');				
		var jamn_pmhr_assr			= $('#jamn_pmhr_assr');		
		var pajak_tgl				= $('#pajak_tgl');
		var jamn_uang_muka_expired	= $('#jamn_uang_muka_expired');
		var jamn_plksa_expired		= $('#jamn_plksa_expired');
		var jamn_pmhr_expired		= $('#jamn_pmhr_expired');
		var pls_asu_expired			= $('#pls_asu_expired');
		var tt_bld_draw_tgl			= $('#tt_bld_draw_tgl');
		var siujk_tgl				= $('#siujk_tgl');
		var npwp_tgl				= $('#npwp_tgl');
		var dgt_tgl					= $('#dgt_tgl');
		var side_ltr_tgl			= $('#side_ltr_tgl');
		var pls_asu_no				= $('#pls_asu_no');				
		var pls_asu_assr			= $('#pls_asu_assr');				
		var tt_bld_draw_no			= $('#tt_bld_draw_no');				
		var siujk_no				= $('#siujk_no');				
		var npwp_no					= $('#npwp_no');				
		var dgt_no					= $('#dgt_no');				
		var side_ltr_no				= $('#side_ltr_no');				
		var po_migo_value			= $('#po_migo_value');
		
		var true_amount				= $('#true_amount');
		var true_currency			= $('#true_currency');
		var start_time				= $('#start_time');
		var area					= $('#area');
		var no_sap					= $('#no_sap');
		var no_spb					= $('#no_spb');
		
		var incomplete				= $('#incomplete');
		
		var park_doc_number			= $('#park_doc_number');
		var park_year				= $('#park_year');
		var park_month				= $('#park_month');
		var park_level				= $('#park_level');
		var park_area				= $('#park_area');
		
		var foreign_amount			= $('#foreign_amount');
		var foreign_currency		= $('#foreign_currency');
		
// cek ga boleh kosong untuk entry nya
		var kosong = '0';

		if ( (!document.getElementById('po_migo_1').checked) && (!document.getElementById('po_migo_0').checked) ){ 
			var div = $("#po_migo_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#po_migo_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#po_migo_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#po_migo_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('po_migo_1').checked){
				if(po_migo_value.val() == ''){ 
					po_migo_value.focus(); // focus to the filed 
					//$('#po_migo_value').val("Enter No Kontrak");
					var div = $("#po_migo_value").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#po_migo_value").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('20');
			}
		}
		

		if ( (!document.getElementById('rekon_wkt_1').checked) && (!document.getElementById('rekon_wkt_0').checked) ){ 
			var div = $("#rekon_wkt_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#rekon_wkt_0").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';	
		} else {
			var div = $("#rekon_wkt_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#rekon_wkt_0").parents("div.input-group");
			div.removeClass("has-error");
			
		}

	
		if ( (!document.getElementById('side_ltr_1').checked) && (!document.getElementById('side_ltr_0').checked) ){ 
			var div = $("#side_ltr_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#side_ltr_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#side_ltr_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#side_ltr_0").parents("div.input-group");
			div.removeClass("has-error");
		
			if(document.getElementById('side_ltr_1').checked){
				if(side_ltr_no.val() == ''){ 
					side_ltr_no.focus(); // focus to the filed 
					//$('#side_ltr_no').val("Enter No Kontrak");
					var div = $("#side_ltr_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#side_ltr_no").parents("div.input-group");
					div.removeClass("has-error");	
				}	
		//				alert('19');
				if(side_ltr_tgl.val() == ''){ 
					//side_ltr_tgl.focus(); // focus to the filed 
					//$('#side_ltr_tgl').val("Enter No Kontrak");
					var div = $("#side_ltr_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#side_ltr_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('12');	
			}
		}
	
	
		if ( (!document.getElementById('dgt_1').checked) && (!document.getElementById('dgt_0').checked) ){ 
			var div = $("#dgt_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#dgt_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#dgt_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#dgt_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('dgt_1').checked){
				if(dgt_no.val() == ''){ 
					dgt_no.focus(); // focus to the filed 
					//$('#dgt_no').val("Enter No Kontrak");
					var div = $("#dgt_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#dgt_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('18');
				if(dgt_tgl.val() == ''){ 
					//dgt_tgl.focus(); // focus to the filed 
					//$('#dgt_tgl').val("Enter No Kontrak");
					var div = $("#dgt_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#dgt_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('11');

			}
		}
	

		if ( (!document.getElementById('npwp_1').checked) && (!document.getElementById('npwp_0').checked) ){ 
			var div = $("#npwp_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#npwp_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#npwp_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#npwp_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('npwp_1').checked){
				if(npwp_no.val() == ''){ 
					npwp_no.focus(); // focus to the filed 
					//$('#npwp_no').val("Enter No Kontrak");
					var div = $("#npwp_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#npwp_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('17');
				if(npwp_tgl.val() == ''){ 
					//npwp_tgl.focus(); // focus to the filed 
					//$('#npwp_tgl').val("Enter No Kontrak");
					var div = $("#npwp_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#npwp_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('10');
			}
		}


		if ( (!document.getElementById('siujk_1').checked) && (!document.getElementById('siujk_0').checked) ){ 
			var div = $("#siujk_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#siujk_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#siujk_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#siujk_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('siujk_1').checked){
				if(siujk_no.val() == ''){ 
					siujk_no.focus(); // focus to the filed 
					//$('#siujk_no').val("Enter No Kontrak");
					var div = $("#siujk_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#siujk_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('16');
				if(siujk_tgl.val() == ''){ 
					//siujk_tgl.focus(); // focus to the filed 
					//$('#siujk_tgl').val("Enter No Kontrak");
					var div = $("#siujk_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#siujk_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('09');	
			}
		}

		if ( (!document.getElementById('tt_bld_draw_1').checked) && (!document.getElementById('tt_bld_draw_0').checked) ){ 
			var div = $("#tt_bld_draw_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#tt_bld_draw_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#tt_bld_draw_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#tt_bld_draw_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('tt_bld_draw_1').checked){
				if(tt_bld_draw_no.val() == ''){ 
					tt_bld_draw_no.focus(); // focus to the filed 
					//$('#tt_bld_draw_no').val("Enter No Kontrak");
					var div = $("#tt_bld_draw_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#tt_bld_draw_no").parents("div.input-group");
					div.removeClass("has-error");	
				}	
		//				alert('15');	
				if(tt_bld_draw_tgl.val() == ''){ 
					//tt_bld_draw_tgl.focus(); // focus to the filed 
					//$('#tt_bld_draw_tgl').val("Enter No Kontrak");
					var div = $("#tt_bld_draw_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#tt_bld_draw_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('08');
			}
		}


		if ( (!document.getElementById('pls_asu_1').checked) && (!document.getElementById('pls_asu_0').checked) ){ 
			var div = $("#pls_asu_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#pls_asu_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#pls_asu_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#pls_asu_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('pls_asu_1').checked){
				if(pls_asu_no.val() == ''){ 
					pls_asu_no.focus(); // focus to the filed 
					//$('#pls_asu_no').val("Enter No Kontrak");
					var div = $("#pls_asu_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#pls_asu_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('13');
				if(pls_asu_assr.val() == ''){ 
					pls_asu_assr.focus(); // focus to the filed 
					//$('#pls_asu_assr').val("Enter No Kontrak");
					var div = $("#pls_asu_assr").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#pls_asu_assr").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('14');
				if(pls_asu_expired.val() == ''){ 
					//pls_asu_expired.focus(); // focus to the filed 
					//$('#pls_asu_expired').val("Enter No Kontrak");
					var div = $("#pls_asu_expired").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#pls_asu_expired").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('07');	
			}
		}

		if ( (!document.getElementById('jamn_pmhr_1').checked) && (!document.getElementById('jamn_pmhr_0').checked) ){ 
			var div = $("#jamn_pmhr_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#jamn_pmhr_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#jamn_pmhr_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#jamn_pmhr_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('jamn_pmhr_1').checked){
				if(jamn_pmhr_amount.val() == ''){ 
					jamn_pmhr_amount.focus(); // focus to the filed 
					//$('#jamn_pmhr_amount').val("Enter No Kontrak");
					var div = $("#jamn_pmhr_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_pmhr_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01h');
				if(jamn_pmhr_assr.val() == ''){ 
					jamn_pmhr_assr.focus(); // focus to the filed 
					//$('#jamn_pmhr_assr').val("Enter No Kontrak");
					var div = $("#jamn_pmhr_assr").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_pmhr_assr").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('02');
				if(jamn_pmhr_expired.val() == ''){ 
					//jamn_pmhr_expired.focus(); // focus to the filed 
					//$('#jamn_pmhr_expired').val("Enter No Kontrak");
					var div = $("#jamn_pmhr_expired").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_pmhr_expired").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('06');
			}
		}

		if ( (!document.getElementById('jamn_plksa_1').checked) && (!document.getElementById('jamn_plksa_0').checked) ){ 
			var div = $("#jamn_plksa_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#jamn_plksa_0").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#jamn_plksa_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#jamn_plksa_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('jamn_plksa_1').checked){
				if(jamn_plksa_amount.val() == ''){ 
					jamn_plksa_amount.focus(); // focus to the filed 
					//$('#jamn_plksa_amount').val("Enter No Kontrak");
					var div = $("#jamn_plksa_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_plksa_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01i');
				if(jamn_plksa_assr.val() == ''){ 
					jamn_plksa_assr.focus(); // focus to the filed 
					//$('#jamn_plksa_assr').val("Enter No Kontrak");
					var div = $("#jamn_plksa_assr").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_plksa_assr").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01');
				if(jamn_plksa_expired.val() == ''){ 
					//jamn_plksa_expired.focus(); // focus to the filed 
					//$('#jamn_plksa_expired').val("Enter No Kontrak");
					var div = $("#jamn_plksa_expired").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_plksa_expired").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('05');
			}
		}

		if ( (!document.getElementById('jamn_uang_muka_1').checked) && (!document.getElementById('jamn_uang_muka_0').checked) ){ 
			var div = $("#jamn_uang_muka_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#jamn_uang_muka_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#jamn_uang_muka_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#jamn_uang_muka_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('jamn_uang_muka_1').checked){
				if(jamn_uang_muka_amount.val() == ''){ 
					jamn_uang_muka_amount.focus(); // focus to the filed 
					//$('#jamn_uang_muka_amount').val("Enter No Kontrak");
					var div = $("#jamn_uang_muka_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_uang_muka_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01j');
				if(jamn_uang_muka_assr.val() == ''){ 
					jamn_uang_muka_assr.focus(); // focus to the filed 
					//$('#jamn_uang_muka_assr').val("Enter No Kontrak");
					var div = $("#jamn_uang_muka_assr").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_uang_muka_assr").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01a');
				if(jamn_uang_muka_expired.val() == ''){ 
					//jamn_uang_muka_expired.focus(); // focus to the filed 
					//$('#jamn_uang_muka_expired').val("Enter No Kontrak");
					var div = $("#jamn_uang_muka_expired").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#jamn_uang_muka_expired").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('04');
			}
		}


		if ( (!document.getElementById('pajak_1').checked) && (!document.getElementById('pajak_0').checked) ){ 
			var div = $("#pajak_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#pajak_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#pajak_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#pajak_0").parents("div.input-group");
			div.removeClass("has-error");
		
			if(document.getElementById('pajak_1').checked){
				if(pajak_amount.val() == ''){ 
					pajak_amount.focus(); // focus to the filed 
					//$('#pajak_amount').val("Enter No Kontrak");
					var div = $("#pajak_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#pajak_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01k');  
				if(pajak_no.val() == ''){ 
					pajak_no.focus(); // focus to the filed 
					//$('#pajak_no').val("Enter No Kontrak");
					var div = $("#pajak_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#pajak_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01b');
				if(pajak_tgl.val() == ''){ 
					//pajak_tgl.focus(); // focus to the filed 
					//$('#pajak_tgl').val("Enter No Kontrak");
					var div = $("#pajak_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#pajak_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('03');
			}
		}

		if ( (!document.getElementById('rekening_1').checked) && (!document.getElementById('rekening_0').checked) ){ 
			var div = $("#rekening_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#rekening_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#rekening_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#rekening_0").parents("div.input-group");
			div.removeClass("has-error");
		
			if(document.getElementById('rekening_1').checked){
				if(rekening_ats_nm.val() == ''){ 
					rekening_ats_nm.focus(); // focus to the filed 
					//$('#rekening_ats_nm').val("Enter No Kontrak");
					var div = $("#rekening_ats_nm").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#rekening_ats_nm").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01l'); 
				if(rekening_amount.val() == ''){ 
					rekening_amount.focus(); // focus to the filed 
					//$('#rekening_amount').val("Enter No Kontrak");
					var div = $("#rekening_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#rekening_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01f');
				if(rekening_bank.val() == ''){ 
					rekening_bank.focus(); // focus to the filed 
					//$('#rekening_bank').val("Enter No Kontrak");
					var div = $("#rekening_bank").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#rekening_bank").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01d');
				if(rekening_switch.val() == ''){ 
					rekening_switch.focus(); // focus to the filed 
					//$('#rekening_switch').val("Enter No Kontrak");
					var div = $("#rekening_switch").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#rekening_switch").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01c');
			}
		}

		if ( (!document.getElementById('kuitansi_1').checked) && (!document.getElementById('kuitansi_0').checked) ){ 
			var div = $("#kuitansi_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#kuitansi_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#kuitansi_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#kuitansi_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('kuitansi_1').checked){
				if(kuitansi_amount.val() == ''){ 
					kuitansi_amount.focus(); // focus to the filed 
					//$('#kuitansi_amount').val("Enter No Kontrak");
					var div = $("#kuitansi_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#kuitansi_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01m'); 
				if(kuitansi_dpp.val() == ''){ 
					kuitansi_dpp.focus(); // focus to the filed 
					//$('#kuitansi_dpp').val("Enter No Kontrak");
					var div = $("#kuitansi_dpp").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#kuitansi_dpp").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01g');
				if(kuitansi_no.val() == ''){ 
					kuitansi_no.focus(); // focus to the filed 
					//$('#kuitansi_no').val("Enter No Kontrak");
					var div = $("#kuitansi_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#kuitansi_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01e');
			}
		}

		if ( (!document.getElementById('ptgn_uang_muka_1').checked) && (!document.getElementById('ptgn_uang_muka_0').checked) ){ 
			var div = $("#ptgn_uang_muka_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#ptgn_uang_muka_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#ptgn_uang_muka_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#ptgn_uang_muka_0").parents("div.input-group");
			div.removeClass("has-error");
			
			if(document.getElementById('ptgn_uang_muka_1').checked){
				if(ptgn_uang_muka_amount.val() == ''){ 
					ptgn_uang_muka_amount.focus(); // focus to the filed 
					//$('#ptgn_uang_muka_amount').val("Enter No Kontrak");
					var div = $("#ptgn_uang_muka_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#ptgn_uang_muka_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01n');
			}
			
		}

		if ( (!document.getElementById('bast_non_ppn_1').checked) && (!document.getElementById('bast_non_ppn_0').checked) ){ 
			var div = $("#bast_non_ppn_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#bast_non_ppn_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#bast_non_ppn_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#bast_non_ppn_0").parents("div.input-group");
			div.removeClass("has-error");	
			
			if(document.getElementById('bast_non_ppn_1').checked){
				if(bast_non_ppn_amount.val() == ''){ 
					bast_non_ppn_amount.focus(); // focus to the filed 
					//$('#bast_non_ppn_amount').val("Enter No Kontrak");
					var div = $("#bast_non_ppn_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#bast_non_ppn_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01o');
				if(bast_non_ppn_barang.val() == ''){ 
					bast_non_ppn_barang.focus(); // focus to the filed 
					//$('#bast_non_ppn_barang').val("Enter No Kontrak");
					var div = $("#bast_non_ppn_barang").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#bast_non_ppn_barang").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01q');
				if(bast_non_ppn_jasa.val() == ''){ 
					bast_non_ppn_jasa.focus(); // focus to the filed 
					//$('#bast_non_ppn_jasa').val("Enter No Kontrak");
					var div = $("#bast_non_ppn_jasa").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#bast_non_ppn_jasa").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01p');
				if(bast_non_ppn_tgl_baut.val() == ''){ 
					//bast_non_ppn_tgl_baut.focus(); // focus to the filed 
					//$('#bast_non_ppn_tgl_baut').val("Enter No Kontrak");
					var div = $("#bast_non_ppn_tgl_baut").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#bast_non_ppn_tgl_baut").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01s'); 
				if(bast_non_ppn_tgl_bast.val() == ''){ 
					//bast_non_ppn_tgl_bast.focus(); // focus to the filed 
					//$('#bast_non_ppn_tgl_bast').val("Enter No Kontrak");
					var div = $("#bast_non_ppn_tgl_bast").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#bast_non_ppn_tgl_bast").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01r');
			}
				
		}


		if ( (!document.getElementById('bts_akhir_kerja_1').checked) && (!document.getElementById('bts_akhir_kerja_0').checked) ){ 
			var div = $("#bts_akhir_kerja_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#bts_akhir_kerja_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#bts_akhir_kerja_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#bts_akhir_kerja_0").parents("div.input-group");
			div.removeClass("has-error");	
			
			if(document.getElementById('bts_akhir_kerja_1').checked){
				if(bts_akhir_kerja_no.val() == ''){ 
					bts_akhir_kerja_no.focus(); // focus to the filed 
					//$('#bts_akhir_kerja_no').val("Enter No Kontrak");
					var div = $("#bts_akhir_kerja_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#bts_akhir_kerja_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01t');
			}
		}


		if ( (!document.getElementById('po_non_ppn_1').checked) && (!document.getElementById('po_non_ppn_0').checked) ){ 
			var div = $("#po_non_ppn_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#po_non_ppn_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#po_non_ppn_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#po_non_ppn_0").parents("div.input-group");
			div.removeClass("has-error");	
			
			if (document.getElementById('po_non_ppn_1').checked){
				if(po_non_ppn_amount.val() == ''){ 
					po_non_ppn_amount.focus(); // focus to the filed 
					//$('#po_non_ppn_amount').val("Enter No Kontrak");
					var div = $("#po_non_ppn_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#po_non_ppn_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01w'); 
				if(po_non_ppn_thp_rekon.val() == ''){ 
					po_non_ppn_thp_rekon.focus(); // focus to the filed 
					//$('#po_non_ppn_thp_rekon').val("Enter No Kontrak");
					var div = $("#po_non_ppn_thp_rekon").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#po_non_ppn_thp_rekon").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01u');
				if(po_non_ppn_amd_amount.val() == ''){ 
					po_non_ppn_amd_amount.focus(); // focus to the filed 
					//$('#po_non_ppn_amd_amount').val("Enter No Kontrak");
					var div = $("#po_non_ppn_amd_amount").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#po_non_ppn_amd_amount").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01v');
			}
		}


		if ( (!document.getElementById('invoice_1').checked) && (!document.getElementById('invoice_0').checked) ){ 
			var div = $("#invoice_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#invoice_0").parents("div.input-group");
			div.addClass("has-error");	
			kosong = '1';
		} else {
			var div = $("#invoice_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#invoice_0").parents("div.input-group");
			div.removeClass("has-error");	

			if(document.getElementById('invoice_1').checked){
				if(invoice_tgl_masuk.val() == '' || invoice_tgl_masuk.val() == '00/00/0000'){ 
					//invoice_tgl_masuk.focus(); // focus to the filed 
					//$('#invoice_tgl_masuk').val("Enter No Kontrak");
					var div = $("#invoice_tgl_masuk").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#invoice_tgl_masuk").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01x');
				if(invoice_tgl.val() == '' || invoice_tgl.val() == '00/00/0000'){ 
					//invoice_tgl.focus(); // focus to the filed 
					//$('#invoice_tgl').val("Enter No Kontrak");
					var div = $("#invoice_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#invoice_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01z');
				if(invoice_no.val() == ''){ 
					invoice_no.focus(); // focus to the filed 
					//$('#invoice_no').val("Enter No Kontrak");
					var div = $("#invoice_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#invoice_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('02b');
			}				
		}
				
				
		if ( (!document.getElementById('tagihan_1').checked) && (!document.getElementById('tagihan_0').checked) ){ 
			var div = $("#tagihan_1").parents("div.input-group");
			div.addClass("has-error");	 
			var div = $("#tagihan_0").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#tagihan_1").parents("div.input-group");
			div.removeClass("has-error");	 
			var div = $("#tagihan_0").parents("div.input-group");
			div.removeClass("has-error");	
				
			if(document.getElementById('tagihan_1').checked){
				if(tagihan_tgl_masuk.val() == '' || tagihan_tgl_masuk.val() == '00/00/0000'){ 
					//tagihan_tgl_masuk.focus(); // focus to the filed 
					//$('#tagihan_tgl_masuk').val("Enter No Kontrak");
					var div = $("#tagihan_tgl_masuk").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#tagihan_tgl_masuk").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('01y');
				if(tagihan_tgl.val() == '' || tagihan_tgl.val() == '00/00/0000'){ 
					//tagihan_tgl.focus(); // focus to the filed 
					//$('#tagihan_tgl').val("Enter No Kontrak");
					var div = $("#tagihan_tgl").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#tagihan_tgl").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('02a');
				if(tagihan_no.val() == ''){ 
					tagihan_no.focus(); // focus to the filed 
					//$('#tagihan_no').val("Enter No Kontrak");
					var div = $("#tagihan_no").parents("div.input-group");
					div.addClass("has-error");
					kosong = '1';
				} else {
					var div = $("#tagihan_no").parents("div.input-group");
					div.removeClass("has-error");	
				}
		//				alert('02c');
			}
		}

		
		if(no_sap.val() == ''){ 
			no_sap.focus(); // focus to the filed 
			//$('#no_sap').val("Enter No Kontrak");
			var div = $("#no_sap").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#no_sap").parents("div.input-group");
			div.removeClass("has-error");	
		}
		
		if(no_spb.val() == ''){ 
			no_spb.focus(); // focus to the filed 
			//$('#no_sap').val("Enter No Kontrak");
			var div = $("#no_spb").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#no_spb").parents("div.input-group");
			div.removeClass("has-error");	
		}
//				alert('02d');
		if(true_amount.val() == '' || true_amount.val() == 0){ 
			true_amount.focus(); // focus to the filed 
			//$('#true_amount').val("Enter No Kontrak");
			var div = $("#true_amount").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#true_amount").parents("div.input-group");
			div.removeClass("has-error");	
		}
//				alert('02e');
//		if(amandemen_amount.val() == '' || amandemen_amount.val() == 0){ 
//			amandemen_amount.focus(); // focus to the filed 
//			//$('#amandemen_amount').val("Enter No Kontrak");
//			var div = $("#amandemen_amount").parents("div.input-group");
//			div.addClass("has-error");
//			kosong = '1';
//		} else {
//			var div = $("#amandemen_amount").parents("div.input-group");
//			div.removeClass("has-error");	
//		}

////				alert('02f');
//		if(po_sp_amount.val() == '' || po_sp_amount.val() == 0){ 
//			po_sp_amount.focus(); // focus to the filed 
//			//$('#po_sp_amount').val("Enter No Kontrak");
//			var div = $("#po_sp_amount").parents("div.input-group");
//			div.addClass("has-error");
//			kosong = '1';
//		} else {
//			var div = $("#po_sp_amount").parents("div.input-group");
//			div.removeClass("has-error");	
//		}
		
//				alert('02g');
		if(kontrak_amount.val() == '' || kontrak_amount.val() == 0){ 
			kontrak_amount.focus(); // focus to the filed 
			//$('#kontrak_amount').val("Enter No Kontrak");
			var div = $("#kontrak_amount").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#kontrak_amount").parents("div.input-group");
			div.removeClass("has-error");	
		}
//				alert('02h');
//		if(amandemen_tgl.val() == '' || amandemen_tgl.val() == '00/00/0000'){ 
//			//amandemen_tgl.focus(); // focus to the filed 
//			//$('#amandemen_tgl').val("Enter No Kontrak");
//			var div = $("#amandemen_tgl").parents("div.input-group");
//			div.addClass("has-error");
//			kosong = '1';
//		} else {
//			var div = $("#amandemen_tgl").parents("div.input-group");
//			div.removeClass("has-error");	
//		}

////				alert('02i');
//		if(po_sp_tgl.val() == '' || po_sp_tgl.val() == '00/00/0000'){ 
//			//po_sp_tgl.focus(); // focus to the filed 
//			//$('#po_sp_tgl').val("Enter No Kontrak");
//			var div = $("#po_sp_tgl").parents("div.input-group");
//			div.addClass("has-error");
//			kosong = '1';
//		} else {
//			var div = $("#po_sp_tgl").parents("div.input-group");
//			div.removeClass("has-error");	
//		}

//				alert('02j');
		if(kontrak_tgl.val() == '' || kontrak_tgl.val() == '00/00/0000'){ 
			//kontrak_tgl.focus(); // focus to the filed 
			//$('#kontrak_tgl').val("Enter No Kontrak");
			var div = $("#kontrak_tgl").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#kontrak_tgl").parents("div.input-group");
			div.removeClass("has-error");	
		}
//				alert('02k');
		if(keterangan_value.val() == ''){ 
			keterangan_value.focus(); // focus to the filed 
			//$('#keterangan_value').val("Enter No Kontrak");
			var div = $("#keterangan_value").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#keterangan_value").parents("div.input-group");
			div.removeClass("has-error");	
		}
//				alert('02l');
//		if(amandemen_no.val() == ''){ 
//			amandemen_no.focus(); // focus to the filed 
//			//$('#amandemen_no').val("Enter No Kontrak");
//			var div = $("#amandemen_no").parents("div.input-group");
//			div.addClass("has-error");
//			kosong = '1';
//		} else {
//			var div = $("#amandemen_no").parents("div.input-group");
//			div.removeClass("has-error");	
//		}

////				alert('02m');
//		if(po_sp_no.val() == ''){ 
//			po_sp_no.focus(); // focus to the filed 
//			//$('#po_sp_no').val("Enter No Kontrak");
//			var div = $("#po_sp_no").parents("div.input-group");
//			div.addClass("has-error");
//			kosong = '1';
//		} else {
//			var div = $("#po_sp_no").parents("div.input-group");
//			div.removeClass("has-error");	
//		}

//				alert('02n');
		if(kontrak_no.val() == ''){ 
			kontrak_no.focus(); // focus to the filed 
			//$('#kontrak_no').val("Enter No Kontrak");
			var div = $("#kontrak_no").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#kontrak_no").parents("div.input-group");
			div.removeClass("has-error");	
		}
//				alert('02o');
		if(nama_proyek.val() == ''){
			nama_proyek.focus(); // focus to the filed 
			//$('#nama_proyek').val("Enter Nama Proyek");
			var div = $("#nama_proyek").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#nama_proyek").parents("div.input-group");
			div.removeClass("has-error");	
		}
////				alert('02p');
		if(nama_mitra.val() == ''){ 
			nama_mitra.focus(); // focus to the filed 
			//$('#nama_mitra').val("Enter Nama Mitra");
			var div = $("#nama_mitra").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#nama_mitra").parents("div.input-group");
			div.removeClass("has-error");	
		}		
//				alert('02q');
		if(kosong == '1'){
//			alert('ada yg kosong nih');
			return false;	
		}
// end of entry cek
//		alert('masuk ahhh');
//		return false;

		//if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToSubmit = 'action=submit_off&nama_mitra='+nama_mitra.val()+'&nama_proyek='+nama_proyek.val()+'&kontrak_no='+kontrak_no.val()+'&po_sp_no='+po_sp_no.val()+'&amandemen_no='+amandemen_no.val()+'&keterangan_value='+keterangan_value.val()+'&kontrak_tgl='+kontrak_tgl.val()+'&po_sp_tgl='+po_sp_tgl.val()+'&amandemen_tgl='+amandemen_tgl.val()+'&kontrak_currency='+kontrak_currency.val()+'&po_sp_currency='+po_sp_currency.val()+'&amandemen_currency='+amandemen_currency.val()+'&kontrak_amount='+kontrak_amount.val()+'&po_sp_amount='+po_sp_amount.val()+'&amandemen_amount='+amandemen_amount.val()+'&tagihan_1='+tagihan_1+'&invoice_1='+invoice_1+'&po_non_ppn_1='+po_non_ppn_1+'&bts_akhir_kerja_1='+bts_akhir_kerja_1+'&bast_non_ppn_1='+bast_non_ppn_1+'&ptgn_uang_muka_1='+ptgn_uang_muka_1+'&kuitansi_1='+kuitansi_1+'&rekening_1='+rekening_1+'&pajak_1='+pajak_1+'&jamn_uang_muka_1='+jamn_uang_muka_1+'&jamn_plksa_1='+jamn_plksa_1+'&jamn_pmhr_1='+jamn_pmhr_1+'&pls_asu_1='+pls_asu_1+'&tt_bld_draw_1='+tt_bld_draw_1+'&siujk_1='+siujk_1+'&npwp_1='+npwp_1+'&dgt_1='+dgt_1+'&side_ltr_1='+side_ltr_1+'&rekon_wkt_1='+rekon_wkt_1+'&po_migo_1='+po_migo_1+'&tagihan_no='+tagihan_no.val()+'&invoice_no='+invoice_no.val()+'&tagihan_tgl='+tagihan_tgl.val()+'&invoice_tgl='+invoice_tgl.val()+'&tagihan_tgl_masuk='+tagihan_tgl_masuk.val()+'&invoice_tgl_masuk='+invoice_tgl_masuk.val()+'&po_non_ppn_currency='+po_non_ppn_currency.val()+'&po_non_ppn_amount='+po_non_ppn_amount.val()+'&po_non_ppn_amd_currency='+po_non_ppn_amd_currency.val()+'&po_non_ppn_amd_amount='+po_non_ppn_amd_amount.val()+'&po_non_ppn_thp_rekon='+po_non_ppn_thp_rekon.val()+'&bts_akhir_kerja_no='+bts_akhir_kerja_no.val()+'&bast_non_ppn_tgl_baut='+bast_non_ppn_tgl_baut.val()+'&bast_non_ppn_tgl_bast='+bast_non_ppn_tgl_bast.val()+'&bast_non_ppn_barang='+bast_non_ppn_barang.val()+'&bast_non_ppn_jasa='+bast_non_ppn_jasa.val()+'&bast_non_ppn_currency='+bast_non_ppn_currency.val()+'&bast_non_ppn_amount='+bast_non_ppn_amount.val()+'&ptgn_uang_muka_currency='+ptgn_uang_muka_currency.val()+'&ptgn_uang_muka_amount='+ptgn_uang_muka_amount.val()+'&kuitansi_currency='+kuitansi_currency.val()+'&kuitansi_amount='+kuitansi_amount.val()+'&rekening_ats_nm='+rekening_ats_nm.val()+'&pajak_currency='+pajak_currency.val()+'&pajak_amount='+pajak_amount.val()+'&jamn_uang_muka_currency='+jamn_uang_muka_currency.val()+'&jamn_uang_muka_amount='+jamn_uang_muka_amount.val()+'&jamn_plksa_currency='+jamn_plksa_currency.val()+'&jamn_plksa_amount='+jamn_plksa_amount.val()+'&jamn_pmhr_currency='+jamn_pmhr_currency.val()+'&jamn_pmhr_amount='+jamn_pmhr_amount.val()+'&kuitansi_atau='+kuitansi_dpp.val()+'&rekening_currency='+rekening_currency.val()+'&rekening_amount='+rekening_amount.val()+'&kuitansi_no='+kuitansi_no.val()+'&rekening_bank='+rekening_bank.val()+'&rekening_switch='+rekening_switch.val()+'&pajak_no='+pajak_no.val()+'&jamn_uang_muka_assr='+jamn_uang_muka_assr.val()+'&jamn_plksa_assr='+jamn_plksa_assr.val()+'&jamn_pmhr_assr='+jamn_pmhr_assr.val()+'&pajak_tgl='+pajak_tgl.val()+'&jamn_uang_muka_expired='+jamn_uang_muka_expired.val()+'&jamn_plksa_expired='+jamn_plksa_expired.val()+'&jamn_pmhr_expired='+jamn_pmhr_expired.val()+'&pls_asu_expired='+pls_asu_expired.val()+'&tt_bld_draw_tgl='+tt_bld_draw_tgl.val()+'&siujk_tgl='+siujk_tgl.val()+'&npwp_tgl='+npwp_tgl.val()+'&dgt_tgl='+dgt_tgl.val()+'&side_ltr_tgl='+side_ltr_tgl.val()+'&pls_asu_no='+pls_asu_no.val()+'&pls_asu_assr='+pls_asu_assr.val()+'&tt_bld_draw_no='+tt_bld_draw_no.val()+'&siujk_no='+siujk_no.val()+'&npwp_no='+npwp_no.val()+'&dgt_no='+dgt_no.val()+'&side_ltr_no='+side_ltr_no.val()+'&po_migo_value='+po_migo_value.val()+'&true_amount='+true_amount.val()+'&true_currency='+true_currency.val()+'&start_time='+start_time.val()+'&area='+area.val()+'&no_sap='+no_sap.val()+'&no_spb='+no_spb.val()+'&incomplete='+incomplete.val()+'&park_doc_number='+park_doc_number.val()+'&park_year='+park_year.val()+'&park_month='+park_month.val()+'&park_level='+park_level.val()+'&park_area='+park_area.val()+'&foreign_amount='+foreign_amount.val()+'&foreign_currency='+foreign_currency.val();
						
			var destination_submit = '';
			if(incomplete.val() == 1){
				destination_submit = 'admin/submit_off_update.php';
			}else if(incomplete.val() != 1){
				destination_submit = 'admin/submit_off.php';
			}
			
//			alert(park_year.val());
//			return false;
			
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
			type : 'POST',
			data : UrlToSubmit,
			url  : destination_submit, //'admin/submit_off.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					alert('Data Saved');
					 window.location = 'dashboard.php?select=1'; 
				}
				else if(responseText == 1){
					//window.location = 'dashboard.php';
					alert('Please Maintain Running Number in table TRX_NUMBER');
				}
				else if(responseText == 2){
					//window.location = 'dashboard.php';
					alert("Data Couldn't Saved");
				}
				else if(responseText == 3){
					alert('Maintain level authorization in table TRX_LIMITATION');
				}
				else{
//					alert('Error Entry Data');
					alert(responseText);
					//write(responseText); 
				}
			}
			});
		
		return false;
	});
	
//	Park Document (save a while)	
	$('#submit_park').click(function(){ // Create `click` event function for login
		// clear all alert
			var div = $("#po_migo_value").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#side_ltr_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#dgt_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#npwp_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#siujk_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tt_bld_draw_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pls_asu_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pls_asu_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#side_ltr_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#dgt_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#npwp_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#siujk_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tt_bld_draw_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pls_asu_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_pmhr_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_plksa_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_uang_muka_expired").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pajak_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_pmhr_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_plksa_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_uang_muka_assr").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pajak_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_switch").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_bank").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kuitansi_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kuitansi_atau").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_pmhr_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_plksa_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#jamn_uang_muka_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#pajak_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#rekening_ats_nm").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kuitansi_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#ptgn_uang_muka_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_jasa").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_barang").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_tgl_bast").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bast_non_ppn_tgl_baut").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#bts_akhir_kerja_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_non_ppn_thp_rekon").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_non_ppn_amd_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_non_ppn_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#invoice_tgl_masuk").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tagihan_tgl_masuk").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#invoice_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tagihan_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#invoice_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#tagihan_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#no_sap").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#true_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#amandemen_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_sp_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kontrak_amount").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#amandemen_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_sp_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kontrak_tgl").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#keterangan_value").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#amandemen_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#po_sp_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#kontrak_no").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#nama_proyek").parents("div.input-group");
			div.removeClass("has-error");	
			var div = $("#nama_mitra").parents("div.input-group");
			div.removeClass("has-error");	 
		
		// Get All data property
		var nama_mitra 				= $('#nama_mitra');
		var nama_proyek 			= $('#nama_proyek');
		var kontrak_no 				= $('#kontrak_no');
		var po_sp_no 				= $('#po_sp_no');
		var amandemen_no 			= $('#amandemen_no');
		var keterangan_value 		= $('#keterangan_value');
		var kontrak_tgl				= $('#kontrak_tgl');
		var po_sp_tgl				= $('#po_sp_tgl');
		var amandemen_tgl			= $('#amandemen_tgl');
		var kontrak_currency		= $('#kontrak_currency');
		var po_sp_currency			= $('#po_sp_currency');
		var amandemen_currency		= $('#amandemen_currency');
		var kontrak_amount			= $('#kontrak_amount');
		var po_sp_amount			= $('#po_sp_amount');
		var amandemen_amount		= $('#amandemen_amount');
		
		var tagihan_1;				//= $('#tagihan_1');
		if (document.getElementById('tagihan_1').checked){ tagihan_1 = 'X'; } else { tagihan_1 = ''; }
		var invoice_1;				//= $('#invoice_1');
		if (document.getElementById('invoice_1').checked){ invoice_1 = 'X'; } else { invoice_1 = ''; }
		var po_non_ppn_1;			//= $('#po_non_ppn_1');
		if (document.getElementById('po_non_ppn_1').checked){ po_non_ppn_1 = 'X'; } else { po_non_ppn_1 = ''; }
		var bts_akhir_kerja_1;		//= $('#bts_akhir_kerja_1');
		if (document.getElementById('bts_akhir_kerja_1').checked){ bts_akhir_kerja_1 = 'X'; } else { bts_akhir_kerja_1 = ''; }
		var bast_non_ppn_1;			//= $('#bast_non_ppn_1');
		if (document.getElementById('bast_non_ppn_1').checked){ bast_non_ppn_1 = 'X'; } else { bast_non_ppn_1 = ''; }
		var ptgn_uang_muka_1;		//= $('#ptgn_uang_muka_1');
		if (document.getElementById('ptgn_uang_muka_1').checked){ ptgn_uang_muka_1 = 'X'; } else { ptgn_uang_muka_1 = ''; }
		var kuitansi_1;				//= $('#kuitansi_1');
		if (document.getElementById('kuitansi_1').checked){ kuitansi_1 = 'X'; } else { kuitansi_1 = ''; }
		var rekening_1;				//= $('#rekening_1');
		if (document.getElementById('rekening_1').checked){ rekening_1 = 'X'; } else { rekening_1 = ''; }
		var pajak_1;					//= $('#pajak_1');
		if (document.getElementById('pajak_1').checked){ pajak_1 = 'X'; } else { pajak_1 = ''; }
		var jamn_uang_muka_1;		//= $('#jamn_uang_muka_1');
		if (document.getElementById('jamn_uang_muka_1').checked){ jamn_uang_muka_1 = 'X'; } else { jamn_uang_muka_1 = ''; }
		var jamn_plksa_1;			//= $('#jamn_plksa_1');
		if (document.getElementById('jamn_plksa_1').checked){ jamn_plksa_1 = 'X'; } else { jamn_plksa_1 = ''; }
		var jamn_pmhr_1;				//= $('#jamn_pmhr_1');
		if (document.getElementById('jamn_pmhr_1').checked){ jamn_pmhr_1 = 'X'; } else { jamn_pmhr_1 = ''; }
		var pls_asu_1;				//= $('#pls_asu_1');
		if (document.getElementById('pls_asu_1').checked){ pls_asu_1 = 'X'; } else { pls_asu_1 = ''; }
		var tt_bld_draw_1;			//= $('#tt_bld_draw_1');
		if (document.getElementById('tt_bld_draw_1').checked){ tt_bld_draw_1 = 'X'; } else { tt_bld_draw_1 = ''; }
		var siujk_1;					//= $('#siujk_1');
		if (document.getElementById('siujk_1').checked){ siujk_1 = 'X'; } else { siujk_1 = ''; }
		var npwp_1;					//= $('#npwp_1');
		if (document.getElementById('npwp_1').checked){ npwp_1 = 'X'; } else { npwp_1 = ''; }
		var dgt_1;					//= $('#dgt_1');
		if (document.getElementById('dgt_1').checked){ dgt_1 = 'X'; } else { dgt_1 = ''; }
		var side_ltr_1;				//= $('#side_ltr_1');
		if (document.getElementById('side_ltr_1').checked){ side_ltr_1 = 'X'; } else { side_ltr_1 = ''; }
		var rekon_wkt_1;				//= $('#rekon_wkt_1');
		if (document.getElementById('rekon_wkt_1').checked){ rekon_wkt_1 = 'X'; } else { rekon_wkt_1 = ''; }
		var po_migo_1;				//= $('#po_migo_1');
		if (document.getElementById('po_migo_1').checked){ po_migo_1 = 'X'; } else { po_migo_1 = ''; }
		
		var tagihan_no				= $('#tagihan_no');		
		var invoice_no				= $('#invoice_no');		
		var tagihan_tgl				= $('#tagihan_tgl');
		var invoice_tgl				= $('#invoice_tgl');
		var tagihan_tgl_masuk		= $('#tagihan_tgl_masuk');
		var invoice_tgl_masuk		= $('#invoice_tgl_masuk');
		var po_non_ppn_currency		= $('#po_non_ppn_currency');

		var po_non_ppn_amount		= $('#po_non_ppn_amount');
		var po_non_ppn_amd_currency	= $('#po_non_ppn_amd_currency');
		var po_non_ppn_amd_amount	= $('#po_non_ppn_amd_amount');
		var po_non_ppn_thp_rekon	= $('#po_non_ppn_thp_rekon');
		var bts_akhir_kerja_no		= $('#bts_akhir_kerja_no');
		var bast_non_ppn_tgl_baut	= $('#bast_non_ppn_tgl_baut');
		var bast_non_ppn_tgl_bast	= $('#bast_non_ppn_tgl_bast');
		var bast_non_ppn_barang		= $('#bast_non_ppn_barang');
		var bast_non_ppn_jasa		= $('#bast_non_ppn_jasa');
		var bast_non_ppn_currency	= $('#bast_non_ppn_currency');
		var bast_non_ppn_amount		= $('#bast_non_ppn_amount');
		var ptgn_uang_muka_currency	= $('#ptgn_uang_muka_currency');
		var ptgn_uang_muka_amount	= $('#ptgn_uang_muka_amount');
		var kuitansi_currency		= $('#kuitansi_currency');
		var kuitansi_amount			= $('#kuitansi_amount');
		var rekening_ats_nm			= $('#rekening_ats_nm');
		var pajak_currency			= $('#pajak_currency');
		var pajak_amount			= $('#pajak_amount');
		var jamn_uang_muka_currency	= $('#jamn_uang_muka_currency');
		var jamn_uang_muka_amount	= $('#jamn_uang_muka_amount');
		var jamn_plksa_currency		= $('#jamn_plksa_currency');
		var jamn_plksa_amount		= $('#jamn_plksa_amount');

		var jamn_pmhr_currency		= $('#jamn_pmhr_currency');
		var jamn_pmhr_amount		= $('#jamn_pmhr_amount');
		var kuitansi_dpp			= $('#kuitansi_dpp');
		var rekening_currency		= $('#rekening_currency');
		var rekening_amount			= $('#rekening_amount');
		var kuitansi_no				= $('#kuitansi_no');		
		var rekening_bank			= $('#rekening_bank');
		var rekening_switch			= $('#rekening_switch');
		var pajak_no				= $('#pajak_no');		
		var jamn_uang_muka_assr		= $('#jamn_uang_muka_assr');		
		var jamn_plksa_assr			= $('#jamn_plksa_assr');				
		var jamn_pmhr_assr			= $('#jamn_pmhr_assr');		
		var pajak_tgl				= $('#pajak_tgl');
		var jamn_uang_muka_expired	= $('#jamn_uang_muka_expired');
		var jamn_plksa_expired		= $('#jamn_plksa_expired');
		var jamn_pmhr_expired		= $('#jamn_pmhr_expired');
		var pls_asu_expired			= $('#pls_asu_expired');
		var tt_bld_draw_tgl			= $('#tt_bld_draw_tgl');
		var siujk_tgl				= $('#siujk_tgl');
		var npwp_tgl				= $('#npwp_tgl');
		var dgt_tgl					= $('#dgt_tgl');
		var side_ltr_tgl			= $('#side_ltr_tgl');
		var pls_asu_no				= $('#pls_asu_no');				
		var pls_asu_assr			= $('#pls_asu_assr');				
		var tt_bld_draw_no			= $('#tt_bld_draw_no');				
		var siujk_no				= $('#siujk_no');				
		var npwp_no					= $('#npwp_no');				
		var dgt_no					= $('#dgt_no');				
		var side_ltr_no				= $('#side_ltr_no');				
		var po_migo_value			= $('#po_migo_value');
		
		var true_amount				= $('#true_amount');
		var true_currency			= $('#true_currency');
		var start_time				= $('#start_time');
		var start_time_park			= $('#start_time_park');
		var area					= $('#area');
		var no_sap					= $('#no_sap');
		var no_spb					= $('#no_spb');
		
		var incomplete				= $('#incomplete');
		
		var park_doc_number			= $('#park_doc_number');
		var park_year				= $('#park_year');
		var park_month				= $('#park_month');
		var park_level				= $('#park_level');
		var park_area				= $('#park_area');
		
		var foreign_currency		= $('#foreign_currency');
		var foreign_amount			= $('#foreign_amount');
		
		
		//if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToSubmit = 'action=submit_off&nama_mitra='+nama_mitra.val()+'&nama_proyek='+nama_proyek.val()+'&kontrak_no='+kontrak_no.val()+'&po_sp_no='+po_sp_no.val()+'&amandemen_no='+amandemen_no.val()+'&keterangan_value='+keterangan_value.val()+'&kontrak_tgl='+kontrak_tgl.val()+'&po_sp_tgl='+po_sp_tgl.val()+'&amandemen_tgl='+amandemen_tgl.val()+'&kontrak_currency='+kontrak_currency.val()+'&po_sp_currency='+po_sp_currency.val()+'&amandemen_currency='+amandemen_currency.val()+'&kontrak_amount='+kontrak_amount.val()+'&po_sp_amount='+po_sp_amount.val()+'&amandemen_amount='+amandemen_amount.val()+'&tagihan_1='+tagihan_1+'&invoice_1='+invoice_1+'&po_non_ppn_1='+po_non_ppn_1+'&bts_akhir_kerja_1='+bts_akhir_kerja_1+'&bast_non_ppn_1='+bast_non_ppn_1+'&ptgn_uang_muka_1='+ptgn_uang_muka_1+'&kuitansi_1='+kuitansi_1+'&rekening_1='+rekening_1+'&pajak_1='+pajak_1+'&jamn_uang_muka_1='+jamn_uang_muka_1+'&jamn_plksa_1='+jamn_plksa_1+'&jamn_pmhr_1='+jamn_pmhr_1+'&pls_asu_1='+pls_asu_1+'&tt_bld_draw_1='+tt_bld_draw_1+'&siujk_1='+siujk_1+'&npwp_1='+npwp_1+'&dgt_1='+dgt_1+'&side_ltr_1='+side_ltr_1+'&rekon_wkt_1='+rekon_wkt_1+'&po_migo_1='+po_migo_1+'&tagihan_no='+tagihan_no.val()+'&invoice_no='+invoice_no.val()+'&tagihan_tgl='+tagihan_tgl.val()+'&invoice_tgl='+invoice_tgl.val()+'&tagihan_tgl_masuk='+tagihan_tgl_masuk.val()+'&invoice_tgl_masuk='+invoice_tgl_masuk.val()+'&po_non_ppn_currency='+po_non_ppn_currency.val()+'&po_non_ppn_amount='+po_non_ppn_amount.val()+'&po_non_ppn_amd_currency='+po_non_ppn_amd_currency.val()+'&po_non_ppn_amd_amount='+po_non_ppn_amd_amount.val()+'&po_non_ppn_thp_rekon='+po_non_ppn_thp_rekon.val()+'&bts_akhir_kerja_no='+bts_akhir_kerja_no.val()+'&bast_non_ppn_tgl_baut='+bast_non_ppn_tgl_baut.val()+'&bast_non_ppn_tgl_bast='+bast_non_ppn_tgl_bast.val()+'&bast_non_ppn_barang='+bast_non_ppn_barang.val()+'&bast_non_ppn_jasa='+bast_non_ppn_jasa.val()+'&bast_non_ppn_currency='+bast_non_ppn_currency.val()+'&bast_non_ppn_amount='+bast_non_ppn_amount.val()+'&ptgn_uang_muka_currency='+ptgn_uang_muka_currency.val()+'&ptgn_uang_muka_amount='+ptgn_uang_muka_amount.val()+'&kuitansi_currency='+kuitansi_currency.val()+'&kuitansi_amount='+kuitansi_amount.val()+'&rekening_ats_nm='+rekening_ats_nm.val()+'&pajak_currency='+pajak_currency.val()+'&pajak_amount='+pajak_amount.val()+'&jamn_uang_muka_currency='+jamn_uang_muka_currency.val()+'&jamn_uang_muka_amount='+jamn_uang_muka_amount.val()+'&jamn_plksa_currency='+jamn_plksa_currency.val()+'&jamn_plksa_amount='+jamn_plksa_amount.val()+'&jamn_pmhr_currency='+jamn_pmhr_currency.val()+'&jamn_pmhr_amount='+jamn_pmhr_amount.val()+'&kuitansi_atau='+kuitansi_dpp.val()+'&rekening_currency='+rekening_currency.val()+'&rekening_amount='+rekening_amount.val()+'&kuitansi_no='+kuitansi_no.val()+'&rekening_bank='+rekening_bank.val()+'&rekening_switch='+rekening_switch.val()+'&pajak_no='+pajak_no.val()+'&jamn_uang_muka_assr='+jamn_uang_muka_assr.val()+'&jamn_plksa_assr='+jamn_plksa_assr.val()+'&jamn_pmhr_assr='+jamn_pmhr_assr.val()+'&pajak_tgl='+pajak_tgl.val()+'&jamn_uang_muka_expired='+jamn_uang_muka_expired.val()+'&jamn_plksa_expired='+jamn_plksa_expired.val()+'&jamn_pmhr_expired='+jamn_pmhr_expired.val()+'&pls_asu_expired='+pls_asu_expired.val()+'&tt_bld_draw_tgl='+tt_bld_draw_tgl.val()+'&siujk_tgl='+siujk_tgl.val()+'&npwp_tgl='+npwp_tgl.val()+'&dgt_tgl='+dgt_tgl.val()+'&side_ltr_tgl='+side_ltr_tgl.val()+'&pls_asu_no='+pls_asu_no.val()+'&pls_asu_assr='+pls_asu_assr.val()+'&tt_bld_draw_no='+tt_bld_draw_no.val()+'&siujk_no='+siujk_no.val()+'&npwp_no='+npwp_no.val()+'&dgt_no='+dgt_no.val()+'&side_ltr_no='+side_ltr_no.val()+'&po_migo_value='+po_migo_value.val()+'&true_amount='+true_amount.val()+'&true_currency='+true_currency.val()+'&start_time='+start_time.val()+'&area='+area.val()+'&no_sap='+no_sap.val()+'&no_spb='+no_spb.val()+'&incomplete='+incomplete.val()+'&park_doc_number='+park_doc_number.val()+'&park_year='+park_year.val()+'&park_month='+park_month.val()+'&park_level='+park_level.val()+'&park_area='+park_area.val()+'&start_time_park='+start_time_park.val()+'&foreign_amount='+foreign_amount.val()+'&foreign_currency='+foreign_currency.val();
						
			//var destination_submit = '';
			//if(incomplete.val() == 1){

			//}else if(incomplete.val() != 1){
				destination_submit = 'admin/submit_park.php';
			//}
			
//			alert(destination_submit);
//			return false;

			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
			type : 'POST',
			data : UrlToSubmit,
			url  : destination_submit, //'admin/submit_off.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					alert('Document Parked');
					 //window.location = "dashboard.php?select=1&subtype=park";//'dashboard.php?select=1'; 
					 window.location = 'dashboard.php?select=1'; 
				}
				else if(responseText == 1){
					//window.location = 'dashboard.php';
					alert('Please Maintain Running Number in table TRX_NUMBER');
				}
				else if(responseText == 2){
					//window.location = 'dashboard.php';
					alert("Data Couldn't Saved");
				}
				else if(responseText == 3){
					alert('Maintain level authorization in table TRX_LIMITATION');
				}
				else{
//					alert('Error Entry Data');
					alert(responseText);
					//write(responseText); 
				}
			}
			});
		
		return false;
	});
	
	
//LOGOUT 	
	$('#logout').click(function(){ // Create `click` event function for login
		//if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=logout';
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'admin/logout.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<span class="error">Error Contact Administrator!</span>');
				}
				else if(responseText == 1){
					window.location = 'index.php';
				}
				else{
					alert('');
				}
			}
			});
		
		return false;
	});
	
		
});

	//Saved User
	$('#submit_users').click(function(){ // Create `click` event function for saved user
	  	if (confirm("Are you sure to Save User")) {
    		
  		} else {
    		return false;
		}
		
		var div = $("#username").parents("div.input-group");
		div.removeClass("has-error");
		var div = $("#password1").parents("div.input-group");
		div.removeClass("has-error");
		var div = $("#password2").parents("div.input-group");
		div.removeClass("has-error");
		var div = $("#nama_depan").parents("div.input-group");
		div.removeClass("has-error");
	
			// Get All data property
		var username 				= $('#username');
		var password1	 			= $('#password1');
		var password2 				= $('#password2');
		var nama_depan 				= $('#nama_depan');
		var nama_belakang			= $('#nama_belakang');
		var edit_mode 				= $('#edit_mode');
		var level_user				= $('#level_user');
		
		var count_area 				= $('#count_area');
		var data_area 				= $('#data_area');
	
// cek ga boleh kosong untuk entry nya
		var kosong = '0';
//		alert('editmode '+edit_mode.val());
		if(username.val() == ''){ 
			username.focus(); // focus to the filed 
			//$('#username').val("Enter No Kontrak");
			var div = $("#username").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#username").parents("div.input-group");
			div.removeClass("has-error");	
		}

		var change_password = 0;
		if(password1.val() == ''){ 
			if (edit_mode.val() == 0){
				password1.focus(); // focus to the filed 
				//$(password1).val("Enter No Kontrak");
				var div = $("#password1").parents("div.input-group");
				div.addClass("has-error");
				var div = $("#password2").parents("div.input-group");
				div.addClass("has-error");
				kosong = '1';
			}

		} else {
//			jika password isi maka password 2 harus isi dan sama			
			if(password2.val() == ''){ 
				password1.focus(); // focus to the filed 
				//$(password1).val("Enter No Kontrak");
				var div = $("#password1").parents("div.input-group");
				div.addClass("has-error");
				var div = $("#password2").parents("div.input-group");
				div.addClass("has-error");
				kosong = '1';
			} else {

					if(password2.val() != password1.val()){ 
						password1.focus(); // focus to the filed 
						//$(password1).val("Enter No Kontrak");
						var div = $("#password1").parents("div.input-group");
						div.addClass("has-error");
						var div = $("#password2").parents("div.input-group");
						div.addClass("has-error");
						kosong = '1';
					} else {

				var div = $("#password1").parents("div.input-group");
				div.removeClass("has-error");
				var div = $("#password2").parents("div.input-group");
				div.removeClass("has-error");
				var change_password = 1;
					}
			}
		
		}

		if(nama_depan.val() == ''){ 
			nama_depan.focus(); // focus to the filed 
			//$('#nama_depan').val("Enter No Kontrak");
			var div = $("#nama_depan").parents("div.input-group");
			div.addClass("has-error");
			kosong = '1';
		} else {
			var div = $("#nama_depan").parents("div.input-group");
			div.removeClass("has-error");	
		}
		
		if(kosong == '1'){
//			alert('ada yg kosong nih');
			return false;	
		}
		
		var a = 0;
		var b = data_area.val();
		var c = b.split(",");
		var d = '';
		var get_area = '';
//			alert(count_area.val()-1);
//			alert(b);
		var count = count_area.val()-1;
		for( a = 0; a <= count; a++ ){
			d = 'area_'+c[a];
//			alert(d);
			if (get_area == '') {
				if (document.getElementById(d).checked){ get_area = c[a]; }
			} else {
				if (document.getElementById(d).checked){ get_area = get_area+','+c[a]; }
			}
		}
		
//			alert(get_area);

		var UrlToSubmit = 'action=submit_user&edit_mode='+edit_mode.val()+'&change_password='+change_password+'&username='+username.val()+'&password1='+password1.val()+'&password2='+password2.val()+'&nama_depan='+nama_depan.val()+'&nama_belakang='+nama_belakang.val()+'&level='+level_user.val()+'&area='+get_area;
				
//		alert(UrlToSubmit);
//		return false;
		
		var destination_submit = 'admin/submit_user.php';	
		$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
		type : 'POST',
		data : UrlToSubmit,
		url  : destination_submit, //'admin/submit_off.php',
		success: function(responseText){ // Get the result and asign to each cases
			if(responseText == 0){
				alert('Data user Saved');
				 window.location = 'dashboard.php?select=5'; 
			}
			else if(responseText == 1){
				//window.location = 'dashboard.php';
				alert('Error insert user_authorization');
			}
			else if(responseText == 2){
				//window.location = 'dashboard.php';
				alert('Error insert user_detail');
			}
			else if(responseText == 3){
				//window.location = 'dashboard.php';
				alert('Error insert user_password');
			}
			else{
//					alert('Error Entry Data');
				alert(responseText);
				//write(responseText); 
			}
		}
		});
	
		return false;
	});

$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
 });
 
$('#kontrak_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#po_sp_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#amandemen_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#tagihan_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#invoice_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#tagihan_tgl_masuk').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d',
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#invoice_tgl_masuk').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#bast_non_ppn_tgl_baut').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#bast_non_ppn_tgl_bast').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#pajak_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#jamn_uang_muka_expired').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#jamn_plksa_expired').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#jamn_pmhr_expired').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#pls_asu_expired').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#tt_bld_draw_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#siujk_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#npwp_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#dgt_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});

$('#side_ltr_tgl').datepicker({
	format: 'dd/mm/yyyy',
	startDate: '-3d'
}).on('changeDate', function(ev){
    $(this).datepicker('hide');
});	

//knob
$(function() {
	$(".dial").knob({
		"fgColor":"#8dc63f",
		"lineCap":"round",
		"width":150,
		"height":150,
		
		"skin":"tron",
		"readOnly":true
				});
	$(".dial2").knob({
		"fgColor":"#00aeef",
		"lineCap":"round",
		"width":150,
		"height":150,
		
		"skin":"tron",
		"readOnly":true
				});
	$(".dial3").knob({
		"fgColor":"#f7941d",
		"lineCap":"round",
		"width":150,
		"height":150,
		
		"skin":"tron",
		"readOnly":true
				});
	$(".dial4").knob({
		"fgColor":"#7d7d7d",
		"lineCap":"round",
		"width":150,
		"height":150,
		
		"skin":"tron",
		"readOnly":true
				});		
				
});

//	format Number & rumus otomatis
$(function(){
	// Set up the number formatting.
	$('#kontrak_amount').number( true, 0 );
	$('#po_sp_amount').number( true, 0 );
	$('#amandemen_amount').number( true, 0 );
	$('#true_amount').number( true, 0 );
	$('#foreign_amount').number( true, 0 );
	$('#po_non_ppn_amount').number( true, 0 );
	$('#po_non_ppn_amd_amount').number( true, 0 );
	$('#bast_non_ppn_amount').number( true, 0 );
	$('#ptgn_uang_muka_amount').number( true, 0 );
	$('#kuitansi_amount').number( true, 0 );
	$('#kuitansi_dpp').number( true, 0 );
	//$('#rekening_amount').number( true, 0 ); 
	$('#pajak_amount').number( true, 0 );
	$('#jamn_uang_muka_amount').number( true, 0 );
	$('#jamn_pmhr_amount').number( true, 0 );
	$('#jamn_plksa_amount').number( true, 0 );
	
	$('#no_sap').numeric();
	
	//$('#no_sap').number( true );
	// Get the value of the number for the demo.
	//$('#get_number').on('click',function(){
		
	//	var val = $('#price').val();
		
	//	$('#number_container').slideDown('fast');
	//	$('#the_number').text( val !== '' ? val : '(empty)' );
	//});
	
	//menghitung DPP & menghitung Faktur pajak
	var $dpp1    = $('#kuitansi_amount');
	var $dpp2    = $('#kuitansi_dpp');
	var $ft_pjk3 = $('#pajak_amount');
	var $count	 = $('#count_active_id');
	var $sample	 = $('#kuitansi_no');

//    $dpp1.on('paste, keydown', function() {
//	var $self = $(this);            
//	setTimeout(function(){ 
//		//menghitung DPP
//		var $content1 = $self.val();//html();
//        $content1 =  Math.round( 100 / 110 * $content1 );        
//        $dpp2.val($content1);
//		
//		//menghitung Faktur pajak
//		var $content2 = $content1;//html();
//		$content2 =  Math.round( 10 / 100 * $content2 ); 
//		$ft_pjk3.val($content2);
//        },100);
//     });

		$dpp2.on('paste, keydown', function() {
		var $self = $(this);            
		setTimeout(function(){ 
			//menghitung Faktur pajak
			if(document.getElementById('count_active_id').checked){
				var $content2 = $self.val();//html();
				$content2 =  Math.round( 10 / 100 * $content2 ); 
				$ft_pjk3.val($content2);
			}
			},100);
		 });
		 
		 
//		cek password dan ulangi password harus sama		 
//	var $password1 = $('#password1');
//	var $password2 = $('#password2');
//
//	$password1.on('paste, keydown', function() {
//	var $self = $(this);            
//	setTimeout(function(){ 
//				var div = $("#password1").parents("div.input-group");
//				div.removeClass("has-error");	
//				var div = $("#password2").parents("div.input-group");
//				div.removeClass("has-error");	
//		},100);
//	 });
	
});