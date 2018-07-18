
<!-- Content Header (Page header) -->
<section class="content-heade col-sm-12">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/partner_doctor_contract'); ?>">Partner Doctor Contract</a></li>
        <li class="active">New</li>
    </ol>
</section>
<style type="text/css">
    .hint1{
        display: none;
        text-align: center;;
        color: green;
    }
    .hint2 {
        display: none;
        text-align: center;
        color: red;
    }
    .form-group{
        margin-bottom: 10px;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
					<div class="box box-widget widget-user-2">
						<div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Partner Doctor Contract</h3>
                            <h5 class="widget-user-desc">New Partner Doctor Contract</h5>
							<hr>
                        </div>
						
                        <?= form_open('', [
                            'name'    => 'form_partner_doctor_contract', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_partner_doctor_contract', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
							
							
						<div class="form-group">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="DR_CODE" id="doctor_code"  value="<?= set_value('doctor_code', $DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
                         
						<div class="form-group">
						   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <select name="CARD_CODE" class="form-control chosen chosen-select-deselect changeContractNo1" id="CARD_CODE">
								 <option value=""></option>
									<?php foreach (db_get_all_data('card') as $CARD_CODE) { ?>
								 <option value="<?php echo $CARD_CODE->CARD_CODE; ?>"><?php echo $CARD_CODE->CARD_CODE;?></option>
									<?php } ?>
							  </select>
						   </div>
						</div>
						
						
						<div class="form-group ">
							  <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code 
							  <i class="required">*</i>
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control cust-required" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE', $DR_CODE); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="LOC_CODE" class="col-sm-2 control-label">Loc Code 
							  <i class="required">*</i>
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control cust-required" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						
						<div class="form-group">
							<label for="PARTNER_CONTRACT_NO" class="col-sm-2 control-label">Partner Contract No. 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <select name="PARTNER_CONTRACT_NO" class="form-control chosen chosen-select-deselect" data-placeholder="Select Partner Code first" id="PARTNER_CONTRACT_NO" disabled>
								 <option value=""></option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<input type="hidden" name="PARTNER_CONTRACT_NAME" id="PARTNER_CONTRACT_NAME" value="<?= set_value('PARTNER_CONTRACT_NAME'); ?>" />
						
						<div class="form-group">
							<label for="POLICY_NO" class="col-sm-2 control-label">Policy No
						   </label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="POLICY_NO" id="POLICY_NO"  value="<?= set_value('POLICY_NO'); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-sm-4">
							<p id="contract_notice" style="color:red;"></p>
							<input type="hidden" name="exist_contract" id="exist_contract" value="<?= set_value('exist_contract'); ?>" />
						   </div>
						</div>

							<div class="form-group ">
								<label for="START_DATE" class="col-sm-2 control-label">Start Date
								</label>
								
								<div class="col-sm-3">
									<input type="text" class="form-control pull-right datepicker reset-field" name="START_DATE" id="START_DATE" readonly>
									<small class="info help-block">　</small>
								</div>
								
								<label for="TERM_DATE" class="col-sm-2 control-label">Term Date								
								</label>
								<div class="col-sm-3">
									<input type="text" class="form-control pull-right datepicker reset-field" name="TERM_DATE" id="TERM_DATE" readonly>
									<small class="info help-block">　</small>
								</div>
								
								<!--	Start date hint
								
								<div class="col-sm-1 start-date-hint reset-start-date">
									<i class="fa fa-remove pull-left" style="font-size: 30px; color:red;"></i>
								</div>
								
								
								<div class="col-sm-4 start-date-hint">
									<p>You can click the red "X" for clearing input data and reset the Start Date selection</p>
								</div>
								
								-->
							</div>

						   
	
                             
                                    
                                                
                        <div class="message"></div>
                        <div class="col-md-12">
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
		
		
		$("#START_DATE").removeClass("focus.inputmask");
		//$('.start-date-hint').hide();

		
		/*$("#START_DATE").on('change',function(){
			if ($("#START_DATE").val() != ""){
				$('.start-date-hint').show();
			}else{
				$('.start-date-hint').hide();
				$("#TERM_DATE").val("");
			}
		});
		
		$(".reset-start-date").on('click',function(){
			$(".reset-field").val("");
			$('.start-date-hint').hide();
		});*/
		
		var policy_no = [];
		var start_date = [];
		var term_date = [];
		var partner_contract_name = [];
		
     $('.changeContractNo1').on('change',function(){
           var CARD_CODE = $('#CARD_CODE').val();
		   var doctor_code = $('#doctor_code').val();
		   
		   $("#POLICY_NO").val("");
		   $("#START_DATE").val("");
		   $("#TERM_DATE").val("");
		   $("#contract_notice").html("");
		   $("#exist_contract").val("N");
		   $("#PARTNER_CONTRACT_NO").prop("disabled", true).trigger('chosen:updated');
		   $("#CARD_CODE").prop("disabled", true).trigger('chosen:updated');
		   
           if (CARD_CODE != '') {

				$.ajax({
					url: BASE_URL + "administrator/partner_doctor_contract/add_doctor_No/",
					method: 'GET',
					dataType: 'JSON',
					data: {'CARD_CODE':CARD_CODE, 'doctor_code':doctor_code},
					success: function(res){
						
						if (res['has_contract']){
							
							$('#PARTNER_CONTRACT_NO').empty();
							$('#PARTNER_CONTRACT_NO').append("<option value=''></option>");
							
							policy_no = [];
							
							$.each(res['partner_contract'], function(index, val) {
								$('#PARTNER_CONTRACT_NO').append("<option value='" + val.PARTNER_CONTRACT_NO + "'>" + val.CONTRACT_NAME + "&nbsp; - Contract No: " + val.PARTNER_CONTRACT_NO + " (" + val.STATUS + ")</option>");
								policy_no[index] = val.POLICY_NO;
								start_date[index] = val.START_DATE;
								term_date[index] = val.TERM_DATE;
								partner_contract_name[index] = val.CONTRACT_NAME;
							});
							
							$("#PARTNER_CONTRACT_NO")[0].selectedIndex = -1;
							$('#PARTNER_CONTRACT_NO').attr("data-placeholder", "Select the Contract No of " + CARD_CODE);
							$("#PARTNER_CONTRACT_NO").prop("disabled", false).trigger('chosen:updated');
						}else{
							$("#PARTNER_CONTRACT_NO")[0].selectedIndex = -1;
							$('#PARTNER_CONTRACT_NO').attr("data-placeholder", "This business partner has no contract ").trigger("chosen:updated");
						}
						
						$("#CARD_CODE").prop("disabled", false).trigger('chosen:updated');

					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}

				
			   })
			}else{
				$("#CARD_CODE").prop("disabled", false).trigger('chosen:updated');
			}

      });   
	  
	  $('.changeContractNo2').on('change',function(){
		  var dr_code = $("#doctor_code").val();
		  
		  $("#PARTNER_DR_CODE").val(dr_code);
	  });
	  
	  $('#PARTNER_CONTRACT_NO').on('change',function(){
			var CARD_CODE = $('#CARD_CODE').val();
			var dr_code = $('#doctor_code').val();
			var contract_no = $("#PARTNER_CONTRACT_NO").val();
			var select_index = $('#PARTNER_CONTRACT_NO')[0].selectedIndex;
			var s_policy_no = String(policy_no[select_index-1]);
		 
		 $("#POLICY_NO").val(s_policy_no);
		 $("#START_DATE").val(start_date[select_index-1]);
		 $("#TERM_DATE").val(term_date[select_index-1]);
		 $("#PARTNER_CONTRACT_NAME").val(partner_contract_name[select_index-1]);
		 
		 $("#CARD_CODE").prop("disabled", true).trigger('chosen:updated');
		 $("#PARTNER_CONTRACT_NO").prop("disabled", true).trigger('chosen:updated');
		 
		 $("#exist_contract").val("N");
		 $("#contract_notice").html("");
		 
		 if (contract_no != ""){
			 $.ajax({
				url: BASE_URL + "administrator/partner_doctor_contract/check_contract/",
				method: 'GET',
				dataType: 'JSON',
				data: {'CARD_CODE':CARD_CODE, 'dr_code': dr_code, 'policy_no':s_policy_no, 'contract_no':contract_no},
				success: function(data){
					
					if (data['exist_contract']){
						$("#exist_contract").val("Y");
						$("#contract_notice").html("(The doctor has active this contract already)");
					}else{
						$("#contract_notice").html("<span style='color:green'>(Valid contract insertion)</span>");
					}
					
					$("#CARD_CODE").prop("disabled", false).trigger('chosen:updated');
					$("#PARTNER_CONTRACT_NO").prop("disabled", false).trigger('chosen:updated');

				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
		 }else{
			 $("#CARD_CODE").prop("disabled", false).trigger('chosen:updated');
			 $("#PARTNER_CONTRACT_NO").prop("disabled", false).trigger('chosen:updated');
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
              window.location.href = BASE_URL + 'administrator/partner_doctor_contract';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_partner_doctor_contract = $('#form_partner_doctor_contract');
        var data_post = form_partner_doctor_contract.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/partner_doctor_contract/add_save',
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
			
			$("#PARTNER_DR_CONTRACT_NO").val("");
			$(".hint").hide();
			$(".start-date-hint").hide();
			
			
            resetForm();
			$("#doctor_code").val('<?= $DR_CODE; ?>');
			$("#PARTNER_DR_CODE").val('<?= $DR_CODE; ?>');
			$("#PARTNER_CONTRACT_NO").attr("data-placeholder", "Select Dr Code first");
			$("#PARTNER_CONTRACT_NO").prop('selected', false).trigger('chosen:updated');
			$("#PARTNER_CONTRACT_NO").prop('disabled', true).trigger('chosen:updated');
			
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