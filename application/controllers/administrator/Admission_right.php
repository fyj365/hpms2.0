<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Admission Right Controller
*| --------------------------------------------------------------------------
*| Admission Right site
*|
*/
class Admission_right extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_admission_right');
	}

	/**
	* show all Admission Rights
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('admission_right_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['admission_rights'] = $this->model_admission_right->get($filter, $field, $this->limit_page, $offset);
		$this->data['admission_right_counts'] = $this->model_admission_right->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/admission_right/index/',
			'total_rows'   => $this->model_admission_right->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Admission Right List');
		$this->render('backend/standart/administrator/admission_right/admission_right_list', $this->data);
	}
	
	/**
	* Add new admission_rights
	*
	*/
	public function add()
	{
		$this->is_allowed('admission_right_add');

		$this->template->title('Admission Right New');
		$this->render('backend/standart/administrator/admission_right/admission_right_add', $this->data);
	}

	/**
	* Add New Admission Rights
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('admission_right_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('HOSPITAL_NAME', 'Hospital Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('SHORT_NAME', 'Short Name', 'trim|max_length[80]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'HOSPITAL_NAME' => $this->input->post('HOSPITAL_NAME'),
				'SHORT_NAME' => $this->input->post('SHORT_NAME'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => date('Y-m-d H:i:s'),
			];

			
			$save_admission_right = $this->model_admission_right->store($save_data);

			if ($save_admission_right) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_admission_right;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/admission_right/edit/' . $save_admission_right, 'Edit Admission Right').' or  '.anchor('administrator/admission_right', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/admission_right/edit/' . $save_admission_right, 'Edit Admission Right'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/admission_right');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/admission_right');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Admission Rights
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('admission_right_update');

		$this->data['admission_right'] = $this->model_admission_right->find($id);

		$this->template->title('Admission Right Update');
		$this->render('backend/standart/administrator/admission_right/admission_right_update', $this->data);
	}

	/**
	* Update Admission Rights
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('admission_right_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('HOSPITAL_NAME', 'Hospital Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('SHORT_NAME', 'Short Name', 'trim|max_length[80]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'HOSPITAL_NAME' => $this->input->post('HOSPITAL_NAME'),
				'SHORT_NAME' => $this->input->post('SHORT_NAME'),
			];
			
			$save_admission_right = $this->model_admission_right->change($id, $save_data);
			
			if ($save_admission_right){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where("AUTO_NO", $id);
				$this->db->update("admission_right", $save_data12);
			}

			if ($save_admission_right) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/admission_right', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/admission_right');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/admission_right');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Admission Rights
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('admission_right_delete');

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
            set_message('Admission Right has been deleted.', 'success');
		} else {
            set_message('Error delete admission_right.', 'error');
		}

		redirect('administrator/admission_right');
	}

		/**
	* View view Admission Rights
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('admission_right_view');

		$this->data['admission_right'] = $this->model_admission_right->find($id);

		$this->template->title('Admission Right Detail');
		$this->render('backend/standart/administrator/admission_right/admission_right_view', $this->data);
	}
	
	/**
	* delete Admission Rights
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$admission_right = $this->model_admission_right->find($id);

		
		
		return $this->model_admission_right->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('admission_right_export');

		$this->model_admission_right->export('admission_right', 'admission_right');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('admission_right_export');

		$this->model_admission_right->pdf('admission_right', 'admission_right');
	}
}


/* End of file admission_right.php */
/* Location: ./application/controllers/administrator/Admission Right.php */