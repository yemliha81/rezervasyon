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

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sms.verimor.com.tr/v2/send.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "username" : '.$_ENV['SMS_USERNAME'].', 
            "password" : '.$_ENV['SMS_PASSWORD'].', 
            "messages" : {
                "msg" : "'.$this->sms_text.'",
                "dest" : "'.$this->to.'"
            }   
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $http_response = curl_exec($curl);

        curl_close($curl);
        
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($http_code != 200){
            echo "$http_code $http_response\n";
            return false;
        }
        
        return "success";
    }
        
        /*$source_addr = "BASLIGIM";
        $message = "Test mesajıdır"; // Bu metin UTF8 olmalı, değilse 400 hatası alırsınız. Veritabanından alınan string'ler, veritabanı bağlantısının encoding'iyle gelir, UTF8 değilse çevirmeniz gerekir.
        $dest = "905321234567,905321234568";*/
        
    
	
}
