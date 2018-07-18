
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partner Doctor Contract      <small>Detail Partner Doctor Contract</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/partner_doctor_contract'); ?>">Partner Doctor Contract</a></li>
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
                     <h3 class="widget-user-username">Partner Doctor Contract</h3>
                     <h5 class="widget-user-desc">Detail Partner Doctor Contract</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_partner_doctor_contract" id="form_partner_doctor_contract" >
              
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->DR_CODE); ?>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->PARTNER_DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Loc Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->LOC_CODE); ?>
                        </div>
                    </div>
					
					 <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->CARD_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Contract No </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->PARTNER_CONTRACT_NO); ?>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Policy No </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->POLICY_NO); ?>
                        </div>
                    </div> 
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Start Date </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->START_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Term Date </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->TERM_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->STATUS); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor_contract->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('partner_doctor_contract_update', function($partner_doctor_contract) use ($partner_doctor_contract){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit partner_doctor_contract" href="<?= site_url('administrator/partner_doctor_contract/edit/'.$partner_doctor_contract->CARD_CODE .'/'.$partner_doctor_contract->DR_CODE.'/'.$partner_doctor_contract->PARTNER_CONTRACT_NO.'/'.$partner_doctor_contract->POLICY_NO); ?>"><i class="fa fa-edit" ></i> Edit Partner Doctor Contract</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/partner_doctor_contract/'); ?>"><i class="fa fa-undo" ></i> Go Partner Doctor Contract List</a>
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
