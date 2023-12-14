<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
    
	public function category_list()
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
	    $this->db->where('is_deleted', '0');
		$count = $this->db->count_all_results('category_table');
		
		
		$plus = (($count % 20)>0) ? 1 : 0;
		
		$data['total'] = (($count - ($count % 20) ) / 20)+$plus;
	    
		$data['categories'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
		    ->where('is_deleted', '0')
			->get('category_table')->result_array();
			
		$data['menu'] = '1_1';
		
		//debug($data);
			
		$this->load->view('category/category_list_view', $data);
	}
	
	public function add_category()
	{
		$this->load->view('category/add_category_view', $data);
	}
	
	public function add_category_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['category_image'])){
			$file = $_FILES['category_image'];
			$img_name = img_seo_name(time().'-'.$post['category_name_en']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/category/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/category/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/category/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 750, 160);
					
					if($save_image == true){
						$ins['category_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		//foreach($_SESSION['lang_array'] as $lang){
		    $ins['category_name_en'] = $post['category_name_en'];
		    $ins['category_description_en'] = $post['category_description_en']??'-';
		  
		//}
		
		
		
		$this->db->insert('category_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(CATEGORY_LIST.$post['menu_id']);
		
	}
	
	public function update_category($id)
	{
		$data['category'] = $this->db->select('*')
			->where('id', $id)
			->get('category_table')->row_array();
		
		$this->load->view('category/update_category_view', $data);
		
	}
	
	public function update_category_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['category_image'])){
			$file = $_FILES['category_image'];
			$img_name = img_seo_name(time().'-'.$post['category_name_en']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/category/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/category/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/category/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 750, 160);
					
					if($save_image == true){
						$upd['category_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//foreach($_SESSION['lang_array'] as $lang){
		    $upd['category_name_en'] = $post['category_name_en'];
		    $upd['category_description_en'] = $post['category_description_en']??'-';
		    if(!empty($post['category_name_sr'])){
		        $upd['category_name_sr'] = $post['category_name_sr'];
		    }
		    if(!empty($post['category_description_sr'])){
		        $upd['category_description_sr'] = $post['category_description_sr'];
		    }
		//}
		
		
		
		
		$this->db->update('category_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(CATEGORY_LIST.$post['menu_id']);
		
	}
	
	public function delete_category()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		if($id != ''){
		    $this->db->update('category_table', array('is_deleted' => 1), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
			//$this->session->set_flashdata('process', 'success');
		}else{
		    echo 'error';
			//$this->session->set_flashdata('process', 'fail');
		}
		
	}
	
	public function hide_category()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		
		$hidden = ($post['hidden'] == '0') ? 1 : 0;
		
		if($id != ''){
		    $this->db->update('category_table', array('is_hidden' => $hidden), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
		}else{
		    echo 'error';
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
			->thumbnail($width, $height, 'center')        // resize to 320x200 pixels
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
