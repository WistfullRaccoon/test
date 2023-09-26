@extends('layout')

@section('content')

    <div class="col-md-2"></div>
    <div class="col-md-8">
        <article class="post">
            <div class="post-thumb">
                <a href="blog.html"><img src="{{$course->getImage()}}" alt=""></a>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                    <h6>
                        <a href="{{route('courses.subcategory.show', $course->subcategory->slug)}}"> {{$course->subcategory->title}}</a>
                    </h6>

                    <h1 class="entry-title"><a href="">{{$course->title}}</a></h1>


                </header>
                <div class="entry-content">
                    <p>
                        {!! $course->content !!}
                    </p>
                </div>

                <div class="social-share" style="padding-bottom: 45px;">
							<span
                                class="social-share-title pull-left text-capitalize">Стоимость {{$course->price}}
                            </span>

                            <span
                                class="social-share-title pull-right text-capitalize">
                                Оставшиеся места {{$course->getFreePlaces()}}
                            </span>
                </div>

                <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">
                                Ближайшая дата старта {{$course->getDate()}}
                            </span>


                    <ul class="text-center pull-right">
                        <li><a href="{{route('courses.index')}}" class="btn btn-default">Вернуться к списку курсов</a>
                        </li>
                        @can('pay', $course->getLastGroup()->id)
                            <li><a href="{{route('payment', $course->getLastGroup()->id)}}" class="btn btn-info">Оплатить</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </article>
        <div class="row"><!--blog next previous-->
            <div class="col-md-6">

            </div>
            <div class="col-md-6">

            </div>
        </div><!--blog next previous end-->

    </div>
    <div class="col-md-2"></div>
@endsection
