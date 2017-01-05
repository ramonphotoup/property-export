@extends('partner.index')

@section('inner_title')
    Edit Partner
@stop

@section('form')

    {!! Form::model($partner, [
    'method' => 'patch',
    'route' => ['partner.update', $partner->id]
    ]) !!}

    <div class="form-group">
        <label for="exampleInputEmail1">Partner Name</label>
        {!! Form::text('name',$partner->name,[
        'class'=>"form-control",
        'placeholder'=>"Enter Partner Name",
        'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">API Key</label>
        {!! Form::text('api_key',$partner->api_key,[
        'class'=>"form-control",
        'placeholder'=>"Enter API Key",
        'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">Token</label>
        {!! Form::text('token',$partner->token,[
        'class'=>"form-control",
        'placeholder'=>"Enter Token",
        'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">App ID</label>
        {!! Form::text('app_id',$partner->app_id,[
        'class'=>"form-control",
        'placeholder'=>"Enter App ID",
        'required'=>""])
        !!}
    </div>




    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop