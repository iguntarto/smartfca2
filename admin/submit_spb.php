
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="<?php echo $doc_number_approval ; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Insert No SPB</h4>
      </div>
      <div class="modal-body">
      
            <!--  Panel content -->
            <div class="row"> 
              <!--  nama_mitra -->
              <div class="col-lg-12">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="No SPB" id="approve_data_no_spb" value="<?php echo $approval_data_doc_num; ?>">
				  <input type="hidden" id="approve_data_doc_num" value="<?php echo $approval_data_doc_num; ?>">
				  <input type="hidden" id="approve_data_doc_year" value="<?php echo $approval_data_year; ?>">
				  <input type="hidden" id="approve_data_doc_month" value="<?php echo $approval_data_month; ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
            </div>
            <!-- /.row -->
      
            <!--  Panel content -->
            <div class="row"> 
              <div class="col-lg-12">
              <div align="center">
		        <button type="button" class="btn btn-success" id="approve_document">Approve</button>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
		        <button type="button" class="btn btn-danger" id="reject_<?php echo $approval_data_doc_num; ?>">&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;</button>
              </div>
              </div>
            </div>
            <!-- /.row -->


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<script>
$(document).ready(function(){
//reject_document
	$('#reject_<?php echo $approval_data_doc_num; ?>').click(function(){ 
			// Get All data property
			var approve_data_no_spb = 'XXX';
			var approve_data_doc_num = $('#approve_data_doc_num');
			var approve_data_doc_year = $('#approve_data_doc_year');
			var approve_data_doc_month = $('#approve_data_doc_month');
			var UrlToSubmit = 'docnum='+approve_data_doc_num.val()+'&year='+approve_data_doc_year.val()+'&month='+approve_data_doc_month.val()+'&no_spb='+approve_data_no_spb+'&approval=REJECT';
					alert(UrlToSubmit);	
//			$("#savenewpass_msg").html('');
//			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
//				type : 'POST',
//				data : UrlToSubmit,
//				url  : 'admin/do_approve.php',
//				success: function(responseText){ // Get the result and asign to each cases					
//					alert(responseText);	
//					approve_data_no_spb = '';
//					$('#approve_data_doc_num').val('');
//					$('#approve_data_doc_year').val('');;
//					$('#approve_data_doc_month').val('');;
				}
			});
	});
});
//$(document).ready(function(){
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

//	//reject_document
//			var approve_data_doc_num = $('#approve_data_doc_num');
//
//	$('#reject_'+approve_data_doc_num.val() ).click(function(){ 
//			 alert(approve_data_doc_num.val());
//			// Get All data property
//			var approve_data_no_spb = 'XXX';
//			var approve_data_doc_year = $('#'+approve_data_doc_num.val()+'approve_data_doc_year');
//			var approve_data_doc_month = $(''+approve_data_doc_num.val()+'#approve_data_doc_month');
//			var UrlToSubmit = 'docnum='+approve_data_doc_num.val()+'&year='+approve_data_doc_year.val()+'&month='+approve_data_doc_month.val()+'&no_spb='+approve_data_no_spb+'&approval=REJECT';
	
////			$("#savenewpass_msg").html('');
//			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
//				type : 'POST',
//				data : UrlToSubmit,
//				url  : 'admin/do_approve.php',
//				success: function(responseText){ // Get the result and asign to each cases
//						
//					alert(responseText);	
//					approve_data_no_spb = '';
//					$('#approve_data_doc_num').val('');
//					$('#approve_data_doc_year').val('');;
//					$('#approve_data_doc_month').val('');;
//				}
//			});
//	});
//});
</script>