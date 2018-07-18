<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Center Controller
*| --------------------------------------------------------------------------
*| Center site
*|
*/
class Center extends Admin	
{
  	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_center');
	}

	/**
	* show all Centers
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('center_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['centers'] = $this->model_center->get($filter, $field, $this->limit_page, $offset);
		$this->data['center_counts'] = $this->model_center->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/center/index/',
			'total_rows'   => $this->model_center->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Center List');
		$this->render('backend/standart/administrator/center/center_list', $this->data);
	}
	
	public function search_district(){
		$area = $this->input->get("area");
		
		$this->db->where("REGION", $area);
		$query = $this->db->get("hk_district");
		
		$this->data["district"] = $query->result();
		
		echo json_encode($this->data);
	}
	
	public function search_area(){
		$auto_no = $this->input->get("auto_no");
		
		$this->db->where("AUTO_NO", $auto_no);
		$query = $this->db->get("hk_district");
		
		$this->data["area"] = $query->row();
		
		echo json_encode($this->data);
	}
	
	/**
	* Add new centers
	*
	*/
	public function add()
	{
		$this->is_allowed('center_add');

		$this->template->title('Center New');
		$this->render('backend/standart/administrator/center/center_add', $this->data);
	}

	/**
	* Add New Centers
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('center_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		// $this->form_validation->set_rules('CENTER_CODE', 'Center Code', 'trim|required|alpha_dash|is_unique[center.CENTER_CODE]');
		$this->form_validation->set_rules('TEL', 'Center Tel', 'trim|required|is_unique[center.TEL]|regex_match[/^[0-9]{8}$/]');
		$this->form_validation->set_rules('FAX', 'Fax', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_NAME', 'Center Eng Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_NAME', 'Center Chi Name', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR1', 'Eng Addr 1', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('E_ADDR2', 'Eng Addr 2', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR3', 'Eng Addr 3', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR4', 'Eng Addr 4', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR5', 'Eng Addr 5', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR1', 'Chi Addr 1', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR2', 'Chi Addr 2', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR3', 'Chi Addr 3', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR4', 'Chi Addr 4', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR5', 'Chi Addr 5', 'trim|max_length[80]');
        $this->form_validation->set_rules('E_DISTRICT', 'Eng District','trim|required|max_length[80]');
        $this->form_validation->set_rules('C_DISTRICT','Chi District','trim|max_length[80]');
		$this->form_validation->set_rules('area', 'Area' ,'required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'CENTER_CODE' => $this->input->post('CENTER_CODE'),
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'E_ADDR1' => $this->input->post('E_ADDR1'),
				'E_ADDR2' => $this->input->post('E_ADDR2'),
				'E_ADDR3' => $this->input->post('E_ADDR3'),
				'E_ADDR4' => $this->input->post('E_ADDR4'),
				'E_ADDR5' => $this->input->post('E_ADDR5'),
				'E_DISTRICT' => $this->input->post('E_DISTRICT'),
				'C_ADDR1' => $this->input->post('C_ADDR1'),
				'C_ADDR2' => $this->input->post('C_ADDR2'),
				'C_ADDR3' => $this->input->post('C_ADDR3'),
				'C_ADDR4' => $this->input->post('C_ADDR4'),
				'C_ADDR5' => $this->input->post('C_ADDR5'),
				'C_DISTRICT' => $this->input->post('C_DISTRICT'),
				'AREA' => $this->input->post('area'),
				'TEL' => $this->input->post('TEL'),
				'FAX' => $this->input->post('FAX'),
				'OPEN_AFTER_EIGHT' => implode(',', (array) $this->input->post('OPEN_AFTER_EIGHT')),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
			];

			$this->db->insert("center", $save_data);
			$save_center = $this->db->insert_id();

			if ($save_center > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_center;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/center/edit/' . $save_center, 'Edit Center').' or  '.anchor('administrator/center', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/center/edit/' . $save_center, 'Edit Center'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/center');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/center');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Centers
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('center_update');

		$this->data['center'] = $this->model_center->find($id);

		$this->template->title('Center Update');
		$this->render('backend/standart/administrator/center/center_update', $this->data);
	}

	/**
	* Update Centers
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('center_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('TEL', 'Tel', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_NAME', 'Center Eng Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_NAME', 'Center Chi Name', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR1', 'Eng Addr 1', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('E_ADDR2', 'Eng Addr 2', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR3', 'Eng Addr 3', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR4', 'Eng Addr 4', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_ADDR5', 'Eng Addr 5', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR1', 'Chi Addr 1', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR2', 'Chi Addr 2', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR3', 'Chi Addr 3', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR4', 'Chi Addr 4', 'trim|max_length[80]');
		$this->form_validation->set_rules('C_ADDR5', 'Chi Addr 5', 'trim|max_length[80]');
		$this->form_validation->set_rules('FAX', 'Fax', 'trim|max_length[80]');
		$this->form_validation->set_rules('E_DISTRICT', 'Eng District','trim|required|max_length[80]');
        $this->form_validation->set_rules('C_DISTRICT','Chi District','trim|max_length[80]');
		$this->form_validation->set_rules('area', 'Area' ,'required');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		


		if ($this->form_validation->run()) {
		
			$save_data = [
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'E_ADDR1' => $this->input->post('E_ADDR1'),
				'E_ADDR2' => $this->input->post('E_ADDR2'),
				'E_ADDR3' => $this->input->post('E_ADDR3'),
				'E_ADDR4' => $this->input->post('E_ADDR4'),
				'E_ADDR5' => $this->input->post('E_ADDR5'),
				'E_DISTRICT' => $this->input->post('E_DISTRICT'),
				'C_DISTRICT' => $this->input->post('C_DISTRICT'),
				'C_ADDR1' => $this->input->post('C_ADDR1'),
				'C_ADDR2' => $this->input->post('C_ADDR2'),
				'C_ADDR3' => $this->input->post('C_ADDR3'),
				'C_ADDR4' => $this->input->post('C_ADDR4'),
				'C_ADDR5' => $this->input->post('C_ADDR5'),
				'AREA' => $this->input->post('area'),
				'FAX' =>  $this->input->post('FAX'),
				'OPEN_AFTER_EIGHT' => implode(',', (array) $this->input->post('OPEN_AFTER_EIGHT')),
			];

			$this->db->where("CENTER_CODE", $id);
			$this->db->update("center", $save_data);
			
			$save_center = $this->db->affected_rows();
			
			if ($save_center > 0){
				
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where("CENTER_CODE", $id);
				$this->db->update("center", $save_data12);
			}


			if ($save_center > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/center', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/center');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/center');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Centers
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('center_delete');

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
            set_message('Center has been deleted.', 'success');
		} else {
            set_message('Error delete center.', 'error');
		}

		redirect('administrator/center');
	}

		/**
	* View view Centers
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('center_view');

		$this->data['center'] = $this->model_center->find($id);

		$this->template->title('Center Detail');
		$this->render('backend/standart/administrator/center/center_view', $this->data);
	}
	
	/**
	* delete Centers
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$center = $this->model_center->find($id);

		
		
		return $this->model_center->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('center_export');

		$this->model_center->export('center', 'center');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('center_export');

		$this->model_center->pdf('center', 'center');
	}
}


/* End of file center.php */
/* Location: ./application/controllers/administrator/Center.php */