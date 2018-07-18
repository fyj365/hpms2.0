
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
<style type="text/css">
  div.col-sm-2{
    padding-top: 7px;
  }
</style>
<section class="content-header">
   <h1>
      Voucher Line  <?php $time = Date('Y-M-d H:i:s'); echo $time; ?>  <small>Detail Voucher Line</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher Line</a></li>
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
                     <h3 class="widget-user-username">Voucher Line</h3>
                     <h5 class="widget-user-desc">Detail Voucher Line</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_voucher_line" id="form_voucher_line" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">BATCH NO </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->BATCH_NO); ?>
                        </div>
                         <label for="content" class="col-sm-2 control-label">TREATMENT  DATE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->TREATMENT_DATE); ?>
                        </div>
                        <label for="content" class="col-sm-2 control-label">RECEIVE DATE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->RECEIVE_DATE); ?>
                        </div>
                         
                    </div>
                                         
        
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">COMPANY ID</label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->COM_ID); ?>
                        </div>

                         <label for="content" class="col-sm-2 control-label">CARD TYPE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->CARD_CODE); ?>
                        </div>
                        <label for="content" class="col-sm-2 control-label">VOUCHER NO </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->VOUCHER_NO); ?>
                        </div>
                    </div>
                                         
                                <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">DR CODE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->DR_CODE); ?>
                        </div>
                               <label for="content" class="col-sm-2 control-label">DR CODE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->PARTNER_DR_CODE); ?>
                        </div>
                           <label for="content" class="col-sm-2 control-label">DR E NAME </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->DR_E_NAME); ?>
                        </div>
                        
                    </div>
                                         
                    <div class="form-group ">
                   <label for="content" class="col-sm-2 control-label">DR C NAME </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->DR_C_NAME); ?>
                        </div>
                       
                    </div>
                                         
                
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PATIENT CODE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->PATIENT_CODE); ?>
                        </div>
                          <label for="content" class="col-sm-2 control-label">PATIENT HKID </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->PATIENT_HKID); ?>
                        </div>
                          <label for="content" class="col-sm-2 control-label">PATIENT E NAME </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->PATIENT_NAME); ?>
                        </div>
                      
                    </div>
                                         
                     <div class="form-group">
                          <label for="content" class="col-sm-2 control-label">DEPD CODE </label>

                        <div class="col-sm-8">
                           <?= _ent($voucher_line->DEPD_CODE); ?>
                        </div>
                     </div>
                                         
                    <div class="form-group ">
                      <label for="content" class="col-sm-2 control-label">SL FROM </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->SL_FROM); ?>
                        </div>
                    
                      <label for="content" class="col-sm-2 control-label">SL TO </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->SL_TO); ?>
                        </div>

                            <label for="content" class="col-sm-2 control-label">SICK LEAVE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->SICK_LEAVE); ?>
                        </div>
                    </div>
                                         
                                                                  
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">DIAG CODE1 </label>

                        <div class="col-sm-8">
                           <?= _ent($voucher_line->DIAG_CODE1);echo ','; ?><?= _ent($voucher_line->DIAG_DESC1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">DIAG CODE2 </label>

                        <div class="col-sm-8">
                           <?= _ent($voucher_line->DIAG_CODE2);echo ','; ?> <?= _ent($voucher_line->DIAG_DESC2); ?>

                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">DIAG CODE3 </label>

                        <div class="col-sm-8">
                           <?= _ent($voucher_line->DIAG_CODE3);echo ','; ?>   <?= _ent($voucher_line->DIAG_DESC3); ?>
                        </div>
                    </div>
                                         
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">TYPE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->TYPE); ?>
                        </div>
                     <label for="content" class="col-sm-2 control-label">CO PAY </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->CO_PAY); ?>
                        </div>

                    </div>
                                         
                               
                                  
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">EXTRA MED BOL </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->EXTRA_MED_BOL); ?>
                        </div>
                        <label for="content" class="col-sm-2 control-label">EXTRA MED </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->EXTRA_MED); ?>
                        </div>
                    </div>
                                         
                              
                          
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">LAB XRAY BOL </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->LAB_XRAY_BOL); ?>
                        </div>
                            <label for="content" class="col-sm-2 control-label">LAB XRAY </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->LAB_XRAY); ?>
                        </div>
                    </div>

                                         
                    <div class="form-group ">
                         <label for="content" class="col-sm-2 control-label">SURGICAL BOL </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->SURGICAL_BOL); ?>
                        </div>
                        <label for="content" class="col-sm-2 control-label">SURGICAL </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->SURGICAL); ?>
                        </div>
                          <label for="content" class="col-sm-2 control-label">APPROVAL CODE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->APPROVAL_CODE); ?>
                        </div>
                    </div>
     
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">FEE AMT </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->FEE_AMT); ?>
                        </div>
                                             <label for="content" class="col-sm-2 control-label">PAY AMT </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->PAY_AMT); ?>
                        </div>
                    </div>
                 
                                         
                                         
                    <div class="form-group ">
                     
                    </div>
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATOR </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->CREATOR); ?>
                        </div>
                        <label for="content" class="col-sm-2 control-label">CREATE DATE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                            
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">LAST MODIFIER </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->LAST_MODIFIER); ?>
                        </div>
                          <label for="content" class="col-sm-2 control-label">LAST UPDATE </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->LAST_UPDATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                      
                             <label for="content" class="col-sm-2 control-label">REFERRAL DR </label>

                        <div class="col-sm-2">
                           <?= _ent($voucher_line->REFERRAL_DR); ?>
                        </div>

                    </div>
                                         
    
                     
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('voucher_line_update', function($voucher_line) use ($voucher_line){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit voucher_line (Ctrl+e)" href="<?= site_url('administrator/voucher_line/edit/'.$voucher_line->VOUCHER_NO); ?>"><i class="fa fa-edit" ></i> Edit Voucher Line</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/voucher_line/index_2'); ?>"><i class="fa fa-undo" ></i> Go Voucher Line List</a>
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