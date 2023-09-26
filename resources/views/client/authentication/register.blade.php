@extends('client.authentication.layout')

@section('content')

<div class="card-body">
    <h2 class="title">Страница регистрации</h2>
    {{Form::open(['route' => ['register'], 'method' => 'post'])}}
    <div class="input-group">
        <input class="input--style-3" type="text" placeholder="Имя" name="name" value="{{old('name')}}">
        <br>
        <span style="color:red">{{ $errors->first('name') }}</span>
    </div>
    <div class="input-group">
        <input class="input--style-3 js-datepicker" type="text" placeholder="Дата рождения" name="birthday" value="{{old('birthday')}}">
        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
    </div>
    {{--                    <div class="input-group">--}}
    {{--                        <div class="rs-select2 js-select-simple select--no-search">--}}
    {{--                            <select name="gender">--}}
    {{--                                <option disabled="disabled" selected="selected">Gender</option>--}}
    {{--                                <option>Male</option>--}}
    {{--                                <option>Female</option>--}}
    {{--                                <option>Other</option>--}}
    {{--                            </select>--}}
    {{--                            <div class="select-dropdown"></div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    <div class="input-group">
        <input class="input--style-3" type="text" placeholder="Email" name="email" value="{{old('email')}}">
        <span style="color:red">{{ $errors->first('email') }}</span>
    </div>
    <div class="input-group">
        <input class="input--style-3" type="password" placeholder="Пароль" name="password">
        <br>
        <span style="color:red">{{ $errors->first('password') }}</span>
    </div>
    <div class="input-group">
        <input class="input--style-3" type="password" placeholder="Подтверждение пароля" name="password_confirm">
        <br>
        <span style="color:red">{{ $errors->first('password_confirm') }}</span>
    </div>
    <div class="p-t-10">
        <button class="btn btn--pill btn--green" type="submit">Подтвердить</button>
    </div>
    {!! Form::close() !!}
</div>

@endsection
