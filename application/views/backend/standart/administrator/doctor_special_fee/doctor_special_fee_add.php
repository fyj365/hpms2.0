
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor Special Fee        <small>New Doctor Special Fee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_special_fee'); ?>">Doctor Special Fee</a></li>
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
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Doctor Special Fee</h3>
                            <h5 class="widget-user-desc">New Doctor Special Fee</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_doctor_special_fee', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_special_fee', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>

						<div class="form-group ">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <select class="form-control chosen chosen-select-deselect cust-partner-change" name="DR_CODE" id="DR_CODE">
								 <option value=""></option>
								 <?php foreach (db_get_all_data('doctor') as $index=>$row): ?>
								 <option value="<?= $row->DR_CODE; ?>"><?= $row->DR_CODE; ?></option>
								 <?php endforeach; ?>  
							  </select>
							  <small class="info help-block">
							  </small>
							</div>
						</div>
						
						<div class="form-group ">
							 <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
							 <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
								<select class="form-control chosen chosen-select-deselect cust-partner-change" data-placeholder="Select Dr Code first" name="CARD_CODE" id="CARD_CODE" disabled>
									<option value=""></option>
								</select>
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						<div class="form-group ">
							 <label for="CLASS_CODE" class="col-sm-2 control-label">Activating Card 
							 <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
								<select class="form-control chosen chosen-select-deselect cust-partner-change" data-placeholder="　" name="CLASS_CODE" id="CLASS_CODE" disabled>
									<option value=""></option>
								</select>
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						
						<div class="form-group ">
							<label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE" value="<?= set_value('PARTNER_DR_CODE'); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						
						<hr>
						
						<div class="form-group ">
						   <label for="TYPE" class="col-sm-2 control-label">Type 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-3 cust-required-select">
								<select class="form-control chosen chosen-select-deselect cust-dr-reset cust-dr-change cust-partner-change" data-placeholder="Select Dr Code first" name="TYPE" id="TYPE" disabled>
									<option value=""></option>
								</select>
								<small class="info help-block">
								</small>
						   </div>
						   
						   <label for="MED_DAYS" class="col-sm-2 control-label">Med Days 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-3 cust-required-select">
							  <select class="form-control chosen chosen-select-deselect cust-partner-reset cust-partner-change cust-dr-change" name="MED_DAYS" id="MED_DAYS" disabled>
									<option value=""></option>
								</select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>

						<div class="form-group ">
						   <label for="SPECIAL_FEE" class="col-sm-2 control-label">Special Fee
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control cust-required" name="SPECIAL_FEE" id="SPECIAL_FEE" value="<?= set_value('SPECIAL_FEE'); ?>">
							  <small class="info help-block">Please input the balance in Special Fee</small>
						   </div>
						   
						   <!--
						   Agreed Fee: Pay Reference
						   
							   <div class="col-sm-4">
									<p id="agreed_pay"></p>
							   </div>
						   -->
						</div>
						<div class="form-group ">
						   <label for="REMARK" class="col-sm-2 control-label">Remark 
						   </label>
						   <div class="col-sm-8">
							  <textarea id="REMARK" name="REMARK" rows="5" class="textarea"><?= set_value('REMARK'); ?></textarea>
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
    $(document).ready(function(){
		
		var partner_dr_code_s = [];
		var CLASS_CODE_s = [];
		
		$('#DR_CODE').change(function() {
			var dr_code = $(this).val();
			
			$("#CLASS_CODE")[0].selectedIndex = -1;
			$('#CLASS_CODE').attr("data-placeholder", "　").trigger("chosen:updated");
			
			$("#TYPE")[0].selectedIndex = -1;
			$('#TYPE').attr("data-placeholder", "　").trigger("chosen:updated");
			
			$("#MED_DAYS")[0].selectedIndex = -1;
			$('#MED_DAYS').attr("data-placeholder", "　").trigger("chosen:updated");
			
			$('.cust-dr-change').prop('disabled', true);
			$('.cust-dr-change')[0].selectedIndex = -1;
			$('.cust-dr-change').attr("data-placeholder", "　").trigger("chosen:updated");
			$('#CLASS_CODE').prop('disabled', true);
			$('#CLASS_CODE')[0].selectedIndex = -1;
			$('#CLASS_CODE').attr("data-placeholder", "　").trigger("chosen:updated");

			
			$('#DR_CODE').prop('disabled', true).trigger("chosen:updated");
			
			$('#PARTNER_DR_CODE').val("");
			
			$('#CARD_CODE').prop('disabled', true);
			$('#CARD_CODE')[0].selectedIndex = -1;
			$('#CARD_CODE').attr("data-placeholder", "　").trigger("chosen:updated");
			
			partner_dr_code_s = [];

			if (dr_code != ""){
				$.ajax({
					url: BASE_URL + '/administrator/doctor_special_fee/search_doctor_detail/',
					type: 'GET',
					data:{'dr_code': dr_code},
					dataType:'json',
					success: function(data){
						
						$("#CLASS_CODE").empty();
						$("#CARD_CODE").empty();
						$('#TYPE').empty();
						$("#MED_DAYS").empty();
						
						
						if (data['has_doctor_partner']){
							
							
							// ---------------- Append the doctor card & partner doctor code ----------------
							$.each(data['doctor_partner'], function(index, val) {
								
								$('#CARD_CODE').append("<option value='" + val.CARD_CODE + "'>" + val.CARD_CODE + "</option>");
								
							});
							
							
							
							//------------------------------------------------------------------
							
							if (data['has_partner_card']){
								$.each(data['partner_card'], function(index, val) {
									$('#CLASS_CODE').append("<option value='" + val.CLASS_CODE + "'>(Card Type: " + val.CLASS_CODE + ") &nbsp; " + val.CLASS_DESC + "</option>");
								});
								
								// ---------------- Append the med days ----------------
								if (data['has_med_days']){
									$.each(data['med_days'], function(index, val) {
										$('#MED_DAYS').append("<option value='" + val.MED_DAYS + "'>" + val.MED_DAYS + "</option>");
										
									});
								}else{
									$("#MED_DAYS")[0].selectedIndex = -1;
									$('#MED_DAYS').attr("data-placeholder", "No agreed fee in this doctor type").trigger("chosen:updated");
								
								}
								
								/*
								Agreed Fee: Pay Reference
								$('#agreed_pay').html("<span style='color:red;'>(For reference)</span>The Pay in Agreed Fee: " + data['med_days'][0].PAY);
								*/
								
								//------------------------------------------------------------------
								

								// ---------------- Append the doctor type ----------------
								if (data['doctor_type'].TYPE1 != ""){
									$('#TYPE').append("<option value='" + data['doctor_type'].TYPE1 + "'>" + data['doctor_type'].TYPE1 + "</option>");
								}
								
								if (data['doctor_type'].TYPE2 != ""){
									$('#TYPE').append("<option value='" + data['doctor_type'].TYPE2 + "'>" + data['doctor_type'].TYPE2 + "</option>");
								}
								
								if (data['doctor_type'].TYPE3 != ""){
									$('#TYPE').append("<option value='" + data['doctor_type'].TYPE3 + "'>" + data['doctor_type'].TYPE3 + "</option>");
								}
								
								$("#PARTNER_DR_CODE").val(data['doctor_type'].PARTNER_DR_CODE);
								
								//------------------------------------------------------------------
								
								
								$("#CARD_CODE").attr("data-placeholder", "Select the Partner of Dr. " + dr_code).trigger("chosen:updated");
								
								$('#CLASS_CODE').prop('disabled', false).trigger("chosen:updated");

								$('#MED_DAYS').prop('disabled', false).trigger("chosen:updated");
								
								$('#TYPE').attr("data-placeholder", "Select the Type of Dr. " + dr_code);
								$('.cust-dr-change').prop('disabled', false).trigger("chosen:updated");
								
								$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
								$('#DR_CODE').prop('disabled', false).trigger("chosen:updated");
								
							}else{
								
								$('#CLASS_CODE').attr("data-placeholder", "This partner has no activating card").trigger("chosen:updated");
							
							}
							
						}else{

							$('#CARD_CODE').attr("data-placeholder", "This doctor has no business partner. Please select another doctor").trigger("chosen:updated");
							$("#PARTNER_DR_CODE").val("");
							$('#DR_CODE').prop('disabled', false).trigger("chosen:updated");
							
						}
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
			}else{
				$('#CARD_CODE').attr("data-placeholder", "Select Dr Code first").trigger("chosen:updated");
				$('#DR_CODE').prop('disabled', false).trigger("chosen:updated");
				
			}
		});
		
		
		$('#CARD_CODE').change(function() {
			var dr_code = $('#DR_CODE').val();
			var CARD_CODE = $('#CARD_CODE').val();
			var select_index = $('#CARD_CODE')[0].selectedIndex;
			
			$("#PARTNER_DR_CODE").val(partner_dr_code_s[select_index]);

			$("#MED_DAYS").empty();
			$('#MED_DAYS')[0].selectedIndex = -1;
			$('#MED_DAYS').attr("data-placeholder", "　").trigger("chosen:updated");
			$('.cust-partner-change').prop('disabled', true).trigger("chosen:updated");
			
			$('#TYPE')[0].selectedIndex = -1;
			$('#TYPE').attr("data-placeholder", "　").trigger("chosen:updated");
			$('#TYPE').prop('disabled', true).trigger("chosen:updated");
			
			$('#CLASS_CODE').prop('disabled', true).trigger("chosen:updated");
			
			if (CARD_CODE != ""){

				$.ajax({
					url: BASE_URL + "administrator/doctor_special_fee/search_partner_card/",
					method: 'GET',
					dataType: 'JSON',
					data: {'CARD_CODE':CARD_CODE, 'dr_code':dr_code},
					success: function(data){
						
						$('#CLASS_CODE').empty();
						$('#TYPE').empty();
						
						if (data['has_partner_card']){
							
							if (data['doctor_type'].TYPE1 != ""){
								$('#TYPE').append("<option value='" + data['doctor_type'].TYPE1 + "'>" + data['doctor_type'].TYPE1 + "</option>");
							}
							
							if (data['doctor_type'].TYPE2 != ""){
								$('#TYPE').append("<option value='" + data['doctor_type'].TYPE2 + "'>" + data['doctor_type'].TYPE2 + "</option>");
							}
							
							if (data['doctor_type'].TYPE3 != ""){
								$('#TYPE').append("<option value='" + data['doctor_type'].TYPE3 + "'>" + data['doctor_type'].TYPE3 + "</option>");
							}
							
							$("#PARTNER_DR_CODE").val(data['doctor_type'].PARTNER_DR_CODE);
							
							
							$.each(data['partner_card'], function(index, val) {
								$('#CLASS_CODE').append("<option value='" + val.CLASS_CODE + "'>(Card Type: " + val.CLASS_CODE + ") " + val.CLASS_DESC + "</option>");
								
							});
							
							if (data['has_s_med_days']){
								$.each(data['s_med_days'], function(index, val) {
									$('#MED_DAYS').append("<option value='" + val.MED_DAYS + "'>" + val.MED_DAYS + "</option>");
									
								});
								
								$('#MED_DAYS').attr("data-placeholder", "Select an option").trigger("chosen:updated");
								
							}else{
								$('#MED_DAYS').attr("data-placeholder", "No agreed fee in this doctor type");
								$('#MED_DAYS').prop('disabled', true).trigger("chosen:updated");
							}
							
							$('.cust-partner-change').prop('disabled', false).trigger("chosen:updated");
							$('#CLASS_CODE').prop('disabled', false).trigger("chosen:updated");
						
						}else{
							$('.cust-partner-change').prop('disabled', true).trigger("chosen:updated");
							$('#CLASS_CODE')[0].selectedIndex = -1;
							$('#CLASS_CODE').attr("data-placeholder", "This partner has no activating card");
							$('#CLASS_CODE').prop('disabled', true).trigger("chosen:updated");
							
							$('#CARD_CODE').prop('disabled', false).trigger("chosen:updated");
							$('#DR_CODE').prop('disabled', false).trigger("chosen:updated");
						}
					
					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}else{
				$("#TYPE").prop("disabled", false).trigger('chosen:updated');
				$("#CARD_CODE").prop("disabled", false).trigger('chosen:updated');
			}
		});
		
		
		$('#CLASS_CODE').change(function() {
			var CARD_CODE = $('#CARD_CODE').val();
			var CLASS_CODE = $('#CLASS_CODE').val();
			var type = $('#TYPE').val();
			

			$("#MED_DAYS").empty();
			$('#MED_DAYS')[0].selectedIndex = -1;
			$('#MED_DAYS').attr("data-placeholder", "　").trigger("chosen:updated");
			$('.cust-partner-change').prop('disabled', true).trigger("chosen:updated");
			
			if (CLASS_CODE != ""){
				
				//If doctor card no & type is not null, find the med days
				if (type != ""){
					$.ajax({
						url: BASE_URL + "administrator/doctor_special_fee/search_specific_meddays/",
						method: 'GET',
						dataType: 'JSON',
						data: {'CARD_CODE':CARD_CODE, 'CLASS_CODE':CLASS_CODE, 'type':type},
						success: function(data){
							
							$('.cust-partner-change').prop('disabled', false).trigger("chosen:updated");
							
							if (data['has_s_med_days']){
								$.each(data['s_med_days'], function(index, val) {
									$('#MED_DAYS').append("<option value='" + val.MED_DAYS + "'>" + val.MED_DAYS + "</option>");
									
								});
								
								$('#MED_DAYS').attr("data-placeholder", "Select an option").trigger("chosen:updated");
								
							}else{
								$('#MED_DAYS').attr("data-placeholder", "No agreed fee in this doctor type");
								$('#MED_DAYS').prop('disabled', true).trigger("chosen:updated");
							}

						},
						error: function(jqXHR) {
							
							alert("發生錯誤: " + jqXHR.status);
						}
					})
				}else{
					$('.cust-partner-change').prop('disabled', false).trigger("chosen:updated");
					alert("Select a doctor Type please");
				}
			}else{
				$("#TYPE").prop("disabled", false).trigger('chosen:updated');
				$("#CLASS_CODE").prop("disabled", false).trigger('chosen:updated');
			}
		});
		
		$('#TYPE').change(function() {
			
			var CARD_CODE = $('#CARD_CODE').val();
			var CLASS_CODE = $('#CLASS_CODE').val();
			var type = $('#TYPE').val();
			
			$("#MED_DAYS").empty();
			$('#MED_DAYS')[0].selectedIndex = -1;
			$('#MED_DAYS').attr("data-placeholder", "　").trigger("chosen:updated");
			$('.cust-partner-change').prop('disabled', true).trigger("chosen:updated");
			
			if (type != ""){
				
				//If doctor card no & type is not null, find the med days
				if (CLASS_CODE != ""){
					$.ajax({
						url: BASE_URL + "administrator/doctor_special_fee/search_specific_meddays/",
						method: 'GET',
						dataType: 'JSON',
						data: {'CARD_CODE':CARD_CODE, 'CLASS_CODE':CLASS_CODE, 'type':type},
						success: function(data){
							
							$('.cust-partner-change').prop('disabled', false).trigger("chosen:updated");
							
							if (data['has_s_med_days']){
								$.each(data['s_med_days'], function(index, val) {
									$('#MED_DAYS').append("<option value='" + val.MED_DAYS + "'>" + val.MED_DAYS + "</option>");
									
								});
								
								$('#MED_DAYS').attr("data-placeholder", "Select an option").trigger("chosen:updated");
								
							}else{
								$('#MED_DAYS').attr("data-placeholder", "No agreed fee in this doctor type");
								$('#MED_DAYS').prop('disabled', true).trigger("chosen:updated");
							}

						},
						error: function(jqXHR) {
							
							alert("發生錯誤: " + jqXHR.status);
						}
					})
				}
			}else{
				$("#TYPE").prop("disabled", false).trigger('chosen:updated');
				$("#CLASS_CODE").prop("disabled", false).trigger('chosen:updated');
			}
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
              window.location.href = BASE_URL + 'administrator/doctor_special_fee';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor_special_fee = $('#form_doctor_special_fee');
        var data_post = form_doctor_special_fee.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/doctor_special_fee/add_save',
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
			$(".cust-partner-change").attr('data-placeholder', 'Select an option');
			$("#PARTNER_CARD_NO").attr('data-placeholder', 'Select Dr Code first');
			$(".cust-partner-change")[0].selectedIndex = -1;
			$(".cust-partner-change").trigger('chosen:updated');
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