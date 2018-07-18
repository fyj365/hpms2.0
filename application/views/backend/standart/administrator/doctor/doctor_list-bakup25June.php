<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Doctor</li>
   </ol>
</section>
<style type="text/css">
  .row{
    margin: 0;
  }
</style>
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
                        <?php is_allowed('doctor_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Doctor" href="<?=  site_url('administrator/doctor/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Doctor</a>
                        <?php }) ?>
                         <?php is_allowed('center_view', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" title="" href="<?=  site_url('administrator/center/'); ?>"><i class="fa fa-eye" ></i>Center</a> 
                        <?php }) ?>
                        <?php is_allowed('doctor_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Doctor" href="<?= site_url('administrator/doctor/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('doctor_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Doctor" href="<?= site_url('administrator/doctor/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Doctor</h3><!-- <i class="label bg-yellow"><?= $doctor_counts; ?>  items</i> -->
                    
                </div>

                  <form name="form_doctor" id="form_doctor" action="<?= base_url('administrator/doctor/index'); ?>">
                    <div class="row">
                       <span class="col-sm-4">Total:<i class="label bg-yellow"><?= $doctor_counts; ?> items</i></span>
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                  </div>
                    </div>
				  				   
				  <div class="table-responsive"> 
                  <table class="table table-bordered dataTable my-table">
                     <thead>
                        <tr class="">
                           <th>Dr Code</th>
                           <th>Dr Name</th>
						   <th>Center Name</th>
                           <th>Center Tel</th>
						   <th>Center Fax</th>
						   <th>Term Date</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
						<tr>
						   <td><input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= $this->input->get('DR_CODE'); ?>"></td>
						   <td><input type="text" class="form-control" name="DR_NAME" id="DR_NAME" value="<?= $this->input->get('DR_NAME'); ?>"></td>
						   <td><input type="text" class="form-control" name="CENTER_NAME" id="CENTER_NAME" value="<?= $this->input->get('CENTER_NAME'); ?>"></td>
						   <td><input type="text" class="form-control" name="TEL" id="TEL" value="<?= $this->input->get('TEL'); ?>"></td>
						   <td><input type="text" class="form-control" name="FAX" id="FAX" value="<?= $this->input->get('FAX'); ?>"></td>
						   <td><input type="text" class="form-control" name="TERM_DATE" id="TERM_DATE" value="<?= $this->input->get('TERM_DATE'); ?>"></td>
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
                     <tbody id="tbody_doctor">
                     <?php foreach($doctors as $doctor): ?>
                        <tr data-href='<?= site_url('administrator/doctor/view/' . $doctor->d_DR_CODE); ?>'>
                           <td class="clickable-row"><?= _ent($doctor->d_DR_CODE); ?><br></td> 
                           <td class="clickable-row">
								<?= _ent($doctor->d_E_TITLE); ?> &nbsp; <?= _ent($doctor->E_NAME); ?><br>
								<?= _ent($doctor->C_NAME) == "" ? "" : _ent($doctor->C_NAME)._ent($doctor->C_TITLE); ?>
							</td> 
							
							
							<td class="clickable-row">
								<?php if ($doctor->c_E_NAME != ""){ ?>
									<a href="<?= site_url('administrator/center/view/'.$doctor->CENTER_CODE.'/'); ?>" class="label-default">
								<?php } ?>
								
								<?php 
										$no_consult = "<a href='doctor/add_consult/".$doctor->d_DR_CODE."'>Add Consultation</a>";
										$no_center = "<a href='center/add/'>Add new Center</a>";
										echo $doctor->c_E_NAME == "" ? "(Has no center)<br>$no_consult<br>$no_center" : $doctor->c_E_NAME."<br>";
										echo $doctor->c_C_NAME."<br><br>";
								?>
								
								<?php if ($doctor->c_E_NAME != ""){ ?>
									</a>
								<?php } ?>
							</td> 
							<td class="clickable-row"><?php 
											echo $doctor->c_TEL == "" ? "<br><br><br>" : $doctor->c_TEL."<br><br><br>";
										
								?>
							</td> 
							<td class="clickable-row"><?php 
									echo $doctor->c_FAX == "" ? "<br><br><br>" : $doctor->c_FAX."<br><br><br>";
								?>
							</td>
                           <td class="clickable-row"><?= _ent($doctor->TERM_DATE); ?></td> 
                           <td class="clickable-row"><?= _ent($doctor->STATUS); ?></td>  
                           <td width="200" class="special-td">
                              <?php is_allowed('doctor_view', function($doctor) use ($doctor){?>
							  <div><i class="fa fa-newspaper-o" style="font-size: 17px;"></i><a href="<?= site_url('administrator/doctor/view/' . $doctor->d_DR_CODE); ?>" class="label-default"> View Details</a></div>
                              <?php }) ?>
							  
							  <?php is_allowed('doctor_update', function($doctor) use ($doctor){?>
							  <div><i class="fa fa-edit" style="font-size: 20px;"></i><a href="<?= site_url('administrator/doctor/edit/' . $doctor->d_DR_CODE); ?>" class="label-default"> Edit Doctor</a></div>
                              <?php }) ?>
							  
<!-- 							  <div class="update_expend"><i class="fa fa-angle-down" style="font-size: 20px;"></i> More </div>
							  
							  <div class="edit_other">
								<div class="edit_other_content">
									Consultation: <a style="align:right" href='<?= site_url('administrator/doctor/add_consult/'.$doctor->d_DR_CODE); ?>'>Add</a> / <a href='<?= site_url('administrator/doctor_consult_hour/index?bulk=&q='.$doctor->d_DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>'>Edit</a>
								</div>
								
								<div class="edit_other_content">
									Qualification: <a href='<?= site_url('administrator/doctor/add_quali/'.$doctor->d_DR_CODE); ?>'>Add</a> / <a href='<?= site_url('administrator/doctor_qualification/index?bulk=&q='.$doctor->d_DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>'>Edit</a>
								</div>
								
								<div class="edit_other_content">
									Partner: <a href='<?= site_url('administrator/doctor/add_partner/'.$doctor->d_DR_CODE); ?>'>Add</a> / <a href='<?= site_url('administrator/partner_doctor_contract/index?bulk=&q='.$doctor->d_DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>'>Edit</a>	
								</div>
								
								<div class="edit_other_content">
									Special fee: <a href='<?= site_url('administrator/doctor/add_fee/'.$doctor->d_DR_CODE); ?>'>Add</a> / <a href='<?= site_url('administrator/doctor_special_fee/index?bulk=&q='.$doctor->d_DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>'>Edit</a>
								</div>
								
								<div class="edit_other_content">
									Website: <a href='<?= site_url('administrator/doctor/add_website/'.$doctor->d_DR_CODE); ?>'>Add</a> / <a href='<?= site_url('administrator/website_login/index?bulk=&q='.$doctor->d_DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>'>Edit</a>
								</div> -->
							  </div>

                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($doctor_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Doctor data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
                      <div class="dataTables_paginate paging_simple_numbers col-sm-4 col-sm-offset-4" id="example2_paginate" >
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

<style type="text/css">
    table thead{
    background-color: #00cec9;
  }
	.edit_other_content{
		padding: 5px 5px;
	}
	
    table tbody tr:hover{
    background: #dfe6e9!important;
  }
  
  tbody tr:nth-child(odd) {
    background-color: #f3f6f7;
   }

</style>

<!-- Page script -->
<script>
  $(document).ready(function(){

	//td click enter View page
	$('.clickable-row').on('click',function(){
		window.location = $(this).parent().data('href');
	});
	
	/* ----------- Edit button click ----------- */
	$(".edit_other").hide();
	
	$('.update_expend').on('click',function(){
		$(this).parent().children('.edit_other').slideToggle();

		if ($(this).parent().children('.fa').hasClass('fa-angle-down')){
			$('.fa-angle-down').addClass('fa-angle-up');
			$('.fa-angle-down').removeClass('fa-angle-down');
		}else{
			$('.fa-angle-up').addClass('fa-angle-down');
			$('.fa-angle-up').removeClass('fa-angle-up');
		}
		
	});
	
	/* ----------- End Edit button click ----------- */
   
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
      var serialize_bulk = $('#form_doctor').serialize();

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
               document.location.href = BASE_URL + '/administrator/doctor/delete?' + serialize_bulk;      
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