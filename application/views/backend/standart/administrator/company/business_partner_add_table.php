
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
  .add_btn{
    margin-bottom: 20px;
  }
  #Agreed_fee td{
    padding: 3px;
  }
  #Agreed_fee input{
    width: 90px;
  }
</style>
<style type="text/css">
      .validInput{
        color: #555!important;
      }
      .invalidInput{
        color: red!important;
      }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Business Partner        <small>New Business Partner</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/card'); ?>">Business Partner</a></li>
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
                      <ul class="nav nav-tabs">
                        <li class="nav-item active">
                          <a class="nav-link" id="home_tab" data-toggle="tab">Partner Information</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="fee_tab" data-toggle="tab" >Agreed Fee</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="doctor_tab" data-toggle="tab" >Partner Doctors</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact_tab" data-toggle="tab">Contact Information</a>
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
                              <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code *
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= set_value('CARD_CODE'); ?>" required maxlength='80'>
                                <small class="info help-block">
                                *Enter 0-9 a-z A-Z  and " "only.
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-2 control-label">English Name *
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME'); ?>" >
                                <small class="info help-block"> *Enter 0-9 a-z A-Z  and " "only.

                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-2 control-label" >Chinese Name *
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME'); ?>" >
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                <div class="form-group ">
                            <label for="BILLING_DEPT_NAME" class="col-sm-2 control-label">Billing Depart Name
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BILLING_DEPT_NAME" id="BILLING_DEPT_NAME"  value="<?= set_value('BILLING_DEPT_NAME'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL_RATING" class="col-sm-2 control-label">Surgical Rating
                            </label>
                            <div class="col-sm-8">
                                <input type="numbers" class="form-control" name="SURGICAL_RATING" id="SURGICAL_RATING" value="<?= set_value('SURGICAL_RATING'); ?>" maxlength='80'>
                                <small class="info help-block">
                                    *numbers only. example: 0.8
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE_STANDARD" class="col-sm-2 control-label">Diagnosis Code Standard
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE_STANDARD" id="DIAG_CODE_STANDARD" value="<?= set_value('DIAG_CODE_STANDARD'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                            <div id="Address" class="col-md-12">
                                <div class="col-sm-6">

                                                <div class="form-group ">
                            <label for="E_ADDR1" class="col-sm-4 control-label">English Address 1
                            </label>
                            <div class="col-sm-5">
                                <input  type="text" class="form-control" name="E_ADDR1" id="E_ADDR1"  value="<?= set_value('E_ADDR1'); ?>">
                                <small class="info help-block" maxlength='80'>
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR2" class="col-sm-4 control-label">English Address 2
                            </label>
                            <div class="col-sm-5">
                                <input  type="text" class="form-control" name="E_ADDR2" id="E_ADDR2"  value="<?= set_value('E_ADDR2'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR3" class="col-sm-4 control-label">English Address 3
                            </label>
                            <div class="col-sm-5">
                                <input  type="text" class="form-control" name="E_ADDR3" id="E_ADDR3"  value="<?= set_value('E_ADDR3'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR4" class="col-sm-4 control-label">English Address 4
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="E_ADDR4" id="E_ADDR4"  value="<?= set_value('E_ADDR4'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR5" class="col-sm-4 control-label">English Address 5
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
                            <label for="C_ADDR1" class="col-sm-4 control-label">Chinese Address1
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR1" id="C_ADDR1"  value="<?= set_value('C_ADDR1'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR2" class="col-sm-4 control-label">Chinese Address 2
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR2" id="C_ADDR2"  value="<?= set_value('C_ADDR2'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR3" class="col-sm-4 control-label">Chinese Address 3
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR3" id="C_ADDR3"  value="<?= set_value('C_ADDR3'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR4" class="col-sm-4 control-label">Chinese Address 4
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="C_ADDR4" id="C_ADDR4"  value="<?= set_value('C_ADDR4'); ?>" maxlength='80'>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR5" class="col-sm-4 control-label">Chinese Address 5
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
                                                 
                                                <div class="form-group" style="">
                            <label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
                            </label>
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE"   id="JOIN_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                        </div>
                    </div>
                                      
                    <div id="fee">
                         <div id="PARTNER_CONTRACT" class="col-md-12">
                                <div class="form-group col-sm-5">
                            <label for="PARTNER_CONTRACT_NO" class="control-label col-sm-5">Partner Contract No
                            </label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="PARTNER_CONTRACT_NO" id="PARTNER_CONTRACT_NO" value="<?= set_value('PARTNER_CONTRACT_NO'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                                                <div class="col-sm-3 form-group">
                            <label for="START_DATE" class="control-label" style="width: 65px;float: left;">Start Date
                            </label>
                            <div class="col-sm-7">
                            <div class="input-group date" style="width: 110px;">
                              <input type="text" class="form-control pull-right datepicker" name="START_DATE" id="START_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                                                <div class="col-sm-3 form-group">
                            <label for="TERM_DATE" class="control-label" style="width: 65px;float: left;">Term Date
                            </label>
                            <div class="col-sm-7">
                            <div class="input-group date" style="width: 110px;">
                              <input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12" id="Agreed_fee">
                  
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <td>TYPE </td>
                            <td>MED DAYS </td>
                            <td>CO PAY </td>
                            <td>FEE</td>
                            <td>PAY</td>
                            <td>EXTRA MED BOL</td>
                            <td>EXTRA MED REF</td>
                            <td>LAB XRAY BOL</td>
                            <td>LAB XRAY REF </td>
                            <td>SURGICAL BOL</td>
                        </thead>
                        <tbody>
                            <tr>
                            <td><input type="text" name="TYPE" id="TYPE" value="<?= set_value('TYPE'); ?>"></td>
                            <td><input type="text"  name="MED_DAYS" id="MED_DAYS"  value="<?= set_value('MED_DAYS'); ?>"></td>
                            <td><input type="number"  name="CO_PAY" id="CO_PAY" value="<?= set_value('CO_PAY'); ?>"></td>
                            <td><input type="number"  name="FEE" id="FEE" value="<?= set_value('FEE'); ?>"></td>
                            <td><input type="number"  name="PAY" id="PAY"  value="<?= set_value('PAY'); ?>"></td>
                            <td><input type="text"  name="EXTRA_MED_BOL" id="EXTRA_MED_BOL" value="<?= set_value('EXTRA_MED_BOL'); ?>"></td>
                            <td><input type="text"  name="EXTRA_MED_REF" id="EXTRA_MED_REF" value="<?= set_value('EXTRA_MED_REF'); ?>"></td>
                            <td><input type="text"  name="LAB_XRAY_BOL" id="LAB_XRAY_BOL" value="<?= set_value('LAB_XRAY_BOL'); ?>"></td>
                            <td><input type="text" name="EXTRA_MED_REF" id="EXTRA_MED_REF" value="<?= set_value('EXTRA_MED_REF'); ?>"></td>
                            <td><input type="text"  name="SURGICAL_REF" id="SURGICAL_REF" value="<?= set_value('SURGICAL_REF'); ?>"></td> 
                            </tr>  
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary add_btn">Add</button>

                    </div>
                         </div>
                         <div id="doctor">
                 <div class="table-responsive col-md-12">  
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <td>Doctor Code </td>
                            <td>Partner Doctor CODE </td>
                            <td>Partner Doctor Contract No</td>
                            <td>START DATE</td>
                            <td>TERM DATE</td>
                            <td>Location Code</td>
                            <td>ORIGINAL TERM DATE</td>
                        </thead>
                        <tbody>
                            <tr>
                            <td> <input type="text" name="DR_CODE[]" id="DR_CODE" value="<?= set_value('DR_CODE'); ?>"></td>
                            <td><input type="text"  name="PARTNER_DR_CODE[]" id="PARTNER_DR_CODE" value="<?= set_value('PARTNER_DR_CODE'); ?>"></td>
                            <td> <input type="text" name="PARTNER_DR_CONTRACT_NO[]" id="PARTNER_DR_CONTRACT_NO" p value="<?= set_value('PARTNER_DR_CONTRACT_NO'); ?>"></td>
                            <td><input type="text" class="pull-right datepicker" name="START_DATE[]"   id="START_DATE"></td>
                            <td> <input type="text" class="pull-right datepicker" name="TERM_DATE[]" id="TERM_DATE"></td>
                            <td>  <input type="text"  name="LOC_CODE[]" id="LOC_CODE" value="<?= set_value('LOC_CODE'); ?>"></td>
                            <td><input type="text" class="pull-right datepicker" name="ORIGINAL_TERM_DATE[]"   id="ORIGINAL_TERM_DATE"></td> 
                            </tr>  
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary add_btn">Add</button>
                                                                                
                         </div>
                     </div>
                         <div id="contact">
                             <div class="table-responsive col-md-12">  
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <td>CONTACT NO </td>
                            <td>E NAME </td>
                            <td>C NAME</td>
                            <td>TITLE</td>
                            <td>DEPARTMENT</td>
                            <td>TEL </td>
                            <td>FAX </td>
                            <td>EMAIL</td>
                        </thead>
                        <tbody>
                            <tr>
                            <td> <input type="number" class="form-control" name="CONTACT_NO" id="CONTACT_NO" value="<?= set_value('CONTACT_NO'); ?>"></td>
                            <td><input type="text" class="form-control" name="Contact_E_NAME" value="<?= set_value('Contact_E_NAME'); ?>"></td>
                            <td><input type="text" class="form-control" name="Contact_C_NAME" value="<?= set_value('Contact_C_NAME'); ?>"></td>
                            <td><input type="text" class="form-control" name="TITLE" id="TITLE" value="<?= set_value('TITLE'); ?>"></td>
                            <td> <input type="text" class="form-control" name="DEPARTMENT" id="DEPARTMENT" value="<?= set_value('DEPARTMENT'); ?>"></td>
                            <td>  <input type="text" class="form-control" name="TEL" id="TEL" value="<?= set_value('TEL'); ?>"></td>
                            <td><input type="text" class="form-control" name="FAX" id="FAX"  value="<?= set_value('FAX'); ?>"></td> 
                            <td> <input type="text" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL'); ?>"></td> 
                            </tr>  
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary add_btn">Add</button>
                                                                                
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
<!-- Page script -->
<script>

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

    $(document).ready(function(){
                $('#fee').hide();
                $('#doctor').hide();
                $('#contact').hide();
            $('#home_tab').on('click',function(){
                  $('#home').show();
                  $('#fee').hide();
                  $('#doctor').hide();
                  $('#contact').hide();
            });
           $('#fee_tab').on('click',function(){
                  $('#fee').show();           
                  $('#home').hide();
                  $('#doctor').hide();
                  $('#contact').hide();
            });
            $('#doctor_tab').on('click',function(){
                 $('#doctor').show();
                 $('#home').hide();
                  $('#fee').hide();
                  $('#contact').hide();
            });
           $('#contact_tab').on('click',function(){
                  $('#contact').show();
                  $('#home').hide();
                  $('#fee').hide();
                  $('#doctor').hide();
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
        // } 
        // else {

        // // var firstErrorID =  $('.invalidInput:first-of-type');
        // alert('Error Input');
        // // $('html,body').animate({ scrollTop:  $('.invalidInput:first-of-type').offset().top() },2000);
        // //  event.preventDefault();
        // //  alert('breal');
        //  }   

    });/*end btn save*/

     
      

});/*end doc ready*/


</script>