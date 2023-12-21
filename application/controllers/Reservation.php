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

    public function reservation_list()
	{
	    $data['menu'] = '2';

        
        
        $data['res_data'] = $this->db->select('reservation_table.id, full_name as title, start, end')
            ->get('reservation_table')->result_array();
        
        $data['events'] = json_encode($data['res_data']);
	    
			
		$this->load->view('reservation/calendar_view', $data);
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

    public function date_format($datetime){

        $hour = explode('T', $datetime)[1];
        
        $time = strtotime($datetime);

        $fmt = datefmt_create(
            'tr_TR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            'Europe/Istanbul',
            IntlDateFormatter::GREGORIAN,
            'dd MMMM Y'
        );
        return datefmt_format($fmt,  $time)." ".$hour;
      
    }

    public function save_reservation_post()
	{
        require DOC_ROOT . 'sms/Sms.php';
	    
	    $post = $this->input->post();

        $customer = $this->db->select('*')
            ->where('id', $post['customer_id'])
            ->get('customer_table')->row_array();

		//debug($post);

		$ins['customer_id'] = $post['customer_id'];
		$ins['person'] = $post['person'];
		$ins['start'] = $post['start'];
		$ins['end'] = $post['end'];

        //debug($this->date_format($post['start']));

		$this->db->insert('reservation_table', $ins);

		if($this->db->affected_rows() > 0){
			//echo 'success';
            $id = $this->db->insert_id();

            $to = ($customer['gsm'][0]) == 0 ? "9".$customer['gsm'] : "90".$customer['gsm'];
            //debug($to);
            $sms_text = "Sayın ".$customer['full_name'].", ".$this->date_format($post['start'])." tarihli ". $post['person'] . " kişilik rezervasyonunuz oluşturulmuştur. Detay için ".$_ENV['BASE_URL']."kurallar/".$id." adresini ziyaret edebilirsiniz.";

            $sms = new Sms($to, $sms_text);
            $campaign_id = $sms->send_sms();

            if($campaign_id === false)
                echo "Mesaj gonderme basarisiz.\n";
            else
                echo "success";
			
		}else{
            echo 'db error';
        }

	}
	
	
}
