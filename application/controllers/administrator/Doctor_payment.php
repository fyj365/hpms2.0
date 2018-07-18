<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Payment Controller
*| --------------------------------------------------------------------------
*| Doctor Payment site
*|
*/
class Doctor_payment extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_payment');
	}

	/**
	* show all Doctor Payments
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_payment_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['doctor_payments'] = $this->model_doctor_payment->get($filter, $field, $this->limit_page, $offset);
		$this->data['doctor_payment_counts'] = $this->model_doctor_payment->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/doctor_payment/index/',
			'total_rows'   => $this->model_doctor_payment->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor Payment List');
		$this->render('backend/standart/administrator/doctor_payment/doctor_payment_list', $this->data);
	}
	
	/**
	* Add new doctor_payments
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_payment_add');

		$this->template->title('Doctor Payment New');
		$this->render('backend/standart/administrator/doctor_payment/doctor_payment_add', $this->data);
	}

	/**
	* Add New Doctor Payments
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_payment_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'DR_CODE' => $this->input->post('DR_CODE'),
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
				'CREATOR' => $this->input->post('CREATOR'),
				'CREATE_DATE' => $this->input->post('CREATE_DATE'),
			];

			
			$save_doctor_payment = $this->model_doctor_payment->store($save_data);

			if ($save_doctor_payment) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor_payment;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor_payment/edit/' . $save_doctor_payment, 'Edit Doctor Payment').' or  '.anchor('administrator/doctor_payment', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_payment/edit/' . $save_doctor_payment, 'Edit Doctor Payment'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_payment');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_payment');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctor Payments
	*
	* @var $id String
	*/

	public function edit($doctor = NULL, $center = NULL)
	{
		$this->is_allowed('doctor_payment_update');
		if (!is_null($doctor) && !is_null($center)) {
			# code...
				$this->data['select_center'] = TRUE;

			    $this->db->from('doctor_payment');
		        $this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE','left');
		        $this->db->where('DR_CODE',$doctor);
		        $this->db->where('doctor_payment.CENTER_CODE',$center);
		        $query = $this->db->get();
		        if ($query->num_rows() > 0 ) {
		        	# code...
		        	$doctor_payment = $query->row();
		            $this->data['doctor_payment'] =  $doctor_payment;
		        	
		        	if ($doctor_payment->BANK_CLEARING_CODE !='') {
		        		# code...
		        		$this->data['auto_pay'] = TRUE;
		        	}else{
		        		$this->data['auto_pay'] = FALSE;
		        	}

		        }else{
		        	$this->data['doctor_payment'] =  FALSE;
		        	$this->data['auto_pay'] = FALSE;

		        }
		}elseif (!is_null($doctor) && is_null($center)) {
			# code...
		    $this->data['select_center'] = FALSE;
			$this->data['doctor_payment'] =  FALSE;
			$this->data['auto_pay'] = FALSE;

			$this->data['DR_CODE'] = $doctor;

			$this->db->from('doctor_center');
			$this->db->join('center','doctor_center.CENTER_CODE = center.CENTER_CODE');
			$this->db->where('DR_CODE',$doctor);
			$query = $this->db->get();
			if ($query ->num_rows()>0) {
				$this->data['doctor_center'] = $query->result();
			}else{
				$this->data['doctor_center'] = '';
			}
		}


        $this->data['DR_CODE']  = $doctor;
        $this->data['CENTER_CODE'] = $center;
		$this->template->title('Doctor Payment Update');
		$this->render('backend/standart/administrator/doctor_payment/doctor_payment_update', $this->data);
	}

	/**
	* Update Doctor Payments
	*
	* @var $id String
	*/
	public function edit_save($doctor = NULL, $center = NULL)
	{
		if (!$this->is_allowed('doctor_payment_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		//Payment validation
		$payee_name = $this->input->post('PAYEE_NAME');
		$payee_addr1 = $this->input->post('PAYEE_ADDR1');
		$clearing_code = $this->input->post('BANK_CLEARING_CODE');
		$bank_account = $this->input->post('ACCOUNT_NO');
		$bank_account_holder = $this->input->post('ACCOUNT_HOLDER');


		$where = array(
			'DR_CODE' => $doctor,
			'CENTER_CODE' => $center
		);

        $query = $this->db->get_where('doctor_payment', $where);
        if ($query ->num_rows() > 0) {
        	# code...
            $update_payment = TRUE;
            $insert_payment = FALSE;
        } else{
            $update_payment = FALSE;
            $insert_payment = TRUE;
        }

        if ($update_payment || $insert_payment) {
        	# code...
		if ($payee_name == "" && $payee_addr1 != ""){
		   $this->form_validation->set_rules('PAYEE_NAME', 'Payee Name', 'required');	

		}elseif ( $clearing_code == "" && $bank_account!='') {
           $this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'required');
		}elseif ($payee_name != "" && $clearing_code == "") {

			$this->form_validation->set_rules('PAYEE_NAME','Payee Name','trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
		    $this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');

		}elseif ($clearing_code != "" && $payee_name =="") {

			$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|max_length[80]');
			$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');

		}else {

			$this->form_validation->set_rules('PAYEE_NAME','Payee Name','trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
		    $this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');
			$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|max_length[80]');
			$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');

		}
        }

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {

		    if ($update_payment) {
		    	# code...
		      $save_data = [
					'DR_CODE' => $this->input->post('DR_CODE'),
					'CENTER_CODE' => $this->input->post('CENTER_CODE'),
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

					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' =>  date('Y-m-d')
				];

				$this->db->where('DR_CODE', $doctor);
				$this->db->where('CENTER_CODE', $center);
				$query = $this->db->update('doctor_payment', $save_data);
				if ($this->db->affected_rows() > 0 ) {
					# code...
					$save_doctor_payment = TRUE; 
				}else{
					$save_doctor_payment = FALSE;
				}

		    }elseif($insert_payment){
		    	$save_data2 = [
					'DR_CODE' => $this->input->post('DR_CODE'),
					'CENTER_CODE' => $this->input->post('CENTER_CODE'),
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
					'CREATOR' =>$user,
					'CREATE_DATE' => date('Y-m-d'),
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' =>  date('Y-m-d')
				];

		    	$this->db->where('DR_CODE', $doctor);
				$this->db->where('CENTER_CODE', $center);
				$query = $this->db->insert('doctor_payment',$save_data2);
				if ($this->db->affected_rows() > 0) {
					# code...
					$save_doctor_payment = TRUE; 
				}else{
					$save_doctor_payment = FALSE; 
				}
		    	
		    }else{
		    	$save_doctor_payment = FALSE;
		    }


			if ($save_doctor_payment) {
		
					set_message('Your data has been successfully updated into the database. ', 'success');
            		$this->data['success'] = true;

		    } else {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Doctor Payments
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_payment_delete');

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
            set_message('Doctor Payment has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_payment.', 'error');
		}

		redirect('administrator/doctor_payment');
	}

		/**
	* View view Doctor Payments
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_payment_view');

		$this->data['doctor_payment'] = $this->model_doctor_payment->find($id);

		$this->template->title('Doctor Payment Detail');
		$this->render('backend/standart/administrator/doctor_payment/doctor_payment_view', $this->data);
	}
	
	/**
	* delete Doctor Payments
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor_payment = $this->model_doctor_payment->find($id);

		
		
		return $this->model_doctor_payment->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_payment_export');

		$this->model_doctor_payment->export('doctor_payment', 'doctor_payment');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_payment_export');

		$this->model_doctor_payment->pdf('doctor_payment', 'doctor_payment');
	}
}


/* End of file doctor_payment.php */
/* Location: ./application/controllers/administrator/Doctor Payment.php */