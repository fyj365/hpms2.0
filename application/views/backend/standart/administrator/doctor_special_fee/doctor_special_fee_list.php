
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor Special Fee<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Doctor Special Fee</li>
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
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        <?php is_allowed('doctor_special_fee_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Doctor Special Fee" href="<?=  site_url('administrator/doctor_special_fee/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Doctor Special Fee</a>
                        <?php }) ?>
                        <?php is_allowed('doctor_special_fee_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Doctor Special Fee" href="<?= site_url('administrator/doctor_special_fee/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('doctor_special_fee_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Doctor Special Fee" href="<?= site_url('administrator/doctor_special_fee/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Doctor Special Fee</h3>
                     <h5 class="widget-user-desc">List All Doctor Special Fee <i class="label bg-yellow"><?= $doctor_special_fee_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_doctor_special_fee" id="form_doctor_special_fee" action="<?= base_url('administrator/doctor_special_fee/index'); ?>">
                  
				  
				  <div class="row">
					  <div class="col-md-8">
					  </div>

                      <div class="col-md-4">
						<div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
						</div>
					  </div>
                  </div>

                  <div class="table-responsive"> 
                  <table class="table table-bordered dataTable">
                     <thead>
                        <tr class="">
						
                           <th>Dr Code</th>
						   <th>Partner Code</th>
						   <th>Card Type</th>
						   <th>Partner Card Name</th>
                           <th>Type</th>
                           <th>Med Days</th>
                           <th>Special Fee</th>
                           <th>Remark</th>
						   <th>Status</th>
                           <th>Action</th>
                        </tr>
						<tr>
						   <td><input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= $this->input->get('DR_CODE'); ?>"></td>
						   <td><input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= $this->input->get('CARD_CODE'); ?>"></td>
						   <td><input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE" value="<?= $this->input->get('CLASS_CODE'); ?>"></td>
						   <td><input type="text" class="form-control" name="CLASS_DESC" id="CLASS_DESC" value="<?= $this->input->get('CLASS_DESC'); ?>"></td>
						   <td><input type="text" class="form-control" name="TYPE" id="TYPE" value="<?= $this->input->get('TYPE'); ?>"></td>
						   <td><input type="text" class="form-control" name="MED_DAYS" id="MED_DAYS" value="<?= $this->input->get('MED_DAYS'); ?>"></td>
						    <td><input type="text" class="form-control" name="SPECIAL_FEE" id="SPECIAL_FEE" value="<?= $this->input->get('SPECIAL_FEE'); ?>"></td>
							 <td><input type="text" class="form-control" name="REMARK" id="REMARK" value="<?= $this->input->get('REMARK'); ?>"></td>
						   <td><input type="text" class="form-control" name="STATUS" id="STATUS" value="<?= $this->input->get('STATUS'); ?>"></td>
						   <td><button type="submit" class="btn btn-flat" name="cust_sbtn" id="cust_sbtn" value="Apply" title="filter search">
							  Filter
							  </button>
							  <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/doctor');?>" title="reset filters">
							  <i class="fa fa-undo"></i>
							  </a>
						   </td>
						</tr>
                     </thead>
                     <tbody id="tbody_doctor_special_fee">
                     <?php foreach($doctor_special_fees as $doctor_special_fee): ?>
                        <tr data-href='<?= site_url('administrator/doctor_special_fee/view/' . $doctor_special_fee->AUTO_NO); ?>'>

                           <td class="clickable-row"><?= _ent($doctor_special_fee->DR_CODE); ?></td> 
						   <td class="clickable-row"><?= _ent($doctor_special_fee->CARD_CODE); ?></td>
						   <td class="clickable-row"><?= _ent($doctor_special_fee->CLASS_CODE); ?></td> 
						   <td class="clickable-row"><?= _ent($doctor_special_fee->CLASS_DESC); ?></td>
                           <td class="clickable-row"><?= _ent($doctor_special_fee->TYPE); ?></td> 
                           <td class="clickable-row"><?= _ent($doctor_special_fee->MED_DAYS); ?></td> 
                           <td class="clickable-row"><?= _ent($doctor_special_fee->SPECIAL_FEE); ?></td> 
                           <td class="clickable-row"><?= _ent($doctor_special_fee->REMARK); ?></td> 
						   <td class="clickable-row"><?= _ent($doctor_special_fee->STATUS); ?></td> 
                           <td width="200">
                              <?php is_allowed('doctor_special_fee_view', function($doctor_special_fee) use ($doctor_special_fee){?>
                              <a href="<?= site_url('administrator/doctor_special_fee/view/' . $doctor_special_fee->AUTO_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('doctor_special_fee_update', function($doctor_special_fee) use ($doctor_special_fee){?>
                              <a href="<?= site_url('administrator/doctor_special_fee/edit/' . $doctor_special_fee->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('doctor_special_fee_delete', function($doctor_special_fee) use ($doctor_special_fee){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/doctor_special_fee/delete/' . $doctor_special_fee->AUTO_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
							<?php endforeach; ?>
                      <?php if ($doctor_special_fee_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Doctor Special Fee data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
				  </form>
               </div>
               <hr>
               <!-- /.widget-user -->
               
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->
<style type="text/css">
    table thead{
    background-color: #00cec9;
  }
  
    table tbody tr:hover{
    background: #dfe6e9!important;
  }
  
  tbody tr:nth-child(odd) {
    background-color: #f3f6f7;
   }

</style>
<script>
  $(document).ready(function(){
	  
	$('.clickable-row').on('click',function(){
		window.location = $(this).parent().data('href');
	});
   
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
      var serialize_bulk = $('#form_doctor_special_fee').serialize();

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
               document.location.href = BASE_URL + '/administrator/doctor_special_fee/delete?' + serialize_bulk;      
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