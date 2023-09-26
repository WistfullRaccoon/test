@extends('layout')

@section('content')

    <div class="col-md-10">
        <div class="cards-content">
            @foreach($arts as $art)
                <article class="art">
                    <div class="art-thumb">
                        <a href="{{route('art.show', $art->slug)}}"><img src="{{$art->getImage()}}" alt=""></a>
                        <div class="art-thumb-overlay">
                            <div class="title"><a href="{{route('art.show', $art->slug)}}">{{$art->title}}</a></div>
                            <div class="author"><a href="{{route('profile.show', $art->author->slug)}}"
                                                   data-toggle="tooltip" data-original-title="{{$art->author->name}}">
                                    {{$art->author->name}}</a></div>
                            <div class="likes"><a href="{{route('like', $art->slug)}}">Three</a></div>
                        </div>
                    </div>
{{--                    <div class="art-content">--}}
{{--                        <header class="entry-header text-center text-uppercase">--}}
{{--                            <h6><a href="#"> Travel</a></h6>--}}
{{--                            <p class="entry-title"><a href="blog.html">Home is peaceful place</a></p>--}}
{{--                        </header>--}}
{{--                        <div class="social-share">--}}
{{--                            <span class="social-share-title pull-left text-capitalize">By <a href="#">Rubel</a> On February 12, 2016</span>--}}
{{--                            <ul class="text-center pull-right">--}}
{{--                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </article>
            @endforeach
        </div>
        {{$arts->links()}}
    </div>
    <div class="sidebar-categories" data-sticky_column>
        <div class="primary-sidebar">

{{--            <aside class="widget news-letter">--}}
{{--                <h3 class="widget-title text-uppercase text-center">Get Newsletter</h3>--}}

{{--                <form action="#">--}}
{{--                    <input type="email" placeholder="Your email address">--}}
{{--                    <input type="submit" value="Subscribe Now"--}}
{{--                           class="text-uppercase text-center btn btn-subscribe">--}}
{{--                </form>--}}

{{--            </aside>--}}
            <aside class="widget">
                <h3 class="widget-title text-uppercase text-center">Категории</h3>
                @foreach($categories as $category)
                <div class="popular-post">
                        <a href="#" class="side-category">
                            <h3 class="category-text">{{$category->title}}</h3>
                            <div class="category-img">
                                <img src="{{$category->getImage()}}" alt="">
                            </div>
{{--                            <div class="p-overlay">--}}
{{--                            </div>--}}
                        </a>

{{--                    <div class="p-content">--}}
{{--                        <a href="#" class="text-uppercase" style="text-align: center"></a>--}}
{{--                    </div>--}}
                </div>
                    @endforeach

            </aside>
            <aside class="widget">
                <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

                <div id="widget-feature" class="owl-carousel">
                    <div class="item">
                        <div class="feature-content">
                            <img src="client/images/p1.jpg" alt="">

                            <a href="#" class="overlay-text text-center">
                                <h5 class="text-uppercase">Home is peaceful</h5>

                                <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feature-content">
                            <img src="client/images/p2.jpg" alt="">

                            <a href="#" class="overlay-text text-center">
                                <h5 class="text-uppercase">Home is peaceful</h5>

                                <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="feature-content">
                            <img src="client/images/p3.jpg" alt="">

                            <a href="#" class="overlay-text text-center">
                                <h5 class="text-uppercase">Home is peaceful</h5>

                                <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="widget pos-padding">
                <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                <div class="thumb-latest-posts">


                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="popular-img"><img src="client/images/r-p.jpg" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="#" class="text-uppercase">Home is peaceful Place</a>
                            <span class="p-date">February 15, 2016</span>
                        </div>
                    </div>
                </div>
                <div class="thumb-latest-posts">


                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="popular-img"><img src="client/images/r-p.jpg" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="#" class="text-uppercase">Home is peaceful Place</a>
                            <span class="p-date">February 15, 2016</span>
                        </div>
                    </div>
                </div>
                <div class="thumb-latest-posts">


                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="popular-img"><img src="client/images/r-p.jpg" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="#" class="text-uppercase">Home is peaceful Place</a>
                            <span class="p-date">February 15, 2016</span>
                        </div>
                    </div>
                </div>
                <div class="thumb-latest-posts">


                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="popular-img"><img src="client/images/r-p.jpg" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="#" class="text-uppercase">Home is peaceful Place</a>
                            <span class="p-date">February 15, 2016</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

@endsection
