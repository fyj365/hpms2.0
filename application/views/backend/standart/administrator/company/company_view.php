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
  #Partner_doctors th,#Partner_doctors td{
    float: left;
    height: 35px;
    width: 14%;
  }
 .addButton{
    float: right;
    margin-top:15px;
    margin-bottom: 5px;
  }
  #partner_company.clear{
    clear: both;
  }
  #agreed_fee.clear{
    clear:both;
  }
 #partner_company .addButton{
    margin-top: 0;
    margin-left: 5px;
  }
  .search_field{
  float: right;
 }
#partner_company .search_field{
  margin-top: 15px;
}
  #partner_company table{
    width: 100%;
  }
  #partner_company thead,#partner_company tbody, #partner_company tr,#partner_company td{
      display: block;

  }
  #partner_company thead tr{
    width: 99%;

  }
  #partner_company tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #partner_company tbody{
    max-height: 500px;
    overflow-y: auto;
    overflow-x: auto;
  }
  #partner_company th,#partner_company td{
    float: left;
     height: 35px;
    width: 12%;
  }
   #partner_company .big-cell{
    width: 16%;

  }
  #partner_company .sbig-cell{
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
  #tbody_partner_company tr:hover{
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
    COMPANY <small><?= _ent($company->COM_ID); ?> Detail </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/company'); ?>"></a></li>
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
              <a class="nav-link" id="home_tab" data-toggle="tab">Company Information</a>
            </li>
<!--             <li class="nav-item">
              <a class="nav-link" id="fee_tab" data-toggle="tab" >Agreed Fee</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" id="contact_tab" data-toggle="tab">Contact Information</a>
            </li>
          </ul>
                  
          <div id="home">
             <div class="form-horizontal" name="form_company" id="form_company" >
                   <div id="company" class="col-sm-5">
                    <h3> <?= _ent($company->E_NAME); ?>' BASIC INFO</h3>
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Company ID </label>

                        <div class="col-sm-7" id="company_CODE">
                           <?= _ent($company->COM_ID); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">English Name </label>

                        <div class="col-sm-7">
                           <?= _ent($company->E_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Chinese Name </label>

                        <div class="col-sm-7">
                           <?= _ent($company->C_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Join Date</label>

                        <div class="col-sm-7">
                           <?= _ent($company->JOIN_DATE); ?>
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
                          <?php echo ($company->E_ADDR1) .', '. $company->E_ADDR2 .', '. $company->E_ADDR3 .', '.$company->E_ADDR4 . ', '.$company->E_ADDR5 .', '. $company->E_DISTRICT; ?>
                        </div>
                    </div>
                                        
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Chinese Address</label>

                        <div class="col-sm-7">
                          <?php echo ($company->C_ADDR1) .', '.  $company->C_ADDR2 .', '. $company->C_ADDR3 .', '.$company->C_ADDR4 . ', '.$company->C_ADDR5 .', '. $company->C_DISTRICT; ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">BILLING DEPT NAME </label>

                        <div class="col-sm-7">
                           <?= _ent($company->BILLING_DEPT_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">SURGICAL RATING </label>

                        <div class="col-sm-7">
                           <?= _ent($company->SURGICAL_RATING); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">DIAG CODE STANDARD </label>

                        <div class="col-sm-7">
                           <?= _ent($company->DIAG_CODE_STANDARD); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">CREATOR </label>

                        <div class="col-sm-7">
                           <?= _ent($company->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">CREATE DATE </label>

                        <div class="col-sm-7">
                           <?= _ent($company->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">LAST MODIFIER </label>

                        <div class="col-sm-7">
                           <?= _ent($company->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">LAST UPDATE </label>

                        <div class="col-sm-7">
                           <?= _ent($company->LAST_UPDATE); ?>
                        </div>
                    </div>
                  </div> <!--end of company infor-->                 
  
                  </div>
            </div> 
            <!--home tab-->
        <div class="" id="fee">

            <div id="partner_company" class="clear">
 
              <h3 style="width:auto;display: inline-block;padding-right: 10px;"><span id="company_status">Active </span> companys</h3><div style="display: inline-block;"><span id="company_no" class="label bg-yellow"><?php echo $Active_companys_num; ?></span></div>
 
                  
                   <div class="search_field">
                    <label>company Type</label>
                    <input type="text" name="" list="CLASS_CODE_list" value="" id="CLASS_CODE">
                    <datalist id="CLASS_CODE_list">
                      <?php if ($CLASS_CODEs_num>0) { 
                        foreach ($CLASS_CODEs as $CLASS_CODE) {?>
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
                    <button type="button" class="btn btn-default" id="search_company"><i class="glyphicon glyphicon-search"></i></button>
                    <button type="button" class="btn btn-default" id="reset_company"><i class="fa fa-repeat"></i></button>
                     <a target="_blank" type="button" class="btn btn-primary addButton" href="<?= site_url('administrator/partner_company/add_1/'.$company->company_CODE) ;?>" >ADD company</a> 
                   </div>

    

                  <div class=""> 

               <table class="table table-bordered table-striped dataTable">
                 
                     <thead>
                        <tr class="">
                          <th>Partner Code</th>
                           <th>company TYPE</th>
                           <th class="big-cell">company Name</th>
                           <th>Term Date</th>
                           <th>Status</th>
<!--                            <th>Extend Contract</th>
 -->                           <th class="big-cell">Remark</th>
                           <th class="sbig-cell">Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_company">
                     <?php 
                     if($Active_companys_num!=0){
                        foreach($Active_BP_companys as $Active_BP_company){ ?>
                        <tr>
                           <td class="p_code"><?= _ent($Active_BP_company->company_CODE); ?></td>
                           <td class="c_type"><?= _ent($Active_BP_company->CLASS_CODE); ?></td>
                           <td class="big-cell"><?= _ent($Active_BP_company->CLASS_DESC); ?></td>
                           <td><?= _ent($Active_BP_company->TERM_DATE); ?></td> 
                           <td><?= _ent($Active_BP_company->STATUS); ?></td> 
                     
                           <td class="big-cell"><?= _ent($Active_BP_company->REMARK); ?></td> 
                           <td class="sbig-cell"> <a href="<?= site_url('administrator/partner_company/view/' . $Active_BP_company->company_CODE.'/'.$Active_BP_company->CLASS_CODE); ?>" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="<?= site_url('administrator/partner_company/edit/' .$Active_BP_company->company_CODE.'/'.$Active_BP_company->CLASS_CODE); ?>" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="<?= site_url('administrator/agreed_fee/add_2/' .$Active_BP_company->company_CODE.'/'.$Active_BP_company->CLASS_CODE ); ?>" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a>  </td>
                        </tr>
                      <?php }} ?>
                      <?php if ($Active_companys_num == 0) :?>
                         <tr>
                           <td class="big-cell">
                           </td>
                         </tr>
                      <?php endif; ?> 
                     </tbody>
                  </table>

        
                 </div>
            
            </div><!--end partner contract view-->

        <div id="contact">
          <?php 
             $i = 0;
             if ($company_contacts) {
                     foreach ($company_contacts as $company_contact){?>
                          <div class="col-sm-4">
                                     <div class="form-group ">
                            <label for="CONTACT_NO" class="col-sm-4">Contact No</label>
                            
                            <div class="col-sm-8 float" id="CONTACT_NO">
                              <?= _ent($company_contact->CONTACT_NO);?>
                              </div>
                        </div>
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-6 col-sm-4">English Name </label>
                            
                            <div class="col-sm-8 float" id="E_NAME"> 
                              <?= _ent($company_contact->E_NAME);?>
                              </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-4">Chinese Name </label> 
                            <div class="col-sm-8 float" id="C_NAME">
                                <?= _ent($company_contact->C_NAME);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TITLE" class="col-sm-4">Title </label>
                             <div class=" col-sm-8 float" id="TITLE">
                                <?= _ent($company_contact->TITLE);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPARTMENT" class="col-sm-4">Department </label> 
                            <div class="col-sm-8 float" id="DEPARTMENT">
                                <?= _ent($company_contact->DEPARTMENT);?>
                              </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TEL" class="col-sm-4">TEL </label> 
                            <div class="col-sm-8 float" id="TEL">
                               <?= _ent($company_contact->TEL);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FAX" class="col-sm-4">FAX </label> 
                            <div class="col-sm-8 float" id="FAX">
                                <?= _ent($company_contact->FAX);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-4">EMAIL </label>
                             <div class="col-sm-8 float" id="EMAIL">
                                <?= _ent($company_contact->EMAIL);?>
                            </div>
                        </div>
                   </div>
               <?php $i++ ;}}else{
                echo '<div class="col-sm-4 col-sm-offset-4 text-info">NO CONTACT INFOMATION</div>';
               }?>
           </div>
         
                 
            <div class="view-nav col-sm-12">
              <?php is_allowed('company_update', function($company) use ($company){?>
              <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit company (Ctrl+e)" href="<?= site_url('administrator/company/edit/'.$company->COM_ID); ?>"><i class="fa fa-edit" ></i> Edit Company</a><?php }) ?>
              <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/company/'); ?>"><i class="fa fa-undo" ></i> Go Business Partner List</a>
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

        $('#tbody_partner_company').on('dblclick','tr',function(){
              // var row = $(this);
              var company_CODE = $(this).children().first().text().trim();
              var CLASS_CODE = $(this).find("td:nth-child(2)").text().trim();

                 $.ajax({
                 url:BASE_URL + 'administrator/company/getAgreedfee/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CLASS_CODE_2':CLASS_CODE ,'company_CODE':company_CODE},
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
                      '<tr><td>'+
                        agreed_fee[i]['AUTO_NO']+ '</td><td class="big-cell">' +
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
               
              });// end of ajax on double click company 

        });
      
  $('#search_company').on('click',function(){
              var company_CODE = $('#company_CODE').text().trim();
              var CLASS_CODE_input = $('#CLASS_CODE').val();
              var status = $('#Status').val();

              $('#CLASS_CODE_2').val(CLASS_CODE_input);

              $.ajax({
                  url:BASE_URL+'administrator/company/getcompany/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'company_CODE':company_CODE,'CLASS_CODE':CLASS_CODE_input,'status':status},
                  success: function(res){

                   var filtered_companys = res.filtered_companys;
                   var result_fee = res.result_fee;

                   var size = res.size;
                   var content="";
                  if (filtered_companys!=undefined) {

                      var company_num = filtered_companys.length;

                      for(var i=0; i<filtered_companys.length; i++){

                      content = content + 
                      '<tr><td>'+
                        filtered_companys[i]['company_CODE']+'</td><td>' +
                        filtered_companys[i]['CLASS_CODE'] +'</td><td class="big-cell">' +
                        filtered_companys[i]['CLASS_DESC'] + '</td><td>'+
                        filtered_companys[i]['TERM_DATE']+'</td><td>'+ 
                        filtered_companys[i]['STATUS']+'</td><td class="big-cell">'+
                        filtered_companys[i]['REMARK']+'</td><td class="sbig-cell">'+
                        '<a href="'+ BASE_URL+'administrator/partner_company/view/' + filtered_companys[i]["company_CODE"]+'/' + filtered_companys[i]["CLASS_CODE"]+'" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="' +  BASE_URL + 'administrator/partner_company/edit/' +filtered_companys[i]["company_CODE"]+'/'+ filtered_companys[i]["CLASS_CODE"] +'" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="' + BASE_URL + 'administrator/agreed_fee/add_2/' + filtered_companys[i]["company_CODE"] + '/' +filtered_companys[i]["CLASS_CODE"]+ '" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a></td></tr>';
                      }
                

                   var contentFEE = '';
                   if (result_fee.length>0 || result_fee==undefined) {
                      
                      var fee_num = result_fee.length;

                      for(var j=0; j<result_fee.length; j++){

                      var s1 = (result_fee[j]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var s3 = (result_fee[j]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var s5 =  (result_fee[j]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      contentFEE = contentFEE + 
                      '<tr><td>'+
                        result_fee[j]['AUTO_NO']+ '</td><td class="big-cell">' +
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
                    company_num =0;
                    fee_num = 0;
                    content = '<tr><td>no result</td><tr>';
                    contentFEE = '<tr><td class="big-cell">no result</td><tr>';

                  }
               $('#tbody_partner_company').html(content);
               $('#tbody_agreed_fee').html(contentFEE);
               $('#company_no').html(company_num);
               $('#fee_no').html(fee_num);

               if (status!='') {
                   $('#company_status').html(status);
                   $('#Fee_status').html(status);
               }else{
                   $('#company_status').html("All");
                   $('#Fee_status').html("All")
               }
            
                }
           
              });

          });

  $('#search_fee').on('click',function(){
                 var company_CODE = $('#company_CODE').text().trim();
                 var CLASS_CODE_2 = $('#CLASS_CODE_2').val();
                 var m_type = $('#m_type').val();
                 // var med_days =$('#m_med_days').val();
    
                 $.ajax({
                 url:BASE_URL + 'administrator/company/getAgreedfee/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'CLASS_CODE_2':CLASS_CODE_2 ,'m_type':m_type,'company_CODE':company_CODE},
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
                      '<tr><td>'+
                        agreed_fee[i]['AUTO_NO']+ '</td><td class="big-cell">' +
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

   $('#reset_company').on('click',function(){
              var company_CODE = $('#company_CODE').text().trim();
              var CLASS_CODE_input = $('#CLASS_CODE').val("");
              var status = $('#Status').val("");

              $('#CLASS_CODE_2').val("");
              $('#m_type').val("");
                $.ajax({ 
                  url:BASE_URL+'administrator/company/getcompany_reset/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'company_CODE':company_CODE},
                  success: function(res){
                   var companys = res.companys;
                   var size = res.size;
                   var content="";
              if (companys!=undefined&&companys.length>0) {
                   var company_num = companys.length;

                  for(var i=0; i<companys.length; i++){
                   // var str = (companys[i]['EXTEND_CONTRACT']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>'; 
                      content = content + 
                      '<tr><td>'+
                        companys[i]['company_CODE']+'</td><td>' +
                        companys[i]['CLASS_CODE'] +'</td><td class="big-cell">' +
                        companys[i]['CLASS_DESC'] + '</td><td>'+
                        companys[i]['TERM_DATE']+'</td><td>'+ 
                        companys[i]['STATUS']+'</td><td class="big-cell">'+
                        companys[i]['REMARK']+'</td> <td class="sbig-cell"><a href="'+ BASE_URL+'administrator/partner_company/view/' + companys[i]['company_CODE']+'/' + companys[i]['CLASS_CODE']+'" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="' +  BASE_URL + 'administrator/partner_company/edit/' + companys[i]['company_CODE']+'/'+ companys[i]['CLASS_CODE'] +'" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="' + BASE_URL + 'administrator/agreed_fee/add_2/' + companys[i]['company_CODE'] + '/' +companys[i]['CLASS_CODE']+ '" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a></td></tr>';
                  }
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
                      '<tr><td>'+
                        fees[j]['AUTO_NO']+ '</td><td class="big-cell">' +
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
                    content = '<tr><td>no result</td><tr>';
                    contentHTML = '<tr><td class="big-cell">no result</td><tr>';
                    company_num = 0;
                    fee_num = 0;


                  }
                 $('#tbody_partner_company').html(content);
                 $('#tbody_agreed_fee').html(contentHTML);
                 $('#company_status').html("All ");
                 $('#Fee_status').html("All ")
                 $('#company_no').html(company_num);
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
