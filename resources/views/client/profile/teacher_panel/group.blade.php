@extends('client.profile.layout')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="container" style="margin-top:70px; margin-bottom:70px">
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
            <div class="row">
                <div class="col-md-10">
                    <a href="{{route('profile.teacher.lessons.create', $group->id)}}" class="btn btn-info">Добавить урок</a>
                    @include('client.profile.courses._lesson-tabs', ['lessons' => $lessons])

                    <div class="tab-content" id="pills-tabContent">
                        @foreach($lessons as $lesson)
                            <div class="tab-pane fade" id="pills-{{$lesson->id}}" role="tabpanel"
                                 aria-labelledby="pills-{{$lesson->id}}">
                                <div class="my-3 rounded shadow-sm">
                                    <div><h3>{{$lesson->title}}</h3></div>
                                    <div>{!! $lesson->content !!}</div>
                                    <div>
                                        {!! $lesson->video !!}
                                    </div>
                                    <div>
                                        <br>
                                        <h3> Домашнее задание</h3>
                                        {!! $lesson->task !!}
                                    </div>
                                    <div><a href="{{route('profile.teacher.lessons.edit', $lesson)}}" class="btn btn-info">Редактировать урок</a></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-2">
                    <p>Ученики</p>
                    <div class="my-3">
                        @foreach($students as $student)
                            <div class=" d-inline-flex">
                                <div>
                                    <a href="{{route('profile.teacher.dialog', [$group, $student])}}" class="btn btn-info">{{$student->name}}</a>
                                </div>
                                <div class="btn btn-info" style="background-color: #0f4bac">
                                    {{$group->calcTeacherNewMessages($student->id)}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-11">

                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer" style="padding-left: 0;">
                <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
            </div>
            <!-- /.box-footer-->
            <!-- /.box -->
        </div>
    </div>

@endsection
