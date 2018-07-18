<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_voucher_line extends MY_Model {

	private $primary_key 	= 'VOUCHER_NO';
	private $table_name 	= 'voucher_line';

    private $field_search 	= ['BATCH_NO',  'CARD_CODE','COM_ID','CLASS_CODE' ,'VOUCHER_NO','TREATMENT_DATE', 'DR_CODE', 'PARTNER_DR_CODE', 'DR_E_NAME', 'DR_C_NAME', 'PATIENT_CODE','PATIENT_HKID', 'PATIENT_NAME', 'DEPD_CODE', 'SICK_LEAVE', 'SL_FROM', 'SL_TO','DIAG_CODE1', 'DIAG_CODE2', 'DIAG_CODE3', 'DIAG_DESC1','DIAG_DESC2','DIAG_DESC3','TYPE', 'REFERRAL_DR', 'CO_PAY', 'EXTRA_MED_BOL', 'EXTRA_MED', 'LAB_XRAY_BOL', 'LAB_XRAY','SURGICAL_BOL', 'SURGICAL', 'APPROVAL_CODE', 'FEE_AMT', 'PAY_AMT',  'CREATOR','CREATE_DATE', 'LAST_MODIFIER', 'LAST_UPDATE','UF1','UF2','UF3','RECEIVE_DATE'];

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
        $q=  trim($q);
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
        $this->db->order_by('LAST_UPDATE','DESC');
        $this->db->order_by('BATCH_NO', "ASC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}


	public function get_tmp($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$fields = ['BATCH_NO','CARD_CODE','COM_ID', 'VOUCHER_NO','TREATMENT_DATE','RECEIVE_DATE', 'PARTNER_DR_CODE','STATUS'];
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($fields as $field) {
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
        $this->db->order_by('LAST_UPDATE','DESC');
        $this->db->order_by('BATCH_NO', "ASC");
		$query = $this->db->get('voucher_line_temp');

		return $query->result();
	}


  // FOR AJAX PAGINATION
   public function get2($params,  $limit = 0,  $offset = 0){

       $params = array_map('trim',$params);  // GET RID OF THE WHITE SPACE BEFORE AND AFTER EACH ELEMENT
       
       $this->db->select('*');
       $this->db->from('voucher_line');
	   $this->db->like($params);     // SEARCH THE RECORD WITH LIKE CONDITION
	   $this->db->limit($limit, $offset);  // FOR PAGINATION LIMIT AMOUNT OF RECORD AND OFFSET
	   $this->db->order_by('LAST_UPDATE','DESC');
	   $this->db->order_by('BATCH_NO', "ASC");
	   $query = $this->db->get();
       
       $output ='';
	   foreach ($query->result_array() as $row) {
	   	  $output.='
                     <tr><td class="bt_no">'.
                        $row["BATCH_NO"].'</td> <td class="voucher_no">'.
                        $row["VOUCHER_NO"].'</td> <td>'.
                        $row["COM_ID"].'</td> <td>'.
                        $row["CARD_CODE"].'</td> <td>'.
                        $row["CLASS_CODE"].'</td> <td>'.
                        $row["TREATMENT_DATE"].'</td> <td>'.
                        $row["RECEIVE_DATE"].'</td> <td>'.
                        $row["PARTNER_DR_CODE"].'</td> <td>'.
                        $row["DR_E_NAME"].'</td> <td>'.
                        $row["PATIENT_NAME"].'</td> <td>'.
                        $row["TYPE"].'</td> <td>'.
                        $row["FEE_AMT"].'</td> <td>'.
                        $row["PAY_AMT"].'</td> <td>'.

                        '<a href="'. BASE_URL. 'administrator/voucher_line/view/'.
                        $row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-newspaper-o"></i></a>'.
                        '</td> </tr>';
	   };

	   return  $output;

	}

     // FOR AJAX PAGINATION
     public function count_all2($params){

       $params = array_map('trim',$params);
       
       $this->db->select('*');
	   $this->db->like($params);
	   $query = $this->db->get('voucher_line');
          
	   return $query->num_rows();


	}

     // FOR VOUCHER SUMMARY
    public function get_tmp3($q = null, $field = null,$select_field = [])
	{
		$fields = ['BATCH_NO',  'CARD_CODE','COM_ID', 'VOUCHER_NO','TREATMENT_DATE','RECEIVE_DATE', 'PARTNER_DR_CODE','STATUS'];
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $q = trim($q);
		$field = $this->scurity($field);

        $default_receive_date = Date('Y-m-d');

        if (empty($field)) {
	        foreach ($fields as $field) {
	            if ($iterasi == 1) {
	                $where .= $field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	// $where = "(RECEIVE_DATE LIKE '%2018-05-23%')";
        	   // if ($field == 'RECEIVE_DATE' && $q =='2018-05-24') {
  
            //    $where = "(RECEIVE_DATE LIKE '%" . $default_receive_date ."%' )";

        	   // }
        	   // else
        	   // {

        	   $where .= "(" . $field . " LIKE '%" . $q . "%' )";

        	   
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }

        $this->db->where($where);
        $this->db->where('STATUS','OPEN');
        $this->db->order_by('LAST_UPDATE','DESC');
        $this->db->order_by('BATCH_NO', "ASC");
		$query = $this->db->get('voucher_line_temp');

		return $query->result();
	}

	 public function get3($q = null, $field = null, $select_field = [])
	 {
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $q = trim($q);
		$field = $this->scurity($field);
        
        $default_receive_date = Date('Y-m-d');

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
        } 
        else {
        	if ($field=='RECEIVE_DATE'&& $q=='2018-05-24') {

        		$where = "(RECEIVE_DATE LIKE '%" . $default_receive_date ."%' )";
        	}
        	else{

        		$where .= "(" . $field . " LIKE '%" . $q . "%' )";

        	}
         }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
           }

        $this->db->where($where);
        $this->db->order_by('LAST_UPDATE','DESC');
        $this->db->order_by('BATCH_NO', "ASC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}
 





}

/* End of file Model_voucher_line.php */
/* Location: ./application/models/Model_voucher_line.php */