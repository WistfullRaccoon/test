@extends('admin.layout')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Разделы
                <small>Отличный денёк, чтобы добавить раздел</small>
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить раздел</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    {!! Form::open(['route' => 'admin.categories.store', 'files' => true]) !!}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                        </div>
                        <div class="form-group">
                            <h5><b>Превью</b></h5>
                            <span class="file-input btn btn-primary btn-file">
                                Browse <input type="file" id="image-files" placeholder="" name="preview">
                             </span>
                            <div id="image-list" style="max-width:200px"></div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
@endsection
