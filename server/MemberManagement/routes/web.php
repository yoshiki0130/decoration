<?php

use Illuminate\Support\Facades\Route;

/**
 * 会員用ページ
 */
Route::view('/', 'user/top');
// ログイントップ
Route::view('/login', 'user/login');
// ログイン処理
Route::post('/login', 'UserController@login');
// 新規登録
Route::get('/user/create', 'UserController@create');
Route::post('/user/create/confirm', 'UserController@confirm');
Route::post('/user/create/done', 'UserController@store');

// マイページ
Route::view('/user/my', 'user/my');
// 編集
Route::get('/user/edit', 'UserController@edit');
Route::post('/user/edit/confirm', 'UserController@confirmEdit');
Route::post('/user/edit/done', 'UserController@update');
// 退会（削除）
Route::view('/user/unscribe', 'user/unscribe');
Route::get('/user/unscribe/done', 'UserController@delete');
// お問い合わせ
Route::view('/user/contact', 'user/contact');
Route::view('/user/contact/confirm', 'user/confirmContact');
Route::view('/user/contact/done', 'user/sendContact');
// クーポン一覧
Route::get('/user/coupon', 'UserController@coupon');
// FAQ
Route::view('/user/faq', 'user/faq');
// パスワード再発行
Route::view('/user/reissue', 'user/reissue');
Route::post('/user/reissue/done', 'UserController@reissue');

// 日記機能


/**
 * 管理者用ページ
 */
// 管理者用ログイントップ
Route::get('/manage', 'ManageController@index');
// ログイン後トップ（機能一覧）後から増える予定で簡素に作る？

// 会員検索・一覧

// 会員詳細（ユーザマイページとviewだけ共通

// 会員情報変更

// 確認

// 実行

// 会員情報削除

// 確認

// 実行

/* Route::('/', 'UserController@');
Route::('/', 'UserController@');
Route::('/', 'UserController@');
Route::('/', 'UserController@');
Route::('/', 'UserController@'); */
