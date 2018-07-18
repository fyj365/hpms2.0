<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor        <small>New Doctor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
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
                     <h3 class="widget-user-username">Doctor</h3>
                     <h5 class="widget-user-desc">New Doctor</h5>
					 <ul class="nav nav-tabs">
					  <li class="nav-item active">
						 <a class="nav-link" id="doctor_tab" data-toggle="tab">Doctor</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="payment_tab" data-toggle="tab" >Payment</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="consult_tab" data-toggle="tab">Consultation</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="quali_tab" data-toggle="tab">Qualification</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="partner_tab" data-toggle="tab">Partner</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="website_tab" data-toggle="tab">Website Login</a>
					  </li>
				   </ul>
                     
                  </div>
                  <?= form_open('', [
                     'name'    => 'form_doctor', 
                     'class'   => 'form-horizontal', 
                     'id'      => 'form_doctor', 
                     'enctype' => 'multipart/form-data', 
                     'method'  => 'POST'
                     ]); ?>
                  <div id="doctorDiv">
                     <h1>Doctor Info.</h1>
					 
                     <div class="form-group ">
                        <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE'); ?>">
						   <small class="info help-block">
						   </small>
                        </div>
						
						<label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE">
							<small class="info help-block">
							</small>
						</div>
                     </div>
					 
                     <div class="form-group ">
                        <label for="E_NAME" class="col-sm-2 control-label">English Name 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-2">
                           <select  class="form-control cust-required" name="E_TITLE[]" id="E_TITLE" >
                              <option value="Dr" id="et0">Dr</option>
                              <option value="Mr" id="et1">Mr</option>
                              <option value="Mrs" id="et2">Mrs</option>
                              <option value="Ms" id="et3">Ms</option>
                              <option value="Miss" id="et4">Miss</option>
                           </select>
						   <small class="info help-block">
						   </small>
                        </div>

                        <div class="col-sm-6">
                           <input type="text" class="form-control cust-required" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME'); ?>">
							<small class="info help-block">
							</small>
						</div>
                     </div>
					 
                     <div class="form-group ">
                        <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
                        </label>
                        <div class="col-sm-2">
                           <select  class="form-control" name="C_TITLE[]" id="C_TITLE" >
                              <option value="醫生" id="ct0">醫生</option>
                              <option value="先生" id="ct1">先生</option>
                              <option value="太太" id="ct2">太太</option>
                              <option value="女士" id="ct3">女士</option>
                              <option value="小姐" id="ct4">小姐</option>
                           </select>
						   <small class="info help-block">
						   </small>
                        </div>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME'); ?>">
							<small class="info help-block">
							</small>
						</div>
                     </div>

                     <div class="form-group  wrapper-options-crud">
                        <label for="GENDER" class="col-sm-2 control-label">Gender 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="M" checked> M                                    </label>
							  <small class="info help-block">
							  </small>
                           </div>
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="F" > F                                    </label>
							  <small class="info help-block">
							  </small>
                           </div>
						   
                        </div>
                     </div>

                     <div class="form-group  wrapper-options-crud">
                        <label for="TYPE" class="col-sm-2 control-label">Type
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                           <?php foreach (db_get_all_data('doctor_type_desc') as $index=>$row): ?>
                           <div class="col-md-3  padding-left-0">
                              <label>
                              <input type="checkbox" class="flat-red" name="TYPE[]" value="<?= $row->DT_CODE ?>"> <?= $row->DT_CODE; ?>
                              </label>
                           </div>
                           <?php endforeach; ?>    
							<small class="info help-block">
							</small>
						</div>
                     </div>
                     <div class="form-group ">
                        <label for="MOBILE" class="col-sm-2 control-label">Mobile 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
						
						<label for="EMAIL" class="col-sm-2 control-label">Email 
                        </label>
                        <div class="col-sm-3">
                           <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
                    
                     <div class="form-group">
                        <label for="DOB" class="col-sm-2 control-label">DOB
                        </label>
                        <div class="col-sm-3">
                           <input type="text" name="DOB" id="DOB" class="form-control datepicker pull-right " >
                           <small class="info help-block">
                           </small>
                        </div>
						
						<label for="HKID" class="col-sm-2 control-label">HKID 
                        </label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID'); ?>">
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					  <div class="form-group ">
						<label for="LANG" class="col-sm-2 control-label">Special Language 
                        </label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="LANG" id="LANG" placeholder='Input another language except "English" and "Chinese"' value="<?= set_value('LANG'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
                        </label>
                        <div class="col-sm-4">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
						<div class="col-sm-3">
							<input type="file" name="MPS_EXPIRY_DATE_COPY" id="MPS_EXPIRY_DATE_COPY">
							<small class="info help-block">
                           </small>
						</div>
                     </div>
                     <div class="form-group ">
                        <label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
                        </label>
                        <div class="col-sm-4">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
						<div class="col-sm-3">
							<input type="file" name="APS_EXPIRY_DATE_COPY" id="APS_EXPIRY_DATE_COPY">
							<small class="info help-block">
                           </small>
						</div>
                     </div>
                     <div class="form-group ">
                        <label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
                        </label>
                        <div class="col-sm-4">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
						
						<div class="col-sm-3">
							<input type="file" name="BR_EXPIRY_DATE_COPY" id="BR_EXPIRY_DATE_COPY">
							<small class="info help-block">
                           </small>
						</div>
                     </div>
                     <div class="form-group ">
                        <label for="GP_REG_NO" class="col-sm-2 control-label">GP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO'); ?>" >
							<small class="info help-block">
                           </small>
						</div>
						
						<label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO'); ?>" >
							<small class="info help-block">
                           </small>
						</div>
                     </div>
                     <div class="form-group ">
                        
                     </div>
                     <div class="form-group ">
                        <label for="SP_CODE1" class="col-sm-2 control-label">Specialty
                        </label>
                        <div class="col-sm-8">
							<select class="form-control chosen chosen-select-deselect" name="SP_CODE1">
								<option value=""></option>
							   <?php 
							   
							   $this->db->group_by("E_DESC", "ASC");
							   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
							   
							   ?>
							   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

							   <?php endforeach; ?>  
						   </select>		   
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <div class="form-group ">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-8">
							<select class="form-control chosen chosen-select-deselect" name="SP_CODE2">
								<option value=""></option>
							   <?php 
							   
							   $this->db->group_by("E_DESC", "ASC");
							   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
							   
							   ?>
							   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

							   <?php endforeach; ?>  
						   </select>		   
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <div class="form-group ">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-8">
							<select class="form-control chosen chosen-select-deselect" name="SP_CODE3">
								<option value=""></option>
							   <?php 
							   
							   $this->db->group_by("E_DESC", "ASC");
							   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
							   
							   ?>
							   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

							   <?php endforeach; ?>  
						   </select>		   
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <div class="form-group ">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-8">
							<select class="form-control chosen chosen-select-deselect" name="SP_CODE4">
								<option value=""></option>
							   <?php 
							   
							   $this->db->group_by("E_DESC", "ASC");
							   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
							   
							   ?>
							   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

							   <?php endforeach; ?>  
						   </select>		   
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
                     <div class="form-group ">
                        <label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
                        </label>
                        <div class="col-sm-9">
							<?php 
							
								$this->db->group_by("SHORT_NAME", "ASC");
								foreach (db_get_all_data('admission_right') as $row): 
							?>
							<div class="col-md-6  padding-left-0">
							<label>
							<input type="checkbox" class="flat-red" name="ADMISSION_RIGHT[]" value="<?= $row->SHORT_NAME ?>"> 
							<?= $row->HOSPITAL_NAME; ?><?= " &nbsp; (".$row->SHORT_NAME.")"; ?>
							</label>
							<small class="info help-block">
                           </small>
							</div>
							<?php endforeach; ?>  
						</div>
					</div>
					
                     <div class="form-group ">
                        <label for="MEDICAL_PROCEDURE" class="col-sm-2 control-label">Medical Procedure 
                        </label>
                        <div class="col-sm-8">
                           <textarea id="MEDICAL_PROCEDURE" name="MEDICAL_PROCEDURE" rows="5" cols="80"><?= set_value('MEDICAL PROCEDURE'); ?></textarea>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="REMARK" class="col-sm-2 control-label">Remark 
                        </label>
                        <div class="col-sm-8">
                           <textarea id="REMARK" name="REMARK" rows="5" cols="80"><?= set_value('REMARK'); ?></textarea>
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>

                  </div>
				  
				  <div id="paymentDiv">
					<h1>Doctor Payment</h1>
					
					<div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Cheque
                        </label>
                     </div>
					 
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
					
					<div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Auto Pay
                        </label>
                     </div>
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
				  </div>
				  
				  <div id="consultDiv">

                           <h1>Consultation hour</h1>
						   <div class="form-group ">
								
							   
							   <label for="CENTER_CODE" class="col-sm-2 control-label">Center Code
								<i class="required">*</i>							   
							   </label>
							   
								<div class="col-sm-3 cust-required-select">
							  
								  <select class="form-control chosen chosen-select-deselect " name="CENTER_CODE">
									 <option value=""</option>
									 <?php foreach (db_get_all_data('center') as $index=>$row): ?>
									 <option value="<?= $row->CENTER_CODE; ?>"><?= $row->CENTER_CODE; ?></option>
									 <?php endforeach; ?>  
								  </select>
								  <small class="info help-block">
								  </small>
								</div>

								  
								<label for="CONTACT_PERSON" class="col-sm-2 control-label">Contact Person 
								</label>	
							   <div class="col-sm-3">
								  <input type="text" class="form-control" name="CONTACT_PERSON" id="CONTACT_PERSON" value="<?= set_value('CONTACT_PERSON'); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
						</div>
						
						<div class="form-group ">
						   
						</div>

						<hr>
						<!--	Schedule day 1	-->
						<div class="form-group">
							<div class="cust-d" id="cust-d1">
							   <label for="SCHEDULE_DAY_C1" class="col-sm-2 control-label">Opening hours1
							   <i class="required">*</i>
							   </label>
							   <div class="col-sm-2">
								  <select class="form-control cust-schedule-day-c1 cust-required" name="SCHEDULE_DAY_C1[]" id="SCHEDULE_DAY_C1" >
									 <option value=""></option>
									 <option value="星期一至五">星期一至五</option>
									 <option value="星期六、日" >星期六、日</option>
									 <option value="星期一">星期一</option>
									 <option value="星期二">星期二</option>
									 <option value="星期三">星期三</option>
									 <option value="星期四">星期四</option>
									 <option value="星期五">星期五</option>
									 <option value="星期六">星期六</option>
									 <option value="星期日">星期日</option>
									 <option value="公眾假期">公眾假期</option>
									 <option value="其他">其他 (於Timeslot欄列明)</option>
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
							   <div class="col-sm-2">
								  <select class="form-control cust-schedule-day-e1 cust-required" name="SCHEDULE_DAY_E1[]" id="SCHEDULE_DAY_E1" >
									 <option value=""></option>
									 <option value="Mon to Fri">Mon to Fri</option>
									 <option value="Sat and Sun">Sat and Sun</option>
									 <option value="Monday">Monday</option>
									 <option value="Tuesday">Tuesday</option>
									 <option value="Wednesday">Wednesday</option>
									 <option value="Thursday">Thursday</option>
									 <option value="Friday">Friday</option>
									 <option value="Saturday">Saturday</option>
									 <option value="Sunday">Sunday</option>
									 <option value="Public holiday">Public holiday</option>
									 <option value="Other">Other (Specify on Timeslot)</option>
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							
						   <div class="col-sm-4">
							  <input type="text" class="form-control cust-required" name="TIMESLOT1_1" id="TIMESLOT1_1" placeholder="Opening hours 1 : Timeslot 1" value="<?= set_value('TIMESLOT1_1'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group">
						   <label class="col-sm-6"></label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT1_2" id="TIMESLOT1_2" placeholder="Opening hours 1 : Timeslot 2" value="<?= set_value('TIMESLOT1_2'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label class="col-sm-6"></label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT1_3" id="TIMESLOT1_3" placeholder="Opening hours 1 : Timeslot 3" value="<?= set_value('TIMESLOT1_3'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<!--	End Schedule day 1	-->
						<br><br>
						<!--	Schedule day 2	-->
						<div class="form-group">
							<div class="cust-d" id="cust-d2">
							   <label for="SCHEDULE_DAY_C2" class="col-sm-2 control-label">Opening hours2
							   </label>
							   <div class="col-sm-2">
								  <select class="form-control cust-schedule-day-c2" name="SCHEDULE_DAY_C2[]" id="SCHEDULE_DAY_C2" >
									 <option value=""></option>
									 <option value="星期一至五">星期一至五</option>
									 <option value="星期六、日" >星期六、日</option>
									 <option value="星期一">星期一</option>
									 <option value="星期二">星期二</option>
									 <option value="星期三">星期三</option>
									 <option value="星期四">星期四</option>
									 <option value="星期五">星期五</option>
									 <option value="星期六">星期六</option>
									 <option value="星期日">星期日</option>
									 <option value="公眾假期">公眾假期</option>
									 <option value="其他">其他 (於Timeslot欄列明)</option>
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
							   <div class="col-sm-2">
								  <select class="form-control cust-schedule-day-e2" name="SCHEDULE_DAY_E2[]" id="SCHEDULE_DAY_E2" >
									 <option value=""></option>
									 <option value="Mon to Fri">Mon to Fri</option>
									 <option value="Sat and Sun">Sat and Sun</option>
									 <option value="Monday">Monday</option>
									 <option value="Tuesday">Tuesday</option>
									 <option value="Wednesday">Wednesday</option>
									 <option value="Thursday">Thursday</option>
									 <option value="Friday">Friday</option>
									 <option value="Saturday">Saturday</option>
									 <option value="Sunday">Sunday</option>
									 <option value="Public holiday">Public holiday</option>
									 <option value="Other">Other (Specify on Timeslot)</option>
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
						   </div>
						   
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT2_1" id="TIMESLOT2_1" placeholder="Opening hours 2 : Timeslot 1" value="<?= set_value('TIMESLOT2_1'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label class="col-sm-6"></label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT2_2" id="TIMESLOT2_2" placeholder="Opening hours 2 : Timeslot 2" value="<?= set_value('TIMESLOT2_2'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label class="col-sm-6"></label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT2_3" id="TIMESLOT2_3" placeholder="Opening hours 2 : Timeslot 3" value="<?= set_value('TIMESLOT2_3'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<!--	End Schedule day 2	-->
						<br><br>
						<!--	Schedule day 3	-->
						<div class="form-group">
							<div class="cust-d" id="cust-d3">
							   <label for="SCHEDULE_DAY_C3" class="col-sm-2 control-label">Opening hours3
							   </label>
							   <div class="col-sm-2">
								  <select class="form-control cust-schedule-day-c3" name="SCHEDULE_DAY_C3[]" id="SCHEDULE_DAY_C3" >
									 <option value=""></option>
									 <option value="星期一至五">星期一至五</option>
									 <option value="星期六、日" >星期六、日</option>
									 <option value="星期一">星期一</option>
									 <option value="星期二">星期二</option>
									 <option value="星期三">星期三</option>
									 <option value="星期四">星期四</option>
									 <option value="星期五">星期五</option>
									 <option value="星期六">星期六</option>
									 <option value="星期日">星期日</option>
									 <option value="公眾假期">公眾假期</option>
									 <option value="其他">其他 (於Timeslot欄列明)</option>
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
							   <div class="col-sm-2">
								  <select class="form-control cust-schedule-day-e3" name="SCHEDULE_DAY_E3[]" id="SCHEDULE_DAY_E3" >
									 <option value=""></option>
									 <option value="Mon to Fri">Mon to Fri</option>
									 <option value="Sat and Sun">Sat and Sun</option>
									 <option value="Monday">Monday</option>
									 <option value="Tuesday">Tuesday</option>
									 <option value="Wednesday">Wednesday</option>
									 <option value="Thursday">Thursday</option>
									 <option value="Friday">Friday</option>
									 <option value="Saturday">Saturday</option>
									 <option value="Sunday">Sunday</option>
									 <option value="Public holiday">Public holiday</option>
									 <option value="Other">Other (Specify on Timeslot)</option>
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT3_1" id="TIMESLOT3_1" placeholder="Opening hours 3 : Timeslot 1" value="<?= set_value('TIMESLOT3_1'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label class="col-sm-6"></label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT3_2" id="TIMESLOT3_2" placeholder="Opening hours 3 : Timeslot 2" value="<?= set_value('TIMESLOT3_2'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label class="col-sm-6"></label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="TIMESLOT3_3" id="TIMESLOT3_3" placeholder="Opening hours 3 : Timeslot 3" value="<?= set_value('TIMESLOT3_3'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<!--	End Schedule day 3	-->
						
						<br>
						
						<div class="form-group ">
						   <label class="col-sm-8"></label>
						   <div id="addBtn" class="col-sm-2" style="float:right;margin-right:15%;">
							  <a  class="btn btn-primary" id="more-day" style="width: 120px;">More day</a>
							  <small class="info help-block">　</small>
						   </div>
						</div>
						
						<br>
						
						<div class="form-group more-schedule">
						   <!--	Schedule day 4	-->
						   <div class="form-group">
							<div class="cust-d" id="cust-d4">
								  <label for="SCHEDULE_DAY_C4" class="col-sm-2 control-label">Opening hours4
								  </label>
								  <div class="col-sm-2">
									 <select class="form-control cust-schedule-day-c4" name="SCHEDULE_DAY_C4[]" id="SCHEDULE_DAY_C4" >
										<option value=""></option>
										<option value="星期一至五">星期一至五</option>
										<option value="星期六、日" >星期六、日</option>
										<option value="星期一">星期一</option>
										<option value="星期二">星期二</option>
										<option value="星期三">星期三</option>
										<option value="星期四">星期四</option>
										<option value="星期五">星期五</option>
										<option value="星期六">星期六</option>
										<option value="星期日">星期日</option>
										<option value="公眾假期">公眾假期</option>
										<option value="其他">其他 (於Timeslot欄列明)</option>
									 </select>
									 <small class="info help-block">
									 </small>
								  </div>
								  <div class="col-sm-2">
									 <select class="form-control cust-schedule-day-e4" name="SCHEDULE_DAY_E4[]" id="SCHEDULE_DAY_E4" >
										<option value=""></option>
										<option value="Mon to Fri">Mon to Fri</option>
										<option value="Sat and Sun">Sat and Sun</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
										<option value="Public holiday">Public holiday</option>
										<option value="Other">Other (Specify on Timeslot)</option>
									 </select>
									 <small class="info help-block">
									 </small>
								  </div>
								</div>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT4_1" id="TIMESLOT4_1" placeholder="Opening hours 4 : Timeslot 1" value="<?= set_value('TIMESLOT4_1'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <div class="form-group ">
							  <label class="col-sm-6"></label>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT4_2" id="TIMESLOT4_2" placeholder="Opening hours 4 : Timeslot 2" value="<?= set_value('TIMESLOT4_2'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <div class="form-group ">
							  <label class="col-sm-6"></label>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT4_3" id="TIMESLOT4_3" placeholder="Opening hours 4 : Timeslot 3" value="<?= set_value('TIMESLOT4_3'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <!--	End Schedule day 4	-->
						   
						   <br><br>
						   
						   <!--	Schedule day 5	-->
						   <div class="form-group">
								<div class="cust-d" id="cust-d5">
									  <label for="SCHEDULE_DAY_C5" class="col-sm-2 control-label">Opening hours5
									  </label>
									  <div class="col-sm-2">
										 <select class="form-control cust-schedule-day-c5" name="SCHEDULE_DAY_C5[]" id="SCHEDULE_DAY_C5" >
											<option value=""></option>
											<option value="星期一至五">星期一至五</option>
											<option value="星期六、日" >星期六、日</option>
											<option value="星期一">星期一</option>
											<option value="星期二">星期二</option>
											<option value="星期三">星期三</option>
											<option value="星期四">星期四</option>
											<option value="星期五">星期五</option>
											<option value="星期六">星期六</option>
											<option value="星期日">星期日</option>
											<option value="公眾假期">公眾假期</option>
											<option value="其他">其他 (於Timeslot欄列明)</option>
										 </select>
										 <small class="info help-block">
										 </small>
									  </div>
									  <div class="col-sm-2">
										 <select class="form-control cust-schedule-day-e5" name="SCHEDULE_DAY_E5[]" id="SCHEDULE_DAY_E5" >
											<option value=""></option>
											<option value="Mon to Fri">Mon to Fri</option>
											<option value="Sat and Sun">Sat and Sun</option>
											<option value="Monday">Monday</option>
											<option value="Tuesday">Tuesday</option>
											<option value="Wednesday">Wednesday</option>
											<option value="Thursday">Thursday</option>
											<option value="Friday">Friday</option>
											<option value="Saturday">Saturday</option>
											<option value="Sunday">Sunday</option>
											<option value="Public holiday">Public holiday</option>
											<option value="Other">Other (Specify on Timeslot)</option>
										 </select>
										 <small class="info help-block">
										 </small>
									  </div>
								</div>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT5_1" id="TIMESLOT5_1" placeholder="Opening hours 5 : Timeslot 1" value="<?= set_value('TIMESLOT5_1'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
							</div>
								
							   <div class="form-group ">
								  <label class="col-sm-6"></label>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT5_2" id="TIMESLOT5_2" placeholder="Opening hours 5 : Timeslot 2" value="<?= set_value('TIMESLOT5_2'); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
							   </div>

						   <div class="form-group ">
							  <label class="col-sm-6"></label>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT5_3" id="TIMESLOT5_3" placeholder="Opening hours 5 : Timeslot 3" value="<?= set_value('TIMESLOT5_3'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <!--	End Schedule day 5	-->
						   
						   <br><br>
						   
						   <!--	Schedule day 6	-->
						   <div class="form-group">
							<div class="cust-d" id="cust-d6">
								  <label for="SCHEDULE_DAY_C6" class="col-sm-2 control-label">Opening hours6
								  </label>
								  <div class="col-sm-2">
									 <select class="form-control cust-schedule-day-c6" name="SCHEDULE_DAY_C6[]" id="SCHEDULE_DAY_C6" >
										<option value=""></option>
										<option value="星期一至五">星期一至五</option>
										<option value="星期六、日" >星期六、日</option>
										<option value="星期一">星期一</option>
										<option value="星期二">星期二</option>
										<option value="星期三">星期三</option>
										<option value="星期四">星期四</option>
										<option value="星期五">星期五</option>
										<option value="星期六">星期六</option>
										<option value="星期日">星期日</option>
										<option value="公眾假期">公眾假期</option>
										<option value="其他">其他 (於Timeslot欄列明)</option>
									 </select>
									 <small class="info help-block">
									 </small>
								  </div>
								  <div class="col-sm-2">
									 <select class="form-control cust-schedule-day-e6" name="SCHEDULE_DAY_E6[]" id="SCHEDULE_DAY_E6" >
										<option value=""></option>
										<option value="Mon to Fri">Mon to Fri</option>
										<option value="Sat and Sun">Sat and Sun</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
										<option value="Public holiday">Public holiday</option>
										<option value="Other">Other (Specify on Timeslot)</option>
									 </select>
									 <small class="info help-block">
									 </small>
								  </div>
								</div>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT6_1" id="TIMESLOT6_1" placeholder="Opening hours 6 : Timeslot 1" value="<?= set_value('TIMESLOT6_1'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <div class="form-group ">
							  <label class="col-sm-6"></label>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT6_2" id="TIMESLOT6_2" placeholder="Opening hours 6 : Timeslot 2" value="<?= set_value('TIMESLOT6_2'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <div class="form-group ">
							  <label class="col-sm-6"></label>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT6_3" id="TIMESLOT6_3" placeholder="Opening hours 6 : Timeslot 3" value="<?= set_value('TIMESLOT6_3'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   <!--	End Schedule day 6	-->
						</div>
						<!-- End More Schedule day -->
				  </div>
				  <!-- End Consultation Div -->
				  
				  <div id="qualiDiv">
					<h1>Doctor Qualification</h1>
					
					<div class="quali_box">
						<div class="form-group">
						
						   <label for="QUALIFICATION" class="col-sm-2 control-label"> Qualification 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="QUALIFICATION" id="QUALIFICATION" value="<?= set_value('QUALIFICATION'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="CERT_YEAR" class="col-sm-2 control-label">Cert Year 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="CERT_YEAR" id="CERT_YEAR" value="<?= set_value('CERT_YEAR'); ?>">
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="CERT_COPY" class="col-sm-2 control-label">Cert Copy 
						   </label>
						   <div class="col-sm-8">
							  <div id="doctor_qualification_CERT_COPY_galery"></div>
							  <input class="data_file" name="doctor_qualification_CERT_COPY_uuid" id="doctor_qualification_CERT_COPY_uuid" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_uuid'); ?>">
							  <input class="data_file" name="doctor_qualification_CERT_COPY_name" id="doctor_qualification_CERT_COPY_name" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_name'); ?>">
							  <small class="info help-block">
							  <b>Extension file must</b> JPG,PNG,PDF.</small>
							  <button type="button" class="btn btn-danger rm_btn">Remove</button>
						   </div>
						</div>
					</div>
					
					
                    <button type="button" class="btn btn-primary add_btn" id="add_quali_btn">Add</button>
					
				  </div>
				  <!-- End Qualification Div -->
				  
				  <div id="partnerDiv">
				  
					<h1>Doctor Business Partner</h1>
					
					<div class="col-md-12">
					   <div class="form-group col-sm-6">
						  <label for="CARD_CODE" class="col-sm-4 control-label">PARTNER CODE 
						  </label>
						  <div class="col-sm-8">
							 <select name="CARD_CODE" class="form-control chosen chosen-select-deselect changeContractNo1" id="CARD_CODE">
								<option value="">Select Partner Code</option>
								<?php if ($CARD_CODEs_total >0) {
								   foreach ($CARD_CODEs as $CARD_CODE) {; ?>
								<option value="<?php echo $CARD_CODE->CARD_CODE; ?>"><?php echo $CARD_CODE->CARD_CODE;?></option>
								<?php }}else{ echo 'No partner code available'; }  ?>
							 </select>
						  </div>
					   </div>
					</div>
					<div class="col-sm-12">
					   <div class="form-group col-sm-4">
						  <label for="PARTNER_DR_CONTRACT_NO" class="col-sm-6 control-label">Add New Doctor Contract No. 
						  </label>
						  <div class="col-sm-5">
							 <input type="text" class="form-control" name="PARTNER_DR_CONTRACT_NO" id="PARTNER_DR_CONTRACT_NO" placeholder="" readonly>
						  </div>
					   </div>
					   <div class="col-md-7 hint1">The first time to add the Doctor to this company</div>
					   <div class="col-md-7 hint2">THIS IS Not THE FIRST TIME TO ADD THE DOCTOR TO THIS PARTNER</div>
					</div>
					<div class="col-sm-12">
					   <div class="form-group col-sm-6">
						  <label for="START_DATE" class="col-sm-4 control-label">START DATE 
						  </label>
						  <div class="col-sm-6">
							 <div class="input-group date col-sm-8">
								<input type="text" class="form-control pull-right datepicker" name="START_DATE"  id="START_DATE">
							 </div>
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group col-sm-6">
						  <label for="TERM_DATE" class="col-sm-4 control-label">TERM DATE 
						  </label>
						  <div class="col-sm-6">
							 <div class="input-group date col-sm-8">
								<input type="text" class="form-control pull-right datepicker" name="TERM_DATE"  id="TERM_DATE">
							 </div>
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					</div>
					<div class="col-sm-12">
					   <div class="form-group col-sm-6">
						  <label for="PARTNER_DR_CODE" class="col-sm-4 control-label">PARTNER DR CODE 
						  </label>
						  <div class="col-sm-8">
							 <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group col-sm-6">
						  <label for="LOC_CODE" class="col-sm-4 control-label">LOC CODE 
						  </label>
						  <div class="col-sm-8">
							 <input type="text" class="form-control" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					</div>
				  </div>
				  <!-- End Doctor Contract Div -->
				  
				  <!-- Website Login Div -->
				  <div id="websiteDiv">
					<div class="form-group ">
					   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code							
					   </label>
					   <div class="col-sm-8">
						  <select  class="form-control chosen chosen-select-deselect" name="CARD_CODE" id="CARD_CODE">
							 <option value=""></option>
							 <?php foreach (db_get_all_data('card') as $row): ?>
							 <option value="<?= $row->CARD_CODE ?>"><?= $row->CARD_CODE; ?></option>
							 <?php endforeach; ?> 
						  </select>
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="WEBSITE_ACCOUNT" class="col-sm-2 control-label">Website Account 
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="WEBSITE_ACCOUNT" id="WEBSITE_ACCOUNT" value="<?= set_value('WEBSITE_ACCOUNT'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="WEBSITE_PASSWORD" class="col-sm-2 control-label">Website Password 
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="WEBSITE_PASSWORD" id="WEBSITE_PASSWORD" value="<?= set_value('WEBSITE_PASSWORD'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
				  </div>
				  <!-- End Website Login Div -->

                 
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
			$("#paymentDiv").hide();
			$("#consultDiv").hide();
			$("#qualiDiv").hide();
			$("#partnerDiv").hide();
			$("#websiteDiv").hide();
			
			$(".more-schedule").hide();
			
		});
		
		/* ------------------------- Qualification ------------------------- */
		/*$('#add_quali_btn').on('click',function(){
                htmlText_Doctor ='<tr><td class="quali-checkbox"><input type="checkbox" name="" value=""></td><td><select type="text" name="DR_CODE[]"><option value="">Select Doctor Code</option><option value=""></option></select></td><td><input type="text" name="PARTNER_DR_CODE[]" value=""></td><td>1</td><td><input type="text" class="datepicker" id="start_date-idx" name="Doctor_START_DATE[]"></td><td><input type="text" class="datepicker" id="end_date-idx" name="Doctor_TERM_DATE[]" ></td><td><input type="text" name="LOC_CODE[]" value=""></td></tr>';
                 idx++;

                 htmlText_Doctor = htmlText_Doctor.replace(/idx/g, idx);
                
                $('#doctor_tbody').append(htmlText_Doctor);
            
         });*/


         $('#rm_quali_btn').on('click',function(){
                $('.quali-checkbox input:checked').closest('tr').remove();
         });
		 
		 /* ------------------------- End Qualification ------------------------- */
		
		
		
		/* ------------------------- Consultation ------------------------- */
		$("#more-day").click(function() {
			
			if ($("#more-day").text() == "More day"){
				$("#more-day").removeClass("btn-primary");
				$("#more-day").addClass("btn-danger");
				$("#more-day").text("Hide more day");
				
				$(".more-schedule").slideDown("slow");
				
			}else{
				$("#more-day").removeClass("btn-danger");
				$("#more-day").addClass("btn-primary");
				$("#more-day").text("More day");
				
				$(".more-schedule").slideUp("slow");
			}
			
		});
		
		//Auto change schedule-day
		$(".cust-d").change(function(e) {
			var schedule_day = $(this).attr("id");
			schedule_day = schedule_day.substr(schedule_day.length - 1);

			var is_chi = $(e.target).hasClass("cust-schedule-day-c" + schedule_day);
			var index = $(e.target)[0].selectedIndex;

			if (is_chi){
				$(".cust-schedule-day-e" + schedule_day)[0].selectedIndex = index;
			}else{
				$(".cust-schedule-day-c" + schedule_day)[0].selectedIndex = index;
			}
			
		});
		/* ------------------------- End Consultation ------------------------- */
		
		
		/* ------------------------- Doctor Contract ------------------------- */
		$("#START_DATE").datetimepicker({
		  format: "Y-m-d",
		  onShow: function(ct) {
			this.setOptions({
			  maxDate: jQuery("#TERM_DATE").val() ? jQuery("#TERM_DATE").val() : false
			});
		  },
		  timepicker: false
		});
		$("#TERM_DATE").datetimepicker({
		  format: "Y-m-d",
		  onShow: function(ct) {
			this.setOptions({
			  minDate: jQuery("#START_DATE").val() ? jQuery("#START_DATE").val() : false
			});
		  },
		  timepicker: false
		});
		$(".changeContractNo1, .changeContractNo2").on("change", function() {
		  var CARD_CODE = $("#CARD_CODE").val();
		  var doctor_code = $("#doctor_code").val();
		  if (CARD_CODE != "" && doctor_code != "") {
			$.ajax({
			  url: BASE_URL + "administrator/partner_doctor_contract/add_doctor_No/",
			  method: "GET",
			  dataType: "JSON",
			  data: { CARD_CODE: CARD_CODE, doctor_code: doctor_code },
			  success: function(res) {
				console.log(res.status);
				console.log(res.doctor_contract_No);
				if (res.doctor_contract_No == 1) {
				  $(".hint1").show();
				  $(".hint2").hide();
				} else {
				  $(".hint1").hide();
				  $(".hint2").show();
				  // $('.hint2').text(res.last_contract_status);
				  $(".hint2").text(
					"The latest contract is: " +
					  res.last_contract_status +
					  ". Start date: " +
					  res.last_contract_start +
					  ", Terminate date: " +
					  res.last_contract_end +
					  "."
				  );
				}
				$("#PARTNER_DR_CONTRACT_NO").attr("value", res.doctor_contract_No);
				$("#PARTNER_DR_CONTRACT_NO").attr(
				  "placeholder",
				  res.doctor_contract_No
				);
			  }
			});
		  } else {
			$("#PARTNER_DR_CONTRACT_NO").attr("placeholder", "");
		  }
		});
		
		/* ------------------------- End Doctor Contract ------------------------- */

		

	   $('#doctor_tab').on('click',function(){
			  $('#doctorDiv').show();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#partnerDiv').hide();
			  $('#websiteDiv').hide();
		});
	   
	   $('#payment_tab').on('click',function(){
			  $('#paymentDiv').show();
			  $('#doctorDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#partnerDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		$('#consult_tab').on('click',function(){
			  $('#consultDiv').show();
			  $('#doctorDiv').hide();
			  $('#paymentDiv').hide();
			  $('#qualiDiv').hide();
			  $('#partnerDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		
		$('#quali_tab').on('click',function(){
			  $('#qualiDiv').show();
			  $('#doctorDiv').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#partnerDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		$('#partner_tab').on('click',function(){
			  $('#partnerDiv').show();
			  $('#doctorDiv').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		$('#website_tab').on('click',function(){
			  $('#websiteDiv').show();
			  $('#doctorDiv').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#partnerDiv').hide();
		});
		
		var specialty = 0;
		var type_max = 3;
		
		//Limit Type less than 4
		$("input[name='TYPE[]'").on("ifChecked",function(){
			var checkboxes = $("input[name='TYPE[]'");//get all the checkbox
			
			if (checkboxes.filter(":checked").length > type_max) { 
				alert("The max. of doctor's type is 3")
				checkboxes.not(":checked, input[name='TYPE[]'").iCheck('disable'); 
			} else {
				 //else enable it all
				 checkboxes.not(":checked").iCheck('enable'); 
			}
		});

		//Auto change Chi Title
		$("#E_TITLE").change(function() {
			var index = $("#E_TITLE")[0].selectedIndex;
			$("#ct" + index).prop('selected','selected');
			
			if ($(this).val() == "Mr" || $(this).val() == "Dr"){
				$("input[name='GENDER'][value='F']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='M']").prop("checked", true).iCheck('update');

			}else{
				$("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='F']").prop("checked", true).iCheck('update');

			}
			
		});
		
		
		//Auto change Eng Title
		$("#C_TITLE").change(function() {
			var index = $("#C_TITLE")[0].selectedIndex;
			$("#et" + index).prop('selected','selected');
			
			if ($(this).val() == "醫生" || $(this).val() == "先生"){
				$("input[name='GENDER'][value='F']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='M']").prop("checked", true).iCheck('update');

			}else{
				$("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='F']").prop("checked", true).iCheck('update');

			}
			
		});

		
		//Default Join Date as current date
		var d = new Date();
		var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
		$('#JOIN_DATE').val(strDate);

		
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
              window.location.href = BASE_URL + 'administrator/doctor';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor = $('#form_doctor');
        var data_post = form_doctor.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/doctor/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id_CERT_COPY = $('#doctor_qualification_CERT_COPY_galery').find('li').attr('qq-file-id');
			
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
			$("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
			if (typeof id_CERT_COPY !== 'undefined') {
                    $('#doctor_qualification_CERT_COPY_galery').fineUploader('deleteFile', id_CERT_COPY);
                }
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
      
       var params = {};
       params[csrf] = token;

       $('#doctor_qualification_CERT_COPY_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/doctor_qualification/upload_CERT_COPY_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/doctor_qualification/delete_CERT_COPY_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","pdf"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#doctor_qualification_CERT_COPY_galery').fineUploader('getUuid', id);
                   $('#doctor_qualification_CERT_COPY_uuid').val(uuid);
                   $('#doctor_qualification_CERT_COPY_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#doctor_qualification_CERT_COPY_uuid').val();
                  $.get(BASE_URL + '/administrator/doctor_qualification/delete_CERT_COPY_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#doctor_qualification_CERT_COPY_uuid').val('');
                  $('#doctor_qualification_CERT_COPY_name').val('');
                }
              }
          }
      }); /*end CERT_COPY galery*/
 
       
    
    
    }); /*end doc ready*/
</script>