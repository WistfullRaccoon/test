<?php

use App\Models\Education\Group;
use App\Models\Education\Lesson;
use App\Models\Elements\Art;
use App\Models\Elements\Post;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('admin', function ($trail) {
    $trail->push('Главная', route('admin.home'));
});

Breadcrumbs::for('admin.users', function ($trail) {
    $trail->parent('admin');
    $trail->push('Пользователи', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->parent('admin.users');
    $trail->push('Создание', route('admin.users.create'));
});

Breadcrumbs::for('admin.users.edit', function ($trail, $id) {
    $trail->parent('admin.users');
    $trail->push('Редактирование', route('admin.users.edit', $id));
});

Breadcrumbs::for('admin.arts', function ($trail) {
    $trail->parent('admin');
    $trail->push('Изображения', route('admin.arts.index'));
});

Breadcrumbs::for('admin.arts.create', function ($trail) {
    $trail->parent('admin.arts');
    $trail->push('Создание', route('admin.arts.create'));
});

Breadcrumbs::for('admin.arts.edit', function ($trail, $id) {
    $trail->parent('admin.arts');
    $trail->push('Редактирование', route('admin.arts.edit', $id));
});

Breadcrumbs::for('admin.posts', function ($trail) {
    $trail->parent('admin');
    $trail->push('Статьи', route('admin.posts.index'));
});

Breadcrumbs::for('admin.posts.create', function ($trail) {
    $trail->parent('admin.posts');
    $trail->push('Создание', route('admin.posts.create'));
});

Breadcrumbs::for('admin.posts.edit', function ($trail, $id) {
    $trail->parent('admin.posts');
    $trail->push('Редактирование', route('admin.posts.edit', $id));
});

Breadcrumbs::for('admin.categories', function ($trail) {
    $trail->parent('admin');
    $trail->push('Разделы', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->parent('admin.categories');
    $trail->push('Создание', route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function ($trail, $id) {
    $trail->parent('admin.categories');
    $trail->push('Редактирование', route('admin.categories.edit', $id));
});

Breadcrumbs::for('admin.subcategories', function ($trail) {
    $trail->parent('admin');
    $trail->push('Категории', route('admin.subcategories.index'));
});

Breadcrumbs::for('admin.subcategories.create', function ($trail) {
    $trail->parent('admin.subcategories');
    $trail->push('Создание', route('admin.subcategories.create'));
});

Breadcrumbs::for('admin.subcategories.edit', function ($trail, $id) {
    $trail->parent('admin.subcategories');
    $trail->push('Редактирование', route('admin.subcategories.edit', $id));
});

Breadcrumbs::for('admin.courses', function ($trail) {
    $trail->parent('admin');
    $trail->push('Курсы', route('admin.courses.index'));
});

Breadcrumbs::for('admin.courses.create', function ($trail) {
    $trail->parent('admin.courses');
    $trail->push('Создание', route('admin.courses.create'));
});

Breadcrumbs::for('admin.courses.edit', function ($trail, $id) {
    $trail->parent('admin.courses');
    $trail->push('Редактирование', route('admin.courses.edit', $id));
});

Breadcrumbs::for('admin.groups', function ($trail) {
    $trail->parent('admin');
    $trail->push('Группы', route('admin.groups.index'));
});

Breadcrumbs::for('admin.groups.create', function ($trail) {
    $trail->parent('admin.groups');
    $trail->push('Создание', route('admin.groups.create'));
});

Breadcrumbs::for('admin.groups.edit', function ($trail, $id) {
    $trail->parent('admin.groups');
    $trail->push('Редактирование', route('admin.groups.edit', $id));
});

Breadcrumbs::for('admin.orders', function ($trail) {
    $trail->parent('admin');
    $trail->push('Счета', route('admin.orders.index'));
});

Breadcrumbs::for('admin.tickets', function ($trail) {
    $trail->parent('admin');
    $trail->push('Все запросы', route('admin.tickets.index'));
});

Breadcrumbs::for('admin.tickets.show', function ($trail) {
    $trail->parent('admin.tickets');
    $trail->push('Запрос', route('admin.tickets.create'));
});


/*profile*/


Breadcrumbs::for('profile', function ($trail) {
    $trail->push('Профиль', route('own.profile'));
});

Breadcrumbs::for('profile.posts.create', function ($trail) {
    $trail->parent('profile');
    $trail->push('Добавление статьи', route('profile.posts.create'));
});

Breadcrumbs::for('profile.posts.edit', function ($trail, Post $post) {
    $trail->parent('profile');
    $trail->push('Редактирование статьи', route('profile.posts.edit', $post));
});

Breadcrumbs::for('profile.arts.create', function ($trail) {
    $trail->parent('profile');
    $trail->push('Добавление арта', route('profile.arts.create'));
});

Breadcrumbs::for('profile.arts.edit', function ($trail, Art $art) {
    $trail->parent('profile');
    $trail->push('Редактирование арта', route('profile.arts.edit', $art));
});

Breadcrumbs::for('profile.group.show', function ($trail) {
    $trail->parent('profile');
    $trail->push('Курс', route('profile.arts.create'));
});

Breadcrumbs::for('profile.tickets.show', function ($trail) {
    $trail->parent('profile');
    $trail->push('Запрос', route('profile.tickets.index'));
});

Breadcrumbs::for('profile.tickets.create', function ($trail) {
    $trail->parent('profile');
    $trail->push('Создание запроса', route('profile.tickets.create'));
});

Breadcrumbs::for('profile.tickets.edit', function ($trail) {
    $trail->parent('profile');
    $trail->push('Редактирование запроса', route('profile.tickets.edit'));
});

Breadcrumbs::for('profile.teacher.group.show', function ($trail, Group $group) {
    $trail->parent('profile');
    $trail->push('Группа', route('profile.teacher.group.show', $group));
});

Breadcrumbs::for('profile.teacher.lessons.create', function ($trail, $groupId) {
    $group = Group::find($groupId);
    $trail->parent('profile.teacher.group.show', $group);
    $trail->push('Добавление урока', route('profile.teacher.lessons.create', $group->id));
});

Breadcrumbs::for('profile.teacher.lessons.edit', function ($trail, Lesson $lesson) {
    $group = $lesson->group;
    $trail->parent('profile.teacher.group.show', $group);
    $trail->push('Редактирование урока', route('profile.teacher.lessons.create', $lesson));
});

//Breadcrumbs::for('profile.teacher.lessons.create', function ($trail) {
//    $trail->parent('profile');
//    $trail->push('Группа', route('own.profile'));
//});
//
//Breadcrumbs::for('profile.teacher.lessons.create', function ($trail) {
//    $trail->parent('profile');
//    $trail->push('Группа', route('own.profile'));
//});
//
//Breadcrumbs::for('profile.teacher.lessons.create', function ($trail) {
//    $trail->parent('profile');
//    $trail->push('Группа', route('own.profile'));
//});
//
//Breadcrumbs::for('profile.teacher.lessons.create', function ($trail) {
//    $trail->parent('profile');
//    $trail->push('Группа', route('own.profile'));
//});


