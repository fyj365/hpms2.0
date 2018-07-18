<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Diagnosis Code Controller
*| --------------------------------------------------------------------------
*| Diagnosis Code site
*|
*/
class Diagnosis_code extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_diagnosis_code');
	}

	/**
	* show all Diagnosis Codes
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('diagnosis_code_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['diagnosis_codes'] = $this->model_diagnosis_code->get($filter, $field, $this->limit_page, $offset);
		$this->data['diagnosis_code_counts'] = $this->model_diagnosis_code->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/diagnosis_code/index/',
			'total_rows'   => $this->model_diagnosis_code->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Diagnosis Code List');
		$this->render('backend/standart/administrator/diagnosis_code/diagnosis_code_list', $this->data);
	}
	
	/**
	* Add new diagnosis_codes
	*
	*/
	public function add()
	{
		$this->is_allowed('diagnosis_code_add');
        $this->db->select('DIAG_CODE');
        $this->db->group_by('DIAG_CODE');
		$query = $this->db->get('diagnosis_code');
		
		$this->data['diagnosis_codes'] = $query->result();
		$this->data['diagnosis_code_counts'] = $query->num_rows();

		$this->template->title('Diagnosis Code New');
		$this->render('backend/standart/administrator/diagnosis_code/diagnosis_code_add', $this->data);
	}

	/**
	* Add New Diagnosis Codes
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('diagnosis_code_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		
		$this->form_validation->set_rules('DIAG_CODE','diagnosis code','trim|required');
		$this->form_validation->set_rules('DIAG_CODE_STANDARD','Diagnosis Code Standard','trim|required');

	   $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'AUTO_NO' => $this->input->post('AUTO_NO'),
				'DIAG_CODE_STANDARD' => $this->input->post('DIAG_CODE_STANDARD'),
				'DIAG_CODE' => $this->input->post('DIAG_CODE'),
				'E_DESC' => $this->input->post('E_DESC'),
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')

			];
			
			$save_diagnosis_code = $this->model_diagnosis_code->store($save_data);

			if ($save_diagnosis_code) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_diagnosis_code;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/diagnosis_code/edit/' . $save_diagnosis_code, 'Edit Diagnosis Code').' or  '.anchor('administrator/diagnosis_code', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/diagnosis_code/edit/' . $save_diagnosis_code, 'Edit Diagnosis Code'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/diagnosis_code');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/diagnosis_code');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Diagnosis Codes
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('diagnosis_code_update');

        $this->db->select('DIAG_CODE');
        $this->db->group_by('DIAG_CODE');
		$query = $this->db->get('diagnosis_code');
		
		$this->data['diagnosis_codes'] = $query->result();
		$this->data['diagnosis_code_counts'] = $query->num_rows();

		$this->data['diagnosis_code'] = $this->model_diagnosis_code->find($id);

		$this->template->title('Diagnosis Code Update');
		$this->render('backend/standart/administrator/diagnosis_code/diagnosis_code_update', $this->data);
	}

	/**
	* Update Diagnosis Codes
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('diagnosis_code_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('DIAG_CODE','diagnosis code','trim|required');
		$this->form_validation->set_rules('DIAG_CODE_STANDARD','Diagnosis Code Standard','trim|required');

	    $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
 		$currentTime = date('Y-m-d H:i:s');


		if ($this->form_validation->run()) {
		
			$save_data = [
				'DIAG_CODE' => $this->input->post('DIAG_CODE'),
				'DIAG_CODE_STANDARD' => $this->input->post('DIAG_CODE_STANDARD'),
				'E_DESC' => $this->input->post('E_DESC')
			];

			
			$save_diagnosis_code = $this->model_diagnosis_code->change($id, $save_data);

			if ($save_diagnosis_code) {

				$save_data =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $currentTime
				];
				$this->db->where('AUTO_NO', $id);
        		$this->db->update('diagnosis_code', $save_data);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/diagnosis_code', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/diagnosis_code');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/diagnosis_code');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Diagnosis Codes
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('diagnosis_code_delete');

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
            set_message('Diagnosis Code has been deleted.', 'success');
		} else {
            set_message('Error delete diagnosis_code.', 'error');
		}

		redirect('administrator/diagnosis_code');
	}

		/**
	* View view Diagnosis Codes
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('diagnosis_code_view');

		$this->data['diagnosis_code'] = $this->model_diagnosis_code->find($id);

		$this->template->title('Diagnosis Code Detail');
		$this->render('backend/standart/administrator/diagnosis_code/diagnosis_code_view', $this->data);
	}
	
	/**
	* delete Diagnosis Codes
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$diagnosis_code = $this->model_diagnosis_code->find($id);

		
		
		return $this->model_diagnosis_code->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('diagnosis_code_export');

		$this->model_diagnosis_code->export('diagnosis_code', 'diagnosis_code');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('diagnosis_code_export');

		$this->model_diagnosis_code->pdf('diagnosis_code', 'diagnosis_code');
	}
}


/* End of file diagnosis_code.php */
/* Location: ./application/controllers/administrator/Diagnosis Code.php */