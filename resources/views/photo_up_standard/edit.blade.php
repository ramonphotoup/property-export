@extends($controller . '.index')

@section('inner_title')
    {{$inner_page_title}}
@stop

@section('form')

    {!! Form::model($photo_up_standard_field, [
    'method' => 'patch',
    'route' => [$controller . '.update', $photo_up_standard_field->id]
    ]) !!}

    <div class="form-group">
        <label for="">PhotoUp Table</label>
        {!! Form::select('table', $tables, $photo_up_standard_field->table, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Attribute Name</label>
        {!! Form::text('name',$photo_up_standard_field->name,[
        'class'=>"form-control",
        'placeholder'=>"Enter Attribute Name",
        'required'=>""])
        !!}
    </div>

    <div class="form-group">
        <label>Data Type</label>
        {!! Form::select('data_types_id', $data_types, $photo_up_standard_field->data_types_id, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Save',['class' => "btn btn-primary"]) !!}

    {!! Form::close() !!}
@stop

