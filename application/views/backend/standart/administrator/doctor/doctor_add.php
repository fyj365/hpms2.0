
   <link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
   <script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>

  <?php $this->load->view('core_template/fine_upload'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor  <small>New Doctor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
        <li class="active">New</li>
    </ol>
</section> 
<style type="text/css">
   label{
      max-width: none;
   }
   label input{
      width: 20px;
   }
   #card .table-responsive{
      min-height: 600px;
   }
   #card .table-responsive tbody{
      min-height: 600px;
   }
   #card  .card_select{
      width: 100px;
   }
   #Doctor_ID {
      margin-bottom: 8px;
   }
   h3{ 
      margin-left: 20px; 
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
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">

                    <div class="form-group " id="Doctor_ID">
                        <label class="col-sm-9 control-label">  </label>
                      
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required DR_CODE" value="" readonly>
                        </div>
                     </div>

      					 <ul class="nav nav-tabs">
      					  <li class="nav-item active">
      						 <a class="nav-link" id="doctor_tab" data-toggle="tab">Doctor</a>
      					  </li>
      				       
      					  <li class="nav-item">
      						 <a class="nav-link" id="center_tab" data-toggle="tab" >Center</a>
      					  </li>
                      <li class="nav-item">
                   <a class="nav-link" id="consult_tab" data-toggle="tab" >Consultation</a>
                  </li>
                        <li class="nav-item">
                         <a class="nav-link" id="payment_tab" data-toggle="tab" >Payment</a>
                       </li>
      				
                        
  
                       <li class="nav-item">
                         <a class="nav-link" id="cert_tab" data-toggle="tab" > Certificate</a>
                       </li>

                       <li class="nav-item">
                          <a class="nav-link" id="login_tab" data-toggle="tab">Login</a>
                       </li>
                                   
                        <li class="nav-item">
                         <a class="nav-link" id="card_tab" data-toggle="tab" >Cards</a>
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
                   <div class="form-group " id="Doctor_ID">
                        <label for="DR_CODE" class="col-sm-9 control-label">
                        </label>
                        <div class="col-sm-3">
                           <input type="hidden" class="form-control cust-required DR_CODE" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE'); ?>" readonly>
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
                        Please input letters like: a-z, A-Z, 0-9,' ', '-', '_'
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
                              <input type="radio" class="flat-red" name="GENDER" value="M" checked> M  </label>
							           <small class="info help-block"> </small>
                           </div>
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="F" > F   </label>
							          <small class="info help-block"></small>
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
                    <div class="form-group">
                         <label for="JOIN_DATE" class="col-sm-2 control-label">Join Date </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE">
                        </div>

                             <label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
                        </label>
                        <div class="col-sm-3">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE" value="<?= set_value('MPS_EXPIRY_DATE'); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                    </div>
              
                     <div class="form-group ">
                        <label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
                        </label>
                        <div class="col-sm-3">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE" value="<?= set_value('APS_EXPIRY_DATE'); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>

                                   <label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
                        </label>
                        <div class="col-sm-3">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE" value="<?= set_value('BR_EXPIRY_DATE'); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <!--------- Specialty 1 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE1" class="col-sm-2 control-label">Specialty
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-1" name="SP_CODE1">
									<option value=""></option>
								   <?php 
								   
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-1 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 1)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-1">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-1"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 1 --------->
					 
					 
					 <!--------- Specialty 2 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE2" class="col-sm-2 control-label">
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-2" name="SP_CODE2">
									<option value=""></option>
								   <?php 
								   
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-2 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 2)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-2">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-2"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 2 --------->
					
					 
					 <!--------- Specialty 3 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE3" class="col-sm-2 control-label">
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-3" name="SP_CODE3">
									<option value=""></option>
								   <?php 
								   
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-3 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 3)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-3">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-3"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 3 --------->

					 
					 <!--------- Specialty 4 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE4" class="col-sm-2 control-label">
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-4" name="SP_CODE4">
									<option value=""></option>
								   <?php 
								   
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-4 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 4)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-4">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-4"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 4 --------->
					
					<small class="info help-block">　</small>
					                      <div class="form-group ">
                        <label for="MOBILE" class="col-sm-2 control-label">Mobile 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE'); ?>">
                     <small class="info help-block">
                           </small>
                        </div>
                  
                   <label for="MOBILE" class="col-sm-2 control-label">Pager 
                        </label>
                  <div class="col-sm-3">
                           <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER'); ?>">
                     <small class="info help-block">
                           </small>
                        </div>
                     </div>
                
                <div class="form-group ">
                  <label for="EMAIL" class="col-sm-2 control-label">Email 
                        </label>
                        <div class="col-sm-3">
                           <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL'); ?>">
                     <small class="info help-block">
                           </small>
                        </div>
                
                  <label for="LANG" class="col-sm-2 control-label">Special Language 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="LANG" id="LANG" placeholder='Except "English" and "Chinese"' value="<?= set_value('LANG'); ?>">
                            <small class="info help-block"> </small>
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
                        <label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
                        </label>
                        <div class="col-sm-9">
							<?php 
							
								$this->db->order_by("SHORT_NAME", "ASC");
								foreach (db_get_all_data('admission_right') as $row): 
							?>
							<div class="col-md-6  padding-left-0">
							<input type="checkbox" class="flat-red" name="ADMISSION_RIGHT[]" value="<?= $row->SHORT_NAME ?>"> 
							<?= $row->HOSPITAL_NAME; ?><?= " &nbsp; (".$row->SHORT_NAME.")"; ?>
							<small class="info help-block">
                           </small>
							</div>
							<?php endforeach; ?>  
						</div>
					</div>
					
					
					<small class="info help-block">　</small>


                     <div class="form-group ">
                        <label for="REMARK" class="col-sm-2 control-label">Remark 
                        </label>
                        <div class="col-sm-8">
                           <textarea id="REMARK" name="REMARK" rows="5" cols="80" ><?= set_value('REMARK'); ?></textarea>
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>

             </div>
				
			 


					  
				<div id="centerDiv">
                              <div id="center_code_div">
<!--                                     <h3>Center Detail:</h3>
 -->
                  <div class="form-group">

                        <label class="control-label col-sm-2" style="color:blue;">Please choose one: <i class="required">*</i></label>
                    
                      <label class="control-label col-sm-2">
                       <input type="radio"  name="HV_CENTER" value=0 >New Center
                     </label>

                        <label class="control-label col-sm-2">
                          <input type="radio"  name="HV_CENTER" value=1 checked>Existing Center
                        </label>
                     <div class="cust-exist-center col-sm-4">
                       <div class="cust-required-select">
                          <select class="form-control chosen chosen-select-deselect" data-placeholder="Select an Existing Center" name="CENTER_CODE_SELECT" id="CENTER_CODE_SELECT">
                            <option value=""</option>
                            <?php foreach (db_get_all_data('center') as $index=>$row): ?>
                            <option value="<?= $row->CENTER_CODE; ?>"><?= $row->E_NAME; ?></option>
                            <?php endforeach; ?>  
                          </select>
                        </div>
                     </div>
                </div>
               <hr>
            </div>
               <div class="form-group">
                  <label for="CENTER_ID" class="col-sm-2 control-label">ID</label>
               
                 <div class="col-sm-3">
                   <input type="tel" class="form-control reset-center-select cust-required" name="CENTER_ID" id="CENTER_ID" value="" readonly="true">
                   <small class="info help-block">
                   </small>
                 </div> 
                          
                   <label for="OPEN_AFTER_EIGHT" class="col-sm-4 control-label" style="width: 200px;">Open After 8:00pm</label>
                   <div class="col-sm-3" ">
                       <input type="checkbox" class="center-checkbox" id="OPEN_AFTER_EIGHT" name="OPEN_AFTER_EIGHT[]" value="1">
                   
                  </div>  
               </div>
               <div class="form-group ">
              <label for="TEL" class="col-sm-2 control-label">Tel <i class="required">*</i>  </label>
               
                 <div class="col-sm-3">
                   <input type="tel" class="form-control center-input reset-center-select cust-required" name="TEL" id="TEL" value="<?= set_value('TEL'); ?>" required placeholder="">
                   <small class="info help-block">
                     Tel must consist of 8 digits
                   </small>
                 </div> 
                 <label for="FAX" class="col-sm-2 control-label">Fax </label>
                  
                  <div class="col-sm-3">
                      <input type="text" class="form-control center-input reset-center-select" name="FAX" id="FAX" value="<?= set_value('FAX'); ?>">
                      <small class="info help-block">
                      </small>
                  </div>  



       
               </div>
                           <div class="form-group ">
   
                   <label for="CENTER_E_NAME" class="col-sm-2 control-label">Center English Name  <i class="required">*</i>  </label>
              
                 <div class="col-sm-3">
                   <input type="text" class="form-control center-input reset-center-select cust-required" name="CENTER_E_NAME" id="CENTER_E_NAME" value="<?= set_value('CENTER_E_NAME'); ?>">
                 
                   <small class="info help-block">
                     Center English Name 
                   </small>     
                  </div>
                 
                 <label for="CENTER_C_NAME" class="col-sm-2 control-label">Center Chinese Name
                 </label>
                 <div class="col-sm-3">
                   <input type="text" class="form-control center-input reset-center-select" name="CENTER_C_NAME" id="CENTER_C_NAME" value="<?= set_value('CENTER_C_NAME'); ?>">
                       <small class="info help-block">
                        Center Chinese Name 
                   </small>    
                 </div>       
               </div>
               
				   <div class="form-group ">
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">English Address 
					  </label>
					  
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select cust-required" name="E_ADDR1" id="E_ADDR1" value="<?= set_value('E_ADDR1'); ?>">
						<small class="info help-block">
                     Floor No. /Room No
						</small>
					  </div>
					  
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">Chinese Address
					  </label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR1" id="C_ADDR1" value="<?= set_value('C_ADDR1'); ?>">
						<small class="info help-block">
						</small>
					  </div>

				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR2" id="E_ADDR2"  value="<?= set_value('E_ADDR2'); ?>">
						<small class="info help-block">
                      Unit No/building Name
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR2" id="C_ADDR2"  value="<?= set_value('C_ADDR2'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  				
				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR3" id="E_ADDR3" value="<?= set_value('E_ADDR3'); ?>">
						<small class="info help-block">
                     Street No.
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR3" id="C_ADDR3"  value="<?= set_value('C_ADDR3'); ?>">
						<small class="info help-block">
						</small>
					  </div>
				   </div>
				   				   
				   <div class="form-group ">
					  <label class="col-sm-2 control-label">District<i class="required">*</i></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select cust-required" name="E_DISTRICT" id="E_DISTRICT"  value="<?= set_value('E_DISTRICT'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_DISTRICT" id="C_DISTRICT" value="<?= set_value('C_DISTRICT'); ?>">
						<small class="info help-block">
						</small>
					  </div>
				   </div>						   
            
            <div class="form-group">
               <label class="col-sm-2 control-label">AREA<i class="required">*</i></label>
               <div class="col-sm-3">
                       <label class="control-label">HK
                        <input type="radio" name="area" value="HK" >  
                  </label>
                  <label> KLN
                         <input type="radio" name="area" value="KLN" >
                  </label>
                 
                  <label> NT
                     <input type="radio" name="area" value="NT"> 
                  </label>
               </div>
             </div>
    				</div>
				              
            <div id="paymentDiv">

               <div class="form-group">
                  <label class="control-label col-sm-7">Center</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control center_id" value="" readonly="">
                  </div>
               </div>
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
                      <br><br><br>
                    </div>
                  </div>
               </div>
          </div>	


          <div id="consultDiv">

            <div class="form-group">
                  <label class="control-label col-sm-7">Center</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control center_id" value="" readonly="">
                  </div>
               </div>

                <div class="form-group">
                  <label for="CONTACT_PERSON" class="col-sm-2 control-label">Contact Person 
                  </label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="CONTACT_PERSON" id="CONTACT_PERSON" value="<?= set_value('CONTACT_PERSON'); ?>">
                    <small class="info help-block">
                    </small>
                  </div>
               </div>
               <!--  Schedule day 1-6   -->
              <?php for($i=1; $i<7; $i++){ ?>
               <div id="schedule_day-<?= $i; ?>" >
                <div class="form-group">
                  <div class="cust-d" id="cust-d<?=$i; ?>">
                     <label for="SCHEDULE_DAY_C<?=$i; ?>" class="col-sm-2 control-label">Schedule Day <?=$i; ?>   </label>
                     <div class="col-sm-2">
                       <select class="form-control cust-schedule-day-c<?=$i; ?>" name="SCHEDULE_DAY_C<?=$i; ?>" id="SCHEDULE_DAY_C<?=$i; ?>" >
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
                       <select class="form-control cust-schedule-day-e<?=$i; ?>" name="SCHEDULE_DAY_E<?=$i; ?>" id="SCHEDULE_DAY_E<?=$i; ?>" >
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
                   <input type="text" class="form-control" name="TIMESLOT<?=$i; ?>_1" id="TIMESLOT<?=$i; ?>_1" placeholder="Schedule Day  <?= $i ?> : Timeslot 1" value="<?= set_value('TIMESLOT<?=$i; ?>_1'); ?>">
                    <small class="info help-block">  </small>
                  
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-sm-6"></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="TIMESLOT<?=$i; ?>_2" id="TIMESLOT<?=$i; ?>_2" placeholder="Schedule Day  <?= $i ?> : Timeslot 2" value="<?= set_value('TIMESLOT<?=$i; ?>_2'); ?>">
                    <small class="info help-block">
                    </small>
                  </div>
               </div>
               <div class="form-group ">
                  <label class="col-sm-6"></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="TIMESLOT<?=$i; ?>_3" id="TIMESLOT<?=$i; ?>_3" placeholder="Schedule Day  <?= $i ?> : Timeslot 3" value="<?= set_value('TIMESLOT<?=$i; ?>_3'); ?>">
                    <small class="info help-block">
                    </small>
                  </div>
               </div>
             </div>
               <!--  End Schedule day 2-6   -->
              <?php } ?>

               <div class="form-group ">
                  <div id="addBtn" class="col-sm-2" style="float:right;margin-right:12%;">
                    <a  class="btn btn-primary" id="more-day" style="width: 120px;">More day</a>
                  </div>
               </div>
               <hr>
            
            </div>
 
            <div id="card">
                           <div class="form-group">
                  <label class="control-label col-sm-7">Center</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control center_id" value="" readonly="">
                  </div>
               </div>
                <hr>
                 <div class="table-responsive">  
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <td>Company ID</td>
                            <td style="width: 100px;">Card Type </td>
                            <td>Doctor Type</td>
                            <td>Company Doctor CODE </td>
                            <td>Location Code</td>
                            <td>Center District</td>
                            <td>Term Date</td>
                        </thead>
                        <tbody id="card_tbody">
                            <?php for ($i=0; $i <6; $i++) { ?>
                            <tr data-card_id = "<?= $i; ?>">
                              <td>
                                    <select type="text" name="COM_ID[]" class="company_select chosen chosen-select-deselect">
                                       <option value="">Select Company</option>
                                       <option value="0">Without Company</option>
                                       <?php foreach(db_get_all_data('company') as $row):?>
                                          <option value="<?php echo $row->COM_ID;?>"><?php echo $row->E_NAME; ?></option>
                                     <?php  endforeach; ?> 
                                  </select>
                              </td>
                               <td> 
                                   <select type="text" name="CARD_CODE[]" class="card_select">
                                    </select>
                               </td>
                               <td class="doctor_type-<?= $i; ?>"></td>
                               <td><input type="text"  name="COM_DR_CODE[]"></td>
                               <td><input type="text"  name="LOC_CODE[]"></td>
                               <td class="center_name"></td>
                               <td><input type="text" name="D_TERM_DATE[]" class="datepicker"></td>
                            </tr> 
                           <?php } ?>
                       </tbody>
                    </table>
<!--                     <button type="button" class="btn btn-danger rm_btn" id="rm_card_btn">Remove</button>
                    <button type="button" class="btn btn-primary add_btn" id="add_card_btn">Add</button> -->
                  </div>
            </div>
              <div id="certDiv">
 
                   <div class="form-group ">
                   <label for="QUALIFICATION" class="col-sm-2 control-label">Qualification   </label>
                
                   <div class="col-sm-5">
                    <input type="text" class="form-control" name="QUALIFICATION" id="QUALIFICATION" value="<?= set_value('QUALIFICATION'); ?>">
                    <small class="info help-block">
                    </small>
                   </div>
                  
                   <label for="CERT_YEAR" class="col-sm-1 control-label">Cert Year  </label>
                  
                   <div class="col-sm-2">
                    <input type="text" class="form-control" name="CERT_YEAR" id="CERT_YEAR" value="<?= set_value('CERT_YEAR'); ?>">
                    <small class="info help-block">
                    </small>
                   </div>

                </div>
                              
                <div class="form-group ">
                   <label for="CERT_COPY" class="col-sm-2 control-label">Cert Copy  </label>
                  
                   <div class="col-sm-8">
                    <div id="doctor_qualification_CERT_COPY_galery"></div>
                    <input class="data_file" name="doctor_qualification_CERT_COPY_uuid" id="doctor_qualification_CERT_COPY_uuid" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_uuid'); ?>">
                    <input class="data_file" name="doctor_qualification_CERT_COPY_name" id="doctor_qualification_CERT_COPY_name" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_name'); ?>">

                    <small class="info help-block"> <b>file format must be</b> JPG,JPEG, PNG,PDF.</small>
                   
                   </div>
                </div>
              </div>

              <div id="login">
                <div class="form-group ">
                        <label for="LOGIN_COM" class="col-sm-2 control-label">Insurance Company</label>
                 
                        <div class="col-sm-5">
                          <select  class="form-control chosen chosen-select-deselect" name="LOGIN_COM" id="LOGIN_COM" >
                            <option value=""></option>
                            <?php foreach (db_get_all_data('company') as $row): ?>
                            <option value="<?= $row->COM_ID ?>"><?= $row->E_NAME; ?></option>
                            <?php endforeach; ?> 
                          </select>
                          <small class="info help-block">
                            Please select an Insurance Company
                          </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="WEBSITE_ACCOUNT" class="col-sm-2 control-label">Website Account </label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="WEBSITE_ACCOUNT" id="WEBSITE_ACCOUNT" value="<?= set_value('WEBSITE_ACCOUNT'); ?>">
                          <small class="info help-block">
                           Please Input the account
                          </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="WEBSITE_PASSWORD" class="col-sm-2 control-label">Website Password </label>
                        <div class="col-sm-8">
                       <input type="text" class="form-control" name="WEBSITE_PASSWORD" id="WEBSITE_PASSWORD" value="<?= set_value('WEBSITE_PASSWORD'); ?>">
                          <small class="info help-block">　
                           Please Input the password
                          </small>
                        </div>
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
		
         // if(typeof(Worker)!='undefined'){
         //  alert('support Worker');
         // }else{
         //   alert('Worker not supported');
         // }

		$(".expand-medical").hide();



      // hide shecdule day 3-6 at begining
	   for (var i = 4; i < 7; i++) {
        $('#schedule_day-'+i).hide();
      }
            
		
		$("#more-day").click(function() {
			
			if ($("#more-day").text() == "More day"){
				$("#more-day").removeClass("btn-primary");
				$("#more-day").addClass("btn-danger");
				$("#more-day").text("Hide more day");
            
            for (var i = 4; i < 7; i++) {
              $('#schedule_day-'+i).slideDown();
            }
				
			}else{
				$("#more-day").removeClass("btn-danger");
				$("#more-day").addClass("btn-primary");
				$("#more-day").text("More day");
			   for (var i = 4; i < 7; i++) {
              $('#schedule_day-'+i).slideUp();
            }
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
      $(".center-input").attr('readonly', true);

      //GENERATE DOCTOR CODE BASED ON DOCTOR ENGLISH NAME 
      $('#E_NAME').on('blur',function(){
         $('.DR_CODE').val("");

         var d = new Date();
         var year  = d.getFullYear().toString().substr(-2);
         var mon = d.getMonth();
         var mon = parseInt(mon) + 1;
         if (mon < 10) {
            mon = "0" + mon;
         }else{
            mon = "" + mon;
         }
         var date = d.getDate();
         if (date < 10) {
            date = "0" + date;
         }else{
            date = "" + date;
         }
         var name = $(this).val().toLowerCase();
         var name =  name.replace(/\s/g,'');
         if (name!='') {

             $('.DR_CODE').val(name + '_' + date + mon + year);
         }
      });
    // INPUT CENTER 
		$('input[name="HV_CENTER"]').on("change",function(e){

          var hv_center = $(this).val();
        
         $('.center_id').val("");


			if (hv_center > 0){
				$(".cust-exist-center").fadeIn();
				$(".center-input").attr('readonly', true);
				$('.reset-center-select').val("");
				$("#OPEN_AFTER_EIGHT").prop("checked", false);

				$("#CENTER_CODE_SELECT")[0].selectedIndex = -1;
				$("#CENTER_CODE_SELECT").trigger("chosen:updated");
				
			}else{
				$(".cust-exist-center").fadeOut();
				$(".center-input").attr('readonly', false);
				$('.reset-center-select').val("");

				$("#OPEN_AFTER_EIGHT").prop("checked", false);
            $('input[name="area"]').prop("checked", false);

            $.ajax({
               url: BASE_URL + 'administrator/doctor/add_center',
               dataType:'JSON',
               method: 'GET',
               success: function(res){
                  var max_center = res.max_center;
                  var max_center_id = max_center.CENTER_CODE;
                  var new_id = parseInt(max_center_id)+1;
                  $('#CENTER_ID').val(new_id);
                  $('.center_id').val("ID:" + new_id);
               }

            })
			}
			
		});
		
				
		$('#CENTER_CODE_SELECT').on('change',function(){

			var center_selected = $(this).val();
      var center_selected_name = this.options[this.selectedIndex].text;

			$('.reset-center-select').val("");
			$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
			
			
			if (center_selected == ""){

				$('#CENTER_CODE_SELECT').prop("disabled", false).trigger("chosen:updated");
            $('.center_id').val("");
			}else{

           $('.center_id').val( center_selected_name +" (ID:" + center_selected +')' );
			
           $.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/find_center/',
					data:{'center_code': center_selected},
					dataType: "json",
					success: function(data) {

						var center = data['center'];		
            $('#CENTER_ID').val(center.CENTER_CODE);				
						$("#CENTER_E_NAME").val(center.E_NAME);
						$("#CENTER_C_NAME").val(center.C_NAME);
						$("#E_ADDR1").val(center.E_ADDR1);
						$("#E_ADDR2").val(center.E_ADDR2);
						$("#E_ADDR3").val(center.E_ADDR3);
						$("#E_DISTRICT").val(center.E_DISTRICT);
						$("#C_ADDR1").val(center.C_ADDR1);
						$("#C_ADDR2").val(center.C_ADDR2);
						$("#C_ADDR3").val(center.C_ADDR3);
            $("#C_DISTRICT").val(center.C_DISTRICT);
						$("#TEL").val(center.TEL);
						$("#FAX").val(center.FAX);
						
						if (center.OPEN_AFTER_EIGHT > 0){
							$("#OPEN_AFTER_EIGHT").prop("checked", true).iCheck('update');
						}else{
							$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
						}
                  $('input[name="area"]').each(function(){
                     if (this.value == center.AREA) {
                        $(this).prop('checked',true);
                        return;
                     }else{
                        $(this).prop('checked',false);
                     }
                  })
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				$('#CENTER_CODE_SELECT').prop("disabled", false).trigger("chosen:updated");
				
			}
			
		});

      var specialty = 0;
      var type_max = 3;
      var type_arr =[];

      //Limit Type less than 4
      $('input[name="TYPE[]"').on("ifChecked ifUnchecked",function(event){
         var checkboxes = $("input[name='TYPE[]'");//get all the checkbox
         var this_value = $(this).val();
         if (event.type =='ifChecked') {
             //  ADD DOCTOR CARD TYPE
            if (checkboxes.filter(":checked").length<= type_max && type_arr.indexOf(this_value) ==-1) {
                type_arr.push(this_value);
            }

           if (checkboxes.filter(":checked").length > type_max) { 
              alert("The max. of doctor's type is 3")
              checkboxes.not(":checked, input[name='TYPE[]'").iCheck('disable'); 
           } else {
             //else enable it all
             checkboxes.not(":checked").iCheck('enable'); 

          }

         }else if(event.type =="ifUnchecked"){
            var index = type_arr.indexOf(this_value);
            if (index != -1) {
               type_arr.splice(index, 1);
            }

         }

      });

       //LIMIT CARD TYPE ACCORDING TO COMPANY ID
      $('#card').on('change','.company_select', function(){
            var comoany_ID = $(this).val();
            var this_card_select = $(this).closest('tr').find('.card_select');
            $.ajax({
               TYPE:  'GET',
               url:   BASE_URL + '/administrator/doctor/find_company_card',
               dataType: 'JSON',
               data:  {'com_id': comoany_ID},
               success:  function(res){
                  var cards = res.cards;
                  var card_options = '';
                  for(var i = 0; i < cards.length; i++){
                     // console.log( cards[i].CARD_CODE);
                     card_options +='<option value="'+ cards[i].CARD_CODE+'">'+cards[i].CARD_CODE+'</option>';
                  }
                 
                  $(this_card_select).empty();

                  $(this_card_select).append(card_options);
               }
            });
            
      });    

      $('#card_tab').on('click',function(){
         var center_name = $('#E_DISTRICT').val();


         $('*[class^="doctor_type-"]').each(function(){
          var card_id = $(this).prop("class").split('-');
          var idx = card_id[1];          //console.log(card_id);  //result0, 1, 2, 3

          var type_html = '';
         if (type_arr.length > 0) {
               for(var i = 0; i< type_arr.length; i++){
                 type_html += '<label>'+type_arr[i]+'<input value="'+type_arr[i]+'" type="checkbox" name="DOCTOR_TYPE-'+idx+'[]"></label>' 
                }
            }else{
               type_html=''
            }
       
            $(this).empty();
            $(this).append(type_html);
         });

         $('.center_name').each(function(){
            $(this).empty();
            $(this).text(center_name);
         })

      });


     //CERT
      var params = {};
       params[csrf] = token;

      $('#doctor_qualification_CERT_COPY_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/doctor/upload_cert_copy',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/doctor/delete_cert_copy',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","pdf","jpeg"],
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
                  $.get(BASE_URL + '/administrator/doctor_qualification/delete_cert_copy/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#doctor_qualification_CERT_COPY_uuid').val('');
                  $('#doctor_qualification_CERT_COPY_name').val('');
                }
              }
          }
      }); /*end CERT_COPY galery*/
     // END CERT

		//Append Medical Procedures
		$('.sp-code-change').on('change',function(){
			var sp_code = $(this).val();
			var sp_num = 0;
			
			if ($(this).hasClass('sp-code-1')){
				sp_num = 1;
			}else if ($(this).hasClass('sp-code-2')){
				sp_num = 2;
			}else if ($(this).hasClass('sp-code-3')){
				sp_num = 3;
			}else{
				sp_num = 4;
			}
			
			var expand_medical = ".expand-medical-" + sp_num;
			var medical_list = ".medical-list-" + sp_num;
			
			$(this).prop('disabled', true).trigger("chosen:updated");
			$(expand_medical).slideUp();
		
			if (sp_code != ""){

				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/find_procedures/',
					data:{'sp_code': sp_code},
					dataType: "json",
					success: function(data) {
						
						$(medical_list).text("");
						
						if (data['has_medical_procedures']){
							$.each(data['medical_procedures'], function(index, val) {
							
								$(medical_list).append("<div class='col-md-6  padding-left-0'><input type='checkbox' class='flat-red' name='MEDICAL_PROCEDURES" + sp_num + "[]' value='" + 
								val.AUTO_NO + "'>" + val.CLINIC_PROCEDURE + "<small class='info help-block'>" + "</small></div>");
								
							});
							
						}else{
							$(medical_list).append("(No medical procedures)");
						}
						
						
						$('input[type="checkbox"].flat-red').iCheck({
							checkboxClass: 'icheckbox_flat-green',
							radioClass: 'iradio_flat-green'
						  });
						
						
						$(expand_medical).slideDown();
						$('.sp-code-change').prop('disabled', false).trigger("chosen:updated");
						

					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}else{
				$(expand_medical).slideUp();
				$('.sp-code-change').prop('disabled', false).trigger("chosen:updated");
			}
			
			
		});
		
		//Control medical-list toggleSlide
		$('.expand-medical-label').on('click',function(){
			var sp_num = 0;

			if ($(this).parent().hasClass('expand-medical-1')){
				sp_num = 1;
			}else if ($(this).parent().hasClass('expand-medical-2')){
				sp_num = 2;
			}else if ($(this).parent().hasClass('expand-medical-3')){
				sp_num = 3;
			}else{
				sp_num = 4;
			}
			
			var expand_list = ".expand-medical-list-" + sp_num;
			$(expand_list).slideToggle();
		});
		  

		
      // ADD MORE CARD

      // $('#add_card_btn').click(function(){
      //     var type_html = '';
         
      //    if (type_arr.length > 0) {
      //       for(var i = 0; i< type_arr.length; i++){
      //         type_html += '<label>'+type_arr[i]+'<input value="'+type_arr[i]+'" type="checkbox"></label>' 
      //        }

      //    }else{
      //       type_html='';
      //    }
    
      //    var card_html = '<tr> <td class="card_check"><input type="checkbox" name="check_card" class="flat-red check_card"></td> <td> <select type="text" name="CARD_CODE[]" class="card_select chosen chosen-select-deselect"> <option value="">Select card Code</option> <?php foreach(db_get_all_data('card') as $row):?> <option value="<?php echo $row->CARD_CODE;?>"><?php echo $row->CARD_CODE; ?></option> <?php  endforeach; ?> </td> <td class="doctor_type">'+   type_html + 
      //       '</td> <td><input type="text"  name="COM_DR_CODE[]"></td> <td><input type="text"  name="LOC_CODE[]"></td> <td ></td> <td><input type="text" name="D_TERM_DATE[]" class="datepicker"></td> </tr> ';
      //     $('#card_tbody').append(card_html);
      //     $('input[name="check_card"]').iCheck({
      //       checkboxClass: 'icheckbox_flat-green',
      //     });

      // });

      // var checkAll = $('#all_card');

      //  checkAll.on('ifChecked ifUnchecked', function(event) {  
      //    var checkboxes = $('input.check_card');
    
      //      if (event.type == 'ifChecked') {
      //          checkboxes.iCheck('check');
      //      } else {
      //          checkboxes.iCheck('uncheck');
      //      }
      //  });
       
      //  $('#rm_card_btn').click(function(){
      //    var checked_checkboxes = $('input.check_card:checked');
      //      $(checked_checkboxes).each(function(){
      //       $(this).closest('tr').remove();
      //      })
      //  })


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
    

     // SAVE 
      $('.btn_save').click(function(){

        $('.message').fadeOut();
        
          var myDctor_form =  document.getElementById('form_doctor');
          var form_doctor = new FormData(myDctor_form);

          for(var key of form_doctor.entries()){
             console.log(key[0] + ',' + key[1]);
         }
         // form_doctor.append('cert',file_data);
        // var form_doctor = $('#form_doctor');
        // var data_post = form_doctor.serializeArray();
         var save_type = $(this).attr('data-stype');
         form_doctor.append('save_type', save_type);
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/doctor/add_save',
          type: 'POST',
          dataType: 'json',
          data: form_doctor,
          cache: false,
          processData: false,
          contentType: false,
        })
        .done(function(res) {
          if(res.success) {

            if (save_type == 'stay') {
                $('.message').printMessage({message : res.message, type:'success'});
                $('.message').fadeIn();
                $(".expand-medical").hide();
                $("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
                $('.chosen option').prop('selected', false).trigger('chosen:updated');
            }
            else{
               $('.message').printMessage({message : res.message, type:'warning'});
            }
          }
          else{
             $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function(res) {
          $('.message').printMessage({message : res.message, type : 'error'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       var params = {};
       params[csrf] = token;

    jQuery(window).on("load", function(){
      $("#paymentDiv").hide();
      $("#centerDiv").hide();
      $("#consultDiv").hide();
      $('#card').hide();
      $('#certDiv').hide();
      $('#login').hide();
    });

     $('#doctor_tab').on('click',function(){
        $('#doctorDiv').fadeIn();
        $('#paymentDiv').hide();
        $('#centerDiv').hide();
        $('#consultDiv').hide();
           $('#card').hide();
           $('#certDiv').hide();
           $('#login').hide();
    });
     
    $('#payment_tab').on('click',function(){
           $('#paymentDiv').slideDown();
           $('#doctorDiv').hide();
           $('#centerDiv').hide();
           $('#consultDiv').hide();
           $('#card').hide();
            $('#certDiv').hide();
           $('#login').hide();
      });

     $('#center_tab').on('click',function(){
            $('#centerDiv').slideDown();
         $('#doctorDiv').hide();
         $('#paymentDiv').hide();
         $('#consultDiv').hide();
             $('#certDiv').hide();
            $('#card').hide();
              $('#login').hide();
    });
    
     $('#consult_tab').on('click',function(){
           $('#consultDiv').slideDown();
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#centerDiv').hide();
           $('#card').hide();
            $('#certDiv').hide();
            $('#login').hide();
        
    });
       $('#card_tab').on('click',function(){
           $('#card').slideDown();
           $('#paymentDiv').hide();
           $('#doctorDiv').hide();
           $('#centerDiv').hide();
           $('#consultDiv').hide();
            $('#certDiv').hide();
           $('#login').hide();
      });
     
      $('#cert_tab').on('click',function(){
            $('#certDiv').slideDown();
            $('#consultDiv').hide();
           $('#doctorDiv').hide();
           $('#paymentDiv').hide();
           $('#centerDiv').hide();
           $('#card').hide();
           $('#login').hide();
           
      });
       $('#login_tab').on('click',function(){
            $('#consultDiv').hide();
           $('#doctorDiv').hide();
           $('#paymentDiv').hide();
           $('#centerDiv').hide();
           $('#card').hide();
           $('#login').slideDown();
            $('#certDiv').hide();
           
      });

    }); /*end doc ready*/
</script>