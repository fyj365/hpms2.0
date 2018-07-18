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
        Doctor        <small>Edit Doctor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<style type="text/css">
 
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
                        <div class="row">
                            <div class="col-sm-9 "><p></p></div>
                            <div class="col-sm-3">
                            <input type="text" class="form-control"  id="DR_CODE" value="<?= set_value('DR_CODE', $doctor->DR_CODE); ?>" readonly>
                            </div>
                        </div>              
                          
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                               <a class="nav-link" id="doctor_tab" data-toggle="tab">Doctor</a>
                            </li>
                           <li class="nav-item">
                               <a class="nav-link" id="center_tab" data-toggle="tab">Center</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" id="consult_tab" data-toggle="tab">Consultation</a>
                            </li>
                                 <li class="nav-item">
                               <a class="nav-link" id="payment_tab" data-toggle="tab" >Payment</a>
                            </li>
                                
                            <li class="nav-item">
                               <a class="nav-link" id="quali_tab" data-toggle="tab">Qualification</a>
                            </li>
                      
                            <li class="nav-item">
                               <a class="nav-link" id="website_tab" data-toggle="tab">Website Login</a>
                            </li>

                                  <li class="nav-item">
                               <a class="nav-link" id="spfee_tab" data-toggle="tab">Doctor Agreed Fee</a>
                            </li>
                             <li class="nav-item">
                               <a class="nav-link" id="cards_tab" data-toggle="tab">Cards</a>
                            </li>
                         </ul>
             
                    </div>
                  <?= form_open(base_url('administrator/doctor/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_doctor', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor', 
                            'method'  => 'POST'
                            ]); ?>
                         
                            <div id="doctorDiv">
                                               <!--  <iframe idth="500" height="500" href="<?php echo base_url('administrator/doctor/')?>"></iframe>-->
                     <div class="form-group ">
                        <div class="col-sm-8">
                           <input type="hidden" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor->DR_CODE); ?>" readonly>
						            </div>
                     </div>
					 

					 
                     <div class="form-group ">
                        <label for="E_NAME" class="col-sm-2 control-label">English Name 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-2 ">
            							<select  class="form-control cust-required" name="E_TITLE[]" id="E_TITLE" >
            								<option <?= $doctor->E_TITLE == "Dr" ? 'selected' :''; ?> value="Dr" id="et1">Dr</option>
            								<option <?= $doctor->E_TITLE == "Mr" ? 'selected' :''; ?> value="Mr" id="et1">Mr</option>
            								<option <?= $doctor->E_TITLE == "Mrs" ? 'selected' :''; ?> value="Mrs" id="et2">Mrs</option>
            								<option <?= $doctor->E_TITLE == "Ms" ? 'selected' :''; ?> value="Ms" id="et3">Ms</option>
            								<option <?= $doctor->E_TITLE == "Miss" ? 'selected' :''; ?> value="Miss" id="et4">Miss</option>
            							</select>
                        </div>

                      <div class="col-sm-6">
                           <input type="text" class="form-control" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME', $doctor->E_NAME); ?>" style="background-color:#f9f906;">
						        	<small class="info help-block">　</small>
						        </div>
                     </div>
					 
                     <div class="form-group ">
                        <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
                        </label>
                        <div class="col-sm-2">
          							<select  class="form-control" name="C_TITLE[]" id="C_TITLE" >
          								<option <?= $doctor->C_TITLE == "醫生" ? 'selected' :''; ?> value="醫生" id="ct1">醫生</option>
          								<option <?= $doctor->C_TITLE == "先生" ? 'selected' :''; ?> value="先生" id="ct2">先生</option>
          								<option <?= $doctor->C_TITLE == "太太" ? 'selected' :''; ?> value="太太" id="ct2">太太</option>
          								<option <?= $doctor->C_TITLE == "女士" ? 'selected' :''; ?> value="女士" id="ct3">女士</option>
          								<option <?= $doctor->C_TITLE == "小姐" ? 'selected' :''; ?> value="小姐" id="ct4">小姐</option>
          							</select>
						              <small class="info help-block">　</small>
                        </div>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME', $doctor->C_NAME); ?>">
						                    	<small class="info help-block">　</small>
						              </div>
                     </div>

                     <div class="form-group  wrapper-options-crud">
                        <label for="GENDER" class="col-sm-2 control-label">Gender 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="M" <?= $doctor->GENDER == "M" ? "checked" : ""; ?>> M                                    </label>
							  <small class="info help-block">　</small>
                           </div>
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="F" <?= $doctor->GENDER == "F" ? "checked" : ""; ?>> F                                    </label>
							  <small class="info help-block">　</small>
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
                                    <input 
									<?=  in_array($row->DT_CODE, explode(',', $doctor->TYPE1)) ? 'checked' : ''; ?>
									<?=  in_array($row->DT_CODE, explode(',', $doctor->TYPE2)) ? 'checked' : ''; ?> 
									<?=  in_array($row->DT_CODE, explode(',', $doctor->TYPE3)) ? 'checked' : ''; ?> 
									
									type="checkbox" class="flat-red" name="TYPE[]"  
									value="<?= $row->DT_CODE ?>"> <?= $row->DT_CODE; ?>
                              </label>
                           </div>
                           <?php endforeach; ?>    
							<small class="info help-block">　</small>
						</div>
                     </div>
                                      <div class="form-group ">
                              <label for="JOIN_DATE" class="col-sm-2 control-label">Join Date  </label>
                      
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE" value="<?= set_value('JOIN_DATE', ($doctor->JOIN_DATE == "0000-00-00" ? "" : $doctor->JOIN_DATE)); ?>">
                             </div>
            
                               <label for="JOIN_DATE" class="col-sm-2 control-label">Term Date   </label>
                     
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE', ($doctor->TERM_DATE == "0000-00-00" ? "" : $doctor->TERM_DATE)); ?>">
                            </div>
                  </div>
                  <br>
                     <div class="form-group ">
                        <label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
                        </label>
                        <div class="col-sm-3">
                           <div class=date">
                              <input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE" value="<?= set_value('MPS_EXPIRY_DATE', ($doctor->MPS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->MPS_EXPIRY_DATE)); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                          <label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
                        </label>
                        <div class="col-sm-3">
                           <div class=" date">
                              <input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE" value="<?= set_value('APS_EXPIRY_DATE', ($doctor->APS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->APS_EXPIRY_DATE)); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>

                     </div>
                <br>
                     <div class="form-group ">
                        <label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
                        </label>
                        <div class="col-sm-3">
                           <div class="date">
                              <input type="text" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE" value="<?= set_value('BR_EXPIRY_DATE', ($doctor->BR_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->BR_EXPIRY_DATE)); ?>">
                           </div>
          
                        </div>
                     </div>
                     <br>
                     <div class="form-group ">
                        <label for="GP_REG_NO" class="col-sm-2 control-label">GP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO', $doctor->GP_REG_NO); ?>" style="background-color:#f9f906;">
              <small class="info help-block">
                           </small>
            </div>
            
            <label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO', $doctor->SP_REG_NO); ?>" style="background-color:#f9f906;">
              <small class="info help-block">
                           </small>
            </div>
                     </div>
                    <div class="form-group ">
                        <label for="MOBILE" class="col-sm-2 control-label">Mobile 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE', $doctor->MOBILE); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
						
						<label for="PAGER" class="col-sm-2 control-label">Pager 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER', $doctor->PAGER); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <div class="form-group ">
						<label for="EMAIL" class="col-sm-2 control-label">Email 
                        </label>
                        <div class="col-sm-3">
                           <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL', $doctor->EMAIL); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
					 
						<label for="LANG" class="col-sm-2 control-label">Special Language 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="LANG" id="LANG" placeholder='Except "English" and "Chinese"' value="<?= set_value('LANG', $doctor->LANG); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
                    
                     <div class="form-group">
                        <label for="DOB" class="col-sm-2 control-label">DOB
                        </label>
                        <div class="col-sm-3">
                           <input type="text" name="DOB" id="DOB" class="form-control datepicker pull-right " value="<?= set_value('DOB', ($doctor->DOB == "0000-00-00" ? "" : $doctor->DOB)); ?>">
                           <small class="info help-block">
                           </small>
                        </div>
						
						<label for="HKID" class="col-sm-2 control-label">HKID 
                        </label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID', $doctor->HKID); ?>">
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE; ?>" <?= $doctor->SP_CODE1 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
								
									<p class="medical-list-1">
										<?php 
											$first_1 = true;
											
											if ($first_1){
												if ($doctor->SP_CODE1 != "" && $doctor->MEDICAL_PROCEDURES != ""){
													$this->db->where("SP_CODE", $doctor->SP_CODE1); 
													$this->db->order_by("CLINIC_PROCEDURE", "ASC");
													foreach (db_get_all_data('medical_procedures') as $index=>$row): 
														if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
															$check_option = "checked";
														}else{
															$check_option = "";
														}
														echo "<div class='col-md-6  padding-left-0 first-sp-1'><input type='checkbox' ".$check_option.
														" class='flat-red' name='MEDICAL_PROCEDURES1[]' value='".$row->AUTO_NO."'>".
														$row->CLINIC_PROCEDURE."<small class='info help-block'>".
														"</small></div>";
														
													endforeach; 
												}  
											}
										?>
									</p>
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>" <?= $doctor->SP_CODE2 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
									<p class="medical-list-2">
										<?php 
											if ($doctor->SP_CODE2 != "" && $doctor->MEDICAL_PROCEDURES != ""){
												$this->db->where("SP_CODE", $doctor->SP_CODE2); 
												$this->db->order_by("CLINIC_PROCEDURE", "ASC");
												foreach (db_get_all_data('medical_procedures') as $index=>$row): 
												if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
													$check_option = "checked";
												}else{
													$check_option = "";
												}
										?>
										
											<?= "<div class='col-md-6  padding-left-0 first-sp-2'><input type='checkbox' ".$check_option.
											" class='flat-red' name='MEDICAL_PROCEDURES2[]' value='".$row->AUTO_NO."'>".$row->CLINIC_PROCEDURE."<small class='info help-block'>".
											"</small></div>"; ?>
										
										<?php endforeach; } ?>
									</p>
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $doctor->SP_CODE3 ?>" <?= $doctor->SP_CODE3 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
									<p class="medical-list-3">
										<?php 
											if ($doctor->SP_CODE3 != "" && $doctor->MEDICAL_PROCEDURES != ""){
												$this->db->where("SP_CODE", $doctor->SP_CODE3); 
												$this->db->order_by("CLINIC_PROCEDURE", "ASC");
												foreach (db_get_all_data('medical_procedures') as $index=>$row): 
												if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
													$check_option = "checked";
												}else{
													$check_option = "";
												}
										?>
										
											<?= "<div class='col-md-6  padding-left-0 first-sp-3'><input type='checkbox' ".$check_option.
											" class='flat-red' name='MEDICAL_PROCEDURES3[]' value='".$row->AUTO_NO."'>".$row->CLINIC_PROCEDURE."<small class='info help-block'>".
											"</small></div>"; ?>
										
										<?php endforeach; } ?>
									</p>
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $doctor->SP_CODE4 ?>" <?= $doctor->SP_CODE4 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
									<p class="medical-list-4">
										<?php 
											if ($doctor->SP_CODE4 != "" && $doctor->MEDICAL_PROCEDURES != ""){
												$this->db->where("SP_CODE", $doctor->SP_CODE4); 
												$this->db->order_by("CLINIC_PROCEDURE", "ASC");
												foreach (db_get_all_data('medical_procedures') as $index=>$row): 
												if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
													$check_option = "checked";
												}else{
													$check_option = "";
												}
										?>
										
											<?= "<div class='col-md-6  padding-left-0 first-sp-4'><input type='checkbox' ".$check_option.
											" class='flat-red' name='MEDICAL_PROCEDURES4[]' value='".$row->AUTO_NO."'>".$row->CLINIC_PROCEDURE."<small class='info help-block'>".
											"</small></div>"; ?>
										
										<?php endforeach; } ?>
									</p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 4 --------->
					 
                    <small class="info help-block">　</small>
					 
                     <div class="form-group ">
                        <label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
                        </label>
                        <div class="col-sm-9">
						       	<?php 
							
        								$this->db->order_by("SHORT_NAME", "ASC");
        								foreach (db_get_all_data('admission_right') as $row): 
        							?>
        							<div class="col-md-6  padding-left-0">
        							<input <?=  in_array($row->SHORT_NAME, explode(', ', $doctor->ADMISSION_RIGHT)) ? 'checked' : ''; ?> type="checkbox" class="flat-red" name="ADMISSION_RIGHT[]" value="<?= $row->SHORT_NAME ?>"> 
        							<?= $row->HOSPITAL_NAME; ?><?= " &nbsp; (".$row->SHORT_NAME.")"; ?>
        							<small class="info help-block">
                                   </small>
        							</div>
        							<?php endforeach; ?>  
        						</div>
        					</div>
					
									     <br>
                     <div class="form-group ">
                        <label for="REMARK" class="col-sm-2 control-label">Remark 
                        </label>
                        <div class="col-sm-8">
                           <textarea id="REMARK" name="REMARK" rows="5" cols="80"><?= set_value('REMARK', $doctor->REMARK); ?></textarea>
                        </div>
                     </div>
                      <br>
                  </div> <!--end doctor tab-->
     <?php if($has_center){;  ?>
			<div id="centerDetailDiv">
            <?php   for ($i=0; $i < count($doctor_center); $i++) { ?>
                <div class="form-horizontal center_box">
       
                
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Center ID</label>  
               <div class="col-sm-8">
               <input type="text" value="<?= $doctor_center[$i]->CENTER_CODE; ?>" class="form-control CENTER_CODE" readonly>
            <small class="info help-block">
                </small>
         </div>
              <div class="col-sm-2 pull-right">
                      <button type="button" class="btn-danger btn rm-center">Remove</button>
                    </div>
             </div>
             <div class="form-group">
              <label for="" class="col-sm-2 control-label">Center Name </label> 
               <div class="col-sm-8">
          <input type="text" value="<?= $doctor_center[$i]->E_NAME .'&nbsp'.$doctor_center[$i]->C_NAME; ?>" class="form-control">
            <small class="info help-block">
                </small>
         </div>
             </div>


                 <div class="form-group">
              <label for="" class="col-sm-2 control-label">Tel</label>  
               <div class="col-sm-3">
          <input type="text" value="<?= $doctor_center[$i]->TEL;?>" class="form-control" >
            <small class="info help-block">
                </small>
         </div>
             <label for="" class="col-sm-2 control-label">Fax</label>  
               <div class="col-sm-3">
          <input type="text" value="<?= $doctor_center[$i]->FAX;?>" class="form-control" >
            <small class="info help-block">
                </small>
         </div>
             </div>
                
                   <div class="form-group">
              <label for="" class="col-sm-2 control-label">English Address</label>  
               <div class="col-sm-8">
          <textarea class="form-control" value="" rows="3" ><?= $doctor_center[$i]->E_ADDR1."\n". $doctor_center[$i]->E_ADDR2 ."\n".$doctor_center[$i]->E_ADDR3;?></textarea>
            <small class="info help-block">
                </small>
         </div>
             </div>
             <div class="form-group">
              <label for="" class="col-sm-2 control-label">Chinese Address</label>  
               <div class="col-sm-8">
          <textarea class="form-control" value="" rows="3" ><?= $doctor_center[$i]->C_ADDR1."\n". $doctor_center[$i]->C_ADDR2 . "\n" .$doctor_center[$i]->C_ADDR3;?></textarea>
            <small class="info help-block">
                </small>
         </div>
             </div>
             </div>
              <?php }  ?>
           <?php  }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This Doctor has NO center</div>'; } ?>
  
              <div class="form-group">
              <label for="" class="col-sm-10 control-label"></label>  
               <div class="col-sm-2">
              <a href="<?php echo site_url('administrator/doctor/add_doctor_center/'.$doctor->DR_CODE); ?>"  type="button" class="btn btn-success">Add center</a>
         </div>
             </div>
            <hr>
          </div>


          <div id="consultDiv">
            <div class="form-horizontal"  >
            <?php if ($has_center && $has_consult) {  ?>
            <div class="form-group">
              <label for="CONSULT_CENTER_CODE" class="col-sm-2 control-label">Center Name </label>             
          
               <div class="col-sm-4">
                 <select class="form-control chosen chosen-select-deselect" name="CONSULT_CENTER_CODE" id="CONSULT_CENTER_CODE">
                 <?php if($has_consult){; ?>
                  <?php  foreach ($doctor_center as $center): ?>
                   <option <?= $center->CENTER_CODE == $doctor_consult_hour->CENTER_CODE ? 'selected' : ''; ?> value="<?= $center->CENTER_CODE; ?>"><?= $center->E_NAME; ?></option>
                   <?php endforeach; }?>  
                 </select>
           
               </div>
           
          
             <label for="CONTACT_PERSON" class="col-sm-1 control-label">Tel   </label>
            
               <div class="col-sm-3">
                <input type="text" class="form-control cust-consult-reset" name="CENTER_TEL" id="CENTER_TEL" value="<?= $doctor_consult_hour->TEL; ?>">
      
               </div>

            </div>
                      <hr>

              <div class="form-group">
                 <label for="CONTACT_PERSON" class="col-sm-2 control-label">Contact Person 
               </label>
               <div class="col-sm-3">
                <input type="text" class="form-control cust-consult-reset" name="CONTACT_PERSON" id="CONTACT_PERSON" value="<?= $doctor_consult_hour->CONTACT_PERSON; ?>">
                <small class="info help-block">
                </small>
               </div>
             
                     <div class="col-sm-2">
                     <a type="button" class="btn btn-success" href="<?php echo site_url('administrator/doctor_consult_hour/edit_2/' . $doctor->DR_CODE . '/' . $doctor_consult_hour->CENTER_CODE)?>" id="edit_time">Edit Time</a>
              </div>
                </div>
            <!--  Schedule day 1  -->
            <div class="form-group">
               <label class="col-sm-2 control-label">Schedule Day1 </label>
               <div class="col-sm-3">
                <textarea id="sdt1" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
                      echo $doctor_consult_hour->SCHEDULE_DAY_C1." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E1."\n";
                      if ($doctor_consult_hour->SCHEDULE_DAY_C1 != "" && $doctor_consult_hour->SCHEDULE_DAY_C1 != NULL){
                        echo "--------------------------------------------------\n";
                      }
                      echo $doctor_consult_hour->TIMESLOT1_1."\n";
                      echo $doctor_consult_hour->TIMESLOT1_2."\n";
                      echo $doctor_consult_hour->TIMESLOT1_3;
                    
                  ?>
                </textarea>
                <small class="info help-block">
                </small>
               </div>
               
               <label class="col-sm-2 control-label">Schedule Day2 </label>
              
               <div class="col-sm-3">
                <textarea id="sdt2" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
                      echo $doctor_consult_hour->SCHEDULE_DAY_C2." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E2."\n";
                      if ($doctor_consult_hour->SCHEDULE_DAY_C2 != ""){
                        echo "--------------------------------------------------\n";
                      }
                      echo $doctor_consult_hour->TIMESLOT2_1."\n";
                      echo $doctor_consult_hour->TIMESLOT2_2."\n";
                      echo $doctor_consult_hour->TIMESLOT2_3;
                  ?>
                </textarea>
                <small class="info help-block">
                </small>
               </div>
            </div>

            <div class="form-group">
               <label class="col-sm-2 control-label">Schedule Day3 </label>
              
               <div class="col-sm-3">
                <textarea id="sdt3" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
                      echo $doctor_consult_hour->SCHEDULE_DAY_C3." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E3."\n";
                      if ($doctor_consult_hour->SCHEDULE_DAY_C3 != ""){
                        echo "--------------------------------------------------\n";
                      }
                      echo $doctor_consult_hour->TIMESLOT3_1."\n";
                      echo $doctor_consult_hour->TIMESLOT3_2."\n";
                      echo $doctor_consult_hour->TIMESLOT3_3;
                  ?>
                </textarea>
                <small class="info help-block"> </small>
               </div>
               
               <label class="col-sm-2 control-label">Schedule Day4 </label>
              
               <div class="col-sm-3">
                <textarea id="sdt4" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
                      echo $doctor_consult_hour->SCHEDULE_DAY_C4." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E4."\n";
                      if ($doctor_consult_hour->SCHEDULE_DAY_C4 != ""){
                        echo "--------------------------------------------------\n";
                      }
                      echo $doctor_consult_hour->TIMESLOT4_1."\n";
                      echo $doctor_consult_hour->TIMESLOT4_2."\n";
                      echo $doctor_consult_hour->TIMESLOT4_3;
                  ?>
                </textarea>
                <small class="info help-block"></small>
                
               </div>
            </div>
            
            <div class="form-group">
               <label class="col-sm-2 control-label">Schedule Day5  </label>
             
               <div class="col-sm-3">
                <textarea id="sdt5" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
                      echo $doctor_consult_hour->SCHEDULE_DAY_C5." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E5."\n";
                      if ($doctor_consult_hour->SCHEDULE_DAY_C5 != ""){
                        echo "--------------------------------------------------\n";
                      }
                      echo $doctor_consult_hour->TIMESLOT5_1."\n";
                      echo $doctor_consult_hour->TIMESLOT5_2."\n";
                      echo $doctor_consult_hour->TIMESLOT5_3;
                  ?>
                </textarea>
                <small class="info help-block">
                </small>
               </div>
               
               <label class="col-sm-2 control-label">Schedule Day6  </label>
             
               <div class="col-sm-3">
                <textarea id="sdt6" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
                      
                      echo $doctor_consult_hour->SCHEDULE_DAY_C6." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E6."\n";
                      if ($doctor_consult_hour->SCHEDULE_DAY_C6 != ""){
                        echo "--------------------------------------------------\n";
                      }
                      echo $doctor_consult_hour->TIMESLOT6_1."\n";
                      echo $doctor_consult_hour->TIMESLOT6_2."\n";
                      echo $doctor_consult_hour->TIMESLOT6_3;
                  ?>
                </textarea>
                <small class="info help-block">
                </small>
               </div>
            
            </div>
            
            <hr>
                  
                  <?php } else {

                            echo  '<br><hr><a href=' ;
                            echo  '"' . site_url('administrator/doctor_consult_hour/add_2/' . $doctor->DR_CODE . '/'.'') .'" ';
                            echo ' class="col-sm-4 col-sm-offset-4 lead text-info">ADD DOCTOR CONSULTATION HOUR</a>';
                      }?>
                  </div>
          </div>


				  <div id="paymentDiv">
            <?php if($has_center && $first_payment){; ?>
                  <div class="form-group">
              <label for="PAY_CENTER_CODE" class="col-sm-2 control-label">Center Name </label>             
          
               <div class="col-sm-4">
                 <select class="form-control chosen chosen-select-deselect" name="PAY_CENTER_CODE" id="PAY_CENTER_CODE">
                 <?php if($has_consult){; ?>
                  <?php  foreach ($doctor_center as $center): ?>
                   <option <?= $center->CENTER_CODE == $doctor_consult_hour->CENTER_CODE ? 'selected' : ''; ?> value="<?= $center->CENTER_CODE; ?>"><?= $center->E_NAME; ?></option>
                   <?php endforeach; }?>  
                 </select>
        
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
                <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?=(!$has_payment)?"(The doctor has no Cheque payment information in this center)" : $doctor_payment->PAYEE_NAME ; ?>" readonly> 
                <small class="info help-block">
                </small>
               </div>
               <script type="text/javascript">
                 
               </script>
                <a type="button" class="btn btn-success" id="edit_payment" href="<?= site_url('administrator/doctor_payment/edit/'.$doctor->DR_CODE .'/' . $doctor_consult_hour->CENTER_CODE); ?>">Edit Payment</a>
            </div>
            <div class="form-group ">
               <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
               </label>
               <div class="col-sm-8">
                <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR1:""; ?>" readonly>
                <small class="info help-block">
                </small>
               </div>
            </div>
            
            <div class="form-group ">
               <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
               </label>
               <div class="col-sm-8">
                <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR2:""; ?>" readonly>
              <small class="info help-block">
                  </small>
               </div>
            </div>
            
            <div class="form-group ">
               <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
               </label>
               <div class="col-sm-8">
                <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR3:""; ?>" readonly>
              <small class="info help-block">
                  </small>
               </div>
            </div>
            
            <div class="form-group ">
               <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
               </label>
               <div class="col-sm-8">
                <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR4:""; ?>" readonly>
              <small class="info help-block">
                  </small>
               </div>
            </div>
            
            <div class="form-group ">
               <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
               </label>
               <div class="col-sm-8">
                <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR5:""; ?>" readonly>
              <small class="info help-block">
                  </small>
              </div>
            </div>
            
            <div class="form-group ">
               <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
               </label>
               <div class="col-sm-4">
                <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= ($has_payment)?$doctor_payment->PAYEE_DISTRICT:""; ?>" readonly>
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
							 <select  class="form-control chosen chosen-select-deselect" name="BANK_CLEARING_CODE" id="BANK_CLEARING_CODE" readonly>
								<option value="">The doctor has no AUTO PAYMENT method in this centre</option>
								<?php foreach (db_get_all_data('bank') as $row): ?>
								<option <?php if ($first_auto_pay) { echo $row->CLEARING_CODE == $doctor_payment->BANK_CLEARING_CODE ? 'selected' : ''; }  ?> value="<?= $row->CLEARING_CODE ?>"><?= $row->C_NAME; ?> &nbsp; <?= $row->E_NAME; ?></option>
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
                 <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" value="<?= ($first_auto_pay)?$doctor_payment->ACCOUNT_NO:""; ?>" readonly>
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
                 <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER" value="<?= ($first_auto_pay)?$doctor_payment->ACCOUNT_HOLDER:""; ?>" readonly>
                 <small class="info help-block">
                 </small>
                </div>
               </div>
            </div>
          <?php }else{ 
                            echo  '<br><hr><a href=' ;
                            echo  '"' . site_url('administrator/doctor_payment/edit/' . $doctor->DR_CODE) .'" ';
                            echo ' class="col-sm-4 col-sm-offset-4 lead text-info">ADD PAYMENT METHOD</a>';
                      } ?>
				  </div><!--payment end-->

          <div id="cardDiv">
              <?php  if ($has_cards){ ?>
               <div class="table-responsive">
                 <table class="table table-bordered dataTable my-table">
                         <thead>
                          <tr class="">
                               <th>Company</th> 
                               <th>Card Type</th>
                               <th>TYPE</th>
                               <th>Location Code</th>
                               <th>Center Location</th>
                               <th>Partner Doctor Code</th>
                               <th>Term date</th>
                            </tr>
                         </thead>
                           <tbody id="tbody_doctor" class="cust-sp">
                      
                         
                            <?php  foreach($cards as $card): ?>
                            <tr> 
                               <td><input type="hidden" name="COM_ID[]" value="<?= _ent($card->d_COM_ID); ?>" readonly><?= _ent($card->c_E_NAME); ?></td>
                               <td><input type="hidden" name="CARD_CODE[]" value="<?= _ent($card->CARD_CODE); ?>" readonly><?= _ent($card->CARD_CODE); ?></td>
                               <td><?php echo $card->TYPE1." / ".$card->TYPE2;?></td>
                               <td><input type="text" name="LOC_CODE[]" value="<?= $card->LOC_CODE ?>"></td> 
                               
                               <td><select name="CENTER_CODE[]" class="">
                                   <?php 
                                   $this->db->from('doctor_center');
                                   $this->db->join('center','doctor_center.CENTER_CODE = center.CENTER_CODE');
                                   $this->db->where('DR_CODE',$card->DR_CODE);
                                   $query = $this->db->get();
                                   $this_doctor_center = $query->result();
                                   foreach ($this_doctor_center as $value){
                                    if ($value->CENTER_CODE == $card->CENTER_CODE){ 
                                      
                                     echo  '<option value="'. $value->CENTER_CODE .'" selected>'. $value->E_DISTRICT.'</option>';

                                       }
                                    else{
                                     echo  '<option value="'. $value->CENTER_CODE. '">'. $value->E_DISTRICT .'</option>';

                                      }
                                  }
                                  ?>
                                 </select>
                               </td>
                               <td><input type="text" name="PARTNER_DR_CODE[]" value="<?= _ent($card->PARTNER_DR_CODE); ?>"></td> 

                               <td><input type="text" name="D_TERM_DATE[]" class="datepicker" value="<?= $card->TERM_DATE ?>"></td>

                            </tr>
                          <?php endforeach;?>
               
                          </tbody>
                   </table>
  
           </div>
                 <?php }else{
                                   echo '<br><hr><a href="#" class="col-sm-4 col-sm-offset-4 lead text-info">ADD CARDS</a>';
                              }?> 
          </div>
          <div id="Doctor_Agreed_Fee">
                <?php if ($has_special_fee){; ?>
                    <div class="table-responsive"> 
                <table class="table table-bordered dataTable my-table">
                 <thead>
                  <tr class="">
                     <th>Company</th>
                     <th>Card Type</th>
                     <th>Class</th>
                     <th>Type</th>
                     <th>Med Days</th>
                     <th>CO-PAY</th>
                     <th>Fee</th>
                     <th>pay</th>
                     <th>Special Charge</th>
                     <th>Doctor Agreed Fee</th>
                     <th>Center Code</th>
                     <th>Center District</th>
                     <th>Remark</th>
                     <th>Last Update</th>
                  </tr>
                 </thead>
                 <tbody id="tbody_doctor_special_fee" class="cust-sp">
              
                    <?php  foreach ($doctor_special_fees as $doctor_special_fee){  ;?>
                  <tr>
                     <td><?= $doctor_special_fee->d_COM_ID; ?></td>
                     <td><?= $doctor_special_fee->d_CARD_CODE; ?></td>
                     <td><?= $doctor_special_fee->c_CLASS_CODE; ?></td>
                     <td><?= $doctor_special_fee->c_TYPE; ?></td>
                     <td><?= $doctor_special_fee->c_MED_DAYS; ?></td>
                      <td><?= $doctor_special_fee->c_CO_PAY; ?></td>
                     <td><?= $doctor_special_fee->c_FEE ;?></td> 
                     <td><?= "$".$doctor_special_fee->c_PAY; ?></td> 
                      <?php if ($doctor_special_fee->SP_FEE!= '' ) {; ?>
                       <td  style="color:red;"><?= "$".$doctor_special_fee->SP_FEE; ?></td> 
                                         <td style="color:red;"><?= "$".($doctor_special_fee->c_PAY + $doctor_special_fee->SP_FEE); ?></td>
                     <?php }else{ ?>
                      <td><?= $doctor_special_fee->SP_FEE; ?></td> 
                      <td ><?= "$".($doctor_special_fee->c_PAY + $doctor_special_fee->SP_FEE); ?></td>
                      <?php }?>
                      <td><?= $doctor_special_fee->c_CENTER_CODE; ?></td>
                     <td><?= $doctor_special_fee->c_E_DISTRICT; ?></td> 
                     <td><?= $doctor_special_fee->d_REMARK; ?></td> 
                     <td><?= $doctor_special_fee->d_LAST_UPDATE; ?></td>
                  </tr>
                <?php } ?>
               </tbody>
              
               </table>
             </div>
            <?php }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has No agreed fee</div>'; } ?>
          </div>
      

          <div id="qualiDiv">
                      <?php if ($has_quali){ ?>
              <div class="form-horizontal" name="form_doctor_qualification" id="form_doctor_qualification" >

                <div class="form-group ">
                            <label for="QUALIFICATION" class="col-sm-2 control-label">Qualification </label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control cust-required"  value="<?=  $doctor_qualification->QUALIFICATION_CODE; ?>">
                                <input type="text" class="form-control" name="QUALIFICATION" id="QUALIFICATION" placeholder="QUALIFICATION" value="<?= set_value('QUALIFICATION', $doctor_qualification->QUALIFICATION); ?>">
                                <small class="info help-block">
                                </small>
                            </div>

                           <label for="CERT_YEAR" class="col-sm-1 control-label">Cert Year </label>
                            
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="CERT_YEAR" id="CERT_YEAR" placeholder="CERT YEAR" value="<?= set_value('CERT_YEAR', $doctor_qualification->CERT_YEAR); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                              
                                                 
                         <div class="form-group ">
                            <label for="CERT_COPY" class="col-sm-2 control-label">Cert Copy 
                            </label>
                            <div class="col-sm-8">
                                <div id="doctor_qualification_CERT_COPY_galery"></div>
                                <input class="data_file data_file_uuid" name="doctor_qualification_CERT_COPY_uuid" id="doctor_qualification_CERT_COPY_uuid" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_uuid'); ?>">
                                <input class="data_file" name="doctor_qualification_CERT_COPY_name" id="doctor_qualification_CERT_COPY_name" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_name', $doctor_qualification->CERT_COPY); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,JPEG, PNG,PDF.</small>
                            </div>
                        </div>
<!--                     <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Qualification </label>

                        <div class="col-sm-8">
                           <select class="form-control chosen chosen-select-deselect" name="QUALIFICATION" id="QUALIFICATION">
                 <?php foreach ($doctor_qualification2 as $index=>$quali): ?>
                 <option <?= $index == 0 ? "selected" : ""; ?> value="<?= $quali->QUALIFICATION; ?>"><?= $quali->QUALIFICATION; ?> (<?= $quali->CERT_YEAR; ?>)</option>
                 <?php endforeach; ?>  
               </select>
               <small class="info help-block">　</small>
                        </div>
                    </div>
          
          <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Cert Year </label>

                        <div class="col-sm-8">
              <input type="text" class="form-control cust-quali-reset" name="CERT_YEAR" id="CERT_YEAR" value="<?= $doctor_qualification->CERT_YEAR; ?>" disabled> 
              <small class="info help-block">　</small>
            </div>
                    </div>
                                     
          <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Cert Copy </label>
                        <div class="col-sm-8">
                             <?php if (is_image($doctor_qualification->CERT_COPY)): ?>
                              <a class="fancybox" id="fancy_CERT_COPY" rel="group" href="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                <img id="img_CERT_COPY" src="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>" class="image-responsive" alt="image doctor_qualification" title="cert copy" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a id="href_CERT_COPY" href="<?= BASE_URL . 'administrator/file/download/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                 <img id="img_CERT_COPY2" src="<?= get_icon_file($doctor_qualification->CERT_COPY); ?>" class="image-responsive" alt="image doctor_qualification" title="cert copy <?= $doctor_qualification->CERT_COPY; ?>" width="40px"> 
                               <?= $doctor_qualification->CERT_COPY ?>
                               </a>
                               </label>
                              <?php endif; ?>
                <small class="info help-block">　</small>
                        </div>
                    </div> -->
        
                  </div>
          <?php }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has NO qualification</div>'; } ?>
                    
          </div>


          <div id="websiteDiv">
                  <div class="form-horizontal" name="form_doctor" id="form_doctor" >                
            <?php if ($has_website){ ?>
            <div class="form-group ">
               <label for="WEBSITE_CARD_CODE" class="col-sm-2 control-label">Insurance Company  </label>
               <div class="col-sm-8">
                <select  class="form-control chosen chosen-select-deselect" name="WEBSITE_CARD_CODE" id="WEBSITE_CARD_CODE">
                 <?php foreach ($website_login as $index=>$website): ?>
                 <option <?=  $index == 0 ? "selected" : ""; ?> value="<?= $website->COM_ID ?>" ><?= $website->E_NAME; ?></option>
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
                <input type="text" class="form-control cust-website-reset" name="WEBSITE_ACCOUNT" id="WEBSITE_ACCOUNT" value="<?= $website_login[0]->WEBSITE_ACCOUNT; ?>" >
                <small class="info help-block">
                </small>
               </div>
            </div>
            <div class="form-group ">
               <label for="WEBSITE_PASSWORD" class="col-sm-2 control-label">Website Password 
               </label>
               <div class="col-sm-8">
                <input type="text" class="form-control cust-website-reset" name="WEBSITE_PASSWORD" id="WEBSITE_PASSWORD" value="<?= $website_login[0]->WEBSITE_PASSWORD; ?>" >
                <small class="info help-block">
                </small>
               </div>
            </div>
            </div>
            <?php }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has No website account</div>'; } ?>
          
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
		

     // CENTER TAB 
     $('#centerDetailDiv').on('click','.rm-center',function(){
        var doctorId = $('#DR_CODE').val();
        var centerId = $(this).closest('.center_box').find('.CENTER_CODE').val();
        swal({
            title: "Are you sure to delete this doctor'center?",
            text: "Corresponding consunt hour, payment address, card, agreed fee data is gonna be removed as well !",
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

             $.ajax({
              data:{'dr_code': doctorId, 'center_code': centerId},
              url: BASE_URL + '/administrator/doctor/remove_DCenter',
              dataType: 'JSON',
              method: 'GET',
              success: function(data){
              location.reload(); 
              }
             });
            }
          });
    
        return false;

      });
     // END CENTER TAB  

     // CONSULTATION HOUR CENTER CODE CHANGE
     $("#CONSULT_CENTER_CODE").change(function() {
      $('#consultDiv textarea').val("");
         var dr_code = $("#DR_CODE").val();
         var center_code = $("#CONSULT_CENTER_CODE").val();
      
      // $("#CENTER_CODE").prop("disabled", true).trigger('chosen:updated');
       
      $.ajax({
        type: "GET",
        url: BASE_URL + '/administrator/doctor/view_consult/',
        dataType: "json",
        data: {dr_code: dr_code, center_code: center_code},
        success: function(data) {
          $('.cust-consult-reset').val("");
          $('.cust-consult-reset-sd').text("");
          
          var center_details = data['center_details'];

          if (center_details!='') {
              $('#CENTER_TEL').val(center_details.TEL);
          }
          
          if (data["has_center_consult"]) {

             var value = data['specific_consult'];
             var consult_ID = value.AUTO_NO;
             $('#edit_time').prop('href',BASE_URL+'administrator/doctor_consult_hour/edit/' + consult_ID);

              if (value.CONTACT_PERSON!='') {
                $('#CONTACT_PERSON').val(value.CONTACT_PERSON);

              }else{
                $('#CONTACT_PERSON').val("");
              }

            if (value.SCHEDULE_DAY_E1 != ""){
              $('#sdt1').val(value.SCHEDULE_DAY_C1 + "\t" + value.SCHEDULE_DAY_E1 + 
              "\n--------------------------------------------------\n" + 
              value.TIMESLOT1_1 + "\n" + value.TIMESLOT1_2 + "\n" + value.TIMESLOT1_3);
            }

            if (value.SCHEDULE_DAY_E2 != ""){
              $('#sdt2').val(value.SCHEDULE_DAY_C2 + "\t" + value.SCHEDULE_DAY_E2 + 
              "\n--------------------------------------------------\n" + 
              value.TIMESLOT2_1 + "\n" + value.TIMESLOT2_2 + "\n" + value.TIMESLOT2_3);
            }
            
            
            if (value.SCHEDULE_DAY_E3 != ""){
              $('#sdt3').val(value.SCHEDULE_DAY_C3 + "\t" + value.SCHEDULE_DAY_E3 + 
              "\n--------------------------------------------------\n" + 
              value.TIMESLOT3_1 + "\n" + value.TIMESLOT3_2 + "\n" + value.TIMESLOT3_3);
            }

            
            if (value.SCHEDULE_DAY_E4 != ""){
              $('#sdt4').val(value.SCHEDULE_DAY_C4 + "\t" + value.SCHEDULE_DAY_E4 + 
              "\n--------------------------------------------------\n" + 
              value.TIMESLOT4_1 + "\n" + value.TIMESLOT4_2 + "\n" + value.TIMESLOT4_3);
            }
            
            if (value.SCHEDULE_DAY_E5 != ""){
              $('#sdt5').val(value.SCHEDULE_DAY_C5 + "\t" + value.SCHEDULE_DAY_E5 + 
              "\n--------------------------------------------------\n" + 
              value.TIMESLOT5_1 + "\n" + value.TIMESLOT5_2 + "\n" + value.TIMESLOT5_3);
            }
            
            if (value.SCHEDULE_DAY_E6 != ""){
              $('#sdt6').val(value.SCHEDULE_DAY_C6 + "\t" + value.SCHEDULE_DAY_E6 + 
              "\n--------------------------------------------------\n" + 
              value.TIMESLOT6_1 + "\n" + value.TIMESLOT6_2 + "\n" + value.TIMESLOT6_3);
            }
          }else{
            $('#consultDiv textarea').val("");
             $('#edit_time').prop('href',BASE_URL+'administrator/doctor_consult_hour/add_2/' + dr_code + '/' + center_code);

          }
 
        },
        error: function(jqXHR) {
          
          alert("發生錯誤: " + jqXHR.status);
        }
      })

    });
     // END CONSULTATION HOUR 

     // Payment Center code change
      $('#PAY_CENTER_CODE').change(function(){
      var dr_code = $("#DR_CODE").val();
      var center_code = $("#PAY_CENTER_CODE").val();
      
      // $("#CENTER_CODE").prop("disabled", true).trigger('chosen:updated');
      $('#edit_payment').prop('href',BASE_URL+'administrator/doctor_payment/edit/' + dr_code + '/' + center_code);  
      $.ajax({
        type: "GET",
        url: BASE_URL + '/administrator/doctor/view_pay/',
        dataType: "json",
        data: {dr_code: dr_code, center_code: center_code},
        success: function(data) {
          $('.cust-consult-reset').val("");
          $('.cust-consult-reset-sd').text("");
          
                    var payment = data['specific_payment'];

                    if (data["has_center_pay"]) {
                      $("#PAYEE_NAME").val(payment.PAYEE_NAME);
                        $("#PAYEE_ADDR1").val(payment.PAYEE_ADDR1);
                        $("#PAYEE_ADDR2").val(payment.PAYEE_ADDR2);
                        $("#PAYEE_ADDR3").val(payment.PAYEE_ADDR3);
                        $("#PAYEE_ADDR4").val(payment.PAYEE_ADDR4);
                        $("#PAYEE_ADDR5").val(payment.PAYEE_ADDR5);
                        $("#PAYEE_DISTRICT").val(payment.PAYEE_DISTRICT);
                       
                        if (data["auto_pay"]) {
                          $('#BANK_CLEARING_CODE').val( payment.BANK_CLEARING_CODE).trigger('chosen:updated');
                          $("#ACCOUNT_NO").val(payment.ACCOUNT_NO);
                          $("#ACCOUNT_HOLDER").val(payment.ACCOUNT_HOLDER);
                        }else{
                          $('#BANK_CLEARING_CODE').val("").trigger('chosen:updated');
                          $("#ACCOUNT_NO").val("");
                          $("#ACCOUNT_HOLDER").val("");
                        }
                    }else{
                      $('#BANK_CLEARING_CODE').val("").trigger('chosen:updated');
                      $('#paymentDiv input').val("");
                    }

        },
        error: function(jqXHR) {
          
          alert("發生錯誤: " + jqXHR.status);
        }
      })

    });
     // end payment 



      // EDIT QUALIFICATION
       var params = {};
       params[csrf] = token;

       $('#doctor_qualification_CERT_COPY_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/doctor/upload_cert_copy',
              params : params
          },
          deleteFile: {
              enabled: true, // defaults to false
              endpoint: BASE_URL + '/administrator/doctor/delete_cert_copy'
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/doctor/get_cert_copy/<?= $doctor_qualification->QUALIFICATION_CODE; ?>',
             refreshOnRequest:true
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
                                      alert(xhr.uploadName);

                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#doctor_qualification_CERT_COPY_uuid').val();
                  $.get(BASE_URL + '/administrator/doctor/delete_cert_copy/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#doctor_qualification_CERT_COPY_uuid').val('');
                  $('#doctor_qualification_CERT_COPY_name').val('');
                }
              }
          }
      }); /*end CERT_COPY galey*/
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
      

      // SAVE BUTTON
        $('.btn_save').click(function(){
        $('.message').fadeOut();
         
        var myDctor_form =  document.getElementById('form_doctor');
        var form_doctor = new FormData(myDctor_form);
   
        // var form_doctor = $('#form_doctor');
        // var data_post = form_doctor.serializeArray();
         var save_type = $(this).attr('data-stype');
         form_doctor.append('save_type', save_type);
        for(var k of form_doctor.entries()){
             console.log(key[0] + ',' + key[1]);
         }
        $('.loading').show();
    
        $.ajax({
          url: myDctor_form.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: form_doctor,
          cache: false,
          processData: false,
          contentType: false,
        })
        .done(function(res) {
          if(res.success) {
            // var id = $('#doctor_image_galery').find('li').attr('qq-file-id');
   
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function(res) {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
    //DOCTOR TAB
    
    if (<?= $doctor->SP_CODE1 == "" ? true : 0; ?>){
      $(".expand-medical-1").hide();
    }

    if (<?= $doctor->SP_CODE2 == "" ? true : 0; ?>){
      $(".expand-medical-2").hide();
    }
    
    if (<?= $doctor->SP_CODE3 == "" ? true : 0; ?>){
      $(".expand-medical-3").hide();
    }
    
    if (<?= $doctor->SP_CODE4 == "" ? true : 0; ?>){
      $(".expand-medical-4").hide();
    }

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
            
            $('.medical-list-'+sp_num).html("");
            $('.first-sp-'+sp_num).remove();
            
            
            if (data['has_medical_procedures']){
              $.each(data['medical_procedures'], function(index, val) {
              
                $('.medical-list-'+sp_num).append("<div class='col-md-6  padding-left-0'><input type='checkbox' class='flat-red' name='MEDICAL_PROCEDURES" + sp_num + "[]' value='" + 
                val.AUTO_NO + "'>" + val.CLINIC_PROCEDURE + "<small class='info help-block'></small></div>");
                
              });
              
            }else{
              $(medical_list).append("(No medical procedures)");
            }
            
            
            $('input[type="checkbox"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass: 'iradio_flat-green'
            });
            
            $('input[name="MEDICAL_PROCEDURES' + sp_num + '"]').iCheck('uncheck');
            
            
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
      jQuery(window).on("load", function(){
        $('#paymentDiv').hide();
        $('#consultDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $("#centerDetailDiv").hide();
        $('#cardDiv').hide();
         $('#centerCodeDiv').hide();
    });
    
    
    $('.expand-medical-list-1').hide();
    $('.expand-medical-list-2').hide();
    $('.expand-medical-list-3').hide();
    $('.expand-medical-list-4').hide();
         
     
        $('#doctor_tab').on('click',function(){
        $('#doctorDiv').show();
        $('#paymentDiv').hide();
        $('#consultDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $("#centerDetailDiv").hide();
        $('#cardDiv').hide();
         $('#centerCodeDiv').hide();

    });
         $('#center_tab').on('click',function(){
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#consultDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $('#cardDiv').hide();
        $('#centerCodeDiv').hide();
          $('#centerDetailDiv').show();

    });
     
     $('#payment_tab').on('click',function(){
        $('#paymentDiv').show();
        $("#centerCodeDiv").show();
        $('#doctor').hide();
        $('#consultDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $('#cardDiv').hide();
         $('#centerDetailDiv').hide();

    });
    
    $('#consult_tab').on('click',function(){
        $('#consultDiv').show();
        $("#centerCodeDiv").show();
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $('#cardDiv').hide();
        $('#centerDetailDiv').hide();

    });
    
    $('#cards_tab').on('click',function(){
        $('#cardDiv').show();
        $('#consultDiv').hide();
        $("#centerCodeDiv").hide();
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $('#centerDetailDiv').hide();

    });
    
    $('#quali_tab').on('click',function(){
        $('#qualiDiv').show();
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#consultDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $('#websiteDiv').hide();
        $("#centerCodeDiv").hide();
        $('#cardDiv').hide();
        $('#centerDetailDiv').hide();


    });
    
    $('#spfee_tab').on('click',function(){      
        $('#Doctor_Agreed_Fee').show();
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#consultDiv').hide();
        $('#qualiDiv').hide();
        $('#websiteDiv').hide();
        $('#cardDiv').hide();
        $("#centerCodeDiv").hide();
        $('#centerDetailDiv').hide();

    });
    
    $('#website_tab').on('click',function(){
        $('#websiteDiv').show();
        $('#doctorDiv').hide();
        $('#paymentDiv').hide();
        $('#consultDiv').hide();
        $('#qualiDiv').hide();
        $('#Doctor_Agreed_Fee').hide();
        $("#centerCodeDiv").hide();
        $('#cardDiv').hide();
        $('#centerDetailDiv').hide();



    });

    }); /*end doc ready*/
</script>