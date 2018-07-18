<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_patient extends MY_Model {

	private $primary_key 	= 'AUTO_NO';
	private $table_name 	= 'patient';
	private $field_search 	= ['AUTO_NO', 'CARD_CODE', 'PATIENT_NO', 'POLICY_NO', 'DEPD_CODE', 'PATIENT_NAME', 'GENDER', 'DOB', 'HKID', 'REMARK', 'STATUS', 'GP_COPAY', 'SP_COPAY', 'PHY_COPAY', 'HERB_COPAY', 'GP_EXTRA_MED', 'SP_EXTRA_MED', 'HERB_EXTRA_MED', 'WAIVER_REFERRAL'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

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

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
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

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }

        $this->db->where($where);
        $this->db->limit($limit, $offset);
		$this->db->order_by("STATUS", "ASC");
        $this->db->order_by("CARD_CODE", "ASC");
		$this->db->order_by("PATIENT_NAME", "ASC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

}

/* End of file Model_patient.php */
/* Location: ./application/models/Model_patient.php */