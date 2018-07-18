
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
<style type="text/css">
  .forread {
    border: 1px solid black;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Diagnosis Code        <small>Edit Diagnosis Code</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/diagnosis_code'); ?>">Diagnosis Code</a></li>
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
                            <h3 class="widget-user-username">Diagnosis Code</h3>
                            <h5 class="widget-user-desc">Edit Diagnosis Code</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/diagnosis_code/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_diagnosis_code', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_diagnosis_code', 
                            'method'  => 'POST'
                            ]); ?>
                            <div class="form-group ">
                            <label for="DIAG_CODE" class="col-sm-2 control-label">Diagnosis code <i class="required">*</i>
                            </label> 

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE" list="code_list" id="DIAG_CODE" value="<?= set_value('DIAG_CODE', $diagnosis_code->DIAG_CODE); ?>">
                                <datalist id="code_list">
                                <?php if ($diagnosis_code_counts >0) {
                                  foreach ($diagnosis_codes as $code) {; ?>
                                    <option value="<?php echo $code->DIAG_CODE;?>"><?php echo $code->DIAG_CODE;?></option>
                                 <?php }} else{ echo'No diagnosis code available';}?>
                              </datalist>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                         
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE_STANDARD" class="col-sm-2 control-label">Diagnosis code standard<i class="required">*</i>
                            </label> 

                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE_STANDARD" id="DIAG_CODE_STANDARD" placeholder="DIAG CODE STANDARD" value="<?= set_value('DIAG_CODE_STANDARD', $diagnosis_code->DIAG_CODE_STANDARD); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                
                                                 
                                                <div class="form-group ">
                            <label for="E_DESC" class="col-sm-2 control-label">English Description 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="E_DESC" name="E_DESC" rows="5" class="textarea"><?= set_value('E_DESC', $diagnosis_code->E_DESC); ?></textarea>
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
              window.location.href = BASE_URL + 'administrator/diagnosis_code';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_diagnosis_code = $('#form_diagnosis_code');
        var data_post = form_diagnosis_code.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_diagnosis_code.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#diagnosis_code_image_galery').find('li').attr('qq-file-id');
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