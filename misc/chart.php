
<div class="panel panel-default" style="">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp;</span>My Performance Summary </h3>
  </div>
  <div class="panel-body"> 
  
<div class="zclear"></div>   
<div id="zchart" style="width:100%; height:300px;"></div>
<div class="zclear"></div>   


  </div>
</div>  


<?php 
if(isset($_SESSION['USERNAME']) and $_SESSION['USERNAME'] != '' and
   isset($_SESSION['LEVEL']) and $_SESSION['LEVEL'] != ''){
		$label = "";
		$dataset = "";		
		$datasetreject = "";
		$year = date('Y');
		// get all year data chart
//		$text_year = 'SELECT year FROM `trx_number` ORDER BY `YEAR` ASC';
//		$query_year = mysql_query($text_year);
//		if (!$query_year) echo mysql_error();
//		$lv_year = ''; $count_year = 0;
//		while($data_year=mysql_fetch_array($query_year)){
//			$count_year = $count_year + 1;
//			if($count_year == 1){
//				$lv_year = $lv_year.' trx_history.YEAR = "'.$data_year["year"].'"';			
//			} else {
//				$lv_year = $lv_year.' OR 	trx_history.YEAR = "'.$data_year["year"].'"';			
//			}
//		}

//		$modif_query = '
//					SELECT 	* 
//					FROM	trx_history 
//					WHERE	trx_history.USER = "'.$_SESSION['USERNAME'].'"
//					AND ('.$lv_year.')
//					AND   	trx_history.STATUS != "PARK"  ';

//		echo $lv_year;
		$modif_query = '
					SELECT 	* 
					FROM	trx_history 
					WHERE	trx_history.USER = "'.$_SESSION['USERNAME'].'"
					AND 	trx_history.YEAR = "'.$year.'" 
					AND   	trx_history.STATUS != "PARK"  ';

//		echo $modif_query;
		$result = mysql_query($modif_query);
													
		// Verify it worked
		if (!$result) echo mysql_error();		
		
		while($data=mysql_fetch_array($result)){
												
			 $date1 = $data["START_AT"];
			 $date2 = $data["FINISH_AT"]; 
			 $diff = strtotime($date2) - strtotime($date1);
			 $diff_in_hrs = round($diff/60,0);
			 
			if($label == ""){
				$label = "'".$data["DOC_NUMBER"]."'";
				
				if($data["STATUS"]=="REJECT"){		
					if($datasetreject == ""){
						$datasetreject = "".$diff_in_hrs."";
						$dataset = ""."null"."";
					}else{
						$datasetreject = $datasetreject.",".$diff_in_hrs."";
						$dataset = $dataset.","."null"."";
					}
				}else{
					if($dataset == ""){
						$dataset = "".$diff_in_hrs."";
						$datasetreject = ""."null"."";
					}else{
						$dataset = $dataset.",".$diff_in_hrs."";
						$datasetreject = $datasetreject.","."null"."";
					}
				}
				
			}else{
				$label = $label.",'".$data["DOC_NUMBER"]."'";
				//$dataset = $dataset.",".$diff_in_hrs."";
				if($data["STATUS"]=="REJECT"){		
					if($datasetreject == ""){
						$datasetreject = "".$diff_in_hrs."";
						$dataset = ""."null"."";
					}else{
						$datasetreject = $datasetreject.",".$diff_in_hrs."";
						$dataset = $dataset.","."null"."";
					}
				}else{
					if($dataset == ""){
						$dataset = "".$diff_in_hrs."";
						$datasetreject = ""."null"."";
					}else{
						$dataset = $dataset.",".$diff_in_hrs."";
						$datasetreject = $datasetreject.","."null"."";
					}
				}
				
				
			}
			
			
		} //echo $label."<br>".$dataset."<br>".$datasetreject;
	
   }
?>

<script>
$(function () {
    $('#zchart').highcharts({
		chart: {
            type: 'area', zoomType: 'x'
        },
        title: {
            text: 'Document Duration'
        },
        subtitle: {
            text: '(in minutes)'
        },
        xAxis: {
            title: {
                text: 'Document'
            },
			categories: [<?=$label?>],
			labels: {
                enabled: false
            }
			
        },
        yAxis: {
            title: {
                text: 'Duration (Minutes)'
            },
        },
        tooltip: {
            pointFormat: '{series.name} {point.y:,.0f}'
        },
        
        series: [{
            name: 'Submitted/Approval Document',
            data: [<?=$dataset?>]
        }, {
            name: 'Rejected Document',
             data: [<?=$datasetreject?>]
        }]
		
    });
});
</script>
