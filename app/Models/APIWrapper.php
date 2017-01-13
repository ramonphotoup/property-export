<?php

namespace App\Models;



use Doctrine\Instantiator\Exception\InvalidArgumentException;

class APIWrapper
{

    public $endpoint = '';
    public $data = [];
    public $result = '';
    public $method = '';

    private $methods = [
        'post' => CURLOPT_POST,
        'put' => CURLOPT_PUT
    ];

    private $api_key = '9cJTnJyCCUtEoMZaixpC-8g4hL1_9I6W9qKh251_PZo';
    private $token = 'TzQ_Yzy2I3Y3mMWr79s58hRWunhqVJZbUNKC2JQctsY';
    private $headers = [];

    public function __construct(){

        $this->headers = [
            'content-type: application/json',
            'API-KEY: ' . $this->api_key,
            'TOKEN: ' . $this->token
        ];

        /*$uid = 11031;
        $unique_id = uniqid();
        $vars = [
            'uid' => $uid,
            'title' => 'title_'.$unique_id,
            'street' => 'street_'.$unique_id,
            'city' => 'Manhattan',
            'state' => 'NY',
            'zip' => '10011',
            'country' => 'US',
            'object' => 'property'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.reladevel.com/api/v1/object/property");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($vars));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //for expired SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $headers = [
            'content-type: application/json',
            'API-KEY: 9cJTnJyCCUtEoMZaixpC-8g4hL1_9I6W9qKh251_PZo',
            'TOKEN: TzQ_Yzy2I3Y3mMWr79s58hRWunhqVJZbUNKC2JQctsY'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        //{"uri":"https://www.reladevel.com/relaautologin/52b3d46c459abe8039b1b4505cbb621bdd9d6d3cde099d4164fde61c91d59345","nid":"178346"}

        print  $server_output ;*/
    }


    public function push_data($index, $value){
        $this->data[$index] = $value;
    }

    public function set_method($method){
        if(in_array($method,array('post','put')) === false){
            throw new InvalidArgumentException('Method must be put or post',500);
        }
        $this->method = $this->methods[$method];
    }

    public function set_endpoint($endpoint){
        $this->endpoint = $endpoint;
    }

    public function get_endpoint(){
        return $this->endpoint;
    }

    public function submit(){

        if(trim($this->endpoint) === ''){
            throw new InvalidArgumentException("endpoints must be a none empty string(eg:URL)");
        }

        if(trim($this->method) === ''){
            throw new InvalidArgumentException("method must be a none empty string");
        }

        if(is_array($this->data) === false || count($this->data) == 0){
            throw new InvalidArgumentException("data must be a none empty array");
        }

        if(is_array($this->headers) === false || count($this->headers) == 0){
            throw new InvalidArgumentException("headers must be a none empty array");
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$this->endpoint);
        curl_setopt($ch, $this->method, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //for expired SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        $this->result = curl_exec ($ch);

        curl_close ($ch);

        return $this->result;
    }


}
