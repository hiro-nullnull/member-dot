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

Route::get('/about', function () {
    return view('about');
});

// トップページ
Route::get('/', 'Top\IndexController@index')->name('Top');

// メンバー編集
Route::get('/member-management', 'MemberManagement\IndexController@index')->name('MemberManagement');
Route::post('/member-management/web-api/add', 'MemberManagement\WebApi\AddController@index')->name('AddMember');
Route::put('/member-management/web-api/edit', 'MemberManagement\WebApi\EditController@index')->name('EditMember');
Route::put('/member-management/web-api/delete', 'MemberManagement\WebApi\DeleteController@index')->name('DeleteMember');
