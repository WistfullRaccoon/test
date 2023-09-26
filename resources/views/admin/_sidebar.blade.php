<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Навигация</li>
    @can('watch-dashboard')
    <li><a href="{{route ('admin.home')}}"><i class="fa fa-dashboard"></i> <span>Админ-панель</span></a></li>
    @endcan
    @can('manage-categories')
    <li><a href="{{route ('admin.categories.index')}}"><i class="fa fa-list-ul"></i> <span>Разделы</span></a></li>
    @endcan
    @can('manage-subcategories')
    <li><a href="{{route ('admin.subcategories.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Категории</span></a></li>
    @endcan
    <li class="treeview">
        <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Элементы</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route ('admin.posts.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
            <li><a href="{{route ('admin.arts.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Арты</span></a></li>
            <li><a href="{{route ('admin.photos.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Треки</span></a></li>
            <li><a href="{{route ('admin.photos.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Фото</span></a></li>
        </ul>
    </li>
{{--    <li><a href="#"><i class="fa fa-tags"></i> <span>Теги</span></a></li>--}}
    <li>
        <a href="{{route ('admin.tickets.index')}}">
            <i class="fa fa-commenting"></i> <span>Обращения</span>
            <span class="pull-right-container">
        <small class="label pull-right bg-green">{{\App\Assistants\Calculators\MessageCalculator::calculateTicketsMessages()}}</small>
      </span>
        </a>
    </li>
    <li><a href="{{route ('admin.claims')}}"><i class="fa fa-sticky-note-o"></i> <span>Жалобы</span></a></li>
    <li><a href="{{route ('admin.users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li class="treeview">
        <a href="#">
            <i class="glyphicon glyphicon-education"></i>
            <span>Обучение</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route ('admin.courses.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Курсы</span></a></li>
            <li><a href="{{route ('admin.groups.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Группы</span></a></li>
            @can('manage-payment')
            <li><a href="{{route ('admin.orders.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Счета</span></a></li>
            @endcan
        </ul>
    </li>
</ul>
