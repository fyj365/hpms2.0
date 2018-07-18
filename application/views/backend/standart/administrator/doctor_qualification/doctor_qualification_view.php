
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor Qualification      <small>Detail Doctor Qualification</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor_qualification'); ?>">Doctor Qualification</a></li>
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
                     <h3 class="widget-user-username">Doctor Qualification</h3>
                     <h5 class="widget-user-desc">Detail Doctor Qualification</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_doctor_qualification" id="form_doctor_qualification" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Qualification Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->QUALIFICATION_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Qualification </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->QUALIFICATION); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Cert Year </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->CERT_YEAR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Cert Copy </label>
                        <div class="col-sm-8">
                             <?php if (is_image($doctor_qualification->CERT_COPY)): ?>
                              <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                <img src="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>" class="image-responsive" alt="image doctor_qualification" title="CERT_COPY doctor_qualification" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a href="<?= BASE_URL . 'administrator/file/download/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                 <img src="<?= get_icon_file($doctor_qualification->CERT_COPY); ?>" class="image-responsive" alt="image doctor_qualification" title="CERT_COPY <?= $doctor_qualification->CERT_COPY; ?>" width="40px"> 
                               <?= $doctor_qualification->CERT_COPY ?>
                               </a>
                               </label>
                              <?php endif; ?>
                        </div>
                    </div>
                                       
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_qualification->LAST_UPDATE); ?>
                        </div>
                    </div>
                                         
                   
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('doctor_qualification_update', function($doctor_qualification) use ($doctor_qualification){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor_qualification" href="<?= site_url('administrator/doctor_qualification/edit/'.$doctor_qualification->QUALIFICATION_CODE); ?>"><i class="fa fa-edit" ></i> Edit Doctor Qualification</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor_qualification/'); ?>"><i class="fa fa-undo" ></i> Go Doctor Qualification List</a>
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
