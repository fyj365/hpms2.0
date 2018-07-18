<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Partner Contact Controller
*| --------------------------------------------------------------------------
*| Partner Contact site
*|
*/
class Partner_contact extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_partner_contact');
	}

	/**
	* show all Partner Contacts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('partner_contact_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['partner_contacts'] = $this->model_partner_contact->get($filter, $field, $this->limit_page, $offset);
		$this->data['partner_contact_counts'] = $this->model_partner_contact->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/partner_contact/index/',
			'total_rows'   => $this->model_partner_contact->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Partner Contact List');
		$this->render('backend/standart/administrator/partner_contact/partner_contact_list', $this->data);
	}
	
	/**
	* Add new partner_contacts
	*
	*/
	public function add()
	{
		$this->is_allowed('partner_contact_add');

		$this->template->title('Partner Contact New');
		$this->render('backend/standart/administrator/partner_contact/partner_contact_add', $this->data);
	}

	/**
	* Add New Partner Contacts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('partner_contact_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		   $CARD_CODE = $this->input->post('CARD_CODE');
			$save_data = [
				'CARD_CODE' => $CARD_CODE,
				'CONTACT_NO' => $this->input->post('CONTACT_NO'),
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'TITLE' => $this->input->post('TITLE'),
				'DEPARTMENT' => $this->input->post('DEPARTMENT'),
				'TEL' => $this->input->post('TEL'),
				'FAX' => $this->input->post('FAX'),
				'EMAIL' => $this->input->post('EMAIL'),
			];

			
			$save_partner_contact = $this->model_partner_contact->store($save_data);

			if ($save_partner_contact) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_partner_contact;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/partner_contact/edit/' . $save_partner_contact, 'Edit Partner Contact').' or  '.anchor('administrator/partner_contact', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/partner_contact/edit/' . $save_partner_contact, 'Edit Partner Contact'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_contact');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_contact');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Partner Contacts
	*
	* @var $id String
	*/
	public function edit($id,$no)
	{
		$this->is_allowed('partner_contact_update');
		
		$this->db->where('CARD_CODE',$id);
		$this->db->where('CONTACT_NO',$no);
		
		$query = $this->db->get('partner_contact');
		$this->data['partner_contact'] = $query->row();

		$this->template->title('Partner Contact Update');
		$this->render('backend/standart/administrator/partner_contact/partner_contact_update', $this->data);
	}

	/**
	* Update Partner Contacts
	*
	* @var $id String
	*/
	public function edit_save($id,$no)
	{
		if (!$this->is_allowed('partner_contact_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		

		$this->form_validation->set_rules('CARD_CODE', 'PARTNER Code', 'trim|required');

		
		if ($this->form_validation->run()) {
		

			$save_data = [
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'TITLE' => $this->input->post('TITLE'),
				'DEPARTMENT' => $this->input->post('DEPARTMENT'),
				'TEL' => $this->input->post('TEL'),
				'FAX' => $this->input->post('FAX'),
				'EMAIL' => $this->input->post('EMAIL'),
			];

		   $this->db->where('CARD_CODE',$id);
			 $this->db->where('CONTACT_NO',$no);
			$save_partner_contact = $this->db->update('partner_contact', $save_data);

			if ($save_partner_contact) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/partner_contact', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/partner_contact');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/partner_contact');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Partner Contacts
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('partner_contact_delete');

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
            set_message('Partner Contact has been deleted.', 'success');
		} else {
            set_message('Error delete partner_contact.', 'error');
		}

		redirect('administrator/partner_contact');
	}

		/**
	* View view Partner Contacts
	*
	* @var $id String
	*/
	public function view($id,$no)
	{
		$this->is_allowed('partner_contact_view');

		$this->db->where('CARD_CODE',$id);
		$this->db->where('CONTACT_NO',$no);
		
		$query = $this->db->get('partner_contact');
		$this->data['partner_contact'] = $query->row();

		$this->template->title('Partner Contact Detail');
		$this->render('backend/standart/administrator/partner_contact/partner_contact_view', $this->data);
	}
	
	/**
	* delete Partner Contacts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$partner_contact = $this->model_partner_contact->find($id);

		
		
		return $this->model_partner_contact->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('partner_contact_export');

		$this->model_partner_contact->export('partner_contact', 'partner_contact');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('partner_contact_export');

		$this->model_partner_contact->pdf('partner_contact', 'partner_contact');
	}
}


/* End of file partner_contact.php */
/* Location: ./application/controllers/administrator/Partner Contact.php */