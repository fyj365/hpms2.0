
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Website Login      <small>Detail Website Login</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/website_login'); ?>">Website Login</a></li>
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
                     <h3 class="widget-user-username">Website Login</h3>
                     <h5 class="widget-user-desc">Detail Website Login</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_website_login" id="form_website_login" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Auto No </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->AUTO_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Code </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->CARD_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Website Account </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->WEBSITE_ACCOUNT); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Website Password </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->WEBSITE_PASSWORD); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($website_login->LAST_UPDATE); ?>
                        </div>
                    </div>

                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('website_login_update', function($website_login) use ($website_login){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit website_login" href="<?= site_url('administrator/website_login/edit/'.$website_login->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Website Login</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/website_login/'); ?>"><i class="fa fa-undo" ></i> Go Website Login List</a>
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
