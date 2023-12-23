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
        
    }

    public function latest_reservation_list()
	{
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

        $data['page'] = $_GET['page'] ?? 1;
		
		$data['reservations'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
            ->where('start >', date('Y-m-d', time()))
            ->where('start <', date('Y-m-d', time()+86400))
            ->where('reservation_table.is_deleted', 0)
            ->join("customer_table", "reservation_table.customer_id = customer_table.id", "left")
			->get('reservation_table')->result_array();
        
        $count = count($data['reservations']);
        $plus = (($count % 20)>0) ? 1 : 0;
        $data['total'] = (($count - ($count % 20) ) / 20)+$plus;
			
		$data['menu'] = '2';
			
		$this->load->view('reservation/latest_reservation_list_view', $data);
	}

    public function reservation_list()
	{
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

        $data['page'] = $_GET['page'] ?? 1;
		
		$data['reservations'] = $this->db->select('*')
		    ->limit(20, (($data['page']-1)*20))
            ->where('reservation_table.is_deleted', 0)
            ->order_by('reservation_table.id', 'DESC')
            ->join("customer_table", "reservation_table.customer_id = customer_table.id", "left")
			->get('reservation_table')->result_array();
        
        $count = count($data['reservations']);
        $plus = (($count % 20)>0) ? 1 : 0;
        $data['total'] = (($count - ($count % 20) ) / 20)+$plus;
		$data['menu'] = '2';
			
		$this->load->view('reservation/reservation_list_view', $data);
	}
    
	public function calendar()
	{
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

	    $data['menu'] = '2';

        $data['customers'] = $this->db->select('*')
            ->get('customer_table')->result_array();
        
        $data['res_data'] = $this->db->select('reservation_table.id, full_name as title, start, end')
            ->where('reservation_table.is_deleted', 0)
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

    public function cancel_reservation(){
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

        require DOC_ROOT . 'sms/Sms.php';
	    
	    $post = $this->input->post();

        $reservation = $this->db->select('*')
            ->where('id', $post['id'])
            ->get('reservation_table')->row_array();

        $customer = $this->db->select('*')
            ->where('id', $reservation['customer_id'])
            ->get('customer_table')->row_array();

        try {
            $this->db->trans_start();
            $this->db->update('reservation_table', array('is_deleted' => 1), array('id' => $post['id']));
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                echo "db error";
            }else{
                echo "success";

                $to = $customer['gsm'];
                //debug($to);
                $sms_text = "Sayın ".$customer['full_name'].", ".$this->date_format($post['start'])." tarihli rezervasyonunuz iptal edilmiştir. Tekrar görüşmek dileğiyle.";

                $sms = new Sms($to, $sms_text);
                $sms->send_sms();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function save_reservation_post()
	{
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

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
            $r_id = 10250+$id;

            $this->db->update('reservation_table', array('reservation_number' => $r_id), array('id' => $id));

            $to = $customer['gsm'];
            //debug($to);
            $sms_text = "Sayın ".$customer['full_name'].", ".$this->date_format($post['start'])." tarihli ". $post['person'] . " kişilik rezervasyonunuz oluşturulmuştur. Detay için ".$_ENV['BASE_URL']."kurallar/".$r_id."/".md5($r_id)." adresini ziyaret edebilirsiniz.";

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


    public function reservation_check(){
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

        $data = [];


        $this->load->view('reservation/reservation_check_view', $data);
    }

    public function reservation_check_post($id){
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

       $result = $this->r_check_hash($id, md5($id));

       if($result != "error"){
        echo $result;
       }

    }

    public function r_check_hash($r_id, $md5){
        
        if(empty($_SESSION['admin_logged_in'])){
            redirect(LOGIN);
        }

        if(md5($r_id) != $md5){
            die('Yetkisiz işlem');
        }

        $check = $this->db->select('*')
            ->join("customer_table", "reservation_table.customer_id = customer_table.id", "left")
            ->where('reservation_table.reservation_number', $r_id)
            ->get('reservation_table')->row_array();

        if(!empty($check)){
            return json_encode($check);
        }else{
            return "error";
        }
    }

    public function r_customer_check_hash($r_id, $md5){
        
        if(md5($r_id) != $md5){
            die('Yetkisiz işlem');
        }

        $data['reservation'] = $this->db->select('*')
            ->join("customer_table", "reservation_table.customer_id = customer_table.id", "left")
            ->where('reservation_table.reservation_number', $r_id)
            ->get('reservation_table')->row_array();

        if(!empty($data['reservation'])){
            $this->load->view('reservation/reservation_customer_check_view', $data);
        }else{
            echo "Rezervasyon Bulunamadı!";
        }
    }
	
	
}
