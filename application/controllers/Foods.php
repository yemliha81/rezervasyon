<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foods extends CI_Controller {
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
    
	public function food_list($id)
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
	    $this->db->where('category_id', $id);
	    $this->db->where('is_deleted', '0');
		$count = $this->db->count_all_results('foods_table');
		
		$plus = (($count % 20)>0) ? 1 : 0;
		
		$data['total'] = (($count - ($count % 20) ) / 20)+$plus;
		
		//debug($data);
		
		$data['cat'] = $this->db->select('menu_id')
		    ->where('id', $id)
		    ->get('category_table')->row_array();
	    
	    
		$data['foods'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
		    ->where('category_id', $id)
		    ->where('is_deleted', '0')
			->get('foods_table')->result_array();
			
		$data['menu'] = '4';
		$data['c_id'] = $id;
		$data['m_id'] = $data['cat']['menu_id'];
			
		$this->load->view('food/food_list_view', $data);
	}
	
	public function add_food($id)
	{
	    $data['c_id'] = $id;
		$this->load->view('food/add_food_view', $data);
	}
	
	public function add_food_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['food_image'])){
			$file = $_FILES['food_image'];
			$img_name = img_seo_name(time().'-'.$post['food_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/food/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/food/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/food/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$ins['food_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		//foreach($_SESSION['lang_array'] as $lang){
	    	$ins['category_id'] = $post['category_id'];
		    
		    $ins['food_price'] = $post['food_price'];
		    $ins['icons'] = $post['icons'];
		    $ins['food_name_en'] = $post['food_name_en'];
		    $ins['food_description_en'] = $post['food_description_en'];
		    if(!empty($post['food_name_sr'])){
		        $ins['food_name_sr'] = $post['food_name_sr'];
		    }
		    if(!empty($post['food_description_sr'])){
		        $ins['food_description_sr'] = $post['food_description_sr'];
		    }
		//}
		
		
		
		$this->db->insert('foods_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(FOOD_LIST.$post['category_id']);
		
	}
	
	public function update_food($id)
	{
		$data['food'] = $this->db->select('*')
			->where('id', $id)
			->get('foods_table')->row_array();
		
		$this->load->view('food/update_food_view', $data);
		
	}
	
	public function update_food_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($_FILES);
		
		
		if(!empty($_FILES['food_image']['name'])){
			$file = $_FILES['food_image'];
			$img_name = img_seo_name(time().'-'.$post['food_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/food/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/food/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/food/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$upd['food_image'] = $img_name;
					}
					
				}
			}
			
		}else{
		    //$upd['food_image'] = '';
		}
		
		//foreach($_SESSION['lang_array'] as $lang){
		    $upd['food_name_en'] = $post['food_name_en'];
		    $upd['food_price'] = $post['food_price'];
		    $upd['icons'] = $post['icons'];
		    $upd['food_description_en'] = $post['food_description_en'];
		    if(!empty($post['food_name_sr'])){
		        $upd['food_name_sr'] = $post['food_name_sr'];
		    }
		    if(!empty($post['food_description_sr'])){
		        $upd['food_description_sr'] = $post['food_description_sr'];
		    }
		//}
		
		
		
		
		$this->db->update('foods_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(FOOD_LIST.$post['category_id']);
		
	}
	
	public function hide_food()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		
		$hidden = ($post['hidden'] == '0') ? 1 : 0;
		
		if($id != ''){
		    $this->db->update('foods_table', array('is_hidden' => $hidden), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
		}else{
		    echo 'error';
		}
		
	}
	
	public function delete_food()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		if($id != ''){
		    $this->db->update('foods_table', array('is_deleted' => 1), array('id' => $id));
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
