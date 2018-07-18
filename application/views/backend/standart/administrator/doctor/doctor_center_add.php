
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Center        <small>New Doctor Center</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/center'); ?>">Center</a></li>
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
        
                              <div class="form-group " id="Doctor_ID">
                        <label class="col-sm-8 control-label">  </label>
                      
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required DR_CODE" value="<?= $DR_CODE; ?>" readonly>
                        </div>
                        </div>

                     </div>
                     <hr>
                     <div>
                        <?= form_open('', [
                            'name'    => 'form_center', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_center', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>

            	<div id="centerDiv">
           		
                  <div id="center_code_div">

                    <div class="form-group">
                        <label class="control-label col-sm-2" style="color:blue;">Please choose one: <i class="required">*</i></label>
              
                       <label class="control-label col-sm-2">
                        <input type="radio"  name="HV_CENTER" value=0 >New Center
                       </label>

                        <label class="control-label col-sm-2">
                          <input type="radio"  name="HV_CENTER" value=1 checked>Existing Center
                        </label>
                     <div class="cust-exist-center col-sm-4">
                       <div class="cust-required-select">
                          <select class="form-control chosen chosen-select-deselect" data-placeholder="Select an Existing Center" name="CENTER_CODE_SELECT" id="CENTER_CODE_SELECT">
                            <option value=""</option>
                            <?php foreach (db_get_all_data('center') as $index=>$row): ?>
                            <option value="<?= $row->CENTER_CODE; ?>"><?= $row->E_NAME; ?></option>
                            <?php endforeach; ?>  
                          </select>
                        </div>
                     </div>
                </div>
               <hr>
            </div>
              <div class="form-group " id="Doctor_ID">
                <div class="col-sm-3">
                   <input type="hidden" class="form-control cust-required DR_CODE" name="DR_CODE" id="DR_CODE" value="<?= $DR_CODE; ?>" readonly>
                </div>
                </div>

               <div class="form-group">
                  <label for="CENTER_ID" class="col-sm-2 control-label">ID</label>
               
                 <div class="col-sm-3">
                   <input type="tel" class="form-control reset-center-select cust-required" name="CENTER_ID" id="CENTER_ID" value="" readonly="true">
                   <small class="info help-block">
                   </small>
                 </div> 
                          
                   <label for="OPEN_AFTER_EIGHT" class="col-sm-4 control-label" style="width: 200px;">Open After 8:00pm</label>
                   <div class="col-sm-3" ">
                       <input type="checkbox" class="center-checkbox" id="OPEN_AFTER_EIGHT" name="OPEN_AFTER_EIGHT[]" value="1">
                   
                  </div>  
               </div>
               <div class="form-group ">
              <label for="TEL" class="col-sm-2 control-label">Tel <i class="required">*</i>  </label>
               
                 <div class="col-sm-3">
                   <input type="tel" class="form-control center-input reset-center-select cust-required" name="TEL" id="TEL" value="<?= set_value('TEL'); ?>" required placeholder="">
                   <small class="info help-block">
                     Tel must consist of 8 digits
                   </small>
                 </div> 
                 <label for="FAX" class="col-sm-2 control-label">Fax </label>
                  
                  <div class="col-sm-3">
                      <input type="text" class="form-control center-input reset-center-select" name="FAX" id="FAX" value="<?= set_value('FAX'); ?>">
                      <small class="info help-block">
                      </small>
                  </div>         
               </div>
                           <div class="form-group ">
   
                   <label for="CENTER_E_NAME" class="col-sm-2 control-label">Center English Name  <i class="required">*</i>  </label>
              
                 <div class="col-sm-3">
                   <input type="text" class="form-control center-input reset-center-select cust-required" name="CENTER_E_NAME" id="CENTER_E_NAME" value="<?= set_value('CENTER_E_NAME'); ?>">
                 
                   <small class="info help-block">
                     Center English Name 
                   </small>     
                  </div>
                 
                 <label for="CENTER_C_NAME" class="col-sm-2 control-label">Center Chinese Name
                 </label>
                 <div class="col-sm-3">
                   <input type="text" class="form-control center-input reset-center-select" name="CENTER_C_NAME" id="CENTER_C_NAME" value="<?= set_value('CENTER_C_NAME'); ?>">
                       <small class="info help-block">
                        Center Chinese Name 
                   </small>    
                 </div>       
               </div>
               
				   <div class="form-group ">
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">English Address 
					  </label>
					  
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select cust-required" name="E_ADDR1" id="E_ADDR1" value="<?= set_value('E_ADDR1'); ?>">
						<small class="info help-block">
                     Floor No. /Room No
						</small>
					  </div>
					  
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">Chinese Address
					  </label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR1" id="C_ADDR1" value="<?= set_value('C_ADDR1'); ?>">
						<small class="info help-block">
						</small>
					  </div>

				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR2" id="E_ADDR2"  value="<?= set_value('E_ADDR2'); ?>">
						<small class="info help-block">
                      Unit No/building Name
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR2" id="C_ADDR2"  value="<?= set_value('C_ADDR2'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  				
				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR3" id="E_ADDR3" value="<?= set_value('E_ADDR3'); ?>">
						<small class="info help-block">
                     Street No.
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR3" id="C_ADDR3"  value="<?= set_value('C_ADDR3'); ?>">
						<small class="info help-block">
						</small>
					  </div>
				   </div>
				   				   
				   <div class="form-group ">
					  <label class="col-sm-2 control-label">District<i class="required">*</i></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select cust-required" name="E_DISTRICT" id="E_DISTRICT"  value="<?= set_value('E_DISTRICT'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_DISTRICT" id="C_DISTRICT" value="<?= set_value('C_DISTRICT'); ?>">
						<small class="info help-block">
						</small>
					  </div>
				   </div>						   
            
            <div class="form-group">
               <label class="col-sm-2 control-label">AREA<i class="required">*</i></label>
               <div class="col-sm-3">
                       <label class="control-label">HK
                        <input type="radio" name="area" value="HK" >  
                  </label>
                  <label> KLN
                         <input type="radio" name="area" value="KLN" >
                  </label>
                 
                  <label> NT
                     <input type="radio" name="area" value="NT"> 
                  </label>
               </div>
               </div>
                  <small class="info help-block">
                  </small>
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
		var DR_CODE = $('#DR_CODE').val();

		// INPUT CENTER 
		$('input[name="HV_CENTER"]').on("change",function(e){

          var hv_center = $(this).val();
        
         $('.center_id').val("");


			if (hv_center > 0){
				$(".cust-exist-center").fadeIn();
				$(".center-input").attr('readonly', true);
				$('.reset-center-select').val("");
				$("#OPEN_AFTER_EIGHT").prop("checked", false);

				$("#CENTER_CODE_SELECT")[0].selectedIndex = -1;
				$("#CENTER_CODE_SELECT").trigger("chosen:updated");
				
			}else{
				$(".cust-exist-center").fadeOut();
				$(".center-input").attr('readonly', false);
				$('.reset-center-select').val("");

				$("#OPEN_AFTER_EIGHT").prop("checked", false);
               $('input[name="area"]').prop("checked", false);

            $.ajax({
               url: BASE_URL + 'administrator/doctor/add_center_id',
               dataType:'JSON',
               method: 'GET',
               success: function(res){
                  var max_center = res.max_center;
                  var max_center_id = max_center.CENTER_CODE;
                  var new_id = parseInt(max_center_id)+1;
                  $('#CENTER_ID').val(new_id);
                  $('.center_id').val("ID:" + new_id);
               }

            })
			}
			
		});
		
		$('#CENTER_CODE_SELECT').on('change',function(){

			var center_selected = $(this).val();


			$('.reset-center-select').val("");
			$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
			
			
			if (center_selected == ""){

				$('#CENTER_CODE_SELECT').prop("disabled", false).trigger("chosen:updated");
         			$('.center_id').val("");
			 }else{

            $('.center_id').val("ID:" + center_selected);
			
            $.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/find_center/',
					data:{'center_code': center_selected},
					dataType: "json",
					success: function(data) {

					var center = data['center'];		
                        $('#CENTER_ID').val(center.CENTER_CODE);				
						$("#CENTER_E_NAME").val(center.E_NAME);
						$("#CENTER_C_NAME").val(center.C_NAME);
						$("#E_ADDR1").val(center.E_ADDR1);
						$("#E_ADDR2").val(center.E_ADDR2);
						$("#E_ADDR3").val(center.E_ADDR3);
						$("#E_DISTRICT").val(center.E_DISTRICT);
						$("#C_ADDR1").val(center.C_ADDR1);
						$("#C_ADDR2").val(center.C_ADDR2);
						$("#C_ADDR3").val(center.C_ADDR3);
           				$("#C_DISTRICT").val(center.C_DISTRICT);
						$("#TEL").val(center.TEL);
						$("#FAX").val(center.FAX);
						
						if (center.OPEN_AFTER_EIGHT > 0){
							$("#OPEN_AFTER_EIGHT").prop("checked", true).iCheck('update');
						}else{
							$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
						}
                  $('input[name="area"]').each(function(){
                     if (this.value == center.AREA) {
                        $(this).prop('checked',true);
                        return;
                     }else{
                        $(this).prop('checked',false);
                     }
                  })
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				$('#CENTER_CODE_SELECT').prop("disabled", false).trigger("chosen:updated");
				
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
              location.replace(document.referrer);
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
          url: BASE_URL + '/administrator/doctor/add_doctor_center_save/' + DR_CODE,
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {

            // window.location = res.redirect;
       		$('.message').printMessage({message : res.message, types : 'success'});
        	$('.message').fadeIn();
	            if (save_type == 'stay') {
	            	// if stay reset the form 
	            	$('#form_center').trigger("reset");
	            	$('.chosen option').prop('selected', false).trigger('chosen:updated');
	            }else{
	            	// if go back to update doctor
	            	 location.replace(document.referrer);
	            }   
          }else {

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