@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {!! Form::open([
            'route' => ['photos.update', $photo->id],
            'files' => true,
            'method' => 'put'
        ])!!}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$photo->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{$photo->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" id="exampleInputFile" name="image">

                            <p class="help-block">Картинка в формате JPG, PNG, GIF</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('subcategory_id',
                              $subcategories,
                              $photo->subcategory->id,
                              ['class' => 'form-control select2']
                            )}}
                        </div>
                        <div class="form-group">
                            <label for="inputTags">Добавьте теги</label>
                            <input type="text" class="form-control" id="inputTags" placeholder="" value="{{$usedTags}}" name="tags">
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{$photo->date}}" name="date">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{ Form::checkbox('status', '1', $photo->status, ['class' => 'minimal']) }}
                            </label>
                            <label>
                                Черновик
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$photo->description}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {!! Form::close() !!}
        </section>
        <!-- /.content -->

@endsection
