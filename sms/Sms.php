<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms{

    public $to;
    public $sms_text;

    public function __construct($to, $sms_text)
    {
        $this->to = $to;
        $this->sms_text = $sms_text;   
    }
	
	public function send_sms(){

        /* echo '<pre>';
        print_r($this->to);
        print_r($this->sms_text);

        die(); */

        $sms_msg = array(
            "username" => "908502422125", // https://oim.verimor.com.tr/sms_settings/edit adresinden öğrenebilirsiniz.
            "password" => "968574", // https://oim.verimor.com.tr/sms_settings/edit adresinden belirlemeniz gerekir.
            "source_addr" => "", // Gönderici başlığı, https://oim.verimor.com.tr/headers adresinde onaylanmış olmalı, değilse 400 hatası alırsınız.
        //    "valid_for" => "48:00",
        //    "send_at" => "2015-02-20 16:06:00",
        //    "datacoding" => "0",
            "custom_id" => microtime(),
            "messages" => array(
            array(
             "msg" => $this->sms_text,
             "dest" => $this->to
           )
          )
         );
            $ch = curl_init('https://sms.verimor.com.tr/v2/send.json');
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
                CURLOPT_POSTFIELDS => json_encode($sms_msg),
            ));
            $http_response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($http_code != 200){
              echo "$http_code $http_response\n";
              return false;
            }
        
            return $http_response;
        }
        
        /*$source_addr = "BASLIGIM";
        $message = "Test mesajıdır"; // Bu metin UTF8 olmalı, değilse 400 hatası alırsınız. Veritabanından alınan string'ler, veritabanı bağlantısının encoding'iyle gelir, UTF8 değilse çevirmeniz gerekir.
        $dest = "905321234567,905321234568";*/
        
    
	
}
