@extends('common.layout')
@section('title')
    Parrner
@stop

@section('content')
    <h2>@yield('inner_title')</h2>
    <div class="row">
        <div class="col-lg-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('partner/create')}}">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('partner/')}}">List</a>
                </li>

            </ul>
        </div>
        <div class="col-lg-9" style="">
            @yield('form')
        </div>
    </div>

@stop