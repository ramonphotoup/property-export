@extends($controller . '.index')

@section('inner_title')
    {{$inner_page_title}}
@stop

@section('form')
    <table class="table">
        <thead>
        <tr>
            <th>Entity</th>
            <th>Partner</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entities as $index => $entity)
            <tr>
                <td>{{$entity->entity}}</td>
                <td>{{$entity->partner}}</td>
                <td>
                    <a href="{{url($controller . '/' . $entity->id.'/edit')}}">Edit</a>
                    <a class="delete-item" href="#" data-id="{{$entity->id}}">Delete</a>
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