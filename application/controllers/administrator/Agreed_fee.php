<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Agreed Fee Controller
*| --------------------------------------------------------------------------
*| Agreed Fee site
*|   
*/ 
class Agreed_fee extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_agreed_fee');
	}

	/**
	* show all Agreed Fees
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('agreed_fee_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['agreed_fees'] = $this->model_agreed_fee->get($filter, $field, $this->limit_page, $offset);
		$this->data['agreed_fee_counts'] = $this->model_agreed_fee->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/agreed_fee/index/',
			'total_rows'   => $this->model_agreed_fee->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Agreed Fee List');
		$this->render('backend/standart/administrator/agreed_fee/agreed_fee_list', $this->data);
	}
	
	/**
	* Add new agreed_fees
	*
	*/
	public function add()
	{
		$this->is_allowed('agreed_fee_add');

		$this->db->select('CARD_CODE');
		$this->db->group_by('CARD_CODE');
		$result = $this->db->get('card_class');

	    $this->data['CARD_CODEs'] = $result->result();
	    $this->data['CARD_CODEs_total'] = $result->num_rows();

		$this->data['CARD_CODE'] = '';
		$this->data['CLASS_CODE'] = '';
		$this->data['partner_name'] = '';
		$this->data['CLASS_DESC'] = '';
		$this->data['doctor_types'] = '';

		$this->template->title('Agreed Fee New');
		$this->render('backend/standart/administrator/agreed_fee/agreed_fee_add', $this->data);
	}

	/**
	* Add New Agreed Fees
	*
	* @return JSON 
	*/
	public function getContract(){ 
		
		$selected_CARD_CODE = $this->input->get('CARD_CODE');

		$this->db->where('CARD_CODE',$selected_CARD_CODE);
		$query = $this->db->get('card');
		$result = $query->row_array();
		$this->data['English_Name'] = $result['E_NAME'];
		

		$status_array = array('Active','Not Start');
		$this->db->select('*');
		$this->db->where('CARD_CODE',$selected_CARD_CODE);
		$this->db->where_in('status', $status_array);  //get contract stauts = active or not start so that user can input agreed fee
		$query = $this->db->get('card_class');

		if ($query->num_rows()>0) {
			$result = $query->result_array();
			$this->data['cards'] = $result;
		}else{
			$this->data['cards'] = '';

		}


	    $this->db->select('type1,type2,type3'); //get ALL FEE type from partner doctor type
	    $this->db->where('CARD_CODE',$selected_CARD_CODE);
	    $this->db->from('doctor_card');
	    // $this->db->join('doctor','doctor_card.DR_CODE=doctor.DR_CODE','left');
	    $query = $this->db->get();
	    $this->data['doctor_types'] = $query->result_array();

		echo json_encode($this->data);
		
	}

	public function add_2($id,$no){
	    $this->is_allowed('agreed_fee_add');


	    $this->data['CARD_CODE'] = $id;
		$this->data['CLASS_CODE'] = $no;


		$this->db->select('	E_NAME');
	    $this->db->where('CARD_CODE',$id);
		$query = $this->db->get('card');
		$this->data['partner_name'] = $query->row();

		$this->db->select('CLASS_DESC');
	    $this->db->where('CARD_CODE',$id);
	    $this->db->where('CLASS_CODE',$no);
		$query = $this->db->get('card_class');
		$this->data['CLASS_DESC'] = $query->row();


		$this->db->select('CARD_CODE');
		$this->db->group_by('CARD_CODE');
		$result = $this->db->get('card_class');
	    $this->data['CARD_CODEs'] = '';
	    $this->data['CARD_CODEs_total'] = 0;


	    $this->db->select('type1,type2,type3'); //get ALL FEE type from partner doctor type
	    $this->db->where('CARD_CODE',$id);
	    $this->db->from('doctor_card');
	    // $this->db->join('doctor','doctor_card.DR_CODE=doctor.DR_CODE','left');
	    $query = $this->db->get();
	    $doctor_types = $query->result_array();

	    function recurse_values($array) { // get unique value as in array
		if (is_array($array)) {
		$output_array = array();
		foreach ($array as $key=>$val) { 
		    $primitive_output = recurse_values($val);
		    if (is_array($primitive_output)) {
		        $output_array = array_merge($output_array, $primitive_output);
		    }
		    else {
		        array_push($output_array, $primitive_output);
		    }
		}
		return array_unique($output_array);
		}
		else {
		return $array;
		}
		}
	    $this->data['doctor_types'] = recurse_values($doctor_types);

		$this->template->title('Agreed Fee New');
		$this->render('backend/standart/administrator/agreed_fee/agreed_fee_add', $this->data);

	}

	public function add_save()
	{
		if (!$this->is_allowed('agreed_fee_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		
		$this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');
		$this->form_validation->set_rules('CLASS_CODE', 'Contract Number', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {

		$CARD_CODE = $this->input->post('CARD_CODE');
 		$CLASS_CODE = $this->input->post('CLASS_CODE');
 		$TYPE = $this->input->post('TYPE');
 		$MED_DAYS = $this->input->post('MED_DAYS');
		$CO_PAY = $this->input->post('CO_PAY');
		$FEE = $this->input->post('FEE');
		$PAY = $this->input->post('PAY');
		$EXTRA_MED_BOL = $this->input->post('EXTRA_MED_BOL');
		$LAB_XRAY_BOL = $this->input->post('LAB_XRAY_BOL');
 		$SURGICAL_BOL =  $this->input->post('SURGICAL_BOL');
	

		$save_agreed_fee = array();
		foreach ($TYPE as $key => $value) {
			
			if($value!=''){
				$save_data = [
				'CARD_CODE' => $CARD_CODE ,
				'CLASS_CODE' => $CLASS_CODE,
				'TYPE' => $TYPE[$key],
				'MED_DAYS' =>(isset($MED_DAYS[$key]))?$MED_DAYS[$key]:'',
				'CO_PAY' => (isset($CO_PAY[$key]))?$CO_PAY[$key]:0,
				'FEE' => (isset($FEE[$key]))?$FEE[$key]:0, 
				'PAY' => (isset($PAY[$key]))?$PAY[$key]:0,
				'EXTRA_MED_BOL' => (isset($EXTRA_MED_BOL[$key]))?$EXTRA_MED_BOL[$key]:0,
				'LAB_XRAY_BOL' => (isset($LAB_XRAY_BOL[$key]))?$LAB_XRAY_BOL[$key]:0,
				'SURGICAL_BOL' => (isset($SURGICAL_BOL[$key]))?$SURGICAL_BOL[$key]:0,
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')
			];
				$this->db->insert('agreed_fee',$save_data);
				$id = $this->db->insert_id();
				array_push($save_agreed_fee, $id);
			}
 
		} 

			if (count($save_agreed_fee)>0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_agreed_fee[0];
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/agreed_fee/edit/' . $save_agreed_fee[0], 'Edit FIRST Agreed Fee').' or  '.anchor('administrator/agreed_fee', ' Go back to list') . ' or ' . anchor('administrator/card/view/' . $CARD_CODE, 'Go Back to Business Partner');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/agreed_fee/edit/' . $save_agreed_fee, 'Edit Agreed Fee'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/agreed_fee');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/agreed_fee');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Agreed Fees
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('agreed_fee_update');

		$this->data['agreed_fee'] = $this->model_agreed_fee->find($id);

		$this->template->title('Agreed Fee Update');
		$this->render('backend/standart/administrator/agreed_fee/agreed_fee_update', $this->data);
	}

	/**
	* Update Agreed Fees
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('agreed_fee_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('CARD_CODE', 'Company Code', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		$EXTRA_MED_BOL = $this->input->post('EXTRA_MED_BOL');
		if ($EXTRA_MED_BOL) {
			$EXTRA_MED_BOL = 1;
		}else{
			$EXTRA_MED_BOL = 0;
		}
		
		$LAB_XRAY_BOL = $this->input->post('LAB_XRAY_BOL');
		if ($LAB_XRAY_BOL) {
			$LAB_XRAY_BOL = 1;
		} else{
			$LAB_XRAY_BOL =0;
		}
		
 		$SURGICAL_BOL =  $this->input->post('SURGICAL_BOL');
 		if ($SURGICAL_BOL) {
 			$SURGICAL_BOL = 1;
 		} else{
 			$SURGICAL_BOL =0;
 		}

		if ($this->form_validation->run()) {
			$save_data = [
				// 'CARD_CODE' => $this->input->post('CARD_CODE'),
				// 'card_class_NO' => $this->input->post('card_class_NO'),
				// 'CLASS_DESC' =>$this->input->post('CLASS_DESC'),
				// 'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'MED_DAYS' => $this->input->post('MED_DAYS'),
				'TYPE' => $this->input->post('TYPE'),
				'CO_PAY' => $this->input->post('CO_PAY'),
				'FEE' => $this->input->post('FEE'),
				'PAY' => $this->input->post('PAY'),
				'EXTRA_MED_BOL' => $EXTRA_MED_BOL,
				'LAB_XRAY_BOL' => $LAB_XRAY_BOL,
				'SURGICAL_BOL' => $SURGICAL_BOL,
			]; 

			$save_agreed_fee = $this->model_agreed_fee->change($id, $save_data);

			if ($save_agreed_fee) {
				$currentTime = date('Y-m-d H:i:s');

				$save_data1 =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $currentTime
					];
				$this->db->where('AUTO_NO', $id);
        		$this->db->update('agreed_fee', $save_data1);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/agreed_fee', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/agreed_fee');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/agreed_fee');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Agreed Fees
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('agreed_fee_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message('Agreed Fee has been deleted.', 'success');
		} else {
            set_message('Error delete agreed_fee.', 'error');
		}

		redirect('administrator/agreed_fee');
	}

		/**
	* View view Agreed Fees
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('agreed_fee_view');

		$agreed_fee =$this->model_agreed_fee->find($id);
		$this->data['agreed_fee'] = $agreed_fee;

		$CARD_CODE = $agreed_fee->CARD_CODE;

		$this->db->where('CARD_CODE',$CARD_CODE);
		$query = $this->db->get('card');
		$result = $query->row_array();
		$this->data['BP_Ename'] = $result['E_NAME'];
		$this->data['BP_Cname'] = $result['C_NAME'];

		$this->template->title('Agreed Fee Detail');
		$this->render('backend/standart/administrator/agreed_fee/agreed_fee_view', $this->data);
	}
	
	/**
	* delete Agreed Fees
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$agreed_fee = $this->model_agreed_fee->find($id);

		
		return $this->model_agreed_fee->remove($id);
	}
	 
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('agreed_fee_export');

		$this->model_agreed_fee->export('agreed_fee', 'agreed_fee');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('agreed_fee_export');

		$this->model_agreed_fee->pdf('agreed_fee', 'agreed_fee');
	}
}


/* End of file agreed_fee.php */
/* Location: ./application/controllers/administrator/Agreed Fee.php */