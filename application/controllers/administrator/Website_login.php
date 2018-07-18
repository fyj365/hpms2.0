<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Website Login Controller
*| --------------------------------------------------------------------------
*| Website Login site
*|
*/
class Website_login extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_website_login');
	}

	/**
	* show all Website Logins
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('website_login_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['website_logins'] = $this->model_website_login->get($filter, $field, $this->limit_page, $offset);
		$this->data['website_login_counts'] = $this->model_website_login->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/website_login/index/',
			'total_rows'   => $this->model_website_login->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Website Login List');
		$this->render('backend/standart/administrator/website_login/website_login_list', $this->data);
	}
	
	/**
	* Add new website_logins
	*
	*/
	public function add()
	{
		$this->is_allowed('website_login_add');

		$this->template->title('Website Login New');
		$this->render('backend/standart/administrator/website_login/website_login_add', $this->data);
	}

	/**
	* Add New Website Logins
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('website_login_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');
		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required');
		$this->form_validation->set_rules('WEBSITE_ACCOUNT', 'Website Account', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('WEBSITE_PASSWORD', 'Website Password', 'trim|required|max_length[40]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		

		if ($this->form_validation->run()) {

		
			$save_data = [
				'DR_CODE' => $this->input->post('DR_CODE'),
				'CARD_CODE' => $this->input->post('CARD_CODE'),
				'WEBSITE_ACCOUNT' => $this->input->post('WEBSITE_ACCOUNT'),
				'WEBSITE_PASSWORD' => $this->input->post('WEBSITE_PASSWORD'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => date('Y-m-d H:i:s'),
			];

			
			$save_website_login = $this->model_website_login->store($save_data);

			if ($save_website_login) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_website_login;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/website_login/edit/' . $save_website_login, 'Edit Website Login').' or  '.anchor('administrator/website_login', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/website_login/edit/' . $save_website_login, 'Edit Website Login'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/website_login');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/website_login');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Website Logins
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('website_login_update');

		$this->data['website_login'] = $this->model_website_login->find($id);

		$this->template->title('Website Login Update');
		$this->render('backend/standart/administrator/website_login/website_login_update', $this->data);
	}

	/**
	* Update Website Logins
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('website_login_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');
		$this->form_validation->set_rules('WEBSITE_ACCOUNT', 'Website Account', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('WEBSITE_PASSWORD', 'Website Password', 'trim|required|max_length[40]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		
			$save_data = [
				'CARD_CODE' => $this->input->post('CARD_CODE'),
				'WEBSITE_ACCOUNT' => $this->input->post('WEBSITE_ACCOUNT'),
				'WEBSITE_PASSWORD' => $this->input->post('WEBSITE_PASSWORD'),
			];

			
			$save_website_login = $this->model_website_login->change($id, $save_data);
			
			if ($save_website_login){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where("AUTO_NO", $id);
				$this->db->update("website_login", $save_data12);
			}

			if ($save_website_login) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/website_login', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/website_login');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/website_login');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Website Logins
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('website_login_delete');

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
            set_message('Website Login has been deleted.', 'success');
		} else {
            set_message('Error delete website_login.', 'error');
		}

		redirect('administrator/website_login');
	}

		/**
	* View view Website Logins
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('website_login_view');

		$this->data['website_login'] = $this->model_website_login->find($id);

		$this->template->title('Website Login Detail');
		$this->render('backend/standart/administrator/website_login/website_login_view', $this->data);
	}
	
	/**
	* delete Website Logins
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$website_login = $this->model_website_login->find($id);

		
		
		return $this->model_website_login->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('website_login_export');

		$this->model_website_login->export('website_login', 'website_login');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('website_login_export');

		$this->model_website_login->pdf('website_login', 'website_login');
	}
}


/* End of file website_login.php */
/* Location: ./application/controllers/administrator/Website Login.php */