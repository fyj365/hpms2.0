
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
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BATCH_NO" id="BATCH_NO" placeholder="BATCH NO" value="<?= set_value('BATCH_NO', $voucher_line->BATCH_NO); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="COMPANY_CODE" class="col-sm-2 control-label">COMPANY CODE 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="COMPANY_CODE" id="COMPANY_CODE" data-placeholder="Select COMPANY CODE" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company') as $row): ?>
                                    <option <?=  $row->COMPANY_CODE ==  $voucher_line->COMPANY_CODE ? 'selected' : ''; ?> value="<?= $row->COMPANY_CODE ?>"><?= $row->COMPANY_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="VOUCHER_NO" class="col-sm-2 control-label">VOUCHER NO 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="VOUCHER_NO" id="VOUCHER_NO" placeholder="VOUCHER NO" value="<?= set_value('VOUCHER_NO', $voucher_line->VOUCHER_NO); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                
                       
                                                 
                                                <div class="form-group ">
                            <label for="CLASS_CODE" class="col-sm-2 control-label">CLASS CODE 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="CLASS_CODE" id="CLASS_CODE" data-placeholder="Select CLASS CODE" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('classification') as $row): ?>
                                    <option <?=  $row->CLASS_CODE ==  $voucher_line->CLASS_CODE ? 'selected' : ''; ?> value="<?= $row->CLASS_CODE ?>"><?= $row->CLASS_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="TREATMENT_DATE" class="col-sm-2 control-label">TREATMENT DATE 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="TREATMENT_DATE"  placeholder="TREATMENT DATE" id="TREATMENT_DATE" value="<?= set_value('voucher_line_TREATMENT_DATE_name', $voucher_line->TREATMENT_DATE); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-2 control-label">DR CODE 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="DR_CODE" id="DR_CODE" data-placeholder="Select DR CODE" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company_doctor') as $row): ?>
                                    <option <?=  $row->DR_CODE ==  $voucher_line->DR_CODE ? 'selected' : ''; ?> value="<?= $row->DR_CODE ?>"><?= $row->DR_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input DR CODE</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="COMPANY_DR_CODE" class="col-sm-2 control-label">COMPANY DR CODE 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="COMPANY_DR_CODE" id="COMPANY_DR_CODE" data-placeholder="Select COMPANY DR CODE" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company_doctor') as $row): ?>
                                    <option <?=  $row->COMPANY_DR_CODE ==  $voucher_line->COMPANY_DR_CODE ? 'selected' : ''; ?> value="<?= $row->COMPANY_DR_CODE ?>"><?= $row->COMPANY_DR_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input COMPANY DR CODE</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="DR_E_NAME" class="col-sm-2 control-label">DR E NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_E_NAME" id="DR_E_NAME" placeholder="DR E NAME" value="<?= set_value('DR_E_NAME', $voucher_line->DR_E_NAME); ?>">
                                <small class="info help-block">
                                <b>Input DR E NAME</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DR_C_NAME" class="col-sm-2 control-label">DR C NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_C_NAME" id="DR_C_NAME" placeholder="DR C NAME" value="<?= set_value('DR_C_NAME', $voucher_line->DR_C_NAME); ?>">
                                <small class="info help-block">
                                <b>Input DR C NAME</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_CODE" class="col-sm-2 control-label">MEMBER CODE 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="MEMBER_CODE" id="MEMBER_CODE" data-placeholder="Select MEMBER CODE" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('member') as $row): ?>
                                    <option <?=  $row->MEMBER_CODE ==  $voucher_line->MEMBER_CODE ? 'selected' : ''; ?> value="<?= $row->MEMBER_CODE ?>"><?= $row->MEMBER_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input MEMBER CODE</b> Max Length : 80.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_CLASS" class="col-sm-2 control-label">MEMBER CLASS 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="MEMBER_CLASS" id="MEMBER_CLASS" data-placeholder="Select MEMBER CLASS" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('member') as $row): ?>
                                    <option <?=  $row->MEMBER_CLASS ==  $voucher_line->MEMBER_CLASS ? 'selected' : ''; ?> value="<?= $row->MEMBER_CLASS ?>"><?= $row->MEMBER_CLASS; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input MEMBER CLASS</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_HKID" class="col-sm-2 control-label">MEMBER HKID 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_HKID" id="MEMBER_HKID" placeholder="MEMBER HKID" value="<?= set_value('MEMBER_HKID', $voucher_line->MEMBER_HKID); ?>">
                                <small class="info help-block">
                                <b>Input MEMBER HKID</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_E_NAME" class="col-sm-2 control-label">MEMBER E NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_E_NAME" id="MEMBER_E_NAME" placeholder="MEMBER E NAME" value="<?= set_value('MEMBER_E_NAME', $voucher_line->MEMBER_E_NAME); ?>">
                                <small class="info help-block">
                                <b>Input MEMBER E NAME</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_C_NAME" class="col-sm-2 control-label">MEMBER C NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_C_NAME" id="MEMBER_C_NAME" placeholder="MEMBER C NAME" value="<?= set_value('MEMBER_C_NAME', $voucher_line->MEMBER_C_NAME); ?>">
                                <small class="info help-block">
                                <b>Input MEMBER C NAME</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_STAFF_NO" class="col-sm-2 control-label">MEMBER STAFF NO 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_STAFF_NO" id="MEMBER_STAFF_NO" placeholder="MEMBER STAFF NO" value="<?= set_value('MEMBER_STAFF_NO', $voucher_line->MEMBER_STAFF_NO); ?>">
                                <small class="info help-block">
                                <b>Input MEMBER STAFF NO</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPD_NAME" class="col-sm-2 control-label">DEPD NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DEPD_NAME" id="DEPD_NAME" placeholder="DEPD NAME" value="<?= set_value('DEPD_NAME', $voucher_line->DEPD_NAME); ?>">
                                <small class="info help-block">
                                <b>Input DEPD NAME</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPD_CODE" class="col-sm-2 control-label">DEPD CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DEPD_CODE" id="DEPD_CODE" placeholder="DEPD CODE" value="<?= set_value('DEPD_CODE', $voucher_line->DEPD_CODE); ?>">
                                <small class="info help-block">
                                <b>Input DEPD CODE</b> Max Length : 10.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SICK_LEAVE" class="col-sm-2 control-label">SICK LEAVE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SICK_LEAVE" id="SICK_LEAVE" placeholder="SICK LEAVE" value="<?= set_value('SICK_LEAVE', $voucher_line->SICK_LEAVE); ?>">
                                <small class="info help-block">
                                <b>Input SICK LEAVE</b> Max Length : 3.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SL_FROM" class="col-sm-2 control-label">SL FROM 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="SL_FROM"  placeholder="SL FROM" id="SL_FROM" value="<?= set_value('voucher_line_SL_FROM_name', $voucher_line->SL_FROM); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="SL_TO" class="col-sm-2 control-label">SL TO 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="SL_TO"  placeholder="SL TO" id="SL_TO" value="<?= set_value('voucher_line_SL_TO_name', $voucher_line->SL_TO); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="POLICY_NO" class="col-sm-2 control-label">POLICY NO 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POLICY_NO" id="POLICY_NO" placeholder="POLICY NO" value="<?= set_value('POLICY_NO', $voucher_line->POLICY_NO); ?>">
                                <small class="info help-block">
                                <b>Input POLICY NO</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="INSURED_NO" class="col-sm-2 control-label">INSURED NO 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="INSURED_NO" id="INSURED_NO" placeholder="INSURED NO" value="<?= set_value('INSURED_NO', $voucher_line->INSURED_NO); ?>">
                                <small class="info help-block">
                                <b>Input INSURED NO</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="POLICY_YEAR" class="col-sm-2 control-label">POLICY YEAR 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POLICY_YEAR" id="POLICY_YEAR" placeholder="POLICY YEAR" value="<?= set_value('POLICY_YEAR', $voucher_line->POLICY_YEAR); ?>">
                                <small class="info help-block">
                                <b>Input POLICY YEAR</b> Max Length : 4.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DP_TYPE" class="col-sm-2 control-label">DP TYPE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DP_TYPE" id="DP_TYPE" placeholder="DP TYPE" value="<?= set_value('DP_TYPE', $voucher_line->DP_TYPE); ?>">
                                <small class="info help-block">
                                <b>Input DP TYPE</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE1" class="col-sm-2 control-label">DIAG CODE1 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE1" id="DIAG_CODE1" data-placeholder="Select DIAG CODE1" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option <?=  $row->DIAG_CODE ==  $voucher_line->DIAG_CODE1 ? 'selected' : ''; ?> value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input DIAG CODE1</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE2" class="col-sm-2 control-label">DIAG CODE2 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE2" id="DIAG_CODE2" data-placeholder="Select DIAG CODE2" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option <?=  $row->DIAG_CODE ==  $voucher_line->DIAG_CODE2 ? 'selected' : ''; ?> value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input DIAG CODE2</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE3" class="col-sm-2 control-label">DIAG CODE3 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE3" id="DIAG_CODE3" data-placeholder="Select DIAG CODE3" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option <?=  $row->DIAG_CODE ==  $voucher_line->DIAG_CODE3 ? 'selected' : ''; ?> value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input DIAG CODE3</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE4" class="col-sm-2 control-label">DIAG CODE4 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE4" id="DIAG_CODE4" data-placeholder="Select DIAG CODE4" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option <?=  $row->DIAG_CODE ==  $voucher_line->DIAG_CODE4 ? 'selected' : ''; ?> value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input DIAG CODE4</b> Max Length : 20.</small>
                            </div>
                        </div>

                                                 
                                                        
                                                <div class="form-group ">
                            <label for="TYPE" class="col-sm-2 control-label">TYPE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TYPE" id="TYPE" placeholder="TYPE" value="<?= set_value('TYPE', $voucher_line->TYPE); ?>">
                                <small class="info help-block">
                                <b>Input TYPE</b> Max Length : 10.</small>
                            </div>
                        </div>
                                                
                                                 
                                                <div class="form-group ">
                            <label for="CO_PAY" class="col-sm-2 control-label">CO PAY 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CO_PAY" id="CO_PAY" placeholder="CO PAY" value="<?= set_value('CO_PAY', $voucher_line->CO_PAY); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="EXTRA_MED_BOL" class="col-sm-2 control-label">EXTRA MED BOL 
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3  padding-left-0">
                                    <label>
                                    <input <?= in_array('1', explode(',', $voucher_line->EXTRA_MED_BOL)) ? 'checked' : ''; ?>  type="checkbox" class="flat-red" name="EXTRA_MED_BOL[]" value="1"> Extra Med.                                    </label>
                                    </div>
                                                                        <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                    </div>
                                    
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EXTRA_MED" class="col-sm-2 control-label">EXTRA MED 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="EXTRA_MED" id="EXTRA_MED" placeholder="EXTRA MED" value="<?= set_value('EXTRA_MED', $voucher_line->EXTRA_MED); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EXTRA_MED_REMARK" class="col-sm-2 control-label">EXTRA MED REMARK 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="EXTRA_MED_REMARK" name="EXTRA_MED_REMARK" rows="5" class="textarea"><?= set_value('EXTRA_MED_REMARK', $voucher_line->EXTRA_MED_REMARK); ?></textarea>
                                <small class="info help-block">
                                <b>Input EXTRA MED REMARK</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="LAB_XRAY_BOL" class="col-sm-2 control-label">LAB XRAY BOL 
                            </label>
                            <div class="col-sm-8">
                                    <div class="col-md-3  padding-left-0">
                                    <label>
                                    <input <?= in_array('1', explode(',', $voucher_line->LAB_XRAY_BOL)) ? 'checked' : ''; ?>  type="checkbox" class="flat-red" name="LAB_XRAY_BOL[]" value="1"> Lab/Xray                                    </label>
                                    </div>
                                                                        <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                    </div>
                                    
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAB_XRAY" class="col-sm-2 control-label">LAB XRAY 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAB_XRAY" id="LAB_XRAY" placeholder="LAB XRAY" value="<?= set_value('LAB_XRAY', $voucher_line->LAB_XRAY); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAB_XRAY_CODE" class="col-sm-2 control-label">LAB XRAY CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAB_XRAY_CODE" id="LAB_XRAY_CODE" placeholder="LAB XRAY CODE" value="<?= set_value('LAB_XRAY_CODE', $voucher_line->LAB_XRAY_CODE); ?>">
                                <small class="info help-block">
                                <b>Input LAB XRAY CODE</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL_BOL" class="col-sm-2 control-label">SURGICAL BOL 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SURGICAL_BOL" id="SURGICAL_BOL" placeholder="SURGICAL BOL" value="<?= set_value('SURGICAL_BOL', $voucher_line->SURGICAL_BOL); ?>">
                                <small class="info help-block">
                                <b>Input SURGICAL BOL</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL" class="col-sm-2 control-label">SURGICAL 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SURGICAL" id="SURGICAL" placeholder="SURGICAL" value="<?= set_value('SURGICAL', $voucher_line->SURGICAL); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL_CODE" class="col-sm-2 control-label">SURGICAL CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SURGICAL_CODE" id="SURGICAL_CODE" placeholder="SURGICAL CODE" value="<?= set_value('SURGICAL_CODE', $voucher_line->SURGICAL_CODE); ?>">
                                <small class="info help-block">
                                <b>Input SURGICAL CODE</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="APPROVAL_CODE" class="col-sm-2 control-label">APPROVAL CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="APPROVAL_CODE" id="APPROVAL_CODE" placeholder="APPROVAL CODE" value="<?= set_value('APPROVAL_CODE', $voucher_line->APPROVAL_CODE); ?>">
                                <small class="info help-block">
                                <b>Input APPROVAL CODE</b> Max Length : 80.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE_AMT" class="col-sm-2 control-label">FEE AMT 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="FEE_AMT" id="FEE_AMT" placeholder="FEE AMT" value="<?= set_value('FEE_AMT', $voucher_line->FEE_AMT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OS_AMT" class="col-sm-2 control-label">OS AMT 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OS_AMT" id="OS_AMT" placeholder="OS AMT" value="<?= set_value('OS_AMT', $voucher_line->OS_AMT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAY_AMT" class="col-sm-2 control-label">PAY AMT 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAY_AMT" id="PAY_AMT" placeholder="PAY AMT" value="<?= set_value('PAY_AMT', $voucher_line->PAY_AMT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DR_CODE_DE" class="col-sm-2 control-label">DR CODE DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_CODE_DE" id="DR_CODE_DE" placeholder="DR CODE DE" value="<?= set_value('DR_CODE_DE', $voucher_line->DR_CODE_DE); ?>">
                                <small class="info help-block">
                                <b>Input DR CODE DE</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE_AMT_DE" class="col-sm-2 control-label">FEE AMT DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="FEE_AMT_DE" id="FEE_AMT_DE" placeholder="FEE AMT DE" value="<?= set_value('FEE_AMT_DE', $voucher_line->FEE_AMT_DE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAY_AMT_DE" class="col-sm-2 control-label">PAY AMT DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAY_AMT_DE" id="PAY_AMT_DE" placeholder="PAY AMT DE" value="<?= set_value('PAY_AMT_DE', $voucher_line->PAY_AMT_DE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="STATUS" class="col-sm-2 control-label">STATUS 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATUS" id="STATUS" placeholder="STATUS" value="<?= set_value('STATUS', $voucher_line->STATUS); ?>">
                                <small class="info help-block">
                                <b>Input STATUS</b> Max Length : 10.</small>
                            </div>
                        </div>
                                            
                                                  
                                                <div class="form-group ">
                            <label for="ENTRY_TIME_DE" class="col-sm-2 control-label">ENTRY TIME DE 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datetimepicker" name="ENTRY_TIME_DE"  placeholder="ENTRY TIME DE" id="ENTRY_TIME_DE" value="<?= set_value('ENTRY_TIME_DE', $voucher_line->ENTRY_TIME_DE); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAST_MODIFIER_VE" class="col-sm-2 control-label">LAST MODIFIER VE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER_VE" id="LAST_MODIFIER_VE" placeholder="LAST MODIFIER VE" value="<?= set_value('LAST_MODIFIER_VE', $voucher_line->LAST_MODIFIER_VE); ?>">
                                <small class="info help-block">
                                <b>Input LAST MODIFIER VE</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAST_MODIFIER_DE" class="col-sm-2 control-label">LAST MODIFIER DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER_DE" id="LAST_MODIFIER_DE" placeholder="LAST MODIFIER DE" value="<?= set_value('LAST_MODIFIER_DE', $voucher_line->LAST_MODIFIER_DE); ?>">
                                <small class="info help-block">
                                <b>Input LAST MODIFIER DE</b> Max Length : 20.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAST_MODIFIER" class="col-sm-2 control-label">LAST MODIFIER 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER" id="LAST_MODIFIER" placeholder="LAST MODIFIER" value="<?= set_value('LAST_MODIFIER', $voucher_line->LAST_MODIFIER); ?>">
                                <small class="info help-block">
                                <b>Input LAST MODIFIER</b> Max Length : 20.</small>
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