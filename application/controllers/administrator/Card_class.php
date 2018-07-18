 <?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Partner card Controller
*| --------------------------------------------------------------------------
*| Partner card site
*|
*/
class Card_class extends Admin	
{ 
	
	public function __construct() 
	{
		parent::__construct();

		$this->load->model('model_card_class');
	}
 
	public function index($offset = 0) 
	{
		$this->is_allowed('card_class_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['card_classs'] = $this->model_card_class->get($filter, $field, $this->limit_page, $offset);
		$this->data['card_class_counts'] = $this->model_card_class->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/card_class/index/',
			'total_rows'   => $this->model_card_class->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Partner card List');
		$this->render('backend/standart/administrator/card_class/card_class_list', $this->data);
	}
	
	/**
	* Add new card_classs
	*
	*/

	public function add()
	{
		$this->is_allowed('card_class_add');

		
	    $this->data['CARD_CODEs'] = $this->db->get('card')->result();
	    $this->data['CARD_CODEs_total'] = $this->db->count_all_results('card');

	    $this->data['CARD_CODE'] ='';
	    $this->data['card_name'] = '';

		$this->template->title('Card New');
		$this->render('backend/standart/administrator/card_class/card_class_add', $this->data);
	}
	public function add_1($id){

		$this->is_allowed('card_class_add');

		if ($id!='') {
			$this->db->select('*');
			$this->db->where('CARD_CODE',$id);
			$query = $this->db->get('card');
			$this->data['card_name'] = $query->row();

		     $this->data['CARD_CODE'] =$id;

		}else{
			$this->data['CARD_CODE'] ='';
		   $this->data['card_name'] = '';

		}
	    $this->data['CARD_CODEs'] = $this->db->get('card')->result();
	    $this->data['CARD_CODEs_total'] = $this->db->count_all_results('card');

		$this->template->title('Card New');
		$this->render('backend/standart/administrator/card_class/card_class_add', $this->data);

	}
	/**
	* Add New Partner cards
	*
	* @return JSON
	*/
	public function add_class(){
	  $CARD_CODE = $this->input->get('CARD_CODE');
	   $this->db->where('CARD_CODE',$CARD_CODE);
	   $query = $this->db->get('card');
	   $result = $query->row_array();
	   $this->data['E_NAME'] = $result['E_NAME'];
	  
	  // get the partner name wtih partner code
	   echo json_encode($this->data);		
	}
 
	// public function term_card(){ //two input parameters
	// 	$CARD_CODE = $this->input->get('CARD_CODE');
	// 	$save_status = ['STATUS' => 'Terminate'];
 //   		$this->db->where('CARD_CODE',$CARD_CODE);
	// 	$query = $this->db->Update('card_class',$save_status);
 //        $result_num = $this->db->affected_rows();
 //        $this->data['affected_rows'] = $result_num;
	// 	$this->data['message'] = 'success';
	// 	echo json_encode($this->data);
	// }
	public function term_card3(){ //three input parameters
		$CARD_CODE = $this->input->get('CARD_CODE');
		$CLASS_CODE = $this->input->get('CLASS_CODE');
		$save_status = ['STATUS' => 'Terminate'];
   		$this->db->where('CARD_CODE',$CARD_CODE);
		$this->db->where('CLASS_CODE',$CLASS_CODE);
		$query = $this->db->Update('card_class',$save_status);
        $result_num = $this->db->affected_rows();
        $this->data['affected_rows'] = $result_num;
        $this->data['a'] = $CARD_CODE;
        $this->data['c'] = $CLASS_CODE;
		$this->data['message'] = 'success';
		echo json_encode($this->data);
	}

  
  public function add_save()
	{
		if (!$this->is_allowed('card_class_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}


		 $this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');
		 
		 $user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));
	    

	if ($this->form_validation->run()) {
		$CARD_CODE = $this->input->post('CARD_CODE');
		$CLASS_CODEs = $this->input->post('CLASS_CODE');
		$CLASS_DESC = $this->input->post('CLASS_DESC');
		$START_DATE = $this->input->post('START_DATE');
		$TERM_DATE = $this->input->post('TERM_DATE');
		$REMARK = $this->input->post('REMARK');

 	    $today = date('Y-m-d H:i:s');

		$save_card_class = 0;  

		foreach ($CLASS_CODEs  as $key => $value) {
			if ($TERM_DATE[$key] ==''&&$START_DATE[$key]=='') {
		 			$STATUS = 'Active';
		 	}
		 	else{ 
			 	if($TERM_DATE[$key] !=''&& $TERM_DATE[$key] < $today){
			 	
			 		$STATUS = 'Terminate';
				 }
				 elseif ($START_DATE[$key]!=''&& $START_DATE[$key] > $today ) {
			 		$STATUS = 'Not Start';
				 }
				 else {
			 		$STATUS = 'Active';
			 	}
		 }
			if ($value) {
				 $save_data = [
				'CARD_CODE' => $CARD_CODE,
				'CLASS_CODE' => $CLASS_CODEs[$key],
				'CLASS_DESC' => $CLASS_DESC[$key],
				'START_DATE' => $START_DATE[$key],
				'TERM_DATE' =>$TERM_DATE[$key],
				'ORIGINAL_TERM_DATE' =>$TERM_DATE[$key],
				'REMARK' => $REMARK[$key],
				'STATUS' => $STATUS,
				'CREATOR'=> $user,
				'CREATE_DATE'=>$today,
				'LAST_MODIFIER' => $user,
				'LAST_UPDATE' => $today
			];

				$this->db->insert('card_class', $save_data);
				$save_card_class ++;
			}
			
		}
			if ($save_card_class) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['message'] = 'Your data has been successfully stored into the database. '.anchor('administrator/card_class', ' Go back to list  ') .'  or  '. anchor('administrator/Agreed_fee/add_2/'.$CARD_CODE.'/'.$CLASS_CODEs[0],'  ADD AGREED FEE TO '. $CLASS_DESC[0].'['.$CLASS_CODEs[0].']');
				} 
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/card_class');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Partner cards
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('card_class_update');
	    
	    //get the card 
	    $this->db->where('AUTO_NO',$id);
		$query = $this->db->get('card_class');
		if($query->num_rows()>0){
		      $this->data['card_class'] = $query->row();
		  }else
		  {
		       return false;
     	  }
     	$this->data['status'] = $this->model_card_class->find_status($id);
		$this->template->title('Partner card Update');
		$this->render('backend/standart/administrator/card_class/card_class_update', $this->data);
	}

	/**
	* Update Partner cards
	*
	* @var $id String
	*/
	public function edit_save($id, $CLASS_CODE)
	{
		if (!$this->is_allowed('card_class_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Sorry you do not have permission to access'
				]);
			exit;
		}

		 $this->form_validation->set_rules('CARD_CODE', 'Partner Code', 'trim|required');

		$user = _ent(ucwords(clean_snake_case(get_user_data('full_name'))));

		$today = date('Y-m-d H:i:s');

				 $START_DATE = $this->input->post('START_DATE');
				 $TERM_DATE = $this->input->post('TERM_DATE');

				 if($TERM_DATE < $today){
				 	$STATUS = 'Terminate';
				 }
				 elseif ($START_DATE > $today ) {
				 	$STATUS = 'Not Start';
				 }
				 else {
				 	$STATUS = 'Active';
				 }
			    $this->db->where('CARD_CODE',$id);
			    $this->db->where('CLASS_CODE',$CLASS_CODE);
				$query = $this->db->get('card_class');
				$result = $query->row_array();
				$ORIGINAL_TERM_DATE = $result['ORIGINAL_TERM_DATE'];

				 if ($TERM_DATE>$ORIGINAL_TERM_DATE) {
				 	$extend = 1;
				 }else{
				 	$extend = 0;
				 }
		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'START_DATE' => $this->input->post('START_DATE'),
				'CLASS_DESC' =>$this->input->post('CLASS_DESC'),
				'START_DATE'=>$this->input->post('START_DATE'),
				'TERM_DATE' =>$TERM_DATE,
				'STATUS' => $STATUS,
				'EXTEND_card' =>$extend,
				'REMARK' => $this->input->post('REMARK')
			];

		        $this->db->where('CARD_CODE',$id);
		        $this->db->where('CLASS_CODE',$CLASS_CODE);
		        $query = $this->db->update('card_class',$save_data);
		        $save_card_class = $this->db->affected_rows();
		        

			if ($save_card_class) {
				 $today = date('Y-m-d H:i:s');

				$save_data2 =[ 
				    'LAST_MODIFIER' => $user,
					'LAST_UPDATE' => $today
					];
				$this->db->where('CARD_CODE', $id);
        		$this->db->update('card_class', $save_data2);

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = 'Your data has been successfully updated into the database. '.anchor('administrator/card/view/'.$id, ' Go back to card');
				} else {
					set_message('Your data has been successfully updated into the database. ', 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/card_class');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = 'Your data not change';
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = 'Data not change';
					$this->data['redirect'] = base_url('administrator/card_class');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Partner cards
	*
	* @var $id String
	*/
	public function delete($id)
	{
		$this->is_allowed('card_class_delete');

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
            set_message('Partner card has been deleted.', 'success');
		} else {
            set_message('Error delete card_class.', 'error');
		}

		redirect('administrator/card_class');
	}

		/**
	* View view Partner cards
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('card_class_view');
        
        $this->db->where('AUTO_NO',$id);
        $query = $this->db->get('card_class');
        if($query->num_rows()>0){
        	$this->data['card_class'] = $query->row();
        }else{
        	return false;
        }

		$this->template->title('Partner card Detail');
		$this->render('backend/standart/administrator/card_class/card_class_view', $this->data);
	}
	
	/**
	* delete Partner cards
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$card_class = $this->model_card_class->find($id);

		
		
		return $this->model_card_class->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('card_class_export');

		$this->model_card_class->export('card_class', 'card_class');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('card_class_export');

		$this->model_card_class->pdf('card_class', 'card_class');
	}
}


/* End of file card_class.php */
/* Location: ./application/controllers/administrator/Partner card.php */