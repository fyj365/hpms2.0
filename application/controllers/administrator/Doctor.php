<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Doctor Controller
*| --------------------------------------------------------------------------
*| Doctor site
*|
*/
class Doctor extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_doctor');
	}

	/**
	* show all Doctors
	*
	* @var $offset String
	*/

	public function argument(){
		var a =0;
		return;
	}

	public function index($offset = 0)
	{
		$this->is_allowed('doctor_list');
		
		$field 	= "";
		
		$filters["CARD_CODE"] = $this->input->get('CARD_CODE');
		$filters["DR_CODE"] = $this->input->get('DR_CODE');
		$filters["DR_NAME"] = $this->input->get('DR_NAME');
		$filters["CENTER_NAME"] = $this->input->get('CENTER_NAME');
		$filters["TEL"] = $this->input->get('TEL');
		$filters["FAX"] = $this->input->get('FAX');
		$filters["MPS_EXPIRY_DATE"] = $this->input->get('MPS_EXPIRY_DATE');
		$filters["APS_EXPIRY_DATE"] = $this->input->get('APS_EXPIRY_DATE');
		$filters["BR_EXPIRY_DATE"] = $this->input->get('BR_EXPIRY_DATE');
		$filters["TERM_DATE"] = $this->input->get('TERM_DATE');
		$filters["STATUS"] = $this->input->get('STATUS');
		
		$this->data['doctors'] = $this->model_doctor->get($filters, $field, $this->limit_page, $offset);
		$this->data['doctor_counts'] = $this->model_doctor->cust_count_all();

		$config = [
			'base_url'     => 'administrator/doctor/index/',
			'total_rows'   => $this->model_doctor->cust_count_all(),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Doctor List');
		$this->render('backend/standart/administrator/doctor/doctor_list', $this->data);
	}
	
	function find_procedures(){
		$sp_code = $this->input->get('sp_code');
		
		$this->db->where("SP_CODE", $sp_code);
		$this->db->order_by("CLINIC_PROCEDURE", "ASC");
		$query = $this->db->get("medical_procedures");
		
		if ($query->num_rows() > 0){
			$this->data['has_medical_procedures'] = true;
			$this->data['medical_procedures'] = $query->result();
		}else{
			$this->data['has_medical_procedures'] = false;
		}
		
		
		echo json_encode($this->data);
	}
	
	function find_center(){
		$center_code = $this->input->get('center_code');
		
		$this->db->where("CENTER_CODE", $center_code);
		$this->data['center'] = $this->db->get("center")->row();

		echo json_encode($this->data);
	}
	
	function validate_eng_name($field)
	{
		
		if ($field == ""){
			$this->form_validation->set_message('validate_eng_name', 'The English Name is required.');
			return FALSE;
		}
		
	   $regex = "/^[a-zA-Z\s\p{Han}]+$/u";

	   if (preg_match($regex, $field)){
			return TRUE;
	   }else{
			$this->form_validation->set_message('validate_eng_name', 'The English Name is not allow number or special characters');
			return FALSE;
	   }
	}
	
	function validate_chi_name($field)
	{
		
		if ($field == ""){
			return TRUE;
		}
		
	   $regex = "/^[a-zA-Z\s\p{Han}]+$/u";

	   if (preg_match($regex, $field)){
			return TRUE;
	   }else{
			$this->form_validation->set_message('validate_chi_name', 'The Chinese Name is not allow number or special characters');
			return FALSE;
	   }
	}
	
	function validate_mobile($field)
	{
		if ($field == ""){
			return TRUE;
		}
		
	   $regex = "/^[0-9\s\+\-]+$/";

	   if (preg_match($regex, $field)){
			return TRUE;
	   }else{
			$this->form_validation->set_message('validate_mobile', 'The Mobile is not allow special characters');
			return FALSE;
	   }
	}
	
	/** 
	* Add new doctors
	*
	*/
 	public function upload_cert_copy()
	{
		if (!$this->is_allowed('doctor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'doctor_qualification',
			'allowed_types' => 'jpg|png|pdf|jpeg',
		]);
	}

	/**
	* Delete Image Doctor Qualification	* 
	* @return JSON
	*/
	public function delete_cert_copy($uuid)
	{
		if (!$this->is_allowed('doctor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'CERT_COPY', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'doctor_qualification',
            'primary_key'       => 'QUALIFICATION_CODE',
            'upload_path'       => 'uploads/doctor_qualification/'
        ]);
	}

	/**
	* Get Image Doctor Qualification	* 
	* @return JSON
	*/
	public function get_cert_copy($id)
	{
		if (!$this->is_allowed('doctor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}
		$this->db->where('QUALIFICATION_CODE',$id);
		$query = $this->db->get('doctor_qualification');
		$doctor_qualification = $query->row();

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'CERT_COPY', 
            'table_name'        => 'doctor_qualification',
            'primary_key'       => 'QUALIFICATION_CODE',
            'upload_path'       => 'uploads/doctor_qualification/',
            'delete_endpoint'   => 'administrator/doctor/delete_cert_copy'
        ]);
	}
	public function add()
	{
		$this->is_allowed('doctor_add');

		$this->template->title('Doctor New');
		$this->render('backend/standart/administrator/doctor/doctor_add', $this->data);
	}
	

	public function add_consult($id)
	{
		$this->is_allowed('doctor_consult_hour_add');
		
		$this->data['DR_CODE'] = $id;

		$this->template->title('Doctor Consultation New');
		$this->render('backend/standart/administrator/doctor_consult_hour/doctor_consult_hour_add_consult', $this->data);
	}
	
	public function add_quali($id)
	{
		$this->is_allowed('doctor_qualification_add');
		
		$this->data['DR_CODE'] = $id;

		$this->template->title('Doctor Qualification New');
		$this->render('backend/standart/administrator/doctor_qualification/doctor_qualification_add_quali', $this->data);
	}
	
	public function add_website($id)
	{
		$this->is_allowed('website_login_add');
		
		$this->data['DR_CODE'] = $id;

		$this->template->title('Website Login New');
		$this->render('backend/standart/administrator/website_login/website_login_add_website', $this->data);
	}
	
	public function add_partner($id)
	{
		$this->is_allowed('partner_doctor_add');
		
		$this->data['DR_CODE'] = $id;

		$this->template->title('Partner Doctor Card New');
		$this->render('backend/standart/administrator/partner_doctor/partner_doctor_add_partner', $this->data);
	}
	
	public function add_fee($id)
	{
		$this->is_allowed('doctor_special_fee_add');
		
		$this->data['DR_CODE'] = $id;
		
		//Get business partner doctor card
		$this->db->where("DR_CODE", $id);
		$this->db->group_by("CARD_CODE");
		$query = $this->db->get("partner_doctor");
		
		if ($query->num_rows() > 0){
			$this->data['has_doctor_partner'] = true;
			$this->data['doctor_partner'] = $query->result();
			$first_doctor_partner = $query->row();

			//Find the doctor type
			$this->db->select("TYPE1, TYPE2, TYPE3, PARTNER_DR_CODE, LOC_CODE");
			$this->db->where("CARD_CODE", $first_doctor_partner->CARD_CODE);
			$this->db->where("DR_CODE", $id);
			$this->db->order_by("CREATE_DATE", "DESC");
			
			$query2 = $this->db->get("partner_doctor");
			$this->data['doctor_type'] = $query2->row();
			$doctor_type = $query2->row();
			
			//Find the partner card
			$this->db->where("CARD_CODE", $first_doctor_partner->CARD_CODE);
			$this->db->where("STATUS", "Active");
			$query3 = $this->db->get("partner_card");
			
			if ($query3->num_rows() > 0){
				$this->data['has_partner_card'] = true;
				$this->data['partner_card'] = $query3->result();
				$first_card = $query3->row();
				
				//Find the med days selection
				$type1 = $doctor_type->TYPE1;

				$this->db->where("CARD_CODE", $first_card->CARD_CODE);
				$this->db->where("CLASS_CODE", $first_card->CLASS_CODE);
				$this->db->where("TYPE", $type1);
				$this->db->group_by("MED_DAYS");
				
				$query4 = $this->db->get("agreed_fee");
				
				if ($query4->num_rows() > 0){
					$this->data['has_med_days'] = true;
					$this->data['med_days'] = $query4->result();
				}else{
					$this->data['has_med_days'] = false;
				}
				
			}else{
				$this->data['has_partner_card'] = false;
			}
			
			
		}else{
			$this->data['has_doctor_partner'] = false;
			$this->data['has_partner_card'] = false;
		}
		

		$this->template->title('Doctor Special Fee New');
		$this->render('backend/standart/administrator/doctor_special_fee/doctor_special_fee_add_fee', $this->data);
	}
    
	/**
	* Add New Doctors
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('doctor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		//Doctor validation
		$this->form_validation->set_rules('DR_CODE', 'Doctor ID', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]|is_unique[doctor.DR_CODE]');
		$this->form_validation->set_rules('E_NAME', 'English Name', 'trim|required|max_length[80]|regex_match[/^[a-zA-Z0-9\-\s\_]+$/]');
		$this->form_validation->set_rules('C_NAME', 'Chinese Name', 'trim|max_length[80]');
		$this->form_validation->set_rules('GENDER', 'Gender', 'trim|required');
		$this->form_validation->set_rules('TYPE[]', 'Doctor Type', 'trim|required');
		$this->form_validation->set_rules('MOBILE', 'Mobile', 'trim|max_length[30]');
		$this->form_validation->set_rules('PAGER', 'Pager', 'trim|max_length[80]');
		$this->form_validation->set_rules('EMAIL', 'Email', 'trim|max_length[80]|valid_email');
		$this->form_validation->set_rules('LANG', 'Language', 'trim|max_length[80]');
		$this->form_validation->set_rules('HKID', 'HKID', 'trim|max_length[20]');
		$this->form_validation->set_rules('GP_REG_NO', 'GP Reg No', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		$this->form_validation->set_rules('SP_REG_NO', 'SP Reg No', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		
		
		$hv_center = $this->input->post("HV_CENTER");
	
		if ($hv_center > 0){
			$this->form_validation->set_rules('CENTER_CODE_SELECT', 'Center Code', 'trim|required');
			$center_code = $this->input->post('CENTER_CODE_SELECT');

		}else{

			//Center validation
			$this->form_validation->set_rules('TEL', 'Center Tel', 'trim|required|is_unique[center.TEL]|regex_match[/^[0-9]{8}$/]');
			$this->form_validation->set_rules('E_NAME', 'Center Eng Name', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_NAME', 'Center Chi Name', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR1', 'Eng Addr 1', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('E_ADDR2', 'Eng Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR3', 'Eng Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR4', 'Eng Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR5', 'Eng Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR1', 'Chi Addr 1', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR2', 'Chi Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR3', 'Chi Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR4', 'Chi Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR5', 'Chi Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_DISTRICT', 'Eng District','trim|max_length[80]|required');
			$this->form_validation->set_rules('C_DISTRICT','Chi District','trim|max_length[80]');
			$this->form_validation->set_rules('FAX', 'Fax', 'trim|max_length[80]');
			$this->form_validation->set_rules('area', 'Area' ,'required');
			$center_code = $this->input->post('CENTER_ID');
		}
		

		//Payment validation
		$payee_name = $this->input->post('PAYEE_NAME');
		$clearing_code = $this->input->post('BANK_CLEARING_CODE');
		
		if ($payee_name != "" || $clearing_code != ""){

			if ($payee_name != "") {
				$this->form_validation->set_rules('PAYEE_NAME', 'Payee Name', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');
			}

			if ($clearing_code != "" ){
				$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|max_length[4]');
				$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
				$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');

		    }
		}

		    //Consult validation
			$this->form_validation->set_rules('CONTACT_PERSON', 'Contact Person', 'trim|max_length[80]');
           
            $CHI_DAYS = array();
            $ENG_DAYS = array();
			for($i = 1; $i < 7; $i++){
				$c_day = $this->input->post('SCHEDULE_DAY_C'.$i);
				$e_day = $this->input->post('SCHEDULE_DAY_E'.$i);
				array_push($CHI_DAYS, $c_day);
				array_push($ENG_DAYS, $e_day);
				if ($c_day!=''||$e_day!='') {
					$this->form_validation->set_rules('TIMESLOT'.$i.'_1', 'Schedule Day'.$i.': Timeslot 1', 'trim|required|max_length[45]');
					$this->form_validation->set_rules('TIMESLOT'.$i.'_2', 'Schedule Day'.$i.': Timeslot 2', 'trim|max_length[45]');
			        $this->form_validation->set_rules('TIMESLOT'.$i.'_3', 'Schedule Day'.$i.': Timeslot 3', 'trim|max_length[45]');
				}
			}


			// WEBSITE LOGIN VALIDATION
			$Login_com = $this->input->post('LOGIN_COM');
			if ($Login_com!='') {
				$this->db->where('COM_ID', $Login_com);
				$q = $this->db->get('company');
				$company_name = $q->row()->E_NAME;
				$this->form_validation->set_rules('WEBSITE_ACCOUNT', $company_name .' Login account', 'trim|required|max_length[80]');
				$this->form_validation->set_rules('WEBSITE_PASSWORD',$company_name . ' Login password', 'trim|required|max_length[80]');
			}


			// CARD VALIDATION
			$card_codes = $this->input->post('CARD_CODE');

			for($i = 0; $i< count($card_codes); $i++){
				if ($card_codes[$i] !='') {
					# code...
					$this->form_validation->set_rules('DOCTOR_TYPE-'.$i.'[]','CARD:'. $card_codes[$i]. 'required doctor type','required');
				}
			}

			// CERTIFACATE VALIDATION
				$this->form_validation->set_rules('QUALIFICATION', 'Qualification', 'trim|max_length[80]');
				$this->form_validation->set_rules('CERT_YEAR', 'Cert Year', 'trim|max_length[12]|regex_match[/^[0-9\-]+$/]');
				$this->form_validation->set_rules('doctor_qualification_CERT_COPY_name', 'CERT COPY', 'trim');



			$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

			$dr_code = $this->input->post('DR_CODE');
			
			$sp_code = [$this->input->post('SP_CODE1'), $this->input->post('SP_CODE2'), $this->input->post('SP_CODE3'), $this->input->post('SP_CODE4')];
			
			$med_p1 = ($this->input->post('MEDICAL_PROCEDURES1') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES1')));
			$med_p2 = ($this->input->post('MEDICAL_PROCEDURES2') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES2')));
			$med_p3 = ($this->input->post('MEDICAL_PROCEDURES3') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES3')));
			$med_p4 = ($this->input->post('MEDICAL_PROCEDURES4') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES4')));
			$medical_p = ($med_p1 == "" ? "" : $med_p1 . ", ") . ($med_p2 == "" ? "" : $med_p2 . ", ") . ($med_p3 == "" ? "" : $med_p3 . ", ") . ($med_p4 == "" ? "" : $med_p4);
		
		if ($this->form_validation->run()) {
	
			// 1. SAVE DOCTOR INFORMATION
			$doctor_data = [
				'DR_CODE' => $dr_code,
				'E_TITLE' => implode(',', (array) $this->input->post('E_TITLE')),
				'C_TITLE' => implode(',', (array) $this->input->post('C_TITLE')),
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'GENDER' => $this->input->post('GENDER'),
				'TYPE1' => $this->input->post('TYPE[0]') == null ? "" : $this->input->post('TYPE[0]'),
				'TYPE2' => $this->input->post('TYPE[1]') == null ? "" : $this->input->post('TYPE[1]'),
				'TYPE3' => $this->input->post('TYPE[2]') == null ? "" : $this->input->post('TYPE[2]'),
				'MOBILE' => $this->input->post('MOBILE'),
				'PAGER' => $this->input->post('PAGER'),
				'EMAIL' => $this->input->post('EMAIL'),
				'LANG' => $this->input->post('LANG'),
				'DOB' => $this->input->post('DOB'),
				'HKID' => $this->input->post('HKID'),
				'MPS_EXPIRY_DATE' => $this->input->post('MPS_EXPIRY_DATE'),
				'APS_EXPIRY_DATE' => $this->input->post('APS_EXPIRY_DATE'),
				'BR_EXPIRY_DATE' => $this->input->post('BR_EXPIRY_DATE'),
				'GP_REG_NO' => $this->input->post('GP_REG_NO'),
				'SP_REG_NO' => $this->input->post('SP_REG_NO'),
				'SP_CODE1' => $sp_code[0] == null ? "" : $sp_code[0],
				'SP_CODE2' => $sp_code[1] == null ? "" : $sp_code[1],
				'SP_CODE3' => $sp_code[2] == null ? "" : $sp_code[2],
				'SP_CODE4' => $sp_code[3] == null ? "" : $sp_code[3],
				'ADMISSION_RIGHT' => implode(', ', (array) $this->input->post('ADMISSION_RIGHT')),
				'MEDICAL_PROCEDURES' => ($medical_p == "" ? "" : substr($medical_p, 0, -2)),
				'JOIN_DATE' => $this->input->post('JOIN_DATE'),
				'TERM_DATE' => "",
				'STATUS' => "Active",
				'REMARK' => $this->input->post('REMARK'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => date('Y-m-d H:i:s'),
			];

			// SAVE DOCTOR PAYMENT INFORMATION ACCORDING TO CENTER
			$this->db->insert("doctor", $doctor_data);
			$doctor_insert = $this->db->affected_rows();
				if ($doctor_insert>0) {
					$save_doctor = TRUE;
				} else{
					$save_doctor = FALSE;
				}
			
			//2. INSERT NEW CENTER 
			if ($hv_center == 0){
					$center_data = [
						'CENTER_CODE' => $center_code,
						'TEL' => $this->input->post('TEL'),
						'FAX' => $this->input->post('FAX'),
						'E_NAME' => $this->input->post('CENTER_E_NAME'),
						'C_NAME' => $this->input->post('CENTER_C_NAME'),
						'E_ADDR1' => $this->input->post('E_ADDR1'),
						'E_ADDR2' => $this->input->post('E_ADDR2'),
						'E_ADDR3' => $this->input->post('E_ADDR3'),
						'E_DISTRICT' => $this->input->post('E_DISTRICT'),
						'C_ADDR1' => $this->input->post('C_ADDR1'),
						'C_ADDR2' => $this->input->post('C_ADDR2'),
						'C_ADDR3' => $this->input->post('C_ADDR3'),
						'C_DISTRICT' => $this->input->post('C_DISTRICT'),
						'AREA' => $this->input->post('area'),
						'OPEN_AFTER_EIGHT' => implode(',', (array) $this->input->post('OPEN_AFTER_EIGHT')),
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];

					$this->db->insert("center", $center_data);
					$center_insert = $this->db->affected_rows();
					if ($center_insert>0) {
						$save_center = TRUE;
						# code...
					}else{
						$save_center = FALSE;
					}
			}else{
					$save_center = TRUE;

			}

	 if ($save_doctor && $save_center ){
		// 3. MAINTAIN THE DOCTOR CENTER RELATION TABLE
				  $doctor_center_data = [
						'DR_CODE' => $dr_code,
						'CENTER_CODE' =>  $center_code,
					];

				 $check_doctor_center = $this->db->get_where('doctor_center',$doctor_center_data);
				 if ($check_doctor_center->num_rows() > 0) {
				 	$save_doctor_center = TRUE;

				 }else{
				 	 $this->db->insert('doctor_center',$doctor_center_data);	
				 	 $insert_doctor_center = $this->db->affected_rows();
				 	if ( $insert_doctor_center > 0) {
				 	  $save_doctor_center  = TRUE;
				 	}else{
				 		$save_doctor_center  = FALSE;
				 	}
				 }

			// 4. INSERT PAYMENT
		if ($save_doctor_center) {
				if ($payee_name !='' || $clearing_code !='') {
					# code...
						$pay_data = [
					'DR_CODE' => $dr_code,
					'CENTER_CODE' => $center_code,
					'PAYEE_NAME' => $payee_name,
					'PAYEE_ADDR1' => $this->input->post('PAYEE_ADDR1'),
					'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
					'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
					'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
					'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
					'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),

					'BANK_CLEARING_CODE' => $clearing_code,
					'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
					'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER'),

					'CREATOR' => $user,
					'CREATE_DATE' => date('Y-m-d H:i:s'),
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];

				$this->db->insert("doctor_payment", $pay_data);
			    $payment_insert = $this->db->affected_rows();
					if ($payment_insert > 0) {
						$save_payment = TRUE;
					}else{
						$save_payment = FALSE;
					}
				}else{
					$save_payment = FALSE;
				}
			
			        
		        // 5. INSERT DOCTOR CONSULT HOUR ACCORDING TO CENTER
		        $save_consult = FALSE;
				$consult_data = [
						'DR_CODE' => $dr_code,
						'CENTER_CODE' => $center_code,
						'CONTACT_PERSON' => $this->input->post('CONTACT_PERSON'),
						'SCHEDULE_DAY_C1' =>  $CHI_DAYS[0],
						'SCHEDULE_DAY_E1' =>  $ENG_DAYS[0],
						'TIMESLOT1_1' => $this->input->post('TIMESLOT1_1'),
						'TIMESLOT1_2' => $this->input->post('TIMESLOT1_2'),
						'TIMESLOT1_3' => $this->input->post('TIMESLOT1_3'),
						'SCHEDULE_DAY_C2' => $CHI_DAYS[1],
						'SCHEDULE_DAY_E2' => $ENG_DAYS[1],
						'TIMESLOT2_1' => $this->input->post('TIMESLOT2_1'),
						'TIMESLOT2_2' => $this->input->post('TIMESLOT2_2'),
						'TIMESLOT2_3' => $this->input->post('TIMESLOT2_3'),
						'SCHEDULE_DAY_C3' => $CHI_DAYS[2],
						'SCHEDULE_DAY_E3' => $ENG_DAYS[2],
						'TIMESLOT3_1' => $this->input->post('TIMESLOT3_1'),
						'TIMESLOT3_2' => $this->input->post('TIMESLOT3_2'),
						'TIMESLOT3_3' => $this->input->post('TIMESLOT3_3'),
						'SCHEDULE_DAY_C4' => $CHI_DAYS[3],
						'SCHEDULE_DAY_E4' => $ENG_DAYS[3],
						'TIMESLOT4_1' => $this->input->post('TIMESLOT4_1'),
						'TIMESLOT4_2' => $this->input->post('TIMESLOT4_2'),
						'TIMESLOT4_3' => $this->input->post('TIMESLOT4_3'),
						'SCHEDULE_DAY_C5' => $CHI_DAYS[4],
						'SCHEDULE_DAY_E5' => $ENG_DAYS[4],
						'TIMESLOT5_1' => $this->input->post('TIMESLOT5_1'),
						'TIMESLOT5_2' => $this->input->post('TIMESLOT5_2'),
						'TIMESLOT5_3' => $this->input->post('TIMESLOT5_3'),
						'SCHEDULE_DAY_C6' => $CHI_DAYS[5],
						'SCHEDULE_DAY_E6' => $ENG_DAYS[5],
						'TIMESLOT6_1' => $this->input->post('TIMESLOT6_1'),
						'TIMESLOT6_2' => $this->input->post('TIMESLOT6_2'),
						'TIMESLOT6_3' => $this->input->post('TIMESLOT6_3'),
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];

					$this->db->insert("doctor_consult_hour", $consult_data);
					$consult_insert = $this->db->affected_rows();
						if ($consult_insert > 0 ) {
							$save_consult = TRUE;
						}else{
							$save_consult = FALSE;
						}



					// 6. INSERT DOCTOR CARD 
					$card_codes = $this->input->post('CARD_CODE');
					$com_id = $this->input->post('COM_ID');
					$company_dr_code = $this->input->post('COM_DR_CODE');
					$loc_code = $this->input->post('LOC_CODE');
					$doctor_term = $this->input->post('D_TERM_DATE');

				    $save_card = 0;
				    if ($card_codes) {
				    	# code...
					if (strlen(implode($card_codes))!=0) {
						for($i = 0; $i < count($card_codes); $i++) {
							if ($card_codes[$i]!='') {
					
						    $TYPE = $this->input->post('DOCTOR_TYPE-'.$i.'[]');

							$type1 = (array_key_exists(0,  $TYPE))?$TYPE[0]:'';
							$type2 = (array_key_exists(1,  $TYPE))?$TYPE[1]:'';
							$type3 = (array_key_exists(2,  $TYPE))?$TYPE[2]:'';

							 $save_doctor_card =[
								'DR_CODE' => $dr_code,
							 	'CENTER_CODE' => $center_code,
						        'CARD_CODE' => $card_codes[$i],
	           					'COM_ID' => $com_id[$i], 
							 	'PARTNER_DR_CODE' =>  $company_dr_code[$i],
							 	'LOC_CODE' => $loc_code[$i],
							 	'TERM_DATE' => $doctor_term[$i],
							 	'TYPE1' => $type1,
							 	'TYPE2' => $type2,
							 	'TYPE3' => $type3,
							    'CREATOR' =>$user,
								'CREATE_DATE' =>  date('Y-m-d H:i:s'),
								'LAST_MODIFIER' => $user,
								'LAST_UPDATE'	=>date('Y-m-d H:i:s')
								];
					           $this->db->insert('doctor_card', $save_doctor_card);
							}
							if ($this->db->affected_rows() > 0) {
								 $save_card ++ ;
							}
						}
						
					}// end of save cards

				}
			}
		 }// edn of save doctor center

		  
		     // 7. INSERT CERTIFICATE

		 			// using upload-file plugin 
					$doctor_qualification_CERT_COPY_uuid = $this->input->post('doctor_qualification_CERT_COPY_uuid');
					$doctor_qualification_CERT_COPY_name = $this->input->post('doctor_qualification_CERT_COPY_name');
					$doctor_cert = $this->input->post('QUALIFICATION');
					if ($doctor_cert !='') {
						 $save_data = [
								'DR_CODE' => $dr_code,
								'QUALIFICATION' => $doctor_cert,
								'CERT_YEAR' => $this->input->post('CERT_YEAR'),
								'CREATOR' => $user,
								'CREATE_DATE' => date('Y-m-d H:i:s'),
								'LAST_MODIFIER' => $user,
							];
							// make qualification directory if it not exist
							if (!is_dir(FCPATH . '/uploads/doctor_qualification/')) {
								mkdir(FCPATH . '/uploads/doctor_qualification/');
							}
 
							if (!empty($doctor_qualification_CERT_COPY_name)) {
								$doctor_qualification_CERT_COPY_name_copy = $dr_code . '_' . $doctor_qualification_CERT_COPY_name;

								rename(FCPATH . 'uploads/tmp/' . $doctor_qualification_CERT_COPY_uuid . '/' . $doctor_qualification_CERT_COPY_name, 
										FCPATH . 'uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy);

								if (!is_file(FCPATH . '/uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy)) {
									echo json_encode([
										'success' => false,
										'message' => 'Error uploading file'
										]);
									exit;
								}

								$save_data['CERT_COPY'] = $doctor_qualification_CERT_COPY_name_copy;
							}
					
						  $this->db->insert('doctor_qualification',$save_data);
						  if ($this->db->affected_rows() > 0) {
							   $save_doctor_qualification = TRUE;
						  }else{
							  $save_doctor_qualification = FALSE;
						  }
				}

			// INSERT LOGIN ACCOUNT PASSWORD
				if ($Login_com!='') {
					$login_data = [
						'DR_CODE' => $dr_code,
						'COM_ID' => $Login_com, 
						'WEBSITE_ACCOUNT' => $this->input->post('WEBSITE_ACCOUNT'),
						'WEBSITE_PASSWORD' => $this->input->post('WEBSITE_PASSWORD'),
						'CREATOR' =>$user,
						'CREATE_DATE' =>  date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE'	=>date('Y-m-d H:i:s')
					];
					$this->db->insert('website_login', $login_data);
					if ($this->db->affected_rows() > 0 ) {
						# code...
						$save_login = TRUE;
					}else{
						$save_login = FALSE;
					}
					# code...
				}else{
					$save_login = FALSE;
				}

    if ($save_doctor  && $save_center ) {
			if ($this->input->post('save_type') == 'stay') {
				$this->data['success'] = true;
				$this->data['id'] 	   = $save_doctor;
				$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor/edit/' .$dr_code , 'Edit Doctor').' or  '.anchor('administrator/doctor', ' Go back to list');
			}else{
				$this->data['success'] = true;
				$this->data['message'] = 'Your data has been successfully stored into the database';
				// $this->data['redirect'] = base_url('administrator/doctor/');
			}
			
	} else if ($save_doctor > 0 && $save_payment == 0){
		if ($this->input->post('save_type') == 'stay') {
			$this->data['success'] = true;
			$this->data['message'] = 'Insert Doctor information successfully, but fail to insert Doctor Payment';
		}else{
			$this->data['success'] = true;
			$this->data['message'] = 'Your data has been successfully stored into the database';
			$this->data['redirect'] = base_url('administrator/doctor/');

		}
		
	}else{
		if ($this->input->post('save_type') == 'stay') {
			$this->data['success'] = false;
			$this->data['message'] = 'Data not change';
		}
	}

	} else {
		$this->data['success'] = false;
		$this->data['message'] = validation_errors();
	}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Doctors
	*
	* @var $id String
	*/
	public function remove_DCenter(){
		$DR_CODE = $this->input->get('dr_code');
		$CENTER_CODE = $this->input->get('center_code');

		// remove Doctor Center
		// remove Doctor Doctor consult hour 
		// remove Doctor payment
		// remove Doctor card
		// remove Doctor agreed fee
		$tables = array('doctor_center','doctor_consult_hour', 'doctor_payment','doctor_card','doctor_special_fee');
		$this->db->where('DR_CODE',$DR_CODE);
		$this->db->where('CENTER_CODE',$CENTER_CODE);
		$query = $this->db->delete($tables);

		echo json_encode($this->data);
	}
   public function add_doctor_center($id){
    	$this->is_allowed('doctor_center');
        $this->data['DR_CODE'] = $id;
    	$this->template->title('doctor_center_add');
    	$this->render('backend/standart/administrator/doctor/doctor_center_add', $this->data);
		
	}
    public function add_doctor_center_save($id){
    	$this->is_allowed('doctor_center');


		$hv_center = $this->input->post("HV_CENTER");
	
		if ($hv_center > 0){
			$this->form_validation->set_rules('CENTER_CODE_SELECT', 'Center Code', 'trim|required');
			$center_code = $this->input->post('CENTER_CODE_SELECT');

		}else{

			//Center validation
			$this->form_validation->set_rules('TEL', 'Center Tel', 'trim|required|is_unique[center.TEL]|regex_match[/^[0-9]{8}$/]');
			$this->form_validation->set_rules('E_NAME', 'Center Eng Name', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_NAME', 'Center Chi Name', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR1', 'Eng Addr', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('E_ADDR2', 'Eng Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR3', 'Eng Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR4', 'Eng Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR5', 'Eng Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR1', 'Chi Addr 1', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR2', 'Chi Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR3', 'Chi Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR4', 'Chi Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR5', 'Chi Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_DISTRICT', 'Eng District','trim|max_length[80]|required');
			$this->form_validation->set_rules('C_DISTRICT','Chi District','trim|max_length[80]');
			$this->form_validation->set_rules('FAX', 'Fax', 'trim|max_length[80]');
			$this->form_validation->set_rules('area', 'Area' ,'required');
			$center_code = $this->input->post('CENTER_ID');
		}
			$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		if ($this->form_validation->run()) {
			# code...
						//1. INSERT NEW CENTER 
			if ($hv_center == 0){
					$center_data = [
						'CENTER_CODE' => $center_code,
						'TEL' => $this->input->post('TEL'),
						'FAX' => $this->input->post('FAX'),
						'E_NAME' => $this->input->post('CENTER_E_NAME'),
						'C_NAME' => $this->input->post('CENTER_C_NAME'),
						'E_ADDR1' => $this->input->post('E_ADDR1'),
						'E_ADDR2' => $this->input->post('E_ADDR2'),
						'E_ADDR3' => $this->input->post('E_ADDR3'),
						'E_DISTRICT' => $this->input->post('E_DISTRICT'),
						'C_ADDR1' => $this->input->post('C_ADDR1'),
						'C_ADDR2' => $this->input->post('C_ADDR2'),
						'C_ADDR3' => $this->input->post('C_ADDR3'),
						'C_DISTRICT' => $this->input->post('C_DISTRICT'),
						'AREA' => $this->input->post('area'),
						'OPEN_AFTER_EIGHT' => implode(',', (array) $this->input->post('OPEN_AFTER_EIGHT')),
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];

					$this->db->insert("center", $center_data);
					$center_insert = $this->db->affected_rows();
					if ($center_insert>0) {
						$save_center = TRUE;
						# code...
					}else{
						$save_center = FALSE;
					}
			}else{
					$save_center = TRUE;

			}

			if ($save_center) {
				# code...
				 // 2. MAINTAIN THE DOCTOR CENTER RELATION TABLE
				  $doctor_center_data = [
						'DR_CODE' => $id,
						'CENTER_CODE' =>  $center_code,
					];

				 $check_doctor_center = $this->db->get_where('doctor_center',$doctor_center_data);
				 if ($check_doctor_center->num_rows() > 0) {
				 	$save_doctor_center = TRUE;

				 }else{
				 	 $this->db->insert('doctor_center',$doctor_center_data);	
				 	 $insert_doctor_center = $this->db->affected_rows();
				 	if ( $insert_doctor_center > 0) {
				 	  $save_doctor_center  = TRUE;
				 	}else{
				 		$save_doctor_center  = FALSE;
				 	}
			}

		  }

		if ($save_doctor_center) {
			# code...
			 $save_type = $this->input->post('save_type');
			if ($save_type == 'stay') {
				# code...
				$this->data['success'] = TRUE;
				$this->data['message'] = 'your data has been stored into the database successfully';
			}else{
				$this->data['success'] = TRUE;
			}
		}
         else{
     		  	$this->data['success'] = FALSE;
       	 	    $this->data['message'] = validation_errors();
       }

      }
       echo json_encode($this->data);
    }



	public function edit($id)
	{
		$this->is_allowed('doctor_update');

		$this->data['doctor'] = $this->model_doctor->find($id);

		// FIND DOCTOR TYPE
		 $doctor_type = array();

        $this->db->select('*');
        $this->db->where('DR_CODE',$id);
        $doctor = $this->db->get('doctor')->row();
        $type1 = $doctor->TYPE1;
        $type2 = $doctor->TYPE2;
        $type3 = $doctor->TYPE3;
        if ($type1!='') {
        	array_push($doctor_type,  $type1);
        }
        if ($type2!='') {
        	array_push($doctor_type,  $type2);
        }
        if ($type2!='') {
        	array_push($doctor_type,  $type3);
        }


		//CENTER
		//Find Center (For provide select option to view different center consultation)
		$this->db->where('DR_CODE',$id);
		$this->db->from('doctor_center');
		$this->db->join('center','doctor_center.CENTER_CODE = center.CENTER_CODE');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {

			$this->data['has_center'] = true;
			$this->data['doctor_center'] = $query->result();

			//Initialing Find first consultation hour
			$this->db->order_by("doctor_consult_hour.CENTER_CODE");
			$this->db->from('doctor_consult_hour');
			$this->db->join('center','doctor_consult_hour.CENTER_CODE = center.CENTER_CODE');
			$this->db->where("doctor_consult_hour.DR_CODE", $id);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0){
				$this->data['has_consult'] = true;
				$consult_hour =  $query->row();
				$this->data['doctor_consult_hour'] =$consult_hour;
				$first_center = $consult_hour->CENTER_CODE;

				//Find  FIRST payment 
				if ($first_center!=''){
						# code...
						$this->db->from('doctor_payment');
						$this->db->where("DR_CODE", $id);
						$this->db->where("CENTER_CODE", $first_center);
						$query = $this->db->get("");
						
					if ($query->num_rows() > 0){

						$this->data['has_payment'] = true;
						$this->data['first_payment'] = TRUE;
						$payment = $query->row();
						if ($payment->BANK_CLEARING_CODE !='') {
									$this->db->from('doctor_payment');
								    $this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
					                $this->db->where("DR_CODE", $id);
					                $this->data['first_auto_pay'] = TRUE;

					                $this->data['doctor_payment'] = $this->db->get()->row();
						}else{
									$this->data['first_auto_pay'] =FALSE;

					            	$this->data['doctor_payment'] = $payment;
						}
					}else{
						$this->data['first_payment'] = FALSE;
						$this->data['first_auto_pay'] =FALSE;

					 }
				}else{			
							$this->data['first_payment'] = FALSE;
							
							$this->db->from('doctor_payment');
							$this->db->where("DR_CODE", $id);
							$query = $this->db->get();
							if ($query->num_rows() > 0) {
								# code...
								$this->data['has_payment'] = true;
								$payment = $query->row();
								if ($payment->BANK_CLEARING_CODE !='') {
											$this->db->from('doctor_payment');
										    $this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
							                $this->db->where("DR_CODE", $id);
							                $this->data['auto_pay'] = TRUE;
							                $this->data['doctor_payment'] = $this->db->get()->row();
								}else{
											$this->data['auto_pay'] =FALSE;
							            	$this->data['doctor_payment'] = $payment;
								}
							}else{
								$this->data['has_payment'] = FALSE;
								$this->data['auto_pay'] =FALSE;
							}
				 }

			}else{
				$this->data['has_consult'] = false;
				$this->data['first_payment'] = FALSE;
							
				$this->db->from('doctor_payment');
				$this->db->where("DR_CODE", $id);
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
					# code...
					$this->data['has_payment'] = true;
					$payment = $query->row();
					if ($payment->BANK_CLEARING_CODE !='') {
								$this->db->from('doctor_payment');
							    $this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
				                $this->db->where("DR_CODE", $id);
				                $this->data['auto_pay'] = TRUE;
				                $this->data['doctor_payment'] = $this->db->get()->row();
					}else{
								$this->data['auto_pay'] =FALSE;
				            	$this->data['doctor_payment'] = $payment;
					}
				}else{
					$this->data['has_payment'] = FALSE;
					$this->data['auto_pay'] =FALSE;
				}

			}
			

		}else{
				$this->data['has_center'] = FALSE;
		}

			//Find Doctor Card (For provide select option to view different doctor partner card)
			$this->db->select(" * ");
			$this->db->where("DR_CODE", $id);
			$query6 = $this->db->get('doctor_card');
			 //Find doctor partner
			if ($query6->num_rows() > 0){
				$this->data['has_cards'] = true;  
			
				//Find partner card
				$this->db->select('doctor_card.COM_ID as d_COM_ID, CARD_CODE, TYPE1, TYPE2, TYPE3, LOC_CODE, CENTER_CODE, PARTNER_DR_CODE, DR_CODE, company.E_NAME as c_E_NAME,  TERM_DATE');
				$this->db->from('doctor_card');
				$this->db->join('company','doctor_card.COM_ID = company.COM_ID');
				$this->db->where('DR_CODE',$id);
				$this->db->order_by('doctor_card.COM_ID','ASC');
				$query =  $this->db->get("");
				if ($query->num_rows()>0) {

				   $doctor_card =$query->result();
				   $this->data['cards'] = $doctor_card;

				    //Find Special fee
				    if ($this->data['has_cards']){
	                    $this->db->select("doctor_card.COM_ID as d_COM_ID, doctor_card.CARD_CODE as d_CARD_CODE, agreed_fee.CLASS_CODE as c_CLASS_CODE, agreed_fee.TYPE as c_TYPE, agreed_fee.MED_DAYS as c_MED_DAYS, agreed_fee.CO_PAY as c_CO_PAY,agreed_fee.FEE as c_FEE, agreed_fee.PAY as c_PAY, doctor_special_fee.SPECIAL_FEE as SP_FEE, doctor_card.CENTER_CODE as c_CENTER_CODE, center.E_NAME as c_E_NAME, center.E_DISTRICT as c_E_DISTRICT,doctor_special_fee.REMARK as d_REMARK, doctor_special_fee.LAST_UPDATE as d_LAST_UPDATE");
				    	$this->db->from('doctor_card');
				    	$this->db->join('agreed_fee','doctor_card.CARD_CODE = agreed_fee.CARD_CODE','left');
				    	$this->db->join('doctor_special_fee','doctor_special_fee.CARD_CODE = agreed_fee.CARD_CODE and doctor_special_fee.CLASS_CODE = agreed_fee.CLASS_CODE and agreed_fee.TYPE = doctor_special_fee.TYPE','left');
				    	$this->db->join('center','doctor_card.CENTER_CODE = center.CENTER_CODE','left');
						$this->db->where("doctor_card.DR_CODE", $id);
						$this->db->where_in('agreed_fee.TYPE', $doctor_type);
						$this->db->order_by('doctor_card.COM_ID');
						$this->db->order_by('doctor_card.CARD_CODE');
						$query7 = $this->db->get('');
						if ($query7->num_rows() > 0){
							$this->data['has_special_fee'] = true;
							$this->data['doctor_special_fees'] = $query7->result();
							
						}else{
							$this->data['has_special_fee'] = false;
						}
					
					}else{
					    	$this->data['has_cards'] = false;
					    	$this->data['has_special_fee'] = FALSE;
					}

			   }

			}
			else{
			    $this->data['has_cards'] = false;
			    $this->data['has_special_fee'] = FALSE;
			}


		//Find first qualification 
		$this->db->where("DR_CODE", $id);
		$this->db->order_by("QUALIFICATION_CODE", "ASC");
		$query4 = $this->db->get("doctor_qualification");
		
		if ($query4->num_rows() > 0){
			$this->data['has_quali'] = true;
			$this->data['doctor_qualification'] = $query4->row();
		}else{
			$this->data['has_quali'] = false;
		}
		

		//Find Qualification (For provide select option to view different center qualification)
		$this->db->select("QUALIFICATION, CERT_YEAR");
		$this->db->where("DR_CODE", $id);
		$query5 = $this->db->get("doctor_qualification");
		
		if ($query5->num_rows() > 0){
			$this->data['has_quali2'] = true;
			$this->data['doctor_qualification2'] = $query5->result();
		}else{
			$this->data['has_quali2'] = false;
		}
		
		//Find Website login
		$this->db->select('*');
		$this->db->from('website_login');
		$this->db->join('company','website_login.COM_ID = company.COM_ID');
		$this->db->where("website_login.DR_CODE", $id);
		$query8 = $this->db->get();
		
		if ($query8->num_rows() > 0){
			$this->data['has_website'] = true;
			$this->data['website_login'] = $query8->result();
			
			
		}else{
			$this->data['has_website'] = false;
		}
		

		$this->template->title('Doctor Update');
		$this->render('backend/standart/administrator/doctor/doctor_update', $this->data);
	}

	/**
	* Update Doctors
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('doctor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		
		//Doctor validation
		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		$this->form_validation->set_rules('E_TITLE[]', 'English Title', 'trim|required');
		$this->form_validation->set_rules('C_TITLE[]', 'Chinese Title', 'trim|required');
		$this->form_validation->set_rules('E_NAME', 'English Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_NAME', 'Chinese Name', 'trim|max_length[80]');
		$this->form_validation->set_rules('GENDER', 'Gender', 'trim|required');
		$this->form_validation->set_rules('TYPE[]', 'Type', 'trim|required');
		$this->form_validation->set_rules('MOBILE', 'Mobile', 'trim|max_length[30]');
		$this->form_validation->set_rules('MOBILE', 'Mobile', 'trim|max_length[80]');
		$this->form_validation->set_rules('EMAIL', 'Email', 'trim|max_length[80]|valid_email');
		$this->form_validation->set_rules('LANG', 'Language', 'trim|max_length[80]');
		$this->form_validation->set_rules('HKID', 'HKID', 'trim|max_length[20]');
		$this->form_validation->set_rules('GP_REG_NO', 'GP Reg No', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		$this->form_validation->set_rules('SP_REG_NO', 'SP Reg No', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		
		
		
		//Payment validation
		// $payee_name = $this->input->post('PAYEE_NAME');
		// $payee_addr1 = $this->input->post('PAYEE_ADDR1');
		// $clearing_code = $this->input->post('BANK_CLEARING_CODE');
		// $bank_account = $this->input->post('ACCOUNT_NO');
		// $bank_account_holder = $this->input->post('ACCOUNT_HOLDER');
		
		

		//CARD validation


		// $update_payment = TRUE;
		// if ($payee_name == "" && $payee_addr1 != ""){
		//    $this->form_validation->set_rules('PAYEE_NAME', 'Payee Name', 'required');	
		// }elseif ( $clearing_code == "" && $bank_account!='') {
  //          $this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'required');
		// }elseif ($payee_name != "" && $clearing_code == "") {
		// 	$this->form_validation->set_rules('PAYEE_NAME','Payee Name','trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
		//     $this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');
		// }elseif ($clearing_code != "" && $payee_name =="") {
		// 	$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
		// 	$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');
		// }elseif ($payee_name != "" && $clearing_code != "") {
		// 	$this->form_validation->set_rules('PAYEE_NAME','Payee Name','trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
		//     $this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|max_length[80]');
		// 	$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
		// 	$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');

		// }else{
		// 	$update_payment = FALSE;
		// }

		// QUALIFICATION VALIDATION
		$this->form_validation->set_rules('QUALIFICATION', 'Qualification', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('CERT_YEAR', 'Cert Year', 'trim|required|max_length[12]|regex_match[/^[0-9\-]+$/]');
		$this->form_validation->set_rules('doctor_qualification_CERT_COPY_name', 'CERT COPY', 'trim');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		$dr_code = $this->input->post('DR_CODE');
		
		$sp_code = [$this->input->post('SP_CODE1'), $this->input->post('SP_CODE2'), $this->input->post('SP_CODE3'), $this->input->post('SP_CODE4')];
		$term_date = $this->input->post('TERM_DATE');
		
		if ($term_date != ""){
			if ($term_date > date('Y-m-d H:i:s')){
				$status = "Active";
			}else{
				$status = "Terminate";
			}
		}else{
			$status = "Active";
		}
		
		$med_p1 = ($this->input->post('MEDICAL_PROCEDURES1') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES1')));
		$med_p2 = ($this->input->post('MEDICAL_PROCEDURES2') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES2')));
		$med_p3 = ($this->input->post('MEDICAL_PROCEDURES3') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES3')));
		$med_p4 = ($this->input->post('MEDICAL_PROCEDURES4') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES4')));
		
		$medical_p = ($med_p1 == "" ? "" : $med_p1 . ", ") . ($med_p2 == "" ? "" : $med_p2 . ", ") . ($med_p3 == "" ? "" : $med_p3 . ", ") . ($med_p4 == "" ? "" : $med_p4);

		
		if ($this->form_validation->run()) {

		
			$save_data = [
				'DR_CODE' => $dr_code,
				'E_TITLE' => implode(',', (array) $this->input->post('E_TITLE')),
				'C_TITLE' => implode(',', (array) $this->input->post('C_TITLE')),
				'E_NAME' => $this->input->post('E_NAME'),
				'C_NAME' => $this->input->post('C_NAME'),
				'GENDER' => $this->input->post('GENDER'),
				'TYPE1' => $this->input->post('TYPE[0]') == null ? "" : $this->input->post('TYPE[0]'),
				'TYPE2' => $this->input->post('TYPE[1]') == null ? "" : $this->input->post('TYPE[1]'),
				'TYPE3' => $this->input->post('TYPE[2]') == null ? "" : $this->input->post('TYPE[2]'),
				'MOBILE' => $this->input->post('MOBILE'),
				'PAGER' => $this->input->post('PAGER'),
				'EMAIL' => $this->input->post('EMAIL'),
				'LANG' => $this->input->post('LANG'),
				'DOB' => $this->input->post('DOB'),
				'HKID' => $this->input->post('HKID'),
				'MPS_EXPIRY_DATE' => $this->input->post('MPS_EXPIRY_DATE'),
				'APS_EXPIRY_DATE' => $this->input->post('APS_EXPIRY_DATE'),
				'BR_EXPIRY_DATE' => $this->input->post('BR_EXPIRY_DATE'),
				'GP_REG_NO' => $this->input->post('GP_REG_NO'),
				'SP_REG_NO' => $this->input->post('SP_REG_NO'),
				'SP_CODE1' => $sp_code[0] == null ? "" : $sp_code[0],
				'SP_CODE2' => $sp_code[1] == null ? "" : $sp_code[1],
				'SP_CODE3' => $sp_code[2] == null ? "" : $sp_code[2],
				'SP_CODE4' => $sp_code[3] == null ? "" : $sp_code[3],
				'ADMISSION_RIGHT' => implode(', ', (array) $this->input->post('ADMISSION_RIGHT')),
				'MEDICAL_PROCEDURES' => ($medical_p == "" ? "" : substr($medical_p, 0, -2)),
				'JOIN_DATE' => $this->input->post('JOIN_DATE'),
				'TERM_DATE' => $term_date,
				'STATUS' => $status,
				'REMARK' => $this->input->post('REMARK'),
			];

			$this->db->where('DR_CODE', $dr_code);
			$this->db->update('doctor', $save_data);
			$save_doctor = $this->db->affected_rows();
			
			if ($save_doctor > 0){
				$save_data12 = [
					'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				];
				
				$this->db->where('DR_CODE', $dr_code);
				$this->db->update('doctor', $save_data12);
			}		

		// 	//Payment method details
		// 	if ($update_payment) {

		// 		//Check if the doctor never input payment method details
		// 		$this->db->where("DR_CODE", $dr_code);
		// 		$query = $this->db->get('doctor_payment');
				
		// 		if ($query->num_rows() > 0){
		// 			$save_data2 = [
		// 			'PAYEE_NAME' => $payee_name,
		// 			'PAYEE_ADDR1' => $this->input->post('PAYEE_ADDR1'),
		// 			'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
		// 			'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
		// 			'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
		// 			'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
		// 			'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),
		// 			'BANK_CLEARING_CODE' => $clearing_code,
		// 			'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
		// 			'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER'),
		// 	    	];
				
		// 			$this->db->where('DR_CODE', $dr_code);
		// 			$this->db->update('doctor_payment', $save_data2);
		// 			$save_payment = $this->db->affected_rows();
					
		// 			if ($save_payment > 0){
		// 				$save_data22 = [
		// 					'LAST_MODIFIER' => $user,
		// 					'LAST_UPDATE' => date('Y-m-d H:i:s'),
		// 				];
						
		// 				$this->db->where('DR_CODE', $dr_code);
		// 				$this->db->update('doctor_payment', $save_data22);
		// 			}
		// 		}else{
		// 		    $save_data3 = [
		// 		    	'DR_CODE' => $dr_code,
		// 		    	// 'CENTER_CODE' =>$center_code,
		// 				'PAYEE_NAME' => $payee_name,
		// 				'PAYEE_ADDR1' => $this->input->post('PAYEE_ADDR1'),
		// 				'PAYEE_ADDR2' => $this->input->post('PAYEE_ADDR2'),
		// 				'PAYEE_ADDR3' => $this->input->post('PAYEE_ADDR3'),
		// 				'PAYEE_ADDR4' => $this->input->post('PAYEE_ADDR4'),
		// 				'PAYEE_ADDR5' => $this->input->post('PAYEE_ADDR5'),
		// 				'PAYEE_DISTRICT' => $this->input->post('PAYEE_DISTRICT'),

		// 				'BANK_CLEARING_CODE' => $clearing_code,
		// 				'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
		// 				'ACCOUNT_HOLDER' => $this->input->post('ACCOUNT_HOLDER'),

		// 				'CREATOR' => $user,
		// 				'CREATE_DATE' => date('Y-m-d H:i:s'),
		// 				'LAST_UPDATE' => date('Y-m-d H:i:s'),
		// 				'LAST_MODIFIER' => $user
		// 			];

		// 			$this->db->insert("doctor_payment", $save_data3);
					
		// 			$save_payment = $this->db->affected_rows();
		// 		}

		// }else{
		// 	 $save_payment = 0;
		// }

			// Update Doctor qualification
			$doctor_qualification_id = $this->input->post('QUALIFICATION_CODE');
			$doctor_qualification_CERT_COPY_uuid = $this->input->post('doctor_qualification_CERT_COPY_uuid');
			$doctor_qualification_CERT_COPY_name = $this->input->post('doctor_qualification_CERT_COPY_name');

			if (!is_dir(FCPATH . '/uploads/doctor_qualification/')) {
				mkdir(FCPATH . '/uploads/doctor_qualification/');
			}

			if (!empty($doctor_qualification_CERT_COPY_uuid)) {


				$save_data = [
					'QUALIFICATION' => $this->input->post('QUALIFICATION'),
					'CERT_YEAR' => $this->input->post('CERT_YEAR'),
				];


				$doctor_qualification_CERT_COPY_name_copy = $dr_code . '-' . $doctor_qualification_CERT_COPY_name;

				rename(FCPATH . 'uploads/tmp/' . $doctor_qualification_CERT_COPY_uuid . '/' . $doctor_qualification_CERT_COPY_name, 
						FCPATH . 'uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy);

				if (!is_file(FCPATH . '/uploads/doctor_qualification/' . $doctor_qualification_CERT_COPY_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['CERT_COPY'] = $doctor_qualification_CERT_COPY_name_copy;

				$this->db->where('QUALIFICATION_CODE', $doctor_qualification_id);
				$this->db->update('doctor_qualification',$save_data);
				if ($this->db->affected_rows() > 0 ) {

					$save_doctor_qualification = TRUE;
				}else{
					$save_doctor_qualification = FALSE;
				}
				
				if ($save_doctor_qualification){
			    	$save_data12 = [
			  		'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => date('Y-m-d H:i:s'),
				   ];
				
				$this->db->where('QUALIFICATION_CODE',  $doctor_qualification_id);
				$this->db->update('doctor_qualification', $save_data12);
				}
			}else{
					$save_doctor_qualification = FALSE;
			}




			
		 // 6. INSERT DOCTOR CARD 
			$com_id = $this->input->post('COM_ID');
			$card_codes = $this->input->post('CARD_CODE');
			$center_code = $this->input->post('CENTER_CODE');
			$company_dr_code = $this->input->post('PARTNER_DR_CODE');
			$loc_code = $this->input->post('LOC_CODE');
			$doctor_term = $this->input->post('D_TERM_DATE');

		    $save_card = 0;
		    if ($card_codes !='') {
		    	# code...
		     	if (strlen(implode($card_codes))!=0) {
			    for($i = 0; $i < count($card_codes); $i++) {
			
				 //    $TYPE = $this->input->post('DOCTOR_TYPE-'.$i.'[]');
					// $type1 = (array_key_exists(0,  $TYPE))?$TYPE[0]:'';
					// $type2 = (array_key_exists(1,  $TYPE))?$TYPE[1]:'';
					// $type3 = (array_key_exists(2,  $TYPE))?$TYPE[2]:'';

					 $save_doctor_card =[
					 	'CENTER_CODE' => $center_code[$i],
					 	'PARTNER_DR_CODE' =>  $company_dr_code[$i],
					 	'LOC_CODE' => $loc_code[$i],
					 	'TERM_DATE' => $doctor_term[$i],
					 	// 'TYPE1' => $type1,
					 	// 'TYPE2' => $type2,
					 	// 'TYPE3' => $type3,

						];
						$this->db->where('DR_CODE', $dr_code);
						$this->db->where('COM_ID',$com_id[$i]);
						$this->db->where('CARD_CODE',$card_codes[$i]);
			            $this->db->update('doctor_card', $save_doctor_card);
					    
					    if ($this->db->affected_rows() > 0) {

							$save_doctor_card2 = [
							 	'LAST_UPDATE' => date('Y-m-d'),
							 	'LAST_MODIFIER' => $user
							 ];
							$this->db->where('DR_CODE',' $dr_code');
						 	$this->db->where('COM_ID',$com_id[$i]);
							$this->db->where('CARD_CODE',$card_codes[$i]);
			           	    $this->db->update('doctor_card', $save_doctor_card2);

			           	    $save_card ++ ;
					    }
				}
				
			  }
		    }// end of save cards



			if ($save_doctor ||  $save_card  || $save_doctor_qualification) {
				if (1) {
					$this->data['success'] = true;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor', ' Go back to list');
				} else{
					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/doctor');
				}
			} else {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
			}			
	 }else{
	  	$this->data['success'] = false;
	  	$this->data['message'] = validation_errors();
	}
		
		echo json_encode($this->data);
}

	
	/**
	* delete Doctors
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('doctor_delete');

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
            set_message('Doctor has been deleted.', 'success');
		} else {
            set_message('Error delete doctor.', 'error');
		}

		redirect('administrator/doctor');
	}

		/**
	* View view Doctors
	*
	* @var $id String
	*/
	 
	public function find_company_card(){
		$com_id = $this->input->get('com_id');
	   if ($com_id!="" ) {
	   		if ($com_id!="0") {
	   			# code...
		   	    $this->db->from('company');
				$this->db->join('card','company.COM_ID = card.COM_ID');
				$this->db->where('company.COM_ID',$com_id);
				$query = $this->db->get();
				if ($query->num_rows()>0) {
				   $result = $query->result();
				}else{
				  $result ='';
				}
	   		}else{
	   			 $this->db->from('card');
				$this->db->where('COM_ID',0);
				$query = $this->db->get();
				if ($query->num_rows()>0) {
				   $result = $query->result();
				}else{
				  $result ='';
				}
	   		}

	   }else{
	   	      $this->db->select('*');
	   		  $result = $this->db->get('card')->result();
	   }

		$this->data['cards']  = $result;

		echo json_encode($this->data);
	}

	public function add_center_id(){
		$this->db->select_max('CENTER_CODE');

		$this->data['max_center'] = $this->db->get('center')->row();
		echo json_encode($this->data);
	}

   public function view_consult(){

     	$dr_code = $this->input->get("dr_code");
		$center_code = $this->input->get("center_code");
		$where = array(
			'DR_CODE' => $dr_code,
			'CENTER_CODE' =>$center_code,
		);
	    if (isset($center_code)) {
			$query = $this->db->get_where('doctor_consult_hour', $where);

			if ($query->num_rows()>0) {
				$this->data['has_center_consult'] = TRUE;
				$this->data['specific_consult'] = $query->row();
			}else{
				$this->data['has_center_consult'] = FALSE;
			}

			$this->db->where("CENTER_CODE", $center_code);
			$this->data['center_details'] = $this->db->get("center")->row();
			

		}else{
			$this->db->where("DR_CODE", $dr_code);
			$this->data['specific_consult'] = $this->db->get("doctor_consult_hour")->row();
		}

		  echo json_encode($this->data);


   }

	public function view_pay(){
		$dr_code = $this->input->get("dr_code");
		$center_code = $this->input->get("center_code");
		
		$where = array(
			'DR_CODE' => $dr_code,
			'CENTER_CODE' =>$center_code,
		);


		if (isset($center_code)) {

			$query = $this->db->get_where('doctor_payment',$where);
			if ($query->num_rows()>0) {
				$this->data['has_center_pay'] = TRUE;
				
				$payment = $query->row();
				if ($payment->BANK_CLEARING_CODE!='') {
					$this->data['auto_pay'] = TRUE;
					$this->db->select('*');
					$this->db->from('doctor_payment');
					$this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
					$this->db->where($where);
					$this->data['specific_payment'] = $this->db->get()->row();

				}else{
					$this->data['auto_pay'] = FALSE;
					$this->data['specific_payment'] = $payment;
				}
				
			} else{
				$this->data['has_center_pay'] = FALSE;
			}

		}else{

		    
		    $this->db->where("DR_CODE", $dr_code);
			$this->data['specific_payment'] = $this->db->get("doctor_payment")->row();

		}

		  echo json_encode($this->data);


		
	}
	
	public function view_quali(){
		$dr_code = $this->input->get("dr_code");
		$quali = $this->input->get("quali");
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("QUALIFICATION", $quali);
		$this->db->order_by("QUALIFICATION_CODE", "DESC");
		$this->data['specific_quali'] = $this->db->get("doctor_qualification")->row();
		
		echo json_encode($this->data);
		
	}
	
	public function view_partner(){
		$dr_code = $this->input->get("dr_code");
		$CARD_CODE = $this->input->get("CARD_CODE");
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->order_by("CREATE_DATE", "DESC");
		$this->data['partner_doctor'] = $this->db->get("partner_doctor")->row();
		
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->order_by("STATUS", "ASC");
		$this->db->order_by("CLASS_DESC", "ASC");
		
		$partner_card = $this->db->get("partner_card")->result();
		
		$this->data['specific_partner_card'] = $partner_card;
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->where("CLASS_CODE", $partner_card[0]->CLASS_CODE);
		
		$query = $this->db->get("doctor_special_fee");
		
		if ($query->num_rows() > 0){
			$this->data['has_sp_fee'] = true;
			$this->data['special_fee'] = $query->result();
			
			$this->db->where("CARD_CODE", $CARD_CODE);
			$this->db->where("CLASS_CODE", $partner_card[0]->CLASS_CODE);
			$this->data['agreed_fee'] = $this->db->get("agreed_fee")->result();
			
		}else{
			$this->data['has_sp_fee'] = false;
		}
		
		echo json_encode($this->data);
		
	}

	public function view_card(){
		$dr_code = $this->input->get("dr_code");
		$CARD_CODE = $this->input->get("CARD_CODE");
		$card_no = $this->input->get("card_no");
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->where("CLASS_CODE", $card_no);
		
		$query = $this->db->get("doctor_special_fee");
		
		if ($query->num_rows() > 0){
			$this->data['has_sp_fee'] = true;
			$this->data['special_fee'] = $query->result();
			
			$this->db->where("CARD_CODE", $CARD_CODE);
			$this->db->where("CLASS_CODE", $card_no);
			$this->data['agreed_fee'] = $this->db->get("agreed_fee")->result();
		}else{
			$this->data['has_sp_fee'] = false;
		}
		
		echo json_encode($this->data);
	}
	
	public function view_website(){
		$dr_code = $this->input->get("dr_code");
		$CARD_CODE = $this->input->get("CARD_CODE");
		
		$this->db->where("DR_CODE", $dr_code);
		$this->db->where("CARD_CODE", $CARD_CODE);
		$this->db->order_by("AUTO_NO", "DESC");
		$this->data['specific_website'] = $this->db->get("website_login")->row();
		
		echo json_encode($this->data);
		
	}
	

   //INITIAL Doctor  VALUE
	public function view($id)
	{
		$this->is_allowed('doctor_view');

		// FIND DOCTOR TYPE
		 $doctor_type = array();

        $this->db->select('*');
        $this->db->where('DR_CODE',$id);
        $doctor = $this->db->get('doctor')->row();
        $type1 = $doctor->TYPE1;
        $type2 = $doctor->TYPE2;
        $type3 = $doctor->TYPE3;
        if ($type1!='') {
        	array_push($doctor_type,  $type1);
        }
        if ($type2!='') {
        	array_push($doctor_type,  $type2);
        }
        if ($type2!='') {
        	array_push($doctor_type,  $type3);
        }

		//Find doctor details: ADMISSON RIGHT AND MEDICAL PROCEDURES
		$doctor = $this->model_doctor->find($id);
		$this->data['doctor'] = $doctor;
		
		//Find if user has admission right
		if ($doctor->ADMISSION_RIGHT != ""){
			$this->data['has_admission'] = true;
		}else{
			$this->data['has_admission'] = false;
		}
		
		//Find if user has medical procedures
		if ($doctor->MEDICAL_PROCEDURES != ""){
			$this->data['has_procedures'] = true;
		}else{
			$this->data['has_procedures'] = false;
		}
		
		

		//Find Center (For provide select option to view different center consultation)
		$this->db->where('DR_CODE',$id);
		$this->db->from('doctor_center');
		$this->db->join('center','doctor_center.CENTER_CODE = center.CENTER_CODE');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$this->data['has_center'] = true;
			$this->data['doctor_center'] = $query->result();
	
				//Initialing Find first consultation hour
				$this->db->from('doctor_consult_hour');
				$this->db->join('center','doctor_consult_hour.CENTER_CODE = center.CENTER_CODE');
				$this->db->where("doctor_consult_hour.DR_CODE", $id);
				$query = $this->db->get();
				
				if ($query->num_rows() > 0){
					$this->data['has_consult'] = true;
					$consult_hour =  $query->row();
					$this->data['doctor_consult_hour'] =$consult_hour;
					$first_center = $consult_hour->CENTER_CODE;



				}else{
					$this->data['has_consult'] = false;
					$first_center ='';
				}
				
				//Initialing Find  FIRST payment according to first counsult hour center
				if ($first_center !='') {
					# code...
					$this->db->from('doctor_payment');
					$this->db->where("DR_CODE", $id);
					$this->db->where("CENTER_CODE", $first_center);
					$query = $this->db->get("");
					
					if ($query->num_rows() > 0){

						$this->data['has_payment'] = true;
						$payment = $query->row();
						if ($payment->BANK_CLEARING_CODE !='') {
									$this->db->from('doctor_payment');
								    $this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
					                $this->db->where("DR_CODE", $id);
					                $this->data['auto_pay'] = TRUE;
					                $this->data['doctor_payment'] = $this->db->get()->row();
						}else{
									$this->data['auto_pay'] =FALSE;
					            	$this->data['doctor_payment'] = $payment;
						}
					}else{
						$this->data['has_payment'] = FALSE;
						$this->data['auto_pay'] =FALSE;
					}
				}else{
					$this->db->from('doctor_payment');
					$this->db->where("DR_CODE", $id);
					$query = $this->db->get();
					if ($query->num_rows() > 0) {
						# code...
						$this->data['has_payment'] = true;
						$payment = $query->row();
						if ($payment->BANK_CLEARING_CODE !='') {
									$this->db->from('doctor_payment');
								    $this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
					                $this->db->where("DR_CODE", $id);
					                $this->data['auto_pay'] = TRUE;
					                $this->data['doctor_payment'] = $this->db->get()->row();
						}else{
									$this->data['auto_pay'] =FALSE;
					            	$this->data['doctor_payment'] = $payment;
						}
					}else{
						$this->data['has_payment'] = FALSE;
						$this->data['auto_pay'] =FALSE;
					}
				}

				

				//-----------FIND ALL CARDS------------------

				
				//Find Doctor Partner (For provide select option to view different doctor partner card)
				$this->db->select(" * ");
				$this->db->where("DR_CODE", $id);
				// $this->db->order_by("CARD_CODE", "ASC");
				// $this->db->group_by("CARD_CODE");
				
				$query6 = $this->db->get('doctor_card');
				 //Find doctor partner
				if ($query6->num_rows() > 0){
					$this->data['has_cards'] = true;  
					$doctor_card= $query6->result();
					$this->data['cards'] = $doctor_card;
				
					//Find partner card
					$this->db->select('*');
					$this->db->from('doctor_card');
					$this->db->where('DR_CODE',$id);
					$this->db->order_by('COM_ID','ASC');
					$query =  $this->db->get("");
					if ($query->num_rows()>0) {
					   $this->data['has_cards'] = TRUE;
					   $partner_card =$query->result();

					    //Find Special fee
					    if ($this->data['has_cards']){
		                    $this->db->select("doctor_card.COM_ID as d_COM_ID, doctor_card.CARD_CODE as d_CARD_CODE, agreed_fee.CLASS_CODE as c_CLASS_CODE, agreed_fee.TYPE as c_TYPE, agreed_fee.MED_DAYS as c_MED_DAYS, agreed_fee.CO_PAY as c_CO_PAY,agreed_fee.FEE as c_FEE, agreed_fee.PAY as c_PAY, doctor_special_fee.SPECIAL_FEE as SP_FEE, doctor_card.CENTER_CODE as c_CENTER_CODE, center.E_NAME as c_E_NAME, center.E_DISTRICT as c_E_DISTRICT,doctor_special_fee.REMARK as d_REMARK, doctor_special_fee.LAST_UPDATE as d_LAST_UPDATE");
					    	$this->db->from('doctor_card');
					    	$this->db->join('agreed_fee','doctor_card.CARD_CODE = agreed_fee.CARD_CODE','left');
					    	$this->db->join('doctor_special_fee','doctor_special_fee.CARD_CODE = agreed_fee.CARD_CODE and doctor_special_fee.CLASS_CODE = agreed_fee.CLASS_CODE and agreed_fee.TYPE = doctor_special_fee.TYPE','left');
					    	$this->db->join('center','doctor_card.CENTER_CODE = center.CENTER_CODE','left');
							$this->db->where("doctor_card.DR_CODE", $id);
							$this->db->where_in('agreed_fee.TYPE', $doctor_type);
							$this->db->order_by('doctor_card.COM_ID');
							$this->db->order_by('doctor_card.CARD_CODE');
							$query7 = $this->db->get('');
							if ($query7->num_rows() > 0){
								$this->data['has_special_fee'] = true;
								$this->data['doctor_special_fees'] = $query7->result();
								
							}else{
								$this->data['has_special_fee'] = false;
							}
						
						}else{
						    	$this->data['has_cards'] = false;
						    	$this->data['has_special_fee'] = FALSE;
						}

				   }else{
					   	$this->data['has_cards'] = FALSE;
					   	$this->data['has_special_fee'] = FALSE;

					    }

				}
				else{
				    $this->data['has_cards'] = false;
				    $this->data['has_special_fee'] = FALSE;
				}


		}else{
			$this->data['has_center'] = false;
		}



		//Find first qualification 
		$this->db->where("DR_CODE", $id);
		$this->db->order_by("QUALIFICATION_CODE", "ASC");
		$query4 = $this->db->get("doctor_qualification");
		
		if ($query4->num_rows() > 0){
			$this->data['has_quali'] = true;
			$this->data['doctor_qualification'] = $query4->row();
		}else{
			$this->data['has_quali'] = false;
		}
		
		//Find Qualification (For provide select option to view different center qualification)
		$this->db->select("QUALIFICATION, CERT_YEAR");
		$this->db->where("DR_CODE", $id);
		$query5 = $this->db->get("doctor_qualification");
		
		if ($query5->num_rows() > 0){
			$this->data['has_quali2'] = true;
			$this->data['doctor_qualification2'] = $query5->result();
		}else{
			$this->data['has_quali2'] = false;
		}
		
		//Find Website login
		$this->db->select('*');
		$this->db->from('website_login');
		$this->db->join('company','website_login.COM_ID = company.COM_ID');
		$this->db->where("website_login.DR_CODE", $id);

		$query8 = $this->db->get();
		
		if ($query8->num_rows() > 0){
			$this->data['has_website'] = true;
			$this->data['website_login'] = $query8->result();
			
			
		}else{
			$this->data['has_website'] = false;
		}
		
		
		$this->template->title('Doctor Detail');
		$this->render('backend/standart/administrator/doctor/doctor_view', $this->data);
	}
	
	/**
	* delete Doctors
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$doctor = $this->model_doctor->find($id);

		
		
		return $this->model_doctor->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('doctor_export');

		$this->model_doctor->export('doctor', 'doctor');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('doctor_export');

		$this->model_doctor->pdf('doctor', 'doctor');
	}
}


/* End of file doctor.php */
/* Location: ./application/controllers/administrator/Doctor.php */