<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }
    
    }
	public function index()
	{
        $data['menu'] = '1';

        $data['total'] = $this->db->select('id')
            ->where('is_deleted', 0)
			->get('reservation_table')->num_rows();
        
        $data['customers'] = $this->db->select('id')
			->get('customer_table')->num_rows();
        
        $data['today'] = $this->db->select('id')
            ->where('is_deleted', 0)
            ->where('start >', date('Y-m-d', time()))
            ->where('start <', date('Y-m-d', time()+86400))
			->get('reservation_table')->num_rows();

        //debug($data);
        
		$this->load->view('dashboard', $data);
	}
	public function stats()
	{
	    
        $data['menu'] = '3';
		$this->load->view('statistics', $data);
	}
}
