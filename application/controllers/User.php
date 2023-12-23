<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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

	public function user_list(){
		$data['menu'] = '4';
		$data['total'] = 1;
		$data['page'] = 1;
		$data['users'] = $this->db->select('*')
			->get('admin_table')->result_array();
		
		$this->load->view('user/user_list_view', $data);
	}
    
	public function update_user_post()
	{
	    
	    $post = $this->input->post();

		//debug($post);

		$this->db->insert('admin_table', $ins);

		if($this->db->affected_rows() > 0){
			echo $this->db->insert_id();
			die();
		}

		echo 'error';
	}
	
}
