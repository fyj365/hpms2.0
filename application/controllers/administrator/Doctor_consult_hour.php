<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Consult Hour Controller
*| --------------------------------------------------------------------------
*| Doctor Consult Hour site
*|
*/
class Doctor_consult_hour extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_consult_hour');
	}

	/**
	* show all Doctor Consult Hours
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_consult_hour_list');
		
		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['doctor_consult_hours'] = $this->model_doctor_consult_hour->get($filter, $field, $this->limit_page, $offset);
		$this->data['doctor_consult_hour_counts'] = $this->model_doctor_consult_hour->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/doctor_consult_hour/index/',
			'total_rows'   => $this->model_doctor_consult_hour->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor Consult Hour List');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_list', $this->data);
	}
	
	/**
	* Add new doctor_consult_hours
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_consult_hour_add');

		$this->template->title('Doctor Consult Hour New');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_add', $this->data);
	}

	public function add_2($doctor = NULL, $center =NULL)
	{  
		$this->is_allowed('doctor_consult_hour_add');
		if (!is_null($doctor) && !is_null($center)) {
			# code...
		   $this->data['SELECTED_DOCTOR_CODE'] = $doctor;
           $this->data['SELECTED_CENTER_CODE'] = $center;

		}elseif(!is_null($doctor) && is_null($center)){

		   $this->data['SELECTED_DOCTOR_CODE'] = $doctor;
		    $this->data['SELECTED_CENTER_CODE'] = NULL;
		    $this->db->where('DR_CODE', $doctor);
		    $query = $this->db->get('doctor_center');
		    if ($query->num_rows() > 0 ) {
		    	# code...
		    	$this->data['doctor_center'] = $query->result();
		    }else{
		    	$this->data['doctor_center'] = NULL;
		    }

		}else{
			  $this->data['SELECTED_DOCTOR_CODE'] = NULL;
		      $this->data['SELECTED_CENTER_CODE'] = NULL;
		}

		$this->template->title('Doctor Consult Hour New');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_add', $this->data);
	}

	/**
	* Add New Doctor Consult Hours
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_consult_hour_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required');
		$this->form_validation->set_rules('CONTACT_PERSON', 'Contact Person', 'trim|max_length[80]');
		$this->form_validation->set_rules('CENTER_CODE', 'Center Code', 'trim|required');
		// $this->form_validation->set_rules('SCHEDULE_DAY_C1[]', 'Opening hours 1', 'trim|required');
		$this->form_validation->set_rules('TIMESLOT1_1', 'Opening hours 1: Timeslot 1', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT1_2', 'Opening hours 1: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT1_3', 'Opening hours 1: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT2_1', 'Opening hours 2: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT2_2', 'Opening hours 2: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT2_3', 'Opening hours 2: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT3_1', 'Opening hours 3: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT3_2', 'Opening hours 3: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT3_3', 'Opening hours 3: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT4_1', 'Opening hours 4: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT4_2', 'Opening hours 4: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT4_3', 'Opening hours 4: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT5_1', 'Opening hours 5: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT5_2', 'Opening hours 5: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT5_3', 'Opening hours 5: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT6_1', 'Opening hours 6: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT6_2', 'Opening hours 6: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT6_3', 'Opening hours 6: Timeslot 3', 'trim|max_length[45]');


		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		if ($this->form_validation->run()) {
			
			$center_code = $this->input->post('CENTER_CODE');
		
			$save_data = [
				'DR_CODE' => $this->input->post('DR_CODE'),
				'CENTER_CODE' => $center_code,
				'CONTACT_PERSON' => $this->input->post('CONTACT_PERSON'),
				'SCHEDULE_DAY_C1' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C1')),
				'SCHEDULE_DAY_E1' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E1')),
				'TIMESLOT1_1' => $this->input->post('TIMESLOT1_1'),
				'TIMESLOT1_2' => $this->input->post('TIMESLOT1_2'),
				'TIMESLOT1_3' => $this->input->post('TIMESLOT1_3'),
				'SCHEDULE_DAY_C2' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C2')),
				'SCHEDULE_DAY_E2' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E2')),
				'TIMESLOT2_1' => $this->input->post('TIMESLOT2_1'),
				'TIMESLOT2_2' => $this->input->post('TIMESLOT2_2'),
				'TIMESLOT2_3' => $this->input->post('TIMESLOT2_3'),
				'SCHEDULE_DAY_C3' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C3')),
				'SCHEDULE_DAY_E3' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E3')),
				'TIMESLOT3_1' => $this->input->post('TIMESLOT3_1'),
				'TIMESLOT3_2' => $this->input->post('TIMESLOT3_2'),
				'TIMESLOT3_3' => $this->input->post('TIMESLOT3_3'),
				'SCHEDULE_DAY_C4' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C4')),
				'SCHEDULE_DAY_E4' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E4')),
				'TIMESLOT4_1' => $this->input->post('TIMESLOT4_1'),
				'TIMESLOT4_2' => $this->input->post('TIMESLOT4_2'),
				'TIMESLOT4_3' => $this->input->post('TIMESLOT4_3'),
				'SCHEDULE_DAY_C5' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C5')),
				'SCHEDULE_DAY_E5' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E5')),
				'TIMESLOT5_1' => $this->input->post('TIMESLOT5_1'),
				'TIMESLOT5_2' => $this->input->post('TIMESLOT5_2'),
				'TIMESLOT5_3' => $this->input->post('TIMESLOT5_3'),
				'SCHEDULE_DAY_C6' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C6')),
				'SCHEDULE_DAY_E6' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E6')),
				'TIMESLOT6_1' => $this->input->post('TIMESLOT6_1'),
				'TIMESLOT6_2' => $this->input->post('TIMESLOT6_2'),
				'TIMESLOT6_3' => $this->input->post('TIMESLOT6_3'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
			];

			$save_doctor_consult_hour = $this->model_doctor_consult_hour->store($save_data);

			if ($save_doctor_consult_hour) {
	
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_consult_hour/edit/' . $save_doctor_consult_hour, 'Edit Doctor Consult Hour'), 'success');
            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_consult_hour');
			} else {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
			} 
			
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctor Consult Hours
	*
	* @var $id String
	*/
		public function edit_2($doctor, $center = NULL)
	{
		$this->is_allowed('doctor_consult_hour_edit');
        
        if (!is_null($center)) {
        	# code...
	        $this->db->from('doctor_consult_hour');
	        $this->db->join('center','doctor_consult_hour.CENTER_CODE = center.CENTER_CODE');
	        $this->db->where('doctor_consult_hour.DR_CODE' , $doctor);
	        $this->db->where('doctor_consult_hour.CENTER_CODE', $center);
	        $query = $this->db->get('');
	        if ($query->num_rows()) {
	        	# code...
	        	$this->data['doctor_consult_hour'] = $query->row();
	        }else{
	        	return FALSE;
	        }
        }
 

		$this->template->title('Doctor Consult Hour Update');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_update', $this->data);
	}

	public function edit($id)
	{
		$this->is_allowed('doctor_consult_hour_update');
        $this->db->from('doctor_consult_hour');
        $this->db->join('center','doctor_consult_hour.CENTER_CODE = center.CENTER_CODE');
        $this->db->where('doctor_consult_hour.AUTO_NO' , $id);

        $query = $this->db->get('');
        if ($query->num_rows()) {
        	# code...
        	$this->data['doctor_consult_hour'] = $query->row();
        }else{
        	return FALSE;
        }


		$this->template->title('Doctor Consult Hour Update');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_update', $this->data);
	}

	/**
	* Update Doctor Consult Hours
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('doctor_consult_hour_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('CENTER_CODE','CENTER','trim|required');
		$this->form_validation->set_rules('CONTACT_PERSON', 'Contact Person', 'trim|max_length[80]');
		$this->form_validation->set_rules('SCHEDULE_DAY_C1[]', 'Opening hours 1', 'trim|required');
		$this->form_validation->set_rules('TIMESLOT1_1', 'Opening hours 1: Timeslot 1', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT1_2', 'Opening hours 1: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT1_3', 'Opening hours 1: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT2_1', 'Opening hours 2: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT2_2', 'Opening hours 2: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT2_3', 'Opening hours 2: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT3_1', 'Opening hours 3: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT3_2', 'Opening hours 3: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT3_3', 'Opening hours 3: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT4_1', 'Opening hours 4: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT4_2', 'Opening hours 4: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT4_3', 'Opening hours 4: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT5_1', 'Opening hours 5: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT5_2', 'Opening hours 5: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT5_3', 'Opening hours 5: Timeslot 3', 'trim|max_length[45]');
		
		$this->form_validation->set_rules('TIMESLOT6_1', 'Opening hours 6: Timeslot 1', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT6_2', 'Opening hours 6: Timeslot 2', 'trim|max_length[45]');
		$this->form_validation->set_rules('TIMESLOT6_3', 'Opening hours 6: Timeslot 3', 'trim|max_length[45]');


		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		if ($this->form_validation->run()) {

			$save_data = [
			    'CENTER_CODE' 	 => $this->input->post('CENTER_CODE'),
				'CONTACT_PERSON' => $this->input->post('CONTACT_PERSON'),
				'SCHEDULE_DAY_C1' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C1')),
				'SCHEDULE_DAY_E1' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E1')),
				'TIMESLOT1_1' => $this->input->post('TIMESLOT1_1'),
				'TIMESLOT1_2' => $this->input->post('TIMESLOT1_2'),
				'TIMESLOT1_3' => $this->input->post('TIMESLOT1_3'),
				'SCHEDULE_DAY_C2' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C2')),
				'SCHEDULE_DAY_E2' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E2')),
				'TIMESLOT2_1' => $this->input->post('TIMESLOT2_1'),
				'TIMESLOT2_2' => $this->input->post('TIMESLOT2_2'),
				'TIMESLOT2_3' => $this->input->post('TIMESLOT2_3'),
				'SCHEDULE_DAY_C3' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C3')),
				'SCHEDULE_DAY_E3' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E3')),
				'TIMESLOT3_1' => $this->input->post('TIMESLOT3_1'),
				'TIMESLOT3_2' => $this->input->post('TIMESLOT3_2'),
				'TIMESLOT3_3' => $this->input->post('TIMESLOT3_3'),
				'SCHEDULE_DAY_C4' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C4')),
				'SCHEDULE_DAY_E4' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E4')),
				'TIMESLOT4_1' => $this->input->post('TIMESLOT4_1'),
				'TIMESLOT4_2' => $this->input->post('TIMESLOT4_2'),
				'TIMESLOT4_3' => $this->input->post('TIMESLOT4_3'),
				'SCHEDULE_DAY_C5' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C5')),
				'SCHEDULE_DAY_E5' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E5')),
				'TIMESLOT5_1' => $this->input->post('TIMESLOT5_1'),
				'TIMESLOT5_2' => $this->input->post('TIMESLOT5_2'),
				'TIMESLOT5_3' => $this->input->post('TIMESLOT5_3'),
				'SCHEDULE_DAY_C6' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C6')),
				'SCHEDULE_DAY_E6' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E6')),
				'TIMESLOT6_1' => $this->input->post('TIMESLOT6_1'),
				'TIMESLOT6_2' => $this->input->post('TIMESLOT6_2'),
				'TIMESLOT6_3' => $this->input->post('TIMESLOT6_3'),
			];
			     
			     $this->db->where('DR_CODE' , $this->input->post('DR_CODE') );
			     $this->db->where('CENTER_CODE', $this->input->post('CENTER_CODE'));
			     $query = $this->db->update('doctor_consult_hour',$save_data);
			     if ($query->affected_rows()>0) {
			     	# code...
			     	$save_doctor_consult_hour = TRUE;
			     }else{
			     	$save_doctor_consult_hour = FALSE;
			     }
			
			if ($save_doctor_consult_hour){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where('DR_CODE' , $this->input->post('DR_CODE') );
			    $this->db->where('CENTER_CODE', $this->input->post('CENTER_CODE'));
				$this->db->update('doctor_consult_hour', $save_data12);
			 }

			if ($save_doctor_consult_hour) {
					set_message('Your data has been successfully updated into the database','success');
					$this->data['success'] = true;
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_consult_hour');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Doctor Consult Hours
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_consult_hour_delete');

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
            set_message('Doctor Consult Hour has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_consult_hour.', 'error');
		}

		redirect('administrator/doctor_consult_hour');
	}

		/**
	* View view Doctor Consult Hours
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_consult_hour_view');

		$this->data['doctor_consult_hour'] = $this->model_doctor_consult_hour->find($id);

		$this->template->title('Doctor Consult Hour Detail');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_view', $this->data);
	}
	
	/**
	* delete Doctor Consult Hours
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor_consult_hour = $this->model_doctor_consult_hour->find($id);

		
		
		return $this->model_doctor_consult_hour->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_consult_hour_export');

		$this->model_doctor_consult_hour->export('doctor_consult_hour', 'doctor_consult_hour');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_consult_hour_export');

		$this->model_doctor_consult_hour->pdf('doctor_consult_hour', 'doctor_consult_hour');
	}
}


/* End of file doctor_consult_hour.php */
/* Location: ./application/controllers/administrator/Doctor Consult Hour.php */