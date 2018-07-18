
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Open Voucher Line<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Open Voucher Line</li>
   </ol>
</section>
<style type="text/css">

  .row{
    margin: 0;
  }
  .Multiple_F {
    width: 100px;
  }
  th {
    width: 100px;
  }
  tr>th{
    width: 30px;
  }

.table-responsive tr th:nth-child(2){
    width: 150px;
  }
  .table-responsive tr th:nth-child(4){
    width: 100px;

  }
.table-responsive tr th:nth-child(3),.table-responsive tr th:nth-child(6),.table-responsive tr th:nth-child(7),.table-responsive tr th:nth-child(8){
  width: 100px;
}{
  width: 100px;
}
.table-responsive tr th:nth-child(11){
  width: 150px;
}
  .Multiple_F th input{
    width: 100px;
  }
  #sbtn{
    width: 100px;
  }
  .not-show{
    display: none;
  }
</style>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                      <div class="row pull-right">
                        <?php is_allowed('voucher_line_add', function(){?>
                        <a class="btn btn-flat btn-success" id="btn_reg_new" title="Registration Voucher" href="<?=  site_url('administrator/voucher_line_tmp/add_register'); ?>"><i class="fa fa-plus-square-o" ></i> Registration Voucher</a>
                        <?php }) ?>
                    </div>
          
                     <!-- /.widget-user-image -->
                     <h4>Total:  <i class="label bg-yellow" id="voucher_line_NO"><?= $voucher_line_tems_counts; ?>  items</i></h4>
                
                  </div>
                     
                  <form name="form_voucher_line_tem" id="form_voucher_line_tem" action="<?= base_url('administrator/voucher_line_tmp/index/'); ?>">
                          <div class="row">
                    <div class="col-sm-10">
                        <button id="Multiple_Filter" type="button" class="btn btn-default Multiple_F">Filter</button>
                         <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/voucher_line_tmp/index');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                  </div>
                         <div class="pagination_link dataTables_paginate paging_simple_numbers pull-right">
                         <?= $pagination; ?>
                       </div>               
                </div>
<!--                     <div class="S-filter col-sm-6 padding-left-0">
              
                     <div class=" col-sm-4 padding-left-0" >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                          <option value="">All</option>
                          <option <?= $this->input->get('f') == 'BATCH_NO' ? 'selected' :''; ?> value="BATCH_NO">BATCH NO</option>
                          <option <?= $this->input->get('f') == 'VOUCHER_NO' ? 'selected' :''; ?> value="VOUCHER_NO">VOUCHER NO</option>
                          <option <?= $this->input->get('f') == 'CLASS_CODE' ? 'selected' :''; ?> value="CLASS_CODE">CARD TYPE</option>
                           <option <?= $this->input->get('f') == 'BATCH_DATE' ? 'selected' :''; ?> value="RECEIVE_DATE">RECEIVE DATE</option>
                           <option <?= $this->input->get('f') == 'CARD_CODE' ? 'selected' :''; ?> value="CARD_CODE">PARTNER CODE</option>
                           <option <?= $this->input->get('f') == 'TREATMENT_DATE' ? 'selected' :''; ?> value="TREATMENT_DATE">TREATMENT DATE</option>
                           <option <?= $this->input->get('f') == 'DR_CODE' ? 'selected' :''; ?> value="DR_CODE">DR CODE</option>
                           <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
                           <option <?= $this->input->get('f') == 'CREATOR' ? 'selected' :''; ?> value="CREATOR">CREATOR</option>
                           <option <?= $this->input->get('f') == 'CREATE_DATE' ? 'selected' :''; ?> value="CREATE_DATE">CREATE_DATE</option>
                          </select>
                     </div>
                    
                     <div class="col-sm-5" >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3">
                     <button type="submit" class="btn btn-default col-sm-8" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div> 
                
                  </div> -->

      


<!--               
                   <div class="col-sm-3 not-show" >
                        <div class="col-sm-6">
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                      </div>
                        <div class="col-sm-3">
                        <button type="button" class="btn btn-default" name="apply" id="apply" title="apply bulk actions">Apply</button>
                        </div>
                     </div> -->
           
      
         <!--        <div class="col-sm-2" style="float: right;">
                     <button id="More_Filter" type="button" class="btn btn-default">More Filter</button>

                </div> -->

                  <div class="table-responsive row"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>BATCH NO</th>
                           <th>VOUCHER NO</th>
                           <th>COMPANY ID</th>
                           <th>CARD TYPE</th>
                           <th>CLASS</th>
                           <th>DR CODE</th>
                           <th>TREATMENT DATE</th>
                           <th>RECEIVE DATE</th>
                           <th>STATUS</th>
                           <th>CREATOR</th>
                           <th>CREATE DATE</th>
                           <th>Action</th>
                        </tr>
                        <tr class="Multiple_F">
                           <th><input type="text"  name="BATCH_NO"></th>
                            <th><input type="text" name="VOUCHER_NO"></th>
                           <th><input type="text" name="COM_ID"></th>
                           <th><input type="text" name="CARD_CODE"></th>
                           <th><input type="text" name="CLASS_CODE"></th>
                            <th><input type="text" name="PARTNER_DR_CODE"></th>
                           <th><input type="text" name="TREATMENT_DATE"></th>
                           <th><input type="text"  name="RECEIVE_DATE"></th>
                           <th><input type="text" name="STATUS"></th>
                           <th><input type="text"  name="CREATOR"></th>
                           <th><input type="text"  name="CREATE_DATE"></th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line_tem">
                           <?= $voucher_line_tems; ?>
                    </tbody>
                  </table>
                  </div> 
                  <div id="pagination">
                        <?= $pagination; ?>

                  </div>

               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                 
                  </form>                  
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

    $('body').keypress(function(e){
  
     if (e.which == 13 || e.keyCode ==13)  {
      $('#Multiple_Filter').click();
    }

   });

    // $('.Multiple_F').hide();
    
    // $('#More_Filter').on('click',function(){
    //     $('.S-filter').toggle();
    //     $('.Multiple_F').toggle();
    //     if ( $(this).text()=='Simple Filter') {
    //         $(this).text('More Filter');
    //     }else{
    //         $(this).text('Simple Filter');
    //     }
    //  });
   // remove registered voucher from the list page
    $('.remove-data').click(function(){

      var BATCH_NO =  $(this).parent().siblings('.bt_no').text();
      var voucher_no = $(this).parent().siblings('.voucher_no').text();

      swal({
          title: "Are you sure?",
          text: "data to be deleted can not be restored!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
      if (isConfirm) {
          $.ajax({
          type: "GET",
          url: BASE_URL + '/administrator/voucher_line_tmp/remove_temp/',
          data: {'BATCH_NO':BATCH_NO,'voucher_no':voucher_no},
          dataType: "JSON",
          success: function(data) {
            
            location.reload();
          },

          error:function(jqXHR,exception){
            alert(jqXHR.status);
               
               if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
          }
        });
        }
        });

      return false;
    });

   // When click bulk
    // $('#apply').click(function(){

    //   var bulk = $('#bulk');
    //   // var serialize_bulk = $('#form_voucher_line_tem').serialize();
    //   // var serialize_bulk = $('input.check').serialize();
    //   var checkboxes = $('input.check');
    //   var selected = [];
    //   var checkedValue = checkboxes.filter(':checked').each(function(){
    //     selected.push($(this).val());
    //   });
    //   // var checkedValue = $('.check_ID:checked').val();
    //   if (bulk.val() == 'delete') {
    //      swal({
    //         title: "Are you sure?",
    //         text: "data to be deleted can not be restored!",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes, delete it!",
    //         cancelButtonText: "No, cancel plx!",
    //         closeOnConfirm: true,
    //         closeOnCancel: true
    //       },
    //       function(isConfirm){
    //         if (isConfirm) {
    //                 $.ajax({
    //                 type: "GET",
    //                 url: BASE_URL + '/administrator/voucher_line_tmp/deleteByVouchAndBatch/',
    //                 data: {'SELECTED':selected},
    //                 dataType: "JSON",
    //                 success: function(data) {
    //                   location.reload();
    //                 },
    //                 done: function(){
    //                   location.reload();
    //                  }
    //                 });
    //             location.reload();
   
    //         }
    //       });

    //     return false;

    //   } else if(bulk.val() == '')  {
    //       swal({
    //         title: "Upss",
    //         text: "Please choose bulk action first!",
    //         type: "warning",
    //         showCancelButton: false,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Okay!",
    //         closeOnConfirm: true,
    //         closeOnCancel: true
    //       });

    //     return false;
    //   }

    //   return false;

    // });/*end appliy click*/

     //  multiple filter
    $('#Multiple_Filter').on('click',function(){
           var data = $('#form_voucher_line_tem').serialize();
           $.ajax({
                    type: "GET",
                    url: BASE_URL + '/administrator/voucher_line_tmp/Mypagination/' + 1 ,
                    data:{'data':data},
                    dataType: "JSON",
                    success: function(data) { 
                      var voucher_line_tem = data.voucher_data
                      var voucher_line_NO =  data.voucher_line_counts;
                      var pagination = data.pagination_link;
                      $('#tbody_voucher_line_tem').html(voucher_line_tem);
                      $('#voucher_line_NO').html(voucher_line_NO);
                      $('#pagination').html('<center>' + pagination +'</center>');

                      var checkAll = $('#check_all');
                      var checkboxes = $('input.check');

                      checkAll.on('ifChecked ifUnchecked', function(event) {   
                          if (event.type == 'ifChecked') {
                              checkboxes.iCheck('check');
                          } else {
                              checkboxes.iCheck('uncheck');
                          }
                      });

                      checkboxes.on('ifChanged', function(event){
                          if(checkboxes.filter(':checked').length == checkboxes.length) {
                              checkAll.prop('checked', 'checked');
                          } else {
                              checkAll.removeAttr('checked');
                          }
                          checkAll.iCheck('update');
                      });

                       $('.remove-data').click(function(){

                          var BATCH_NO =  $(this).parent().siblings('.bt_no').text();
                          var voucher_no = $(this).parent().siblings('.voucher_no').text();

                          swal({
                              title: "Are you sure?",
                              text: "data to be deleted can not be restored!",
                              type: "warning",
                              showCancelButton: true,
                              confirmButtonColor: "#DD6B55",
                              confirmButtonText: "Yes, delete it!",
                              cancelButtonText: "No, cancel plx!",
                              closeOnConfirm: true,
                              closeOnCancel: true
                            },
                            function(isConfirm){
                          if (isConfirm) {
                              $.ajax({
                              type: "GET",
                              url: BASE_URL + '/administrator/voucher_line_tmp/remove_temp/',
                              data: {'BATCH_NO':BATCH_NO,'voucher_no':voucher_no},
                              dataType: "JSON",
                              success: function(data) {
                                
                                location.reload();
                              },

                              error:function(jqXHR,exception){
                                alert(jqXHR.status);
                                   
                                   if (jqXHR.status === 0) {
                                        msg = 'Not connect.\n Verify Network.';
                                    } else if (jqXHR.status == 404) {
                                        msg = 'Requested page not found. [404]';
                                    } else if (jqXHR.status == 500) {
                                        msg = 'Internal Server Error [500].';
                                    } else if (exception === 'parsererror') {
                                        msg = 'Requested JSON parse failed.';
                                    } else if (exception === 'timeout') {
                                        msg = 'Time out error.';
                                    } else if (exception === 'abort') {
                                        msg = 'Ajax request aborted.';
                                    } else {
                                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                    }
                                    alert(msg);
                              }
                            });
                            }
                            });

                          return false;
                        });

                    },
                    done: function(jqXHR){
                      alert(jqXHR.status);
                      // location.reload();
                     }
                   });
            
            // window.location.href =  BASE_URL + '/administrator/voucher_line_tmp/index_2/';

     });
    $(document).on('click',".pagination.Mypagination li a",function(){
          event.preventDefault();
          var page = $(this).data("ci-pagination-page");
          load_vouhcher_pagination(page);
    });

    function load_vouhcher_pagination(page){  // get each page of data using ajax

             var data = $('#form_voucher_line').serialize();
      
             $.ajax({
                        url: BASE_URL + '/administrator/voucher_line_tmp/Mypagination/'+ page,
                        dataType: "JSON",
                        data:{ 'data':data},
                        type: "GET",
                        success: function(data) {
                         var voucher_lines = data.voucher_data;
                         var voucher_line_NO = data.voucher_line_counts;
                         var pagination = data.pagination_link;
                        
                          $('#tbody_voucher_line_tem').html(voucher_lines);
                          $('#voucher_line_NO').html(voucher_line_NO);
                          $('#pagination').html('<center>'+ pagination +'</center>');

                              var checkAll = $('#check_all');
                              var checkboxes = $('input.check');

                              checkAll.on('ifChecked ifUnchecked', function(event) {   
                                  if (event.type == 'ifChecked') {
                                      checkboxes.iCheck('check');
                                  } else {
                                      checkboxes.iCheck('uncheck');
                                  }
                              });

                              checkboxes.on('ifChanged', function(event){
                                  if(checkboxes.filter(':checked').length == checkboxes.length) {
                                      checkAll.prop('checked', 'checked');
                                  } else {
                                      checkAll.removeAttr('checked');
                                  }
                                  checkAll.iCheck('update');
                              });
                        },
                        done: function(jqXHR){
                          alert(jqXHR.status);
                         }
                       });
    }

    //check all
    var checkAll = $('#check_all');

    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeAttr('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>