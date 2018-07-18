
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Center<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Center</li>
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
                        <?php is_allowed('center_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Center" href="<?=  site_url('administrator/center/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Center</a>
                        <?php }) ?>
                        <?php is_allowed('center_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Center" href="<?= site_url('administrator/center/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('center_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Center" href="<?= site_url('administrator/center/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Center</h3>
                     <h5 class="widget-user-desc">Total<i class="label bg-yellow"><?= $center_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_center" id="form_center" action="<?= base_url('administrator/center/index'); ?>">
                  
				  <div class="row">
                  <div class="col-md-8">
				  
					<div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'CENTER_CODE' ? 'selected' :''; ?> value="CENTER_CODE">Center Code</option>
                           <option <?= $this->input->get('f') == 'E_NAME' ? 'selected' :''; ?> value="E_NAME">Center Eng Name</option>
                           <option <?= $this->input->get('f') == 'C_NAME' ? 'selected' :''; ?> value="C_NAME">Center Chi Name</option>
                           <option <?= $this->input->get('f') == 'E_ADDR1' ? 'selected' :''; ?> value="E_ADDR1">E ADDR1</option>
                           <option <?= $this->input->get('f') == 'E_ADDR2' ? 'selected' :''; ?> value="E_ADDR2">E ADDR2</option>
                           <option <?= $this->input->get('f') == 'E_ADDR3' ? 'selected' :''; ?> value="E_ADDR3">E ADDR3</option>
                           <option <?= $this->input->get('f') == 'E_ADDR4' ? 'selected' :''; ?> value="E_ADDR4">E ADDR4</option>
                           <option <?= $this->input->get('f') == 'E_ADDR5' ? 'selected' :''; ?> value="E_ADDR5">E ADDR5</option>
                           <option <?= $this->input->get('f') == 'E_DISTRICT' ? 'selected' :''; ?> value="E_DISTRICT">Eng District</option>
                           <option <?= $this->input->get('f') == 'C_ADDR1' ? 'selected' :''; ?> value="C_ADDR1">C ADDR1</option>
                           <option <?= $this->input->get('f') == 'C_ADDR2' ? 'selected' :''; ?> value="C_ADDR2">C ADDR2</option>
                           <option <?= $this->input->get('f') == 'C_ADDR3' ? 'selected' :''; ?> value="C_ADDR3">C ADDR3</option>
                           <option <?= $this->input->get('f') == 'C_ADDR4' ? 'selected' :''; ?> value="C_ADDR4">C ADDR4</option>
                           <option <?= $this->input->get('f') == 'C_ADDR5' ? 'selected' :''; ?> value="C_ADDR5">C ADDR5</option>
                           <option <?= $this->input->get('f') == 'C_DISTRICT' ? 'selected' :''; ?> value="C_DISTRICT">C DISTRICT</option>
                           <option <?= $this->input->get('f') == 'AREA' ? 'selected' :''; ?> value="AREA">Area</option>
                           <option <?= $this->input->get('f') == 'TEL' ? 'selected' :''; ?> value="TEL">Tel</option>
                           <option <?= $this->input->get('f') == 'FAX' ? 'selected' :''; ?> value="FAX">Fax</option>
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
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/center');?>" title="reset filters">
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
                           <th>Center Code</th>
                            <th>Tel</th>
                            <th>Fax</th>
                            <th>Center Chi Name</th>
                            <th>Center Eng Name</th>
                            <th>District</th>
                           <th>Area</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_center">
                     <?php foreach($centers as $center): ?>
                         <tr data-href='<?= site_url('administrator/center/view/' . $center->CENTER_CODE); ?>'>
                           <td class="clickable-row"><?= _ent($center->CENTER_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($center->TEL); ?></td> 
                          <td class="clickable-row"><?= _ent($center->FAX); ?></td>
						               <td class="clickable-row"><?= _ent($center->C_NAME); ?></td>
                           <td class="clickable-row"><?= _ent($center->E_NAME); ?></td>
                             <td class="clickable-row"><?= _ent($center->E_DISTRICT);?></td>
						              	<td class="clickable-row"><?= _ent($center->AREA); ?></td> 
                           <td width="200">
                              <?php is_allowed('center_view', function($center) use ($center){?>
                              <a href="<?= site_url('administrator/center/view/' . $center->CENTER_CODE); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('center_update', function($center) use ($center){?>
                              <a href="<?= site_url('administrator/center/edit/' . $center->CENTER_CODE); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('center_delete', function($center) use ($center){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/center/delete/' . $center->CENTER_CODE); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($center_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Center data is not available
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
      var serialize_bulk = $('#form_center').serialize();

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
               document.location.href = BASE_URL + '/administrator/center/delete?' + serialize_bulk;      
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