
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
        CARD CLASS        <small>Edit CARD CLASS</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/card_class'); ?>">CARD CLASS</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<style type="text/css">
    input{
        margin: 10px;
        }
    button{
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
                            <h3 class="widget-user-username">Card Class</h3>
                            <h5 class="widget-user-desc">Edit Card Class</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/card_class/edit_save/'.$card_class->CARD_CODE.'/'.$card_class->CLASS_CODE), [
                            'name'    => 'form_card_class', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_card_class', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="CARD_CODE" class="col-sm-2 control-label">PARTNER CODE</label> 
                            
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="CARD_CODE" id="CARD_CODE" placeholder="PARTNER CODE" value="<?= set_value('CARD_CODE', $card_class->CARD_CODE); ?>" readonly>
                            </div>
                                 <label for="STATUS" class="col-sm-2 control-label">STATUS 
                            </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="STATUS" id="STATUS" placeholder="STATUS" value="<?= set_value('STATUS', $card_class->STATUS); ?>"  readonly>
                            </div>
                            <div class="col-sm-2">
                                 <button type="button" class="btn btn-danger" id="btn_term">Terminate</button>
                            </div>
                        </div>
 
                                      
                        <div class="form-group">
                            <label for="CARD_CODE" class="col-sm-2 control-label">Card TYPE </label>
                          
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="CLASS_CODE" id="CLASS_CODE" value="<?= set_value('CLASS_CODE', $card_class->CLASS_CODE); ?>" readonly>
                            </div>
                            <label for="CARD_CODE" class="col-sm-2 control-label">Card NAME</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="CLASS_DESC" id="CLASS_DESC"  value="<?= set_value('CLASS_DESC', $card_class->CLASS_DESC); ?>">
                            </div>
                        </div>

                                           
                                                 
                                                <div class="form-group ">
                            <label for="START_DATE" class="col-sm-2 control-label">START DATE </label>
                            
                            <div class="col-sm-2">
                              <input type="text" class="form-control datepicker" name="START_DATE"  id="START_DATE" value="<?= set_value('card_class_START_DATE_name', $card_class->START_DATE); ?>" READONLY>
                            </div>
                            <label for="TERM_DATE" class="col-sm-2 control-label">TERM DATE  </label>
                           
                            <div class="col-sm-2">
                              <input type="text" class="form-control datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('card_class_TERM_DATE_name', $card_class->TERM_DATE); ?>" readonly>
                            </div>
                           
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-info" id="btn_extend">Extend Card</button>
                            </div>
                        </div>
                                                                    
                                                 
                                                <div class="form-group ">
                            <label for="REMARK" class="col-sm-2 control-label">REMARK 
                            </label>
                            <div class="col-sm-8">
                                <textarea id="REMARK" name="REMARK" rows="5" class="textarea"><?= set_value('REMARK', $card_class->REMARK); ?></textarea>
                                <small class="info help-block">
                                </small>
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
      $("#START_DATE").datetimepicker({
                     format:'Y-m-d',
                      onShow:function( ct ){
                       this.setOptions({
                        maxDate:jQuery('#TERM_DATE').val()?jQuery('#TERM_DATE').val():false
                       })
                      },
                      timepicker:false                            
        });
    $("#TERM_DATE").datetimepicker({
                    format:'Y-m-d',
                     onShow:function( ct ){
                    this.setOptions({
                    minDate:jQuery('#START_DATE').val()?jQuery('#START_DATE').val():false
                    })
                   },
                   timepicker:false
                });
  $(document).ready(function(){

     $('#btn_extend').on('click',function(){
        var roVal =  $('#TERM_DATE').prop('readonly');
        var status = $('#STATUS').val();
        if (status != 'Terminate') {
            $('#TERM_DATE').prop('readonly',!roVal);
        } else{
            swal("The CARD has been terminated");
        }
     });

     $('#btn_term').on('click',function(){
        var status = $('#STATUS').val();
        alert(status);
        if (status =='Active' || status =='Not Start') {
            swal({
            title: "Are you sure?",
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
            var CARD_CODE = $('#CARD_CODE').val();
            var CARD_No = $('#card_class_NO').val();
            var CLASS_CODE = $('#CLASS_CODE').val();
            $.ajax({
                url:BASE_URL + 'administrator/card_class/term_card3',
                dataType:'JSON',
                data:{'CARD_CODE':CARD_CODE, 'CARD_No':CARD_No, 'CLASS_CODE':CLASS_CODE},
                method:'GET',
                success:function(res){
                    // console.log(res.affected_rows);
                    window.location.reload();
                }
            });
            }
          });
         return false;
        } else{
           swal("The CARD has been terminated");
        }
        });
             
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
              window.location.href = BASE_URL + 'administrator/card_class';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_card_class = $('#form_card_class');
        var data_post = form_card_class.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_card_class.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#card_class_image_galery').find('li').attr('qq-file-id');
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