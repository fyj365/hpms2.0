
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Agreed_fee/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}
 
jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Agreed Fee<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Agreed Fee</li>
   </ol>
</section>
<style type="text/css">
  #tbody_agreed_fee tr:hover{
        background: #dfe6e9!important;

  }s
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
                        <?php is_allowed('agreed_fee_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Agreed Fee (Ctrl+a)" href="<?=  site_url('administrator/agreed_fee/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Agreed Fee</a>
                        <?php }) ?>
                        <?php is_allowed('agreed_fee_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Agreed Fee" href="<?= site_url('administrator/agreed_fee/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('agreed_fee_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Agreed Fee" href="<?= site_url('administrator/agreed_fee/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Agreed Fee</h3>
                     <h5 class="widget-user-desc">List All Agreed Fee <i class="label bg-yellow"><?= $agreed_fee_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_agreed_fee" id="form_agreed_fee" action="<?= base_url('administrator/agreed_fee/index'); ?>">
                    <div class="row" style="margin-bottom: 5px;">
                     <div class="col-md-8">
             <!--         <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="apply bulk actions">Apply</button>
                     </div> -->
                     <div class="col-sm-3 padd-left-0">
                      <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                           <option <?= $this->input->get('f') == 'CARD_CODE' ? 'selected' :''; ?> value="CARD_CODE">PARTNER CODE</option>
                           <option <?= $this->input->get('f') == 'CLASS_CODE' ? 'selected' :''; ?> value="CLASS_CODE">CARD TYPE</option>
                           <option <?= $this->input->get('f') == 'CLASS_DESC' ? 'selected' :''; ?> value="CONTRACT_NAME">CARD NAME</option> 
                            <option <?= $this->input->get('f') == 'TYPE' ? 'selected' :''; ?> value="TYPE">TYPE</option>
                           <option <?= $this->input->get('f') == 'MED_DAYS' ? 'selected' :''; ?> value="MED_DAYS">MED DAYS</option>
                           <option <?= $this->input->get('f') == 'CO_PAY' ? 'selected' :''; ?> value="CO_PAY">CO PAY</option>
                           <option <?= $this->input->get('f') == 'FEE' ? 'selected' :''; ?> value="FEE">FEE</option>
                           <option <?= $this->input->get('f') == 'PAY' ? 'selected' :''; ?> value="PAY">PAY</option>
                           <option <?= $this->input->get('f') == 'EXTRA_MED_BOL' ? 'selected' :''; ?> value="EXTRA_MED_BOL">EXTRA MED</option>
                           <option <?= $this->input->get('f') == 'LAB_XRAY_BOL' ? 'selected' :''; ?> value="LAB_XRAY_BOL">LAB XRAY</option>
                           <option <?= $this->input->get('f') == 'SURGICAL_BOL' ? 'selected' :''; ?> value="SURGICAL_BOL">SURGICAL</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/agreed_fee');?>" title="reset filters">
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
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr>
                           <th>AUTO NO</th>
                           <th>Partner Code</th>
                            <th>Partner Eng Name</th>
                           <th>Card Type</th>
                           <th>TYPE</th>
                           <th>MED DAYS</th>
                           <th>CO PAY</th>
                           <th>FEE</th>
                           <th>PAY</th>
                           <th>EXTRA MED BOL</th>
                           <th>LAB XRAY BOL</th>
                           <th>SURGICAL BOL</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_agreed_fee">
                     <?php foreach($agreed_fees as $agreed_fee): ?>
                        <tr  class="clickable-row"  class="label-default" data-href='<?= site_url('administrator/agreed_fee/view/' . $agreed_fee->AUTO_NO); ?>'>
                            <td><?= _ent($agreed_fee->AUTO_NO); ?></td> 
                           <td><?= _ent($agreed_fee->CARD_CODE); ?></td>
                             <?php $CARD_CODE = $agreed_fee->CARD_CODE;
                                  $this->db->where('CARD_CODE',$CARD_CODE);
                                 $query= $this->db->get('card');
                                   $result = $query->row_array();
                           echo '<td>'.$result['E_NAME'] .'</td>';
                           ?> 
                           <td><?= _ent($agreed_fee->CLASS_CODE); ?></td>
                    
                           <td><?= _ent($agreed_fee->TYPE); ?></td> 
                           <td><?= _ent($agreed_fee->MED_DAYS); ?></td> 
                           <td><?= _ent($agreed_fee->CO_PAY); ?></td> 
                           <td><?= _ent($agreed_fee->FEE); ?></td> 
                           <td><?= _ent($agreed_fee->PAY); ?></td> 
                           <td><?= _ent($agreed_fee->EXTRA_MED_BOL); ?></td> 
                           <td><?= _ent($agreed_fee->LAB_XRAY_BOL); ?></td> 
                           <td><?= _ent($agreed_fee->SURGICAL_BOL); ?></td> 
                           <td width="200">
                              <?php is_allowed('agreed_fee_update', function($agreed_fee) use ($agreed_fee){?>
                              <a href="<?= site_url('administrator/agreed_fee/edit/' . $agreed_fee->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('agreed_fee_delete', function($agreed_fee) use ($agreed_fee){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/agreed_fee/delete/' . $agreed_fee->AUTO_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($agreed_fee_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Agreed Fee data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
                  </form>                       
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


    // $('#apply').click(function(){

    //   var bulk = $('#bulk');
    //   var serialize_bulk = $('#form_agreed_fee').serialize();

    //   if (bulk.val() == 'delete') {
    //      swal({
    //         title: "Are you sure?",
    //         text: "data to be deleted can not be restored!",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes, delete it!",
    //         cancelButtonText: "No, cancel plx!",
    //         closeOnConfirm: true,
    //         closeOnCancel: true
    //       },
    //       function(isConfirm){
    //         if (isConfirm) {
    //            document.location.href = BASE_URL + '/administrator/agreed_fee/delete?' + serialize_bulk;      
    //         }
    //       });

    //     return false;

    //   } else if(bulk.val() == '')  {
    //       swal({
    //         title: "Upss",
    //         text: "Please choose bulk action first!",
    //         type: "warning",
    //         showCancelButton: false,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Okay!",
    //         closeOnConfirm: true,
    //         closeOnCancel: true
    //       });

    //     return false;
    //   }

    //   return false;

    // });/*end appliy click*/


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