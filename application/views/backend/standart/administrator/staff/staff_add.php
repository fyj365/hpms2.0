
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
        Staff        <small>New Staff</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/staff'); ?>">Staff</a></li>
        <li class="active">New</li>
    </ol>
</section>
<style type="text/css">
 .box.box-widget{
  padding-top: 20px;
 }
 #StaffDiv {
  margin-top: 20px;
 }
  legend {
    font-weight: 500;
    font-size: 15px;
    padding-top: 20px;
    margin-left: 50px;
  }
</style>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">

                    <ul class="nav nav-tabs">
                      <li id="stafftab" class="active"><a id="btn_staff">Staff</a></li>
                      <li id="paymenttab" class=""><a id="btn_payment">Payment</a></li>
                    </ul>
                      
                        <?= form_open('', [
                            'name'    => 'form_staff', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_staff', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                         <div id="StaffDiv">
                                                <div class="form-group ">
                            <label for="STAFF_CODE" class="col-sm-2 control-label">Staff Code 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control cust-required" name="STAFF_CODE" id="STAFF_CODE" value="<?= set_value('STAFF_CODE'); ?>">
                                <small class="info help-block">Please enter unique staff code; a-z, A-Z, 0-9,dash '-' and underscores '_' only
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-2 control-label">English Name
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="cust-required form-control" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME'); ?>">
                                <small class="info help-block"></small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-2 control-label">Chinese Name
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PHONE" class="col-sm-2 control-label">Phone
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PHONE" id="PHONE" value="<?= set_value('PHONE'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-2 control-label">Email
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="EMAIL" id="EMAIL"  value="<?= set_value('EMAIL'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PWD" class="col-sm-2 control-label">Password
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PWD" id="PWD"  value="<?= set_value('PWD'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ROLE_CODE" class="col-sm-2 control-label">Role code 
                            </label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control" name="ROLE_CODE" id="ROLE_CODE" list="role_code_list">
                                <datalist id="role_code_list">
                                    <option value="Admin">Admin</option>
                                    <option value="General">General</option>
                                    <option value="Clerk">Clerk</option>
                                </datalist>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="STATUS" class="col-sm-2 control-label">Status
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATUS" id="STATUS"  value="<?= set_value('STATUS'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        </div>

                  <div id="paymentDiv">
                    <fieldset>
                        <legend>Cheque</legend>
                    <div class="form-group ">
                       <label for="PAYEE_NAME" class="col-sm-2 control-label">Payee Name
                       </label>
                       <div class="col-sm-8">
                          <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?= set_value('PAYEE_NAME'); ?>">
                          <small class="info help-block">
                          </small>
                       </div>
                    </div>
                    <div class="form-group ">
                       <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
                       </label>
                       <div class="col-sm-8">
                          <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= set_value('PAYEE_ADDR1'); ?>">
                          <small class="info help-block">
                          </small>
                       </div>
                    </div>
                    
                    <div class="form-group ">
                       <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
                       </label>
                       <div class="col-sm-8">
                          <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= set_value('PAYEE_ADDR2'); ?>">
                        <small class="info help-block">
                              </small>
                       </div>
                    </div>
                    
                    <div class="form-group ">
                       <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
                       </label>
                       <div class="col-sm-8">
                          <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= set_value('PAYEE_ADDR3'); ?>">
                        <small class="info help-block">
                              </small>
                       </div>
                    </div>
                    
                    <div class="form-group ">
                       <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
                       </label>
                       <div class="col-sm-8">
                          <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= set_value('PAYEE_ADDR4'); ?>">
                        <small class="info help-block">
                              </small>
                       </div>
                    </div>
                    
                    <div class="form-group ">
                       <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
                       </label>
                       <div class="col-sm-8">
                          <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= set_value('PAYEE_ADDR5'); ?>">
                        <small class="info help-block">
                              </small>
                      </div>
                    </div>
                    
                    <div class="form-group ">
                       <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
                       </label>
                       <div class="col-sm-4">
                          <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= set_value('PAYEE_DISTRICT'); ?>">
                          <small class="info help-block">
                          </small>
                       </div>
                    </div>
                     </fieldset>
                    <fieldset>
                        <legend>Auto Pay</legend>
                    <div class="form-group ">
                       <label for="BANK_CLEARING_CODE" class="col-sm-2 control-label">Bank
                       </label>
                       <div class="col-sm-8">
                          <div>
                             <select  class="form-control chosen chosen-select-deselect" name="BANK_CLEARING_CODE" id="BANK_CLEARING_CODE">
                                <option value=""></option>
                                <?php foreach (db_get_all_data('bank') as $row): ?>
                                <option value="<?= $row->CLEARING_CODE ?>"><?= $row->C_NAME; ?> &nbsp; <?= $row->E_NAME; ?></option>
                                <?php endforeach; ?>  
                             </select>
                             <small class="info help-block">
                              </small>
                          </div>
                       </div>
                    </div>
                    <div class="form-group ">
                       <label for="ACCOUNT_NO" class="col-sm-2 control-label">Account No.
                       </label>
                       <div class="col-sm-8">
                          <div>
                             <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO">
                             <small class="info help-block">
                              </small>
                          </div>
                       </div>
                    </div>
                    <div class="form-group ">
                       <label for="ACCOUNT_HOLDER" class="col-sm-2 control-label">Account Holder
                       </label>
                       <div class="col-sm-8">
                          <div>
                             <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER">
                             <small class="info help-block">
                              </small>
                          </div>
                       </div>
                    </div>
                  </fieldset>
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
      jQuery(window).on("load", function(){
            $('#paymentDiv').hide();
        });
        
        $('#btn_staff').click(function(){
          $('#StaffDiv').show();
          $('#stafftab').addClass('active');
          $('#paymentDiv').hide();
          $('#paymenttab').removeClass('active');
      });

      $('#btn_payment').click(function(){
          $('#paymentDiv').show();
          $('#paymenttab').addClass('active');
          $('#StaffDiv').hide();
          $('#stafftab').removeClass('active');
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
              window.location.href = BASE_URL + 'administrator/staff';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_staff = $('#form_staff');
        var data_post = form_staff.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/staff/add_save',
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