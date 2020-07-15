<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Gender;
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
            $user_record = User::where('email', $request->email)
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

    public function logout()
    {
        session()->flush();

        return view('auth/logout');
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
     * 登録・変更トップ
     *
     */
    public function registration($mode)
    {
        try {
            $prefectures = Prefecture::all();
            $genders = Gender::all();

            if ($mode === 'edit') {
                $user_record = User::where('id', session('id'))->first();

                return view('user/registration/input')->with([
                    'record' => $user_record,
                    'genders' => $genders,
                    'prefectures' => $prefectures
                ]);
            }
                
            return view('user/registration/input')->with([
                'genders' => $genders,
                'prefectures' => $prefectures
            ]);
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            return;
            // return view('user/store');
        }
    }

    /**
     * 登録・変更確認
     * 
     */
    public function confirm(Request $request, $mode)
    {
        $input = $request->all();
        try {
            $prefecture_data = Prefecture::where('id', $input['prefecture_id'])->first();
            $gender_data = Gender::where('id', $input['gender_id'])->first();
            $input['prefecture_name'] = $prefecture_data['name'];
            $input['gender_name'] = $gender_data['name'];

            return view('user/registration/confirm')->with([
                'input' => $input,
                'mode' => $mode
            ]);
        } catch (Exception $e) {
            dump($e);
            return;
        }
    }

    /**
     * 登録・変更実行
     *
     */
    public function store(Request $request, $mode)
    {
        try {
            if ($mode === 'edit') {
                $user = User::find(session('id'));
                session([
                    'name' => $request->name1 . $request->name2
                ]);
            } else {
                $user = new User;
            }

            $user->user_id = $request->user_id;
            $user->name1 = $request->name1;
            $user->name2 = $request->name2;
            $user->kana1 = $request->kana1;
            $user->kana2 = $request->kana2;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->gender_id = $request->gender_id;
            $user->prefecture_id = $request->prefecture_id;
            $user->save();

            if ($mode === 'edit') {
                return redirect('user/my')->with('message', '登録情報を変更しました');
            } else {
                return view('user/registration/store');
            }
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
            session()->flush();
            dump($e);
            return;
        }
    }
}
