<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Staff Payment Controller
*| --------------------------------------------------------------------------
*| Staff Payment site
*|
*/
class Staff_payment extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_staff_payment');
	}

	/**
	* show all Staff Payments
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('staff_payment_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['staff_payments'] = $this->model_staff_payment->get($filter, $field, $this->limit_page, $offset);
		$this->data['staff_payment_counts'] = $this->model_staff_payment->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/staff_payment/index/',
			'total_rows'   => $this->model_staff_payment->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Staff Payment List');
		$this->render('backend/standart/administrator/staff_payment/staff_payment_list', $this->data);
	}
	
	/**
	* Add new staff_payments
	*
	*/
	public function add()
	{
		$this->is_allowed('staff_payment_add');

		$this->template->title('Staff Payment New');
		$this->render('backend/standart/administrator/staff_payment/staff_payment_add', $this->data);
	}

	/**
	* Add New Staff Payments
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('staff_payment_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'STAFF_CODE' => $this->input->post('STAFF_CODE'),
				'PAYEE_NAME' => $this->input->post('PAYEE_NAME'),
				'PAYEE_ADDR1' => $this->input->post('PAYEE_ADDR1'),
				'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
				'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
				'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
				'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
				'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),
				'BANK_CLEARING_CODE' => $this->input->post('BANK_CLEARING_CODE'),
				'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
				'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER'),
			];

			
			$save_staff_payment = $this->model_staff_payment->store($save_data);

			if ($save_staff_payment) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_staff_payment;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/staff_payment/edit/' . $save_staff_payment, 'Edit Staff Payment').' or  '.anchor('administrator/staff_payment', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/staff_payment/edit/' . $save_staff_payment, 'Edit Staff Payment'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/staff_payment');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/staff_payment');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Staff Payments
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('staff_payment_update');

		$this->data['staff_payment'] = $this->model_staff_payment->find($id);

		$this->template->title('Staff Payment Update');
		$this->render('backend/standart/administrator/staff_payment/staff_payment_update', $this->data);
	}

	/**
	* Update Staff Payments
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('staff_payment_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'STAFF_CODE' => $this->input->post('STAFF_CODE'),
				'PAYEE_NAME' => $this->input->post('PAYEE_NAME'),
				'PAYEE_ADDR1' => $this->input->post('PAYEE_ADDR1'),
				'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
				'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
				'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
				'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
				'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),
				'BANK_CLEARING_CODE' => $this->input->post('BANK_CLEARING_CODE'),
				'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
				'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER'),
			];

			
			$save_staff_payment = $this->model_staff_payment->change($id, $save_data);

			if ($save_staff_payment) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/staff_payment', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/staff_payment');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/staff_payment');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Staff Payments
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('staff_payment_delete');

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
            set_message('Staff Payment has been deleted.', 'success');
		} else {
            set_message('Error delete staff_payment.', 'error');
		}

		redirect('administrator/staff_payment');
	}

		/**
	* View view Staff Payments
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('staff_payment_view');

		$this->data['staff_payment'] = $this->model_staff_payment->find($id);

		$this->template->title('Staff Payment Detail');
		$this->render('backend/standart/administrator/staff_payment/staff_payment_view', $this->data);
	}
	
	/**
	* delete Staff Payments
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$staff_payment = $this->model_staff_payment->find($id);

		
		
		return $this->model_staff_payment->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('staff_payment_export');

		$this->model_staff_payment->export('staff_payment', 'staff_payment');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('staff_payment_export');

		$this->model_staff_payment->pdf('staff_payment', 'staff_payment');
	}
}


/* End of file staff_payment.php */
/* Location: ./application/controllers/administrator/Staff Payment.php */