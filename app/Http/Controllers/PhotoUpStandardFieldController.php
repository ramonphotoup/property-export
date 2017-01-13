<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\DataTypes;
use App\Models\PhotoUpStandardField;
use Symfony\Component\HttpKernel\Tests\Exception\AccessDeniedHttpExceptionTest;
use Session;

class PhotoUpStandardFieldController extends ParentController
{

    public function __construct(){
        parent::__construct();
        $this->controller = 'photo_up_standard';
        $this->view_param['page_title'] = 'Photo Up Standard';
    }

    public function index(Request $request){

        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' List';
        $this->view_param['photo_up_standard_fields'] = PhotoUpStandardField::orderBy("table")->orderBy("id")->get();
        return $this->render($this->controller . '.list');
    }

    public function create(){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Create';
        $this->view_param['tables'] = array('home'=>'Home','photo'=>'Photo');
        $this->view_param['data_types'] = $this->get_data_types();


        return $this->render($this->controller . '.create');
    }

    public function store(Request $request){

        $photo_up_standard = new PhotoUpStandardField();

        if(isset($_FILES['attributes']['tmp_name']) === true && trim($_FILES['attributes']['tmp_name']) !== ''){
            $data = json_decode(file_get_contents($_FILES['attributes']['tmp_name']));
            $photo_up_standard->batch_insert($data);
        }else{
            $photo_up_standard->sp_photo_up_standard_field_create($request->table, $request->name, '', $request->data_types_id);
        }

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);


        return redirect()->route($this->controller . '.index');
    }

    public function show($id){
        //return Partner::find($id);
    }

    public function destroy(Request $request){
        PhotoUpStandardField::destroy($request->id);
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Deleted...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function edit($id){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';

        $this->view_param['photo_up_standard_field'] = PhotoUpStandardField::find($id);
        $this->view_param['tables'] = array('home'=>'Home','photo'=>'Photo');
        $this->view_param['data_types'] = $this->get_data_types();

        return $this->render($this->controller.'.edit');
    }

    public function update(Request $request, $id){
        $photo_up_standard = PhotoUpStandardField::find($id);

        $photo_up_standard->table = $request->table;
        $photo_up_standard->name = $request->name;
        $photo_up_standard->data_types_id = $request->data_types_id;

        $photo_up_standard->save();

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);

        return redirect()->route($this->controller . '.index');
    }

}
