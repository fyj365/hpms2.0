
<!-- Content Header (Page header) -->
<section class="content-heade col-sm-12">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/partner_doctor'); ?>">Partner Doctor Contract</a></li>
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
                            'name'    => 'form_partner_doctor', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_partner_doctor', 
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
						   <label for="card_code" class="col-sm-2 control-label">Partner Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <select name="card_code" class="form-control chosen chosen-select-deselect changeContractNo1" id="card_code">
								 <option value=""></option>
									<?php foreach (db_get_all_data('card') as $card_code) { ?>
								 <option value="<?php echo $card_code->card_code; ?>"><?php echo $card_code->card_code;?></option>
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
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>       
						   
						   <div class="form-group  wrapper-options-crud">
							<label for="TYPE" class="col-sm-2 control-label">Type
							<i class="required">*</i>
							</label>
							<div class="col-sm-8">
							   <?php $this->db->where('DR_CODE', $DR_CODE); $type = $this->db->get('doctor')->row(); ?>
							   <div class="col-md-3  padding-left-0">
								  <label>
								  <input type="checkbox" class="flat-red" name="TYPE[]" checked value="<?= $type->TYPE1 ?>"> <?= $type->TYPE1; ?>
								  <small class="info help-block">
								</small>
								  </label>
							   </div>   
								
								<?php if ($type->TYPE2 != ""){ ?>
								<div class="col-md-3  padding-left-0">
								  <label>
								  <input type="checkbox" class="flat-red" name="TYPE[]" value="<?= $type->TYPE2 ?>"> <?= $type->TYPE2; ?>
								  <small class="info help-block">
								</small>
								  </label>
							   </div>   
							   <?php } ?>
								
								<?php if ($type->TYPE3 != ""){ ?>
								<div class="col-md-3  padding-left-0">
								  <label>
								  <input type="checkbox" class="flat-red" name="TYPE[]" value="<?= $type->TYPE3 ?>"> <?= $type->TYPE3; ?>
								  <small class="info help-block">
								</small>
								  </label>
							   </div>   
								<?php } ?>
								
							</div>
						 </div>
					 
                        <div class="message"></div>
                        <div class="col-md-12">
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
              window.location.href = BASE_URL + 'administrator/partner_doctor';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_partner_doctor = $('#form_partner_doctor');
        var data_post = form_partner_doctor.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/partner_doctor/add_save',
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