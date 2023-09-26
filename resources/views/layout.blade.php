<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Main Page</title>

    <!-- common css -->
    <link rel="stylesheet" href="{{URL::asset('css/client/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/animate.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/owl.theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/client/responsive.css')}}">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="client/js/html5shiv.js"></script>
    <script src="client/js/respond.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="client/images/favicon.png">

    <style>

        .art .art-thumb a {
            text-decoration: none;
            color: white;
        }

        .art .art-thumb a.text:active, /* активная/посещенная ссылка */
        a.text:hover, /* при наведении */
        a.text {
            text-decoration: none;
            color: #555299;
        }



        .sidebar-categories {
            position: relative;
            min-height: 1px;
            padding-left: 5px;
        }

        @media (min-width: 992px) {
            .sidebar-categories {
                float: right;
                width: 14%;
            }
        }




        /*search*/

        .search-form .form-group {
            float: right !important;
            transition: all 0.35s, border-radius 0s;
            width: 32px;
            height: 32px;
            background-color: #fff;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            border-radius: 25px;
            border: 1px solid #33d9de;
        }
        .search-form .form-group input.form-control {
            padding-right: 20px;
            border: 0 none;
            background: transparent;
            box-shadow: none;
            display:block;
        }
        .search-form .form-group input.form-control::-webkit-input-placeholder {
            display: none;
        }
        .search-form .form-group input.form-control:-moz-placeholder {
            /* Firefox 18- */
            display: none;
        }
        .search-form .form-group input.form-control::-moz-placeholder {
            /* Firefox 19+ */
            display: none;
        }
        .search-form .form-group input.form-control:-ms-input-placeholder {
            display: none;
        }
        .search-form .form-group:hover,
        .search-form .form-group.hover {
            width: 100%;
            border-radius: 4px 25px 25px 4px;
        }
        .search-form .form-group span.form-control-feedback {
            position: absolute;
            top: -1px;
            right: -2px;
            z-index: 2;
            display: block;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            color: #33d9de;
            left: initial;
            font-size: 14px;
        }

        /*claim form*/


        .open-button {
            background-color: #555;
            color: white;
            padding: 10px 10px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            width: 120px;
        }

        /* Всплывающая форма-скрыта по умолчанию */
        .form-popup {
            display: none;
            border: 3px solid #f1f1f1;
        }

        /* Добавление стилей в контейнер форм */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Поля ввода полной ширины */
        .form-container input[type=text], .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* Когда входы получают фокус, сделайте что-нибудь */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Установите стиль для кнопки отправить/кнопка */
        .form-container .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:10px;
            opacity: 0.8;
        }

        /* Добавьте красный цвет фона к кнопке отмена */
        .form-container .cancel {
            background-color: red;
        }

        /* Добавьте некоторые эффекты наведения на кнопки */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }




    </style>



</head>

<body>


@include('client._navbar')

@include('errors.flash')


<!--main content start-->
<div class="main-content">
    <div class="container">

{{--        <div class="header-content">--}}
{{--            @include('client._content-header')--}}
{{--        </div>--}}
        <div class="row">

            @yield('content')

        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->
<!-- <div id="footer">
    <div class="footer-instagram-section">
        <h3 class="footer-instagram-title text-center text-uppercase">Instagram</h3>

        <div id="footer-instagram" class="owl-carousel">

            <div class="item">
                <a href="#"><img src="client/images/ins-1.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-2.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-3.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-4.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-5.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-6.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-7.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="client/images/ins-8.jpg" alt=""></a>
            </div>

        </div>
    </div>

</div> -->

<footer class="footer-widget-section">
    <div class="container">
         <div class="row">
            <!-- <div class="col-md-4">
                <aside class="footer-widget">
                    <div class="about-img"><img src="client/images/footer-logo.png" alt=""></div>
                    <div class="about-content">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                        eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed voluptua. At vero eos et
                        accusam et justo duo dlores et ea rebum magna text ar koto din.
                    </div>
                    <div class="address">
                        <h4 class="text-uppercase">contact Info</h4>

                        <p> 142/5 BC Street, ES, VSA</p>

                        <p> Phone: +123 456 78900</p>

                        <p>rahim@marlindev.ru</p>
                    </div>
                </aside>
            </div> -->

            <div class="col-md-4">
                <aside class="footer-widget">
                   <!--  <h3 class="widget-title text-uppercase">Testimonials</h3> -->

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!--Indicator-->
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol> -->
                        <div class="carousel-inner" role="listbox">
                           <!--  <div class="item active">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="client/images/author.png" alt="">

                                        <div class="author-text">
                                            <h4>Sophia</h4>

                                            <h4>Client, Tech</h4>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                  <!--           <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="client/images/author.png" alt="">

                                        <div class="author-text">
                                            <h4>Sophia</h4>

                                            <h4>Client, Tech</h4>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                           <!--  <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
                                            tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
                                            vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
                                            magna aliquyam eratma</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="client/images/author.png" alt="">

                                        <div class="author-text">
                                            <h4>Sophia</h4>

                                            <h4>Client, Tech</h4>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </aside>
            </div>
            <!-- <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">Custom Category Post</h3>
                    <div class="custom-post">
                        <div>
                            <a href="#"><img src="client/images/footer-img.png" alt=""></a>
                        </div>
                        <div>
                            <a href="#" class="text-uppercase">Home is peaceful Place</a>
                            <span class="p-date">February 15, 2016</span>
                        </div>
                    </div>
                </aside>
            </div> -->
        </div> 
    </div> 
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <div class="text-center">&copy; 2017 <a href="#">Blog, </a> Designed with <i
                            class="fa fa-heart"></i> by <a href="#">Marlin</a>
                    </div> -->
                    <div class="text-center">&copy; 2020 <a href="#">Some information
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- js files -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
{{--<script type="text/javascript" src="client/js/jquery-1.11.3.min.js"></script>--}}
{{--<script type="text/javascript" src="client/js/bootstrap.min.js"></script>--}}
<script type="text/javascript" src="{{URL::asset('client/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('client/js/jquery.stickit.min.js')}}"></script>
{{--<script type="text/javascript" src="client/js/menu.js"></script>--}}
<script type="text/javascript" src="{{URL::asset('client/js/scripts.js')}}"></script>

<script>

    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

</body>
</html>
