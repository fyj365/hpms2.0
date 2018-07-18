
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
    text-align: left;
  }
  .form-group{
    border:1px solid #f4f4f4;
    padding-bottom: 3px;
    margin-bottom: 5px;
  }
  h3{
    background-color: #dfe6e9
  }
  table thead{
    background-color: #00cec9;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Business Partner        <small>Edit Business Partner</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/card'); ?>">Business Partner</a></li>
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
                  <a class="nav-link" id="home_tab" data-toggle="tab">Partner Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="fee_tab" data-toggle="tab" >Agreed Fee</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact_tab" data-toggle="tab">Contact Information</a>
                </li>
              </ul>
            
             <div id="home">
                        <div id="card" class="col-sm-4">
                                <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">PARTNER CODE 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" placeholder="PARTNER CODE" value="<?= set_value('CARD_CODE', $card->CARD_CODE); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-sm-2 control-label">E NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BP_E_NAME" value="<?= set_value('BP_E_NAME', $card->E_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-2 control-label">C NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BP_E_NAME" value="<?= set_value('BP_E_NAME', $card->C_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="JOIN_DATE" class="col-sm-2 control-label">JOIN DATE 
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE"  placeholder="JOIN DATE" id="JOIN_DATE" value="<?= set_value('card_JOIN_DATE_name', $card->JOIN_DATE); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="STATUS" class="col-sm-2 control-label">STATUS 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATUS" id="STATUS" placeholder="STATUS" value="<?= set_value('STATUS', $card->STATUS); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR1" class="col-sm-2 control-label">E ADDR1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_ADDR1" id="E_ADDR1" placeholder="E ADDR1" value="<?= set_value('E_ADDR1', $card->E_ADDR1); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR2" class="col-sm-2 control-label">E ADDR2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_ADDR2" id="E_ADDR2" placeholder="E ADDR2" value="<?= set_value('E_ADDR2', $card->E_ADDR2); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR3" class="col-sm-2 control-label">E ADDR3 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_ADDR3" id="E_ADDR3" placeholder="E ADDR3" value="<?= set_value('E_ADDR3', $card->E_ADDR3); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR4" class="col-sm-2 control-label">E ADDR4 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_ADDR4" id="E_ADDR4" placeholder="E ADDR4" value="<?= set_value('E_ADDR4', $card->E_ADDR4); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_ADDR5" class="col-sm-2 control-label">E ADDR5 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_ADDR5" id="E_ADDR5" placeholder="E ADDR5" value="<?= set_value('E_ADDR5', $card->E_ADDR5); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="E_DISTRICT" class="col-sm-2 control-label">E DISTRICT 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="E_DISTRICT" id="E_DISTRICT" placeholder="E DISTRICT" value="<?= set_value('E_DISTRICT', $card->E_DISTRICT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR1" class="col-sm-2 control-label">C ADDR1 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_ADDR1" id="C_ADDR1" placeholder="C ADDR1" value="<?= set_value('C_ADDR1', $card->C_ADDR1); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR2" class="col-sm-2 control-label">C ADDR2 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_ADDR2" id="C_ADDR2" placeholder="C ADDR2" value="<?= set_value('C_ADDR2', $card->C_ADDR2); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR3" class="col-sm-2 control-label">C ADDR3 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_ADDR3" id="C_ADDR3" placeholder="C ADDR3" value="<?= set_value('C_ADDR3', $card->C_ADDR3); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR4" class="col-sm-2 control-label">C ADDR4 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_ADDR4" id="C_ADDR4" placeholder="C ADDR4" value="<?= set_value('C_ADDR4', $card->C_ADDR4); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_ADDR5" class="col-sm-2 control-label">C ADDR5 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_ADDR5" id="C_ADDR5" placeholder="C ADDR5" value="<?= set_value('C_ADDR5', $card->C_ADDR5); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_DISTRICT" class="col-sm-2 control-label">C DISTRICT 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="C_DISTRICT" id="C_DISTRICT" placeholder="C DISTRICT" value="<?= set_value('C_DISTRICT', $card->C_DISTRICT); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="BILLING_DEPT_NAME" class="col-sm-2 control-label">BILLING DEPT NAME 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="BILLING_DEPT_NAME" id="BILLING_DEPT_NAME" placeholder="BILLING DEPT NAME" value="<?= set_value('BILLING_DEPT_NAME', $card->BILLING_DEPT_NAME); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SURGICAL_RATING" class="col-sm-2 control-label">SURGICAL RATING 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SURGICAL_RATING" id="SURGICAL_RATING" placeholder="SURGICAL RATING" value="<?= set_value('SURGICAL_RATING', $card->SURGICAL_RATING); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DIAG_CODE_STANDARD" class="col-sm-2 control-label">DIAG CODE STANDARD 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DIAG_CODE_STANDARD" id="DIAG_CODE_STANDARD" placeholder="DIAG CODE STANDARD" value="<?= set_value('DIAG_CODE_STANDARD', $card->DIAG_CODE_STANDARD); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                    </div>
<!--                   <div id="Partner_contract" class="col-sm-8">
                    <h3>Contracts with Business Partner </h3>
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>Partner Contract No</th>
                           <th>Start Date</th>
                           <th>Term Date</th>
                           <th>Status</th>
                           <th>Extend Contract</th>
                           <th>Remark</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_contract">
                     <?php 
                     if($partner_contract_counts!=0){
                        foreach($partner_contracts as $partner_contract): ?>
                        <tr>
                           <td><?= _ent($partner_contract->PARTNER_CONTRACT_NO); ?></td> 
                           <td><?= _ent($partner_contract->START_DATE); ?></td> 
                           <td><?= _ent($partner_contract->TERM_DATE); ?></td> 
                           <td><?= _ent($partner_contract->STATUS); ?></td> 
                           <td><?= _ent($partner_contract->EXTEND_CONTRACT); ?></td> 
                           <td><?= _ent($partner_contract->REMARK); ?></td> 
                        </tr>
                      <?php endforeach;} ?>
                      <?php if ($partner_contract_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner Contract data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
                  </div> -->
               <!--    <div id="Partner_doctors">
                   <div class="table-responsive"  > 
                       <h3>Partner' Doctors</h3>

                   <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>DR Code</th>
                           <th>Partner Dr Contract No</th>
                           <th>Partner Dr Code</th>
                           <th>Location Code</th>
                           <th>Original Term Date</th>
                           <th>Start Date</th>
                           <th>Term Ddate</th>
                           <th>Status</th>
                           <th>extend</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_doctor_contract">
                     <?php 
                        if ($partner_doctor_contract_counts !=0){
                        foreach($partner_doctor_contracts as $partner_doctor_contract): ?>
                        <tr> 
                           <td><?= _ent($partner_doctor_contract->DR_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->PARTNER_DR_CONTRACT_NO); ?></td> 
                           <td><?= _ent($partner_doctor_contract->PARTNER_DR_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->LOC_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->ORIGINAL_TERM_DATE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->START_DATE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->TERM_DATE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->STATUS); ?></td> 
                           <td><?= _ent($partner_doctor_contract->EXTEND); ?></td> 
                           <td>
                               <a href="<?= site_url('administrator/partner_doctor_contract/edit/' . $partner_doctor_contract->PARTNER_DR_CONTRACT_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                   <?php 
                     }
                     else{
                      echo 'Total number :0';
                     }
                    ?>
                      <?php if ($partner_doctor_contract_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner Doctor Contract data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
                  </div> -->
                  </div> <!--end of home tab-->
                  <div id="contatc">
                             <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>CONTACT NO</th>
                           <th>E NAME</th>
                           <th>C NAME</th>
                           <th>TITLE</th>
                           <th>DEPARTMENT</th>
                           <th>TEL</th>
                           <th>FAX</th>
                           <th>EMAIL</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_contact">
                     <?php if($partner_contact_counts!=0){
                             foreach($partner_contacts as $partner_contact): ?>
                        <tr>
                           <td><?= _ent($partner_contact->CONTACT_NO) ;?></td> 
                           <td><input type="E_NAME" name="Contact_E_NAME[]" value="<?= set_value('Contact_E_NAME',$partner_contact->E_NAME);?>"></td> 
                           <td><input type="C_NAME" name="Contact_C_NAME[]" value="<?= set_value('Contact_C_NAME',$partner_contact->C_NAME);?>"></td> 
                           <td><input type="TITLE" name="TITLE[]" value="<?= set_value('TITLE',$partner_contact->TITLE);?>"></td> 
                           <td><input type="DEPARTMENT" name="DEPARTMENT[]" value="<?= set_value('DEPARTMENT',$partner_contact->DEPARTMENT);?>"></td> 
                           <td><input type="TEL" name="TEL[]" value="<?= set_value('TEL',$partner_contact->TEL);?>"></td> 
                           <td><input type="FAX" name="FAX[]" value="<?= set_value('FAX',$partner_contact->FAX);?>"></td> 
                           <td><input type="EMAIL" name="EMAIL[]" value="<?= set_value('EMAIL',$partner_contact->EMAIL);?>"></td>
                        </tr>
                      <?php endforeach; } ?>
                      <?php if ($partner_contact_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner Contact data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                </div>                     
                  </div>
                  </div><!--end of body div-->
                  </div>                                  
                             ...
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

     $(document).ready(function(){
           $('#home_tab').on('click',function(){
                  $('#home').show();
                  $('#fee').hide();
                  $('#contact').hide();
            });
           $('#fee_tab').on('click',function(){
                  $('#home').hide();
                  $('#fee').show();
                  $('#contact').hide();
            });
           $('#contact_tab').on('click',function(){
                 $('#home').hide();
                  $('#fee').hide();
                  $('#contact').show();
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