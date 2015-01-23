<h1 class="page-header">
    Report <small>General Overview</small>
</h1>
<?php 
if(isset($_SESSION['USERNAME']) and $_SESSION['USERNAME'] != '' and isset($_SESSION['LEVEL']) and $_SESSION['LEVEL'] != ''){
	
	include("misc/chart.php"); 
	
	
?>


  <script>
	function setdatatable(){
		$('#zreport').dataTable();	
	}
	function submitreport(){ // Create `click` event function for login
			// Get All data property
		var user = $('#user');	
		var year = $('#year');	
		var area = $('#area');	
		var doc_no = $('#doc_no');
		var doc_sap = $('#doc_sap');
		var nama_mitra = $('#nama_mitra');	
		var UrlToSubmit = 'action=submit_report&user='+user.val()+'&doc_no='+doc_no.val()+'&area='+area.val()+'&doc_sap='+doc_sap.val()+'&nama_mitra='+nama_mitra.val();
	
		
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod 
				type : 'POST',
				data : UrlToSubmit,
				url  : 'admin/submit_report.php',
				success: function(responseText){ // Get the result and asign to each cases
						
					$("#result_report").html(responseText);	
					setdatatable();
				}
			});
			
		}
		
	$(document).ready(function(){
		submitreport();
		$('#submit_report').click(submitreport);
			
	});  
	
  </script>
  
<div class="panel panel-default" style="">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp;</span>General Report </h3>
  </div>
  <div class="panel-body"> 
  <form>
 
        <div class="row"> 
          <!--  nama_projek -->
          <div class="col-lg-5">
            <div class="input-group"> <span class="input-group-addon">User &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="text" class="form-control" placeholder="User" id="user" value="<?php echo $_SESSION['USERNAME']; ?>" <?php if($_SESSION['LEVEL'] == 'VRKT') {echo "disabled";}?>>
            </div>
            <!-- /input-group --> 
          </div>
          <!-- /.col-lg-6 --> 
        </div>
        
        <div class="row"> 
          <!--  nama_projek -->
          <div class="col-lg-5">
            <div class="input-group"> <span class="input-group-addon">Unit / Area &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="text" class="form-control" placeholder="Unit / Area" id="area" value="<?php echo $_SESSION['AREA']; ?>" <?php if($_SESSION['LEVEL'] != 'ADMIN' && $_SESSION['LEVEL'] != 'OSM') {echo "disabled";}?>>
            </div>
            <!-- /input-group --> 
          </div>
          <!-- /.col-lg-6 --> 
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        <div class="row"> 
          <!--  nama_projek -->
          <div class="col-lg-5">
            <div class="input-group"> <span class="input-group-addon">No / Doc SAP &nbsp;&nbsp;</span>
              <input type="text" class="form-control" placeholder="No / Doc SAP" id="doc_sap" >
            </div>
            <!-- /input-group --> 
          </div>
          <!-- /.col-lg-6 --> 
        </div>
        <!-- /.row -->
        
         <!-- /.row -->
        <div class="row"> 
          <!--  nama_projek -->
          <div class="col-lg-5">
            <div class="input-group"> <span class="input-group-addon">Nama Mitra &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="text" class="form-control" placeholder="Nama Mitra" id="nama_mitra" >
            </div>
            <!-- /input-group --> 
          </div>
          <!-- /.col-lg-6 --> 
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <div class="row" > 
          <!--  nama_projek -->
          <div class="col-lg-5">
            <div class="input-group"> <span class="input-group-addon">Doc Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <input type="text" class="form-control" placeholder="Doc Number" id="doc_no" >
            </div>
            <!-- /input-group --> 
          </div>
          <!-- /.col-lg-6 --> 
        </div>
        <!-- /.row -->
        <button type="button" class="btn btn-default" id="submit_report" style="margin-left:50%;">Submit</button>
  </form>
  <br>
  <br>
<div id="result_report"></div>
  </div>
</div>  

    
<?php   
}
?>