<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Excel docs reader</title>
</head>
<style type="text/css">
	#hint-box{
		color: green;
		width: 90%;
		margin:auto;
		word-spacing: 5px;
		font-size: 15px;
		line-height: 2;
	}
</style>
<body>
	<?php echo form_open_multipart(site_url('administrator/patient_upload/do_upload'));?>
		<h3>　</h3>
		<div class="form-group ">
		   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
		   <i class="required">*</i>
		   </label>
		   <div class="col-sm-3">
			  <select  class="form-control chosen chosen-select-deselect" name="CARD_CODE" id="CARD_CODE" data-placeholder="" >
			  	 <option value="">SELECT A PARTNER</option>
				 <option value="tokio">Tokio marine </option>
				 <option value="scb">SCB </option>
				 <option value="now">Now Health Intl</option>
				 <option value="mass">Mass Mutual</option>
				 <option value="ka">KA-QHMS </option>
				 <option value="gen">Generali </option>
			  </select>
		   </div>
		</div>
		<div id="hint-box" class="form-group">
			
		</div>
		<div class="form-group ">
			<label class="col-sm-2"></label>
			
			<div class="col-sm-3">
				<input type="file" name="excelFile[]" accept=".txt, .xlsx, .xls" multiple>(txt, xlsx,xls)
			</div>
		</div>
		
		<div class="form-group ">
			<label class="col-sm-2"></label>
	
			<div class="col-sm-3">
				<input type="submit" name="submit" value="Submit">
			</div>
		</div>
		
		<input type="hidden" name="user" value="<?= $user; ?>">
		
	</form>
	<br><br><hr>	
</body>
<script type="text/javascript">
	$(document).ready(function(){
			$('#CARD_CODE').on('change',function(){
				$CARD_CODE = $(this).val();
				if ($CARD_CODE =='tokio') {
					$('#hint-box').html('FILE YOU NEED TO PREPARE:'+'<br>'+ '1.Client List   2.Waiver Letter   3.Member details');
				}else if ($CARD_CODE=='mass') {
			        $('#hint-box').html('FILE YOU NEED TO PREPARE:'+'<br>'+ 'Mass Mutual Member Lists');
	
				}
				else if ($CARD_CODE=='ka') {
			        $('#hint-box').html('FILE YOU NEED TO PREPARE:'+'<br>'+ 'KA-QHMS Member Lists');
	
				}else if($CARD_CODE=='gen'){

                   $('#hint-box').html('FILE YOU NEED TO PREPARE FOR GEN:'+'<br>'+' 1. Patient data (txt format) 2.Benefit table(xlsx / xls format)');

				}else{

				  $('#hint-box').html('NULL');

				}
         	});
	})

</script>