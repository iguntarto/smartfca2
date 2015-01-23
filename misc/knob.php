
<?php 
if(isset($_SESSION['USERNAME']) and $_SESSION['USERNAME'] != '' and
   isset($_SESSION['LEVEL']) and $_SESSION['LEVEL'] != ''){
		
		//new method
		$total = 0;
		$final = 0;
		$inprogress = 0;
		$reject = 0;
		
		$lv_level = $_SESSION['LEVEL'];
		
		$lv_area  = str_replace(',','", "',$_SESSION['AREA']);	
			
		$getquery = 'SELECT * FROM trx_detail
					  WHERE AREA IN ( "'.$lv_area.'" )
					  	AND APPROVAL_LEVEL 	= "'.$lv_level.'"
						AND REJECT_FLAG		= ""
					  	AND not_complete = ""
				   ORDER BY DOC_NUMBER DESC, YEAR DESC, MONTH DESC';
				   
		//echo $getquery;
		$get_data_level = mysql_query($getquery);
	
		while($data_level_found=mysql_fetch_array($get_data_level)){
			$inprogress = $inprogress + 1;	
			$total = $total + 1;
		}
		
		
		//new method
		
		$lv_level = $_SESSION['LEVEL'];
		$lv_user  = $_SESSION['USERNAME'];
		
		$getquery = '
					SELECT *
					FROM
					(
					SELECT	
							trx_detail.DOC_NUMBER,
							trx_detail.YEAR,
							trx_detail.MONTH,
							trx_detail.AREA,
							trx_detail.FIATUR,
							trx_detail.TRUE_VALUE_CURRENCY,
							trx_detail.TRUE_VALUE,
							trx_detail.NAMA_MITRA,
							trx_detail.NO_SAP,
							trx_detail.FLOW_MAIN,
							trx_detail.NOT_COMPLETE,
							trx_detail.REJECT_FLAG ,
							trx_history.USER,
							trx_history.LEVEL,
							trx_history.STATUS,
							trx_history.FINISH_AT
					FROM	trx_detail JOIN trx_history
					ON		trx_detail.DOC_NUMBER 	= trx_history.DOC_NUMBER
					AND		trx_detail.YEAR			= trx_history.YEAR
					AND		trx_detail.MONTH		= trx_history.MONTH
					WHERE	trx_history.USER	= "'.$lv_user.'"
					  AND   trx_detail.not_complete = ""
					ORDER BY 	DOC_NUMBER DESC,
								YEAR ASC,
								MONTH ASC,
								FINISH_AT DESC
					) t
					GROUP BY DOC_NUMBER
					ORDER BY DOC_NUMBER DESC
		';
		
		$get_data_level = mysql_query($getquery);
		
		while($data_level_found=mysql_fetch_array($get_data_level)){
			
			if($data_level_found["NOT_COMPLETE"]!="X")
				$total = $total + 1;
			
			if($data_level_found["REJECT_FLAG"]=="X"){
				$reject = $reject + 1; //echo "REJECTED";
			}elseif($data_level_found["NOT_COMPLETE"]=="X"){
				//$reject = $reject + 1; //echo "PARKED";
			}elseif($data_level_found["FLOW_MAIN"]=="" OR $data_level_found["FLOW_MAIN"]==NULL){
				$final = $final + 1; //echo "FINAL APPROVAL";
			}elseif($data_level_found["FLOW_MAIN"]!="" OR $data_level_found["FLOW_MAIN"]!=NULL){
				$inprogress = $inprogress + 1; //echo "WAITING FOR APPROVAL";
			}
			
		}
		
		//echo $total."<br>".$reject."<br>".$final."<br>".$inprogress;
   
?>
<div class="zclear"></div>

<?php
if( $_SESSION['LEVEL']=="VRKT" ){
?>                         
<div class="zknob">      <center>                  
<input type="text" value="<?php echo $total; ?>" class="dial" ><br>
<em>My Submitted Checklist</em></center>
</div>
<?php
}
?>
<div class="zknob">      <center>                  
<input type="text" value="<?php echo $final; ?>" class="dial2" ><br>
<em>Final Approval</em></center>
</div>

<div class="zknob">        <center>             
<input type="text" value="<?php echo $inprogress; ?>" class="dial3" ><br>
<em>Waiting for Approval</em> </center>
</div>


<div class="zknob">   <center>                 
<input type="text" value="<?php echo $reject; ?>" class="dial4" ><br>
<em>Rejected</em></center>
</div>

<div class="zclear"></div>   

<?php }
?>