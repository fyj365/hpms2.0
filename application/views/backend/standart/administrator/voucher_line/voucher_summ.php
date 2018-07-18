
<style type="text/css">
  .row{
    margin: 0;
  }
  .Multiple_F{
    width: 100px;
  }
  .table-responsive{
    max-height: 300PX;
  }
  h3{
    margin:0;
    margin-bottom: 5px;
    padding-right: 5px;
    width: 30%!important;
  }
  .pull-right
  {
    padding-left: 300px;
    width: 90%;
  }
i.bg-yellow{
    font-size: 13px;
    display: inline-block;
    margin-left: 5px;
    padding-top: 5px;
    width:80px;
    height: 25px;
  }
</style>
<section class="content">
   <div class="row" >  
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
        
                  <form name="form_voucher_line" id="form_voucher_line" action="<?= base_url('administrator/voucher_line/index_3'); ?>">
                   <div class="row ">

<!--                       <div class="col-sm-2 padd-left-0  " >
                        <input type="text" class="form-control datepicker" name="d" id="RECEIVE_DATE" placeholder="" value="">
                     </div> -->
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                           <option <?= $this->input->get('f') == 'BATCH_NO' ? 'selected' :''; ?> value="BATCH_NO">BATCH NO</option>
                            <option <?= $this->input->get('f') == 'TREATMENT_DATE' ? 'selected' :''; ?> value="TREATMENT_DATE">TREATMENT DATE</option>
                           <option selected <?= $this->input->get('f') == 'RECEIVE_DATE' ? 'selected' :''; ?> value="RECEIVE_DATE" >RECEIVE DATE</option>
                           <option <?= $this->input->get('f') == 'COM_ID' ? 'selected' :''; ?> value="COM_ID">PARTNER CODE</option>
                            <option <?= $this->input->get('f') == 'PARTNER_DR_CODE' ? 'selected' :''; ?> value="PARTNER_DR_CODE">DR CODE</option>
                           <option <?= $this->input->get('f') == 'VOUCHER_NO' ? 'selected' :''; ?> value="VOUCHER_NO">VOUCHER NO</option>
                           <option <?= $this->input->get('f') == 'CARD_CODE' ? 'selected' :''; ?> value="CARD_CODE">CARD TYPE</option>
                        </select>
                     </div>
                       <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="submit" class="btn btn-default Multiple_F" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/voucher_line/index_3');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>

                    
                 <h3>OPEN VOUCHER <i class="label bg-yellow" id="voucher_line_NO"><?= count($voucher_line_tems); ?>items </i> </h3>

                <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                                
                        <tr class="">
                           <th>BATCH NO</th>
                            <th>VOUCHER NO</th>
                           <th>COMPANY</th>
                           <th>CARD TYPE</th>
                           <th>TREATMENT DATE</th>
                           <th>RECEIVE DATE</th>
                           <th>DR CODE</th>
                           <th>STATUS</th>
                           <th>CREATOR</th>
                           <th>CREATE DATE</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line_tem">
                     <?php foreach($voucher_line_tems as $voucher_line_tem): ?>
                        <tr>
                           <td class="bt_no"><?= _ent($voucher_line_tem->BATCH_NO); ?></td> 
                           <td class="voucher_no"><?= _ent($voucher_line_tem->VOUCHER_NO); ?></td> 
                           <td><?= _ent($voucher_line_tem->COM_ID); ?></td> 
                           <td><?= _ent($voucher_line_tem->CARD_CODE); ?></td>
                           <td><?= _ent($voucher_line_tem->TREATMENT_DATE); ?></td>
                           <td><?= _ent($voucher_line_tem->RECEIVE_DATE); ?></td>
                           <td><?= _ent($voucher_line_tem->PARTNER_DR_CODE); ?></td> 
                           <td><?= _ent($voucher_line_tem->STATUS); ?></td>
                           <td><?= _ent($voucher_line_tem->CREATOR); ?></td>
                           <td><?= _ent($voucher_line_tem->CREATE_DATE); ?></td> 
                       
                        </tr>
                      <?php endforeach; ?>
                      <?php if (count($voucher_line_tems) == 0) :?>
                         <tr>
                           <td colspan="100">
                           Voucher Line data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
                 <h3>COMPLETED VOUCHER<i class="label bg-yellow" id="voucher_line_NO"><?= count($voucher_lines); ?> items</i></h3>
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                          <tr class="">
                           <th>BATCH NO</th>
                           <th>VOUCHER NO</th>
                           <th>COMPANY</th>
                           <th>CARD TYPE</th>
                           <th>TREATMENT DATE</th>
                           <th>RECEIVE DATE</th>
                           <th>DR CODE</th>
                           <th>DR E NAME</th>
                           <th>DR C NAME</th>
                           <th>PATIENT CODE</th>
                           <th>PATIENT NAME</th>
                           <th>DEPD CODE</th>
                           <th>TYPE</th>
                           <th>FEE AMT</th>
                           <th>PAY AMT</th>
                      <!--      <th>CREATOR</th>
                           <th>CREATE DATE</th> -->
                           <th>LAST MODIFIER</th>
                           <th>LAST UPDATE</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line">
                     <?php foreach($voucher_lines as $voucher_line): ?>
                        <tr>
                           <td><?= _ent($voucher_line->BATCH_NO); ?></td> 
                           <td><?= _ent($voucher_line->VOUCHER_NO); ?></td> 
                           <td><?= _ent($voucher_line->COM_ID); ?></td> 
                           <td><?= _ent($voucher_line->CARD_CODE); ?></td>
                           <td><?= _ent($voucher_line->TREATMENT_DATE); ?></td> 
                           <td><?= _ent($voucher_line->RECEIVE_DATE); ?></td>
                           <td><?= _ent($voucher_line->DR_CODE); ?></td> 
                           <td><?= _ent($voucher_line->DR_E_NAME); ?></td> 
                           <td><?= _ent($voucher_line->DR_C_NAME); ?></td> 
                           <td><?= _ent($voucher_line->PATIENT_CODE); ?></td> 
                           <td><?= _ent($voucher_line->PATIENT_NAME); ?></td> 
                           <td><?= _ent($voucher_line->DEPD_CODE); ?></td> 
                           <td><?= _ent($voucher_line->TYPE); ?></td> 
                           <td><?= _ent($voucher_line->FEE_AMT); ?></td> 
                           <td><?= _ent($voucher_line->PAY_AMT); ?></td> 
                      <!--      <td><?= _ent($voucher_line->CREATOR); ?></td>
                           <td><?= _ent($voucher_line->CREATE_DATE); ?></td> -->
                           <td><?= _ent($voucher_line->LAST_MODIFIER); ?></td> 
                           <td><?= _ent($voucher_line->LAST_UPDATE); ?></td> 
                           <td>
                              <?php is_allowed('voucher_line_view', function($voucher_line) use ($voucher_line){?>
                              <a href="<?= site_url('administrator/voucher_line/view/' . $voucher_line->VOUCHER_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> 
                              <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if (count($voucher_lines) == 0) :?>
                         <tr>
                           <td colspan="100">
                           Voucher Line data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
                
           
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
              
                  </form>                

               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<script type="text/javascript">
  $('document').ready(function(){
      // var today = new Date();
      // var year = today.getFullYear();
      // var month =today.getMonth()+1;
      // var date = today.getDate();

      // var date_str = year + '-' + month+ '-'+ date;
      // $('#RECEIVE_DATE').prop('value',date_str);
    });
</script>
