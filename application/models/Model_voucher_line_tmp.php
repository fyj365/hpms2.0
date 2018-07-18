<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_voucher_line_tmp extends MY_Model {

	private $primary_key 	= 'VOUCHER_NO';
	private $table_name 	= 'voucher_line_temp';
    
    private $field_search 	= ['BATCH_NO', 'COM_ID', 'CARD_CODE','CLASS_CODE', 'VOUCHER_NO','TREATMENT_DATE', 'PARTNER_DR_CODE', 'CREATOR','CREATE_DATE', 'LAST_MODIFIER', 'LAST_UPDATE','UF1','UF2','UF3','STATUS'];

//'BATCH_DATE',,'RECEIVE_DATE'
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
        $this->db->where('STATUS','OPEN');
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $q = trim($q);
        
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
        $this->db->where('STATUS','OPEN');
        $this->db->limit($limit, $offset);

        $this->db->order_by('CREATE_DATE','DESC');
        $this->db->order_by('BATCH_NO', "ASC");
		$query = $this->db->get($this->table_name);
      
       $output ='';
	   foreach ($query->result_array() as $row) {
	   	if ($row["STATUS"]!='COMPLETED') {
	   			   $output .=  '   <tr><td class="bt_no">'.
                        $row["BATCH_NO"].'</td> <td class="voucher_no">'.
                        $row["VOUCHER_NO"].'</td> <td>'.
                        $row["COM_ID"].'</td> <td>'.
                        $row["CARD_CODE"].'</td> <td>'.
                        $row["CLASS_CODE"].'</td> <td>'.
                        $row["PARTNER_DR_CODE"].'</td> <td>'.
                        $row["TREATMENT_DATE"].'</td> <td>'.
                        $row["RECEIVE_DATE"].'</td> <td>'.
                        $row["STATUS"].'</td> <td>'.
                        $row["CREATOR"].'</td> <td>'.
                        $row["CREATE_DATE"].'</td> <td width="200">'.
                        '<a href="'. BASE_URL.'administrator/voucher_line_tmp/view_regist/'.
                          $row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-newspaper-o"></i></a>'.
                         '<a href="'.BASE_URL.'administrator/voucher_line/add/'.$row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-edit"></i></a></td></tr>';
	   
	   	}else{
	   		   			$output .=  ' <tr><td class="bt_no">'.
                        $row["BATCH_NO"].'</td> <td class="voucher_no">'.
                        $row["VOUCHER_NO"].'</td> <td>'.
                        $row["COM_ID"].'</td> <td>'.
                        $row["CARD_CODE"].'</td> <td>'.
                        $row["CLASS_CODE"].'</td> <td>'.
                        $row["PARTNER_DR_CODE"].'</td> <td>'.
                        $row["TREATMENT_DATE"].'</td> <td>'.
                        $row["RECEIVE_DATE"].'</td> <td>'.
                        $row["STATUS"].'</td> <td>'.
                        $row["CREATOR"].'</td> <td>'.
                        $row["CREATE_DATE"].'</td> <td width="200">'.
                        '<a href="'. BASE_URL.'administrator/voucher_line/view/'.$row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-newspaper-o"></i></a>'.
                         '</td></tr>';

	   	}



	   };
	   return $output;
	}

	public function get2($params, $limit = 0, $offset = 0){

	   foreach ($params as $key => $value) {

	   	if ($key =='bulk'||$key =='f'||$key =='q') {
	   		unset($params[$key]);
	   	}

	   }
       $params = array_map('trim',$params);

       $this->db->select('*');
       $this->db->from('voucher_line_temp');
	   $this->db->like($params);

	   $this->db->limit($limit, $offset);
	   $this->db->where('STATUS','OPEN');
	   $this->db->order_by('CREATE_DATE','DESC');
	   $this->db->order_by('BATCH_NO');
	   $query = $this->db->get();

       $output ='';
	   foreach ($query->result_array() as $row) {

	   if ($row["STATUS"]!='COMPLETED') {

	   $output.='<tr> <td class="bt_no">'.
                        $row["BATCH_NO"].'</td> <td class="voucher_no">'.
                        $row["VOUCHER_NO"].'</td> <td>'.
                        $row["COM_ID"].'</td> <td>'.
                        $row["CARD_CODE"].'</td> <td>'.
                        $row["CLASS_CODE"].'</td> <td>'.
                        $row["PARTNER_DR_CODE"].'</td> <td>'.
                        $row["TREATMENT_DATE"].'</td> <td>'.
                        $row["RECEIVE_DATE"].'</td> <td>'.
                        $row["STATUS"].'</td> <td>'.
                        $row["CREATOR"].'</td> <td>'.
                        $row["CREATE_DATE"].'</td> <td width="200"><a href="'. BASE_URL.'administrator/voucher_line_tmp/view_regist/'.
                         $row["BATCH_NO"].'/'. $row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-newspaper-o"></i></a>'.
                         '<a href="'.BASE_URL.'administrator/voucher_line/add/'.$row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-edit"></i></a></td></tr>';
	   }else{

	    $output .=  '   <tr> <td class="bt_no">'.
                        $row["BATCH_NO"].'</td> <td class="voucher_no">'.
                        $row["VOUCHER_NO"].'</td> <td>'.
                        $row["COM_ID"].'</td> <td>'.
                        $row["CARD_CODE"].'</td> <td>'.
                        $row["CLASS_CODE"].'</td> <td>'.
                        $row["PARTNER_DR_CODE"].'</td> <td>'.
                        $row["TREATMENT_DATE"].'</td> <td>'.
                        $row["RECEIVE_DATE"].'</td> <td>'.
                        $row["STATUS"].'</td> <td>'.
                        $row["CREATOR"].'</td> <td>'.
                        $row["CREATE_DATE"].'</td> <td width="200">'.
                        '<a href="'. BASE_URL.'administrator/voucher_line/view/'.$row["VOUCHER_NO"].'" class="label-default"><i class="fa fa-newspaper-o"></i></a>'.
                         '</td></tr>';

	   }
	}
	   return $output;
  
	}
     
    public function count_all2($params){

	   foreach ($params as $key => $value) {
	   	if ($key =='bulk'||$key =='f'||$key =='q') {
	   		unset($params[$key]);
	   	}
	   }
       $params = array_map('trim',$params);
       
       $this->db->select('*');
	   $this->db->like($params);
	   $this->db->where('STATUS','OPEN');
	   $query = $this->db->get($this->table_name);
          
	   return $query->num_rows();

	}
	
	public function find_voucher_regist($voucher_no){
		$this->db->select('*');
		$this->db->where('VOUCHER_NO',$voucher_no);
		return $this->db->get($this->table_name)->row();
	}

}

/* End of file Model_voucher_line.php */
/* Location: ./application/models/Model_voucher_line.php */