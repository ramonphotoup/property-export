<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

abstract class ParentController extends Controller
{
    //

    public $view_param = ['page_title' => 'PhotoUp Export'];
    public $controller = '';

    public function __construct(){
        $this->view_param['alert_type'] = '';
        $this->view_param['alert_message'] = '';
    }

    public function render($view){

        $this->view_param['controller'] = $this->controller;
        if(Session::has('alert_type')){
            $this->set_alert_message(Session::get('alert_type'),Session::get('alert_message'));
        }
        return view($view, $this->view_param);
    }

    public function set_alert_message($type,$message,$flash=false){
        if($flash === true){
            Session::flash('alert_type',$type);
            Session::flash('alert_message',$message);
        }else{
            $this->view_param['alert_type'] = $type;
            $this->view_param['alert_message'] = $message;
        }
    }

    public function p($mix, $exit = false){
        echo '<pre>';
        print_r($mix);
        echo '</pre>';
        if($exit)die;
    }
}
