<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Patient Contract Controller
*| --------------------------------------------------------------------------
*| Patient Contract site
*|
*/
class Patient_effective_date extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_patient_effective_date');
	}

	/**
	* show all Patient Contracts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('patient_effective_date_list');

		$field 	= "";
		
		$filters["PATIENT_AUTONO"] = $this->input->get('PATIENT_AUTONO');
		$filters["CARD_CODE"] = $this->input->get('CARD_CODE');
		$filters["PATIENT_NO"] = $this->input->get('PATIENT_NO');
		$filters["PATIENT_NAME"] = $this->input->get('PATIENT_NAME');
		$filters["PATIENT_EFFECTIVE_NO"] = $this->input->get('PATIENT_EFFECTIVE_NO');
		$filters["START_DATE"] = $this->input->get('START_DATE');
		$filters["TERM_DATE"] = $this->input->get('TERM_DATE');
		$filters["STATUS"] = $this->input->get('STATUS');

		$this->data['patient_effective_dates'] = $this->model_patient_effective_date->get($filters, $field, $this->limit_page, $offset);
		$this->data['patient_effective_date_counts'] = $this->model_patient_effective_date->cust_count_all();

		$config = [
			'base_url'     => 'administrator/patient_effective_date/index/',
			'total_rows'   => $this->model_patient_effective_date->cust_count_all(),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Patient Contract List');
		$this->render('backend/standart/administrator/patient_effective_date/patient_effective_date_list', $this->data);
	}
	
	/**
	* Add new patient_effective_dates
	*
	*/
	public function add()
	{
		$this->is_allowed('patient_effective_date_add');

		$this->template->title('Patient Contract New');
		$this->render('backend/standart/administrator/patient_effective_date/patient_effective_date_add', $this->data);
	}
	
	public function add_patient_no(){
		$CARD_CODE = $this->input->get('CARD_CODE');
		
		$this->db->select('PATIENT_NO, PATIENT_NAME');
		$this->db->where('CARD_CODE', $CARD_CODE);
		$query = $this->db->get('patient');
		$count = $query->num_rows();
		
		if ($count > 0){
			$this->data['patient_no_count'] = true;
			$this->data['patient_no'] = $query->result();
		}else{
			$this->data['patient_no_count'] = false;
		}

		echo json_encode($this->data);
	}
	
	public function add_patient_details(){
		$CARD_CODE = $this->input->get('CARD_CODE');
		$patient_no = $this->input->get('patient_no');
		$patient_name = $this->input->get('patient_name');
		
		$this->db->where('CARD_CODE', $CARD_CODE);
		$this->db->where('PATIENT_NO', $patient_no);
		$this->db->where('PATIENT_NAME', $patient_name);
		$query = $this->db->get('patient');
		
		//Check if the partner has no patient
		$count = $query->num_rows();
		
		if ($count > 0){
			$this->data['patient_count'] = true;
			$patient = $query->row();
			$this->data['patient'] = $patient;

			//To select out the MAX Contract No
			$this->db->select("MAX(PATIENT_EFFECTIVE_NO) as max_effective_no");
			$this->db->where("PATIENT_AUTONO", $patient->AUTO_NO);
			$query = $this->db->get('patient_effective_date');
			$max_effective_no = $query->row();
			$this->data['patient_effective_date_no'] = $max_effective_no;
			
			//Check if the patient has no contract
			$count = $query->num_rows();
			
			if ($count > 0 && $max_effective_no->max_effective_no != null){
				$this->data['patient_effective_date_count'] = true;
				
				//To select out the last contract details
				$this->db->where("PATIENT_AUTONO", $patient->AUTO_NO);
				$this->db->where("PATIENT_EFFECTIVE_NO", $max_effective_no->max_effective_no);
				$this->data['patient_effective_date'] = $this->db->get('patient_effective_date')->row();
			}else{
				$this->data['patient_effective_date_count'] = false;
			}
			
			
			
		}else{
			$this->data['patient_count'] = false;
		}

		echo json_encode($this->data);
	}

	/**
	* Add New Patient Contracts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('patient_effective_date_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');
		$this->form_validation->set_rules('PATIENT_NO', 'Patient No', 'trim|required');
		$this->form_validation->set_rules('PATIENT_EFFECTIVE_NO', 'Patient Contract No', 'trim|required');
		$this->form_validation->set_rules('REMARK', 'Remark', 'trim|max_length[80]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
			
			$patient_autono = $this->input->post('PATIENT_AUTONO');
			$patient_autono = substr($patient_autono, 9);
			$start_date = $this->input->post('START_DATE');
			$term_date = $this->input->post('TERM_DATE');
			$patient_effective_no = $this->input->post('PATIENT_EFFECTIVE_NO');
			
			$update_effective = 0;
			$save_patient_effective_date = 0;
			
			//Check if user wants to term last contract then insert new contract
			if ($patient_effective_no != 1){
				
					$this->db->where("PATIENT_AUTONO", $patient_autono);
					$this->db->where("PATIENT_EFFECTIVE_NO", ($patient_effective_no-1));
					$this->db->where("STATUS = 'Active' OR STATUS = '' OR STATUS= '%Not Start%'");
					$query = $this->db->get("patient_effective_date");
					
					if ($query->num_rows() > 0){
						$this->db->set('TERM_DATE', date('Y-m-d'));
						$this->db->set('STATUS', 'Terminate');
						$this->db->where('PATIENT_AUTONO', $patient_autono);
						$this->db->where('PATIENT_EFFECTIVE_NO', ($patient_effective_no-1));
						$this->db->update('patient_effective_date');
						
						$update_effective = $this->db->affected_rows();
						
					}else{
						$update_effective = 1;
					}

			}else{
				$update_effective = 1;
			}
			
			
			
			if ($update_effective > 0){
				
				$status = "Active";
				
				$today = date("Y-m-d");
				
				if ($start_date > $today){
					$status = "Not Start";
				}
				
				if ($term_date < $today){
					$status = "Terminate";
				}
				
				$save_data = [
					'PATIENT_AUTONO' => $patient_autono,
					'PATIENT_EFFECTIVE_NO' => $patient_effective_no,
					'ORIGINAL_TERM_DATE' => $term_date,
					'START_DATE' => $start_date,
					'TERM_DATE' => $term_date,
					'REMARK' => $this->input->post('REMARK'),
					'STATUS' => $status,
					'CREATOR' => $user,
					'CREATE_DATE' => $today,
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];

				$this->db->insert('patient_effective_date', $save_data);
				$save_patient_effective_date = $this->db->affected_rows();
				
				
				//If inserting an active effective date, also change patient status as Active
				if ($status == "Active"){
					$save_data12 = [
						'STATUS' => $status,
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE' => $today,
					];
					
					$this->db->where("AUTO_NO", $patient_autono);
					$this->db->update('patient', $save_data12);
				}
				

			}
			
			if ($save_patient_effective_date > 0 && $status == "Terminate"){
					
				//If the latest effective date is term status, also change patient status as Term
				$this->db->where("PATIENT_AUTONO", $patient_autono);
				$this->db->where("STATUS", "Active");
				$query = $this->db->get('patient_effective_date');
				
				if ($query->num_rows() <= 0){
					$save_data2 = [
						'STATUS' => $status,
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE' => $today,
					];
					
					$this->db->where("AUTO_NO", $patient_autono);
					$this->db->update('patient', $save_data2);
				}
				
			}
		
			

			if ($update_effective > 0 && $save_patient_effective_date > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $patient_autono;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/patient_effective_date/edit/' . $patient_autono . '/' . $patient_effective_no, 'Edit Patient Contract').' or  '.anchor('administrator/patient_effective_date', ' Go back to list');
				}
			} else if ($update_effective > 0 && $save_patient_effective_date == 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'The Last Contract has be terminated, but New Contract insert fail. Please refresh page and insert again';
				}
			} else{
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
	* Update view Patient Contracts
	*
	* @var $id String
	*/
	public function edit($autono, $contract_no)
	{
		$this->is_allowed('patient_effective_date_update');

		$this->db->where('PATIENT_AUTONO', $autono);
		$this->db->where('PATIENT_EFFECTIVE_NO', $contract_no);
        $query = $this->db->get('patient_effective_date');

        if($query->num_rows()>0)
        {
            $this->data['patient_effective_date'] = $query->row();
        }
        else
        {
            $this->data['patient_effective_date'] = FALSE;
        }

		$this->template->title('Patient Contract Update');
		$this->render('backend/standart/administrator/patient_effective_date/patient_effective_date_update', $this->data);
	}

	/**
	* Update Patient Contracts
	*
	* @var $id String
	*/
	public function edit_lastContract(){
		
		$patient_autono = $this->input->get("patient_autono");
		
		//To select out the MAX Contract No
		$this->db->select("MAX(PATIENT_EFFECTIVE_NO) as max_contract_no");
		$this->db->where("PATIENT_AUTONO", $patient_autono);
		$query = $this->db->get('patient_effective_date');
		$max_contract_no = $query->row();
		$this->data['max_contract_no'] = $max_contract_no;
		
		echo json_encode($this->data);
	}
	
	
	public function edit_save($auto_no, $effective_no)
	{
		if (!$this->is_allowed('patient_effective_date_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}	
		
		$this->form_validation->set_rules('UPDATE_REMARK', 'Update Remark', 'trim|max_length[80]');

		$ch_status = $this->input->post('STATUS');
		$term_date = $this->input->post('TERM_DATE');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		$today = date("Y-m-d");
		
		if ($this->form_validation->run()) {
			

			//If ch_status changed to Term
			if ($ch_status != ""){
				$term_date = $today;
			
				$this->db->set("STATUS", "Terminate");
			}
				
			$save_data = [
				'TERM_DATE' => $term_date,
				'REMARK' => $this->input->post('UPDATE_REMARK'),
			];

			
			$this->db->where("PATIENT_AUTONO", $auto_no);
			$this->db->where("PATIENT_EFFECTIVE_NO", $effective_no);
			$this->db->update('patient_effective_date', $save_data);
			$save_patient_effective_date = $this->db->affected_rows();
			
			if ($save_patient_effective_date){
				
				$save_data2 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];
				
				$this->db->where("PATIENT_AUTONO", $auto_no);
				$this->db->where("PATIENT_EFFECTIVE_NO", $effective_no);
				$this->db->update('patient_effective_date', $save_data);
				
			}
			
			
			//Check if the patient has no effective date activating, change the patient status as Term
			$this->db->where("PATIENT_AUTONO", $auto_no);
			$this->db->where("STATUS", "Active");
			$query = $this->db->get('patient_effective_date');
			
			
			if ($query->num_rows() <= 0){
				
				$save_data22 = [
					'STATUS' => "Terminate",
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];
				
				$this->db->where("AUTO_NO", $auto_no);
				$this->db->update('patient', $save_data22);
			}

			if ($save_patient_effective_date) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $auto_no;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/patient_effective_date', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/patient_effective_date');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/patient_effective_date');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Patient Contracts
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('patient_effective_date_delete');

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
            set_message('Patient Contract has been deleted.', 'success');
		} else {
            set_message('Error delete patient_effective_date.', 'error');
		}

		redirect('administrator/patient_effective_date');
	}

		/**
	* View view Patient Contracts
	*
	* @var $id String
	*/
	public function view($auto_no, $contract_no)
	{
		$this->is_allowed('patient_effective_date_view');

		$this->db->where('PATIENT_AUTONO', $auto_no);
		$this->db->where('PATIENT_EFFECTIVE_NO', $contract_no);
        $query = $this->db->get('patient_effective_date');
		$this->data['patient_effective_date'] = $query->row();

		$this->template->title('Patient Contract Detail');
		$this->render('backend/standart/administrator/patient_effective_date/patient_effective_date_view', $this->data);
	}
	
	/**
	* delete Patient Contracts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$patient_effective_date = $this->model_patient_effective_date->find($id);

		
		
		return $this->model_patient_effective_date->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('patient_effective_date_export');

		$this->model_patient_effective_date->export('patient_effective_date', 'patient_effective_date');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('patient_effective_date_export');

		$this->model_patient_effective_date->pdf('patient_effective_date', 'patient_effective_date');
	}
}


/* End of file patient_effective_date.php */
/* Location: ./application/controllers/administrator/Patient Contract.php */