<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Batch Controller
*| --------------------------------------------------------------------------
*| Batch site
*|
*/
class Batch extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_batch');
	}

	/**
	* show all Batchs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('batch_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['batchs'] = $this->model_batch->get($filter, $field, $this->limit_page, $offset);
		$this->data['batch_counts'] = $this->model_batch->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/batch/index/',
			'total_rows'   => $this->model_batch->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Batch List');
		$this->render('backend/standart/administrator/batch/batch_list', $this->data);
	}
	
	/**
	* Add new batchs
	*
	*/
	public function add()
	{
		$this->is_allowed('batch_add');

		$this->template->title('Batch New');
		$this->render('backend/standart/administrator/batch/batch_add', $this->data);
	}

	/**
	* Add New Batchs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('batch_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'BATCH_DATE' => $this->input->post('BATCH_DATE'),
			];

			
			$save_batch = $this->model_batch->store($save_data);

			if ($save_batch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_batch;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/batch/edit/' . $save_batch, 'Edit Batch').' or  '.anchor('administrator/batch', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/batch/edit/' . $save_batch, 'Edit Batch'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/batch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/batch');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Batchs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('batch_update');

		$this->data['batch'] = $this->model_batch->find($id);

		$this->template->title('Batch Update');
		$this->render('backend/standart/administrator/batch/batch_update', $this->data);
	}

	/**
	* Update Batchs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('batch_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'BATCH_DATE' => $this->input->post('BATCH_DATE'),
			];

			
			$save_batch = $this->model_batch->change($id, $save_data);

			if ($save_batch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/batch', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/batch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/batch');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Batchs
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('batch_delete');

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
            set_message('Batch has been deleted.', 'success');
		} else {
            set_message('Error delete batch.', 'error');
		}

		redirect('administrator/batch');
	}

		/**
	* View view Batchs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('batch_view');

		$this->data['batch'] = $this->model_batch->find($id);

		$this->template->title('Batch Detail');
		$this->render('backend/standart/administrator/batch/batch_view', $this->data);
	}
	
	/**
	* delete Batchs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$batch = $this->model_batch->find($id);

		
		
		return $this->model_batch->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('batch_export');

		$this->model_batch->export('batch', 'batch');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('batch_export');

		$this->model_batch->pdf('batch', 'batch');
	}
}


/* End of file batch.php */
/* Location: ./application/controllers/administrator/Batch.php */