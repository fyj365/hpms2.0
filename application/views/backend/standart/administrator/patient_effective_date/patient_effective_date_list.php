
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Patient effective date<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Patient effective date</li>
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
                        <?php is_allowed('patient_effective_date_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Patient effective date" href="<?=  site_url('administrator/patient_effective_date/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Patient effective date</a>
                        <?php }) ?>
                        <?php is_allowed('patient_effective_date_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Patient effective date" href="<?= site_url('administrator/patient_effective_date/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('patient_effective_date_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Patient effective date" href="<?= site_url('administrator/patient_effective_date/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Patient effective date</h3>
                     <h5 class="widget-user-desc">List All Patient effective date <i class="label bg-yellow"><?= $patient_effective_date_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_patient_effective_date" id="form_patient_effective_date" action="<?= base_url('administrator/patient_effective_date/index'); ?>">
                  
				  
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
						   <th>Partner Code</th>
                           <th>Patient No</th>
						   <th>Patient Name</th>
						   <th>Effective No</th>
                           <th>Start Date</th>
                           <th>Term Date</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
						<tr>
						   <td><input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= $this->input->get('CARD_CODE'); ?>"></td>
						   <td><input type="text" class="form-control" name="PATIENT_NO" id="PATIENT_NO" value="<?= $this->input->get('PATIENT_NO'); ?>"></td>
						   <td><input type="text" class="form-control" name="PATIENT_NAME" id="PATIENT_NAME" value="<?= $this->input->get('PATIENT_NAME'); ?>"></td>
						   <td><input type="text" class="form-control" name="PATIENT_EFFECTIVE_NO" id="PATIENT_EFFECTIVE_NO" value="<?= $this->input->get('PATIENT_EFFECTIVE_NO'); ?>"></td>
						   <td><input type="text" class="form-control" name="START_DATE" id="START_DATE" value="<?= $this->input->get('START_DATE'); ?>"></td>
						   <td><input type="text" class="form-control" name="TERM_DATE" id="TERM_DATE" value="<?= $this->input->get('TERM_DATE'); ?>"></td>
						   <td><input type="text" class="form-control" name="STATUS" id="STATUS" value="<?= $this->input->get('STATUS'); ?>"></td>
						   <td><button type="submit" class="btn btn-flat" name="cust_sbtn" id="cust_sbtn" value="Apply" title="filter search">
							  Filter
							  </button>
							  <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/patient_effective_date');?>" title="reset filters">
							  <i class="fa fa-undo"></i>
							  </a>
						   </td>
						</tr>
                     </thead>
                     <tbody id="tbody_patient_effective_date">
                     <?php foreach($patient_effective_dates as $patient_effective_date): ?>
                        <tr data-href='<?= site_url('administrator/patient_effective_date/view/' . $patient_effective_date->PATIENT_AUTONO .'/'. $patient_effective_date->PATIENT_EFFECTIVE_NO); ?>'>
						    <?php 
								$this->db->where("AUTO_NO", $patient_effective_date->PATIENT_AUTONO);
								$patient = $this->db->get("patient")->row();
								
						   ?>
                           <td class="clickable-row"><?= _ent($patient_effective_date->CARD_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($patient_effective_date->PATIENT_NO); ?></td> 
						   <td class="clickable-row"><?= _ent($patient_effective_date->PATIENT_NAME); ?></td> 
						   <td class="clickable-row"><?= _ent($patient_effective_date->PATIENT_EFFECTIVE_NO); ?></td>
                           <td class="clickable-row"><?= _ent($patient_effective_date->START_DATE); ?></td> 
                           <td class="clickable-row"><?= _ent($patient_effective_date->TERM_DATE); ?></td> 
                           <td class="clickable-row"><?= _ent($patient_effective_date->STATUS); ?></td> 
                           <td width="200">
                              <?php is_allowed('patient_effective_date_view', function($patient_effective_date) use ($patient_effective_date){?>
                              <a href="<?= site_url('administrator/patient_effective_date/view/' . $patient_effective_date->PATIENT_AUTONO .'/'. $patient_effective_date->PATIENT_EFFECTIVE_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('patient_effective_date_update', function($patient_effective_date) use ($patient_effective_date){?>
                              <a href="<?= site_url('administrator/patient_effective_date/edit/' . $patient_effective_date->PATIENT_AUTONO .'/'. $patient_effective_date->PATIENT_EFFECTIVE_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('patient_effective_date_delete', function($patient_effective_date) use ($patient_effective_date){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/patient_effective_date/delete/' . $patient_effective_date->PATIENT_AUTONO .'/'. $patient_effective_date->PATIENT_EFFECTIVE_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($patient_effective_date_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Patient effective date data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
			   </form>
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
	background-color:#00cec9
}

table tbody tr:hover{
	background:#dfe6e9!important
}

tbody tr:nth-child(odd){
	background-color:#f3f6f7
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
      var serialize_bulk = $('#form_patient_effective_date').serialize();

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
               document.location.href = BASE_URL + '/administrator/patient_effective_date/delete?' + serialize_bulk;      
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