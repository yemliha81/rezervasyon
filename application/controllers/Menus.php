<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {
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
    
	public function menu_list()
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
		$count = $this->db->count_all_results('menus_table');
		
		$data['total']= round(($count/20), 0) + 1;
		
		//debug($data);
	    
		$data['menus'] = $this->db->select('*, menus_table.id as menu_id')
		    ->join('category_table', 'menus_table.category_id = category_table.id', 'left')
		    ->limit(20, (($data['page']-1)*20))
		    ->where('menus_table.restaurant_id', $_SESSION['restaurant_id'])
		    ->where('is_deleted', '0')
			->get('menus_table')->result_array();
			
		$data['menu'] = '2';
			
		$this->load->view('menu/menu_list_view', $data);
	}
	
	public function add_menu($r_id)
	{
	    $data['restaurant_id'] = $r_id;
	    $data['restaurant'] = $this->db->select('*')
		    ->where('id', $r_id)
			->get('restaurants_table')->row_array();
		$data['page_title'] = 'Add Menu';
		$this->load->view('menu/add_menu_view', $data);
	}
	
	public function add_menu_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['menu_image'])){
			$file = $_FILES['menu_image'];
			$img_name = img_seo_name(time().'-'.$post['menu_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/menu/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/menu/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/menu/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$ins['menu_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		//foreach($_SESSION['lang_array'] as $lang){
		    $ins['restaurant_id'] = $post['uniq_id'];
		    $ins['menu_name_en'] = $post['menu_name_en'];
		    $ins['menu_description_en'] = $post['menu_description_en'];
		    if(!empty($post['menu_name_sr'])){
		        $ins['menu_name_sr'] = $post['menu_name_sr'];
		    }
		    if(!empty($post['menu_description_sr'])){
		        $ins['menu_description_sr'] = $post['menu_description_sr'];
		    }
		//}
		
		
		
		$this->db->insert('menus_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(RESTAURANT_PROFILE.$post['r_id']);
		
	}
	
	public function update_menu($id)
	{
		$data['menu'] = $this->db->select('*')
			->where('id', $id)
			->get('menus_table')->row_array();
	    
	    $data['restaurant'] = $this->db->select('id')
		    ->where('uniq_id', $data['menu']['restaurant_id'])
			->get('restaurants_table')->row_array();
	    
	    $data['id'] = $id;
			
		$this->load->view('menu/update_menu_view', $data);
		
	}
	
	public function update_menu_post()
	{
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['menu_image'])){
			$file = $_FILES['menu_image'];
			$img_name = img_seo_name(time().'-'.$post['menu_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/menu/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/menu/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/menu/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$upd['menu_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//foreach($_SESSION['lang_array'] as $lang){
		    $upd['menu_name_en'] = $post['menu_name_en'];
		    $upd['menu_description_en'] = $post['menu_description_en'];
		    if(!empty($post['menu_name_sr'])){
		        $upd['menu_name_sr'] = $post['menu_name_sr'];
		    }
		    if(!empty($post['menu_description_sr'])){
		        $upd['menu_description_sr'] = $post['menu_description_sr'];
		    }
		//}
		
		
		
		
		$this->db->update('menus_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(RESTAURANT_LIST);
		
	}
	
	public function delete_menu()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		if($id != ''){
		    $this->db->update('menus_table', array('is_deleted' => 1), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
			//$this->session->set_flashdata('process', 'success');
		}else{
		    echo 'error';
			//$this->session->set_flashdata('process', 'fail');
		}
		
	}
	
	public function hide_menu()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		
		$hidden = ($post['hidden'] == '0') ? 1 : 0;
		
		if($id != ''){
		    $this->db->update('menus_table', array('is_hidden' => $hidden), array('id' => $id));
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
