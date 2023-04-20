<?php
use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth','admin');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'], '/add_personal', [Controller\Site::class, 'add_personal'])
    ->middleware('auth','admin');
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/add_menu', [Controller\Site::class, 'add_menu']);
//Route::add(['POST','GET'], '/search', [Controller\Site::class, 'search']);
//Route::add(['POST','GET'], '/search1', [Controller\Site::class, 'search1']);
Route::add(['GET','POST'], '/proverka', [Controller\Site::class, 'proverka']);
//    ->middleware('auth',);
