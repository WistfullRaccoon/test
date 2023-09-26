<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
           aria-controls="pills-profile" aria-selected="false">Профиль</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="pills-art-tab" data-toggle="pill" href="#pills-art" role="tab"
           aria-controls="pills-art" aria-selected="true">Арты</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-posts" role="tab"
           aria-controls="pills-all-posts" aria-selected="false">Статьи</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-course-tab" data-toggle="pill" href="#pills-courses" role="tab"
           aria-controls="pills-all-courses" aria-selected="false">Курсы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-ticket-tab" data-toggle="pill" href="#pills-tickets" role="tab"
           aria-controls="pills-all-courses" aria-selected="false">Запросы</a>
    </li>
    @if(Auth::user()->isTeacher())
    <li class="nav-item">
        <a class="nav-link" id="pills-ticket-tab" data-toggle="pill" href="#pills-teacher" role="tab"
           aria-controls="pills-all-teacher" aria-selected="false">Панель преподавателя</a>
    </li>
    @endif
</ul>
