
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Patient<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Patient</li>
   </ol>
</section>
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
						             <?php is_allowed('patient_upload', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_upload_new" href="<?=  site_url('administrator/patient/patient_upload'); ?>" title="Upload Patient"><i class="fa fa-plus-square-o" ></i> Upload Patient</a>
                        <?php }) ?>
					 

                        <?php is_allowed('patient_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Patient" href="<?= site_url('administrator/patient/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('patient_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Patient" href="<?= site_url('administrator/patient/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>

                       <h4 class="widget-user-desc">Total: <i class="label bg-yellow"><?php echo $patient_counts; ?>  items</i></h4>

                     <!-- /.widget-user-image -->
                  </div>
		
                  <form name="form_patient" id="form_patient" action="<?= base_url('administrator/patient/index'); ?>">
				    <div class="row">
						<div class="col-md-8">
							 <div class="col-sm-3 padd-left-0 " >
								<select type="text" class="form-control chosen chosen-select" name="f" id="field" >
								   <option value="">All</option>
									<option <?= $this->input->get('f') == 'AUTO_NO' ? 'selected' :''; ?> value="AUTO_NO">AUTO NO</option>
								   <option <?= $this->input->get('f') == 'CARD_CODE' ? 'selected' :''; ?> value="CARD_CODE">PARTNER CODE</option>
								   <option <?= $this->input->get('f') == 'CLASS_CODE_CODE' ? 'selected' :''; ?> value="CLASS_CODE_CODE">CARD TYPE CODE</option>
								   <option <?= $this->input->get('f') == 'PATIENT_NO' ? 'selected' :''; ?> value="PATIENT_NO">PATIENT NO</option>
								   <option <?= $this->input->get('f') == 'POLICY_NO' ? 'selected' :''; ?> value="POLICY_NO">POLICY NO</option>
								   <option <?= $this->input->get('f') == 'DEPD_CODE' ? 'selected' :''; ?> value="DEPD_CODE">DEPD CODE</option>
								   <option <?= $this->input->get('f') == 'PATIENT_NAME' ? 'selected' :''; ?> value="PATIENT_NAME">PATIENT NAME</option>
								   <option <?= $this->input->get('f') == 'GENDER' ? 'selected' :''; ?> value="GENDER">GENDER</option>
								   <option <?= $this->input->get('f') == 'DOB' ? 'selected' :''; ?> value="DOB">DOB</option>
								   <option <?= $this->input->get('f') == 'HKID' ? 'selected' :''; ?> value="HKID">HKID</option>
								   <option <?= $this->input->get('f') == 'REMARK' ? 'selected' :''; ?> value="REMARK">REMARK</option>
								   <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
								   <option <?= $this->input->get('f') == 'GP_COPAY' ? 'selected' :''; ?> value="GP_COPAY">GP COPAY</option>
								   <option <?= $this->input->get('f') == 'SP_COPAY' ? 'selected' :''; ?> value="SP_COPAY">SP COPAY</option>
								   <option <?= $this->input->get('f') == 'PHY_COPAY' ? 'selected' :''; ?> value="PHY_COPAY">PHY COPAY</option>
								   <option <?= $this->input->get('f') == 'HERB_COPAY' ? 'selected' :''; ?> value="HERB_COPAY">HERB COPAY</option>
								   <option <?= $this->input->get('f') == 'GP_EXTRA_MED' ? 'selected' :''; ?> value="GP_EXTRA_MED">GP EXTRA MED</option>
								   <option <?= $this->input->get('f') == 'SP_EXTRA_MED' ? 'selected' :''; ?> value="SP_EXTRA_MED">SP EXTRA MED</option>
								   <option <?= $this->input->get('f') == 'HERB_EXTRA_MED' ? 'selected' :''; ?> value="HERB_EXTRA_MED">HERB EXTRA MED</option>
								   <option <?= $this->input->get('f') == 'WAIVER_REFERRAL' ? 'selected' :''; ?> value="WAIVER_REFERRAL">WAIVER REFERRAL</option>
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
								<a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/patient');?>" title="reset filters">
								<i class="fa fa-undo"></i>
								</a>
							 </div>
						</div>
					</form>                  
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
            						   <th>Policy No</th>
            						   <th>HKID</th>
            						   <th>Patient Name</th>
            						   <th>Dept Code</th>

                           <th>GP COPAY/EX-MED</th>
                           <th>SP COPAY/EX-MED</th>
                           <th>PHY COPAY</th>
                           <th>HERB COPAY/EX-MED</th> 
                           <th>Start Date</th>
                           <th>Term Date</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_patient">
                     <?php foreach($patients as $patient): ?>
                        <tr data-href='<?= site_url('administrator/patient/view/' . $patient->AUTO_NO); ?>'>
							
							<?php 
								$auto_no = $patient->AUTO_NO;
							
								$this->db->select(" * FROM patient_effective_date WHERE PATIENT_AUTONO = $auto_no AND PATIENT_EFFECTIVE_NO = (SELECT MAX(PATIENT_EFFECTIVE_NO) FROM patient_effective_date WHERE PATIENT_AUTONO = $auto_no)", false);
								$patient_effective_date = $this->db->get()->row();
							?>

                           <td class="clickable-row"><?= _ent($patient->CARD_CODE); ?></td> 
						   <td class="clickable-row"><?= _ent($patient->PATIENT_NO); ?></td>
						   <td class="clickable-row"><?= _ent($patient->POLICY_NO); ?></td> 
                           <td class="clickable-row"><?= _ent($patient->HKID); ?></td> 
                           <td class="clickable-row"><?= _ent($patient->PATIENT_NAME); ?></td> 
                           <td class="clickable-row"><?= _ent($patient->DEPD_CODE); ?></td> 
                           <td class="clickable-row"><?php echo $patient->GP_COPAY.' / '. $patient->GP_EXTRA_MED_BENEFIT;?></td> 
                           <td class="clickable-row"><?php echo $patient->SP_COPAY.' / '. $patient->SP_EXTRA_MED_BENEFIT; ?></td> 
                           <td class="clickable-row"><?php echo $patient->PHY_COPAY; ?></td> 
                           <td class="clickable-row"><?php echo $patient->HERB_COPAY.' / '.$patient->HERB_EXTRA_MED_BENEFIT; ?></td> 
                           <td class="clickable-row"><?= $patient_effective_date == null ? "" : _ent($patient_effective_date->START_DATE); ?></td> 
                           <td class="clickable-row"><?= $patient_effective_date == null ? "" : _ent($patient_effective_date->TERM_DATE); ?></td>
                           <td class="clickable-row"><?= _ent($patient->STATUS); ?></td> 
                           <td width="200">
                              <?php is_allowed('patient_view', function($patient) use ($patient){?>
                              <a href="<?= site_url('administrator/patient/view/' . $patient->AUTO_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('patient_update', function($patient) use ($patient){?>
                              <a href="<?= site_url('administrator/patient/edit/' . $patient->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('patient_delete', function($patient) use ($patient){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/patient/delete/' . $patient->AUTO_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($patient_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Patient data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>

               </div>
                <div class="dataTables_paginate paging_simple_numbers col-sm-4 col-sm-offset-4" id="example2_paginate" >
                        <?= $pagination; ?>
                    </div>
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
	  
	//td click enter View page
	$('.clickable-row').on('click',function(){
		window.location = $(this).parent().data('href');
	});

	  $("#btn_upload_new").click(function(){
		  window.open($(this).attr("href"), "popupWindow", "width=600,height=600,scrollbars=yes");
		  return false;
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
      var serialize_bulk = $('#form_patient').serialize();

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
               document.location.href = BASE_URL + '/administrator/patient/delete?' + serialize_bulk;      
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