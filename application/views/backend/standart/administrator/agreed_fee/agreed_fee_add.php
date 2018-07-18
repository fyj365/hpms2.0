
<style type="text/css">
 legend{
  text-shadow:5px 5px 10px #d35400;
  font-weight: 600;
   padding-left: 20px;
 }
    input[type="checkbox"]{
        width: 50px;
    }
   #Contract input,#Contract select{
    height: 30px!important;
    width: 200px;
    margin-bottom: 15px;
    padding-left: 5px;
    background: #fff;

   }
label{
      font-weight: 600;
      font-size: 15px;

 }
 #CLASS_CODE{
  margin-left: 10PX;
 }

   #agreed_fee{
      width: 95%;
      margin: auto;
    }
  .agreed_fee_head{
    width: 95%!important;
    margin-left: auto!important;
    margin-right: auto!important;
    margin-bottom: 10px;
    padding-bottom: 5px;
    font-size: 15px;
    border-bottom: 3px solid #f4f4f4;
    font-weight: 600!important;

  }

  .agreed_fee_container{
    margin-bottom: 10px;
    border-bottom: 3px solid #f4f4f4;

  }
   .agreed_fee_container input{
    width: 80px;
  }
   .agreed_fee_container select{
        background: white;
        width: 95px;
    }
  #add_more {
    margin-left: 30px;
  }
 
  .btn.btn-danger{
    margin-bottom: 10px;

  }
</style>

<style type="text/css">
/*    select,input {
      width: 200px;
      height: 30px!important; 
      padding: 5px 5px;
      margin-bottom: 10px;
    }*/
    .hint{
        padding-left: 200px;
        display: block;
        font-weight: 300;
        color:#0be881;
    }
    .hint1{
        display: inline-block;
        border-radius:5px;
        font-weight: 700;
        padding-top:5px;
        line-height: 1.2;
        text-align: center;
        width: 50px;
        height: 30px;
        background-color: #0be881;
        color: white;
    }
    .hint2 {
        display: inline-block;
        border-radius:5px;
        font-weight: 700;
        padding-top:5px;
        line-height: 1.2;
        text-align: center;
        width: 200px;
        height: 30px;
        background-color: #ff7675;
        color: white;
    }
</style>
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
        Agreed Fee <small>New Agreed Fee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/agreed_fee'); ?>">Agreed Fee</a></li>
        <li class="active">New</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body" style="padding-top: 30px;">
                  
                        <?= form_open('', [
                            'name'    => 'form_agreed_fee', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_agreed_fee', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         <fieldset id="Contract">
                             <legend>CHOOSE CONTRACT</legend>
                              <div class="col-sm-12" id="firstrow">
                                <div class="form-group">
                                    <label for="CARD_CODE" class="col-sm-2 control-label ">PARTNER CODE<i class="required">*</i></label>
                                    
                                    <div class="col-sm-2"> 
                                     <select id="CARD_CODE" name="CARD_CODE" class="cust-required chosen chosen-select-deselect">
                                           <?php if ($CARD_CODE) {
                                             echo '<option value="'.$CARD_CODE.'">' .$CARD_CODE. '</option>';
                                           } ?>
                                            <option value=""> Select Partner Code</option>
                                            <?php if($CARD_CODEs_total!=0){foreach ($CARD_CODEs as $CARD_CODE) {; ?>
                                                    <option><?php echo $CARD_CODE->CARD_CODE;?></option>
                                               <?php } }else{echo 'no contract with any partnter ';}?>
                                        </select>
                                      </div>

                           
                               <label for="BP_EngName" class="col-sm-2 control-label">ENGLISH NAME: <i class="required">*</i>  </label>
                         
                              <div class="col-sm-2">

                                  <?php  if($partner_name!='') {
                                       echo ' <input type="text" name="" value="'.$partner_name->E_NAME .'" id="BP_EngName" readonly >';}
                                  else {
                                    echo  '<input type="text" name="" value="" class="" id="BP_EngName" readonly >';
                                   }
                               ?>
                             </div>
                             </div> 
                        </div>
                 
                           <div class="form-group">
                                   <label for="CLASS_CODE" class="col-sm-2 control-label">CLASS<i class="required">*</i></label>
                                     <div class="col-sm-2">
                                      <?php if ($CLASS_CODE!='') {
                                            echo '<input type="text" name="CLASS_CODE" id="CLASS_CODE" value="'.$CLASS_CODE.'" readonly>';
                                      }else{
                                            echo '<input type="text" value="" name= "CLASS_CODE" id="CLASS_CODE" readonly>';
                                      } ?>
                                    
                                     </div>
                                  <label for="CLASS_DESC" class="col-sm-2 control-label"> CLASS DESC<i class="required">*</i></label>
                                  <div class="col-sm-2">
                                 <select class="" name="CLASS_DESC" id="CLASS_DESC" readonly>
                                    <?php if ($CLASS_DESC!='') {
                                             echo '<option value="'.$CLASS_DESC->CLASS_DESC.'">' .$CLASS_DESC->CLASS_DESC. '</option>';
                                           } ?>
                                      <option value="">Select Contract</option>
                                 </select>
                               </div>


                           
                            </div>

                      </fieldset>
                      <fieldset>
                        <legend>ADD AGREED FEE</legend>
                        <div class="form-group agreed_fee_head">
                          <div class="col-md-1">TYPE</div>
                          <div class="col-sm-1">FEE</div>
                          <div class="col-sm-1">PAY</div>
                          <div class="col-sm-1">CO-PAY</div>
                          <div class="col-sm-1">MED-DAYS</div>
                          <div class="col-sm-2">EXTRA MED</div>
                          <div class="col-sm-2">X-LAB</div>
                          <div class="col-sm-2">SURGICAL</div>
                        </div> 
      
                       <div id="agreed_fee">
                        <?php for($i=0; $i<4; $i++){; ?>
                          <div class="form-group agreed_fee_container">
                          <div class="col-sm-1">
                            <select id="doctor_type" class="Doct_TYPE" name="TYPE[]">
                               <option value="">Select Type</option>
                                       <?php if ($doctor_types!=''){
                                        foreach ($doctor_types as $doc_type) {
                                          if ($doc_type!='') {
                                          echo '<option value="'.$doc_type .'">'.$doc_type.'</option>';
                                          }
                                   } }?>
                            </select>
                          </div>
                          <div class="col-sm-1">
                                <input type="number" class="" name="FEE[]" class="FEE" min="0">
                            </div>
                            <div class="col-sm-1">
                                <input type="number" class="" name="PAY[]" class="PAY" min="0">
                            </div>
                           <div class="col-sm-1">
                                <input type="number" name="CO_PAY[]" class="CO_PAY" min="0">
                           </div>
                             <div class="col-sm-1">
                                <input type="text" class="" name="MED_DAYS[]" class="MED_DAYS">
                            </div>

                            <div class="col-sm-2">
                                <div class="col-sm-2">
                                <input type="checkbox" class="" name="EXTRA_MED_BOL[]" class="EXTRA_MED_BOL" value="1">
                            </div>
                            </div>

                              <div class="col-sm-2">
                                 <div class="col-sm-2">
                                <input type="checkbox" class="" name="LAB_XRAY_BOL[]" class="LAB_XRAY_BOL" value="1">
                            </div>
                             
                              </div>
                              <div class="col-sm-2">
                                <div class="col-sm-2">
                                <input type="checkbox" class="" name="SURGICAL_BOL[]" class="SURGICAL_BOL" value="1">
                                </div>
                              </div>

                              <div class="col-sm-1">
                                  <button type="button" class="btn-danger btn remove_btn">Remove</button>
                              </div>
                       </div>
                      <?php  }?>
                       </div>

                        <button type="button" class="btn-info btn col-sm-1" id="add_more" style="">Add More</button>
                    </FIELDSET>
                       
                                      
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7" style="margin-top: 30px;">
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
    $(document).ready(function(){
     $('.remove_btn').on('click', function() {
         $(this).closest('.agreed_fee_container').remove();
    });
      $('#CARD_CODE').on('change',function(){

            // clear field
             while($('#CLASS_DESC option').length >1){
               $('#CLASS_DESC option').last().remove();
              }
              var type = $('.Doct_TYPE');
              
              $('input[type="TYPE"]').each(function(){
                  $(this).val("");
              });

              $('.Doct_TYPE').each(function(index){
                  $(this).empty();
              });
              
             $('.Doct_TYPE_new').each(function(index){
                  $(this).empty();

              });
            $('#CLASS_CODE').attr('value','');
              
            // get contract 
            var CARD_CODE = $('#CARD_CODE').val();
            $.ajax({
                url:BASE_URL+'administrator/Agreed_fee/getContract/',
                method:'GET',
                dataType:'JSON',
                data:{'CARD_CODE':CARD_CODE},
                success: function(res){
                    var name = res.English_Name;
                    $('#BP_EngName').prop('value',res.English_Name);

                    var cards = res.cards;
                   if (cards.length>0) {
                        var cards_num  = cards.length;

                       var contract_options = '';
                       for (var i =0; i<cards_num; i++){
                         contract_options += '<option value="'+ cards[i]['CLASS_CODE']+'">'+ cards[i]['CLASS_DESC'] +'</option>'
                         console.log(cards[i]['CLASS_DESC']);
                       }

                       $('#CLASS_DESC').append(contract_options);

                      }

                  // get all tpyes based on company doctor type
                    var doctor_types = res.doctor_types;            
                    var doctor_type= [];
                    console.log(doctor_types);
                    for(var i=0; i<doctor_types.length; i++){  
                      var type = Object.values(doctor_types[i]);
                      doctor_type = doctor_type.concat(type);
                    }
                    var docType_distinct = doctor_type.filter(isdistinct); 
                       //get distinc type from partner doctor  type
                    function isdistinct(value,index,self){
                      if (value !='' && value !=null) {
                         return self.indexOf(value) === index;
                        }
                    }
                  // create gloable variable doct_type_options so that other function can use it
                   doct_type_options ='<option value="">SELECT TYPE</option>';
                   for(var i=0; i<docType_distinct.length; i++){
                           doct_type_options += '<option value="'+ docType_distinct[i]+'">'+ docType_distinct[i] + '</option>';
                    }

                    $('.Doct_TYPE').append(doct_type_options);
                    $('.Doct_TYPE_new').append(doct_type_options);
                }

            });
      });

      $('#CLASS_DESC').on('change',function(){
            var selectedCLASS_CODE =  $('#CLASS_DESC').val();
            $('#CLASS_CODE').attr('value',selectedCLASS_CODE);
      
      });


      $('#add_more').on('click',function(){
      
           htmltext = '<div class="form-group agreed_fee_container"> <div class="col-sm-1">    <select id="doctor_type" class="Doct_TYPE"><option value="">Select Type</option> <?php if ($doctor_types!=''){foreach ($doctor_types as $doc_type) {if ($doc_type!='') {echo '<option value="'.$doc_type .'">'.$doc_type.'</option>'; } } }?> </select> </div> <div class="col-sm-1"> <input type="number" class="" name="FEE[]" class="FEE"> </div> <div class="col-sm-1"> <input type="number" class="" name="PAY[]" class="PAY"> </div> <div class="col-sm-1"> <input type="number" name="CO_PAY[]" class="CO_PAY"> </div> <div class="col-sm-1"> <input type="text" class="" name="MED_DAYS[]" class="MED_DAYS"> </div> <div class="col-sm-2"> <div class="col-sm-2"> <input type="checkbox" class="" name="EXTRA_MED_BOL[]" class="EXTRA_MED_BOL" value="1"> </div> </div> <div class="col-sm-2"> <div class="col-sm-2"> <input type="checkbox" class="" name="LAB_XRAY_BOL[]" class="LAB_XRAY_BOL" value="1"> </div> </div> <div class="col-sm-2"> <div class="col-sm-2"> <input type="checkbox" class="" name="SURGICAL_BOL[]" class="SURGICAL_BOL" value="1"> </div> </div> <div class="col-sm-1"> <button type="button" class="btn-danger btn remove_btn">Remove</button> </div> </div>'; $('#agreed_fee').append(htmltext);
            $('.remove_btn').on('click', function() {
            $(this).closest('.agreed_fee_container').remove();
            });
            $(this).closest('#doctor_type').append(doct_type_options);
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
              window.location.href = BASE_URL + 'administrator/agreed_fee';
            }
          });
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_agreed_fee = $('#form_agreed_fee');
        var data_post = form_agreed_fee.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/agreed_fee/add_save',
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