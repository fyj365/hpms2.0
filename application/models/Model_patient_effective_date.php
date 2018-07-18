<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_patient_effective_date extends MY_Model {

	private $primary_key 	= 'PATIENT_EFFECTIVE_NO';
	private $table_name 	= 'patient_effective_date';
	private $field_search 	= ['PATIENT_AUTONO', 'PATIENT_EFFECTIVE_NO', 'ORIGINAL_TERM_DATE', 'START_DATE', 'TERM_DATE', 'STATUS', 'REMARK'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}
	
	
/*
	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= $field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
		$this->db->where("STATUS = 'Not Start' or STATUS = 'Active'");
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}
	
*/
	
	
	public function cust_count_all(){
		return $this->cust_count;
	}

	public function get($filters = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$where = NULL;
		
		$center_filter = ["CARD_CODE", "PATIENT_NO", "PATIENT_NAME"];
		
		foreach($filters as $key=>$filter){
			
			//where = null , meaning the condition may be the first filter
			if ($where == NULL){
				
				
				//Check if the user inputed condition
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the first condition belongs to 'patient' table
					if (in_array($key, $center_filter)){
						
						$where .= " (patient." . $key . " LIKE '%" . $filter . "%')";
						
					}else{
						
						//if the first condition is NOT belongs to 'patient' table
						$where .= " (patient_effective_date." . $key . " LIKE '%" . $filter . "%')";
					}
				}
				
			}else{
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the condition belongs to 'patient' table
					if (in_array($key, $center_filter)){
						
						$where .= " AND (patient." . $key . " LIKE '%" . $filter . "%')";
	
					}else{
						
						//if the condition is NOT belongs to 'patient' table
						$where .= " AND (patient_effective_date." . $key . " LIKE '%" . $filter . "%')";
						
					}
					
				}
				//End filter is NOT null quote
				
			}
			//End where is NOT null quote
			
		}
		//End foreach to write the where statement

		$selection = "patient.CARD_CODE as CARD_CODE, patient.PATIENT_NO as PATIENT_NO, patient.PATIENT_NAME as PATIENT_NAME, ".
		"patient_effective_date.PATIENT_AUTONO, patient_effective_date.PATIENT_EFFECTIVE_NO, ".
		"patient_effective_date.START_DATE, patient_effective_date.TERM_DATE, patient_effective_date.STATUS";
		
		$this->db->select($selection);
		$this->db->from('patient_effective_date');
		$this->db->join('patient', 'patient.AUTO_NO = patient_effective_date.PATIENT_AUTONO', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by("patient.CARD_CODE", "ASC");
		$this->db->order_by("patient.PATIENT_NAME", "ASC");
		$this->db->order_by("patient_effective_date.STATUS", "ASC");
		$query = $this->db->get();
		
		
		//Count the total result 
		$selection = "patient.CARD_CODE as CARD_CODE, patient.PATIENT_NO as PATIENT_NO, patient.PATIENT_NAME as PATIENT_NAME, ".
		"patient_effective_date.PATIENT_AUTONO, patient_effective_date.PATIENT_EFFECTIVE_NO, ".
		"patient_effective_date.START_DATE, patient_effective_date.TERM_DATE, patient_effective_date.STATUS";
		
		$this->db->select($selection);
		$this->db->from('patient_effective_date');
		$this->db->join('patient', 'patient.AUTO_NO = patient_effective_date.PATIENT_AUTONO', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$count_query = $this->db->get();
		$this->cust_count = $count_query->num_rows();

		return $query->result();
	}

}

/* End of file Model_patient_effective_date.php */
/* Location: ./application/models/Model_patient_effective_date.php */