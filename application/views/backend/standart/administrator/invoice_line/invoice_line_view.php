
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Invoice Line      <small>Detail Invoice Line</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/invoice_line'); ?>">Invoice Line</a></li>
      <li class="active">Detail</li>
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
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Invoice Line</h3>
                     <h5 class="widget-user-desc">Detail Invoice Line</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_invoice_line" id="form_invoice_line" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">INVOICE NO </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->INVOICE_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">BATCH NO </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->BATCH_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">INVOICE DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->INVOICE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">INVOICE AMT </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->INVOICE_AMT); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATOR </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATE DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">LAST MODIFIER </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">LAST UPDATE </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->LAST_UPDATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">UF1 </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->UF1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">UF2 </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->UF2); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">UF3 </label>

                        <div class="col-sm-8">
                           <?= _ent($invoice_line->UF3); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('invoice_line_update', function($invoice_line) use ($invoice_line){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit invoice_line (Ctrl+e)" href="<?= site_url('administrator/invoice_line/edit/'.$invoice_line->INVOICE_NO); ?>"><i class="fa fa-edit" ></i> Edit Invoice Line</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/invoice_line/'); ?>"><i class="fa fa-undo" ></i> Go Invoice Line List</a>
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
