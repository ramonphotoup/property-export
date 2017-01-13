<?php

namespace App\Models;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Doctrine\Instantiator\Exception\UnexpectedValueException;

class RelaWrapper
{
    public $endpoint = '';
    public $data = [];
    public $json_data = "";
    public $result = '';
    public $headers = [];
    public $method = '';
    public $actual_endpoint = '';
    public $property_nid = '';
    public $property_image_nid = '';

    private $methods = [
        'post' => 'POST',
        'put' => 'PUT'
    ];

    private $api_key = '9cJTnJyCCUtEoMZaixpC-8g4hL1_9I6W9qKh251_PZo';
    private $token = 'TzQ_Yzy2I3Y3mMWr79s58hRWunhqVJZbUNKC2JQctsY';
    private $endpoint_base_url = 'https://www.reladevel.com/';



    public function __construct(){

        $this->headers = [
            'content-type: application/json',
            'API-KEY: ' . $this->api_key,
            'TOKEN: ' . $this->token
        ];
    }


    public function push_data($index, $value = ''){
        if(is_array($index) === true && count($index) > 0){
            foreach($index as $i => $v){
                $this->data[$i] = $v;
            }
        }elseif(trim($index) !== '' && trim($value) !== ''){
            $this->data[$index] = $value;
        }else{
            throw new InvalidArgumentException("Invalid argument passed for push_data method",500);
        }
        $this->json_data = json_encode($this->data);
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

    public function create_property(){
        $this->endpoint = 'api/v1/object/property';
        $this->set_method('post');
        return $this->submit();
    }

    public function update_property($property_nid = ''){

        if((int)$property_nid > 0){
            $this->property_nid = $property_nid;
        }

        $this->endpoint = "api/v1/object/property/{$this->property_nid}";
        $this->set_method('put');
        return $this->submit();
    }

    public function image_path_to_base64($path){

        if(trim($path) === ''){
            throw new InvalidArgumentException("endpoints must be a none empty string(eg:URI)");
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        //return 'data:image/' . $type . ';base64,' . base64_encode($data);
        return base64_encode($data);
    }

    public function create_property_image(){
        $this->endpoint = 'api/v1/object/property_image';
        $this->set_method('post');
        return $this->submit();
    }
    
    public function update_property_image($property_image_nid = ''){

        if((int)$property_image_nid > 0){
            $this->property_image_nid = $property_image_nid;
        }

        $this->endpoint = "api/v1/object/property_image/{$this->property_image_nid}";
        $this->set_method('put');

        return $this->submit();
    }

    public function submit(){

        if(trim($this->endpoint) === ''){
            throw new InvalidArgumentException("endpoints must be a none empty string(eg:URI)");
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

        $this->actual_endpoint = $this->endpoint_base_url . $this->endpoint;

        $ch = curl_init($this->actual_endpoint);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->json_data);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //for expired SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        $this->result = curl_exec ($ch);

        if(trim($this->result) === ''){
            throw new UnexpectedValueException('Empty result');
        }

        curl_close ($ch);

        return $this->result;
    }
}
