@extends($controller . '.index')

@section('inner_title')
    {{$inner_page_title}}
@stop

@section('form')

    {!! Form::model($schema,[
    'enctype'=>"multipart/form-data",
    'method' => 'patch',
    'route' => [$controller . '.update', $schema->id]
    ]) !!}

    <div class="form-group">
        <label for="">Entity</label>
        {!! Form::select('entities_id', $entities, $schema->entities_id, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Version</label>
        {!! Form::text('version',$schema->version,[
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
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Data Type</th>
            <th>Validation</th>
            <th>Options</th>
            <th>Access</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attributes as $attribute)
            <tr>
                <td>{{$attribute->attribute}}</td>
                <td>{{$attribute->description}}</td>
                <td>{{$attribute->data_type}}</td>
                <td>{{$attribute->validation}}</td>
                <td>{{$attribute->options}}</td>
                <td>{{$attribute->access}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop

