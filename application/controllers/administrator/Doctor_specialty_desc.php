<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Specialty Desc Controller
*| --------------------------------------------------------------------------
*| Doctor Specialty Desc site
*|
*/
class Doctor_specialty_desc extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_specialty_desc');
	}

	/**
	* show all Doctor Specialty Descs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_specialty_desc_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['doctor_specialty_descs'] = $this->model_doctor_specialty_desc->get($filter, $field, $this->limit_page, $offset);
		$this->data['doctor_specialty_desc_counts'] = $this->model_doctor_specialty_desc->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/doctor_specialty_desc/index/',
			'total_rows'   => $this->model_doctor_specialty_desc->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor Specialty Desc List');
		$this->render('backend/standart/administrator/doctor_specialty_desc/doctor_specialty_desc_list', $this->data);
	}
	
	/**
	* Add new doctor_specialty_descs
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_specialty_desc_add');

		$this->template->title('Doctor Specialty Desc New');
		$this->render('backend/standart/administrator/doctor_specialty_desc/doctor_specialty_desc_add', $this->data);
	}

	/**
	* Add New Doctor Specialty Descs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_specialty_desc_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		
		$this->form_validation->set_rules('SP_CODE', 'SP code','trim|required|is_unique[doctor_specialty_desc.SP_CODE]');
		$this->form_validation->set_rules('E_DESC', 'English Description', 'trim|required');
		$this->form_validation->set_rules('C_DESC', 'Chinese Description', 'trim|required');
		 
		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'SP_CODE' => $this->input->post('SP_CODE'),
				'E_DESC' => $this->input->post('E_DESC'),
				'C_DESC' => $this->input->post('C_DESC'),
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')
			];

			
			$save_doctor_specialty_desc = $this->model_doctor_specialty_desc->storeSpecial($save_data);

			if ($save_doctor_specialty_desc) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor_specialty_desc;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor_specialty_desc/edit/' . $save_doctor_specialty_desc, 'Edit Doctor Specialty Desc').' or  '.anchor('administrator/doctor_specialty_desc', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_specialty_desc/edit/' . $save_doctor_specialty_desc, 'Edit Doctor Specialty Desc'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_specialty_desc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_specialty_desc');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctor Specialty Descs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('doctor_specialty_desc_update');

		$this->data['doctor_specialty_desc'] = $this->model_doctor_specialty_desc->find($id);

		$this->template->title('Doctor Specialty Desc Update');
		$this->render('backend/standart/administrator/doctor_specialty_desc/doctor_specialty_desc_update', $this->data);
	}

	/**
	* Update Doctor Specialty Descs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('doctor_specialty_desc_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('SP_CODE', 'SP code','trim|required'); 
		$this->form_validation->set_rules('E_DESC', 'English Description', 'trim|required');
		$this->form_validation->set_rules('C_DESC', 'Chinese Description', 'trim|required');

		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'SP_CODE' => $this->input->post('SP_CODE'),
				'E_DESC' => $this->input->post('E_DESC'),
				'C_DESC' => $this->input->post('C_DESC')
			];
			
			$save_doctor_specialty_desc = $this->model_doctor_specialty_desc->change($id, $save_data);

			if ($save_doctor_specialty_desc) {
				$save_data =[
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s')
				];
				
				$this->db->where('SP_CODE', $id);
        		$this->db->update('doctor_specialty_desc', $save_data);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor_specialty_desc', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_specialty_desc');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_specialty_desc');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Doctor Specialty Descs
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_specialty_desc_delete');

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
            set_message('Doctor Specialty Desc has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_specialty_desc.', 'error');
		}

		redirect('administrator/doctor_specialty_desc');
	}

		/**
	* View view Doctor Specialty Descs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_specialty_desc_view');

		$this->data['doctor_specialty_desc'] = $this->model_doctor_specialty_desc->find($id);

		$this->template->title('Doctor Specialty Desc Detail');
		$this->render('backend/standart/administrator/doctor_specialty_desc/doctor_specialty_desc_view', $this->data);
	}
	
	/**
	* delete Doctor Specialty Descs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor_specialty_desc = $this->model_doctor_specialty_desc->find($id);

		
		
		return $this->model_doctor_specialty_desc->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_specialty_desc_export');

		$this->model_doctor_specialty_desc->export('doctor_specialty_desc', 'doctor_specialty_desc');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_specialty_desc_export');

		$this->model_doctor_specialty_desc->pdf('doctor_specialty_desc', 'doctor_specialty_desc');
	}
}


/* End of file doctor_specialty_desc.php */
/* Location: ./application/controllers/administrator/Doctor Specialty Desc.php */