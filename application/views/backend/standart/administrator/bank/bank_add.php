
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bank        <small>New Bank</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/bank'); ?>">Bank</a></li>
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
                            <h3 class="widget-user-username">Bank</h3>
                            <h5 class="widget-user-desc">New Bank</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_bank', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_bank', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                          <div class="form-group ">
                            <label for="SELECT_BANK" class="col-sm-2 control-label">Select Bank
							<i class="required">*</i>
                            </label>
							<div class="col-sm-8">
                             <select  class="form-control form-control chosen chosen-select-deselect" name="SELECT_BANK[]" id="SELECT_BANK" >
                              <option value=""></option>
							  <option selected value="003-渣打銀行(香港)有限公司-Standard Chartered Bank (Hong Kong) Limited">(003) 渣打銀行(香港)有限公司 Standard Chartered Bank (Hong Kong) Limited</option>
							  <option value="004-香港上海滙豐銀行有限公司-The Hongkong and Shanghai Banking Corporation Limited">(004) 香港上海滙豐銀行有限公司 The Hongkong and Shanghai Banking Corporation Limited</option>
							  <option value="005-東方匯理銀行-Credit Agricole Corporate and Investment Bank">(005) 東方匯理銀行 Credit Agricole Corporate and Investment Bank</option>
							  <option value="006-花旗銀行有限公司-Citibank National Association">(006) 花旗銀行有限公司 Citibank National Association</option>
							  <option value="007-摩根大通銀行-JP Morgan Chase Bank, N.A.">(007) 摩根大通銀行 JP Morgan Chase Bank, N.A.</option>
							  <option value="008-蘇格蘭皇家銀行-The Royal Bank of Scotland plc">(008) 蘇格蘭皇家銀行 The Royal Bank of Scotland plc</option>
							  <option value="009-中國建設銀行(亞洲)股份有限公司-China Construction Bank (Asia) Corporation Limited">(009) 中國建設銀行(亞洲)股份有限公司 China Construction Bank (Asia) Corporation Limited</option>
							  <option value="012-中國銀行(香港)有限公司-Bank of China (Hong Kong) Limited">(012) 中國銀行(香港)有限公司 Bank of China (Hong Kong) Limited</option>
							  <option value="015-東亞銀行有限公司-The Bank of East Asia Limited">(015) 東亞銀行有限公司 The Bank of East Asia Limited</option>
							  <option value="016-星展銀行(香港)有限公司-DBS Bank (Hong Kong) Limited">(016) 星展銀行(香港)有限公司 DBS Bank (Hong Kong) Limited</option>
							  <option value="018-中信銀行國際有限公司-China CITIC Bank International Limited">(018) 中信銀行國際有限公司 China CITIC Bank International Limited</option>
							  <option value="020-永隆銀行有限公司-Wing Lung Bank Limited">(020) 永隆銀行有限公司 Wing Lung Bank Limited</option>
							  <option value="002-華僑銀行有限公司-OCBC BANK Limited">(022) 華僑銀行有限公司 OCBC BANK Limited</option>
							  <option value="024-恒生銀行有限公司-Hang Seng Bank Limited">(024) 恒生銀行有限公司 Hang Seng Bank Limited</option>
							  <option value="025-上海商業銀行有限公司-Shanghai Commercial Bank">(025) 上海商業銀行有限公司 Shanghai Commercial Bank</option>
							  <option value="027-交通銀行有限公司-BANK OF COMMUNICATIONS CO., LTD.">(027) 交通銀行有限公司 BANK OF COMMUNICATIONS CO., LTD.</option>
							  <option value="028-大眾銀行(香港)有限公司-Public Bank (Hong Kong) Limited">(028) 大眾銀行(香港)有限公司 Public Bank (Hong Kong) Limited</option>
							  <option value="035-華僑永亨銀行有限公司-OCBC Wing Hang Bank Limited">(035) 華僑永亨銀行有限公司 OCBC Wing Hang Bank Limited</option>
							  <option value="039-集友銀行有限公司-Chiyu Banking Corporation Limited">(039) 集友銀行有限公司 Chiyu Banking Corporation Limited</option>
							  <option value="040-大新銀行有限公司-Dah Sing Bank Limited">(040) 大新銀行有限公司 Dah Sing Bank Limited</option>
							  <option value="041-創興銀行有限公司-Chong Hing Bank">(041) 創興銀行有限公司 Chong Hing Bank</option>
							  <option value="043-南洋商業銀行有限公司-Nanyang Commercial Bank">(043) 南洋商業銀行有限公司 Nanyang Commercial Bank</option>
							  <option value="049-盤谷銀行-Bangkok Bank">(049) 盤谷銀行 Bangkok Bank</option>
							  <option value="055-美國銀行-Bank of America">(055) 美國銀行 Bank of America</option>
							  <option value="056-法國巴黎銀行-BNP PARIS">(056) 法國巴黎銀行 BNP PARIS</option>
							  <option value="061-大生銀行有限公司-Tai Sang Bank">(061) 大生銀行有限公司 Tai Sang Bank</option>
							  <option value="063-馬來亞銀行-May Bank">(063) 馬來亞銀行 May Bank</option>
							  <option value="071-大華銀行-United Overseas Bank">(071) 大華銀行 United Overseas Bank</option>
							  <option value="072-中國工商銀行(亞洲)有限公司-Industrial and Commercial Bank of China (Asia)">(072) 中國工商銀行(亞洲)有限公司 Industrial and Commercial Bank of China (Asia)</option>
							  <option value="074-巴克萊銀行-Barclays Bank PLC">(074) 巴克萊銀行 Barclays Bank PLC</option>
							  <option value="075-N/A-Manufacturers Hanover Trust Company">(075) Manufacturers Hanover Trust Company</option>
							  <option value="076-加拿大豐業銀行-Bank of Nova Scotia (THE)">(076) 加拿大豐業銀行 Bank of Nova Scotia (THE)</option>
							  <option value="079-N/A-Lloyds Bank PLC">(079) Lloyds Bank PLC</option>
							  <option value="080-N/A-Royal Bank of Canada">(080) Royal Bank of Canada</option>
							  <option value="128-富邦銀行(香港)有限公司-Fubon Bank (Hong Kong) Limited">(128) 富邦銀行(香港)有限公司 Fubon Bank (Hong Kong) Limited</option>
							  <option value="196-標準銀行亞洲有限公司-STANDARD BANK ASIA LIMITED">(196) 標準銀行亞洲有限公司 STANDARD BANK ASIA LIMITED</option>
							  <option value="250-花旗銀行(香港)有限公司-CitiBank (Hong Kong) Limited">(250) 花旗銀行(香港)有限公司 CitiBank (Hong Kong) Limited</option>
                           </select>
						   <small class="info help-block">
						   </small>
						   </div>
                        </div>
						
						<hr>
						
						<div class="form-group ">
						   <label class="col-sm-6" style="color:blue;">Custom Bank:
							<small class="info help-block">(Please clear the selected option for open custom input)</small>
						   </label>
						</div>
						
						<div class="form-group ">
						   <label for="CLEARING_CODE" class="col-sm-2 control-label">Bank Clearing Code
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-bank" name="CLEARING_CODE" id="CLEARING_CODE" value="<?= set_value('CLEARING_CODE'); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="E_NAME" class="col-sm-2 control-label">English Name 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-bank" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME'); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-bank" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME'); ?>" readonly>
							  <small class="info help-block">
							  </small>
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
		
		$("#SELECT_BANK").change(function() {
			var selectedbank = $("#SELECT_BANK").val();
			
			if (selectedbank == ""){
				$('.cust-bank').attr("readonly", false);
			}else{
				$('.cust-bank').val("");
				$('.cust-bank').attr("readonly", true);
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
              window.location.href = BASE_URL + 'administrator/bank';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_bank = $('#form_bank');
        var data_post = form_bank.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/bank/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
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
      
       
 
       
    
    
    }); /*end doc ready*/
</script>