
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patient        <small>New Patient</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/patient'); ?>">Patient</a></li>
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
                            <h3 class="widget-user-username">Patient</h3>
                            <h5 class="widget-user-desc">New Patient</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_patient', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_patient', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                                                 
						<div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Patient Card Details
						   </label>
						</div>
						<div class="form-group ">
						   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-3 cust-required-select">
							  <select  class="form-control chosen chosen-select-deselect" name="CARD_CODE" id="CARD_CODE" data-placeholder="" >
								 <option value=""></option>
								 <?php
									$this->db->select('CARD_CODE');
									$this->db->where('STATUS', 'Active');
									$this->db->group_by('CARD_CODE');
									$CARD_CODEs = $this->db->get('partner_contract')->result();
									?>
								 <?php foreach ($CARD_CODEs as $row): ?>
								 <option value="<?= $row->CARD_CODE; ?>"><?= $row->CARD_CODE; ?></option>
								 <?php endforeach; ?>  
							  </select>
							   <small class="info help-block">
							  </small>
						   </div>
						   <!---
							  <div class="col-sm-5">
								<input type="text" class="form-control" name="PARTNER_CONTRACT_NO" id="PARTNER_CONTRACT_NO" value="" readonly>
												   </div>
							  --->
						</div>
						<div class="form-group ">
						   <label for="PATIENT_NO" class="col-sm-2 control-label">Patient No 
						   </label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="PATIENT_NO" id="PATIENT_NO" value="<?= set_value('PATIENT_NO'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="POLICY_NO" class="col-sm-2 control-label">Policy No 
						   </label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="POLICY_NO" id="POLICY_NO" value="<?= set_value('POLICY_NO'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-sm-4">
							  <p id="POLICY_NO_result"> </p>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="DEPD_CODE" class="col-sm-2 control-label">Dependant Code 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="DEPD_CODE" id="DEPD_CODE" value="<?= set_value('DEPD_CODE'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Patient Effective Date
						   </label>
						   <small class="info help-block">
							  </small>
						</div>
						
						<div class="form-group ">
						   <label for="START_DATE" class="col-sm-2 control-label">Start Date 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-2">
							  <div class="input-group date col-sm-12">
								 <input type="text" class="form-control pull-right datepicker cust-required" name="START_DATE" id="START_DATE">
								 <small class="info help-block">
							  </small>
							  </div>
						   </div>
						   <label for="TERM_DATE" class="col-sm-2 control-label">Term Date 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-2">
							  <div class="input-group date col-sm-12">
								 <input type="text" class="form-control pull-right datepicker cust-required" name="TERM_DATE" id="TERM_DATE">
								 <small class="info help-block">
							  </small>
							  </div>
						   </div>
						</div>
						<hr>
						<div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Patient Details
						   </label>
						</div>
						<div class="form-group ">
						   <label for="PATIENT_NAME" class="col-sm-2 control-label">Patient Name 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-required" name="PATIENT_NAME" id="PATIENT_NAME" value="<?= set_value('PATIENT_NAME'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="GENDER" class="col-sm-2 control-label">Gender 
						   </label>
						   <div class="col-sm-8">
							  <div class="col-sm-8">
								 <div class="col-md-3 padding-left-0">
									<label>
									<input type="radio" class="flat-red" name="GENDER" value="M" checked> M                                    </label>
								 </div>
								 <div class="col-md-3 padding-left-0">
									<label>
									<input type="radio" class="flat-red" name="GENDER" value="F"> F                                    </label>
								 </div>
							  </div>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="DOB" class="col-sm-2 control-label">DOB 
						   </label>
						   <div class="col-sm-6">
							  <div class="input-group date col-sm-8">
								 <input type="text" class="form-control pull-right datepicker" name="DOB" id="DOB">
							  </div>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="HKID" class="col-sm-2 control-label">HKID 
						   </label>
						   <div class="col-sm-2">
							  <input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-sm-6">
							  <p>*Do not enter the brackets () of the check digit.</p>
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
						<hr>
						<div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Copay & Benefit
							<small class="info help-block">Please input the balance in the Copay field
							  </small>
						   </label>
						</div>
						<div class="form-group ">
							<label for="GP_COPAY" class="col-sm-2 control-label">GP Copay:
						   </label>
						   <div class="col-sm-3">
							  <input type="number" min="0" class="" name="GP_COPAY" value="<?= set_value('GP_COPAY', 0); ?>">
								<small class="info help-block">
							  </small>
						   </div>
						   
						   <label for="GP_EXTRA_MED" class="col-sm-2 control-label">GP Extra Med:
						   </label>
						   <div class="col-sm-3">
							  <input type="checkbox" class="flat-red copay" name="GP_EXTRA_MED[]" id="CO1" value="1">
							  
							  <input type="number" min="0" class="CO1" name="GP_EXTRA_MED_BENEFIT" value="<?= set_value('GP_EXTRA_MED_BENEFIT', 0); ?>" style="background-color:#d9d9d9;" readonly>
								<small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
							<label for="SP_COPAY" class="col-sm-2 control-label">SP Copay:
						   </label>
						   <div class="col-sm-3">
							  <input type="number" min="0" class="" name="SP_COPAY" value="<?= set_value('SP_COPAY', 0); ?>">
								<small class="info help-block">
							  </small>
						   </div>
						   
							<label for="SP_EXTRA_MED" class="col-sm-2 control-label">SP Extra Med:
						   </label>
						   <div class="col-sm-3">
							  <input type="checkbox" class="flat-red copay" name="SP_EXTRA_MED[]" id="CO2" value="1">
							  <input type="number" min="0" class="CO2" name="SP_EXTRA_MED_BENEFIT" value="<?= set_value('SP_EXTRA_MED_BENEFIT', 0); ?>" style="background-color:#d9d9d9;" readonly>
								<small class="info help-block">
							  </small>
						   </div>
						</div>
					
						
						<div class="form-group ">
							<label for="HERB_COPAY" class="col-sm-2 control-label">HERB Copay:
						   </label>
						   <div class="col-sm-3">
							  <input type="number" min="0" class="" name="HERB_COPAY" value="<?= set_value('HERB_COPAY', 0); ?>">
								<small class="info help-block">
							  </small>
						   </div>
						
							<label for="HERB_EXTRA_MED" class="col-sm-2 control-label">HERB Extra Med:
						   </label>
						   <div class="col-sm-3">
							  <input type="checkbox" class="flat-red copay" name="HERB_EXTRA_MED[]" id="CO3" value="1">
							  <input type="number" min="0" class="CO3" name="HERB_EXTRA_MED_BENEFIT" value="<?= set_value('HERB_EXTRA_MED_BENEFIT', 0); ?>" style="background-color:#d9d9d9;" readonly>
								<small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PHY_COPAY" class="col-sm-2 control-label">PHY Copay:
						   </label>
						   <div class="col-sm-3">
							  <input type="number" min="0"  class="" name="PHY_COPAY" id="PHY_COPAY" value="<?= set_value('PHY_COPAY', 0); ?>" >
								<small class="info help-block">
							  </small>
						   </div>
						   
						   <label for="CLINICAL_PROCEDURES" class="col-sm-2 control-label">Clinical Procedures 
						   </label>
						   <div class="col-sm-3">
							  <input type="checkbox" class="flat-red" name="CLINICAL_PROCEDURES[]" value="1">
							  <small class="info help-block">　</small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="WAIVER_REFERRAL" class="col-sm-2 control-label">Waiver Referral 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="WAIVER_REFERRAL" id="WAIVER_REFERRAL" value="<?= set_value('WAIVER_REFERRAL'); ?>">
							  <small class="info help-block">　</small>
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
		
		$('.copay').on('ifChanged', function (event) { 
			$(event.target).trigger('change');
			
			var coid = $(this).attr('id');
			if (event.target.checked){
				$('.'+coid).attr("readonly", false);
				$('.'+coid).css("background-color", "");
			}else{
				$('.'+coid).attr("readonly", true);
				$('.'+coid).css("background-color", "#d9d9d9");
				$('.'+coid).val("0");
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
              window.location.href = BASE_URL + 'administrator/patient';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_patient = $('#form_patient');
        var data_post = form_patient.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/patient/add_save',
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