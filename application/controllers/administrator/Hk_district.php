<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Hk District Controller
*| --------------------------------------------------------------------------
*| Hk District site
*|
*/
class Hk_district extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_hk_district');
	}

	/**
	* show all Hk Districts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('hk_district_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['hk_districts'] = $this->model_hk_district->get($filter, $field, $this->limit_page, $offset);
		$this->data['hk_district_counts'] = $this->model_hk_district->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/hk_district/index/',
			'total_rows'   => $this->model_hk_district->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Hk District List');
		$this->render('backend/standart/administrator/hk_district/hk_district_list', $this->data);
	}
	
	/**
	* Add new hk_districts
	*
	*/
	public function add()
	{
		$this->is_allowed('hk_district_add');

		$this->template->title('Hk District New');
		$this->render('backend/standart/administrator/hk_district/hk_district_add', $this->data);
	}

	/**
	* Add New Hk Districts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('hk_district_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'AUTO_NO' => $this->input->post('AUTO_NO'),
				'REGION' => $this->input->post('REGION'),
				'ENG_DISTRICT' => $this->input->post('ENG_DISTRICT'),
				'CHI_DISTRICT' => $this->input->post('CHI_DISTRICT'),
			];

			
			$save_hk_district = $this->model_hk_district->store($save_data);

			if ($save_hk_district) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_hk_district;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/hk_district/edit/' . $save_hk_district, 'Edit Hk District').' or  '.anchor('administrator/hk_district', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/hk_district/edit/' . $save_hk_district, 'Edit Hk District'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/hk_district');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/hk_district');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Hk Districts
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('hk_district_update');

		$this->data['hk_district'] = $this->model_hk_district->find($id);

		$this->template->title('Hk District Update');
		$this->render('backend/standart/administrator/hk_district/hk_district_update', $this->data);
	}

	/**
	* Update Hk Districts
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('hk_district_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'AUTO_NO' => $this->input->post('AUTO_NO'),
				'REGION' => $this->input->post('REGION'),
				'ENG_DISTRICT' => $this->input->post('ENG_DISTRICT'),
				'CHI_DISTRICT' => $this->input->post('CHI_DISTRICT'),
			];

			
			$save_hk_district = $this->model_hk_district->change($id, $save_data);

			if ($save_hk_district) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/hk_district', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/hk_district');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/hk_district');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Hk Districts
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('hk_district_delete');

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
            set_message('Hk District has been deleted.', 'success');
		} else {
            set_message('Error delete hk_district.', 'error');
		}

		redirect('administrator/hk_district');
	}

		/**
	* View view Hk Districts
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('hk_district_view');

		$this->data['hk_district'] = $this->model_hk_district->find($id);

		$this->template->title('Hk District Detail');
		$this->render('backend/standart/administrator/hk_district/hk_district_view', $this->data);
	}
	
	/**
	* delete Hk Districts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$hk_district = $this->model_hk_district->find($id);

		
		
		return $this->model_hk_district->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('hk_district_export');

		$this->model_hk_district->export('hk_district', 'hk_district');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('hk_district_export');

		$this->model_hk_district->pdf('hk_district', 'hk_district');
	}
}


/* End of file hk_district.php */
/* Location: ./application/controllers/administrator/Hk District.php */