@extends('layout')

@section('content')

    <div class="col-md-7">
        <article class="post">
            <div class="post-thumb">
                <a href="blog.html"><img src="{{$post->getImage()}}" alt=""></a>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                    <h6>
                        <a href="{{route('posts.subcategory.show', $post->subcategory->slug)}}"> {{$post->subcategory->title}}</a>
                    </h6>

                    <h1 class="entry-title"><a href="blog.html">{{$post->title}}</a></h1>


                </header>
                <div class="entry-content">
                    <p>
                        {!! $post->content !!}
                    </p>
                </div>
                <div class="decoration">
                    @foreach($post->tags as $tag)
                        <a href="{{route('posts.tag.show', $tag->id)}}" class="btn btn-default">{{$tag->name}}</a>
                    @endforeach
                </div>

                <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">
                                By <a href="{{route('profile.show', $post->author->slug)}}"> {{$post->author->name}}</a>
                                On {{$post->getDate()}}
                            </span>
                    <ul class="text-center pull-right">
                        @can('manage-own-post', $post)
                        <a href="{{route('profile.posts.edit', $post)}}" class="fa fa-pencil"> Редактировать</a>
                        @endcan
                        <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </article>
        <div class="row"><!--blog next previous-->
            <div class="col-md-6">
                @if($post->hasPrevious())
                    <div class="single-blog-box">
                        <a href="{{route('posts.show', $post->getPrevious()->slug)}}">
                            <img src="{{$post->getPrevious()->getImage()}}" alt="">
                            <div class="overlay">
                                <div class="promo-text">
                                    <p><i class=" pull-left fa fa-angle-left"></i></p>
                                    <h5>{{$post->getPrevious()->title}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                @if($post->hasNext())
                    <div class="single-blog-box">
                        <a href="{{route('posts.show', $post->getNext()->slug)}}">
                            <img src="{{$post->getNext()->getImage()}}" alt="">
                            <div class="overlay">
                                <div class="promo-text">
                                    <p><i class=" pull-right fa fa-angle-right"></i></p>
                                    <h5>{{$post->getNext()->title}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div><!--blog next previous end-->
        <div class="bottom-comment"><!--bottom comment-->
            <h4>{{$post->getCommentsCount()}} комментарий</h4>
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
                    'route' => ['post.comment', $post->id],
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
    <div class="col-md-1"></div>
    @include('client.pages.posts._sidebar')

@endsection
