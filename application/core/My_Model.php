<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Model extends CI_Model {

    private $primary_key = 'id';
    private $table_name = 'table';
    private $field_search;

    public function __construct($config = array())
    {
        parent::__construct();

        foreach ($config as $key => $val)
        {
            if(isset($this->$key))
                $this->$key = $val;
        }

        $this->load->database();
    }

    public function remove($id = NULL)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table_name);
    }

    public function change($id = NULL, $data = array())
    {        
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table_name, $data);

        return $this->db->affected_rows();
    }

    public function find($id = NULL, $select_field = [])
    {
        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }

        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);

        if($query->num_rows()>0)
        {
            return $query->row();
        }
        else
        {
            return FALSE;
        }
    }

    public function find_partnerDoctor($id, $doc){
     
                 $this->db->where('CARD_CODE', $id);
                 $this->db->where('DR_CODE', $doc);
                 $query = $this->db->get('partner_doctor');
                return $query->row();   
    }
           
   public function find_status($id){
       $this->db->where('CARD_CODE', $id);
       $this->db->where('STATUS','active');
       $query = $this->db->get('card_class');
       if($query->num_rows()>0){
            return $query->result();

        } 
        else{
            $this->db->where('CARD_CODE', $id);
            $this->db->where('STATUS','Not Start');
            $query1 = $this->db->get('card_class');
            if($query1->num_rows()>0){
            return $query1->result();
            } 
            else{
             $this->db->where('CARD_CODE', $id);
            $this->db->where('STATUS','Terminate');
            $query2 = $this->db->get('card_class');
                if($query2->num_rows()>0){
                     return $query2->result();
                }else{
                 return FALSE;
            }

            } 
        }       
       
    }
    public function getCardClass($id){
        $this->db->select('CLASS_CODE');
        $this->db->group_by('CLASS_CODE');
        $this->db->where('CARD_CODE',$id);

        $query = $this->db->get('card_class');

        return array('classes'=>$query->result(),'totals'=>$query->num_rows());
    }
 
    public function getActiveCard($id){
        
        $this->db->select('*');
        $this->db->where('CARD_CODE',$id);
        $this->db->where('STATUS','Active');
        $query = $this->db->get('card_class');
        if ($query->num_rows()>0) {
            $result = $query->result();

            return $result;
        } 

    } 

    public function  find_Active_AgreedFee($id){
        $this->db->select('*');
        $this->db->from('card_class');
        $this->db->join('agreed_fee','card_class.CARD_CODE = agreed_fee.CARD_CODE AND card_class.CLASS_CODE = agreed_fee.CLASS_CODE');
        $this->db->where('card_class.CARD_CODE', $id);
        $this->db->where('STATUS','Active');
        $this->db->order_by('agreed_fee.AUTO_NO DESC, agreed_fee.CLASS_CODE ASC');
        $query = $this->db->get();

            $result = $query->result();

            return $result; 
        }

   // find all card classes of a card
    public function  find_CLass ($id){
         $this->db->where($this->primary_key, $id);
         $this->db->order_by('CLASS_CODE',' ASC');
        $query = $this->db->get('card_class');
        if($query->num_rows()>0)
        {
            $results = $query->result();
            $totals = $query->num_rows();
            return   array('results' => $results, 'totals'=>$totals);
        }
        else
        {
            return FALSE;
        }

    }
      public function  find_all_cards ($id){
         $this->db->where($this->primary_key, $id);
        $query = $this->db->get('card');
        if($query->num_rows()>0)
        {
            $results = $query->result();
            $totals = $query->num_rows();
            return   array('results' => $results, 'totals'=>$totals);
        }
        else
        {
            return FALSE;
        }

    }

 
    public function find_all()
    {
        $this->db->order_by($this->primary_key,'ASC');
        $query = $this->db->get($this->table_name);

        return $query->result();
    }


    public function store($data = array())
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }
	
	public function storeSpecial($data = array())
    {
         $this->db->insert($this->table_name, $data);
         return $this->db->affected_rows();
    }

    public function get_all_data($table = '')
    {
        $query = $this->db->get($table);

        return $query->result();
    }


    public function get_single($where)
    {
        $query = $this->db->get_where($this->table_name, $where);
        return $query->row();
    }

    public function scurity($input)
    {
        return mysqli_real_escape_string($this->db->conn_id, $input);
    }

    public function export($table, $subject = 'file')
    {
        $this->load->library('excel');

        $result = $this->db->get($table);

        $this->excel->setActiveSheetIndex(0);

        $fields = $result->list_fields();

        $alphabet = 'ABCDEFGHIJKLMOPQRSTUVWXYZ';
        $alphabet_arr = str_split($alphabet);
        $column = [];

        foreach ($alphabet_arr as $alpha) {
            $column[] =  $alpha;
        }

        foreach ($alphabet_arr as $alpha) {
            foreach ($alphabet_arr as $alpha2) {
                $column[] =  $alpha.$alpha2;
            }
        }
        foreach ($alphabet_arr as $alpha) {
            foreach ($alphabet_arr as $alpha2) {
                foreach ($alphabet_arr as $alpha3) {
                    $column[] =  $alpha.$alpha2.$alpha3;
                }
            }
        }

        foreach($column as $col)
        {
            $this->excel->getActiveSheet()->getColumnDimension($col)->setWidth(20);
        }

        $col_total = $column[count($fields)-1];

        //styling
        $this->excel->getActiveSheet()->getStyle('A1:'.$col_total.'1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => 'DA3232')
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            )
        );

        $phpColor = new PHPExcel_Style_Color();
        $phpColor->setRGB('FFFFFF');  

        $this->excel->getActiveSheet()->getStyle('A1:'.$col_total.'1')->getFont()->setColor($phpColor);

        $this->excel->getActiveSheet()->getRowDimension(1)->setRowHeight(40);

        $this->excel->getActiveSheet()->getStyle('A1:'.$col_total.'1')
        ->getAlignment()->setWrapText(true); 

        $col = 0;
        foreach ($fields as $field)
        {
            
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, ucwords(str_replace('_', ' ', $field)));
            $col++;
        }
 
        $row = 2;
        foreach($result->result() as $data)
        {
            $col = 0;
            foreach ($fields as $field)
            {
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
                $col++;
            }
 
            $row++;
        }

        //set border
        $styleArray = array(
              'borders' => array(
                  'allborders' => array(
                      'style' => PHPExcel_Style_Border::BORDER_THIN
                  )
              )
          );
        $this->excel->getActiveSheet()->getStyle('A1:'.$col_total.''.$row)->applyFromArray($styleArray);

        $this->excel->getActiveSheet()->setTitle(ucwords($subject));

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.ucwords($subject).'-'.date('Y-m-d').'.xls');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function pdf($table, $title)
    {
        $this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);

        $result = $this->db->get($table);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf', [
            'results' => $result->result(),
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
    }
}

/* End of file My_Model.php */
/* Location: ./application/core/My_Model.php */