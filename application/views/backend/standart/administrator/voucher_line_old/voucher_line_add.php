
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

<style type="text/css">
   * {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;;
}

.row {
  margin-left: 20px;
  padding-left: 20px;
  padding-bottom: 5px;
}

label {
  text-align: right;
  width:20%; 
  margin-right: 10px;
}

input[type=text],select,textarea{
  width: 25%;
}


.medium-label {
  width: 14%;
}
.small-label {
  width: 10%;
}
.large-input {
  width: 60%;
}
.btn.btn-cal{
  margin-left: 20px;
  padding: 1px;
  height: 24px;
  width: 100px;
  color: white;
  background-color:#1abc9c;

}

.btn.btn-recal{
  margin-left: 20px;
  padding: 1px;
  height: 24px;
  width: 125px;
  color: white;
  background-color: #e67e22;
}
.datepicker {
  height: 24px;
}

span[class=small-label]{
  display: inline-block;
  width: 30%;
}

input[class=small-input] {
  width: 20%;
}
input[class=large-input]{
    width: 50%;
}
select[class=small-select] {
  width: 15%;
  margin-right: 10px;
}

input[class=large-textField]{
  width: 80%;
}
.tablewrapper{
  width: 100%;
  height: 500px;
  overflow: auto;
  background-color: #fefefe;
}
 table{
    overflow-x: auto;
    width: 50%;
    border-spacing: 10px;
    color: black;
    background-color: f4f5f7;
 }
 th {
  text-align: left;
  color: white;
  background-color: #14181e;
 }
th,td{
  padding: 10px;
 }
 table thead th {
  border-right: 1px solid white;
 }
table tr:nth-child(even) {
  background-color: #cad3dd;
}

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Voucher Line        <small>New Voucher Line</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher Line</a></li>
        <li class="active">New</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->

                        <?= form_open('', [
                            'name'    => 'form_voucher_line', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_voucher_line', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                    <div class="container" style="width: 95%;">
   
                     <div class="row">
                       <div class="col-sm-6 left">
                        <fiedldset>

                                <legend>General</legend>

                              <label for="BATCH_NO" class="">Batch No.       </label>
                              <input type="text" class="" name="BATCH_NO" id="BATCH_NO" value="<?= set_value('BATCH_NO'); ?>">
                              <label for="BATCH_DATE" class="medium-label">Batch Date  </label>
                              <input type="text" class="" class="datepicker" name="BATCH_DATE" value="<?php echo date("Y-m-d"); ?>" id="BATCH_DATE">
                             
                            <label for="VOUCHER_NO" class="">Voucher No. </label>
                            <input type="text" class="" name="VOUCHER_NO" id="VOUCHER_NO" value="<?= set_value('VOUCHER_NO'); ?>">
                            
                            <label for="CLASS_CODE" class="medium-label left-margin">Class </label>
                                <select  class="" name="CLASS_CODE" id="CLASS_CODE" data-placeholder="Select Class" >
                                    <option value=""></option>
                                    <?php 
                                    $this->db->group_by("CLASS_CODE");
                                    $query = $this->db->get('classification');
                                    $query = $query->result();
                                    foreach ($query as $row): ?>
                                    <option value="<?= $row->CLASS_CODE ?>"><?= $row->CLASS_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <br>
                           
                             <label for="SICK_LEAVE" >Sick Leave  </label>
                             <input type="text" name="SICK_LEAVE" id="SICK_LEAVE" value="<?= set_value('SICK_LEAVE'); ?>"><br>                            
                                 <label for="SL_FROM">From </label>
                                <input type="text" class="datepicker" name="SL_FROM" id="SL_FROM">
                                 <label for="SL_TO"  class="medium-label left-margin">To </label>
                              <input type="text" class="datepicker" name="SL_TO" id="SL_TO">

                         </fiedldset>
                          
                          
                        <fiedldset>
                                <legend>Doctor Data</legend>
                                 <label for="DR_CODE" class="">Dr Code </label>
                                <select class="" name="DR_CODE" id="DR_CODE" data-placeholder="Select Dr Code" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company_doctor') as $row): ?>
                                    <option value="<?= $row->DR_CODE ?>"><?= $row->DR_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>      
                            <label for="COMPANY_DR_CODE" class="super-label left-margin">Comp's Dr Code  </label>
                                <select  class="" name="COMPANY_DR_CODE" id="COMPANY_DR_CODE" data-placeholder="Select Comp's Dr Code" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('company_doctor') as $row): ?>
                                    <option value="<?= $row->COMPANY_DR_CODE ?>"><?= $row->COMPANY_DR_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select> <br>  
                
                            <label for="DR_E_NAME" class="">Dr Eng Name </label>
                                <input type="text" class="" name="DR_E_NAME" id="DR_E_NAME" value="<?= set_value('DR_E_NAME'); ?>">
                                    
                            <label for="DR_C_NAME" class="super-label left-margin">Dr Chi Name </label>
                                <input type="text" class="" name="DR_C_NAME" id="DR_C_NAME" value="<?= set_value('DR_C_NAME'); ?>">

                            </fiedldset>

                            <fiedldset>
                                <legend>Member Data</legend>

                                  <label for="MEMBER_CODE" class="" >Mem Code </label>
                            
                                <select class="" name="MEMBER_CODE" id="MEMBER_CODE" data-placeholder="Select Mem Code" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('member') as $row): ?>
                                    <option value="<?= $row->MEMBER_CODE ?>"><?= $row->MEMBER_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select> 
                                                 
                            <label for="MEMBER_CLASS" class="">Mem Class </label>
                        
                                <select class="" name="MEMBER_CLASS" id="MEMBER_CLASS" data-placeholder="Select Mem Class" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('member') as $row): ?>
                                    <option value="<?= $row->MEMBER_CLASS ?>"><?= $row->MEMBER_CLASS; ?></option>
                                    <?php endforeach; ?>  
                                </select> <br>  
          
                            
                       <label for="MEMBER_HKID" class="">HKID </label>
                         <input type="text" class="f" name="MEMBER_HKID" id="MEMBER_HKID" value="<?= set_value('MEMBER_HKID'); ?>">     
                        <label for="MEMBER_E_NAME" class="">Eng Name </label>
                            
                         <input type="text" class="" name="MEMBER_E_NAME" id="MEMBER_E_NAME" value="<?= set_value('MEMBER_E_NAME'); ?>"><br>
                                                 
                        <label for="MEMBER_C_NAME" class="">Chi Name</label> 
                            
                        <input type="text" class="" name="MEMBER_C_NAME" id="MEMBER_C_NAME" value="<?= set_value('MEMBER_C_NAME'); ?>"><br>

 
                           <label for="DEPD_NAME" class="">Depd Name   </label>
                  
                                <input type="text" class="" name="DEPD_NAME" id="DEPD_NAME" value="<?= set_value('DEPD_NAME'); ?>">
                                                 
                            <label for="DEPD_CODE" class="">Depd Code  </label>
                           
                                <input type="text" class="" name="DEPD_CODE" id="DEPD_CODE" value="<?= set_value('DEPD_CODE'); ?>"><br>
                            <label for="MEMBER_STAFF_NO" class="">Staff No. </label>
                            
                            <input type="text" class="" name="MEMBER_STAFF_NO" id="MEMBER_STAFF_NO" value="<?= set_value('MEMBER_STAFF_NO'); ?>">
                
                       </fiedldset>
                           
                           
                        
                          <fieldset>
                              <legend>Status</legend>
                               <label for="POLICY_NO" class="">Policy No. 
                            </label>
                                <input type="text" class="" name="POLICY_NO" id="POLICY_NO" value="<?= set_value('POLICY_NO'); ?>">
                                                 
                            <label for="INSURED_NO" class="left-margin">Insured No. 
                            </label>
                                <input type="text" class="" name="INSURED_NO" id="INSURED_NO" value="<?= set_value('INSURED_NO'); ?>"> <br>  
                                                 
                            <label for="POLICY_YEAR" class="">Policy Year 
                            </label>
                                <input type="text" class="" name="POLICY_YEAR" id="POLICY_YEAR" value="<?= set_value('POLICY_YEAR'); ?>">
                                                 
                            <label for="DP_TYPE" class="left-margin">DP Type 
                            </label>
                            <input type="text" class="" name="DP_TYPE" id="DP_TYPE" value="<?= set_value('DP_TYPE'); ?>">
                          </fieldset>

                          <fieldset>
                                   <legend>Voucher Lines</legend>

                  <div class="tablewrapper"> 
                  <table class="">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>BATCH NO</th>
                           <th>COMPANY CODE</th>
                           <th>VOUCHER NO</th>
                           <th>TREATMENT DATE</th>
                           <th>DR CODE</th>
                           <th>DR E NAME</th>
                           <th>DR C NAME</th>
                           <th>MEMBER E NAME</th>
                           <th>DEPD NAME</th>
                           <th>FEE AMT</th>
                           <th>OS AMT</th>
                           <th>Action</th>
                        </tr>

                     </thead>
                     <tbody>
                        <?php foreach (db_get_all_data(' voucher_line') as $row): ?>
                          <tr>
                          <td></td>
                          <td><?= $row->BATCH_NO; ?></td>
                          <td><?= $row->COMPANY_CODE; ?></td>
                          <td><?= $row->VOUCHER_NO; ?></td>
                          <td><<?= $row->TREATMENT_DATE; ?>/td>
                          <td><?= $row->DR_CODE; ?></td>
                          <td><?= $row->DR_E_NAME; ?></td>
                          <td><?= $row->DR_C_NAME; ?></td>
                          <td><?= $row->MEMBER_E_NAME; ?></td>
                          <td><?= $row->DEPD_NAME; ?></td>
                          <td><?= $row->FEE_AMT; ?></td>
                          <td><?= $row->OS_AMT; ?></td>
                          <td></td>
                        </tr>
                      <?php  endforeach;?>
                     </tbody>
                     
                  </table>

                  </div>

                          </fieldset>
                           

                        </div> <!--end of left-->
                            <div class="col-sm-6 right">
                                <fieldset>
                                    <legend>Diagnosis</legend>
                                 <span class="small-select">Diagnosis Code</span> <span class="" style="width: 70%">Description</span><br>

                                <div class="row">
                                <select  class="small-select" name="DIAG_CODE1" id="DIAG_CODE1" data-placeholder="Diag Code 1" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <input type="text" class="large-textField" name="DIAG_DESC1" id="DIAG_DESC1" value="<?= set_value('DIAG_DESC1'); ?>"><br>
                              </div>
                            
                            <div class="row">
                                <select  class="small-select" name="DIAG_CODE2" id="DIAG_CODE2" data-placeholder="Diag Code 2" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <input type="text" class="large-textField" name="DIAG_DESC2" id="DIAG_DESC2" value="<?= set_value('DIAG_DESC2'); ?>"><br>
                            </div>

                            <div class="row">
                                <select  class="small-select" name="DIAG_CODE3" id="DIAG_CODE3" data-placeholder="Diag Code 3" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <input type="text" class="large-textField" name="DIAG_DESC3" id="DIAG_DESC3" value="<?= set_value('DIAG_DESC3'); ?>"><br>
                             </div>     

                             <div class="row">                  
                                <select  class="small-select" name="DIAG_CODE4" id="DIAG_CODE4" data-placeholder="Diag Code 4" >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('diagnosis_code') as $row): ?>
                                    <option value="<?= $row->DIAG_CODE ?>"><?= $row->DIAG_CODE; ?></option>
                                    <?php endforeach; ?>  
                                </select>
                                <input type="text" class="large-textField" name="DIAG_DESC4" id="DIAG_DESC4" value="<?= set_value('DIAG_DESC4'); ?>">
                                </div> 
                              </fieldset>

                             <fieldset>
                                    <legend> Benefit Data Detail</legend>
                               <label for="TYPE_GP" class="small-label">GP </label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_GP" value="<?= set_value('TYPE'); ?>">
                                <label for="TYPE_SP" class="small-label">SP </label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_SP" value="<?= set_value('TYPE'); ?>">
                                <label for="TYPE_GP" class="small-label">PHY </label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_GP" value="<?= set_value('TYPE'); ?>">
                                                 
                                 <label for="TYPE_GP" class="small-label">PHY2</label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_GP" value="<?= set_value('TYPE'); ?>">  
                                <label for="TYPE_GP" class="small-label">CU </label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_GP" value="<?= set_value('TYPE'); ?>">
                                  <label for="TYPE_GP" class="small-label">GYN </label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_GP" value="<?= set_value('TYPE'); ?>">  
                                <label for="TYPE_GP" class="small-label">PAED</label>
                                <input type="checkbox" class="" name="TYPE" id="TYPE_GP" value="<?= set_value('TYPE'); ?>">  
                                <label for="REFERAL" class="medium-label">Referral</label>
                                 <input type="checkbox" class="" name="REFERAL[]" value="1"> <br>


                             <fieldset>
                                 <div class="row">
                                <label for="CO_PAY" class="big-label">Co-pay</label>
                                <input type="text" class="" name="CO_PAY" id="CO_PAY" value="<?= set_value('CO_PAY'); ?>">  

                                  <label for="EXTRA_MED_BOL" class="b">
                                 <input type="checkbox" class="" name="EXTRA_MED_BOL[]" value="1"> Extra Med         
                                  </label>
                                                                     
                                <input type="text" class="" name="EXTRA_MED" id="EXTRA_MED" value="<?= set_value('EXTRA_MED'); ?>"><br>
                                 </div>
                            
                                 <div class="row">
                                <label for="LAB_XRAY_BOL" class=""> 
                                   <input type="checkbox" class="" name="LAB_XRAY_BOL[]" value="1">Lab/Xray
                              </label>

                            <input type="text" class="" name="LAB_XRAY" id="LAB_XRAY" value="<?= set_value('LAB_XRAY'); ?>">

                            <label for="LAB_XRAY_CODE" class="">. Code </label>
                            <input type="text" class="" name="LAB_XRAY_CODE" id="LAB_XRAY_CODE" value="<?= set_value('LAB_XRAY_CODE'); ?>"> <br>
                            </div>
                              
                              <div class="row">
                              <label>
                                   <input type="checkbox" class="" name="SURGICAL_BOL[]" value="1">Surgical
                              </label>
                              <input type="text" class="" name="SURGICAL" id="SURGICAL" value="<?= set_value('SURGICAL'); ?>">
                            <label>. Code </label> 
                        <input type="text" class="" name="SURGICAL_CODE" id="SURGICAL_CODE" value="<?= set_value('SURGICAL_CODE'); ?>"><br>
                        </div>
                        <div class="row">   
                            <label for="APPROVAL_CODE" class="super-label">Approval Code </label>
                          <input type="text" class="" name="APPROVAL_CODE" id="APPROVAL_CODE" value="<?= set_value('APPROVAL_CODE'); ?>">
                           <button class="btn btn-cal" id="Calculate" type="button">Calculate</button> 

                         </div> 
                           <label for="EXTRA_MED_REMARK" class="">Remark </label>  
                                <textarea id="EXTRA_MED_REMARK" name="EXTRA_MED_REMARK" rows="" class=""><?= set_value('EXTRA_MED_REMARK'); ?></textarea>

                           </fieldset> 
                         </fieldset>


                             <fieldset>
                                  <legend> Fee</legend>
                              <div class="row"><span class="small-label">Fee Code</span><span class="small-label">Fee</span><span class="small-label">Pay By</span></div>
                                <div class="row">
                                <input type="text" class="small-input" name="FEE_CODE_0" value="">
                                 <input type="text" class="small-input" name="FEE_0" value="">
                                 <input type="text" class="large-input" name="PAY_BY0" value="">
                               </div>
                               <div class="row">
                                <input type="text" class="small-input" name="FEE_CODE_0" value="">
                                 <input type="text" class="small-input" name="FEE_0" value="">
                                 <input type="text" class="large-input" name="PAY_BY0" value="">
                               </div>

                              <div class="row">
                                <input type="text" class="small-input" name="FEE_CODE_0" value="">
                                 <input type="text" class="small-input" name="FEE_0" value="">
                                 <input type="text" class="large-input" name="PAY_BY0" value="">
                               </div>

                              <div class="row">
                                <input type="text" class="small-input" name="FEE_CODE_0" value="">
                                 <input type="text" class="small-input" name="FEE_0" value="">
                                 <input type="text" class="large-input" name="PAY_BY0" value="">
                               </div>

                            <label for="Total" class="medium-label">Total </label>
                                <input type="text" class="small-input" name="Total" value=""> <br>
                            <label for="OS_AMT" class="medium-label">OS Amt: </label>
                                <input type="text" class="small-input" name="OS_AMT" value="">
                                 <botton class="btn btn-recal" type="button" name="recalFee" id="recalFee">Recalculate Fee</botton>
                           
                             </fieldset>


                             <fieldset>
                                    <legend> Pay</legend>
                                   <div class="row"><span class="small-label">Fee Code</span><span class="small-label">Fee</span><span class="small-label">Pay By</span></div>

                                   <div class="row">   
                                      <input type="text" class="small-input" name="PAY_CODE_0" value="">
                                      <input type="text" class="small-input" name="PAY_0" value="">
                                      <input type="text" class="large-input" name="PAY_TO_0" value="">
                                  </div>
                                   <div class="row">   
                                      <input type="text" class="small-input" name="PAY_CODE_0" value="">
                                      <input type="text" class="small-input" name="PAY_0" value="">
                                      <input type="text" class="large-input" name="PAY_TO_0" value="">
                                  </div>
                                  <div class="row">   
                                      <input type="text" class="small-input" name="PAY_CODE_0" value="">
                                      <input type="text" class="small-input" name="PAY_0" value="">
                                      <input type="text" class="large-input" name="PAY_TO_0" value="">
                                  </div>
                                  <div class="row">   
                                      <input type="text" class="small-input" name="PAY_CODE_0" value="">
                                      <input type="text" class="small-input" name="PAY_0" value="">
                                      <input type="text" class="large-input" name="PAY_TO_0" value="">
                                  </div>
                                  <div class="row">   
                                      <input type="text" class="small-input" name="PAY_CODE_0" value="">
                                      <input type="text" class="small-input" name="PAY_0" value="">
                                      <input type="text" class="large-input" name="PAY_TO_0" value="">
                                  </div>


                                <label for="PAY_AMT" class="medium-label">Pay Amt: </label>
                                <input type="text" class="" name="PAY_AMT" id="PAY_AMT" value="<?= set_value('PAY_AMT'); ?>">
                                <input  class="btn btn-recal" type="button" name="recalPay" value="Recalculate Pay" id="recalPay">

                            </fieldset>

                            <fieldset>
                                <LEGEND>Invoice</LEGEND>
                                         <label for="INVOICE_NO" class="">Invoice No.   </label>
                                        <input type="text" class="" name="INVOICE_NO" id="INVOICE_NO" value="<?= set_value('INVOICE_NO'); ?>">
                                             <label for="INVOICE_DATE" class="small-label">Date     </label>
                                             <input type="text" class="datepicker" name="INVOICE_DATE" id="INVOICE_DATE">
                                        <label for="INVOICE_AMT" class="super-label">Total Amount</label>
                            
                                <input type="text" class="" name="INVOICE_AMT" id="INVOICE_AMT" value="<?= set_value('INVOICE_AMT'); ?>">
                                <botton type="button" name="generateInvoice" id="generateInvoice" class="btn btn-cal">Generate</botton>
                            
                            </fieldset>
                            </div> <!--end of right-->
                           
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
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
	  
                   
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