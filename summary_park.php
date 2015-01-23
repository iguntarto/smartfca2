<h1 class="page-header">
                            Park Document <small></small>
                        </h1>

<?php 
if(isset($_SESSION['USERNAME']) and $_SESSION['USERNAME'] != '' and
   isset($_SESSION['LEVEL']) and $_SESSION['LEVEL'] != '' ){
	if( ($_SESSION['LEVEL'] == "VRKT") or ($_SESSION['LEVEL'] == "ADMIN") ) {
?>

<?php
/*
History List DOkumen
*/
?>

<?php 
if(isset($_SESSION['USERNAME']) and $_SESSION['USERNAME'] != '' and
   isset($_SESSION['LEVEL']) and $_SESSION['LEVEL'] != ''){
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp;</span>List Park Document </h3>
  </div>
  <div class="panel-body"> 
<?php	
		$lv_level = $_SESSION['LEVEL'];
		$lv_user  = $_SESSION['USERNAME'];
//		$getquery = '
//					SELECT 	trx_history.LOG_NUMBER,
//							trx_detail.DOC_NUMBER,
//							trx_detail.YEAR,
//							trx_detail.MONTH,
//							trx_history.USER,
//							trx_history.LEVEL,
//							trx_detail.TRUE_VALUE,
//							trx_detail.TRUE_VALUE_CURRENCY,
//							trx_history.STATUS,
//							trx_history.START_AT,
//							trx_history.FINISH_AT
//					FROM	trx_history JOIN trx_detail
//					ON		trx_detail.DOC_NUMBER 	= trx_history.DOC_NUMBER
//					AND		trx_detail.YEAR			= trx_history.YEAR
//					AND		trx_detail.MONTH 		= trx_history.MONTH
//					WHERE	trx_history.USER	= "'.$lv_user.'"
//	     	   	  	ORDER BY DOC_NUMBER DESC, YEAR DESC, MONTH DESC';
		$getquery = '
					
					SELECT	
							trx_detail.DOC_NUMBER,
							trx_detail.YEAR,
							trx_detail.MONTH,
							trx_detail.AREA,
							trx_detail.TRUE_VALUE_CURRENCY,
							trx_detail.TRUE_VALUE,
							trx_detail.NAMA_MITRA,
							trx_detail.NO_SAP,
							CREATED_BY,
							CHANGED_AT
							
					FROM	trx_detail 
					WHERE	trx_detail.CREATED_BY	= "'.$lv_user.'"
					  AND 	trx_detail.NOT_COMPLETE = "X"
					  AND 	trx_detail.DELETE_FLAG = ""
					ORDER BY DOC_NUMBER DESC, YEAR DESC, MONTH DESC
		';
		$get_data_level = mysql_query($getquery);
		if(!$get_data_level){	
			/*echo "Data Not Found"; // Data Not Found
			echo $lv_level;
			echo $getquery;*/
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
              <strong>No Data Found!</strong> You dont have any parked document, please upload using <a href="dashboard.php?select=2" class="alert-link">Entry Data</a> Menu
            </div>
<?php		
				//echo "Data Not Found"; // Data Not Found
				
			} else {
			
		
?>

<table id="zhistorytab" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
  <tr>
    <th scope="col">No.</th>
    <th scope="col">Document Number</th>
    <th scope="col">Year</th>
    <th scope="col">Month</th>
    <th scope="col">No. SAP</th>
    <th scope="col">Nama Mitra</th>
    <th scope="col">Nilai stlh Pajak</th>
    <th scope="col">Currency</th>
    <th scope="col">Created By</th>
    <th scope="col">Last Changed</th>
    <th scope="col">Edit</th>
    <th scope="col">&nbsp;Delete&nbsp;</th>
  </tr>
 </thead>
 
<tbody>
<?php 
			$count = 0;
			while($data_level_found=mysql_fetch_array($get_data_level)){
			$count = $count + 1;	
?>
  <tr>
    <td><?=$count?></td>
    <td><?php echo $data_level_found['DOC_NUMBER']; ?></td>
    <td><?php echo $data_level_found['YEAR']; ?></td>
    <td><?php echo $data_level_found['MONTH']; ?></td>
    <td><?php echo $data_level_found['NO_SAP']; ?></td>
    <td><?php echo $data_level_found['NAMA_MITRA']; ?></td>
    <td><?php echo number_format($data_level_found['TRUE_VALUE']); ?></td>
    <td><?php echo $data_level_found['TRUE_VALUE_CURRENCY']; ?></td>
    <td><?php echo $data_level_found['CREATED_BY']; ?></td>
    <td><?php echo $data_level_found['CHANGED_AT']; ?></td>
  	<td><a href="dashboard.php?select=2
		<?php echo '&flag_entry=PARK&doc_num='.$data_level_found['DOC_NUMBER'].'&year='.$data_level_found['YEAR'].'&month='.$data_level_found['MONTH']; ?>">
        <span class="glyphicon glyphicon-change">&nbsp;</span>Edit</a></td>
    <td><a href="admin/do_delete_park.php?docnum=<?=$data_level_found['DOC_NUMBER']?>&year=<?=$data_level_found['YEAR']?>&month=<?=$data_level_found['MONTH']?>" onclick="return confirm('Are You Sure to Delete document <?=$data_level_found['DOC_NUMBER'];?> ?')"><span class="glyphicon glyphicon-remove">&nbsp;</span>delete</a></td>
  </tr>
<?php 
			}
?>
</tbody>
<tfoot>
  <tr>
    <th scope="col">No.</th>
    <th scope="col">Document Number</th>
    <th scope="col">Year</th>
    <th scope="col">Month</th>
    <th scope="col">No. SAP</th>
    <th scope="col">Nama Mitra</th>
    <th scope="col">Nilai stlh Pajak</th>
    <th scope="col">Currency</th>
    <th scope="col">Created By</th>
    <th scope="col">Last Changed</th>
    <th scope="col">Edit</th>
    <th scope="col">&nbsp;Delete&nbsp;</th>
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
	}}
?>