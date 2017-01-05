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
        <label for="exampleInputEmail1">Version</label>
        {!! Form::text('version',null,[
            'class'=>"form-control",
            'placeholder'=>"Enter Version Number",
            'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label for="">Attribute</label>
        <input type="file" class="form-control" name="attributes">
    </div>

    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop