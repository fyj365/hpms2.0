<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Voucher Line Controller
*| --------------------------------------------------------------------------
*| Voucher Line site
*| 
*/ 
class Voucher_line_tmp extends Admin	
{
	
	public function __construct()
	{
		parent::__construct(); 

		$this->load->model('model_voucher_line_tmp');
	}

	/**
	* show all Voucher Lines
	*
	* @var $offset String
	*/

	// DEFAULT INDEX PAGE  AND SIMPLE FILTER
	public function index($offset = 0)  // index page single filter
	{
		$this->is_allowed('voucher_register_list');
 
		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['voucher_line_tems'] = $this->model_voucher_line_tmp->get($filter, $field, $this->limit_page, $offset);
		$this->data['voucher_line_tems_counts'] = $this->model_voucher_line_tmp->count_all($filter, $field);
		$this->data['Multiple_filter'] = FALSE;


		$config = [
			'base_url'     => 'administrator/voucher_line_tmp/index/',
			'total_rows'   => $this->model_voucher_line_tmp->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];


		$this->data['pagination'] = $this->pagination($config);
		$this->template->title('Registered Voucher  List');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_tmp_list', $this->data);

	}

    
    public function Mypagination(){
	    $this->load->library('pagination');
	
		$data_str = $this->input->get('data');
        $params = array();
        parse_str($data_str,$params);
	   
		    $config = [
            'suffix'           => isset($_GET)?'?'.http_build_query($_GET):'',
            'base_url'         => 'administrator/voucher_line_tmp/Mypagination/',
            'total_rows'       => $this->model_voucher_line_tmp->count_all2($params),
            'per_page'         => $this->limit_page,
            'uri_segment'      => 4,
            'use_page_numbers' => TRUE,
            'num_links'        => 1,
            'num_tag_open'     => '<li>',
            'num_tag_close'    => '</li>',
            'full_tag_open'    => '<ul class="pagination Mypagination">',
            'full_tag_close'   => '</ul>',
            'first_link'       => 'First',
            'first_tag_open'   => '<li>',
            'first_tag_close'  => '</li>',
            'last_link'        => 'Last',
            'last_tag_open'    => '<li>',
            'last_tag_close'   => '</li>',
            'next_link'        => 'Next',
            'next_tag_open'    => '<li>',
            'next_tag_close'   => '</li>',
            'prev_link'        => 'Prev',
            'prev_tag_open'    => '<li>',
            'prev_tag_close'   => '</li>',
            'cur_tag_open'     => '<li class="active"><a href="#">',
            'cur_tag_close'    => '</a></li>',
        ];
             
             $this->pagination->initialize($config);
             $page = $this->uri->segment(4);
             $start = ($page - 1) *  $this->limit_page;

             $output = array(
             	'pagination_link' => $this->pagination->create_links(),
             	'voucher_data' => $this->model_voucher_line_tmp->get2($params, $this->limit_page, $start),
             	'voucher_line_counts' =>  $this->model_voucher_line_tmp->count_all2($params)
             );
             
             echo json_encode($output);
	}

	/**
	* Add new voucher_lines
	*
	*/
	//For registration
	public function add_register()
	{
		$this->is_allowed('voucher_register_add');
		$this->template->title('Registration Voucher');

		$this->render('backend/standart/administrator/voucher_line/voucher_line_add_register', $this->data);
	}
	
	public function edit_register(){
		$this->is_allowed('voucher_register_update');
		$this->template->title('Registration Voucher');
		
		$this->db->SELECT('CARD_CODE');
		$this->db->group_by('CARD_CODE');
		$query = $this->db->get('partner_card');
		$this->data['CARD_CODE'] = $query->result();

		$this->db->select('*');
		$this->db->from('voucher_line_temp');
		$this->db->order_by('BATCH_NO','ASC');
		$query = $this->db->get();

		$this->data['voucher_line_tems'] = $query->result();

		$this->render('backend/standart/administrator/voucher_line/voucher_line_tmp_list', $this->data);
	}
	 

	
		//For registration
	public function company_change(){

		// get Active Company's Card
		$COM_ID = $this->input->get('COM_ID');
		
		$this->db->where('COM_ID', $COM_ID);
		$this->db->where('STATUS','ACTIVE');
		$query2 = $this->db->get('card');
		
		if ($query2->num_rows() > 0){
			$this->data['has_card'] = true;
			$this->data['cards'] = $query2->result();
		}else{
			$this->data['has_card'] = false;
		}
		
		echo json_encode($this->data);
	}
   

	//For registration
	public function card_change(){
		// GET ALL DOCTORS HAVING THE GIVEN CARD

	    $batch_no = $this->input->get('batch_no');
		$COM_ID = $this->input->get('COM_ID');
		$CARD_CODE = $this->input->get('CARD_CODE');

		$this->db->select('*');
		$this->db->where('COM_ID', $COM_ID);
		$this->db->where('CARD_CODE', $CARD_CODE);
		$query0 = $this->db->get('doctor_card');

		if ($query0->num_rows()>0) {
			$this->data['has_doctor'] = TRUE;
			$this->data['doctors'] = $query0->result();

		}else{
			$this->data['has_doctor'] = FALSE;

		}

		$this->db->select('*');
		$this->db->where('COM_ID',$COM_ID);
		$this->db->where('CARD_CODE', $CARD_CODE);
		$query4 = $this->db->get('card_class');
        if ($query4->num_rows()>0) {
			$this->data['has_class'] = TRUE;
			$this->data['classes'] = $query4->result();

		}else{
			$this->data['has_class'] = FALSE;

		}


		echo json_encode($this->data);
	}

	public function search_batch(){
		$batch_no = $this->input->get('batch_no');

		
		$this->db->select('*');
		$this->db->where('BATCH_NO', $batch_no);
		$query = $this->db->get('voucher_line');
		
		if ($query->num_rows() > 0){

			$this->data['has_batchno'] = true;
		  // need to check weather this batch is settled  if this batch no exist
			   $settled = false;

			   if ($settled == false) {
			       $this->data['is_settled'] = false;
			   }
			   else{
		           $this->data['is_settled'] = true;
			   }

		}
		else{
			$this->db->select('*');
		    $this->db->where('BATCH_NO', $batch_no);
	    	$query2 = $this->db->get('voucher_line_temp');
	    	if ($query2->num_rows()>0) {
	  		   $this->data['has_batchno'] = true;
	    	}
	    	else{
	    	 $this->data['has_batchno'] = false;

	    	}

	         $this->data['is_settled'] = false;

		}
        $this->data['batchno'] = $batch_no;
        echo json_encode($this->data);
	}


	/**
	* Add New Voucher Lines
	*
	* @return JSON
	*/
	public function add_register_save(){
		if (!$this->is_allowed('voucher_register_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('VOUCHER_NO', 'Voucher No', 'trim|required|alpha_dash|is_unique[voucher_line_temp.VOUCHER_NO]');
		$this->form_validation->set_rules('TREATMENT_DATE', 'Voucher Date', 'trim|required');
		$this->form_validation->set_rules('COM_ID', 'Business Partner', 'trim|required');
		$this->form_validation->set_rules('CARD_CODE', 'Card Type', 'trim|required');
		$this->form_validation->set_rules('PARTNER_DR_CODE', 'Doctor Code', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		$today = date('Y-m-d H:i:s');
		
		if ($this->form_validation->run()) {
			
			$batch_no = $this->input->post('BATCH_NO'); 
			$treatment_date = $this->input->post('TREATMENT_DATE');
			$voucher_no = $this->input->post('VOUCHER_NO');
			$COM_ID = $this->input->post('COM_ID');
			$CARD_CODE = $this->input->post('CARD_CODE');
			$dr_code = $this->input->post('PARTNER_DR_CODE');
			$class_code = $this->input->post('CLASS_CODE');
			$valid_voucher = true;
			
			$this->db->where('BATCH_NO', $batch_no);
			$this->db->where('VOUCHER_NO', $voucher_no);
			$query = $this->db->get('voucher_line');
			
			if ($query->num_rows() > 0){
				$this->data['success'] = false;
				$this->data['message'] = 'Duplicate Voucher No';
				$valid_voucher = false;
			}else{
				$this->db->where('BATCH_NO', $batch_no);
				$this->db->where('VOUCHER_NO', $voucher_no);
				$query2 = $this->db->get('voucher_line_temp');
				
				if ($query2->num_rows() > 0){
					$this->data['success'] = false;
					$this->data['message'] = 'Duplicate Voucher No.';
					$valid_voucher = false;
				}
			}
			
			if ($valid_voucher){
				$save_data = [
					'VOUCHER_NO' => $voucher_no,
					'BATCH_NO' => $batch_no,
					'TREATMENT_DATE' => $treatment_date,
					'RECEIVE_DATE' =>$today,
					'PARTNER_DR_CODE' => $dr_code,
					'COM_ID' => $COM_ID,
					'CARD_CODE' => $CARD_CODE,
					'CLASS_CODE' => $class_code,
					'CREATOR' => $user,
					'CREATE_DATE' => $today,
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];
				
				$this->db->insert('voucher_line_temp', $save_data);
				$save_voucher_line = $this->db->affected_rows();
				
				if ($save_voucher_line) {
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = true;
						$this->data['id'] 	   = $save_voucher_line;
						$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/voucher_line/add/' .$voucher_no, 'Edit Voucher Line').' or  '.anchor('administrator/voucher_line_tmp/', ' Go back to list');
					} else {
						set_message('Your data has been successfully stored into the database. '.anchor('administrator/voucher_line/edit/' . $save_voucher_line, 'Edit Voucher Line'), 'success');

						$this->data['success'] = true;
						$this->data['redirect'] = base_url('administrator/voucher_line_tmp');
					}
				} else {
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
					} else {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
						$this->data['redirect'] = base_url('administrator/voucher_line_tmp');
					}
				}
				
			}
			
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}
		
		echo json_encode($this->data);
	}
	
		
		/**
	* Update view Voucher Lines
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('voucher_line_update');

		$this->data['voucher_line'] = $this->model_voucher_line->find($id);

		$this->template->title('Voucher Line Update');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_update', $this->data);
	}

	/**
	* Update Voucher Lines
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('voucher_line_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('VOUCHER_NO', 'VOUCHER NO', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'RECEIVE_DATE' => $this->input->post('RECEIVE_DATE'),
				'CARD_CODE' => $this->input->post('CARD_CODE'),
				'VOUCHER_NO' => $this->input->post('VOUCHER_NO'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'TREATMENT_DATE' => $this->input->post('TREATMENT_DATE'),
				'DR_CODE' => $this->input->post('DR_CODE'),
				'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
				'DR_E_NAME' => $this->input->post('DR_E_NAME'),
				'DR_C_NAME' => $this->input->post('DR_C_NAME'),
				'MEMBER_CODE' => $this->input->post('MEMBER_CODE'),
				'MEMBER_CLASS' => $this->input->post('MEMBER_CLASS'),
				'MEMBER_HKID' => $this->input->post('MEMBER_HKID'),
				'MEMBER_E_NAME' => $this->input->post('MEMBER_E_NAME'),
				'MEMBER_C_NAME' => $this->input->post('MEMBER_C_NAME'),
				'MEMBER_STAFF_NO' => $this->input->post('MEMBER_STAFF_NO'),
				'DEPD_NAME' => $this->input->post('DEPD_NAME'),
				'DEPD_CODE' => $this->input->post('DEPD_CODE'),
				'SICK_LEAVE' => $this->input->post('SICK_LEAVE'),
				'SL_FROM' => $this->input->post('SL_FROM'),
				'SL_TO' => $this->input->post('SL_TO'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'INSURED_NO' => $this->input->post('INSURED_NO'),
				'POLICY_YEAR' => $this->input->post('POLICY_YEAR'),
				'DP_TYPE' => $this->input->post('DP_TYPE'),
				'DIAG_CODE1' => $this->input->post('DIAG_CODE1'),
				'DIAG_CODE2' => $this->input->post('DIAG_CODE2'),
				'DIAG_CODE3' => $this->input->post('DIAG_CODE3'),
				'DIAG_CODE4' => $this->input->post('DIAG_CODE4'),
				'TYPE' => $this->input->post('TYPE'),
				'REFERRAL_DR' => $this->input->post('REFERRAL_DR'),
				'REFERRAL_TYPE' => $this->input->post('REFERRAL_TYPE'),
				'CO_PAY' => $this->input->post('CO_PAY'),
				'EXTRA_MED_BOL' => $this->input->post('EXTRA_MED_BOL'),
				'EXTRA_MED' => $this->input->post('EXTRA_MED'),
				'EXTRA_MED_REMARK' => $this->input->post('EXTRA_MED_REMARK'),
				'LAB_XRAY_BOL' => $this->input->post('LAB_XRAY_BOL'),
				'LAB_XRAY' => $this->input->post('LAB_XRAY'),
				'LAB_XRAY_CODE' => $this->input->post('LAB_XRAY_CODE'),
				'SURGICAL_BOL' => $this->input->post('SURGICAL_BOL'),
				'SURGICAL' => $this->input->post('SURGICAL'),
				'SURGICAL_CODE' => $this->input->post('SURGICAL_CODE'),
				'APPROVAL_CODE' => $this->input->post('APPROVAL_CODE'),
				'FEE_AMT' => $this->input->post('FEE_AMT'),
				'OS_AMT' => $this->input->post('OS_AMT'),
				'PAY_AMT' => $this->input->post('PAY_AMT'),
				'DR_CODE_DE' => $this->input->post('DR_CODE_DE'),
				'FEE_AMT_DE' => $this->input->post('FEE_AMT_DE'),
				'PAY_AMT_DE' => $this->input->post('PAY_AMT_DE'),
				'STATUS' => $this->input->post('STATUS'),
				'ENTRY_TIME_DE' => $this->input->post('ENTRY_TIME_DE'),
				'LAST_MODIFIER_VE' => $this->input->post('LAST_MODIFIER_VE'),
				'LAST_MODIFIER_DE' => $this->input->post('LAST_MODIFIER_DE'),
			];

			
			$save_voucher_line = $this->model_voucher_line->change($id, $save_data);

			if ($save_voucher_line) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/voucher_line_tmp/', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/voucher_line_tmp/');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/voucher_line_tmp');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
		/**
	* delete Voucher Lines
	*
	* @var $id String
	*/

	public function remove_temp()
	{
         if (!$this->is_allowed('voucher_register_delete', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to delete'
				]);
			exit;
		}
		$BATCH_NO = $this->input->get('BATCH_NO');
		$voucher_no = $this->input->get('voucher_no');

		$this->data['b'] = $BATCH_NO;
        $this->data['v'] = $voucher_no;
	
		$this->db->delete('voucher_line_temp',array('BATCH_NO'=>$BATCH_NO,'VOUCHER_NO'=> $voucher_no));
        $q = $this->db->affected_rows();
        if ($q>0) {
        	set_message($voucher_no.' has been removed successfully','success');
         }else{
         	set_message($voucher_no.' remove error','error');

         }

        echo json_encode($this->data);
	}
	/**
	* delete Voucher Lines
	*
	* @var $id String
	*/
		private function _removeByVandBatch($id)
	{
         if (!$this->is_allowed('voucher_register_delete', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to delete'
				]);
			exit;
		}
		$id_arr = explode(',', $id);

		$this->db->delete('voucher_line_temp',array('BATCH_NO'=>$id_arr[0],'VOUCHER_NO'=> $id_arr[1]));
		$q = $this->db->affected_rows();
		if ($q>0) {
			  return true;
		}else{
              return false;   		
          }

	}
	
	public function deleteByVouchAndBatch()
	{
		$this->is_allowed('voucher_register_delete');

		// $this->load->helper('file');

		$arr_id = $this->input->get('SELECTED');

		$remove = false;
           

        if (count($arr_id) >0) {

			foreach ($arr_id as $id) {

				$remove = $this->_removeByVandBatch($id);
			}
		}

		if ($remove) {
            set_message('Registered Voucher has been deleted.', 'success');
		} else {
           set_message('error','error');
		}

	}

	//  private function _remove($id)
	//  {
	// 	// $voucher_line = $this->model_voucher_line->find($id);
	//  $this->model_voucher_line_tmp->remove($id);
	//  $q = $this->db->affected_rows();
	//  if ($q>0) {
	//   		return true;
	//    }else{
	//   	   return false;
	//    }
	//  }
	
	
	// public function delete($id)
	
	// {

	// 	$this->is_allowed('voucher_line_delete');

	// 	$this->load->helper('file');
		
	// 	// $id = unserialize($id);

	// 	$arr_id = $this->input->get('id');
        

	// 	$remove = false;

	// 	if (!empty($id)) {

	// 		$remove = $this->_remove($id);
		
	// 	} elseif (count($arr_id) >0) {
	        		
	// 		foreach ($arr_id as $id) {
		
	// 			$remove = $this->_remove($id);
		
	// 		}
	// 	}

	// 	if ($remove) {
 //            set_message('Voucher Line has been deleted.', 'success');
	// 	} else {
	//         set_message($id.' remove error ', 'error');

	// 	}
	// 	redirect('administrator/voucher_line_tmp/');
	// }
		/**
	* View view Voucher Lines
	*
	* @var $id String
	*/
	// public function view($id)
	// {
	// 	$this->is_allowed('voucher_line_view');

	// 	$this->data['voucher_line'] = $this->model_voucher_line->find($id);

	// 	$this->template->title('Voucher Line Detail');
	// 	$this->render('backend/standart/administrator/voucher_line/voucher_line_view', $this->data);
	// }
   
   public function view_regist( $voucher_no)
   { 
       $this->is_allowed('voucher_register_view');
       
       $this->data['voucher_register'] = $this->model_voucher_line_tmp->find_voucher_regist($voucher_no);

       $this->template->title('Voucher Registration Detail');
       
       $this->render('backend/standart/administrator/voucher_line/voucher_view_register', $this->data);

   }
 

	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('voucher_line_export');

		$this->model_voucher_line->export('voucher_line', 'voucher_line');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('voucher_line_export');

		$this->model_voucher_line->pdf('voucher_line', 'voucher_line');
	}
}


/* End of file voucher_line.php */
/* Location: ./application/controllers/administrator/Voucher Line.php */