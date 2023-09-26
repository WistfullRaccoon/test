@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Разделы
        </h1>
        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.categories') !!}
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список разделов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Превью</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td><img src="{{$category->getImage()}}" class="img-responsive" max-height="100" width="150"></td>
                        <td>
                            <a href="{{route('admin.categories.edit', $category->id)}}" class="fa fa-pencil"
                               data-toggle="tooltip" data-original-title="Редактировать раздел"></a>
                            {{ Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete']) }}
                            <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                    data-toggle="tooltip" data-original-title="Удалить раздел">
                                <i class="fa fa-trash-o"></i>
                            </button>
                            {{ Form::close() }}
                        </td>

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
