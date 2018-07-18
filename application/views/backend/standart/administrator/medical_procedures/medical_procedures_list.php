
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Medical Procedures<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Medical Procedures</li>
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
                        <?php is_allowed('medical_procedures_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Medical Procedures" href="<?=  site_url('administrator/medical_procedures/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Medical Procedures</a>
                        <?php }) ?>
                        <?php is_allowed('medical_procedures_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Medical Procedures" href="<?= site_url('administrator/medical_procedures/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('medical_procedures_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Medical Procedures" href="<?= site_url('administrator/medical_procedures/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Medical Procedures</h3>
                     <h5 class="widget-user-desc">List All Medical Procedures <i class="label bg-yellow"><?= $medical_procedures_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_medical_procedures" id="form_medical_procedures" action="<?= base_url('administrator/medical_procedures/index'); ?>">
                  
				  
					<div class="row">
						<div class="col-md-8"></div>
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
                           <th>Specialty Code</th>
                           <th>Clinic Procedure</th>
                           <th>Action</th>
                        </tr>
						<tr>
						   <td><input type="text" class="form-control" name="SP_CODE" id="SP_CODE" value="<?= $this->input->get('SP_CODE'); ?>"></td>
						   <td><input type="text" class="form-control" name="CLINIC_PROCEDURE" id="CLINIC_PROCEDURE" value="<?= $this->input->get('CLINIC_PROCEDURE'); ?>"></td>
						   <td><button type="submit" class="btn btn-flat" name="cust_sbtn" id="cust_sbtn" value="Apply" title="filter search">
							  Filter
							  </button>
							  <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/doctor');?>" title="reset filters">
							  <i class="fa fa-undo"></i>
							  </a>
						   </td>
						</tr>
                     </thead>
                     <tbody id="tbody_medical_procedures">
                     <?php foreach($medical_proceduress as $medical_procedures): ?>
                        <tr data-href='<?= site_url('administrator/medical_procedures/view/' . $medical_procedures->AUTO_NO); ?>'>
                           <?php 
								$this->db->where("SP_CODE", $medical_procedures->SP_CODE);
								$query = $this->db->get("doctor_specialty_desc")->row();
						   ?>
                           <td class="clickable-row"><?= _ent($medical_procedures->SP_CODE)." &nbsp; (".$query->C_DESC." &nbsp; ".$query->E_DESC.")"; ?></td> 
                           <td class="clickable-row"><?= _ent($medical_procedures->CLINIC_PROCEDURE); ?></td> 
                           <td width="200">
                              <?php is_allowed('medical_procedures_view', function($medical_procedures) use ($medical_procedures){?>
                              <a href="<?= site_url('administrator/medical_procedures/view/' . $medical_procedures->AUTO_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('medical_procedures_update', function($medical_procedures) use ($medical_procedures){?>
                              <a href="<?= site_url('administrator/medical_procedures/edit/' . $medical_procedures->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('medical_procedures_delete', function($medical_procedures) use ($medical_procedures){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/medical_procedures/delete/' . $medical_procedures->AUTO_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($medical_procedures_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Medical Procedures data is not available
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
      var serialize_bulk = $('#form_medical_procedures').serialize();

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
               document.location.href = BASE_URL + '/administrator/medical_procedures/delete?' + serialize_bulk;      
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