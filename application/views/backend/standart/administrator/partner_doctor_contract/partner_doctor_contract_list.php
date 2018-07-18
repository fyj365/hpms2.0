
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partner Doctor Contract<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Partner Doctor Contract</li>
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
                        <?php is_allowed('partner_doctor_contract_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Partner Doctor Contract (Ctrl+a)" href="<?=  site_url('administrator/partner_doctor_contract/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Partner Doctor Contract</a>
                        <?php }) ?>
                        <?php is_allowed('partner_doctor_contract_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Partner Doctor Contract" href="<?= site_url('administrator/partner_doctor_contract/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('partner_doctor_contract_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Partner Doctor Contract" href="<?= site_url('administrator/partner_doctor_contract/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Partner Doctor Contract</h3>
                     <h5 class="widget-user-desc">List All Partner Doctor Contract <i class="label bg-yellow"><?= $partner_doctor_contract_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_partner_doctor_contract" id="form_partner_doctor_contract" action="<?= base_url('administrator/partner_doctor_contract/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">

                           <th>PARTNER CODE</th>
                           <th>DR CODE</th>
                           <th>PARTNER CONTRACT NO</th>
						   <th>Policy No</th>
						   <th>Contract Name</th>
                           <th>PARTNER DR CODE</th>
                           <th>LOC CODE</th>
                           <th>STATUS</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_doctor_contract">
                     <?php foreach($partner_doctor_contracts as $partner_doctor_contract): ?>
                        <tr>

                           <td><?= _ent($partner_doctor_contract->CARD_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->DR_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->PARTNER_CONTRACT_NO); ?></td> 
						   <td><?= _ent($partner_doctor_contract->POLICY_NO); ?></td>
						   <td><?= _ent($partner_doctor_contract->PARTNER_CONTRACT_NAME); ?></td> 
                           <td><?= _ent($partner_doctor_contract->PARTNER_DR_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->LOC_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->STATUS); ?></td> 
                           <td width="200">
                              <?php is_allowed('partner_doctor_contract_view', function($partner_doctor_contract) use ($partner_doctor_contract){?>
                              <a href="<?= site_url('administrator/partner_doctor_contract/view/'.$partner_doctor_contract->CARD_CODE .'/'.$partner_doctor_contract->DR_CODE.'/'.$partner_doctor_contract->PARTNER_CONTRACT_NO.'/'.$partner_doctor_contract->POLICY_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('partner_doctor_contract_update', function($partner_doctor_contract) use ($partner_doctor_contract){?>
                              <a href="<?= site_url('administrator/partner_doctor_contract/edit/'.$partner_doctor_contract->CARD_CODE .'/'.$partner_doctor_contract->DR_CODE.'/'.$partner_doctor_contract->PARTNER_CONTRACT_NO.'/'.$partner_doctor_contract->POLICY_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('partner_doctor_contract_delete', function($partner_doctor_contract) use ($partner_doctor_contract){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/partner_doctor_contract/delete/'.$partner_doctor_contract->CARD_CODE .'/'.$partner_doctor_contract->DR_CODE.'/'.$partner_doctor_contract->PARTNER_CONTRACT_NO.'/'.$partner_doctor_contract->POLICY_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($partner_doctor_contract_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner Doctor Contract data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="apply bulk actions">Apply</button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'CARD_CODE' ? 'selected' :''; ?> value="CARD_CODE">PARTNER CODE</option>
                           <option <?= $this->input->get('f') == 'DR_CODE' ? 'selected' :''; ?> value="DR_CODE">DR CODE</option>
                           <option <?= $this->input->get('f') == 'PARTNER_DR_CONTRACT_NO' ? 'selected' :''; ?> value="PARTNER_DR_CONTRACT_NO">PARTNER DR CONTRACT NO</option>
                           <option <?= $this->input->get('f') == 'PARTNER_DR_CODE' ? 'selected' :''; ?> value="PARTNER_DR_CODE">PARTNER DR CODE</option>
                           <option <?= $this->input->get('f') == 'LOC_CODE' ? 'selected' :''; ?> value="LOC_CODE">LOC CODE</option>
                           <option <?= $this->input->get('f') == 'ORIGINAL_TERM_DATE' ? 'selected' :''; ?> value="ORIGINAL_TERM_DATE">ORIGINAL TERM DATE</option>
                           <option <?= $this->input->get('f') == 'START_DATE' ? 'selected' :''; ?> value="START_DATE">START DATE</option>
                           <option <?= $this->input->get('f') == 'TERM_DATE' ? 'selected' :''; ?> value="TERM_DATE">TERM DATE</option>
                           <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
                           <option <?= $this->input->get('f') == 'EXTEND' ? 'selected' :''; ?> value="EXTEND">EXTEND</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/partner_doctor_contract');?>" title="reset filters">
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
      var serialize_bulk = $('#form_partner_doctor_contract').serialize();

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
               document.location.href = BASE_URL + '/administrator/partner_doctor_contract/delete?' + serialize_bulk;      
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