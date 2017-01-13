@extends($controller . '.index')

@section('inner_title')
    {{$inner_page_title}}
@stop

@section('form')

    {!! Form::model($endpoint, [
    'method' => 'patch',
    'route' => [$controller . '.update', $endpoint->id]
    ]) !!}

    <div class="form-group">
        <label for="">Entity</label>
        {!! Form::select('entities_id', $entities, $endpoint->entities_id, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>HTTP Method</label>
        {!! Form::select('method', $methods, $endpoint->method, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>URL</label>
        {!! Form::text('url', $endpoint->url, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>Headers</label>
        {!! Form::text('http_headers', $endpoint->headers, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label>Description</label>
        {!! Form::text('description', $endpoint->description, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop

