<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Voucher Line Controller
*| --------------------------------------------------------------------------
*| Voucher Line site
*| 
*/ 
class Voucher_line extends Admin	
{
	
	public function __construct()
	{
		parent::__construct(); 

		$this->load->model('model_voucher_line');
	}
 
	/**
	* show all Voucher Lines
	*
	* @var $offset String
	*/
	// public function index($offset = 0)
	// {
	// 	$this->is_allowed('voucher_line_list');

	// 	$filter = $this->input->get('q');
	// 	$field 	= $this->input->get('f');

	// 	$this->data['voucher_lines'] = $this->model_voucher_line->get($filter, $field, $this->limit_page, $offset);
	// 	$this->data['voucher_line_counts'] = $this->model_voucher_line->count_all($filter, $field);

	// 	$config = [
	// 		'base_url'     => 'administrator/voucher_line/index/',
	// 		'total_rows'   => $this->model_voucher_line->count_all($filter, $field),
	// 		'per_page'     => $this->limit_page,
	// 		'uri_segment'  => 4,
	// 	];

	// 	$this->data['pagination'] = $this->pagination($config);

	// 	$this->template->title('Voucher  List');
	// 	$this->render('backend/standart/administrator/voucher_line/voucher_line_list', $this->data);
	// }

	/**
	*   // FOR VOUCHET LINE MOLTIPLE FILTER 
	*
	*/
    
    //DEFAUL INDEX PAGE
	public function index_2($offset = 0){

		$this->is_allowed('voucher_line_list');

        $result =  $this->model_voucher_line->get2($params = array(),10,$offset);
        $all_result = $this->model_voucher_line->count_all2($params = array());
        
        $this->data['voucher_lines'] = $result; //return html string
        $this->data['voucher_line_counts'] =  $all_result;

		$config = [
			'base_url'     => 'administrator/voucher_line/index_2/',
			'total_rows'   => $all_result,
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config); //return ci-pagination string
		$this->template->title('Voucher  List');

		$this->render('backend/standart/administrator/voucher_line/voucher_line_list', $this->data);
	}
    
	public function Mypagination(){
	    $this->load->library('pagination');

		$data_str = $this->input->get('data');
        $params = array();
        parse_str($data_str,$params);
	    

		    $config = [
            'suffix'           => isset($_GET)?'?'.http_build_query($_GET):'',
            'base_url'         => BASE_URL.'administrator/voucher_line/Mypagination/',
            'total_rows'       => $this->model_voucher_line->count_all2($params),
            'per_page'         => $this->limit_page,
            'uri_segment'      => 4,
            'use_page_numbers' => TRUE,
            'num_links'        => 1,
            'num_tag_open'     => '<li>',
            'num_tag_close'    => '</li>',
            'full_tag_open'    => '<ul class="pagination">',
            'full_tag_close'   => '</ul>',
            'first_link'       => 'First',
            'first_tag_open'   => '<li>',
            'first_tag_close'  => '</li>',
            'last_link'        => 'Last',
            'last_tag_open'    => '<li>',
            'last_tag_close'   => '</li>',
            'next_link'        => 'Next',
            'next_tag_open'    => '<li>',
            'next_tag_close'   => '</li>',
            'prev_link'        => 'Prev',
            'prev_tag_open'    => '<li>',
            'prev_tag_close'   => '</li>',
            'cur_tag_open'     => '<li class="active"><a href="#">',
            'cur_tag_close'    => '</a></li>',
        ];
             
             $this->pagination->initialize($config);
             $page = $this->uri->segment(4);
             $start = ($page - 1) *  $this->limit_page;

             $output = array(
             	'pagination_link' => $this->pagination->create_links(),
             	'voucher_data' => $this->model_voucher_line->get2($params, $this->limit_page, $start),
             	'voucher_line_counts' =>  $this->model_voucher_line->count_all2($params)
             );
             
             echo json_encode($output);
	}

    // FOR VOUCHER SUMMARY
	public function index_3($offset = 0){
		$this->is_allowed('voucher_line_list');
        
        // $Recieve_date = $this->input->get('d');
		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['voucher_lines'] = $this->model_voucher_line->get3($filter, $field);
		$this->data['voucher_line_tems'] = $this->model_voucher_line->get_tmp3($filter, $field);

		$this->template->title('ALL Voucher');
		$this->render('backend/standart/administrator/voucher_line/voucher_summ', $this->data);

	}

	public function add($voucher_no)
	{
		$this->is_allowed('voucher_line_add');
		$this->template->title('Voucher Line New');

        
		// $id = str_replace('%20',' ',$id);

		// $this->data['CARD_CODE'] =$id;
		$this->data['VOUCHER_NO'] = $voucher_no;

 	    $this->db->select('*');
 	    $this->db->where('VOUCHER_NO',$voucher_no);
 	    $query = $this->db->get('voucher_line_temp');
 	    $result = $query->row();
        $this->data['voucher'] = $result;
        

        $partner_dr_code = $result->PARTNER_DR_CODE;
        $com_id = $result->COM_ID;
        $card_code = $result->CARD_CODE;
        $class_code = $result->CLASS_CODE;

        $this->db->select('DR_CODE');
        $this->db->where('PARTNER_DR_CODE', $partner_dr_code);
        $this->db->where('CARD_CODE',$card_code);
        $r = $this->db->get('doctor_card')->row();
        $doctor_code = $r->DR_CODE;

        $this->db->select('E_TITLE, C_TITLE, E_NAME, C_NAME');
		$this->db->where('DR_CODE',$doctor_code);
		$this->data['doctor_name'] = $this->db->get('doctor')->row();

        $this->db->select('DR_CODE, CENTER_CODE, LOC_CODE');
		$this->db->where('CARD_CODE', $card_code);
		$this->db->where('PARTNER_DR_CODE',$partner_dr_code);
		$this->data['com_doctors'] = $this->db->get('doctor_card')->row();
		


	    // GET PATIENT DATA        
        $this->db->select('*');
        $this->db->where('CARD_CODE', $card_code);
      	$this->db->group_by('PATIENT_NO');
        $this->data['patients'] = $this->db->get('patient')->result(); 

 		$this->db->select('*');
        $this->db->where('CARD_CODE', $card_code); 
      	$this->db->group_by('HKID');
        $this->data['patient_ids'] = $this->db->get('patient')->result();
      

	    // FIND VOUCHER TYPE BASED ON CARD TYPE , CARD CLASS AND DOCTOR TYPE
	   $this->db->select('TYPE');
	   $this->db->where('CARD_CODE', $card_code);
	   // $this->db->where('COM_ID',$com_id);
	   $this->db->where('CLASS_CODE', $class_code);
	   $type = $this->db->get('agreed_fee')->result_array();
	   $type_arr = array();
	   foreach ($type as $key => $value) {
	   	if ($value['TYPE']!='') {
	        array_push($type_arr, $value['TYPE']);

	   	}
	   }

	   $this->db->select('TYPE1,TYPE2,TYPE3');
	   $this->db->where('CARD_CODE',$card_code);
	   $this->db->where('DR_CODE',$doctor_code);
	   // $this->data['TYPES'] = $this->db->get('partner_doctor')->row();
	   	$TYPE_DOC = $this->db->get('doctor_card')->row_array();
	   	$type_doc_arr = array();
        for ($i=0; $i<3 ; $i++) { 
             $T = $TYPE_DOC['TYPE'.($i+1)];
             if($T!=''){
             	array_push($type_doc_arr, $T);
             }
        }

        $Type_intersection = array_intersect($type_arr, $type_doc_arr);
        $this->data['TYPES'] = $Type_intersection;
        // END FIND VOUCHER TYPE



        $this->db->select('SURGICAL_RATING');
        $this->db->where('COM_ID', $com_id);
        $this->db->where('CARD_CODE',$card_code);
        $this->data['SURGICAL_RATE'] = $this->db->get('card')->row();


        $this->db->select('DIAG_CODE_STANDARD');
        $this->db->where('COM_ID', $com_id);
        $this->db->where('CARD_CODE',$card_code);
        $diagnosis_code_standard = $this->db->get('card')->row_array();
       	$diagnosis_code_standard = $diagnosis_code_standard['DIAG_CODE_STANDARD'];
   
        $this->db->select('DIAG_CODE,E_DESC');
        $this->db->where('DIAG_CODE_STANDARD',$diagnosis_code_standard);
        $this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();
       
        $today_start = Date('Y-m-d 00:00:00'); 
        $today_end = Date('Y-m-d 23:59:59'); 

        $this->db->select('*');
        $this->db->where('LAST_UPDATE >=', $today_start);
        $this->db->where('LAST_UPDATE <=', $today_end);
        $this->data['today_vouchers'] = $this->db->get('voucher_line')->result();

		$this->render('backend/standart/administrator/voucher_line/voucher_line_add', $this->data);

	}


	public function getDataByPatientCode(){
		$CARD_CODE = $this->input->get('CARD_CODE');
		$PATIENT_NO  = $this->input->get('PATIENT_CODE');

		$this->db->select('*');
		$this->db->where('CARD_CODE',$CARD_CODE);
		$this->db->where('PATIENT_NO',$PATIENT_NO);
		$query = $this->db->get('patient');
		$result = $query->result_array();
        
        $hkid = array();
        foreach ($result as $key => $value) {
        	if ($value['HKID']!='') {
        	 	array_push($hkid,$value['HKID']);

        	}
        }
        array_unique($hkid);
        if (!empty($hkid)) {
               $this->db->select('*');
				$this->db->where('CARD_CODE',$CARD_CODE);
				$this->db->where_in('HKID',$hkid);
				$q = $this->db->get('patient');
				if ($q->num_rows()>0) {
				   $this->data['patient'] =$q->result_array();
		      }
		  }
		   else{
		      $this->data['patient'] =$result;
		   }
        	

		$this->data['HKID'] = $hkid;
		echo json_encode($this->data);

	}

	public function getPatientdataById(){
		$CARD_CODE = $this->input->get('CARD_CODE');
		$patient_id = $this->input->get('patient_id');

		$this->db->select('*');
		$this->db->where('CARD_CODE',$CARD_CODE);
		$this->db->where('HKID',$patient_id);
		$query = $this->db->get('patient');
		$result = $query->result_array();
		$this->data['patient'] = $result;


        foreach ($result as $key => $value) {
         	if ($value['PATIENT_NO']!='') {
         		 $patient_No = $value['PATIENT_NO'];
         	}
         }

		$this->data['PATIENT_NO'] =  $patient_No;

		echo json_encode($this->data);
	}

	// public function getBenefitDate(){
	//    $CARD_CODE = $this->input->get('CARD_CODE');
	//    $CLASS_CODE = $this->input->get('CLASS_CODE');

	//    $this->db->select('TYPE');
	//    $this->db->where('CARD_CODE',$CARD_CODE);
	//    $this->db->where('CLASS_CODE', $CLASS_CODE);
	//    $this->data['Benefit_TYPE'] = $this->db->get('agreed_fee')->result_array();

 //        $this->db->select('SURGICAL_RATING');
 //        $this->db->where('CARD_CODE',$CARD_CODE);
 //        $this->data['SURGICAL_RATE'] = $this->db->get('card')->row_array();

	// 	echo json_encode($this->data);
	// }

	public function getFee(){
	   $COM_ID  = $this->input->get('COM_ID');
	   $CARD_CODE = $this->input->get('CARD_CODE');
	   $CLASS_CODE = $this->input->get('CLASS_CODE');
	   $TYPE = $this->input->get('type');
	   $DOCTOR_CODE = $this->input->get('DOCTOR_CODE');
	   $partner_dr_code =$this->input->get('partner_dr_code');


       // GET AFREED FEE
	   $this->db->select('*');
	   // $this->db->where('COM_ID',$COM_ID);
	   $this->db->where('CARD_CODE',$CARD_CODE);
	   $this->db->where('CLASS_CODE', $CLASS_CODE);
	   $this->db->where('TYPE',$TYPE);
	   $this->data['agreed_fee'] = $this->db->get('agreed_fee')->row_array();

	   // GET DOCTOR SPECIAL FEE

		       $this->db->select('*');
		       $this->db->where('DR_CODE',  $DOCTOR_CODE);
		       $this->db->where('PARTNER_DR_CODE',$partner_dr_code);
		       // $this->db->where('COM_ID',$COM_ID);
		       $this->db->where('CARD_CODE',$CARD_CODE);
			   $q =  $this->db->get('doctor_card');
			   if ($q->num_rows()>0) {
			   	$result = $q->row();
			    $CENTER_CODE = $result->CENTER_CODE;
			    	$this->db->select('*');
			        $this->db->from('doctor_special_fee');
			        $this->db->where('COM_ID',$COM_ID);
			        $this->db->where('CARD_CODE',$CARD_CODE);
			        $this->db->where('CLASS_CODE',$CLASS_CODE);
			        $this->db->where('TYPE',$TYPE);
			        $this->db->where('DR_CODE',$DOCTOR_CODE);
			        $this->db->where('CENTER_CODE', $CENTER_CODE);
			        $query =  $this->db->get();
			        if ($query->num_rows()>0) {
			        	 $this->data['special_fee'] = $query->row_array();

			        }else{
			        	 $this->data['special_fee'] = false;

			        }
			   }else{
						$this->data['special_fee'] = false;
			   }

	   echo json_encode($this->data);

	}

	/**
	* Add New Voucher Lines
	*
	* @return JSON
	*/
	
	public function add_save()
	{
		if (!$this->is_allowed('voucher_line_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		// VOUCHER SAVE VALIDATION
		$this->form_validation->set_rules('VOUCHER_NO', 'VOUCHER NO', 'trim|required|is_unique[voucher_line.VOUCHER_NO]');
	    $this->form_validation->set_rules('TYPE','TYPE','required');
	    $this->form_validation->set_rules('FEE_AMT','Total Fee Amount','required');
	    $this->form_validation->set_rules('PAY_AMT','Total Pay Amount','required');
	    $this->form_validation->set_rules('PATIENT_NAME', 'PATIENT NAME ', 'required');

 		$DIAG_CODE = $this->input->post('DIAG_CODE');
 		if (strlen(implode('', $DIAG_CODE)==0)) {
 		$this->form_validation->set_rules('DIAG_CODE[]','at least one DIAGNOSIS CODE','required');

 		}

 
		if ($this->form_validation->run()) {
		
	       $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
		   $today = date('Y-m-d H:i:s');

		   		$BATCH_NO = $this->input->post('BATCH_NO');
		   		$VOUCHER_NO = $this->input->post('VOUCHER_NO');
 				
                $ARR_CODE = array();
                $ARR_DESC = array();

                for ($i=0; $i <3 ; $i++) { 

                   if ($DIAG_CODE[$i] !='') {
					$diag_code = explode(',', $DIAG_CODE[$i]);
					    $ARR_CODE[] = $diag_code[0];
        				$ARR_DESC[] = $diag_code[1];
		
                   	}else{
                   	    $ARR_CODE[] = '';
        				$ARR_DESC[] = '';
                   	}
                   
                   }

		   $save_data = [
		   		'VOUCHER_NO' => $VOUCHER_NO,
				'BATCH_NO' => $BATCH_NO,
				'COM_ID' => $this->input->post('COM_ID'),
				'CARD_CODE' => $this->input->post('CARD_CODE'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'RECEIVE_DATE' => $this->input->post('RECEIVE_DATE'),
				'TREATMENT_DATE' => $this->input->post('TREATMENT_DATE'),
				'DR_CODE' => $this->input->post('DR_CODE'),
				'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
				'DR_E_NAME' => $this->input->post('DR_E_NAME'),
				'DR_C_NAME' => $this->input->post('DR_C_NAME'),

				'PATIENT_CODE' => $this->input->post('PATIENT_CODE'),
				'PATIENT_HKID' => $this->input->post('PATIENT_HKID'),
				'PATIENT_NAME' => $this->input->post('PATIENT_NAME'),
				'DEPD_CODE' => $this->input->post('DEPD_CODE'),
				'SICK_LEAVE' => $this->input->post('SICK_LEAVE'),
				'SL_FROM' => $this->input->post('SL_FROM'),
				'SL_TO' => $this->input->post('SL_TO'),

				'DIAG_CODE1' =>  $ARR_CODE[0],
				'DIAG_CODE2' =>  $ARR_CODE[1],
				'DIAG_CODE3' =>  $ARR_CODE[2],
				'DIAG_DESC1' =>  $ARR_DESC[0],
				'DIAG_DESC2' =>  $ARR_DESC[1],
				'DIAG_DESC3' =>  $ARR_DESC[2],

				'TYPE' => $this->input->post('TYPE'),
				'REFERRAL_DR' => $this->input->post('REFERRAL_DR'),
				'CO_PAY' => $this->input->post('CO_PAY'),
				'EXTRA_MED' => $this->input->post('EXTRA_MED'),
				'LAB_XRAY' => $this->input->post('LAB_XRAY'),
				'SURGICAL' => $this->input->post('SURGICAL'),
				'APPROVAL_CODE' => $this->input->post('APPROVAL_CODE'),

				'FEE_AMT' => $this->input->post('FEE_AMT'),
				'PAY_AMT' => $this->input->post('PAY_AMT'),

				'CREATOR' => $this->input->post('CREATOR'),
				'CREATE_DATE' =>$this->input->post('CREATE_DATE'),
				'LAST_MODIFIER'=> $user,
				'LAST_UPDATE'=> $today
			];

			
			$save_voucher_line = $this->model_voucher_line->storeSpecial($save_data);

			if ($save_voucher_line) {
				//update temp vouchou status

				$this->db->set('STATUS','COMPLETED');
				$this->db->where('BATCH_NO',$BATCH_NO);
				$this->db->where('VOUCHER_NO',$VOUCHER_NO);
				$this->db->update('voucher_line_temp');

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_voucher_line;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/voucher_line/index_2', ' Go back to list');
				} else {
            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/voucher_line/index_2');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/voucher_line/index_2');
				}
			}

		} 
		else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Voucher Lines
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('voucher_line_update');

		$this->data['voucher_line'] = $this->model_voucher_line->find($id);

		$this->template->title('Voucher Line Update');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_update', $this->data);
	}

	/**
	* Update Voucher Lines
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('voucher_line_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
		
		$this->form_validation->set_rules('VOUCHER_NO', 'VOUCHER NO', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BATCH_NO' => $this->input->post('BATCH_NO'),
				'RECEIVE_DATE' => $this->input->post('RECEIVE_DATE'),
				'CARD_CODE' => $this->input->post('CARD_CODE'),
				'VOUCHER_NO' => $this->input->post('VOUCHER_NO'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'TREATMENT_DATE' => $this->input->post('TREATMENT_DATE'),
				'DR_CODE' => $this->input->post('DR_CODE'),
				'PARTNER_DR_CODE' => $this->input->post('PARTNER_DR_CODE'),
				'DR_E_NAME' => $this->input->post('DR_E_NAME'),
				'DR_C_NAME' => $this->input->post('DR_C_NAME'),
				'MEMBER_CODE' => $this->input->post('MEMBER_CODE'),
				'MEMBER_CLASS' => $this->input->post('MEMBER_CLASS'),
				'MEMBER_HKID' => $this->input->post('MEMBER_HKID'),
				'MEMBER_E_NAME' => $this->input->post('MEMBER_E_NAME'),
				'MEMBER_C_NAME' => $this->input->post('MEMBER_C_NAME'),
				'MEMBER_STAFF_NO' => $this->input->post('MEMBER_STAFF_NO'),
				'DEPD_NAME' => $this->input->post('DEPD_NAME'),
				'DEPD_CODE' => $this->input->post('DEPD_CODE'),
				'SICK_LEAVE' => $this->input->post('SICK_LEAVE'),
				'SL_FROM' => $this->input->post('SL_FROM'),
				'SL_TO' => $this->input->post('SL_TO'),
				'CLASS_CODE' => $this->input->post('CLASS_CODE'),
				'INSURED_NO' => $this->input->post('INSURED_NO'),
				'POLICY_YEAR' => $this->input->post('POLICY_YEAR'),
				'DP_TYPE' => $this->input->post('DP_TYPE'),
				'DIAG_CODE1' => $this->input->post('DIAG_CODE1'),
				'DIAG_CODE2' => $this->input->post('DIAG_CODE2'),
				'DIAG_CODE3' => $this->input->post('DIAG_CODE3'),
				'DIAG_CODE4' => $this->input->post('DIAG_CODE4'),
				'TYPE' => $this->input->post('TYPE'),
				'REFERRAL_DR' => $this->input->post('REFERRAL_DR'),
				'REFERRAL_TYPE' => $this->input->post('REFERRAL_TYPE'),
				'CO_PAY' => $this->input->post('CO_PAY'),
				'EXTRA_MED_BOL' => $this->input->post('EXTRA_MED_BOL'),
				'EXTRA_MED' => $this->input->post('EXTRA_MED'),
				'EXTRA_MED_REMARK' => $this->input->post('EXTRA_MED_REMARK'),
				'LAB_XRAY_BOL' => $this->input->post('LAB_XRAY_BOL'),
				'LAB_XRAY' => $this->input->post('LAB_XRAY'),
				'LAB_XRAY_CODE' => $this->input->post('LAB_XRAY_CODE'),
				'SURGICAL_BOL' => $this->input->post('SURGICAL_BOL'),
				'SURGICAL' => $this->input->post('SURGICAL'),
				'SURGICAL_CODE' => $this->input->post('SURGICAL_CODE'),
				'APPROVAL_CODE' => $this->input->post('APPROVAL_CODE'),
				'FEE_AMT' => $this->input->post('FEE_AMT'),
				'OS_AMT' => $this->input->post('OS_AMT'),
				'PAY_AMT' => $this->input->post('PAY_AMT'),
				'DR_CODE_DE' => $this->input->post('DR_CODE_DE'),
				'FEE_AMT_DE' => $this->input->post('FEE_AMT_DE'),
				'PAY_AMT_DE' => $this->input->post('PAY_AMT_DE'),
				'STATUS' => $this->input->post('STATUS'),
				'ENTRY_TIME_DE' => $this->input->post('ENTRY_TIME_DE'),
				'LAST_MODIFIER_VE' => $this->input->post('LAST_MODIFIER_VE'),
				'LAST_MODIFIER_DE' => $this->input->post('LAST_MODIFIER_DE'),
			];

			
			$save_voucher_line = $this->model_voucher_line->change($id, $save_data);

			if ($save_voucher_line) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/voucher_line/index_2', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/voucher_line/index_2');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/voucher_line/index_2');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
		/**
	* delete Voucher Lines
	*
	* @var $id String
	*/


	/**
	* delete Voucher Lines
	*
	* @var $id String
	*/


	 private function _remove($id)
	 {
		// $voucher_line = $this->model_voucher_line->find($id);
	 $this->model_voucher_line->remove($id);
	 $q = $this->db->affected_rows();
	 if ($q>0) {
	  		return true;
	   }else{
	  	   return false;
	   }
	 }
	
	
	public function delete($id)
	
	{

		$this->is_allowed('voucher_line_delete');

		$this->load->helper('file');
		
		// $id = unserialize($id);

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
            set_message('Voucher Line has been deleted.', 'success');
		} else {
	        set_message($id, 'error');

		}


		redirect('administrator/voucher_line/index_2');
	}
		/**
	* View view Voucher Lines
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('voucher_line_view');

		$this->data['voucher_line'] = $this->model_voucher_line->find($id);

		$this->template->title('Voucher Line Detail');
		$this->render('backend/standart/administrator/voucher_line/voucher_line_view', $this->data);
	}
   

	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('voucher_line_export');

		$this->model_voucher_line->export('voucher_line', 'voucher_line');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('voucher_line_export');

		$this->model_voucher_line->pdf('voucher_line', 'voucher_line');
	}
}


/* End of file voucher_line.php */
/* Location: ./application/controllers/administrator/Voucher Line.php */