<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;



class Excel extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if(empty($_SESSION['admin_logged_in'])){
            redirect();
        }
        if(empty($_SESSION['lang'])){
            $_SESSION['lang'] = 'tr';
        }
        
        if(empty($_SESSION['lang_array'])){
            $_SESSION['lang_array'] = array('tr', 'en');
        }
    }
    
	public function index()
	{
		$data['menu'] = '2_1';
		$this->load->view('excel/excel_upload_view', $data);
	   
	}

	public function upload_file()
	{

		$upload_file = $_FILES['upload_file']['name'];
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);

		if($extension == 'xlsx'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		if($extension == 'xls'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		}

		$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);

		
		//$spreadsheet = $reader->load(DOC_ROOT . '/files/excel/test.xlsx');

		$products = $spreadsheet->getActiveSheet()->toArray();

		//debug($products);

		try {
			$this->db->trans_begin();
			foreach($products as $key => $product){
				if($key > 0 && $product[0]!==NULL){
					$ins[$key]['product_code'] = $product[0];
					$ins[$key]['product_name_en'] = $product[1];
					$ins[$key]['product_description_en'] = $product[2];
					$ins[$key]['product_price'] = $product[3];

					$checkProduct[$key] = $this->db->select('id')
						->where('product_code', $product[0])
						->get('products_table')->row_array();
					
					if(!empty($checkProduct[$key])){
						$this->db->update('products_table', $ins[$key], array('product_code' => $product[0]));
					}else{
						$this->db->insert('products_table', $ins[$key]);
					}
	
					
				}
			}
			$this->db->trans_commit();
		  }
		  catch (Exception $e) {
			$this->db->trans_rollback();
			echo $e->getMessage();
			die();
		  }

		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PRODUCT_LIST);
	   
	}
	
}
