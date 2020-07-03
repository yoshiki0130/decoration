<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefecture;
use Exception;

class UserController extends Controller
{
    /**
     * ログイン処理
     *
     * ログインまわりはあとまわし
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $user_record = User::where('user_id', $request->user_id)
                ->where('password', $request->password)
                ->first();

            if (is_null($user_record)) {
                return redirect()->action('UserController@login')
                    ->with('message', 'IDかパスパードが間違っています');
            }

            session([
                'id' => $user_record->id,
                'name' => $user_record->name1 . $user_record->name2
            ]);

            return redirect('user/my');
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    /**
     * パスワード再発行
     * 
     * ログインまわりはあとまわし
     */
    public function reissue(Request $request)
    {
        try {
            // $user_record = User::where('email', $request->email)
            //     ->first();

            // if (is_null($user_record)) {
            //     return redirect('/user/reissue')
            //         ->with('message', '登録したメールアドレスを入力してください。');
            // }

            // パスワード生成
            $use_word = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLNMOPQRSTUVWXYZ';
            $new_pass = substr(str_shuffle($use_word), 0, 8);
            echo $new_pass;
            // メール送信処理

            return view('user/reissue_done');
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    /**
     * 新規登録トップ
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $prefectures = Prefecture::all();
            return view('user/create')->with('prefectures', $prefectures);
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            return;
            // return view('user/store');
        }
    }

    /**
     * 登録情報変更
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        try {
            $user_record = User::where('id', session('id'))->first();
            $prefectures = Prefecture::all();

            return view('user/mydata')->with([
                'record' => $user_record,
                'prefectures' => $prefectures
            ]);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    /**
     * 新規登録確認
     * 
     */
    public function confirm(Request $request)
    {
        $input = $request->all();
        return view('user/confirm')->with('input', $input);
    }

    /**
     * 変更確認
     *
     * TODO:ビュー含めて新規登録とまとめたい
     * 
     */
    public function confirmEdit(Request $request)
    {
        $input = $request->all();
        try {
            $prefecture_data = Prefecture::where('id', $input['prefecture'])->first();
            $input['prefecture_name'] = $prefecture_data['name'];

            return view('user/confirm_edit')->with('input', $input);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    /**
     * 新規登録実行
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->user_id = $request->user_id;
            $user->name1 = $request->name1;
            $user->name2 = $request->name2;
            $user->yomi1 = $request->yomi1;
            $user->yomi2 = $request->yomi2;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->prefecture = $request->prefecture;
            $user->save();

            return view('user/store');
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            // return view('user/store');
            return;
        }
    }

    /**
     * 変更実行
     *
     */
    public function update(Request $request)
    {
        try {
            $user = User::find(session('id'));
            $user->user_id = $request->user_id;
            $user->name1 = $request->name1;
            $user->name2 = $request->name2;
            $user->yomi1 = $request->yomi1;
            $user->yomi2 = $request->yomi2;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->prefecture = $request->prefecture;
            $user->save();

            session([
                'name' => $user->name1 . $user->name2
            ]);
            return redirect('user/my')->with('message', '登録情報を変更しました');
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            // return view('user/store');
            return;
        }
    }

    /**
     * 削除実行
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        try {
            $user = User::find(session('id'));
            $user->deleted_at = date('Y-m-d H:i:s', time());
            $user->save();

            session()->flush();
            return view('user/unscribe_done');
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }
}
