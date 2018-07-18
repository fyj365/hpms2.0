
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor      <small>Detail Doctor</small>

   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
      <li class="active">Detail</li>
   </ol>
</section> 
<style type="text/css">
	label {
		text-align: right;
	}
	.status_box{
		margin-top: 10px;
		margin-bottom: 20px;
	}
</style>
<!-- Main content -->
<section class="content">
   <div class="row" >
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">               
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
		         
			 <div class="status_box">
				<div class="form-group">
							<label for="DR_CODE" class="col-sm-6 control-label"></label>
							<div class="col-sm-2">
							   <input type="text" class="form-control" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor->DR_CODE); ?>" disabled>
							</div>
							 
							<div class="col-sm-2" >
							   <input type="text" class="form-control"  id="STATUS" value="<?= set_value('STATUS', $doctor->STATUS); ?>" disabled>
			             </div>

		           </div>
		           <br>
			 </div>
               <div id="doctorDiv">
                  <div class="form-horizontal" name="form_doctor" id="form_doctor" >

					<!-- Doctor info 1 -->
                     <div id="doctor_info1" class="col-sm-12">
				
						 
						 <div class="form-group ">
							<label for="E_NAME" class="col-sm-2 control-label">Doctor Name 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" value="<?= $doctor->E_TITLE." ".$doctor->E_NAME; ?>" >
							   <small class="info help-block">
							   </small>
							</div>
							<label for="E_NAME" class="col-sm-2 control-label"> Chi Name
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" value="<?= $doctor->C_NAME == "" ? '' : $doctor->C_NAME." ".$doctor->C_TITLE; ?>" >
							   <small class="info help-block">
							   </small>
							</div>
						 </div>


						 <div class="form-group  wrapper-options-crud">
							<label for="GENDER" class="col-sm-2 control-label">Gender 
							</label>
							<div class="col-sm-1">
							   <input type="text" class="form-control" value="<?= $doctor->GENDER; ?>" >
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="TYPE" class="col-sm-4 control-label">Type
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" value="<?= $doctor->TYPE1." &nbsp; ".$doctor->TYPE2." &nbsp; ".$doctor->TYPE3; ?>" >
							   <small class="info help-block">
							   </small>
							</div>
						</div>
									             <div class="form-group ">
							<label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE" value="<?= set_value('JOIN_DATE', ($doctor->JOIN_DATE == "0000-00-00" ? "" : $doctor->JOIN_DATE)); ?>" >
								<small class="info help-block">
							 </small>
							</div>
							
							<label for="JOIN_DATE" class="col-sm-2 control-label">Term Date
							</label>
							<div class="col-sm-3">
							   <input type="text" style="margin-bottom:10px;"class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE', ($doctor->TERM_DATE == "0000-00-00" ? "" : $doctor->TERM_DATE)); ?>" >
							</div>
						</div>

						 <div class="form-group ">
							<label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE" value="<?= set_value('MPS_EXPIRY_DATE', ($doctor->MPS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->MPS_EXPIRY_DATE)); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="GP_REG_NO" class="col-sm-2 control-label">GP Reg No. 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO', $doctor->GP_REG_NO); ?>" >
								<small class="info help-block">
							   </small>
							</div>
						 </div>
						 <div class="form-group ">
							<label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE" value="<?= set_value('APS_EXPIRY_DATE', ($doctor->APS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->APS_EXPIRY_DATE)); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO', $doctor->SP_REG_NO); ?>" >
								<small class="info help-block">
							   </small>
							</div>
						 </div>
						 
						 
						 <div class="form-group ">
							<label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
							</label>
							<div class="col-sm-3">
								<input type="text" style="margin-bottom:10px;" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE" value="<?= set_value('BR_EXPIRY_DATE', ($doctor->BR_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->BR_EXPIRY_DATE)); ?>" >
							</div>
						 </div>

						 <div class="form-group ">
							<label for="MOBILE" class="col-sm-2 control-label">Mobile 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE', $doctor->MOBILE); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="PAGER" class="col-sm-2 control-label">Pager 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER', $doctor->PAGER); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
						 </div>
						 
						 <div class="form-group  wrapper-options-crud">
							<label for="EMAIL" class="col-sm-2 control-label">Email 
							</label>
							<div class="col-sm-3">
							   <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL', $doctor->EMAIL); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
						 
							<label for="LANG" class="col-sm-2 control-label">Special Langauge 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="LANG" id="LANG" value="<?= set_value('LANG', $doctor->LANG); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
						 </div>
						 
						 <div class="form-group">
							<label for="DOB" class="col-sm-2 control-label">DOB 
							</label>
							<div class="col-sm-3">
								<input type="text" style="margin-bottom:10px;" class="form-control pull-right datepicker" name="DOB" id="DOB" value="<?= set_value('DOB', ($doctor->DOB == "0000-00-00" ? "" : $doctor->DOB)); ?>" >
							  <small class="info help-block">
							   </small>
							</div>
							
							<label for="HKID" class="col-sm-2 control-label">HKID 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID', $doctor->HKID); ?>" >
							   <small class="info help-block">
							   </small>
							</div>
						 </div>

						 

						 <!-- Specialty 1, 2 input field -->
						 <div class="form-group ">
							<label for="SP_CODE1" class="col-sm-2 control-label">Specialty
							</label>
							<?php
								if ($doctor->SP_CODE1 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE1);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code1 = "1: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code1 = "1: ".$doctor->SP_CODE1;
									}
									
								}else{
									$sp_code1 = "1: NONE";
								}
								
								if ($doctor->SP_CODE2 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE2);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code2 = "2: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code2 = "2: ".$doctor->SP_CODE2;
									}
								}else{
									$sp_code2 = "2: NONE";
								}
							?>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?= $sp_code1; ?>" >   
								<small class="info help-block">
								</small>
							</div>
							
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?= $sp_code2; ?>" >   
								<small class="info help-block">
								</small>
							</div>
						</div>
						
						<!--Specialty 1, 2 checkbox-->
						<div class="form-group ">	
							<label class="col-sm-2"></label>
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE1 != "" && $doctor->MEDICAL_PROCEDURES != "" && $doctor->MEDICAL_PROCEDURES != NULL){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE1);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
							
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE2 != "" && $doctor->MEDICAL_PROCEDURES != "" && $doctor->MEDICAL_PROCEDURES != NULL){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE2);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
						</div>
						
						<!-- Specialty 3, 4 input field -->
						
						<div class="form-group ">
							<label class="col-sm-2">
							</label>
							<?php
								if ($doctor->SP_CODE3 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE3);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code3 = "3: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code3 = "3: ".$doctor->SP_CODE3;
									}
								}else{
									$sp_code3 = "3: NONE";
								}
								
								if ($doctor->SP_CODE4 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE4);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code4 = "4: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code4 = "4: ".$doctor->SP_CODE4;
									}
								}else{
									$sp_code4 = "4: NONE";
								}
							?>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?= $sp_code3; ?>" >   
								<small class="info help-block">
								</small>
							</div>
							
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?= $sp_code4; ?>" >   
								<small class="info help-block">
								</small>
							</div>
						</div>
						
						<!-- Specialty 3, 4 checkbox -->
						
						<div class="form-group ">	
							<label class="col-sm-2"></label>
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE3 != "" && $doctor->MEDICAL_PROCEDURES != ""){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE3);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
							
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE4 != "" && $doctor->MEDICAL_PROCEDURES != ""){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE4);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
						</div>
						
						<small class="info help-block">　</small>
						
						<div class="form-group ">
							<label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
							</label>
							<div class="col-sm-4">
								<textarea rows="8" cols="120" disabled><?php 
										if ($has_admission){
											$admission = explode(", ", $doctor->ADMISSION_RIGHT);
											foreach ($admission as $ar){
												$this->db->where("SHORT_NAME", $ar);
												$query = $this->db->get("ADMISSION_RIGHT")->row();
												echo $query->HOSPITAL_NAME." (".$query->SHORT_NAME.") \n";
											}
										}
									?>
								</textarea>
							</div>
							

						</div>
												 <small class="info help-block">　</small>

						<div class="form-group">
							<label for="REMARK" class="col-sm-2 control-label">Remark
							</label>
							<div class="col-sm-4">
								<textarea rows="5" cols="120" id="REMARK" name="REMARK" ><?= set_value('REMARK', $doctor->REMARK); ?></textarea>
								<small class="info help-block">
							   </small>
							</div>
						</div>

                        <hr>

                     </div>
                     <!-- End Doctor info 1 --> 

				  </div>
				  
        </div><!-- End Doctor div-->
     
     <?php if($has_center){; ?>
          <div id="centerDetailDiv">
          <?php foreach ($doctor_center as $center1): ?>
              	<div class="form-horizontal">
`	  	       <div class="form-group">
         	   	<label for="" class="col-sm-2 control-label">Center ID</label>	
         	     <div class="col-sm-8">
					<input type="text" value="<?= $center1->CENTER_CODE; ?>" class="form-control" readonly>
					  <small class="info help-block">
							  </small>
				 </div>
         	   </div>
         	   <div class="form-group">
         	   	<label for="" class="col-sm-2 control-label">Center Name </label>	
         	     <div class="col-sm-8">
					<input type="text" value="<?php echo  $center1->E_NAME . "   ". $center1->C_NAME; ?>" class="form-control">
					  <small class="info help-block">
							  </small>
				 </div>
         	   </div>


         	   	   <div class="form-group">
         	   	<label for="" class="col-sm-2 control-label">Tel</label>	
         	     <div class="col-sm-8">
					<input type="text" value="<?= $center1->TEL;?>" class="form-control">
					  <small class="info help-block">
							  </small>
				 </div>

         	   </div>
         	     	   <div class="form-group">
         	   	<label for="" class="col-sm-2 control-label">Fax</label>	
         	     <div class="col-sm-8">
					<input type="text" value="<?= $center1->FAX;?>" class="form-control">
					  <small class="info help-block">
							  </small>
				 </div>
         	   </div>
         	     	   <div class="form-group">
         	   	<label for="" class="col-sm-2 control-label">English Address</label>	
         	     <div class="col-sm-8">
					<textarea class="form-control" value="" rows="3"><?= $center1->E_ADDR1."\n". $center1->E_ADDR2 ."\n".$center1->E_ADDR3;?></textarea>
					  <small class="info help-block">
							  </small>
				 </div>
         	   </div>
         	   <div class="form-group">
         	   	<label for="" class="col-sm-2 control-label">Chinese Address</label>	
         	     <div class="col-sm-8">
					<textarea class="form-control" value="" rows="3"><?= $center1->C_ADDR1."\n". $center1->C_ADDR2 . "\n" .$center1->C_ADDR3;?></textarea>
					  <small class="info help-block">
							  </small>
				 </div>
         	   </div>
         	   <hr>
         	   </div>
         	   	<?php endforeach;  ?>
		        <?php  }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This Doctor has NO  center</div>'; } ?>

            </div>

      
			<div id="consultDiv">
				<?php if ($has_center && $has_consult) {;  ?>
					<div class="form-horizontal" name="form_doctor" id="form_doctor" >
				
			
						<div class="form-group">
							<label for="CONSULT_CENTER_CODE" class="col-sm-2 control-label">Center Name </label>					   
					
						   <div class="col-sm-4">
							   <select class="form-control chosen chosen-select-deselect" name="CONSULT_CENTER_CODE" id="CONSULT_CENTER_CODE">
				
								  <?php  foreach ($doctor_center as $center2): ?>
								   <option <?= $center2->CENTER_CODE == $doctor_consult_hour->CENTER_CODE ? 'selected' : ''; ?> value="<?= $center2->CENTER_CODE; ?>"><?= $center2->E_NAME; ?></option>
								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
							  </small>
						   </div>

						     <label for="CONTACT_PERSON" class="col-sm-1 control-label">Tel
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control cust-consult-reset" name="CENTER_TEL" id="CENTER_TEL" value="<?= $doctor_consult_hour->TEL; ?>">
							  <small class="info help-block">
							  </small>
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
						 
						    </div>
						<!--	Schedule day 1	-->
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
	                </div>
	                <?php } else {echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This Doctor has NO consulting hour record</div>'; }?>
				</div>

			   <!---End Consultation div-->

			 		   
			     <!--Payment-->
			   <div id="paymentDiv">
		
					<div class="form-horizontal" name="form_payment" id="form_payment" >

				    <?php if ($has_center && $has_payment){ ?>

						<div class="form-group">
							<label for="PAY_CENTER_CODE" class="col-sm-2 control-label">Center Name </label>					   
					
						   <div class="col-sm-4">
							   <select class="form-control chosen chosen-select-deselect" name="PAY_CENTER_CODE" id="PAY_CENTER_CODE">
				
								  <?php  foreach ($doctor_center as $center2): ?>
								   <option <?= $center2->CENTER_CODE == $doctor_consult_hour->CENTER_CODE ? 'selected' : ''; ?> value="<?= $center2->CENTER_CODE; ?>"><?= $center2->E_NAME; ?></option>
								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
							  </small>
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
							  <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?=(!$has_payment)?"(The doctor has no Cheque payment information in this centre)" : $doctor_payment->PAYEE_NAME ; ?>" > 
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR1:""; ?>" >
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR2:""; ?>" >
							<small class="info help-block">
								  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR3:""; ?>" >
							<small class="info help-block">
								  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR4:""; ?>" >
							<small class="info help-block">
								  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= ($has_payment)?$doctor_payment->PAYEE_ADDR5:""; ?>" >
							<small class="info help-block">
								  </small>
						  </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
						   </label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= ($has_payment)?$doctor_payment->PAYEE_DISTRICT:""; ?>" >
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<hr>
						<div class="form-group ">
							<label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Auto Pay
							</label>
						 </div>
						<div class="form-group ">
						   <label for="BANK_CLEARING_CODE" class="col-sm-2 control-label">Bank
						   </label>
						   <div class="col-sm-8">
							  <div>

								<input type="text" class="form-control" id="BANK_CLEARING_CODE"
								 value="<?= ($auto_pay)?$doctor_payment->C_NAME."\x20\x20\x20" .$doctor_payment->E_NAME:"The Doctor has no AUTO PAYMENT method in this center"; ?>" >
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
								 <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" value="<?= ($auto_pay)?$doctor_payment->ACCOUNT_NO:""; ?>" >
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
								 <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER" value="<?= ($auto_pay)?$doctor_payment->ACCOUNT_HOLDER:""; ?>" >
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						</div>
						
						<hr>

				  		<?php }else{ echo '<strong class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has NO payment method</strong>'; } ?>
				  </div>

				</div>

			   <!--End Payment-->

			   <!--Partners cards-->
			   <div id="cardDiv">
			   	 <?php  if ($has_cards){ ?>
			     <div class="table-responsive">
			     	<table class="table table-bordered dataTable my-table">
			     		    <thead>
		                        <tr class="">
		                           <th>Partner Doctor Code</th>
		                           <th>Company ID</th> 
		                           <th>Card Type</th>
		                           <th>TYPE</th>
		                           <th>Location Code</th>
		                           <th>Center Code</th>
		                           <th>Term date</th>
		                        </tr>
		                     </thead>
		                       <tbody id="tbody_doctor" class="cust-sp">
								 <?php 
		                       foreach($cards as $card): ?>
		                        <tr> 
		                           <td><?= _ent($card->PARTNER_DR_CODE); ?></td> 
		                           <td><?= _ent($card->COM_ID); ?></td>
		                           <td><?= _ent($card->CARD_CODE); ?></td>
		                           <td><?php echo $card->TYPE1." / ".$card->TYPE2;?></td>
		                           <td><?= _ent($card->LOC_CODE); ?></td> 
		                           <td><?= _ent($card->CENTER_CODE); ?></td>
		                           <td><?= _ent($card->TERM_DATE); ?></td> 
		                        </tr>
		                      <?php endforeach; ?>
							 </tbody>
			     	</table>
	
			     </div>
		    	   <?php }else{echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has No Card</div>'; }?> 
			   </div>
			   <!--END Partners-->

               <!--Doctor Agreed Fee-->
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

									   <td><?= $doctor_special_fee->c_E_DISTRICT?></td> 
									   <td><?= $doctor_special_fee->d_REMARK; ?></td> 
									   <td><?= $doctor_special_fee->d_LAST_UPDATE; ?></td>
									</tr>
								<?php } ?>
							 </tbody>
							
					     </table>
					   </div>
					    <?php }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has No agreed fee</div>'; } ?>
               </div>
               <!--END DOCTOR agreed Fee-->

			   <!---Qualification div -->
			   <div id="qualiDiv">
			   
					<div class="form-horizontal" name="form_doctor_qualification" id="form_doctor_qualification" >
					<?php if ($has_quali){ ?>
					
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Qualification </label>

                        <div class="col-sm-5">
                           <select class="form-control chosen chosen-select-deselect" name="QUALIFICATION" id="QUALIFICATION">
							   <?php foreach ($doctor_qualification2 as $index=>$quali): ?>
							   <option <?= $index == 0 ? "selected" : ""; ?> value="<?= $quali->QUALIFICATION; ?>"><?= $quali->QUALIFICATION; ?> (<?= $quali->CERT_YEAR; ?>)</option>
							   <?php endforeach; ?>  
						   </select>
						   <small class="info help-block">　</small>
                        </div>
                             <label for="content" class="col-sm-1 control-label">Cert Year </label>

                        <div class="col-sm-2">
							<input type="text" class="form-control cust-quali-reset" name="CERT_YEAR" id="CERT_YEAR" value="<?= $doctor_qualification->CERT_YEAR; ?>" disabled> 
							<small class="info help-block">　</small>
						</div>
                    </div>
					
			
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Cert Copy </label>
                        <div class="col-sm-8">
                             <?php if (is_image($doctor_qualification->CERT_COPY)): ?>
                              <a class="fancybox" id="fancy_CERT_COPY" rel="group" href="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                <img id="img_CERT_COPY" src="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>" class="image-responsive" alt="image doctor_qualification" title="cert copy" width="80px">
                              </a>
                              <?php else: ?>
                              <label>
                               <a id="href_CERT_COPY" href="<?= BASE_URL . 'administrator/file/download/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                 <img id="img_CERT_COPY2" src="<?= get_icon_file($doctor_qualification->CERT_COPY); ?>" class="image-responsive" alt="image doctor_qualification" title="cert copy <?= $doctor_qualification->CERT_COPY; ?>" width="80px"> 
                               <?= $doctor_qualification->CERT_COPY ?>
                               </a>
                               </label>
                              <?php endif; ?>
							  <small class="info help-block">　</small>
                        </div>
                    </div>
					
					<hr>
				
					<?php }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has NO  qualification</div>'; } ?>
                    
                  </div>
               </div>
			   <!--End Qualification div ->

				<!-Website-->
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
						
						<?php }else{ echo '<div class="col-sm-4 col-sm-offset-4 lead text-info">This doctor has No website account</div>'; } ?>
					</div>
				</div>
				
			   <br>
	         <div class="view-nav col-sm-12">
					  <?php is_allowed('doctor_update', function($doctor) use ($doctor){?>
					  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor" href="<?= site_url('administrator/doctor/edit/'.$doctor->DR_CODE); ?>"><i class="fa fa-edit" ></i> Edit Doctor</a><?php }) ?>
					  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
					</div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
   </section>
<!-- /.content -->
   <script>
   $(document).ready(function(){
		
	   jQuery(window).on("load", function(){
			$("#paymentDiv").hide();
		   $("#consultDiv").hide();
		   $("#qualiDiv").hide();
		   $("#Doctor_Agreed_Fee").hide();
		   $("#websiteDiv").hide();
		   $("#centerCodeDiv").hide();
		   $('#cardDiv').hide();
		   $('#centerDetailDiv').hide();

		});

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

					}

				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
			
		});
		
		$('#PAY_CENTER_CODE').change(function(){
		    var dr_code = $("#DR_CODE").val();
			var center_code = $("#PAY_CENTER_CODE").val();
			
			// $("#CENTER_CODE").prop("disabled", true).trigger('chosen:updated');
			 
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
                        	$("#BANK_CLEARING_CODE").val(payment.C_NAME +' ' +payment.E_NAME);
	                        $("#ACCOUNT_NO").val(payment.ACCOUNT_NO);
	                        $("#ACCOUNT_HOLDER").val(payment.ACCOUNT_HOLDER);
                        }else{
                        	$("#BANK_CLEARING_CODE").val("");
	                        $("#ACCOUNT_NO").val("");
	                        $("#ACCOUNT_HOLDER").val("");
                        }

                    }else{
                    	$('#paymentDiv input').val("");
                    }

				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})

		});

		$("#QUALIFICATION").change(function() {
			
			var dr_code = $("#DR_CODE").val();
			var quali = $("#QUALIFICATION").val();
			
			$("#QUALIFICATION").prop("disabled", true).trigger('chosen:updated');
			
			$.ajax({
				type: "GET",
				url: BASE_URL + '/administrator/doctor/view_quali/',
				dataType: "json",
				data: {dr_code: dr_code, quali: quali},
				success: function(data) {
					$('.cust-quali-reset').val("");
					$('.cust-quali-reset').text("");
					
					var value = data['specific_quali'];
					
					$('#CERT_YEAR').val(value.CERT_YEAR);
					
					$('#fancy_CERT_COPY').prop("href", "<?= BASE_URL . 'uploads/doctor_qualification/'; ?>"+value.CERT_COPY);
					$('#img_CERT_COPY').attr("src", "<?= BASE_URL . 'uploads/doctor_qualification/'; ?>" + value.CERT_COPY);

					$('#href_CERT_COPY').prop("href", "<?= BASE_URL . 'administrator/file/download/doctor_qualification/'; ?>" + value.CERT_COPY);
					$('#href_CERT_COPY').text(value.CERT_COPY);
					
					
					$('#img_CERT_COPY2').attr("title", "cert copy " + value.CERT_COPY);
					
					$('#quali_creator').text(value.CREATOR);
					$('#quali_create_date').text(value.CREATE_DATE);
					$('#quali_last_modifier').text(value.LAST_MODIFIER);
					$('#quali_last_update').text(value.LAST_UPDATE);
					
					
					$("#QUALIFICATION").prop("disabled", false).trigger('chosen:updated');
					
				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
		});

		$("#CARD_CARD_CODE").change(function() {
			
			var dr_code = $("#DR_CODE").val();
			var CARD_CODE = $("#CARD_CARD_CODE").val();
			
			$("#CARD_CARD_CODE").prop("disabled", true).trigger('chosen:updated');
			
			$(".cust-sp").html("");
			
			$('.cust-card-reset-select-1')[0].selectedIndex = -1;
			$('.cust-card-reset-select-1').attr("data-placeholder", "　");
			$('.cust-card-reset-select-1').prop("disabled", true).trigger('chosen:updated');
			
			$('.cust-card-reset-select-1').empty();
			$('.cust-card-reset-input-1').val("");
			
			if (CARD_CODE != ""){
			
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/view_partner/',
					dataType: "json",
					data: {dr_code: dr_code, CARD_CODE: CARD_CODE},
					success: function(data) {

						var partner_doctor = data['partner_doctor'];
						var specific_partner_card = data['specific_partner_card'];
						
						$.each(specific_partner_card, function(index, val) {
							$('#PARTNER_CLASS_DESC').append("<option value='" + val.CLASS_CODE + "'>" + 
							val.CLASS_DESC + " &nbsp; (Card No: " + val.CLASS_CODE + ") &nbsp; - &nbsp; " + 
							val.STATUS + "</option>");
						});
						
						$("#PARTNER_DR_CODE").val(partner_doctor.PARTNER_DR_CODE);
						$("#LOC_CODE").val(partner_doctor.LOC_CODE);
						$("#doctor_card_START_DATE").val(specific_partner_card[0].START_DATE);
						$("#doctor_card_TERM_DATE").val(specific_partner_card[0].TERM_DATE);
						
						if (data['has_sp_fee']){
							$.each(data['special_fee'], function(index, val) {
								var sp_table = $('.cust-sp').html();
								var agreed_pay = "0";
								
								$.each(data['agreed_fee'], function(idx, value) {
									if (value.TYPE == val.TYPE && value.MED_DAYS == val.MED_DAYS){
										agreed_pay = value.PAY;
									}
								});
								
								
								$('.cust-sp').html(sp_table + "<tr><td>" + val.TYPE + "</td>" + 
								"<td>" + val.MED_DAYS + "</td>" + 
								"<td>$" + agreed_pay + "</td>" + 
								"<td>$" + val.SPECIAL_FEE + "</td>" + 
								"<td style='color:red;'>$" + (parseInt(agreed_pay) + parseInt(val.SPECIAL_FEE)) + "</td>" + 
								"<td>" + val.REMARK + "</td>" + 
								"<td>" + val.CREATOR + "</td>" + 
								"<td>" + val.CREATE_DATE + "</td>" + 
								"<td>" + val.LAST_MODIFIER + "</td>" + 
								"<td>" + val.LAST_UPDATE + "</td>" + "</tr>");
							});
							
						}else{
							$(".cust-sp").html("<tr><td>No special fee in this card</td></tr>");
						}

						$("#CARD_CARD_CODE").prop("disabled", false).trigger('chosen:updated');
						
						$("#PARTNER_CLASS_DESC").prop("disabled", false);
						$("#PARTNER_CLASS_DESC").attr("data-placeholder", "Select an option").trigger('chosen:updated');

					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}
			
		});
		
		$("#PARTNER_CLASS_DESC").change(function() {
			var dr_code = $("#DR_CODE").val();
			var CARD_CODE = $("#CARD_CARD_CODE").val();
			var card_no = $("#PARTNER_CLASS_DESC").val();
			
			$("#CARD_CARD_CODE").prop("disabled", true).trigger('chosen:updated');
			$("#PARTNER_CLASS_DESC").prop("disabled", true).trigger('chosen:updated');
			
			$(".cust-sp").html("");
			
			$('.cust-card-reset-input-2').val("");
			
			if (card_no != ""){
				
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/view_card/',
					dataType: "json",
					data: {dr_code: dr_code, CARD_CODE: CARD_CODE, card_no: card_no},
					success: function(data) {
						
						if (data['has_sp_fee']){
							$.each(data['special_fee'], function(index, val) {
								var sp_table = $('.cust-sp').html();
								var agreed_pay = "0";
								
								$.each(data['agreed_fee'], function(idx, value) {
									if (value.TYPE == val.TYPE && value.MED_DAYS == val.MED_DAYS){
										agreed_pay = value.PAY;
									}
								});
								
								
								$('.cust-sp').html(sp_table + "<tr><td>" + val.TYPE + "</td>" + 
								"<td>" + val.MED_DAYS + "</td>" + 
								"<td>$" + agreed_pay + "</td>" + 
								"<td>$" + val.SPECIAL_FEE + "</td>" + 
								"<td style='color:red;'>$" + (parseInt(agreed_pay) + parseInt(val.SPECIAL_FEE)) + "</td>" + 
								"<td>" + val.REMARK + "</td>" + 
								"<td>" + val.CREATOR + "</td>" + 
								"<td>" + val.CREATE_DATE + "</td>" + 
								"<td>" + val.LAST_MODIFIER + "</td>" + 
								"<td>" + val.LAST_UPDATE + "</td>" + "</tr>");
							});
							
						}else{
							$(".cust-sp").html("<tr><td>No special fee in this card</td></tr>");
						}
					
					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}
				})

			}else{
				$('.cust-card-reset-input-2').val("");
				$(".cust-sp").html("");
			}
			
			$("#CARD_CARD_CODE").prop("disabled", false).trigger('chosen:updated');
			$("#PARTNER_CLASS_DESC").prop("disabled", false).trigger('chosen:updated');
		
		});
		
		
		$("#WEBSITE_CARD_CODE").change(function() {
			
			var dr_code = $("#DR_CODE").val();
			var CARD_CODE = $("#WEBSITE_CARD_CODE").val();
			
			$("#WEBSITE_CARD_CODE").prop("disabled", true).trigger('chosen:updated');
			
			$.ajax({
				type: "GET",
				url: BASE_URL + '/administrator/doctor/view_website/',
				dataType: "json",
				data: {dr_code: dr_code, CARD_CODE: CARD_CODE},
				success: function(data) {
					$('.cust-website-reset').val("");
					
					var value = data['specific_website'];
					
					$('#WEBSITE_ACCOUNT').val(value.WEBSITE_ACCOUNT);
					$('#WEBSITE_PASSWORD').val(value.WEBSITE_PASSWORD);

					$("#WEBSITE_CARD_CODE").prop("disabled", false).trigger('chosen:updated');
					
				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
		});

	   $('#doctor_tab').on('click',function(){
			  $('#doctorDiv').show();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#Doctor_Agreed_Fee').hide();
			  $('#websiteDiv').hide();
			  $("#centerCodeDiv").hide();
			  $('#cardDiv').hide();
			  $('#centerDetailDiv').hide();

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
			  $('#doctorDiv').hide();
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
				
   });
   </script>
