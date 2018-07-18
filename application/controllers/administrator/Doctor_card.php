<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Partner Doctor Controller
*| --------------------------------------------------------------------------
*| Partner Doctor site
*|
*/
class Doctor_card extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor_card');
	}

	/**
	* show all Partner Doctors
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_card_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['doctor_cards'] = $this->model_doctor_card->get($filter, $field, $this->limit_page, $offset);
		$this->data['doctor_card_counts'] = $this->model_doctor_card->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/doctor_card/index/',
			'total_rows'   => $this->model_doctor_card->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Partner Doctor List');
		$this->render('backend/standart/administrator/doctor_card/doctor_card_list', $this->data);
	}
	
	/**
	* Add new doctor_cards
	*
	*/
	public function add()
	{
		$this->is_allowed('doctor_card_add');

		$this->data['card_codes'] = $this->db->get('card')->result();
	    $this->data['card_codes_total'] = $this->db->count_all_results('card');

	    $this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');

		$this->template->title('Card New');
		$this->render('backend/standart/administrator/doctor_card/doctor_card_add', $this->data);
	}

	public function add_doctor_No(){
		$card_code = $this->input->get('card_code');
		$doctor_code= $this->input->get('doctor_code');
			
		$this->db->where("card_code", $card_code);
		$this->db->order_by("PARTNER_CONTRACT_NO", "DESC");
		$this->db->order_by("STATUS", "ASC");
		$query2 = $this->db->get("partner_contract");
		
		if ($query2->num_rows() > 0){
			$this->data['has_contract'] = true;
			$this->data['partner_contract'] = $query2->result();
		}else{
			$this->data['has_contract'] = false;
		}

		echo json_encode($this->data);		
	}
	
	public function check_contract(){
		$card_code = $this->input->get('card_code');
		$dr_code = $this->input->get('dr_code');
		$partner_dr_code = $this->input->get('PARTNER_DR_CODE');
		$loc_code = $this->input->get('LOC_CODE');
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("card_code", $card_code);
		$this->db->where("TERM_DATE", "");
		$this->db->or_where("TERM_DATE", NULL);
		$this->db->or_where("TERM_DATE", "0000-00-00");
		$query = $this->db->get("doctor_card");
		
		if ($query->num_rows() > 0){
			return true;
		}else{
			$this->set_message('check_contract', 'This Partner Doctor already exists');
			return false;
		}
		
	}
	
	public function find_type_center(){
		$dr_code = $this->input->get('dr_code');
		
		$this->db->where("DR_CODE", $dr_code);
		$this->data['TYPE'] = $this->db->get("doctor")->row();
		
		$this->db->select('*');
		$this->db->from('doctor_center');
		$this->db->join('center','doctor_center.CENTER_CODE = center.CENTER_CODE');
		$this->db->where('DR_CODE',$dr_code);
		$this->data['centers'] = $this->db->get()->result();


		echo json_encode($this->data);	
		
	}

	/**
	* Add New Partner Doctors
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_card_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		 $this->form_validation->set_rules('card_code', 'Partner Code', 'trim|required');
		 $this->form_validation->set_rules('DR_CODE','Doctor code','trim|required');
		 $this->form_validation->set_rules('CENTER_CODE','CENTER NAME','trim|required');
		 $this->form_validation->set_rules('PARTNER_DR_CODE','Partner Dr Code','trim|required|alpha_dash|max_length[80]');
		 $this->form_validation->set_rules('LOC_CODE','Loc Code','trim|alpha_dash|max_length[80]');
		 $this->form_validation->set_rules('TYPE[]', 'Type', 'trim|required');

		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		 $today = date('Y-m-d H:i:s');

		if ($this->form_validation->run()) {
			
			$dr_code = $this->input->post('DR_CODE');
			$center_code = $this->input->post('CENTER_CODE');
			$card_code = $this->input->post('card_code');
			$partner_dr_code = $this->input->post('PARTNER_DR_CODE');
			$loc_code = $this->input->post('LOC_CODE');
			$term_date = $this->input->post('TERM_DATE');
		
			if ($term_date == ""){
				$term_date = null;
			}
			$this->db->where("DR_CODE", $dr_code);
			$this->db->where("CENTER_CODE",$center_code);
			$this->db->where("card_code", $card_code);
			$this->db->where("PARTNER_DR_CODE", $partner_dr_code);
			$this->db->where("LOC_CODE", $loc_code);
			$query = $this->db->get("doctor_card");
			$exists_doctor_card = false;
			
			if ($query->num_rows() > 0){
				$exists_doctor_card = true;
				$save_doctor_card = 0;
			}else{
				$save_data = [
					'card_code' => $card_code,
					'DR_CODE' => $dr_code,
					'CENTER_CODE' =>$center_code,
					'PARTNER_DR_CODE' =>$partner_dr_code,
					'LOC_CODE' => $loc_code,
					'TERM_DATE' =>$term_date,
					'TYPE1' => $this->input->post('TYPE[0]') == null ? "" : $this->input->post('TYPE[0]'),
					'TYPE2' => $this->input->post('TYPE[1]') == null ? "" : $this->input->post('TYPE[1]'),
					'TYPE3' => $this->input->post('TYPE[2]') == null ? "" : $this->input->post('TYPE[2]'),
					'CREATOR'=> $user,
					'CREATE_DATE'=>$today,
					'LAST_MODIFIER'=>$user,
					'LAST_UPDATE'=>$today
				];
				
				$this->db->insert("doctor_card", $save_data);
				$save_doctor_card = $this->db->insert_id();
				
			}


			if ($save_doctor_card) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor_card;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor_card/edit/' . $save_doctor_card, 'Edit Partner Doctor').' or  '.anchor('administrator/doctor_card', ' Go back to list');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/doctor_card/edit/' . $save_doctor_card, 'Edit Partner Doctor'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_card');
				}
			} else {
				if ($exists_doctor_card){
					$this->data['success'] = false;
					$this->data['message'] = 'Partner Doctor already existed';
				}else{
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
					} else {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
						$this->data['redirect'] = base_url('administrator/doctor_card');
					}
				}
				
			}
		}else{
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Partner Doctors
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('doctor_card_update');
		
		$this->db->select('*');
		$this->db->from('doctor_card');
		$this->db->join('center','doctor_card.CENTER_CODE = doctor_card.CENTER_CODE');
		$this->db->where('AUTO_NO',$id);
		$query = $this->db->get();
		$this->data['doctor_card'] = $query->row();  
		

		$this->template->title('Partner Doctor Update');
		$this->render('backend/standart/administrator/doctor_card/doctor_card_update', $this->data);
	}

	/**
	* Update Partner Doctors
	*
	* @var $id String
	*/
	public function edit_save($id){

		if (!$this->is_allowed('doctor_card_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		$today = date('Y-m-d H:i:s');
		
		
		$term_date = $this->input->post('TERM_DATE');
		
		if ($term_date == ""){
			$term_date = null;
		}
		
		$this->form_validation->set_rules('TYPE[]', 'Type', 'trim|required');
        $this->form_validation->set_rules('PARTNER_DR_CODE', 'Partner Doctor Code', 'trim|required');
		if ($this->form_validation->run()) {

			$save_data = [
				'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
				'LOC_CODE' =>$this->input->post('LOC_CODE'),
				'TYPE1' => $this->input->post('TYPE[0]') == null ? "" : $this->input->post('TYPE[0]'),
				'TYPE2' => $this->input->post('TYPE[1]') == null ? "" : $this->input->post('TYPE[1]'),
				'TYPE3' => $this->input->post('TYPE[2]') == null ? "" : $this->input->post('TYPE[2]'),
				'TERM_DATE' => $term_date,
			];

			$this->db->where('AUTO_NO',$id);
		    $this->db->update('doctor_card', $save_data);
        	$save_doctor_card = $this->db->affected_rows();
			

			if ($save_doctor_card) {
				
			    $save_data2 =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today,
				];

				$this->db->where('AUTO_NO',$id);
			    $this->db->update('doctor_card', $save_data2);
			}
			
			if ($save_doctor_card){

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor_card', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor_card');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/doctor_card');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Partner Doctors
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_card_delete');

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
            set_message('Doctor Card has been deleted.', 'success');
		} else {
            set_message('Error delete doctor_card.', 'error');
		}

		redirect('administrator/doctor_card');
	}

		/**
	* View view Partner Doctors
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('doctor_card_view');
		

        $this->db->where('AUTO_NO',$id);
		$this->data['doctor_card'] = $this->db->get('doctor_card')->row();
	
		$this->template->title('Partner Doctor Detail');
		$this->render('backend/standart/administrator/doctor_card/doctor_card_view', $this->data);
	}
	
	/**
	* delete Partner Doctors
	*
	* @var $id String
	*/
	private function _remove($id)
	{

		$this->db->where('AUTO_NO',$id);
		$doctor_card = $this->db->get('doctor_card');
		
		
		return $this->model_doctor_card->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_card_export');

		$this->model_doctor_card->export('doctor_card', 'doctor_card');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_card_export');

		$this->model_doctor_card->pdf('doctor_card', 'doctor_card');
	}
}


/* End of file doctor_card.php */
/* Location: ./application/controllers/administrator/Partner Doctor.php */