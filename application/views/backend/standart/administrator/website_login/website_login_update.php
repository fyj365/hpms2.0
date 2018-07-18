
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Website Login        <small>Edit Website Login</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/website_login'); ?>">Website Login</a></li>
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
                            <h3 class="widget-user-username">Website Login</h3>
                            <h5 class="widget-user-desc">Edit Website Login</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/website_login/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_website_login', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_website_login', 
                            'method'  => 'POST'
                            ]); ?>
                                                 
                        <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $website_login->DR_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                        <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8 cust-required-select">
                                <select  class="form-control chosen chosen-select-deselect" name="CARD_CODE" id="CARD_CODE">
									<option value=""></option>
									<?php foreach (db_get_all_data('card') as $row): ?>
									<option <?=  $row->CARD_CODE ==  $website_login->CARD_CODE ? 'selected' : ''; ?> value="<?= $row->CARD_CODE ?>" ><?= $row->CARD_CODE; ?></option>
									<?php endforeach; ?> 
								</select>
								<small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                        <div class="form-group ">
                            <label for="WEBSITE_ACCOUNT" class="col-sm-2 control-label">Website Account
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control cust-required" name="WEBSITE_ACCOUNT" id="WEBSITE_ACCOUNT" value="<?= set_value('WEBSITE_ACCOUNT', $website_login->WEBSITE_ACCOUNT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                         <div class="form-group ">
                            <label for="WEBSITE_PASSWORD" class="col-sm-2 control-label">Website Password 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control cust-required" name="WEBSITE_PASSWORD" id="WEBSITE_PASSWORD" value="<?= set_value('WEBSITE_PASSWORD', $website_login->WEBSITE_PASSWORD); ?>">
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
              window.location.href = BASE_URL + 'administrator/website_login';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_website_login = $('#form_website_login');
        var data_post = form_website_login.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_website_login.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#website_login_image_galery').find('li').attr('qq-file-id');
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