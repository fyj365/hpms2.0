
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Center      <small>Detail Center</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/center'); ?>">Center</a></li>
      <li class="active">Detail</li>
   </ol>
</section>
<style>
.form-group{
	margin-bottom: 6px;
}
</style>
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
                     <h3 class="widget-user-username">Center</h3>
                     <h5 class="widget-user-desc">Detail Center</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_center" id="form_center" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Center Code </label>

                        <div class="col-sm-8">
                           <?= _ent($center->CENTER_CODE); ?>
                        </div>
                    </div> 
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Center Name </label>

                        <div class="col-sm-8">
                           <?= _ent($center->E_NAME)." &nbsp; "._ent($center->C_NAME)." &nbsp;&nbsp; (Open after 8pm "; ?><input type="checkbox" class="flat-red" <?= _ent($center->OPEN_AFTER_EIGHT) == 1 ? "checked" : ""; ?>> )</label>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Tel </label>

                        <div class="col-sm-8">
                           <?= _ent($center->TEL); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Fax </label>

                        <div class="col-sm-8">
                           <?= _ent($center->FAX); ?>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Area</label>

                        <div class="col-sm-8">
                           <?= _ent($center->AREA); ?>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">District </label>

                        <div class="col-sm-4">
                           <?= _ent($center->E_DISTRICT)." &nbsp; "._ent($center->C_DISTRICT); ?>
                        </div>

                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-3">
                           <?= _ent($center->E_ADDR1)."<br>"._ent($center->E_ADDR2)."<br>"._ent($center->E_ADDR3)."<br>"._ent($center->E_ADDR4)."<br>"._ent($center->E_ADDR5); ?>
						</div>
						
						<div class="col-sm-3">
                           <?= _ent($center->C_ADDR1)."<br>"._ent($center->C_ADDR2)."<br>"._ent($center->C_ADDR3)."<br>"._ent($center->C_ADDR4)."<br>"._ent($center->C_ADDR5); ?>
						</div>
                    </div>
                                         
                    
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($center->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($center->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($center->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($center->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('center_update', function($center) use ($center){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit center" href="<?= site_url('administrator/center/edit/'.$center->CENTER_CODE); ?>"><i class="fa fa-edit" ></i> Edit Center</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/center/'); ?>"><i class="fa fa-undo" ></i> Go Center List</a>
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
