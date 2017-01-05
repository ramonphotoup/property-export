@extends('partner.index')
@section('inner_title')
    Create Partner
@stop
@section('form')

    {!! Form::open(['route' => 'partner.store','enctype'=>"multipart/form-data"]) !!}

    <div class="form-group">
        <label for="exampleInputEmail1">Partner Name</label>
        {!! Form::text('name',null,[
            'class'=>"form-control",
            'placeholder'=>"Enter Partner Name",
            'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">API Key</label>
        {!! Form::text('api_key',null,[
        'class'=>"form-control",
        'placeholder'=>"Enter API Key",
        'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">Token</label>
        {!! Form::text('token',null,[
        'class'=>"form-control",
        'placeholder'=>"Enter Token",
        'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">App ID</label>
        {!! Form::text('app_id',null,[
        'class'=>"form-control",
        'placeholder'=>"Enter App ID",
        'required'=>""])
        !!}
    </div>




    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop