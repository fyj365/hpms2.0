<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Business Partner Controller
*| --------------------------------------------------------------------------
*| Business Partner site
*| 
*/
class Card extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_card');
	}
   
	/**
	* show all Business Partners
	*
	* @var $offset String 
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('card_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['f'] = $field;
		$this->data['cards'] = $this->model_card->get($filter, $field, $this->limit_page, $offset);
		$this->data['card_counts'] = $this->model_card->count_all($filter, $field);
		$config = [
			'base_url'     => 'administrator/card/index/',
			'total_rows'   => $this->model_card->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		$this->template->title('Card List');
		$this->render('backend/standart/administrator/card/card_list', $this->data);
	}
	
	/**
	* Add new cards
	*
	*/

	public function add()
	{

		$this->is_allowed('card_add');
		
		// rules: ADD DOCTOR ONLY those are ACTIVE IN DOCTOR TABLE

		$this->db->select('DR_CODE');
       	$this->db->where('STATUS','Active');
		$this->data['doctor_codes'] = $this->db->get('doctor')->result();




		$this->db->select('DIAG_CODE_STANDARD');
		$this->db->group_by('DIAG_CODE_STANDARD');
		$this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();

		$this->template->title('New Card');
		$this->render('backend/standart/administrator/card/card_add', $this->data);
	}
	


	public function find_COMPANY(){
		$id = $this->input->get('com_id');
        
        $this->db->select('*');
		$this->db->where('COM_ID', $id);
		$this->data['company'] = $this->db->get('company')->row();

		$this->db->select('*');
		$this->db->where('COM_ID',$id);
		$this->data['company_contacts'] = $this->db->get('com_contact')->result();

		echo json_encode($this->data);
	}


 
 
   public function findDoctorType_Center(){
   	   $doctor_code = $this->input->get('doctor_code');

   	   $this->db->select('TYPE1,TYPE2,TYPE3');

   	   $this->db->from('doctor');

   	   $this->db->where('DR_CODE', $doctor_code);
       
       $doctor_type = $this->db->get()->row_array();

   	   $this->data['doctor_types']= $doctor_type;
		 

   	  // rules: Doctor Card termdate cannot later than doctor terminate date 
   	   $this->db->select('TERM_DATE');

   	   $this->db->from('doctor');

   	   $this->db->where('DR_CODE',$doctor_code);

   	   $this->data['doctor_term_date'] = $this->db->get()->row();


   	   $this->db->select('*');

   	   $this->db->from('doctor_center');

   	   $this->db->join('center','doctor_center.CENTER_CODE = center.CENTER_CODE');

   	   $this->db->where('DR_CODE',$doctor_code);

   	   $doctor_center = $this->db->get()->result_array();
   	  
   	   $this->data['doctor_centers'] = $doctor_center;

   	   echo json_encode($this->data);

   }

   public function find_doctor_termDate() {
   	   $doctor_code = $this->input->get('doctor_code');
   	  // rules: Doctor Card termdate cannot later than doctor terminate date 
   	   $this->db->select('TERM_DATE');

   	   $this->db->from('doctor');

   	   $this->db->where('DR_CODE',$doctor_code);

   	   $this->data['doctor_term_date'] = $this->db->get()->row();

   	   echo json_encode($this->data);

   }
	/**
	* Add New  Cards
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('card_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
 
		$this->form_validation->set_rules('CARD_CODE', 'Card Code', 'trim|required|max_length[80]|is_unique[card.CARD_CODE]');
		$this->form_validation->set_rules('C_E_NAME', 'English Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_C_NAME', 'Chinese Name', 'trim|max_length[80]');

	    $this->form_validation->set_rules('SURGICAL_RATING', 'Surgical Rate', 'trim|numeric');

	    $this->form_validation->set_rules('E_ADDR1', 'E ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR2', 'E ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR3', 'E ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR4', 'E ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR5', 'E ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_DISTRICT', 'E DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR1', 'C ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR5', 'C ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_DISTRICT', 'C DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('BILLING_DEPT_NAME', 'BILLING DEPT NAME', 'trim|max_length[80]');
	    $this->form_validation->set_rules('DIAG_CODE_STANDARD', 'DIAG CODE STANDARD', 'trim|max_length[80]');

 	 
		if ($this->form_validation->run()) {
		    
		    $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
            $com_id = $this->input->post('COM_ID');
	        $CARD_CODE = $this->input->post('CARD_CODE');
	        $partner_name = $this->input->post('C_E_NAME');
            
            // insert card basic info
			$save_data = [
				'COM_ID' => $com_id,
				'CARD_CODE' => $CARD_CODE, 
				'E_NAME' => $partner_name,
				'C_NAME' => $this->input->post('C_C_NAME'),
				'JOIN_DATE' => $this->input->post('JOIN_DATE'),
				'E_ADDR1' => $this->input->post('E_ADDR1'),
				'E_ADDR2' => $this->input->post('E_ADDR2'),
				'E_ADDR3' => $this->input->post('E_ADDR3'),
				'E_ADDR4' => $this->input->post('E_ADDR4'),
				'E_ADDR5' => $this->input->post('E_ADDR5'),
				'E_DISTRICT' => $this->input->post('E_DISTRICT'),
				'C_ADDR1' => $this->input->post('C_ADDR1'),
				'C_ADDR2' => $this->input->post('C_ADDR2'),
				'C_ADDR3' => $this->input->post('C_ADDR3'),
				'C_ADDR4' => $this->input->post('C_ADDR4'),
				'C_ADDR5' => $this->input->post('C_ADDR5'),
				'C_DISTRICT' => $this->input->post('C_DISTRICT'),
				'BILLING_DEPT_NAME' => $this->input->post('BILLING_DEPT_NAME'),
				'SURGICAL_RATING' => $this->input->post('SURGICAL_RATING'),
				'DIAG_CODE_STANDARD' => $this->input->post('DIAG_CODE_STANDARD'),
				'CREATOR' =>$user,
				'CREATE_DATE' =>  date('Y-m-d H:i:s'),
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE'	=>date('Y-m-d H:i:s')

			];
			 $save_card = $this->model_card->storeSpecial($save_data);


			//insert  card contacts
			$Contact_E_NAME = $this->input->post('Contact_E_NAME');
			$Contact_C_NAME = $this->input->post('Contact_C_NAME');
		   // if(!empty(array_filter($Contact_E_NAME))){
					for ($i=0; $i <3 ; $i++) { 
						$save_contacts = [
						'CONTACT_NO' =>$i+1,
						'CARD_CODE' =>  $CARD_CODE,
						'E_NAME' => $this->input->post('Contact_E_NAME['.$i.']'),
						'C_NAME' => $this->input->post('Contact_C_NAME['.$i.']'),
						'TITLE' =>$this->input->post('TITLE['.$i.']'),
						'DEPARTMENT' =>$this->input->post('DEPARTMENT['.$i.']'),
						'TEL' =>$this->input->post('TEL['.$i.']'),
						'FAX' =>$this->input->post('FAX['.$i.']'),
						'EMAIL' =>$this->input->post('EMAIL['.$i.']'),
						'CREATOR' =>$user,
						'CREATE_DATE' =>  date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE'	=>date('Y-m-d H:i:s')
						];
						$this->db->insert('card_contact',$save_contacts);
					}

             // INSERT CARD DOCTOR   
	           $doctor_code = $this->input->post('DR_CODE');
               $center_code = $this->input->post('CENTER_CODE');
		       $partner_doctor_code = $this->input->post('PARTNER_DR_CODE');
		       $loc_code = $this->input->post('LOC_CODE');
		       $doctor_term = $this->input->post('D_TERM_DATE');

	           if (strlen(implode($doctor_code))!=0){
 
                   
                   for ($i=0; $i <count($doctor_code) ; $i++) { 

                       if ($doctor_code[$i]!='') {

                       		// INSERT DOCTOR CENTER IF DOCTOR CENTER RELATION NOT EXISTS
                       	//   if ( $center_code[$i]!='') {
                       	//           $this->db->where('DR_CODE',$doctor_code[$i]);
                    	  	//       $this->db->where('CENTER_CODE', $center_code[$i]);
                    	   // 		  $query = $this->db->get('doctor_center');
                    	 		// if ($query->num_rows() == 0) {
	                    	  //     $save_doctor_center = [
		                    	 //   	  'DR_CODE' => $doctor_code[$i],
		                    	 //   	  'CENTER_CODE' => $center_code[$i]
	                    	  //     ];
	                    	  //     $this->db->insert('doctor_center',$save_doctor_center);
                    	   //      }
                       	//   }

                    	   // INSERT DOCTOR CARD
                    	   $doctor_type = $this->input->post($doctor_code[$i].'_doctor_type');                       		
                       	   $type1 = (isset($doctor_type[0]))?$doctor_type[0]:'';
                           $type2 = (isset($doctor_type[1]))?$doctor_type[1]:'';
                           $type3 = (isset($doctor_type[2]))?$doctor_type[2]:'';
 
	           				$save_doctor_card =[
	           					'COM_ID' => $com_id,
							 	'CARD_CODE' => $CARD_CODE,
							 	'DR_CODE' => $doctor_code[$i],
							 	'CENTER_CODE' => $center_code[$i],
							 	'PARTNER_DR_CODE' =>  $partner_doctor_code[$i],
							 	'TYPE1' => $type1,
							 	'TYPE2' => $type2,
							 	'TYPE3' => $type3,
							 	'LOC_CODE' => $loc_code[$i],
							 	'TERM_DATE' => $doctor_term[$i],
							    'CREATOR' =>$user,
								'CREATE_DATE' =>  date('Y-m-d H:i:s'),
								'LAST_MODIFIER' => $user,
								'LAST_UPDATE'	=>date('Y-m-d H:i:s')
								];
						       $this->db->insert('doctor_card', $save_doctor_card);

						}
                    }
	           }

	            // INSERT CARD CLASS CARD
	           		$class_code =  $this->input->post('CLASS_CODE');
					$today = date('Y-m-d H:i:s');
					
					if (strlen(implode($class_code)) !=0 ) {
							$class_desc = $this->input->post('CLASS_DESC');
	           				$start_date = $this->input->post('START_DATE');
							$term_date = $this->input->post('TERM_DATE');
							$remark = $this->input->post('REMARK');

							for ($i = 0 ; $i < count($class_code); $i++){
								if ($class_code[$i]!='') {
							
									if ($term_date[$i] =='' && $start_date[$i]=='') {
								 			$STATUS = 'Active';
								 	}
								 	else{ 
									 	if($term_date[$i] !=''&& $term_date[$i] < $today){
									 	
									 		$STATUS = 'Terminate';
										 }
										 else if ($start_date[$i]!=''&& $start_date[$i] > $today ) {
									 		$STATUS = 'Not Start';
										 }
										 else {
									 		$STATUS = 'Active';
									 	}
									 }
									
									$save_class = [
											'COM_ID' =>  $com_id,
											'CARD_CODE' => $CARD_CODE,
											'CLASS_CODE' => $class_code[$i],
											'CLASS_DESC' => $class_desc[$i],
											'START_DATE' => isset($start_date[$i])?$start_date[$i]:'',
											'TERM_DATE' =>  isset($term_date[$i])?$term_date[$i]:'',
											'ORIGINAL_TERM_DATE' =>isset($term_date[$i])?$term_date[$i]:'',
											'STATUS' => $STATUS,
											'REMARK' => $remark[$i],
											'CREATOR' =>$user,
											'LAST_MODIFIER' => $user,
											'CREATE_DATE' => date('Y-m-d H:i:s'),
											'LAST_UPDATE'	=>date('Y-m-d H:i:s')
										]; 

									$this->db->insert('card_class',$save_class);
								

                                    // INSERT DIFFERENT TYPE OF FEE IF CLASS EXISTS
									$fee_type = $this->input->post($i.'TYPE');

									if (strlen(implode($fee_type))!=0) {
											$fee_med_days = $this->input->post($i.'MED_DAYS');
											$fee_fee = $this->input->post($i.'FEE');
											$fee_pay = $this->input->post($i.'PAY');
											$fee_copay = $this->input->post($i.'CO_PAY');
											$fee_extr_med = $this->input->post($i.'EXTRA_MED_BOL');
								        	$fee_lab = $this->input->post($i.'LAB_XRAY_BOL');
											$fee_surgical = $this->input->post($i.'SURGICAL_BOL');

										for( $j = 0; $j < count($fee_type); $j++){
											if ($fee_type[$j] !='' && $fee_fee[$j] !='' && $fee_pay[$j] !='') {
												$save_fee = [
										         	'COM_ID' =>  $com_id,
										            'CARD_CODE' => $CARD_CODE,
										            'CLASS_CODE' =>$class_code[$i],
										            'TYPE' => $fee_type[$j],
										            'MED_DAYS' => $fee_med_days[$j],
										            'CO_PAY' => $fee_copay[$j],
										            'FEE' => $fee_fee[$j],
										            'PAY' => $fee_pay[$j],
										            'EXTRA_MED_BOL' => isset($fee_extr_med[$j])?1:0,
										            'LAB_XRAY_BOL' =>  isset($fee_lab[$j])?1:0,
										            'SURGICAL_BOL' =>  isset($fee_surgical[$j])?1:0,
										        	'CREATOR' =>$user,
													'LAST_MODIFIER' => $user,
													'CREATE_DATE' => date('Y-m-d H:i:s'),
													'LAST_UPDATE'	=>date('Y-m-d H:i:s')
												];
											   $this->db->insert('agreed_fee',$save_fee);
										 	}
										 	
										}

									 }

								}
					        }
			} //END INSERT CARD CLASS CARD


			if ($save_card) {
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = true;
						$this->data['id'] 	   = $save_card;
						$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/card/edit/' . $CARD_CODE, 'Edit Card').' or  '.anchor('administrator/card', ' Go back to list');
					} else {
						set_message('Your data has been successfully stored into the database. '.anchor('administrator/card/edit/' . $$CARD_CODE, 'Edit Business Partner'), 'success');

	            		$this->data['success'] = true;
						$this->data['redirect'] = base_url('administrator/card');
					}
				} else {
					if ($this->input->post('save_type') == 'stay') {
						$this->data['success'] = false;
						$this->data['message'] = 'Data not change';
					} else {
	            		$this->data['success'] = false;
	            		$this->data['message'] = 'Data not change';
						$this->data['redirect'] = base_url('administrator/card');
					}
			}

		} else { 
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Business Partners
	*
	* @var $id String
	*/
	public function edit($id)
	{
		
		$this->is_allowed('card_update');

		$this->db->select('DIAG_CODE_STANDARD');
		$this->db->group_by('DIAG_CODE_STANDARD');
		$this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();

		$this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');
		$this->data['card'] = $this->model_card->find($id);

		$this->data['classes'] = $this->model_card->find_CLass($id)['results'];
		$this->data['card_class_counts'] = $this->model_card->find_CLass($id)['totals'];

		$this->data['card_contacts'] = $this->model_card->find_CARD_Contacts($id);

	   	$this->data['doctor_cards'] = $this->model_card->find_Doctor_Cards($id);
	   
	   	$this->data['BP_STATUS'] = $this->model_card->find_status($id);

		$this->template->title('Business Partner Update');
		$this->render('backend/standart/administrator/card/card_update', $this->data);
	}

	/**
	* Update Business Partners
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('card_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
				
		$this->form_validation->set_rules('C_E_NAME', 'English Name', 'trim|required|max_length[80]');
		$this->form_validation->set_rules('C_C_NAME', 'Chinese Name', 'trim|max_length[80]');
	    $this->form_validation->set_rules('SURGICAL_RATING', 'Surgical Rate', 'trim|numeric');

	    $this->form_validation->set_rules('E_ADDR1', 'E ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR2', 'E ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR3', 'E ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR4', 'E ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_ADDR5', 'E ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('E_DISTRICT', 'E DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR1', 'C ADDR1', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR2', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR3', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR2', 'C ADDR4', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_ADDR5', 'C ADDR5', 'trim|max_length[80]');
	    $this->form_validation->set_rules('C_DISTRICT', 'C DISTRICT', 'trim|max_length[80]');
	    $this->form_validation->set_rules('BILLING_DEPT_NAME', 'BILLING DEPT NAME', 'trim|max_length[80]');
	    $this->form_validation->set_rules('DIAG_CODE_STANDARD', 'DIAG CODE STANDARD', 'trim|max_length[80]');


   if ($this->form_validation->run()) {

		$JOIN_DATE =  $this->input->post('JOIN_DATE');
		if($JOIN_DATE == ''||$JOIN_DATE == NULL){
			$JOIN_DATE = null;
		}

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));


			$save_data = [
				'E_NAME' => $this->input->post('C_E_NAME'),
				'C_NAME' => $this->input->post('C_C_NAME'),
				'JOIN_DATE' => $JOIN_DATE,
				'E_ADDR1' => $this->input->post('E_ADDR1'),
				'E_ADDR2' => $this->input->post('E_ADDR2'),
				'E_ADDR3' => $this->input->post('E_ADDR3'),
				'E_ADDR4' => $this->input->post('E_ADDR4'),
				'E_ADDR5' => $this->input->post('E_ADDR5'),
				'E_DISTRICT' => $this->input->post('E_DISTRICT'),
				'C_ADDR1' => $this->input->post('C_ADDR1'),
				'C_ADDR2' => $this->input->post('C_ADDR2'),
				'C_ADDR3' => $this->input->post('C_ADDR3'),
				'C_ADDR4' => $this->input->post('C_ADDR4'),
				'C_ADDR5' => $this->input->post('C_ADDR5'),
				'C_DISTRICT' => $this->input->post('C_DISTRICT'),
				'BILLING_DEPT_NAME' => $this->input->post('BILLING_DEPT_NAME'),
				'SURGICAL_RATING' => $this->input->post('SURGICAL_RATING'),
				'DIAG_CODE_STANDARD' => $this->input->post('DIAG_CODE_STANDARD'),
			];

			//insert business partner contacts
			// if(!empty(array_filter($Contact_E_NAME))&&!empty(array_filter($Contact_C_NAME))){

		    $CONTACT_NO = $this->input->post('CONTACT_NO');
		    $save_contacts_sum = 0;
			for ($i=0; $i <count( $CONTACT_NO) ; $i++) { 
						$save_contacts = [
							'E_NAME' =>$this->input->post('Contact_E_NAME['.$i.']'),
							'C_NAME' => $this->input->post('Contact_C_NAME['.$i.']'),
							'TITLE' => $this->input->post('TITLE['.$i.']'),
							'DEPARTMENT' =>$this->input->post('DEPARTMENT['.$i.']'),
							'TEL' =>$this->input->post('TEL['.$i.']'),
							'FAX' =>$this->input->post('FAX['.$i.']'),
							'EMAIL' =>$this->input->post('EMAIL['.$i.']')
						];
						$this->db->where('CARD_CODE',$id);
						$this->db->where('CONTACT_NO',$i+1);
						$this->db->update('card_contact',$save_contacts);
						$res = $this->db->affected_rows();
						$save_contacts_sum =  $save_contacts_sum + $res;
					}

		    $new_contact = $this->input->post('CONTACT_NO_new');
		if ($new_contact>0) {
	 		for ($i=0; $i < count($new_contact); $i++) { 
						$save_contacts2 = [
								'CARD_CODE' =>$id,
								'CONTACT_NO' => $this->input->post('CONTACT_NO_new['.$i.']'),
								'E_NAME' => $this->input->post('Contact_E_NAME_new['.$i.']'),
								'C_NAME' => $this->input->post('Contact_C_NAME_new['.$i.']'),
								'TITLE' => $this->input->post('TITLE_new['.$i.']'),
								'DEPARTMENT' =>$this->input->post('DEPARTMENT_new['.$i.']'),
								'TEL' =>$this->input->post('TEL_new['.$i.']'),
								'FAX' =>$this->input->post('FAX_new['.$i.']'),
								'EMAIL' =>$this->input->post('EMAIL_new['.$i.']')
					];
							$this->db->insert('card_contact',$save_contacts2);
							$res = $this->db->affected_rows();
							$save_contacts_sum =  $save_contacts_sum + $res;
			}
		}
    
			$save_card = $this->model_card->change($id, $save_data);
            

			if ($save_card||$save_contacts_sum) {

				$currentTime = date('Y-m-d H:i:s');

				$save_data =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $currentTime
					];
				$this->db->where('CARD_CODE', $id);
        		$this->db->update('card', $save_data);
                
                for($i=0; $i<3 ; $i++){
                	$save_data1 =[ 
				    'LAST_MODIFIER' => $user, 
					'LAST_UPDATE' => $currentTime
					];
                	$this->db->where('CARD_CODE',$id);
					$this->db->where('CONTACT_NO',$i+1);
					$this->db->update('partner_contact',$save_data1);
                }
             
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/card', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/card');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/card');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Business Partners
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('card_delete');

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
            set_message('Business Partner has been deleted.', 'success');
		} else {
            set_message('Error delete card.', 'error');
		}

		redirect('administrator/card');
	}
 
		/** 
	* View view Business Partners
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('card_view');
		$this->data['card'] = $this->model_card->find($id);
		$this->data['doctor_cards'] = $this->model_card->find_Doctor_Cards($id);

		// $this->data['card'] = $this->model_card->find_all_partnerContracts($id)['results'];
		// $this->data['card_class_counts'] = $this->model_card->find_all_partnerContracts($id)['totals'];
       
        $this->data['CLASS_CODES'] = $this->model_card->getCardClass($id)['classes'];

	    $this->data['ACTIVE_CARDS'] = $this->model_card->getActiveCard($id);
	    
	   	$this->data['ACTIVE_FEES'] = $this->model_card->find_Active_AgreedFee($id);

	   	$this->data['BP_STATUS'] = $this->model_card->find_status($id);
		
		$this->data['card_contacts'] = $this->model_card->find_CARD_Contacts($id);

		$this->template->title('Business Partner Detail');
		$this->render('backend/standart/administrator/card/card_view', $this->data);
	}


    public function getCard(){
    	$CARD_CODE = $this->input->get('CARD_CODE');
    	$CLASS_CODE = $this->input->get('CLASS_CODE');
    	$status = $this->input->get('status');
        
        // array_push($selected_field,$CLASS_CODE,$status);
    	$array = array('CLASS_CODE' => $CLASS_CODE, 'STATUS' => $status);

        $table_name='card_class';

    	$result =$this->model_card->get_Filter_Result($CARD_CODE,$table_name,$array);

    	if (count($result)>0) {

    			$this->data['size'] = count($result);

        //get according agreed fee
        if (count($result)==1) {
 				$this->db->select('*');
 				$this->db->from('agreed_fee');
		        $this->db->where('CARD_CODE',$CARD_CODE);
		        $this->db->where('CLASS_CODE',$CLASS_CODE);
		        $query = $this->db->get();

		        $this->data['result_fee'] = $query->result_array();
        }
        else{
        		$CLASS_CODE = array();
		        foreach ($result as $card) {
		        	array_push($CLASS_CODE, $card['CLASS_CODE']);
		        }
		        $CLASS_CODE= array_unique( $CLASS_CODE);
		        $this->db->select('*');
		        $this->db->where_in('CLASS_CODE', $CLASS_CODE);
		        $this->db->where('CARD_CODE',$CARD_CODE);
		        $query = $this->db->get('agreed_fee');
		        $this->data['result_fee'] = $query->result_array();
 
        }


        	$this->data['filtered_cards'] = $result;


    	}


    	else{
    	 $this->data['message']='fail';
    	}

        // $this->data['filtered_cards'] = 'card1';
    	echo json_encode($this->data);
    }
    public function getCard_reset(){
    	$CARD_CODE = $this->input->get('CARD_CODE');

    	$this->db->select('*');
    	$this->db->FROM('card_class');
    	$this->db->where('CARD_CODE',$CARD_CODE);
    	$query = $this->db->get();
    	$this->data['cards']=$query->result_array();


    	$this->db->select('*');
    	$this->db->from('agreed_fee');
    	$this->db->where('CARD_CODE',$CARD_CODE);
    	$query = $this->db->get();
    	$this->data['fees'] = $query->result_array();

    	echo json_encode($this->data);

  
    }

	public function getAgreedfee(){

		$CARD_CODE = $this->input->get('CARD_CODE');
		$CLASS_CODE = $this->input->get('CLASS_CODE_2');
		$m_type = $this->input->get('m_type');

		$array = array('CLASS_CODE' => $CLASS_CODE ,'TYPE' =>$m_type);

		$table_name='agreed_fee';

		$this->data['selectedFees'] = $this->model_card->get_Filter_Result($CARD_CODE, $table_name, $array);

		echo json_encode($this->data);
	}
	

	/**
	* delete Business Partners
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$card = $this->model_card->find($id);

		
		
		return $this->model_card->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('card_export');

		$this->model_card->export('card', 'card');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('card_export');

		$this->model_card->pdf('card', 'card');
	}
}


/* End of file card.php */
/* Location: ./application/controllers/administrator/Business Partner.php */