<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    
    }
	public function index()
	{
	    if(!empty($_SESSION['admin_logged_in'])){
            redirect(FATHER_BASE);
        }
		$this->load->view('login_view');
	}
	public function login_post()
	{
		$post = $this->input->post();
		
		$check = $this->db->select('*')
		      ->where('username', $post['username'])
		      ->where('password', md5($post['password']))
		      ->get('admin_table')->row_array();
		 
		//debug($check);
		if(!empty($check)){
		    $_SESSION['admin_logged_in'] = 1;
		    $_SESSION['full_name'] = $check['full_name'];
			//debug($_SESSION);
		    redirect($_ENV['BASE_URL']);
		}else{
		    $_SESSION['login_error'] = 1;
		    redirect(LOGIN);
		}
		
	}
	
	public function logout(){
	    unset($_SESSION['admin_logged_in']);
	    unset($_SESSION['full_name']);
	    redirect(LOGIN);
	}
	
	
}
