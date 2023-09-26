@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Категории
        </h1>
        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.subcategories') !!}
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список категорий</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('admin.subcategories.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <td>Превью</td>
                        <td>Категория</td>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->title}}</td>
                            <td><img src="{{$subcategory->getImage()}}" alt="" class="img-responsive" width="150"></td>
                            <td>{{$subcategory->category->title}}</td>
                            <td>
                                <a href="{{route('admin.subcategories.edit', $subcategory->id)}}" class="fa fa-pencil"
                                   data-toggle="tooltip" data-original-title="Редактировать категорию"></a>
                                {!! Form::open(['route' => ['admin.subcategories.destroy', $subcategory->id], 'method' => 'delete']) !!}
                                <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                        data-toggle="tooltip" data-original-title="Удалить категорию">
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
