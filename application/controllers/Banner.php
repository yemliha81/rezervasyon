<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
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
    
	public function banner_list()
	{
	    
	    $data['page'] = $_GET['page'] ?? 1;
	    
	    $this->db->where('is_deleted', '0');
		$count = $this->db->count_all_results('banner_table');
		
		$plus = (($count % 20)>0) ? 1 : 0;
		
		$data['total'] = (($count - ($count % 20) ) / 20)+$plus;
		
		$data['pages'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
		    ->where('is_deleted', '0')
			->get('banner_table')->result_array();
			
		$data['menu'] = '6';

        //debug($data);
			
		$this->load->view('banner/banner_list_view', $data);
	}
	
	public function add_banner()
	{
	    
		$this->load->view('banner/add_banner_view', $data);
	}
	
	public function add_banner_post()
	{
		require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($_FILES['banner_image'])){
			$file = $_FILES['banner_image'];
			$img_name = img_seo_name(time().'-'.$post['banner_name']).'.png';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/banner/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/banner/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/banner/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$ins['banner_image'] = $img_name;
					}
					
				}
			}
			
		}
		
		//debug($_FILES);
		
		//foreach($_SESSION['lang_array'] as $lang){
		    //$ins['name'] = $post['name'];
		    $ins['url'] = $post['url'];
		    
		//}
		
		$this->db->insert('banner_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(BANNER_LIST.$post['category_id']);
		
	}
	
	public function update_banner($id)
	{
		$data['page'] = $this->db->select('*')
			->where('id', $id)
			->get('banner_table')->row_array();
		
		//debug($data);
		
		$this->load->view('banner/update_banner_view', $data);
		
	}
	
	public function update_banner_post()
	{
        //FOR TESTING
	    require DOC_ROOT . 'simpleImage/SimpleImage.php';
		$post = $this->input->post();
		//debug($_FILES);
		
		
		if(!empty($_FILES['banner_image']['name'])){
			$file = $_FILES['banner_image'];
			$img_name = img_seo_name(time().'-'.$post['banner_name']).'.png';
			if( ( $file['type'] == 'image/jpeg' ) OR ( $file['type'] == 'image/png' ) ){
				
				if( ( $file['size'] > 0 ) AND ( $file['size'] < 3000000 ) ){
					
				//File Upload
					$from_file = $file['tmp_name'];
					$to_file = DOC_ROOT . '/files/banner/img/100/' .$img_name;
					$to_file2 = DOC_ROOT . '/files/banner/img/400/' .$img_name;
					$to_file3 = DOC_ROOT . '/files/banner/img/1000/' .$img_name;
					$save_image = $this->save_image($from_file,$to_file, 150, 150);
					$save_image = $this->save_image($from_file,$to_file2, 400, 400);
					$save_image = $this->save_image($from_file,$to_file3, 1200, 1200);
					
					if($save_image == true){
						$upd['banner_image'] = $img_name;
					}
					
				}
			}
			
		}else{
		    //$upd['banner_image'] = '';
		}
		
		//foreach($_SESSION['lang_array'] as $lang){
		    //$upd['name'] = $post['name'];
		    $upd['url'] = $post['url'];
		    
		//}
		
		
		$this->db->update('banner_table', $upd, array('id' => $post['id']));
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('process', 'success');
		}else{
			$this->session->set_flashdata('process', 'fail');
		}
		
		redirect(BANNER_LIST.$post['category_id']);
		
	}
	
	public function hide_banner()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		
		$hidden = ($post['hidden'] == '0') ? 1 : 0;
		
		if($id != ''){
		    $this->db->update('banner_table', array('is_hidden' => $hidden), array('id' => $id));
		}
		if($this->db->affected_rows() > 0){
			echo 'ok';
		}else{
		    echo 'error';
		}
		
	}
	
	public function delete_banner()
	{
		$post = $this->input->post();
	    $id = $post['id'];
		//todo delete script
		if($id != ''){
		    $this->db->update('banner_table', array('is_deleted' => 1), array('id' => $id));
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
			->toFile($to_file, 'image/png') ;     // convert to PNG and save a copy to new-image.png
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
