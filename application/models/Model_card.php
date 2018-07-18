<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_card extends MY_Model {

	private $primary_key 	= 'CARD_CODE';
	private $table_name 	= 'card';
	private $field_search 	= ['CARD_CODE', 'COM_ID','E_NAME', 'C_NAME', 'JOIN_DATE', 'STATUS', 'E_ADDR1', 'E_ADDR2', 'E_ADDR3', 'E_ADDR4', 'E_ADDR5', 'E_DISTRICT', 'C_ADDR1', 'C_ADDR2', 'C_ADDR3', 'C_ADDR4', 'C_ADDR5', 'C_DISTRICT', 'BILLING_DEPT_NAME', 'SURGICAL_RATING', 'DIAG_CODE_STANDARD'];
 
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
            if ($field=='REMARK') {
                $this->db->select('*');
                $this->db->from('card');
                $this->db->join('card_class','card.CARD_CODE = card_class.CARD_CODE');
                $where = "(" .$field. " LIKE '%" . $q . "%')";
                $this->db->where($where);
                $query = $this->db->get();

                return $query->num_rows();
            }else{
        	$where .= "(" . $field . " LIKE '%" . $q . "%' )";
             }
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
            if ($field=='REMARK') {
                $this->db->select('*');
                $this->db->from('card');
                $this->db->join('card_class','card.CARD_CODE = card_class.CARD_CODE');
                $where = "(" .$field. " LIKE '%" . $q . "%')";
                $this->db->where($where);
                $this->db->limit($limit, $offset);
                $query = $this->db->get();

                return $query->result();
            }else{
                 $where .= "(" . $field . " LIKE '%" . $q . "%' )";
            }
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }

        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('COM_ID');
         $this->db->order_by('CARD_CODE');

		$query = $this->db->get($this->table_name);

		return $query->result();
	}

    

    public function find_Doctor_Cards ($id){
        $this->db->where('CARD_CODE', $id);
        $query = $this->db->get('doctor_card');
       
        return   $query->result();
               

    }

      public function  find_CARD_Contacts ($id){
         $this->db->where($this->primary_key, $id);
        $query = $this->db->get('card_contact');
        if($query->num_rows()>0)
        {
            $result = $query->result();
            return  $result;
        }
            return FALSE;
       
    }

	public function get_Filter_Result($id,$table_name, $array){

	  	// array_filter($array, function($value) { return $value !== ''; });

	    $this->db->select('*');

        $this->db->from($table_name);

        if ($array['CLASS_CODE']!='') {
 		  $this->db->where('CLASS_CODE',$array['CLASS_CODE']);
        }

        if (array_key_exists('STATUS',$array)){
        	if ($array['STATUS']!='') {
          	    
          	     $this->db->where('STATUS',$array['STATUS']);
				
				}
        }

        if (array_key_exists('TYPE',$array)) {
        	if ($array['TYPE']!='') {
             $this->db->where('TYPE',$array['TYPE']);

        	}
        }

		$this->db->where('CARD_CODE',$id);

		$query = $this->db->get();

	    return  $query->result_array();

 		
	}
}

/* End of file Model_card.php */
/* Location: ./application/models/Model_card.php */