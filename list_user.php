<h1 class="page-header">
    User List <small> </small>
</h1>
     
<?php 
//if(isset($_SESSION['USERNAME']) and $_SESSION['USERNAME'] != '' and
//   isset($_SESSION['LEVEL']) and $_SESSION['LEVEL'] != '' ){
	if($_SESSION['LEVEL'] == "ADMIN") {
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp;</span></h3>
  </div>
  <div class="panel-body"> 
<?php	
		$lv_level = $_SESSION['LEVEL'];
		$lv_user  = $_SESSION['USERNAME'];
		
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
		';
		$get_data_level = mysql_query($getquery);
		if(!$get_data_level){	

				 $get_data_level_rw	= mysql_num_rows($get_data_level); // Get the number of rows
?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <strong>No Data Found!</strong> Level <?=$lv_level?> <?=$getquery?> <?=$getquery?> <?=$get_data_level_rw?>
            </div>
<?php				
		} else {
			
			$get_data_level_rw	= mysql_num_rows($get_data_level); // Get the number of rows
			if($get_data_level_rw <= 0){ 
?>
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <strong>No Data Found!</strong> You dont have any document history, please upload using <a href="dashboard.php?select=2" class="alert-link">Entry Data</a> Menu
            </div>
<?php		
				//echo "Data Not Found"; // Data Not Found
				
			} else {
			
		
?>

<table id="zhistorytab" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
  <tr>
    <th scope="col">No.</th>
    <th scope="col">Username</th>
    <th scope="col">Level</th>
    <th scope="col">Nama Depan</th>
    <th scope="col">Nama Belakang</th>
    <th scope="col">Area</th>
    <th scope="col">Maintain</th>
    <th scope="col">Delete</th>
  </tr>
 </thead>
 
<tbody>
<?php 
			$count = 0;
			while($data_level_found=mysql_fetch_array($get_data_level)){
			if ($data_level_found['USERNAME'] == $_SESSION['USERNAME']){
				continue;
			}
			$count = $count + 1;	
?>
  <tr>
    <td><?=$count?></td>
    <td><?php echo $data_level_found['USERNAME']; ?></td>
    <td><?php echo $data_level_found['LEVEL']; ?></td>
    <td><?php echo $data_level_found['NAMA_DEPAN']; ?></td>
    <td><?php echo $data_level_found['NAMA_BELAKANG']; ?></td>
    <td><?php $rearrange = str_replace(',', ', ', $data_level_found['AREA'] ); echo $rearrange ?></td>
    <td><a href="dashboard.php?select=4&edit_user=1&username_edit=<?php echo $data_level_found['USERNAME']; ?>"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit</a></td>
    <td><a href="admin/do_delete_user.php?username_delete=<?=$data_level_found['USERNAME'];?> " onclick="return confirm('Are You Sure to Delete user <?=$data_level_found['USERNAME'];?> ?')"><span class="glyphicon glyphicon-remove">&nbsp;</span>delete</a></td>
  </tr>
<?php 
			}
?>
</tbody>
<tfoot>
  <tr>
    <th scope="col">No.</th>
    <th scope="col">Username</th>
    <th scope="col">Level</th>
    <th scope="col">Nama Depan</th>
    <th scope="col">Nama Belakang</th>
    <th scope="col">Area</th>
    <th scope="col">Maintain</th>
    <th scope="col">Delete</th>
  </tr>
 </tfoot>
</table>
		
<?php
			}
		}
?>

  </div>
</div> 
<script type="text/javascript">

$(document).ready(function(){
	//table
	$('#zhistorytab').dataTable();
	$('#zchecklist').dataTable();
});
</script>
<?php 

} else {
	echo "<script> window.location = 'index.php'; </script>";
}
?>