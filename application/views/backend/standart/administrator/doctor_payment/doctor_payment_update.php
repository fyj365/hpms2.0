
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
        Doctor Payment        <small>Edit Doctor Payment</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_payment'); ?>">Doctor Payment</a></li>
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
                            <h3 class="widget-user-username">Doctor Payment</h3>
                            <h5 class="widget-user-desc">Edit Doctor Payment</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/doctor_payment/edit_save/' . $DR_CODE.'/'. $CENTER_CODE), [
                            'name'    => 'form_doctor_payment', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_payment', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-2 control-label">Doctor Code 
                            </label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?php echo $DR_CODE; ?>" readonly>
                                <small class="info help-block">
                                </small>

                                
                              </div>
                            <label class="control-label col-sm-2">Center</label>
                                  <div class="col-sm-3">
                                        <?php if($select_center){ ?>

                                    <input type="hidden" class="form-control center_id" name="CENTER_CODE" value="<?= $CENTER_CODE;  ?>" readonly="">
                                        <?php $this->db->where('CENTER_CODE', $CENTER_CODE);
                                         $query =    $this->db->get('center')->row();
                                         ?>
                                    <input type="text" class="form-control center_id" value="<?=  $query->E_NAME  ?>" readonly="">
                                        
                                        <?php }else{ ?>
                                    <select  name="CENTER_CODE" class="chosen chosen-select-deselect col-sm-12">
                                            <option value=""></option>
                                        <?php if($doctor_center!='') foreach ($doctor_center as $key => $value) { ?>
                                            <option value="<?= $value->CENTER_CODE ?>"> <?= $value->E_NAME; ?></option>
                                        <?php } ?>
                                    </select>

                                        <?php } ?>
                                    </div>
                            </div>
                        <hr>
               <div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Cheque
                        </label>
                     </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_NAME" class="col-sm-2 control-label">Payee Name
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_NAME" value="<?= ($doctor_payment)? $doctor_payment->PAYEE_NAME:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR1" value="<?= ($doctor_payment)? $doctor_payment->PAYEE_ADDR1:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR2"  value="<?= ($doctor_payment)? $doctor_payment->PAYEE_ADDR2:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR3" value="<?= ($doctor_payment)? $doctor_payment->PAYEE_ADDR3:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR4" value="<?= ($doctor_payment)? $doctor_payment->PAYEE_ADDR4:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_ADDR5" value="<?= ($doctor_payment)? $doctor_payment->PAYEE_ADDR5:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAYEE_DISTRICT" value="<?= ($doctor_payment)? $doctor_payment->PAYEE_DISTRICT:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                    <div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Auto Pay
                        </label>
                     </div>                 
                                                <div class="form-group ">
                            <label for="BANK_CLEARING_CODE" class="col-sm-2 control-label">Bank
                            </label>
                            <div class="col-sm-8">
                             <select  class="form-control chosen chosen-select-deselect" name="BANK_CLEARING_CODE" id="BANK_CLEARING_CODE">
                                <option value="">The doctor has no AUTO PAYMENT method in this centre</option>
                                <?php foreach (db_get_all_data('bank') as $row): ?>
                                <option <?php if ($auto_pay) { echo $row->CLEARING_CODE == $doctor_payment->BANK_CLEARING_CODE ? 'selected' : ''; }  ?> value="<?= $row->CLEARING_CODE ?>"><?= $row->C_NAME; ?> &nbsp; <?= $row->E_NAME; ?></option>
                                <?php endforeach; ?>  
                             </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ACCOUNT_NO" class="col-sm-2 control-label">Account No.
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ACCOUNT_NO" value="<?= ($doctor_payment)? $doctor_payment->ACCOUNT_NO:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ACCOUNT_HOLDER" class="col-sm-2 control-label">Account Holder
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ACCOUNT_HOLDER" value="<?= ($doctor_payment)? $doctor_payment->ACCOUNT_HOLDER:""; ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                       

                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
           <!--                  <button class="btn btn-flat btn-primary btn_save btn_action"  data-stype='stay' title="save (Ctrl+s)">
                            <i class="fa fa-save" ></i> Save
                            </button> -->
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back"  data-stype='back' title="save and back to the list (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go Back
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
              window.location.href = BASE_URL + 'administrator/doctor_payment';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor_payment = $('#form_doctor_payment');
        var data_post = form_doctor_payment.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_doctor_payment.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post
        })
        .success(function(res){
            if (res.success) {
                location.replace(document.referrer);
              }else{
                $('.message').printMessage({message: res.message, type : 'warning'});
                $('.message').fadeIn();
             }
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
           $('.loading').hide();
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>