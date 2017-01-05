@extends($controller . '.index')

@section('inner_title')
    {{$inner_page_title}}
@stop

@section('form')
    <table class="table">
        <thead>
        <tr>
            <th>Table</th>
            <th>Attribute Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photo_up_standard_fields as $index => $value)
            <tr>
                <td>{{$value->table}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <a href="{{url($controller . '/' . $value->id.'/edit')}}">Edit</a>
                    <a class="delete-item" href="#" data-id="{{$value->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! Form::open([
        'method' => 'delete',
        'route' => [$controller . '.destroy',1],
        'id' => 'delete-item'
    ]) !!}

    {{Form::hidden('id',null,['id'=>'primary_key'])}}

    {!! Form::close() !!}
    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete-item").on('click',function(e){
                e.preventDefault();
                $("#primary_key").val($(this).attr('data-id'));
                $("#delete-item").submit();
            });
        });
    </script>
@stop