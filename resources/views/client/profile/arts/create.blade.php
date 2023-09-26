@extends('client.profile.layout')

@section('content')
            <div class="d-flex justify-content-center" >
                {!! Form::open([
       'route' => 'profile.arts.store',
       'files' => true
       ])!!}

                <div class="box" style="margin-top:30px; margin-bottom:70px">
                    <div class="box-header with-border">
                        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
                        <h3 class="box-title" style="margin-left:10px;">Добавить арт</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputTitle">Название</label>
                                <input type="text" class="form-control" id="inputTitle"  value="{{old('title')}}"  placeholder="" name="title">
                            </div>

                            <div class="form-group">
                                <h5><b>Изображение</b></h5>
                                <span class="file-input btn btn-primary btn-file">
                                Browse <input type="file" id="image-files" placeholder="" name="image">
                             </span>
                                <div id="image-list" style="max-width:200px"></div>
                                <p class="help-block">Допустимые форматы изображений: jpeg, png, bmp, gif, svg, or
                                    webp</p>
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
                                <input type="text" class="form-control" id="inputTags" value="{{old('tags')}}" placeholder="" name="tags">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputText">Описание</label>
                                <textarea name="description" id="inputText" cols="30" rows="3"
                                          class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="padding-left: 15px; padding-right: 15px;">
                        <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                        <button class="btn btn-info pull-right">Добавить</button>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
                {!! Form::close() !!}

            </div>
@endsection

