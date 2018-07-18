<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Staff Controller
*| --------------------------------------------------------------------------
*| Staff site
*|
*/
class Staff extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_staff');
	}

	/**
	* show all Staffs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('staff_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['staffs'] = $this->model_staff->get($filter, $field, $this->limit_page, $offset);
		$this->data['staff_counts'] = $this->model_staff->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/staff/index/',
			'total_rows'   => $this->model_staff->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Staff List');
		$this->render('backend/standart/administrator/staff/staff_list', $this->data);
	}
	
	/**
	* Add new staffs
	*
	*/
	public function add()
	{
		$this->is_allowed('staff_add');

		$this->template->title('Staff New');
		$this->render('backend/standart/administrator/staff/staff_add', $this->data);
	}

	/**
	* Add New Staffs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('staff_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$this->form_validation->set_rules('STAFF_CODE', 'STAFF CODE', 'trim|required|is_unique[staff.STAFF_CODE]|alpha_dash');
		$this->form_validation->set_rules('E_NAME', 'E NAME', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('PHONE', 'PHONE', 'trim|numeric');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'trim|valid_email');

		
	   $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		$staff_code = $this->input->post('STAFF_CODE');
		$payee_name = $this->input->post('PAYEE_NAME');
		$payee_addr1 = $this->input->post('PAYEE_ADDR1');
		$clearing_code = $this->input->post('BANK_CLEARING_CODE');
		$account_no = $this->input->post('ACCOUNT_NO');

	  if ($this->form_validation->run()) {


			$save_data = [
				'STAFF_CODE' => $staff_code,
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'PHONE' => $this->input->post('PHONE'),
				'EMAIL' => $this->input->post('EMAIL'),
				'PWD' => $this->input->post('PWD'),
				'ROLE_CODE' => $this->input->post('ROLE_CODE'),
				'STATUS' => $this->input->post('STATUS'),
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')			
			];

		    $staffPayment_data = [
					'STAFF_CODE' => $staff_code,
					'PAYEE_NAME' => $payee_name,
					'PAYEE_ADDR1' => $payee_addr1,
					'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
					'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
					'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
					'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
					'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),
					'BANK_CLEARING_CODE' => $clearing_code,
					'ACCOUNT_NO' => $account_no,
					'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER'),
					'CREATOR' => $user,
					'CREATE_DATE' => date('Y-m-d H:i:s'),
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];

			$save_staff = $this->model_staff->storeSpecial($save_data);

			$this->db->insert('staff_payment',$staffPayment_data);
			$save_staff_payment =$this->db->affected_rows();

			if ($save_staff) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_staff;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/staff/edit/' . $save_staff, 'Edit Staff').' or  '.anchor('administrator/staff', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/staff/edit/' . $save_staff, 'Edit Staff'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/staff');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/staff');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Staffs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('staff_update');

		$this->data['staff'] = $this->model_staff->find($id);
		$this->db->where('STAFF_CODE',$id);
		$query = $this->db->get('staff_payment');
		if ($query->num_rows()>0) {
		   $this->data['staff_payment']  = $query->row();
		}else{
			$this->data['staff_payment'] = false;
		}
		$this->template->title('Staff Update');
		$this->render('backend/standart/administrator/staff/staff_update', $this->data);
	}
	/**
	* Update Staffs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('staff_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		$this->form_validation->set_rules('STAFF_CODE', 'STAFF CODE', 'trim|required');
		$this->form_validation->set_rules('E_NAME', 'E NAME', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('PHONE', 'PHONE', 'trim|numeric');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'valid_email');
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
		   
		    $staff_code = $this->input->post('STAFF_CODE');
		   	$payee_name = $this->input->post('PAYEE_NAME');
			$payee_addr1 = $this->input->post('PAYEE_ADDR1');
			$clearing_code = $this->input->post('BANK_CLEARING_CODE');
			$account_no = $this->input->post('ACCOUNT_NO');

			$save_data = [
				'STAFF_CODE' => $staff_code,
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'PHONE' => $this->input->post('PHONE'),
				'EMAIL' => $this->input->post('EMAIL'),
				'PWD' => $this->input->post('PWD'),
				'ROLE_CODE' => $this->input->post('ROLE_CODE'),
				'STATUS' => $this->input->post('STATUS')
			];

		   $staffPayment_data = [
					'PAYEE_NAME' => $payee_name,
					'PAYEE_ADDR1' => $payee_addr1,
					'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
					'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
					'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
					'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
					'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),
					'BANK_CLEARING_CODE' => $clearing_code,
					'ACCOUNT_NO' => $account_no,
					'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER')
				];


			$save_staff = $this->model_staff->change($id, $save_data);

			$this->db->where('STAFF_CODE',$staff_code);
			$this->db->update('staff_payment',$staffPayment_data);
			$save_staff_payment =$this->db->affected_rows();

			if ($save_staff||$save_staff_payment) {
				$save_data =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s')
				];
				$this->db->where('STAFF_CODE', $id);
        		$this->db->update('staff', $save_data);
 		
 				$this->db->where('STAFF_CODE',$staff_code);
				$this->db->update('staff_payment',$save_data);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/staff', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/staff');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/staff');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Staffs
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('staff_delete');

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
            set_message('Staff has been deleted.', 'success');
		} else {
            set_message('Error delete staff.', 'error');
		}

		redirect('administrator/staff');
	}

		/**
	* View view Staffs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('staff_view');

		$this->data['staff'] = $this->model_staff->find($id);

		$this->db->where('STAFF_CODE',$id);
		$query = $this->db->get('staff_payment');
		if ($query->num_rows()>0) {
		   $this->data['staff_payment']  = $query->row();
		}else{
			$this->data['staff_payment'] = null;
		}
		$this->template->title('Staff Detail');
		$this->render('backend/standart/administrator/staff/staff_view', $this->data);
	}
	
	/**
	* delete Staffs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$staff = $this->model_staff->find($id);

		
		
		return $this->model_staff->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('staff_export');

		$this->model_staff->export('staff', 'staff');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('staff_export');

		$this->model_staff->pdf('staff', 'staff');
	}
}


/* End of file staff.php */
/* Location: ./application/controllers/administrator/Staff.php */