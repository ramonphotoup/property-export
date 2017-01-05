@extends($controller . '.index')
@section('inner_title')
    {{$inner_page_title}}
@stop
@section('form')

    {!! Form::open(['route' => $controller . '.store','enctype'=>"multipart/form-data"]) !!}

    <div class="form-group">
        <label for="">PhotoUp Table</label>
        {!! Form::select('table', $tables, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Attribute Name</label>
        {!! Form::text('name',null,[
            'class'=>"form-control",
            'placeholder'=>"Enter Attribute Name",
            'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label>Data Type</label>
        {!! Form::select('data_types_id', $data_types, null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop