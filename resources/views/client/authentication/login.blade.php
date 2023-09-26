@extends('client.authentication.layout')

@section('content')
    <div class="card-body">
        <h2 class="title">Страница входа</h2>
        {{Form::open(['route' => ['login'], 'method' => 'post'])}}
        <div class="input-group">
            <input class="input--style-3" type="text" placeholder="Email" name="email" value="{{old('email')}}">
            <span style="color:red">{{ $errors->first('email') }}</span>
        </div>
        <div class="input-group">
            <input class="input--style-3" type="password" placeholder="Пароль" name="password">
            <br>
            <span style="color:red">{{ $errors->first('password') }}</span>
        </div>
        @if(session('error'))
        <div class="p-t-10" style="color:red">
            {{session('error')}}
        </div>
        @endif
        <div class="p-t-10">
            <button class="btn btn--pill btn--green" type="submit">Войти</button>
        </div>
        {!! Form::close() !!}

    </div>

@endsection
