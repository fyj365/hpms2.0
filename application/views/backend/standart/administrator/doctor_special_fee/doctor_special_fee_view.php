
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor Special Fee      <small>Detail Doctor Special Fee</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor_special_fee'); ?>">Doctor Special Fee</a></li>
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
                     <h3 class="widget-user-username">Doctor Special Fee</h3>
                     <h5 class="widget-user-desc">Detail Doctor Special Fee</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_doctor_special_fee" id="form_doctor_special_fee" >					
					<div class="form-group ">
					   <label for="AUTO_NO" class="col-sm-2 control-label">Auto No
					   </label>
					   <div class="col-sm-8 cust-required-select">
						  <input type="text" class="form-control" name="AUTO_NO" id="AUTO_NO" value="<?= set_value('AUTO_NO', $doctor_special_fee->AUTO_NO); ?>" readonly>
						  <small class="info help-block">
						  </small>
						</div>
					</div>
					
					<div class="form-group ">
					   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
					   </label>
					   <div class="col-sm-8 cust-required-select">
						  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor_special_fee->DR_CODE); ?>" readonly>
						  <small class="info help-block">
						  </small>
						</div>
					</div>
					
					<div class="form-group ">
						 <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
					   </label>
					   <div class="col-sm-8 cust-required-select">
							<input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= set_value('CARD_CODE', $doctor_special_fee->CARD_CODE); ?>" readonly>
						  
						  <small class="info help-block">
						  </small>
					   </div>

					</div>
					
					<div class="form-group" >
						<label for="CLASS_CODE" class="col-sm-2 control-label">Card Type 
						</label>
						<?php
							$this->db->where("CARD_CODE", $doctor_special_fee->CARD_CODE);
							$this->db->where("CLASS_CODE", $doctor_special_fee->CLASS_CODE);
							
							$CLASS_DESC = $this->db->get("partner_card")->row();
							
						?>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE" value="<?= $doctor_special_fee->CLASS_CODE; ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
					
						<label for="CLASS_DESC" class="col-sm-2 control-label">Card Name 
						</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="CLASS_DESC" id="CLASS_DESC" value="<?= $CLASS_DESC->CLASS_DESC; ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
					</div>
					
					<div class="form-group" >
						<label class="col-sm-2 control-label">Type 
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?= $doctor_special_fee->TYPE; ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
					</div>
					
					<div class="form-group" >
						<label class="col-sm-2 control-label">Med Days
						</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?= $doctor_special_fee->MED_DAYS; ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
					</div>
					
					<div class="form-group" >
						<label class="col-sm-2 control-label">Agreed pay to Dr 
						</label>
						<?php 
							$this->db->where("CARD_CODE", $doctor_special_fee->CARD_CODE);
							$this->db->where("CLASS_CODE", $doctor_special_fee->CLASS_CODE);
							$this->db->where("TYPE", $doctor_special_fee->TYPE);
							$this->db->where("MED_DAYS", $doctor_special_fee->MED_DAYS);
							$agreed_fee = $this->db->get("agreed_fee")->row();
					   ?>
						<div class="col-sm-8">
							<input type="text" class="form-control" value="<?= "$" . $agreed_fee->PAY ; ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
					
						
					</div>
					
					<div class="form-group" >
						<label class="col-sm-2 control-label">Special Fee
						</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" value="<?= "$" . $doctor_special_fee->SPECIAL_FEE; ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
						
						<label class="col-sm-2 control-label">After calculated
						</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" style="color:red;" value="<?= "$".($agreed_fee->PAY + $doctor_special_fee->SPECIAL_FEE); ?>" readonly>
							<small class="info help-block">
							</small>
						</div>
					</div>
					
					<hr>
					
					<div class="form-group ">
					   <label for="content" class="col-sm-2 control-label">Creator</label>
					   <div class="col-sm-1">
						  <p id="quali_creator" class="cust-quali-reset"><?= _ent($doctor_special_fee->CREATOR); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					   
					   <label for="content" class="col-sm-2 control-label">Create Date</label>
					   <div class="col-sm-2">
						  <p id="quali_create_date" class="cust-quali-reset"><?= _ent($doctor_special_fee->CREATE_DATE); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					  
					</div>
					
					<div class="form-group ">
					   <label for="content" class="col-sm-2 control-label">Last Modifier</label>
					   <div class="col-sm-1">
						  <p id="quali_last_modifier" class="cust-quali-reset"><?= _ent($doctor_special_fee->LAST_MODIFIER); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					   
					   <label for="content" class="col-sm-2 control-label">Last Update</label>
					   <div class="col-sm-2">
						  <p id="quali_last_update" class="cust-quali-reset"><?= _ent($doctor_special_fee->LAST_UPDATE); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					</div>
				   
				  </div>
                                       
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('doctor_special_fee_update', function($doctor_special_fee) use ($doctor_special_fee){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor_special_fee" href="<?= site_url('administrator/doctor_special_fee/edit/'.$doctor_special_fee->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Doctor Special Fee</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor_special_fee/'); ?>"><i class="fa fa-undo" ></i> Go Doctor Special Fee List</a>
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
