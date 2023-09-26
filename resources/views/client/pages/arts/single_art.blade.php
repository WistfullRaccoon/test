@extends('layout')

@section('content')

    <div class="col-md-7">
        <article class="post">
            <div class="post-thumb">
                <a href="#"><img src="{{$art->getImage()}}" alt=""></a>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                    <h6>
                        <a href="{{route('arts.subcategory.show', $art->subcategory->slug)}}"> {{$art->subcategory->title}}</a>
                    </h6>

                    <h1 class="entry-title"><a href="#">{{$art->title}}</a></h1>


                </header>
                <div class="entry-content">
                    <p>
                        {!! $art->description !!}
                    </p>
                </div>
                <div class="decoration">
                    @foreach($art->tags as $tag)
                        <a href="{{route('arts.tag.show', $tag->id)}}" class="btn btn-default">{{$tag->name}}</a>
                    @endforeach
                </div>

                <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">By
                                <a href="{{route('profile.show', $art->author->slug)}}">
                                    {{$art->author->name}}
                                </a>
                                On {{$art->getDate()}}
                            </span>
                    <ul class="text-center pull-right">
                        @can('manage-own-art', $art)
                            <a href="{{route('profile.arts.edit', $art)}}" class="fa fa-pencil"> Редактировать</a>
                        @endcan

                        <li><a class="s-facebook" href="{{$art->author->facebook_link}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="s-twitter" href="{{$art->author->twitter_link}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="s-google-plus" href="{{$art->author->twitter_link}}"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="s-linkedin" href="{{$art->author->vk_link}}"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="s-instagram" href="{{$art->author->instagram_link}}"><i class="fa fa-instagram"></i></a></li>
                            @if(Auth::check())
                            <li><button class="open-button" onclick="openForm()" style="font-size: 12px;">Пожаловаться</button></li>
                            <div class="form-popup" id="myForm">
                                {{ Form::open([
                                      'route' => ['complain', Auth::id(), $art->id, 'Art'],
                                      'method' => 'post',
                                      'class' => 'form-container'
                                  ])}}
                                <label for="email"><b>Причина</b></label>
                                <input type="text" placeholder="Причина" name="reason">
                                <button type="submit" class="btn">Отправить</button>
                                <a class="btn btn-dark" onclick="closeForm()">Закрыть</a>
                                {{Form::close()}}
                            </div>
                                @endif
                    </ul>
                </div>
            </div>
        </article>
        <div class="row"><!--blog next previous-->
            <div class="col-md-6">
                @if($art->hasPrevious())
                    <div class="single-blog-box">
                        <a href="{{route('arts.show', $art->getPrevious()->slug)}}">
                            <img src="{{$art->getPrevious()->getImage()}}" alt="">
                            <div class="overlay">
                                <div class="promo-text">
                                    <p><i class=" pull-left fa fa-angle-left"></i></p>
                                    <h5>{{$art->getPrevious()->title}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                @if($art->hasNext())
                    <div class="single-blog-box">
                        <a href="{{route('arts.show', $art->getNext()->slug)}}">
                            <img src="{{$art->getNext()->getImage()}}" alt="">
                            <div class="overlay">
                                <div class="promo-text">
                                    <p><i class=" pull-right fa fa-angle-right"></i></p>
                                    <h5>{{$art->getNext()->title}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div><!--blog next previous end-->
        <div class="bottom-comment"><!--bottom comment-->
            <h4>{{$art->getCommentsCount()}} комментарий</h4>
            @foreach($comments as $comment)
                <div class="comment">
                    <div class="comment-img">
                        <img class="img-circle" src="{{$comment->author->getAvatar()}}" alt="" style="max-height: 50px;">
                    </div>

                    <div class="comment-text">
                        {{--                <a href="#" class="replay btn pull-right"> Replay</a>--}}
                        <h5>{{$comment->author->name}}</h5>

                        <p class="comment-date">
                            {{$comment->created_at->diffForHumans()}}
                        </p>

                        <p class="para">{{$comment->text}}</p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        <!-- end bottom comment-->
        @if(Auth::check())
            <div class="leave-comment"><!--leave comment-->
                <h4>Оставить комментарий</h4>
                {{Form::open([
                    'route' => ['art.comment', $art->id],
                    'method' => 'post',
                    'class' => [
                        'form-horizontal', 'contact-form'
            ]])}}
                <div class="form-group">
                    <div class="col-md-12">
				<textarea class="form-control" rows="5" name="text"
                          placeholder="Написать сообщение"></textarea>
                    </div>
                </div>
                <button class="btn send-btn">Отправить</button>
                {{Form::close()}}
            </div><!--end leave comment-->
        @endif
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-3" data-sticky_column>
        <div class="primary-sidebar">
            <aside class="widget">
                @if(count($authorArts)>0)
                <h3 class="widget-title text-uppercase text-center">Другие работы автора</h3>
                <div class="popular-post">
                    <div class="row" style="padding-top: 0;">
                        @foreach($authorArts as $art)
                        <div class="col-md-6">
                            <a href="{{route('arts.show', $art->slug)}}" class="popular-img"><img src="{{$art->getImage()}}" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        @endforeach
                    </div>
{{--                    <div class="p-content">--}}
{{--                        <a href="#" class="text-uppercase">Home is peaceful Place</a>--}}
{{--                        <span class="p-date">February 15, 2016</span>--}}
{{--                    </div>--}}
                </div>
                    @else
                    <h3 class="widget-title text-uppercase text-center">У автора пока нет других работ</h3>
                    @endif

            </aside>
{{--            <aside class="widget">--}}
{{--                <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>--}}

{{--                <div id="widget-feature" class="owl-carousel">--}}
{{--                    <div class="item">--}}
{{--                        <div class="feature-content">--}}
{{--                            <img src="{{URL::asset('client/images/p1.jpg')}}" alt="">--}}

{{--                            <a href="#" class="overlay-text text-center">--}}
{{--                                <h5 class="text-uppercase">Home is peaceful</h5>--}}

{{--                                <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="feature-content">--}}
{{--                            <img src="{{URL::asset('client/images/p2.jpg')}}" alt="">--}}

{{--                            <a href="#" class="overlay-text text-center">--}}
{{--                                <h5 class="text-uppercase">Home is peaceful</h5>--}}

{{--                                <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="feature-content">--}}
{{--                            <img src="{{URL::asset('client/images/p3.jpg')}}" alt="">--}}

{{--                            <a href="#" class="overlay-text text-center">--}}
{{--                                <h5 class="text-uppercase">Home is peaceful</h5>--}}

{{--                                <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </aside>--}}
            <aside class="widget pos-padding">
                <h3 class="widget-title text-uppercase text-center">Другие работы в категории {{$art->subcategory->title}}</h3>
                @foreach($sameArts as $sameArt)
                <div class="thumb-latest-posts">

                    <div class="media">
                        <div class="media-left">
                            <a href="{{route('arts.show', $sameArt->slug)}}" class="popular-img" style="max-height: 150px;">
                                <img src="{{$sameArt->getImage()}}" alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </aside>
        </div>
    </div>

@endsection
