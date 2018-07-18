<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Qualification Controller
*| --------------------------------------------------------------------------
*| Doctor Qualification site
*|
*/
class Doctor_qualification extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_qualification');
	}

	/**
	* show all Doctor Qualifications
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_qualification_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['doctor_qualifications'] = $this->model_doctor_qualification->get($filter, $field, $this->limit_page, $offset);
		$this->data['doctor_qualification_counts'] = $this->model_doctor_qualification->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/doctor_qualification/index/',
			'total_rows'   => $this->model_doctor_qualification->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor Qualification List');
		$this->render('backend/standart/administrator/doctor_qualification/doctor_qualification_list', $this->data);
	}
	
	/**
	* Add new doctor_qualifications
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_qualification_add');

		$this->template->title('Doctor Qualification New');
		$this->render('backend/standart/administrator/doctor_qualification/doctor_qualification_add', $this->data);
	}

	/**
	* Add New Doctor Qualifications
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_qualification_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required');
		$this->form_validation->set_rules('QUALIFICATION', 'Qualification', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('CERT_YEAR', 'Cert Year', 'trim|required|max_length[12]|regex_match[/^[0-9\-]+$/]');
		$this->form_validation->set_rules('doctor_qualification_CERT_COPY_name', 'CERT COPY', 'trim');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
			$doctor_qualification_CERT_COPY_uuid = $this->input->post('doctor_qualification_CERT_COPY_uuid');
			$doctor_qualification_CERT_COPY_name = $this->input->post('doctor_qualification_CERT_COPY_name');
		
			$dr_code = $this->input->post('DR_CODE');
			 
			$save_data = [
				'QUALIFICATION_CODE' => $this->input->post('QUALIFICATION_CODE'),
				'DR_CODE' => $dr_code,
				'QUALIFICATION' => $this->input->post('QUALIFICATION'),
				'CERT_YEAR' => $this->input->post('CERT_YEAR'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
			];

			if (!is_dir(FCPATH . '/uploads/doctor_qualification/')) {
				mkdir(FCPATH . '/uploads/doctor_qualification/');
			}

			if (!empty($doctor_qualification_CERT_COPY_name)) {
				$doctor_qualification_CERT_COPY_name_copy = $dr_code . '-' . $doctor_qualification_CERT_COPY_name;

				rename(FCPATH . 'uploads/tmp/' . $doctor_qualification_CERT_COPY_uuid . '/' . $doctor_qualification_CERT_COPY_name, 
						FCPATH . 'uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy);

				if (!is_file(FCPATH . '/uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['CERT_COPY'] = $doctor_qualification_CERT_COPY_name_copy;
			}
		
			
			$save_doctor_qualification = $this->model_doctor_qualification->store($save_data);

			if ($save_doctor_qualification) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor_qualification;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor_qualification/edit/' . $save_doctor_qualification, 'Edit Doctor Qualification').' or  '.anchor('administrator/doctor_qualification', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_qualification/edit/' . $save_doctor_qualification, 'Edit Doctor Qualification'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_qualification');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_qualification');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctor Qualifications
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('doctor_qualification_update');

		$this->data['doctor_qualification'] = $this->model_doctor_qualification->find($id);

		$this->template->title('Doctor Qualification Update');
		$this->render('backend/standart/administrator/doctor_qualification/doctor_qualification_update', $this->data);
	}

	/**
	* Update Doctor Qualifications
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('doctor_qualification_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required');
		$this->form_validation->set_rules('QUALIFICATION', 'Qualification', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('CERT_YEAR', 'Cert Year', 'trim|required|max_length[12]|regex_match[/^[0-9\-]+$/]');
		
		$this->form_validation->set_rules('doctor_qualification_CERT_COPY_name', 'CERT COPY', 'trim');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		if ($this->form_validation->run()) {
			$doctor_qualification_CERT_COPY_uuid = $this->input->post('doctor_qualification_CERT_COPY_uuid');
			$doctor_qualification_CERT_COPY_name = $this->input->post('doctor_qualification_CERT_COPY_name');
			
			$dr_code = $this->input->post('DR_CODE');
		
			$save_data = [
				'QUALIFICATION' => $this->input->post('QUALIFICATION'),
				'CERT_YEAR' => $this->input->post('CERT_YEAR'),
			];

			if (!is_dir(FCPATH . '/uploads/doctor_qualification/')) {
				mkdir(FCPATH . '/uploads/doctor_qualification/');
			}

			if (!empty($doctor_qualification_CERT_COPY_uuid)) {
				$doctor_qualification_CERT_COPY_name_copy = $dr_code . '-' . $doctor_qualification_CERT_COPY_name;

				rename(FCPATH . 'uploads/tmp/' . $doctor_qualification_CERT_COPY_uuid . '/' . $doctor_qualification_CERT_COPY_name, 
						FCPATH . 'uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy);

				if (!is_file(FCPATH . '/uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['CERT_COPY'] = $doctor_qualification_CERT_COPY_name_copy;
			}
		

			$save_doctor_qualification = $this->model_doctor_qualification->change($id, $save_data);
			
			if ($save_doctor_qualification){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where('QUALIFICATION_CODE', $id);
				$this->db->update('doctor_qualification', $save_data12);
			}

			if ($save_doctor_qualification) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor_qualification', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_qualification');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_qualification');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Doctor Qualifications
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_qualification_delete');

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
            set_message('Doctor Qualification has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_qualification.', 'error');
		}

		redirect('administrator/doctor_qualification');
	}

		/**
	* View view Doctor Qualifications
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_qualification_view');

		$this->data['doctor_qualification'] = $this->model_doctor_qualification->find($id);

		$this->template->title('Doctor Qualification Detail');
		$this->render('backend/standart/administrator/doctor_qualification/doctor_qualification_view', $this->data);
	}
	
	/**
	* delete Doctor Qualifications
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor_qualification = $this->model_doctor_qualification->find($id);

		if (!empty($doctor_qualification->CERT_COPY)) {
			$path = FCPATH . '/uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_doctor_qualification->remove($id);
	}
	
	/**
	* Upload Image Doctor Qualification	* 
	* @return JSON
	*/
	public function upload_CERT_COPY_file()
	{
		if (!$this->is_allowed('doctor_qualification_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'doctor_qualification',
			'allowed_types' => 'jpg|png|pdf',
		]);
	}

	/**
	* Delete Image Doctor Qualification	* 
	* @return JSON
	*/
	public function delete_CERT_COPY_file($uuid)
	{
		if (!$this->is_allowed('doctor_qualification_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'CERT_COPY', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'doctor_qualification',
            'primary_key'       => 'QUALIFICATION_CODE',
            'upload_path'       => 'uploads/doctor_qualification/'
        ]);
	}

	/**
	* Get Image Doctor Qualification	* 
	* @return JSON
	*/
	public function get_CERT_COPY_file($id)
	{
		if (!$this->is_allowed('doctor_qualification_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$doctor_qualification = $this->model_doctor_qualification->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'CERT_COPY', 
            'table_name'        => 'doctor_qualification',
            'primary_key'       => 'QUALIFICATION_CODE',
            'upload_path'       => 'uploads/doctor_qualification/',
            'delete_endpoint'   => 'administrator/doctor_qualification/delete_CERT_COPY_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_qualification_export');

		$this->model_doctor_qualification->export('doctor_qualification', 'doctor_qualification');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_qualification_export');

		$this->model_doctor_qualification->pdf('doctor_qualification', 'doctor_qualification');
	}
}


/* End of file doctor_qualification.php */
/* Location: ./application/controllers/administrator/Doctor Qualification.php */