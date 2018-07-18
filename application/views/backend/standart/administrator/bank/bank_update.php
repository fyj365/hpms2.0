
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bank        <small>Edit Bank</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/bank'); ?>">Bank</a></li>
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
                            <h3 class="widget-user-username">Bank</h3>
                            <h5 class="widget-user-desc">Edit Bank</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/bank/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_bank', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_bank', 
                            'method'  => 'POST'
                            ]); ?>
                         
                         <div class="form-group ">
                            <label for="SELECT_BANK" class="col-sm-2 control-label">Bank Clearing Code
                            </label>
							<div class="col-sm-8">
                             <input type="text" class="form-control" name="CLEARING_CODE" id="CLEARING_CODE" value="<?= set_value('CLEARING_CODE', $bank->CLEARING_CODE); ?>" readonly>
						   <small class="info help-block">
						   </small>
						   </div>
                        </div>
						
						<div class="form-group ">
						   <label for="E_NAME" class="col-sm-2 control-label">English Name 
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-required" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME', $bank->E_NAME); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME', $bank->C_NAME); ?>">
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
              window.location.href = BASE_URL + 'administrator/bank';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_bank = $('#form_bank');
        var data_post = form_bank.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_bank.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#bank_image_galery').find('li').attr('qq-file-id');
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