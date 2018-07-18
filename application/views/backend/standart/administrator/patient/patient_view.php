
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Patient      <small>Detail Patient</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/patient'); ?>">Patient</a></li>
      <li class="active">Detail</li>
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
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Patient</h3>
                     <h5 class="widget-user-desc">Detail Patient</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_patient" id="form_patient" >
                   <div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Patient Details
						   </label>
						   <small class="info help-block">
							  </small>
						</div>
						<div class="form-group ">
						   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= set_value('CARD_CODE', $patient->CARD_CODE); ?>" readonly> 
								<small class="info help-block">
							  </small>
						   </div>
						   
						   <label for="PATIENT_NAME" class="col-sm-2 control-label">Patient Name 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control" name="PATIENT_NAME" id="PATIENT_NAME" value="<?= set_value('PATIENT_NAME', $patient->PATIENT_NAME); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="POLICY_NO" class="col-sm-2 control-label">Policy No 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control" name="POLICY_NO" id="POLICY_NO" value="<?= set_value('POLICY_NO', $patient->POLICY_NO); ?>" readonly> 
								<small class="info help-block">
							  </small>
						   </div>
						   
						   <label for="GENDER" class="col-sm-2 control-label">Gender 
						   </label>
						   <div class="col-sm-3">
								<input type="text" class="form-control" name="GENDER" id="GENDER" value="<?= set_value('GENDER', $patient->GENDER); ?>" readonly>
							  <small class="info help-block">
							  </small>
							</div>
						</div>
						   
						<div class="form-group ">
						   <label for="DEPD_CODE" class="col-sm-2 control-label">Dependant Code 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control" name="DEPD_CODE" id="DEPD_CODE" value="<?= set_value('DEPD_CODE', $patient->DEPD_CODE); ?>" readonly> 
							  <small class="info help-block">
							  </small>
						   </div>
						   
						   <label for="DOB" class="col-sm-2 control-label">DOB 
						   </label>
						   <div class="col-sm-3">
								 <input type="text" class="form-control pull-right datepicker" name="DOB" id="DOB" value="<?= set_value('DOB', $patient->DOB); ?>" readonly>
								 <small class="info help-block">
								 </small>
							</div>
						</div>
						
						<div class="form-group ">
						   <label for="PATIENT_NO" class="col-sm-2 control-label check_duplicate" required>Patient No
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control" name="PATIENT_NO" id="PATIENT_NO" value="<?= set_value('PATIENT_NO', $patient->PATIENT_NO); ?>" readonly> 
								<small class="info help-block">
							  </small>
						   </div>
						   
						   <label for="HKID" class="col-sm-2 control-label">HKID 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control" name="HKID" id="HKID" maxlength="9" value="<?= set_value('HKID', $patient->HKID); ?>" readonly>
								<small class="info help-block">
							  </small>
						  </div>
						</div>
						
						<div class="form-group ">
						   <label for="WAIVER_REFERRAL" class="col-sm-2 control-label">Waiver Referral 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="WAIVER_REFERRAL" id="WAIVER_REFERRAL" value="<?= set_value('WAIVER_REFERRAL', $patient->WAIVER_REFERRAL); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="REMARK" class="col-sm-2 control-label">Remark 
						   </label>
						   <div class="col-sm-8">
							  <textarea id="REMARK" name="REMARK" rows="5" class="textarea" disabled><?= set_value('REMARK', $patient->REMARK); ?></textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Copay & Extra Med Benefit
						   </label>
						</div>

						<div class="table-responsive" style="margin: 0px 80px;"> 
						  <table class="table table-bordered dataTable my-table">
							 <thead>
								<tr class="">
								   <th>GP Copay</th>
								   <th>SP Copay</th>
								   <th>HERB Copay</th>
								   <th>PHY Copay</th>
								   <th>GP Extra Med</th>
								   <th>SP Extra Med</th>
								   <th>HERB Extra Med</th>
								   <th>Clinical Procedures</th>
								</tr>
							 </thead>
							 <tbody id="tbody_doctor">
								<tr>
								   <td><?= $patient->GP_COPAY; ?></td> 
								   <td><?= $patient->SP_COPAY; ?></td> 
								   <td><?= $patient->HERB_COPAY; ?></td> 
								   <td><?= $patient->PHY_COPAY; ?></td> 
								   <td><input <?= $patient->GP_EXTRA_MED == 0 ? "" : "checked"; ?> type="checkbox" class="flat-red"><?= $patient->GP_EXTRA_MED_BENEFIT; ?></td> 
								   <td><input <?= $patient->SP_EXTRA_MED == 0 ? "" : "checked"; ?> type="checkbox" class="flat-red"><?= $patient->SP_EXTRA_MED_BENEFIT; ?></td> 
								   <td><input <?= $patient->HERB_EXTRA_MED == 0 ? "" : "checked"; ?> type="checkbox" class="flat-red"><?= $patient->HERB_EXTRA_MED_BENEFIT; ?></td> 
									<td><input <?= $patient->CLINICAL_PROCEDURES == 0 ? "" : "checked"; ?> type="checkbox" class="flat-red"></td>
								</tr>
							 </tbody>
						  </table>
						</div>

						
						
						
						<div class="form-group ">
						   <label class="col-sm-4" style="color:blue;">Patient Effective Date
						   </label>
						</div>
						<?php
						  $this->db->where('PATIENT_AUTONO', $patient->AUTO_NO);
						  $query = $this->db->get('patient_effective_date');
						  
						  if ($query->num_rows() > 0){
							  $has_effective = true;
							  $partner_contracts = $query->result();
						  }else{
							  $has_effective = false;
						  }
						?>
						<div class="table-responsive" style="margin: 0px 80px;"> 
						  <table class="table table-bordered dataTable my-table">
							 <thead>
								<tr class="">
								   <th>Effective No</th>
								   <th>Original Term Date</th>
								   <th>Start Date</th>
								   <th>Term Date</th>
								   <th>Status</th>
								   <th>Remark</th>
								   <th>Creator</th>
								   <th>Create Date</th>
								   <th>Last Modifier</th>
								   <th>Last Update</th>
								</tr>
							 </thead>
							 <tbody id="tbody_doctor">
							 <?php 
								if ($has_effective){
									foreach ($partner_contracts as $partner_contract) :
							 ?>
								<tr>
								   <td><?= $partner_contract->PATIENT_EFFECTIVE_NO; ?></td> 
								   <td><?= $partner_contract->ORIGINAL_TERM_DATE; ?></td> 
								   <td><?= $partner_contract->START_DATE; ?></td> 
								   <td><?= $partner_contract->TERM_DATE; ?></td> 
								   <td><?= $partner_contract->STATUS; ?></td> 
								   <td><?= $partner_contract->REMARK; ?></td>
								   <td><?= $partner_contract->CREATOR; ?></td>
								   <td><?= $partner_contract->CREATE_DATE; ?></td>
								   <td><?= $partner_contract->LAST_MODIFIER; ?></td>
								   <td><?= $partner_contract->LAST_UPDATE; ?></td>
								</tr>
							<?php
								endforeach; }else{ echo "<tr><td>This patient has no effective date record</tr></td>"; }
							?>
							 </tbody>
						  </table>
						</div>
						
						<br><br>

                    <div class="view-nav">
                        <?php is_allowed('patient_update', function($patient) use ($patient){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit patient" href="<?= site_url('administrator/patient/edit/'.$patient->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Patient</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/patient/'); ?>"><i class="fa fa-undo" ></i> Go Patient List</a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->