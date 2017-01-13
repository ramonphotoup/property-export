<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 1/13/17
 * Time: 7:51 AM
 */

$assigned_photoup_api_key = '9cJTnJyCCUtEoMZaixpC-8g4hL1_9I6W9qKh251_PZo';
$assigned_photoup_token = 'TzQ_Yzy2I3Y3mMWr79s58hRWunhqVJZbUNKC2JQctsY';
//$assigned_photoup_token = '52b3d46c459abe8039b1b4505cbb621bdd9d6d3cde099d4164fde61c91d59345';

$sand_box_domain = 'www.reladevel.com';
$production_domain = 'www.relahq.com';
$endpoint_domain = $sand_box_domain;
//$endpoint_domain = $production_domain;
$uri_endpoint_property_image_upload = '/api/v1/object/property_image';
$uri_endpoint_property_update = '/api/v1/object/property/';

$method = 'POST';
//$method = 'PUT';


$base_url = 'http://photoup.export/';

$image_path = $base_url."house1.jpg";

$uid = 11031;
//existing property nid from
$property_nid = 178346;
$property_image_nid = 178621;
$unique_id = uniqid();

$endpoint = 'https://' . $endpoint_domain . $uri_endpoint_property_image_upload;
//$endpoint = 'https://' . $endpoint_domain . $uri_endpoint_property_image_upload . "/{$property_image_nid}";
//$endpoint = 'https://' . $endpoint_domain . $uri_endpoint_property_update . $property_nid;

$file = [
    'uid'=>$uid,
    /*'nid'=>$property_image_nid,*/
    'file' => [
        'file' => image_path_to_base64($image_path),
        'filename' => 'house4.jpg'
    ],
    'property_reference' => $property_nid,
    'main_image' => false,
    'description' => 'Description of image test',
    'date_taken' => strtotime('2016-03-03')
];

//die("<img src='".image_path_to_base64($image_path)."'>");

$data = $file;
//$data = $property;

$ch = curl_init($endpoint);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//curl option for expired SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$headers = [
    'content-type: application/json',
    'API-KEY: ' . $assigned_photoup_api_key,
    'TOKEN: ' . $assigned_photoup_token
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$server_output = curl_exec ($ch);

curl_close ($ch);

print  $server_output ;

//property
//{"uri":"https://www.reladevel.com/relaautologin/52b3d46c459abe8039b1b4505cbb621bdd9d6d3cde099d4164fde61c91d59345","nid":"178346"}
//images
//{"uri":"https://www.reladevel.com/relaautologin/7a57df40129542246394fa518219bce081c8d3b827b60d7338bd2be3b285b0eb","nid":"178621"}
//{"uri":"https://www.reladevel.com/relaautologin/6ce1b74b0cd09d59b8c78e0be8e9f5b81a406ee3ef657ea32291c66c6abe0ab9","nid":"178626"}

//==================================================================================================
//**************************************Function Section********************************************
//==================================================================================================


function image_path_to_base64($path){

    if(trim($path) === ''){
        throw new InvalidArgumentException("path must be a none empty string");
    }

    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    //return 'data:image/' . $type . ';base64,' . base64_encode($data);
    return base64_encode($data);
}

?>