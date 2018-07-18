
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Bank      <small>Detail Bank</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/bank'); ?>">Bank</a></li>
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
                     <h3 class="widget-user-username">Bank</h3>
                     <h5 class="widget-user-desc">Detail Bank</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_bank" id="form_bank" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Clearing Code </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->CLEARING_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">English Name </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->E_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Chinese Name </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->C_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($bank->LAST_UPDATE); ?>
                        </div>
                    </div>
                                         
                   
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('bank_update', function($bank) use ($bank){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit bank" href="<?= site_url('administrator/bank/edit/'.$bank->CLEARING_CODE); ?>"><i class="fa fa-edit" ></i> Edit Bank</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/bank/'); ?>"><i class="fa fa-undo" ></i> Go Bank List</a>
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
