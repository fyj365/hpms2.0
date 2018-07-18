
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
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       INSURANCE COMPANY     <small>NEW INSURANCE COMPANY  </small>
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
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                      <ul class="nav nav-tabs">
                        <li class="nav-item active">
                          <a class="nav-link" id="home_tab" data-toggle="tab">INSURANCE COMPANY INFO</a>
                        </li>
                       <!--  <li class="nav-item">
                          <a class="nav-link" id="doctor_tab" data-toggle="tab" >CARD DOCTORS</a>
                        </li> -->
                        <li class="nav-item">
                          <a class="nav-link" id="contact_tab" data-toggle="tab">COMPANY CONTACT</a>
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

                                     <div class="form-group col-sm-6">
                            <label for="E_NAME" class="col-sm-4 control-label">English Name <i class="required">*</i>
                            </label> 
                            <div class="col-sm-8">
                                <input type="text" class="cust-required form-control" name="C_E_NAME">
                                <small class="info help-block"> *Enter 0-9 a-z A-Z  and " "only.
                                </small>
                            </div>
                        </div>
                                                      <div class="form-group col-sm-6">
                            <label for="C_NAME" class="col-sm-4 control-label" >Chinese Name
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_C_NAME">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>                                       
                        </div>
                        <div class="col-md-12">
         
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
                  <!--        <div id="doctor">
                 <div class="table-responsive col-md-12">  
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <td></td> 
                            <td>Doctor Code </td>
                            <td>Partner Doctor CODE </td>
                            <td>Location Code</td>
                            <td>Term Date</td>
                        </thead>
                        <tbody id="doctor_tbody">
                            <?php for ($i=0; $i <4; $i++) { ?>
                            <tr>
                            <td class="doctor_check"><input type="checkbox" name="checkbox"></td>
                            <td style="width: 340px;"> 
                                <?php if ($doctor_code_total !=0){ ?>
                                <select type="text" name="DR_CODE[]" class="Doctor_select chosen chosen-select-deselect">
                                    <option value="">Select Doctor Code</option>
                                    <?php foreach ($doctor_codes as $doctor_code) {?>
                                    <option value="<?php echo $doctor_code->DR_CODE;?>"><?php echo $doctor_code->DR_CODE; ?></option>
                                        <?php }?>
                               </select> <?php } else{ echo 'no doctor code available';}?>

                               <div class="type_box" style="display: inline-block;">
                               </div>
                            </td>
                            <td><input type="text"  name="PARTNER_DR_CODE[]"></td>
                            <td><input type="text"  name="LOC_CODE[]"></td>
                            <td><input type="text" name="D_TERM_DATE[]" class="datepicker"></td>
                            </tr> 
                           <?php } ?>
                       </tbody>
                    </table>
                    <button type="button" class="btn btn-danger rm_btn" id="rm__doctor_btn">Remove</button>
                    <button type="button" class="btn btn-primary add_btn" id="add__doctor_btn">Add</button>
                  </div>
               </div> -->
               
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
 
    $(document).ready(function(){
          jQuery(window).on("load", function(){
                $('#doctor').hide();

            });
         $('.Doctor_select').on('change',function(){
                var doctor_code = $(this).val();
                var type_box = $(this).siblings('.type_box');
                $(type_box).empty();

               $.ajax({
                  url:BASE_URL + 'administrator/card/findDoctorType/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'doctor_code': doctor_code},
                  success: function(res){

                        var doctor = res.doctor_types;
                        var doctor_types = Object.values(doctor);
                        var type = []; //contain all doctor types

                        var content = '';
                        for(var i=0; i< doctor_types.length;i++){
                            if (doctor_types[i]!='') {
                            content += 
                            '<label>'+doctor_types[i]+'<input type="checkbox" name="'+doctor_code+'_doctor_type[]" value="'+ doctor_types[i]+'"></label>'
                              type.push(doctor_types[i]);
                            }
                        }
                   $(type_box).append(content);
                  }
               });

          });


         $('#add__doctor_btn').on('click',function(){
                htmlText_Doctor ='<tr> <td class="doctor_check"><input type="checkbox" name="checkbox"></td> <td> <?php if ($doctor_code_total !=0){ ?> <select type="text" name="DR_CODE[]" class="Doctor_select chosen chosen-select-deselect" style="width: 150px;"> <option value="">Select Doctor Code</option> <?php foreach ($doctor_codes as $doctor_code) {?> <option value="<?php echo $doctor_code->DR_CODE;?>"><?php echo $doctor_code->DR_CODE; ?></option> <?php }?> </select> <?php } else{ echo 'no doctor code available';}?> </td> <td><input type="text"  name="PARTNER_DR_CODE[]"></td> <td><input type="text"  name="LOC_CODE[]"></td> <td><input type="text" name="D_TERM_DATE[]" class="datepicker"></td> </tr> ';
                
                $('#doctor_tbody').append(htmlText_Doctor);
         });


         $('#rm__doctor_btn').on('click',function(){
                $('.doctor_check input:checked').closest('tr').remove();
         });




            $('#contact').hide();
                
            $('#home_tab').on('click',function(){
                  $('#home').show();
                  $('#fee').hide();
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
          url: BASE_URL + '/administrator/company/add_save',
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