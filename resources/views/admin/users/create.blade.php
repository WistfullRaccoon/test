@extends('admin.layout')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Пользователи
            </h1>
            {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить пользователя</h3>
                </div>
                @include('admin.errors')
                {!! Form::open(['route' => 'admin.users.store', 'files' => true ]) !!}
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
                        </div>
                        <div class="form-group">
                            <h5><b>Аватар</b></h5>
                            <span class="file-input btn btn-primary btn-file">
                                Browse <input type="file" id="image-files" placeholder="" name="avatar">
                             </span>
                            <div id="image-list" style="max-width:200px"></div>

                            <p class="help-block">Допустимые форматы изображений: jpeg, png, bmp, gif, svg, or webp</p>
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
