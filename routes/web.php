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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$groupData = [
    'namespace' => '\App\Http\Controllers\Forum',
    'prefix' => 'forum',
];
Route::group($groupData, function() {
    //Topic
    $methods = ['index', 'show', 'store', 'update', 'create',];
    Route::resource('topic','TopicController')->only($methods)->names('forum.topic');

    //BlogPost
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
});