@extends('admin.layout')

@section('content')

        <section class="content-header">
            <h1>
                Арты
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">
        {!! Form::open([
              'route' => 'admin.arts.store',
              'files' => true
          ])!!}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить арт</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputTitle">Название</label>
                            <input type="text" class="form-control" id="inputTitle" placeholder="" name="title">
                        </div>

                        <div class="form-group">
                            <h5><b>Изображение</b></h5>
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
                                ['class' => 'form-control select2']
                              )}}
                        </div>
                        <div class="form-group">
                            <label for="inputTags">Добавьте теги</label>
                            <input type="text" class="form-control" id="inputTags" placeholder="" name="tags">
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="date">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="status">
                            </label>
                            <label>
                                Скрыть
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputText">Описание</label>
                            <textarea name="description" id="inputText" cols="30" rows="5" class="form-control">{{old('description')}}</textarea>
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
