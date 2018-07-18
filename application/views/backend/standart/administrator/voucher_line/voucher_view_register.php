
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Registered Voucher
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/voucher_line'); ?>">Voucher</a></li>
        <li class="active">New</li>
    </ol>
</section>
<style type="text/css">
	hr{
		margin-top: 0;
		margin-bottom: 10px;
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
                        <?= form_open('', [
                            'name'    => 'form_voucher_line', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_voucher_line', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
							
						<div class="form-group">
						
							<label for="BATCH_NO" class="col-sm-2 control-label">Batch No. 
						   </label>
						   <div class="col-sm-4">
						    <?php echo $voucher_register->BATCH_NO; ?>
						   </div>
						    <button type="button" style="background: green;color: white"><a style="color: white"  href="<?= site_url('administrator/voucher_line/add/'.$voucher_register->VOUCHER_NO); ?>" class="btn btn-defult"> Update</a></button> 
						</div>
						<hr>
                        <div class="form-group">

						   <label for="TREATMENT_DATE" class="col-sm-2 control-label">Treatment Date 
						   </label>
						   <div class="col-sm-6">
						     <?php echo $voucher_register->TREATMENT_DATE; ?>

						   </div>
				
						
						</div>
												<hr>
						<div class="form-group">
						   <label for="RECEIVE_DATE" class="col-sm-2 control-label">Receive Date
						   </label>
						   <div class="col-sm-6">
								 <?php echo $voucher_register->RECEIVE_DATE; ?>
						   </div>		   
						</div>
						<hr>

						<div class="form-group">
						   <label for="VOUCHER_NO" class="col-sm-2 control-label">Voucher No.  
						   </label>
						   <div class="col-sm-6">
						   		   	<?php echo $voucher_register->VOUCHER_NO; ?>
						   </div>
						</div>
						<hr>
						
						<div class="form-group">
						   <label for="DR_CODE" class="col-sm-2 control-label">Doctor Code 
						   </label>
						   <div class="col-sm-6">
						   	<?php echo $voucher_register->PARTNER_DR_CODE; ?>
						   </div>
						</div>
												<hr>

						<div class="form-group">
						   <label for="CARD_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-6">
				         	<?php echo $voucher_register->CARD_CODE; ?>

						   </div>
						</div>
												<hr>

						<div class="form-group">
						   <label for="CLASS_CODE" class="col-sm-2 control-label">Card Type
						   </label>
						   <div class="col-sm-6">
								 <?php echo $voucher_register->COM_ID; ?>
						   </div>		   
						</div>
							<hr>
								<div class="form-group">
						   <label for="CLASS_CODE" class="col-sm-2 control-label">CREATOR
						   </label>
						   <div class="col-sm-6">
								 <?php echo $voucher_register->CREATOR; ?>
						   </div>		   
						</div>
													<hr>

								<div class="form-group">
						   <label for="CLASS_CODE" class="col-sm-2 control-label">CREATE DATE
						   </label>
						   <div class="col-sm-6">
								 <?php echo $voucher_register->CREATE_DATE; ?>
						   </div>		   
						</div>
													<hr>

							<div class="form-group">
						   <label for="CLASS_CODE" class="col-sm-2 control-label">LAST MODIFIER
						   </label>
						   <div class="col-sm-6">
								 <?php echo $voucher_register->LAST_MODIFIER; ?>
						   </div>		   
						</div>
													<hr>

							<div class="form-group">
						   <label for="CLASS_CODE" class="col-sm-2 control-label">LAST UPDATE
						   </label>
						   <div class="col-sm-6">
								 <?php echo $voucher_register->LAST_UPDATE; ?>
						   </div>		   
						</div>
						
                     

                        <div class="message"></div>
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
		

       
 
       
    
    
    }); /*end doc ready*/
</script>