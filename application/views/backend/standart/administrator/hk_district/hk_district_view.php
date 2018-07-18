
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
      Hk District      <small>Detail Hk District</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/hk_district'); ?>">Hk District</a></li>
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
                     <h3 class="widget-user-username">Hk District</h3>
                     <h5 class="widget-user-desc">Detail Hk District</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_hk_district" id="form_hk_district" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">AUTO NO </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->AUTO_NO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">REGION </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->REGION); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ENG DISTRICT </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->ENG_DISTRICT); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CHI DISTRICT </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->CHI_DISTRICT); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">UF1 </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->UF1); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">UF2 </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->UF2); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">UF3 </label>

                        <div class="col-sm-8">
                           <?= _ent($hk_district->UF3); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('hk_district_update', function($hk_district) use ($hk_district){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit hk_district (Ctrl+e)" href="<?= site_url('administrator/hk_district/edit/'.$hk_district->AUTO_NO); ?>"><i class="fa fa-edit" ></i> Edit Hk District</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/hk_district/'); ?>"><i class="fa fa-undo" ></i> Go Hk District List</a>
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
