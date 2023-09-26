<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Now UI Kit by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
{{--    <link href="{{URL::asset('client/profile_page/assets/css/bootstrap.min.css')}}" rel="stylesheet" />--}}
    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
    <link href="{{URL::asset('client/profile_page/assets/css/now-ui-kit.css?v=1.3.0')}}" rel="stylesheet" />

    <style>
        /*********Input-button*********/
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: red;
            cursor: inherit;
            display: block;
        }
        .file-input-label {
            padding: 0px 10px;
            display: table-cell;
            vertical-align: middle;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }

        @media screen and (min-device-width: 1600px) {
            .navbar > .container {max-width: 1140px;}
        }



        .box-footer {
            padding-right: 15px;
            padding-left: 15px;
        }








        #drop-area {
            border: 2px dashed #ccc;
            border-radius: 20px;
            width: 480px;
            font-family: sans-serif;
            margin: 100px auto;
            padding: 20px;
        }
        #drop-area.highlight {
            border-color: purple;
        }
        p {
            margin-top: 0;
        }
        .my-form {
            margin-bottom: 10px;
        }
        #gallery {
            margin-top: 10px;
        }
        #gallery img {
            width: 150px;
            margin-bottom: 10px;
            margin-right: 10px;
            vertical-align: middle;
        }
        #drop-area .button {
            display: inline-block;
            padding: 10px;
            background: #ccc;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        #drop-area .button:hover {
            background: #ddd;
        }
        #fileElem {
            display: none;
        }

    </style>
</head>

<body class="profile-page sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
{{--        <div class="dropdown button-dropdown">--}}
{{--            <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">--}}
{{--                <span class="button-bar"></span>--}}
{{--                <span class="button-bar"></span>--}}
{{--                <span class="button-bar"></span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                <a class="dropdown-header">Dropdown header</a>--}}
{{--                <a class="dropdown-item" href="#">Action</a>--}}
{{--                <a class="dropdown-item" href="#">Another action</a>--}}
{{--                <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">Separated link</a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a class="dropdown-item" href="#">One more separated link</a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="navbar-translate">
            <a class="navbar-brand" href="#" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">

            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse  justify-content-start" id="navigation" data-nav-image="client/profile_page/assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="">МУЗЫКА</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('arts.index')}}">АРТЫ</a></li>
                <li class="nav-item"><a class="nav-link" href="">ФОТО</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('posts.index')}}">СТАТЬИ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('courses.index')}}">ОБУЧЕНИЕ</a></li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end" id="navigationEnd" data-nav-image="client/profile_page/assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url()->previous()}}">На главную</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
    <div class="page-header clear-filter page-header-small" filter-color="blue">
        <div class="page-header-image" data-parallax="true" style="background-image:url({{asset('client/profile_page/assets/img/bg9.jpg')}});">
        </div>
        <div class="container">
            <div class="photo-container">
                <img src="{{$user->getAvatar()}}" alt="">
            </div>
            <h3 class="title">{{$user->name}}</h3>
            <p class="category">{{$user->real_name}}</p>
            <div class="content">
                <div class="social-description">
                    <h2>{{$user->getViewsCount()}}</h2>
                    <p>Просмотров</p>
                </div>
                <div class="social-description">
                    <h2>{{$user->getCommentsCount()}}</h2>
                    <p>Комментарии</p>
                </div>
                <div class="social-description">
                    <h2>{{$user->getSubscribersCount()}}</h2>
                    <p>Подписчики</p>
                </div>
            </div>
        </div>
    </div>

@yield('content')

<footer class="footer footer-default">
    <div class=" container ">
        <nav>
            <ul>
                <li><!-- 
                    <a href="https://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li> -->
                <li>
                    <a href="http://presentation.creative-tim.com">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script><!-- , Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. -->
        </div>
    </div>
</footer>
</div>
<!--   Core JS Files   -->
<script src="{{URL::asset('client/profile_page/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('client/profile_page/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('client/profile_page/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{URL::asset('client/profile_page/assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{URL::asset('client/profile_page/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{URL::asset('client/profile_page/assets/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{URL::asset('client/profile_page/assets/js/now-ui-kit.js?v=1.3.0')}}" type="text/javascript"></script>

<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })
</script>

<script>

    //script for downloading images
    function showFile(e) {
        let files = e.target.files;
        for (let i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) continue;
            let fr = new FileReader();
            // let f = files[0];
            fr.onload = (function(theFile) {
                return function(e) {
                    let div = document.createElement('div');
                    div.innerHTML = "<img src='" + e.target.result + "' style='width:100%' id='new-image'/>";
                    if(document.getElementById('new-image')){
                        document.getElementById('new-image').remove();
                    }

                    if(document.getElementById('old-image')) {
                        document.getElementById('old-image').remove();
                    }

                    document.getElementById('image-list').insertBefore(div, null);
                };
            })(f);

            fr.readAsDataURL(f);
        }
    }

    document.getElementById('image-files').addEventListener('change', showFile, false);
</script>

<script>

    //script for downloading images
    function showFile(e) {
        let files = e.target.files;
        for (let i = 0, f; f = files[i]; i++) {
            let fr = new FileReader();
            // let f = files[0];
            fr.onload = (function(theFile) {
                return function(e) {
                    let div = document.createElement('div');
                    div.innerHTML = `<p> ${f.name} </p>`;
                    document.getElementById('lesson-files_list').insertBefore(div, null);
                };
            })(f);

            fr.readAsDataURL(f);
        }
    }

    document.getElementById('lesson-files').addEventListener('change', showFile, false);
</script>

{{--<script>--}}

{{--    // ************************ Drag and drop ***************** //--}}
{{--    let dropArea = document.getElementById("drop-area")--}}

{{--// Prevent default drag behaviors--}}
{{--    ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {--}}
{{--        dropArea.addEventListener(eventName, preventDefaults, false)--}}
{{--        document.body.addEventListener(eventName, preventDefaults, false)--}}
{{--    })--}}

{{--// Highlight drop area when item is dragged over it--}}
{{--    ;['dragenter', 'dragover'].forEach(eventName => {--}}
{{--        dropArea.addEventListener(eventName, highlight, false)--}}
{{--    })--}}

{{--    ;['dragleave', 'drop'].forEach(eventName => {--}}
{{--        dropArea.addEventListener(eventName, unhighlight, false)--}}
{{--    })--}}

{{--    // Handle dropped files--}}
{{--    dropArea.addEventListener('drop', handleDrop, false)--}}

{{--    function preventDefaults (e) {--}}
{{--        e.preventDefault()--}}
{{--        e.stopPropagation()--}}
{{--    }--}}

{{--    function highlight(e) {--}}
{{--        dropArea.classList.add('highlight')--}}
{{--    }--}}

{{--    function unhighlight(e) {--}}
{{--        dropArea.classList.remove('active')--}}
{{--    }--}}

{{--    function handleDrop(e) {--}}
{{--        var dt = e.dataTransfer--}}
{{--        var files = dt.files--}}

{{--        handleFiles(files)--}}
{{--    }--}}

{{--    function handleFiles(files) {--}}
{{--        files = [...files]--}}
{{--        files.forEach(previewFile)--}}
{{--    }--}}

{{--    function previewFile(file) {--}}
{{--        let reader = new FileReader()--}}
{{--        reader.readAsDataURL(file)--}}
{{--        reader.onloadend = function() {--}}
{{--            let img = document.createElement('img')--}}
{{--            img.src = reader.result--}}
{{--            document.getElementById('image-list').appendChild(img)--}}
{{--        }--}}

{{--        formData = new FormData(artForm);--}}
{{--        formData.append('image', file);--}}
{{--    }--}}

{{--</script>--}}

</body>

</html>
