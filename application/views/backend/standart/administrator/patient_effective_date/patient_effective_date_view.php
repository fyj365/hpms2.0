
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Patient effective date      <small>Detail Patient effective date</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/patient_effective_date'); ?>">Patient effective date</a></li>
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
                     <h3 class="widget-user-username">Patient effective date</h3>
                     <h5 class="widget-user-desc">Detail Patient effective date</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_patient_effective_date" id="form_patient_effective_date" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Patient Auto No </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->PATIENT_AUTONO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Patient Effective No </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->PATIENT_EFFECTIVE_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Original Term Date </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->ORIGINAL_TERM_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Start Date </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->START_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Term Date </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->TERM_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Status </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->STATUS); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Remark </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->REMARK); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($patient_effective_date->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('patient_effective_date_update', function($patient_effective_date) use ($patient_effective_date){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit patient_effective_date" href="<?= site_url('administrator/patient_effective_date/edit/'.$patient_effective_date->PATIENT_EFFECTIVE_NO); ?>"><i class="fa fa-edit" ></i> Edit Patient effective date</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/patient_effective_date/'); ?>"><i class="fa fa-undo" ></i> Go Patient effective date List</a>
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
