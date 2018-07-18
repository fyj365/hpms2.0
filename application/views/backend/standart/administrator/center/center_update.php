
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Center        <small>Edit Center</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/center'); ?>">Center</a></li>
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
                            <h3 class="widget-user-username">Center</h3>
                            <h5 class="widget-user-desc">Edit Center</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/center/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_center', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_center', 
                            'method'  => 'POST'
                            ]); ?>
                         <div class="form-group ">
							  <label for="CENTER_CODE" class="col-sm-2 control-label">Center Code 
							  </label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="CENTER_CODE" id="CENTER_CODE" onkeyup="madeChange()" value="<?= set_value('CENTER_CODE', $center->CENTER_CODE); ?>" readonly>
								 <small class="info help-block">
								 </small>
							  </div>
							  
							  <label for="OPEN_AFTER_EIGHT" class="col-sm-2 control-label">Open After 8:00pm
								<input <?= in_array('1', explode(',', $center->OPEN_AFTER_EIGHT)) ? 'checked' : ''; ?> type="checkbox" class="flat-red" name="OPEN_AFTER_EIGHT[]" value="1"></label>
							  </label>
						   </div>
						   	   <div class="form-group ">
							  <label for="TEL" class="col-sm-2 control-label">Tel 
							  </label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="TEL" id="TEL" value="<?= set_value('TEL', $center->TEL); ?>" readonly>
								 <small class="info help-block">
								 </small>
							  </div>	
							  	<label for="FAX" class="col-sm-2 control-label">Fax 
								</label>
								<div class="col-sm-3">
									 <input type="text" class="form-control" name="FAX" id="FAX" value="<?= set_value('FAX', $center->FAX); ?>">
									 <small class="info help-block">
									 </small>
								</div>					  
						   </div>
						   <div class="form-group ">
							  <label for="E_NAME" class="col-sm-2 control-label">Center English Name 
							  <i class="required">*</i>
							  </label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control cust-required" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME', $center->E_NAME); ?>">
								<small class="info help-block">
								 </small>
							  </div>
							  
							  <label for="C_NAME" class="col-sm-2 control-label">Center Chinese Name 
							  </label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME', $center->C_NAME); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
							  							  
					   </div>
						   
						   <div class="form-group ">
							  <label for="CENTER_E_NAME" class="col-sm-2 control-label">English Addr 
							  <i class="required">*</i>
							  </label>
							  
							  <div class="col-sm-3">
								 <input type="text" class="form-control cust-required" name="E_ADDR1" id="E_ADDR1" placeholder="Address line 1" value="<?= set_value('E_ADDR1', $center->E_ADDR1); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  <label for="CENTER_C_NAME" class="col-sm-2 control-label">Chinese Addr 
							  </label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="C_ADDR1" id="C_ADDR1" value="<?= set_value('C_ADDR1', $center->C_ADDR1); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
						   </div>
						   
						   <div class="form-group ">
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="E_ADDR2" id="E_ADDR2"  value="<?= set_value('E_ADDR2', $center->E_ADDR2); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="C_ADDR2" id="C_ADDR2"  value="<?= set_value('C_ADDR2', $center->C_ADDR2); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
						   </div>
						   
						   <div class="form-group ">
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="E_ADDR3" id="E_ADDR3"  value="<?= set_value('E_ADDR3', $center->E_ADDR3); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="C_ADDR3" id="C_ADDR3"  value="<?= set_value('C_ADDR3', $center->C_ADDR3); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  
						   </div>
						   
						   <div class="form-group ">
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="E_ADDR4" id="E_ADDR4"  value="<?= set_value('E_ADDR4', $center->E_ADDR4); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="C_ADDR4" id="C_ADDR4"  value="<?= set_value('C_ADDR4', $center->C_ADDR4); ?>">
								<small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="E_ADDR5" id="E_ADDR5" value="<?= set_value('E_ADDR5', $center->E_ADDR5); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  <label class="col-sm-2"></label>
							  <div class="col-sm-3">
								 <input type="text" class="form-control" name="C_ADDR5" id="C_ADDR5"  value="<?= set_value('C_ADDR5', $center->C_ADDR5); ?>">
								<small class="info help-block">
								</small>
							  </div>
							  
							  
						   </div>
						   
					
                              	  <div class="form-group ">
					  <label class="col-sm-2 control-label">District<i class="required">*</i></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select cust-required" name="E_DISTRICT" id="E_DISTRICT"  value="<?= set_value('E_DISTRICT',$center->E_DISTRICT); ?>">
						<small class="info help-block">
						</small>
					  </div>
					   
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_DISTRICT" id="C_DISTRICT" value="<?= set_value('C_DISTRICT',$center->C_DISTRICT); ?>">
						<small class="info help-block">
						</small>
					  </div>
				   </div>	
				               <div class="form-group">
               <label class="col-sm-2 control-label">AREA<i class="required">*</i></label>
               <div class="col-sm-3">
                       <label class="control-label">HK
                        <input type="radio" name="area" value="HK" <?php echo ($center->AREA == "HK")? 'checked' :""?>  >
                  </label>
                  <label> KLN
                         <input type="radio" name="area" value="KLN"<?php echo ($center->AREA == "KLN")? 'checked' :""?> >
                  </label>
                 
                  <label> NT
                     <input type="radio" name="area" value="NT" <?php echo ($center->AREA == "NT")? 'checked' :""?>> 
                  </label>
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
		
		
		$('#AREA').change(function() {
			var area = $("#AREA").val();
			
			if (area != ""){
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/center/search_district/',
					data:{'area': area},
					dataType: "json",
					success: function(data) {
						$("#DISTRICT").empty();
						
						$.each(data['district'], function(index, val) {
						  $('#DISTRICT').append("<option value='" + val.AUTO_NO + "'>" + val.ENG_DISTRICT + "  &nbsp;  " + val.CHI_DISTRICT + "</option>");
						});
						
						$("#DISTRICT")[0].selectedIndex = 0;
						$('#DISTRICT').trigger("chosen:updated");
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}else{
				$("#DISTRICT").empty();
				
				$('#DISTRICT').append("<option value=''></option>");
				
				  $('#DISTRICT').append("<?php foreach (db_get_all_data('hk_district') as $row): ?>" + "<option value='<?= $row->AUTO_NO ?>'><?= $row->ENG_DISTRICT; ?>  &nbsp;  <?= $row->CHI_DISTRICT; ?></option><?php endforeach; ?>");
				
				$("#DISTRICT")[0].selectedIndex = -1;
				$('#DISTRICT').trigger("chosen:updated");
			}
			
			
		});
		
		$('#DISTRICT').change(function() {
			var auto_no = $("#DISTRICT").val();
			
			if (auto_no != ""){

				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/center/search_area/',
					data:{'auto_no': auto_no},
					dataType: "json",
					success: function(data) {
						
						var area = data['area'].REGION;
						
						if (area != $("#AREA").val()){
							$('#AREA option[value=' + area +']').prop('selected',true);
							$('#AREA').trigger("chosen:updated");
						}
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
			
			}else{
				$("#DISTRICT")[0].selectedIndex = -1;
				$('#DISTRICT').trigger("chosen:updated");
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
              window.location.href = BASE_URL + 'administrator/center';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_center = $('#form_center');
        var data_post = form_center.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_center.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#center_image_galery').find('li').attr('qq-file-id');
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