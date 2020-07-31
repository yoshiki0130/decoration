<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prefecture;

class ManagerController extends Controller
{
    public function userlist(Request $request)
    {
        try {
            $searchResult = User::search($request);

            return view('manager/userlist')->with([
                'genders' => Gender::all(),
                'prefectures' => Prefecture::all(),
                'inputs' => $searchResult['searchCriteria'],
                'userlist' => $searchResult['userlist'],
            ]);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    public function userDetail($id)
    {
        try {
            $user = User::find($id);

            return view('manager/userdetail')->with('data', $user);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    public function userDelete(Request $request)
    {
        // この辺の処理はほぼ共通してるし親クラスとしてまとめられるかも
        try {
            $user = User::find($request->id);
            $user->deleted_at = date('Y-m-d H:i:s', time());
            $user->save();

            // クーポンとの紐付け削除
            $user->coupons()->detach();

            return redirect('/manager/userlist')->with('message', '会員を削除しました');
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }
}
