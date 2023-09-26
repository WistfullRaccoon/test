@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Статьи
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.posts') !!}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список статей</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.posts.create')}}" class="btn btn-success">Добавить</a>
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
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->subcategory->title}}</td>
                                <td>@foreach ($post->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach</td>
                                <td>
                                    <img src="{{$post->getImage()}}" alt="" width="100">
                                </td>
                                <td>
                                    @if($post->isPublic())
                                        <a href="{{route('admin.toggleHidden', $post->id)}}" class="fa fa-eye"
                                           data-toggle="tooltip" data-original-title="Скрыть статью"></a>
                                    @else
                                        <a href="{{route('admin.toggleHidden', $post->id)}}" class="fa fa-eye-slash"
                                           data-toggle="tooltip" data-original-title="Опубликовать статью"></a>
                                    @endif

                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="fa fa-pencil"
                                       data-toggle="tooltip" data-original-title="Редактировать статью"></a>
                                    {!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                            data-toggle="tooltip" data-original-title="Удалить статью">
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
