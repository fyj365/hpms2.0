
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor Consult Hour      <small>Detail Doctor Consult Hour</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor_consult_hour'); ?>">Doctor Consult Hour</a></li>
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
                     <h3 class="widget-user-username">Doctor Consult Hour</h3>
                     <h5 class="widget-user-desc">Detail Doctor Consult Hour</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_doctor_consult_hour" id="form_doctor_consult_hour" >

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_consult_hour->DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Center Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_consult_hour->CENTER_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Contact Person </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_consult_hour->CONTACT_PERSON); ?>
                        </div>
                    </div>
					
					<hr>
					
					<div class="form-group">
						<div class="col-sm-1"></div>
						<div class="col-sm-5">
					
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Opening hours 1 </label>

								<div class="col-sm-8">
								   <?= _ent($doctor_consult_hour->SCHEDULE_DAY_C1)." &nbsp; "._ent($doctor_consult_hour->SCHEDULE_DAY_E1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Timeslot</label>

								<div class="col-sm-8">
								   <?= "1: &nbsp "._ent($doctor_consult_hour->TIMESLOT1_1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "2: &nbsp "._ent($doctor_consult_hour->TIMESLOT1_2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "3: &nbsp "._ent($doctor_consult_hour->TIMESLOT1_3); ?>
								</div>
							</div>
							
							<br>
							
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Opening hours 2 </label>

								<div class="col-sm-8">
								   <?= _ent($doctor_consult_hour->SCHEDULE_DAY_C2)." &nbsp; "._ent($doctor_consult_hour->SCHEDULE_DAY_E2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Timeslot</label>

								<div class="col-sm-8">
								   <?= "1: &nbsp "._ent($doctor_consult_hour->TIMESLOT2_1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "2: &nbsp "._ent($doctor_consult_hour->TIMESLOT2_2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "3: &nbsp "._ent($doctor_consult_hour->TIMESLOT2_3); ?>
								</div>
							</div>
							
							<br>
							
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Opening hours 3 </label>

								<div class="col-sm-8">
								   <?= _ent($doctor_consult_hour->SCHEDULE_DAY_C3)." &nbsp; "._ent($doctor_consult_hour->SCHEDULE_DAY_E3); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Timeslot</label>

								<div class="col-sm-8">
								   <?= "1: &nbsp "._ent($doctor_consult_hour->TIMESLOT3_1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "2: &nbsp "._ent($doctor_consult_hour->TIMESLOT3_2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "3: &nbsp "._ent($doctor_consult_hour->TIMESLOT3_3); ?>
								</div>
							</div>
						</div>
						
						
						<div class="col-sm-5">
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Opening hours 4 </label>

								<div class="col-sm-8">
								   <?= _ent($doctor_consult_hour->SCHEDULE_DAY_C4)." &nbsp; "._ent($doctor_consult_hour->SCHEDULE_DAY_E4); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Timeslot</label>

								<div class="col-sm-8">
								   <?= "1: &nbsp "._ent($doctor_consult_hour->TIMESLOT4_1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "2: &nbsp "._ent($doctor_consult_hour->TIMESLOT4_2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "3: &nbsp "._ent($doctor_consult_hour->TIMESLOT4_3); ?>
								</div>
							</div>
							
							<br>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Opening hours 5 </label>

								<div class="col-sm-8">
								   <?= _ent($doctor_consult_hour->SCHEDULE_DAY_C5)." &nbsp; "._ent($doctor_consult_hour->SCHEDULE_DAY_E5); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Timeslot</label>

								<div class="col-sm-8">
								   <?= "1: &nbsp "._ent($doctor_consult_hour->TIMESLOT5_1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "2: &nbsp "._ent($doctor_consult_hour->TIMESLOT5_2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "3: &nbsp "._ent($doctor_consult_hour->TIMESLOT5_3); ?>
								</div>
							</div>
							
							<br>
							
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Opening hours 6 </label>

								<div class="col-sm-8">
								   <?= _ent($doctor_consult_hour->SCHEDULE_DAY_C6)." &nbsp; "._ent($doctor_consult_hour->SCHEDULE_DAY_E6); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label">Timeslot</label>

								<div class="col-sm-8">
								   <?= "1: &nbsp "._ent($doctor_consult_hour->TIMESLOT6_1); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "2: &nbsp "._ent($doctor_consult_hour->TIMESLOT6_2); ?>
								</div>
							</div>
												 
							<div class="form-group ">
								<label for="content" class="col-sm-4 control-label"></label>

								<div class="col-sm-8">
								   <?= "3: &nbsp "._ent($doctor_consult_hour->TIMESLOT6_3); ?>
								</div>
							</div>
						</div>
					</div>
					
					
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('doctor_consult_hour_update', function($doctor_consult_hour) use ($doctor_consult_hour){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor_consult_hour" href="<?= site_url('administrator/doctor_consult_hour/edit/'.$doctor_consult_hour->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Doctor Consult Hour</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor_consult_hour/'); ?>"><i class="fa fa-undo" ></i> Go Doctor Consult Hour List</a>
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
