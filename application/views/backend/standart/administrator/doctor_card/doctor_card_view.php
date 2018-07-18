
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
     Doctor Card     <small>Detail Doctor Card</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor_card'); ?>">Doctor Card</a></li>
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
                     <h3 class="widget-user-username">Doctor Card</h3>
                     <h5 class="widget-user-desc">Detail Doctor Card</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_doctor_card" id="form_doctor_card" >
              
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Card Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->CARD_CODE); ?>
                        </div>
                    </div>
					
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->DR_CODE); ?>
                        </div>
                    </div>
					         <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Center</label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->CENTER_CODE); ?>
                        </div>
                    </div>
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->PARTNER_DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Loc Code </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->LOC_CODE); ?>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Type </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->TYPE1)." &nbsp; "._ent($doctor_card->TYPE2)." &nbsp; "._ent($doctor_card->TYPE3); ?>
                        </div>
                    </div>
					             
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Term Date </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->TERM_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($doctor_card->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('doctor_card_update', function($doctor_card) use ($doctor_card){?>
						<?php $doctor_card->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $doctor_card->LOC_CODE; ?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor_card" href="<?= site_url('administrator/doctor_card/edit/'.$doctor_card->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Partner Doctor</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor_card/'); ?>"><i class="fa fa-undo" ></i> Go Partner Doctor List</a>
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
