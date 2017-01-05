@extends('partner.index')
@section('inner_title')
    List  Partner
@stop
@section('form')
    <table class="table">
        <thead>
        <tr>
            <th>Partner Name</th>
            <th>Api Key</th>
            <th>Token</th>
            <th>App ID</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($partners as $index => $partner)
            <tr>
                <td>{{$partner->name}}</td>
                <td>{{$partner->api_key}}</td>
                <td>{{$partner->token}}</td>
                <td>{{$partner->app_id}}</td>
                <td>
                    <a href="{{url('partner/'.$partner->id.'/edit')}}">Edit</a>
                    <a class="delete-item" href="#" data-id="{{$partner->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! Form::open([
        'method' => 'delete',
        'route' => ['partner.destroy',1],
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