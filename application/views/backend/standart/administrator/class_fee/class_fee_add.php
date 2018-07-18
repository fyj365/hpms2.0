
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Class Fee        <small>New Class Fee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/class_fee'); ?>">Class Fee</a></li>
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
                            <h3 class="widget-user-username">Class Fee</h3>
                            <h5 class="widget-user-desc">New Class Fee</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_class_fee', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_class_fee', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
							
							<div class="form-group ">
                            <label for="COMPANY_CODE" class="col-sm-2 control-label">Company Code 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="COMPANY_CODE" id="COMPANY_CODE">
									<option value=""></option>
                                    <?php foreach (db_get_all_data('COMPANY') as $row): ?>
                                    <option value="<?= $row->COMPANY_CODE ?>"><?= $row->COMPANY_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CLASS_CODE" class="col-sm-2 control-label">Class Code 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" data-placeholder="Please select 'Company Code' first" name="CLASS_CODE" id="CLASS_CODE" disabled>
									<option value=""></option>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="TYPE" class="col-sm-2 control-label">Type 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="TYPE" id="TYPE">
									<option value=""></option>
                                    <?php foreach (db_get_all_data('doctor_type_desc') as $row): ?>
                                    <option value="<?= $row->DT_CODE ?>"><?= $row->DT_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MED_DAYS" class="col-sm-2 control-label">Med Days 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MED_DAYS" id="MED_DAYS" value="<?= set_value('MED_DAYS'); ?>">
                            </div>
                        </div>
                         
                                                <div class="form-group ">
                            <label for="CO_PAY" class="col-sm-2 control-label">Co Pay
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CO_PAY" id="CO_PAY" value="<?= set_value('CO_PAY'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE" class="col-sm-2 control-label">Fee 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="FEE" id="FEE" value="<?= set_value('FEE'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAY" class="col-sm-2 control-label">Pay 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAY" id="PAY" value="<?= set_value('PAY'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="COMMISSION_COMPANY" class="col-sm-2 control-label">Commission Company 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="COMMISSION_COMPANY" id="COMMISSION_COMPANY" value="<?= set_value('COMMISION_COMPANY'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="COMMISSION" class="col-sm-2 control-label">Commission 
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="COMMISSION" id="COMMISSION" value="<?= set_value('COMMISION'); ?>">
                            </div>
                        </div>
                                                 
                                               <div class="form-group ">
                            <label class="col-sm-2 control-label">Other Fee
                            </label>
                            <div class="col-sm-8">
								<div class="col-md-3  padding-left-0">
									<label><input type="checkbox" class="flat-red" name="EXTRA_MED_BOL[]" value="1"> Extra Med</label>
								</div>
								
								<div class="col-md-3  padding-left-0">
									<label><input type="checkbox" class="flat-red" name="LAB_XRAY[]" value="1"> Lab/Xray</label>
								</div>
								
								<div class="col-md-3  padding-left-0">
									<label><input type="checkbox" class="flat-red" name="LAB_XRAY_CODE[]" value="1"> Surgical</label>
								</div>
                            </div>
                           
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAST_MODIFIER" class="col-sm-2 control-label">Last Modifier 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER" id="LAST_MODIFIER" value="<?= set_value('LAST_MODIFIER'); ?>">
                            </div>
                        </div>
						<br>
                                                 
                        
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
    $(document).ready(function(){
		
		$('#COMPANY_CODE').change(function() {
			
			var cmp_index = $("#COMPANY_CODE")[0].selectedIndex;
			var cmp_code = $('#COMPANY_CODE').val();
			var cmp_code_nosp = cmp_code.replace(/ /g, "%20");
			
			$('#COMPANY_CODE').prop('disabled', true).trigger("chosen:updated");
			
			$('#CLASS_CODE').prop('disabled', true);
			$("#CLASS_CODE")[0].selectedIndex = -1;
			
			if (cmp_index == 0 & cmp_code == ""){
				$('#CLASS_CODE').attr("data-placeholder", "Please select 'Company Code' first").trigger("chosen:updated");
			}else{
				$('#CLASS_CODE').attr("data-placeholder", " ").trigger("chosen:updated");
				
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/class_special_fee/add_search/' + cmp_code_nosp + '/',
					dataType: "json",
					success: function(data) {
						$("#CLASS_CODE").empty();
						
						$.each(data['class_codes'], function(index, val) {
						  $('#CLASS_CODE').append("<option value='" + val.CLASS_CODE + "'>" + val.CLASS_CODE + "</option>");
						});


						$('#CLASS_CODE').attr("data-placeholder", "Select the 'Class Code' of " + cmp_code);
						$("#CLASS_CODE")[0].selectedIndex = -1;
						$('#CLASS_CODE').prop('disabled', false).trigger("chosen:updated");
						$('#COMPANY_CODE').prop('disabled', false).trigger("chosen:updated");
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
              window.location.href = BASE_URL + 'administrator/class_fee';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
                    
        var form_class_fee = $('#form_class_fee');
        var data_post = form_class_fee.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/class_fee/add_save',
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