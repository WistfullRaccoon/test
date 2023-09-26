@extends('client.profile.layout')

@section('content')
    <div class="d-flex justify-content-center" >
        {!! Form::open([
            'route' => ['profile.posts.update', $post->id],
            'files' => true,
            'method' => 'put'
        ])!!}
        <div class="box" style="margin-top:30px; margin-bottom:70px">
            <div class="box-header with-border">
                {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
                <h3 class="box-title" style="margin-left:10px">Редактировать статью</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputTitle">Название</label>
                        <input type="text" class="form-control" id="inputTitle" value="{{$post->title}}" placeholder="" name="title">
                    </div>

                    <div class="form-group">
                        <h5><b>Лицевая картинка</b></h5>
                        <span class="file-input btn btn-primary btn-file">
                                Browse <input type="file" id="image-files" placeholder="" name="image">
                             </span>
                        <div id="image-list" style="max-width:200px">
                            <img id="old-image" src="{{$post->getImage()}}" alt="" width="200" class="img-responsive">
                        </div>

                        <p class="help-block">Допустимые форматы изображений: jpeg, png, bmp, gif, svg, or webp</p>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        {{Form::select('subcategory_id',
                          $subcategories,
                          $post->subcategory->id,
                          ['class' => 'form-control select2']
                        )}}
                    </div>
                    <div class="form-group">
                        <label for="inputTags">Добавьте теги</label>
                        <input type="text" class="form-control" id="inputTags" placeholder="" value="{{$usedTags}}" name="tags">
                    </div>
                    <div class="form-group">
                        <label>
                            {{ Form::checkbox('isDraft', '1', $post->isDraft(), ['class' => 'minimal']) }}
                        </label>
                        <label>
                            Черновик
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="content" id="content" cols="30" rows="10"
                                  class="form-control">{!! $post->content !!}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                <button class="btn btn-info pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {!! Form::close() !!}

    </div>
@endsection

