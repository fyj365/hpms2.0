
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
        Voucher Line        <small>Edit Voucher Line</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher Line</a></li>
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
                            <h3 class="widget-user-username">Voucher Line</h3>
                            <h5 class="widget-user-desc">Edit Voucher Line</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/voucher_line/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_voucher_line', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_voucher_line', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="BATCH_NO" class="col-sm-2 control-label">BATCH NO 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="BATCH_NO" id="BATCH_NO" value="<?= set_value('BATCH_NO', $voucher_line->BATCH_NO); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                            <label for="VOUCHER_NO" class="col-sm-2 control-label">VOUCHER NO 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="VOUCHER_NO" id="VOUCHER_NO" value="<?= set_value('VOUCHER_NO', $voucher_line->VOUCHER_NO); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                 
                                    <div class="form-group ">
                            <label for="TREATMENT_DATE" class="col-sm-2 control-label">TREATMENT DATE 
                            </label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control pull-right datepicker" name="TREATMENT_DATE" id="TREATMENT_DATE" value="<?= set_value('voucher_line_TREATMENT_DATE_name', $voucher_line->TREATMENT_DATE); ?>" readonly>
                            </div>
                     <small class="info help-block">
                                </small>

                            <label for="RECEIVE_DATE" class="col-sm-2 control-label">RECEIVE DATE </label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control pull-right datepicker" name="RECEIVE_DATE"   id="RECEIVE_DATE" value="<?= set_value('voucher_line_BATCH_DATE_name', $voucher_line->RECEIVE_DATE); ?>" readonly>
                               <small class="info help-block">
                                </small>
                            </div>
                         
                        </div>

                                                                        
                                                 
                                                <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">PARTNER CODE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= set_value('CARD_CODE', $voucher_line->CARD_CODE); ?>" readonly>
                            </div>
                            
                            <label for="CLASS_CODE" class="col-sm-2 control-label">CARD TYPE
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE"  value="<?= set_value('CLASS_CODE', $voucher_line->CLASS_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                
                                                                         
                                                <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-2 control-label">DR CODE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $voucher_line->DR_CODE); ?>" readonly>
                                <small class="info help-block" >
                                </small>
                            </div>
                                <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">PARTNER DR CODE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE', $voucher_line->PARTNER_DR_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                        
                                                 
                                                <div class="form-group ">
                            <label for="DR_E_NAME" class="col-sm-2 control-label">DR E NAME 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="DR_E_NAME" id="DR_E_NAME"  value="<?= set_value('DR_E_NAME', $voucher_line->DR_E_NAME); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">PARTNER DR CODE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE', $voucher_line->PARTNER_DR_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                          
                                                 
                                                <div class="form-group ">
                            <label for="PATIENT_CODE" class="col-sm-2 control-label">PATIENT CODE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="PATIENT_CODE" id="PATIENT_CODE" value="<?= set_value('PATIENT_CODE', $voucher_line->PATIENT_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                              <label for="PATIENT_HKID" class="col-sm-2 control-label">PATIENT HKID 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="PATIENT_HKID" id="PATIENT_HKID"  value="<?= set_value('PATIENT_HKID', $voucher_line->PATIENT_HKID); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                        
                          
                                                 
                                                <div class="form-group ">
                            <label for="PATIENT_NAME" class="col-sm-2 control-label">PATIENT  NAME 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="PATIENT_NAME" id="PATIENT_NAME"  value="<?= set_value('PATIENT_NAME', $voucher_line->PATIENT_NAME); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                              <label for="DEPD_CODE" class="col-sm-2 control-label">DEPD CODE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="DEPD_CODE" id="DEPD_CODE" value="<?= set_value('DEPD_CODE', $voucher_line->DEPD_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                  <div class="form-group">
                                             <label for="TYPE" class="col-sm-2 control-label">TYPE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="TYPE" id="TYPE" value="<?= set_value('TYPE', $voucher_line->TYPE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                                  <label for="SICK_LEAVE" class="col-sm-2 control-label">SICK LEAVE 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="SICK_LEAVE" id="SICK_LEAVE"  value="<?= set_value('SICK_LEAVE', $voucher_line->SICK_LEAVE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                      
                        </div>
                                         
                                                <div class="form-group ">

                            <label for="SL_FROM" class="col-sm-2 control-label">SL FROM 
                            </label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control pull-right datepicker" name="SL_FROM" id="SL_FROM" value="<?= set_value('voucher_line_SL_FROM_name', $voucher_line->SL_FROM); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            <label for="SL_TO" class="col-sm-2 control-label">SL TO 
                            </label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control pull-right datepicker" name="SL_TO"  id="SL_TO" value="<?= set_value('voucher_line_SL_TO_name', $voucher_line->SL_TO); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                          
                        </div>
                      
                             
                         
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE1" class="col-sm-2 control-label">DIAG CODE1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE1" id="DIAG_CODE1"  value="<?php echo $voucher_line->DIAG_CODE1 .','.$voucher_line->DIAG_DESC1; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE2" class="col-sm-2 control-label">DIAG CODE2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE2" id="DIAG_CODE2"  value="<?php echo $voucher_line->DIAG_CODE2.','.$voucher_line->DIAG_DESC2; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE3" class="col-sm-2 control-label">DIAG CODE3 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE3" id="DIAG_CODE3" value="<?php echo $voucher_line->DIAG_CODE3.','.$voucher_line->DIAG_DESC3; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                               
                                          
                                                 
                                                <div class="form-group ">
                            <label for="REFERRAL_DR" class="col-sm-2 control-label">REFERRAL DR 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="REFERRAL_DR" id="REFERRAL_DR"  value="<?= set_value('REFERRAL_DR', $voucher_line->REFERRAL_DR); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                 
                                                <div class="form-group ">
                            <label for="CO_PAY" class="col-sm-2 control-label">CO PAY 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CO_PAY" id="CO_PAY" value="<?= set_value('CO_PAY', $voucher_line->CO_PAY); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EXTRA_MED_BOL" class="col-sm-2 control-label">EXTRA MED BOL 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="EXTRA_MED_BOL" id="EXTRA_MED_BOL" value="<?= set_value('EXTRA_MED_BOL', $voucher_line->EXTRA_MED_BOL); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EXTRA_MED" class="col-sm-2 control-label">EXTRA MED 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="EXTRA_MED" id="EXTRA_MED"  value="<?= set_value('EXTRA_MED', $voucher_line->EXTRA_MED); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                         
                                                <div class="form-group ">
                            <label for="LAB_XRAY_BOL" class="col-sm-2 control-label">LAB XRAY BOL 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAB_XRAY_BOL" id="LAB_XRAY_BOL" value="<?= set_value('LAB_XRAY_BOL', $voucher_line->LAB_XRAY_BOL); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAB_XRAY" class="col-sm-2 control-label">LAB XRAY 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAB_XRAY" id="LAB_XRAY"  value="<?= set_value('LAB_XRAY', $voucher_line->LAB_XRAY); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                             
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL_BOL" class="col-sm-2 control-label">SURGICAL BOL 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SURGICAL_BOL" id="SURGICAL_BOL" value="<?= set_value('SURGICAL_BOL', $voucher_line->SURGICAL_BOL); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL" class="col-sm-2 control-label">SURGICAL 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SURGICAL" id="SURGICAL"  value="<?= set_value('SURGICAL', $voucher_line->SURGICAL); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                   
                                                <div class="form-group ">
                            <label for="APPROVAL_CODE" class="col-sm-2 control-label">APPROVAL CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="APPROVAL_CODE" id="APPROVAL_CODE" value="<?= set_value('APPROVAL_CODE', $voucher_line->APPROVAL_CODE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE_AMT" class="col-sm-2 control-label">FEE AMT 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="FEE_AMT" id="FEE_AMT" value="<?= set_value('FEE_AMT', $voucher_line->FEE_AMT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                            <label for="PAY_AMT" class="col-sm-2 control-label">PAY AMT 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="PAY_AMT" id="PAY_AMT"  value="<?= set_value('PAY_AMT', $voucher_line->PAY_AMT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                     
                                                 
                                                
                                   <div class="form-group ">
                            <label for="CREATOR" class="col-sm-2 control-label">CREATOR
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CREATOR" value="<?= set_value('CREATOR', $voucher_line->CREATOR); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                
                                <div class="form-group ">
                            <label for="CREATE_DATE" class="col-sm-2 control-label">CREATOR
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CREATE_DATE" value="<?= set_value('CREATE_DATE', $voucher_line->CREATE_DATE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                 
                                                        
                                                <div class="form-group ">
                            <label for="LAST_MODIFIER" class="col-sm-2 control-label">LAST MODIFIER
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER_VE" id="LAST_MODIFIER" value="<?= set_value('LAST_MODIFIER', $voucher_line->LAST_MODIFIER); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAST_UPDATE" class="col-sm-2 control-label">LAST UPDATE
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_UPDATE" id="LAST_UPDATE" value="<?= set_value('LAST_UPDATE', $voucher_line->LAST_UPDATE); ?>" readonly>
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
              window.location.href = BASE_URL + 'administrator/voucher_line';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_voucher_line = $('#form_voucher_line');
        var data_post = form_voucher_line.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_voucher_line.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#voucher_line_image_galery').find('li').attr('qq-file-id');
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