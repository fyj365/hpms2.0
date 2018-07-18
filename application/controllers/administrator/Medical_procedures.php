<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Medical Procedures Controller
*| --------------------------------------------------------------------------
*| Medical Procedures site
*|
*/
class Medical_procedures extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_medical_procedures');
	}

	/**
	* show all Medical Proceduress
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('medical_procedures_list');

		$field 	= "";
		
		$filters["SP_CODE"] = $this->input->get('SP_CODE');
		$filters["CLINIC_PROCEDURE"] = $this->input->get('CLINIC_PROCEDURE');

		$this->data['medical_proceduress'] = $this->model_medical_procedures->get($filters, $field, $this->limit_page, $offset);
		$this->data['medical_procedures_counts'] = $this->model_medical_procedures->cust_count_all();

		$config = [
			'base_url'     => 'administrator/medical_procedures/index/',
			'total_rows'   => $this->model_medical_procedures->cust_count_all(),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Medical Procedures List');
		$this->render('backend/standart/administrator/medical_procedures/medical_procedures_list', $this->data);
	}
	
	/**
	* Add new medical_proceduress
	*
	*/
	public function add()
	{
		$this->is_allowed('medical_procedures_add');

		$this->template->title('Medical Procedures New');
		$this->render('backend/standart/administrator/medical_procedures/medical_procedures_add', $this->data);
	}

	/**
	* Add New Medical Proceduress
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('medical_procedures_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('SP_CODE', 'Specialty Code', 'trim|required');
		$this->form_validation->set_rules('CLINIC_PROCEDURE', 'Clinic Procedure', 'trim|required|max_length[80]');
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));


		if ($this->form_validation->run()) {
		
			$save_data = [
				'SP_CODE' => $this->input->post('SP_CODE'),
				'CLINIC_PROCEDURE' => $this->input->post('CLINIC_PROCEDURE'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => date('Y-m-d H:i:s'),
			];

			
			$save_medical_procedures = $this->model_medical_procedures->store($save_data);

			if ($save_medical_procedures) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_medical_procedures;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/medical_procedures/edit/' . $save_medical_procedures, 'Edit Medical Procedures').' or  '.anchor('administrator/medical_procedures', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/medical_procedures/edit/' . $save_medical_procedures, 'Edit Medical Procedures'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/medical_procedures');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/medical_procedures');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Medical Proceduress
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('medical_procedures_update');

		$this->data['medical_procedures'] = $this->model_medical_procedures->find($id);

		$this->template->title('Medical Procedures Update');
		$this->render('backend/standart/administrator/medical_procedures/medical_procedures_update', $this->data);
	}

	/**
	* Update Medical Proceduress
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('medical_procedures_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('SP_CODE', 'Specialty Code', 'trim|required');
		$this->form_validation->set_rules('CLINIC_PROCEDURE', 'Clinic Procedure', 'trim|required|max_length[80]');
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'SP_CODE' => $this->input->post('SP_CODE'),
				'CLINIC_PROCEDURE' => $this->input->post('CLINIC_PROCEDURE'),
			];

			
			$save_medical_procedures = $this->model_medical_procedures->change($id, $save_data);
			
			if ($save_medical_procedures) {
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
					
				$this->db->where('AUTO_NO', $id);
				$this->db->update('medical_procedures', $save_data12);
			}

			if ($save_medical_procedures) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/medical_procedures', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/medical_procedures');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/medical_procedures');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Medical Proceduress
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('medical_procedures_delete');

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
            set_message('Medical Procedures has been deleted.', 'success');
		} else {
            set_message('Error delete medical_procedures.', 'error');
		}

		redirect('administrator/medical_procedures');
	}

		/**
	* View view Medical Proceduress
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('medical_procedures_view');

		$this->data['medical_procedures'] = $this->model_medical_procedures->find($id);

		$this->template->title('Medical Procedures Detail');
		$this->render('backend/standart/administrator/medical_procedures/medical_procedures_view', $this->data);
	}
	
	/**
	* delete Medical Proceduress
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$medical_procedures = $this->model_medical_procedures->find($id);

		
		
		return $this->model_medical_procedures->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('medical_procedures_export');

		$this->model_medical_procedures->export('medical_procedures', 'medical_procedures');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('medical_procedures_export');

		$this->model_medical_procedures->pdf('medical_procedures', 'medical_procedures');
	}
}


/* End of file medical_procedures.php */
/* Location: ./application/controllers/administrator/Medical Procedures.php */