@extends($controller . '.index')
@section('inner_title')
    {{$inner_page_title}}
@stop
@section('form')

    {!! Form::open(['route' => $controller . '.store','enctype'=>"multipart/form-data"]) !!}

    <div class="form-group">
        <label for="">Partner</label>
        {!! Form::select('partners_id', $partners, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Entity Name</label>
        {!! Form::text('name',null,[
            'class'=>"form-control",
            'placeholder'=>"Enter Entity Name",
            'required'=>""])
        !!}
    </div>

    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop