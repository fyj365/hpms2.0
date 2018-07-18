
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
        Class Fee        <small>Edit Class Fee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/class_fee'); ?>">Class Fee</a></li>
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
                            <h3 class="widget-user-username">Class Fee</h3>
                            <h5 class="widget-user-desc">Edit Class Fee</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/class_fee/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_class_fee', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_class_fee', 
                            'method'  => 'POST'
                            ]); ?>
							
							<div class="form-group ">
                            <label for="COMPANY_CODE" class="col-sm-2 control-label">Company Code 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="COMPANY_CODE" id="COMPANY_CODE" value="<?= set_value('COMPANY_CODE', $class_fee->COMPANY_CODE); ?>" readonly>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="CLASS_CODE" class="col-sm-2 control-label">Class Code 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE" value="<?= set_value('CLASS_CODE', $class_fee->CLASS_CODE); ?>" readonly>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="TYPE" class="col-sm-2 control-label">Type 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="TYPE" id="TYPE" data-placeholder="Select Radio Box" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('doctor_type_desc') as $row): ?>
                                    <option <?=  $row->DT_CODE ==  $class_fee->TYPE ? 'selected' : ''; ?> value="<?= $row->DT_CODE ?>"><?= $row->DT_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="MED_DAYS" class="col-sm-2 control-label">Med Days 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MED_DAYS" id="MED_DAYS" value="<?= set_value('MED_DAYS', $class_fee->MED_DAYS); ?>">
                            </div>
                        </div>
                         
                                                <div class="form-group ">
                            <label for="CO_PAY" class="col-sm-2 control-label">Co Pay
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CO_PAY" id="CO_PAY" value="<?= set_value('CO_PAY', $class_fee->CO_PAY); ?>">
                            </div>
                        </div>
						
						 <div class="form-group ">
                            <label for="FEE" class="col-sm-2 control-label">Fee 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="FEE" id="FEE" value="<?= set_value('FEE', $class_fee->FEE); ?>">
                            </div>
                        </div>   
                                
                                                <div class="form-group ">
                            <label for="PAY" class="col-sm-2 control-label">Pay 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAY" id="PAY" placeholder="PAY" value="<?= set_value('PAY', $class_fee->PAY); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="COMMISSION_COMPANY" class="col-sm-2 control-label">Commission Company 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="COMMISSION_COMPANY" id="COMMISSION_COMPANY" value="<?= set_value('COMMISSION_COMPANY', $class_fee->COMMISSION_COMPANY); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="COMMISSION" class="col-sm-2 control-label">Commission 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="COMMISSION" id="COMMISSION" value="<?= set_value('COMMISSION', $class_fee->COMMISSION); ?>">
                            </div>
                        </div>
                                                 
                                                 <div class="form-group ">
                            <label class="col-sm-2 control-label">Other Fee
                            </label>
                            <div class="col-sm-8">
								<div class="col-md-3  padding-left-0">
									<label><input <?= in_array('1', explode(',', $class_fee->EXTRA_MED_BOL)) ? 'checked' : ''; ?>  type="checkbox" class="flat-red" name="EXTRA_MED_BOL[]" value="1"> Extra Med</label>
								</div>
								
								<div class="col-md-3  padding-left-0">
									<label><input <?= in_array('1', explode(',', $class_fee->LAB_XRAY_BOL)) ? 'checked' : ''; ?>  type="checkbox" class="flat-red" name="LAB_XRAY_BOL[]" value="1"> Lab/Xray</label>
								</div>
								
								<div class="col-md-3  padding-left-0">
									<label><input <?= in_array('1', explode(',', $class_fee->SURGICAL_BOL)) ? 'checked' : ''; ?>  type="checkbox" class="flat-red" name="SURGICAL_BOL[]" value="1"> Surgical</label>
								</div>
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function(){
      
      CKEDITOR.replace('REMARK'); 
      var REMARK = CKEDITOR.instances.REMARK;
                   
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
        $('#REMARK').val(REMARK.getData());
                    
        var form_class_fee = $('#form_class_fee');
        var data_post = form_class_fee.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_class_fee.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#class_fee_image_galery').find('li').attr('qq-file-id');
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