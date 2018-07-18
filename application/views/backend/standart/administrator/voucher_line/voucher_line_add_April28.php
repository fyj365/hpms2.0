
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
      width: 130px;
      margin-right: 5PX;
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
        font-weight: bold;
        background: #f39c12;
        border-radius: 6px;
        margin-left: 30px;
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
                   
               <!--     <div class="form-group">
                           <label for="BATCH_DATE" class="col-sm-2 control-label">BATCH DATE  </label>
                        <div class="col-sm-2">
                            <input type="text" class="" name="BATCH_DATE" id="BATCH_DATE" readonly>

                         </div>
                         
                          <label for="BATCH_NO" class="col-sm-2 control-label">BATCH NO </label>
                          <div class="col-sm-2">
                             <input type="text" class="" name="BATCH_NO" id="BATCH_NO" readonly>
                          </div>
                     </div> -->

                            <div class="form-group ">

                             <label for="CARD_CODE" class="col-sm-1 control-label">PARTNER CODE </label>
                            
                            <div  class="col-sm-2">
                            <select id="CARD_CODE" class="chosen chosen-select-deselect">
                                 <OPTION VALUE=''> SELECT PARTNER CODE</OPTION>>
                                <?php foreach ($CARD_CODE as $row): ?>
                                 <option value="<?= $row->CARD_CODE ?>"><?= $row->CARD_CODE; ?></option>
                                 <?php endforeach;?>
                             </select> 
                            </div>
                              
                          

                            <label for="CLASS_CODE" class="col-sm-1 control-label">CARD TYPE</label>
                            <div class="col-sm-2">
                                <SELECT id='partner_policy'>
                                </SELECT>
                            </div>

                         
                            <label for="Reaceive_DATE" class="col-sm-1 control-label">Reaceive DATE </label>
                          
                            <div class="date col-sm-2">
                              <input type="text" class="datepicker" name="Reaceive_DATE"  id="Reaceive_DATE">
                            </div>
                         
                            <label for="VOUCHER_NO" class="col-sm-1 control-label">VOUCHER NO  <i class="required">*</i> </label>
                           
                            <div class="col-sm-2">
                                <input type="text" class="" name="VOUCHER_NO" id="VOUCHER_NO" value="<?= set_value('VOUCHER_NO'); ?>">
                          </div>
                        
                        </div>

                                             
                                                 
                                                <div class="form-group ">
                           <label for="TREATMENT_DATE" class="col-sm-1 control-label">TREATMENT DATE </label>
                            <div class="date col-sm-2">
                              <input type="text" class="datepicker" name="TREATMENT_DATE"  id="TREATMENT_DATE">
                            </div>
                                      
                            <label for="SL_FROM" class="col-sm-1 control-label">SL FROM </label>
                            
                            <div class="date col-sm-2">
                              <input type="text" class="datepicker" name="SL_FROM" id="SL_FROM">
                            </div>
                             
                              <label for="SL_TO" class="col-sm-1 control-label">SL TO </label> 
                            <div class="date col-sm-2">
                              <input type="text" class="datepicker" name="SL_TO" id="SL_TO">
                            </div>

                                 <label for="SICK_LEAVE" class="col-sm-1 control-label">SICK LEAVE  </label>
                           
                            <div class="col-sm-2">
                                <input type="text" class="" name="SICK_LEAVE" id="SICK_LEAVE">
                            </div>
                                  
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-1 control-label">DR CODE  </label>
                           
                            <div class="col-sm-2">
                                <SELECT id="partner_dr">
                                </SELECT>
                               </div>
                            <label for="COMPANY_DR_CODE" class="col-sm-1 control-label">PARTNER DR CODE </label>
                            
                            <div class="col-sm-2">
                                <select id='COMPANY_DR_CODE'>
                                    
                                </select>

                            </div>

                             <label for="DR_E_NAME" class="col-sm-1 control-label">DR ENG NAME  </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="DR_E_NAME" id="DR_E_NAME">
                              
                            </div>
                       
                                                 
                              <label for="DR_C_NAME" class="col-sm-1 control-label">DR CHI NAME </label>
                            <div class="col-sm-2">
                                <input type="text" name="DR_C_NAME" id="DR_C_NAME">
                            </div>
                              </div>  

                           
                      </fieldset>
                    

                        <fieldset id="step2">
                            <legend>Voucher Detials</legend>
                            <div class="form-group ">
                            <label for="patient_CODE" class="col-sm-1 control-label">Patient CODE  </label>
                           
                            <div class="col-sm-2">
                                <select id="patient_CODE">
                                    
                                </select>
                            </div>
                            
                            <label for="MEMBER_HKID" class="col-sm-1 control-label">Patient HKID </label>
                            
                            <div class="col-sm-2">
                                <input type="text" class="" name="MEMBER_HKID" id="MEMBER_HKID">
                            </div>
                                                 
                            <label for="MEMBER_E_NAME" class="col-sm-1 control-label">PATIENT ENG NAME  </label>
                           
                            <div class="col-sm-2">
                                <input type="text" class="" name="MEMBER_E_NAME" id="MEMBER_E_NAME">
                            </div>
                             <label for="DEPD_CODE" class="col-sm-1 control-label">DEPD CODE  </label>
                           
                            <div class="col-sm-2">
                                <input type="text" class="" name="DEPD_CODE" id="DEPD_CODE">
                            </div>
                                    
                        </div>
        
                                        <!--         <div class="form-group ">
                            <label for="INSURED_NO" class="col-sm-2 control-label">INSURED NO 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="INSURED_NO" id="INSURED_NO">
                            </div>

                             <label for="CLASS_CODE" class="col-sm-2 control-label">CARD TYPE 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="CLASS_CODE" id="CLASS_CODE">
                             
                            </div>
                        </div> -->
                          <div class="col-sm-6">
                                     
                        <fieldset id="BenefitData">
                            <legend>Benefit Data</legend>
                            <div class="form-group ">
                            <label for="TYPE" class="col-sm-2 control-label">TYPE </label>
                            <div class="col-sm-10" id="type_box">
                              <label >GP</label>
                                <input type="radio"  name="TYPE" value="GP" readonly="flase">
                                   <label >SP</label>
                                <input type="radio"  name="TYPE" value="SP">
                                  <label>PHY</label>
                                <input type="radio"  name="TYPE" value="PHY">
                                   <label>PHY2</label>
                                <input type="radio"  name="TYPE" value="PHY2">
                                   <label>CU</label>
                                <input type="radio"  name="TYPE" value="CU">
                                   <label>GYN</label>
                                <input type="radio"  name="TYPE" value="GYN">
                                   <label>PAED</label>
                                <input type="radio"  name="TYPE" value="PAED">
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
                              <input type="text" name="Fee1" value="" id="Fee" class="fee" value="" readonly>
                            </div>
                            <label  for="Pay1" class="col-sm-2 control-label">PAY</label>
                               <div class="col-sm-2">
                             <input type="text" name="pay" value="" id="Pay" class="pay" value="" readonly>
                            </div>
                           

                        </div>
                        <div class="form-group">
                          <label for="DR_special" class="col-sm-2 control-label">DR SPECIAL</label>
                              <div class="col-sm-2">
                                <input type="text" name="DR_special" id="DR_special" value="" readonly>
                              </div>  
                           <label for="REFERRAL_DR" class="col-sm-2 control-label">REFERRAL DR</label>
                            
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
                                <input type="text" class=" name="LAB_XRAY" id="LAB_XRAY" value="">
                            </div>

                           <label for="APPROVAL_CODE" class="col-sm-2 control-label">APPROVAL CODE</label> 
                            
                            <div class="col-sm-2">
                                <input type="text" class="" name="APPROVAL_CODE" id="APPROVAL_CODE">
                            </div>
                        </div>
                        <div class="form-group">

                          <label for="SURGICAL" class="col-sm-2 control-label">SURGICAL</label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="SURGICAL" id="SURGICAL" value="">
                            </div>  
                            <label for="surgical_rate" class="col-sm-2 control-label">SURGICAL RATE(%)</label>
                            <div class="col-sm-2">
                              <input type="text" name="surgical_rate" id="surgical_rate" value="" readonly>
                            </div>     
                             
                        </div>
                        <div class="form-group ">
                            <label for="FEE_AMT" class="col-sm-2 control-label">FEE AMT 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="FEE_AMT" id="FEE_AMT" value="" readonly>
                            </div>
                             <label for="PAY_AMT" class="col-sm-2 control-label">PAY AMT 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="PAY_AMT" id="PAY_AMT" value="" readonly>
                            </div>
                            <button type="button" id="calcute_button">Calculate</button>
                          </div>
                                                 
                                                      
                        </fieldset>     
                        <fieldset id="Diagnosis">
                           <legend>Diagnosis Information</legend>
                           <div class="form-group ">
                            <label for="DIAG_CODE1" class="col-sm-2 control-label">DIAG CODE1 </label>
                            <div class="col-sm-3">
                               <select id="DIAG_CODE1">
                               </select>
                            </div>
                             <input type="text" class="" name="DIAG_CODE1">
                        </div>
                                                 
                            <div class="form-group ">
                            <label for="DIAG_CODE2" class="col-sm-2 control-label">DIAG CODE2 
                            </label>

                            <div class="col-sm-3">
                                 <select id="DIAG_CODE2">
                               </select>
                           
                            </div>
                           <input type="text" class="" name="DIAG_CODE2" id="DIAG_CODE2">

                        </div>
                                                 
                          <div class="form-group ">
                            <label for="DIAG_CODE3" class="col-sm-2 control-label">DIAG CODE3 
                            </label>
                            <div class="col-sm-3">
                                <select  id="DIAG_CODE3"> </select>
                                </div>
                            <input type="text" class="" name="DIAG_CODE3" id="DIAG_CODE3">
                            
                        </div>
                       </fieldset>   
                       </div> 
                                                           
                      
                      <div class="col-sm-6">
                        <fieldset>
                          <legend> Voucher Batch</legend>
                             <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>BATCH NO</th>
                           <th>BATCH DATE</th>
                           <th>PARTNER CODE</th>
                           <th>VOUCHER NO</th>
                           <th>CLASS CODE</th>
                           <th>TREATMENT DATE</th>
                           <th>DR CODE</th>
                           <th>COMPANY DR CODE</th>
                           <th>DR E NAME</th>
                           <th>DR C NAME</th>
                           <th>MEMBER CODE</th>
                           <th>MEMBER CLASS</th>
                           <th>MEMBER HKID</th>
                           <th>MEMBER E NAME</th>
                           <th>MEMBER C NAME</th>
                           <th>MEMBER STAFF NO</th>
                           <th>DEPD NAME</th>
                           <th>DEPD CODE</th>
                           <th>SICK LEAVE</th>
                           <th>SL FROM</th>
                           <th>SL TO</th>
                           <th>POLICY NO</th>
                           <th>INSURED NO</th>
                           <th>POLICY YEAR</th>
                           <th>DP TYPE</th>
                           <th>DIAG CODE1</th>
                           <th>DIAG CODE2</th>
                           <th>DIAG CODE3</th>
                           <th>DIAG CODE4</th>
                           <th>TYPE</th>
                           <th>REFERRAL DR</th>
                           <th>REFERRAL TYPE</th>
                           <th>CO PAY</th>
                           <th>EXTRA MED BOL</th>
                           <th>EXTRA MED</th>
                           <th>EXTRA MED REMARK</th>
                           <th>LAB XRAY BOL</th>
                           <th>LAB XRAY</th>
                           <th>LAB XRAY CODE</th>
                           <th>SURGICAL BOL</th>
                           <th>SURGICAL</th>
                           <th>SURGICAL CODE</th>
                           <th>APPROVAL CODE</th>
                           <th>FEE AMT</th>
                           <th>OS AMT</th>
                           <th>PAY AMT</th>
                           <th>DR CODE DE</th>
                           <th>FEE AMT DE</th>
                           <th>PAY AMT DE</th>
                           <th>STATUS</th>
                           <th>ENTRY TIME DE</th>
                           <th>LAST MODIFIER VE</th>
                           <th>LAST MODIFIER DE</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line">
                         <tr>
                        </tr>

                     </tbody>
                  </table>
                  </div>
                       </fieldset>
                      </div> 
                      </fieldset>                   
                                                                                             
         <!--             <fieldset>
                         <legend>Fee and Pay</legend>
                         <div style="padding-left: 150px;margin-bottom: 15px;" id="Fee">
                             <div class="row fee_pay">
                            <span class="col-sm-2">Fee Code</span>
                            <span class="col-sm-2">Fee</span>
                            <span class="col-sm-2">Pay</span>
                        </div>
                        <div class="row fee_pay">
                            <div class="col-sm-2">
                             <input type="text" name="Feecode" value="">
                            </div>
                             <div class="col-sm-2">
                              <input type="text" name="Fee1" value="" id="Fee1" class="fee">
                            </div>
                               <div class="col-sm-2">
                             <input type="text" name="pay" value="" id="Pay1" class="pay">
                            </div>
                        </div>
                         </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE_AMT" class="col-sm-2 control-label">FEE AMT 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="FEE_AMT" id="FEE_AMT" >
                            </div>
                             <label for="PAY_AMT" class="col-sm-2 control-label">PAY AMT 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="" name="PAY_AMT" id="PAY_AMT" >
                            </div>
                                   
                        </div> -->
                                                 
                                                 
                                    <!-- 
                                                <div class="form-group ">
                            <label for="DR_CODE_DE" class="col-sm-2 control-label">DR CODE DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="" name="DR_CODE_DE" id="DR_CODE_DE" >
                          
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FEE_AMT_DE" class="col-sm-2 control-label">FEE AMT DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="" name="FEE_AMT_DE" id="FEE_AMT_DE" value="<?= set_value('FEE_AMT_DE'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PAY_AMT_DE" class="col-sm-2 control-label">PAY AMT DE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="" name="PAY_AMT_DE" id="PAY_AMT_DE" value="<?= set_value('PAY_AMT_DE'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div> -->
<!--                      </fieldset>
 -->                                         
                     

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
      var surgical_rate;
      var sp_fee;

    //   $('#CARD_CODE').on('change',function(){
    //      $('#COMPANY_DR_CODE').empty();
    //      $('#DR_E_NAME').val("");
    //      $('#DR_C_NAME').val("");
    //      $('#MEMBER_E_NAME').attr('value',"");
    //      $('#MEMBER_HKID').attr('value',"");
    //      $('#DEPD_CODE').attr('value',"");

    //      $('input[type="radio"][name="TYPE"]').each(function(){
    //             $(this).removeClass('border');
    //       });
    //      $('input[type="radio"][name="TYPE"]').each(function(){
    //             $(this).prop('disabled',false);
    //       });
    //      $('input[type="radio"][name="TYPE"]').attr('checked',false);
    //      $('#CO_PAY').val("");
    //      $('#Fee').val("");
    //      $('#Pay').val("");
    //      $('#DR_special').val("");
    //      $('#EXTRA_MED').val("");
    //      $('#LAB_XRAY').val("");
    //      $('#SURGICAL').val("");


    //     var CARD_CODE = $('#CARD_CODE').val();
    //             $.ajax({
    //              url:BASE_URL + 'administrator/voucher_line/getContractdata/',
    //              method:'GET',
    //              dataType:'JSON',
    //              data:{'CARD_CODE': CARD_CODE },
    //              success: function(res){

    //                 var CLASS_CODEs = res.CLASS_CODEs;  
    //                 var content = '<option value="">SELECT CARD TYPE</option>'
    //                 for(var i=0; i<CLASS_CODEs.length;i++){
    //                     content  += '<option value="'+ CLASS_CODEs[i]['CLASS_CODE'] +'">' + CLASS_CODEs[i]['CLASS_CODE']+ '</option>'
    //                 }
    //                 $('#partner_policy').html(content);


    //                 var partner_doctors = res.partner_doctors;
    //                 var content = '<option value="">SELECT DR_CODE</option>';
    //                 for (var i = 0; i < partner_doctors.length; i++) {
    //                     content += '<option value="'+
    //                      partner_doctors[i]['DR_CODE'] +'">' + partner_doctors[i]['DR_CODE']+'</option>'
    //                 }
    //                 $('#partner_dr').html(content);


    //                  var patients = res.patients;
    //                  var content = '<option value="">SELECT PATIENT CODE</option>';
    //                  for (var i = 0; i < patients.length; i++) {
    //                     content += '<option value="'+
    //                      patients[i]['PATIENT_NO'] +'">' + patients[i]['PATIENT_NO']+'</option>'
    //                   }
    //                  $('#patient_CODE').html(content);


    //                  var diagnosis_code = res.diagnosis_code;
    //                  var content = '<option value="">DIAGNOSIS CODE</option>';
    //                  for (var i = 0; i < diagnosis_code.length; i++) {
    //                     content += '<option value="'+
    //                      diagnosis_code[i]['DIAG_CODE'] +'">' + diagnosis_code[i]['DIAG_CODE']+'</option>'
    //                   }
    //                   $('#DIAG_CODE1').html(content);
    //                   $('#DIAG_CODE2').html(content);
    //                   $('#DIAG_CODE3').html(content);

    //                 }
    //           });

    //             $('#partner_dr').on('change',function(){

    //                  $('input[type="radio"][name="TYPE"]').attr('checked',false);
    //                  $('#CO_PAY').val("");
    //                  $('#Fee').val("");
    //                  $('#Pay').val("");

    //                  $('#DR_special').val("");
    //                  $('#EXTRA_MED').val("");
    //                  $('#LAB_XRAY').val("");
    //                  $('#SURGICAL').val("");

    //               var doctor_code =  $('#partner_dr').val();
    //               var CARD_CODE = $('#CARD_CODE').val();
    //               var CLASS_CODE = $('#partner_policy').val();
    //              $.ajax({
    //                     url:BASE_URL + 'administrator/voucher_line/getDoctorData/',
    //                     method:'GET',
    //                     dataType:'JSON',
    //                     data:{'doctor_code':doctor_code,'CARD_CODE':CARD_CODE,'CLASS_CODE':CLASS_CODE},
    //                     success:function(res){
    //                         var com_doctor = res.com_doctor;
    //                         var content ='';
                            
    //                         sp_fee = res.special_fee;
    //                         var doctor_name = res.doctor_name;
    //                         $('#DR_E_NAME').prop('value',doctor_name['E_NAME']);
    //                         $('#DR_C_NAME').prop('value',doctor_name['C_NAME']);
    //                         for (var i = 0; i < com_doctor.length; i++) {
    //                             content +='<option value="'+ com_doctor[i]['PARTNER_DR_CODE']+'">'+com_doctor[i]['PARTNER_DR_CODE']+'</option>'
    //                             }
    //                         $('#COMPANY_DR_CODE').html(content);
                            
    //                         }

    //                       });
    //                 });

    //         $('#partner_policy').on('change',function(){

    //                  $('input[type="radio"][name="TYPE"]').each(function(){
    //                     $(this).removeClass('border');
    //                     });
    //                  $('input[type="radio"][name="TYPE"]:checked').prop('checked',false);
    //                  $('input[type="radio"][name="TYPE"]').each(function(){
    //                     $(this).prop('disabled',false);
    //                     });
    //                      $('input[type="radio"][name="type"]').attr('checked',false);
    //                      $('#CO_PAY').val("");
    //                      $('#Fee').val("");
    //                      $('#Pay').val("");
    //                      $('#DR_special').val("");
    //                      $('#EXTRA_MED').val("");
    //                      $('#LAB_XRAY').val("");
    //                      $('#SURGICAL').val("");
    //                      $('#FEE_AMT').val("");
    //                      $('#PAY_AMT').val("");
    //                 var CARD_CODE = $('#CARD_CODE').val();
    //                 var CLASS_CODE = $('#partner_policy').val();

    //                 $.ajax({
    //                     url:BASE_URL + 'administrator/voucher_line/getBenefitDate/',
    //                     method:'GET',
    //                     dataType:'JSON',
    //                     data:{'CLASS_CODE':CLASS_CODE,'CARD_CODE':CARD_CODE},
    //                     success:function(res){
    //                         surgical_rate =res.SURGICAL_RATE['SURGICAL_RATING'];
    //                         $('#surgical_rate').attr('value',surgical_rate);


    //                         var benefit_type = res.Benefit_TYPE;

    //                         var Type_list = []; //  card type including type
    //                         $(benefit_type).each(function(ele){
    //                               var type1 = $(this).attr('TYPE');
    //                               Type_list.push(type1);

    //                          });
    //                         $('input[type="radio"][name="TYPE"]').each(function(){
    //                             var TYPE = $(this).attr('value');

    //                             for(var i=0; i<Type_list.length; i++){

    //                             if (TYPE==Type_list[i]) {
    //                               // console.log(TYPE);  //会重复打印
    //                               $(this).addClass('border');
    //                            }
    //                          }
    //                       });
                          

    //                         var Type1_list = []; // card type not including type
    //                         $('input[type="radio"][name="TYPE"]').each(function(ele){
    //                             Type0 = $(this).val();
    //                             if (Type_list.indexOf(Type0)== -1 ) {
    //                               Type1_list.push(Type0);
    //                             }
    //                           });

    //                       $('input[type="radio"][name="TYPE"]').each(function(){
    //                             var TYPE = $(this).attr('value');
    //                             for(var i=0; i<Type1_list.length; i++){
    //                             if (TYPE==Type1_list[i]) {
    //                               // console.log(TYPE);  //会重复打印
    //                               $(this).prop('disabled',true);
    //                            }
    //                          }
    //                       });

    //                       }
    //                   });
    //             });
    // });




  $('input[type=radio][name=TYPE]').on('change',function() {
     $('#CO_PAY').val("");
     $('#Fee').val("");
     $('#Pay').val("");
     $('#DR_special').val("");
     $('#EXTRA_MED').val("");
     $('#LAB_XRAY').val("");
     $('#SURGICAL').val("");

    var CARD_CODE = $('#CARD_CODE').val();
    var CLASS_CODE = $('#partner_policy').val();
    var doctor_code =  $('#partner_dr').val();
    var patient_code = $('#patient_CODE').val();

    var type = this.value;

    if (sp_fee) {

       $(sp_fee).each(function(ele){

         if ($(this).attr('TYPE')==type) {
         
             $('#DR_special').prop('value',$(this).attr('SPECIAL_FEE'));
         
         }else{
             $('#DR_special').val("");
            }
         });
    }
    else{
        $('#DR_special').val("");
    }

    $.ajax({
          url:BASE_URL + 'administrator/voucher_line/getCopay/',
          method:'GET',
          dataType:'JSON',
          data:{'CARD_CODE': CARD_CODE,'CLASS_CODE':CLASS_CODE, 'type':type},
          success: function(res){
            var agreed_fee = res.copay;
            var CO_PAY = agreed_fee['CO_PAY'];
            var fee = agreed_fee['FEE'];
            var pay = agreed_fee['PAY'];
            $('#Fee').prop('value',fee);
            $('#Pay').prop('value',pay);  

          if (type=='GP') {
            if (patient_code!='') {
              $('#CO_PAY').prop('value',GP_copay);

            }else{
              $('#CO_PAY').prop('value',CO_PAY);

            }

          }
          else if (type=='SP') {
             if (patient_code!='') {
              $('#CO_PAY').prop('value',SP_copay);

            }else{
              $('#CO_PAY').prop('value',CO_PAY);

            }
          }
          else if(type=='PHY'){
            if (patient_code!='') {
              $('#CO_PAY').prop('value',phy_copay);

            }else{
              $('#CO_PAY').prop('value',CO_PAY);

            }
          }
          else{
            $('#CO_PAY').prop('value',CO_PAY);
          }
       }
    });


});

$('#patient_CODE').on('change',function(){
         var CARD_CODE = $('#CARD_CODE').val();
         var patient_code = $('#patient_CODE').val();
         $.ajax({
                 url:BASE_URL + 'administrator/voucher_line/getPatientdata/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CARD_CODE': CARD_CODE,'patient_code':patient_code},
                 success: function(res){
                    var patient = res.patient;
                    console.log(patient);
                    var name = $(patient).prop('PATIENT_NAME');
                    var hkid = $(patient).prop('HKID');
                    var depd_code = $(patient).prop('DEPD_CODE');
                    var staff_no = $(patient).prop('STAFF_NO');
                    var CLASS_CODE = $(patient).prop('CLASS_CODE');
                    GP_copay = $(patient).prop('GP_COPAY');
                    SP_copay = $(patient).prop('SP_COPAY');
                    phy_copay = $(patient).prop('PHY_COPAY');
                    GP_EXTRA_MED = $(patient).prop('GP_EXTRA_MED');
                    GP_EXTRA_MED_BENEFIT = $(patient).prop('GP_EXTRA_MED_BENEFIT');
                    SP_EXTRA_MED = $(patient).prop('SP_EXTRA_MED');
                    SP_EXTRA_MED_BENEFIT =$(patient).prop('SP_EXTRA_MED_BENEFIT');
                    HERB_EXTRA_MED=$(patient).prop('HERB_EXTRA_MED');
                    HERB_EXTRA_MED_BENEFIT = $(patient).prop('HERB_EXTRA_MED_BENEFIT');

                    $('#MEMBER_E_NAME').attr('value',name);
                    $('#MEMBER_HKID').attr('value',hkid);
                    $('#DEPD_CODE').attr('value',depd_code);
                    $('#MEMBER_STAFF_NO').attr('value',staff_no);
                    $('#CLASS_CODE').attr('value',CLASS_CODE);
                   
                   if ($('input[type="radio"][name="TYPE"]:checked').length>0) {
                          var m_type = $('input[type="radio"][name="TYPE"]:checked').val();
                          if (m_type=='GP') {
                          $('#CO_PAY').prop('value',GP_copay);
                          }
                          else if (m_type=='SP') {
                            $('#CO_PAY').prop('value',SP_copay);
                          }
                          else if(m_type=='PHY'){
                            $('#CO_PAY').prop('value',phy_copay);
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
                          else if(m_type=='PHY'){
                            $('#CO_PAY').prop('value',phy_copay);
                          }
                          else{
                            $('#CO_PAY').prop('value',copay);
                          }
                    });

                 }
              });

    });

   $('#MEMBER_HKID').on('blur',function(){
         var CARD_CODE = $('#CARD_CODE').val();
         var HKID = $('#MEMBER_HKID').val();
         $.ajax({
                 url:BASE_URL + 'administrator/voucher_line/getPatientdata/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CARD_CODE': CARD_CODE,'patient_id':HKID},
                 success: function(res){
                    var patient = res.patient2;
                    var patient_code = $(patient).prop('PATIENT_NO');
                    var name = $(patient).prop('PATIENT_NAME');
                    var depd_code = $(patient).prop('DEPD_CODE');
                    var staff_no = $(patient).prop('STAFF_NO');
                    var CLASS_CODE = $(patient).prop('CLASS_CODE');

                    // var name = patient['PATIENT_NAME'];
                    // console.log(name);
                    $('#patient_CODE').attr('value',patient_code);
                    $('#MEMBER_E_NAME').attr('value',name);
                    $('#DEPD_CODE').attr('value',depd_code);
                    $('#MEMBER_STAFF_NO').attr('value',staff_no);
                    $('#CLASS_CODE').attr('value',CLASS_CODE);
                 }
              });
   });

 $('#calcute_button').on('click',function(){
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
    copay =parseInt(copay);
    EXTRA_MED = (EXTRA_MED=='')?0:parseInt(EXTRA_MED);
    LAB_XRAY = (LAB_XRAY=='')?0:parseInt(LAB_XRAY);
    SURGICAL = (SURGICAL=='')?0:parseInt(SURGICAL);

    surgical_rate=(surgical_rate=='')?1:parseFloat(surgical_rate);

    var surgical_rate_value = 1-(surgical_rate*0.01);
    surgical_rate_value = surgical_rate_value.toFixed(2);
    //+ SURGICAL*surgical_rate
    total_fee = fee+ EXTRA_MED + LAB_XRAY + (SURGICAL*surgical_rate_value) - copay;
    total_pay = pay+ EXTRA_MED + LAB_XRAY + (SURGICAL*surgical_rate_value) - copay + special_fee;
     
    // console.log(fee+ EXTRA_MED + LAB_XRAY + SURGICAL*surgical_rate_value - copay);
    // console.log(pay+ EXTRA_MED + LAB_XRAY + SURGICAL*surgical_rate_value - copay + special_fee);
    // console.log(total_fee);
    // console.log(total_pay)
    
    $('#FEE_AMT').prop('value',total_fee);
    $('#PAY_AMT').prop('value',total_pay);

 });
  

    // $('#MEMBER_HKID').on('blur',function(){
    //      var CARD_CODE = $('#CARD_CODE').val();
    //      var HKID = $('#MEMBER_HKID').val();
    //      $.ajax({
    //              url:BASE_URL + 'administrator/voucher_line/getPatientdata/',
    //              method:'GET',
    //              dataType:'JSON',
    //              data:{'CARD_CODE': CARD_CODE,'patient_id':HKID},
    //              success: function(res){
    //                 var patient = res.patient;
    //                 var name = $(patient).prop('PATIENT_NAME');
    //                 alert(name);
    //                 console.log(patient);
    //                 // var name = patient['PATIENT_NAME'];
    //                 // console.log(name);
    //                 $('#MEMBER_E_NAME').attr('value',name);
    //                 $('#MEMBER_E_NAME').attr('placeholder',name);
    //              }
    //           })
    // });    
$('#SICK_LEAVE').on('focus',function(){
  var SL_FROM = $('#SL_FROM').val();
  var SL_TO = $('#SL_TO').val();

  var date1 = new Date(SL_FROM);
      date2 = new Date(SL_TO);
      diff = parseInt((date2-date1)/(1000*60*60*24));
      $('#SICK_LEAVE').attr('value',diff);

})


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