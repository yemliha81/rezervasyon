<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {
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
    
	public function calendar()
	{
	    $data['menu'] = '2';

        $data['customers'] = $this->db->select('*')
            ->get('customer_table')->result_array();
        
        $data['res_data'] = $this->db->select('reservation_table.id, full_name as title, start, end')
            ->join("customer_table", "reservation_table.customer_id = customer_table.id", "left")
            ->get('reservation_table')->result_array();
        
        $data['events'] = json_encode($data['res_data']);
	    
			
		$this->load->view('reservation/calendar_view', $data);
	}

    public function save_reservation_post()
	{
	    
	    $post = $this->input->post();

		//debug($post);

		$ins['customer_id'] = $post['customer_id'];
		$ins['person'] = $post['person'];
		$ins['start'] = $post['start'];
		$ins['end'] = $post['end'];

		$this->db->insert('reservation_table', $ins);

		if($this->db->affected_rows() > 0){
			echo 'success';
			die();
		}

		echo 'error';



	}
	
	
}
