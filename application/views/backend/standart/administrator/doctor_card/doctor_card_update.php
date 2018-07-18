
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Doctor Card        <small>Edit Doctor Card</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_card'); ?>"> Doctor Card</a></li>
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
                            <h3 class="widget-user-username"> Doctor Card</h3>
                            <h5 class="widget-user-desc">Edit  Doctor Card</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/doctor_card/edit_save/'.$doctor_card->AUTO_NO), [
                            'name'    => 'form_doctor_card', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_card', 
                            'method'  => 'POST'
                            ]); ?>
                      <div class="form-group">
                           <label for="CARD_CODE" class="col-sm-2 control-label">Card Code 
                           </label>
                           <div class="col-sm-8 cust-required-select">
                              <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE"  value="<?= set_value('CARD_CODE', $doctor_card->CARD_CODE); ?>" readonly>
                                <small class="info help-block">
                                 </small>
                           </div>
                        </div>
                        <div class="form-group">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE"  value="<?= set_value('DR_CODE', $doctor_card->DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
                     <div class="form-group">
                           <label for="DR_CODE" class="col-sm-2 control-label">Doctor Center
                           </label>
                           <div class="col-sm-8 cust-required-select">
                              <input type="text" class="form-control" name="CENTER_CODE" id="CENTER_CODE"  value="<?= set_value('CENTER_CODE', $doctor_card->E_NAME.','.$doctor_card->E_DISTRICT); ?>" readonly>
                              <small class="info help-block">
                              </small>
                           </div>
                        </div>

						

						   
						   <div class="form-group ">
							  <label for="LOC_CODE" class="col-sm-2 control-label">Loc Code 
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE', $doctor_card->LOC_CODE); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   
							<div class="form-group  wrapper-options-crud">
								<label for="TYPE" class="col-sm-2 control-label">Type
								<i class="required">*</i>
								</label>
								<div class="col-sm-8 cust-type">
									<div class="cust-dr-type">
										<?php 
											$this->db->where("DR_CODE", $doctor_card->DR_CODE);
											$doctor = $this->db->get('doctor')->row();
										?>
										
										
										<div class="col-md-3 padding-left-0">
											<label>
												<input 
													<?=  in_array($doctor->TYPE1, explode(',', $doctor_card->TYPE1)) ? 'checked' : ''; ?>
													<?=  in_array($doctor->TYPE1, explode(',', $doctor_card->TYPE2)) ? 'checked' : ''; ?>
													<?=  in_array($doctor->TYPE1, explode(',', $doctor_card->TYPE3)) ? 'checked' : ''; ?>
													type="checkbox" class="flat-red" name="TYPE[]" value="<?= $doctor->TYPE1; ?>"><?= $doctor->TYPE1; ?>
												<small class="info help-block">
												</small>
											</label>
										</div>
										
										<?php if ($doctor->TYPE2 != ""){ ?>
										<div class="col-md-3 padding-left-0">
											<label>
												<input 
													<?=  in_array($doctor->TYPE2, explode(',', $doctor_card->TYPE1)) ? 'checked' : ''; ?>
													<?=  in_array($doctor->TYPE2, explode(',', $doctor_card->TYPE2)) ? 'checked' : ''; ?>
													<?=  in_array($doctor->TYPE2, explode(',', $doctor_card->TYPE3)) ? 'checked' : ''; ?>
													type="checkbox" class="flat-red" name="TYPE[]" value="<?= $doctor->TYPE2; ?>"><?= $doctor->TYPE2; ?>
													<small class="info help-block">
												</small>
											</label>
										</div>
										<?php } ?>
												
										
										<?php if ($doctor->TYPE3 != ""){ ?>
										<div class="col-md-3 padding-left-0">
											<label>
												<input 
													<?=  in_array($doctor->TYPE3, explode(',', $doctor_card->TYPE1)) ? 'checked' : ''; ?>
													<?=  in_array($doctor->TYPE3, explode(',', $doctor_card->TYPE2)) ? 'checked' : ''; ?>
													<?=  in_array($doctor->TYPE3, explode(',', $doctor_card->TYPE3)) ? 'checked' : ''; ?>
													type="checkbox" class="flat-red" name="TYPE[]" value="<?= $doctor->TYPE3; ?>"><?= $doctor->TYPE3; ?>
												<small class="info help-block">
												</small>	
											</label>
											<small class="info help-block">
											</small>
										</div>
										<?php } ?>

									</div>  								   
								</div>
								<small class="info help-block">
									</small>
							</div>
				       <div class="form-group ">
                              <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code 
                              </label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE', $doctor_card->PARTNER_DR_CODE); ?>">
                                 <small class="info help-block"></small>
                              </div>
                           </div>
						   <div class="form-group ">
							<label for="TERM_DATE" class="col-sm-2 control-label">Term Date								
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE', $doctor_card->TERM_DATE); ?>">
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
              window.location.href = BASE_URL + 'administrator/doctor_card';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor_card = $('#form_doctor_card');
        var data_post = form_doctor_card.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_doctor_card.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#doctor_card_image_galery').find('li').attr('qq-file-id');
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