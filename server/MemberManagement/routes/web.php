<?php

use Illuminate\Support\Facades\Route;
use App\Models\Gender;
use App\Models\Prefecture;
use App\Models\User;

/**
 * 会員用ページ
 */
Route::view('/', 'user/top');
// ログイン・ログアウトはコントローラ別にしたほうがよさそうだけど仮で作っとく
// ログイントップ
Route::view('/login', 'user/login');
// ログイン処理
Route::post('/login', 'UserController@login');
// ログアウト
Route::get('/logout', 'UserController@logout');
// 新規登録・編集
Route::get('/user/{mode}/registration', 'UserController@registration')->where('mode', 'create|edit');
Route::post('/user/{mode}/confirm', 'UserController@confirm')->where('mode', 'create|edit');
Route::post('/user/{mode}/store', 'UserController@store')->where('mode', 'create|edit');

// マイページ
Route::view('/user/top', 'user/my');
// 退会（削除）
Route::view('/user/unscribe', 'user/unscribe');
Route::get('/user/unscribe/done', 'UserController@delete');
// お問い合わせ
Route::view('/user/contact', 'contact/top');
Route::post('/user/contact/confirm', 'ContactController@confirm');
Route::post('/user/contact/done', 'ContactController@send');
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
Route::view('/manager', 'manager/login');
// ログイン後トップ（機能一覧）
// ログイン機能は後で作るか他チームと統合される？
Route::view('/manager/top', 'manager/top');
// 会員検索・一覧
Route::get('/manager/userlist', 'ManagerController@userlist');
// 会員詳細
Route::get('/manager/userdetail/{id}', 'ManagerController@userdetail')->where('id', '^[0-9]+$');
// 会員削除
Route::get('/manager/userdelete/{id}', 'ManagerController@userdelete')->where('id', '^[0-9]+$');
Route::get('/manager/userdelete/done/{id}', 'ManagerController@deleteExecute')->where('id', '^[0-9]+$');

// クーポン一覧
Route::get('/{mode}/coupon', 'CouponController@list')->where('mode', 'user|manager');
// クーポン詳細
Route::get('/{mode}/coupon/{id}', 'CouponController@detail')
  ->where([
    'mode' => 'user|manager',
    'id' => '^[0-9]+$'
  ]);
// クーポン作成
Route::view('/manager/coupon/registration', 'coupon/input', ['genders' => Gender::all(), 'prefectures' => Prefecture::all()]);
Route::post('/manager/coupon/confirm', 'CouponController@confirm');
Route::post('/manager/coupon/store', 'CouponController@store');

// 会員分析
Route::view('/manager/analysis', 'manager/analysis', ['data' => User::getChartData()]);
