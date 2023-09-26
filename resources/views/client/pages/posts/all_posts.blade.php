@extends('layout')

@section('content')

                <div class="col-md-10">
                    <div class="row" style="padding-top: 0; padding-left: 0">
                        @foreach($posts as $post)
                            <div class="col-md-4">
                                <article class="post post-grid">
                                    <div class="post-thumb">
                                        <a href="{{route('posts.show', $post->slug)}}">
                                            <img src="{{$post->getImage()}}" alt="" style="object-fit: cover; max-height: 168px;">
                                        </a>

                                        <a href="{{route('posts.show', $post->slug)}}" class="post-thumb-overlay text-center">
                                            <div class="text-uppercase text-center">Подробнее</div>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <header class="entry-header text-center text-uppercase">
                                            <h6><a href="{{route('posts.subcategory.show', $post->subcategory->slug)}}"> {{$post->subcategory->title}}</a></h6>
                                            <h1 class="entry-title"><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></h1>
                                        </header>
                                        <div class="entry-content">
{{--                                            <p>{!!$post->description!!}</p>--}}

                                            <div class="social-share">
                                                <span class="social-share-title pull-left text-capitalize">
                                                    By
                                                    <a href="{{route('profile.show', $post->author->slug)}}">{{$post->author->name}}</a>
                                                    on {{$post->getDate()}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </article>
                            </div>
                        @endforeach
                    </div>
                    {{$posts->links()}}
                </div>


{{--    <div class="col-md-8">--}}
{{--        @foreach($posts as $post)--}}
{{--            <article class="post">--}}
{{--                <div class="post-thumb">--}}
{{--                    <a href="{{route('post.show', $post->slug)}}"><img src="{{$post->getImage()}}" alt=""></a>--}}

{{--                    <a href="{{route('post.show', $post->slug)}}" class="post-thumb-overlay text-center">--}}
{{--                        <div class="text-uppercase text-center">View Post</div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="post-content">--}}
{{--                    <header class="entry-header text-center text-uppercase">--}}
{{--                        <h6><a href="{{route('subcategory.show', $post->subcategory->slug)}}"> {{$post->subcategory->title}}</a></h6>--}}

{{--                        <h1 class="entry-title"><a href="blog.html">{{$post->title}}</a></h1>--}}


{{--                    </header>--}}
{{--                    <div class="entry-content">--}}
{{--                        <p>{!! $post->description !!}--}}
{{--                        </p>--}}

{{--                        <div class="btn-continue-reading text-center text-uppercase">--}}
{{--                            <a href="blog.html" class="more-link">Continue Reading</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="social-share">--}}
{{--                        <span class="social-share-title pull-left text-capitalize">By <a href="#">{{$post->author->name}}</a> on {{$post->getDate()}}</span>--}}
{{--                        <ul class="text-center pull-right">--}}
{{--                            <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                            <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                            <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                            <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                            <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        @endforeach--}}
{{--        {{$posts->links()}}--}}
{{--    </div>--}}

{{--    <div class="col-md-1"></div>--}}

                @include('client.pages.posts._sidebar')


@endsection
