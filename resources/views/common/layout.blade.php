<html>
<head>
    <link rel="stylesheet" href="{{url('/css/bootstrap-4.0.0-alpha.5-dist/css/bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{url('/js/jquery-1.11.2.min.js')}}" ></script>
    <script type="text/javascript" src="{{url('/js/bootstrap-4.0.0-alpha.5-dist/js/bootstrap.min.js')}}" ></script>
    <title>App Name - @yield('title')</title>
</head>
<body>


<div class="">
    <nav class="navbar navbar-light bg-faded">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/photo_up_standard')}}">Photo Standards</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/partner')}}">Partners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/entity')}}">Entity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/attribute')}}">Attribute</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/endpoint')}}">Endpoints</a>
            </li>
        </ul>
    </nav>
    <div style="display: block; height: 20px;"></div>
    @if($alert_type !== '')
        <div class="alert alert-{{$alert_type}}">{{$alert_message}}</div>
    @endif
        <div class="alert js-alert" style="display: none">fasdf</div>
    <div style="margin: 0 15px">
        @yield('content')
    </div>

</div>
</body>
</html>