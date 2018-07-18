
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Patient effective date        <small>Edit Patient effective date</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/patient_effective_date'); ?>">Patient effective date</a></li>
        <li class="active">Edit</li>
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
                            <h5 class="widget-user-desc">Edit Patient effective date</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/patient_effective_date/edit_save/'.$patient_effective_date->PATIENT_AUTONO.'/'.$patient_effective_date->PATIENT_EFFECTIVE_NO), [
                            'name'    => 'form_patient_effective_date', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_patient_effective_date', 
                            'method'  => 'POST'
                            ]); ?>
                                                 
                        <div class="form-group ">
							<label for="PATIENT_AUTONO" class="col-sm-2 control-label">Patient Auto No 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="PATIENT_AUTONO" id="PATIENT_AUTONO" value="<?= set_value('PATIENT_AUTONO', $patient_effective_date->PATIENT_AUTONO); ?>" readonly>
                            </div>
							
                            
                        </div>
						
						<div class="form-group ">
							<label for="PATIENT_EFFECTIVE_NO" class="col-sm-2 control-label">Patient effective date No 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="PATIENT_EFFECTIVE_NO" id="PATIENT_EFFECTIVE_NO" value="<?= set_value('PATIENT_EFFECTIVE_NO', $patient_effective_date->PATIENT_EFFECTIVE_NO); ?>" readonly>
                            </div>
						</div>
						
                       <div class="form-group ">
							<label for="ORI_STATUS" class="col-sm-2 control-label">Original Status
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="ORI_STATUS" id="ORI_STATUS" value="<?= set_value('ORI_STATUS', $patient_effective_date->STATUS); ?>" style="color: <?php if ($patient_effective_date->STATUS == "Ready"){ echo "orange"; }else if ($patient_effective_date->STATUS == "Active"){ echo "green"; }else{ echo "red"; } ?>" readonly>
                            </div>
							
							<label for="STATUS" class="col-sm-2 control-label">Changed Status
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="STATUS" id="STATUS" value="" readonly>
                            </div>
						</div>
												
												
                                                <div class="form-group ">
                            <label for="START_DATE" class="col-sm-2 control-label">Start Date 
                            </label>
                            <div class="col-sm-2">
								<input type="text" class="form-control pull-right datepicker open-field change-date" name="START_DATE" id="START_DATE" value="<?= set_value('START_DATE', $patient_effective_date->START_DATE); ?>" readonly>
                            </div>
							
							<label for="TERM_DATE" class="col-sm-2 control-label">Terminate Date 
                            </label>
							<div class="col-sm-2">
								<input type="text" class="form-control pull-right datepicker open-field change-date" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE', $patient_effective_date->TERM_DATE); ?>" readonly>
                            </div>
                        </div>
						
						<div class="form-group ">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2" id="contract_btn">
								<a id="contract_a" class="btn btn-danger" style="width: 180px;">Terminate Effective</a>
                            </div>
							
							<div class="col-sm-4" id="contract_status_div">
								<p id="contract_status" style="color:blue;"></p>
                            </div>
						</div>
						
						<input type="hidden" name="term_contract" id="term_contract" value="">
						
                                                 
                                                <div class="form-group ">
                            <label for="REMARK" class="col-sm-2 control-label">Remark 
                            </label>
                            <div class="col-sm-8">
								<input type="text" id="REMARK" name="REMARK" rows="5" class="form-control" value="<?= set_value('REMARK', $patient_effective_date->REMARK); ?>" readonly>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="UPDATE_REMARK" class="col-sm-2 control-label">Update Remark 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="UPDATE_REMARK" name="UPDATE_REMARK" rows="5" class="textarea open-field change-date" ></textarea>
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
function btn_active(){
	var contract_a = document.getElementById('contract_a');
	contract_a.classList.remove("btn-danger");
	contract_a.classList.add("btn-primary");
}

function btn_term(){
	var contract_a = document.getElementById('contract_a');
	contract_a.classList.remove("btn-primary");
	contract_a.classList.add("btn-danger");
}

	var ori_start = document.getElementById('START_DATE').value;
	var ori_term = document.getElementById('TERM_DATE').value;

    $(document).ready(function(){
		$('#contract_a').hide();
		
		
		//Check whether this contract is the latest contract
		//If yes, this contract can be changed to active
		
		
		switch($('#ORI_STATUS').val()) {
			
			case "Terminate":
				$('#contract_btn').removeClass('col-sm-2');
				$('#contract_status_div').attr('class', 'col-sm-6');
				$('#contract_status').text("The contract is expired, please create a new Patient effective date");
				break;
				
			case "Ready":
				if ($("#TERM_DATE").val() == "" || $("#TERM_DATE").val() == null || $("#TERM_DATE").val() == "0000-00-00"){
					$("#extend_div").hide();
				}
				
				$('.open-field').attr("readonly", false);
				$('#contract_a').show();
				$("#UPDATE_REMARK").attr("readonly", false);
				
				break;
				
			default:
				$('#contract_a').show();
				$('#EXTEND').attr("readonly", false);
				$("#UPDATE_REMARK").attr("readonly", false);
		
		}
	  
		
		
		//Change Status BTN Click
		$('#contract_a').click(function(){
			
			
			switch($('#contract_a').text()) {
				
				//btn.text = Terminate
				case "Terminate Effective":
				
					btn_active();
				
					//Check original Status
					switch($('#ORI_STATUS').val()){
						
						case "Terminate":
							$('#contract_status').text("");
							$('#STATUS').val("");
							break;
							
						case "Ready":
							$(".change-date").val("");
							$(".change-date").attr("readonly", true);
							
						default:
							$("#EXTEND").val("");
							$("#EXTEND").attr("readonly", true);
							$("#UPDATE_REMARK").val("");
							$("#UPDATE_REMARK").attr("readonly", true);
							$('#contract_status').text("Status changed as 'Terminate'");
							$('#term_contract').val("Terminate");
							$('#STATUS').css("color", "red");
							$('#STATUS').val("Terminate");
							
					}
					
					$("#contract_a").text("Active Effective");
					break;
				
				
				//btn.text = Active
				default:
					
					btn_term();
				
					//Check original Status
					switch($('#ORI_STATUS').val()){
						
						case "Terminate":
							$('#contract_status').text("Status changed as 'Active'");
							$('#STATUS').css("color", "green");
							$('#STATUS').val("Active");
							break;
							
						case "Ready":
							$(".change-date").attr("readonly", false);
							$("#START_DATE").val(ori_start);
							$("#TERM_DATE").val(ori_term);
							
						default:
							$('#STATUS').val("");
							$('#contract_status').text("");
							$('#contract_a').text("Terminate Effective");
							$("#EXTEND").attr("readonly", false);
							$("#UPDATE_REMARK").attr("readonly", false);
							
					}
					
					$("#contract_a").text("Terminate Effective");
			}

		});
		
		
		//Limit start date
		
		$("#START_DATE").datetimepicker({
			format:'Y/m/d',
			onShow:function( ct ){
				this.setOptions({
					maxDate:jQuery('#TERM_DATE').val()?jQuery('#TERM_DATE').val():false
				})
			},
			timepicker:false
											
		});
		
		
		//Limit term date
		$("#TERM_DATE").datetimepicker({
			format:'Y/m/d',
			onShow:function( ct ){
				this.setOptions({
					minDate:jQuery('#START_DATE').val()?jQuery('#START_DATE').val():false
				})
			},
			timepicker:false
		});
		
		
		
		if ($('#ORI_STATUS').val() != "Ready"){
			$("#EXTEND").datetimepicker({
			format:'Y/m/d',
			defaultDate: jQuery('#TERM_DATE').val(),
			onShow:function( ct ){
				this.setOptions({
					minDate:jQuery('#TERM_DATE').val()?jQuery('#TERM_DATE').val():false
				})
		   },
		   timepicker:false
		});
		}
		
				
				
	  
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
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_patient_effective_date.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#patient_effective_date_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
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