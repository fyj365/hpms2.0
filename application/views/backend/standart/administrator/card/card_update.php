
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
.form-control:not(select) {
    margin-top: 8px;
}

  #card {
    margin-left: 20px;
  }

  h3{
    background-color: #dfe6e9
  }
  table thead{
    background-color: #00cec9;
  }
  #card{
    padding-right: 50px;
    padding-left: 50px;
  }
   #home, #contact {
    padding-top: 20px;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       CARD <small>Edit <?= $card->CARD_CODE;?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/card'); ?>">All card</a></li>
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
                        <?= form_open(base_url('administrator/card/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_card', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_card', 
                            'method'  => 'POST'
                            ]); ?>
               <ul class="nav nav-tabs">
                <li class="nav-item active">
                  <a class="nav-link" id="home_tab" data-toggle="tab">Card Information</a>
                </li>
            <!--     <li class="nav-item">
                  <a class="nav-link" id="fee_tab" data-toggle="tab" >Agreed Fee</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" id="contact_tab" data-toggle="tab">Contact Information</a>
                </li>
              </ul>
            
             <div id="home">
                        <div id="card" class="col-sm-12">
                                <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">Card Code
                            </label>
                            <div class="col-sm-4">
                                 <input type="text" class="form-control" name="CARD_CODE" value="<?= set_value('CARD_CODE', $card->CARD_CODE); ?>" readonly>
                            </div>

                            <label for="STATUS" class="col-sm-2 control-label">Status</label>
                                                        <div class="col-sm-4">

                         <?php if ($BP_STATUS !=false){
                            echo '<input type="text" class="form-control" value="'. $BP_STATUS[0]->STATUS .'"readonly>'; 
                          } else{
                            echo '';
                          }
                            ?>
                            </div>
                        </div>
                                          
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-2 control-label">English Name 
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="C_E_NAME" value="<?= set_value('C_E_NAME', $card->E_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                              <label for="C_NAME" class="col-sm-2 control-label">Chinese Name
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="C_C_NAME" value="<?= set_value('C_C_NAME', $card->C_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                                 <label for="SURGICAL_RATING" class="col-sm-2 control-label">Surgical Rating (%)
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="SURGICAL_RATING"  value="<?= set_value('SURGICAL_RATING', $card->SURGICAL_RATING); ?>">


                                <small class="info help-block">
                                </small>
                            </div>
                            <label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
                            </label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE" value="<?= set_value('card_JOIN_DATE_name', $card->JOIN_DATE); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                           
                        </div>
                                                        <div class="form-group ">
                            <label for="BILLING_DEPT_NAME" class="col-sm-2 control-label">Billing Dept Name
                            </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="BILLING_DEPT_NAME" value="<?= set_value('BILLING_DEPT_NAME', $card->BILLING_DEPT_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                                   <label for="DIAG_CODE_STANDARD" class="col-sm-2 control-label">Diagnosis Code Standard
                            </label>
                            <div class="col-sm-4">
                    
                             <input type="text" class="form-control" name="DIAG_CODE_STANDARD" id="DIAG_CODE_STANDARD" maxlength='80' list="Diagnosis_code" value="<?= set_value('DIAG_CODE_STANDARD', $card->DIAG_CODE_STANDARD); ?>">
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

                    <div class="col-sm-6">
                                                          
                                                <div class="form-group ">
                            <label for="E_ADDR1" class="col-sm-4 control-label">English Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="E_ADDR1" value="<?= set_value('E_ADDR1', $card->E_ADDR1); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR2" class="col-sm-4 control-label">English Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="E_ADDR2" value="<?= set_value('E_ADDR2', $card->E_ADDR2); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div> 
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR3" class="col-sm-4 control-label">English Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="E_ADDR3" value="<?= set_value('E_ADDR3', $card->E_ADDR3); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR4" class="col-sm-4 control-label">English Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="E_ADDR4" value="<?= set_value('E_ADDR4', $card->E_ADDR4); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR5" class="col-sm-4 control-label">English Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="E_ADDR5" value="<?= set_value('E_ADDR5', $card->E_ADDR5); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_DISTRICT" class="col-sm-4 control-label">English District
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="E_DISTRICT"  value="<?= set_value('E_DISTRICT', $card->E_DISTRICT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                    </div>                         
                                               
                        <div class="col-sm-6">
                                   
                                                <div class="form-group ">
                            <label for="C_ADDR1" class="col-sm-4 control-label">Chinese Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="C_ADDR1"  value="<?= set_value('C_ADDR1', $card->C_ADDR1); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR2" class="col-sm-4 control-label">Chinese Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="C_ADDR2"  value="<?= set_value('C_ADDR2', $card->C_ADDR2); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR3" class="col-sm-4 control-label">Chinese Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="C_ADDR3"  value="<?= set_value('C_ADDR3', $card->C_ADDR3); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR4" class="col-sm-4 control-label">Chinese Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="C_ADDR4"  value="<?= set_value('C_ADDR4', $card->C_ADDR4); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR5" class="col-sm-4 control-label">Chinese Addr
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="C_ADDR5" value="<?= set_value('C_ADDR5', $card->C_ADDR5); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_DISTRICT" class="col-sm-4 control-label">Chinese District
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="C_DISTRICT"  value="<?= set_value('C_DISTRICT', $card->C_DISTRICT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                        </div>                 
                                                 
               
                    </div>
 
                </div> 
                <div id="contact">
                     <?php 
                              $i=0;
                             if ($card_contacts) {
                             foreach ($card_contacts as $card_contact){?>
                              <div class="col-sm-4">
                                     <div class="form-group ">
                            <label for="CONTACT_NO" class="col-sm-4 control-label">Contact No
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="CONTACT_NO[]" value="<?= $card_contact->CONTACT_NO;?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-4 control-label">English Name 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="Contact_E_NAME[]"   value="<?= $card_contact->E_NAME;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-4 control-label">Chinese Name
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="Contact_C_NAME[]" value="<?= $card_contact->C_NAME;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TITLE" class="col-sm-4 control-label">Title
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="TITLE[]" value="<?= $card_contact->TITLE;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPARTMENT" class="col-sm-4 control-label">Department
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="DEPARTMENT[]"  value="<?= $card_contact->DEPARTMENT;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TEL" class="col-sm-4 control-label">TEL 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="TEL[]" value="<?= $card_contact->TEL;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FAX" class="col-sm-4 control-label">FAX 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="FAX[]"  value="<?= $card_contact->FAX;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-4 control-label">EMAIL 
                            </label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="EMAIL[]"  value="<?= $card_contact->EMAIL;?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                         </div>
               <?php $i++ ;}} ;while ($i<3) {

                   echo ' <div class="col-sm-4">
                                     <div class="form-group ">
                            <label for="CONTACT_NO" class="col-sm-4 control-label">Contact No
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="CONTACT_NO_new[]" value="'.($i+1).'" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-4 control-label">English Name 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="Contact_E_NAME_new[]"   value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-4 control-label">Chinese Name
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="Contact_C_NAME_new[]" value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TITLE" class="col-sm-4 control-label">Title
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="TITLE_new[]" value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPARTMENT" class="col-sm-4 control-label">Department
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="DEPARTMENT_new[]"  value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TEL" class="col-sm-4 control-label">TEL 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="TEL_new[]" value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FAX" class="col-sm-4 control-label">FAX 
                            </label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="FAX_new[]"  value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-4 control-label">EMAIL 
                            </label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="EMAIL_new[]"  value="">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                         </div>'; 
                       $i++;
                }
            ?>

            </div>
                      <div class="message"></div>
                        <div class="row-fluid col-md-12">
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
            </div>
                  </div><!--end of body div-->
                  </div>                                  
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
 <script type="text/javascript">
       $('#fee').hide();
       $('#contact').hide();
      $('#new_doctor').hide();

     $(document).ready(function(){
           $('#home_tab').on('click',function(){
                  $('#home').show();
                  $('#fee').hide();
                  $('#contact').hide();
                  $('#new_doctor').hide();
            });
            $('#new_doctor_tab').on('click',function(){
                 $('#new_doctor').show();
                 $('#home').hide();
                  $('#fee').hide();
                  $('#contact').hide();
            });
           $('#fee_tab').on('click',function(){
                  $('#home').hide();
                  $('#fee').show();
                  $('#contact').hide();
                 $('#new_doctor').hide();

            });
           $('#contact_tab').on('click',function(){
                 $('#home').hide();
                  $('#fee').hide();
                  $('#contact').show();
                 $('#new_doctor').hide();

            });
         });
   </script>
<script>
    $(document).ready(function(){

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
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_card = $('#form_card');
        var data_post = form_card.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_card.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#card_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
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