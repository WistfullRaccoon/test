<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('js/dropzone-5.7.0/dist/min/dropzone.min.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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
            .my_form {
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
            .button {
                display: inline-block;
                padding: 10px;
                background: #ccc;
                cursor: pointer;
                border-radius: 5px;
                border: 1px solid #ccc;
            }
            .button:hover {
                background: #ddd;
            }
            #fileElem {
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>

        <div id="drop-area">
            <form id="my_form">
                <p>Загрузите изображения с помощью диалога выбора файлов или перетащив нужные изображения в выделенную область</p>
                <input type="file" id="fileElem" name="image" multiple accept="image/*" onchange="handleFiles(this.files)">
                <label class="button" for="fileElem">Выбрать изображения</label>
            </form>
            <div id="gallery"></div>
        </div>




{{--        <div class="col-sm-12 mt-5">--}}
{{--            <h3>Example with form</h3>--}}
{{--            <form class="mt-3">--}}
{{--                <div class="form-group row">--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <button id="btnResetForm" class="btn btn-primary">--}}
{{--                            Reset form--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <div class="input-group mt-3">--}}
{{--                            <div class="custom-file">--}}
{{--                                <input id="inputGroupFile03" type="file" class="custom-file-input">--}}
{{--                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}

        <script src="/js/admin.js"></script>
{{--        <script src="/js/dropzone-5.7.0/dist/dropzone.js"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>--}}
{{--        <script>$(document).ready(function () {--}}
{{--                bsCustomFileInput.init()--}}
{{--            })</script>--}}
        <script>
            let dropArea = document.getElementById('drop-area');
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false)
            });
            function preventDefaults (e) {
                e.preventDefault();
                e.stopPropagation();
            }
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            })
            ;['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            })
            function highlight(e) {
                dropArea.classList.add('highlight');
            }
            function unhighlight(e) {
                dropArea.classList.remove('highlight');
            }

            dropArea.addEventListener('drop', handleDrop, false);
            function handleDrop(e) {
                console.log(document.forms.my_form.image);

                // let dt = e.dataTransfer;
                // let files = dt.files;
                // handleFiles(files);
                // function handleFiles(files) {
                //     ([...files]).forEach(previewFile)
                // }
                //
                // function previewFile(file) {
                //     let reader = new FileReader()
                //     reader.readAsDataURL(file)
                //     reader.onloadend = function() {
                //         let img = document.createElement('img')
                //         img.src = reader.result
                //         document.getElementById('gallery').appendChild(img)
                //     }
                // }
            }
        </script>
    </body>
</html>
