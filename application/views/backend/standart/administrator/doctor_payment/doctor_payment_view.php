
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
      Doctor Payment      <small>Detail Doctor Payment</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor_payment'); ?>">Doctor Payment</a></li>
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
                     <h3 class="widget-user-username">Doctor Payment</h3>
                     <h5 class="widget-user-desc">Detail Doctor Payment</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_doctor_payment" id="form_doctor_payment" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">DR CODE </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE NAME </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE ADDR1 </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_ADDR1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE ADDR2 </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_ADDR2); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE ADDR3 </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_ADDR3); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE ADDR4 </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_ADDR4); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE ADDR5 </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_ADDR5); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PAYEE DISTRICT </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->PAYEE_DISTRICT); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">BANK CLEARING CODE </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->BANK_CLEARING_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ACCOUNT NO </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->ACCOUNT_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ACCOUNT HOLDER </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->ACCOUNT_HOLDER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATOR </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATE DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_payment->CREATE_DATE); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('doctor_payment_update', function($doctor_payment) use ($doctor_payment){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor_payment (Ctrl+e)" href="<?= site_url('administrator/doctor_payment/edit/'.$doctor_payment->DR_CODE); ?>"><i class="fa fa-edit" ></i> Edit Doctor Payment</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/doctor_payment/'); ?>"><i class="fa fa-undo" ></i> Go Doctor Payment List</a>
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
