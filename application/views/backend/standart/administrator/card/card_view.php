<style type="text/css">
  table thead{
    background-color: #00cec9;
  }
  i{
    display: inline-block;
    font-weight: 200!important;
    font-size: 15px;
    padding-right: 5px;
  }
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


   #Partner_doctors table{
    width: 100%;
  }
  #Partner_doctors thead,#Partner_doctors tbody, #Partner_doctors tr,#Partner_doctors td{
      display: block;

  }
  #Partner_doctors thead tr{
    width: 98%;

  }
  #Partner_doctors tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #Partner_doctors tbody{
    max-height: 500px;
    overflow-y: auto;
    overflow-x: auto;
  }
   #Partner_doctors th{
       height: 50px;
   }
  #Partner_doctors th,#Partner_doctors td{
    float: left;
    height: 35px;
    width: 11%;
  }
 .addButton{
    float: right;
    margin-top:15px;
    margin-bottom: 5px;
  }
  #card_class.clear{
    clear: both;
  }
  #agreed_fee.clear{
    clear:both;
  }
 #card_class .addButton{
    margin-top: 0;
    margin-left: 5px;
  }
  .search_field{
  float: right;
 }
  #card_class .search_field{
  margin-top: 15px;
}
  #card_class table{
    width: 100%;
  }
  #card_class thead,#card_class tbody, #card_class tr,#card_class td{
      display: block;

  }
  #card_class thead tr{
    width: 99%;

  }
  #card_class tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #card_class tbody{
    max-height: 500px;
    overflow-y: auto;
    overflow-x: auto;
  }
  #card_class th,#card_class td{
    float: left;
     height: 35px;
     width: 10%;
  }
   #card_class .big-cell{
    width: 16%;

  }
  #card_class .sbig-cell{
    width: 18%;
  }

    #agreed_fee table{
    width: 100%;
  }
  #agreed_fee thead,#agreed_fee tbody, #agreed_fee tr,#agreed_fee td{
      display: block;
  }
  #agreed_fee thead tr{
    width: 99%;

  }
  #agreed_fee tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #agreed_fee tbody{
    max-height: 280px;
    overflow-y: auto;
    overflow-x: auto;
  }
  #agreed_fee th,#agreed_fee td{
    overflow: visible;
    height: 35px;
    float: left;
    width: 6%;
  }
  #agreed_fee .m-cell{
    width: 8%;

  }
  #agreed_fee .big-cell{
    width: 15%;

  }
  #contact {
    padding-top: 20px;
  }
  #contact .form-group{
    border:1px solid #f4f4f4;
    height: 45px;
    padding-top: 10px;
    margin-bottom: 10px;
  }
  #tbody_card_class tr:hover{
    background: #bdc3c7!important;
  }
  #fee .btn.btn-default{
    width: 80px;
    height: 30px;
  }
  #fee input[type="text"]{
    padding-left: 3px;
    border:2px solid #f4f4f4;
    border-radius: 7px;
    height: 30px;
  }
 #agreed_fee {
  overflow-x: initial;
 }
 .label.bg-yellow{
  font-size: 14px;
 }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
    CARD <small><?= _ent($card->CARD_CODE); ?> Detail </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/card'); ?>"></a></li>
      <li class="active">Detail</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
       
          <ul class="nav nav-tabs">
            <li class="nav-item active">
              <a class="nav-link" id="home_tab" data-toggle="tab">PARTNER CARD INFOMATION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fee_tab" data-toggle="tab" >AGREED FEE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact_tab" data-toggle="tab">CARD CONTACT</a>
            </li>
          </ul>
                  
          <div id="home">
             <div class="form-horizontal" name="form_card" id="form_card" >
                   <div id="card" class="col-sm-5">
                    <h3> <?= _ent($card->CARD_CODE); ?>' BASIC INFO</h3>
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Card Code </label>

                        <div class="col-sm-7" id="CARD_CODE">
                           <?= _ent($card->CARD_CODE); ?>
                        </div>
                    </div>
                        <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">COM ID </label>

                        <div class="col-sm-7" id="COM_ID">
                           <?= _ent($card->COM_ID); ?>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">English Name </label>

                        <div class="col-sm-7">
                           <?= _ent($card->E_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Chinese Name </label>

                        <div class="col-sm-7">
                           <?= _ent($card->C_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Join Date</label>

                        <div class="col-sm-7">
                           <?= _ent($card->JOIN_DATE); ?>
                        </div>
                    </div>
                      <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">STATUS</label>

                        <div class="col-sm-7">

                           <?php if ($BP_STATUS !=false){
                            echo $BP_STATUS[0]->STATUS; 
                          } else{
                            echo 'not undifned';
                          }
                            ?> </div>
                    </div>                     
                                    
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">English Address</label>

                        <div class="col-sm-7">
                          <?php echo ($card->E_ADDR1) .', '. $card->E_ADDR2 .', '. $card->E_ADDR3 .', '.$card->E_ADDR4 . ', '.$card->E_ADDR5 .', '. $card->E_DISTRICT; ?>
                        </div>
                    </div>
                                        
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Chinese Address</label>

                        <div class="col-sm-7">
                          <?php echo ($card->C_ADDR1) .', '.  $card->C_ADDR2 .', '. $card->C_ADDR3 .', '.$card->C_ADDR4 . ', '.$card->C_ADDR5 .', '. $card->C_DISTRICT; ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">BILLING DEPT NAME </label>

                        <div class="col-sm-7">
                           <?= _ent($card->BILLING_DEPT_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">SURGICAL RATING </label>

                        <div class="col-sm-7">
                           <?= _ent($card->SURGICAL_RATING); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">DIAG CODE STANDARD </label>

                        <div class="col-sm-7">
                           <?= _ent($card->DIAG_CODE_STANDARD); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">CREATOR </label>

                        <div class="col-sm-7">
                           <?= _ent($card->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">CREATE DATE </label>

                        <div class="col-sm-7">
                           <?= _ent($card->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">LAST MODIFIER </label>

                        <div class="col-sm-7">
                           <?= _ent($card->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">LAST UPDATE </label>

                        <div class="col-sm-7">
                           <?= _ent($card->LAST_UPDATE); ?>
                        </div>
                    </div>
                  </div> <!--end of company infor-->                 
                  <div class="col-sm-7">
                
                  <div id="Partner_doctors" > 
                   <div class=""  > 
                       <h3 style="width:50%;display: inline-block;">DOCTORS</h3>
                       <?php is_allowed('doctor_card_add', function(){?>
                      <a target="_blank" href="<?=  site_url('administrator/doctor_card/add');?>" type="button" id="add_btn" class="btn btn-primary addButton" style="">Add doctor</a> 
                        <?php }) ?>

                   <table class="table table-bordered table-striped dataTable" >
                     <thead>
                        <tr class="">
                           <th>COMP ID</th>
                           <th>CARD CODE</th>
                           <th>DR Code</th> 
                           <th>Center Code</th>
                           <th>Partner Doctor Code</th>
                           <th>TYPE</th>
                           <th>Location Code</th>
                           <th>Term date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_doctor_card">
                     <?php 
                        if (count($doctor_cards) !=0){
                        foreach($doctor_cards as $doctor_card){ ?>
                        <tr> 
                          <td><?= _ent($doctor_card->COM_ID); ?></td>
                          <td><?= _ent($doctor_card->CARD_CODE); ?></td>
                           <td><?= _ent($doctor_card->DR_CODE); ?></td>
                            <td><?= _ent($doctor_card->CENTER_CODE); ?></td>
                           <td><?= _ent($doctor_card->PARTNER_DR_CODE); ?></td> 
                           <td><?php echo $doctor_card->TYPE1." / ".$doctor_card->TYPE2;?></td>
                           <td><?= _ent($doctor_card->LOC_CODE); ?></td> 
                           <td><?= _ent($doctor_card->TERM_DATE); ?></td> 
                           <td>
                             <?php is_allowed('doctor_card_update', function($doctor_card) use ($doctor_card){?>
                              <a target="_blank" href="<?= site_url('administrator/doctor_card/edit/'.$doctor_card->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                           </td>
                        </tr>
                      <?php }} else{?>
                        <tr>
                           <td colspan="400">
                        
                           </td>
                         </tr>
                         <?php }?> 
                     </tbody>
                  </table>
                  </div>
                  </div> 
                  <!--partner_doctor-->
                  </div>
                  </div>
            </div> 
            <!--home tab-->
        <div class="" id="fee">

            <div id="card_class" class="clear">
 
              <h3 style="width:auto;display: inline-block;padding-right: 10px;"><span id="Card_status">Active </span> Cards</h3><div style="display: inline-block;"><span id="card_no" class="label bg-yellow"><?php echo count($CLASS_CODES); ?></span></div>
 
                  
                   <div class="search_field">
                    <label>Card Class</label>
                    <input type="text" list="CLASS_CODE_list" value="" id="CLASS_CODE">
                    <datalist id="CLASS_CODE_list">
                      <?php if (count($CLASS_CODES)>0) { 
                        foreach ($CLASS_CODES as $CLASS_CODE) {?>
                        <option value="<?php echo $CLASS_CODE->CLASS_CODE;?>"><?php echo $CLASS_CODE->CLASS_CODE; ?></option>
                      <?php }} ?>
                    </datalist>

                     <label>Status</label>
                    <input type="text" name="" list="Status_list" id="Status">
                    <datalist id="Status_list">
                      <option>Active</option>
                      <option>Not Start</option>
                      <option>Terminate</option>
                    </datalist>
                    <button type="button" class="btn btn-default" id="search_card"><i class="glyphicon glyphicon-search"></i></button>
                    <button type="button" class="btn btn-default" id="reset_card"><i class="fa fa-repeat"></i></button>
                     <a target="_blank" type="button" class="btn btn-primary addButton" href="<?= site_url('administrator/card_class/add_1/'.$card->CARD_CODE) ;?>" >ADD CLASS</a> 
                   </div>
                   
                  <div class=""> 

               <table class="table table-bordered table-striped dataTable">
                 
                     <thead>
                        <tr class="">
                          <th>CARD CODE</th>
                           <th>CLASS</th>
                           <th class="big-cell">CLASS DESC</th>
                           <th>Term Date</th>
                           <th>Status</th>
<!--                            <th>Extend Contract</th>
 -->                       <th class="big-cell">Remark</th>
                           <th class="sbig-cell">Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_card_class">
                     <?php 
                     if(count($ACTIVE_CARDS)>0){
                        foreach($ACTIVE_CARDS as $ACTIVE_CARD){ ?>
                        <tr>
                           <td class="p_code"><?= _ent($ACTIVE_CARD->CARD_CODE); ?></td>
                           <td class="c_type"><?= _ent($ACTIVE_CARD->CLASS_CODE); ?></td>
                           <td class="big-cell"><?= _ent($ACTIVE_CARD->CLASS_DESC); ?></td>
                           <td><?= _ent($ACTIVE_CARD->TERM_DATE); ?></td> 
                           <td><?= _ent($ACTIVE_CARD->STATUS); ?></td> 
                     
                           <td class="big-cell"><?= _ent($ACTIVE_CARD->REMARK); ?></td> 
                           <td class="sbig-cell"> <a href="<?= site_url('administrator/card_class/view/' . $ACTIVE_CARD->AUTO_NO); ?>" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="<?= site_url('administrator/card_class/edit/' .$ACTIVE_CARD->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="<?= site_url('administrator/agreed_fee/add_2/' .$ACTIVE_CARD->CARD_CODE.'/'.$ACTIVE_CARD->CLASS_CODE ); ?>" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a>  </td>
                        </tr>
                      <?php }} ?>
                      <?php if (count($ACTIVE_CARDS) == 0) :?>
                         <tr>
                           <td class="big-cell">
                           </td>
                         </tr>
                      <?php endif; ?> 
                     </tbody>
                  </table>

        
                 </div>
            
            </div><!--end partner contract view-->
         <div class="table-responsive" id="agreed_fee" class="clear"> <!--start of agree fee view-->

            <h3 style="width:auto;margin-top:0;display: inline-block;padding-right: 10px;"><span id="Fee_status">Active </span> Fee</h3><div style="display: inline-block;"><span id="fee_no" class="label bg-yellow"><?php echo count($ACTIVE_FEES) ;?></span></div>
            <div class="search_field">
                <label for="agreed_fee_filter2">Card Class:</label>
                <input type="text" name="f_CLASS_CODE" value="" id="CLASS_CODE_2" list="CLASS_CODE_2">
                <datalist id="CLASS_CODE_2">
                     
                </datalist>
                <label >Type</label>
                <input type="text" name="type" id="m_type">
                <button type="button" class="btn btn-default " id="search_fee"><i class="glyphicon glyphicon-search"></i></button>
            </div>
             <table class="table table-bordered table-striped dataTable" id="">
                     <thead>
                        <tr class="">
                           <th class="big-cell">CARD CLASS</th>
                           <th>Type</th>
                           <th  class="m-cell">Med Days</th>
                           <th class="m-cell">Co-pay</th>
                           <th>Fee</th>
                           <th>Pay</th>
                           <th class="m-cell">EXTRA_MED</th>
                           <th class="m-cell">LAB_XRAY</th>
                           <th class="m-cell">SURGICAL</th>
                           <th class="big-cell">Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_agreed_fee">
                     <?php if ( count($ACTIVE_FEES)!=0){
                      foreach($ACTIVE_FEES as $ACTIVE_FEE){ ?>
                        <tr>
                           <td class="big-cell"><?= _ent($ACTIVE_FEE->CLASS_CODE); ?></td>
                           <td><?= _ent($ACTIVE_FEE->TYPE); ?></td> 
                           <td  class="m-cell"><?= _ent($ACTIVE_FEE->MED_DAYS); ?></td> 
                           <td class="m-cell"><?= _ent($ACTIVE_FEE->CO_PAY); ?></td> 
                           <td><?= _ent($ACTIVE_FEE->FEE); ?></td> 
                           <td><?= _ent($ACTIVE_FEE->PAY); ?></td> 
                           <td class="m-cell"><?php if ($ACTIVE_FEE->EXTRA_MED_BOL==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }?></td> 
                           <td class="m-cell"><?php if ($ACTIVE_FEE->LAB_XRAY_BOL==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }?></td> 
                          <td class="m-cell"><?php if ($ACTIVE_FEE->SURGICAL_BOL==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }?></td> 
                            
                            <td class="big-cell"> <a target="_blank" href="<?= site_url('administrator/agreed_fee/view/' . $ACTIVE_FEE->AUTO_NO); ?>" class="label-default"><i class="fa fa-eye" ></i></a>
                           <a target="_blank" href="<?= site_url('administrator/agreed_fee/edit/' . $ACTIVE_FEE->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit " ></i></a>

                           </td>
                        </tr>
                      <?php } } ?>

                      <?php if (count($ACTIVE_FEES) == 0) :?>
                         <tr>
                           <td colspan="100">
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                </div>
         </div>
        <div id="contact">
          <?php 
             $i = 0;
             if ($card_contacts) {
                     foreach ($card_contacts as $card_contact){?>
                          <div class="col-sm-4">
                                     <div class="form-group ">
                            <label for="CONTACT_NO" class="col-sm-4">Contact No</label>
                            
                            <div class="col-sm-8 float" id="CONTACT_NO">
                              <?= _ent($card_contact->CONTACT_NO);?>
                              </div>
                        </div>
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-6 col-sm-4">English Name </label>
                            
                            <div class="col-sm-8 float" id="E_NAME"> 
                              <?= _ent($card_contact->E_NAME);?>
                              </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-4">Chinese Name </label> 
                            <div class="col-sm-8 float" id="C_NAME">
                                <?= _ent($card_contact->C_NAME);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TITLE" class="col-sm-4">Title </label>
                             <div class=" col-sm-8 float" id="TITLE">
                                <?= _ent($card_contact->TITLE);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPARTMENT" class="col-sm-4">Department </label> 
                            <div class="col-sm-8 float" id="DEPARTMENT">
                                <?= _ent($card_contact->DEPARTMENT);?>
                              </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TEL" class="col-sm-4">TEL </label> 
                            <div class="col-sm-8 float" id="TEL">
                               <?= _ent($card_contact->TEL);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FAX" class="col-sm-4">FAX </label> 
                            <div class="col-sm-8 float" id="FAX">
                                <?= _ent($card_contact->FAX);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-4">EMAIL </label>
                             <div class="col-sm-8 float" id="EMAIL">
                                <?= _ent($card_contact->EMAIL);?>
                            </div>
                        </div>
                   </div>
               <?php $i++ ;}}else{
                echo '<div class="col-sm-4 col-sm-offset-4 text-info">NO CONTACT INFOMATION</div>';
               }?>
           </div>
         
                 
            <div class="view-nav col-sm-12">
              <?php is_allowed('card_update', function($card) use ($card){?>
              <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit card (Ctrl+e)" href="<?= site_url('administrator/card/edit/'.$card->CARD_CODE); ?>"><i class="fa fa-edit" ></i> Edit Business Partner</a><?php }) ?>
              <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/card/'); ?>"><i class="fa fa-undo" ></i> Go Card List</a>
            </div> 
      </div>
            <!--/box body -->
      </div>
         <!--/box -->

      </div>
   </div>
   <script type="text/javascript">
       $('#fee').hide();
       $('#contact').hide();
  $(document).ready(function(){

        $('#tbody_card_class').on('dblclick','tr',function(){
              // var row = $(this);
              var CARD_CODE = $(this).children().first().text().trim();
              var CLASS_CODE = $(this).find("td:nth-child(2)").text().trim();

                 $.ajax({
                 url:BASE_URL + 'administrator/card/getAgreedfee/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CLASS_CODE_2':CLASS_CODE ,'CARD_CODE':CARD_CODE},
                 success: function(res){
       
                var agreed_fee = res.selectedFees;
                var fee_num;
                var content2="";
                if (agreed_fee.length>0) {
                  for(var i=0; i<agreed_fee.length; i++){
                  var str1 = (agreed_fee[i]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str3 = (agreed_fee[i]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str5 =  (agreed_fee[i]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      content2 = content2 + 
                      '<tr><td class="big-cell">'+
                        agreed_fee[i]['CLASS_CODE'] +'</td><td>' +
                        agreed_fee[i]['TYPE']+'</td><td class="m-cell">'+ 
                        agreed_fee[i]['MED_DAYS']+ '</td><td class="m-cell">' +
                        agreed_fee[i]['CO_PAY']+'</td><td>' +
                        agreed_fee[i]['FEE']+ '</td><td>'+ 
                        agreed_fee[i]['PAY']+'</td><td class="m-cell">'+
                       str1+'</td><td class="m-cell">'+
                       str3+'</td> <td class="m-cell">'+ 
                       str5+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/view/' + agreed_fee[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye" ></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + agreed_fee[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit " ></i></a></td></tr>';
                   }
                  fee_num= agreed_fee.length
                 }
              else{
                  content2 ='<tr><td class="big-cell">no result</td><tr>';
                  fee_num = 0;
                }
                 $('#tbody_agreed_fee').html(content2);
                $('#fee_no').html(fee_num);

               }
               
              });// end of ajax on double click card 

        });
      
  $('#search_card').on('click',function(){
              var CARD_CODE = $('#CARD_CODE').text().trim();
              var CLASS_CODE_input = $('#CLASS_CODE').val();
              var status = $('#Status').val();

              $('#CLASS_CODE_2').val(CLASS_CODE_input);

              $.ajax({
                  url:BASE_URL+'administrator/card/getCard/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'CARD_CODE':CARD_CODE,'CLASS_CODE':CLASS_CODE_input,'status':status},
                  success: function(res){

                   var filtered_cards = res.filtered_cards;
                   var result_fee = res.result_fee;

                   var size = res.size;
                   var content="";
                  if (filtered_cards!=undefined) {

                      var card_num = filtered_cards.length;

                      for(var i=0; i<filtered_cards.length; i++){

                      content = content + 
                      '<tr><td>'+
                        filtered_cards[i]['CARD_CODE']+'</td><td>' +
                        filtered_cards[i]['CLASS_CODE'] +'</td><td class="big-cell">' +
                        filtered_cards[i]['CLASS_DESC'] + '</td><td>'+
                        filtered_cards[i]['TERM_DATE']+'</td><td>'+ 
                        filtered_cards[i]['STATUS']+'</td><td class="big-cell">'+
                        filtered_cards[i]['REMARK']+'</td><td class="sbig-cell">'+
                        '<a href="'+ BASE_URL+'administrator/card_class/view/' + filtered_cards[i]["CARD_CODE"]+'/' + filtered_cards[i]["CLASS_CODE"]+'" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="' +  BASE_URL + 'administrator/card_class/edit/' +filtered_cards[i]["CARD_CODE"]+'/'+ filtered_cards[i]["CLASS_CODE"] +'" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="' + BASE_URL + 'administrator/agreed_fee/add_2/' + filtered_cards[i]["CARD_CODE"] + '/' +filtered_cards[i]["CLASS_CODE"]+ '" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a></td></tr>';
                      }
                

                   var contentFEE = '';
                   if (result_fee.length>0 || result_fee==undefined) {
                      
                      var fee_num = result_fee.length;

                      for(var j=0; j<result_fee.length; j++){

                      var s1 = (result_fee[j]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var s3 = (result_fee[j]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var s5 =  (result_fee[j]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      contentFEE = contentFEE + 
                      '<tr><td lass="big-cell">'+
                        result_fee[j]['CLASS_CODE'] +'</td><td>' +
                        result_fee[j]['TYPE']+'</td><td class="m-cell">'+ 
                        result_fee[j]['MED_DAYS']+ '</td><td class="m-cell">' +
                        result_fee[j]['CO_PAY']+'</td><td>' +
                        result_fee[j]['FEE']+ '</td><td>'+ 
                        result_fee[j]['PAY']+'</td><td class="m-cell">'+
                        s1+'</td><td class="m-cell">'+
                        s3+'</td> <td class="m-cell">'+ 
                        s5+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/view/' + result_fee[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye" ></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + result_fee[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit"></i></a></td></tr>';
                       }
                    }   
                    else{
                    contentFEE = '<tr><td class="big-cell">no result</td><tr>';
                    }
                  }
                else{
                    card_num =0;
                    fee_num = 0;
                    content = '<tr><td>no result</td><tr>';
                    contentFEE = '<tr><td class="big-cell">no result</td><tr>';

                  }
               $('#tbody_card_class').html(content);
               $('#tbody_agreed_fee').html(contentFEE);
               $('#card_no').html(card_num);
               $('#fee_no').html(fee_num);

               if (status!='') {
                   $('#Card_status').html(status);
                   $('#Fee_status').html(status);
               }else{
                   $('#Card_status').html("All");
                   $('#Fee_status').html("All")
               }
            
                }
           
              });

          });

  $('#search_fee').on('click',function(){
                 var CARD_CODE = $('#CARD_CODE').text().trim();
                 var CLASS_CODE_2 = $('#CLASS_CODE_2').val();
                 var m_type = $('#m_type').val();
                 // var med_days =$('#m_med_days').val();
    
                 $.ajax({
                 url:BASE_URL + 'administrator/card/getAgreedfee/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CLASS_CODE_2':CLASS_CODE_2 ,'m_type':m_type,'CARD_CODE':CARD_CODE},
                 success: function(res){
       
                var agreed_fee = res.selectedFees;
                var content2="";
                if (agreed_fee.length>0) {

                  var fee_num = agreed_fee.length;
                for(var i=0; i< fee_num; i++){
                  
                  var str1 = (agreed_fee[i]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str3 = (agreed_fee[i]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str5 =  (agreed_fee[i]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      content2 = content2 + 
                      '<tr><td class="big-cell">'+
                        agreed_fee[i]['CLASS_CODE'] +'</td><td>' +
                        agreed_fee[i]['TYPE']+'</td><td class="m-cell">'+ 
                        agreed_fee[i]['MED_DAYS']+ '</td><td class="m-cell">' +
                        agreed_fee[i]['CO_PAY']+'</td><td>' +
                        agreed_fee[i]['FEE']+ '</td><td>'+ 
                        agreed_fee[i]['PAY']+'</td><td class="m-cell">'+
                       str1+'</td><td class="m-cell">'+
                       str3+'</td> <td class="m-cell">'+ 
                       str5+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/view/' + agreed_fee[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye" ></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + agreed_fee[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit " ></i></a></td></tr>';
                   }
               }
              else{
                  content2 ='<tr><td class="big-cell">no result</td><tr>';
                }
                 $('#tbody_agreed_fee').html(content2);
                 $('#fee_no').html(fee_num);
               }
               
              });// end of ajax on select filter1 
            });

   $('#reset_card').on('click',function(){
              var CARD_CODE = $('#CARD_CODE').text().trim();
              var CLASS_CODE_input = $('#CLASS_CODE').val("");
              var status = $('#Status').val("");

              $('#CLASS_CODE_2').val("");
              $('#m_type').val("");

                $.ajax({ 
                  url:BASE_URL+'administrator/card/getCard_reset/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'CARD_CODE':CARD_CODE},
                  success: function(res){
                   var cards = res.cards;
                   var size = res.size;
                   var content="";
      
              if (cards!=undefined&&cards.length>0) {
                  
                   var card_num = cards.length;

                  for(var i=0; i<cards.length; i++){
                   // var str = (cards[i]['EXTEND_CONTRACT']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>'; 
                      content = content + 
                      '<tr><td>'+
                        cards[i]['CARD_CODE']+'</td><td>' +
                        cards[i]['CLASS_CODE'] +'</td><td class="big-cell">' +
                        cards[i]['CLASS_DESC'] + '</td><td>'+
                        cards[i]['TERM_DATE']+'</td><td>'+ 
                        cards[i]['STATUS']+'</td><td class="big-cell">'+
                        cards[i]['REMARK']+'</td> <td class="sbig-cell"><a href="'+ BASE_URL+'administrator/card_class/view/' + cards[i]['CARD_CODE']+'/' + cards[i]['CLASS_CODE']+'" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="' +  BASE_URL + 'administrator/card_class/edit/' + cards[i]['CARD_CODE']+'/'+ cards[i]['CLASS_CODE'] +'" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="' + BASE_URL + 'administrator/agreed_fee/add_2/' + cards[i]['CARD_CODE'] + '/' +cards[i]['CLASS_CODE']+ '" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a></td></tr>';
                    }
                  }
                   else{
                        card_num = 0;
                        content = '<tr><td>no result</td><tr>';
                   }

                  var fees = res.fees;
                  var contentHTML = '';
  
                if (fees!=undefined&&fees.length>0) {
                      var fee_num = fees.length;
                      for(var j=0; j<fees.length; j++){
                      var str1 = (fees[j]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var str3 = (fees[j]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var str5 =  (fees[j]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                          contentHTML = contentHTML + 
                          '<tr><td class="big-cell">'+
                            fees[j]['CLASS_CODE'] +'</td><td>' +
                            fees[j]['TYPE']+'</td><td class="m-cell">'+ 
                            fees[j]['MED_DAYS']+ '</td><td class="m-cell">' +
                            fees[j]['CO_PAY']+'</td><td>' +
                            fees[j]['FEE']+ '</td><td>'+ 
                            fees[j]['PAY']+'</td><td class="m-cell">'+
                            str1+'</td><td class="m-cell">'+
                            str3+'</td> <td class="m-cell">'+ 
                            str5+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL + 'administrator/agreed_fee/view/' + fees[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye"></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + fees[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit " ></i></a></td></tr>';
                          }
                      }
                      else{
                        contentHTML = '<tr><td class="big-cell">no result</td><tr>';
                        fee_num = 0;

                      }
                     $('#tbody_card_class').html(content);
                     $('#tbody_agreed_fee').html(contentHTML);
                     $('#Card_status').html("All ");
                     $('#Fee_status').html("All ")
                     $('#card_no').html(card_num);
                     $('#fee_no').html(fee_num);

                   } 

              });

          });

$('#CLASS_CODE_2,#CLASS_CODE,#Status,#m_type').on('dblclick',function(){
  $(this).val("");
})


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
</section>
<!-- /.content -->
