    
	<table id="zreport" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Doc number</th>
                <th>Year</th>
                <th>Month</th>
                <th>No. SAP</th>
                <th>Nama Mitra</th>
                <th>User</th>
                <th>Level</th>
                <th>Unit / Area</th>
                <th>Status</th>
                <th>Start date</th>
                <th>End Date</th>
                <th>Different (in Minutes)</th>                
            </tr>
        </thead>
 
        <tbody>
<?php
session_start();
include('connect.php');

if(isset($_POST['action']) && $_POST['action'] == 'submit_report'){
	
	
	if( 
		(isset($_POST['user']) && $_POST['user'] !='') || 
		(isset($_POST['doc_no']) && $_POST['doc_no'] !='') || 
		(isset($_POST['area']) && $_POST['area'] !='') ||
		(isset($_POST['nama_mitra']) && $_POST['nama_mitra'] !='') ||
		(isset($_POST['doc_sap']) && $_POST['doc_sap'] !='') 
	   ) {
		$WHERE = '';
		$alert = '';
		
		$_POST['user'] = trim($_POST['user']);
		$_POST['doc_no'] = trim($_POST['doc_no']);
		$_POST['area'] = trim($_POST['area']);
		$_POST['nama_mitra'] = trim($_POST['nama_mitra']);
		$_POST['doc_sap'] = trim($_POST['doc_sap']);
		
		if($_POST['user'] !='' ){
			if ($_SESSION['LEVEL'] != "MGRR"){
				$WHERE = "A.USER ="."'".$_POST['user']."'";
				$alert = "User : ".$_POST['user'];
			}
		}

		if($_POST['doc_no'] !=''){
			if($WHERE=='')
				$WHERE = "A.DOC_NUMBER ="."'".$_POST['doc_no']."'";
			else
				$WHERE = $WHERE."AND A.DOC_NUMBER ="."'".$_POST['doc_no']."'";
			
			if($alert=='')
				$alert = "Doc Num : ".$_POST['doc_no'];
			else
				$alert = $alert.", Doc Num : " .$_POST['doc_no'];
		}
		
		if($_POST['area'] !=''){
			$lv_area = str_replace(",","', '",$_POST['area']);
			//echo $lv_area;
			if($WHERE=='')
				$WHERE = "A.area IN ("."'".$lv_area."')";
			else
				$WHERE = $WHERE."AND A.area IN ("."'".$lv_area."' )";
			
			if($alert=='')
				$alert = "Unit / Area : ".$_POST['area'];
			else
				$alert = $alert.", Unit / Area : " .$_POST['area'];
		}
		
		if($_POST['nama_mitra'] !=''){
			if($WHERE=='')
				$WHERE = "B.nama_mitra LIKE "."'%".$_POST['nama_mitra']."%'";
			else
				$WHERE = $WHERE."AND B.nama_mitra LIKE "."'%".$_POST['nama_mitra']."%'";
			
			if($alert=='')
				$alert = "Nama Mitra : ".$_POST['nama_mitra'];
			else
				$alert = $alert.", Nama Mitra : " .$_POST['nama_mitra'];
		}
		if($_POST['doc_sap'] !=''){
			if($WHERE=='')
				$WHERE = "B.no_sap = "."'".$_POST['doc_sap']."'";
			else
				$WHERE = $WHERE."AND B.no_sap = "."'".$_POST['doc_sap']."'";
			
			if($alert=='')
				$alert = "SAP Doc No : ".$_POST['doc_sap'];
			else
				$alert = $alert.", SAP Doc No : " .$_POST['doc_sap'];
		}
		
		$query = 'SELECT 	B.NAMA_MITRA, B.NO_SAP, B.REJECT_FLAG, B.NOT_COMPLETE, B.FLOW_MAIN, 
							A.DOC_NUMBER, A.YEAR, A.MONTH, A.USER, A.LEVEL, A.AREA, A.START_AT, A.FINISH_AT,  A.STATUS
				    FROM	trx_history as A JOIN trx_detail as B
					  ON 	A.DOC_NUMBER = B.DOC_NUMBER
					 AND	A.YEAR = B.YEAR
					 AND	A.MONTH = B.MONTH
				   WHERE	'. $WHERE.'
				   AND A.STATUS	!= "PARK"'
				   ;
		//echo $query;		
		$result = mysql_query($query);

?>
		<div class="alert alert-info" role="alert">All transaction for <?php echo $alert; ?> displayed </div>
<?php				
	}else{
		$result = mysql_query('
				SELECT 	B.NAMA_MITRA, B.NO_SAP, B.REJECT_FLAG, B.NOT_COMPLETE, B.FLOW_MAIN, 
						A.DOC_NUMBER, A.YEAR, A.MONTH, A.USER, A.LEVEL, A.AREA, A.START_AT, A.FINISH_AT, A.STATUS
				    FROM	trx_history as A JOIN trx_detail as B
					  ON 	A.DOC_NUMBER = B.DOC_NUMBER
					 AND	A.YEAR = B.YEAR
					 AND	A.MONTH = B.MONTH
				   WHERE   A.year = YEAR(CURDATE()) AND A.STATUS	!= "PARKED" ');
				
?>
		<div class="alert alert-info" role="alert">All transaction history for current year displayed </div>
<?php				

	}
	// Verify it worked
	if (!$result) echo mysql_error();		
	
	function isWeekend($date) {
		$weekDay = date('w', strtotime($date));
		return ($weekDay == 0 || $weekDay == 6);
	}
	
	
	while($data=mysql_fetch_array($result)){
											
		 $date1 = $data["START_AT"];
		 $date2 = $data["FINISH_AT"]; 
		 $diff = strtotime($date2) - strtotime($date1);
		 //echo $diff." diff in sec";
		 $diffnonholiday = round($diff/60,0);
		 
		$count = 0;
		$start = strtotime($date1);
		$end = strtotime($date2);
		while(date('Y-m-d', $start) < date('Y-m-d', $end)){
		
		  //$count += date('N', $start) < 6 ? 1 : 0;
		  
		  $d = date('N', $start);
 		  if($d == 6 || $d == 7) {
			  $count = $count + 1;
		  }
		
		  $start = strtotime("+1 day", $start);
		}
		//echo $count."holiday";
		
		$holiday = $count * 86400; //day in second
		
		$diff = $diff - $holiday;
		$diff_in_hrs = round($diff/3600,0);
		
		
?>
        <tr>	
        
            <td><a href="" data-toggle="modal" data-target="<?php echo "#".$data['DOC_NUMBER']; ?>" class="history_modal"><?php echo $data["DOC_NUMBER"]; ?></a></td>
            
    <?php 
	$doc_numbertimeline = $data['DOC_NUMBER'];
	?>
    <?php include ("../misc/timeline.php");?>
            <td><?php echo $data["YEAR"]; ?></td>
            <td><?php echo $data["MONTH"]; ?></td>
            <td><?php echo $data["NO_SAP"]; ?></td>
            
            <td><?php echo $data["NAMA_MITRA"]; ?></td>
            <td><?php echo $data["USER"]; ?></td>
            <td><?php echo $data["LEVEL"]; ?></td>
            <td><?php echo $data["AREA"]; ?></td>
            
            <td <?php 
			if($data["STATUS"]=="REJECT"){
				echo 'style="color:#898989"';
			}elseif($data["STATUS"]=="APPROVE"){
				echo 'style="color:#00aeef"'; 
			}elseif($data["NOT_COMPLETE"]=="X"){
				echo 'style="color:#636363"'; 
			}elseif($data["FLOW_MAIN"]!="" OR $data["FLOW_MAIN"]!=NULL){
				echo 'style="color:#f7941d"'; 
			} ?>>
            <?php
				if($data["STATUS"]=="REJECT"){
					echo "REJECT";
				}elseif($data["STATUS"]=="APPROVE"){
					echo "APPROVE";
				}elseif($data["NOT_COMPLETE"]=="X" || $data["STATUS"]=="PARK"){
					echo "PARKED";
				}elseif($data["FLOW_MAIN"]!="" OR $data["FLOW_MAIN"]!=NULL){
					echo "WAITING FOR APPROVAL";
				}
				
				
			?>
            </td>
            <td><?php echo $data["START_AT"]; ?></td>
            <td><?php echo $data["FINISH_AT"]; ?></td>
            <td><?php echo $diffnonholiday; ?></td>
        </tr>
<?php		
		
	}     
}

?>

        </tbody>
        <tfoot>
            <tr>
                <th>Doc number</th>
                <th>Year</th>
                <th>Month</th>
                <th>No. SAP</th>
                <th>Nama Mitra</th>
                <th>User</th>
                <th>Level</th>
                <th>Unit / Area</th>
                <th>Status</th>
                <th>Start date</th>
                <th>End Date</th>
                <th>Different (in Minutes)</th>   
            </tr>
        </tfoot>
 
    </table>
    
    
