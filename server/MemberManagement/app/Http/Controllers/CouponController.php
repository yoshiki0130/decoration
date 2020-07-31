<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;

class CouponController extends Controller
{
    /**
     * クーポン一覧
     */
    public function list($mode)
    {
        try {
            if ($mode === 'manager') {
                $coupon = Coupon::whereNull('deleted_at')->get();

                foreach ($coupon as $item) {
                    $item['distributuion_count'] = $item->users->count();
                }
            } elseif ($mode === 'user') {
                // まだ削除されたクーポンも取ってきてしまう処理のまま
                $coupon = User::find(session('id'))->coupons;
            } else {
                // 
            }

            return view('coupon/couponlist')->with([
                'mode' => $mode,
                'data' => $coupon,
            ]);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    /**
     * クーポン詳細
     */
    public function detail($mode, $id)
    {
        try {
            if ($mode === 'manager') {
                $coupon = Coupon::find($id);
                $userids = $coupon->users->pluck('id');

                return view('coupon/detail')->with([
                    'mode' => $mode,
                    'data' => $coupon,
                    'userlist' => User::find($userids)
                ]);
            } elseif ($mode === 'user') {
                // ログイン中の会員に紐付いたクーポンしか見れない（URL直打ち対策）
                // 未実装
                $coupon = Coupon::find($id);

                return view('coupon/detail')->with([
                    'mode' => $mode,
                    'data' => $coupon,
                ]);
            } else {
                // 
            }
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    /**
     * クーポン作成確認
     */
    public function confirm(Request $request)
    {
        try {
            $searchResult = User::search($request);

            return view('coupon/confirm')->with([
                'input' => $request->all(),
                'userlist' => $searchResult['userlist'],
            ]);
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    /**
     * クーポン作成実行
     */
    public function store(Request $request)
    {
        try {
            $coupon = new Coupon();
            $coupon->title = $request->title;
            $coupon->content = $request->content;
            $coupon->expiration_date = $request->expiration_date;
            $coupon->save();
            $coupon->users()->sync($request->user_id);

            return redirect('/manager/coupon')->with('message', 'クーポンを新規作成しました');
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

    public function delete(Request $request)
    {
        try {
            $coupon = Coupon::find($request->id);
            $coupon->deleted_at = date('Y-m-d H:i:s', time());
            $coupon->save();
            
            // 会員との紐付けを削除
            $coupon->users()->detach();

            return redirect('/manager/coupon')->with('message', 'クーポンを削除しました');
        } catch (\Throwable $th) {
            dump($th);
            return;
        }
    }

}
