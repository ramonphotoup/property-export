<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\Endpoint;
use App\Models\FlickrWrapper;
use Symfony\Component\HttpKernel\Tests\Exception\AccessDeniedHttpExceptionTest;
use Session;


class EndpointController extends ParentController
{
    //
    public function __construct(){
        parent::__construct();
        $this->controller = 'endpoint';
        $this->view_param['page_title'] = 'Endpoint';
    }

    public function index(Request $request){

        $flickr = new FlickrWrapper();
        //$res = $flickr->getPhotosByTags('inspection');
        //$res = $flickr->getPhotoById('32126256356');
        //$this->p($res,1);


        return $this->render('ait.index');


        die;
        $endpoint = new Endpoint();
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' List';
        $this->view_param['endpoints'] = $endpoint->get_endpoints();
        return $this->render($this->controller . '.list');
    }

    public function create(){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Create';
        $this->view_param['entities'] = $this->get_group_entities_options();
        $this->view_param['methods'] = array('Post' => 'Post', 'Put' => 'Put');
        return $this->render($this->controller . '.create');
    }

    public function store(Request $request){

        $endpoint = new Endpoint();

        $endpoint->entities_id = $request->entities_id;
        $endpoint->method = $request->method;
        $endpoint->http_headers = $request->http_headers;
        $endpoint->description = $request->description;
        $endpoint->url = $request->url;

        $endpoint->save();

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);

        return redirect()->route($this->controller . '.index');
    }

    public function show($id){
        //return Partner::find($id);
    }

    public function destroy(Request $request){
        Endpoint::destroy($request->id);
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Deleted...',true);
        return redirect()->route($this->controller . '.index');
    }

    public function edit($id){
        $this->view_param['inner_page_title'] = $this->view_param['page_title'] . ' Edit';

        $this->view_param['endpoint'] = Endpoint::find($id);
        $this->view_param['entities'] = $this->get_group_entities_options();
        $this->view_param['methods'] = array('Post' => 'Post', 'Put' => 'Put');

        return $this->render($this->controller.'.edit');
    }

    public function update(Request $request, $id){
        $endpoint = Endpoint::find($id);

        $endpoint->entities_id = $request->entities_id;
        $endpoint->method = $request->method;
        $endpoint->url = $request->url;
        $endpoint->http_headers = $request->http_headers;
        $endpoint->description = $request->description;

        $endpoint->save();

        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);

        return redirect()->route($this->controller . '.index');
    }

}
