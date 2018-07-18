
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor Consult Hour        <small>Edit Doctor Consult Hour</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_consult_hour'); ?>">Doctor Consult Hour</a></li>
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
                            <h3 class="widget-user-username">Doctor Consult Hour</h3>
                            <h5 class="widget-user-desc">Edit Doctor Consult Hour</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/doctor_consult_hour/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_doctor_consult_hour', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_consult_hour', 
                            'method'  => 'POST'
                            ]); ?>
                         
                        <div class="form-group ">
								<label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
							   <i class="required">*</i>
							   </label>
							   <div class="col-sm-3">

								  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor_consult_hour->DR_CODE); ?>" readonly>
								  <small class="info help-block">
								  </small>
							   </div>
							

							   <label for="CENTER_NAME" class="col-sm-2 control-label">Center
								<i class="required">*</i>							   
							   </label>
							   <div class="col-sm-3">
							   	  <input type="hidden" class="form-control" name="CENTER_CODE" id="CENTER_CODE" value="<?= set_value('CENTER_CODE', $doctor_consult_hour->CENTER_CODE); ?>" readonly>

								   <input type="text" class="form-control" name="CENTER_NAME" id="CENTER_NAME" value="<?= set_value('CENTER_NAME', $doctor_consult_hour->E_NAME); ?>" readonly>
								  <small class="info help-block">
								  </small>
							   </div>

							 
							</div>
							
							
						 
                           <div class="form-group ">
							     <label for="CONTACT_PERSON" class="col-sm-2 control-label">Contact Person 
							   </label>
							   <div class="col-sm-3">
								  <input type="text" class="form-control" name="CONTACT_PERSON" id="CONTACT_PERSON" value="<?= set_value('CONTACT_PERSON', $doctor_consult_hour->CONTACT_PERSON); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							
							   
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
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期一至五" ? 'selected' :''; ?> value="星期一至五">星期一至五</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期六、日" ? 'selected' :''; ?> value="星期六、日" >星期六、日</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期一" ? 'selected' :''; ?> value="星期一">星期一</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期二" ? 'selected' :''; ?> value="星期二">星期二</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期三" ? 'selected' :''; ?> value="星期三">星期三</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期四" ? 'selected' :''; ?> value="星期四">星期四</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期五" ? 'selected' :''; ?> value="星期五">星期五</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期六" ? 'selected' :''; ?> value="星期六">星期六</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "星期日" ? 'selected' :''; ?> value="星期日">星期日</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "公眾假期" ? 'selected' :''; ?> value="公眾假期">公眾假期</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C1 == "其他" ? 'selected' :''; ?> value="其他">其他 (於Timeslot欄列明)</option>
									  </select>
									  <small class="info help-block">
									  </small>
								   </div>
								   <div class="col-sm-2">
									  <select class="form-control cust-schedule-day-e1 cust-required" name="SCHEDULE_DAY_E1[]" id="SCHEDULE_DAY_E1" >
										 <option value=""></option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Mon to Fri" ? 'selected' :''; ?> value="Mon to Fri">Mon to Fri</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Sat and Sun" ? 'selected' :''; ?> value="Sat and Sun">Sat and Sun</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Monday" ? 'selected' :''; ?> value="Monday">Monday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Tuesday" ? 'selected' :''; ?> value="Tuesday">Tuesday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Wednesday" ? 'selected' :''; ?> value="Wednesday">Wednesday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Thursday" ? 'selected' :''; ?> value="Thursday">Thursday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Friday" ? 'selected' :''; ?> value="Friday">Friday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Saturday" ? 'selected' :''; ?> value="Saturday">Saturday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Sunday" ? 'selected' :''; ?> value="Sunday">Sunday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Public holiday" ? 'selected' :''; ?> value="Public holiday">Public holiday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E1 == "Other" ? 'selected' :''; ?> value="Other">Other (Specify on Timeslot)</option>
									  </select>
									  <small class="info help-block">
									  </small>
								   </div>
								</div>
								
							   <div class="col-sm-4">
								  <input type="text" class="form-control cust-required" name="TIMESLOT1_1" id="TIMESLOT1_1" placeholder="Opening hours 1 : Timeslot 1" value="<?= set_value('TIMESLOT1_1', $doctor_consult_hour->TIMESLOT1_1); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							<div class="form-group">
							   <label class="col-sm-6"></label>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT1_2" id="TIMESLOT1_2" placeholder="Opening hours 1 : Timeslot 2" value="<?= set_value('TIMESLOT1_2', $doctor_consult_hour->TIMESLOT1_2); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							<div class="form-group ">
							   <label class="col-sm-6"></label>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT1_3" id="TIMESLOT1_3" placeholder="Opening hours 1 : Timeslot 3" value="<?= set_value('TIMESLOT1_3', $doctor_consult_hour->TIMESLOT1_3); ?>">
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
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期一至五" ? 'selected' :''; ?> value="星期一至五">星期一至五</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期六、日" ? 'selected' :''; ?> value="星期六、日" >星期六、日</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期一" ? 'selected' :''; ?> value="星期一">星期一</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期二" ? 'selected' :''; ?> value="星期二">星期二</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期三" ? 'selected' :''; ?> value="星期三">星期三</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期四" ? 'selected' :''; ?> value="星期四">星期四</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期五" ? 'selected' :''; ?> value="星期五">星期五</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期六" ? 'selected' :''; ?> value="星期六">星期六</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "星期日" ? 'selected' :''; ?> value="星期日">星期日</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "公眾假期" ? 'selected' :''; ?> value="公眾假期">公眾假期</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C2 == "其他" ? 'selected' :''; ?> value="其他">其他 (於Timeslot欄列明)</option>
									  </select>
									  <small class="info help-block">
									  </small>
								   </div>
								   <div class="col-sm-2">
									  <select class="form-control cust-schedule-day-e2" name="SCHEDULE_DAY_E2[]" id="SCHEDULE_DAY_E2" >
										 <option value=""></option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Mon to Fri" ? 'selected' :''; ?> value="Mon to Fri">Mon to Fri</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Sat and Sun" ? 'selected' :''; ?> value="Sat and Sun">Sat and Sun</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Monday" ? 'selected' :''; ?> value="Monday">Monday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Tuesday" ? 'selected' :''; ?> value="Tuesday">Tuesday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Wednesday" ? 'selected' :''; ?> value="Wednesday">Wednesday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Thursday" ? 'selected' :''; ?> value="Thursday">Thursday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Friday" ? 'selected' :''; ?> value="Friday">Friday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Saturday" ? 'selected' :''; ?> value="Saturday">Saturday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Sunday" ? 'selected' :''; ?> value="Sunday">Sunday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Public holiday" ? 'selected' :''; ?> value="Public holiday">Public holiday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E2 == "Other" ? 'selected' :''; ?> value="Other">Other (Specify on Timeslot)</option>
									  </select>
									  <small class="info help-block">
									  </small>
								   </div>
							   </div>
							   
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT2_1" id="TIMESLOT2_1" placeholder="Opening hours 2 : Timeslot 1" value="<?= set_value('TIMESLOT2_1', $doctor_consult_hour->TIMESLOT2_1); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							<div class="form-group ">
							   <label class="col-sm-6"></label>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT2_2" id="TIMESLOT2_2" placeholder="Opening hours 2 : Timeslot 2" value="<?= set_value('TIMESLOT2_2', $doctor_consult_hour->TIMESLOT2_2); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							<div class="form-group ">
							   <label class="col-sm-6"></label>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT2_3" id="TIMESLOT2_3" placeholder="Opening hours 2 : Timeslot 3" value="<?= set_value('TIMESLOT2_3', $doctor_consult_hour->TIMESLOT2_3); ?>">
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
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期一至五" ? 'selected' :''; ?> value="星期一至五">星期一至五</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期六、日" ? 'selected' :''; ?> value="星期六、日" >星期六、日</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期一" ? 'selected' :''; ?> value="星期一">星期一</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期二" ? 'selected' :''; ?> value="星期二">星期二</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期三" ? 'selected' :''; ?> value="星期三">星期三</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期四" ? 'selected' :''; ?> value="星期四">星期四</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期五" ? 'selected' :''; ?> value="星期五">星期五</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期六" ? 'selected' :''; ?> value="星期六">星期六</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "星期日" ? 'selected' :''; ?> value="星期日">星期日</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "公眾假期" ? 'selected' :''; ?> value="公眾假期">公眾假期</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C3 == "其他" ? 'selected' :''; ?> value="其他">其他 (於Timeslot欄列明)</option>
									  </select>
									  <small class="info help-block">
									  </small>
								   </div>
								   <div class="col-sm-2">
									  <select class="form-control cust-schedule-day-e3" name="SCHEDULE_DAY_E3[]" id="SCHEDULE_DAY_E3" >
										 <option value=""></option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Mon to Fri" ? 'selected' :''; ?> value="Mon to Fri">Mon to Fri</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Sat and Sun" ? 'selected' :''; ?> value="Sat and Sun">Sat and Sun</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Monday" ? 'selected' :''; ?> value="Monday">Monday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Tuesday" ? 'selected' :''; ?> value="Tuesday">Tuesday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Wednesday" ? 'selected' :''; ?> value="Wednesday">Wednesday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Thursday" ? 'selected' :''; ?> value="Thursday">Thursday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Friday" ? 'selected' :''; ?> value="Friday">Friday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Saturday" ? 'selected' :''; ?> value="Saturday">Saturday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Sunday" ? 'selected' :''; ?> value="Sunday">Sunday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Public holiday" ? 'selected' :''; ?> value="Public holiday">Public holiday</option>
										 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E3 == "Other" ? 'selected' :''; ?> value="Other">Other (Specify on Timeslot)</option>
									  </select>
									  <small class="info help-block">
									  </small>
								   </div>
								</div>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT3_1" id="TIMESLOT3_1" placeholder="Opening hours 3 : Timeslot 1" value="<?= set_value('TIMESLOT3_1', $doctor_consult_hour->TIMESLOT3_1); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							<div class="form-group ">
							   <label class="col-sm-6"></label>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT3_2" id="TIMESLOT3_2" placeholder="Opening hours 3 : Timeslot 2" value="<?= set_value('TIMESLOT3_2', $doctor_consult_hour->TIMESLOT3_2); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							<div class="form-group ">
							   <label class="col-sm-6"></label>
							   <div class="col-sm-4">
								  <input type="text" class="form-control" name="TIMESLOT3_3" id="TIMESLOT3_3" placeholder="Opening hours 3 : Timeslot 3" value="<?= set_value('TIMESLOT3_3', $doctor_consult_hour->TIMESLOT3_3); ?>">
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
										 <select class="form-control cust-schedule-day-c4 check-has-more" name="SCHEDULE_DAY_C4[]" id="SCHEDULE_DAY_C4" >
											<option value=""></option>
											<option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期一至五" ? 'selected' :''; ?> value="星期一至五">星期一至五</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期六、日" ? 'selected' :''; ?> value="星期六、日" >星期六、日</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期一" ? 'selected' :''; ?> value="星期一">星期一</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期二" ? 'selected' :''; ?> value="星期二">星期二</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期三" ? 'selected' :''; ?> value="星期三">星期三</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期四" ? 'selected' :''; ?> value="星期四">星期四</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期五" ? 'selected' :''; ?> value="星期五">星期五</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期六" ? 'selected' :''; ?> value="星期六">星期六</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "星期日" ? 'selected' :''; ?> value="星期日">星期日</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "公眾假期" ? 'selected' :''; ?> value="公眾假期">公眾假期</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C4 == "其他" ? 'selected' :''; ?> value="其他">其他 (於Timeslot欄列明)</option>
										 </select>
										 <small class="info help-block">
										 </small>
									  </div>
									  <div class="col-sm-2">
										 <select class="form-control cust-schedule-day-e4" name="SCHEDULE_DAY_E4[]" id="SCHEDULE_DAY_E4" >
											<option value=""></option>
											<option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Mon to Fri" ? 'selected' :''; ?> value="Mon to Fri">Mon to Fri</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Sat and Sun" ? 'selected' :''; ?> value="Sat and Sun">Sat and Sun</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Monday" ? 'selected' :''; ?> value="Monday">Monday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Tuesday" ? 'selected' :''; ?> value="Tuesday">Tuesday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Wednesday" ? 'selected' :''; ?> value="Wednesday">Wednesday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Thursday" ? 'selected' :''; ?> value="Thursday">Thursday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Friday" ? 'selected' :''; ?> value="Friday">Friday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Saturday" ? 'selected' :''; ?> value="Saturday">Saturday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Sunday" ? 'selected' :''; ?> value="Sunday">Sunday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Public holiday" ? 'selected' :''; ?> value="Public holiday">Public holiday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E4 == "Other" ? 'selected' :''; ?> value="Other">Other (Specify on Timeslot)</option>
										 </select>
										 <small class="info help-block">
										 </small>
									  </div>
									</div>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT4_1" id="TIMESLOT4_1" placeholder="Opening hours 4 : Timeslot 1" value="<?= set_value('TIMESLOT4_1', $doctor_consult_hour->TIMESLOT4_1); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
							   </div>
							   <div class="form-group ">
								  <label class="col-sm-6"></label>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT4_2" id="TIMESLOT4_2" placeholder="Opening hours 4 : Timeslot 2" value="<?= set_value('TIMESLOT4_2', $doctor_consult_hour->TIMESLOT4_2); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
							   </div>
							   <div class="form-group ">
								  <label class="col-sm-6"></label>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT4_3" id="TIMESLOT4_3" placeholder="Opening hours 4 : Timeslot 3" value="<?= set_value('TIMESLOT4_3', $doctor_consult_hour->TIMESLOT4_3); ?>">
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
											 <select class="form-control cust-schedule-day-c5 check-has-more" name="SCHEDULE_DAY_C5[]" id="SCHEDULE_DAY_C5" >
												<option value=""></option>
												<option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期一至五" ? 'selected' :''; ?> value="星期一至五">星期一至五</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期六、日" ? 'selected' :''; ?> value="星期六、日" >星期六、日</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期一" ? 'selected' :''; ?> value="星期一">星期一</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期二" ? 'selected' :''; ?> value="星期二">星期二</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期三" ? 'selected' :''; ?> value="星期三">星期三</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期四" ? 'selected' :''; ?> value="星期四">星期四</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期五" ? 'selected' :''; ?> value="星期五">星期五</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期六" ? 'selected' :''; ?> value="星期六">星期六</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "星期日" ? 'selected' :''; ?> value="星期日">星期日</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "公眾假期" ? 'selected' :''; ?> value="公眾假期">公眾假期</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C5 == "其他" ? 'selected' :''; ?> value="其他">其他 (於Timeslot欄列明)</option>
											 </select>
											 <small class="info help-block">
											 </small>
										  </div>
										  <div class="col-sm-2">
											 <select class="form-control cust-schedule-day-e5" name="SCHEDULE_DAY_E5[]" id="SCHEDULE_DAY_E5" >
												<option value=""></option>
												<option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Mon to Fri" ? 'selected' :''; ?> value="Mon to Fri">Mon to Fri</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Sat and Sun" ? 'selected' :''; ?> value="Sat and Sun">Sat and Sun</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Monday" ? 'selected' :''; ?> value="Monday">Monday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Tuesday" ? 'selected' :''; ?> value="Tuesday">Tuesday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Wednesday" ? 'selected' :''; ?> value="Wednesday">Wednesday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Thursday" ? 'selected' :''; ?> value="Thursday">Thursday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Friday" ? 'selected' :''; ?> value="Friday">Friday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Saturday" ? 'selected' :''; ?> value="Saturday">Saturday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Sunday" ? 'selected' :''; ?> value="Sunday">Sunday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Public holiday" ? 'selected' :''; ?> value="Public holiday">Public holiday</option>
												 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E5 == "Other" ? 'selected' :''; ?> value="Other">Other (Specify on Timeslot)</option>
											 </select>
											 <small class="info help-block">
											 </small>
										  </div>
									</div>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT5_1" id="TIMESLOT5_1" placeholder="Opening hours 5 : Timeslot 1" value="<?= set_value('TIMESLOT5_1', $doctor_consult_hour->TIMESLOT5_1); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
								</div>
									
								   <div class="form-group ">
									  <label class="col-sm-6"></label>
									  <div class="col-sm-4">
										 <input type="text" class="form-control" name="TIMESLOT5_2" id="TIMESLOT5_2" placeholder="Opening hours 5 : Timeslot 2" value="<?= set_value('TIMESLOT5_2', $doctor_consult_hour->TIMESLOT5_2); ?>">
										 <small class="info help-block">
										 </small>
									  </div>
								   </div>
	
							   <div class="form-group ">
								  <label class="col-sm-6"></label>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT5_3" id="TIMESLOT5_3" placeholder="Opening hours 5 : Timeslot 3" value="<?= set_value('TIMESLOT5_3', $doctor_consult_hour->TIMESLOT5_3); ?>">
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
										 <select class="form-control cust-schedule-day-c6 check-has-more" name="SCHEDULE_DAY_C6[]" id="SCHEDULE_DAY_C6" >
											<option value=""></option>
											<option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期一至五" ? 'selected' :''; ?> value="星期一至五">星期一至五</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期六、日" ? 'selected' :''; ?> value="星期六、日" >星期六、日</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期一" ? 'selected' :''; ?> value="星期一">星期一</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期二" ? 'selected' :''; ?> value="星期二">星期二</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期三" ? 'selected' :''; ?> value="星期三">星期三</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期四" ? 'selected' :''; ?> value="星期四">星期四</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期五" ? 'selected' :''; ?> value="星期五">星期五</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期六" ? 'selected' :''; ?> value="星期六">星期六</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "星期日" ? 'selected' :''; ?> value="星期日">星期日</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "公眾假期" ? 'selected' :''; ?> value="公眾假期">公眾假期</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_C6 == "其他" ? 'selected' :''; ?> value="其他">其他 (於Timeslot欄列明)</option>
										 </select>
										 <small class="info help-block">
										 </small>
									  </div>
									  <div class="col-sm-2">
										 <select class="form-control cust-schedule-day-e6" name="SCHEDULE_DAY_E6[]" id="SCHEDULE_DAY_E6" >
											<option value=""></option>
											<option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Mon to Fri" ? 'selected' :''; ?> value="Mon to Fri">Mon to Fri</option>
											<option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Sat and Sun" ? 'selected' :''; ?> value="Sat and Sun">Sat and Sun</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Monday" ? 'selected' :''; ?> value="Monday">Monday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Tuesday" ? 'selected' :''; ?> value="Tuesday">Tuesday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Wednesday" ? 'selected' :''; ?> value="Wednesday">Wednesday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Thursday" ? 'selected' :''; ?> value="Thursday">Thursday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Friday" ? 'selected' :''; ?> value="Friday">Friday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Saturday" ? 'selected' :''; ?> value="Saturday">Saturday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Sunday" ? 'selected' :''; ?> value="Sunday">Sunday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Public holiday" ? 'selected' :''; ?> value="Public holiday">Public holiday</option>
											 <option <?= $doctor_consult_hour->SCHEDULE_DAY_E6 == "Other" ? 'selected' :''; ?> value="Other">Other (Specify on Timeslot)</option>

										 </select>
										 <small class="info help-block">
										 </small>
									  </div>
									</div>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT6_1" id="TIMESLOT6_1" placeholder="Opening hours 6 : Timeslot 1" value="<?= set_value('TIMESLOT6_1', $doctor_consult_hour->TIMESLOT6_1); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
							   </div>
							   <div class="form-group ">
								  <label class="col-sm-6"></label>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT6_2" id="TIMESLOT6_2" placeholder="Opening hours 6 : Timeslot 2" value="<?= set_value('TIMESLOT6_2', $doctor_consult_hour->TIMESLOT6_2); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
							   </div>
							   <div class="form-group ">
								  <label class="col-sm-6"></label>
								  <div class="col-sm-4">
									 <input type="text" class="form-control" name="TIMESLOT6_3" id="TIMESLOT6_3" placeholder="Opening hours 6 : Timeslot 3" value="<?= set_value('TIMESLOT6_3', $doctor_consult_hour->TIMESLOT6_3); ?>">
									 <small class="info help-block">
									 </small>
								  </div>
							   </div>
							   <!--	End Schedule day 6	-->
							</div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
             <!--                <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save">
                            <i class="fa fa-save" ></i> Save
                            </button> -->
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go Back
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
		
		jQuery(window).on("load", function(){
		  if ($(".check-has-more option:selected").val() != ""){
				$(".more-schedule").slideDown("slow");
				$("#more-day").removeClass("btn-primary");
				$("#more-day").addClass("btn-danger");
				$("#more-day").text("Hide more day");
		  }
		});
      
	  	$(".more-schedule").hide();
		
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
              window.location.href = BASE_URL + 'administrator/doctor_consult_hour';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor_consult_hour = $('#form_doctor_consult_hour');
        var data_post = form_doctor_consult_hour.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_doctor_consult_hour.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
          	  location.replace(document.referrer);

          }else{
          	$('.message').printMessage({message : res.message, type: 'warning'});
          	$('.message').fadeIn();
    
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