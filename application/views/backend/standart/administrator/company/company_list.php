
<style type="text/css">
    table thead{
    background-color: #00cec9;
  }
   tbody tr:nth-child(odd) {
    background-color: #f3f6f7;
   }
    table tbody tr:hover{
    background: #dfe6e9!important;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      INSURANCE COMPANY<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">insurance company</li>
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
                        <?php is_allowed('company_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Business Partner (Ctrl+a)" href="<?=  site_url('administrator/company/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New company</a>
                        <?php }) ?>
                          <?php is_allowed('card_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new card(Ctrl+a)" href="<?=  site_url('administrator/card/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Card</a>
                        <?php }) ?>
                        <?php is_allowed('company_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Business Partner" href="<?= site_url('administrator/company/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('company_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Business Partner" href="<?= site_url('administrator/company/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Insurance Comapny</h3>
                     <h5 class="widget-user-desc">Total: <i class="label bg-yellow"><?= $company_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_company" id="form_company" action="<?= base_url('administrator/company/index'); ?>">
                       <div class="row" style="margin-bottom: 5PX;">
                  <div class="col-md-8">
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                           <option <?= $this->input->get('f') == 'company_CODE' ? 'selected' :''; ?> value="company_CODE">PARTNER CODE</option>
                           <option <?= $this->input->get('f') == 'E_NAME' ? 'selected' :''; ?> value="E_NAME">ENG NAME</option>
                           <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
                           <option <?= $this->input->get('f') == 'BILLING_DEPT_NAME' ? 'selected' :''; ?> value="BILLING_DEPT_NAME">BILLING DEPT NAME</option>
                           <option <?= $this->input->get('f') == 'SURGICAL_RATING' ? 'selected' :''; ?> value="SURGICAL_RATING">SURGICAL RATING</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE_STANDARD' ? 'selected' :''; ?> value="DIAG_CODE_STANDARD">DIAG CODE STANDARD</option>
                           <option <?= $this->input->get('f') == 'REMARK'? 'selected':''; ?> value="REMARK">REMARK</option>
                          </select> 
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-default " name="sbtn" id="sbtn" value="Apply" title="filter search">
                        <i class="glyphicon glyphicon-search"></i>
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/company');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
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
                           <th>English Name</th>
                           <?php if ($field=='REMARK') {;?>
                            <th>company TYPE</th>
                            <th>company NAME</th>
                            <th>REMARK</th>
        
                           <?php }else{; ?>
        
                           <th>District</th>
                           <th>Billing Department Name</th>
                           <th>Surgical Rating</th>
                           <th>DIAG CODE STANDARD</th>
        
                            <?php } ?>

                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead> 
                     <tbody id="tbody_company">
                     <?php foreach($companys as $company): ?>
                        <tr class="clickable-row"  class="label-default" data-href='<?= site_url('administrator/company/view/' . $company->COM_ID); ?>'>
                           <td><?= _ent($company->COM_ID); ?></td> 
                           <td><?= _ent($company->E_NAME); ?></td> 
                           <?php if ($field=='REMARK') {; ?>
                             <td><?= $company->CLASS_CODE; ?></td>
                             <td><?= $company->CLASS_DESC; ?></td>
                            <td><?php echo $company->REMARK; ?></td>
                           <?php }else{ ;?>
                           <td><?= _ent($company->E_DISTRICT);?></td>
                           <td><?= _ent($company->BILLING_DEPT_NAME); ?></td> 
                           <td><?= _ent($company->SURGICAL_RATING); ?></td> 
                           <td><?= _ent($company->DIAG_CODE_STANDARD); ?></td> 
                            <?php } ?>
                            
                           <td><?= _ent($company->STATUS); ?></td> 
                           <td width="200">
                              <?php is_allowed('company_update', function($company) use ($company){?>
                              <a href="<?= site_url('administrator/company/edit/' . $company->COM_ID); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('company_delete', function($company) use ($company){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/company/delete/' . $company->COM_ID); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($company_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Business Partner data is not available
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
                  </form
                    
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
        $('.clickable-row').on('click',function(){
      window.location = $(this).data('href');
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
      var serialize_bulk = $('#form_company').serialize();

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
               document.location.href = BASE_URL + '/administrator/company/delete?' + serialize_bulk;      
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