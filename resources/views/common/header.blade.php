<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

{{url('/buto')}}

<div class="container">
    @yield('content')
</div>
</body>
</html>