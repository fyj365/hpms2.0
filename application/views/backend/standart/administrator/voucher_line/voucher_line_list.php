
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Voucher Line<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Voucher Line</li>
   </ol>
</section>
<style type="text/css">
  .row{
    margin: 0;
  }
  .Multiple_F{
    width: 100px;
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
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_reg_new" title="Registration Voucher" href="<?=  site_url('administrator/voucher_line_tmp/add_register'); ?>"><i class="fa fa-plus-square-o" ></i> Registration Voucher</a>
                        <?php }) ?>
                        
                        <?php is_allowed('voucher_line_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Voucher Line" href="<?= site_url('administrator/voucher_line/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('voucher_line_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Voucher Line" href="<?= site_url('administrator/voucher_line/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
             
                     <!-- /.widget-user-image -->
                     <h4 >Total:  <i class="label bg-yellow" id="voucher_line_NO"><?= $voucher_line_counts; ?>  items</i></h4>
                     
                  </div>

                  <form name="form_voucher_line" id="form_voucher_line" action="<?= base_url('administrator/voucher_line/index_2'); ?>">

                    <div class="row">
                      <div class="col-sm-8">
                         <button  class="Multiple_F btn btn-default" id="Multiple_F" type="button">Filter</button>
                       <a  name="reset" class="btn btn-default" href="<?= base_url('administrator/voucher_line/index_2'); ?>"> <i class="fa fa-undo"></i></a>
                      </div>
                      <div class="pagination_link dataTables_paginate paging_simple_numbers pull-right">
                         <?= $pagination; ?>
                       </div>
                    </div>
              <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>BATCH NO</th>
                           <th>VOUCHER NO</th>
                           <th>COMPANY ID</th>
                           <th>CARD TYPE</th>
                           <th>CLASS</th>
                           <th>TREATMENT DATE</th>
                           <th>RECEIVE DATE</th>
                           <th>PARTNER DR CODE</th>
                           <th>DR E NAME</th>
                           <th>PATIENT NAME</th>
                           <th>TYPE</th>
                           <th>FEE AMT</th>
                           <th>PAY AMT</th>
                           <th>Action</th>
                        </tr>
                        <tr class="">
                           <th><input type="text"  class="Multiple_F" name="BATCH_NO"></th>
                            <th><input type="text" class="Multiple_F" name="VOUCHER_NO"></th>
                            <th><input type="text" class="Multiple_F" name="COM_ID"></th>
                           <th><input type="text" class="Multiple_F" name="CARD_CODE"></th>
                           <th><input type="text" class="Multiple_F" name="CLASS_CODE"></th>
                           <th><input type="text" class="Multiple_F" name="TREATMENT_DATE"></th>
                           <th><input type="text" class="Multiple_F" name="RECEIVE_DATE"></th>
                            <th><input type="text" class="Multiple_F" name="DR_CODE"></th>
                           <th><input type="text" class="Multiple_F" name="DR_E_NAME"></th>
                            <th><input type="text" class="Multiple_F" name="PATIENT_NAME"></th>
                            <th><input type="text" class="Multiple_F" name="TYPE"></th>
                            <th><input type="text" class="Multiple_F" name="FEE_AMT"></th>
                            <th><input type="text" class="Multiple_F" name="PAY_AMT"></th>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line">
                          <?= $voucher_lines; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                <div class="pagination_link col-sm-4 col-sm-offset-4">
                     <?= $pagination; ?>
                </div>
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
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

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
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_voucher_line').serialize();

      if (bulk.val() == 'delete') {
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
               document.location.href = BASE_URL + '/administrator/voucher_line/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "Please choose bulk action first!",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


$('body').keypress(function(e){
  
  if (e.which == 13 || e.keyCode ==13)  {
    $('#Multiple_F').click();
  }

});
 
 $('#Multiple_F').on('click',function(){  // get the first page of data
            var data = $('#form_voucher_line').serialize();

           $.ajax({
                    type: "GET",
                    url: BASE_URL + '/administrator/voucher_line/Mypagination/'+ 1,
                    data:{'data':data},
                    dataType: "JSON",
                    success: function(data) {
                     var voucher_lines = data.voucher_data;
                     var voucher_line_NO = data.voucher_line_counts;
                     var pagination = data.pagination_link;

                      $('#tbody_voucher_line').html(voucher_lines);
                      $('#voucher_line_NO').html(voucher_line_NO);
                      $('.pagination_link').html(pagination);

                    },
                    done: function(jqXHR){
                      alert(jqXHR.status);
                     }
                   });

});

$(document).on('click',".pagination li a",function(){
      event.preventDefault();
      var page = $(this).data("ci-pagination-page");
      load_vouhcher_pagination(page);
});

function load_vouhcher_pagination(page){  // get each page of data using ajax

         var data = $('#form_voucher_line').serialize();
  
         $.ajax({
                    url: BASE_URL + '/administrator/voucher_line/Mypagination/'+ page,
                    dataType: "JSON",
                    data:{'data':data},
                    type: "GET",
                    success: function(data) {
                     var voucher_lines = data.voucher_data;
                     var voucher_line_NO = data.voucher_line_counts;
                     var pagination = data.pagination_link;

                      $('#tbody_voucher_line').html(voucher_lines);
                      $('#voucher_line_NO').html(voucher_line_NO);
                      $('.pagination_link').html(pagination );

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
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>