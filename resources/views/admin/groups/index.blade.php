@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Группы
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.groups') !!}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список групп</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.groups.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Курс</th>
                            <th>Свободные места</th>
                            <th>Дата начала</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->course->title}}</td>
                                <td>{{$group->places}}</td>
                                <td>{{$group->date}}</td>
                                <td>
                                    @if($group->isActive())
                                        <a href="#" class="fa fa-eye"
                                           data-toggle="tooltip" data-original-title="Сделать неактивной"></a>
                                    @else
                                        <a href="#" class="fa fa-eye-slash"
                                           data-toggle="tooltip" data-original-title="Сделать активной"></a>
                                    @endif

                                    <a href="{{route('admin.groups.edit', $group->id)}}" class="fa fa-pencil"
                                       data-toggle="tooltip" data-original-title="Редактировать группу"></a>
                                    {!! Form::open(['route' => ['admin.groups.destroy', $group->id], 'method' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                            data-toggle="tooltip" data-original-title="Удалить группу">
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
