
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Medical Procedures      <small>Detail Medical Procedures</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/medical_procedures'); ?>">Medical Procedures</a></li>
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
                     <h3 class="widget-user-username">Medical Procedures</h3>
                     <h5 class="widget-user-desc">Detail Medical Procedures</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_medical_procedures" id="form_medical_procedures" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Auto No </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->AUTO_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Specialty Code </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->SP_CODE); ?>
						   
						   <?php 
								$this->db->where("SP_CODE", $medical_procedures->SP_CODE);
								$query = $this->db->get("doctor_specialty_desc")->row();
								
								echo "(".$query->C_DESC." &nbsp; ".$query->E_DESC.")";
						   ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Clinic Procedure </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->CLINIC_PROCEDURE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($medical_procedures->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('medical_procedures_update', function($medical_procedures) use ($medical_procedures){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit medical_procedures" href="<?= site_url('administrator/medical_procedures/edit/'.$medical_procedures->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Medical Procedures</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/medical_procedures/'); ?>"><i class="fa fa-undo" ></i> Go Medical Procedures List</a>
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
