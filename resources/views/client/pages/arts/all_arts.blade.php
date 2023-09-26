@extends('layout')

@section('content')

    <div class="col-md-10">
        <div class="cards-content">
            @foreach($arts as $art)
                <article class="art">
                    <div class="art-thumb">
                        <a href="{{route('arts.show', $art->slug)}}">
                            <img src="{{$art->getImage()}}" alt="">
                        </a>
                        <div class="art-thumb-overlay">
                            <div class="title">
                                <a href="{{route('arts.show', $art->slug)}}">{{$art->title}}</a>
                            </div>
                            <div class="author">
                                <a href="{{route('profile.show', $art->author->slug)}}"
                                                   data-toggle="tooltip" data-original-title="{{$art->author->name}}">
                                    {{$art->author->name}}
                                </a>
                            </div>
                            <div class="likes" style="left: 70%">
                                <a href="{{route('arts.like', $art->slug)}}">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
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
    @include('client.pages.arts._sidebar')

@endsection

