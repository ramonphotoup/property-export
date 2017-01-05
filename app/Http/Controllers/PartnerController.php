<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Mockery\CountValidator\Exception;

class PartnerController extends ParentController
{
    public function __construct(){
        parent::__construct();
        $this->controller = 'partner';
        $this->view_param['page_title'] = 'Partner';
    }
    //
    public function index(){
        $this->view_param['partners'] = Partner::all();
        return $this->render('partner.list');
    }

    public function create(){
        return $this->render('partner.create');
    }

    public function store(Request $request){

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->api_key = $request->api_key;
        $partner->token = $request->token;
        $partner->app_id = $request->app_id;

        $partner->save();
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);
        return redirect()->route('partner.index');
    }

    public function show($id){
        //return Partner::find($id);
    }

    public function destroy(Request $request){

        Partner::destroy($request->id);
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Deleted...',true);
        return redirect()->route('partner.index');
    }

    public function edit($id){
        $this->view_param['partner'] = Partner::find($id);
        return $this->render('partner.edit');
    }

    public function update(Request $request, $id){
        $partner = Partner::find($id);
        $partner->name = $request->name;
        $partner->api_key = $request->api_key;
        $partner->token = $request->token;
        $partner->app_id = $request->app_id;

        $partner->save();
        $this->set_alert_message('success',$this->view_param['page_title'] . ' Successfully Saved...',true);
        return redirect()->route('partner.index');
    }
}
