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
            <th>Map</th>
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
                <td>
                    <div class="form-inline">
                        <div class="form-group">
                            {!! Form::select('standard[]', $standard_fields,(($attribute->photoup_standard_fields_id)?$attribute->photoup_standard_fields_id:null),['class'=>'form-control standard','data-id'=>$attribute->attributes_id]) !!}
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        $(document).ready(function(){
            var token = '{{csrf_token()}}';
            $(".standard").change(function(){
                var attributes_id = $(this).attr('data-id');
                var field_id = $(this).val();

                $.post(
                        '{{url($controller.'/map')}}',
                        {
                            'field_id':field_id,
                            'attributes_id':attributes_id,
                            '_token' : token
                        },
                        function(data){
                            if(typeof data.message === undefined || data.message !== 'Success'){
                                $(".js-alert").html("Encountered error while saving").addClass("alert-danger").show();
                                var body = $("html, body");
                                body.stop().animate({scrollTop:0}, '500', 'swing', function() {});
                            }
                        },"json"
                );
            });

        });
    </script>

@stop

