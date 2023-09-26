@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
        <section class="content-header">
            <h1>
                Курсы
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">
        {!! Form::open([
              'route' => 'admin.courses.store',
              'files' => true
          ])!!}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить курс</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTitle">Название</label>
                            <input type="text" class="form-control" id="inputTitle" placeholder="" name="title">
                        </div>

                        <div class="form-group">
                            <h5><b>Лицевая картинка</b></h5>
                            <span class="file-input btn btn-primary btn-file">
                                Browse <input type="file" id="image-files" placeholder="" name="image">
                             </span>
                            <div id="image-list" style="max-width:200px"></div>
                            <p class="help-block">Допустимые форматы изображений: jpeg, png, bmp, gif, svg, or webp</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{Form::select('subcategory_id',
                                $subcategories,
                                null,
                                ['class' => 'form-control select1']
                              )}}
                        </div>
                        <div class="form-group">
                            <label for="inputDuration">Продолжительность в днях</label>
                            <input type="text" class="form-control" id="inputDuration" placeholder="" name="duration">
                        </div>
                        <div class="form-group">
                            <label for="inputDuration">Цена</label>
                            <input type="text" class="form-control" id="inputDuration" placeholder="" name="price">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="isActive">
                            </label>
                            <label>
                                Активный
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputText">Краткое описание</label>
                            <textarea name="description" id="inputText" cols="30" rows="3" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputText">Полный текст</label>
                            <textarea name="content" id="inputText" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {!! Form::close() !!}
        </section>
        <!-- /.content -->
@endsection
