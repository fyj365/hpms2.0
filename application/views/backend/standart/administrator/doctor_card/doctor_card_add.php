
<!-- Content Header (Page header) -->
<section class="content-heade col-sm-12">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_card'); ?>">Doctor Card</a></li>
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
                            <h3 class="widget-user-username">Doctor Card</h3>
                            <h5 class="widget-user-desc">New Doctor Card</h5>
							<hr>
                        </div>
						
                        <?= form_open('', [
                            'name'    => 'form_doctor_card', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_card', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
						<div class="form-group">
						   <label for="card_code" class="col-sm-2 control-label">Card Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <select name="card_code" class="form-control chosen chosen-select-deselect changeContractNo1" id="card_code">
								 <option value=""></option>
								 <?php if ($card_codes_total >0) {
									foreach ($card_codes as $card_code) {; ?>
								 <option value="<?php echo $card_code->CARD_CODE; ?>"><?php echo $card_code->CARD_CODE;?></option>
								 <?php }}else{ echo 'No partner code available'; }  ?>
							  </select>
						   </div>
						</div>
						<div class="form-group">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <select name="DR_CODE" class="form-control chosen chosen-select-deselect changeContractNo2" id="DR_CODE">
								 <option value=""></option>
								 <?php if ($doctor_code_total > 0) {
									foreach ($doctor_codes as $doctor_code) {; ?>
								 <option value="<?php echo $doctor_code->DR_CODE; ?>"><?php echo $doctor_code->DR_CODE; ?></option>
								 <?php } } else{ echo "no Doctor code available";} ?>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
					

						 <div class="form-group ">
						  <label for="CENTER_CODE" class="col-sm-2 control-label">Doctor Center<i class="required">*</i>
						  </label>
						  <div class="col-sm-8 cust-required-select">
						  	<select name="CENTER_CODE" id="CENTER_CODE" class="form-control chosen chosen-select-deselect">
						  		
						  	</select>
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					     <div class="form-group ">
						  <label for="LOC_CODE" class="col-sm-2 control-label">Location Code 
						  </label>
						  <div class="col-sm-8">
							 <input type="text" class="form-control" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group  wrapper-options-crud">
							<label for="TYPE" class="col-sm-2 control-label">Dctor Type
							<i class="required">*</i>
							</label>
							<div class="col-sm-8 cust-type">
								<div class="cust-dr-type">
									<p>(Please select the Dr Code first)</p>
								</div>  								   
							</div>
							<small class="info help-block">
								</small>
						</div>


						<div class="form-group ">
						  <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code 
						  <i class="required">*</i>
						  </label>
						  <div class="col-sm-8">
							 <input type="text" class="form-control cust-required" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
						   

					   
						<div class="form-group ">
						  <label for="TERM_DATE" class="col-sm-2 control-label">Term Date 
						  </label>
						  <div class="col-sm-8">
							 <input type="text" class="form-control datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
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
			
		$("#DR_CODE").change(function() {
			$('#CENTER_CODE').empty();
            $('#CENTER_CODE').prop('selected',false).trigger("chosen:updated");
			var dr_code = $('#DR_CODE').val();
			$('#DR_CODE').prop('disabled', true).trigger("chosen:updated");
			
			$('.cust-dr-type').text("");
			
			if (dr_code == ""){
				
				$('.cust-dr-type').append('<p>(Please select the Dr Code first)</p><small class="info help-block"></small>');
				
				$('#DR_CODE').prop('disabled', false).trigger("chosen:updated");
				
			}else{
				
				$('.cust-type').slideUp();
				
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor_card/find_type_center/',
					data:{'dr_code': dr_code},
					dataType: "json",
					success: function(data) {
						
						
						if (data['TYPE'].TYPE1 != ""){
							$('.cust-dr-type').append('<div class="col-md-3  padding-left-0"><label><input checked type="checkbox" class="flat-red" name="TYPE[]" value="' + data['TYPE'].TYPE1 + '">' + 
							data['TYPE'].TYPE1 + '</label><small class="info help-block">' + 
							'</small></div>');
						}
						
						if (data['TYPE'].TYPE2 != ""){
							$('.cust-dr-type').append('<div class="col-md-3  padding-left-0"><label><input type="checkbox" class="flat-red" name="TYPE[]" value="' + data['TYPE'].TYPE2 + '">' + 
							data['TYPE'].TYPE2 + '</label><small class="info help-block">' + 
							'</small></div>');
						}
						
						if (data['TYPE'].TYPE3 != ""){
							$('.cust-dr-type').append('<div class="col-md-3  padding-left-0"><label><input type="checkbox" class="flat-red" name="TYPE[]" value="' + data['TYPE'].TYPE3 + '">' + 
							data['TYPE'].TYPE3 + '</label><small class="info help-block">' + 
							'</small></div>');
						}
						
						$('input[type="checkbox"].flat-red').iCheck({
							checkboxClass: 'icheckbox_flat-green',
							radioClass: 'iradio_flat-green'
						  });
						
						
						$('.cust-type').slideDown();
						$('#DR_CODE').prop('disabled', false).trigger("chosen:updated");
						
						var centers = data.centers;
						//console.log(centers);
						var center_option;
						if (centers.length>0) {
							for(var i = 0; i< centers.length; i++ ){
								center_option += '<option value="'+ centers[i].CENTER_CODE+'">'+centers[i].E_NAME + ','+centers[i].E_DISTRICT +'</option>'
							}
						}else{
						        center_option = '<option value="">No center available</option>';

						}
						 $('#CENTER_CODE').append(center_option);
					     $('#CENTER_CODE.chosen option').trigger('chosen:updated');
						

					},
					error: function(jqXHR) {
							alert("發生錯誤: " + jqXHR.status);
					}
				})
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
          url: BASE_URL + '/administrator/doctor_card/add_save',
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
			
			$("#PARTNER_CONTRACT_NO").attr("data-placeholder", "Select Dr Code first");
			$("#PARTNER_CONTRACT_NO").prop('selected', false).trigger('chosen:updated');
			$("#PARTNER_CONTRACT_NO").prop('disabled', true).trigger('chosen:updated');
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