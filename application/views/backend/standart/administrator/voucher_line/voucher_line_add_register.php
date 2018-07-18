
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Registration Voucher
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher</a></li>
        <li class="active">New</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <?= form_open('', [
                            'name'    => 'form_voucher_line', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_voucher_line', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
							
						<div class="form-group">
						
							<label class="col-sm-8"></label>
							<label for="BATCH_NO" class="col-sm-2 control-label">Batch No. 
						   </label>
						   <div class="col-sm-2">
							  <input type="text" class="form-control" name="BATCH_NO" id="BATCH_NO" value="" readonly ">
						   </div>
<!-- 						   <button type="button" id="GEN_BATCH" class="btn btn-success">GEN BATCH NO.</button>
 -->
						</div>
						<hr>
  

						<div class="form-group">
						   <label for="VOUCHER_NO" class="col-sm-2 control-label">Voucher No.  
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-6">
							  <input type="text" class="form-control" name="VOUCHER_NO" id="VOUCHER_NO" placeholder="Please input the voucher number">
						   </div>
						</div>
						<hr>
						                      <div class="form-group">

						   <label for="TREATMENT_DATE" class="col-sm-2 control-label">Treatment Date 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-6">
							  <input type="text" class="form-control pull-right datepicker" name="TREATMENT_DATE" id="TREATMENT_DATE" placeholder="please select the treatment date">
						   </div>
						
						</div>
												<hr>


						<div class="form-group">
						   <label for="COM_ID" class="col-sm-2 control-label">Comapny Name
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-6">
							  <select name="COM_ID" class="form-control chosen chosen-select-deselect cust-dr-change" id="COM_ID" data-placeholder="choose a insurance company">
								 <option value=""></option>
								 <?php foreach (db_get_all_data('company') as $index=>$row): ?>
								 <option value="<?php echo $row->COM_ID; ?>"> <?= $row->E_NAME; ?></option>
								 
								 <?php endforeach; ?>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
												<hr>

						<div class="form-group">
						   <label for="CARD_CODE" class="col-sm-2 control-label">Card Type
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-6">
							  <select name="CARD_CODE" class="form-control chosen chosen-select-deselect cust-partner-change cust-dr-change" data-placeholder="Select a company first" id="CARD_CODE">
								 <option value=""></option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>		   
						</div>		<hr>
						                	<div class="form-group">
						   <label for="CLASS_CODE" class="col-sm-2 control-label">Card Class
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-6">
							  <select name="CLASS_CODE" class="form-control chosen chosen-select-deselect cust-partner-change" id="CLASS_CODE" data-placeholder="Select a card class">
							  </select>
						   </div>
						</div>
							<hr>
												<div class="form-group">
						   <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Company Doctor Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-6">
							  <select name="PARTNER_DR_CODE" class="form-control chosen chosen-select-deselect cust-partner-change" id="PARTNER_DR_CODE" data-placeholder="Select a Doctor">
							  </select>
						   </div>
						</div>
							<hr>			

                        <div class="message"></div>
                        <div class="row-fluid col-md-7 col-md-offset-3">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)">
                            <i class="fa fa-save" ></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)">
                            <i class="fa fa-undo" ></i> Cancel
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i>Loading, Saving data</i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                </div>
            
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script --> 
<script>
    $(document).ready(function(){
	   
	   $('#TREATMENT_DATE').on('change',function(){
			 $('#BATCH_NO').val("");
			 $('#COM_ID').val("").trigger('chosen:updated');
			 $('#CARD_CODE').val("").trigger('chosen:updated');
			 $('#CLASS_CODE').val("").trigger('chosen:updated');
			 $('#PARTNER_DR_CODE').val("").trigger('chosen:updated');

			 $('#CARD_CODE').empty();
             $('#CLASS_CODE').empty();
             $('#PARTNER_DR_CODE').empty();
				

		});
		

		$('#COM_ID').on('change',function(){
			 $('#BATCH_NO').val("");
			 $('#CARD_CODE').val("").trigger('chosen:updated');
			 $('#CLASS_CODE').val("").trigger('chosen:updated');
			 $('#PARTNER_DR_CODE').val("").trigger('chosen:updated');

			
		    $('#CARD_CODE').empty();
            $('#CLASS_CODE').empty();
            $('#PARTNER_DR_CODE').empty();
				
			var COM_ID = $('#COM_ID').val();

			if (COM_ID != ""){
				
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/voucher_line_tmp/company_change/',
					data:{'COM_ID': COM_ID},
					dataType: "JSON",
					success: function(data) {

						if (data['has_card']){
							
							$('#CARD_CODE').append("<option value=''></option>");
							
							$.each(data['cards'], function(index, val) {
								$('#CARD_CODE').append("<option value='" + val.CARD_CODE + "'>" + val.CARD_CODE + "</option>");
							});
							
							$('#CARD_CODE').attr('data-placeholder', 'Select an option');
							
						}else{
							$('#CARD_CODE').attr('data-placeholder', 'This partner doesn\'t have any active card');
						}
						
						
						$('#COM_ID').prop("disabled", false).trigger('chosen:updated');
						$('#CARD_CODE').prop("disabled", false).trigger('chosen:updated');
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}else{
			
				$('#COM_ID').prop("disabled", false).trigger('chosen:updated');
				
				$('#CARD_CODE').attr('data-placeholder', 'Select a Partner first');
				$('#CARD_CODE').prop("disabled", true).trigger('chosen:updated');
			}
			
		});
		
		
		$('#CARD_CODE').on('change',function(){
			$('#BATCH_NO').val("");
			$('#CLASS_CODE').val("").trigger('chosen:updated');
			$('#PARTNER_DR_CODE').val("").trigger('chosen:updated');
	        
	        $('#PARTNER_DR_CODE').empty();
 			$('#CLASS_CODE').empty();

			var COM_ID = $('#COM_ID').val();
			var CARD_CODE = $('#CARD_CODE').val();

		   $.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/voucher_line_tmp/card_change/',
					data:{'COM_ID': COM_ID,  'CARD_CODE':CARD_CODE},
					dataType: "JSON",
					success: function(data) {
					    var has_batchno = data.has_batchno;
						var is_settled = data.is_settled;
						var doctors = data.doctors;
               			var classes = data.classes;
               			//GENERATE CLASS OPTIONS
						if (data.has_class) {
						    var class_option = '<option value=""></option>';

						    for (var i = 0; i < classes.length; i++) {
						    	class_option += '<option value="'+classes[i].CLASS_CODE +'">' + classes[i].CLASS_CODE +'</option>';
						    	
						    }

						} else{
						    	class_option = '<option value=""> There is No Class bound with this card </option>';
						}
						 $('#CLASS_CODE').append(class_option);
						 $('#CLASS_CODE').trigger('chosen:updated');

						// GENERATE DOCTOR OPTIONS
						if (data.has_doctor) {
						
						     var doctor_option = '<option value=""></option>';
							for (var i = 0; i < doctors.length; i++) {
								if(doctors[i].PARTNER_DR_CODE!=''){
									doctor_option += '<option value="'+ doctors[i].PARTNER_DR_CODE + '">' + doctors[i].PARTNER_DR_CODE + '</option>';
								}else{
									doctor_option = '<option value="">There is No Company Doctor Code available</option>';
								}
							}
						} else{
							       doctor_option = '<option value="">There is No doctor bound with this Card</option>';

						}
							$('#PARTNER_DR_CODE').append(doctor_option);
							$('#PARTNER_DR_CODE').trigger("chosen:updated");
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
		});
   
		$('#CLASS_CODE').on('change',function(){

            $('#BATCH_NO').val("");

			var COM_ID = $('#COM_ID').val();
			var CARD_CODE = $('#CARD_CODE').val();
			var TREATMENT_DATE = $('#TREATMENT_DATE').val();
			var CLASS_CODE = $('#CLASS_CODE').val();
	  
	        if (CARD_CODE != "" && COM_ID != "" && TREATMENT_DATE != "" && CLASS_CODE!=''){
					var date = new Date(TREATMENT_DATE);
					var year = date.getFullYear();
					var month = date.getMonth();
		                 month = month+1;
		                if (month<10) {
		            	    month = '0'+month;
              }
            // GENARAE BATCH NO ACCORDING TO TREATMENT DATE(YEAR+ MONTH) + CARD TYPE + CLASS 
		    var batch_no = year + month +'-'+ COM_ID + '-'+CARD_CODE + '-' + CLASS_CODE;
			
			$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/voucher_line_tmp/search_batch/',
					data:{'batch_no': batch_no},
					dataType: "JSON",
					success: function(data) {
					    var has_batchno = data.has_batchno;
						var is_settled = data.is_settled;

                        // GENERATE BATCH NNUMBER
						if (has_batchno) {

							if (is_settled==false) {

								$('#BATCH_NO').prop('value',batch_no);
							}
							else{
								// if latest batch is settled, put this voucher to next batch
							    var  Next_month = parseInt(month)+1;
							    Next_month = '0'+ Next_month;
							    var New_batch_no = year +  Next_month + '-'+ COM_ID +'-'+ CARD_CODE + '-' + CLASS_CODE;
							    $('#BATCH_NO').prop('value',New_batch_no);
							}
						}else{

						  $('#BATCH_NO').prop('value',batch_no);

						}
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}
		})	
	   
	   //Genrate Batch No


		
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/voucher_line_tmp';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_voucher_line = $('#form_voucher_line');
        var data_post = form_voucher_line.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/voucher_line_tmp/add_register_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
 
       
    
    
    }); /*end doc ready*/
</script>