<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Bank Controller
*| --------------------------------------------------------------------------
*| Bank site
*|
*/
class Bank extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_bank');
	}

	/**
	* show all Banks
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('bank_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['banks'] = $this->model_bank->get($filter, $field, $this->limit_page, $offset);
		$this->data['bank_counts'] = $this->model_bank->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/bank/index/',
			'total_rows'   => $this->model_bank->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Bank List');
		$this->render('backend/standart/administrator/bank/bank_list', $this->data);
	}
	
	/**
	* Add new banks
	*
	*/
	public function add()
	{
		$this->is_allowed('bank_add');

		$this->template->title('Bank New');
		$this->render('backend/standart/administrator/bank/bank_add', $this->data);
	}

	/**
	* Add New Banks
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('bank_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$custom_bank_ename = $this->input->post('E_NAME');
		$custom_bank_code = $this->input->post('CLEARING_CODE');
		
		if ($custom_bank_ename == "" && $custom_bank_code == ""){
			$this->form_validation->set_rules('SELECT_BANK[]', 'Select Bank', 'trim|required');
		}else{
			$this->form_validation->set_rules('CLEARING_CODE', 'Custom - Bank Clearing Code', 'trim|required|integer|max_length[4]');
			$this->form_validation->set_rules('E_NAME', 'Custom Bank - English Name', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('C_NAME', 'Custom Bank - Chinese Name', 'trim|max_length[80]');
			
		}
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));


		if ($this->form_validation->run()) {
			
			if ($custom_bank_ename == ""){
				$select_bank = $this->input->post('SELECT_BANK');
				$select_bank = explode('-', $select_bank[0]);
				
				foreach($select_bank as $index=>$bank){
					if ($index == 0){
						$clearing_code = $bank;
					}else if ($index == 1){
						$c_name = $bank;
					}else{
						$e_name = $bank;
					}
				}
				
			}else{
				$clearing_code = $custom_bank_code;
				$e_name = $custom_bank_ename;
				$c_name = $this->input->post('C_NAME');
			}
			
			$this->db->where("CLEARING_CODE", $clearing_code);
			$query = $this->db->get('bank');
			
			if ($query->num_rows() > 0){
				$this->data['success'] = false;
				$this->data['message'] = 'Cannot insert an existing bank';
				
			}else{
		
				$save_data = [
					'CLEARING_CODE' => $clearing_code,
					'E_NAME' => $e_name,
					'C_NAME' => $c_name,
					'CREATOR' => $user,
					'CREATE_DATE' => date('Y-m-d H:i:s'),
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];

				$this->db->insert('bank', $save_data);
				$save_bank = $this->db->affected_rows();

				if ($save_bank) {
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = true;
						$this->data['id'] 	   = $save_bank;
						$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/bank/edit/' . $save_bank, 'Edit Bank').' or  '.anchor('administrator/bank', ' Go back to list');
					} else {
						set_message('Your data has been successfully stored into the database. '.anchor('administrator/bank/edit/' . $save_bank, 'Edit Bank'), 'success');

						$this->data['success'] = true;
						$this->data['redirect'] = base_url('administrator/bank');
					}
				} else {
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
					} else {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
						$this->data['redirect'] = base_url('administrator/bank');
					}
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Banks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('bank_update');

		$this->data['bank'] = $this->model_bank->find($id);

		$this->template->title('Bank Update');
		$this->render('backend/standart/administrator/bank/bank_update', $this->data);
	}

	/**
	* Update Banks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('bank_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('E_NAME', 'English Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_NAME', 'Chinese Name', 'trim|max_length[80]');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
			];

			
			$save_bank = $this->model_bank->change($id, $save_data);
			
			if ($save_bank){
				
				$save_data2 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->model_bank->change($id, $save_data2);
				
			}


			if ($save_bank) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/bank', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/bank');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/bank');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Banks
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('bank_delete');

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
            set_message('Bank has been deleted.', 'success');
		} else {
            set_message('Error delete bank.', 'error');
		}

		redirect('administrator/bank');
	}

		/**
	* View view Banks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('bank_view');

		$this->data['bank'] = $this->model_bank->find($id);

		$this->template->title('Bank Detail');
		$this->render('backend/standart/administrator/bank/bank_view', $this->data);
	}
	
	/**
	* delete Banks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$bank = $this->model_bank->find($id);

		
		
		return $this->model_bank->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('bank_export');

		$this->model_bank->export('bank', 'bank');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('bank_export');

		$this->model_bank->pdf('bank', 'bank');
	}
}


/* End of file bank.php */
/* Location: ./application/controllers/administrator/Bank.php */