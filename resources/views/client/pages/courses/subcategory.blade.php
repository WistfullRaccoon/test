@extends('layout')

@section('content')

    <div class="col-md-10">
        <div class="row" style="padding-top: 0; padding-left: 0">
            @foreach($courses as $course)
                <div class="col-md-4">
                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{route('courses.show', $course->slug)}}">
                                <img src="{{$course->getImage()}}" alt="" style="object-fit: cover; max-height: 168px;">
                            </a>

                            <a href="{{route('courses.show', $course->slug)}}" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">Подробнее</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6>
                                    <a href="{{route('courses.subcategory.show', $course->subcategory->slug)}}">
                                        {{$course->subcategory->title}}
                                    </a>
                                </h6>

                                <h1 class="entry-title">
                                    <a href="{{route('courses.show', $course->slug)}}">
                                        {{$course->title}}
                                    </a>
                                </h1>

                            </header>
                            <div class="entry-content">
                                <p>{!! $course->description !!}
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="{{route('courses.subcategory.show', $course->subcategory->slug)}}" class="more-link">Узнать подробности</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">Ближайший старт {{$course->getDate()}}</span>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        {{$courses->links()}}
    </div>
    @include('client.pages.courses._sidebar')
@endsection
