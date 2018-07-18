<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Invoice Line Controller
*| --------------------------------------------------------------------------
*| Invoice Line site
*|
*/
class Invoice_line extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_invoice_line');
	}

	/**
	* show all Invoice Lines
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('invoice_line_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['invoice_lines'] = $this->model_invoice_line->get($filter, $field, $this->limit_page, $offset);
		$this->data['invoice_line_counts'] = $this->model_invoice_line->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/invoice_line/index/',
			'total_rows'   => $this->model_invoice_line->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Invoice Line List');
		$this->render('backend/standart/administrator/invoice_line/invoice_line_list', $this->data);
	}
	
	/**
	* Add new invoice_lines
	*
	*/
	public function add()
	{
		$this->is_allowed('invoice_line_add');

		$this->template->title('Invoice Line New');
		$this->render('backend/standart/administrator/invoice_line/invoice_line_add', $this->data);
	}

	/**
	* Add New Invoice Lines
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('invoice_line_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'INVOICE_NO' => $this->input->post('INVOICE_NO'),
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'INVOICE_DATE' => $this->input->post('INVOICE_DATE'),
				'INVOICE_AMT' => $this->input->post('INVOICE_AMT'),
			];

			
			$save_invoice_line = $this->model_invoice_line->store($save_data);

			if ($save_invoice_line) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_invoice_line;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/invoice_line/edit/' . $save_invoice_line, 'Edit Invoice Line').' or  '.anchor('administrator/invoice_line', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/invoice_line/edit/' . $save_invoice_line, 'Edit Invoice Line'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/invoice_line');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/invoice_line');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Invoice Lines
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('invoice_line_update');

		$this->data['invoice_line'] = $this->model_invoice_line->find($id);

		$this->template->title('Invoice Line Update');
		$this->render('backend/standart/administrator/invoice_line/invoice_line_update', $this->data);
	}

	/**
	* Update Invoice Lines
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('invoice_line_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'INVOICE_NO' => $this->input->post('INVOICE_NO'),
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'INVOICE_DATE' => $this->input->post('INVOICE_DATE'),
				'INVOICE_AMT' => $this->input->post('INVOICE_AMT'),
			];

			
			$save_invoice_line = $this->model_invoice_line->change($id, $save_data);

			if ($save_invoice_line) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/invoice_line', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/invoice_line');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/invoice_line');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Invoice Lines
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('invoice_line_delete');

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
            set_message('Invoice Line has been deleted.', 'success');
		} else {
            set_message('Error delete invoice_line.', 'error');
		}

		redirect('administrator/invoice_line');
	}

		/**
	* View view Invoice Lines
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('invoice_line_view');

		$this->data['invoice_line'] = $this->model_invoice_line->find($id);

		$this->template->title('Invoice Line Detail');
		$this->render('backend/standart/administrator/invoice_line/invoice_line_view', $this->data);
	}
	
	/**
	* delete Invoice Lines
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$invoice_line = $this->model_invoice_line->find($id);

		
		
		return $this->model_invoice_line->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('invoice_line_export');

		$this->model_invoice_line->export('invoice_line', 'invoice_line');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('invoice_line_export');

		$this->model_invoice_line->pdf('invoice_line', 'invoice_line');
	}
}


/* End of file invoice_line.php */
/* Location: ./application/controllers/administrator/Invoice Line.php */