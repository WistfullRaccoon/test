<ul class="nav navbar-nav text-uppercase pull-left sections">
    <li><a href="">МУЗЫКА</a></li>
    <li><a href="{{route('arts.index')}}">АРТЫ</a></li>
    <li><a href="">ФОТО</a></li>
    <li><a href="{{route('posts.index')}}">СТАТЬИ</a></li>
    <li><a href="{{route('courses.index')}}">ОБУЧЕНИЕ</a></li>
</ul>

<ul class="sections nav navbar-nav text-uppercase pull-right">
    @if(Auth::check())
        <li><a href="{{route('own.profile')}}">Профиль</a></li>
        <li><a href="{{route('logout')}}">Выйти</a></li>
    @else
        <li><a href="{{route('registerForm')}}">Регистрация</a></li>
        <li><a href="{{route('loginForm')}}">Вход</a></li>
    @endif
</ul>

    <div class="col-md-3" style="float: right; margin-top:20px;">
        <form action="" class="search-form">
            <div class="form-group has-feedback" style="background-color: #1f1f1f">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="Поиск">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </form>
    </div>

