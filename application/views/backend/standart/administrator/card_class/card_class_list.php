
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
     CARD CLASS  <small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Card Class</li>
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
                        <?php is_allowed('card_class_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Partner CARD (Ctrl+a)" href="<?=  site_url('administrator/card_class/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Card Class </a>
                        <?php }) ?>
                        <?php is_allowed('card_class_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Partner CARD" href="<?= site_url('administrator/card_class/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('card_class_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Partner CARD" href="<?= site_url('administrator/card_class/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Card Class</h3>
                     <h5 class="widget-user-desc">List All Card Class <i class="label bg-yellow"><?= $card_class_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_card_class" id="form_card_class" action="<?= base_url('administrator/card_class/index'); ?>">
                   <div class="row" style="margin-bottom: 5PX;">
                  <div class="col-md-8">
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'CARD_CODE' ? 'selected' :''; ?> value="CARD_CODE">CARD CODE</option>
                           <option <?= $this->input->get('f') == 'START_DATE' ? 'selected' :''; ?> value="START_DATE">START DATE</option>
                           <option <?= $this->input->get('f') == 'TERM_DATE' ? 'selected' :''; ?> value="TERM_DATE">TERM DATE</option>
                           <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
                           <option <?= $this->input->get('f') == 'EXTEND_card' ? 'selected' :''; ?> value="EXTEND_card">EXTEND CARD</option>
                           <option <?= $this->input->get('f') == 'REMARK' ? 'selected' :''; ?> value="REMARK">REMARK</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/card_class');?>" title="reset filters">
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
                        <tr class="">
                           <th>CARD CODE</th>
                           <th>CARD CLASS</th>
                           <th>CARD DESC</th>
                           <th>START DATE</th>
                           <th>TERM DATE</th>
                           <th>STATUS</th>
                           <th>EXTEND CARD</th>
                           <th>REMARK</th>
                           <th>Last Update</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_card_class">
                     <?php foreach($card_classs as $card_class): ?>
                        <tr class="clickable-row"  class="label-default" data-href='<?= site_url('administrator/card_class/view/' . $card_class->CARD_CODE.'/'.$card_class->CLASS_CODE); ?>'>
                           <td><?= _ent($card_class->CARD_CODE); ?></td> 
                           <td><?= _ent($card_class->CLASS_CODE); ?></td>
                           <td><?= _ent($card_class->CLASS_DESC); ?></td>
                           <td><?= _ent($card_class->START_DATE); ?></td> 
                           <td><?= _ent($card_class->TERM_DATE); ?></td> 
                           <td><?= _ent($card_class->STATUS); ?></td> 
                           <td><?= _ent($card_class->EXTEND_CARD); ?></td> 
                           <td><?= _ent($card_class->REMARK); ?></td> 
                           <td><?= _ent($card_class->LAST_UPDATE); ?></td>
                           <td width="200">
                              <?php is_allowed('card_class_view', function($card_class) use ($card_class){?>
                              <a href="<?= site_url('administrator/card_class/view/' . $card_class->CARD_CODE.'/'.$card_class->CLASS_CODE); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('card_class_update', function($card_class) use ($card_class){?>
                              <a href="<?= site_url('administrator/card_class/edit/' . $card_class->CARD_CODE.'/'.$card_class->CLASS_CODE); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('card_class_delete', function($card_class) use ($card_class){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/card_class/delete/' . $card_class->CARD_CODE); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($card_class_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner CARD data is not available
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


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_card_class').serialize();

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
               document.location.href = BASE_URL + '/administrator/card_class/delete?' + serialize_bulk;      
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