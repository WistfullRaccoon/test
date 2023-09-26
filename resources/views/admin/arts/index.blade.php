@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Арт
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.arts') !!}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список артов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.arts.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($arts as $art)
                            <tr>
                                <td>{{$art->id}}</td>
                                <td>{{$art->title}}</td>
                                <td>{{$art->subcategory->title}}</td>
                                <td>@foreach ($art->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach</td>
                                <td>
                                    <img src="{{$art->getImage()}}" alt="" width="100">
                                </td>
                                <td>
                                    <a href="{{route('admin.arts.edit', $art->id)}}" class="fa fa-pencil"
                                       data-toggle="tooltip" data-original-title="Редактировать элемент"></a>
                                    {!! Form::open(['route' => ['admin.arts.destroy', $art->id], 'method' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                            data-toggle="tooltip" data-original-title="Удалить элемент">
                                        <i class="fa fa-remove"></i>
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
