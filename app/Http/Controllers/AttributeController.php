<?php

namespace App\Http\Controllers;

//use App\Attribute;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Entity;
use App\Models\Attribute;
use App\Models\Schema;
use App\Models\PhotoUpStandardField;
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

        $this->view_param['schema'] = $schema->get_schema();

        return $this->render($this->controller . '.list');
    }

    public function create(){

        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Create';

        $this->view_param['entities'] = $this->get_group_entities_options();

        return $this->render($this->controller . '.create');
    }

    public function store(Request $request){

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

        $schema = new Schema();
        $schema->delete_schema_n_dependencies($request->id);

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Deleted...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function edit($id){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';
        $this->view_param['schema'] = Schema::find($id);

        $this->view_param['entities'] = $this->get_group_entities_options();

        $this->view_param['standard_fields'] = $this->get_standard_field_options();

        $attribute = new Attribute();

        if(isset($this->view_param['schema']->id)){
            $this->view_param['attributes'] = $attribute->get_attribute_detail($this->view_param['schema']->id);
            //$this->p($this->view_param['attributes'],1);
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

    public function map(Request $request){

        $attribute = Attribute::find($request->attributes_id);

        $attribute->photoup_standard_fields_id = $request->field_id;

        $attribute->save();

        return json_encode(array('message'=>'Success'));
        //return json_encode(array('message'=>'Error'));
    }

}
