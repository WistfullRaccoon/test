@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Blank page
                <small>it all stphotos here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('photos.create')}}" class="btn btn-success">Добавить</a>
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
                        @foreach($photos as $photo)
                            <tr>
                                <td>{{$photo->id}}</td>
                                <td>{{$photo->title}}</td>
                                <td>{{$photo->subcategory->title}}</td>
                                <td>@foreach ($photo->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach</td>
                                <td>
                                    <img src="{{$photo->getImage()}}" alt="" width="100">
                                </td>
                                <td>
                                    <a href="{{route('photos.edit', $photo->id)}}" class="fa fa-pencil"></a>
                                    {!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete">
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
