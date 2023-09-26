@extends('client.profile.layout')

@section('content')
    <div class="d-flex justify-content-center" >
        {!! Form::open([
        'route' => ['profile.teacher.lessons.store', $groupId],
        'files' => true
        ])!!}

        <div class="box" style="margin-top:70px; margin-bottom:70px">
            <div class="box-header with-border">
                {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
                <h3 class="box-title">Добавить урок</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputTitle">Название</label>
                        <input type="text" class="form-control" id="inputTitle" placeholder="" name="title">
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Ссылка на видео</label>
                        <input type="text" class="form-control" id="inputTitle" placeholder="" name="video">
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">Домашнее задание</label>
                        <input type="text" class="form-control" id="inputTitle" placeholder="" name="task">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputText">Текст урока</label>
                        <textarea name="content" id="inputText" cols="30" rows="10"
                                  class="form-control">{{old('content')}}</textarea>
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

    </div>
@endsection

