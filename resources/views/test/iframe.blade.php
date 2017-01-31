<html>
<head>




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

    {{--<div class="container">
        <iframe src="https://www.relahq.com/demo/pipeline" style="border: none; width: inherit; height:500px; overflow-y: hidden; overflow-x: hidden" scrolling="no"></iframe>
    </div>--}}

</div>



<script type="text/javascript">

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://api-tour-test.herokuapp.com/error.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            // WARNING! Might be injecting a malicious script!
            //document.getElementById("resp").innerHTML = xhr.responseText;
            alert(xhr.responseText);
            //...
        }
    }
    xhr.send();

</script>





</body>
</html>