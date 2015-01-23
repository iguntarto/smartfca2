<h1 class="page-header">
    Input User <small> </small>
</h1>
     
<?php
	if( isset($_REQUEST['edit_user']) and ($_REQUEST['edit_user'] == 1)){
		$lv_username = $_REQUEST['username_edit'];
		$getquery = '
					SELECT 
						B.USERNAME, 
						A.LEVEL, 
						B.NAMA_DEPAN, 
						B.NAMA_BELAKANG, 
						A.AREA
					FROM `user_authorization` AS A
					JOIN `user_detail`		  AS B
					ON	 A.USERNAME = B.USERNAME
					WHERE A.username = "'.$lv_username.'"
		';
		//echo $getquery;
		$get_data_level 		= mysql_query($getquery);
		$get_data_level_error	= mysql_errno();	
		if($get_data_level_error == 0){
		//echo $getquery;
			$get_data_level_rw	= mysql_num_rows($get_data_level); // Get the number of rows
			if($get_data_level_rw > 0){ 
				$data_level_found = mysql_fetch_array($get_data_level);
				$lv_edit_mode = 1;
			}
		}
		
		
	} else {
		$lv_edit_mode = 0;	
	}
?>
     
      <form>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp</span>Input User</h3>
          </div>
          <div class="panel-body"> 
	      <input type="hidden" class="form-control" placeholder="" id="edit_mode" value="<?php echo $lv_edit_mode ?>">
            <!--  Panel content -->
            <div class="row"> 
              <!--  nama_mitra -->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Username (NIK)" id="username" 
                  	value="<?php if($lv_edit_mode == 1) echo $data_level_found['USERNAME']?>" <?php if($lv_edit_mode == 1) { echo 'disabled'; }?> >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
            </div>
            <!-- /.row -->
            
            <div class="row"> 
              <!--  nama_projek -->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="password" class="form-control" placeholder="Password (isi jika ingin mengubah password)" id="password1">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
            </div>
            <!-- /.row -->
            
            <div class="row"> 
              <!--  No_Kontrak + PPN-->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">Ulangi Password</span>
                  <input type="password" class="form-control" placeholder="Ulangi Password" id="password2">
                </div>
                <!-- /input-group --> 
              </div>
            <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
            
            <div class="row">
              <!--  No_PO/SP-->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">Nama Depan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Nama Depan" id="nama_depan" 
                  	value="<?php if($lv_edit_mode == 1) echo $data_level_found['NAMA_DEPAN']?>">
                </div>
                <!-- /input-group --> 
              </div>
            </div>
            <div class="row"> 
              <!--  No_Amandemen-->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">Nama Belakang&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Nama Belakang" id="nama_belakang" 
                  	value="<?php if($lv_edit_mode == 1) echo $data_level_found['NAMA_BELAKANG']?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
            <div class="row"> 
              <!--  No_Amandemen-->
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <!-- <input type="text" class="form-control" placeholder="" id="departemen"> -->
                 <select class="form-control" id="level_user">
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'VRKT') echo 'selected'?> >VRKT</option>
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'OFFCS') echo 'selected'?> >OFFCS</option>
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'MGR') echo 'selected'?> >MGR</option>
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'OSM') echo 'selected'?> >OSM</option>
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'DPT') echo 'selected'?> >DPT</option>
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'SGM') echo 'selected'?> >SGM</option>
                    <option <?php if($lv_edit_mode == 1 && $data_level_found['LEVEL'] == 'ADMIN') echo 'selected'?> >ADMIN</option>
                  </select>
                </div>
                <!-- /input-group --> 
              </div>
                            
            </div>
            <!-- /.row -->

            <div class="row"> 
              <!--  No_Amandemen-->
              <div class="col-lg-1">
                <div class="input-group"> <span class="input-group-addon">Area / Unit&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="" id="" disabled="disabled">
                </div>
                <!-- /input-group --> 
              </div>
                
<?php
$area_text	= "SELECT DISTINCT `AREA` FROM `user_mapping`";
$query_area	= mysql_query($area_text);
$numrw_area	= mysql_num_rows($query_area);
if(!$query_area){
	echo "Please maintain table USER_MAPPING";
}
?>

<?php
if($numrw_area <= 0){
	echo "Please maintain table USER_MAPPING";
} else {
	if($lv_edit_mode == 1) { 
// Delimiters may be slash, dot, or hyphen
//$date = '04/30/1973';
//list($month, $day, $year) = split('[/.-]', $date);
//echo 'Month: $month; Day: $day; Year: $year<br />\n';
		//echo  $data_level_found['AREA'];	 
		$splitarea = explode( ',', $data_level_found['AREA']);
		//echo $splitarea[0];
		$array_count = count($splitarea);
		$array_count = $array_count - 1;
		//echo 'Count array'.$array_count;
	}
	
	$lv_add = 0;
	$lv_data = '';
	while($area_fetch=mysql_fetch_array($query_area)){
		$lv_add = $lv_add + 1;
		if ($lv_add == 1){
			$lv_data = $area_fetch['AREA'];
		} else {
			$lv_data = $lv_data.','.$area_fetch['AREA'];
		}
?>
               <div class="col-lg-1a">
               <?php //echo 'area_'.$area_fetch['AREA']; ?>
                <div class="input-group"> <span class="input-group-addon">
                  <input type="checkbox" name="area" id="<?php echo 'area_'.$area_fetch['AREA']; ?>" 
                    <?php
		if($lv_edit_mode == 1) { 
			for($a = 0; $a <= $array_count; $a++){
				//echo $a;
				//echo '<br>';
				//echo $splitarea[$a];
				//echo '<br>';
				if( $area_fetch['AREA'] == $splitarea[$a] ){
					echo 'checked';
					$splitarea[$a] = '';
				}
			}
		}
					?>
                    >
                  </span>
                  <input type="text" class="form-control" placeholder="<?php echo $area_fetch['AREA']; ?>" disabled="" >
                </div>
               </div>
<?php
	}
//	echo '<br>';
//	echo '<br>';
//	echo '<br>';
//	echo $lv_add;
//	echo '<br>';
//	echo $lv_data;
}
?>
			<input type="hidden" id='count_area' value=<?php echo $lv_add ?> >
			<input type="hidden" id='data_area' value=<?php echo $lv_data ?> >
              <!-- /.col-lg-4 --> 
            </div>
                                           
            <!--  Panel content --> 
          </div>
        </div>
        <!--anel panel-default-->
        </div>
        <!--anel panel-default-->
        
      </form>
      
<script type="text/javascript">
// Select data
$(document).ready(function(){
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
</script>
      
      <!-- /.form --> 