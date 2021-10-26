<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$groupData = [
    'namespace' => '\App\Http\Controllers\Forum',
    'prefix' => 'forum',
];
Route::group($groupData, function() {
    //Topic
    $methodsAuth = [ 'store', 'create',];
    $methods = ['index', 'show'];
    $methodComment = [ 'store', 'create', 'edit', 'update', 'destroy', 'show'];
    Route::resource('topic','TopicController')->names('forum.topic');

    //Comment
    Route::resource('comment', 'CommentController')
        ->names('forum.comment');
});
