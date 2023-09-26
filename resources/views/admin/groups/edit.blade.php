@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Группы
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">
        {!! Form::open([
            'route' => ['admin.groups.update', $group->id],
            'files' => true,
            'method' => 'put'
        ])!!}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактировать группу</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Курс</label>
                            {{Form::select('course_id',
                                $courses,
                                $group->course->id,
                                ['class' => 'form-control select2']
                              )}}
                        </div>
                        <div class="form-group">
                            <label>Преподаватель</label>
                            {{Form::select('teacher_id',
                                $teachers,
                                $group->teacher->id,
                                ['class' => 'form-control select2']
                              )}}
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{$group->date}}" name="date">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="inputPlaces">Количество мест</label>
                            <input type="text" class="form-control" id="inputPlaces" value="{{$group->places}}" placeholder="" name="places">
                        </div>


                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{ Form::checkbox('isActive', '1', $group->isActive(), ['class' => 'minimal']) }}
                            </label>
                            <label>
                                Активная
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {!! Form::close() !!}
        </section>
        <!-- /.content -->

@endsection
