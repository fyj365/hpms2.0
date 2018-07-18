
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Partner Doctor Contract        <small>Edit Partner Doctor Contract</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/partner_doctor_contract'); ?>">Partner Doctor Contract</a></li>
        <li class="active">Edit</li>
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
                            <h3 class="widget-user-username">Partner Doctor Contract</h3>
                            <h5 class="widget-user-desc">Edit Partner Doctor Contract</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/partner_doctor_contract/edit_save/'.$partner_doctor_contract->CARD_CODE .'/'.$partner_doctor_contract->DR_CODE.'/'.$partner_doctor_contract->PARTNER_CONTRACT_NO.'/'.$partner_doctor_contract->POLICY_NO), [
                            'name'    => 'form_partner_doctor_contract', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_partner_doctor_contract', 
                            'method'  => 'POST'
                            ]); ?>
                         
                        <div class="form-group">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE"  value="<?= set_value('DR_CODE', $partner_doctor_contract->DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
                         
						<div class="form-group">
						   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE"  value="<?= set_value('CARD_CODE', $partner_doctor_contract->CARD_CODE); ?>" readonly>
								<small class="info help-block">
								 </small>
						   </div>
						</div>

						<div class="form-group">
							<label for="PARTNER_CONTRACT_NO" class="col-sm-2 control-label">Partner Contract Name
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control " name="PARTNER_CONTRACT_NO" id="PARTNER_CONTRACT_NO"  
							  value="<?= $partner_doctor_contract->PARTNER_CONTRACT_NAME." &nbsp; (Contract No: ".$partner_doctor_contract->PARTNER_CONTRACT_NO.")"; ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						
						<div class="form-group">
							<label for="POLICY_NO" class="col-sm-2 control-label">Policy No
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="POLICY_NO" id="POLICY_NO"  value="<?= set_value('POLICY_NO', $partner_doctor_contract->POLICY_NO); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>

						<div class="form-group ">
							<label for="START_DATE" class="col-sm-2 control-label">Start Date
							</label>
							
							<div class="col-sm-8">
								<input type="text" class="form-control" name="START_DATE" id="START_DATE" value="<?= $partner_contract->START_DATE; ?>" readonly>
								<small class="info help-block">
								</small>
							</div>
						</div>
						
						<div class="form-group ">
							<label for="TERM_DATE" class="col-sm-2 control-label">Term Date								
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="TERM_DATE" id="TERM_DATE" value="<?= $partner_contract->TERM_DATE; ?>" readonly>
								<small class="info help-block">
								</small>
							</div>
						</div>
						
						<div class="form-group ">
							<label for="STATUS" class="col-sm-2 control-label">Status								
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="STATUS" id="STATUS" value="<?= $partner_doctor_contract->STATUS; ?>" readonly>
								<small class="info help-block">
								</small>
							</div>
							
							<div class="col-sm-2" id="contract_btn">
								<a id="contract_a" class="btn btn-danger" style="width: 120px;">Term Contract</a>
                            </div>
							
							<div class="col-sm-4" id="contract_status_div">
								<p id="contract_status" style="color:blue;"></p>
                            </div>
							
						</div>
						
						<input type="hidden" name="term_contract" id="term_contract" value="">
						
						<div class="form-group ">
							  <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code 
							  <i class="required">*</i>
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control cust-required" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE', $partner_doctor_contract->PARTNER_DR_CODE); ?>">
								 <small class="info help-block"></small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="LOC_CODE" class="col-sm-2 control-label">Loc Code 
							  <i class="required">*</i>
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control cust-required" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE', $partner_doctor_contract->LOC_CODE); ?>">
								 <small class="info help-block">　</small>
							  </div>
						   </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
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

    $(document).ready(function(){
		
		if ($("#STATUS").val() == "Term"){
			$('#contract_a').hide();
			$('#contract_status').text("Cannot modify terminated contract");
			$("#PARTNER_DR_CODE").prop("readonly", true);
			$("#LOC_CODE").prop("readonly", true);
		}
		
		
		$('#contract_a').click(function(){
			
			
			switch($('#contract_a').text()) {
				
				//btn.text = Term
				case "Term Contract":
					btn_active();
					$('#contract_status').text("Status changed as 'Term'");
					$('#term_contract').val("Term");
					$('#STATUS').val("Term");
					$("#contract_a").text("Active Contract");
					break;

				default:
					btn_term();
					$('#contract_status').text("");
					$('#term_contract').val("");
					$('#STATUS').val("<?= $partner_doctor_contract->STATUS; ?>");
					$("#contract_a").text("Term Contract");
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
          url: form_partner_doctor_contract.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#partner_doctor_contract_image_galery').find('li').attr('qq-file-id');
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