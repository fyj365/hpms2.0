
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
        Staff Payment        <small>Edit Staff Payment</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/staff_payment'); ?>">Staff Payment</a></li>
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
                            <h3 class="widget-user-username">Staff Payment</h3>
                            <h5 class="widget-user-desc">Edit Staff Payment</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/staff_payment/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_staff_payment', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_staff_payment', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="STAFF_CODE" class="col-sm-2 control-label">STAFF CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STAFF_CODE" id="STAFF_CODE" placeholder="STAFF CODE" value="<?= set_value('STAFF_CODE', $staff_payment->STAFF_CODE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_NAME" class="col-sm-2 control-label">PAYEE NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" placeholder="PAYEE NAME" value="<?= set_value('PAYEE_NAME', $staff_payment->PAYEE_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR1" class="col-sm-2 control-label">PAYEE ADDR1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" placeholder="PAYEE ADDR1" value="<?= set_value('PAYEE_ADDR1', $staff_payment->PAYEE_ADDR1); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR2" class="col-sm-2 control-label">PAYEE ADDR2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" placeholder="PAYEE ADDR2" value="<?= set_value('PAYEE_ADDR2', $staff_payment->PAYEE_ADDR2); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR3" class="col-sm-2 control-label">PAYEE ADDR3 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" placeholder="PAYEE ADDR3" value="<?= set_value('PAYEE_ADDR3', $staff_payment->PAYEE_ADDR3); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR4" class="col-sm-2 control-label">PAYEE ADDR4 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" placeholder="PAYEE ADDR4" value="<?= set_value('PAYEE_ADDR4', $staff_payment->PAYEE_ADDR4); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR5" class="col-sm-2 control-label">PAYEE ADDR5 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" placeholder="PAYEE ADDR5" value="<?= set_value('PAYEE_ADDR5', $staff_payment->PAYEE_ADDR5); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">PAYEE DISTRICT 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" placeholder="PAYEE DISTRICT" value="<?= set_value('PAYEE_DISTRICT', $staff_payment->PAYEE_DISTRICT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="BANK_CLEARING_CODE" class="col-sm-2 control-label">BANK CLEARING CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BANK_CLEARING_CODE" id="BANK_CLEARING_CODE" placeholder="BANK CLEARING CODE" value="<?= set_value('BANK_CLEARING_CODE', $staff_payment->BANK_CLEARING_CODE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ACCOUNT_NO" class="col-sm-2 control-label">ACCOUNT NO 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" placeholder="ACCOUNT NO" value="<?= set_value('ACCOUNT_NO', $staff_payment->ACCOUNT_NO); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ACCOUNT_HOLDER" class="col-sm-2 control-label">ACCOUNT HOLDER 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER" placeholder="ACCOUNT HOLDER" value="<?= set_value('ACCOUNT_HOLDER', $staff_payment->ACCOUNT_HOLDER); ?>">
                                <small class="info help-block">
                                </small>
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
              window.location.href = BASE_URL + 'administrator/staff_payment';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_staff_payment = $('#form_staff_payment');
        var data_post = form_staff_payment.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_staff_payment.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#staff_payment_image_galery').find('li').attr('qq-file-id');
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