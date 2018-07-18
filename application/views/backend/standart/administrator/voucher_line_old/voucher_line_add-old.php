
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
        Voucher Line        <small>New Voucher Line</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher Line</a></li>
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
                            <h3 class="widget-user-username">Voucher Line</h3>
                            <h5 class="widget-user-desc">New Voucher Line</h5>
							<ul class="nav nav-tabs">
                              <li id="generaltab" class="active"><a id="btn_general">General</a></li>
                              <li id="doctortab" class=""><a id="btn_doctor">Doctor Data</a></li>
                              <li id="membertab" class=""><a id="btn_member">Member Data</a></li>
							  <li id="statustab" class=""><a id="btn_status">Status</a></li>
							  <li id="diagtab" class=""><a id="btn_diag">Diagnosis</a></li>
							  <li id="bddtab" class=""><a id="btn_bdd">Benefit Data Detail</a></li>
							  <li id="feetab" class=""><a id="btn_fee">Fee</a></li>
							  <li id="paytab" class=""><a id="btn_pay">Pay</a></li>
							  <li id="invoicetab" class=""><a id="btn_invoice">Invoice</a></li>
                            </ul>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_voucher_line', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_voucher_line', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                            <h1>New voucher</h1>
                         <div id="generalDiv">
                                                <div class="form-group ">
                            <label for="BATCH_NO" class="col-sm-2 control-label">Batch No. 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BATCH_NO" id="BATCH_NO" value="<?= set_value('BATCH_NO'); ?>">
                            </div>
                        </div>

						
						<div class="form-group ">
                            <label for="BATCH_DATE" class="col-sm-2 control-label">Batch Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control" name="BATCH_DATE" value="<?php echo date("Y-m-d"); ?>" id="BATCH_DATE">
                            </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="COMPANY_CODE" class="col-sm-2 control-label">Company Code 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="COMPANY_CODE" id="COMPANY_CODE" data-placeholder="Select Company Code" >
                                    <option value=""></option>
                                    <?php 
									$query = $this->db->get('company');
									$query = $query->result();
									foreach ($query as $row): ?>
                                    <option value="<?= $row->COMPANY_CODE ?>"><?= $row->COMPANY_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="VOUCHER_NO" class="col-sm-2 control-label">Voucher No. 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="VOUCHER_NO" id="VOUCHER_NO" value="<?= set_value('VOUCHER_NO'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CLASS_CODE" class="col-sm-2 control-label">Class 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="CLASS_CODE" id="CLASS_CODE" data-placeholder="Select Class" >
                                    <option value=""></option>
                                    <?php 
									$this->db->group_by("CLASS_CODE");
									$query = $this->db->get('classification');
									$query = $query->result();
									foreach ($query as $row): ?>
                                    <option value="<?= $row->CLASS_CODE ?>"><?= $row->CLASS_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="TREATMENT_DATE" class="col-sm-2 control-label">Treatment Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control" name="TREATMENT_DATE" value="<?php echo date("Y-m-d"); ?>" id="TREATMENT_DATE">
                            </div>
                            </div>
                        </div>
						
						 <div class="form-group ">
                            <label for="SICK_LEAVE" class="col-sm-2 control-label">Sick Leave 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SICK_LEAVE" id="SICK_LEAVE" value="<?= set_value('SICK_LEAVE'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SL_FROM" class="col-sm-2 control-label">From 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="SL_FROM" id="SL_FROM">
                            </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SL_TO" class="col-sm-2 control-label">To 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="SL_TO" id="SL_TO">
                            </div>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="ENTRY_TIME" class="col-sm-2 control-label">Entry Time 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control" name="ENTRY_TIME"  id="ENTRY_TIME" value="<?= date("Y-m-d h:i:s"); ?>">
                            </div>
                            </div>
                        </div>

                                                <div class="form-group ">
                            <label for="LAST_MODIFIER" class="col-sm-2 control-label">Lasy Modifier 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER" id="LAST_MODIFIER" value="<?= set_value('LAST_MODIFIER'); ?>">
                            </div>
                        </div>
						</div>
                                                 
												 <div id="doctorDiv">
                                                <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="DR_CODE" id="DR_CODE" data-placeholder="Select Dr Code" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company_doctor') as $row): ?>
                                    <option value="<?= $row->DR_CODE ?>"><?= $row->DR_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="COMPANY_DR_CODE" class="col-sm-2 control-label">Comp's Dr Code 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="COMPANY_DR_CODE" id="COMPANY_DR_CODE" data-placeholder="Select Comp's Dr Code" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company_doctor') as $row): ?>
                                    <option value="<?= $row->COMPANY_DR_CODE ?>"><?= $row->COMPANY_DR_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="DR_E_NAME" class="col-sm-2 control-label">Dr Eng Name
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_E_NAME" id="DR_E_NAME" value="<?= set_value('DR_E_NAME'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DR_C_NAME" class="col-sm-2 control-label">Dr Chi Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_C_NAME" id="DR_C_NAME" value="<?= set_value('DR_C_NAME'); ?>">
                            </div>
                        </div>
						</div>
                                                 <div id="memberDiv">
                                                <div class="form-group ">
                            <label for="MEMBER_CODE" class="col-sm-2 control-label">Mem Code 
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="MEMBER_CODE" id="MEMBER_CODE" data-placeholder="Select Mem Code" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('member') as $row): ?>
                                    <option value="<?= $row->MEMBER_CODE ?>"><?= $row->MEMBER_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_CLASS" class="col-sm-2 control-label">Mem Class
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select-deselect" name="MEMBER_CLASS" id="MEMBER_CLASS" data-placeholder="Select Mem Class" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('member') as $row): ?>
                                    <option value="<?= $row->MEMBER_CLASS ?>"><?= $row->MEMBER_CLASS; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                            </div>
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_HKID" class="col-sm-2 control-label">HKID 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_HKID" id="MEMBER_HKID" value="<?= set_value('MEMBER_HKID'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_E_NAME" class="col-sm-2 control-label">Eng Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_E_NAME" id="MEMBER_E_NAME" value="<?= set_value('MEMBER_E_NAME'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_C_NAME" class="col-sm-2 control-label">Chi Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_C_NAME" id="MEMBER_C_NAME" value="<?= set_value('MEMBER_C_NAME'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MEMBER_STAFF_NO" class="col-sm-2 control-label">Staff No. 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MEMBER_STAFF_NO" id="MEMBER_STAFF_NO" value="<?= set_value('MEMBER_STAFF_NO'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPD_NAME" class="col-sm-2 control-label">Depd Name 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DEPD_NAME" id="DEPD_NAME" value="<?= set_value('DEPD_NAME'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPD_CODE" class="col-sm-2 control-label">Depd Code 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DEPD_CODE" id="DEPD_CODE" value="<?= set_value('DEPD_CODE'); ?>">
                            </div>
                        </div>
						</div>
                                                 <div id="statusDiv">
                                                <div class="form-group ">
                            <label for="POLICY_NO" class="col-sm-2 control-label">Policy No. 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POLICY_NO" id="POLICY_NO" value="<?= set_value('POLICY_NO'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="INSURED_NO" class="col-sm-2 control-label">Insured No. 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="INSURED_NO" id="INSURED_NO" value="<?= set_value('INSURED_NO'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="POLICY_YEAR" class="col-sm-2 control-label">Policy Year 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POLICY_YEAR" id="POLICY_YEAR" value="<?= set_value('POLICY_YEAR'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DP_TYPE" class="col-sm-2 control-label">DP Type 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DP_TYPE" id="DP_TYPE" value="<?= set_value('DP_TYPE'); ?>">
                            </div>
                        </div>
						</div>
                                                 <div id="diagDiv">
                                                <div class="form-group ">
                            <label for="DIAG_CODE1" class="col-sm-2 control-label">Diag Code & Description
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE1" id="DIAG_CODE1" data-placeholder="Diag Code 1" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
								</div>
								<div class="col-sm-4">
                                <input type="text" class="textarea" name="DIAG_DESC1" id="DIAG_DESC1" value="<?= set_value('DIAG_DESC1'); ?>">
								</div>
							</div>
							
							<div class="form-group ">
                            <label for="DIAG_CODE2" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE2" id="DIAG_CODE2" data-placeholder="Diag Code 2" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
								</div>
								<div class="col-sm-4">
                                <input type="text" class="textarea" name="DIAG_DESC2" id="DIAG_DESC2" value="<?= set_value('DIAG_DESC2'); ?>">
								</div>
							</div>
							
							<div class="form-group ">
                            <label for="DIAG_CODE3" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE3" id="DIAG_CODE3" data-placeholder="Diag Code 3" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
								</div>
								<div class="col-sm-4">
                                <input type="text" class="textarea" name="DIAG_DESC3" id="DIAG_DESC3" value="<?= set_value('DIAG_DESC3'); ?>">
								</div>
							</div>
							
							<div class="form-group ">
                            <label for="DIAG_CODE4" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="DIAG_CODE4" id="DIAG_CODE4" data-placeholder="Diag Code 4" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
								</div>
								<div class="col-sm-4">
                                <input type="text" class="textarea" name="DIAG_DESC4" id="DIAG_DESC4" value="<?= set_value('DIAG_DESC4'); ?>">
								</div>
							</div>
							</div>
						
                                                 
						
							 <div id="feeDiv">
								<?php for ($i=1; $i<=4; $i++){ ?>
								<div id="feeLine<?= $i; ?>"><input type="text" class="form-control" name="LINE_NO<?= $i; ?>" id="LINE_NO<?= $i; ?>" value="<?= $i; ?>"></div>
								 <div class="form-group ">
									 <label for="FEE_CODE<?= $i; ?>" class="col-sm-1 control-label text-left">Fee Code</label>
									 <div class="col-sm-2">
										<input type="text" class="form-control" name="FEE_CODE<?= $i; ?>" id="FEE_CODE<?= $i; ?>" value="<?= set_value('FEE_CODE'.$i); ?>">
									</div>
									 <label for="FEE<?= $i; ?>" class="col-sm-1 control-label text-left">Fee</label>
									 <div class="col-sm-2">
										<input type="text" class="form-control" name="FEE<?= $i; ?>" id="FEE<?= $i; ?>" value="<?= set_value('FEE'.$i); ?>">
									</div>
									 <label for="PAY_BY<?= $i; ?>" class="col-sm-1 control-label text-left">Pay By</label>
									 <div class="col-sm-3">
										<input type="text" class="form-control" name="PAY_BY<?= $i; ?>" id="PAY_BY<?= $i; ?>" value="<?= set_value('PAY_BY'.$i); ?>">
									</div>
								 </div>
								<?php } ?>

                                                <div class="form-group ">
                            <label for="FEE_AMT" class="col-sm-2 control-label">Total
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="FEE_AMT" id="FEE_AMT" value="<?= set_value('FEE_AMT'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OS_AMT" class="col-sm-2 control-label">OS Amt 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="OS_AMT" id="OS_AMT" value="<?= set_value('OS_AMT'); ?>">
                            </div>
                        </div>
						</div>
                                                 <div id="payDiv">
												 
												 <?php for ($i=1; $i<=5; $i++){ ?>
												 <div id="payLine<?= $i; ?>"><input type="text" class="form-control" name="PAY_LINE_NO<?= $i; ?>" id="PAY_LINE_NO<?= $i; ?>" value="<?= $i; ?>"></div>
												 <div class="form-group ">
													 <label for="PAY_CODE<?= $i; ?>" class="col-sm-1 control-label text-left">Pay Code </label>
													 <div class="col-sm-2">
														<input type="text" class="form-control" name="PAY_CODE<?= $i; ?>" id="PAY_CODE<?= $i; ?>" value="<?= set_value('PAY_CODE'.$i); ?>">
													</div>
													 <label for="PAY<?= $i; ?>" class="col-sm-1 control-label text-left">Pay</label>
													 <div class="col-sm-2">
														<input type="text" class="form-control" name="PAY<?= $i; ?>" id="PAY<?= $i; ?>" value="<?= set_value('PAY'.$i); ?>">
													</div>
													 <label for="PAY_TO<?= $i; ?>" class="col-sm-1 control-label text-left">Pay To</label>
													 <div class="col-sm-3">
														<input type="text" class="form-control" name="PAY_TO<?= $i; ?>" id="PAY_TO<?= $i; ?>" value="<?= set_value('PAY_TO'.$i); ?>">
													</div>
												 </div>
												<?php } ?>
												 
                                                <div class="form-group ">
                            <label for="PAY_AMT" class="col-sm-2 control-label">Pay Amt 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAY_AMT" id="PAY_AMT" value="<?= set_value('PAY_AMT'); ?>">
                            </div>
                        </div>
						</div>
						
						<div id="invoiceDiv">
						<div class="form-group ">
                            <label for="INVOICE_NO" class="col-sm-2 control-label">Invoice No. 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="INVOICE_NO" id="INVOICE_NO" value="<?= set_value('INVOICE_NO'); ?>">
                            </div>
                        </div>
						<div class="form-group ">
                            <label for="INVOICE_DATE" class="col-sm-2 control-label">Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="INVOICE_DATE"  placeholder="INVOICE DATE" id="INVOICE_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="INVOICE_AMT" class="col-sm-2 control-label">Total Amt 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="INVOICE_AMT" id="INVOICE_AMT" placeholder="INVOICE AMT" value="<?= set_value('INVOICE_AMT'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
						</div>
						
						<div id="backendDiv">
						<div class="form-group ">
                            <label for="DR_CODE_DE" class="col-sm-2 control-label">DR CODE DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_CODE_DE" id="DR_CODE_DE" value="<?= set_value('DR_CODE'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE_AMT_DE" class="col-sm-2 control-label">FEE AMT DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="FEE_AMT_DE" id="FEE_AMT_DE" value="<?= set_value('FEE_AMT'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAY_AMT_DE" class="col-sm-2 control-label">PAY AMT DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PAY_AMT_DE" id="PAY_AMT_DE" value="<?= set_value('PAY_AMT'); ?>">
                            </div>
                        </div>
						
                                                <div class="form-group ">
                            <label for="STATUS" class="col-sm-2 control-label">STATUS 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATUS" id="STATUS" value="<?= set_value('STATUS'); ?>">
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="ENTRY_TIME_MILLISECOND" class="col-sm-2 control-label">ENTRY TIME MILLISECOND 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ENTRY_TIME_MILLISECOND" id="ENTRY_TIME_MILLISECOND" value="<?= set_value('ENTRY_TIME_MILLISECOND'); ?>">
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="ENTRY_TIME_DE" class="col-sm-2 control-label">ENTRY TIME DE 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datetimepicker" name="ENTRY_TIME_DE"  id="ENTRY_TIME_DE">
                            </div>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="LAST_MODIFIER_VE" class="col-sm-2 control-label">LAST MODIFIER VE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER_VE" id="LAST_MODIFIER_VE" value="<?= set_value('LAST_MODIFIER_VE'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LAST_MODIFIER_DE" class="col-sm-2 control-label">LAST MODIFIER DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LAST_MODIFIER_DE" id="LAST_MODIFIER_DE" value="<?= set_value('LAST_MODIFIER_DE'); ?>">
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
<!-- Page script -->
<script>
	console.log("JAN 4 02");


    $(document).ready(function(){
		//general tab
	  $('#btn_general').click(function(){
		  $('#generalDiv').show();
		  $('#generaltab').addClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	    
		//doctor tab
	  $('#btn_doctor').click(function(){
		  $('#doctorDiv').show();
		  $('#doctortab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //member tab
	  $('#btn_member').click(function(){
		  $('#memberDiv').show();
		  $('#membertab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //status tab
	  $('#btn_status').click(function(){
		  $('#statusDiv').show();
		  $('#statustab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //diag tab
	   $('#btn_diag').click(function(){
		  $('#diagDiv').show();
		  $('#diagtab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //bdd tab
	   $('#btn_bdd').click(function(){
		  $('#bddDiv').show();
		  $('#bddtab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //fee tab
	   $('#btn_fee').click(function(){
		  $('#feeDiv').show();
		  $('#feetab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //pay tab
	   $('#btn_pay').click(function(){
		  $('#payDiv').show();
		  $('#paytab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#invoiceDiv').hide();
		  $('#invoicetab').removeClass('active');
	  });
	  
	  //invoice tab
	   $('#btn_invoice').click(function(){
		  $('#invoiceDiv').show();
		  $('#invoicetab').addClass('active');
		  $('#generalDiv').hide();
		  $('#generaltab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
		  $('#memberDiv').hide();
		  $('#membertab').removeClass('active');
		  $('#statusDiv').hide();
		  $('#statustab').removeClass('active');
		  $('#diagDiv').hide();
		  $('#diagtab').removeClass('active');
		  $('#bddDiv').hide();
		  $('#bddtab').removeClass('active');
		  $('#feeDiv').hide();
		  $('#feetab').removeClass('active');
		  $('#payDiv').hide();
		  $('#paytab').removeClass('active');
	  });
	  
	  jQuery(window).on("load", function(){
		$('#doctorDiv').hide();
		$('#memberDiv').hide();
		$('#statusDiv').hide();
		$('#diagDiv').hide();
		$('#bddDiv').hide();
		$('#feeDiv').hide();
		$('#payDiv').hide();
		$('#invoiceDiv').hide();
		
		
		for (var i=1; i<=5; i++){
			$('#payLine'+i).hide();
			if (i<=4){
				$('#feeLine'+i).hide();
			}
		}

		$('#backendDiv').hide();
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
          url: BASE_URL + '/administrator/voucher_line/add_save',
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