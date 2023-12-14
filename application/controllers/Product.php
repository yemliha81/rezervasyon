<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if(empty($_SESSION['lang'])){
            $_SESSION['lang'] = 'tr';
        }
        if(empty($_SESSION['lang_array'])){
            $_SESSION['lang_array'] = array('tr', 'en');
        }
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }
    }
    
	public function product_list()
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
	    $this->db->where('is_deleted', '0');
		$count = $this->db->count_all_results('products_table');
		
		$plus = (($count % 20)>0) ? 1 : 0;
		
		$data['total'] = (($count - ($count % 20) ) / 20)+$plus;
		
		//debug($data);
		
	    
	    
		$data['products'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
		    ->where('is_deleted', '0')
			->get('products_table')->result_array();
			
		$data['menu'] = '2';
		$data['c_id'] = $id;
		$data['m_id'] = $data['cat']['menu_id'];
			
		$this->load->view('product/product_list_view', $data);
	}
	
	public function add_product()
	{
		/*$data['categories'] = $this->db->select('*')
		    ->where('is_deleted', '0')
			->get('category_table')->result_array();*/

			//debug($data);
	    
		$this->load->view('product/add_product_view', $data);
	}
	
	public function add_product_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['product_image'])){
			$file = $_FILES['product_image'];
			$img_name = img_seo_name(time().'-'.$post['product_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/product/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/product/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/product/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$ins['product_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		//foreach($_SESSION['lang_array'] as $lang){
	    	/*$ins['category_id'] = $post['category_id'];*/
		    $ins['product_price'] = $post['product_price'];
		    $ins['product_name_en'] = $post['product_name_en'];
		    $ins['product_description_en'] = $post['product_description_en'];
		    
		//}
		
		$this->db->insert('products_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PRODUCT_LIST);
		
	}
	
	public function update_product($id)
	{
		/*$data['categories'] = $this->db->select('*')
		    ->where('is_deleted', '0')
			->get('category_table')->result_array();*/

		$data['product'] = $this->db->select('*')
			->where('id', $id)
			->get('products_table')->row_array();
		
		//debug($data);
		
		$this->load->view('product/update_product_view', $data);
		
	}
	
	public function update_product_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['product_image']['name'])){
			$file = $_FILES['product_image'];
			$img_name = img_seo_name(time().'-'.$post['product_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/product/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/product/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/product/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$upd['product_image'] = $img_name;
					}
					
				}
			}
			
		}else{
		    //$upd['product_image'] = '';
		}
		
		//foreach($_SESSION['lang_array'] as $lang){
		    /*$upd['category_id'] = $post['category_id'];*/
		    $upd['product_name_en'] = $post['product_name_en'];
		    $upd['product_price'] = $post['product_price'];
		    $upd['product_description_en'] = $post['product_description_en'];
		    
		//}
		
		
		$this->db->update('products_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PRODUCT_LIST.$post['category_id']);
		
	}
	
	public function hide_product()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		
		$hidden = ($post['hidden'] == '0') ? 1 : 0;
		
		if($id != ''){
		    $this->db->update('products_table', array('is_hidden' => $hidden), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
		}else{
		    echo 'error';
		}
		
	}
	
	public function delete_product()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		if($id != ''){
		    $this->db->update('products_table', array('is_deleted' => 1), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
			//$this->session->set_flashdata('process', 'success');
		}else{
		    echo 'error';
			//$this->session->set_flashdata('process', 'fail');
		}
		
	}
	
	
	private function save_image($from_file, $to_file, $width, $height){
		try {
		  // Create a new SimpleImage object
		  $image = new \claviska\SimpleImage();

		  // Magic! âœ¨
		  $image
			->fromFile($from_file)                     // load image.jpg
			->autoOrient()                              // adjust orientation based on exif data
			//->resize($width, $height)                          // resize to 320x200 pixels
			//->thumbnail($width, $height, 'center')        // resize to 320x200 pixels
			->resize($width, null) 
			//->flip('x')                                 // flip horizontally
			//->colorize('DarkBlue')                      // tint dark blue
			//->border('black', 10)                       // add a 10 pixel black border
			//->overlay('watermark.png', 'bottom right')  // add a watermark image
			->toFile($to_file, 'image/jpeg') ;     // convert to PNG and save a copy to new-image.png
			//->toScreen();                               // output to the screen
			return true;
		  // And much more! ðŸ’ª
		} catch(Exception $err) {
		  // Handle errors
		  echo $err->getMessage();
		  return false;
		  die();
		}
	}
	
}
