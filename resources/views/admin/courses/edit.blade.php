@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Курсы
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">
        {!! Form::open([
            'route' => ['admin.courses.update', $course->id],
            'files' => true,
            'method' => 'put'
        ])!!}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактировать курс</h3>
                </div>
                @include('admin.errors')
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$course->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <h5><b>Лицевая картинка</b></h5>
                            <span class="file-input btn btn-primary btn-file">
                                Browse <input type="file" id="image-files" placeholder="" name="image">
                             </span>
                            <div id="image-list" style="max-width:200px">
                                <img id="old-image" src="{{$course->getImage()}}" alt="" width="200" class="img-responsive">
                            </div>

                            <p class="help-block">Допустимые форматы изображений: jpeg, png, bmp, gif, svg, or webp</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('subcategory_id',
                              $subcategories,
                              $course->subcategory->id,
                              ['class' => 'form-control select2']
                            )}}
                        </div>
                        <div class="form-group">
                            <label for="inputDuration">Продолжительность в днях</label>
                            <input type="text" class="form-control" id="inputDuration" value="{{$course->duration}}" placeholder="" name="duration">
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{ Form::checkbox('isActive', '1', $course->isActive(), ['class' => 'minimal']) }}
                            </label>
                            <label>
                                Активный
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Описание</label>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control">{{$course->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$course->content}}</textarea>
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
