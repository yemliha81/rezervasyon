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
		if(($_SESSION['role'] == '2')){
            redirect(RESERVATION_CHECK);
        }
    }

	public function user_list(){
		$data['menu'] = '4';
		$data['total'] = 1;
		$data['page'] = 1;
		$data['users'] = $this->db->select('*')
			->where('is_deleted', 0)
			->get('admin_table')->result_array();
		
		$this->load->view('user/user_list_view', $data);
	}

	public function add_user()
	{
		$data['menu'] = '4';
		
		$this->load->view('user/add_user_view.php', $data);
	}
    
	public function save_user_post()
	{
	    
	    $post = $this->input->post();

		//debug($post);

		$ins['full_name'] = $post['full_name'];
		$ins['username'] = $post['username'];
		$ins['password'] = md5($post['password']);
		$ins['role'] = $post['role'];

		

		try {
			$this->db->insert('admin_table', $ins);

			if($this->db->affected_rows() > 0){
				redirect(USER_LIST);
			}
		} catch (\Throwable $th) {
			throw $th;
		}
	}

	public function update_user($id)
	{
		$data['menu'] = '4';
		$data['user'] = $this->db->select('*')
			->where('id', $id)
			->get('admin_table')->row_array();
		
		$this->load->view('user/update_user_view.php', $data);
	}

	public function update_user_post()
	{
		$post = $this->input->post();

		//debug($post);

		$upd['full_name'] = $post['full_name'];
		$upd['username'] = $post['username'];
		$upd['password'] = md5($post['password']);
		$upd['role'] = $post['role'];

		try {
			$this->db->update('admin_table', $upd, array('id' => $post['id']));

			if($this->db->affected_rows() > 0){
				redirect(USER_LIST);
			}else{
				redirect(USER_LIST);
			}
		} catch (\Throwable $th) {
			throw $th;
		}
		
		
	}

	public function delete_user(){
		$post = $this->input->post();

		//debug($post);

		$upd['is_deleted'] = 1;

		try {
			$this->db->update('admin_table', $upd, array('id' => $post['id']));

			if($this->db->affected_rows() > 0){
				echo "success"; die();
			}
		} catch (\Throwable $th) {
			throw $th;
		}
	}
	
}
