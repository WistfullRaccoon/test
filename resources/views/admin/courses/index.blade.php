@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Курсы
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.courses') !!}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список курсов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.courses.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Продолжительность</th>
                            <th>Цена</th>
                            <th>Превью</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->subcategory->title}}</td>
                                <td>{{$course->duration}}</td>
                                <td>{{$course->price}}</td>
                                <td>
                                    <img src="{{$course->getImage()}}" alt="" width="100">
                                </td>
                                <td>
                                    @if($course->isActive())
                                        <a href="#" class="fa fa-eye"
                                           data-toggle="tooltip" data-original-title="Скрыть курс"></a>
                                    @else
                                        <a href="#" class="fa fa-eye-slash"
                                           data-toggle="tooltip" data-original-title="Опубликовать курс"></a>
                                    @endif

                                    <a href="{{route('admin.courses.edit', $course->id)}}" class="fa fa-pencil"
                                       data-toggle="tooltip" data-original-title="Редактировать курс"></a>
                                    {!! Form::open(['route' => ['admin.courses.destroy', $course->id], 'method' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                            data-toggle="tooltip" data-original-title="Удалить курс">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

@endsection
