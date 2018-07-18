
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor Consult Hour<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Doctor Consult Hour</li>
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
                        <?php is_allowed('doctor_consult_hour_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Doctor Consult Hour" href="<?=  site_url('administrator/doctor_consult_hour/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Doctor Consult Hour</a>
                        <?php }) ?>
                        <?php is_allowed('doctor_consult_hour_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Doctor Consult Hour" href="<?= site_url('administrator/doctor_consult_hour/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('doctor_consult_hour_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Doctor Consult Hour" href="<?= site_url('administrator/doctor_consult_hour/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Doctor Consult Hour</h3>
                     <h5 class="widget-user-desc">List All Doctor Consult Hour <i class="label bg-yellow"><?= $doctor_consult_hour_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_doctor_consult_hour" id="form_doctor_consult_hour" action="<?= base_url('administrator/doctor_consult_hour/index'); ?>">
                  
				  
				  <div class="row">
                  <div class="col-md-8">
                     
					 <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'DR_CODE' ? 'selected' :''; ?> value="DR_CODE">Dr Code</option>
                           <option <?= $this->input->get('f') == 'CENTER_CODE' ? 'selected' :''; ?> value="CENTER_CODE">Center Code</option>
                           <option <?= $this->input->get('f') == 'CONTACT_PERSON' ? 'selected' :''; ?> value="CONTACT_PERSON">Contact Person</option>
                           <option <?= $this->input->get('f') == 'SCHEDULE_DAY1' ? 'selected' :''; ?> value="SCHEDULE_DAY1">SCHEDULE DAY1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT1_1' ? 'selected' :''; ?> value="TIMESLOT1_1">TIMESLOT1 1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT1_2' ? 'selected' :''; ?> value="TIMESLOT1_2">TIMESLOT1 2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT1_3' ? 'selected' :''; ?> value="TIMESLOT1_3">TIMESLOT1 3</option>
                           <option <?= $this->input->get('f') == 'SCHEDULE_DAY2' ? 'selected' :''; ?> value="SCHEDULE_DAY2">SCHEDULE DAY2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT2_1' ? 'selected' :''; ?> value="TIMESLOT2_1">TIMESLOT2 1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT2_2' ? 'selected' :''; ?> value="TIMESLOT2_2">TIMESLOT2 2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT2_3' ? 'selected' :''; ?> value="TIMESLOT2_3">TIMESLOT2 3</option>
                           <option <?= $this->input->get('f') == 'SCHEDULE_DAY3' ? 'selected' :''; ?> value="SCHEDULE_DAY3">SCHEDULE DAY3</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT3_1' ? 'selected' :''; ?> value="TIMESLOT3_1">TIMESLOT3 1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT3_2' ? 'selected' :''; ?> value="TIMESLOT3_2">TIMESLOT3 2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT3_3' ? 'selected' :''; ?> value="TIMESLOT3_3">TIMESLOT3 3</option>
                           <option <?= $this->input->get('f') == 'SCHEDULE_DAY4' ? 'selected' :''; ?> value="SCHEDULE_DAY4">SCHEDULE DAY4</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT4_1' ? 'selected' :''; ?> value="TIMESLOT4_1">TIMESLOT4 1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT4_2' ? 'selected' :''; ?> value="TIMESLOT4_2">TIMESLOT4 2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT4_3' ? 'selected' :''; ?> value="TIMESLOT4_3">TIMESLOT4 3</option>
                           <option <?= $this->input->get('f') == 'SCHEDULE_DAY5' ? 'selected' :''; ?> value="SCHEDULE_DAY5">SCHEDULE DAY5</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT5_1' ? 'selected' :''; ?> value="TIMESLOT5_1">TIMESLOT5 1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT5_2' ? 'selected' :''; ?> value="TIMESLOT5_2">TIMESLOT5 2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT5_3' ? 'selected' :''; ?> value="TIMESLOT5_3">TIMESLOT5 3</option>
                           <option <?= $this->input->get('f') == 'SCHEDULE_DAY6' ? 'selected' :''; ?> value="SCHEDULE_DAY6">SCHEDULE DAY6</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT6_1' ? 'selected' :''; ?> value="TIMESLOT6_1">TIMESLOT6 1</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT6_2' ? 'selected' :''; ?> value="TIMESLOT6_2">TIMESLOT6 2</option>
                           <option <?= $this->input->get('f') == 'TIMESLOT6_3' ? 'selected' :''; ?> value="TIMESLOT6_3">TIMESLOT6 3</option>
                          </select>
                     </div>
					 
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/doctor_consult_hour');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
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
                           <th>Center Code</th>
                           <th>Contact Person</th>
                           <th width="12%">Schedule Day1</th>
						   <th width="12%">Schedule Day2</th>
						   <th width="12%">Schedule Day3</th>
						   <th width="12%">Schedule Day4</th>
						   <th width="12%">Schedule Day5</th>
						   <th width="12%">Schedule Day6</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_doctor_consult_hour">
                     <?php foreach($doctor_consult_hours as $doctor_consult_hour): ?>
                        <tr data-href='<?= site_url('administrator/doctor_consult_hour/view/' . $doctor_consult_hour->AUTO_NO); ?>'>

                           <td class="clickable-row"><?= _ent($doctor_consult_hour->DR_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($doctor_consult_hour->CENTER_CODE); ?></td> 
						   <td class="clickable-row"><?= _ent($doctor_consult_hour->CONTACT_PERSON); ?></td>
						   <?php
								$this->db->where("CENTER_CODE", $doctor_consult_hour->CENTER_CODE);
								$query = $this->db->get("center")->row();
						   ?>
                           <td class="clickable-row">
								<?= _ent($doctor_consult_hour->SCHEDULE_DAY_C1); ?><br><?= _ent($doctor_consult_hour->SCHEDULE_DAY_E1); ?><br><br>
								<?= _ent($doctor_consult_hour->TIMESLOT1_1); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT1_2); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT1_3); ?><br>
							</td> 
						   <td class="clickable-row">
								<?= _ent($doctor_consult_hour->SCHEDULE_DAY_C2); ?><br><?= _ent($doctor_consult_hour->SCHEDULE_DAY_E2); ?><br><br>
								<?= _ent($doctor_consult_hour->TIMESLOT2_1); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT2_2); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT2_3); ?><br>
							</td> 
							<td class="clickable-row">
								<?= _ent($doctor_consult_hour->SCHEDULE_DAY_C3); ?><br><?= _ent($doctor_consult_hour->SCHEDULE_DAY_E3); ?><br><br>
								<?= _ent($doctor_consult_hour->TIMESLOT3_1); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT3_2); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT3_3); ?><br>
							</td> 
							<td class="clickable-row">
								<?= _ent($doctor_consult_hour->SCHEDULE_DAY_C4); ?><br><?= _ent($doctor_consult_hour->SCHEDULE_DAY_E4); ?><br><br>
								<?= _ent($doctor_consult_hour->TIMESLOT4_1); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT4_2); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT4_3); ?><br>
							</td> 
							<td class="clickable-row">
								<?= _ent($doctor_consult_hour->SCHEDULE_DAY_C5); ?><br><?= _ent($doctor_consult_hour->SCHEDULE_DAY_E5); ?><br><br>
								<?= _ent($doctor_consult_hour->TIMESLOT5_1); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT5_2); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT5_3); ?><br>
							</td> 
							<td class="clickable-row">
								<?= _ent($doctor_consult_hour->SCHEDULE_DAY_C6); ?><br><?= _ent($doctor_consult_hour->SCHEDULE_DAY_E6); ?><br><br>
								<?= _ent($doctor_consult_hour->TIMESLOT6_1); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT6_2); ?><br>
								<?= _ent($doctor_consult_hour->TIMESLOT6_3); ?><br>
							</td> 
                           <td width="200">
                              <?php is_allowed('doctor_consult_hour_view', function($doctor_consult_hour) use ($doctor_consult_hour){?>
                              <a href="<?= site_url('administrator/doctor_consult_hour/view/' . $doctor_consult_hour->AUTO_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('doctor_consult_hour_update', function($doctor_consult_hour) use ($doctor_consult_hour){?>
                              <a href="<?= site_url('administrator/doctor_consult_hour/edit/' . $doctor_consult_hour->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('doctor_consult_hour_delete', function($doctor_consult_hour) use ($doctor_consult_hour){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/doctor_consult_hour/delete/' . $doctor_consult_hour->AUTO_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($doctor_consult_hour_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Doctor Consult Hour data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
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
      var serialize_bulk = $('#form_doctor_consult_hour').serialize();

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
               document.location.href = BASE_URL + '/administrator/doctor_consult_hour/delete?' + serialize_bulk;      
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