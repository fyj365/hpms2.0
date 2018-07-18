
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
<style type="text/css">
  #step1 legend{
  text-shadow:5px 5px 10px #d35400;
  font-weight: 600;
   padding-left: 20px;
 }
 #step2>legend{
    text-shadow:5px 5px 10px #d35400;
  font-weight: 600;
   padding-left: 20px;
 }
  select,input{
        width: 160px;
        margin-bottom: 3px;
    }
   #PATIENT_E_NAME,#PATIENT_E_NAME option{
    width: 160px;
   }
   #DEPD_CODE,#DEPD_CODE option{
    width: 80px;
   }
  #PATIENT_E_NAME,#PATIENT_E_NAME option,#DEPD_CODE,#DEPD_CODE option{
    background: #fff;
  }
  #BenefitData input[type="radio"]{
      display: inline-block;
      width: 20px;
      height: 20px;
      margin-right: 10px;
      margin-left: 3px;
    }
    span{
        font-size: 14px;
        font-weight: 600;
    }

    #BenefitData input{
      width: 95px;
    }
    #Befitdata label{
      width: 100px;
    }
    #Diagnosis select{
      width: 100%;
      margin-right: 5PX;
      margin-bottom: 5px;
    }
   #Diagnosis .chosen-container.chosen-container-single{
    width: 98%!important;
    margin-bottom: 5px;
   }
    #Diagnosis input{
      width: 56%;
    }
/*input[type=radio].border::after {
    display: block;
    width: 100%;
    height: 100%;
    background: transparent;
    content: '';
    border: 2px solid green !important;
    box-sizing: border-box;
}*/
/* Radio buttons are round, so add 100% border radius. */
/*input[type=radio].border::after {
     border-radius:3px;
}*/
    .border{
      outline: 2px solid red;
    }
    #calcute_button {
        color: white;
        margin-left: 30px;
        text-transform: uppercase;
        border-radius: 6px;
        margin-left: 30px;
    }
    #formula-box{
      margin:auto;
      width: 99%;
      font-size: 16px;
      font-weight: 600;
    }
    .table-responsive{
      max-height: 445px;
    }
    .red-border{
      border: 1px red solid;
    }

</style>
<section class="content-header">
    <h1>
        Voucher <small>New Voucher</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher</a></li>
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
                        <?= form_open('', [
                            'name'    => 'form_voucher_line', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_voucher_line', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>

                  <fieldset id="step1" >

                     <legend>Registration</legend>  
                   
                   <div class="form-group">
                         
                         <label for="VOUCHER_NO" class="col-sm-1 control-label">VOUCHER NO  <i class="required">*</i> </label>
                           
                            <div class="col-sm-2">
                            <input type="text" class="" name="VOUCHER_NO"  id="VOUCHER_NO" value="<?= $voucher->VOUCHER_NO; ?>">
                          </div>
                          <label for="BATCH_NO" class="col-sm-4 control-label">BATCH NO </label>
                          <div class="col-sm-1">
                             <input type="text" class="" name="BATCH_NO" id="BATCH_NO" readonly value="<?php echo $voucher->BATCH_NO; ?>">
                          </div>
                                <label for="TREATMENT_DATE" class="col-sm-2 control-label">TREATMENT DATE </label>
                            <div class="date col-sm-2" >
                            
                              <input  id="TREATMENT_DATE" type="text" class="" name="TREATMENT_DATE"  id="TREATMENT_DATE" value="<?= $voucher->TREATMENT_DATE; ?>" readonly>
                            </div>
                            <input type="hidden" name="CREATOR" value="<?php echo $voucher->CREATOR; ?>">
                            <input type="hidden" name="CREATE_DATE" value="<?php echo $voucher->CREATE_DATE?>"> 
                             </div>

                            <div class="form-group ">

                             <label for="COM_ID" class="col-sm-1 control-label">Company ID<i class="required">*</i> </label>
                            
                            <div  class="col-sm-2" >
                             <input id="COM_ID" type="text" class="" name="COM_ID"  id="" value="<?= $voucher->COM_ID; ?>" readonly>
                            </div>
                              
                          

                            <label for="CARD_CODE" class="col-sm-1 control-label">CARD TYPE<i class="required">*</i> </label>
                            <div class="col-sm-2" >
                         <input id="CARD_CODE" type="text" class="" name="CARD_CODE"  id="CARD_CODE" value="<?= $voucher->CARD_CODE; ?>" readonly>
                            </div>

                            <label for="CLASS_CODE" class="col-sm-1 control-label">CLASS CODE<i class="required">*</i> </label>
                            <div class="col-sm-2" >
                         <input id="CLASS_CODE" type="text" class="" name="CLASS_CODE"  id="CARD_CODE" value="<?= $voucher->CLASS_CODE; ?>" readonly>
                            </div>
                            <label for="RECEIVE_DATE" class="col-sm-1 control-label">RECEIVE DATE </label>
                          
                            <div class="date col-sm-2">
                               <input type="text" class="" name="RECEIVE_DATE"  id="RECEIVE_DATE" value="<?= $voucher->RECEIVE_DATE; ?>" readonly>
                            </div>
                            
                        </div>

                                                 
                                                <div class="form-group ">
                            <label for="PARTNER_DR_CODE" class="col-sm-1 control-label">PARTNER DR CODE  <i class="required">*</i> </label>
                           
                            <div class="col-sm-2">
                               <input  id="PARTNER_DR_CODE" type="text" class="" name="PARTNER_DR_CODE"  value="<?=  $voucher->PARTNER_DR_CODE; ?>" readonly>
                               </div>
                        

                            <label for="DOCTOR_CODE" class="col-sm-1 control-label">DR CODE </label>
                           
                            <div class="col-sm-2">
                               <input  id="DOCTOR_CODE" type="text" class="" name="DR_CODE"  value="<?=  $com_doctors->DR_CODE; ?>" readonly>
                            </div>

                             <label for="DR_E_NAME" class="col-sm-1 control-label">DR ENG NAME  </label>
                            <div class="col-sm-2">
                               <input type="text" class="" name="DR_E_NAME"  id="DR_E_NAME" value="<?= $doctor_name->E_TITLE .' '. $doctor_name->E_NAME; ?>" readonly> 
                             </div>
                    
                              <label for="DR_C_NAME" class="col-sm-1 control-label">DR CHI NAME </label>
                            <div class="col-sm-2">
                           <input type="text" class="" name="DR_C_NAME"  id="DR_C_NAME" value="<?= $doctor_name->C_NAME . ' '. $doctor_name->C_TITLE; ?>" readonly> 
                             </div>

                              </div>  
                           
                      </fieldset>

                        <fieldset id="step2">
                            <legend>Voucher Details</legend>
                            <div class="form-group ">
                            <label for="PATIENT_CODE" class="col-sm-1 control-label">PATIENT CODE  </label>
                           
                            <div class="col-sm-2">

                                <select id="PATIENT_CODE" class="chosen chosen-select-deselect" name="PATIENT_CODE" data-placeholder="Select a patient">
                                    <option value=""></option>
                                    <?php foreach ($patients as $patient) {
                                      echo '<option value="'.$patient->PATIENT_NO.'">'.$patient->PATIENT_NO.'</option>';
                                    } ?>
                                </select>
                            </div>
                            
                            <label for="PATIENT_HKID" class="col-sm-1 control-label">PATIENT HKID </label>
                            
                            <div class="col-sm-2">
                                 <select id="PATIENT_HKID"" class="chosen chosen-select-deselect" name="PATIENT_HKID" data-placeholder="Select a patient">
                                    <option value=""></option>
                                    <?php foreach ($patient_ids as $patient_id) {
                                      echo '<option value="'.$patient_id->HKID.'">'.$patient_id->HKID.'</option>';
                                    } ?>
                                </select>
                            </div>
                                                 
                            <label for="PATIENT_E_NAME" class="col-sm-1 control-label" >NAME <i class="required">*</i> </label>
                           
                            <div class="col-sm-2">
                                <select id="PATIENT_E_NAME" class="" name="PATIENT_NAME">
                                  
                                </select>
<!--                                 <input type="text" class="" name="PATIENT_E_NAME" id="PATIENT_E_NAME">
 -->                         </div>
                             <label for="DEPD_CODE" class="col-sm-1 control-label" >DEPD CODE  </label>
                           
                            <div class="col-sm-2">
                              <select id="DEPD_CODE" class="" name="DEPD_CODE">
                                
                              </select>
<!--                                 <input type="text" class="" name="DEPD_CODE" id="DEPD_CODE">
 -->                            </div>
                                                            
                        </div>
                        <div class="form-group">
                              <label for="SL_FROM" class="col-sm-1 control-label">SL FROM </label>
                            
                            <div class="date col-sm-2">
                              <input type="text" class="datepicker" name="SL_FROM" id="SL_FROM" value="<?= $voucher->TREATMENT_DATE; ?>">
                            </div>
                             
                              <label for="SL_TO" class="col-sm-1 control-label">SL TO </label> 
                            <div class="date col-sm-2">
                              <input type="text" class="datepicker" name="SL_TO" id="SL_TO" value="">
                            </div>

                                 <label for="SICK_LEAVE" class="col-sm-1 control-label">SICK LEAVE  </label>
                           
                            <div class="col-sm-2">
                                <input type="text" class="" name="SICK_LEAVE" id="SICK_LEAVE">
                            </div>
                            <div  class="col-sm-2">
                                 <button type="button" id="SL_leave" class="btn btn-success">GET DAYS</button>
                            </div>
                        </div>
                                   
                          <div class="col-sm-6">
                                      <fieldset id="Diagnosis">

                           <legend>Diagnosis Information</legend>
                          <?php  echo form_error('DIAG_CODE[]'); ?>

                           <?php for ($i=0; $i <3 ; $i ++){ ;?>
                                <div class="form-group ">
                            <label for="DIAG_CODE" class="col-sm-2 control-label">DIAG CODE</label>
                            <div class="col-sm-10">
                               <select id="DIAG_CODE" class="chosen chosen-select-deselect" name="DIAG_CODE[]">
                                <option value="">SELECT DIAGNOSIS CODE</option>
                                <?php foreach ($diagnosis_codes as $diagnosis_code) {; ?>
                                <option value="<?= $diagnosis_code->DIAG_CODE.','.$diagnosis_code->E_DESC; ?>"><?= $diagnosis_code->DIAG_CODE .', '. $diagnosis_code->E_DESC; ?></option>
                               <?php } ?>
                               </select>
                            </div>
                         </div>
                          <?php } ?>
                                      
                       </fieldset>               
                        <fieldset id="BenefitData">
                            <legend>Benefit Data</legend>
                            <div class="form-group ">
                            <label for="TYPE" class="col-sm-2 control-label">TYPE <i class="required">*</i> </label>
                            <div class="col-sm-10" id="type_box">
                              <?php 
                                echo validation_errors('<div>Error</div>'); ?>
                              <?php foreach ($TYPES as $TYPE) {
                                // $types = get_object_vars($TYPES); 
                                  if ($TYPE!='') {
                                 echo '<label>'.$TYPE.'<input name="TYPE" type="radio" value="'.$TYPE.'"></label>';
                                  }
                              } ?>
                            </div>
                        </div>

                                                <div class="form-group ">
                            <label for="CO_PAY" class="col-sm-2 control-label">CO PAY </label>
                            
                            <div class="col-sm-2">
                                <input type="text" class="" name="CO_PAY" id="CO_PAY" value="" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                            <label for="Fee1" class="col-sm-2 control-label">FEE</label>
                             <div class="col-sm-2">
                              <input type="text" name="FEE" value="" id="Fee" class="fee" value="" readonly>
                            </div>
                            <label  for="Pay1" class="col-sm-2 control-label">PAY</label>
                               <div class="col-sm-2">
                             <input type="text" name="PAY" value="" id="Pay" class="pay" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="DR_special" class="col-sm-2 control-label">DR SPECIAL</label>
                              <div class="col-sm-2">
                                <input type="text" name="doctor_special" id="DR_special" readonly>
                              </div>  
                           <label for="REFERRAL_DR" class="col-sm-2 control-label">REF DR</label>
                            
                            <div class="col-sm-2">
                                <input type="text" class="" name="REFERRAL_DR" id="REFERRAL_DR">
                            </div>
                            
                        </div>
                                                 
                                    <div class="form-group ">
                             <label for="EXTRA_MED" class="col-sm-2 control-label"> EXTRA MED </label>  
                            <div class="col-sm-2">
                              <input type="text" class="" name="EXTRA_MED" id="EXTRA_MED" value="">
                            </div>
                             <label for="LAB_XRAY" class="col-sm-2 control-label">LAB XRAY   </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="LAB_XRAY" id="LAB_XRAY" value="">
                            </div>
                        </div>

                        <div class="form-group">

                          <label for="SURGICAL" class="col-sm-2 control-label">SURGICAL</label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="SURGICAL" id="SURGICAL" value="">
                            </div>  
                            
                           <label for="APPROVAL_CODE" class="col-sm-2 control-label">APPROVAL CODE</label> 
                            
                            <div class="col-sm-2">
                                <input type="text" class="" name="APPROVAL_CODE" id="APPROVAL_CODE">
                            </div>
                            <label for="surgical_rate" class="col-sm-2 control-label">SURGICAL RATE(%)</label>
                            <div class="col-sm-2">
                               <input type="text" class="" name="surgical_rate" id="surgical_rate" value="<?php echo $SURGICAL_RATE->SURGICAL_RATING; ?>">
                              </div>     
                             
                        </div>
                        <div class="form-group ">
                            <label for="FEE_AMT" class="col-sm-2 control-label">FEE AMT <i class="required">*</i> 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="FEE_AMT" id="FEE_AMT" value="" readonly>
                            </div>
                             <label for="PAY_AMT" class="col-sm-2 control-label">PAY AMT <i class="required">*</i> 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="PAY_AMT" id="PAY_AMT" value="" readonly>
                            </div>
                            <button type="button" id="calcute_button" class="btn btn-success">Calculate</button>
                          </div>
                         <div class="form-group" id="formula-box"></div>                                                      
                        </fieldset>     
           
                       </div> 
                                                           
                      
                      <div class="col-sm-6">
                        <fieldset>
                          <legend> Voucher Line</legend>
                             <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>

                        <tr class="">
                           <th>BATCH NO</th>
                           <th>PARTNER CODE</th>
                            <th>CARD TYPE</th>
                           <th>VOUCHER NO</th>
                           <th>TREATMENT DATE</th>
                           <th>DR CODE</th>
                           <th>PARTNER DR CODE</th>
                           <th>DR E NAME</th>
                           <th>DR C NAME</th>
                           <th>PATIENT CODE</th>
                           <th>PATIENT HKID</th>
                           <th>PATIENT NAME</th>
                           <th>DEPD CODE</th>
                           <th>SICK LEAVE</th>
                           <th>SL FROM</th>
                           <th>SL TO</th>
                           <th>DIAG CODE1</th>
                           <th>DIAG CODE2</th>
                           <th>DIAG CODE3</th>
                           <th>TYPE</th>
                           <th>REFERRAL DR</th>
                           <th>CO PAY</th>
                           <th>EXTRA MED</th>
                           <th>LAB XRAY</th>
                           <th>SURGICAL</th>
                           <th>APPROVAL CODE</th>
                           <th>FEE AMT</th>
                           <th>PAY AMT</th>
                           <th>CREATOR</th>
                           <th>CREATE DATE</th>
                           <th>LAST MODIFIER</th>
                           <th>LAST UPDATE</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line">
                      <?php foreach ($today_vouchers as $today_voucher) {; ?>
                           <tr>
                            <td><?= $today_voucher->BATCH_NO; ?></td>
                             <td><?= $today_voucher->CARD_CODE; ?></td>
                            <td><?= $today_voucher->CLASS_CODE; ?></td>
                             <td><?= $today_voucher->VOUCHER_NO; ?></td>
                             <td><?= $today_voucher->TREATMENT_DATE; ?></td>
                             <td><?= $today_voucher->DR_CODE; ?></td>
                             <td><?= $today_voucher->PARTNER_DR_CODE; ?></td>
                             <td><?= $today_voucher->DR_E_NAME; ?></td>
                             <td><?= $today_voucher->DR_C_NAME; ?></td>
                             <td><?= $today_voucher->PATIENT_CODE; ?></td>
                             <td><?= $today_voucher->PATIENT_HKID; ?></td>
                             <td><?= $today_voucher->PATIENT_NAME; ?></td>
                             <td><?= $today_voucher->DEPD_CODE; ?></td>
                             <td><?= $today_voucher->SICK_LEAVE ; ?></td>
                             <td><?= $today_voucher->SL_FROM; ?></td>
                             <td><?= $today_voucher->SL_TO; ?></td>
                             <td><?= $today_voucher->DIAG_CODE1; ?></td>
                             <td><?= $today_voucher->DIAG_CODE2; ?></td>
                             <td><?= $today_voucher->DIAG_CODE3; ?></td>
                             <td><?= $today_voucher->TYPE; ?></td>
                             <td><?= $today_voucher->REFERRAL_DR; ?></td>
                             <td><?= $today_voucher->CO_PAY; ?></td>
                             <td><?= $today_voucher->EXTRA_MED; ?></td>
                             <td><?= $today_voucher->LAB_XRAY; ?></td>
                             <td><?= $today_voucher->SURGICAL; ?></td>
                             <td><?= $today_voucher->APPROVAL_CODE; ?></td>
                             <td><?= $today_voucher->FEE_AMT; ?></td>
                             <td><?= $today_voucher->PAY_AMT; ?></td>
                             <td><?= $today_voucher->CREATOR; ?></td>
                             <td><?= $today_voucher->CREATE_DATE; ?></td>
                             <td><?= $today_voucher->LAST_MODIFIER; ?></td>
                             <td><?= $today_voucher->LAST_UPDATE; ?></td>
                           </tr>
                      <?php } ?>
                     </tbody>
                  </table>
                  </div>
                       </fieldset>
                      </div> 
                      </fieldset>                   
                                                          
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

jQuery(window).on("load", function(){ });
 

var surgical_rate = $('#surgical_rate').val();
var COM_ID = $('#COM_ID').val();
var CARD_CODE = $('#CARD_CODE').val();
var CLASS_CODE = $('#CLASS_CODE').val();
var DOCTOR_CODE = $('#DOCTOR_CODE').val();
var partner_dr_code = $('#PARTNER_DR_CODE').val();




var GP_COPAY;
var SP_COPAY;
var phy_copay;
var herb_copay;
var GP_EXTRA_MED;
var SP_EXTRA_MED;
var GP_EXTRA_MED_BENEFIT;
var SP_EXTRA_MED_BENEFIT;

var HERB_EXTRA_MED;
var HERB_EXTRA_MED_BENEFIT;
var CLINICAL_PROCEDURES;

$('#PATIENT_CODE').on('change',function(){
       var PATIENT_CODE = $('#PATIENT_CODE').val();
      
      $.ajax({
                 url:BASE_URL + 'administrator/voucher_line/getDataByPatientCode/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CARD_CODE': CARD_CODE,'PATIENT_CODE':PATIENT_CODE},
                 success: function(res){
                    var patient = res.patient;
                    console.log(patient);
                    var hkid = res.HKID;
                    $('#PATIENT_HKID option').each(function(){
                      if ($(this).val() == hkid) {
                        $(this).attr("selected","selected"); 
                        $('#PATIENT_HKID_chosen .chosen-single span').text(hkid); 
                      }
                    });

                    GP_copay = $(patient).prop('GP_COPAY'); // can override SP ,GP, PHT, HERB copay
                    SP_copay = $(patient).prop('SP_COPAY');
                    phy_copay = $(patient).prop('PHY_COPAY');
                    herb_copay = $(patient).prop('HERB_COPAY');

                    GP_EXTRA_MED = $(patient).prop('GP_EXTRA_MED'); // can overriade GP, SP. HERB extra medication
                    SP_EXTRA_MED = $(patient).prop('SP_EXTRA_MED');
                    HERB_EXTRA_MED= $(patient).prop('HERB_EXTRA_MED');

                    GP_EXTRA_MED_BENEFIT = $(patient).prop('GP_EXTRA_MED_BENEFIT'); // can assign EXTRA_MED BENEFIT if GP,SP,HERB extra med is enable
                    SP_EXTRA_MED_BENEFIT = $(patient).prop('SP_EXTRA_MED_BENEFIT');
                    HERB_EXTRA_MED_BENEFIT = $(patient).prop('HERB_EXTRA_MED_BENEFIT');

                    CLINICAL_PROCEDURES = $(patient).prop('CLINICAL_PROCEDURES'); //equal to surgical 

                  var content = '';
                   for(var i = 0; i<patient.length; i++){
                    content += '<option value="'+patient[i]['PATIENT_NAME']+'">'+patient[i]['PATIENT_NAME']+'</option>';
                   }
                   $('#PATIENT_E_NAME').html(content);

                   var content2 = '';
                   for(var i=0; i<patient.length; i++){
                    content2 += '<option value="'+patient[i]['DEPD_CODE']+'">'+patient[i]['DEPD_CODE']+'</option>'
                   }
                   $('#DEPD_CODE').html(content2);

                   if ($('input[type="radio"][name="TYPE"]:checked').length>0) {
                          var m_type = $('input[type="radio"][name="TYPE"]:checked').val();
                          if (m_type=='GP') {
                          $('#CO_PAY').prop('value',GP_copay);
                              if (GP_EXTRA_MED==0) {
                                 $("#EXTRA_MED").prop('disabled',true);
                              }else{
                                $("#EXTRA_MED").prop('disabled',false);
                                $("#EXTRA_MED").prop('placeholder', "GP MAX: " + GP_EXTRA_MED_BENEFIT);
                              }
                          }
                          else if (m_type=='SP') {
                            $('#CO_PAY').prop('value',SP_copay);
                              if (SP_EXTRA_MED==0) {
                                 $("#EXTRA_MED").prop('disabled',true);
                              }else{
                                $("#EXTRA_MED").prop('disabled',false);
                                $("#EXTRA_MED").prop('placeholder',"SP MAX: "+ SP_EXTRA_MED_BENEFIT);

                              }
                          }
                          else if(m_type=='PY'){
                            $('#CO_PAY').prop('value',phy_copay);
                            if (CLINICAL_PROCEDURES==0) {
                               $("#SURGICAL").prop('disabled',true);
                              }else{
                                $("#SURGICAL").prop('disabled',false);
                              }
                          }
                          else{
                            $('#CO_PAY').prop('value',copay);
                          }
                        }
                    $('input[type="radio"][name="TYPE"]').on('change',function(){
                       var m_type = this.value;    
                          if (m_type=='GP') {
                          $('#CO_PAY').prop('value',GP_copay);
                          }
                          else if (m_type=='SP') {
                            $('#CO_PAY').prop('value',SP_copay);
                          }
                          else if(m_type=='PY'){
                            $('#CO_PAY').prop('value',phy_copay);
                          }
                          else{
                            $('#CO_PAY').prop('value',copay);
                          }
                    });

                 }
              });
    });

//    $('#PATIENT_HKID').on('change',function(){
        
//          var HKID = $('#PATIENT_HKID').val();
//          $.ajax({
//                  url:BASE_URL + 'administrator/voucher_line/getPatientdataById/',
//                  method:'GET',
//                  dataType:'JSON',
//                  data:{'CARD_CODE': CARD_CODE,'patient_id':HKID},
//                  success: function(res){
//                     var patient = res.patient;
//                     var PATIENT_NO = res.PATIENT_NO;
//                     console.log(PATIENT_NO);
//                     $('#PATIENT_CODE option').each(function(){
//                       if ($(this).val() == PATIENT_NO) {
//                         $(this).attr("selected","selected"); 
//                         $('#PATIENT_CODE_chosen .chosen-single span').text(PATIENT_NO); 
//                       }
//                     });

//                    var content = '';
//                    for(var i = 0; i<patient.length; i++){
//                     content += '<option value="'+patient[i]['PATIENT_NAME']+'">'+patient[i]['PATIENT_NAME']+'</option>';
//                    }
//                    $('#PATIENT_E_NAME').html(content);

//                    var content2 = '';
//                    for(var i=0; i<patient.length; i++){
//                     content2 += '<option value="'+patient[i]['DEPD_CODE']+'">'+patient[i]['DEPD_CODE']+'</option>'
//                    }
//                    $('#DEPD_CODE').html(content2);

//                  },
//                  error: function(){
//                     alert('Error');
//                  }
//           });
//    });




$('input[type=radio][name=TYPE]').on('change',function() {
     $('#CO_PAY').val("");
     $('#Fee').val("");
     $('#Pay').val("");
     $('#DR_special').val("");
     $('#EXTRA_MED').val("");
     $('#EXTRA_MED').removeAttr("placeholder");
     $('#LAB_XRAY').val("");
     $('#SURGICAL').val("");

    var type = this.value;

    var PATIENT_CODE = $('#PATIENT_CODE').val();
 
    $.ajax({
          url:BASE_URL + 'administrator/voucher_line/getFee/',
          method:'GET',
          dataType:'JSON',
          data:{'COM_ID': COM_ID, 'CARD_CODE': CARD_CODE,'CLASS_CODE':CLASS_CODE, 'DOCTOR_CODE':DOCTOR_CODE, 'partner_dr_code':partner_dr_code, 'type':type},
          success: function(res){
            var agreed_fee = res.agreed_fee;

            // VARIABLES CANT BE OVERRIDE // no errors --- 27 JUNE 2018 
            var fee = agreed_fee['FEE'];
            var pay = agreed_fee['PAY'];
            var special_fee = res.special_fee;

            $('#Fee').prop('value',agreed_fee['FEE']);
            $('#Pay').prop('value',agreed_fee['PAY']);  
            
            if (special_fee) {
              $('#DR_special').prop("value",special_fee['SPECIAL_FEE']);
            }else{
              $('#DR_special').prop("value",'0');
            }
           // no errors --- 27 JUNE 2018 

           
            // VARIABLES CAN BE OVERRIDE BY PATIENT BENEFIT DATA
            var CO_PAY = agreed_fee['CO_PAY'];
            var EXTRA_MED_BOL = agreed_fee['EXTRA_MED_BOL'];
            var LAB_XRAY_BOL =agreed_fee['LAB_XRAY_BOL'];
            var SURGICAL_BOL =agreed_fee['SURGICAL_BOL'];


            if (LAB_XRAY_BOL==0) {
               $("#LAB_XRAY").prop('disabled',true);
             }else{
                $("#LAB_XRAY").prop('disabled',false);
             }
       

         if (PATIENT_CODE=='') {
            $('#CO_PAY').prop('value',CO_PAY);
            
            if (EXTRA_MED_BOL==0) {

               $("#EXTRA_MED").prop('disabled',true);
            }else{
              $("#EXTRA_MED").prop('disabled',false);
            }
            if (SURGICAL_BOL==0) {
                  $("#SURGICAL").prop('disabled',true);
             }else
               {
                $("#SURGICAL").prop('disabled',false);
               }

         }else{
                       if (CLINICAL_PROCEDURES==0) {
                         $("#SURGICAL").prop('disabled',true);
                      }else{
                         $("#SURGICAL").prop('disabled',false);
                      }

             if (type=='GP') {
              
               $('#CO_PAY').prop('value',GP_copay);
                   if (GP_EXTRA_MED==0) {
                      $("#EXTRA_MED").prop('disabled',true);
                   }else{
                       $("#EXTRA_MED").prop('disabled',false);
                       $("#EXTRA_MED").prop('placeholder', "GP MAX: " + GP_EXTRA_MED_BENEFIT);
                    }
                 

             }else if (type=='SP') {
              
              $('#CO_PAY').prop('value',SP_copay);
                   if (SP_EXTRA_MED==0) {
                      $("#EXTRA_MED").prop('disabled',true);
                    }else{
                      $("#EXTRA_MED").prop('disabled',false);
                      $("#EXTRA_MED").prop('placeholder',"SP MAX: "+ SP_EXTRA_MED_BENEFIT);
                     }

             }else if (type=='PY') {
              
              $('#CO_PAY').prop('value',phy_copay);
                     if (CLINICAL_PROCEDURES==0) {
                         $("#SURGICAL").prop('disabled',true);
                      }else{
                         $("#SURGICAL").prop('disabled',false);
                      }
                  
             }else if (type=='HERB') {

               $('#CO_PAY').prop('value',herb_copay);
                    if (HERB_EXTRA_MED==0) {
                        $("#EXTRA_MED").prop('disabled',true);
                    }else{
                       $("#EXTRA_MED").prop('disabled',false);
                        $("#EXTRA_MED").prop('placeholder',"HERB MAX: "+ HERB_EXTRA_MED_BENEFIT);
                    }

         }else{
             $('#CO_PAY').prop('value',CO_PAY);
             if (EXTRA_MED_BOL==0) {
                 $("#EXTRA_MED").prop('disabled',true);
             }else{
                 $("#EXTRA_MED").prop('disabled',false);
             }
            
         }
       }

       }//sucess
    });

});





 $('#calcute_button').on('click',function(){
  $('#formula-box').empty();
    var fee = $('#Fee').val();
    var pay = $('#Pay').val();
    var copay = $('#CO_PAY').val();
    var special_fee = $('#DR_special').val();
    var EXTRA_MED = $('#EXTRA_MED').val();
    var LAB_XRAY = $('#LAB_XRAY').val();
    var SURGICAL = $('#SURGICAL').val();

    var total_fee;
    var total_pay;

    fee = parseInt(fee);
    pay = parseInt(pay);

    copay = (copay=='')?0:parseInt(copay);
    special_fee =(special_fee=='')?0:parseInt(special_fee);
    EXTRA_MED = (EXTRA_MED=='')?0:parseInt(EXTRA_MED);
    LAB_XRAY = (LAB_XRAY=='')?0:parseInt(LAB_XRAY);
    SURGICAL = (SURGICAL=='')?0:parseInt(SURGICAL);

    surgical_rate=(surgical_rate=='')?1:parseFloat(surgical_rate);

    var surgical_rate_value = 1-(surgical_rate*0.01);
    surgical_rate_value = surgical_rate_value.toFixed(2);
    //+ SURGICAL*surgical_rate
    total_fee = fee+ EXTRA_MED + LAB_XRAY +SURGICAL - copay;
    total_pay = pay+ EXTRA_MED + LAB_XRAY + (SURGICAL*surgical_rate_value) - copay + special_fee;
     
     // console.log('FEE:'+fee+'+EXTRA_MED:'+EXTRA_MED+' +LAB_XRAY:'+LAB_XRAY+' +SURGICAL*Surgical_rate:'+SURGICAL+' *'+surgical_rate_value+' -copay:'+copay+'=');
     var total_fee_html = 'Total Fee:'+fee+'[fee]+'+EXTRA_MED+'[extra]+'+LAB_XRAY+'[xray]+' +SURGICAL+'[Surgical]'+'-'+ copay+'[copay] ='+total_fee+'</br>';
     var total_pay_html = 'Total Pay:'+pay+'[pay]+'+EXTRA_MED+'[extra]+'+LAB_XRAY+'[xray]+'+ SURGICAL+'*'+surgical_rate_value+'[Surgical*Rate]'+'-'+copay+'[copay]+'+special_fee+'[DR Special Fee]'+'='+total_pay;
     // console.log(fee+ EXTRA_MED + LAB_XRAY + SURGICAL*surgical_rate_value - copay);
     // console.log(pay+ EXTRA_MED + LAB_XRAY + SURGICAL*surgical_rate_value - copay + special_fee);
    // console.log(total_fee);
    // console.log(total_pay)
    $('#formula-box').append(total_fee_html);
    $('#formula-box').append(total_pay_html);

    $('#FEE_AMT').prop('value',total_fee);
    $('#PAY_AMT').prop('value',total_pay);

 });
  

$('#SICK_LEAVE,#SL_TO').on('dblclick',function(){

      $(this).val("");
      $('#SICK_LEAVE').removeClass('red-border');
      $('#SL_TO').removeClass('red-border');

});
$('#SL_leave').on('click',function(){
  var SL_FROM = $('#SL_FROM').val();
  var SL_TO = $('#SL_TO').val();
  var SICK_LEAVE = $('#SICK_LEAVE').val();
  
  if(SL_FROM!=''){
    if (SL_TO!=''&&SICK_LEAVE=='') {
      var date1 = new Date(SL_FROM);
      var date2 = new Date(SL_TO);
      var diff = parseInt((date2-date1)/(1000*60*60*24))+1;
      $('#SICK_LEAVE').prop('value',diff);
      console.log(diff);
    } 
    else if (SL_TO==''&&SICK_LEAVE!='') {
       var date1 = new Date(SL_FROM);
       var date2 = new Date(date1.setDate(date1.getDate()+(parseInt(SICK_LEAVE)-1)));
       console.log(date2);
       console.log(date2.getFullYear());
       var year = date2.getFullYear();
       var month = date2.getMonth()+1;
       var date = date2.getDate();
       if (date==1||date==2||date==3) {
            var str = year +'-'+ month +'-0'+ date;
       }else{
            var str = year +'-'+ month +'-'+ date;

       }
       $('#SL_TO').prop('value', str);
    }
    else{
      $('#SICK_LEAVE').addClass('red-border');
       $('#SL_TO').addClass('red-border');
    }
  }

});


// $('#SL_FROM')

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