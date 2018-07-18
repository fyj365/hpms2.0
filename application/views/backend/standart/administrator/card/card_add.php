
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
    #home,  #doctor,#contact,#card_class{
        min-height: 500px;
    }

  .widget-user-2 .widget-user-header {
   padding:10px;
}
.widget-user-2 .widget-user-username, 
.widget-user-2 .widget-user-desc{
  margin-left: 20px;
}

  .form-horizontal .control-label{
    text-align: right;
  }
  .form-group{
    padding-bottom: 0px;
    margin-bottom: 0px;
  }
  h3{
    background-color: #dfe6e9
  }
  table thead{
    background-color: #00cec9;
  }
  .add_btn,.rm_btn{
    width:80px;
    margin-bottom: 20px;
  }
    .validInput{
        color: #555!important;
      }
      .invalidInput{
        color: red!important;
      }

    .nav.nav-tabs{
        margin-bottom: 25px;
    }

    #doctor_tbody label{
        display: inline-block;
        margin-left: 5px;
        margin-right: 10px;
    }
    .doctor_center_select{
        width: 250px;
    }
 

   #card_class .agreed_fee_box input{
        width: 70px;
    }
    .float-right{
        float: right;
    }
 #card_class .class_box .expand_fee_box{
    display: none;
 }
   #card_class .class_box .expand_fee_box .agreed_fee_head{
       background: #f4f4f4;
    }
   #card_class .class_box .expand_fee_box .agreed_fee_body{
       background: #f4f4f4;
    }
     #card_class .class_box .expand_fee_box {
        margin-bottom: 5px;
     }
   .expand_fee_box .agreed_fee_head:nth-child(6) label{
        width: 80px;
    }
    .add-fee-btn-box {
      margin-bottom: 10px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
     CARDS  <small>New CARDS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/card'); ?>">All cards</a></li>
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
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                      <ul class="nav nav-tabs">
                        <li class="nav-item active">
                          <a class="nav-link" id="home_tab" data-toggle="tab">CARD INFOMATION</a>
                        </li>
                           <li class="nav-item">
                          <a class="nav-link" id="contact_tab" data-toggle="tab">CONTACT</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="doctor_tab" data-toggle="tab" >DOCTORS</a>
                        </li>
                       <li class="nav-item">
                        <a class="nav-link" id="class_tab" data-toggle="tab">CLASS</a>
                       </li>
                      </ul>
                <?= form_open('', [
                            'name'    => 'form_card', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_card', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         <div id="home">
                            <div class="col-md-12">
                            <div class="form-group">
                                   <label class="col-sm-2 control-label">Insurance Company </label>
                                  <div class="col-sm-10">
                                    <select class="chosen chosen-select-deselect col-sm-11" id="COM_ID"  name="COM_ID" >
                                        <option value="">SELECT A INSURANCE COMPANY</option>
                                        <?php foreach (db_get_all_data('company') as $key => $row): ?>
                                            <option value="<?= $row->COM_ID ?>" ><?= $row->E_NAME; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <small class="info help-block">
                                </small>
                            </div> 
                            </div>
                                </div>
                            
                             
                                      <div class="col-md-12">
                                <div class=" form-group col-sm-6">
                                 <label for="CARD_CODE" class="col-sm-4 control-label">Card Code <i class="required">*</i></label>
                                
                                <div class="col-sm-8">
                                    <input type="text" class="cust-required form-control" name="CARD_CODE" id="CARD_CODE" value="" maxlength='80'>   
                                    <small class="info help-block">please input:0-9/a-z/A-Z and " "only</small>
                                </div>
                                </div>

                                     <div class="form-group col-sm-6">
                            <label for="E_NAME" class="col-sm-4 control-label">English Name <i class="required">*</i>
                            </label> 
                            <div class="col-sm-8">
                                <input type="text" class="cust-required form-control" name="C_E_NAME">
                                <small class="info help-block"> *Enter 0-9 a-z A-Z  and " "only.
                                </small>
                            </div>
                        </div>
                                                                 
                        </div>
                        <div class="col-md-12">
                          <div class="form-group col-sm-6">
                            <label for="C_NAME" class="col-sm-4 control-label" >Chinese Name
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_C_NAME">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>           
                        <div class="form-group col-sm-6">
                            <label for="JOIN_DATE" class="col-sm-4 control-label">Join Date
                            </label>
                            <div class="date col-sm-8">
                              <input type="text" class="datepicker form-control" name="JOIN_DATE"   id="JOIN_DATE">
                               <small class="info help-block">Enter the business partner join date
                            </small>
                            </div>
                           
                        </div>                   
                        </div>
                        <div class="col-md-12">
                                
                                                <div class="form-group col-sm-6">
                            <label for="SURGICAL_RATING" class="col-sm-4 control-label">Surgical Rating(%)
                            </label>
                            <div class="col-sm-8">
                                <input type="numbers" class="form-control" name="SURGICAL_RATING" id="SURGICAL_RATING" maxlength='80'>
                                <small class="info help-block">
                                    *numbers only. example: 5
                                </small>
                            </div>
                        </div>
                          <div class="form-group col-sm-6">
                            <label for="DIAG_CODE_STANDARD" class="col-sm-4 control-label">Diagnosis Code Standard
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE_STANDARD" id="DIAG_CODE_STANDARD" maxlength='80' list="Diagnosis_code">
                                <datalist id="Diagnosis_code">
                                    <option>
                                        <?php if($diagnosis_codes!='')
                                           foreach ($diagnosis_codes as $diagnosis_code) {
                                             echo '<option value="'.$diagnosis_code->DIAG_CODE_STANDARD.'">'.$diagnosis_code->DIAG_CODE_STANDARD.'</option>';
                                           }
                                         ?>
                                    </option>
                                </datalist>

                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                            </div>

                        <div class="col-sm-12">
                             <div class="form-group col-sm-6 ">
                            <label for="BILLING_DEPT_NAME" class="col-sm-4 control-label">BILLING DEPT NAME
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BILLING_DEPT_NAME" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                           
                        </div>
                                                                  
                            <div id="Address" class="col-md-12">
                                <div class="col-sm-6">

                                                <div class="form-group ">
                            <label for="E_ADDR1" class="col-sm-4 control-label">English Address
                            </label>
                            <div class="col-sm-5">
                                <input  type="text" class="form-control" name="E_ADDR1" id="E_ADDR1"  value="<?= set_value('E_ADDR1'); ?>">
                                <small class="info help-block" maxlength='80'>
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR2" class="col-sm-4 control-label">English Address
                            </label>
                            <div class="col-sm-5">
                                <input  type="text" class="form-control" name="E_ADDR2" id="E_ADDR2"  value="<?= set_value('E_ADDR2'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR3" class="col-sm-4 control-label">English Address
                            </label>
                            <div class="col-sm-5">
                                <input  type="text" class="form-control" name="E_ADDR3" id="E_ADDR3"  value="<?= set_value('E_ADDR3'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR4" class="col-sm-4 control-label">English Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="E_ADDR4" id="E_ADDR4"  value="<?= set_value('E_ADDR4'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR5" class="col-sm-4 control-label">English Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="E_ADDR5" id="E_ADDR5" value="<?= set_value('E_ADDR5'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_DISTRICT" class="col-sm-4 control-label">English District
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="E_DISTRICT" id="E_DISTRICT" value="<?= set_value('E_DISTRICT'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                    </div>
                                  <div class="col-sm-6">
                                    <div class="form-group ">
                            <label for="C_ADDR1" class="col-sm-4 control-label">Chinese Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR1" id="C_ADDR1"  value="<?= set_value('C_ADDR1'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR2" class="col-sm-4 control-label">Chinese Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR2" id="C_ADDR2"  value="<?= set_value('C_ADDR2'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR3" class="col-sm-4 control-label">Chinese Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR3" id="C_ADDR3"  value="<?= set_value('C_ADDR3'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR4" class="col-sm-4 control-label">Chinese Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR4" id="C_ADDR4"  value="<?= set_value('C_ADDR4'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR5" class="col-sm-4 control-label">Chinese Address
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR5" id="C_ADDR5"  value="<?= set_value('C_ADDR5'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_DISTRICT" class="col-sm-4 control-label">Chinese District
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_DISTRICT" id="C_DISTRICT"  value="<?= set_value('C_DISTRICT'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                    </div>
                </div>              
                                            
                    </div>
            <div id="doctor">
                 <div class="table-responsive col-md-12">  
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <td></td> 
                            <td colspan="1" >Doctor Code / Type</td>
                            <td colspan="1">Center</td>
                            <td colspan="1">Partner Doctor CODE </td>
                            <td>Location Code</td>
                            <td>Term Date</td>
                        </thead>
                        <tbody id="doctor_tbody">
                            <?php for ($i=0; $i <8; $i++) { ?>
                            <tr>
                            <td class="doctor_check"><input type="checkbox" class="flat-red" name="checkbox"></td>
                            <td style="width: 340px;"> 
                                <?php if ( count($doctor_codes)>0 ){ ?>
                                <select type="text" name="DR_CODE[]" class="Doctor_select chosen chosen-select-deselect">
                                    <option value="">Select Doctor Code</option>
                                    <?php foreach ($doctor_codes as $doctor_code) {?>
                                    <option value="<?php echo $doctor_code->DR_CODE;?>"><?php echo $doctor_code->DR_CODE; ?></option>
                                        <?php }?>
                               </select>
                                <?php } else{ echo 'no doctor code available';}?>

                               <div class="type_box" style="display: inline-block;">
                               </div>
                            </td>
                            <td><select class="doctor_center_select" name="CENTER_CODE[]">
                            </select></td>
                            <td><input type="text"  name="PARTNER_DR_CODE[]"></td>
                            <td><input type="text"  name="LOC_CODE[]"></td>
                            <td><input type="text" name="D_TERM_DATE[]" class="datetimepicker" id="D_TERM_DATE-<?= $i;?>"></td>
                            </tr> 
                           <?php } ?>
                       </tbody>
                    </table>
                    <button type="button" class="btn btn-danger rm_btn" id="rm__doctor_btn">Remove</button>
                    <button type="button" class="btn btn-primary add_btn" id="add_doctor_btn">Add</button>
                  </div>
               </div>
               
                <div id="contact">
                    <?php  for ($i=0; $i <3 ; $i++) {  ?>
                               <div class="col-sm-4">
                                 
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-4 control-label">English Name 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="Contact_E_NAME[]"   value="<?= set_value('Contact_E_NAME'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-4 control-label">Chinese Name
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="Contact_C_NAME[]" value="<?= set_value('Contact_E_NAME'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TITLE" class="col-sm-4 control-label">Title
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="TITLE[]" value="<?= set_value('TITLE'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPARTMENT" class="col-sm-4 control-label">Department
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="DEPARTMENT[]"  value="<?= set_value('DEPARTMENT'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TEL" class="col-sm-4 control-label">TEL 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="TEL[]" value="<?= set_value('TEL'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FAX" class="col-sm-4 control-label">FAX 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="FAX[]"  value="<?= set_value('FAX'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-4 control-label">EMAIL 
                            </label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="EMAIL[]"  value="<?= set_value('EMAIL'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                         </div>
                   <?php } ?>
                    </div>
                 <div id="card_class">            
                          <legend>NEW CLASS</legend>
                          <div class="form-group class_header">
                            <div class="col-sm-2"><label>Class</label></div>
                            <div class="col-sm-3"><label>Class Description</label></div>
                            <div  class="col-sm-1"><label>Start Date</label></div>
                            <div class="col-sm-1"><label>Term Date</label></div>
                            <div class="col-sm-3"><label>Remark</label></div>
                          </div>
                        <?php for($i = 0; $i < 3 ; $i++) {; ?>
                          <div class="class_box" id="<?= $i; ?>">
                            <div class="class_container form-group">
                                 <div class="col-sm-2">
                                    <input type="text" size="20" name="CLASS_CODE[]" value="">
                                 </div>  
                                  <div class="col-sm-3">
                                     <input type="text" size="40" name="CLASS_DESC[]" value="">
                                 </div>

                                <div class="date col-sm-1">
                                  <input type="text" class="datetimepicker" name="START_DATE[]"  size="10"  value="" id="START_DATE-<?= $i; ?>">
                                </div>

                                  <div class="date col-sm-1">
                                    <input type="text" class= "datetimepicker" name="TERM_DATE[]"  size="10" value="" id="TERM_DATE-<?= $i; ?>">
                                  </div>
                                 <div class="col-sm-3 Remark">
                                 <input type="text" size="40" name="REMARK[]">
                                </div>
                                <div class="col-sm-2">
                                 <button type="button" class="btn-info add_fee_btn">add Fee</button>
                                  <button type="button" class="btn-danger remove_class_btn"><i  class="fa fa-times" aria-hidden="true"></i></button>
                              </div>
                            </div>
                                
                               <div class="expand_fee_box">
                                         <div class="col-sm-10 agreed_fee_head">
                                                   <div class="col-sm-2"><label>TYPE</label></div>
                                                   <div class="col-sm-1"><label>FEE</label></div>
                                                   <div class="col-sm-1"><label>PAY</label></div>
                                                   <div class="col-sm-1"><label>CO-PAY</label></div>
                                                   <div class="col-sm-1"><label>MED DAY</label></div>
                                                   <div class="col-sm-1"><label style="width: 80px; max-width: 100px;">EXTRA MED</label></div>
                                                   <div class="col-sm-1"><label>LAB XRAY</label></div>
                                                   <div class="col-sm-1"><label>SURGICAL</label></div>
                                               </div>  
                                       <?php for($j = 0; $j < 3; $j++){; ?>       
                                           <div class="agreed_fee_box">
                    
                                              <div class="col-sm-10 agreed_fee_body">
                                              <div class="col-sm-2">
                                                <select  class="fee_type_select" name="<?=$i;?>TYPE[]">
                                                    <option value="">select</option>
                                                </select>
                                              </div>
                                              <div class="col-sm-1">
                                                    <input type="number"  class="" name="<?=$i;?>FEE[]"  min="0" value="<?= $i; ?>">
                                                </div>
                                                <div class="col-sm-1">
                                                    <input type="number"   class="" name="<?=$i;?>PAY[]"  min="0">
                                                </div>
                                               <div class="col-sm-1">
                                                    <input type="number" name="<?=$i;?>CO_PAY[]"  min="0">
                                               </div>
                                                 <div class="col-sm-1">
                                                    <input type="text" class="" name="<?=$i;?>MED_DAYS[]" >
                                                </div>

                                                <div class="col-sm-1 checkbox">
                                                        <input type="checkbox" class="flat-red" name="<?=$i;?>EXTRA_MED_BOL[]"  value="1">
                                                </div>
                                                     <div class="col-sm-1 checkbox">
                                                         <input type="checkbox" class="flat-red" name="<?=$i;?>LAB_XRAY_BOL[]"  value="1">                    
                                                </div>
                                                  <div class="col-sm-1 checkbox">
                                                     <input type="checkbox"class="flat-red" name="<?=$i;?>SURGICAL_BOL[]" value="1">
                                                  </div>
                                                  <div class="col-sm-1">
                                                      <button type="button" class="btn-danger remove_fee_btn"><i  class="fa fa-times" aria-hidden="true"></i></button>
                                                  </div>
                                                 </div>     
                                                </div>
                                              <?php } ?>
                                              <div class="col-sm-12 add-fee-btn-box">
                                                <div class="col-sm-8">
                                             <button type="button" class="btn-info add_more_fee_btn float-right"><i class="fa fa-plus" aria-hidden="true"></i></button>  
                                                </div>
                                              </div>
                                           
                                     </div> <!--end of expand fee-box-->
                          </div> <!--end of expand fee-box-->                 
                     <?php } ?>
                            <button type="button" class="btn-info btn  pull-right" id="add_more_class_btn" style="">More Class</button>
                    </div> <!--end of card class DIV-->     


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
          jQuery(window).on("load", function(){
                $('#doctor').hide();

            });

        // ADD CLASS && FEE IN FOR CARD
        $('#card_class').on('click','.add_fee_btn', function(){
                 $(this).closest('.class_box').find('.expand_fee_box').slideToggle();
                 if($(this).closest('.class_box').find('.expand_fee_box').hasClass('expanded')){

                     $(this).closest('.class_box').find('.expand_fee_box').removeClass('expanded');
                 }else{
                    $(this).closest('.class_box').find('.expand_fee_box').addClass('expanded');
                 }
        });

        // PREPARE COMPANY INFO ON CARD
         $('#COM_ID').on('change',function(){
              $('input').each(function(){
                    $(this).val("");
                })
            var com_id = $(this).val();

            if (com_id!='') {
                $.ajax({
                url: BASE_URL +  'administrator/card/find_COMPANY/',
                method: 'get',
                dataType: 'JSON',
                data:{'com_id': com_id},
                success: function(res){
                  var company = res.company;

                  $('input[name="C_E_NAME"]').val(company.E_NAME);
                  $('input[name="C_C_NAME"]').val(company.C_NAME);
                  $('input[name="SURGICAL_RATING"]').val(company.SURGICAL_RATING);
                  $('input[name="DIAG_CODE_STANDARD"]').val(company.DIAG_CODE_STANDARD);
                  $('input[name="BILLING_DEPT_NAME"]').val(company.BILLING_DEPT_NAME);
                  $('input[name="E_ADDR1"]').val(company.E_ADDR1);
                  $('input[name="E_ADDR2"]').val(company.E_ADDR2);
                  $('input[name="E_ADDR3"]').val(company.E_ADDR3);
                  $('input[name="E_ADDR4"]').val(company.E_ADDR4);
                  $('input[name="E_ADDR5"]').val(company.E_ADDR5);
                  $('input[name="E_DISTRICT"]').val(company.E_DISTRICT);
                  $('input[name="C_ADDR1"]').val(company.C_ADDR1);
                  $('input[name="C_ADDR2"]').val(company.C_ADDR2);
                  $('input[name="C_ADDR3"]').val(company.C_ADDR3);
                  $('input[name="C_ADDR4"]').val(company.C_ADDR4);
                  $('input[name="C_ADDR5"]').val(company.C_ADDR5);
                  $('input[name="C_DISTRICT"]').val(company.C_DISTRICT);

             var company_contacts = res.company_contacts;
             var j = company_contacts.length;
                  if (company_contacts!='') {
                        $('input[name = "Contact_E_NAME[]"]').map(function(index){
                                 if (index<j) {
                                     $(this).val(company_contacts[index].E_NAME);
                                 }
                        });
                         $('input[name = "Contact_C_NAME[]"]').map(function(index){
                            if (index<j) {
                                    $(this).val(company_contacts[index].C_NAME);
                            }

                        });
                         $('input[name = "TITLE[]"]').map(function(index){
                            if (index<j) {
                                 $(this).val(company_contacts[index].TITLE);
                            }
                        });
                          $('input[name = "DEPARTMENT[]"]').map(function(index){
                            if (index<j) {
                                  $(this).val(company_contacts[index].DEPARTMENT);
                            }
                        });
                      $('input[name = "TEL[]"]').map(function(index){
                               if (index<j) {
                           $(this).val(company_contacts[index].TEL); 
                               }
                        });
                           $('input[name = "FAX[]"]').map(function(index){
                              if (index<j) {
                                 $(this).val(company_contacts[index].FAX);
                             }
                        });
                           $('input[name = "EMAIL[]"]').map(function(index){
                              if (index<j) {
                                 $(this).val(company_contacts[index].EMAIL);
                             }
                        });
                  }else{
                           $('#contact input[type="text"]').each(function(){
                               $(this).val("");
                           });

                       }
                 }

               }); 
            }else{
              // CLEAR ALL FIELD WHEN DONT SELECT COMPANY
                $('input').each(function(){
                    $(this).val("");
                });
            }

    });
     
     // ADD DOCTOR TYPE AND CENTER
     $('#doctor_tbody').on('change','.Doctor_select', function(){
                var this_term_date = $(this).closest('tr').find('.datetimepicker');

                var doctor_code = $(this).val();

                var type_box = $(this).siblings('.type_box');
                $(type_box).empty();

                var this_doctor_center = $(this).parent().parent().find('.doctor_center_select');
                $(this_doctor_center).empty();

               $.ajax({
                  url:BASE_URL + 'administrator/card/findDoctorType_Center/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'doctor_code': doctor_code},
                  success: function(res){

                        var doctor = res.doctor_types;
                        var doctor_types = Object.values(doctor);
                        var type = []; //contain all doctor types
                        var centers = res.doctor_centers;

                        var doctor_term = res.doctor_term_date;
                        var max_Term_date = doctor_term.TERM_DATE;
                     
                       // ADD DOCTOR CARD TERM DATE UP LIMIT
                       $(this_term_date).datetimepicker({
                                onShow: function(ct){
                                this.setOptions({
                                  maxDate: (max_Term_date == '0000-00-00') ? false : new Date(max_Term_date)
                                });
                              },
                            
                          }); 
                   // ADD DOCTOR TYPE LIMIT
                        var content = '';
                        for(var i=0; i< doctor_types.length;i++){
                            if (doctor_types[i]!='') {
                            content += 
                            '<label>'+doctor_types[i]+'<input type="checkbox" name="'+doctor_code+'_doctor_type[]" value="'+ doctor_types[i]+'" class="doctor-type"></label>'
                              type.push(doctor_types[i]);
                            }

                        }

                       $(type_box).append(content);

                  //ADD DOCTOR CENTER LIMIT
                        var center_option ='';
                        if (centers.length>0) {
                              for(var i=0; i<centers.length; i++){
                               center_option += '<option value="'+ centers[i]['CENTER_CODE']+'">' +centers[i]["E_DISTRICT"] +','+ centers[i]["E_NAME"]+'</option>';
                            }

                        }else{
                            center_option = '<option value="">No center available</option>';
                        }

                        $(this_doctor_center).append(center_option);


                  }
               });

          });
         
      // ADD DOCTOR CARD TERM DATE LIMIT

       // $('#doctor_tbody').on('click','.datetimepicker',function(){
       //          var this_row = $(this).closest('tr');
       //          var this_doctor_code = $(this).closest('tr').find('.Doctor_select').val();
       //          if (doctor_code='') {

       //           $.ajax({
       //            url:BASE_URL + 'administrator/card/find_doctor_termDate/',
       //            method:'GET',
       //            dataType:'JSON',
       //            data:{'doctor_code': this_doctor_code},
       //            success: function(res){
       //                  var doctor_term = res.doctor_term_date;
       //                  var max_Term_date = doctor_term.TERM_DATE;

       //                 $(this_row).find('.datetimepicker').datetimepicker({
       //                          timepicker: true,
       //                          onShow: function(ct){
       //                          this.setOptions({
       //                            maxDate: (max_Term_date == '0000-00-00') ? false : new Date(max_Term_date)
       //                          });
       //                        },
                            
       //                    }); 

       //            }

       //          });
       //          }


       // });

         // ADD FEE TYPE   ACCORDING TO  ALL SELECTED TTYPE , REMOVE TYPE WHEN UNCHECK
           // GET ALL SELECTED TYPE AND TOTAL NUMBER OF EACH TYPE
         var selected_doctor_type =[]; 
         var type_count = [];
         $('#doctor_tbody').on('change','input[class="doctor-type"]',function(){
            var index = selected_doctor_type.indexOf(this.value);

            if ($(this).is(':checked')&& index == -1) {

               selected_doctor_type.push(this.value);

               type_count.push(1);

            }else if ($(this).prop('checked') == true && index > -1){

              type_count[index]++;

            }else  if($(this).prop('checked') == false && index > -1){

              type_count[index] --;

              if (type_count[index]==0) {

                type_count.splice(index,1);

                selected_doctor_type.splice(index, 1);

              }
            }

         });

         // APPEND HTML TEXT IN EACH FEE BOX WHEN GETTING FOCUS
         $('#card_class').on('focus','.fee_type_select',function(){
                var fee_type_option = '';

                for(var i=0; i < selected_doctor_type.length; i++){
                  fee_type_option +='<option value="'+ selected_doctor_type[i]+ '">' +selected_doctor_type[i] +'</option>';
                }

               $(this).children().remove();
               $(this).append(fee_type_option);  
         
         });
          
         $('#card_class').on('click','.add_more_fee_btn',function(){
                var fee_type_option = '';

                for(var i=0; i < selected_doctor_type.length; i++){
                  fee_type_option +='<option value="'+ selected_doctor_type[i]+ '">' +selected_doctor_type[i] +'</option>';
                 }
                $(this).closest('.add-fee-btn-box').prev().find('.fee_type_select').append(selected_doctor_type);
                         
         });
         // END FEE TYPE --ERROR 2018 JUNE 19


         // REMOVE CLASS BOX OR FEE BOX WHEN CLIECK REMOVE BUTTON
         $('#card_class').on('click','.remove_class_btn',function(){
            $(this).closest('.class_box').remove();
         });
         
         $('#card_class').on('click','.remove_fee_btn',function(){
            $(this).closest('.agreed_fee_box').remove();
         });

         // ADD MORE DOCTOR
         $('#add_doctor_btn').on('click',function(){
                 var max = 0;
                 var i;
                $('#doctor_tbody tr').each(function(){
                  var this_id = $(this).find('.datetimepicker').prop('id');
                  var idx = this_id.match(/[\d]+$/);
                  console.log(idx);
                  max = Math.max(idx, max);
                });

                i = max +1;

                htmlText_Doctor ='<tr> <td class="doctor_check"><input type="checkbox" class="flat-red" name="checkbox"></td> <td> <?php if (count($doctor_codes) > 0){ ?> <select type="text" name="DR_CODE[]" class="Doctor_select chosen chosen-select-deselect" style="width: 150px;"> <option value="">Select Doctor Code</option> <?php foreach ($doctor_codes as $doctor_code) {?> <option value="<?php echo $doctor_code->DR_CODE;?>"><?php echo $doctor_code->DR_CODE; ?></option> <?php }?> </select> <?php } else{ echo 'no doctor code available';}?> <div class="type_box" style="display: inline-block;"></div></td> <td><select class="doctor_center_select" name="CENTER_CODE[]"></select></td> <td><input type="text"  name="PARTNER_DR_CODE[]"></td> <td><input type="text"  name="LOC_CODE[]"></td> <td><input type="text" name="D_TERM_DATE[]" class="datetimepicker" id="D_TERM_DATE-'+i+'"></td> </tr> ';
                
                $('#doctor_tbody').append(htmlText_Doctor);

                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                  });

                $('.datetimepicker').datetimepicker({
                    timepicker:false
                })
                $('.datetimepicker').inputmask({
                        mask: "y-1-2",
                        placeholder: "yyyy-mm-dd",
                        leapday: "-02-29",
                        separator: "-",
                        alias: "yyyy/mm/dd"
                     })
         });

        // REMOVE DOCTOR
         $('#rm__doctor_btn').on('click',function(){
                $('.doctor_check input:checked').closest('tr').remove();
         });

        // ADD MORE CLASS
        $('#add_more_class_btn').on('click',function(){
            var max = 0;
            $('.class_box').each(function(){
              max = Math.max(this.id, max);
            });
            var i = max+1;

            var class_html = ' <div class="class_box" id="'+i+'"> <div class="class_container form-group"> <div class="col-sm-2"> <input type="text" size="20" name="CLASS_CODE[]" value=""> </div> <div class="col-sm-3"> <input type="text" size="40" name="CLASS_DESC[]" value=""> </div> <div class="date col-sm-1"> <input type="text" class="datetimepicker" name="START_DATE[]"  size="10"   id="START_DATE-'+i+'"  value=""> </div> <div class="date col-sm-1"> <input type="text" class= "datetimepicker" name="TERM_DATE[]"  size="10"  id="TERM_DATE-'+i+'" value=""> </div> <div class="col-sm-3 Remark"> <input type="text" size="40" name="REMARK[]"> </div> <div class="col-sm-2"> <button type="button" class="btn-info add_fee_btn">add Fee</button> <button type="button" class="btn-danger remove_class_btn"><i  class="fa fa-times" aria-hidden="true"></i></button> </div> </div> <div class="expand_fee_box"> <div class="col-sm-10 agreed_fee_head"> <div class="col-sm-2"><label>TYPE</label></div> <div class="col-sm-1"><label>FEE</label></div> <div class="col-sm-1"><label>PAY</label></div> <div class="col-sm-1"><label>CO-PAY</label></div> <div class="col-sm-1"><label>MED DAY</label></div> <div class="col-sm-1"><label style="width: 80px; max-width: 100px;">EXTRA MED</label></div> <div class="col-sm-1"><label>LAB XRAY</label></div> <div class="col-sm-1"><label>SURGICAL</label></div> </div> <?php for($j = 0; $j < 3; $j++){; ?> <div class="agreed_fee_box"> <div class="col-sm-10 agreed_fee_body"> <div class="col-sm-2"> <select  class="fee_type_select" name="'+i+'TYPE[]">  <option value="">select</option></select> </div> <div class="col-sm-1"> <input type="number"  class="" name="'+i+'FEE[]"  min="0"> </div> <div class="col-sm-1"> <input type="number"   class="" name="'+i+'PAY[]"  min="0"> </div> <div class="col-sm-1"> <input type="number" name="'+i+'CO_PAY[]"  min="0"> </div> <div class="col-sm-1"> <input type="text" class="" name="'+i+'MED_DAYS[]" > </div> <div class="col-sm-1 checkbox"> <input type="checkbox" class="flat-red" name="'+i+'EXTRA_MED_BOL[]"  value="1"> </div> <div class="col-sm-1 checkbox"> <input type="checkbox" class="flat-red" name="'+i+'LAB_XRAY_BOL[]"  value="1"> </div> <div class="col-sm-1 checkbox"> <input type="checkbox"class="flat-red" name="'+i+'SURGICAL_BOL[]" value="1"> </div> <div class="col-sm-1"> <button type="button" class="btn-danger remove_fee_btn"><i  class="fa fa-times" aria-hidden="true"></i></button> </div> </div> </div> <?php } ?> <div class="col-sm-12 add-fee-btn-box"> <div class="col-sm-8"> <button type="button" class="btn-info add_more_fee_btn float-right"><i class="fa fa-plus" aria-hidden="true"></i></button> </div> </div> </div> <!--end of expand fee-box--> </div> <!--end of expand fee-box--> ';
              $(class_html).insertBefore('#add_more_class_btn');

              $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                  });
              $('.datetimepicker').datetimepicker({
                      format:'Y-m-d'
              });

        });
        
        //  ADDD LIMIT TO CLASS START DATE AND TERMDATE  TERMDATE MUST GREAT THANT START DATE  june 22 2018 error 
        // $('body').on('trigger','input[name="START_DATE[]"]',function(){

        //     var this_term_date = $(this).closest('.class_box').find('input[name="TERM_DATE[]"]');
        //     var term_date = $(this_term_date).val();
        //     alert(term_date);
        //     $(this).datetimepicker({

        //       format:'Y-m-d',

        //       onShow: function(ct){
        //         $(this).setOptions({ 
        //           maxDate:(term_date !='')?term_date:false
        //         });

        //       },
        //     });
        // });



        // ADD MORE TYPE FEE
        $('#card_class').on('click','.add_more_fee_btn', function(){
              var class_id = $(this).closest('.class_box').prop('id');

              var fee_html = '<div class="agreed_fee_box"> <div class="col-sm-10 agreed_fee_body"> <div class="col-sm-2"> <select  class="fee_type_select" name="'+class_id+'TYPE[]"><option value="">select</option></select> </div> <div class="col-sm-1"> <input type="number"  class="" name="'+class_id+'FEE[]"  min="0"> </div> <div class="col-sm-1"> <input type="number"   class="" name="'+class_id+'PAY[]"  min="0"> </div> <div class="col-sm-1"> <input type="number" name="'+class_id+'CO_PAY[]"  min="0"> </div> <div class="col-sm-1"> <input type="text" class="" name="'+class_id+'MED_DAYS[]" > </div> <div class="col-sm-1 checkbox"> <input type="checkbox" class="flat-red" name="'+class_id+'EXTRA_MED_BOL[]"  value="1"> </div> <div class="col-sm-1 checkbox"> <input type="checkbox" class="flat-red" name="'+class_id+'LAB_XRAY_BOL[]"  value="1"> </div> <div class="col-sm-1 checkbox"> <input type="checkbox"class="flat-red" name="'+class_id+'SURGICAL_BOL[]" value="1"> </div> <div class="col-sm-1"> <button type="button" class="btn-danger remove_fee_btn"><i  class="fa fa-times" aria-hidden="true"></i></button> </div> </div> </div>';

                  var flag = $(this).closest('.add-fee-btn-box');
                  $(fee_html).insertBefore(flag);
                 
                  $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                  });
             });

         // TAB SWICH
            $('#contact').hide();
            $('#card_class').hide();
                
            $('#home_tab').on('click',function(){
                  $('#home').show();
                  $('#fee').hide();
                  $('#doctor').hide();
                  $('#contact').hide();
                  $('#card_class').hide();
            });
            $('#doctor_tab').on('click',function(){
                 $('#doctor').show();
                 $('#home').hide();
                  $('#fee').hide();
                  $('#contact').hide();
                  $('#card_class').hide();
            });
           $('#contact_tab').on('click',function(){
                  $('#contact').show();
                  $('#home').hide();
                  $('#fee').hide();
                  $('#doctor').hide();
                  $('#card_class').hide();
            });
           $('#class_tab').on('click',function(){
                  $('#contact').hide();
                  $('#home').hide();
                  $('#fee').hide();
                  $('#doctor').hide();
                  $('#card_class').show();
           });
     
        // $('#CARD_CODE').on('keyup',function(){
        //       var letters = /^[0-9a-zA-Z\-\s]+$/;
        //      if(this.value!=""){
        //       if(this.value.match(letters)){

        //      $('#CARD_CODE').removeClass('invalidInput')

        //      $('#CARD_CODE').addClass('validInput');
        //       valid_code = true;
        //      } else{
        //        valid_code = false;

        //      }

        //   }else{
        //       $('#CARD_CODE').removeClass('validInput');

        //        $('#CARD_CODE').addClass('invalidInput');
        //       // $('#CARD_CODE').addClass("InvalidInput");
        //        valid_code = false;
        //       }
        //  });

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
              window.location.href = BASE_URL + 'administrator/card';
            }
          });
        return false;
      }); /*end btn cancel*/
     
      // SAVE ALL INPUT AJAX CALL
      $('.btn_save').on('click', function(){

        // if(valid_code&&valid_letters&&valid_chars&&valid_floatNum){

        $('.message').fadeOut();

        var form_card = $('#form_card');

        var data_post = form_card.serializeArray();
      
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});

        $('.loading').show();

          $.ajax({
          url: BASE_URL + '/administrator/card/add_save',
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

    });/*end btn save*/


      // $("#BP_START_DATE").datetimepicker({
      //                format:'Y-m-d',
      //                 onShow:function( ct ){
      //                  this.setOptions({
      //                   maxDate:jQuery('#BP_TERM_DATE').val()?jQuery('#BP_TERM_DATE').val():false
      //                  })
      //                 }
      //    });
      //   $("#BP_TERM_DATE").datetimepicker({
      //               format:'Y-m-d',
      //                onShow:function( ct ){
      //               this.setOptions({
      //               minDate:jQuery('#BP_START_DATE').val()?jQuery('#BP_START_DATE').val():false
      //               })
      //              }
      //           });

    //  var valid_code = false;
    //  var valid_letters =false;
    //  var valid_chars = false;
    //  var valid_floatNum =true;

    //  function checkLetters(e){  
    //       var inputText = e.value;
    //       var letter =  /^[0-9a-zA-Z\s]+$/;
    //       if(inputText!=""){
    //         if(inputText.match(letter)){
    //          $(e).removeClass('invalidInput')
    //          $(e).addClass('validInput');
    //          valid_letters = true;
    //         }
    //         else{
    //            valid_letters = false;
    //         $(e).addClass('invalidInput');
    //         $(e).removeClass('validInput');
    //         }
    //       }
    //       else{
    //         console.log(inputText);
    //         valid_letters = false;
    //      }  

    // }
    // function checkChars(e){
    //          //只能匹配数字,字母或汉字  
    //  var inputText = e.value;
    //  var letter1 = inputText.match(/^[a-zA-Z0-9\u4e00-\u9fa5\s]+$/g);
    //     if(inputText!=""){
    //         if(inputText.match(letter1)){
    //          $(e).removeClass('invalidInput')
    //          $(e).addClass('validInput');
    //          valid_chars =  true;

    //           }
    //           else{
    //           valid_chars = false;
    //          $(e).addClass('invalidInput');
    //           $(e).removeClass('validInput');

    //           }
    //     }
    //         else{
    
    //           valid_chars = false;

    //         }
    //     }
        
    //  function ValidateFloat(e){
    //     var  InputNum = e.value;
    //     var decimal=  /^[+-]?\d+(\.\d+)?$/; 
    //     if(InputNum.match(decimal)) 
    //     { 
    //          $(e).removeClass('invalidInput')
    //          $(e).addClass('validInput');

    //         valid_floatNum =  true;
    //     }
    //     else { 
    //         $(e).addClass('invalidInput');
    //         $(e).removeClass('validInput');
    //          valid_floatNum = false;
    //         }
    // }
     
      

});/*end doc ready*/


</script>