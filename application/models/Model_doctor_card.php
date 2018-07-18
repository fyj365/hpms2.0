<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_doctor_card extends MY_Model {

	private $primary_key 	= 'DR_CODE';
	private $table_name 	= 'doctor_card';
	private $field_search 	= ['AUTO_NO','COM_ID','CARD_CODE', 'DR_CODE','CENTER_CODE', 'PARTNER_DR_CODE', 'LOC_CODE','TYPE1','TYPE2','TYPE3'];

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
		/*$this->db->where("TERM_DATE", "");
		$this->db->or_where("TERM_DATE", NULL);
		$this->db->or_where("TERM_DATE", "0000-00-00");*/
        $this->db->limit($limit, $offset);
        $this->db->order_by('AUTO_NO','DESC');
		$this->db->order_by("(TERM_DATE * -1)", "ASC");

		$query = $this->db->get($this->table_name);

		return $query->result();
	}



}

/* End of file Model_partner_doctor.php */
/* Location: ./application/models/Model_partner_doctor.php */