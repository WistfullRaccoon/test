@extends('admin.layout')

@section('header-breadcrumbs')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Пользователи
        </h1>
        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.users') !!}
        {{--            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>--}}

    </section>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список пользователей</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @can('manage-users')
                <div class="form-group">
                    <a href="{{route('admin.users.create')}}" class="btn btn-success">Добавить</a>
                </div>
                @endcan
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>E-mail</th>
                        <th>Аватар</th>
                        <th>Статус</th>
                        <th>Роль</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('admin.users.show', $user->id)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>
                                <img src="{{$user->getAvatar()}}" alt="" class="img-responsive" width="150"
                                     style="height: 100px; object-fit:cover;">
                            </td>
                            <td>
                                @include('admin.users._status')
                            </td>
                            <td>
                                @include('admin.users._roles')
                            </td>
                            <td>
                                @if($user->isBanned())
                                    <a href="{{route('admin.toggleBan', $user->id)}}" class="fa fa-lock"
                                       data-toggle="tooltip" data-original-title="Разбанить пользователя"></a>

                                @elseif($user->isActive())
                                    <a href="{{route('admin.toggleBan', $user->id)}}" class="fa fa-unlock"
                                       data-toggle="tooltip" data-original-title="Забанить пользователя"></a>

                                    @if($user->isTeacher())
                                        <a href="{{route('admin.toggleTeacher', $user->id)}}" class="fa fa-user"
                                           data-toggle="tooltip" data-original-title="Сделать пользователем"></a>
                                    @else
                                        <a href="{{route('admin.toggleTeacher', $user->id)}}" class="fa fa-graduation-cap"
                                           data-toggle="tooltip" data-original-title="Сделать преподавателем"></a>
                                    @endif

                                @else
                                    <span class="fa fa-pause"
                                       data-toggle="tooltip" data-original-title="Почта не подтверждена"></span>
                                @endif

                                @can('manage-users')
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="fa fa-pencil"
                                       data-toggle="tooltip" data-original-title="Редактировать пользователя"></a>
                                @endcan

                                @can('delete-users')
                                    {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete"
                                            data-toggle="tooltip" data-original-title="Удалить пользователя">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {!! Form::close() !!}
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
