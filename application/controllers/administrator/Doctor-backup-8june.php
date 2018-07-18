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
	public function index($offset = 0)
	{
		$this->is_allowed('doctor_list');
		
		$field 	= "";
		
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
		$this->form_validation->set_rules('DR_CODE', 'Dr Code', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]|is_unique[doctor.DR_CODE]');
		$this->form_validation->set_rules('E_NAME', 'English Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_NAME', 'Chinese Name', 'trim|max_length[80]');
		$this->form_validation->set_rules('GENDER', 'Gender', 'trim|required');
		$this->form_validation->set_rules('TYPE[]', 'Type', 'trim|required');
		$this->form_validation->set_rules('MOBILE', 'Mobile', 'trim|max_length[30]');
		$this->form_validation->set_rules('PAGER', 'Pager', 'trim|max_length[80]');
		$this->form_validation->set_rules('EMAIL', 'Email', 'trim|max_length[80]|valid_email');
		$this->form_validation->set_rules('LANG', 'Language', 'trim|max_length[80]');
		$this->form_validation->set_rules('HKID', 'HKID', 'trim|max_length[20]');
		$this->form_validation->set_rules('GP_REG_NO', 'GP Reg No', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		$this->form_validation->set_rules('SP_REG_NO', 'SP Reg No', 'trim|required|max_length[20]|regex_match[/^[a-zA-Z0-9\-\_]+$/]');
		
		

		
		$hv_center = $this->input->post("HV_CENTER");
		
		$insert_consult = $this->input->post('INSERT_CONSULT[0]');
		
		if ($insert_consult > 0){
			
			if ($hv_center > 0){
				$this->form_validation->set_rules('CENTER_CODE_SELECT', 'Center Code', 'trim|required');
				$center_code = $this->input->post('CENTER_CODE_SELECT');

			}else{
				$this->form_validation->set_rules('TEL', 'Center Tel', 'trim|required|is_unique[center.TEL]|max_length[80]');
				$this->db->select_max('CENTER_CODE');
				$center_code_q = $this->db->get('center')->row();
                $center_code = $center_code_q->CENTER_CODE + 1;

				$district_autono = $this->input->post('DISTRICT');
				
				if ($district_autono != ""){
					$this->db->where("AUTO_NO", $district_autono);
					$district = $this->db->get("hk_district")->row();
					
					$e_district = $district->ENG_DISTRICT;
					$c_district = $district->CHI_DISTRICT;
					$area = $district->REGION;
				}else{
					$e_district = "";
					$c_district = "";
					$area = $this->input->post('AREA');
				}
			}
			
			
			//Center validation
			$this->form_validation->set_rules('E_NAME', 'Center Eng Name', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_NAME', 'Center Chi Name', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR1', 'Eng Addr 1', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR2', 'Eng Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR3', 'Eng Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR4', 'Eng Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('E_ADDR5', 'Eng Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR1', 'Chi Addr 1', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR2', 'Chi Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR3', 'Chi Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR4', 'Chi Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('C_ADDR5', 'Chi Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('FAX', 'Fax', 'trim|max_length[80]');
			
			
			//Consult validation
			$this->form_validation->set_rules('CONTACT_PERSON', 'Contact Person', 'trim|max_length[80]');
			$this->form_validation->set_rules('SCHEDULE_DAY_C1[]', 'Opening hours 1', 'trim|required');
			$this->form_validation->set_rules('TIMESLOT1_1', 'Opening hours 1: Timeslot 1', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT1_2', 'Opening hours 1: Timeslot 2', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT1_3', 'Opening hours 1: Timeslot 3', 'trim|max_length[45]');
			
			$this->form_validation->set_rules('TIMESLOT2_1', 'Opening hours 2: Timeslot 1', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT2_2', 'Opening hours 2: Timeslot 2', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT2_3', 'Opening hours 2: Timeslot 3', 'trim|max_length[45]');
			
			$this->form_validation->set_rules('TIMESLOT3_1', 'Opening hours 3: Timeslot 1', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT3_2', 'Opening hours 3: Timeslot 2', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT3_3', 'Opening hours 3: Timeslot 3', 'trim|max_length[45]');
			
			$this->form_validation->set_rules('TIMESLOT4_1', 'Opening hours 4: Timeslot 1', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT4_2', 'Opening hours 4: Timeslot 2', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT4_3', 'Opening hours 4: Timeslot 3', 'trim|max_length[45]');
			
			$this->form_validation->set_rules('TIMESLOT5_1', 'Opening hours 5: Timeslot 1', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT5_2', 'Opening hours 5: Timeslot 2', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT5_3', 'Opening hours 5: Timeslot 3', 'trim|max_length[45]');
			
			$this->form_validation->set_rules('TIMESLOT6_1', 'Opening hours 6: Timeslot 1', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT6_2', 'Opening hours 6: Timeslot 2', 'trim|max_length[45]');
			$this->form_validation->set_rules('TIMESLOT6_3', 'Opening hours 6: Timeslot 3', 'trim|max_length[45]');


			//Payment validation
			$payee_name = $this->input->post('PAYEE_NAME');
			$payee_addr1 = $this->input->post('PAYEE_ADDR1');
			$clearing_code = $this->input->post('BANK_CLEARING_CODE');
			$account_no = $this->input->post('ACCOUNT_NO');
			
			$save_payment = 1;
			
			if ($payee_name != "" || $payee_addr1 != ""){
				$this->form_validation->set_rules('PAYEE_NAME', 'Payee Name', 'trim|required|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
				$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');
				
				$save_payment = 0;
			}
			
			if ($clearing_code != "" || $account_no != ""){
				$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|required|max_length[4]');
				$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
				$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');
				
				$save_payment = 0;
			}
			
		}
		
		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		$dr_code = $this->input->post('DR_CODE');
		
		$sp_code = [$this->input->post('SP_CODE1'), $this->input->post('SP_CODE2'), $this->input->post('SP_CODE3'), $this->input->post('SP_CODE4')];
		
		$med_p1 = ($this->input->post('MEDICAL_PROCEDURES1') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES1')));
		$med_p2 = ($this->input->post('MEDICAL_PROCEDURES2') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES2')));
		$med_p3 = ($this->input->post('MEDICAL_PROCEDURES3') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES3')));
		$med_p4 = ($this->input->post('MEDICAL_PROCEDURES4') == NULL ? "" : implode(', ', (array) $this->input->post('MEDICAL_PROCEDURES4')));
		
		$medical_p = ($med_p1 == "" ? "" : $med_p1 . ", ") . ($med_p2 == "" ? "" : $med_p2 . ", ") . ($med_p3 == "" ? "" : $med_p3 . ", ") . ($med_p4 == "" ? "" : $med_p4);
		
		if ($this->form_validation->run()) {
			
			// if ($insert_consult > 0){
			// 	if ($center_code == "OWN-"){
			// 		$this->data['success'] = false;
			// 		$this->data['message'] = "Center Code not change";
			// 	}
			// }
			
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
				'TERM_DATE' => "",
				'STATUS' => "Active",
				'REMARK' => $this->input->post('REMARK'),
				'CREATOR' => $user,
				'CREATE_DATE' => date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => date('Y-m-d H:i:s'),
			];

			
			$this->db->insert("doctor", $save_data);
			$save_doctor = $this->db->affected_rows();
			
			if ($save_doctor > 0 && $save_payment == 0){
				$save_data = [
					'DR_CODE' => $dr_code,
					'CENTER_CODE' => $center_code,
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

				$this->db->insert("doctor_payment", $save_data);
				$save_payment = $this->db->affected_rows();
			}
			
			if ($insert_consult > 0){
				
				if ($hv_center == 0){
					$save_data = [
						'CENTER_CODE' => $center_code,
						'E_NAME' => $this->input->post('CENTER_E_NAME'),
						'C_NAME' => $this->input->post('CENTER_C_NAME'),
						'E_ADDR1' => $this->input->post('E_ADDR1'),
						'E_ADDR2' => $this->input->post('E_ADDR2'),
						'E_ADDR3' => $this->input->post('E_ADDR3'),
						'E_ADDR4' => $this->input->post('E_ADDR4'),
						'E_ADDR5' => $this->input->post('E_ADDR5'),
						'E_DISTRICT' => $e_district,
						'C_ADDR1' => $this->input->post('C_ADDR1'),
						'C_ADDR2' => $this->input->post('C_ADDR2'),
						'C_ADDR3' => $this->input->post('C_ADDR3'),
						'C_ADDR4' => $this->input->post('C_ADDR4'),
						'C_ADDR5' => $this->input->post('C_ADDR5'),
						'C_DISTRICT' => $c_district,
						'AREA' => $area,
						'TEL' => $this->input->post('TEL'),
						'FAX' => $this->input->post('FAX'),
						'OPEN_AFTER_EIGHT' => implode(',', (array) $this->input->post('OPEN_AFTER_EIGHT')),
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];

					$this->db->insert("center", $save_data);
					$save_center = $this->db->affected_rows();
					
				}else{
					$save_center = 1;
				}
				
				if ($save_center && $save_doctor){
					$save_data = [
						'DR_CODE' => $dr_code,
						'CENTER_CODE' => $center_code,
						'CONTACT_PERSON' => $this->input->post('CONTACT_PERSON'),
						'SCHEDULE_DAY_C1' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C1')),
						'SCHEDULE_DAY_E1' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E1')),
						'TIMESLOT1_1' => $this->input->post('TIMESLOT1_1'),
						'TIMESLOT1_2' => $this->input->post('TIMESLOT1_2'),
						'TIMESLOT1_3' => $this->input->post('TIMESLOT1_3'),
						'SCHEDULE_DAY_C2' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C2')),
						'SCHEDULE_DAY_E2' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E2')),
						'TIMESLOT2_1' => $this->input->post('TIMESLOT2_1'),
						'TIMESLOT2_2' => $this->input->post('TIMESLOT2_2'),
						'TIMESLOT2_3' => $this->input->post('TIMESLOT2_3'),
						'SCHEDULE_DAY_C3' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C3')),
						'SCHEDULE_DAY_E3' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E3')),
						'TIMESLOT3_1' => $this->input->post('TIMESLOT3_1'),
						'TIMESLOT3_2' => $this->input->post('TIMESLOT3_2'),
						'TIMESLOT3_3' => $this->input->post('TIMESLOT3_3'),
						'SCHEDULE_DAY_C4' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C4')),
						'SCHEDULE_DAY_E4' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E4')),
						'TIMESLOT4_1' => $this->input->post('TIMESLOT4_1'),
						'TIMESLOT4_2' => $this->input->post('TIMESLOT4_2'),
						'TIMESLOT4_3' => $this->input->post('TIMESLOT4_3'),
						'SCHEDULE_DAY_C5' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C5')),
						'SCHEDULE_DAY_E5' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E5')),
						'TIMESLOT5_1' => $this->input->post('TIMESLOT5_1'),
						'TIMESLOT5_2' => $this->input->post('TIMESLOT5_2'),
						'TIMESLOT5_3' => $this->input->post('TIMESLOT5_3'),
						'SCHEDULE_DAY_C6' => implode(',', (array) $this->input->post('SCHEDULE_DAY_C6')),
						'SCHEDULE_DAY_E6' => implode(',', (array) $this->input->post('SCHEDULE_DAY_E6')),
						'TIMESLOT6_1' => $this->input->post('TIMESLOT6_1'),
						'TIMESLOT6_2' => $this->input->post('TIMESLOT6_2'),
						'TIMESLOT6_3' => $this->input->post('TIMESLOT6_3'),
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
					];

					$this->db->insert("doctor_consult_hour", $save_data);
					$save_consult = $this->db->affected_rows();
				}
			}
			

			
			if ($save_doctor > 0 && $save_payment > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_doctor;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/doctor/edit/' .$dr_code , 'Edit Doctor').' or  '.anchor('administrator/doctor', ' Go back to list');
				}else{
					$this->data['success'] = true;
					$this->data['message'] = 'Your data has been successfully stored into the database';
					$this->data['redirect'] = base_url('administrator/doctor/');
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
	public function edit($id)
	{
		$this->is_allowed('doctor_update');

		$this->data['doctor'] = $this->model_doctor->find($id);
		
		$this->db->where("DR_CODE", $id);
		$query = $this->db->get("doctor_payment");
		
		if ($query->num_rows() > 0){
			$this->data['doctor_payment'] = $query->row();
		}else{
			$this->data['doctor_payment'] = "";
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
		$payee_name = $this->input->post('PAYEE_NAME');
		$payee_addr1 = $this->input->post('PAYEE_ADDR1');
		$clearing_code = $this->input->post('BANK_CLEARING_CODE');
		$account_no = $this->input->post('ACCOUNT_NO');
		
		if ($payee_name != "" || $payee_addr1 != ""){
			$this->form_validation->set_rules('PAYEE_NAME', 'Payee Name', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR1', 'Payee Addr 1', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR2', 'Payee Addr 2', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR3', 'Payee Addr 3', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR4', 'Payee Addr 4', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_ADDR5', 'Payee Addr 5', 'trim|max_length[80]');
			$this->form_validation->set_rules('PAYEE_DISTRICT', 'Payee District', 'trim|max_length[80]');
		}
		
		if ($clearing_code != "" || $account_no != ""){
			$this->form_validation->set_rules('BANK_CLEARING_CODE', 'Bank Clearing Code', 'trim|required|max_length[80]');
			$this->form_validation->set_rules('ACCOUNT_NO', 'Bank account no', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('ACCOUNT_HOLDER', 'Bank holder', 'trim|required|max_length[80]');
		}

		
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
			

			//Payment method details
			$save_data2 = [
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
			];
			
			//Check if the doctor never input payment method details
			$this->db->where("DR_CODE", $dr_code);
			$query = $this->db->get('doctor_payment');
			
			if ($query->num_rows() > 0){
				$this->db->where('DR_CODE', $dr_code);
				$this->db->update('doctor_payment', $save_data2);
				$save_payment = $this->db->affected_rows();
				
				if ($save_payment > 0){
					$save_data22 = [
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE' => date('Y-m-d H:i:s'),
					];
					
					$this->db->where('DR_CODE', $dr_code);
					$this->db->update('doctor_payment', $save_data22);
				}
			}else{
				$this->db->set('DR_CODE', $dr_code);
				$this->db->set('CREATOR', $user);
				$this->db->set('CREATE_DATE', date('Y-m-d H:i:s'));
				$this->db->set('LAST_MODIFIER', $user);
				$this->db->set('LAST_UPDATE', date('Y-m-d H:i:s'));
				$this->db->insert("doctor_payment", $save_data2);
				
				$save_payment = $this->db->affected_rows();
			}
			


			if ($save_doctor > 0 && $save_payment > 0) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/doctor', ' Go back to list');
				} 
			} else if ($save_doctor > 0 && $save_payment == 0){
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['message'] = 'Update Doctor information successfully, but Doctor Payment not change';
				} 
			}else if ($save_payment > 0 && $save_doctor == 0){
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['message'] = 'Update Doctor Payment successfully, but Doctor information not change';
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
	 
	public function view_consult_pay(){
		$dr_code = $this->input->get("dr_code");
		$center_code = $this->input->get("center_code");
		
		if (isset($center_code)) {
			$this->db->where("DR_CODE", $dr_code);
			$this->db->where("CENTER_CODE", $center_code);
			$query = $this->db->get("doctor_consult_hour");
			if ($query->num_rows()>0) {
				$this->data['has_center_consult'] = TRUE;
				$this->data['specific_consult'] = $query->row();
			}else{
				$this->data['has_center_consult'] = FALSE;
			}

			$this->db->select('*');
			$this->db->from('doctor_payment');
			$this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
			$this->db->where("DR_CODE", $dr_code);
			$this->db->where("CENTER_CODE", $center_code);
			$query = $this->db->get("");
			if ($query->num_rows()>0) {
				$this->data['has_center_pay'] = TRUE;
				$this->data['specific_payment'] = $query->row();
			} else{
				$this->data['has_center_pay'] = FALSE;

			}

			$this->db->where("CENTER_CODE", $center_code);
			$this->data['center_details'] = $this->db->get("center")->row();
			

		}else{
			$this->db->where("DR_CODE", $dr_code);
			$this->data['specific_consult'] = $this->db->get("doctor_consult_hour")->row();
		    
		    $this->db->where("DR_CODE", $dr_code);
			$this->data['specific_payment'] = $this->db->get("doctor_payment")->row();
			$this->data['center_details'] = '';

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
	
	public function view($id)
	{
		$this->is_allowed('doctor_view');


		//Find doctor details
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
		
		//-----------------------------
		
		//Find Center (For provide select option to view different center consultation)
		$this->db->select("doctor_consult_hour.CENTER_CODE, center.E_NAME");
		$this->db->from('doctor_consult_hour');
		$this->db->join('center','doctor_consult_hour.CENTER_CODE = center.CENTER_CODE');
		$this->db->where("doctor_consult_hour.DR_CODE", $id);
		$query3 = $this->db->get('');
		
		if ($query3->num_rows() > 0){
			$this->data['has_center'] = true;
			$this->data['doctor_center'] = $query3->result();
		}else{
			$this->data['has_center'] = false;
		}
		
		//Find last consultation
		$this->db->where("DR_CODE", $id);
		$this->db->order_by("AUTO_NO", "DESC");
		$query2 = $this->db->get("doctor_consult_hour");
		
		if ($query2->num_rows() > 0){
			$this->data['has_consult'] = true;
			$this->data['doctor_consult_hour'] = $query2->row();
		}else{
			$this->data['has_consult'] = false;
		}
		
		//Find  Last payment
		$this->db->from('doctor_payment');
		$this->db->join('bank','doctor_payment.BANK_CLEARING_CODE = bank.CLEARING_CODE');
		$this->db->where("DR_CODE", $id);
		$query = $this->db->get("");
		
		if ($query->num_rows() > 0){
			
			$payment = $query->row();
			
			$this->data['has_payment'] = true;
			$this->data['doctor_payment'] = $query->row();
		}else{
			$this->data['has_payment'] = false;
		}
		



		//-----------------------------
		
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
		
		//-----------------------------
		
		//Find Doctor Partner (For provide select option to view different doctor partner card)
		$this->db->select(" * FROM partner_doctor WHERE DR_CODE = '$id'");
		$this->db->order_by("CARD_CODE", "ASC");
		$this->db->group_by("CARD_CODE");
		
		$query6 = $this->db->get();
		 //Find doctor partner
		if ($query6->num_rows() > 0){
			$this->data['has_doctor_partner'] = true;  
			$doctor_partner = $query6->result();
			$this->data['doctor_partners'] = $doctor_partner;
		
			//Find partner card
			$this->db->select('*');
			$this->db->from('partner_card');
			$this->db->join('partner_doctor','partner_doctor.CARD_CODE = partner_card.CARD_CODE');
			$query =  $this->db->get("");
			if ($query->num_rows()>0) {
			   $this->data['has_cards'] = TRUE;
			   $partner_card =$query->result();

			    //Find Special fee
			    if ($this->data['has_doctor_partner'] && $this->data['has_cards']){
                    $this->db->select("*");
			    	$this->db->from('agreed_fee');
			    	$this->db->join('doctor_special_fee','doctor_special_fee.CARD_CODE = agreed_fee.CARD_CODE and doctor_special_fee.CLASS_CODE = agreed_fee.CLASS_CODE and doctor_special_fee.TYPE = agreed_fee.TYPE','left');
			    	$this->db->join('center','doctor_special_fee.CENTER_CODE = center.CENTER_CODE');
					$this->db->where("DR_CODE", $id);
					$query7 = $this->db->get();
					if ($query7->num_rows() > 0){
						$this->data['has_special_fee'] = true;
						$this->data['doctor_special_fees'] = $query7->result();
						
					}else{
						$this->data['has_special_fee'] = false;
					}
				
				}else{
				    	$this->data['has_doctor_partner'] = false;
				    	$this->data['has_special_fee'] = FALSE;

				}

		   }else{
			   	$this->data['has_cards'] = FALSE;
			   	$this->data['has_special_fee'] = FALSE;

			    }

		}
		else{
		    $this->data['has_doctor_partner'] = false;
		    $this->data['has_special_fee'] = FALSE;
		}

		
		
		//Find Website login
		$this->db->where("DR_CODE", $id);
		$this->db->group_by("CARD_CODE");
		$query8 = $this->db->get("website_login");
		
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