
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patient effective date        <small>New Patient effective date</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/patient_effective_date'); ?>">Patient effective date</a></li>
        <li class="active">New</li>
    </ol>
</section>
<style>
.form-group{
	margin-bottom: 6px;
}
</style>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Patient effective date</h3>
                            <h5 class="widget-user-desc">New Patient effective date</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_patient_effective_date', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_patient_effective_date', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
							
							<div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8 cust-required-select">
                                <select  class="form-control chosen chosen-select-deselect" name="CARD_CODE" id="CARD_CODE" data-placeholder="" >
                                    <option value=""></option>
									<?php foreach (db_get_all_data('card') as $row): ?>
                                    <option value="<?= $row->CARD_CODE ?>"><?= $row->CARD_CODE; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PATIENT_NO" class="col-sm-2 control-label">Patient No
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-5 cust-required-select">
                                <select class="form-control chosen chosen-select-deselect" name="PATIENT_NO" id="PATIENT_NO" data-placeholder="Please select Partner Code first" disabled>
                                    
                                </select>
                            </div>
							
							<div class="col-sm-3">
								<input class="form-control reset-field" type="text" name="PATIENT_AUTONO" id="PATIENT_AUTONO" readonly>
							</div>
                        </div>
						
						<div class="form-group">
                            <label for="POLICY_NO" class="col-sm-2 control-label">Details
                            </label>
							<div class="col-sm-8">
                                <input type="text" class="form-control reset-field" name="POLICY_NO" id="POLICY_NO" value="" readonly>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label class="col-sm-4" style="color:blue;">Effective Date Details
                            </label>
                        </div>
						
							<div class="form-group ">
								<label for="PATIENT_EFFECTIVE_NO" class="col-sm-2 control-label">New Effective No 
								</label>
								<div class="col-sm-1">
									<input type="text" class="form-control reset-field" name="PATIENT_EFFECTIVE_NO" id="PATIENT_EFFECTIVE_NO" value="<?= set_value('PATIENT_EFFECTIVE_NO'); ?>" readonly>
								</div>

								<p name="contract_status" id="contract_status" class="col-sm-8" style="color:red;"></p>
							</div>

                                                 
                                                <div class="form-group ">
                            <label for="START_DATE" class="col-sm-2 control-label">Start Date 
                            </label>
                            <div class="col-sm-3">
								<input type="text" class="form-control pull-right datepicker reset-field" name="START_DATE" id="START_DATE">
                            </div>
							<label for="TERM_DATE" class="col-sm-2 control-label reset-field">Terminate Date 
                            </label>
                            <div class="col-sm-3">
								<input type="text" class="form-control pull-right datepicker reset-field" name="TERM_DATE" id="TERM_DATE">
							</div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="REMARK" class="col-sm-2 control-label">Remark 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="REMARK" name="REMARK" rows="5" class="textarea reset-field"><?= set_value('REMARK'); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save">
                            <i class="fa fa-save" ></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel">
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

function contract_active(max_no, start, term, autono){
	//Since the last contract is Activating, 
	//system will notice user the action will terminate the last contract
	var msg1 = "The last contract is still activating and the Date . The 'New Contract' action will terminate the last contract.<br>";
	var msg2 = "If you want to Extend the last contract, please go to the update page. ";
	var edit_url = "<a href=\'./edit/" + autono + "/" + max_no + "'> Click me </a><br>";
	
	if (start == null || start == "0000-00-00" || start == ""){
		start = "";
	}
	
	if (term == null || term == "0000-00-00" || term == ""){
		term = "";
	}
	
	var remark = document.getElementById('REMARK');
	

	remark.value = "Auto Terminate last contract";
	

	document.getElementById('contract_status').innerHTML = msg1 + msg2 + edit_url;
}

function contract_notstart(start){
	document.getElementById('TERM_DATE').value = start;
	document.getElementById('TERM_DATE').readOnly = true;
	
	
}

    $(document).ready(function(){
		
		var patient_name = [];
		
		$('#CARD_CODE').change(function(){
			var CARD_CODE = $('#CARD_CODE').val();
			$('#CARD_CODE').prop('disabled', true).trigger("chosen:updated");
			
			$('.reset-field').val("");
			$('#contract_status').text("");

			
			
			$("#PATIENT_NO")[0].selectedIndex = -1;
			$('#PATIENT_NO').attr("data-placeholder", " ");
			$('#PATIENT_NO').prop('disabled', true).trigger("chosen:updated");
			
			//Check if user clear the choice
			if (CARD_CODE == ""){
				$('#PATIENT_NO').attr("data-placeholder", "Please select Partner Code first").trigger("chosen:updated");
				$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
			}else{
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/patient_effective_date/add_patient_no/',
					dataType: "json",
					data: {CARD_CODE: CARD_CODE},
					success: function(data) {
						$('#PATIENT_NO').empty();

						if (data['patient_no_count']){
							
							$('#PATIENT_NO').append('<option value=""></option>');
							  
							$.each(data['patient_no'], function(index, val) {
								$('#PATIENT_NO').append("<option value='" + val.PATIENT_NO + "'>" + val.PATIENT_NAME + " (" + val.PATIENT_NO + ")" + "</option>");
								patient_name[index] = val.PATIENT_NAME;
							});

							$("#PATIENT_NO")[0].selectedIndex = -1;
							$('#PATIENT_NO').attr("data-placeholder", "Select the Patient No of " + CARD_CODE);
							$('#PATIENT_NO').prop('disabled', false).trigger("chosen:updated");
							
							$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
						}else{
							$('#PATIENT_NO').attr("data-placeholder", "This partner has no patient").trigger("chosen:updated");
							$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
						}
					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}
				})

			}

		});
		
		
		
		$('#PATIENT_NO').change(function(){
			
			var CARD_CODE = $('#CARD_CODE').val();
			var patient_no = $('#PATIENT_NO').val();
			var select_index = $('#PATIENT_NO')[0].selectedIndex;
			
			console.log(CARD_CODE);
			console.log(patient_no);
			console.log(patient_name[select_index-1]);
			
			$('.reset-field').val("");
			$('#START_DATE').attr("readonly", false);
			$('#TERM_DATE').attr("readonly", false);
			$('#contract_status').text("");
			
			
			$('#CARD_CODE').prop('disabled', true).trigger("chosen:updated");
			$('#CARD_CODE').prop('disabled', true).trigger("chosen:updated");
			

			
			$('#PATIENT_NO').prop('disabled', true).trigger("chosen:updated");
			

			if (patient_no == ""){

				$('#PATIENT_NO').prop("selectedIndex", -1); 
				$('#PATIENT_NO').attr("data-placeholder", "Select the Patient No of " + CARD_CODE).trigger("chosen:updated");
				$('#PATIENT_NO').prop('disabled', false).trigger("chosen:updated");
				$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
				
			}else{
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/patient_effective_date/add_patient_details/',
					dataType: "json",
					data: {CARD_CODE: CARD_CODE, patient_no: patient_no, patient_name: patient_name[select_index-1]},
					success: function(data) {
						
						
						if (data['patient_count']){
							$('#POLICY_NO').val("Policy No: " + data['patient'].POLICY_NO + " \t\t Dependent Code: " + data['patient'].DEPD_CODE);

							$('#PATIENT_AUTONO').val("Auto no: " + data['patient'].AUTO_NO);

						
							//Check if the patient has contract
							if (data['patient_effective_date_count']){

								var max_no = parseInt(data['patient_effective_date_no'].max_effective_no);
								var new_no = (max_no+1);
								
								var autono = $('#PATIENT_AUTONO').val();
								autono = autono.substr(autono.length - 1);


								$('#PATIENT_EFFECTIVE_NO').val(new_no);
								
								//Check contract status then notice user follow the action
								if (data['patient_effective_date'].STATUS == "Active"){
									contract_active(max_no, data['patient_effective_date'].START_DATE, data['patient_effective_date'].TERM_DATE, autono);
									
								}else{
									
									//If the last contract status is Not Start
									if (data['patient_effective_date'].STATUS == "Not Start"){
										$('#contract_status').html("The latest contract will start on " + data['patient_effective_date'].START_DATE + "." +
										" <br>If you want to update the Activating Contract, please go to the update page. <a href=\'./edit/" + 
										autono + "/" + (max_no-1) + "'> Click me </a>");
										
										$('#PATIENT_EFFECTIVE_NO').val("");
										$('#START_DATE').attr("readonly", true);
										$('#TERM_DATE').attr("readonly", true);
										$('#REMARK').attr("readonly", true);
									}
								}

							}else{
								$('#PATIENT_EFFECTIVE_NO').val("1");
							}

						}else{
							alert("Error");
						}
						
						$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
							$('#PATIENT_NO').prop('disabled', false).trigger("chosen:updated");
						
					},error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}

				})

			}

		});
		
		$('#START_DATE').change(function(){
			$("#TERM_DATE").datetimepicker({
				format:'Y/m/d',
				defaultDate: $('#START_DATE').val(),
				timepicker:false
			});
		});
        
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
              window.location.href = BASE_URL + 'administrator/patient_effective_date';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_patient_effective_date = $('#form_patient_effective_date');
        var data_post = form_patient_effective_date.serializeArray();
        var save_type = $(this).attr('data-stype');
		
		
		if ($('#contract_status').text() == ""){
			var last_active = 0;
		}else{
			var last_active = 1;
		}

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/patient_effective_date/add_save',
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