<html>
<head>
    <link rel="stylesheet" href="{{url('/css/bootstrap-4.0.0-alpha.5-dist/css/bootstrap.min.css')}}" />
    <script type="text/javascript" src="{{url('/js/jquery-1.11.2.min.js')}}" ></script>
    <link rel="stylesheet" href="{{url('custombox/src/jquery.custombox.css')}}">
    <link rel="stylesheet" href="{{url('custombox/demo/css/demo.css')}}">
    <script type="text/javascript" src="{{url('/js/bootstrap-4.0.0-alpha.5-dist/js/bootstrap.min.js')}}" ></script>
    <title>App Name - @yield('title')</title>
</head>
<body>


<div class="">
    <nav class="navbar navbar-light bg-faded">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">This is a Test Page<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/endpoint')}}">Endpoints</a>
            </li>
        </ul>
    </nav>

    <a href="#modal" id="example1" title="Example without overlay" data-custombox="1484717035">Example <em class="glyphicon glyphicon-hand-left"></em></a>


    <div id="modal" style="display: none;" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onclick="$.fn.custombox('close');">&times;</button>
            <h4>Rela Test</h4>
        </div>
        <div class="modal-example-body">
            <p>Testing</p>
            <a class="bottom" href="http://www.reladevel.com/authorize/photographer/178256?redirect_uri={{url('success_rela_registration')}}" target="_blank">Register</a>
        </div>
    </div>



</div>
<script src="{{url('custombox/src/jquery.custombox.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){


        $('#example1').on('click', function ( e ) {
            $.fn.custombox( this, {
                overlay: true,
                effect: 'fadein'
            });
            e.preventDefault();
        });

        //alert($('iframe').find("#demo-property-bar").attr('class'));
    });

    $('iframe').load(function(){
        alert($(this).contents().find("#demo-property-bar").attr('class'));
    });
</script>

</body>
</html>