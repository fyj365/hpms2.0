<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Business Partner Controller
*| --------------------------------------------------------------------------
*| Business Partner site
*| 
*/
class company extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_company');
	}
  
	/**
	* show all Business Partners
	*
	* @var $offset String 
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('company_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['field'] = $field;
		$this->data['companys'] = $this->model_company->get($filter, $field, $this->limit_page, $offset);
		$this->data['company_counts'] = $this->model_company->count_all($filter, $field);
		$config = [
			'base_url'     => 'administrator/company/index/',
			'total_rows'   => $this->model_company->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		$this->template->title('Business Partner List');
		$this->render('backend/standart/administrator/company/company_list', $this->data);
		log_message('error', 'Some variable did not contain a value.');
	}
	
	/**
	* Add new companys
	*
	*/

	public function add()
	{

		$this->is_allowed('company_add');

		$this->db->select('DR_CODE');
		$this->data['doctor_codes'] = $this->db->get('doctor')->result();
		$this->data['doctor_code_total'] = $this->db->count_all_results('doctor');


		$this->db->select('DIAG_CODE_STANDARD');
		$this->db->group_by('DIAG_CODE_STANDARD');
		$this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();

		$this->template->title('Company New');
		$this->render('backend/standart/administrator/company/company_add', $this->data);
	}
   public function findDoctorType(){
   	   $doctor_code = $this->input->get('doctor_code');

   	   $this->data['doctor'] = $doctor_code;

   	   $this->db->select('TYPE1,TYPE2,TYPE3');

   	   $this->db->from('doctor');

   	   $this->db->where('DR_CODE', $doctor_code);

   	   $this->data['doctor_types']=  $this->db->get()->row_array();

   	   echo json_encode($this->data);

   }
	/**
	* Add New Business Partners
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('company_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}
 
		// $this->form_validation->set_rules('COM_ID', 'Partner Code', 'trim|required');
		$this->form_validation->set_rules('C_E_NAME', 'English Name', 'trim|required');
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

	        // $COM_ID = $this->input->post('COM_ID');
	        $company_name = $this->input->post('C_E_NAME');
			$save_data = [
				// 'COM_ID' => $COM_ID,
				'E_NAME' => $company_name,
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
		    $com_id = $this->model_company->store($save_data);


		    if ($com_id>0) {
				//insert business partner contacts
				$Contact_E_NAME = $this->input->post('Contact_E_NAME');
				$Contact_C_NAME = $this->input->post('Contact_C_NAME');
			   // if(!empty(array_filter($Contact_E_NAME))){
						for ($i=0; $i <3 ; $i++) { 
							$save_contacts = [
							'CONTACT_NO' =>$i+1,
							'COM_ID' =>  $com_id,
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
							$this->db->insert('com_contact',$save_contacts);
						}
		    }

           
	     //       $doctor_code = $this->input->post('DR_CODE');
	     //       $partner_doctor_code = $this->input->post('PARTNER_DR_CODE');
	     //       $loc_code = $this->input->post('LOC_CODE');
	     //       $doctor_term = $this->input->post('D_TERM_DATE');
	     //       if (strlen(implode($doctor_code))!=0){
                    
      //               for ($i=0; $i <count($doctor_code) ; $i++) { 

      //                  if ($doctor_code[$i]!='') {
      //               	   $doctor_type = $this->input->post($doctor_code[$i].'_doctor_type');
                       		
      //                  	   $type1 = (isset($doctor_type[0]))?$doctor_type[0]:'';
      //                      $type2 = (isset($doctor_type[1]))?$doctor_type[1]:'';
      //                      $type3 = (isset($doctor_type[2]))?$doctor_type[2]:'';
 
      //      				$save_doctors =[
						//  	'COM_ID' => $COM_ID,
						 	
						//  	'DR_CODE' => $doctor_code[$i],
						//  	'PARTNER_DR_CODE' =>  $partner_doctor_code[$i],
						//  	'TYPE1' => $type1,
						//  	'TYPE2' => $type2,
						//  	'TYPE3' => $type3,
						//  	'LOC_CODE' => $loc_code[$i],
						//  	'TERM_DATE' => $doctor_term[$i],
						//     'CREATOR' =>$user,
						// 	'CREATE_DATE' =>  date('Y-m-d H:i:s'),
						// 	'LAST_MODIFIER' => $user,
						// 	'LAST_UPDATE'	=>date('Y-m-d H:i:s')
						// 	];
					 //       $this->db->insert('partner_doctor', $save_doctors);

						// }
      //               }
	           // }
 

			if ($com_id) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $com_id;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/company/edit/' . $com_id, 'Edit Business Partner').' or  '.anchor('administrator/company', ' Go back to list').' or '.anchor('administrator/partner_company/add_1/'.$com_id ,'add company');
				} else {
					set_message('Your data has been successfully stored into the database. '.anchor('administrator/company/edit/' . $$com_id, 'Edit Business Partner'), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/company');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/company');
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
		date_default_timezone_set('Asia/Hong_Kong');
		
		$this->is_allowed('company_update');

		$this->db->select('DIAG_CODE_STANDARD');
		$this->db->group_by('DIAG_CODE_STANDARD');
		$this->data['diagnosis_codes'] = $this->db->get('diagnosis_code')->result();

		// $this->data['doctor_codes'] = $this->db->get('doctor')->result();
		// $this->data['doctor_code_total'] = $this->db->count_all_results('doctor');
		$this->data['company'] = $this->model_company->find($id);
		// $this->data['partner_companys'] = $this->model_company->find_all_partnerContracts($id)['results'];
		// $this->data['partner_company_counts'] = $this->model_company->find_all_partnerContracts($id)['totals'];

		$this->data['com_contacts'] = $this->model_company->find_COM_Contacts($id);

		// $this->data['partner_doctor_contract_counts'] = $this->model_company->find_all_partnerDoctors($id)['totals'];
	   
	   	$this->data['BP_STATUS'] = $this->model_company->find_status($id);

		$this->template->title('Company Update');
		$this->render('backend/standart/administrator/company/company_update', $this->data);
	}

	/**
	* Update Business Partners
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('company_update', false)) {
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
			$save_company = $this->model_company->change($id, $save_data);

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
						$this->db->where('COM_ID',$id);
						$this->db->where('CONTACT_NO',$i+1);
						$this->db->update('com_contact',$save_contacts);
						$res = $this->db->affected_rows();
						$save_contacts_sum =  $save_contacts_sum + $res;
					}

		    $new_contact = $this->input->post('CONTACT_NO_new');
		if ($new_contact>0) {
	 		for ($i=0; $i < count($new_contact); $i++) { 
						$save_contacts2 = [
								'COM_ID' =>$id,
								'CONTACT_NO' => $this->input->post('CONTACT_NO_new['.$i.']'),
								'E_NAME' => $this->input->post('Contact_E_NAME_new['.$i.']'),
								'C_NAME' => $this->input->post('Contact_C_NAME_new['.$i.']'),
								'TITLE' => $this->input->post('TITLE_new['.$i.']'),
								'DEPARTMENT' =>$this->input->post('DEPARTMENT_new['.$i.']'),
								'TEL' =>$this->input->post('TEL_new['.$i.']'),
								'FAX' =>$this->input->post('FAX_new['.$i.']'),
								'EMAIL' =>$this->input->post('EMAIL_new['.$i.']')
					];
							$this->db->insert('com_contact',$save_contacts2);
							$res = $this->db->affected_rows();
							$save_contacts_sum =  $save_contacts_sum + $res;
			}
		}
    
            

			if ($save_company||$save_contacts_sum) {

				$currentTime = date('Y-m-d H:i:s');

				$save_data =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $currentTime
					];
				$this->db->where('COM_ID', $id);
        		$this->db->update('company', $save_data);
                
                for($i=0; $i<3 ; $i++){
                	$save_data1 =[ 
				    'LAST_MODIFIER' => $user, 
					'LAST_UPDATE' => $currentTime
					];
                	$this->db->where('COM_ID',$id);
					$this->db->where('CONTACT_NO',$i+1);
					$this->db->update('com_contact',$save_data1);
                }
             
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/company', ' Go back to list');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/company');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/company');
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
		$this->is_allowed('company_delete');

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
            set_message('Error delete company.', 'error');
		}

		redirect('administrator/company');
	}
 
		/** 
	* View view Business Partners
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('company_view');
		$this->data['company'] = $this->model_company->find($id);
		// $this->data['partner_doctor_contracts'] = $this->model_company->find_all_partnerDoctors($id)['results'];
		// $this->data['partner_doctor_contract_counts'] = $this->model_company->find_all_partnerDoctors($id)['totals'];

		// $this->data['partner_companys'] = $this->model_company->find_all_partnerContracts($id)['results'];
		// $this->data['partner_company_counts'] = $this->model_company->find_all_partnerContracts($id)['totals'];
       
        // $this->data['CLASS_CODEs'] = $this->model_company->getcompanytypes($id)['CLASS_CODEs'];
        // $this->data['CLASS_CODEs_num'] = $this->model_company->getcompanytypes($id)['totals'];


	    // $this->data['Active_BP_companys'] = $this->model_company->getActivecompany($id)['Active_companys'];
	    // $this->data['Active_companys_num'] = $this->model_company->getActivecompany($id)['Active_companys_num'];
	    
	   	// $this->data['Active_agreed_fees'] = $this->model_company->find_Active_AgreedFee($id)['results'];
	   	// $this->data['Active_agreed_fee_counts'] = $this->model_company->find_Active_AgreedFee($id)['totals'];

	   	$this->data['BP_STATUS'] = $this->model_company->find_status($id);
		
		$this->data['company_contacts'] = $this->model_company->find_COM_Contacts($id);
		$this->template->title('Company Detail');
		$this->render('backend/standart/administrator/company/company_view', $this->data);
	}


    public function getcompany(){
    	$COM_ID = $this->input->get('COM_ID');
    	$CLASS_CODE = $this->input->get('CLASS_CODE');
    	$status = $this->input->get('status');
        
        // array_push($selected_field,$CLASS_CODE,$status);
    	$array = array('CLASS_CODE' => $CLASS_CODE, 'STATUS' => $status);

        $table_name='partner_company';

    	$result =$this->model_company->get_Filter_Result($COM_ID,$table_name,$array);

    	if (count($result)>0) {

    			$this->data['size'] = count($result);

        //get according agreed fee
        if (count($result)==1) {
     //    	  	$array = array('COM_ID'=>$COM_ID,'CLASS_CODE'=>$CLASS_CODE);
 				$this->db->select('*');
 				$this->db->from('agreed_fee');
		        $this->db->where('COM_ID',$COM_ID);
		        $this->db->where('CLASS_CODE',$CLASS_CODE);
		        $query = $this->db->get();
				// $query="SELECT * FROM agreed_fee WHERE (COM_ID=? AND CLASS_CODE=?)";
		  		//$array = array();       
		 	    //$array = ['COM_ID' => $COM_ID,'CLASS_CODE' =>$CLASS_CODE];
		  		//$result2 = $this->db->query($query,$array);
		        $this->data['result_fee'] = $query->result_array();
        }
        else{
        		$CLASS_CODE = array();
		        foreach ($result as $company) {
		        	array_push($CLASS_CODE, $company['CLASS_CODE']);
		        }
		        $CLASS_CODE= array_unique( $CLASS_CODE);
		        $this->db->select('*');
		        $this->db->where_in('CLASS_CODE', $CLASS_CODE);
		        $this->db->where('COM_ID',$COM_ID);
		        $query = $this->db->get('agreed_fee');
		        $this->data['result_fee'] = $query->result_array();
 
        }


        	$this->data['filtered_companys'] = $result;


    	}


    	else{
    	 $this->data['message']='fail';
    	}

        // $this->data['filtered_companys'] = 'company1';
    	echo json_encode($this->data);
    }
    public function getcompany_reset(){
    	$COM_ID = $this->input->get('COM_ID');

    	$this->db->select('*');
    	$this->db->FROM('partner_company');
    	$this->db->where('COM_ID',$COM_ID);
    	$query = $this->db->get();
    	$this->data['companys']=$query->result_array();


    	$this->db->select('*');
    	$this->db->from('agreed_fee');
    	$this->db->where('COM_ID',$COM_ID);
    	$query = $this->db->get();
    	$this->data['fees'] = $query->result_array();

    	echo json_encode($this->data);

  
    }

	public function getAgreedfee(){

		$COM_ID = $this->input->get('COM_ID');
		$CLASS_CODE = $this->input->get('CLASS_CODE_2');
		$m_type = $this->input->get('m_type');

		$array = array('CLASS_CODE' => $CLASS_CODE ,'TYPE' =>$m_type);

		$table_name='agreed_fee';

		$this->data['selectedFees'] = $this->model_company->get_Filter_Result($COM_ID, $table_name, $array);

		echo json_encode($this->data);
	}
	

	/**
	* delete Business Partners
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$company = $this->model_company->find($id);

		
		
		return $this->model_company->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('company_export');

		$this->model_company->export('company', 'company');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('company_export');

		$this->model_company->pdf('company', 'company');
	}
}


/* End of file company.php */
/* Location: ./application/controllers/administrator/Business Partner.php */