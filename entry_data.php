<h1 class="page-header">
    Entry Data <small> checklist document</small>
</h1>
<?php
if(isset($_GET['flag_entry']) && ($_GET['flag_entry'] == 'REJECTED') ){
	// dokumen reject di perbaiki
	$get_reject_name = $_SESSION['USERNAME'];
	if(isset($_GET['doc_num']) && isset($_GET['year']) && isset($_GET['month']) && isset($_GET['no_sap'])) {
		$get_reject_doc_num = $_GET['doc_num'];
		$get_reject_year = $_GET['year'];
		$get_reject_month = $_GET['month'];
		$get_reject_no_sap = $_GET['no_sap'];
		$textreject = 	"
						SELECT * FROM `trx_detail` 
							WHERE 	`DOC_NUMBER` 	= '".$get_reject_doc_num."' AND
									`YEAR`	 		= '".$get_reject_year."' AND
									`MONTH`	 		= '".$get_reject_month."' AND
									`NO_SAP`	 	= '".$get_reject_no_sap."' AND
									`CREATED_BY` 	= '".$get_reject_name."' AND 
									`NOT_COMPLETE` 	= '' AND
									`REJECT_FLAG` 	= 'X'
							ORDER BY `DOC_NUMBER` DESC
						";
		//echo $textreject;
		$querypark 	= mysql_query($textreject);
		$num_park	= mysql_num_rows($querypark);
		if($num_park >= 1){
			$fetchpark = mysql_fetch_array($querypark);
				$haveincompletedoc = ''; // ini dulu buat apa ya kok lupa???
		}
	}

} elseif(isset($_GET['flag_entry']) && ($_GET['flag_entry'] == 'PARK') ){
echo 'MASUK PARK';	
// cek ada document yang belum selesai
$get_park_name = $_SESSION['USERNAME'];
if(isset($_GET['doc_num']) && isset($_GET['year']) && isset($_GET['month'])) {
	$get_park_doc_num = $_GET['doc_num'];
	$get_park_year = $_GET['year'];
	$get_park_month = $_GET['month'];
//	$get_park_no_sap = $_GET['no_sap']; 								`NO_SAP`	 	= '".$get_park_no_sap."' AND
	$textpark = 	"
					SELECT * FROM `trx_detail` 
						WHERE 	`DOC_NUMBER` 	= '".$get_park_doc_num."' AND
								`YEAR`	 		= '".$get_park_year."' AND
								`MONTH`	 		= '".$get_park_month."' AND
								`CREATED_BY` 	= '".$get_park_name."' AND 
								`NOT_COMPLETE` 	= 'X' 
						ORDER BY `DOC_NUMBER` DESC
					";
//	echo $textpark;
	$querypark 	= mysql_query($textpark);
	$num_park	= mysql_num_rows($querypark);
	if($num_park >= 1){
		$fetchpark = mysql_fetch_array($querypark);
		$haveincompletedoc = 1;
	}
}

} else {
//	$get_name_park = $_SESSION['USERNAME'];
//	$textpark = 	"
//					SELECT * FROM `trx_detail` WHERE `CREATED_BY` = '".$get_name_park."' AND NOT_COMPLETE = 'X' AND DELETE_FLAG = '' ORDER BY `DOC_NUMBER` DESC
//					";
//	$querypark 	= mysql_query($textpark);
//	$num_park	= mysql_num_rows($querypark);
//	if($num_park >= 1){
//		$fetchpark = mysql_fetch_array($querypark);
//			$haveincompletedoc = 1;
//	}
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!empty($_POST["nama_mitra"])) {
     $nama_mitra = test_input($_POST["nama_mitra"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<?php
?>     
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<input type="hidden" id="start_time" value="<?php echo date("Y-m-d H:i:s");?>">
		<input type="hidden" id="start_time_park" value="<?php echo date("Y-m-d H:i:s");?>">
		<input type="hidden" id="area" value="<?php echo $_SESSION['AREA']; ?>">
		<input type="hidden" id="incomplete" value="<?php echo $haveincompletedoc; ?>">
<?php 
	if($haveincompletedoc == 1){ 
?>
		<input type="hidden" id="park_doc_number" value="<?php echo $fetchpark['DOC_NUMBER']; ?>">
		<input type="hidden" id="park_year" value="<?php echo $fetchpark['YEAR']; ?>">
		<input type="hidden" id="park_month" value="<?php echo $fetchpark['MONTH']; ?>">
		<input type="hidden" id="park_level" value="<?php echo $fetchpark['LEVEL']; ?>">
		<input type="hidden" id="park_area" value="<?php echo $fetchpark['AREA']; ?>">
<?php
	} 

?>

		<!--#d0123b-->
        <div class="panel panel-default">
          <div class="panel-heading" style="background-color:#fdf9e4;  ">
            <h3 class="panel-title" style="background-color:#fdf9e4; "><span class="glyphicon glyphicon-th">&nbsp</span>Check list-Kelengkapan Dokumen Pembayaran Kontrak *(Mandatory)</h3>
          </div>
          <div class="panel-body" > 
            <div class="row"> 
	            <div class="entry_result" id="entry_result"></div>
    		</div>
            <!--  Panel content -->
            <div class="row"> 
              <!--  nama_mitra -->
              <div class="col-lg-12">
                <div class="input-group has-warning"> <span class="input-group-addon">Nama Mitra &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Nama Mitra" id="nama_mitra" name="nama_mitra" 
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['NAMA_MITRA']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
            </div>
            <!-- /.row -->
            
            <div class="row"> 
              <!--  nama_projek -->
              <div class="col-lg-12">
                <div class="input-group has-warning"> <span class="input-group-addon">Nama Projek &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Nama Projek" id="nama_proyek"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['NAMA_PROYEK']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
            </div>
            <!-- /.row -->
            
            <div class="row"> 
              <!--  No_Kontrak + PPN-->
              <div class="col-lg-5">
                <div class="input-group has-warning"> <span class="input-group-addon">No. Kontrak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="No. Kontrak" id="kontrak_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['KONTRAK_NO']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  No Kontrak + PPN Tgl-->
              <div class="col-lg-2">
                <div class="input-group has-warning"> <span class="input-group-addon">Tgl</span>
                  <input type="text" class="form-control" placeholder="Tgl" id="kontrak_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_kontrak_tgl = explode("-",$fetchpark['KONTRAK_TGL']);
								echo $f_kontrak_tgl[2].'/'.$f_kontrak_tgl[1].'/'.$f_kontrak_tgl[0];
							} 
						  ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  No Kontrak + PPN IDR-->
              <div class="col-lg-1">
                <div class="input-group has-warning"> 
                  <select class="form-control" id="kontrak_currency" >
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['KONTRAK_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['KONTRAK_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group has-warning"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="kontrak_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['KONTRAK_AMOUNT']; } ?>">
                </div>
              </div>              <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
            
            <div class="row">
              <!--  No_PO/SP-->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No. PO/SP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="No. PO/SP" id="po_sp_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PO_SP_NO']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  No Kontrak + PPN Tgl-->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Tgl</span>
                  <input type="text" class="form-control" placeholder="Tgl" id="po_sp_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_po_sp_tgl = explode("-",$fetchpark['PO_SP_TGL']);
								echo $f_po_sp_tgl[2].'/'.$f_po_sp_tgl[1].'/'.$f_po_sp_tgl[0];
							} 
						  ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="po_sp_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PO_SP_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PO_SP_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="po_sp_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PO_SP_AMOUNT']; } ?>">
                </div>
              </div>
            </div>
            <div class="row"> 
              <!--  No_Amandemen-->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No. Amandemen&nbsp;</span>
                  <input type="text" class="form-control" placeholder="No. Amandemen" id="amandemen_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['AMANDEMEN_NO']; } ?>" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  No Kontrak + PPN Tgl-->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Tgl</span>
                  <input type="text" class="form-control" placeholder="Tgl" id="amandemen_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_amandemen_tgl = explode("-",$fetchpark['AMANDEMEN_TGL']);
								echo $f_amandemen_tgl[2].'/'.$f_amandemen_tgl[1].'/'.$f_amandemen_tgl[0];
							} 
						  ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="amandemen_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['AMANDEMEN_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['AMANDEMEN_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="amandemen_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['AMANDEMEN_AMOUNT']; } ?>">
                </div>
              </div>
              <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->

            <div class="row"> 
              <!--  No_Amandemen-->
              <div class="col-lg-5">
                <div class="input-group has-warning"> <span class="input-group-addon">Nilai yang dibayarkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Amount" id="true_amount" name="number"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['TRUE_VALUE']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  No Kontrak + PPN Tgl-->
              <div class="col-lg-1">
                <div class="input-group has-warning"> 
                  <select class="form-control" id="true_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['TRUE_VALUE_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['TRUE_VALUE_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
            
            <div class="row">             
              <!--  Nilai_yang_dibayarkan foreign-->
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">Nilai Mata Uang Asing &nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Amount" id="foreign_amount" name="number"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['FOREIGN_AMOUNT']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  No Kontrak + PPN Tgl-->
              <div class="col-lg-1">
				<div class="input-group"> 
                <select class="form-control" id="foreign_currency">
					<option ></option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'AUD'){ echo 'selected'; } } ?> >AUD</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'BRL'){ echo 'selected'; } } ?> >BRL</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'CAD'){ echo 'selected'; } } ?> >CAD</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'CZK'){ echo 'selected'; } } ?> >CZK</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'DKK'){ echo 'selected'; } } ?> >DKK</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'EUR'){ echo 'selected'; } } ?> >EUR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'HKD'){ echo 'selected'; } } ?> >HKD</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'HUF'){ echo 'selected'; } } ?> >HUF</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'ILS'){ echo 'selected'; } } ?> >ILS</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'JPY'){ echo 'selected'; } } ?> >JPY</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'MYR'){ echo 'selected'; } } ?> >MYR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'MXN'){ echo 'selected'; } } ?> >MXN</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'NOK'){ echo 'selected'; } } ?> >NOK</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'NZD'){ echo 'selected'; } } ?> >NZD</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'PHP'){ echo 'selected'; } } ?> >PHP</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'PLN'){ echo 'selected'; } } ?> >PLN</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'GBP'){ echo 'selected'; } } ?> >GBP</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'SGD'){ echo 'selected'; } } ?> >SGD</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'SEK'){ echo 'selected'; } } ?> >SEK</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'CHF'){ echo 'selected'; } } ?> >CHF</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'TWD'){ echo 'selected'; } } ?> >TWD</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'THB'){ echo 'selected'; } } ?> >THB</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'TRY'){ echo 'selected'; } } ?> >TRY</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FOREIGN_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                </select>
                </div>
<!--                  <input type="text" class="form-control" placeholder="Currency" id="foreign_currency"
                  value="<?php //if($haveincompletedoc == 1){ echo $fetchpark['FOREIGN_CURRENCY']; } ?>">-->
               
              </div>
            </div>
            <!-- /.row -->
            
            <div class="row"> 
              <!--  Keterangan -->
              <div class="col-lg-12">
                <div class="input-group has-warning"> <span class="input-group-addon">Keterangan &nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="Keterangan" id="keterangan_value"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['KETERANGAN']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
            </div>
            <!-- /.row --> 
            
            <div class="row"> 
              <!--  Keterangan -->
              <div class="col-lg-5">
                <div class="input-group has-warning"> <span class="input-group-addon">No. SAP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="No SAP" id="no_sap"

                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['NO_SAP']; } ?>">
<!--                    onkeydown="return ( event.ctrlKey || event.altKey 
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9) 
                                        || (event.keyCode>34 && event.keyCode<40) 
                                        || (event.keyCode==46) )"-->
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->              
            </div>
            <!-- /.row --> 

            <div class="row"> 
              <!-- /.col-lg-6 --> 
              <div class="col-lg-5">
                <div class="input-group has-warning"> <span class="input-group-addon">No. SPB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="text" class="form-control" placeholder="No SPB" id="no_spb"

                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['NO_SPB']; } ?>">
<!--                    onkeydown="return ( event.ctrlKey || event.altKey 
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9) 
                                        || (event.keyCode>34 && event.keyCode<40) 
                                        || (event.keyCode==46) )"-->
                </div>
                <!-- /input-group --> 
              </div>
              
            </div>
            
            <!--  Panel content --> 
          </div>
        </div>
        <!--anel panel-default-->
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-th">&nbsp</span>Detail Document</h3>
          </div>
          <div class="panel-body"> 
            <!--  Panel content -->
            <p>1.) No. Surat Tagihan</p>
            <div class="row">
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="tagihan" id="tagihan_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['TAGIHAN_MARK'] == 'X'){ echo 'checked'; } } ?>
                  >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="tagihan" id="tagihan_0" 
                  <?php if($haveincompletedoc == 1){ if($fetchpark['TAGIHAN_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
              
              <!--  Surat Tagihan -->
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">No. Surat Tagihan</span>
                  <input type="text" class="form-control" placeholder="No Surat Tagihan" id="tagihan_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['TAGIHAN_NO']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
              
              <!--  Tgl-->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Tgl</span>
                  <input type="text" class="form-control" placeholder="Tgl" id="tagihan_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_tagihan_tgl = explode("-",$fetchpark['TAGIHAN_TGL']);
								echo $f_tagihan_tgl[2].'/'.$f_tagihan_tgl[1].'/'.$f_tagihan_tgl[0];
							} 
						  ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  Tgl-->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Tgl</span>
                  <input type="text" class="form-control" placeholder="Tgl Masuk" id="tagihan_tgl_masuk"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_tagihan_tgl_masuk = explode("-",$fetchpark['TAGIHAN_TGL_MASUK']);
								echo $f_tagihan_tgl_masuk[2].'/'.$f_tagihan_tgl_masuk[1].'/'.$f_tagihan_tgl_masuk[0];
							} 
						  ?>" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
            
            <p>2.) Invoice</p>
            <div class="row">
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="invoice" id="invoice_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['INVOICE_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="invoice" id="invoice_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['INVOICE_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
              
              <!--  Invoice -->
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">No. Invoice</span>
                  <input type="text" class="form-control" placeholder="No Invoice" id="invoice_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['INVOICE_NO']; } ?>">
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
              
              <!--  Tgl-->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Tgl</span>
                  <input type="text" class="form-control" placeholder="Tgl" id="invoice_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_invoice_tgl = explode("-",$fetchpark['INVOICE_TGL']);
								echo $f_invoice_tgl[2].'/'.$f_invoice_tgl[1].'/'.$f_invoice_tgl[0];
							} 
						  ?>" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              <!--  Tgl-->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Tgl</span> 
                  <!-- <input type="text" class="form-control" placeholder="Tgl Masuk" class="datepicker" data-date-format="mm/dd/yyyy" > -->
                  <input type="text" class="form-control" placeholder="Tgl Masuk" id="invoice_tgl_masuk" data-date-format="mm/dd/yyyy"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_invoice_tgl_masuk = explode("-",$fetchpark['INVOICE_TGL_MASUK']);
								echo $f_invoice_tgl_masuk[2].'/'.$f_invoice_tgl_masuk[1].'/'.$f_invoice_tgl_masuk[0];
							} 
						  ?>" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-4 --> 
              
            </div>
            <!-- /.row -->
            
            <p>3.) PO Awal NON PPN</p>
            <div class="row" > 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="po_non_ppn" id="po_non_ppn_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['PO_NON_PPN_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="po_non_ppn" id="po_non_ppn_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['PO_NON_PPN_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 --> 
              <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="po_non_ppn_currency" >
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PO_NON_PPN_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PO_NON_PPN_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="po_non_ppn_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PO_NON_PPN_AMOUNT']; } ?>" >
                </div>
              </div>
              <!-- /.col-lg-4 --> 
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">THP REKON</span>
                  <input type="text" class="form-control" placeholder="Tahap REKON" id="po_non_ppn_thp_rekon"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PO_NON_PPN_THP_REKON']; } ?>" >
                </div>
              </div>
            </div>
            <!-- /.row -->
            
            <div class="row"> 

              <!-- /.col-lg-6 --> 
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">NILAI AMANDEMEN NON PPN</span>
                  <select class="form-control" id="po_non_ppn_amd_currency" >
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PO_NON_PPN_AMANDEMEN_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PO_NON_PPN_AMANDEMEN_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-group"> <span class="input-group-addon">NILAI AMANDEMEN NON PPN</span>
                  <input type="text" class="form-control" placeholder="Amount" id="po_non_ppn_amd_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PO_NON_PPN_AMANDEMEN_AMOUNT']; } ?>" >
                </div>
              </div>
              <!-- /.col-lg-4 --> 
            </div>
            <!-- /.row -->
            <p>4.) Batas Akhir Pekerjaan</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="bts_akhir_kerja" id="bts_akhir_kerja_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['BATAS_AKHIR_PRJ_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="bts_akhir_kerja" id="bts_akhir_kerja_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['BATAS_AKHIR_PRJ_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">NO. BAUT</span>
                  <input type="text" class="form-control" placeholder="No BAUT" id="bts_akhir_kerja_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['BATAS_AKHIR_PRJ_NO_BAUT']; } ?>" >
                </div>
              </div>
            </div>
            
            <p>5.) BAST NON PPN</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="bast_non_ppn" id="bast_non_ppn_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['BAST_NON_PPN_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="bast_non_ppn" id="bast_non_ppn_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['BAST_NON_PPN_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="bast_non_ppn_currency" >
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['BAST_NON_PPN_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['BAST_NON_PPN_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="bast_non_ppn_amount" 
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['BAST_NON_PPN_AMOUNT']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">Barang</span>
                  <input type="text" class="form-control" placeholder="Barang" id="bast_non_ppn_barang"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['BAST_NON_PPN_BARANG']; } ?>" >
                </div>
              </div>
            </div>
            
            <div class="row"> 
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">Jasa</span>
                  <input type="text" class="form-control" placeholder="Jasa" id="bast_non_ppn_jasa"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['BAST_NON_PPN_JASA']; } ?>" >
                </div>
              </div>
              <!--  Tgl-->
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Tgl BAUT</span> 
                  <!-- <input type="text" class="form-control" placeholder="Tgl Masuk" class="datepicker" data-date-format="mm/dd/yyyy" > -->
                  <input type="text" class="form-control" placeholder="Tgl BAUT" data-date-format="mm/dd/yyyy" id="bast_non_ppn_tgl_baut"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_bast_non_ppn_tgl_baut = explode("-",$fetchpark['BAST_NON_PPN_TGL_BAUT']);
								echo $f_bast_non_ppn_tgl_baut[2].'/'.$f_bast_non_ppn_tgl_baut[1].'/'.$f_bast_non_ppn_tgl_baut[0];
							} 
						  ?>" >
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Tgl BAST</span> 
                  <!-- <input type="text" class="form-control" placeholder="Tgl Masuk" class="datepicker" data-date-format="mm/dd/yyyy" > -->
                  <input type="text" class="form-control" placeholder="Tgl BAST" data-date-format="mm/dd/yyyy" id="bast_non_ppn_tgl_bast"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_bast_non_ppn_tgl_bast = explode("-",$fetchpark['BAST_NON_PPN_TGL_BAST']);
								echo $f_bast_non_ppn_tgl_bast[2].'/'.$f_bast_non_ppn_tgl_bast[1].'/'.$f_bast_non_ppn_tgl_bast[0];
							} 
						  ?>" >
                </div>
              </div>
            </div>
            
            <p>6.) Potongan Uang Muka</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="ptgn_uang_muka" id="ptgn_uang_muka_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['PTG_UANG_MUKA_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="ptgn_uang_muka" id="ptgn_uang_muka_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['PTG_UANG_MUKA_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control"  id="ptgn_uang_muka_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PTG_UANG_MUKA_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['PTG_UANG_MUKA_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="ptgn_uang_muka_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PTG_UANG_MUKA_AMOUNT']; } ?>" >
                </div>
              </div>
            </div>
            
            <p>7.) Kuitansi + PPN</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="kuitansi" id="kuitansi_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['KUITANSI_PPN_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="kuitansi" id="kuitansi_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['KUITANSI_PPN_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group">
                  <select class="form-control"  id="kuitansi_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['KUITANSI_PPN_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['KUITANSI_PPN_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="kuitansi_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['KUITANSI_PPN_AMOUNT']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">DPP</span>
                  <input type="text" class="form-control" placeholder="DPP" id="kuitansi_dpp"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['KUITANSI_PPN_ATAU']; } ?>" >
                </div>
              </div>
            </div>
            
            <div class="row"> 
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">No Kuitansi</span>
                  <input type="text" class="form-control" placeholder="No Kuitansi" id="kuitansi_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['KUITANSI_PPN_NO']; } ?>" >
                </div>
              </div>         
               <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="checkbox" name="count_active" id="count_active_id" >
                  </span>
                  <input type="text" class="form-control" placeholder="Active Count" disabled="" >
                </div>
              </div>
              
            </div>

            <p>8.) Rekening</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="rekening" id="rekening_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['REKENING_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="rekening" id="rekening_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['REKENING_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">A.N</span>
                  <input type="text" class="form-control" placeholder="Atas Nama" id="rekening_ats_nm"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['REKENING_ATS_NAMA']; } ?>" >
                </div>
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control"  id="rekening_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['REKENING_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['REKENING_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="No Rekening"  id="rekening_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['REKENING_AMOUNT']; } ?>" > 
                </div>
              </div>
            </div>
            
            <div class="row"> 
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">BANK</span>
                  <input type="text" class="form-control" placeholder="BANK" id="rekening_bank"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['REKENING_BANK']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4">
                <div class="input-group"> <span class="input-group-addon">Kode Switch</span>
                  <input type="text" class="form-control" placeholder="Kode Switch" id="rekening_switch"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['REKENING_SW_CODE']; } ?>" >
                </div>
              </div>
            </div>
            
            <p>9.) Faktur Pajak</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="pajak" id="pajak_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['FAKTUR_PJK_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="pajak" id="pajak_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['FAKTUR_PJK_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="pajak_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FAKTUR_PJK_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['FAKTUR_PJK_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="pajak_amount" 
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['FAKTUR_PJK_AMOUNT']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">NO</span>
                  <input type="text" class="form-control" placeholder="No" id="pajak_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['FAKTUR_PJK_NO']; } ?>" >
                </div>
              </div>
            </div>
	
    		<div class="row">
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Tanggal </span>
                  <input type="text" class="form-control" placeholder="Tanggal" id="pajak_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_pajak_tgl = explode("-",$fetchpark['FAKTUR_PJK_TGL']);
								echo $f_pajak_tgl[2].'/'.$f_pajak_tgl[1].'/'.$f_pajak_tgl[0];
							} 
						  ?>" >
                </div>
              </div>
            </div>
            

            <p>10.) Jaminan Uang Muka</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="jamn_uang_muka" id="jamn_uang_muka_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_UANG_MUKA_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="jamn_uang_muka" id="jamn_uang_muka_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_UANG_MUKA_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="jamn_uang_muka_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_UANG_MUKA_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_UANG_MUKA_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="jamn_uang_muka_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['JAMN_UANG_MUKA_AMOUNT']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">ASSR</span>
                  <input type="text" class="form-control" placeholder="ASSR" id="jamn_uang_muka_assr"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['JAMN_UANG_MUKA_ASSR']; } ?>" >
                </div>
              </div>
            </div>
	
    		<div class="row">
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Expired</span>
                  <input type="text" class="form-control" placeholder="Expired" id="jamn_uang_muka_expired"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_jamn_uang_muka_expired = explode("-",$fetchpark['JAMN_UANG_MUKA_EXPIRED']);
								echo $f_jamn_uang_muka_expired[2].'/'.$f_jamn_uang_muka_expired[1].'/'.$f_jamn_uang_muka_expired[0];
							} 
						  ?>" >
                </div>
              </div>
            </div> 
           
            
            <p>11.) Jaminan Pelaksanaan</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="jamn_plksa" id="jamn_plksa_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PELKSNA_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="jamn_plksa" id="jamn_plksa_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PELKSNA_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="jamn_plksa_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PELKSNA_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PELKSNA_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="jamn_plksa_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['JAMN_PELKSNA_AMOUNT']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">ASSR</span>
                  <input type="text" class="form-control" placeholder="ASSR" id="jamn_plksa_assr"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['JAMN_PELKSNA_ASSR']; } ?>" >
                </div>
              </div>
            </div>
	
    		<div class="row">
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Expired</span>
                  <input type="text" class="form-control" placeholder="Expired" id="jamn_plksa_expired"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_jamn_plksa_expired = explode("-",$fetchpark['JAMN_PELKSNA_EXPIRED']);
								echo $f_jamn_plksa_expired[2].'/'.$f_jamn_plksa_expired[1].'/'.$f_jamn_plksa_expired[0];
							} 
						  ?>" >                 
                </div>
              </div>
            </div> 


            <p>12.) Jaminan Pemeliharaan</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="jamn_pmhr" id="jamn_pmhr_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PLHRA_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="jamn_pmhr" id="jamn_pmhr_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PLHRA_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
               <div class="col-lg-1">
                <div class="input-group"> 
                  <select class="form-control" id="jamn_pmhr_currency">
                    <!--<option value="#" disabled>Currency</option>-->
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PLHRA_CURRENCY'] == 'IDR'){ echo 'selected'; } } ?> >IDR</option>
                    <option <?php if($haveincompletedoc == 1){ if($fetchpark['JAMN_PLHRA_CURRENCY'] == 'USD'){ echo 'selected'; } } ?> >USD</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="Amount" id="jamn_pmhr_amount"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['JAMN_PLHRA_AMOUNT']; } ?>" >
                </div>
              </div>
              <div class="col-lg-4a">
                <div class="input-group"> <span class="input-group-addon">ASSR</span>
                  <input type="text" class="form-control" placeholder="ASSR" id="jamn_pmhr_assr"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['JAMN_PLHRA_ASSR']; } ?>" >
                </div>
              </div>
            </div>
	
    		<div class="row">
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">Expired</span>
                  <input type="text" class="form-control" placeholder="Expired" id="jamn_pmhr_expired"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_jamn_pmhr_expired = explode("-",$fetchpark['JAMN_PLHRA_EXPIRED']);
								echo $f_jamn_pmhr_expired[2].'/'.$f_jamn_pmhr_expired[1].'/'.$f_jamn_pmhr_expired[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div> 


            <p>13.) Polis Asuransi</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="pls_asu" id="pls_asu_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['POLIS_ASUR_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="pls_asu" id="pls_asu_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['POLIS_ASUR_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">No</span>
                  <input type="text" class="form-control" placeholder="No" id="pls_asu_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['POLIS_ASUR_NO']; } ?>" >
                </div>
              </div>
              <div class="col-lg-3">
                <div class="input-group"> <span class="input-group-addon">ASSR</span>
                  <input type="text" class="form-control" placeholder="ASSR" id="pls_asu_assr"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['POLIS_ASUR_ASSR']; } ?>" >
                </div>
              </div>
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">Expired</span>
                  <input type="text" class="form-control" placeholder="Expired" id="pls_asu_expired"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_pls_asu_expired = explode("-",$fetchpark['POLIS_ASUR_EXPIRED']);
								echo $f_pls_asu_expired[2].'/'.$f_pls_asu_expired[1].'/'.$f_pls_asu_expired[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div>
	

            <p>14.) Tanda Terima AS BUILD DRAW</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="tt_bld_draw" id="tt_bld_draw_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['TD_TERIMA_BLD_DRAW_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="tt_bld_draw" id="tt_bld_draw_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['TD_TERIMA_BLD_DRAW_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No</span>
                  <input type="text" class="form-control" placeholder="No" id="tt_bld_draw_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['TD_TERIMA_BLD_DRAW_NO']; } ?>" >
                </div>
              </div>
              <div class="col-lg-2a">
                <div class="input-group"> <span class="input-group-addon">Tanggal</span>
                  <input type="text" class="form-control" placeholder="Tanggal" id="tt_bld_draw_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_tt_bld_draw_tgl = explode("-",$fetchpark['TD_TERIMA_BLD_DRAW_TGL']);
								echo $f_tt_bld_draw_tgl[2].'/'.$f_tt_bld_draw_tgl[1].'/'.$f_tt_bld_draw_tgl[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div>


            <p>15.) SIUJK</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="siujk" id="siujk_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['SIUJK_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="siujk" id="siujk_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['SIUJK_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No</span>
                  <input type="text" class="form-control" placeholder="No" id="siujk_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['SIUJK_NO']; } ?>" >
                </div>
              </div>
              <div class="col-lg-2a">
                <div class="input-group"> <span class="input-group-addon">Tanggal</span>
                  <input type="text" class="form-control" placeholder="Tanggal" id="siujk_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_siujk_tgl = explode("-",$fetchpark['SIUJK_TGL']);
								echo $f_siujk_tgl[2].'/'.$f_siujk_tgl[1].'/'.$f_siujk_tgl[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div>


            <p>16.) NPWP</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="npwp" id="npwp_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['NPWP_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="npwp" id="npwp_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['NPWP_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No</span>
                  <input type="text" class="form-control" placeholder="No" id="npwp_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['NPWP_NO']; } ?>" >
                </div>
              </div>
              <div class="col-lg-2a">
                <div class="input-group"> <span class="input-group-addon">Tanggal</span>
                  <input type="text" class="form-control" placeholder="Tanggal" id="npwp_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_npwp_tgl = explode("-",$fetchpark['NPWP_TGL']);
								echo $f_npwp_tgl[2].'/'.$f_npwp_tgl[1].'/'.$f_npwp_tgl[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div>

            
            <p>17.) Form DGT-1</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="dgt" id="dgt_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['F_DGT1_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="dgt" id="dgt_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['F_DGT1_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No</span>
                  <input type="text" class="form-control" placeholder="No" id="dgt_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['F_DGT1_NO']; } ?>" >
                </div>
              </div>
              <div class="col-lg-2a">
                <div class="input-group"> <span class="input-group-addon">Tanggal</span>
                  <input type="text" class="form-control" placeholder="Tanggal" id="dgt_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_dgt_tgl = explode("-",$fetchpark['F_DGT1_TGL']);
								echo $f_dgt_tgl[2].'/'.$f_dgt_tgl[1].'/'.$f_dgt_tgl[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div>


            <p>18.) SIDE LETTER</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="side_ltr" id="side_ltr_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['SIDE_LETTER_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="side_ltr" id="side_ltr_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['SIDE_LETTER_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-5">
                <div class="input-group"> <span class="input-group-addon">No</span>
                  <input type="text" class="form-control" placeholder="No" id="side_ltr_no"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['SIDE_LETTER_NO']; } ?>" >
                </div>
              </div>
              <div class="col-lg-2a">
                <div class="input-group"> <span class="input-group-addon">Tanggal</span>
                  <input type="text" class="form-control" placeholder="Tanggal" id="side_ltr_tgl"
                  value="<?php 
				  			if($haveincompletedoc == 1){ 
								$f_side_ltr_tgl = explode("-",$fetchpark['SIDE_LETTER_TGL']);
								echo $f_side_ltr_tgl[2].'/'.$f_side_ltr_tgl[1].'/'.$f_side_ltr_tgl[0];
							} 
						  ?>" > 
                </div>
              </div>
            </div>


            <p>19.) REKON Waktu</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="rekon_wkt" id="rekon_wkt_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['REKON_WAKTU_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="rekon_wkt" id="rekon_wkt_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['REKON_WAKTU_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
            </div>


            <p>20.) PO MIGO</p>
            <div class="row"> 
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="po_migo" id="po_migo_1"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['PO_MIGO_MARK'] == 'X'){ echo 'checked'; } } ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-2">
                <div class="input-group"> <span class="input-group-addon">
                  <input type="radio" name="po_migo" id="po_migo_0"
				  <?php if($haveincompletedoc == 1){ if($fetchpark['PO_MIGO_MARK'] != 'X'){ echo 'checked'; } } else { echo 'checked'; }  ?> >
                  </span>
                  <input type="text" class="form-control" placeholder="Tidak Ada" disabled="" >
                </div>
                <!-- /input-group --> 
              </div>
              <div class="col-lg-8">
                <div class="input-group"> <span class="input-group-addon"></span>
                  <input type="text" class="form-control" placeholder="" id="po_migo_value"
                  value="<?php if($haveincompletedoc == 1){ echo $fetchpark['PO_MIGO_VALUE']; } ?>" >
                </div>
              </div>

            </div>

            <!--
			<div class="row">
            <br>
            </div>
			<div class="row">
			  <div class="col-lg-12" align="center">
			    <div class="input-group">
                  <input type="submit" name="submit_off" id="submit_off" value="Submit Document &raquo;" />
			    </div>
			  </div>
			</div> /.row -->
            
            <!--  Panel content --> 
          </div>
        </div>
        <!--anel panel-default-->
        
      </form>
      <!-- /.form --> 