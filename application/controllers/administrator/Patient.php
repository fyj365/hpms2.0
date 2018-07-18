<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Patient Controller
*| --------------------------------------------------------------------------
*| Patient site
*|
*/
class Patient extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_patient');
	}

	/**
	* show all Patients
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('patient_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['patients'] = $this->model_patient->get($filter, $field, $this->limit_page, $offset);
		$this->data['patient_counts'] = $this->model_patient->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/patient/index/',
			'total_rows'   => $this->model_patient->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Patient List');
		$this->render('backend/standart/administrator/patient/patient_list', $this->data);
	}
	
	/**
	* Add new patients
	*
	*/
	public function add()
	{
		$this->is_allowed('patient_add');

		$this->template->title('Patient New');
		$this->render('backend/standart/administrator/patient/patient_add', $this->data);
	}

	/**
	* Add New Patients
	*
	* @return JSON
	*/
	
	public function check_duplicate()
	{
		$check_dup = $this->input->get('check_dup');
		$val_name = $this->input->get('val_name');
		
		$regex = "/^[a-zA-Z0-9\-]+$/";
		
		if (preg_match($regex, $check_dup)){
			$this->data['dup_regex'] = TRUE;

		}else{
			$this->data['dup_regex'] = FALSE;
		}
		
		$this->db->select($val_name);
		$this->db->where($val_name, $check_dup);
		
		$query = $this->db->get('patient');
		$count_row = $query->num_rows();
		
		if ($count_row > 0) {
			$this->data['duplicate_result'] = FALSE;
		} else {
			$this->data['duplicate_result'] = TRUE;
		}
		
		echo json_encode($this->data);
	}
	
	function validate_name($field)
	{
		
		if ($field == ""){
			$this->form_validation->set_message('validate_name', 'The Partner Name is required.');
			return FALSE;
		}
		
	   $regex = "/^[a-zA-Z\s\p{Han}]+$/u";

	   if (preg_match($regex, $field)){
			return TRUE;
	   }else{
			$this->form_validation->set_message('validate_name', 'The Partner Name is not allow number or special characters');
			return FALSE;
	   }
	}
	
	function validate_hkid($field)
	{

		if ($field == ""){
			return true;
		}
		$regex = "/^[a-zA-Z]{1,2}[0-9]{6}[a-zA-Z0-9]$/";
			
		if (preg_match($regex, $field)){
			return TRUE;

		}else{
			$this->form_validation->set_message('validate_hkid', 'The HKID format is incorrect');
			return FALSE;
		}
	   
	}
	
	public function add_search()
	{
		$CARD_CODE = $this->input->get('CARD_CODE');

		$this->db->select('PARTNER_CONTRACT_NO, START_DATE, TERM_DATE');
		$this->db->where('CARD_CODE', $CARD_CODE);
		$this->db->where('STATUS', 'Active');
		$query = $this->db->get('partner_contract');
		$partner_contract_no = $query->result();
		
		$this->data['partner_contract'] = $partner_contract_no;
		
		echo json_encode($this->data);
	}
	
	public function patient_upload()
	{

		$this->is_allowed('patient_upload');
		
		$this->data['user'] = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		$this->render('backend/standart/administrator/patient/patient_upload_form', $this->data);
		//$this->load->view('backend/standart/administrator/patient/patient_upload_form');
		
	}

	public function add_save()
	{
		if (!$this->is_allowed('patient_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required|regex_match[/^[a-zA-Z0-9\-]+$/]');
		$this->form_validation->set_rules('PATIENT_NO', 'Partner No', 'trim|max_length[80]|regex_match[/^[a-zA-Z0-9\-]+$/]');
		$this->form_validation->set_rules('POLICY_NO', 'Policy No', 'trim|max_length[80]|regex_match[/^[a-zA-Z0-9\-]+$/]');
		$this->form_validation->set_rules('DEPD_CODE', 'Dependant Code', 'trim|max_length[20]|regex_match[/^[a-z0-9-]+$/]');
		$this->form_validation->set_rules('PATIENT_NAME', 'Partner name', 'trim|required|max_length[80]|callback_validate_name');
		$this->form_validation->set_rules('START_DATE', 'Start Date', 'trim|required');	
		$this->form_validation->set_rules('HKID', 'HKID', 'trim|max_length[20]');	
		$this->form_validation->set_rules('GP_EXTRA_MED_BENEFIT', 'GP Extra Med Benefit', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('SP_EXTRA_MED_BENEFIT', 'SP Extra Med Benefit', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('HERB_EXTRA_MED_BENEFIT', 'HERB Extra Med Benefit', 'trim|integer|greater_than[-1]|less_than[999999]');		
		$this->form_validation->set_rules('GP_COPAY', 'GP Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('SP_COPAY', 'SP Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('PHY_COPAY', 'PHY Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('HERB_COPAY', 'HERB Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('WAIVER_REFERRAL', 'Waiver referral', 'trim|max_length[80]');
		
		$start_date = $this->input->post('START_DATE');
		$term_date = $this->input->post('TERM_DATE');

		
		$today = date("Y-m-d");
		
		$status = "Active";
				
		if ($term_date != ""){
			if ($start_date > $today){
				$status = "Not Start";
			}
			
			if ($term_date < $today){
				$status = "Terminate";
			}
		}
		
		
		$CARD_CODE = $this->input->post('CARD_CODE');
		$patient_no = $this->input->post('PATIENT_NO');
		$policy_no = $this->input->post('POLICY_NO');
		$depd_code = $this->input->post('DEPD_CODE');
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'CARD_CODE' => $CARD_CODE,
				'PATIENT_NO' => $patient_no,
				'POLICY_NO' => $policy_no,
				'DEPD_CODE' => $depd_code,
				'PATIENT_NAME' => $this->input->post('PATIENT_NAME'),
				'GENDER' => $this->input->post('GENDER') == NULL ? "" : $this->input->post('GENDER'),
				'DOB' => $this->input->post('DOB'),
				'HKID' => $this->input->post('HKID'),
				'REMARK' => $this->input->post('REMARK'),
				'GP_COPAY' => $this->input->post('GP_COPAY'),
				'SP_COPAY' => $this->input->post('SP_COPAY'),
				'PHY_COPAY' => $this->input->post('PHY_COPAY'),
				'HERB_COPAY' => $this->input->post('HERB_COPAY'),
				'GP_EXTRA_MED' => implode('--', (array) $this->input->post('GP_EXTRA_MED')),
				'SP_EXTRA_MED' => implode('--', (array) $this->input->post('SP_EXTRA_MED')),
				'HERB_EXTRA_MED' => implode('--', (array) $this->input->post('HERB_EXTRA_MED')),
				'GP_EXTRA_MED_BENEFIT' => $this->input->post('GP_EXTRA_MED_BENEFIT'),
				'SP_EXTRA_MED_BENEFIT' => $this->input->post('SP_EXTRA_MED_BENEFIT'),
				'HERB_EXTRA_MED_BENEFIT' => $this->input->post('HERB_EXTRA_MED_BENEFIT'),
				'CLINICAL_PROCEDURES' => implode(',', (array) $this->input->post('CLINICAL_PROCEDURES')),
				'WAIVER_REFERRAL' => $this->input->post('WAIVER_REFERRAL'),
				'STATUS' => $status,
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
			];
			
			$this->db->insert('patient', $save_data);
			$save_patient = $this->db->insert_id();
			$save_contract = 0;
			
			if ($save_patient){
				
				if ($start_date != ""){
					
					$save_data2 = [
						'PATIENT_AUTONO' => $save_patient,
						'PATIENT_EFFECTIVE_NO' => 1,
						'ORIGINAL_TERM_DATE' => $term_date,
						'START_DATE' => $start_date,
						'TERM_DATE' => $term_date,
						'STATUS' => $status,
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];
					
					$this->db->insert('patient_effective_date', $save_data2);
					$save_contract = $this->db->affected_rows();
				}else{
					$save_contract = 1;
				}
				
			}


			if ($save_patient && $save_contract > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_patient;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/patient/edit/' . $save_patient, 'Edit Patient').' or  '.anchor('administrator/patient', ' Go back to list');
				}
			} else if ($save_patient && $save_contract == 0){
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['message'] = 'Insert Patient Data successfully, but fail to insert Patient Effective Date';
				}
			}else{
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}
		
		echo json_encode($this->data);
	}
	
		/**
	* Update view Patients
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('patient_update');

		$this->data['patient'] = $this->model_patient->find($id);

		$this->template->title('Patient Update');
		$this->render('backend/standart/administrator/patient/patient_update', $this->data);
	}

	/**
	* Update Patients
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('patient_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('PATIENT_NAME', 'Partner name', 'trim|required|max_length[80]|callback_validate_name');
		$this->form_validation->set_rules('HKID', 'HKID', 'trim|max_length[20]');		
		$this->form_validation->set_rules('GP_EXTRA_MED_BENEFIT', 'GP Extra Med Benefit', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('SP_EXTRA_MED_BENEFIT', 'SP Extra Med Benefit', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('HERB_EXTRA_MED_BENEFIT', 'HERB Extra Med Benefit', 'trim|integer|greater_than[-1]|less_than[999999]');		
		$this->form_validation->set_rules('GP_COPAY', 'GP Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('SP_COPAY', 'SP Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('PHY_COPAY', 'PHY Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('HERB_COPAY', 'HERB Copay', 'trim|integer|greater_than[-1]|less_than[999999]');
		$this->form_validation->set_rules('WAIVER_REFERRAL', 'Waiver referral', 'trim|max_length[80]');
		
		$start_date = $this->input->post('START_DATE');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		$gender = $this->input->post('GENDER');
		if ($gender == null){
			$gender = "";
		}
		
		if ($this->form_validation->run()) {
			
			$save_data = [
				'PATIENT_NAME' => $this->input->post('PATIENT_NAME'),
				'GENDER' => $gender,
				'DOB' => $this->input->post('DOB'),
				'HKID' => $this->input->post('HKID'),
				'REMARK' => $this->input->post('REMARK'),
				'GP_COPAY' => $this->input->post('GP_COPAY'),
				'SP_COPAY' => $this->input->post('SP_COPAY'),
				'PHY_COPAY' => $this->input->post('PHY_COPAY'),
				'HERB_COPAY' => $this->input->post('HERB_COPAY'),
				'GP_EXTRA_MED' => implode('--', (array) $this->input->post('GP_EXTRA_MED')),
				'SP_EXTRA_MED' => implode('--', (array) $this->input->post('SP_EXTRA_MED')),
				'HERB_EXTRA_MED' => implode('--', (array) $this->input->post('HERB_EXTRA_MED')),
				'GP_EXTRA_MED_BENEFIT' => $this->input->post('GP_EXTRA_MED_BENEFIT'),
				'SP_EXTRA_MED_BENEFIT' => $this->input->post('SP_EXTRA_MED_BENEFIT'),
				'HERB_EXTRA_MED_BENEFIT' => $this->input->post('HERB_EXTRA_MED_BENEFIT'),
				'CLINICAL_PROCEDURES' => implode(',', (array) $this->input->post('CLINICAL_PROCEDURES')),
				'WAIVER_REFERRAL' => $this->input->post('WAIVER_REFERRAL'),
			];
			
			$this->db->where('AUTO_NO', $id);
			$this->db->update('patient', $save_data);
			$updated_patient = $this->db->affected_rows();
			
			if ($updated_patient > 0){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where('AUTO_NO', $id);
				$this->db->update('patient', $save_data12);
			}

			
			$updated_contract = 0;
				
			$term_date = $this->input->post('TERM_DATE');
			$extend_date = $this->input->post('EXTEND');

			
			$this->db->select('PATIENT_EFFECTIVE_NO');
			$this->db->where('PATIENT_AUTONO', $id);
			$this->db->where('STATUS', 'Active');
			$contract_no = $this->db->get('patient_effective_date');
			
				
			if ($contract_no->num_rows() > 0){
				$contract_no = $contract_no->row()->PATIENT_EFFECTIVE_NO;
				
				if ($extend_date != ""){
					$term_date = $extend_date;
					$extend = 1;
					
					$save_data2 = [
						'TERM_DATE' => $term_date,
						'EXTEND' => $extend,
					];
				
					$this->db->where('PATIENT_AUTONO', $id);
					$this->db->where('PATIENT_EFFECTIVE_NO', $contract_no);
					$this->db->update('patient_effective_date', $save_data2);
					$updated_contract = $this->db->affected_rows();
					
					if ($updated_contract > 0){
						$save_data122 = [
							'LAST_MODIFIER' => $user,
							'LAST_UPDATE' => date('Y-m-d H:i:s'),
						];
						
						$this->db->where('PATIENT_AUTONO', $id);
						$this->db->where('PATIENT_EFFECTIVE_NO', $contract_no);
						$this->db->update('patient_effective_date', $save_data22);
					}
				}

			}else{
				
				if ($start_date != ""){
					$this->db->select_max('PATIENT_EFFECTIVE_NO');
					$this->db->where('PATIENT_AUTONO', $id);
					$contract_no = $this->db->get('patient_effective_date');
					
					
					if ($contract_no->num_rows() > 0){
						$contract_no = ($contract_no->row()->PATIENT_EFFECTIVE_NO)+1;
					}else{
						$contract_no = 1;
					}
					
					$save_data2 = [
						'PATIENT_AUTONO' => $id,
						'PATIENT_EFFECTIVE_NO' => $contract_no,
						'ORIGINAL_TERM_DATE' => $term_date,
						'START_DATE' => $start_date,
						'TERM_DATE' => $term_date,
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];
					
					$this->db->insert('patient_effective_date', $save_data2);
					$updated_contract = $this->db->affected_rows();
				}
			}


			if ($updated_patient > 0 && $updated_contract > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/patient', ' Go back to list');
				}
			} else {
				if ($updated_patient > 0 && $updated_contract == 0){
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = true;
						$this->data['message'] = 'Patient data update successfully, but Effective Date data not change';
					}
				}else if ($updated_patient == 0 && $updated_contract > 0){
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = true;
						$this->data['message'] = 'Contract data update successfully, but Patient data not change';
					}
				}else{
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = false;
						$this->data['message'] = 'Patient data and Effective Date data not change';
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
	* delete Patients
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('patient_delete');

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
            set_message('Patient has been deleted.', 'success');
		} else {
            set_message('Error delete patient.', 'error');
		}

		redirect('administrator/patient');
	}

		/**
	* View view Patients
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('patient_view');

		$this->data['patient'] = $this->model_patient->find($id);

		$this->template->title('Patient Detail');
		$this->render('backend/standart/administrator/patient/patient_view', $this->data);
	}
	
	/**
	* delete Patients
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$patient = $this->model_patient->find($id);

		
		
		return $this->model_patient->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('patient_export');

		$this->model_patient->export('patient', 'patient');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('patient_export');

		$this->model_patient->pdf('patient', 'patient');
	}
}


/* End of file patient.php */
/* Location: ./application/controllers/administrator/Patient.php */