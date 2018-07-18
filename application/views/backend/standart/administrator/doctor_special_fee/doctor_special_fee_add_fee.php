
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
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
							</div>
						</div>
						
						<div class="form-group ">
							 <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
							 <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
								<?php if ($has_doctor_partner){ ?>
								<select class="form-control chosen chosen-select-deselect cust-partner-change" name="CARD_CODE" id="CARD_CODE">
									 <?php foreach ($doctor_partner as $index=>$row): ?>
									 <option value="<?= $row->CARD_CODE; ?>"><?= $row->CARD_CODE; ?></option>
									 <?php endforeach; ?>  
								</select>
								<?php }else{ ?>
								 <input type="text" class="form-control" value="This doctor has no business partner." readonly>
							<?php } ?>
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						
						<div class="form-group ">
							 <label for="CLASS_CODE" class="col-sm-2 control-label">Activating Card 
							 <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
						   
							<?php if ($has_partner_card) { ?>
								<select class="form-control chosen chosen-select-deselect cust-partner-change" name="CLASS_CODE" id="CLASS_CODE">
									 <?php foreach ($partner_card as $index=>$row): ?>
									 <option value="<?= $row->CLASS_CODE; ?>"><?= "(Card Type: ".$row->CLASS_CODE.") \t ".$row->CLASS_DESC; ?></option>
									 <?php endforeach; ?>  
								</select>
							<?php }else{ ?>
								 <input type="text" class="form-control" value="This partner has no activating card." readonly>
							<?php } ?>
							
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						<div class="form-group ">
							<label for="CARD_CODE" class="col-sm-2 control-label">Partner Dr Code
						   </label>
						   <div class="col-sm-8">
								<?php if ($has_doctor_partner){ $partner_dr_code = $doctor_partner[0]->PARTNER_DR_CODE; }else{ $partner_dr_code = ""; } ?>
							  <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE" value="<?= set_value('PARTNER_DR_CODE', $partner_dr_code); ?>" readonly>
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
						   <?php if ($has_doctor_partner){ ?>
								<select class="form-control chosen chosen-select-deselect cust-dr-reset cust-dr-change cust-partner-change" data-placeholder="Select Dr Code first" name="TYPE" id="TYPE">
									<?= $doctor_type->TYPE1 == "" ? "" : "<option value='".$doctor_type->TYPE1."' selected>$doctor_type->TYPE1</option>"; ?>
									<?= $doctor_type->TYPE2 == "" ? "" : "<option value='".$doctor_type->TYPE2."'>$doctor_type->TYPE2</option>"; ?>
									<?= $doctor_type->TYPE3 == "" ? "" : "<option value='".$doctor_type->TYPE3."'>$doctor_type->TYPE3</option>"; ?>
									
								</select>
						   <?php }else{ ?>
								 <input type="text" class="form-control" value="" readonly>
							<?php } ?>
								<small class="info help-block">
								</small>
						   </div>
						   
						   <label for="MED_DAYS" class="col-sm-2 control-label">Med Days 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-3 cust-required-select">
						   
							  <?php if ($has_doctor_partner && $has_med_days) { ?>
								<select class="form-control chosen chosen-select-deselect cust-partner-change" name="MED_DAYS" id="MED_DAYS">
									 <?php foreach ($med_days as $index=>$row): ?>
									 <option value="<?= $row->MED_DAYS; ?>" <?= $index == 0 ? "selected" : ""; ?>><?= $row->MED_DAYS; ?></option>
									 <?php endforeach; ?>  
								</select>
							<?php }else{ ?>
								 <input type="text" class="form-control" value="<?= $has_doctor_partner ? 'No agreed fee in this doctor type.' : ''; ?>" readonly>
							<?php } ?>
							
							  <small class="info help-block">
							  </small>
						   </div>
						</div>

						<div class="form-group ">
						   <label for="SPECIAL_FEE" class="col-sm-2 control-label">Special Fee
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-required" name="SPECIAL_FEE" id="SPECIAL_FEE" value="<?= set_value('SPECIAL_FEE'); ?>">
							  <small class="info help-block">Please input the balance in Special Fee</small>
						   </div>
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
		
		
		<?php foreach ($doctor_partner as $index=>$row){ ?>
			partner_dr_code_s[<?= $index; ?>] = '<?= $row->PARTNER_DR_CODE; ?>';
		<?php } ?>

		
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
			$("#DR_CODE").val('<?= $DR_CODE; ?>');
			$("#PARTNER_DR_CODE").val(partner_dr_code_s[0]);
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