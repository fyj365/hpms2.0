<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Type Desc Controller
*| --------------------------------------------------------------------------
*| Doctor Type Desc site
*|
*/
class Doctor_type_desc extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_type_desc');
	}

	/**
	* show all Doctor Type Descs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_type_desc_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['doctor_type_descs'] = $this->model_doctor_type_desc->get($filter, $field, $this->limit_page, $offset);
		$this->data['doctor_type_desc_counts'] = $this->model_doctor_type_desc->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/doctor_type_desc/index/',
			'total_rows'   => $this->model_doctor_type_desc->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor Type Desc List');
		$this->render('backend/standart/administrator/doctor_type_desc/doctor_type_desc_list', $this->data);
	}
	
	/**
	* Add new doctor_type_descs
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_type_desc_add');

		$this->template->title('Doctor Type Desc New');
		$this->render('backend/standart/administrator/doctor_type_desc/doctor_type_desc_add', $this->data);
	}

	/**
	* Add New Doctor Type Descs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_type_desc_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		
		$this->form_validation->set_rules('DT_CODE', 'Doctor Type Code', 'trim|required|is_unique[doctor_type_desc.DT_CODE]');
		$this->form_validation->set_rules('E_DESC', 'English Description', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'DT_CODE' => $this->input->post('DT_CODE'),
				'E_DESC' => $this->input->post('E_DESC'),
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')
			];

			$save_doctor_type_desc = $this->model_doctor_type_desc->storeSpecial($save_data);

			if ($save_doctor_type_desc) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor_type_desc;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor_type_desc/edit/' . $save_doctor_type_desc, 'Edit Doctor Type Desc').' or  '.anchor('administrator/doctor_type_desc', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_type_desc/edit/' . $save_doctor_type_desc, 'Edit Doctor Type Desc'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_type_desc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_type_desc');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctor Type Descs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('doctor_type_desc_update');

		$this->data['doctor_type_desc'] = $this->model_doctor_type_desc->find($id);

		$this->template->title('Doctor Type Desc Update');
		$this->render('backend/standart/administrator/doctor_type_desc/doctor_type_desc_update', $this->data);
	}

	/**
	* Update Doctor Type Descs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('doctor_type_desc_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
	    $this->form_validation->set_rules('DT_CODE', 'Doctor Type Code', 'trim|required');
		$this->form_validation->set_rules('E_DESC', 'English Description', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'DT_CODE' => $this->input->post('DT_CODE'),
				'E_DESC' => $this->input->post('E_DESC')
			];
			
			$save_doctor_type_desc = $this->model_doctor_type_desc->change($id, $save_data);

			if ($save_doctor_type_desc) {

				$save_data =[
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s')
				];
				$this->db->where('DT_CODE', $id);
        		$this->db->update('doctor_type_desc', $save_data);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor_type_desc', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_type_desc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_type_desc');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Doctor Type Descs
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_type_desc_delete');

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
            set_message('Doctor Type Desc has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_type_desc.', 'error');
		}

		redirect('administrator/doctor_type_desc');
	}

		/**
	* View view Doctor Type Descs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_type_desc_view');

		$this->data['doctor_type_desc'] = $this->model_doctor_type_desc->find($id);

		$this->template->title('Doctor Type Desc Detail');
		$this->render('backend/standart/administrator/doctor_type_desc/doctor_type_desc_view', $this->data);
	}
	
	/**
	* delete Doctor Type Descs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor_type_desc = $this->model_doctor_type_desc->find($id);

		
		
		return $this->model_doctor_type_desc->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_type_desc_export');

		$this->model_doctor_type_desc->export('doctor_type_desc', 'doctor_type_desc');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_type_desc_export');

		$this->model_doctor_type_desc->pdf('doctor_type_desc', 'doctor_type_desc');
	}
}


/* End of file doctor_type_desc.php */
/* Location: ./application/controllers/administrator/Doctor Type Desc.php */