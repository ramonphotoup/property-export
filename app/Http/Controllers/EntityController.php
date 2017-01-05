<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Entity;
use Symfony\Component\HttpKernel\Tests\Exception\AccessDeniedHttpExceptionTest;
use Session;

class EntityController extends ParentController
{

    public function __construct(){
        parent::__construct();
        $this->controller = 'entity';
        $this->view_param['page_title'] = 'Entity';
    }

    public function index(Request $request){
        //$this->curl_test();die;
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' List';

        $entity = new Entity();

        $this->view_param['entities'] = $entity->getEntities();

        return $this->render($this->controller . '.list');
    }

    public function create(){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Create';

        $this->view_param['partners'] = $this->get_partners();

        return $this->render($this->controller . '.create');
    }

    public function store(Request $request){

        $entity = new Entity();

        $entity->save_entity_per_partner($request->partners_id, $request->name, '');
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function show($id){
        //return Partner::find($id);
    }

    public function destroy(Request $request){
        Entity::destroy($request->id);
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Deleted...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function edit($id){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';
        $this->view_param['entity'] = Entity::find($id);
        $this->view_param['partners'] = $this->get_partners();
        return $this->render($this->controller.'.edit');
    }

    public function update(Request $request, $id){
        $entity = Entity::find($id);

        $entity->name = $request->name;
        $entity->partners_id = $request->partners_id;

        $entity->save();

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);

        return redirect()->route($this->controller . '.index');
    }

    /**
     * @return array
     */
    private function get_partners(){
        $partners = array();
        foreach(Partner::all() as $index => $value){
            $partners[$value->id] = $value->name;
        }
        return $partners;
    }

    private function curl_test(){

        $uid = 11031;
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

        print  $server_output ;
    }
}
