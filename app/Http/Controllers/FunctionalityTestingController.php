<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RelaWrapper;
use Mockery\CountValidator\Exception;

class FunctionalityTestingController extends ParentController
{
    public function index(){
        $rela = new RelaWrapper();

        $uid = 11051; //11051  11031
        $nid = 178611; // 178616
        $unique_id = uniqid();

        $property = [
            'uid' => $uid,
            'title' => 'title_'.$unique_id,
            'street' => 'street_'.$unique_id,
            'city' => 'Manhattan',
            'state' => 'NY',
            'zip' => '10011',
            'country' => 'US',
            'object' => 'property',
            'description' => 'This is a test description...'
        ];

        $files = [
            'file' => [
                'file' => '{'.$rela->image_path_to_base64('http://photoup.export/h5.jpg').'}',
                'filename' => $unique_id . '_image.jpg'
            ],
//            'main_image' => true,
            'property_reference' => $nid,
            'uid' => $uid
        ];



        //$rela->push_data($property);
        $rela->push_data($files);

        //$this->p($rela->data,1);

        //$this->p($rela->update_property($nid),1);
        //$this->p($rela->update_property_image(178631));
        $this->p($rela->create_property_image());

        die;

        //property nid 178611
        //images
        //{"uri":"https://www.reladevel.com/relaautologin/c047254d1666466a829827403f833e3bca0831cd94bdf692f8816e1e8296705e","nid":"178631"}
        //{"uri":"https://www.reladevel.com/relaautologin/0397de70a3fe25b1dbd0f1239b093fea7077ee463d72a19cf632bb86f02b1c44","nid":"178641"}'


        //property
        //{"uri":"https://www.reladevel.com/relaautologin/52b3d46c459abe8039b1b4505cbb621bdd9d6d3cde099d4164fde61c91d59345","nid":"178346"}
        //images
        //{"uri":"https://www.reladevel.com/relaautologin/7a57df40129542246394fa518219bce081c8d3b827b60d7338bd2be3b285b0eb","nid":"178621"}
        //{"uri":"https://www.reladevel.com/relaautologin/6ce1b74b0cd09d59b8c78e0be8e9f5b81a406ee3ef657ea32291c66c6abe0ab9","nid":"178626"}
    }

    public function property(){
        $rela = new RelaWrapper();

        $uid = 11051; //    11051       11031
        $property_nid = 178691; //   178616   178676
        $unique_id = uniqid();

        $property = [
            'uid' => $uid,
            'title' => 'test-update_'.$unique_id,
            'street' => 'test-update_'.$unique_id,
            'city' => 'Manhattan',
//            'state' => 'NY',
            'zip' => '10011',
            'country' => 'US',
            'object' => 'property',
            'description' => 'This is a test description...'
        ];


        $rela->push_data($property);
        //$this->p($rela->create_property());
        $this->p($rela->update_property($property_nid),1);

        //$this->p($rela->data,1);

        die;
    }

    public function propertyImage(){
        $rela = new RelaWrapper();

        $uid = 11051; //    11051       11031
        $property_image_nid = 178691; //   178616      178611      178676
        $property_nid = 178691; //   178616      178611      178676
        $unique_id = uniqid();

        $files = [
            'file' => [
                'file' => '{'.$rela->image_path_to_base64('http://photoup.export/h5.jpg').'}',
                'filename' => $unique_id . '_image.jpg'
            ],
//            'main_image' => true,
//            'property_reference' => $property_nid, //required, is no supplied error message will show ["The following fields are required and/or have incorrect data: property_reference"]
            'uid' => $uid //required, is no supplied error message will show ["The following fields are required and/or have incorrect data: property_reference"]
        ];


        $rela->push_data($files);

        $this->p($rela->update_property_image($property_image_nid));
        //$this->p($rela->create_property_image());

        die;
        //   /api/v1/object/properties/{uid}
    }

    public function property_list(){
        $rela = new RelaWrapper();
        //return $rela->get_properties(11051);
        return $rela->get_properties(11051);
    }

    public function rela_auth(){

        $rela = new RelaWrapper();

        $uid = 11031;
        $nid = 178611; // 178616
        $unique_id = uniqid();

        $property = [
            'uid' => $uid,
            'title' => 'title_'.$unique_id,
            'street' => 'street_'.$unique_id,
            'city' => 'Manhattan',
            'state' => 'NY',
            'zip' => '10011',
            'country' => 'US',
            'object' => 'property',
            'description' => 'This is a test description...'
        ];

        $files = [
            'file' => [
                'file' => '{'.$rela->image_path_to_base64('http://photoup.export/h5.jpg').'}',
                'filename' => $unique_id . '_image.jpg'
            ],
//            'main_image' => true,
            'property_reference' => $nid,
            'uid' => $uid
        ];

        try{
            $res = $rela->auth($uid);
        }catch(Exception $e){
            $res = $e->getMessage();
        }



        $this->p($res,1);

        die;

        return 'ou';
    }

    public function i_frame(){
        return view('test.iframe');
    }

    public function autocomplete_address(){
        return view('test.autocompleteaddress');
    }

    public function popup(){
        return view('test.popup');
    }

    public function success_rela_registration(){

    }

    public function property_create_test(){

        return view('test.json');

    }
}