<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\DataTypes;
use App\Models\PhotoUpStandardField;
use App\Models\Entity;
use Symfony\Component\HttpKernel\Tests\Exception\AccessDeniedHttpExceptionTest;
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
        $this->set_ng_view();
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

    public function set_ng_view(){
        $this->view_param['ng_libs'] = array(
            'js/angular/angular.min.js',
            'js/angular/angular-animate.min.js',
            'js/angular/angular-aria.min.js',
            'js/angular/angular-material.min.js',
            'js/angular/angular-messages.min.js',
            'js/angular/angular-route.min.js',
            'js/angular/svg-assets-cache.js'
        );
    }

    /**
     * @return array
     */
    public function get_group_entities_options(){
        $entity = new Entity();
        $group_entities = array();
        foreach($entity->getEntities() as $index => $value){
            if(isset($group_entities[$value->partner]) === false){
                $group_entities[$value->partner] = array();
            }

            $group_entities[$value->partner][$value->id] = $value->entity;
        }
        return $group_entities;
    }

    /**
     * @return array
     */
    public function get_standard_field_options(){
        $options = array();
        $options['None'][0] = 'None';
        foreach(PhotoUpStandardField::orderBy("table")->orderBy("id")->get() as $index => $value){
            $options[$value->table][$value->id] = $value->name;
        }
        return $options;
    }

    /**
     * @return array
     */
    public function get_partners(){
        $partners = array();
        foreach(Partner::all() as $index => $value){
            $partners[$value->id] = $value->name;
        }
        return $partners;
    }

    /**
     * @return array
     */
    public function get_data_types(){
        $data_types = array();
        foreach(DataTypes::all()->sortBy('name') as $data_type){
            if(trim($data_type->name) !== ''){
                $data_types[$data_type->id] = $data_type->name;
            }
        }
        return $data_types;
    }


}
