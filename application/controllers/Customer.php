<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
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

	public function customer_list(){
		$data['menu'] = '3';
		$data['total'] = 1;
		$data['page'] = 1;
		$data['customers'] = $this->db->select('*')
			->get('customer_table')->result_array();
		
		$this->load->view('customer/customer_list_view', $data);
	}
    
	public function save_customer_post()
	{
	    
	    $post = $this->input->post();

		//debug($post);

		$ins['full_name'] = $post['full_name'];
		$ins['email'] = $post['email'];
		$ins['gsm'] = $post['gsm'];
		$ins['birthday'] = $post['birthday'];
		$ins['gender'] = $post['gender'];

		$this->db->insert('customer_table', $ins);

		if($this->db->affected_rows() > 0){
			echo 'success';
			die();
		}

		echo 'error';
	}
	
}
