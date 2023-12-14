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
		$this->load->view('dashboard', $data);
	}
	public function stats()
	{
	    
        $data['menu'] = '3';
		$this->load->view('statistics', $data);
	}
}
