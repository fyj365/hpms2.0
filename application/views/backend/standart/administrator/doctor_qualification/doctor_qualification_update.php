
<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor Qualification        <small>Edit Doctor Qualification</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_qualification'); ?>">Doctor Qualification</a></li>
        <li class="active">Edit</li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Doctor Qualification</h3>
                            <h5 class="widget-user-desc">Edit Doctor Qualification</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/doctor_qualification/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_doctor_qualification', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_qualification', 
                            'method'  => 'POST'
                            ]); ?>

                                                 
                                                <div class="form-group ">
                            <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" placeholder="DR CODE" value="<?= set_value('DR_CODE', $doctor_qualification->DR_CODE); ?>" readonly>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="QUALIFICATION" class="col-sm-2 control-label">Qualification 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control cust-required" name="QUALIFICATION" id="QUALIFICATION" placeholder="QUALIFICATION" value="<?= set_value('QUALIFICATION', $doctor_qualification->QUALIFICATION); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CERT_YEAR" class="col-sm-2 control-label">Cert Year 
							<i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control cust-required" name="CERT_YEAR" id="CERT_YEAR" placeholder="CERT YEAR" value="<?= set_value('CERT_YEAR', $doctor_qualification->CERT_YEAR); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CERT_COPY" class="col-sm-2 control-label">Cert Copy 
                            </label>
                            <div class="col-sm-8">
                                <div id="doctor_qualification_CERT_COPY_galery"></div>
                                <input class="data_file data_file_uuid" name="doctor_qualification_CERT_COPY_uuid" id="doctor_qualification_CERT_COPY_uuid" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_uuid'); ?>">
                                <input class="data_file" name="doctor_qualification_CERT_COPY_name" id="doctor_qualification_CERT_COPY_name" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_name', $doctor_qualification->CERT_COPY); ?>">
                                <small class="info help-block">
                                <b>Extension file must</b> JPG,PNG,PDF.</small>
                            </div>
                        </div>
                                                 
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save">
                            <i class="fa fa-save" ></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel">
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
              window.location.href = BASE_URL + 'administrator/doctor_qualification';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor_qualification = $('#form_doctor_qualification');
        var data_post = form_doctor_qualification.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_doctor_qualification.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#doctor_qualification_image_galery').find('li').attr('qq-file-id');
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
      
       var params = {};
       params[csrf] = token;

       $('#doctor_qualification_CERT_COPY_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/doctor_qualification/upload_CERT_COPY_file',
              params : params
          },
          deleteFile: {
              enabled: true, // defaults to false
              endpoint: BASE_URL + '/administrator/doctor_qualification/delete_CERT_COPY_file'
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/doctor_qualification/get_CERT_COPY_file/<?= $doctor_qualification->QUALIFICATION_CODE; ?>',
             refreshOnRequest:true
           },
          multiple : false,
          validation: {
              allowedExtensions: ["jpg","png","pdf"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#doctor_qualification_CERT_COPY_galery').fineUploader('getUuid', id);
                   $('#doctor_qualification_CERT_COPY_uuid').val(uuid);
                   $('#doctor_qualification_CERT_COPY_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#doctor_qualification_CERT_COPY_uuid').val();
                  $.get(BASE_URL + '/administrator/doctor_qualification/delete_CERT_COPY_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#doctor_qualification_CERT_COPY_uuid').val('');
                  $('#doctor_qualification_CERT_COPY_name').val('');
                }
              }
          }
      }); /*end CERT_COPY galey*/
              
       
           
    
    }); /*end doc ready*/
</script>