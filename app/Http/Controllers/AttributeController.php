<?php

namespace App\Http\Controllers;

//use App\Attribute;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Entity;
use App\Models\Attribute;
use App\Models\Schema;
use Symfony\Component\HttpKernel\Tests\Exception\AccessDeniedHttpExceptionTest;
use Session;

class AttributeController extends ParentController
{
    public function __construct(){
        parent::__construct();
        $this->controller = 'attribute';
        $this->view_param['page_title'] = 'Attribute';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' List';
        $schema = new Schema();

        //$this->p($schema->get_schema(),1);

        $this->view_param['schema'] = $schema->get_schema();

        return $this->render($this->controller . '.list');
    }

    public function create(){

        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Create';

        $this->view_param['entities'] = $this->get_group_entities();


        return $this->render($this->controller . '.create');
    }

    public function store(Request $request){
        //$this->p(json_decode(''));

        $data = json_decode(file_get_contents($_FILES['attributes']['tmp_name']));



        //$this->p($data[0]->Description);

        //die;

        $schema = new Schema();

        $schema->entities_id = $request->entities_id;
        $schema->version = $request->version;
        $schema->save();

        if(isset($_FILES['attributes']['tmp_name']) === true && trim($_FILES['attributes']['tmp_name']) !== ''){
            $data = json_decode(file_get_contents($_FILES['attributes']['tmp_name']));
            $attribute = new Attribute();
            $attribute->save_attribute($schema->id, $data);
        }

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function show($id){
        return $id.'0000';
    }

    public function destroy(Request $request){
        ///Entity::destroy($request->id);
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Deleted...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function edit($id){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';
        $this->view_param['schema'] = Schema::find($id);

        $this->view_param['entities'] = $this->get_group_entities();

        $attribute = new Attribute();

        if(isset($this->view_param['schema']->id)){
            $this->view_param['attributes'] = $attribute->get_attribute_detail($this->view_param['schema']->id);
        }

        return $this->render($this->controller.'.edit');
    }

    public function update(Request $request, $id){
        $schema = Schema::find($id);
        $schema->entities_id = $request->entities_id;
        $schema->version = $request->version;
        $schema->save();

        if(isset($_FILES['attributes']['tmp_name']) === true && trim($_FILES['attributes']['tmp_name']) !== ''){
            $data = json_decode(file_get_contents($_FILES['attributes']['tmp_name']));
            $attribute = new Attribute();
            $attribute->save_attribute($schema->id, $data);
        }

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);

        return redirect()->route($this->controller . '.index');
    }

    /**
     * @return array
     */
    private function get_group_entities(){
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
}
