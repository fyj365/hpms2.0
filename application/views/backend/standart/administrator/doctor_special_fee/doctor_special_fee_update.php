
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor Special Fee        <small>Edit Doctor Special Fee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_special_fee'); ?>">Doctor Special Fee</a></li>
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
                            <h3 class="widget-user-username">Doctor Special Fee</h3>
                            <h5 class="widget-user-desc">Edit Doctor Special Fee</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/doctor_special_fee/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_doctor_special_fee', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_special_fee', 
                            'method'  => 'POST'
                            ]); ?>
                         
                        <div class="form-group ">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor_special_fee->DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
							</div>
						</div>
						
						<div class="form-group ">
							 <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
								<input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= set_value('CARD_CODE', $doctor_special_fee->CARD_CODE); ?>" readonly>
							  
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						<div class="form-group ">
							 <label for="CLASS_CODE" class="col-sm-2 control-label">Activating Contract 
						   </label>
						   <div class="col-sm-8 cust-required-select">
								<input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE" value="<?= set_value('CLASS_CODE', "(Card Type: ".$partner_contract->CLASS_CODE.") \t ".$partner_contract->CONTRACT_NAME); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						<div class="form-group ">
							<label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE" value="<?= set_value('PARTNER_DR_CODE', $partner_doctor->PARTNER_DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
					
						<hr>
						
						<div class="form-group ">
						   <label for="TYPE" class="col-sm-2 control-label">Type 
						   </label>
						   <div class="col-sm-3 cust-required-select">
								<input type="text" class="form-control" name="TYPE" id="TYPE" value="<?= set_value('TYPE', $doctor_special_fee->TYPE); ?>" readonly>
								<small class="info help-block">
								</small>
						   </div>
						   
						   <label for="MED_DAYS" class="col-sm-2 control-label">Med Days 
						   </label>
						   <div class="col-sm-3 cust-required-select">
							  <input type="text" class="form-control" name="MED_DAYS" id="MED_DAYS" value="<?= set_value('MED_DAYS', $doctor_special_fee->MED_DAYS); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>

						<div class="form-group ">
						   <label for="SPECIAL_FEE" class="col-sm-2 control-label">Special Fee
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-required" name="SPECIAL_FEE" id="SPECIAL_FEE" value="<?= set_value('SPECIAL_FEE', $doctor_special_fee->SPECIAL_FEE); ?>">
							  <small class="info help-block">Please input the balance in Special Fee</small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="REMARK" class="col-sm-2 control-label">Remark 
						   </label>
						   <div class="col-sm-8">
							  <textarea id="REMARK" name="REMARK" rows="5" class="textarea"><?= set_value('REMARK', $doctor_special_fee->REMARK); ?></textarea>
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
          url: form_doctor_special_fee.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#doctor_special_fee_image_galery').find('li').attr('qq-file-id');
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