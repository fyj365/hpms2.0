<?php

class Patient_upload extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			
			$this->load->helper(array('form', 'url'));
			$this->load->library('excel');
			$this->load->model('model_patient');
	}

	//Main
	public function do_upload()
	{
		
		$CARD_CODE = $this->input->post("CARD_CODE");
		
		//strtolower: Make sure the switch can match the selected value correctly
		switch (strtolower($CARD_CODE)) {
			case "mass":
				$this->upload_Mass();
				break;
			case "ka":
				$this->upload_KA();
				break;
			case "gen":
				$this->upload_Gen();
				break;
			case "tokio":
				$this->upload_Tokio();
				break;
			case "now":
				$this->upload_NowHealth();
				break;
			case "scb":
				$this->upload_SCB();
				break;
			default:
				echo "Please select a partner";
		}
		
		echo "<br><a href='http://127.0.0.1/cicool/administrator/patient/patient_upload'> Go Back Patient upload</a>";

	}
	//end do_upload method
	
	
	
	//Check whether the patient already existed
	public function check_patient($CARD_CODE, $POLICY_NO, $PATIENT_NAME, $PATIENT_NO){

		$this->db->where('CARD_CODE', $CARD_CODE);
		$this->db->where('POLICY_NO', $POLICY_NO);
		$this->db->where('PATIENT_NAME', $PATIENT_NAME);
		$this->db->where('PATIENT_NO', $PATIENT_NO);
		$this->db->where('STATUS', 'Active');
		
		$query = $this->db->get('patient');
		
		if ($query->num_rows() > 0){
			$query = $query->row();
			
			return $query->AUTO_NO;
			
		}else{
			return 0;
		}

	}
	
	
	public function insert_effective_date($save_patient, $START_DATE, $TERM_DATE, $user){

		//Get effective no
		$this->db->select_max('PATIENT_EFFECTIVE_NO');
		$this->db->where('PATIENT_AUTONO', $save_patient);
		$query = $this->db->get('patient_effective_date');
		
		if ($query->num_rows() > 0){
			$query = $query->row();

				//Terminate previous contract first
				$this->db->set('STATUS', 'Terminate');
				$this->db->set('TERM_DATE', date('Y-m-d'));
				$this->db->set('REMARK', 'Terminate by inserted new Effective Date');
				$this->db->where('PATIENT_AUTONO', $save_patient);
				$this->db->where('STATUS', 'Active');
				$this->db->update('patient_effective_date');

			    
			    $effective_no = ($query->PATIENT_EFFECTIVE_NO)+1;


		}else{
			    $effective_no = 1;
		}
		
		$today = date("Y/m/d");

		if ($START_DATE!=''&&$START_DATE > $today ){
			$status = "Not Start";
		}else if ($TERM_DATE!=''&&$TERM_DATE < $today){
			$status = "Terminate";
		}else  {
		    $status = "Active";

		}

		$save_data = [
			'PATIENT_AUTONO' => $save_patient,
			'PATIENT_EFFECTIVE_NO' => $effective_no,
			'ORIGINAL_TERM_DATE' => $TERM_DATE,
			'START_DATE' => $START_DATE,
			'TERM_DATE' => $TERM_DATE,
			'STATUS' => $status,
			'CREATOR' => $user,
			'CREATE_DATE' => date('Y-m-d H:i:s'),
			'LAST_MODIFIER' => $user,
			'LAST_UPDATE' => date('Y-m-d H:i:s'),
		];

		$this->db->insert('patient_effective_date', $save_data);
		return $this->db->affected_rows();
	}
	
	//Print Error and Successful log
	public function record_result($error_list, $success_list){

		//patient data error list
		if (count($error_list) == 0){
			echo "** No insert error **";
		}else{

			echo "<b>Error log</b><br><br>";
				
			if (count($error_list) > 0 && !empty($error_list)){
				echo "Insert error<br>";
				foreach ($error_list as $index=>$error){
					if (!empty($error)){
						echo ($index+1)." : $error<br><br>";
					}
				}
			}
				
			
		}
		
		echo "<hr>";
		echo "<b>Successful log</b>";
		echo "<br><br>";
		
		//patient data insert success list
		$count_total = count($success_list);

		if ($count_total > 0){
			echo "Total $count_total records insert successful:<br><br>";
			foreach ($success_list as $index=>$success){
				if (!empty($success)){
					echo ($index+1)." : $success<br>";
				}
			}
		}else{
			echo "No record insert successful";
		}
	}
	
	/*-----------------------------------------------------------	Mass -----------------------------------------------------------*/
	public function upload_Mass(){

		$sourceList = array();
		
		//check if user uploaded less or more than 1 files
		if (count($_FILES['excelFile']['name']) != 1){
			$file_num = false;
			echo "Upload Error: Incorrect File number. <br><br>Please upload one file only.";
		}else{
			$file_num = true;
		}
		
		//check if submit have empty file
		$hv_file = false;
		
		if ($file_num){
			foreach($_FILES['excelFile']['tmp_name'] as $index=>$file){
				if (isset($file) && !empty($file)){
					$sourceList[$index] = PHPExcel_IOFactory::load($file);
					$hv_file = true;
				}else{
					echo "Upload Error: File empty. <br><br>Please upload file again.";
					$hv_file = false;
					break;
				}
			}
		}

		$correct_type = false;
		
		
		//check file type
		if ($file_num && $hv_file){

			foreach($_FILES['excelFile']['name'] as $index=>$file){
				$type = end((explode(".", $file)));
				if ($type != "txt"){
					echo "Upload Error: File wrong type. <br><br>Please upload file again.";
					break;
				}else{
					$correct_type = true;
				}
			}
		}
		
		//show patient details
		if ($correct_type){
			
			$patient = fopen($_FILES['excelFile']['tmp_name'][0], 'r') or die("Unable to open Patient data");
			

			$CARD_CODE = "Mass Mutual";
			
			$error_list = array();
			$success_list = array();
			
			$user = $this->input->post('user');
			
			while(!feof($patient)){

				$m_line = fgets($patient);
				
				if (substr($m_line, 0, 3) != "HUM"){
					if (substr($m_line, 0, 3) != ""){
						array_push($error_list, $m_line);
						break;
					}else{
						break;
					}
				}
				
				$POLICY_NO = substr($m_line, 4, 10);
				$PATIENT_NO = substr($m_line, 14, 10);
				$PATIENT_NAME = substr($m_line, 24, 40);
				$GENDER = substr($m_line, 64, 1);
				$PLAN_CODE = substr($m_line, 65, 2);


				$START_DATE = substr($m_line, 159, 10);
				$TERM_DATE = substr($m_line, 169, 10);
				
				$GP = substr($m_line, 69, 2);
			    $SP = substr($m_line, 73, 2);
			    $G_Char = substr($m_line, 70,1);
			    $S_Char = substr($m_line, 74,1);

			    if ($GP=='GP') {
			    	$GP_COPAY = substr($m_line,71,2 );
			    	  
			    	 if ($SP=='SP') {
			         $SP_COPAY = substr($m_line, 75, 2);
			         }
			         else if ( $S_Char!='P') {
                     $SP_COPAY = substr($m_line, 74, 3);
                     }
			    }else if ($G_Char!='P'){
                     
                     $GP_COPAY = substr($m_line,70,3);
	                
	                 if ($SP=='SP') {
			         $SP_COPAY = substr($m_line, 75, 2);
			         }
                     else if ( $S_Char!='P') {
                     $SP_COPAY = substr($m_line, 74, 3);
                     }
			    }

				//Check whether the patient already exists
				$exist_patient = $this->check_patient($CARD_CODE, $POLICY_NO, $PATIENT_NAME, $PATIENT_NO);
				
				//if $exist_patient is 0, insert the data as new patient
				if ($exist_patient == 0){
					
					$save_data = [
						'CARD_CODE' => $CARD_CODE,
						'PATIENT_NO' => $PATIENT_NO,
						'POLICY_NO' => $POLICY_NO,
						'PATIENT_NAME' => $PATIENT_NAME,
						'GENDER' => $GENDER,
						'PLAN_CODE' => $PLAN_CODE,
						'GP_COPAY' => $GP_COPAY,
						'SP_COPAY' => $SP_COPAY,
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE' => date('Y-m-d H:i:s'),
					];
					
					$this->db->insert('patient', $save_data);
					
					$save_patient = $this->db->insert_id();
					
				}else{
					$save_patient = $exist_patient;
				}

				//Insert patient effective date
				if ($save_patient){
					array_push($success_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
					
					
					//Insert patient effective date
					$save_effective = $this->insert_effective_date($save_patient, $START_DATE, $TERM_DATE, $user);
					
					if (!$save_effective){
						array_push($error_list, "Insert Effective Date Fail: $PATIENT_NAME &nbsp; ($PATIENT_NO) ");
					}
					
				}else{
					array_push($error_list, $m_line);
				}

			}

			$this->record_result($error_list, $success_list);

		}
	}
	/*-----------------------------------------------------------	End Mass -----------------------------------------------------------*/
	
	
	/*-----------------------------------------------------------	KA-QHMS -----------------------------------------------------------*/
	
	public function upload_KA(){
		$sourceList = array();


		//check if user uploaded less or more than 1 files
		if (count($_FILES['excelFile']['name']) != 1){
			$file_num = false;
			echo "Upload Error: Incorrect File number. <br><br>Please upload one file only.";
		}else{
			$file_num = true;
		}
		
		//check if submit have empty file
		$hv_file = false;
		
		if ($file_num){
			foreach($_FILES['excelFile']['tmp_name'] as $index=>$file){
				if (isset($file) && !empty($file)){
					$sourceList[$index] = PHPExcel_IOFactory::load($file);
					$hv_file = true;
				}else{
					echo "Upload Error: File empty. <br><br>Please upload file again.";
					$hv_file = false;
					break;
				}
			}
		}
		
		//check file type
		$correct_type = false;
		
		if ($file_num && $hv_file){
			
			foreach($_FILES['excelFile']['name'] as $index=>$file){
				$type = end((explode(".", $file)));
				if ($type != "xlsx" & $type != "xls" ){
					$correct_type = false;
					echo "Upload Error: File wrong type. <br><br>Please upload file again.";
					break;
				}else{
					$correct_type = true;
				}
			}
		}
		
		//check file column name
		
		$real_file = false;
		if ($correct_type){
			
			$column = [
			"Empl ID", "Bgn Dt", "End Dt", "Covrg Code", "Relationship", "Last Name", 
			"Middle Name", "First Name", "Full Name", "DRN", 
			"Ben Plan", "Descr", "NID", "Passpt", "Birthdate", 
			"Age", "Department"];
			
			$patient = $sourceList[0]->getActiveSheet()->toArray(null);
			

			for ($i=0; $i<16; $i++){
				
				if ($patient[6][$i] != $column[$i]){
					$real_file = false;
					break;
				}else{
					$real_file = true;
				}
				
			}
			
			if (!$real_file){
				echo "Upload Error: Incorrect Patient data format.<br><br>Please check whether the file columns are consistent with the below format:<br>";
				foreach ($column as $col){
					echo $col."<br>";
				}
			}
		}
				
		//Insert patient data
		if ($real_file){
			$CARD_CODE = "KA-QHMS";
			$STATUS = 'Active';
			
			$error_list = array();
			$success_list = array();
			
			$user = $this->input->post('user');
			
			for ($i=7; $i<(count($patient)-2); $i++){
				
				//Check if the column[0] include 'End at', stop the program
				$end = $patient[$i][0];
				
				if (strpos($end, 'End at') !== false) {
					break;
				}

				$PATIENT_NO = $patient[$i][9];
				$START_DATE = $patient[$i][1];
				$START_DATE = strtotime($START_DATE);
				$START_DATE = date('Y-m-d',$START_DATE);
				
				$TERM_DATE = $patient[$i][2];
				if ($TERM_DATE != ""){
					$TERM_DATE = strtotime($TERM_DATE);
					$TERM_DATE = date('Y-m-d', $TERM_DATE);
				}
				
				
				$PATIENT_NAME = $patient[$i][8];
				$DEPD_CODE = $patient[$i][4];
				$PLAN_CODE = $patient[$i][10];
				
				$DOB = $patient[$i][14];
				$DOB = strtotime($DOB);
				$DOB = date('Y-m-d', $DOB);
				
				
				$POLICY_NO = $PLAN_CODE;

					
				//Check whether the patient already exists
				$exist_patient = $this->check_patient($CARD_CODE, $POLICY_NO, $PATIENT_NAME, $PATIENT_NO);
				
				//if $exist_patient is 0, insert the data as new patient
				if ($exist_patient == 0){
					$save_data = [
						'CARD_CODE' => $CARD_CODE,
						'PATIENT_NO' => $PATIENT_NO,
						'POLICY_NO' => $POLICY_NO,
						'PATIENT_NAME' => $PATIENT_NAME,
						'DEPD_CODE' =>$DEPD_CODE,
						'DOB' => $DOB,
						'PLAN_CODE' => $PLAN_CODE,
						'CREATOR' => $user,
						'CREATE_DATE' => date('Y-m-d H:i:s'),
						'LAST_MODIFIER' => $user,
						'LAST_UPDATE' => date('Y-m-d H:i:s'),
					];
					
					$this->db->insert('patient', $save_data);
					
					$save_patient = $this->db->insert_id();
					
				}else{
					$save_patient = $exist_patient;
				}
				

				if ($save_patient){
					array_push($success_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
					
					
					//Insert patient effective date
					$save_effective = $this->insert_effective_date($save_patient, $START_DATE, $TERM_DATE, $user);
				
					if (!$save_effective){
						array_push($error_list, "Insert Effective Date Fail: $PATIENT_NAME &nbsp; ($PATIENT_NO) ");
					}
					
				}else{
					array_push($error_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
				}

				
			}

			$this->record_result($error_list, $success_list);
			
		}
		//End insert data
	}
	/*-----------------------------------------------------------	End KA-QHMS -----------------------------------------------------------*/
	
	
	/*-----------------------------------------------------------	Generali -----------------------------------------------------------*/
	
	
	//Not finish insert into db
	
	public function upload_Gen(){
		$sourceList = array();
		$dataList = array();
		$name = array();
		
	//check if submit have empty file
		foreach($_FILES['excelFile']['tmp_name'] as $index=>$file){
			if (isset($file) && !empty($file)){
				$sourceList[$index] = PHPExcel_IOFactory::load($file);
				$name[$index] = preg_replace('/[^\p{L}\p{N}\s]/u', '', substr((basename($file)), 0, -5));
				$file_num = true;
			}else{
				$file_num = false;
				
				echo "Upload Error: File upload incorrectly. <br><br>Please upload ALL files again.";
			}
		}
		
		//check if user uploaded less than 2 files
		if ($file_num){
			if (count($_FILES['excelFile']['name']) != 2){
				$hv_file = false;
				echo "Upload Error: Incorrect File number. <br><br>Please upload correct files again.<br>1.Patient data (txt format) 2.Benefit table(xlsx / xls format)";
			}else{
				$hv_file = true;
				
			}
		}

		
		//check file type
		$correct_type = false;
		$benefit = null;
		$patient = null;
		
		if ($hv_file){

			foreach($_FILES['excelFile']['name'] as $index=>$file){
				if ($index == 0){
					$correct_type = true;
				}
				
				if ($correct_type){
					$type = end((explode(".", $file)));

					switch ($type){
						case "xlsx":
							
						case "xls":
							if ($benefit == null){
								$correct_type = true;
								$benefit = $sourceList[$index]->getActiveSheet()->toArray(null);
							}else{
								$correct_type = false;
								echo "Upload Error: File wrong type. <br><br>Please upload all files again.<br>1.Patient data (txt format) 2.Benefit table(xlsx / xls format)";
							}
							break;
						
						case "txt":
							if ($patient == null){
								$correct_type = true;
								$patient = fopen($_FILES['excelFile']['tmp_name'][$index], 'r') or die("Unable to open Patient data");
							}else{
								$correct_type = false;
								echo "Upload Error: File wrong type. <br><br>Please upload all files again.<br>1.Patient data (txt format) 2.Benefit table(xlsx / xls format)";
							}
							break;
							
						default:
							$correct_type = false;
							echo "Upload Error: File wrong type. <br><br>Please upload ALL files again.";
							break;
					
					}
				}
			}
		}
		
		
		//check patient data format
		if ($correct_type){

			$b_column = [
			"GLPOLNUM", "GLRENNO", "NAME", "EFFDATE", "EXPDATE", 
			"GLCLASS", "GLABBR01", "GLABBR02", "GLABBR03", "GLABBR04", 
			"GLABBR05", "GLABBR06", "GLABBR07", "GLABBR08", "GLABBR09", 
			"GLCOPAY01", "GLCOPAY02", "GLCOPAY03", "GLCOPAY04", "GLCOPAY05", 
			"GLCOPAY06", "GLCOPAY07", "GLCOPAY08", "GLCOPAY09", "GLSPMSG"
			];

			$real_excel = false;
			
			//check column number
			if ((count($benefit[0])-3) != count($b_column)){
				$column_num = false;
				echo "Upload Error: (Excel file) Incorrect Patient data format.<br><br>Please check whether the file columns are consistent with the below format:<br>";
				foreach ($b_column as $col){
					echo $col."<br>";
				}
			}else{
				$column_num = true;
			}

			if ($column_num){
				for ($i=0; $i<count($b_column); $i++){
					
					if (strtolower($benefit[0][$i]) != strtolower($b_column[$i])){
						$real_excel = false;
						echo "Upload Error: (Excel file) Incorrect Patient data format.<br><br>Please check whether the file columns are consistent with the below format:<br>";
						foreach ($b_column as $col){
							echo $col."<br>";
						}
						break;
					}else{
						$real_excel = true;
					}
					
				}
			}

			//show patient data directly
			if ($real_excel){
					
				$m_column = [5, 14, 19, 35, 37, 46, 55, 86, 107, 116, 118];
				$CARD_CODE = "GEN";
				$STATUS = 'Active';
				
				$error_list = array();
				$error_policy = array();
				$success_list = array();
            
            	$user = $this->input->post('user');

				while(!feof($patient)){
					$m_line = fgets($patient);

					if (substr($m_line, 0, 6) == "M|GEN|"){

						foreach ($m_column as $num){
							$checkstr = substr($m_line, $num, 1);
							$real_line = true;
							
							if ($checkstr != "|"){
								$real_line = false;
								
								array_push($error_list, $m_line);
								break;
							}
						}
						
						if ($real_line){

							$POLICY_NO = substr($m_line, 6, 8);
							$PATIENT_NO = substr($m_line, 20, 9);
							$DEPD_CODE = substr($m_line, 36, 1);
							
							$START_DATE = substr($m_line, 38, 8);
							$START_DATE_Y = substr($START_DATE, 0, 4);
							$START_DATE_M = substr($START_DATE, 4, 2);
							$START_DATE_D = substr($START_DATE, 6, 2);
							$START_DATE = $START_DATE_Y."/".$START_DATE_M."/".$START_DATE_D;
							
							$TERM_DATE = substr($m_line, 47, 8);
							$TERM_DATE_Y = substr($TERM_DATE, 0, 4);
							$TERM_DATE_M = substr($TERM_DATE, 4, 2);
							$TERM_DATE_D = substr($TERM_DATE, 6, 2);
							$TERM_DATE = $TERM_DATE_Y."/".$TERM_DATE_M."/".$TERM_DATE_D;
							
							$PATIENT_NAME = substr($m_line, 56, 30);
							$DOB = substr($m_line, 108, 8);
							$GENDER = substr($m_line, 117, 1) ? "F" : "M";
							$ACTION = substr($m_line, 176, 1);
							

							$PLAN_CODE = substr($m_line, 161, 5);
							
							//Remove char '0'	(e.g:0001A --> 1A)
							for ($i=0; $i<strlen($PLAN_CODE); $i++){
								if ($PLAN_CODE[$i] != "0"){
									$pos = $i;
									break;
								}
							}
							$PLAN_CODE = substr($PLAN_CODE, $pos);
							
							
							$hv_policy = false;
							$hv_plan_code = false;
							$REFERRAL = null;
							
							//If POLICY_NO & PLAN_CODE = equal, find the referral
							for ($i=1; $i<count($benefit); $i++){
								
								//If POLICY_NO = equal
								if ($benefit[$i][0] == $POLICY_NO){
									$hv_policy = true;
									
									//If PLAN_CODE = equal
									if ($hv_policy){
										if ($benefit[$i][5] == $PLAN_CODE){
											$hv_plan_code = true;
											$REFERRAL = str_replace("'", "\'", $benefit[$i][24]);
											break;
										}
									}
									
									
								}
							}
							
							//If referral cannot find in the Excel file
							//(May cause by the POLICY_NO or PLAN_CODE not match in the Excel file)
							if ($REFERRAL == null){
								$REFERRAL = "";
							}
							
							//Check whether the Policy No is correct
							// $contract = $this->check_contract($CARD_CODE, $POLICY_NO);
							   $contract =1;
							if ($contract != ""){
								
								//Check whether the patient already exists
								$exist_patient = $this->check_patient($CARD_CODE, $POLICY_NO, $PATIENT_NAME, $PATIENT_NO);
								

								//if $exist_patient is 0, insert the data as new patient
								if ($exist_patient == 0){
									$save_data = [
										'CARD_CODE' => $CARD_CODE,
										'PATIENT_NO' => $PATIENT_NO,
										'POLICY_NO' => $POLICY_NO,
										'PATIENT_NAME' => $PATIENT_NAME,
										'DEPD_CODE' =>$DEPD_CODE,
										'DOB' => $DOB,
										'GENDER' =>$GENDER,
										'PLAN_CODE' => $PLAN_CODE,
										'CREATOR' => $user,
										'CREATE_DATE' => date('Y-m-d H:i:s'),
										'LAST_MODIFIER' => $user,
										'LAST_UPDATE' => date('Y-m-d H:i:s'),
									];
									
									$this->db->insert('patient', $save_data);
									
									$save_patient = $this->db->insert_id();
									
								}else{
									$save_patient = $exist_patient;
								}


								if ($save_patient){
									array_push($success_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
									
									
									//Insert patient effective date
									$save_effective = $this->insert_effective_date($save_patient, $START_DATE, $TERM_DATE, $user);
									
									if (!$save_effective){
										array_push($error_list, "Insert Effective Date Fail: $PATIENT_NAME &nbsp; ($PATIENT_NO) ");
									}
									
								}else{
									array_push($error_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
								}
								
							}else{
								if(!in_array($POLICY_NO, $error_policy)){
									array_push($error_policy, "$POLICY_NO");
								}
								
								array_push($error_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
							}
							
						}

						$this->record_result($error_policy, $error_list, $success_list);

					}
				}
				//End read txt file

			}
			//End "real_excel" quote
			
		}
		//End "correct_type" quote

	}
	/*-----------------------------------------------------------	End Generali -----------------------------------------------------------*/
	
	/*-----------------------------------------------------------	Tokio marine -----------------------------------------------------------*/
	
	public function upload_Tokio(){
		$sourceList = array();
		$dataList = array();

		//check if user uploaded less or more than 1 files
		if (count($_FILES['excelFile']['name']) != 3){
			$file_num = false;
			echo "Upload Error: Incorrect File number. <br><br>Please upload three of Excel files.";
		}else{
			$file_num = true;
		}
		
		//check if submit have empty file
		$hv_file = false;
		
		if ($file_num){
			foreach($_FILES['excelFile']['tmp_name'] as $index=>$file){
				if (isset($file) && !empty($file)){
					$sourceList[$index] = PHPExcel_IOFactory::load($file);
					$dataList[$index] = $sourceList[$index]->getActiveSheet()->toArray(null);
					$hv_file = true;
				}else{
					echo "Upload Error: File empty. <br><br>Please upload file again.";
					$hv_file = false;
					break;
				}
			}
		}
		
		//check file type
		$correct_type = false;
		
		if ($file_num && $hv_file){
			
			foreach($_FILES['excelFile']['name'] as $index=>$file){
				$type = end((explode(".", $file)));
				if ($type != "xlsx" & $type != "xls" ){
					$correct_type = false;
					echo "Upload Error: File wrong type. <br><br>Please upload file again.";
					break;
				}else{
					$correct_type = true;
				}
			}
		}
		
		//check file column name
		
		$real_file = false;
		$waiver = null;
		$client = null;
		$member = null;
		
		if ($correct_type){
			
			$client_column = [
				"Client Name", "Policy No", "From", "To", 
				"Plan No", "Member List", "Cover", "Co payment"
			];
			
			$member_column = [
				"Plan Code", "Plan Desc", "Staff ID", "Member No.", "Member's Name", 
				"Role", "HKID No.", "Date of Birth", "Sex", "Age"
			];
			
			foreach ($dataList as $data){
				$column_num = count($data);
				echo $column_num."<br>";
				switch ($column_num){
					case 3:
						if ($waiver == null){
							$waiver = $data;
						}
						
						break;

					case 8:
						if ($client == null){
							foreach ($client_column as $index=>$c_column){
								if ($data[$index] == $c_column){
									echo $data[$index]." is ".$c_column."<br>";
									$client = $data;
								}else{
									echo $data[$index]." and ".$c_column."<br>";
									$client = null;
									break;
								}
							}
						}
						
						break;
						
					case 10:
						if ($member == null){
							foreach ($member_column as $index=>$m_column){
								if ($data[$index] == $m_column){
									echo $data[$index]." is ".$m_column."<br>";
									$member = $data;
								}else{
									echo $data[$index]." and ".$m_column."<br>";
									$member = null;
									break;
								}
							}
						}
						
						break;
						
					default:
						$real_file = false;
						break;	
				}
				
				if ($waiver == null || $client == null || $member == null){
					echo "Upload Error: File missing. <br>Please upload correct files again.<br>1.Client List 2.Waiver Letter 3.Member details";
					break;
				}else{
					$real_file = true;
				}

			}
		}
				
		//Insert patient data
		if ($real_file){
			$PLAN_CODE = array();
			$START_DATE = array();
			$TERM_DATE = array();
			
			$CARD_CODE = "TOKIO";

			
			$error_list = array();
			$success_list = array();
			
			$user = $this->input->post('user');
			
			
			for ($i=1; $i<count($client); $i++){
				$client_list = preg_replace('/[^\p{L}\p{N}\s]/u', '', $client[$i][0]);
				$client_list2 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $client[($i+1)][0]);
				
				if ($client_list == $member_f){


					//$i loop for get data from Client List
					$POLICY_NO = $client[$i][1];
					$START_DATE[$i] = $client[$i][2];
					$TERM_DATE[$i] = $client[$i][3];
					$PLAN_CODE[$i] = $client[$i][4];
					
					if ($client_list != $client_list2){
						break;
					}
				}

			}
			
			$PLAN_CODE = array_values(array_unique($PLAN_CODE));
			$START_DATE = array_values(array_unique($START_DATE));
			$TERM_DATE = array_values(array_unique($TERM_DATE));
			
			
			for ($h=0; $h<count($PLAN_CODE); $h++){
				for ($k=6; $k<count($member); $k++){
									
					$member_plan = $member[$k][0];
					
					if ($member_plan[5] == $PLAN_CODE[$h]){

						$PATIENT_NO = $member[$k][3];
						$STAFF_NO = $member[$k][2];
						$PATIENT_NAME = $member[$k][4];
						$GENDER = $member[$k][8];
						$DOB = $member[$k][7];
						$HKID = $member[$k][6];
						

						echo "Plan Code: ".$PLAN_CODE[$h]."<br>";
						echo "Member name: ".$MEMBER_NAME."<br><br>";
						
						/*
						
						//Check whether the patient already exists
						$exist_patient = $this->check_patient($CARD_CODE, $POLICY_NO, $PATIENT_NAME, $PATIENT_NO);
						
						//if $exist_patient is 0, insert the data as new patient
						if ($exist_patient == 0){
							$save_data = [
								'CARD_CODE' => $CARD_CODE,
								'PATIENT_NO' => $PATIENT_NO,
								'POLICY_NO' => $POLICY_NO,
								'PATIENT_NAME' => $PATIENT_NAME,
								'GENDER' => ''
								'DOB' => $DOB,
								'HKID' => $HKID,
								'PLAN_CODE' => $PLAN_CODE,
								'CREATOR' => $user,
								'CREATE_DATE' => date('Y-m-d H:i:s'),
								'LAST_MODIFIER' => $user,
								'LAST_UPDATE' => date('Y-m-d H:i:s'),
							];
							
							$this->db->insert('patient', $save_data);
							
							$save_patient = $this->db->insert_id();
							
						}else{
							$save_patient = $exist_patient;
						}
						
						if ($save_patient){
							array_push($success_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
							
							
							//Insert patient effective date
							$save_effective = $this->insert_effective_date($save_patient, $START_DATE, $TERM_DATE, $user);
						
							if (!$save_effective){
								array_push($error_list, "Insert Effective Date Fail: $PATIENT_NAME &nbsp; ($PATIENT_NO) ");
							}
							
						}else{
							array_push($error_list, "$PATIENT_NAME &nbsp; ($PATIENT_NO)");
						}
						
						*/

					}
					
				}
			}
			//end show member details
			
			
			//$this->record_result($error_list, $success_list);
			
			
			
			/*
			//show waiver type
			$waiver_type = $waiver[0][0];
			$hv_waiver = false;
			
			for ($w=1; $w<count($waiver); $w++){
				$waiver_list = preg_replace('/[^\p{L}\p{N}\s]/u', '', $waiver[$w][0]);
				
				if ($waiver_list == ""){
					$waiver_type = $waiver[$w+1][0];
				}
				
				if ($waiver_list == $member_f){
					$hv_waiver = true;
					break;
				}
			}
			
			if ($hv_waiver){
				echo $waiver_type;
			}else{
				$waiver_type = "no match type";
				echo $waiver_type;
			}
			*/
				
		}
		//End insert data
	
	}
	
	/*-----------------------------------------------------------	Tokio marine -----------------------------------------------------------*/
	
}
?>