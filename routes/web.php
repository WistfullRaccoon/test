<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Client\Education',
    'as' => 'courses.',
    'prefix' => 'courses'], function () {
    Route::get('/', 'CourseController@index')->name('index');
    Route::get('/{slug}', 'CourseController@show')->name('show');
    Route::get('/subcategory/{slug}', 'CourseController@subcategory')->name('subcategory.show');

});

Route::group([
    'namespace' => 'Client\Pages',
    'as' => 'posts.',
    'prefix' => 'posts'], function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/{slug}', 'PostController@show')->name('show');
    Route::get('/tag/{id}', 'PostController@tag')->name('tag.show');
    Route::get('/subcategory/{slug}', 'PostController@subcategory')->name('subcategory.show');
});

Route::group([
    'namespace' => 'Client\Pages',
    'as' => 'arts.',
    'prefix' => 'arts'], function () {
    Route::get('/', 'ArtController@index')->name('index');
    Route::get('/{slug}', 'ArtController@show')->name('show');
    Route::get('/tag/{id}', 'ArtController@tag')->name('tag.show');
    Route::get('/subcategory/{slug}', 'ArtController@subcategory')->name('subcategory.show');
    Route::get('/{slug}/like','ArtController@like')->name('like');
});

//Route::get('/like/{slug}', 'HomeController@like')->name('like');
Route::get('/verify/{verify_token}', 'Auth\RegisterController@verify');
Route::get('/payment/{id}', 'PaymentController@pay')->name('payment');
//
Route::group(['namespace' => 'Auth', 'middleware' => 'guest'], function () {
    Route::get('/register', 'RegisterController@registerForm')->name('registerForm');
    Route::post('/register', 'RegisterController@register')->name('register');
    Route::get('/login', 'LoginController@loginForm')->name('loginForm');
    Route::post('/login', 'LoginController@login')->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/profile', 'Client\ProfileController@index')->name('own.profile');
    Route::put('/{user}/update', 'Client\ProfileController@update')->name('profile.update');
    Route::post('/arts/{art}/comment', 'Client\Pages\ArtController@comment')->name('art.comment');
    Route::post('/posts/{post}/comment', 'Client\Pages\PostController@comment')->name('post.comment');
    Route::post('/claim/{userId}/{elementId}/{elementType}', 'Client\Pages\ClaimController@complain')->name('complain');
    Route::post('/subscribe/{author}', 'Client\ProfileController@subscribe')->name('subscribe');
//    Route::get('/post/{id}/edit', 'Client\Profile\PostController@edit')->name('client.post.edit');
//    Route::post('/post/update', 'Client\Profile\PostController@update')->name('client.post.update');
    Route::group([
        'as' => 'profile.',
        'namespace' => 'Client\Profile',
        'prefix' => 'profile'
    ], function () {
//            Route::get('/post/create', 'PostController@create')->name('post.create');
//            Route::post('/post/store', 'PostController@store')->name('post.store');
        Route::resource('/posts', 'PostController');
        Route::resource('/arts', 'ArtController');
        Route::resource('/tickets', 'TicketController');
        Route::get('/group/{group}', 'GroupController@show')->name('group.show');
        Route::post('/tickets/{ticket}/message', 'TicketController@message')->name('tickets.message');
        Route::post('/groups/{dialog}/message', 'GroupController@message')->name('dialog.message');


        Route::group([
            'as' => 'teacher.',
            'prefix' => 'teacher'
        ], function () {
            Route::get('/groups/{group}', 'TeacherController@show')->name('group.show');
            Route::get('/{group}/lessons/create', 'TeacherController@createLesson')->name('lessons.create');
            Route::post('/{group}/lessons/store', 'TeacherController@storeLesson')->name('lessons.store');
            Route::get('/lessons/{lesson}/edit', 'TeacherController@editLesson')->name('lessons.edit');
            Route::put('/lessons/{lesson}/update', 'TeacherController@updateLesson')->name('lessons.update');
            Route::get('/dialogs/{group}/{student}', 'TeacherController@dialog')->name('dialog');
            Route::post('/dialogs/{dialog}/message', 'TeacherController@message')->name('message');
        });

    });
});

Route::get('/profile/{slug}', 'Client\ProfileController@show')->name('profile.show');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => 'admin'
], function () {

    Route::get('/', 'DashboardController@index')->name('home');
    Route::resource('/users', 'UsersController');
    Route::get('/users/toggleBan/{id}', 'UsersController@toggleBan')->name('toggleBan');
    Route::get('/users/toggleTeacher/{id}', 'UsersController@toggleTeacher')->name('toggleTeacher');
    Route::get('/claims', 'ClaimController@index')->name('claims');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/subcategories', 'SubcategoriesController');
    Route::resource('/tickets', 'Tickets\TicketController');

    Route::group([
        'namespace' => 'Elements',
    ], function () {
        Route::resource('/posts', 'PostController');
        Route::resource('/arts', 'ArtController');
        Route::resource('/photos', 'PhotoController');
        Route::get('/posts/toggle/{id}', 'PostController@toggleHidden')->name('toggleHidden');
    });

    Route::group([
        'namespace' => 'Education',
    ], function () {
        Route::resource('/courses', 'CoursesController');
        Route::resource('/groups', 'GroupController');
        Route::get('/orders/pay/{id}', 'OrderController@pay')->name('orders.pay');
        Route::get('/orders', 'OrderController@index')->name('orders.index');
    });

    Route::group(['prefix' => 'tickets', 'namespace' => 'Tickets', 'as' => 'tickets.'], function () {
        Route::post('{ticket}/message', 'TicketController@message')->name('message');
        Route::post('/{ticket}/close', 'TicketController@close')->name('close');
        Route::post('/{ticket}/approve', 'TicketController@approve')->name('approve');
        Route::post('/{ticket}/reopen', 'TicketController@reopen')->name('reopen');
    });
});

//
//Route::get('/test', 'TestController@index');
//Route::get('/welcome', function () {
//    return view('welcome');
//});
//Route::get('/layout', function () {
//    return view('layout');
//});


