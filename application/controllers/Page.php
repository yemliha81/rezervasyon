<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
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
    
	public function page_list()
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
	    $this->db->where('is_deleted', '0');
		$count = $this->db->count_all_results('pages_table');
		
		$plus = (($count % 20)>0) ? 1 : 0;
		
		$data['total'] = (($count - ($count % 20) ) / 20)+$plus;
		
		$data['pages'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
		    ->where('is_deleted', '0')
			->get('pages_table')->result_array();
			
		$data['menu'] = '4';
		$data['c_id'] = $id;
		$data['m_id'] = $data['cat']['menu_id'];

        //debug($data);
			
		$this->load->view('page/page_list_view', $data);
	}
	
	public function add_page()
	{
	    
		$this->load->view('page/add_page_view', $data);
	}
	
	public function add_page_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['page_image'])){
			$file = $_FILES['page_image'];
			$img_name = img_seo_name(time().'-'.$post['page_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/page/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/page/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/page/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$ins['page_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		//foreach($_SESSION['lang_array'] as $lang){
	    	$ins['category_id'] = $post['category_id'];
		    $ins['icons'] = $post['icons'];
		    $ins['page_name_en'] = $post['page_name_en'];
		    $ins['page_description_en'] = $post['page_description_en'];
		    
		//}
		
		$this->db->insert('pages_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PAGE_LIST.$post['category_id']);
		
	}
	
	public function update_page($id)
	{
		$data['page'] = $this->db->select('*')
			->where('id', $id)
			->get('pages_table')->row_array();
		
		//debug($data);
		
		$this->load->view('page/update_page_view', $data);
		
	}
	
	public function update_page_post()
	{
        //FOR TESTING
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($_FILES);
		
		
		if(!empty($_FILES['page_image']['name'])){
			$file = $_FILES['page_image'];
			$img_name = img_seo_name(time().'-'.$post['page_name']).'.jpg';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/page/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/page/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/page/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$upd['page_image'] = $img_name;
					}
					
				}
			}
			
		}else{
		    //$upd['page_image'] = '';
		}
		
		//foreach($_SESSION['lang_array'] as $lang){
		    $upd['page_name_en'] = $post['page_name_en'];
		    $upd['page_description_en'] = $post['page_description_en'];
		    
		//}
		
		
		$this->db->update('pages_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(PAGE_LIST.$post['category_id']);
		
	}
	
	public function hide_page()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		
		$hidden = ($post['hidden'] == '0') ? 1 : 0;
		
		if($id != ''){
		    $this->db->update('pages_table', array('is_hidden' => $hidden), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
		}else{
		    echo 'error';
		}
		
	}
	
	public function delete_page()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		if($id != ''){
		    $this->db->update('pages_table', array('is_deleted' => 1), array('id' => $id));
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
