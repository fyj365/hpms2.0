
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Agreed Fee        <small>Edit Agreed Fee</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/agreed_fee'); ?>">Agreed Fee</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<style type="text/css">
/*    .largeCheck{
        width: 50px;
        height: 50px;
    }*/
/*    input.largeCheck {
        width: 2em;
    }*/
/*    .form-group {
  width: 50%;
  padding-top:3px;
  padding-bottom: 3px;
  margin-left: 20%!important;
}
.control-label {
  border-right: 1px solid #f4f4f4;
}
.form-group .control-label{
  width: 30%;
}
  .form-group{
    border: 1px solid #f4f4f4;
  }*/
input {
  margin: 10px;
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><?= _ent($agreed_fee->CARD_CODE); ?></h3>
                            <h5 class="widget-user-desc">Edit Agreed Fee</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/agreed_fee/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_agreed_fee', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_agreed_fee', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                 
                                                <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">PARTNER CODE 
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" value="<?= set_value('CARD_CODE', $agreed_fee->CARD_CODE); ?>" readonly>
                            </div>

                         
                        </div>
                        <div class="form-group">
                             <label for="CARD_CODE" class="col-sm-2 control-label">CARD TYPE
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE" value="<?= set_value('CLASS_CODE', $agreed_fee->CLASS_CODE); ?>" readonly>
                            </div>
                            
                        </div>
                                 
                                                <div class="form-group ">
                            <label for="TYPE" class="col-sm-2 control-label">TYPE 
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="TYPE" id="TYPE" value="<?= set_value('TYPE', $agreed_fee->TYPE); ?>" readonly>
                            </div>
                                 
                        </div>
                        <div class="form-group">
                                 <label for="CO_PAY" class="col-sm-2 control-label">CO PAY 
                            </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="CO_PAY" id="CO_PAY" value="<?= set_value('CO_PAY', $agreed_fee->CO_PAY); ?>">
                            </div>
                          <label for="MED_DAYS" class="col-sm-2 control-label">MED DAYS 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="MED_DAYS" id="MED_DAYS" value="<?= set_value('MED_DAYS', $agreed_fee->MED_DAYS); ?>">
                            </div>
                        </div>
                                                 
                    
                        <div class="form-group">
                           <label for="FEE" class="col-sm-2 control-label">FEE 
                            </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="FEE" id="FEE" value="<?= set_value('FEE', $agreed_fee->FEE); ?>">
                        
                            </div>
                               <label for="PAY" class="col-sm-2 control-label">PAY 
                            </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="PAY" id="PAY" value="<?= set_value('PAY', $agreed_fee->PAY); ?>">
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EXTRA_MED_BOL" class="col-sm-2 control-label">EXTRA MED</label>
                           
                            <div class="col-sm-1">
                                <?php if ($agreed_fee->EXTRA_MED_BOL ==1) {
                                 echo '<input type="checkbox" class="flat-red toltip" name="EXTRA_MED_BOL" checked>';
                               } 
                                else{
                                    echo '<input type="checkbox"  class="flat-red toltip" name="EXTRA_MED_BOL">';
                                } ?> 
                            </div>
                                     <label for="LAB_XRAY_BOL" class="col-sm-1 control-label">LAB XRAY </label>
                           
                            <div class="col-sm-1">
                                 <?php if ($agreed_fee->LAB_XRAY_BOL ==1) {
                                 echo '<input type="checkbox" name="LAB_XRAY_BOL" checked class="flat-red toltip">';
                               } 
                                else{
                                    echo '<input type="checkbox" name="LAB_XRAY_BOL" class="flat-red toltip">';
                                } ?> 
                               
                            </div>
                        
                          <label for="SURGICAL_BOL" class="col-sm-1 control-label">SURGICAL</label>
                            
                              <div class="col-sm-1">
                                  <?php if ($agreed_fee->SURGICAL_BOL ==1) {
                                 echo '<input type="checkbox" name="SURGICAL_BOL" checked class="flat-red toltip">';
                               } 
                                else{
                                    echo '<input type="checkbox" name="SURGICAL_BOL" class="flat-red toltip">';
                                } ?>
                             </div>
                        </div>
                                               
                                              
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)">
                            <i class="fa fa-save" ></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)">
                            <i class="fa fa-undo" ></i> Cancel
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i>Loading, Saving data</i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/agreed_fee';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_agreed_fee = $('#form_agreed_fee');
        var data_post = form_agreed_fee.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_agreed_fee.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#agreed_fee_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>