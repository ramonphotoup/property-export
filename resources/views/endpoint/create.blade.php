@extends($controller . '.index')
@section('inner_title')
    {{$inner_page_title}}
@stop
@section('form')

    {!! Form::open(['route' => $controller . '.store','enctype'=>"multipart/form-data"]) !!}

    <div class="form-group">
        <label for="">Entity</label>
        {!! Form::select('entities_id', $entities, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>HTTP Method</label>
        {!! Form::select('method', $methods, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>URL</label>
        {!! Form::text('url', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>Headers</label>
        {!! Form::text('http_headers', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>Description</label>
        {!! Form::text('description', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop