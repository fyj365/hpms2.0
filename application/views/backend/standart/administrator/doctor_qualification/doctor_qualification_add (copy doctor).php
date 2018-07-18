
<style>
.centerBorder{
   
	border-width: 5px;
}

@-webkit-keyframes blink {
	from { opacity:1; }
	to { opacity:0; } 
}
@-o-keyframes blink {
	from { opacity:1; }
	to { opacity:0; }
}
@-moz-keyframes blink {
	from { opacity:1; }
	to { opacity:0; }
}
@keyframes blink {
	from { opacity:1; }
	to { opacity:0; }
};
</style>
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
                              <li id="doctortab" class="active"><a id="btn_doctor">Doctor</a></li>
                              <li id="centertab" class=""><a id="btn_center">Center</a></li>
                              <li id="qualitab" class=""><a id="btn_quali">Qualification</a></li>
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
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE'); ?>">
                            </div>
                            <span id="check_result"></span>
                        </div>
						
						
						<div class="form-group ">
                            <label for="CENTER_CODE" class="col-sm-2 control-label">Center Code  
                            <i class="required">*</i>
                            </label>
							<label><i>Do you have insert the center information before?</i></label>
							 <div class="col-sm-8">
							
							 <div class="col-md-5 padding-left-0">
                                    <label>
								<input type="radio" class="" name="hvcenter" id="rdhv" value="hv" style="width:22px; height:22px;" checked> I have inserted center information already
								</label></div>
								 <div class="col-md-5 padding-left-0">
								 <label>
								<input type="radio" class="" name="hvcenter" id="rdnohv" value="nohv" style="width:22px; height:22px;"> I never insert the center information
								</label></div>
							</div>
						</div>
						
						<div class="form-group ">
							<label class="col-sm-2 control-label">
                            </label>
							<div class="col-sm-4">
									<p id="centerp" style="color:red;">Please select the Center Code</p>
								</div>
						</div>
							
                                                 
												 <div id="existedCenter">
                                                <div class="form-group ">
                            <label for="CENTER_CODE_SB" class="col-sm-2 control-label">
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
								<div class="centerBorder ">
                                <select  class="form-control chosen chosen-select-deselect" name="CENTER_CODE_SB" id="CENTER_CODE_SB">
                                    <?php foreach (db_get_all_data('center') as $row): ?>
                                    <option value="<?= $row->CENTER_CODE ?>"><?= $row->CENTER_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
								</div>
                            </div>
                        </div>
						</div>
       
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-2 control-label">English Name 
                            <i class="required">*</i>
                            </label>
							<div class="col-sm-1">
                                <select  class="form-control" name="E_TITLE[]" id="E_TITLE" >
                                    <option value="Dr" id="et0">Dr</option>
									<option value="Mr" id="et1">Mr</option>
									<option value="Mrs" id="et2">Mrs</option>
									<option value="Ms" id="et3">Ms</option>
									<option value="Miss" id="et4">Miss</option>
                                    </select>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
                            <i class="required">*</i>
                            </label>
							<div class="col-sm-1">
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
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME'); ?>">
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
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input type="radio" class="flat-red" name="GENDER" value="F"> F                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input type="radio" class="flat-red" name="GENDER" value="N/A"> N/A                                    </label>
                                    </div>
                                <div class="row-fluid clear-both">
                                <small class="info help-block">
                                </small>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group ">
                            <label class="col-sm-2 control-label">Entry Type 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
								<div class="col-md-3  padding-left-0">
									<label><input type="checkbox" name="ENTRY_TYPE[]" value="1" style="width:20px;height:20px;"> By Appointment</label>
								</div>
								
								<div class="col-md-3  padding-left-0">
									<label><input type="checkbox" name="ENTRY_TYPE[]" value="1" style="width:20px;height:20px;"> Print</label>
								</div>
								
								<div class="col-md-3  padding-left-0">
									<label><input type="checkbox" name="ENTRY_TYPE[]" value="1" style="width:20px;height:20px;"> Voucher Entry</label>
								</div>
                            </div>
                           
                        </div>
						
						<div class="form-group  wrapper-options-crud">
                            <label for="TYPE1" class="col-sm-2 control-label">Type
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                    <?php foreach (db_get_all_data('doctor_type_desc') as $index=>$row): ?>
                                    <div class="col-md-3  padding-left-0">
                                    <label>
                                    <input type="checkbox" class="" name="TYPE1[]" value="<?= $row->DT_CODE ?>" style="width:20px;height:20px;"> <?= $row->DT_CODE; ?>
                                    </label>
                                    </div>
                                    <?php endforeach; ?>    
                            </div>
                        </div>
						
                                                <div class="form-group ">
                            <label for="MOBILE" class="col-sm-2 control-label">Mobile 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-2 control-label">Email 
                            </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group">
                            <label for="LANG" class="col-sm-2 control-label">Language 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LANG" id="LANG" value="<?= set_value('LANG'); ?>">
                            </div>
                        </div>
                                                 
                                 <div class="form-group" style="height:50px;overflow:visible;position: relative;z-index: 999;">
                            <label for="DOB" class="col-sm-2 control-label">DOB 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                        <input type="text" name="DOB" class="form-control datepicker pull-right ">

                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="HKID" class="col-sm-2 control-label">HKID 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="GP_REG_NO" class="col-sm-2 control-label">GP Reg No. 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="E_SPECIALTY1" class="col-sm-2 control-label">English Specialty
                            </label>
                            <div class="col-sm-8">
                                    <?php foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): ?>
                                    <div class="col-md-3  padding-left-0">
                                    <label>
                                    <input type="checkbox" class="" name="E_SPECIALTY1[]" id="es<?= $index ?>" value="<?= $row->E_DESC ?>" style="width:20px;
    height:20px;"> <?= $row->E_DESC; ?>
                                    </label>
                                    </div>
                                    <?php endforeach; ?>  
                                    <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                    </div>
                                    
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="C_SPECIALTY1" class="col-sm-2 control-label">Chinese Specialty
                            </label>
                            <div class="col-sm-8">
                                    <?php foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): ?>
                                    <div class="col-md-3  padding-left-0">
                                    <label>
                                    <input type="checkbox" class="" name="C_SPECIALTY1[]" id="cs<?= $index ?>" value="<?= $row->C_DESC ?>" style="width:20px;
    height:20px;"> <?= $row->C_DESC; ?>
                                    </label>
                                    </div>
                                    <?php endforeach; ?>  
                                    <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                    </div>
                                    
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
                            </label>
                            <div class="col-sm-8">
                                <textarea id="ADMISSION_RIGHT" name="ADMISSION_RIGHT" style="resize:none"><?= set_value('ADMISSION RIGHT'); ?></textarea>
                                <small class="info help-block">
                                </small>
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
                            <label for="START_DATE" class="col-sm-2 control-label">Start Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="START_DATE"  id="START_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>


                             <div class="form-group ">
                            <label for="STATUS" class="col-sm-2 control-label">Term Date 
                            </label>
                            <div class="col-sm-6">
                               <div class="input-group date col-sm-8">
                                      <input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" placeholder="Select the Term Date">
                                    </div>
                                 
                            </div>
                        </div>
                        
                        <div id="termDiv">
                                                <div class="form-group ">
                            <label class="col-sm-2 control-label">
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div class="input-group date col-sm-8">
                                      <input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" placeholder="Select the Term Date">
                                    </div>
                            </div>
                        </div>
                        </div>
                                                 <!-- 
                                                <div class="form-group ">
                            <label for="TERM_DATE" class="col-sm-2 control-label">Term Date 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                   -->               
                                                <div class="form-group ">
                            <label for="ATTN" class="col-sm-2 control-label">ATTN 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ATTN" id="ATTN" value="<?= set_value('ATTN'); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="REMARK" class="col-sm-2 control-label">Remark 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="REMARK" name="REMARK" rows="5" cols="80"><?= set_value('REMARK'); ?></textarea>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="PAYMENT" class="col-sm-2 control-label">Payment method 
                            </label>
                             <div class="col-sm-8">
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input type="radio" name="PAYMENT" value="Cheque" checked> Cheque                                    </label>
                                    </div>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input type="radio" name="PAYMENT" value="AUTO"> Auto-Pay                                    </label>
                                    </div>
                            </div>
							
                        </div>
						
						<div id="auto_pay">
                                                <div class="form-group ">
                            <label for="BANK" class="col-sm-2 control-label">Bank
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
								<div>
                                <select  class="form-control chosen chosen-select-deselect" name="BANK" id="BANK">
                                    <option value="BEA">BEA 東亞</option>
                                </select>
								</div>
                            </div>
                        </div>
						
						
						<div class="form-group ">
                            <label for="BANK_NO" class="col-sm-2 control-label">Bank No.
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
								<div>
                                <input type="text" class="form-control" name="BANK_NO" id="BANK_NO">
								</div>
                            </div>
                        </div>
						
						<div class="form-group ">
                            <label for="PAYEE_NAME" class="col-sm-2 control-label">Name
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
								<div>
                                <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME">
								</div>
                            </div>
                        </div>

						</div>

                            <div class="form-group ">
                            <label for="LAST_MODIFIER" class="col-sm-2 control-label">Last Modifier 
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="LAST_MODIFIER" id="LAST_MODIFIER" value="<?= set_value('LAST_MODIFIER'); ?>">
                                <small class="info help-block">
                            </div>
                        </div>
						</div>
						
						
                        <div id="centerDiv" style="margin-top:40px;"> 
                                <div class="form-group ">
                                    <label for="CENTER_CODE" class="col-sm-2 control-label">Center Code 
									<i class="required">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="CENTER_CODE" id="CENTER_CODE" onkeyup="madeChange()" value="<?= set_value('CENTER_CODE'); ?>">
                                        <small class="info help-block">
                                        </small>
                                    </div>
                                </div>

                                                        <div class="form-group ">
                                    <label for="CENTER_E_NAME" class="col-sm-2 control-label">Center English Name 
                                    <i class="required">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="CENTER_E_NAME" id="CENTER_E_NAME" value="<?= set_value('CENTER_E_NAME'); ?>">
                                    </div>
                                </div>

                                                        <div class="form-group ">
                                    <label for="CENTER_C_NAME" class="col-sm-2 control-label">Center Chinese Name 
                                    <i class="required">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="CENTER_C_NAME" id="CENTER_C_NAME" value="<?= set_value('CENTER_C_NAME'); ?>">
                                        <small class="info help-block">
                                        <b>Input Center Chinese Name </b> Max Length : 80.</small>
                                    </div>
                                </div>


                    <!--start of the accordion-->

                  
                                      <div class="form-group ">
                                             <label for="E_ADDR1" class="col-sm-2 control-label">English Addr
                                            </label>
                                            <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="E_ADDR1" id="E_ADDR1" value="<?= set_value('E_ADDR1'); ?>">
                                            </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="E_ADDR2" class="col-sm-2 control-label"> 
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="E_ADDR2" id="E_ADDR2" value="<?= set_value('E_ADDR2'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="E_ADDR3" class="col-sm-2 control-label"> 
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="E_ADDR3" id="E_ADDR3" value="<?= set_value('E_ADDR3'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="E_ADDR4" class="col-sm-2 control-label"> 
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="E_ADDR4" id="E_ADDR4" value="<?= set_value('E_ADDR4'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="E_ADDR5" class="col-sm-2 control-label">
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="E_ADDR5" id="E_ADDR5" value="<?= set_value('E_ADDR5'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="E_DISTRICT" class="col-sm-2 control-label">District 
                                                <i class="required">*</i>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="E_DISTRICT" id="E_DISTRICT" value="<?= set_value('E_DISTRICT'); ?>">
                                                </div>
                                            </div>

                                  <div class="form-group  wrapper-options-crud">
                                                <label for="AREA" class="col-sm-2 control-label">Area 
                                                </label>
                                                <div class="col-sm-8">
                                                        <div class="col-md-3 padding-left-0">
                                                        <label>
                                                        <input type="radio" class="flat-red" name="AREA" value="HK" checked> HK                                    </label>
                                                        </div>
                                                        <div class="col-md-3 padding-left-0">
                                                        <label>
                                                        <input type="radio" class="flat-red" name="AREA" value="KLN"> KLN                                    </label>
                                                        </div>
                                                        <div class="col-md-3 padding-left-0">
                                                        <label>
                                                        <input type="radio" class="flat-red" name="AREA" value="NT"> NT                                    </label>
                                                        </div>
                                                        <div class="col-md-3 padding-left-0">
                                                        <label>
                                                        <input type="radio" class="flat-red" name="AREA" value="OI"> OI                                    </label>
                                                        </div>
                                                    <div class="row-fluid clear-both">
                                                    <small class="info help-block">
                                                    </small>
                                                    </div>
                                                </div>
                                            </div>
                              

                
    
                       
                              <div class="form-group ">
                                                <label for="C_ADDR1" class="col-sm-2 control-label">Chinese Addr 
    
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="C_ADDR1" id="C_ADDR1" value="<?= set_value('C_ADDR1'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="C_ADDR2" class="col-sm-2 control-label">
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="C_ADDR2" id="C_ADDR2" value="<?= set_value('C_ADDR2'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="C_ADDR3" class="col-sm-2 control-label">
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="C_ADDR3" id="C_ADDR3" value="<?= set_value('C_ADDR3'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="C_ADDR4" class="col-sm-2 control-label">
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="C_ADDR4" id="C_ADDR4" value="<?= set_value('C_ADDR4'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="C_ADDR5" class="col-sm-2 control-label">
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="C_ADDR5" id="C_ADDR5" value="<?= set_value('C_ADDR5'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="C_DISTRICT" class="col-sm-2 control-label">District 
                                                <i class="required">*</i>
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="C_DISTRICT" id="C_DISTRICT" value="<?= set_value('C_DISTRICT'); ?>">
                                                </div>
                                            </div>

                                
                                              
             
                                                             <div class="form-group ">
                                                <label for="TEL" class="col-sm-2 control-label">Tel 
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="TEL" id="TEL" value="<?= set_value('TEL'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="PAGER" class="col-sm-2 control-label">Pager 
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER'); ?>">
                                                </div>
                                            </div>

                                                                    <div class="form-group ">
                                                <label for="FAX" class="col-sm-2 control-label">Fax 
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="FAX" id="FAX" value="<?= set_value('FAX'); ?>">
                                                </div>
                                            </div>
                     

                                      <div class="form-group">
                                                    <label for="OPEN_AFTER_EIGHT" class="col-sm-2 control-label">Open After 8:00pm
                                                    </label>
                                                    <div class="col-sm-8">
                                                            <div class="col-md-3  padding-left-0">
                                                            <label>
                                                            <input type="checkbox" class="flat-red" name="OPEN_AFTER_EIGHT[]" value="1"></label>
                                                            </div>
                                                         <div class="row-fluid clear-both">
                                                            <small class="info help-block">
                                                            </small>
                                                            </div>

                                                    </div>
                                                </div>

                                    <div class="form-group ">
                                                    <label for="SCHEDULE_DAY1" class="col-sm-2 control-label">Schedule Day1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="SCHEDULE_DAY1" id="SCHEDULE_DAY1" value="<?= set_value('SCHEDULE_DAY1'); ?>">
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT1_1" class="col-sm-2 control-label">Timeslot1 1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT1_1" id="TIMESLOT1_1" value="<?= set_value('TIMESLOT1_1'); ?>">
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT1_2" class="col-sm-2 control-label">Timeslot1 2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT1_2" id="TIMESLOT1_2" value="<?= set_value('TIMESLOT1_2'); ?>">
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT1_3" class="col-sm-2 control-label">Timeslot1 3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT1_3" id="TIMESLOT1_3" value="<?= set_value('TIMESLOT1_3'); ?>">
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="SCHEDULE_DAY2" class="col-sm-2 control-label">Schedule Day2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="SCHEDULE_DAY2" id="SCHEDULE_DAY2" value="<?= set_value('SCHEDULE_DAY2'); ?>">
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT2_1" class="col-sm-2 control-label">Timeslot2 1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT2_1" id="TIMESLOT2_1" value="<?= set_value('TIMESLOT2_1'); ?>">
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT2_2" class="col-sm-2 control-label">Timeslot2 2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT2_2" id="TIMESLOT2_2" value="<?= set_value('TIMESLOT2_2'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT2_3" class="col-sm-2 control-label">Timeslot2 3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT2_3" id="TIMESLOT2_3" value="<?= set_value('TIMESLOT2_3'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="SCHEDULE_DAY3" class="col-sm-2 control-label">Schedule Day3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="SCHEDULE_DAY3" id="SCHEDULE_DAY3" value="<?= set_value('SCHEDULE_DAY3'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT3_1" class="col-sm-2 control-label">Timeslot3 1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT3_1" id="TIMESLOT3_1" value="<?= set_value('TIMESLOT3_1'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT3_2" class="col-sm-2 control-label">Timeslot3 2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT3_2" id="TIMESLOT3_2" value="<?= set_value('TIMESLOT3_2'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT3_3" class="col-sm-2 control-label">Timeslot3 3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT3_3" id="TIMESLOT3_3" value="<?= set_value('TIMESLOT3_3'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="SCHEDULE_DAY4" class="col-sm-2 control-label">Schedule Day4 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="SCHEDULE_DAY4" id="SCHEDULE_DAY4" value="<?= set_value('SCHEDULE_DAY4'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT4_1" class="col-sm-2 control-label">Timeslot4 1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT4_1" id="TIMESLOT4_1" value="<?= set_value('TIMESLOT4_1'); ?>">
                                                       
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT4_2" class="col-sm-2 control-label">Timeslot4 2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT4_2" id="TIMESLOT4_2" value="<?= set_value('TIMESLOT4_2'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT4_3" class="col-sm-2 control-label">Timeslot4 3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT4_3" id="TIMESLOT4_3" value="<?= set_value('TIMESLOT4_3'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="SCHEDULE_DAY5" class="col-sm-2 control-label">Schedule Day5 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="SCHEDULE_DAY5" id="SCHEDULE_DAY5" value="<?= set_value('SCHEDULE_DAY5'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                                        <div class="form-group ">
                                                    <label for="TIMESLOT5_1" class="col-sm-2 control-label">Timeslot5 1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT5_1" id="TIMESLOT5_1" value="<?= set_value('TIMESLOT5_1'); ?>">
                                                       
                                                    </div>
                                                </div>

                                                                <div class="form-group ">
                                                    <label for="TIMESLOT5_2" class="col-sm-2 control-label">Timeslot5 2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT5_2" id="TIMESLOT5_2" value="<?= set_value('TIMESLOT5_2'); ?>">
                                                       
                                                    </div>
                                                </div>
                                                             <div class="form-group ">
                                                    <label for="TIMESLOT5_3" class="col-sm-2 control-label">Timeslot5 3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT5_3" id="TIMESLOT5_3" value="<?= set_value('TIMESLOT5_3'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                           <div class="form-group ">
                                                    <label for="SCHEDULE_DAY6" class="col-sm-2 control-label">Schedule Day6 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="SCHEDULE_DAY6" id="SCHEDULE_DAY6" value="<?= set_value('SCHEDULE_DAY6'); ?>">
                                                       
                                                    </div>
                                                </div>
                                                              <div class="form-group ">
                                                    <label for="TIMESLOT6_1" class="col-sm-2 control-label">Timeslot6 1 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT6_1" id="TIMESLOT6_1" value="<?= set_value('TIMESLOT6_1'); ?>">
                                                       
                                                    </div>
                                                </div>

                                                         <div class="form-group ">
                                                    <label for="TIMESLOT6_2" class="col-sm-2 control-label">Timeslot6 2 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT6_2" id="TIMESLOT6_2" value="<?= set_value('TIMESLOT6_2'); ?>">
                                                        
                                                    </div>
                                                </div>

                                                         <div class="form-group ">
                                                    <label for="TIMESLOT6_3" class="col-sm-2 control-label">Timeslot6 3 
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="TIMESLOT6_3" id="TIMESLOT6_3" value="<?= set_value('TIMESLOT6_3'); ?>">
                                                       
                                                    </div>
                                                </div>
                                  
                                
                             
                        <!--end of the accordion-->                  
                        </div>   <!--end of the center div-->


						
			<div id="qualiDiv" style="overflow: auto; margin-bottom: : 80px;">
						<h1>Doctor's Qualification</h1>
                <div class="qualiContainer" id="qual-%id%" style="overflow:auto;border:1px solid black;padding: 20px;">
                        <div class="qualification col-sm-10">
                                         <div class="form-group ">
                            <label for="QUALIFICATION" class="col-sm-2 control-label">Qualification 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="QUALIFICATION_New[]" value="">
                               
                            </div>
                            </div>
                                                 
                                                <div class="form-group ">
                            <label for="CERT_YEAR" class="col-sm-2 control-label">Cert Year 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CERT_YEAR_New[]" value="">
                           
                            </div>
                             </div>

                        </div>
                        <div class="col-sm-2" style="margin-top: 80px;">
                            <a  id ="firsRemBtn" class="btn btn-danger remBtn">Delete</a>
                        </div>
				    </div>
        
                    <div id="addBtn" class="col-sm-2" style="float:right;margin-top: 40px;margin-right: 20px;">
                        <a  class="btn btn-primary" style="width: 120px;">Add</a>
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
     var changed = 0;
    
    function madeChange() {
        changed = 1; 
    }
    
    $("#directQuali").on('click', function(){
        if (changed == 1)
            alert('You should save the form which you have changed.');
        else
            window.location.href = "<?= site_url('administrator/doctor_qualification/add'); ?>";
    });
	
    $(document).ready(function(){
            CKEDITOR.replace('ADMISSION_RIGHT'); 
      var ADMISSION_RIGHT = CKEDITOR.instances.ADMISSION_RIGHT;
            CKEDITOR.replace('MEDICAL_PROCEDURE'); 
      var MEDICAL_PROCEDURE = CKEDITOR.instances.MEDICAL_PROCEDURE;
            CKEDITOR.replace('REMARK'); 
      var REMARK = CKEDITOR.instances.REMARK;
	  
	  var specialty = 0;
	  var type = 0;


      $('#DR_CODE').on('keyup',function(){
            var inputVal = $('#DR_CODE').val();
            $.ajax({
                url: BASE_URL + '/administrator/doctor/check_Drcode/',
                type: 'GET',
                data:{'inputVal': inputVal},
                dataType:'json',
                success: function(res){
                    console.log(res.result_status);
                    var typeofR = typeof(res.result_status);
                    console.log(typeofR);

                  if(res.result_status) {
                        $('#check_result').css({'color':'#2ecc71','font-weight':'300'});
                    }else {
                        $('#check_result').css({'color':'#c0392b','font-weight':'700'});
                    }
                    $('#check_result').html(res.check_result);

                },
            });

      });
	  
	  jQuery(window).on("load", function(){
		  $('#centertab').hide();
		  $('#centerDiv').hide();
			$('#qualiDiv').hide();
			$('#auto_pay').hide();
	  });
	  
	  $('input[name="PAYMENT"]').change(function(){
		  
			var payment = $('input[name="PAYMENT"]:checked').val();
			
			if (payment == "AUTO"){
				$('#auto_pay').show();
			}else {
				$('#auto_pay').hide();
			}
        });



	  //type should not more than 3
	  $('input[name="TYPE1[]"]').click(function(){
			  if ($(this).is(':checked')){
				if (type < 3){
					type++;
				}else{
					alert("The max. of doctor's type is 3");
					$(this).prop('checked',false);
				}
			  }else{
				 type--;
			  }
		});
		

		//have center, not need to enter center form
		$('#rdhv').click(function(){
			$('#centerp').show();
			$('#centerp').text('Please select the Center Code');
			$('.centerBorder').addClass('blink');
            $('#existedCenter').show();
			$('#centertab').hide();
        });
		
		
		//have no center, need to enter center form
		$('#rdnohv').click(function(){
			$('#centerp').show();
			$('#centertab').show();
            $('#existedCenter').hide();
			$('#centerp').text('Please fill in the Center form');
			
        });
		
		//auto change chi title
		$("#E_TITLE").change(function() {
			var index = $("#E_TITLE")[0].selectedIndex;
			$("#ct" + index).prop('selected','selected');
		});
		
		
		//auto change eng title
		 $("#C_TITLE").change(function() {
			var index = $("#C_TITLE")[0].selectedIndex;
			$("#et" + index).prop('selected','selected');
		});
	  
	  
	  //auto select chi specialty
	   $('input[name="E_SPECIALTY1[]"]').click(function(){
		  var checkeds = $(this);
		  var es = $('input[name="E_SPECIALTY1[]"]');
		  var index = es.index(checkeds);

			  if ($(this).is(':checked')){
				if (specialty < 4){
					specialty++;
				   $('#cs'+index).prop('checked',true);
				}else{
					alert("The max. of doctor's specialty is 4");
					$(this).prop('checked',false);
				}
			  }else{
				 specialty--;
				$('#cs'+index).prop('checked',false);
			  }
		});
		
		
		//auto select eng specialty
		$('input[name="C_SPECIALTY1[]"]').click(function(){
		  var checkeds = $(this);
		  var es = $('input[name="C_SPECIALTY1[]"]');
		  var index = es.index(checkeds);

			  if ($(this).is(':checked')){
				if (specialty < 4){
					specialty++;
				   $('#es'+index).prop('checked',true);
				}else{
					alert("The max. of doctor's specialty is 4");
					$(this).prop('checked',false);
				}
			  }else{
				 specialty--;
				$('#es'+index).prop('checked',false);
			  }
		});
	    
	  $('#btn_doctor').click(function(){
		  $('#doctorDiv').show();
		  $('#doctortab').addClass('active');
		  $('#qualiDiv').hide();
		  $('#qualitab').removeClass('active');
		  $('#centerDiv').hide();
		  $('#centertab').removeClass('active');
	  });
	  
	  $('#btn_center').click(function(){
		  $('#centerDiv').show();
		  $('#centertab').addClass('active');
		  $('#qualiDiv').hide();
		  $('#qualitab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
	  });
	  
	  $('#btn_quali').click(function(){
		  $('#qualiDiv').show();
		  $('#qualitab').addClass('active');
		  $('#centerDiv').hide();
		  $('#centertab').removeClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
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
              window.location.href = BASE_URL + 'administrator/doctor';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
          changed = 0;
          
        $('.message').fadeOut();
        $('#ADMISSION_RIGHT').val(ADMISSION_RIGHT.getData());
                $('#MEDICAL_PROCEDURE').val(MEDICAL_PROCEDURE.getData());
                $('#REMARK').val(REMARK.getData());
                    
        var form_doctor = $('#form_doctor');
        var data_post = form_doctor.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/doctor/add_save/',
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
            ADMISSION_RIGHT.setData('');
            MEDICAL_PROCEDURE.setData('');
            REMARK.setData('');
                
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



      var remBtnL = $('.remBtn').length;
      // var idx = $('.qualification').length ;

      $('#firsRemBtn').css('visibility','hidden');   
       
      $(document).on('click','#addBtn', function(){
         remBtnL ++;
         var htmlText = '<div class="qualiContainer" style="overflow:auto;border:1px solid black;padding: 20px;" id="qual-%id%"><div class="qualification col-sm-10"><div class="form-group "><label for="QUALIFICATION" class="col-sm-2 control-label">Qualification<i class="required">*</i></label><div class="col-sm-8"><input type="text"  class="form-control" name="QUALIFICATION_New[]" value=""><small class="info help-block"><b>Input Qualification</b> Max Length : 80.</small></div></div><div class="form-group "><label for="CERT_YEAR" class="col-sm-2 control-label">Cert Year<i class="required">*</i> </label><div class="col-sm-8"><input type="text" class="form-control"  name="CERT_YEAR_New[]" value=""><small class="info help-block"<b>Input Cert Year</b> Max Length : 4.</small></div></div></div>  <div class="col-sm-2" style="margin-top: 80px;"><a class="btn btn-danger remBtn">Delete</a></div></div>';
            // newhtml = html.replace('%id%',idx);
         
            // string.prototype.replaceAll = function(search, replacement) {
            //          var  target = this;
            //     return terget.split(search).join(replacement);
            // };
            // var newhtml = htmlText.replaceAll('%id%',idx);

            // var newhtml = htmlText.replace(/%id%/g, idx);

            // $(newhtml).insertBefore('#addBtn');
            //  console.log('19_Jan_1.1 quali-item:' + idx);
             $(htmlText).insertBefore('#addBtn');

          if (remBtnL > 1) {
            $('.remBtn').css('visibility','visible');
          }

      });

     $(document).on('click','.remBtn',function(){
        $(this).closest('.qualiContainer').remove();
        remBtnL --;

          if (remBtnL  == 1) {
            $('.remBtn').css('visibility','hidden');   
        } 
    });   

    // $('.card-header').find('.glyphicon.glyphicon-plus').parent().each(function(){
    //         $(this).on('click',function(){
    //             if($(this).children().hasClass("glyphicon-plus")) {
              
    //               $(this).children().removeClass("glyphicon-plus").addClass("glyphicon-minus");
               
    //             } else {
    //                 $(this).children().removeClass("glyphicon-minus").addClass("glyphicon-plus");
    //             }
    //         });
    //     });
       
        
      // $('a.left-label').css('color','#333');

      $('#termDiv').hide();

        $('input[name="STATUS"]').change(function(){
            var status = $('input[name="STATUS"]:checked').val();
            
            if (status != "Active"){
                $('#termDiv').show();
            }else {
                $('#termDiv').hide();
            }
        });
  
    }); /*end doc ready*/
</script>