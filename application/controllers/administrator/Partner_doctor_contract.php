<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Partner Doctor Contract Controller
*| --------------------------------------------------------------------------
*| Partner Doctor Contract site
*|
*/
class Partner_doctor_contract extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_partner_doctor_contract');
	}

	/**
	* show all Partner Doctor Contracts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('partner_doctor_contract_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['partner_doctor_contracts'] = $this->model_partner_doctor_contract->get($filter, $field, $this->limit_page, $offset);
		$this->data['partner_doctor_contract_counts'] = $this->model_partner_doctor_contract->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/partner_doctor_contract/index/',
			'total_rows'   => $this->model_partner_doctor_contract->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Partner Doctor Contract List');
		$this->render('backend/standart/administrator/partner_doctor_contract/partner_doctor_contract_list', $this->data);
	}
	
	/**
	* Add new partner_doctor_contracts
	*
	*/
	public function add()
	{
		$this->is_allowed('partner_doctor_contract_add');

		$this->data['CARD_CODEs'] = $this->db->get('card')->result();
	    $this->data['CARD_CODEs_total'] = $this->db->count_all_results('card');

	    $this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');

		$this->template->title('Partner Doctor Contract New');
		$this->render('backend/standart/administrator/partner_doctor_contract/partner_doctor_contract_add', $this->data);
	}

	public function add_doctor_No(){
		$CARD_CODE = $this->input->get('CARD_CODE');
		$doctor_code= $this->input->get('doctor_code');
		
		/*
			
			$this->db->select('PARTNER_DR_CONTRACT_NO,STATUS, START_DATE, TERM_DATE, ORIGINAL_TERM_DATE');
			$this->db->where('CARD_CODE',$CARD_CODE);
			$this->db->where('DR_CODE',$doctor_code);
			$this->db->order_by('PARTNER_DR_CONTRACT_NO','DESC');
			$query = $this->db->get('partner_doctor_contract');
			if($query->num_rows() == 0 ) {
				$this->data['doctor_contract_No'] = 1;
			}
			else{
				// $result0 = $query->result_array();
				// $result1 = $result0[0]['PARTNER_DR_CONTRACT_NO'];
				$result = $query->row();
				$this->data['doctor_contract_No'] =  $result->PARTNER_DR_CONTRACT_NO+1;
				$this->data['last_contract_status'] = $result->STATUS;
				$this->data['last_contract_start'] = $result->START_DATE;
				$this->data['last_contract_end']  = $result->TERM_DATE;
				$this->data['ORIGINAL_TERM_DATE'] = $result->ORIGINAL_TERM_DATE;
 			}
			
		*/
			
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->order_by("PARTNER_CONTRACT_NO", "DESC");
		$this->db->order_by("STATUS", "ASC");
		$query2 = $this->db->get("partner_contract");
		
		if ($query2->num_rows() > 0){
			$this->data['has_contract'] = true;
			$this->data['partner_contract'] = $query2->result();
		}else{
			$this->data['has_contract'] = false;
		}

		echo json_encode($this->data);		
	}
	
	public function check_contract(){
		$CARD_CODE = $this->input->get('CARD_CODE');
		$dr_code = $this->input->get('dr_code');
		$policy_no = $this->input->get('policy_no');
		$contract_no = $this->input->get('contract_no');
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->where("PARTNER_CONTRACT_NO", $contract_no);
		$this->db->where("POLICY_NO", $policy_no);
		$this->db->where("STATUS", "Active");
		$query = $this->db->get("partner_doctor_contract");
		
		if ($query->num_rows() > 0){
			$this->data['exist_contract'] = true;
		}else{
			$this->data['exist_contract'] = false;
		}
		
		echo json_encode($this->data);	
		
	}

	/**
	* Add New Partner Doctor Contracts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('partner_doctor_contract_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		 $this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');
		 $this->form_validation->set_rules('DR_CODE','Doctor code','trim|required');
		 $this->form_validation->set_rules('PARTNER_CONTRACT_NO', 'Partner Contract No', 'trim|required');
		 $this->form_validation->set_rules('PARTNER_DR_CODE','Partner Dr Code','trim|required|alpha_dash|max_length[80]');
		 $this->form_validation->set_rules('LOC_CODE','Loc Code','trim|required|alpha_dash|max_length[80]');

		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		 $today = date('Y-m-d H:i:s');

		 /*	For define the contract status
		 
		 $START_DATE = $this->input->post('START_DATE');
		 $TERM_DATE = $this->input->post('TERM_DATE');

		 if($TERM_DATE < $today){
		 	
		 	$STATUS = 'Term';
		 }
		 elseif ($START_DATE > $today ) {
		 	$STATUS = 'Not Start';
		 }
		 else {
		 	$STATUS = 'Active';
		 }
		 */
		 
		 $exist_contract = $this->input->post("exist_contract");

		if ($this->form_validation->run() && $exist_contract != "Y") {
			
			$dr_code = $this->input->post('DR_CODE');
			$CARD_CODE = $this->input->post('CARD_CODE');
			$partner_contract_no = $this->input->post('PARTNER_CONTRACT_NO');

			$save_data = [
				'CARD_CODE' => $CARD_CODE,
				'DR_CODE' => $dr_code,
				'PARTNER_CONTRACT_NO' => $partner_contract_no,
				'POLICY_NO' => $this->input->post("POLICY_NO"),
				'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
				'PARTNER_CONTRACT_NAME' => $this->input->post("PARTNER_CONTRACT_NAME"),
				'LOC_CODE' => $this->input->post('LOC_CODE'),
				'CREATOR'=> $user,
				'CREATE_DATE'=>$today,
				'LAST_MODIFIER'=>$user,
				'LAST_UPDATE'=>$today
			];
			
			$this->db->insert("partner_doctor_contract", $save_data);
			
			$save_partner_doctor_contract = $this->db->affected_rows();
			

			if ($save_partner_doctor_contract) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_partner_doctor_contract;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/partner_doctor_contract/edit/' . $save_partner_doctor_contract, 'Edit Partner Doctor Contract').' or  '.anchor('administrator/partner_doctor_contract', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/partner_doctor_contract/edit/' . $save_partner_doctor_contract, 'Edit Partner Doctor Contract'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_doctor_contract');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_doctor_contract');
				}
			}

		} else if ($exist_contract == "Y"){
			$this->data['success'] = false;
			$this->data['message'] = "Cannot insert an existing contract";
		}else{
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Partner Doctor Contracts
	*
	* @var $id String
	*/
	public function edit($CARD_CODE, $doctor_code, $partner_contract_no, $policy_no)
	{
		$this->is_allowed('partner_doctor_contract_update');
		
		$this->db->where('CARD_CODE',$CARD_CODE);
		$this->db->where('DR_CODE',$doctor_code);
		$this->db->where('PARTNER_CONTRACT_NO',$partner_contract_no);
		$this->db->where('POLICY_NO',$policy_no);

		$query = $this->db->get('partner_doctor_contract');
		$this->data['partner_doctor_contract'] = $query->row();  
		
		$partner_doctor = $query->row();
		
		$this->db->where('CARD_CODE', $CARD_CODE);
		$this->db->where('PARTNER_CONTRACT_NO', $partner_doctor->PARTNER_CONTRACT_NO);
		$this->db->where('POLICY_NO',$partner_doctor->POLICY_NO);
		
		$query2 = $this->db->get('partner_contract');
		$this->data['partner_contract'] = $query2->row(); 


		$this->template->title('Partner Doctor Contract Update');
		$this->render('backend/standart/administrator/partner_doctor_contract/partner_doctor_contract_update', $this->data);
	}

	/**
	* Update Partner Doctor Contracts
	*
	* @var $id String
	*/
	public function edit_save($CARD_CODE, $doctor_code, $partner_contract_no, $policy_no){

		if (!$this->is_allowed('partner_doctor_contract_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
			
		$this->form_validation->set_rules('PARTNER_DR_CODE', 'Partner Dr Code', 'trim|required|alpha_dash|max_length[80]');
		$this->form_validation->set_rules('LOC_CODE','Loc Code','trim|required|alpha_dash|max_length[80]');
		
		$status = $this->input->post("STATUS");
		
		
		if ($this->form_validation->run()) {

			$save_data = [
				'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
				'LOC_CODE' => $this->input->post('LOC_CODE'),
				'STATUS' => $this->input->post('STATUS'),
			];
       	    
			$this->db->where('CARD_CODE', $CARD_CODE);
			$this->db->where('DR_CODE', $doctor_code);
			$this->db->where('PARTNER_CONTRACT_NO', $partner_contract_no);
			$this->db->where('POLICY_NO', $policy_no);
			
		    $this->db->update('partner_doctor_contract', $save_data);
        	$save_partner_doctor_contract = $this->db->affected_rows();
			

			if ($save_partner_doctor_contract) {
				 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
				 $today = date('Y-m-d H:i:s');

			    $save_data2 =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];
				
				$this->db->where('CARD_CODE', $CARD_CODE);
				$this->db->where('DR_CODE', $doctor_code);
				$this->db->where('PARTNER_CONTRACT_NO', $partner_contract_no);
				$this->db->where('POLICY_NO', $policy_no);
				
			    $this->db->update('partner_doctor_contract', $save_data2);
			}
			
			if ($save_partner_doctor_contract){

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $doctor_code;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/partner_doctor_contract', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_doctor_contract');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_doctor_contract');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Partner Doctor Contracts
	*
	* @var $id String
	*/
	public function delete($id,$doctor_code, $No)
	{
		$this->is_allowed('partner_doctor_contract_delete');

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
            set_message('Partner Doctor Contract has been deleted.', 'success');
		} else {
            set_message('Error delete partner_doctor_contract.', 'error');
		}

		redirect('administrator/partner_doctor_contract');
	}

		/**
	* View view Partner Doctor Contracts
	*
	* @var $id String
	*/
	public function view($CARD_CODE, $dr_code, $partner_contract_no, $policy_no)
	{
		$this->is_allowed('partner_doctor_contract_view');

		$this->db->where('CARD_CODE', $CARD_CODE);
		$this->db->where('DR_CODE', $dr_code);
		$this->db->where('PARTNER_CONTRACT_NO', $partner_contract_no);
		$this->db->where('POLICY_NO', $policy_no);
		$this->data['partner_doctor_contract'] = $this->db->get('partner_doctor_contract')->row();
		
		$this->db->where('CARD_CODE', $CARD_CODE);
		$this->db->where('PARTNER_CONTRACT_NO', $partner_contract_no);
		$this->db->where('POLICY_NO', $policy_no);
		$this->data['partner_contract'] = $this->db->get('partner_contract')->row();
	
		$this->template->title('Partner Doctor Contract Detail');
		$this->render('backend/standart/administrator/partner_doctor_contract/partner_doctor_contract_view', $this->data);
	}
	
	/**
	* delete Partner Doctor Contracts
	*
	* @var $id String
	*/
	private function _remove($id,$doctor_code, $No)
	{
	   $this->db->where('CARD_CODE',$id);
		$this->db->where('DR_CODE',$doctor_code);
		$this->db->where('PARTNER_DR_CONTRACT_NO',$No);
		$partner_doctor_contract = $this->db->get('partner_doctor_contract');
		
		
		return $this->model_partner_doctor_contract->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('partner_doctor_contract_export');

		$this->model_partner_doctor_contract->export('partner_doctor_contract', 'partner_doctor_contract');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('partner_doctor_contract_export');

		$this->model_partner_doctor_contract->pdf('partner_doctor_contract', 'partner_doctor_contract');
	}
}


/* End of file partner_doctor_contract.php */
/* Location: ./application/controllers/administrator/Partner Doctor Contract.php */