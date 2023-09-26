@extends('admin.layout')

@section('content')

    <div class="row user-infos">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-7 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
            <div class="panel panel-primary user-profile__admin">
                <div class="panel-heading">
                    <h3 class="panel-title">Информация о пользователе</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                            <img class="img-circle"
                                 src="{{$user->getAvatar()}}"
                                 alt="User Pic">
                        </div>
                        <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                            <img class="img-circle"
                                 src="{{$user->getAvatar()}}"
                                 alt="User Pic">
                        </div>
                        <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                            <strong>{{$user->id}}</strong><br>
                            <dl>
                                <dt>User level:</dt>
                                <dd>Administrator</dd>
                                <dt>Registered since:</dt>
                                <dd>11/12/2013</dd>
                                <dt>Topics</dt>
                                <dd>15</dd>
                                <dt>Warnings</dt>
                                <dd>0</dd>
                            </dl>
                        </div>
                        <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                            <strong>Cyruxx</strong><br>
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Роль</td>
                                    <td>{{$user->role}}</td>
                                </tr>
                                <tr>
                                    <td>Registered since:</td>
                                    <td>11/12/2010</td>
                                </tr>
                                <tr>
                                    <td>Topics</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Warnings</td>
                                    <td>0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                    <span class="pull-right">
                        <button class="btn btn-sm btn-primary" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
                            <button class="btn btn-sm btn-warning" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Edit this user"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-sm btn-danger" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Remove this user"><i class="glyphicon glyphicon-remove"></i></button>
                        </span>
                </div>
            </div>
        </div>
    </div>

@endsection
