<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_medical_procedures extends MY_Model {

	private $primary_key 	= 'AUTO_NO';
	private $table_name 	= 'medical_procedures';
	private $field_search 	= ['SP_CODE', 'CLINIC_PROCEDURE'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}
	
	public function cust_count_all(){
		return $this->cust_count;
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
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

*/	

	public function get($filters = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		
		$where = NULL;
		
		$sp_filter = ["SP_CODE"];

        foreach($filters as $key=>$filter){
			
			//where = null , meaning the condition may be the first filter
			if ($where == NULL){
				
				//Check if the user inputed condition
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the first condition belongs to 'specialty' table
					if (in_array($key, $sp_filter)){

						$where .= " (doctor_specialty_desc.E_DESC LIKE '%" . $filter . "%' OR doctor_specialty_desc.C_DESC LIKE '%" . $filter . "%' OR doctor_specialty_desc.SP_CODE LIKE '%" . $filter . "%')";
						
					}else{
						
						$where .= " (medical_procedures.CLINIC_PROCEDURE LIKE '%" . $filter . "%')";

					}
				}
				
			}else{
				if ($filter != NULL){
					
					$filter = mysqli_real_escape_string($this->db->conn_id, $filter);
					
					//Check whether the condition belongs to 'specialty' table
					if (in_array($key, $sp_filter)){
						
						$where .= " AND (doctor_specialty_desc.E_DESC LIKE '%" . $filter . "%' OR doctor_specialty_desc.C_DESC LIKE '%" . $filter . "%' OR doctor_specialty_desc.SP_CODE LIKE '%" . $filter . "%')";
						
					}else{
						
						//if the condition is NOT belongs to 'specialty' table
						$where .= " AND (medical_procedures.CLINIC_PROCEDURE LIKE '%" . $filter . "%')";
						
					}
					
				}
				//End filter is NOT null quote
				
			}
			//End where is NOT null quote
			
		}
		//End foreach to write the where statement

		

		$selection = "medical_procedures.AUTO_NO, medical_procedures.CLINIC_PROCEDURE, doctor_specialty_desc.SP_CODE as SP_CODE, doctor_specialty_desc.E_DESC, doctor_specialty_desc.C_DESC";
		
		$this->db->select($selection);
		$this->db->from('medical_procedures');
		$this->db->join('doctor_specialty_desc', 'doctor_specialty_desc.SP_CODE = medical_procedures.SP_CODE', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by("ABS(doctor_specialty_desc.SP_CODE)", "ASC");
		$this->db->order_by("medical_procedures.CLINIC_PROCEDURE", "ASC");
		$query = $this->db->get();
		
		
		//Count the total result 
		$selection = "medical_procedures.CLINIC_PROCEDURE, doctor_specialty_desc.SP_CODE as SP_CODE, doctor_specialty_desc.E_DESC, doctor_specialty_desc.C_DESC";
		
		$this->db->select($selection);
		$this->db->from('medical_procedures');
		$this->db->join('doctor_specialty_desc', 'doctor_specialty_desc.SP_CODE = medical_procedures.SP_CODE', 'left');
		if ($where != NULL){
			$this->db->where($where);
		}
		$count_query = $this->db->get();
		$this->cust_count = $count_query->num_rows();

		return $query->result();
	}

}

/* End of file Model_medical_procedures.php */
/* Location: ./application/models/Model_medical_procedures.php */