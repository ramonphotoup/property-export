@extends('common.layout')
@section('title')
    Home
@stop

@section('content')
    mau na ni
    {{url('/')}}
    {!! Form::text('firname') !!}
@stop