
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
        Doctor Qualification        <small>New Doctor Qualification</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor_qualification'); ?>">Doctor Qualification</a></li>
        <li class="active">New</li>
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
                            <h5 class="widget-user-desc">New Doctor Qualification</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_doctor_qualification', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor_qualification', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>

                                                 
							<div class="form-group ">
							   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
							   <i class="required">*</i>
							   </label>
							   <div class="col-sm-8 cust-required-select">
								  <select class="form-control chosen chosen-select-deselect" name="DR_CODE">
									 <option value=""></option>
									 <?php foreach (db_get_all_data('doctor') as $index=>$row): ?>
									 <option value="<?= $row->DR_CODE; ?>"><?= $row->DR_CODE; ?></option>
									 <?php endforeach; ?>  
								  </select>
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							
							<hr>
							
							<div class="form-group ">
							   <label for="QUALIFICATION" class="col-sm-2 control-label">Qualification
							   <i class="required">*</i>
							   </label>
							   <div class="col-sm-8">
								  <input type="text" class="form-control cust-required" name="QUALIFICATION" id="QUALIFICATION" value="<?= set_value('QUALIFICATION'); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							 
							<div class="form-group ">
							   <label for="CERT_YEAR" class="col-sm-2 control-label">Cert Year 
							   <i class="required">*</i>
							   </label>
							   <div class="col-sm-8">
								  <input type="text" class="form-control cust-required" name="CERT_YEAR" id="CERT_YEAR" value="<?= set_value('CERT_YEAR'); ?>">
								  <small class="info help-block">
								  </small>
							   </div>
							</div>
							
							<div class="form-group ">
							   <label for="CERT_COPY" class="col-sm-2 control-label">Cert Copy 
							   </label>
							   <div class="col-sm-8">
								  <div id="doctor_qualification_CERT_COPY_galery"></div>
								  <input class="data_file" name="doctor_qualification_CERT_COPY_uuid" id="doctor_qualification_CERT_COPY_uuid" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_uuid'); ?>">
								  <input class="data_file" name="doctor_qualification_CERT_COPY_name" id="doctor_qualification_CERT_COPY_name" type="hidden" value="<?= set_value('doctor_qualification_CERT_COPY_name'); ?>">
								  <small class="info help-block">
								  <b>Extension file must</b> JPG,PNG,PDF.</small>
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
		
		$('#add_quali_btn').on('click',function(){
                htmlText_Doctor ='<tr><td class="quali-checkbox"><input type="checkbox" name="" value=""></td><td><select type="text" name="DR_CODE[]"><option value="">Select Doctor Code</option><option value=""></option></select></td><td><input type="text" name="PARTNER_DR_CODE[]" value=""></td><td>1</td><td><input type="text" class="datepicker" id="start_date-idx" name="Doctor_START_DATE[]"></td><td><input type="text" class="datepicker" id="end_date-idx" name="Doctor_TERM_DATE[]" ></td><td><input type="text" name="LOC_CODE[]" value=""></td></tr>';
                 idx++;
                 htmlText_Doctor = htmlText_Doctor.replace(/idx/g, idx);
                $('#doctor_tbody').append(htmlText_Doctor);
            
         });


         $('#rm_quali_btn').on('click',function(){
                $('.quali-checkbox input:checked').closest('tr').remove();
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
          url: BASE_URL + '/administrator/doctor_qualification/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id_CERT_COPY = $('#doctor_qualification_CERT_COPY_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_CERT_COPY !== 'undefined') {
                    $('#doctor_qualification_CERT_COPY_galery').fineUploader('deleteFile', id_CERT_COPY);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
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
          // deleteFile: {
          //     enabled: true, 
          //     endpoint: BASE_URL + '/administrator/doctor_qualification/delete_CERT_COPY_file',
          // },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : true,
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
      }); /*end CERT_COPY galery*/
              
 
       
    
    
    }); /*end doc ready*/
</script>