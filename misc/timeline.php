
<!-- Modal -->
<?php
$timelinedquery = ''; ;
$timelinequery = 'SELECT 	B.NAMA_MITRA, B.NO_SAP, B.REJECT_FLAG, B.NOT_COMPLETE, B.DELETE_FLAG, B.FLOW_MAIN, 
							A.DOC_NUMBER, A.YEAR, A.MONTH, A.USER, A.LEVEL, A.AREA, A.START_AT, A.FINISH_AT,  A.STATUS
				    FROM	trx_history as A JOIN trx_detail as B
					  ON 	A.DOC_NUMBER = B.DOC_NUMBER
					 AND	A.YEAR = B.YEAR
					 AND	A.MONTH = B.MONTH
				   WHERE	A.DOC_NUMBER = "'.$doc_numbertimeline .'"
				     AND	A.STATUS != "PARKED"
				   ORDER BY A.FINISH_AT DESC';
 $timelineresult = mysql_query($timelinequery);
 if (!$timelineresult) echo mysql_error();		
	
	
 ?>
 
<div class="modal fade bs-example-modal-lg" id="<?php echo $doc_numbertimeline ; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update History &nbsp; <?php echo $doc_numbertimeline ; ?></h4>
      </div>
      <div class="modal-body">
      

<ul class="timeline">
<?php

	$num = 0;
	while($timelinedata=mysql_fetch_array($timelineresult)){
	$num = $num + 1;
	$mod = $num % 2;
?>
    
    
    <?php
		if($mod == 0){
	
      	echo '<li class="timeline-inverted"><div class="timeline-badge">';
		
		}else{
	
      	echo '<li><div class="timeline-badge">';   
    
		}
		
		
		if($timelinedata["STATUS"]=="REJECT")
      		echo '<div class="timeline-badge danger"><i class="glyphicon glyphicon-remove"></i></div></div>';
		else
			if($timelinedata["STATUS"]=="DELETED")
				echo '<div class="timeline-badge success"><i class="glyphicon glyphicon-trash"></i></div></div>';
			else
				echo '<div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div></div>';
	?>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">
          <?php
		  if($timelinedata["STATUS"]=="REJECT"){
					echo "REJECT";
				}elseif($timelinedata["STATUS"]=="APPROVE"){
					echo "APPROVE";
				}elseif($timelinedata["NOT_COMPLETE"]=="X"){
					if($timelinedata["DELETE_FLAG"]=="X"){
						echo "DELETED";
					} else {
						echo "PARKED";
					}
				}elseif($timelinedata["FLOW_MAIN"]!="" or $timelinedata["FLOW_MAIN"]!=NULL){
					echo "WAITING FOR APPROVAL";
				}
		  ?>
		  
          </h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> at <?php echo $timelinedata["FINISH_AT"]; ?></small></p>
        </div>
        <div class="timeline-body">
          <p>
          
            No SAP : <?php echo $timelinedata["NO_SAP"]; ?><br>
            Nama Mitra : <?php echo $timelinedata["NAMA_MITRA"]; ?><br>
            User : <?php echo $timelinedata["USER"]; ?><br>
            Level : <?php echo $timelinedata["LEVEL"]; ?><br>
            Area : <?php echo $timelinedata["AREA"]; ?><br>
          </p>
        </div>
      </div>
      
    </li>

<?php } 
?>
</ul>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->